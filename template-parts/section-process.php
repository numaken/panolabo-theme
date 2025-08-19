<!-- ================================
      契約までのフロー Section
=================================== -->
<section id="process" class="uk-section ">
  <div class="uk-container">
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line  uk-text-bold">
        <span>契約までのフロー</span>
      </h2>
      <p>パートナーとしてご契約いただくまでの<br>大まかな流れを5ステップでご紹介します。</p>
    </div>

    <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid>
      <!-- ステップカード -->
      <?php
      $steps = [
        [
          'title' => 'お問い合わせ / ご相談',
          'desc' => '電話・メール・フォームなどからお問い合わせください。概要をご案内いたします。',
        ],
        [
          'title' => 'ヒアリング・ご提案',
          'desc' => 'オンラインや対面で詳しい打ち合わせを行い、御社に最適な提案をいたします。',
        ],
        [
          'title' => 'パートナー契約 / プラン決定',
          'desc' => '内容・料金・分配モデルにご納得いただいた上で契約を締結します。',
        ],
        [
          'title' => '商品・サービス設計 / 制作',
          'desc' => '必要に応じてデモを制作し、ブランドに合わせたデザインや機能をカスタマイズします。',
        ],
        [
          'title' => 'リリース・アフターフォロー',
          'desc' => 'サービスを公開し、継続的な運用支援やコンテンツ更新もサポートします。',
        ],
      ];
      foreach ($steps as $index => $step) :
      ?>
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-hover-large">
          <div class="uk-flex uk-flex-middle">
            <img src="https://placehold.jp/69ba64/ffffff/60x60.png?text=STEP<?php echo $index + 1; ?>" alt="STEP<?php echo $index + 1; ?>" class="uk-margin-right">
            <div>
              <h4 class="uk-text-bold "><?php echo $step['title']; ?></h4>
              <p class="uk-margin-remove-top"><?php echo $step['desc']; ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
