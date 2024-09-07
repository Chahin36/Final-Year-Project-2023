@extends('adminlte::page')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{ asset("js/Chart.min.js") }}"></script>
    <script src="{{ asset("js/jquery.min.js") }}"></script>
</head>

<canvas id="équipeA" width="800" height="300"></canvas>
<canvas id="équipeB" width="800" height="300"></canvas>




<script>

$(function () {
    'use strict';
  
    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    };
  
    var mode = 'index';
    var intersect = true;
  
    var $courbeA = $('#équipeA');
    // eslint-disable-next-line no-unused-vars
    var courbeA = new Chart($courbeA, {
        type: 'line',
        data: {
            labels: [
                @foreach ($cpuA as $value)
                    "Les indicateurs",
                @endforeach
            ],
            datasets: [
                {
                    label: 'CPU',
                    data: [
                        @foreach ($cpuA as $value)
                            {{ $value->valeur }},
                        @endforeach
                    ],
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',
                    fill: false
                },
                {
                    label: 'RAM',
                    data: [
                        @foreach ($ramA as $value)
                            {{ $value->valeur }},
                        @endforeach
                    ],
                    backgroundColor: 'transparent',
                    borderColor: '#28a745',
                    pointBorderColor: '#28a745',
                    pointBackgroundColor: '#28a745',
                    fill: false
                },
                {
                    label: 'TRS',
                    data: [
                        @foreach ($trsA as $value)
                            {{ $value->valeur }},
                        @endforeach
                    ],
                    backgroundColor: 'transparent',
                    borderColor: '#dc3545',
                    pointBorderColor: '#dc3545',
                    pointBackgroundColor: '#dc3545',
                    fill: false
                }
            ]
        },
        options: {

        } //end option
    });

    
    var $courbeB = $('#équipeB');
    // eslint-disable-next-line no-unused-vars
    var courbeB = new Chart($courbeB, {
        type: 'line',
        data: {
            labels: [
                @foreach ($cpuB as $value)
                    "Les indicateurs",
                @endforeach
            ],
            datasets: [
                {
                    label: 'CPU',
                    data: [
                        @foreach ($cpuB as $value)
                            {{ $value->valeur }},
                        @endforeach
                    ],
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',
                    fill: false
                },
                {
                    label: 'RAM',
                    data: [
                        @foreach ($ramB as $value)
                            {{ $value->valeur }},
                        @endforeach
                    ],
                    backgroundColor: 'transparent',
                    borderColor: '#28a745',
                    pointBorderColor: '#28a745',
                    pointBackgroundColor: '#28a745',
                    fill: false
                },
                {
                    label: 'TRS',
                    data: [
                        @foreach ($trsB as $value)
                            {{ $value->valeur }},
                        @endforeach
                    ],
                    backgroundColor: 'transparent',
                    borderColor: '#dc3545',
                    pointBorderColor: '#dc3545',
                    pointBackgroundColor: '#dc3545',
                    fill: false
                }
            ]
        },
        options: {

        } //end option
    });
    
});


</script>


</html>
@endsection    