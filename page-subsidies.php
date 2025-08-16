<?php
/*
 The template name:固定ページ：補助金検索
 */
get_header(); ?>

<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-divider">補助金情報検索</h2>

    <div class="uk-grid-divider uk-grid-match uk-child-width-expand@s uk-text-small" uk-grid>
        <aside class="uk-width-1-4@s">
            <form method="GET" id="search-form">
                <input class="uk-input" name="keyword" placeholder="キーワード">
                <select class="uk-select" name="sort">
                    <option value="created_date">作成日時</option>
                    <option value="acceptance_start_datetime">募集開始日時</option>
                    <option value="acceptance_end_datetime">募集終了日時</option>
                </select>
                <select class="uk-select" name="order">
                    <option value="ASC">昇順</option>
                    <option value="DESC">降順</option>
                </select>
                <select class="uk-select" name="acceptance">
                    <option value="1">募集期間内</option>
                    <option value="0">全て</option>
                </select>
                <div class="uk-margin">
                    <button class="uk-button uk-button-text" type="submit">検索</button>
                    <button type="button" class="uk-button uk-button-text" onclick="resetForm()">クリア</button>
                </div>
            </form>
        </aside>

        <main class="uk-width-3-4@s">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $params = [
                    'sort' => isset($_GET['sort']) ? $_GET['sort'] : 'created_date',
                    'order' => isset($_GET['order']) ? $_GET['order'] : 'DESC',
                    'acceptance' => isset($_GET['acceptance']) ? $_GET['acceptance'] : '1',
                ];

                if (!empty($_GET['keyword'])) {
                    $params['keyword'] = $_GET['keyword'];
                }

                $query_string = http_build_query($params);
                $url = "https://api.jgrants-portal.go.jp/exp/v1/public/subsidies?$query_string";
                $response = @file_get_contents($url);

                if ($response === FALSE) {
                    echo "APIリクエストに失敗しました。";
                } else {
                    $data = json_decode($response, true);

                    if (!empty($data['result'])) {
                        echo '<table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-text-small uk-table-responsive" style="font-size:0.75rem;">';
                        echo '<thead><tr><th>ID</th><th>補助金名</th><th>募集開始日時</th><th>募集終了日時</th><th>補助金上限額</th><th>対象地域</th><th>従業員数の制約</th></tr></thead>';
                        echo '<tbody>';

                        foreach ($data['result'] as $item) {
                            $start_datetime = new DateTime($item['acceptance_start_datetime']);
                            $formatted_start_datetime = $start_datetime->format('Y年m月d日 H時i分');
                            $end_datetime = new DateTime($item['acceptance_end_datetime']);
                            $formatted_end_datetime = $end_datetime->format('Y年m月d日 H時i分');

                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($item['id']) . '</td>';
                            echo '<td>' . htmlspecialchars($item['title']) . '</td>';
                            echo '<td>' . htmlspecialchars($formatted_start_datetime) . '</td>';
                            echo '<td>' . htmlspecialchars($formatted_end_datetime) . '</td>';
                            echo '<td>' . number_format($item['subsidy_max_limit']) . '円</td>';
                            echo '<td>' . htmlspecialchars($item['target_area_search']) . '</td>';
                            echo '<td>' . htmlspecialchars($item['target_number_of_employees']) . '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody></table>';
                    } else {
                        echo "該当する補助金が見つかりませんでした。";
                    }
                }
            }
            ?>
        </main>
    </div>
</div>

<script>
function resetForm() {
    document.getElementById('search-form').reset();
    window.history.pushState({}, document.title, window.location.pathname);
}
</script>

<?php
include_once "obj-contact.php";
?>

<?php get_footer(); ?>
