# Panolabo AI Boost Plugin

## 概要

既存のWordPress運用に「提案型事例」機能を追加するプラグインです。AI系プラグインを使った未来効果を提示する営業支援ツールとして設計されています。

## 特徴

- **テーマ非依存**: どのテーマでも動作する独立したプラグイン
- **UIKit 3 互換**: UIKitがなくても崩れない最低限のスタイリング
- **Schema.org 対応**: 自動でJSON-LD構造化データを出力
- **パフォーマンス最適化**: 必要時のみアセット読み込み

## 機能

### Custom Post Type: Future Case (提案型事例)
- slug: `future-case`
- アーカイブ: `/future-case/`
- 管理画面で作成・編集可能

### 入力項目
- クライアント名
- 業種  
- 地域
- 従来の取組
- AI追加後の未来像（主役項目）
- KPI（繰り返しフィールド）
- 使用するAIプラグイン（チェックボックス）
- Before/After画像

### 表示機能
- **ショートコード**: `[future_case id="123" layout="card|full"]`
- **アーカイブページ**: カード一覧表示
- **フィルタリング**: `/future-case/?ai=sns_auto` でAIプラグイン別絞り込み

## インストール

1. プラグインフォルダを `/wp-content/plugins/` にアップロード
2. WordPress管理画面でプラグインを有効化
3. 管理メニューに「提案型事例」が追加されます

## 使用方法

### 1. 事例作成
1. 管理画面 > 提案型事例 > 新規追加
2. 必要項目を入力
3. 公開

### 2. ショートコード埋め込み
```php
// フルレイアウト
[future_case id="123"]

// カードレイアウト  
[future_case id="123" layout="card"]
```

### 3. アーカイブページ
- `/future-case/` - 全事例一覧
- `/future-case/?ai=ai_writer` - AI加筆事例のみ
- `/future-case/?ai=sns_auto` - SNS自動投稿事例のみ

## カスタマイズ

### テンプレートオーバーライド
テーマディレクトリに以下のファイルを配置することで、テンプレートをカスタマイズできます：

- `single-future_case.php`
- `archive-future_case.php`

### CSSカスタマイズ
```css
/* 基本スタイルのオーバーライド */
.pab-future-case {
    /* カスタムスタイル */
}
```

### フック
```php
// 事例データフィルター
add_filter('pab_case_data', function($data, $post_id) {
    // データの加工
    return $data;
}, 10, 2);

// Schema.org データフィルター
add_filter('pab_schema_data', function($schema, $post_id) {
    // スキーマの加工
    return $schema;
}, 10, 2);
```

## 技術仕様

- **PHP**: 7.4以上
- **WordPress**: 5.8以上
- **依存関係**: なし（独立動作）

## Schema.org 対応

各事例ページに以下の構造化データを自動出力：

- `@type: CreativeWork` - メインコンテンツ
- `@type: HowTo` - 導入手順
- `@type: Organization` - 制作者情報

## セキュリティ

- ノンス検証
- 権限チェック
- エスケープ処理
- サニタイズ処理

## ライセンス

GPL v2 or later

## サポート

制作: Panolabo LLC  
URL: https://panolabollc.com/

## 更新履歴

### 1.0.0 (2025-08-17)
- 初回リリース
- CPT「提案型事例」実装
- ショートコード機能
- アーカイブページ
- Schema.org対応
- レスポンシブデザイン

## 既知の制限

- KPIフィールドは最大10個まで推奨
- 画像サイズは自動リサイズされません
- IE11以下では一部CSSが適用されません

## トラブルシューティング

### Q: ショートコードが表示されない
A: プラグインが有効化されていることを確認してください

### Q: スタイルが崩れる
A: テーマとの競合の可能性があります。CSSの優先度を調整してください

### Q: 画像が表示されない
A: メディアライブラリのパーミッションを確認してください