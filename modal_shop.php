<?php
$id = $_GET['id'] ?? null;

if ($id === null) {
    echo "IDが指定されていません。";
    return;
}

$api_url = 'http://api.panolabo.com/contents/' . $id;
$response = @file_get_contents($api_url);

if ($response === false) {
    echo "API呼び出しに失敗しました。";
} else {
    $data = json_decode($response, true);

    if (empty($data)) {
        echo "データが存在しません。";
    } else {
        // データを表示する処理
        echo "データ: " . print_r($data, true);
    }
}

?>

<!--Start A Project-->
    <div id="shop" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="modal-title margin-20">
              <h2 class="white">
                  <?php echo $modal_obj['title'] ?>
              </h2>
              <h4 class="white">
                  <?php echo $modal_obj['description'] ?>
              </h4>
            </div>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12">
                <br>
                <!-- Start A Project Form -->
                  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                      <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="<?php echo $modal_obj['authored_index_url_secure'] ?>" width="500" height="100"></iframe>
                      </div>

                  </div>

                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                      <table class="white">
                          <tbody>
                              <tr>
                                  <th>店 名</th>
                                  <td><?php echo $modal_obj['title']; ?></td>
                              </tr>
                              <tr>
                                  <th>T E L</th>
                                  <td>
                                      <span data-action="call" data-tel="<?php echo $modal_obj['tel']; ?>"><i class="fas fa-phone-square"></i>&nbsp;<?php echo $modal_obj['tel']; ?></span>
                                  </td>
                              </tr>
                              <tr>
                                  <th>住 所</th>
                                  <td><?php echo $modal_obj['address']; ?></td>
                              </tr>
                              <tr>
                                  <th>営業時間</th>

                                  <?php
                                  $num1 = $modal_obj['business_hour_from'];
                                  $from = substr($num1,0,5);
                                  $num2 = $modal_obj['business_hour_to'];
                                  $to = substr($num2,0,5);
                                  ?>

                                  <td><?php echo $from; ?> 〜 <?php echo $to; ?><br>
                                      <span><?php echo $modal_obj['business_hour_remarks']; ?></span>
                                  </td>
                              </tr>
                              <tr>
                                  <th>定 休 日</th>
                                  <td><?php echo $modal_obj['regular_holiday']; ?></td>
                              </tr>
                                <tr>
                                <th>HP</th>
                                <td>
                                    <a href="<?php echo $modal_obj['site_url']; ?>"><?php echo $modal_obj['site_url']; ?></a></td>
                                </tr>
                          </tbody>
                      </table>

                      <div class="embed-responsive embed-responsive-16by9">

                          <!-- gmap -->

                          <script>

                              function initMap() {
                                  var map = new google.maps.Map(document.getElementById('map'), {
                                      zoom: 15,
                                      center: {lat: <?php echo $modal_obj['lat'] ?>, lng: <?php echo $modal_obj['lng'] ?>}
                                  });

                                  marker = new google.maps.Marker({
                                      map: map,
                                      draggable: true,
                                      disableDefaultUI: false,
                                      animation: google.maps.Animation.DROP,
                                      position: {lat: <?php echo $modal_obj['lat'] ?>, lng: <?php echo $modal_obj['lng'] ?>}
                                  });
                                  marker.addListener('click', toggleBounce);
                              }

                              function toggleBounce() {
                                  if (marker.getAnimation() !== null) {
                                      marker.setAnimation(null);
                                  } else {
                                      marker.setAnimation(google.maps.Animation.BOUNCE);
                                  }
                              }

                          </script>

                          <!-- 地図のキャンパス -->
                          <div class="map-embed" style="width: 100%; height: 225px;">
                              <div id="map">ここに地図が表示されます</div>
                          </div>


                      </div>

                  </div>

                  <div class="col-xs-12">
                  <div class="row text-center">
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 margin-40 wow fadeIn animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">

                          <br>
                          <ul class="list-unstyled bullets gray">
                              <li><h3 class="white"><? echo $osusume[0]['title']; ?></h3></li>
                              <li><?php echo '<div class="embed-responsive embed-responsive-16by9"><img class="embed-responsive-item" src="' . $osusume[0]['image'] . '" alt="' . $osusume[0]['title'] . '" ></div>'; ?></li>
                              <li><? echo $osusume[0]['description']; ?></li>
                          </ul>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 margin-40 wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">

                          <br>
                          <ul class="list-unstyled bullets gray">
                              <li><h3 class="white"><? echo $osusume[1]['title']; ?></h3></li>
                              <li><?php echo '<div class="embed-responsive embed-responsive-16by9"><img class="embed-responsive-item" src="' . $osusume[1]['image'] . '" alt="' . $osusume[1]['title'] . '" ></div>'; ?></li>
                              <li><? echo $osusume[1]['description']; ?></li>
                          </ul>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 margin-40 wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">

                          <br>
                          <ul class="list-unstyled bullets gray">
                              <li><h3 class="white"><? echo $osusume[2]['title']; ?></h3></li>
                              <li><?php echo '<div class="embed-responsive embed-responsive-16by9"><img class="embed-responsive-item" src="' . $osusume[2]['image'] . '" alt="' . $osusume[2]['title'] . '" ></div>'; ?></li>
                              <li><? echo $osusume[2]['description']; ?></li>
                          </ul>
                      </div>
                  </div>
                  </div>

                <!-- /Form form -->


              </div>
              <!--End Col 12-->
            </div>
          </div>
          <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
