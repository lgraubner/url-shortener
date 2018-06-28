@extends('layouts.app')

@section('title', 'Shorten your links - lg.im')

@section('content')
    <div class="box">
        <div class="chart">
            <div class="chart__label">
                <span class="chart__value">{{ $clicks }}</span>
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
        (function () {
            const line = d3.line()
                .x((d, i) => xScale(i))
                .y((d) => yScale(d.y))
                .curve(d3.curveMonotoneX);

            const height = 180;
            const width = 540;
            const n = 21;

            const data = d3.range(n).map(d => ({
                y: d3.randomUniform(1)(),
                x: d
            }));

            const startData = data.map(d => ({
                x: d.x,
                y: 0
            }));

            const xScale = d3.scaleLinear()
                .domain([0, n-1])
                .range([0, width]);

            const yScale = d3.scaleLinear()
                .domain([0, 1])
                .range([height, 0]);

            const areaGenerator = d3.area();
            const area = areaGenerator
                .x(d => xScale(d.x))
                .y0(height)
                .y1(d => yScale(d.y))
                .curve(d3.curveMonotoneX);

            const svg = d3.select('#chart')
                .attr('width', width)
                .attr('height', height);

            svg.append('path')
                .datum(data)
                .attr('class', 'line')
                .attr('d', line)
                .transition()
                .duration(500)
                .ease(d3.easeSin)
                .attrTween('d', () => {
                    const interpolator = d3.interpolateArray(startData, data);

                    return (t) => line(interpolator(t));
                });

            svg.append('path')
                .data([data])
                .attr('class', 'area')
                .attr('d', area)
                .transition()
                .duration(500)
                .ease(d3.easeSin)
                .attrTween('d', function() {
                    const interpolator = d3.interpolateArray(startData, data);

                    return t => area(interpolator(t));
                });

        })();
    </script>
@endsection