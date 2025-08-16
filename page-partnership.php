<?php
/*
Template Name: パートナーシップ
*/
get_header();
?>

<section id="partnership" class="uk-section uk-section-default uk-padding-large">
  <div class="uk-container">

    <!-- ヒーロー見出し -->
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line uk-text-primary uk-text-bold"><span>一緒にビジネスを加速しませんか？</span></h2>
      <p class="uk-text-lead">
        自社ブランドでの展開、新しい収益源の確保、地域連携プロジェクトまで──<br class="uk-visible@m">
        Panolaboは、あなたの“営業力・構想力・ネットワーク”を収益に変える仕組みを提供します。
      </p>
    </div>

    <!-- パートナー制度の魅力 -->
    <div class="uk-text-center uk-margin-large-bottom">
      <h3 class="uk-text-bold uk-text-primary">なぜ今「パートナー制度」が選ばれるのか？</h3>
      <p>
        「360°VR × アプリ × Web制作」の統合パッケージは、今や多くの業種で引き合いの多い成長分野です。<br>
        Panolaboのパートナー制度では、<strong>“営業に専念できる仕組み”</strong>と、<strong>“継続的な収益設計”</strong>を組み合わせ、<br>
        「売りやすい × 続けやすい」モデルを構築。導入企業様・パートナー様のどちらにも利益を生み出します。
      </p>
    </div>

    <!-- 3種のパートナー制度 -->
    <div class="uk-grid-match uk-child-width-1-3@m uk-text-center uk-margin-large-bottom" uk-grid>
      
      <!-- 営業パートナー -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <h3 class="uk-h4 uk-text-bold uk-card-title uk-text-primary">営業・販売パートナー<br>（紹介型）</h3>
          <p>
            提案だけで収益化可能。<br>
            制作・納品はPanolaboがすべて担当。
          </p>
          <ul class="uk-list uk-list-divider uk-text-left uk-text-small">
            <li><strong>初期費用：</strong> 無料（審査制）</li>
            <li><strong>報酬：</strong> 成約金額の20〜40%</li>
            <li><strong>支援内容：</strong> 提案資料・プレゼン同席・受注後サポート</li>
            <li><strong>成果目安：</strong> 月1件〜OK。副業でも可能</li>
          </ul>
        </div>
      </div>

      <!-- OEM/ODMパートナー -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <h3 class="uk-text-bold uk-card-title uk-text-primary">OEM / ODM パートナー<br>（再販／受託型）</h3>
          <p>
            自社ブランドで販売したい方に。<br>
            価格・営業方針はすべてお任せします。
          </p>
          <ul class="uk-list uk-list-divider uk-text-left uk-text-small">
            <li><strong>初期費用：</strong> 150万円〜（分割可能）</li>
            <li><strong>販売価格：</strong> 自由設定可／継続課金にも対応</li>
            <li><strong>権利形態：</strong> 自社ブランド名で展開</li>
            <li><strong>保守運用：</strong> 自社 or 弊社代行選択可</li>
          </ul>
        </div>
      </div>

      <!-- 地域・行政パートナー -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <h3 class="uk-text-bold uk-card-title uk-text-primary">地域・行政プロジェクト<br>（共同提案型）</h3>
          <p>
            自治体・大学・観光団体との提案・申請・実装まで。<br>
            プロジェクト単位での連携も大歓迎。
          </p>
          <ul class="uk-list uk-list-divider uk-text-left uk-text-small">
            <li><strong>対象：</strong> 自治体・観光協会・大学 等</li>
            <li><strong>連携：</strong> 地域活性 / 観光PR / 教育ICT 等</li>
            <li><strong>支援：</strong> 提案書作成・助成金申請サポート</li>
            <li><strong>実績：</strong> 国交省/文科省/観光庁 実績あり</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- ステップ -->
    <div class="uk-margin-large-top uk-text-center">
      <h3 class="uk-text-bold uk-text-primary">導入までの流れ</h3>
      <div class="uk-child-width-1-4@m uk-grid-small uk-grid-match uk-margin-top" uk-grid>
        <div><div class="uk-card uk-card-primary uk-card-body"><strong>STEP1</strong><br>お問い合わせ</div></div>
        <div><div class="uk-card uk-card-primary uk-card-body"><strong>STEP2</strong><br>制度のご案内・個別相談</div></div>
        <div><div class="uk-card uk-card-primary uk-card-body"><strong>STEP3</strong><br>契約・サポート開始</div></div>
        <div><div class="uk-card uk-card-primary uk-card-body"><strong>STEP4</strong><br>営業活動・収益化</div></div>
      </div>
    </div>

    <!-- CTA -->
    <div class="uk-text-center uk-margin-large-top uk-animation-fade">
      <a href="<?php echo esc_url(home_url('/contact')); ?>"
         class="uk-button uk-button-text"
         uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
         パートナー制度について個別相談する
      </a>
    </div>

  </div>
</section>

<?php get_footer(); ?>
