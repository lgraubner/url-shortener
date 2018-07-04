@extends('layouts.app')

@section('title', 'Shorten your links - lg.im')

@section('head')
<style>
    #chart .line {
        fill: none;
        stroke: rgba(255, 255, 255, 0.9);
        stroke-width: 2;
    }

    #chart .area {
        fill: rgba(255, 255, 255, 0.25);
        stroke: none;
    }
</style>
@endsection

@section('content')
    <div class="my-12 md:my-24">
        @if($is_safe === false)
            <div class="warning max-w-md shadow bg-red-lighter text-red font-bold rounded m-auto mb-5 py-3 px-5">
                This link has been flagged as redirecting to malicious content.
            </div>
        @endif
        <div class="box max-w-md shadow-lg rounded m-auto bg-white overflow-hidden">
            <div class="chart bg-orange-lg" style="min-height:180px;">
                <div class="chart__label text-lg pt-5 pl-5 text-white absolute">
                    <span class="chart__value">{{ $clickCount }}</span>
                    Clicks
                </div>
                <svg id="chart" style="margin-bottom:-5px;" class="mt-20"></svg>
            </div>
            <div class="bottom py-3 px-5">
                <div class="created uppercase text-xs tracking-wide mb-1 text-grey">
                    Created {{ $created_at }}
                </div>
                <div class="title text-xl mb-1">
                    @if(null !== $title)
                        {{ $title }}
                    @else
                        {{ $long_url }}
                    @endif
                </div>
                <a href="{{ $long_url }}" class="url no-underline text-grey" title="{{ $long_url }}" rel="nofollow">{{ $long_url }}</a>
            </div>
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