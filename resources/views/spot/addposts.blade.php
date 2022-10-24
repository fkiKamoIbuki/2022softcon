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
  <form action="{{route('spot.addposts')}}" method="post" enctype="multipart/form-data">
  <table>
    @csrf 
    <input type="hidden" value="{{$spot_id}}" name="spot_id">
    <tr><th>コメント</th><td><input type="text" name="comment"></td></tr>
    <tr><th>画像</th><td><input id="image" type="file" name="image"></td></tr>
    <tr><th></th><td><button type="submit">追加投稿</button></td></tr>
  </table> 
  </form>
@endsection