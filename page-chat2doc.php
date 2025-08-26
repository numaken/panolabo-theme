<?php
/*
Template Name: Chat2Doc - AI会話構造化ツール
*/
get_header();
?>

<!-- ヒーローセクション - numakenテーマカラー統合 -->
<section class="uk-section parallax" style="background: linear-gradient(135deg, #69ba64 0%, #5aa659 100%); min-height: 550px; padding: 60px 0;">
  <div class="uk-container">
    <div class="uk-grid uk-flex-middle" uk-grid>
      <div class="uk-width-1-2@m">
        <div class="uk-card uk-card-default uk-padding uk-box-shadow-large uk-animation-slide-left">
          <h1 class="uk-text-bold" style="color: #69ba64;">世界初「AI会話構造化」プラットフォーム</h1>
          <h2 class="uk-margin-remove">ChatGPT・Claude・Geminiの膨大な会話を7つのカテゴリで瞬時に整理</h2>
          <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-margin-small" uk-grid>
            <div><span class="uk-label" style="background: #69ba64;">🤖 AI自動構造化</span></div>
            <div><span class="uk-label ">📝 7カテゴリ分類</span></div>
            <div><span class="uk-label ">🆓 完全無料</span></div>
          </div>
          <p class="uk-text-lead uk-margin-small">料金：<strong style="color: #69ba64;">完全無料</strong></p>
          <a href="https://chat2doc-beryl.vercel.app/app" class="uk-button uk-button-text" target="_blank">🚀 今すぐ無料で試す</a>
        </div>
      </div>
      <div class="uk-width-1-2@m uk-text-center uk-visible@s">
        <div class="uk-position-relative uk-text-center uk-margin-large-top">
          <img src="<?php bloginfo('template_directory'); ?>/images/iphone.png" alt="Chat2Doc アプリイメージ" class="uk-width-1-1" style="width: 50%; height: auto; position: relative; z-index: 2;" />
          <div class="uk-position-absolute" style="top: 2%; left: 27%; width: 57%; height: 119%; z-index: 1; overflow: hidden;">
            <iframe src="https://chat2doc-beryl.vercel.app/app" width="100%" height="100%" frameborder="0" allowfullscreen style="transform: scale(0.8); transform-origin: top left; border-radius: 15px; overflow: hidden;"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 問題提起＆ベネフィット -->
<section class="uk-section" style="padding: 80px 0;">
  <div class="uk-container">
    <h2 class="uk-text-center uk-text-bold uk-margin-bottom" style="color: #69ba64;">AI会話の管理、こんなお悩みありませんか？</h2>
    <div class="uk-grid-match uk-child-width-1-3@m uk-text-center" uk-grid>
      <div>
        <div class="uk-card uk-card-body ">
          <span uk-icon="icon: warning; ratio: 2" style="color: #69ba64;"></span>
          <h4 class="uk-text-bold">重要な会話が埋もれてしまう</h4>
          <p>ChatGPTやClaudeとの重要な議論が長い会話ログの中に埋もれて、後で見つけるのが大変です。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body ">
          <span uk-icon="icon: ban; ratio: 2" style="color: #69ba64;"></span>
          <h4 class="uk-text-bold">チーム共有が困難</h4>
          <p>AI会話の成果をチームメンバーと共有したいが、長文すぎて要点が伝わりません。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body ">
          <span uk-icon="icon: clock; ratio: 2" style="color: #69ba64;"></span>
          <h4 class="uk-text-bold">知識の蓄積ができない</h4>
          <p>プロジェクトごとの知見が散在して、過去の学習を活用できていません。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 解決策セクション -->
<section class="uk-section" style="background: linear-gradient(135deg, #69ba64 0%, #5aa659 100%); padding: 80px 0;">
  <div class="uk-container">
    <h2 class="uk-text-center uk-text-bold uk-margin-bottom">Chat2Docが全て解決します</h2>
    <div class="uk-grid-match uk-child-width-1-4@m uk-text-center" uk-grid>
      <div>
        <div class="uk-card uk-card-body" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2);">
          <span uk-icon="icon: bolt; ratio: 2" class=""></span>
          <h4 class="uk-text-bold">🤖 AI自動構造化</h4>
          <p>90,000文字超の会話も数秒で7つのカテゴリに自動分類</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2);">
          <span uk-icon="icon: happy; ratio: 2" class=""></span>
          <h4 class="uk-text-bold">📝 構造化出力</h4>
          <p>目的、課題、解決策、コードが整理されたMarkdown形式で出力</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2);">
          <span uk-icon="icon: lightning; ratio: 2" class=""></span>
          <h4 class="uk-text-bold">🔒 プライバシー保護</h4>
          <p>ローカルストレージ処理でデータ漏洩リスクゼロ</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2);">
          <span uk-icon="icon: social; ratio: 2"></span>
          <h4 class="uk-text-bold">💰 完全無料</h4>
          <p>アカウント登録不要、追加費用なしで全機能利用可能</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 機能一覧セクション -->
