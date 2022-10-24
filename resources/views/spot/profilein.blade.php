@extends('layouts.master_auth')
 
@section('content')
  <div style="margin-top: 30px; text-align: center;"><h3>ログイン成功！</h3></div>
  <? return redirect('spot/index');?>
@endsection