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
      @for($i = 1;$i <= 5;$i++)
      <tr><th>
          画像{{$i}}</th><td><input id="image{{$i}}" type="file" name="image{{$i}}">
          @endfor
      </td></tr>
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