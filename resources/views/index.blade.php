
@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
	<h1>ログイン</h1>
	@if(session('message'))
	    <div>
	    	{{ session('message') }}
	    </div>
	@endif
	
	@if ($errors->any())
	    <div>
	    @foreach ($errors->all() as $error)
	           {{ $error }}<br>
	    @endforeach
	    </div>
	@endif
	
	<form action="/login" method="post">
		@csrf
		email:<input name="email" value="{{ old('email') }}"><br>
		パスワード:<input name="password" type="password"><br>
		<button>ログインする</button><br>
		<a href="/user/register">会員登録</a>
		<table border="1">
		
	</form>
@endsection