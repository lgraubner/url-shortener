@extends('layouts.app')

@section('title', 'Shorten your links - lg.im')

@section('content')
    @if($is_safe === false)
    <div class="warning">
        This link has been flagged as redirecting to malicious content.
    </div>
    @endif
    <div class="box">
        <div class="chart">
            <div class="chart__label">
                <span class="chart__value">{{ $clickCount }}</span>
                Clicks
            </div>
            <svg id="chart"></svg>
        </div>
        <div class="bottom">
            <div class="created">
                Created {{ $created_at }}
            </div>
            <div class="title">
                @if(null !== $title)
                    {{ $title }}
                @else
                    {{ $long_url }}
                @endif
            </div>
            <a href="{{ $long_url }}" class="url" title="{{ $long_url }}" rel="nofollow">{{ $long_url }}</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script>
        const __lgim_clicks = @json($clicks);
    </script>
    <script src="/app.js"></script>
@endsection