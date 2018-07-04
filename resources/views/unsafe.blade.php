@extends('layouts.app')

@section('title', 'STOP - Potentially malicious URL')

@section('head')
    <meta name="robots" content="noindex,nofollow" />
@endsection

@section('navigation', '')

@section('content')
    <div class="content-unsafe text-center max-w-lg m-auto my-12 md:my-32">
        <img src="/img/exclamation-outline.svg" class="icon w-16 mb-3" alt="STOP" />
        <h2 class="title-warning text-grey-darkest text-3xl mb-5">You found a potentially malicious URL</h2>
        <p class="text-lg leading-normal">The link you requested has been identified as being potentially problematic. This could be because of malicious content or being reported by an user. The link you requested may contain inappropriate content, or even spam or malicious code that could be downloaded to your computer without your consent, or may be a forgery or imitation of another website, designed to trick users into sharing personal or financial information.</p>
        <a href="{{ $url }}" class="mt-10 text-xl inline-block text-grey-darker">I understand, proceed anyway</a>
    </div>
@endsection