<section class="uk-section" style="padding: 80px 0;">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold"><span style="color: #69ba64;">7つのカテゴリで完璧な構造化</span></h2>
    <div class="uk-grid-match uk-child-width-1-3@m uk-text-center uk-margin-large-top" uk-grid>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <span uk-icon="icon: target; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">🎯 目的</h3>
          <p class="uk-text-bold" style="color: #69ba64;">会話の主要目標を明確に抽出</p>
          <p>AI会話で何を達成しようとしていたかを自動的に識別し、プロジェクトの方向性を明確化します。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <span uk-icon="icon: history; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">📋 対応履歴</h3>
          <p class="uk-text-bold" style="color: #69ba64;">実行したアクションを時系列で整理</p>
          <p>会話中に実際に行った作業や試行錯誤の過程を体系的に記録します。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <span uk-icon="icon: warning; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">⚠️ 課題</h3>
          <p class="uk-text-bold" style="color: #69ba64;">直面した問題点を自動抽出</p>
          <p>会話中に発見された障害や課題を整理し、今後の対策に活用できます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <span uk-icon="icon: forward; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">🔄 次のアクション</h3>
          <p class="uk-text-bold" style="color: #69ba64;">今後の行動計画を明確化</p>
          <p>会話から導き出された次のステップを整理し、プロジェクト進行をスムーズに。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <span uk-icon="icon: code; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">💻 コード</h3>
          <p class="uk-text-bold" style="color: #69ba64;">重要なコードスニペットを分離</p>
          <p>会話中に生成されたコードを別セクションで管理し、再利用しやすく整理します。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <span uk-icon="icon: paint-bucket; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">🎨 設計意図</h3>
          <p class="uk-text-bold" style="color: #69ba64;">システム設計の思想を記録</p>
          <p>なぜその設計にしたのか、どのような考慮があったかを構造化して保存します。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <span uk-icon="icon: question; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">🔧 技術的懸念</h3>
          <p class="uk-text-bold" style="color: #69ba64;">潜在的なリスクを可視化</p>
          <p>将来的な技術的課題や注意点を整理し、プロジェクトリスク管理に活用できます。</p>
        </div>
      </div>

    </div>
    <p class="uk-text-center uk-margin-large-top uk-text-lead">AIとの会話を資産として蓄積し、<br class="uk-visible@s">チーム全体の知識レベルを向上させます。</p>
    <div class="uk-text-center uk-margin-top">
      <a href="https://chat2doc-beryl.vercel.app/app" class="uk-button uk-button-text" target="_blank">無料で今すぐ試す</a>
    </div>
  </div>
</section>

<!-- 料金プランセクション -->
<section class="uk-section" style="padding: 80px 0;">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold"><span style="color: #69ba64;">シンプルで分かりやすい料金プラン</span></h2>
    <div class="uk-text-center uk-margin-large-top">
      <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto">
        <h3 class="uk-text-bold uk-margin-top">無料プラン</h3>
        <div style="color: #69ba64; font-size: 3rem; font-weight: bold; margin: 1rem 0;">
          完全無料<span style="font-size: 1rem;">/ 永続利用</span>
        </div>
        <p class="uk-text-muted uk-margin-bottom">全機能無制限</p>
        <ul class="uk-list uk-list-striped uk-text-left">
          <li>✅ AI自動構造化（無制限）</li>
          <li>✅ 7カテゴリ分類</li>
          <li>✅ Markdown出力</li>
          <li>✅ ローカル処理（プライバシー保護）</li>
          <li>✅ アカウント登録不要</li>
          <li>✅ 90,000文字超対応</li>
        </ul>
        <a href="https://chat2doc-beryl.vercel.app/app" class="uk-button uk-button-text" target="_blank">今すぐ無料で始める</a>
      </div>
    </div>
    
    <div class="uk-text-center uk-margin-large-top">
      <p class="uk-text-lead" style="color: #69ba64;">
        <strong>永続無料・機能制限なし・アカウント登録不要</strong>
      </p>
    </div>
  </div>
