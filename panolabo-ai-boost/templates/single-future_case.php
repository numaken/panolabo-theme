<?php
/**
 * Single Future Case Template
 */

get_header(); ?>

<div class="pab-single-future-case">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('pab-future-case-article'); ?>>
            
            <!-- Use shortcode to render the case -->
            <?php echo do_shortcode('[future_case id="' . get_the_ID() . '" layout="full"]'); ?>
            
            <!-- Post Content (if any additional content is added) -->
            <?php if (get_the_content()): ?>
                <div class="pab-additional-content">
                    <h3><?php _e('詳細情報', 'panolabo-ai-boost'); ?></h3>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Navigation -->
            <nav class="pab-post-navigation" aria-label="<?php _e('事例ナビゲーション', 'panolabo-ai-boost'); ?>">
                <div class="pab-nav-links">
                    <?php
                    $prev_post = get_previous_post(false, '', 'future_case');
                    $next_post = get_next_post(false, '', 'future_case');
                    ?>
                    
                    <?php if ($prev_post): ?>
                        <div class="pab-nav-previous">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" rel="prev">
                                <span class="pab-nav-label"><?php _e('前の事例', 'panolabo-ai-boost'); ?></span>
                                <span class="pab-nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($next_post): ?>
                        <div class="pab-nav-next">
                            <a href="<?php echo get_permalink($next_post->ID); ?>" rel="next">
                                <span class="pab-nav-label"><?php _e('次の事例', 'panolabo-ai-boost'); ?></span>
                                <span class="pab-nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="pab-back-to-archive">
                    <a href="<?php echo get_post_type_archive_link('future_case'); ?>" class="pab-btn pab-btn-secondary">
                        <?php _e('事例一覧に戻る', 'panolabo-ai-boost'); ?>
                    </a>
                </div>
            </nav>
            
        </article>
        
    <?php endwhile; ?>
    
</div>

<style>
.pab-single-future-case {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.pab-additional-content {
    margin: 40px 0;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 8px;
}

.pab-additional-content h3 {
    margin-top: 0;
    color: #2c3e50;
    border-bottom: 2px solid #316B3F;
    padding-bottom: 10px;
}

.pab-post-navigation {
    margin-top: 50px;
    padding-top: 30px;
    border-top: 2px solid #e9ecef;
}

.pab-nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 30px;
}

.pab-nav-previous,
.pab-nav-next {
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.pab-nav-previous:hover,
.pab-nav-next:hover {
    transform: translateY(-3px);
}

.pab-nav-previous a,
.pab-nav-next a {
    text-decoration: none;
    color: inherit;
    display: block;
}

.pab-nav-next {
    text-align: right;
}

.pab-nav-label {
    display: block;
    font-size: 0.9rem;
    color: #6c757d;
    margin-bottom: 8px;
    font-weight: 500;
}

.pab-nav-title {
    display: block;
    font-size: 1.1rem;
    font-weight: 700;
    color: #2c3e50;
}

.pab-back-to-archive {
    text-align: center;
}

@media (max-width: 768px) {
    .pab-single-future-case {
        padding: 15px;
    }
    
    .pab-nav-links {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .pab-nav-next {
        text-align: left;
    }
    
    .pab-nav-previous,
    .pab-nav-next {
        padding: 15px;
    }
}
</style>

<?php get_footer(); ?>