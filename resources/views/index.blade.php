@extends('layouts.default')

@section('title', 'BBS')
@section('content')
    <form action="/queryString" method="get" class='text-center'>
        <input type="text" name="keyword">
        <button type="submit">送信</button>
    </form>
@endsection