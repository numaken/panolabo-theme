<?php
/**
 The template name:固定ページ：ウェブサイト制作システム
 */
get_header(); ?>

<style>

    #map {
        width: 100%;
        height: 800px;
    }



    * {
        box-sizing: border-box;
    }



    /* モーダルCSS */
    .modalArea {
        display: none;
        position: fixed;
        z-index: 10; /*サイトによってここの数値は調整 */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .modalBg {
        width: 100%;
        height: 100%;
        background-color: rgba(30,30,30,0.9);
    }

    .modalWrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform:translate(-50%,-50%);
        width: 70%;
        max-width: 100%;
        padding: 10px 30px;
        background-color: #fff;
    }

    .closeModal {
        position: absolute;
        top: 0.5rem;
        right: 1rem;
        cursor: pointer;
    }


    /* 以下ボタンスタイル */
    button {
        padding: 10px;
        background-color: #fff;
        border: 1px solid #282828;
        border-radius: 2px;
        cursor: pointer;
    }

    #openModal {
        position: initial;
        top: 80%;
        left: 90%;
        transform:translate(-50%,-50%);
    }


</style>


<section class="pad top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>Clients</h1>
                <h2>導入店ご紹介</h2>
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <hr class="black center">
                </div> <!-- ./col-sm-8 col-sm-offset-2 text-center -->
            </div>
        </div>
    </div>
</section>

<script>

// ユーザーの端末がGeoLocation APIに対応しているかの判定
    if( navigator.geolocation ){// 現在位置を取得できる場合の処理
        // 現在位置を取得する
        navigator.geolocation.getCurrentPosition( success, error, option);
        /*現在位置が取得できた時に実行*/
        function success(position){
            var data = position.coords ;
            // 必要な緯度経度だけ取得
            var lat = data.latitude;
            var lng = data.longitude;
            var alt = data.altitude ;
var accLatlng = data.accuracy ;
var accAlt = data.altitudeAccuracy ;
var heading = data.heading ;			//0=北,90=東,180=南,270=西
var speed = data.speed ;
            //Google Maps
            var geocoder = new google.maps.Geocoder();
            latlng = new google.maps.LatLng(lat, lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(latlng);

                    // 現在地のアイコンを表示
                    var image = '<?php bloginfo('template_directory'); ?>/images/mapicon/man.png';
                    var marker = new google.maps.Marker({
                        map: map,
                        position: latlng,
                        animation: google.maps.Animation.BOUNCE,
                        icon: image
                    });

                    //現在地の緯度経度を中心にマップに円を描く
                    var circleOptions = {
                        map: map,
                        center: new google.maps.LatLng( lat , lng ),
                        radius: 1000,//1km
                        strokeColor: "#009933",
                        strokeOpacity: 1,
                        strokeWeight: 1,
                        fillColor: "#00ffcc",
                        fillOpacity: 0.35
                    };
                    circle = new google.maps.Circle(circleOptions);

                    google.maps.event.addListener(marker, 'click', function (e) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    });
                    document.getElementById('address').innerHTML = results[0].formatted_address;
                }
                else {
                    alert("エラー" + status);
                }
            });
        }
        /*現在位置の取得に失敗した時に実行する関数名*/
        function error(error){
            var errorMessage = {
                0: "原因不明のエラーが発生し現在位置を取得できませんでした。",
                1: "位置情報の取得が許可されませんでした。",
                2: "電波状況などで位置情報が取得できませんでした。",
                3: "位置情報の取得に時間がかかり過ぎタイムアウトしました。"
            } ;
            //とりあえずalert
            alert( errorMessage[error.code]);
        }
        // オプション(省略可)
        var option = {
            "enableHighAccuracy": false,
            "timeout": 100 ,
            "maximumAge": 100 ,
        };

    } else {// 現在位置を取得できない場合の処理
        //とりあえずalert
        alert("あなたの端末では、現在位置を取得できません。");
    }


    //MAPの表示
    var map;
    var marker = [];
    var markerData = [];

    var windows = [];
    var currentInfoWindow = null;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            //                center: {lat: 35.170981, lng: 136.881556} ,
            zoom: 8
        });


        window.onload = function(){
            // 【main-script】 を実行
            getJsonp_GAS();
        }


        function getJsonp_GAS() {

            $.ajax({
                type: 'GET',
                url: 'https://script.google.com/macros/s/AKfycbz3mk7YkqfqHeJ2N3BJeOFV6_cGuVduW2KQ-wNlA0krPST3Mx32/exec',
                dataType: 'jsonp',
                jsonpCallback: 'jsondata',
                success:
                function(json){
                    var len = json.length;

                    for(var i=0; i < len; i++){

                        if (json[i].lat === '') {

                            console.log(json[i].panolabo_id + 'は位置情報がありませんでした。');

                        } else {
                            markerData.push(
                                {
                                    'panolabo_id': json[i].panolabo_id,
                                    'name': json[i].name,
                                    'url': json[i].url,
                                    'lat': json[i].lat,
                                    'lng': json[i].lng,
                                    'description': json[i].description,
                                    'site_url': json[i].site_url,
                                    'main_category': json[i].main_category,
                                    'sub_category': json[i].sub_category
                                }
                            );

                            //console.log(json[i].ID + 'の位置情報は' + json[i].lat + json[i].lng);

                        }
                    };

                    for (var i = 0; i < markerData.length; i++) {

                        markerLatLng = { lat: markerData[i]['lat'],lng: markerData[i]['lng'] }; // 緯度経度のデータ作成

                        //console.log(markerLatLng);
                        marker[i] = new google.maps.Marker({ // マーカーの追加
                            position: markerLatLng, // マーカーを立てる位置を指定
                            map: map // マーカーを立てる地図を指定
                        });

                        windows[i] = new google.maps.InfoWindow({ // 吹き出しの追加

                            content: '<div class="clearfix" style="width:100%;"><h2 class="h3">' + markerData[i]['panolabo_id'] +
                            markerData[i]['name'] +'</h2>' + '<small>' +
                            markerData[i]['description'] + markerData[i]['site_url'] + '</small>'+'<br><br><input class="uk-button uk-button-text" data-modalIndex="1" type="button" value="この場所の詳細"  onClick="kakunin(1)" />'+'</div>'
                        });

                        markerEvent(i); // マーカーにクリックイベントを追加

                    }


                },

                error: function () {
                    alert("読み込みを失敗しました。");
                }

            }); //jsonの閉じ

        }

        function markerEvent(i) {
            marker[i].addListener('click', function() { // マーカーをクリックしたとき

                if (currentInfoWindow) {
                    currentInfoWindow.close();
                }
                windows[i].open(map, marker[i]); // 吹き出しの表示
                currentInfoWindow = windows[i];
            });
        }

    }


