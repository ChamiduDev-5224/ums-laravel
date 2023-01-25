@extends('users.layout')
{{-- session --}}
@php
$role=session('role');
@endphp

{{-- main content --}}
<div>
    <div>
        {{-- header --}}
        @include('layouts.header')

        <button class="btn btn-warning mt-3 mx-5 px-4" >
            {{-- back button --}}
            @if ($role=='data_entry')
            <a class="text-light" href="{{url('/operator-dashboard')}}">Back</a>
            @else
            <a class="text-light" href="{{url('/viewer-dashboard')}}">Back</a>
            @endif
        </button>
    </div>

  <div class="d-flex flex-column mt-2">
    {{-- pie chart --}}
    <div class="border mx-5">
        <div id="piechart_3d" class="w-full"></div>
    </div>
     {{-- bar chart --}}
    <div class="border mx-5">
        <span class="text-bold">This week added peoples</span>
        <div id="chart-div"></div>
    </div>
</div>
</div>

{{-- pie chart --}}
<script>
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['users', 'Number of users'],
          ['Viewers',     {{$viewersCount}}],
          ['Operators',   {{$operatorsCount}}],
          ['Persons',  {{$personCount}}],
        ]);

        var options = {
          title: 'Interacted persons in the system',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
</script>
{{-- barchart --}}
<script>
      google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);

      function drawChart() {
        const dataTable = new google.visualization.DataTable();
        dataTable.addColumn({type: 'string', 'id': 'category'});
        dataTable.addColumn({type: 'number', 'id': 'amount'});
        dataTable.addRows([@php
        foreach($dates as $x => $val) {
        echo "['".substr($x,5)."', ".$val."],";
    }
        @endphp]);

        const options = {
          "vega": {
            "$schema": "https://vega.github.io/schema/vega/v4.json",
            "width": 250,
            "height": 200,
            "padding": 5,

            'data': [{'name': 'table', 'source': 'datatable'}],

            "signals": [
              {
                "name": "tooltip",
                "value": {},
                "on": [
                  {"events": "rect:mouseover", "update": "datum"},
                  {"events": "rect:mouseout",  "update": "{}"}
                ]
              }
            ],

            "scales": [
              {
                "name": "xscale",
                "type": "band",
                "domain": {"data": "table", "field": "category"},
                "range": "width",
                "padding": 0.05,
                "round": true
              },
              {
                "name": "yscale",
                "domain": {"data": "table", "field": "amount"},
                "nice": true,
                "range": "height"
              }
            ],

            "axes": [
              { "orient": "bottom", "scale": "xscale" },
              { "orient": "left", "scale": "yscale" }
            ],

            "marks": [
              {
                "type": "rect",
                "from": {"data":"table"},
                "encode": {
                  "enter": {
                    "x": {"scale": "xscale", "field": "category"},
                    "width": {"scale": "xscale", "band": 1},
                    "y": {"scale": "yscale", "field": "amount"},
                    "y2": {"scale": "yscale", "value": 0}
                  },
                  "update": {
                    "fill": {"value": "steelblue"}
                  },
                  "hover": {
                    "fill": {"value": "red"}
                  }
                }
              },
              {
                "type": "text",
                "encode": {
                  "enter": {
                    "align": {"value": "center"},
                    "baseline": {"value": "bottom"},
                    "fill": {"value": "#333"}
                  },
                  "update": {
                    "x": {"scale": "xscale", "signal": "tooltip.category", "band": 0.5},
                    "y": {"scale": "yscale", "signal": "tooltip.amount", "offset": -2},
                    "text": {"signal": "tooltip.amount"},
                    "fillOpacity": [
                      {"test": "datum === tooltip", "value": 0},
                      {"value": 1}
                    ]
                  }
                }
              }
            ]
          }
        };

        const chart = new google.visualization.VegaChart(document.getElementById('chart-div'));
        chart.draw(dataTable, options);
      }
    </script>
{{-- <script src="{{ mix('/js/app.js') }}"></script> --}}

