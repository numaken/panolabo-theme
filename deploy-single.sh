#!/bin/bash

# 単一ファイルデプロイスクリプト
# 使用方法: ./deploy-single.sh filename

set -e

# 引数チェック
if [ $# -eq 0 ]; then
    echo "使用方法: ./deploy-single.sh filename"
    echo "例: ./deploy-single.sh style.css"
    exit 1
fi

FILENAME=$1

# ファイル存在チェック
if [ ! -f "$FILENAME" ]; then
    echo "❌ エラー: ファイルが見つかりません: $FILENAME"
    exit 1
fi

# 環境設定ファイルを読み込み
if [ -f ".env" ]; then
    export $(grep -v '^#' .env | xargs)
else
    echo "❌ エラー: 環境設定ファイルが見つかりません: .env"
    exit 1
fi

echo "🚀 単一ファイルデプロイを開始します: $FILENAME"

# LFTPでファイルをアップロード（本番環境）
lftp -c "
set ftp:ssl-allow no
open -u $PROD_FTP_USER,$PROD_FTP_PASS $PROD_FTP_HOST
cd $PROD_FTP_PATH/wp-content/themes/numaken
put $FILENAME
quit
"

if [ $? -eq 0 ]; then
    echo "✅ $FILENAME のデプロイが完了しました！"
else
    echo "❌ デプロイに失敗しました"
    exit 1
fi