@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
	@parent
	ボード・ページ
@endsection

@section('content')
	<table>
	<tr><th>Message</th><th>Name</th></tr>
	@foreach ($items as $item)
		<tr>
			<td>{{$item->message}}</td>
			<td>{{$item->person->name}}</td>
		</tr>
	@endforeach
	</table>
@endsection

@section('link')
	<p><a href="/board/add">投稿</a></p>
	<p><a href="/top">トップページへ</a></p>
@endsection

@section('footer')
copuright 2021 yamano.
@endsection
