@extends('layouts.app')

@section('title', 'Page Not found - lg.im')

@section('navigation', '')

@section('content')
    <div class="content-404">
        <img src="/img/robot.png" class="robot" alt="Robot" />
        <h1>Oops!</h1>
        <p>We couldn't find a link for the URL you clicked. <a href="/">Homepage</a></p>
    </div>
@endsection