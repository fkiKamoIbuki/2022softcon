<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../../assets/favicon.png"/>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />

    </head>

            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('spot.index') }}"><img src="../../assets/img/top_logo.png" alt="..." /></a>
                @if(Auth::check())
                <a class="nav-item"><a class="nav-link">ようこそ、{{ Auth::user()->name }}さん</a></li>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        @if(Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('spot.logout') }}">ログアウト</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signin')}}">ログイン</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('spot.index') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="spotform-info">
            <body class="masthead">
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
              @endif
            <form action="{{ route('spot.posts') }}" method="post" enctype="multipart/form-data">
              <table>
                @csrf 
                <tr><th>スポット名</th><td><input type="text" name="name"></td></tr>
                <tr><th>コメント</th><td><input type="text" name="comment"></td></tr>
                <tr><th>画像</th><td><input id="image" type="file" name="image"></td></tr>
                <tr><th>住所</th><td>	
                  <input type="text" name="address" id="address" placeholder="例:福井県福井市大手2-9-1">
                  <style type="text/css">
                        #map {
                          height: 500px;
                          width: 100%;
                        }
                        </style>
                        
                        <!-- Google Maps API -->
                        <script src="https://maps.googleapis.com/maps/api/js"></script>
                        <script>
                        var marker = null;
                        var lat = 35.729493379635535;
                        var lng = 139.71086479574538;
                        
                        function init() {
                          //初期化
                          var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 18, center: {lat: lat, lng: lng}
                          });
                        
                          document.getElementById('lat').value = lat;
                          document.getElementById('lng').value = lng;
                        
                          //初期マーカー
                          marker = new google.maps.Marker({
                            map: map, position: new google.maps.LatLng(lat, lng),
                          });
                        
                          //クリックイベント
                          map.addListener('click', function(e) {
                            clickMap(e.latLng, map);
                          });
                        }
                        
                        function clickMap(geo, map) {
                          lat = geo.lat();
                          lng = geo.lng();
                        
                          //小数点以下6桁に丸める場合
                          //lat = Math.floor(lat * 1000000) / 1000000);
                          //lng = Math.floor(lng * 1000000) / 1000000);
                        
                          document.getElementById('lat').value = lat;
                          document.getElementById('lng').value = lng;
                        
                          //中心にスクロール
                          map.panTo(geo);
                        
                          //マーカーの更新
                          marker.setMap(null);
                          marker = null;
                          marker = new google.maps.Marker({
                            map: map, position: geo 
                          });
                          
                        }
                        </script>
                        
                        <body onload="javascript:init();">
                        
                        <div id="map" style="margin-top: 10px; margin-bottom:15px;"></div>
                        
                        緯度：<input type="text" id="lat" name="lat" value="" size="20">経度：<input type="text" id="lng" name="lng" value="" size="20">
                        
                        </body><td>
                <tr><th></th><td><button type="submit">スポット投稿</button></td></tr>
              </table> 
            </form>
            <br>
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="../../js/script.js"></script>
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <!-- * *                               SB Forms JS                               * *-->
                <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                <script src="{{ url('/') }}/dist/js/vendor/jquery.min.js"></script>
                <script src="{{ url('/') }}/dist/js/vendor/video.js"></script>
                <script src="{{ url('/') }}/dist/js/flat-ui.min.js"></script>
                <script src="{{ url('/') }}/assets/js/prettify.js"></script>
                <script src="{{ url('/') }}/assets/js/application.js"></script>
            </body>
        </div>
        <footer class="footer py-4">
            <div class="footer-margin">
                <div class="container">
                    <div class="row align-items-center">
                            <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                            <div class="col-lg-4 my-3 my-lg-0">
                                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <div class="col-lg-4 text-lg-end">
                                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                            </div>
                    </div>
                </div>
            </div>
        </footer>
</html>