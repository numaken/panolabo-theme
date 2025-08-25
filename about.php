<?php get_header(); ?>

<!-- About Us Section -->
<section class="uk-section ">
    <div class="uk-container">
        <h2 class="uk-heading-line"><span>会社情報</span></h2>
        <p>私たちは、テクノロジーとクリエイティビティを融合させ、未来の顧客体験を創造します。ビジネスパートナーとして、共に成長し、社会に貢献することを目指しています。</p>
        <img src="<?php bloginfo('template_directory'); ?>/images/company.jpg" alt="Company" class="uk-width-1-1 uk-margin-top">
        
        <h3 class="uk-heading-bullet">企業理念</h3>
        <p>顧客満足と社会貢献を柱とした企業理念を掲げています。</p>

        <h3 class="uk-heading-bullet">ビジョン</h3>
        <p>テクノロジーの力を活用し、社会に新しい価値を提供することで、持続可能な未来を築いていきます。</p>
        
        <a href="<?php echo home_url('/contact/'); ?>" class="uk-button uk-button-text">お問い合わせ</a>
    </div>
</section>

<?php get_footer(); ?>
