
@extends('layouts.master_auth')
@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
@endif

@section('content')
  <form action="{{ route('spot.posts') }}" method="post" enctype="multipart/form-data">
    <table>
      @csrf 
      <tr><th>スポット名</th><td><input type="text" name="name"></td></tr>
      <tr><th>コメント</th><td><input type="text" name="comment"></td></tr>
      <tr><th>画像</th><td><input id="image" type="file" name="image"></td></tr>
      <tr><th>住所</th><td>	
        <input type="text" name="address" id="address">
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
@endsection