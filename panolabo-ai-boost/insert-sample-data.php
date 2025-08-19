<?php
/**
 * サンプル事例データ挿入スクリプト
 * WordPress管理画面の「ツール」→「インポート」→「カスタムフィールド」から実行
 */

// WordPressが読み込まれていることを確認
if (!function_exists('add_action')) {
    die('Direct access not allowed');
}

function pab_insert_sample_data() {
    
    // 1. 飲食店 × SNS自動投稿
    $post_1 = wp_insert_post(array(
        'post_title' => '都内イタリアンレストランの集客自動化事例',
        'post_excerpt' => 'SNS自動投稿で来店予約率35%向上、運営工数50%削減を実現',
        'post_status' => 'publish',
        'post_type' => 'future_case',
        'post_name' => 'italian-restaurant-sns-automation',
    ));
    
    if ($post_1) {
        update_post_meta($post_1, 'fc_client_name', 'トラットリア・ヴェルデ様');
        update_post_meta($post_1, 'fc_industry', '飲食店（イタリアン）');
        update_post_meta($post_1, 'fc_region', '東京都渋谷区');
        update_post_meta($post_1, 'fc_legacy_actions', 'オーナーが手動でInstagramとTwitterに週1-2回投稿。メニューの写真撮影、文章作成、投稿作業で毎回2時間程度の工数がかかっていました。また、投稿のタイミングが不規則で、フォロワーへのリーチが限定的でした。');
        update_post_meta($post_1, 'fc_future_with_ai', 'PostPilot Pro（SNS自動投稿プラグイン）を導入により、毎日決まった時間に魅力的な投稿を自動配信。AI生成による多様な文章表現で、フォロワーエンゲージメントが大幅向上。営業時間中の投稿頻度が週1回から毎日に増加し、ランチタイム・ディナータイムの予約率が35%向上しました。');
        update_post_meta($post_1, 'fc_kpis', array(
            array('name' => '予約率', 'value' => '+35%', 'note' => 'ランチ・ディナー合計'),
            array('name' => '投稿頻度', 'value' => '週1→毎日', 'note' => '自動投稿により実現'),
            array('name' => '運営工数', 'value' => '-50%', 'note' => 'SNS管理時間の削減'),
            array('name' => 'フォロワー増加', 'value' => '+80%', 'note' => '3ヶ月間での増加率')
        ));
        update_post_meta($post_1, 'fc_ai_plugins', array('sns_auto'));
        update_post_meta($post_1, 'fc_ai_plugins_other', '');
    }
    
    // 2. 美容室 × AI加筆 + SNS自動投稿
    $post_2 = wp_insert_post(array(
        'post_title' => '原宿美容室のブログ自動化＋SNS連携事例',
        'post_excerpt' => 'AI記事生成とSNS自動投稿で新規客獲得率40%向上',
        'post_status' => 'publish',
        'post_type' => 'future_case',
        'post_name' => 'beauty-salon-ai-content-automation',
    ));
    
    if ($post_2) {
        update_post_meta($post_2, 'fc_client_name', 'Hair Salon LUMINOUS様');
        update_post_meta($post_2, 'fc_industry', '美容室');
        update_post_meta($post_2, 'fc_region', '東京都渋谷区');
        update_post_meta($post_2, 'fc_legacy_actions', 'スタイリストが手動でブログ記事作成（月2-3記事）とSNS投稿を実施。記事作成に1記事あたり3時間、SNS投稿に週2時間の工数がかかり、本業のカット業務に集中できない状況でした。');
        update_post_meta($post_2, 'fc_future_with_ai', 'AI加筆プラグインでヘアケア記事を自動生成し、PostPilot ProでSNSにも自動配信。季節のヘアスタイル提案、ケア方法の解説など、専門性の高いコンテンツを週3回自動配信。検索エンジンからの流入とSNS経由の新規客獲得率が40%向上しました。');
        update_post_meta($post_2, 'fc_kpis', array(
            array('name' => '新規客獲得率', 'value' => '+40%', 'note' => 'Web経由の新規予約'),
            array('name' => 'ブログ更新頻度', 'value' => '月2→週3', 'note' => 'AI自動生成により実現'),
            array('name' => 'コンテンツ制作工数', 'value' => '-70%', 'note' => 'AI活用による効率化'),
            array('name' => 'SEO順位向上', 'value' => '平均15位UP', 'note' => '主要キーワードでの順位')
        ));
        update_post_meta($post_2, 'fc_ai_plugins', array('ai_writer', 'sns_auto'));
        update_post_meta($post_2, 'fc_ai_plugins_other', '');
    }
    
    // 3. 製造業 × Chat2Doc
    $post_3 = wp_insert_post(array(
        'post_title' => '精密機械メーカーの技術ナレッジ管理効率化',
        'post_excerpt' => 'Chat2Docで技術会議の議事録作成時間75%短縮',
        'post_status' => 'publish',
        'post_type' => 'future_case',
        'post_name' => 'manufacturing-chat2doc-efficiency',
    ));
    
    if ($post_3) {
        update_post_meta($post_3, 'fc_client_name', '株式会社プレシジョンテック様');
        update_post_meta($post_3, 'fc_industry', '製造業（精密機械）');
        update_post_meta($post_3, 'fc_region', '神奈川県相模原市');
        update_post_meta($post_3, 'fc_legacy_actions', '週次の技術会議で議事録作成に毎回2時間、過去の技術資料検索に1時間程度を要していました。重要な技術ノウハウが個人に依存し、チーム全体での知識共有が困難な状況でした。');
        update_post_meta($post_3, 'fc_future_with_ai', 'Chat2Docを導入し、会議の音声録音をAIが自動で構造化された技術文書に変換。過去の議事録や技術資料も検索可能な形式で蓄積され、ナレッジベースとして活用。新人エンジニアの技術習得期間も30%短縮されました。');
        update_post_meta($post_3, 'fc_kpis', array(
            array('name' => '議事録作成時間', 'value' => '-75%', 'note' => '2時間→30分に短縮'),
            array('name' => '技術資料検索時間', 'value' => '-60%', 'note' => 'AI検索機能により効率化'),
            array('name' => '新人教育期間', 'value' => '-30%', 'note' => 'ナレッジベース活用'),
            array('name' => 'ナレッジ蓄積量', 'value' => '3倍', 'note' => '構造化により検索性向上')
        ));
        update_post_meta($post_3, 'fc_ai_plugins', array('chat2doc'));
        update_post_meta($post_3, 'fc_ai_plugins_other', '');
    }
    
    // 4. 不動産 × AI加筆 + SNS自動投稿
    $post_4 = wp_insert_post(array(
        'post_title' => '地域密着型不動産会社の物件紹介自動化',
        'post_excerpt' => 'AI物件紹介記事とSNS連携で問い合わせ率60%向上',
        'post_status' => 'publish',
        'post_type' => 'future_case',
        'post_name' => 'real-estate-ai-property-promotion',
    ));
    
    if ($post_4) {
        update_post_meta($post_4, 'fc_client_name', '株式会社タウンエステート様');
        update_post_meta($post_4, 'fc_industry', '不動産仲介');
        update_post_meta($post_4, 'fc_region', '千葉県柏市');
        update_post_meta($post_4, 'fc_legacy_actions', '新着物件情報を手動でブログ記事作成（週1-2件）し、FacebookとTwitterに手動投稿。物件の魅力を伝える文章作成に1件あたり1時間、写真選定・投稿作業に30分を要していました。');
        update_post_meta($post_4, 'fc_future_with_ai', 'AI加筆プラグインで物件の特徴・周辺環境・おすすめポイントを自動生成し、PostPilot ProでSNSにも同時配信。SEOに強い物件紹介記事が毎日自動作成され、地域検索での上位表示を実現。Web経由の問い合わせ率が60%向上しました。');
        update_post_meta($post_4, 'fc_kpis', array(
            array('name' => 'Web問い合わせ率', 'value' => '+60%', 'note' => 'HP経由の問い合わせ数'),
            array('name' => '物件紹介記事数', 'value' => '週1→毎日', 'note' => 'AI自動生成により実現'),
            array('name' => '記事作成工数', 'value' => '-80%', 'note' => '1時間→12分に短縮'),
            array('name' => '地域検索順位', 'value' => '平均20位UP', 'note' => '「柏市 賃貸」等キーワード')
        ));
        update_post_meta($post_4, 'fc_ai_plugins', array('ai_writer', 'sns_auto'));
        update_post_meta($post_4, 'fc_ai_plugins_other', '');
    }
    
    // 5. 歯科医院 × SNS自動投稿
    $post_5 = wp_insert_post(array(
        'post_title' => '地域密着歯科医院の予防歯科啓発自動化',
        'post_excerpt' => 'SNS自動投稿で予防歯科の認知度向上、新患数30%増加',
        'post_status' => 'publish',
        'post_type' => 'future_case',
        'post_name' => 'dental-clinic-prevention-awareness',
    ));
    
    if ($post_5) {
        update_post_meta($post_5, 'fc_client_name', 'さくら歯科クリニック様');
        update_post_meta($post_5, 'fc_industry', '歯科医院');
        update_post_meta($post_5, 'fc_region', '埼玉県川口市');
        update_post_meta($post_5, 'fc_legacy_actions', '院長が月1-2回、予防歯科の重要性についてブログ更新とFacebook投稿。忙しい診療の合間での作業で継続が困難で、地域住民への予防意識啓発が不十分でした。');
        update_post_meta($post_5, 'fc_future_with_ai', 'PostPilot Proで予防歯科に関する啓発コンテンツを毎日自動配信。歯磨き方法、定期検診の重要性、季節の口腔ケア情報などを患者様に継続的に発信。地域での予防歯科認知度向上により、新患数が30%増加しました。');
        update_post_meta($post_5, 'fc_kpis', array(
            array('name' => '新患数', 'value' => '+30%', 'note' => '予防歯科希望の新患'),
            array('name' => '投稿頻度', 'value' => '月1→毎日', 'note' => '継続的な啓発活動'),
            array('name' => '定期検診率', 'value' => '+25%', 'note' => '既存患者の検診頻度'),
            array('name' => 'SNSエンゲージメント', 'value' => '5倍', 'note' => 'いいね・シェア数の増加')
        ));
        update_post_meta($post_5, 'fc_ai_plugins', array('sns_auto'));
        update_post_meta($post_5, 'fc_ai_plugins_other', '');
    }
    
    // 6. ECサイト × AI加筆
    $post_6 = wp_insert_post(array(
        'post_title' => '手作りアクセサリーECの商品紹介自動化',
        'post_excerpt' => 'AI商品説明文生成でSEO効果向上、売上45%増加',
        'post_status' => 'publish',
        'post_type' => 'future_case',
        'post_name' => 'handmade-ec-ai-product-description',
    ));
    
    if ($post_6) {
        update_post_meta($post_6, 'fc_client_name', 'Atelier Luna様');
        update_post_meta($post_6, 'fc_industry', 'ECサイト（ハンドメイド）');
        update_post_meta($post_6, 'fc_region', '大阪府大阪市');
        update_post_meta($post_6, 'fc_legacy_actions', '新商品登録時の商品説明文作成に1商品あたり30分、SEOを意識したブログ記事作成に2時間を要していました。商品数が増えるほど説明文作成が追いつかず、SEO効果も限定的でした。');
        update_post_meta($post_6, 'fc_future_with_ai', 'AI加筆プラグインで商品の特徴、使用シーン、お手入れ方法などを自動生成。SEOに最適化された商品説明とブログ記事を自動作成し、検索エンジンからの流入が大幅増加。売上が45%向上しました。');
        update_post_meta($post_6, 'fc_kpis', array(
            array('name' => '売上', 'value' => '+45%', 'note' => 'EC全体の売上向上'),
            array('name' => '商品説明作成時間', 'value' => '-85%', 'note' => '30分→4分に短縮'),
            array('name' => '検索流入', 'value' => '+120%', 'note' => 'Google検索からの訪問'),
            array('name' => 'コンバージョン率', 'value' => '+20%', 'note' => '魅力的な説明文効果')
        ));
        update_post_meta($post_6, 'fc_ai_plugins', array('ai_writer'));
        update_post_meta($post_6, 'fc_ai_plugins_other', '');
    }
    
    return "6件のサンプル事例を正常に挿入しました。";
}

// 管理画面から実行する場合
if (is_admin() && current_user_can('manage_options')) {
    add_action('admin_init', function() {
        if (isset($_GET['pab_insert_sample']) && $_GET['pab_insert_sample'] === 'true') {
            $result = pab_insert_sample_data();
            wp_die($result . '<br><a href="' . admin_url('edit.php?post_type=future_case') . '">事例一覧を確認</a>');
        }
    });
    
    // 管理画面にリンクを追加
    add_action('admin_menu', function() {
        add_submenu_page(
            'edit.php?post_type=future_case',
            'サンプルデータ挿入',
            'サンプルデータ挿入',
            'manage_options',
            'pab-sample-data',
            function() {
                echo '<div class="wrap">';
                echo '<h1>サンプル事例データ挿入</h1>';
                echo '<p>6つの業種のサンプル事例を挿入します。</p>';
                echo '<a href="' . admin_url('edit.php?post_type=future_case&pab_insert_sample=true') . '" class="button button-primary">サンプルデータを挿入</a>';
                echo '</div>';
            }
        );
    });
}