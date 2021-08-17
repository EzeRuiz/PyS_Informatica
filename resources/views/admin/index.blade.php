@extends('adminlte::page')

@section('title', 'BLOG')

@section('content_header')
    <h1>ADMISTRADOR DE BLOG</h1>
@stop

@section('content')
    <style>
        .grafico{
            width: 100%;
            height: 100%;
        }
    </style>
   <div class="container">
       <div class="row">
           <div class="col-12">
            <label>Usuarios que más publican</label>
            <br>
                <canvas id="myChart" class="grafico"></canvas>
         
           </div>
       </div>   
   </div>
   <hr>
   <div class="container">
    <div class="row">
        <div class="col-12">
         <label>Post mas leidos</label>
         <br>
             <canvas id="myChart1" class="grafico"></canvas>
      
        </div>
    </div>   
</div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($nombres as $nombre)
                    '{{$nombre->find($nombre->user_id)->user->name}}',
                    @endforeach                   
                    ],
                datasets: [{
                    label: 'Posts',
                    data: [
                        @foreach ($cantidad as $cant)
                            {{$cant->total}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
          <script>
        
            var ctx = document.getElementById('myChart1');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($posts as $post)
                        '{{$post->name}}',
                        @endforeach                   
                        ],
                    datasets: [{
                        label: 'Posts',
                        data: [
                            @foreach ($posts as $post)
                                {{$post->visitas}},
                            @endforeach
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
@stop