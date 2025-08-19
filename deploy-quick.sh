#!/bin/bash

# クイックデプロイスクリプト（手動でファイル指定）
# 使用方法: ./deploy-quick.sh "page-about.php assets/css/theme-polish.css"

set -e

# 引数チェック
if [ $# -eq 0 ]; then
    echo "使用方法: ./deploy-quick.sh \"ファイル1 ファイル2 ...\""
    echo "例: ./deploy-quick.sh \"page-about.php assets/css/theme-polish.css\""
    exit 1
fi

FILES="$1"
ENVIRONMENT=${2:-staging}

# 環境設定ファイルを読み込み
if [ -f ".env" ]; then
    export $(grep -v '^#' .env | xargs)
else
    echo "❌ エラー: 環境設定ファイルが見つかりません: .env"
    exit 1
fi

# 環境別設定
if [ "$ENVIRONMENT" = "staging" ]; then
    REMOTE_PATH="/panolabollc.com/public_html/wp-staging/wp-content/themes/Panolabo"
    echo "🟡 ステージング環境への素早いデプロイを開始します"
else
    REMOTE_PATH="/panolabollc.com/public_html/wp-content/themes/Panolabo"
    echo "🔴 本番環境への素早いデプロイを開始します"
fi

echo "📤 指定されたファイルをアップロード中..."

# 各ファイルをアップロード
for file in $FILES; do
    if [ -f "$file" ]; then
        echo "🔄 アップロード: $file"
        
        # ディレクトリを事前作成
        file_dir=$(dirname "$file")
        if [ "$file_dir" != "." ]; then
            lftp -c "
            set ftp:ssl-allow no
            set ssl:verify-certificate no
            open -u $FTP_USER,$FTP_PASS $FTP_HOST
            mkdir -p $REMOTE_PATH/$file_dir
            " >/dev/null 2>&1
        fi
        
        # ファイルアップロード
        lftp -c "
        set ftp:ssl-allow no
        set ssl:verify-certificate no
        open -u $FTP_USER,$FTP_PASS $FTP_HOST
        put $file -o $REMOTE_PATH/$file
        "
        
        if [ $? -eq 0 ]; then
            echo "✅ 完了: $file"
        else
            echo "❌ エラー: $file"
        fi
    else
        echo "⚠️ ファイルが見つかりません: $file"
    fi
done

echo "🎉 クイックデプロイ完了！"