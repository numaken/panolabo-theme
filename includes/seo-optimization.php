<?php
/**
 * SEO最適化機能
 * メタタグ、構造化データ、パフォーマンス最適化
 */

/**
 * 動的メタディスクリプション生成
 */
function generate_dynamic_meta_description($post_id = null) {
    if (is_front_page()) {
        return 'panolabo - AI技術で従来のVR・アプリ・Web制作をアップグレード。2,986件の実績を持つ合同会社panolaboの企業サイト。';
    }
    
    if (is_page('about')) {
        return '合同会社panolaboの会社概要・ミッション・代表者プロフィール。9年間で2,986件の制作実績を誇る技術力と信頼性をご紹介。';
    }
    
    if (is_page('services')) {
        return 'panolaboのサービス紹介 - VR/360°制作、アプリ開発、Web・HP制作、AI統合ソリューション。次世代技術で従来ビジネスを革新。';
    }
    
    if (is_page('portfolio-achievements')) {
        return 'panolabo実績紹介 - VR 1,666案件、アプリ開発 537案件、Web制作 783案件。合計2,986件の豊富な制作実績をご覧ください。';
    }
    
    if (is_page('team')) {
        return 'panolabo代表者・チーム紹介 - 技術スタック、開発フィロソフィー、品質管理体制。納期遵守率99.8%、セキュリティ事故0件の実績。';
    }
    
    // デフォルト
    if ($post_id) {
        $custom_desc = get_post_meta($post_id, 'my_description', true);
        if (!empty($custom_desc)) {
            return $custom_desc;
        }
    }
    
    return get_bloginfo('description');
}

/**
 * 動的キーワード生成
 */
function generate_dynamic_keywords() {
    $base_keywords = 'panolabo,パノラボ,VR制作,アプリ開発,Web制作,AI統合,360°撮影,合同会社';
    
    if (is_front_page()) {
        return $base_keywords . ',企業サイト,制作会社,技術力,実績';
    }
    
    if (is_page('about')) {
        return $base_keywords . ',会社概要,代表者,企業情報,会社紹介';
    }
    
    if (is_page('services')) {
        return $base_keywords . ',サービス,事業内容,次世代技術,ソリューション';
    }
    
    if (is_page('portfolio-achievements')) {
        return $base_keywords . ',実績,ポートフォリオ,制作事例,導入事例';
    }
    
    if (is_page('team')) {
        return $base_keywords . ',チーム,技術スタック,開発体制,品質管理';
    }
    
    return $base_keywords;
}

/**
 * 構造化データ生成（JSON-LD）
 */
function generate_structured_data() {
    $company_info = [
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => "合同会社panolabo",
        "legalName" => "合同会社panolabo",
        "url" => home_url(),
        "logo" => home_url('/img/panolabo_logo.png'),
        "description" => "AI技術を活用したVR・アプリ・Web制作会社。9年間で2,986件の豊富な実績。",
        "foundingDate" => "2015",
        "numberOfEmployees" => "1-10",
        "address" => [
            "@type" => "PostalAddress",
            "addressCountry" => "JP",
            "addressRegion" => "Japan"
        ],
        "contactPoint" => [
            "@type" => "ContactPoint",
            "telephone" => "+81-90-4749-5780",
            "contactType" => "customer service",
            "areaServed" => "JP",
            "availableLanguage" => ["Japanese", "English"]
        ],
        "sameAs" => [
            "https://www.instagram.com/sara_oncourt",
            "https://www.youtube.com/@panolabollc"
        ]
    ];
    
    // サービス情報を追加
    if (is_page('services')) {
        $company_info["hasOfferCatalog"] = [
            "@type" => "OfferCatalog",
            "name" => "panolabo Services",
            "itemListElement" => [
                [
                    "@type" => "Offer",
                    "itemOffered" => [
                        "@type" => "Service",
                        "name" => "VR/360° Content Creation",
                        "description" => "不動産、飲食店、美容室等のVR・360°コンテンツ制作"
                    ]
                ],
                [
                    "@type" => "Offer", 
                    "itemOffered" => [
                        "@type" => "Service",
                        "name" => "Mobile App Development",
                        "description" => "iOS・Android対応のモバイルアプリケーション開発"
                    ]
                ],
                [
                    "@type" => "Offer",
                    "itemOffered" => [
                        "@type" => "Service", 
                        "name" => "Web Development",
                        "description" => "WordPress・カスタム開発によるWebサイト制作"
                    ]
                ]
            ]
        ];
    }
    
    // 実績データを追加
    if (is_page('portfolio-achievements')) {
        $portfolio_stats = get_comprehensive_portfolio_stats();
        $company_info["makesOffer"] = [
            "@type" => "AggregateOffer",
            "description" => "制作実績統計",
            "offers" => [
                [
                    "@type" => "Offer",
                    "name" => "VR Content Projects",
                    "description" => $portfolio_stats['vr_projects'] . "件のVR制作実績"
                ],
                [
                    "@type" => "Offer", 
                    "name" => "Mobile App Projects",
                    "description" => $portfolio_stats['app_projects'] . "件のアプリ開発実績"
                ],
                [
                    "@type" => "Offer",
                    "name" => "Web Development Projects", 
                    "description" => $portfolio_stats['hp_projects'] . "件のWeb制作実績"
                ]
            ]
        ];
    }
    
    return json_encode($company_info, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

/**
 * パンくずリスト構造化データ
 */
function generate_breadcrumb_structured_data() {
    if (is_front_page()) return '';
    
    $breadcrumbs = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "ホーム",
                "item" => home_url()
            ]
        ]
    ];
    
    $position = 2;
    
    if (is_page()) {
        $page_title = get_the_title();
        $breadcrumbs["itemListElement"][] = [
            "@type" => "ListItem",
            "position" => $position,
            "name" => $page_title,
            "item" => get_permalink()
        ];
    }
    
    return json_encode($breadcrumbs, JSON_UNESCAPED_UNICODE);
}

