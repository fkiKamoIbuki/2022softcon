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
      <tr><th></th><td><button type="submit">スポット投稿</button></td></tr>
    </table> 
  </form>
@endsection