</script>


<div id="address"></div>


<script  async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5uH8cR4XUJSgMigiJKkXxwDlGEv3zvDQ&callback=initMap">
</script>



<section id="main" class="light-gray-bg">
    <div class="container-fluid">

        <div class="row full">
            <div class="col-xs-12">

                <div class="grid">
                    <!--Project-->

                    <div id="map"></div>
                    <!-- // -->

                </div>
                <!--End Isotope-->

            </div>
        </div>
        <!--End Row-->
    </div>
</section>

<br>

<section id="feature" class="heading-inner">
    <div class="container-fruid">
        <div class="row">
            <div class="col-xs-12 col-md-7 wow fadeInLeft" data-wow-delay=".3s">
                <div class="download-inner text-left">
                    <h2> <span>誰でも作れる</span> ウェブサイト制作システム </h2>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/frontpage/panolaboWS.svg" alt="" class="img-responsive" style="width:65%;">
                    <h4>SEOに強いブログシステム<i class="fa fa-wordpress" aria-hidden="true"></i>Wordpressをベースにした</h4>
                    <p>SEOに強い・更新が簡単・安全に使える世界で一番使われているCMS（コンテンツマネージメントシステム：Webサイトを構成するテキストや画像、レイアウト情報などを一元的に保存・管理し、サイトを構築したり編集したりするソフトウェアのこと）であるWordPress製のHPをご提供。有名な企業のサイトでは、クックパッド、東京大学、博報堂、スポーツの業界では、浦和レッズなどでも使用されています。</p>

                    <div class="btn-container">
                        <a href="#"><i class="fa fa-android"></i></a>
                        <a href="#"><i class="fa fa-apple"></i></a>
                    </div>
                </div> <!-- download-inner end -->
            </div> <!-- col-md-8 end -->
            <div class="col-xs-12 col-md-5 wow fadeInRight hidden-sm " data-wow-delay=".3s">
                <div class="flaoting-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/frontpage/app1.png" alt="" class="img-responsive">
                </div>
            </div>
        </div>  <!-- rowr end  -->
<?php
include_once "obj-sns.php";
?>
    </div>
</section>

<hr class="black center">
<br>

<section class="pad-sm">
    <div class="container">
        <div class="row dark-gray text-center">
            <div class="col-xs-12">
                <img class="img-responsive wow fadeIn" data-wow-delay="0.4s" src="img/work/zegg/zegg-5.png" alt="Zegg Business Cards">
            </div>
        </div>
    </div>
</section>
<section class="pad-sm">
    <div class="container">
        <div class="row dark-gray text-center">
            <div class="col-xs-12">
                <a href="work.php"><i class="fa fa-th fa-lg"></i></a>
            </div>
        </div>
    </div>
</section>

<?php
include_once "obj-contact.php";
?>

<!-- モーダルエリアここから -->

<script>

    function kakunin(btnNo){

        if (btnNo == 1){

            var result = markerData[i]['panolabo_id'];
            alert(result);

            link = "panolabo-api";
            href = "http://api.panolabo.com/contents/"+result;
            //alert(href);

        }else{

            //var result = encodeURIComponent(reurl+"?h="+honbid+"t="+shopid+"&u="+user_id);
            // alert(result);

            //link = "GoodyPoint";
            //href = "http://stgreg.gp-internal.com/public/card?h="+honbid+"&t="+shopid+"&u="+user_id+"&r="+result;
        }

        //ret = confirm(link + "へ飛びます。宜しいですか？"+href);
        //if (ret == true){
        //    location.href = href;
        //                          alert(href);
        //}
    }

</script>

<section id="modalArea" class="modalArea">
    <div id="modalBg" class="modalBg"></div>
    <div class="modalWrapper">
        <div class="modalContents">
            <h1><?php echo "<script>document.writeln(markerData[i]['title']);</script>"; ?></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
        <div id="closeModal" class="closeModal">
            ×
        </div>
    </div>
</section>
<!-- モーダルエリアここまで -->

<!--End-->



<?php get_footer(); ?>
