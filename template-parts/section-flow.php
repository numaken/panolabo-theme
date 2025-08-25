<section id="flow" class="uk-section ">
  <div class="uk-container">

    <!-- タイトル -->
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line  uk-text-bold">
        <span>「シンプルで分かりやすい、導入までの5ステップ」</span>
      </h2>
      <p class="uk-text-lead">
        はじめての方でもご安心ください。<br class="uk-visible@s">
        お問い合わせからスタートし、ご契約・公開・運用まで丁寧にサポートします。
      </p>
    </div>

    <!-- ステップ -->
    <div class="uk-grid-match uk-child-width-1-5@m uk-grid-small uk-flex-center" uk-grid>
      <?php
      $steps = [
        ['title' => 'お問い合わせ', 'desc' => 'まずはお気軽にご相談ください。'],
        ['title' => 'ヒアリング', 'desc' => '事業内容やご要望を丁寧に伺います。'],
        ['title' => 'ご提案・契約', 'desc' => '収益設計を含めた最適プランをご提案。'],
        ['title' => '制作開始', 'desc' => 'デモ制作や調整を行いながらスピーディに開発。'],
        ['title' => '公開・運用', 'desc' => '公開後も運用・集客まで伴走します。'],
      ];

      foreach ($steps as $i => $step) :
        $step_num = $i + 1;
      ?>
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-text-center uk-transition-toggle">
            <div class="uk-flex uk-flex-center uk-margin-bottom">
              <div class="uk-border-circle  uk-text-white uk-flex uk-flex-middle uk-flex-center uk-transition-scale-up"
                   style="width: 60px; height: 60px; font-weight: bold; font-size: 18px;">
                STEP<?= $step_num ?>
              </div>
            </div>
            <h4 class="uk-text-bold "><?= esc_html($step['title']) ?></h4>
            <p class="uk-text-small"><?= esc_html($step['desc']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- CTAボタン -->
    <div class="uk-text-center uk-margin-large-top uk-animation-fade">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>"
         class="uk-button uk-button-text"
         uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
         一緒に相談してみる
      </a>
    </div>

  </div>
</section>
