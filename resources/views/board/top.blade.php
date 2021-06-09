@extends('layouts.helloapp')

@section('title', 'top')

@section('menubar')
	@parent
	トップ・ページ
@endsection

@section('content')
	<p><a href="/person/add">ユーザー追加はこちら</a></p>
	<p><a href="/board">投稿一覧</a></p>
@endsection

@section('footer')
copuright 2021 yamano.
@endsection
