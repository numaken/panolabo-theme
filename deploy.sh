#!/bin/bash

# Xserver自動デプロイスクリプト（Panolaboテーマディレクトリ版）
# 使用方法: ./deploy.sh [staging|production]

set -e

# 設定
THEME_DIR="$(pwd)"  # 現在のディレクトリ（Panolaboテーマディレクトリ）
DEPLOY_DIR="deploy_temp"
TIMESTAMP=$(date '+%Y%m%d_%H%M%S')
# 環境設定ファイルを読み込み（同一ディレクトリから）
if [ -f ".env" ]; then
    export $(grep -v '^#' .env | xargs)
else
    echo "❌ エラー: 環境設定ファイルが見つかりません: .env"
    exit 1
fi

# 引数チェック
ENVIRONMENT=${1:-staging}
if [ "$ENVIRONMENT" != "staging" ] && [ "$ENVIRONMENT" != "production" ]; then
    echo "使用方法: ./deploy.sh [staging|production]"
    exit 1
fi

echo "🚀 Xserver ${ENVIRONMENT}環境へのデプロイを開始します..."
echo "📂 テーマディレクトリ: $THEME_DIR"

# 一時ディレクトリ作成
rm -rf $DEPLOY_DIR
mkdir -p $DEPLOY_DIR

echo "📦 デプロイパッケージを作成中..."

# テーマファイルをコピー
rsync -av --exclude='.git' \
          --exclude='node_modules' \
          --exclude='.DS_Store' \
          --exclude='*.log' \
          --exclude='Thumbs.db' \
          --exclude='*.tmp' \
          --exclude='deploy_temp' \
          --exclude='deploy.sh' \
          $THEME_DIR/ $DEPLOY_DIR/

# バージョン情報を追加
cat > $DEPLOY_DIR/version.php << EOF
<?php
/*
 * Theme Name: Panolabo
 * Version: $TIMESTAMP
 * Environment: $ENVIRONMENT
 * Last Deploy: $(date)
 * Deploy By: $(whoami)
 * Deploy From: $THEME_DIR
 */
EOF

# 環境別設定
if [ "$ENVIRONMENT" = "production" ]; then
    FTP_HOST=$PROD_FTP_HOST
    FTP_USER=$PROD_FTP_USER
    FTP_PASS=$PROD_FTP_PASS
    FTP_PATH=$PROD_FTP_PATH
    SITE_URL=$PROD_SITE_URL
    echo "🔴 本番環境にデプロイします"
else
    FTP_HOST=$STAGING_FTP_HOST
    FTP_USER=$STAGING_FTP_USER
    FTP_PASS=$STAGING_FTP_PASS
    FTP_PATH=$STAGING_FTP_PATH
    SITE_URL=$STAGING_SITE_URL
    echo "🟡 ステージング環境にデプロイします"
fi

# 確認プロンプト（本番環境の場合）
if [ "$ENVIRONMENT" = "production" ]; then
    echo "⚠️  本番環境への変更を適用します。続行しますか？ [y/N]"
    read -r response
    if [[ ! "$response" =~ ^[Yy]$ ]]; then
        echo "❌ デプロイをキャンセルしました"
        rm -rf $DEPLOY_DIR
        exit 1
    fi
fi

echo "📤 FTPアップロード中..."

# FTPでアップロード
if command -v lftp &> /dev/null; then
    echo "LFTPを使用してアップロード..."
    lftp -u "$FTP_USER,$FTP_PASS" $FTP_HOST << EOF
set ftp:passive-mode true
set ftp:ssl-allow no
mkdir -p $FTP_PATH
mkdir -p $FTP_PATH/wp-content
mkdir -p $FTP_PATH/wp-content/themes
cd $FTP_PATH/wp-content/themes
lcd $DEPLOY_DIR
mirror -R --delete --verbose . Panolabo
quit
EOF
else
    echo "標準FTPを使用してアップロード..."
    # FTPコマンドファイル作成
    cat > ftp_commands.txt << EOF
open $FTP_HOST
user $FTP_USER $FTP_PASS
binary
passive
prompt off
cd $FTP_PATH/wp-content/themes/Panolabo
lcd $DEPLOY_DIR
mput *
quit
EOF
    ftp -n < ftp_commands.txt
    rm -f ftp_commands.txt
fi

# 後片付け
rm -rf $DEPLOY_DIR

echo "✅ デプロイが完了しました！"
echo "📊 デプロイ情報:"
echo "   環境: $ENVIRONMENT"
echo "   バージョン: $TIMESTAMP"
echo "   時刻: $(date)"
echo "   デプロイ元: $THEME_DIR"

# 通知（オプション）
if [ -n "$WEBHOOK_URL" ]; then
    curl -X POST -H 'Content-type: application/json' \
         --data "{\"text\":\"🚀 ${ENVIRONMENT}環境へのデプロイが完了しました (v$TIMESTAMP)\"}" \
         $WEBHOOK_URL
fi

echo "🌐 サイトを確認してください:"
if [ "$ENVIRONMENT" = "production" ]; then
    echo "   本番: $SITE_URL"
else
    echo "   ステージング: $SITE_URL"
fi