<?php get_header(); ?>

<!-- Partnership Section パートナーシップ詳細-->
<section class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-heading-line"><span>パートナーシップ</span></h2>
        <p>私たちは、ビジネスを共に進める信頼できるパートナーを探しています。提携することで、新たな営業機会を創出し、共に成長することが可能です。</p>
        <img src="<?php bloginfo('template_directory'); ?>/images/partnership.jpg" alt="Partnership" class="uk-width-1-1 uk-margin-top">
        
        <h3 class="uk-heading-bullet">提携のメリット</h3>
        <ul class="uk-list uk-list-bullet">
            <li>新たな営業機会の創出</li>
            <li>媒体価値の向上</li>
            <li>収益の増加</li>
        </ul>
        
        <h3 class="uk-heading-bullet">お問い合わせ</h3>
        <p>詳細については、お問い合わせフォームよりご連絡ください。</p>
        <a href="<?php echo home_url('/contact'); ?>" class="uk-button uk-button-text">お問い合わせ</a>
    </div>
</section>

<?php get_footer(); ?>
