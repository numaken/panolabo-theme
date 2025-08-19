# Panolabo AI Boost ショートコード活用例

## 🎯 営業活動での活用方法

### 1. 業種別事例の表示

#### 飲食店向け営業
```php
[future_case id="1" layout="full"]
```
**URL**: `/future-case/italian-restaurant-sns-automation/`
**効果**: 予約率35%向上、運営工数50%削減

#### 美容室向け営業
```php
[future_case id="2" layout="full"]
```
**URL**: `/future-case/beauty-salon-ai-content-automation/`
**効果**: 新規客獲得率40%向上、コンテンツ制作工数70%削減

#### 製造業向け営業
```php
[future_case id="3" layout="full"]
```
**URL**: `/future-case/manufacturing-chat2doc-efficiency/`
**効果**: 議事録作成時間75%短縮、技術資料検索60%効率化

#### 不動産向け営業
```php
[future_case id="4" layout="full"]
```
**URL**: `/future-case/real-estate-ai-property-promotion/`
**効果**: Web問い合わせ率60%向上、記事作成工数80%削減

#### 歯科医院向け営業
```php
[future_case id="5" layout="full"]
```
**URL**: `/future-case/dental-clinic-prevention-awareness/`
**効果**: 新患数30%増加、SNSエンゲージメント5倍

#### EC事業者向け営業
```php
[future_case id="6" layout="full"]
```
**URL**: `/future-case/handmade-ec-ai-product-description/`
**効果**: 売上45%増加、商品説明作成時間85%短縮

---

## 📧 営業メールでの活用

### テンプレート例

```
件名: 【{{ 業種 }}】AI活用で{{ 主要効果 }}を実現した事例

{{ クライアント名 }} 様

お疲れ様です。
Panolabo の沼です。

{{ 業種 }}業界での AI活用事例をご紹介いたします。

▼ 同業種での成功事例
https://panolabollc.com/future-case/{{ 事例スラッグ }}/

【実現した効果】
✅ {{ KPI1 }}
✅ {{ KPI2 }}
✅ {{ KPI3 }}

重要なのは「リニューアル不要」という点です。
今のWordPressに、プラグインを"足すだけ"で効果を実感いただけます。

御社でも同様の効果が期待できます。
まずは15分の無料相談からいかがでしょうか？

ご検討のほど、よろしくお願いいたします。
```

---

## 🌐 サイト内での表示パターン

### パターン1: サービスページ埋め込み
```php
<!-- サービス説明の後に事例を表示 -->
<section class="service-cases">
    <h3>業種別活用事例</h3>
    
    <div class="case-grid">
        [future_case id="1" layout="card"]
        [future_case id="2" layout="card"]
        [future_case id="3" layout="card"]
    </div>
    
    <div class="more-cases">
        <a href="/future-case/">すべての事例を見る</a>
    </div>
</section>
```

### パターン2: トップページでの訴求
```php
<!-- ヒーローセクションの下に -->
<section class="top-cases">
    <h2>リニューアル不要。プラグインを"足すだけ"で劇的変化</h2>
    
    <!-- 注目事例を1つ大きく表示 -->
    [future_case id="1" layout="full"]
    
    <div class="other-cases">
        [future_case id="2" layout="card"]
        [future_case id="3" layout="card"]
    </div>
</section>
```

### パターン3: 業種特化ランディングページ
```php
<!-- 例：飲食店向けLP -->
<h1>飲食店のためのWordPress AI活用</h1>

[future_case id="1" layout="full"]

<section class="related-cases">
    <h3>その他の飲食店事例</h3>
    <!-- フィルタリング機能を使用 -->
    <a href="/future-case/?ai=sns_auto">SNS自動投稿事例</a>
    <a href="/future-case/?ai=ai_writer">AI記事生成事例</a>
</section>
```

---

## 🎨 デザインカスタマイズ例

### 営業資料風スタイル
```css
.business-proposal .pab-future-case {
    border: 2px solid #316B3F;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(49, 107, 63, 0.2);
}

.business-proposal .pab-hero {
    background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%);
    color: white;
}

.business-proposal .pab-kpi-item {
    background: #f8f9fa;
    border-left: 4px solid #316B3F;
}
```

### コンパクト表示スタイル
```css
.compact-case .pab-future-case {
    max-width: 400px;
    margin: 20px auto;
}

.compact-case .pab-hero {
    padding: 20px;
}

.compact-case .pab-section-title {
    font-size: 1.1rem;
}
```

---

## 📊 分析・効果測定

### Google Analytics 設定
```javascript
// 事例閲覧の追跡
gtag('event', 'case_study_view', {
    'case_id': '{{ 事例ID }}',
    'industry': '{{ 業種 }}',
    'ai_plugin': '{{ 使用プラグイン }}',
    'event_category': 'AI Cases'
});

// CTA クリックの追跡
gtag('event', 'case_cta_click', {
    'case_id': '{{ 事例ID }}',
    'button_text': '{{ ボタンテキスト }}',
    'event_category': 'Lead Generation'
});
```

---

## 🔗 URLパターン

### 個別事例ページ
- `/future-case/italian-restaurant-sns-automation/` (飲食店)
- `/future-case/beauty-salon-ai-content-automation/` (美容室)
- `/future-case/manufacturing-chat2doc-efficiency/` (製造業)
- `/future-case/real-estate-ai-property-promotion/` (不動産)
- `/future-case/dental-clinic-prevention-awareness/` (歯科医院)
- `/future-case/handmade-ec-ai-product-description/` (EC)

### フィルタリング付きアーカイブ
- `/future-case/` (全事例)
- `/future-case/?ai=sns_auto` (SNS自動投稿事例)
- `/future-case/?ai=ai_writer` (AI加筆事例)
- `/future-case/?ai=chat2doc` (Chat2Doc事例)

---

## 📱 レスポンシブ対応

すべてのショートコードは自動的にレスポンシブ対応されており、
スマートフォンでも最適な表示が可能です。

### モバイル最適化
- カードレイアウトは自動的に縦並び
- KPIグリッドは1列表示
- CTAボタンは全幅表示
- 画像は自動リサイズ

---

## 💡 営業活用のコツ

1. **業種を明確に伝える**: 見出しに「{{ 業種 }}の事例」を含める
2. **数値効果を強調**: KPIを最初に見せる
3. **リニューアル不要を訴求**: 心理的ハードルを下げる
4. **具体的なプラグイン名**: 技術的信頼性を示す
5. **CTA を明確に**: 次のアクションを分かりやすく

これらの事例を活用して、効果的な営業活動を展開してください！