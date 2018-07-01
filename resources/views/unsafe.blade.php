@extends('layouts.app')

@section('title', 'STOP - Potentially malicious URL')

@section('head')
    <meta name="robots" content="noindex,nofollow" />
@endsection

@section('navigation', '')

@section('content')
    <div class="content-unsafe">
        <img src="/img/exclamation-outline.svg" class="icon" alt="STOP" />
        <h2 class="title-warning">You found a potentially malicious URL</h2>
        <p>The link you requested has been identified as being potentially problematic. This could be because of malicious content or being reported by an user. The link you requested may contain inappropriate content, or even spam or malicious code that could be downloaded to your computer without your consent, or may be a forgery or imitation of another website, designed to trick users into sharing personal or financial information.</p>
        <p><a href="{{ $url }}" style="font-size: 20px;">I understand, proceed anyway</a></p>
    </div>
@endsection