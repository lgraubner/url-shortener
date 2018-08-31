@extends('layouts.app')

@section('title', 'STOP - Potentially malicious URL')

@section('head')
    <meta name="robots" content="noindex,nofollow" />
@endsection

@section('content')
    <div class="content-unsafe text-center max-w-lg m-auto my-12 md:my-32">
        <h1>You found a potentially malicious URL</h1>
        <p>The link you requested has been identified as being potentially problematic. This could be because of malicious content or being reported by an user. The link you requested may contain inappropriate content, or even spam or malicious code that could be downloaded to your computer without your consent, or may be a forgery or imitation of another website, designed to trick users into sharing personal or financial information.</p>
        <a href="{{ $url }}">I understand, proceed anyway</a>
    </div>
@endsection
