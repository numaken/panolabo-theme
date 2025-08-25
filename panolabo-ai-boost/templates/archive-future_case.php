<?php
/**
 * Archive Future Case Template
 */

get_header(); ?>

<div class="pab-archive-future-case">
    
    <header class="pab-archive-header">
        <h1 class="pab-archive-title"><?php _e('AI活用提案型事例集', 'panolabo-ai-boost'); ?></h1>
        <p class="pab-archive-description">
            <?php _e('WordPressにAIプラグインを"足すだけ"で実現する未来の姿を、業種別事例でご紹介します。', 'panolabo-ai-boost'); ?>
        </p>
    </header>
    
    <!-- Filters -->
    <div class="pab-archive-filters">
        <h3 class="pab-filter-title"><?php _e('AIプラグインで絞り込み', 'panolabo-ai-boost'); ?></h3>
        <div class="pab-filter-buttons">
            <a href="<?php echo get_post_type_archive_link('future_case'); ?>" 
               class="pab-filter-btn" data-filter="all">
                <?php _e('すべて', 'panolabo-ai-boost'); ?>
            </a>
            <a href="<?php echo add_query_arg('ai', 'ai_writer', get_post_type_archive_link('future_case')); ?>" 
               class="pab-filter-btn" data-filter="ai_writer">
                <?php _e('AI加筆', 'panolabo-ai-boost'); ?>
            </a>
            <a href="<?php echo add_query_arg('ai', 'sns_auto', get_post_type_archive_link('future_case')); ?>" 
               class="pab-filter-btn" data-filter="sns_auto">
                <?php _e('SNS自動投稿', 'panolabo-ai-boost'); ?>
            </a>
            <a href="<?php echo add_query_arg('ai', 'chat2doc', get_post_type_archive_link('future_case')); ?>" 
               class="pab-filter-btn" data-filter="chat2doc">
                <?php _e('Chat2Doc', 'panolabo-ai-boost'); ?>
            </a>
        </div>
    </div>
    
    <?php if (have_posts()) : ?>
        
        <div class="pab-cases-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php echo do_shortcode('[future_case id="' . get_the_ID() . '" layout="card"]'); ?>
            <?php endwhile; ?>
        </div>
        
        <!-- Pagination -->
        <nav class="pab-pagination" aria-label="<?php _e('事例ページネーション', 'panolabo-ai-boost'); ?>">
            <?php
            echo paginate_links(array(
                'prev_text' => '« ' . __('前へ', 'panolabo-ai-boost'),
                'next_text' => __('次へ', 'panolabo-ai-boost') . ' »',
                'type' => 'list',
                'class' => 'pab-page-numbers'
            ));
            ?>
        </nav>
        
    <?php else : ?>
        
        <div class="pab-no-cases">
            <h2><?php _e('事例が見つかりませんでした', 'panolabo-ai-boost'); ?></h2>
            <p><?php _e('指定された条件に一致する事例がありません。', 'panolabo-ai-boost'); ?></p>
            <a href="<?php echo get_post_type_archive_link('future_case'); ?>" class="pab-btn pab-btn-primary">
                <?php _e('すべての事例を見る', 'panolabo-ai-boost'); ?>
            </a>
        </div>
        
    <?php endif; ?>
    
    <!-- CTA Section -->
    <section class="pab-archive-cta">
        <div class="pab-cta-content">
            <h2><?php _e('あなたの業種でも、AIで進化できます', 'panolabo-ai-boost'); ?></h2>
            <p><?php _e('掲載されていない業種でも、AIプラグインの効果を最大化するご提案が可能です。', 'panolabo-ai-boost'); ?></p>
            <div class="pab-cta-buttons">
                <a href="<?php echo home_url('/contact/'); ?>" class="pab-btn pab-btn-primary">
                    <?php _e('無料相談を申し込む', 'panolabo-ai-boost'); ?>
                </a>
                <a href="<?php echo home_url('/services'); ?>" class="pab-btn pab-btn-secondary">
                    <?php _e('サービス詳細', 'panolabo-ai-boost'); ?>
                </a>
            </div>
        </div>
    </section>
    
</div>

<style>
.pab-archive-future-case {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.pab-archive-header {
    text-align: center;
    margin-bottom: 40px;
    padding: 40px 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 8px;
}

.pab-archive-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin: 0 0 15px 0;
    color: #2c3e50;
}

.pab-archive-description {
    font-size: 1.2rem;
    color: #6c757d;
    margin: 0;
    max-width: 600px;
    margin: 0 auto;
}

.pab-archive-filters {
    margin-bottom: 40px;
    padding: 25px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.pab-filter-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin: 0 0 20px 0;
    color: #2c3e50;
}

.pab-filter-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.pab-filter-btn {
    padding: 10px 20px;
    border: 2px solid #316B3F;
    border-radius: 25px;
    text-decoration: none;
    color: #316B3F;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pab-filter-btn:hover,
.pab-filter-btn.pab-filter-active {
    background: #316B3F;
    color: white;
}

.pab-cases-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.pab-pagination {
    text-align: center;
    margin: 50px 0;
}

.pab-pagination .page-numbers {
    display: inline-flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 10px;
}

.pab-pagination .page-numbers li {
    margin: 0;
}

.pab-pagination .page-numbers a,
.pab-pagination .page-numbers span {
    display: block;
    padding: 10px 15px;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    text-decoration: none;
    color: #316B3F;
    font-weight: 500;
}

.pab-pagination .page-numbers .current {
    background: #316B3F;
    color: white;
    border-color: #316B3F;
}

.pab-pagination .page-numbers a:hover {
    background: #f8f9fa;
}

.pab-no-cases {
    text-align: center;
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 8px;
}

.pab-no-cases h2 {
    color: #6c757d;
    margin-bottom: 15px;
}

.pab-archive-cta {
    margin-top: 60px;
    padding: 50px 30px;
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    color: white;
    border-radius: 8px;
    text-align: center;
}

.pab-archive-cta h2 {
    font-size: 1.8rem;
    margin: 0 0 15px 0;
}

.pab-archive-cta p {
    font-size: 1.1rem;
    margin: 0 0 30px 0;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .pab-archive-future-case {
        padding: 15px;
    }
    
    .pab-archive-header {
        padding: 30px 15px;
    }
    
    .pab-archive-title {
        font-size: 1.8rem;
    }
    
    .pab-archive-description {
        font-size: 1rem;
    }
    
    .pab-cases-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .pab-filter-buttons {
        justify-content: center;
    }
    
    .pab-archive-cta {
        padding: 30px 20px;
    }
    
    .pab-cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .pab-btn {
        width: 100%;
        max-width: 300px;
    }
}
</style>

<?php get_footer(); ?>