/**
 * Open Graph最適化
 */
function enhanced_open_graph_tags() {
    global $post;
    
    $og_title = '';
    $og_description = '';
    $og_image = '';
    $og_type = 'website';
    
    if (is_front_page()) {
        $og_title = 'panolabo - AI技術で制作業界を革新';
        $og_description = generate_dynamic_meta_description();
        $og_image = home_url('/img/panolabo-og-image.jpg');
    } elseif (is_page()) {
        $og_title = get_the_title() . ' | panolabo';
        $og_description = generate_dynamic_meta_description($post->ID);
        $og_image = get_the_post_thumbnail_url($post->ID, 'full') ?: home_url('/img/panolabo-og-image.jpg');
    }
    
    echo '<meta property="og:title" content="' . esc_attr($og_title) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og_description) . '" />' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '" />' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($og_type) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '" />' . "\n";
    echo '<meta property="og:site_name" content="panolabo" />' . "\n";
    
    // Twitter Cards
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($og_title) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($og_description) . '" />' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($og_image) . '" />' . "\n";
}

/**
 * サイトマップ最適化
 */
function enhance_sitemap_priority() {
    // WordPress標準サイトマップの優先度カスタマイズ
    add_filter('wp_sitemaps_posts_entry', function($entry, $post) {
        if (is_front_page() || $post->post_name === 'front-page') {
            $entry['priority'] = 1.0;
        } elseif (in_array($post->post_name, ['about', 'services', 'portfolio-achievements', 'team'])) {
            $entry['priority'] = 0.9;
        } elseif ($post->post_type === 'page') {
            $entry['priority'] = 0.7;
        }
        
        return $entry;
    }, 10, 2);
}

// フック登録
add_action('wp_head', 'enhanced_open_graph_tags', 5);
add_action('init', 'enhance_sitemap_priority');

// 動的メタタグの挿入
add_action('wp_head', function() {
    global $post;
    $post_id = $post ? $post->ID : null;
    
    echo '<meta name="description" content="' . esc_attr(generate_dynamic_meta_description($post_id)) . '" />' . "\n";
    echo '<meta name="keywords" content="' . esc_attr(generate_dynamic_keywords()) . '" />' . "\n";
    
    // 構造化データの出力
    echo '<script type="application/ld+json">' . "\n";
    echo generate_structured_data();
    echo "\n" . '</script>' . "\n";
    
    // パンくずリスト構造化データ
    $breadcrumb_data = generate_breadcrumb_structured_data();
    if (!empty($breadcrumb_data)) {
        echo '<script type="application/ld+json">' . "\n";
        echo $breadcrumb_data;
        echo "\n" . '</script>' . "\n";
    }
}, 1);
?>