</section>

<!-- 対象ユーザーセクション -->
<section class="uk-section" style="padding: 80px 0;">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold"><span style="color: #69ba64;">こんな方におすすめ</span></h2>
    <div class="uk-grid-match uk-child-width-1-3@m uk-text-center uk-margin-large-top" uk-grid>

      <div>
        <div class="uk-card uk-card-default uk-card-body" style="border-left: 4px solid #69ba64;">
          <span uk-icon="icon: users; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">開発チーム</h3>
          <p>AI会話での技術的議論を整理し、チーム内の知識共有を効率化。設計意図や技術的懸念を明確に記録できます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body" style="border-left: 4px solid #69ba64;">
          <span uk-icon="icon: user; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">フリーランス</h3>
          <p>プロジェクトごとの学習内容を体系的に管理。過去の経験を次のプロジェクトに活かせます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body" style="border-left: 4px solid #69ba64;">
          <span uk-icon="icon: laptop; ratio: 3" style="color: #69ba64;"></span>
          <h3 class="uk-text-bold uk-margin-top">プロダクトマネージャー</h3>
          <p>AI活用での課題分析や解決策検討を構造化し、意思決定プロセスを明確に記録できます。</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 使い方セクション -->
<section class="uk-section" style="padding: 80px 0;">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold"><span style="color: #69ba64;">使い方は超簡単</span></h2>
    <div class="uk-grid-large uk-child-width-1-4@m uk-text-center uk-margin-large-top" uk-grid>
      
      <div>
        <div class="uk-text-center uk-margin-bottom">
          <div class="uk-inline-block uk-padding-small   uk-border-circle" style="background: #69ba64 !important;">
            <span class="uk-text-bold uk-text-large">1</span>
          </div>
        </div>
        <h4 class="uk-text-bold">会話をコピー</h4>
        <p>ChatGPT、Claude、GeminiなどのAI会話をそのままコピーします。</p>
      </div>

      <div>
        <div class="uk-text-center uk-margin-bottom">
          <div class="uk-inline-block uk-padding-small   uk-border-circle" style="background: #69ba64 !important;">
            <span class="uk-text-bold uk-text-large">2</span>
          </div>
        </div>
        <h4 class="uk-text-bold">テキストエリアに貼り付け</h4>
        <p>Chat2Docのテキストエリアに会話ログを貼り付けます。</p>
      </div>

      <div>
        <div class="uk-text-center uk-margin-bottom">
          <div class="uk-inline-block uk-padding-small   uk-border-circle" style="background: #69ba64 !important;">
            <span class="uk-text-bold uk-text-large">3</span>
          </div>
        </div>
        <h4 class="uk-text-bold">構造化ボタンをクリック</h4>
        <p>AIが自動的に7つのカテゴリに分類・構造化します。</p>
      </div>

      <div>
        <div class="uk-text-center uk-margin-bottom">
          <div class="uk-inline-block uk-padding-small   uk-border-circle" style="background: #69ba64 !important;">
            <span class="uk-text-bold uk-text-large">4</span>
          </div>
        </div>
        <h4 class="uk-text-bold">Markdown出力</h4>
        <p>整理されたドキュメントをMarkdown形式でダウンロードまたはコピー。</p>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="uk-section" style="background: linear-gradient(135deg, #69ba64 0%, #5aa659 100%); padding: 80px 0;">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold"><span>今すぐChat2Docを試してみませんか？</span></h2>
    <p class="uk-text-center uk-text-lead">完全無料、アカウント登録不要で今すぐ利用開始できます</p>
    <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-margin-top" uk-grid>
      <div>
        <a href="https://chat2doc-beryl.vercel.app/app" class="uk-button uk-button-text" target="_blank">🚀 無料で試してみる</a>
      </div>
      <div class="uk-visible@s">
        <a href="<?php echo home_url('/contact/'); ?>" class="uk-button uk-button-text">📞 お問い合わせ</a>
      </div>
    </div>
    <p class="uk-text-center uk-margin-top" style="opacity: 0.8;">※アカウント登録不要・プライバシー完全保護</p>
  </div>
</section>

<?php get_footer(); ?>