目的

既存の「従来事例」に、AI系プラグインを追加した際の未来効果を提示する“提案型事例”機能を、テーマ依存不要（プラグイン方式）で実装する。
既存WordPress運用ユーザーがリニューアルせず導入できる導線を作る。

成果物（Acceptance Criteria）

プラグイン panolabo-ai-boost を新規作成（単体で有効化可能）。

CPT future_case（提案型事例）を登録。管理画面で作成・公開できる。

入力UI（ACF不要／ネイティブ）

クライアント名（text）

業種（text）

地域（text）

従来の取組（textarea）

AI追加後の未来像（textarea / 主役）

KPI（繰り返しフィールド：指標名・数値・補足）

使用するAIプラグイン（チェックボックス：AI加筆, SNS自動投稿, Chat2Doc, その他+自由記述）

Before/After 画像（2つ、メディアライブラリ）

表示手段

ショートコード [future_case id="123"]（単体表示）

アーカイブ /future-case/（カード一覧）

Schema.org（CreativeWork + HowTo 的要素）埋め込み

デザイン UIKit 3 互換の素CSSを同梱（テーマ非依存）。テーマにUIKitがなくても崩れない最低限のスタイル。

SEO：各ページに JSON-LD（自動生成）を出力。

パフォーマンス：CSS/JSは必要時のみロード（短コード/テンプレで条件読み込み）。

テスト：Gutenberg/Classic 両方で入力・表示確認済み。PHP 7.4+ / WP 5.8+ で警告無し。

実装詳細
A. プラグイン構成
panolabo-ai-boost/
├── panolabo-ai-boost.php
├── inc/
│   ├── cpt.php              // CPT登録
│   ├── meta-boxes.php       // 入力UI（メタボックス）
│   ├── render.php           // 出力ロジック（短コード/テンプレ）
│   ├── schema.php           // JSON-LD生成
│   └── assets.php           // 条件付きアセット読込
├── assets/
│   ├── css/future-case.css
│   └── js/future-case.js    // 最小限（任意）
└── templates/
    ├── single-future_case.php
    └── archive-future_case.php

B. CPT 定義

slug: future-case

labels: 日本語（「提案型事例」）

supports: title, editor, thumbnail, excerpt, custom-fields, revisions

has_archive: true / rewrite: slug=future-case

show_in_rest: true

C. メタボックス（必要カスタムフィールド）

キー名（型）：

fc_client_name (string)

fc_industry (string)

fc_region (string)

fc_legacy_actions (string) — 従来の取組

fc_future_with_ai (string) — AI追加後の未来像（主役）

fc_kpis (array of {name, value, note})

fc_ai_plugins (array) — ai_writer, sns_auto, chat2doc, other

fc_ai_plugins_other (string)

fc_img_before_id (int attachment id)

fc_img_after_id (int attachment id)

保存は sanitize_text_field / wp_kses_post を適切に使い分け。
fc_kpis は repeatable（JSで行追加）で実装。

D. 出力：ショートコード

形式：[future_case id="123" layout="card|full"]

既定：full

処理：

投稿取得 → メタ取得

見出し構成

Hero：{業種} × {AIプラグイン名} → ベネフィット1行

Before（従来の取組）

After（AI追加の未来像） ← 強調

KPI一覧（数値はダミーでも許容、将来置換容易なDOM構造）

使用プラグイン（バッジ）

Before/After 画像（並列表示、<figure>）

CTA（「あなたのWordPressにプラグインで＋α」「OEMご相談」）

schema.php を呼び出し JSON-LD を <script type="application/ld+json"> で埋め込み

CSS/JSはこのショートコードが使われたページでのみ enqueue。

E. アーカイブ／シングルテンプレート

もし有効テーマに single-future_case.php が無ければ、プラグイン内テンプレを template_include で読み込み。

アーカイブはカードグリッド、AIプラグインのフィルタ（クエリ変数）対応：

/future-case/?ai=sns_auto など。

F. Schema.org（JSON-LD）

@type: CreativeWork

name：投稿タイトル

about：industry / client

description：要約（Afterを主）

isBasedOn: 従来の取組

applicationCategory: AIPlugin

creator: Panolabo LLC

可能なら HowTo/HowToStep で「導入ステップ（プラグイン導入 → 設定 → 自動運用）」を簡易表現。

G. コピーのデフォルト文（自動補完）

タイトル未入力時：{業種}の従来事例にAIを+すると、こう変わる

CTA：今のWordPressに“足すだけ”で、集客と運用が進化します。

H. セキュリティ／品質

ノンス/権限チェック、esc_* 徹底

PHPStan レベル0〜2通過（任意）

PHP 7.4 / WP 5.8 で deprecation 無し

翻訳対応（.pot 生成）

I. 開発コマンド（任意）

npm run build なし（最小構成）。将来の拡張に備え assets はプレーン。

バージョンは panolabo-ai-boost.php ヘッダに記載。

動作確認チェックリスト

 プラグイン有効化 → 管理メニュー「提案型事例」表示

 新規追加 → メタ入力 → 公開

 [future_case id="X"] で任意ページに描画

 /future-case/ 一覧表示・ページネーション

 /future-case/?ai=ai_writer などで絞り込み

 JSON-LD が検証（linter）でOK

 テーマ差異があっても最低限崩れない

追加リクエスト（PMからの指示）

管理UIのラベル文言は営業活用を想定して明快に。

コードは関数プレフィックス pab_ で衝突防止。

PRには：概要、スクショ、ショートコード埋め込み例、既知の制限 を必ず添付。

コピーの雛形（投稿作成に使う）

Hero：

{業種}の従来事例に、AIプラグインを“足すだけ”。運用は変えずに、成果は前へ。

Before（従来の取組）：

まず、私たちは{従来の施策/導入}で{ベースの成果}を作りました。

After（AI追加の未来像）：

ここに {AIプラグイン名} を追加すると、{運用の変化}により {KPI} が {目標/幅} 向上します。

KPI：

例）予約率 +15〜30% / 投稿頻度 週1→週5 / 更新工数 50%削減

CTA：

いまのWordPressに“足すだけ”でOK。乗り換え不要のAIブースト。