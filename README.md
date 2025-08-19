# Panolabo WordPress Theme v2.0.0

🚀 **AI Boost営業支援機能搭載** - AI×VR×アプリ×Web×OEM総合制作代理店のWordPressテーマ

## ✨ v2.0.0 NEW FEATURES

### 🎯 Panolabo AI Boost プラグイン統合
- **提案型事例表示機能**: 営業現場で効果を実演
- **6業種対応**: 飲食・美容・製造・不動産・歯科・EC事例
- **ショートコード**: `[future_case id="1" layout="full"]`
- **成約率3倍向上**: 数値で示すAI導入効果

## 📋 概要

Panolaboは、「普通なら5つの部署でやる仕事を、1人で完結する」クリエイティブテック企業のためのWordPressテーマです。

### 特徴

- 👨‍💼 **1人経営の凄さ**を全面に訴求
- 🏛️ **事業の三本柱**（受託開発・自社開発・OEM供給）を明確に表現
- 📱 **レスポンシブ対応** - UIKit 3.0ベース
- ⚡ **高速・軽量** - 最適化されたパフォーマンス
- 🔍 **SEO最適化** - 構造化データ対応

## 🛠️ 技術スタック

- **フレームワーク**: UIKit 3.23.11
- **言語**: PHP 7.4+, JavaScript (ES6+)
- **CMS**: WordPress 5.8+
- **ビルドツール**: npm/webpack
- **デプロイ**: lftp/FTP自動デプロイ

## 📦 インストール

### 必要要件

- PHP 7.4以上
- WordPress 5.8以上
- Node.js 14以上（開発環境）

### セットアップ

1. **リポジトリをクローン**
```bash
git clone https://github.com/numaken/panolabo-theme.git
cd panolabo-theme
```

2. **依存関係をインストール**
```bash
npm install
composer install
```

3. **環境設定**
```bash
cp .env.example .env
# .envファイルを編集してFTP設定を入力
```

4. **WordPressテーマディレクトリにコピー**
```bash
cp -r . /path/to/wordpress/wp-content/themes/panolabo
```

## 🚀 デプロイ

### 自動デプロイ（FTP）

```bash
# ステージング環境へデプロイ
./deploy.sh production

# 本番環境へデプロイ
./deploy.sh staging
```

### GitHub Actions（CI/CD）

プッシュ時に自動でテストとビルドが実行されます。

## 📂 ディレクトリ構造

```
panolabo/
├── assets/              # カスタムアセット
│   ├── css/            # カスタムCSS
│   ├── img/            # 画像
│   └── js/             # カスタムJS
├── css/                # UIKit CSS
├── images/             # テーマ画像
├── includes/           # PHP機能モジュール
├── js/                 # UIKit JS
├── template-parts/     # テンプレートパーツ
├── .env.example        # 環境設定サンプル
├── deploy.sh           # デプロイスクリプト
├── functions.php       # テーマ機能
├── style.css          # メインスタイル
├── front-page.php     # フロントページ
├── page-*.php         # 各種ページテンプレート
└── README.md          # このファイル
```

## 🎨 カスタマイズ

### カラースキーム

ブランドカラーは `assets/css/brand-colors.css` で定義：

```css
:root {
  --panolabo-primary: #316B3F;    /* Forest Green */
  --panolabo-accent: #FF6B35;     /* Orange Red */
  --panolabo-secondary: #2E86AB;  /* Blue */
}
```

### ページテンプレート

- `front-page.php` - トップページ
- `page-about.php` - 会社概要
- `page-services.php` - サービス一覧
- `page-contact.php` - お問い合わせ

## 📈 事業の三本柱

1. **受託開発**（VR・アプリ・Web）
   - 360°VRパノラマ
   - スマホアプリ開発
   - WordPress制作

2. **自社開発**（SaaS・WPプラグイン）
   - AiPostPilot Pro（SNS自動化）
   - Chat2Doc（会話ドキュメント化）
   - WordPressプラグイン

3. **OEM供給**（パートナーシップ）★新事業
   - ホワイトラベル提供
   - 収益シェアモデル
   - スケールアウト戦略

## 🤝 コントリビューション

1. Forkする
2. Feature branchを作成 (`git checkout -b feature/AmazingFeature`)
3. 変更をコミット (`git commit -m 'Add some AmazingFeature'`)
4. Branchにプッシュ (`git push origin feature/AmazingFeature`)
5. Pull Requestを作成

## 📄 ライセンス

**Proprietary License** - 本テーマはPanolabo LLCの独占的所有物です。

### 利用条件
- **個人利用**: 事前承認が必要です
- **商用利用**: ライセンス契約が必要です
- **OEM供給**: パートナー契約締結により提供可能
- **改変・再配布**: 原則禁止（パートナー契約により個別対応）

### OEMパートナー向け条件
- 自社ブランドでの販売・提供が可能
- 価格設定は自由（Panolaboはパートナーフィー＋制作費のみ）
- 技術サポート・アップデート提供
- 詳細は hello@panolabollc.com までお問い合わせください

### なぜProprietaryライセンスなのか
本テーマは、30年の実務経験と独自のAI活用ノウハウが詰まった商用プロダクトです。
品質保証とサポート体制を維持するため、管理された形での提供を行っています。

## 📞 お問い合わせ

- **Website**: [https://panolabollc.com](https://panolabollc.com)
- **Email**: hello@panolabollc.com
- **Tel**: 090-4749-5780

---

**"小規模でも、AIを使えば会社規模を動かせる。"** - Panolabo