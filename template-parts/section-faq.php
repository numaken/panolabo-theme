<section id="faq" class="uk-section ">
  <div class="uk-container">

    <!-- タイトル -->
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line  uk-text-bold">
        <span>よくある質問（FAQ）</span>
      </h2>
      <p class="uk-text-lead">
        よくいただくご質問にお答えします。<br class="uk-visible@s">
        不安や疑問を解消して、安心してスタートしていただけるように。
      </p>
    </div>

    <!-- アコーディオン -->
    <ul uk-accordion="multiple: true">

      <?php
      $faq_list = [
        [
          'q' => 'ITやプログラミングの知識が必要ですか？',
          'a' => 'いいえ、必要ありません。制作や更新はすべて弊社で対応します。販売や顧客対応に集中いただける体制です。'
        ],
        [
          'q' => 'パートナーになるには費用がかかりますか？',
          'a' => '基本的に初期費用は無料です。ご契約後、案件ごとに制作費が発生する形なのでリスクなく始められます。'
        ],
        [
          'q' => 'OEMとはどういう意味ですか？',
          'a' => 'OEMとは、弊社のプロダクトを御社ブランド名で提供できる仕組みです。ブランド構築に役立ちます。'
        ],
        [
          'q' => 'どんな業種でも導入できますか？',
          'a' => 'はい、飲食・美容・不動産・医療・教育・観光など、幅広い業種での導入実績があります。'
        ],
        [
          'q' => '契約後のサポート内容を教えてください。',
          'a' => '公開後もアプリ更新、アクセス解析、販促支援、VR撮影など継続的に支援します。長期的な伴走支援が強みです。'
        ],
      ];

      foreach ($faq_list as $faq) : ?>
        <li class=" uk-padding-small uk-margin-small-bottom uk-card uk-card-default uk-card-body">
          <a class="uk-accordion-title uk-text-bold" href="#">
            Q：<?= esc_html($faq['q']) ?>
          </a>
          <div class="uk-accordion-content">
            <p>A：<?= esc_html($faq['a']) ?></p>
          </div>
        </li>
      <?php endforeach; ?>

    </ul>

    <!-- CTA -->
    <div class="uk-text-center uk-margin-large-top uk-animation-fade">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>"
         class="uk-button uk-button-text"
         uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
         他の質問もしてみる
      </a>
    </div>

  </div>
</section>
