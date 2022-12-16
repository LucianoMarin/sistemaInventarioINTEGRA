@auth
@extends('main.pagina_principal')
@section('content')
  @php
  $cont=0;
  @endphp

  <script src="{{ asset('chart.js/chart.js') }}"></script>
<div class="contenedor">
<div class="container">
<div class="row">
<div class="col-md-4"> 
<h1 class="estiloTitulos">Bienvenido usuario:</h1>
<div class="card">
  <div class="card-body">
    
<h1 class="estiloTitulos2">{{auth()->user()->name}}</h1>
<br>
<br>
<h1 class="estiloTitulos">Accesos rapidos:</h1>
<br>
<a href="register">
<input class="btnEstilo2" type="button" style="" value="Crear cuenta">
</a>
<a href="prestamo">
<input class="btnEstilo3" type="button" value="Gestión Prestamo">
</a>
<a href="devolucion">
<input class="btnEstilo4" type="button" value="Gestión Devolucion">
</a>
</div>  
</div>  
</div>  




<div class="col-md-3"> 
  
</div>   
<div class="col-md-3">
  
<h1 class="estiloTitulos">N° TRABAJADORES:</h1>
<div class="card">


<img src="image/bannerOf.png" class="card-img-top" alt="...">
  <div class="card-body">
<div class="contenedor2">   
<div class="centrado">   
<label>@foreach($trabajador as $trabajador)
@php
$cont=$cont+1;
@endphp
@endforeach
<p>@php echo $cont;
@endphp</p>
</label>
</div>
</div>
</div>
</div>


<br>
</div>
<div class="col-md-12">    
<br>
<br>
<h1 class="estiloTitulos"></h1>

<div class="cDPrincipal"> 
<br>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<style type="text/css">
    body{
        font-family: 'Roboto Mono', monospace;
    }
    h1{
        text-align: center;
        font-size:35px;
        font-weight:900;
    }
</style>
    
<body>
    <canvas id="myChart" height="80px"></canvas>
</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};
  



const data = {
  labels: labels,
  datasets: [{
    label: 'CANTIDAD DE PRESTAMOS',
    data: users,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

  
    const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
  
</script>
</div>
</div>
</div>
</div>
<br>
<br>
<br>
<br>



@endsection
@endauth
