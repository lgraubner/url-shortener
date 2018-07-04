@extends('layouts.app')

@section('title', 'Page Not found - lg.im')

@section('navigation', '')

@section('content')
    <div class="content-404 text-center my-12 md:my-32 pb-10">
        <img src="/img/robot.png" class="w-32" alt="Robot" />
        <h1 class="text-4xl md:text-5xl text-grey-darkest mb-3">Oops!</h1>
        <p class="max-w-xs m-auto text-lg md:text-xl">We couldn't find a link for the URL you clicked.</p>
    </div>
@endsection