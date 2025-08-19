<?php
/**
 * Template Name: Products - AI Boost購入ページ
 * Description: Panolabo AI Boost販売ページ
 */
get_header(); ?>

<main class="uk-section">
  
  <!-- 購入ページヒーロー -->
  <section class="uk-section uk-background-cover uk-background-center-center" style="background: linear-gradient(135deg, #4CAF50 0%, #42A5F5 100%);">
    <div class="uk-container">
      <div class="uk-text-center uk-text-white">
        <div class="uk-margin-bottom">
          <span uk-icon="icon: future; ratio: 3" class="uk-text-warning"></span>
        </div>
        <h1 class="uk-heading-primary uk-text-bold">
          Panolabo AI Boost を購入
        </h1>
        <p class="uk-text-lead">
          営業成約率3倍向上を今すぐ体験
        </p>
      </div>
    </div>
  </section>

  <!-- 購入プラン選択 -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      
      <!-- プラン比較表 -->
      <div class="uk-overflow-auto uk-margin-large">
        <table class="uk-table uk-table-striped uk-table-hover">
          <thead>
            <tr>
              <th>機能</th>
              <th class="uk-text-center">無料プラン<br><span class="uk-text-bold uk-text-large">¥0/月</span></th>
              <th class="uk-text-center uk-background-primary uk-text-white">プレミアム<br><span class="uk-text-bold uk-text-large">¥980/月</span></th>
              <th class="uk-text-center">エンタープライズ<br><span class="uk-text-bold uk-text-large">¥4,980/月</span></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>事例表示数</strong></td>
              <td class="uk-text-center">3件まで</td>
              <td class="uk-text-center uk-background-muted">無制限</td>
              <td class="uk-text-center">無制限</td>
            </tr>
            <tr>
              <td><strong>レイアウト</strong></td>
              <td class="uk-text-center">カードのみ</td>
              <td class="uk-text-center uk-background-muted">フル・カード</td>
              <td class="uk-text-center">フル・カード</td>
            </tr>
            <tr>
              <td><strong>事例データ追加</strong></td>
              <td class="uk-text-center">✗</td>
              <td class="uk-text-center uk-background-muted">✓</td>
              <td class="uk-text-center">✓</td>
            </tr>
            <tr>
              <td><strong>営業効果レポート</strong></td>
              <td class="uk-text-center">✗</td>
              <td class="uk-text-center uk-background-muted">✓</td>
              <td class="uk-text-center">✓</td>
            </tr>
            <tr>
              <td><strong>複数サイト利用</strong></td>
              <td class="uk-text-center">✗</td>
              <td class="uk-text-center uk-background-muted">✗</td>
              <td class="uk-text-center">✓</td>
            </tr>
            <tr>
              <td><strong>API連携</strong></td>
              <td class="uk-text-center">✗</td>
              <td class="uk-text-center uk-background-muted">✗</td>
              <td class="uk-text-center">✓</td>
            </tr>
            <tr>
              <td><strong>サポート</strong></td>
              <td class="uk-text-center">コミュニティ</td>
              <td class="uk-text-center uk-background-muted">優先サポート</td>
              <td class="uk-text-center">専任サポート</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- 購入ボタン -->
      <div class="uk-grid-large uk-child-width-1-3@m uk-text-center uk-margin-large-top" uk-grid>
        
        <!-- 無料プラン -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <h3 class="uk-text-bold">無料プラン</h3>
            <div class="uk-text-bold uk-text-large uk-margin">¥0<small>/月</small></div>
            <p>まずは無料で試してみる</p>
            <form action="https://www.panolabollc.com/products/" method="post" class="uk-margin-top">
              <input type="hidden" name="product_id" value="ai_boost_free">
              <input type="hidden" name="price" value="0">
              <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-1-1">
                <span uk-icon="icon: download" class="uk-margin-small-right"></span>
                無料ダウンロード
              </button>
            </form>
          </div>
        </div>

        <!-- プレミアムプラン -->
        <div>
          <div class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-box-shadow-large">
            <div class="uk-label uk-label-warning uk-position-top-right uk-margin-small-top uk-margin-small-right">おすすめ</div>
            <h3 class="uk-text-bold uk-text-white">プレミアムプラン</h3>
            <div class="uk-text-bold uk-text-large uk-margin uk-text-white">¥980<small>/月</small></div>
            <p class="uk-text-white">営業で本格活用するなら</p>
            <form action="https://www.panolabollc.com/products/" method="post" class="uk-margin-top">
              <input type="hidden" name="product_id" value="ai_boost_premium">
              <input type="hidden" name="price" value="980">
              <input type="hidden" name="billing_cycle" value="monthly">
              <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-1-1">
                <span uk-icon="icon: credit-card" class="uk-margin-small-right"></span>
                今すぐ購入
              </button>
            </form>
          </div>
        </div>

        <!-- エンタープライズ -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <h3 class="uk-text-bold">エンタープライズ</h3>
            <div class="uk-text-bold uk-text-large uk-margin">¥4,980<small>/月</small></div>
            <p>チーム・法人でのご利用</p>
            <form action="https://www.panolabollc.com/products/" method="post" class="uk-margin-top">
              <input type="hidden" name="product_id" value="ai_boost_enterprise">
              <input type="hidden" name="price" value="4980">
              <input type="hidden" name="billing_cycle" value="monthly">
              <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-1-1">
                <span uk-icon="icon: users" class="uk-margin-small-right"></span>
                相談する
              </button>
            </form>
          </div>
        </div>

      </div>

      <!-- 購入の流れ -->
      <div class="uk-margin-large-top">
        <h3 class="uk-text-center uk-text-bold uk-margin-bottom">ご購入の流れ</h3>
        <div class="uk-grid-small uk-child-width-1-4@m uk-text-center" uk-grid>
          <div>
            <span uk-icon="icon: credit-card; ratio: 2" class="uk-text-primary uk-margin-bottom"></span>
            <h4 class="uk-text-bold">1. プラン選択</h4>
            <p class="uk-text-small">上記から適切なプランを選択</p>
          </div>
          <div>
            <span uk-icon="icon: lock; ratio: 2" class="uk-text-primary uk-margin-bottom"></span>
            <h4 class="uk-text-bold">2. 決済情報入力</h4>
            <p class="uk-text-small">安全な決済フォームで情報入力</p>
          </div>
          <div>
            <span uk-icon="icon: mail; ratio: 2" class="uk-text-primary uk-margin-bottom"></span>
            <h4 class="uk-text-bold">3. ライセンス発行</h4>
            <p class="uk-text-small">メールでライセンスキーをお送り</p>
          </div>
          <div>
            <span uk-icon="icon: download; ratio: 2" class="uk-text-primary uk-margin-bottom"></span>
            <h4 class="uk-text-bold">4. プラグイン導入</h4>
            <p class="uk-text-small">WordPressにインストールして利用開始</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- よくある質問 -->
  <section class="uk-section uk-section-muted">
    <div class="uk-container">
      <h2 class="uk-text-center uk-text-bold uk-margin-large-bottom">
        <span uk-icon="icon: question" class="uk-margin-small-right"></span>
        よくある質問
      </h2>
      
      <div uk-accordion>
        <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
          <a class="uk-accordion-title uk-text-bold" href="#">Q. 無料プランと有料プランの違いは？</a>
          <div class="uk-accordion-content">
            <p>無料プランは基本機能（3件の事例表示、カードレイアウトのみ）をお試しいただけます。有料プランでは無制限の事例表示、フルレイアウト、営業効果レポートなど本格的な営業支援機能をご利用いただけます。</p>
          </div>
        </div>
        
        <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
          <a class="uk-accordion-title uk-text-bold" href="#">Q. 設置は難しくないですか？</a>
          <div class="uk-accordion-content">
            <p>一般的なWordPressプラグインと同様の手順です。ZIPファイルをアップロードして有効化するだけで利用開始できます。詳細な設置ガイドも付属しています。</p>
          </div>
        </div>
        
        <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
          <a class="uk-accordion-title uk-text-bold" href="#">Q. 途中でプランを変更できますか？</a>
          <div class="uk-accordion-content">
            <p>はい。いつでもプランのアップグレード・ダウングレードが可能です。料金は日割り計算で調整いたします。</p>
          </div>
        </div>
        
        <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
          <a class="uk-accordion-title uk-text-bold" href="#">Q. 返金保証はありますか？</a>
          <div class="uk-accordion-content">
            <p>30日間の返金保証をご用意しています。ご満足いただけない場合は、購入から30日以内にご連絡ください。</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- セキュリティ・サポート -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
        
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <span uk-icon="icon: lock; ratio: 3" class="uk-text-primary uk-margin-bottom"></span>
            <h3 class="uk-text-bold">安全な決済システム</h3>
            <p>SSL暗号化通信により、お客様の決済情報は完全に保護されています。クレジットカード情報は当社で保存いたしません。</p>
          </div>
        </div>
        
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <span uk-icon="icon: support; ratio: 3" class="uk-text-primary uk-margin-bottom"></span>
            <h3 class="uk-text-bold">充実のサポート</h3>
            <p>導入から活用まで、専門スタッフがしっかりサポート。プレミアム版以上では優先サポートをご利用いただけます。</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 最終CTA -->
  <section class="uk-section uk-section-primary">
    <div class="uk-container">
      <div class="uk-text-center uk-text-white">
        <h2 class="uk-heading-medium uk-text-bold uk-margin-bottom">
          営業成果を今すぐ体験
        </h2>
        <p class="uk-text-lead uk-margin-bottom">
          まずは無料プランから始めてみませんか？
        </p>
        <div class="uk-margin-top">
          <a href="#" class="uk-button uk-button-primary uk-button-small uk-margin-right">
            <span uk-icon="icon: download" class="uk-margin-small-right"></span>
            無料で始める
          </a>
          <a href="/panolabo-ai-boost/" class="uk-button uk-button-primary uk-button-small">
            <span uk-icon="icon: info" class="uk-margin-small-right"></span>
            詳細を見る
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>