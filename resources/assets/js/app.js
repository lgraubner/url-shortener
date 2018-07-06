import { select } from 'd3-selection'
import { area, line, curveMonotoneX } from 'd3-shape'
import { scaleLinear } from 'd3-scale'
import { interpolateArray } from 'd3-interpolate'
import { easeSin } from 'd3-ease'
import 'd3-transition'
import eachDay from 'date-fns/each_day'
import format from 'date-fns/format'
import parse from 'date-fns/parse'

const curve = line()
  .x((d, i) => xScale(i))
  .y(d => yScale(d.clicks))
  .curve(curveMonotoneX)

const height = 180
const width = 544

// eslint-disable-next-line
const clickData = __lgim_clicks

const dates = eachDay(parse(Object.keys(clickData)[0]), new Date())

const data = dates.reduce((arr, date, index) => {
  arr.push({
    clicks: clickData[format(date, 'YYYY-MM-DD')] || 0,
    value: index
  })
  return arr
}, [])

const max = data.reduce((max, c) => Math.max(max, c.clicks), 0)

const n = data.length

const startData = data.map(d => ({
  value: d.value,
  clicks: 0
}))

const xScale = scaleLinear()
  .domain([0, n - 1])
  .range([0, width])

const yScale = scaleLinear()
  .domain([0, max])
  .range([height, 0])

const areaGenerator = area()
const fill = areaGenerator
  .x(d => xScale(d.value))
  .y0(height)
  .y1(d => yScale(d.clicks))
  .curve(curveMonotoneX)

const svg = select('#chart')
  .attr('width', width)
  .attr('height', height)

svg
  .append('path')
  .datum(data)
  .attr('class', 'line')
  .attr('d', curve)
  .transition()
  .duration(500)
  .ease(easeSin)
  .attrTween('d', () => {
    const interpolator = interpolateArray(startData, data)

    return t => curve(interpolator(t))
  })

svg
  .append('path')
  .data([data])
  .attr('class', 'area')
  .attr('d', fill)
  .transition()
  .duration(500)
  .ease(easeSin)
  .attrTween('d', function() {
    const interpolator = interpolateArray(startData, data)

    return t => fill(interpolator(t))
  })
