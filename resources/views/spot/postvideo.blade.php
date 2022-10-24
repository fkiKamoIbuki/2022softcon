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
  <form action="{{ route('spot.video') }}" method="post" enctype="multipart/form-data">
    <table>
      @csrf 
      <input type="hidden" value="{{$spot_id}}" name="spot_id">
      <tr><th>
          画像1</th><td><input type="file" name="image1" onchange="previewFile1(this);">
          <img id="image1" style="max-width:200px;"></td></tr>
          <tr><th>
          画像2</th><td><input type="file" name="image2" onchange="previewFile2(this);">
          <img id="image2" style="max-width:200px;"></td></tr>
          <tr><th>
          画像3</th><td><input type="file" name="image3" onchange="previewFile3(this);">
          <img id="image3" style="max-width:200px;"></td></tr>
          <tr><th>
          画像4</th><td><input type="file" name="image4" onchange="previewFile4(this);">
          <img id="image4" style="max-width:200px;"></td></tr>
          <tr><th>
          画像5</th><td><input type="file" name="image5" onchange="previewFile5(this);">
          <img id="image5" style="max-width:200px;"></td></tr>
      
      <script>
              function previewFile1(hoge){
                var fileData = new FileReader();
                fileData.onload = (function() {
                  //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
                  //プレビュー表示している
                  document.getElementById('image1').src = fileData.result;
                });
                fileData.readAsDataURL(hoge.files[0]);
              }
              function previewFile2(hoge){
                var fileData = new FileReader();
                fileData.onload = (function() {
                  //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
                  //プレビュー表示している
                  document.getElementById('image2').src = fileData.result;
                });
                fileData.readAsDataURL(hoge.files[0]);
              }
              function previewFile3(hoge){
                var fileData = new FileReader();
                fileData.onload = (function() {
                  //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
                  //プレビュー表示している
                  document.getElementById('image3').src = fileData.result;
                });
                fileData.readAsDataURL(hoge.files[0]);
              }
              function previewFile4(hoge){
                var fileData = new FileReader();
                fileData.onload = (function() {
                  //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
                  //プレビュー表示している
                  document.getElementById('image4').src = fileData.result;
                });
                fileData.readAsDataURL(hoge.files[0]);
              }
              function previewFile5(hoge){
                var fileData = new FileReader();
                fileData.onload = (function() {
                  //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
                  //プレビュー表示している
                  document.getElementById('image5').src = fileData.result;
                });
                fileData.readAsDataURL(hoge.files[0]);
              }
      </script>
      <tr><th>音楽</th><td>
          <label><input type="radio" name="music" value="1">海系</label>
          <label><input type="radio" name="music" value="1">山系</label>
          <label><input type="radio" name="music" value="1">街系</label>
          <label><input type="radio" name="music" value="0">なし</label>
      </td></tr>
      <tr><th></th><td><button type="submit">スライドショー作成</button></td></tr>
    </table> 
  </form>
@endsection