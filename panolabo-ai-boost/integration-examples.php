<?php
/**
 * Panolabo AI Boost 統合例
 * 既存サイトでの活用方法
 */

// 直接アクセスを防ぐ
if (!defined('ABSPATH')) {
    exit;
}

?>

<!-- 1. サービスページでの事例表示例 -->
<section class="ai-case-studies uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-heading-line uk-text-center uk-text-bold">
            <span>業種別AI活用事例</span>
        </h2>
        <p class="uk-text-center uk-text-lead uk-margin-bottom">
            今のWordPressに"足すだけ"で実現する、未来の姿をご覧ください
        </p>
        
        <!-- 事例カード表示 -->
        <div class="uk-grid-match uk-child-width-1-3@m uk-margin-large-top" uk-grid>
            
            <!-- 飲食店事例 -->
            <div>
                <div class="uk-card uk-card-default uk-card-hover">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title">飲食店の自動化</h3>
                        <span class="uk-label uk-label-warning">SNS自動投稿</span>
                    </div>
                    <div class="uk-card-body">
                        <?php echo do_shortcode('[future_case id="1" layout="card"]'); ?>
                    </div>
                </div>
            </div>
            
            <!-- 美容室事例 -->
            <div>
                <div class="uk-card uk-card-default uk-card-hover">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title">美容室のコンテンツ自動化</h3>
                        <span class="uk-label uk-label-primary">AI加筆 + SNS</span>
                    </div>
                    <div class="uk-card-body">
                        <?php echo do_shortcode('[future_case id="2" layout="card"]'); ?>
                    </div>
                </div>
            </div>
            
            <!-- 製造業事例 -->
            <div>
                <div class="uk-card uk-card-default uk-card-hover">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title">製造業の効率化</h3>
                        <span class="uk-label uk-label-success">Chat2Doc</span>
                    </div>
                    <div class="uk-card-body">
                        <?php echo do_shortcode('[future_case id="3" layout="card"]'); ?>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- 追加事例リンク -->
        <div class="uk-text-center uk-margin-large-top">
            <a href="<?php echo get_post_type_archive_link('future_case'); ?>" 
               class="uk-button uk-button-primary uk-button-large">
                すべての事例を見る（<?php echo wp_count_posts('future_case')->publish; ?>件）
            </a>
        </div>
    </div>
</section>

<!-- 2. フロントページでの簡易表示例 -->
<section class="quick-ai-demo uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-grid-large uk-flex-middle" uk-grid>
            <div class="uk-width-1-2@m">
                <h2 class="uk-heading-medium">
                    あなたの業種でも、<br>
                    <span class="uk-text-primary">AIで劇的に変わります</span>
                </h2>
                <p class="uk-text-lead">
                    リニューアル不要。今のWordPressに<br>
                    プラグインを"足すだけ"で効果を実感。
                </p>
                
                <!-- 業種別フィルタボタン -->
                <div class="uk-margin-top">
                    <div class="uk-button-group">
                        <button class="uk-button uk-button-default" onclick="showCase('restaurant')">飲食店</button>
                        <button class="uk-button uk-button-default" onclick="showCase('beauty')">美容室</button>
                        <button class="uk-button uk-button-default" onclick="showCase('manufacturing')">製造業</button>
                        <button class="uk-button uk-button-default" onclick="showCase('realestate')">不動産</button>
                    </div>
                </div>
            </div>
            
            <div class="uk-width-1-2@m">
                <!-- 事例表示エリア -->
                <div id="case-display">
                    <?php echo do_shortcode('[future_case id="1" layout="card"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. 営業メール用テンプレート -->
<div style="display: none;" id="email-template">
    <h3>御社と同業種での成功事例をご紹介</h3>
    
    <p>{{ client_name }} 様</p>
    
    <p>いつもお世話になっております。<br>
    Panolabo の沼です。</p>
    
    <p>{{ industry }}業界でのAI活用事例をご紹介させていただきます。<br>
    御社と同じ業種で、以下のような効果を実現されています：</p>
    
    <ul>
        <li>{{ kpi_1 }}</li>
        <li>{{ kpi_2 }}</li>
        <li>{{ kpi_3 }}</li>
    </ul>
    
    <p><strong>重要なのは「リニューアル不要」という点です。</strong><br>
    今のWordPressサイトに、プラグインを"足すだけ"で効果を実感いただけます。</p>
    
    <p>詳細事例：<br>
    → https://panolabollc.com/future-case/{{ case_slug }}/</p>
    
    <p>{{ client_name }}様でも同様の効果が期待できます。<br>
    まずは無料相談からいかがでしょうか？</p>
    
    <p>お忙しい中恐縮ですが、ご検討のほどよろしくお願いいたします。</p>
</div>

<!-- JavaScript for interactive demo -->
<script>
const caseData = {
    restaurant: {
        id: 1,
        title: 'イタリアンレストラン事例',
        effect: '予約率35%向上'
    },
    beauty: {
        id: 2,
        title: '美容室自動化事例',
        effect: '新規客40%増加'
    },
    manufacturing: {
        id: 3,
        title: '製造業効率化事例',
        effect: '議事録作成75%短縮'
    },
    realestate: {
        id: 4,
        title: '不動産紹介自動化',
        effect: '問い合わせ60%向上'
    }
};

function showCase(industry) {
    const caseInfo = caseData[industry];
    if (caseInfo) {
        // 事例を動的に表示する処理
        document.getElementById('case-display').innerHTML = 
            '[future_case id="' + caseInfo.id + '" layout="card"]を表示';
        
        // ボタンのアクティブ状態更新
        document.querySelectorAll('.uk-button-group .uk-button').forEach(btn => {
            btn.classList.remove('uk-button-primary');
            btn.classList.add('uk-button-default');
        });
        event.target.classList.remove('uk-button-default');
        event.target.classList.add('uk-button-primary');
    }
}

// Analytics tracking
function trackCaseView(caseId, industry) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'case_study_view', {
            'case_id': caseId,
            'industry': industry,
            'event_category': 'AI Cases',
            'event_label': industry + '_case_' + caseId
        });
    }
}
</script>

<!-- CSS for styling -->
<style>
.ai-case-studies .uk-card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-bottom: 1px solid #dee2e6;
}

.quick-ai-demo {
    background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%);
    color: white;
}

.quick-ai-demo .uk-heading-medium {
    color: white;
}

.quick-ai-demo .uk-text-primary {
    color: #FFC857 !important;
}

#case-display {
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* 業種別ボタンのホバー効果 */
.uk-button-group .uk-button:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

/* 事例カードのアニメーション */
.uk-card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}
</style>

<?php
/**
 * 使用方法:
 * 
 * 1. page-services.php にコピペして使用
 * 2. front-page.php の適切な場所に挿入
 * 3. カスタム投稿タイプの事例IDを実際の値に変更
 * 4. デザインを既存テーマに合わせて調整
 */
?>