#!/bin/bash

# 差分デプロイスクリプト（修正されたファイルのみアップロード）
# 使用方法: ./deploy-incremental.sh [staging|production]

set -e

# 設定
THEME_DIR="$(pwd)"
TIMESTAMP=$(date '+%Y%m%d_%H%M%S')

# 環境設定ファイルを読み込み
if [ -f ".env" ]; then
    export $(grep -v '^#' .env | xargs)
else
    echo "❌ エラー: 環境設定ファイルが見つかりません: .env"
    exit 1
fi

# 引数チェック
ENVIRONMENT=${1:-staging}
if [ "$ENVIRONMENT" != "staging" ] && [ "$ENVIRONMENT" != "production" ]; then
    echo "使用方法: ./deploy-incremental.sh [staging|production]"
    exit 1
fi

# 環境別設定
if [ "$ENVIRONMENT" = "staging" ]; then
    REMOTE_PATH="/panolabollc.com/public_html/wp-staging/wp-content/themes/Panolabo"
    echo "🟡 ステージング環境への差分デプロイを開始します"
else
    REMOTE_PATH="/panolabollc.com/public_html/wp-content/themes/Panolabo"
    echo "🔴 本番環境への差分デプロイを開始します"
    read -p "⚠️  本番環境への変更を適用します。続行しますか？ [y/N] " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        echo "❌ デプロイを中止しました"
        exit 1
    fi
fi

echo "📂 テーマディレクトリ: $THEME_DIR"

# Git差分チェック（最新のコミットとの差分）
echo "🔍 変更されたファイルを確認中..."

# Gitがある場合は差分を使用
if [ -d ".git" ]; then
    CHANGED_FILES=$(git diff --name-only HEAD~1 HEAD 2>/dev/null || git ls-files --modified --others --exclude-standard)
    if [ -z "$CHANGED_FILES" ]; then
        echo "📄 直近の変更ファイルを検出..."
        # 過去24時間以内に更新されたファイル
        CHANGED_FILES=$(find . -name "*.php" -o -name "*.css" -o -name "*.js" -o -name "*.json" | xargs ls -la | awk '$6 >= "'$(date -d '1 day ago' '+%b')'" && $7 >= "'$(date -d '1 day ago' '+%d')'" {print $9}' | sed 's|^\./||')
    fi
else
    # Gitがない場合は最近更新されたファイルを対象
    echo "📄 最近更新されたファイルを検出中..."
    CHANGED_FILES=$(find . -name "*.php" -o -name "*.css" -o -name "*.js" -o -name "*.json" -newer .env 2>/dev/null | sed 's|^\./||' || echo "")
fi

# 手動でファイル指定も可能
echo "変更対象ファイル:"
if [ -n "$CHANGED_FILES" ]; then
    echo "$CHANGED_FILES"
    FILE_COUNT=$(echo "$CHANGED_FILES" | wc -l)
    echo "📊 対象ファイル数: $FILE_COUNT"
else
    echo "⚠️ 自動検出できませんでした。手動で指定してください。"
    read -p "アップロードしたいファイルパスを入力 (例: page-about.php assets/css/theme-polish.css): " MANUAL_FILES
    CHANGED_FILES="$MANUAL_FILES"
fi

if [ -z "$CHANGED_FILES" ]; then
    echo "❌ アップロード対象のファイルがありません"
    exit 1
fi

# FTPディレクトリ作成
echo "📤 FTPで必要なディレクトリを作成中..."
lftp -c "
set ftp:ssl-allow no
set ssl:verify-certificate no
open -u $FTP_USER,$FTP_PASS $FTP_HOST
mkdir -p $REMOTE_PATH/assets/css
mkdir -p $REMOTE_PATH/assets/js
mkdir -p $REMOTE_PATH/includes
"

# 個別ファイルアップロード
echo "📤 変更されたファイルのみアップロード中..."
for file in $CHANGED_FILES; do
    if [ -f "$file" ]; then
        echo "🔄 アップロード中: $file"
        
        # ディレクトリ構造を保持してアップロード
        file_dir=$(dirname "$file")
        remote_dir="$REMOTE_PATH/$file_dir"
        
        lftp -c "
        set ftp:ssl-allow no
        set ssl:verify-certificate no
        open -u $FTP_USER,$FTP_PASS $FTP_HOST
        mkdir -p $remote_dir
        put $file -o $REMOTE_PATH/$file
        "
        
        if [ $? -eq 0 ]; then
            echo "✅ 完了: $file"
        else
            echo "❌ エラー: $file のアップロードに失敗"
        fi
    else
        echo "⚠️ ファイルが見つかりません: $file"
    fi
done

# バージョンファイル更新
echo "📝 バージョン情報を更新中..."
cat > version.php << EOF
<?php
/*
Theme: Panolabo
Version: $TIMESTAMP
Environment: $ENVIRONMENT
Deploy Type: Incremental
Updated Files: $(echo "$CHANGED_FILES" | tr '\n' ', ')
*/
EOF

lftp -c "
set ftp:ssl-allow no
set ssl:verify-certificate no
open -u $FTP_USER,$FTP_PASS $FTP_HOST
put version.php -o $REMOTE_PATH/version.php
"

echo "🎉 差分デプロイが完了しました！"
echo "📊 アップロードファイル数: $(echo "$CHANGED_FILES" | wc -l)"
echo "⏰ デプロイ時刻: $TIMESTAMP"
echo "🌐 確認URL: https://panolabollc.com$( [ "$ENVIRONMENT" = "staging" ] && echo "/wp-staging" || echo "" )"

# 一時ファイル削除
rm -f version.php

echo "✨ デプロイ処理が正常に完了しました"