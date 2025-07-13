<?php 
//if(!empty(isset())):endif;

$guarnicao = new  App\Models\EquipesAdminModel();
$usuarios = new App\Models\UsuariosAdminModel();
$veiculos = new App\Models\ViaturasModel();
$fichaCentral = new App\Models\FichaCentralAdminModel();

//equipes
$equipe = $guarnicao->equipesTotal();
//solicitante
$solicitanteTotal = $fichaCentral->SolicitanteTotal();
//usuarios
$utilizadores = $usuarios->usuariosTotal();
//viaturasTotal
$viaturasTotal = $veiculos->viaturasTotal();
//ocorrencias
$incendioTotal = $fichaCentral->incendioTotal();
$acidenteTotal = $fichaCentral->acidenteTotal();
$obstetricoTotal = $fichaCentral->obstetricoTotal();
$clinicoTotal = $fichaCentral->clinicoTotal();
//incendio
if (!empty(isset($incendioTotal))) : settype($incendioTotal['total_incendio'], "integer");
endif;
//acidentes
if (!empty(isset($acidenteTotal))) : settype($acidenteTotal['total_acidentes'], "integer");
endif;
//obstétrico
if (!empty(isset($obstetricoTotal))) : settype($obstetricoTotal['total_obstetrico'], "integer");
endif;
//clínico
if (!empty(isset($clinicoTotal))) : settype($clinicoTotal['total_clinico'], "integer");
endif;
//total de todas ocorrências
$totalOcorrencias = $incendioTotal['total_incendio'] +  $acidenteTotal['total_acidentes'] + $obstetricoTotal['total_obstetrico'] + $clinicoTotal['total_clinico'];
if(!empty(isset($totalOcorrencias))):
   $totalOcorrencia;
endif;
$ocorrencias = array(
   array('Incêndios', $incendioTotal['total_incendio']),
   array('Acidentes', $acidenteTotal['total_acidentes']),
   array('Obstétrico', $obstetricoTotal['total_obstetrico']),
   array('Cliníco', $clinicoTotal['total_clinico']),
   array('Total', $totalOcorrencias)
);

$ocorrencias2 = array(
   array( $incendioTotal['total_incendio']),
   array( $acidenteTotal['total_acidentes']),
   array( $obstetricoTotal['total_obstetrico']),
   array($clinicoTotal['total_clinico']),
   array($totalOcorrencias)
);
// Converta os dados para o formato JSON
$dadosOcorrencias = json_encode($ocorrencias);
$dadosOcorrencias2 = json_encode($ocorrencias2);

?>
<!-- 4-blocks row end -->
<div class="row dashboard-header">
   <div class="col-lg-3 col-md-6">
      <div class="card dashboard-product">
         <span>Usuários</span>
         <h2 class="dashboard-total-products"><?php if(!empty(isset($utilizadores))): echo $utilizadores['total_usuarios']; endif;?></h2>
         <span class="label label-warning">Ativos</span> Efectivos
         <div class="side-box">
            <i class="ti-user text-warning-color"></i>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-md-6">
      <div class="card dashboard-product">
         <span>viaturas</span>
         <h2 class="dashboard-total-products"><?php if(!empty(isset($viaturasTotal))): echo $viaturasTotal['total_viaturas']; endif;
      ?></h2>
         <span class="label label-primary">Ativos</span> Operacionais
         <div class="side-box ">
            <i class="ti-car text-primary-color"></i>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-md-6">
      <div class="card dashboard-product">
         <span>Solicitantes</span>
         <h2 class="dashboard-total-products"><?php if(!empty(isset($solicitanteTotal))): echo $solicitanteTotal['solicitante_Total']; endif;?></h2>
         <span class="label label-success">Ativos</span> Frequentes
         <div class="side-box">
            <i class="ti-headphone text-success-color"></i>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-md-6">
      <div class="card dashboard-product">
         <span>Equipes</span>
         <h2 class="dashboard-total-products"><span><?php if(!empty(isset($equipe))): echo $equipe['total_equipes']; endif;?></span></h2>
         <span class="label label-danger">Ativos</span>Acionados
         <div class="side-box">
            <i class="ti-id-badge text-danger-color"></i>
         </div>
      </div>
   </div>
</div>
<!--Bar CHART-->
<div class="col-lg-8">
   <div class="card">
      <div class="card-header">
         <h5 class="card-header-text">Total das Ocorrências</h5>
      </div>
      <div class="card-block">
         <div id="barchart" style="min-width: 250px; height: 330px; margin: 0 auto"></div>
      </div>
   </div>
</div>
<div class="col-xl-4 col-lg-12">
   <div class="card">
      <div class="card-header">
         <h5 class="card-header-text">Cidades mais Frequentes</h5>
      </div>
      <div class="card-block">
         <div id="apexcharts-pie" style="min-width: 250px; height: 330px; margin: 0 auto"></div>
      </div>
   </div>
</div>
<!--<div class="col-lg-8">
   <div class="card">
      <div class="card-header">
         <h5 class="card-header-text">Total das Ocorrências</h5>
      </div>
      <div class="card-block">
      <div id="apexcharts-polar-area" style="width: 500px; height: 400px;"></div>

      </div>
   </div>
</div>

<div class="col-xl-4 col-lg-12">
   <div class="card">
      <div class="card-header">
         <h5 class="card-header-text">Cidades mais Frequentes</h5>
      </div>
      <div class="card-block">
         <div id="apexcharts-doughnut" style="min-width: 250px; height: 400px; margin: 0 auto"></div>
      </div>
   </div>
</div>
-->

<script>
   document.addEventListener('DOMContentLoaded', function() {

      var dados = <?php echo $dadosOcorrencias; ?>;

      var ocorrencias = [];
      var valores = [];

      for (var i = 0; i < dados.length; i++) {
         ocorrencias.push(dados[i][0]);
         valores.push(dados[i][1]);
      }

//alert(ocorrencias);
      Highcharts.chart('barchart', {
         chart: {
            type: 'column'
         },
         title: {
            text: 'Tipos de Ocorrências'
         },
         xAxis: {
            categories: ocorrencias
         },
         yAxis: {
            title: {
               text: 'Valores'
            }
         },
         series: [{
            name: 'Ocorrências',
            data: valores
         }]
      });
   });

 document.addEventListener('DOMContentLoaded', function() {
   var dados = <?php echo $dadosOcorrencias; ?>;

var ocorrencias = [];
var valores = [];
for (var i = 0; i < dados.length; i++) {
   ocorrencias.push(dados[i][0]);
   valores.push(dados[i][1]);
}
//alert(valores);
//alert(ocorrencias)

    var options = {
  chart: {
    height: 350,
    type: "donut",
  },
  dataLabels: {
    enabled: true,
  },
   series: valores,

}
var chart = new ApexCharts(
  document.querySelector("#apexcharts-doughnut"),
  options
);
chart.render();

    //-------
    //pie
  // Seu código JavaScript para o gráfico de pizza
  var options = {
    chart: {
      height: 350,
      type: "pie",
    },
    dataLabels: {
      enabled: true,
    },
    series: valores,
  
    
    
 
  };

  var chart = new ApexCharts(
    document.querySelector("#apexcharts-pie"),
    options
  );

  chart.render();


//---------------
//polarArea
var options = {

  series: valores,
  chart: {
    height: 350,
    type: 'polarArea',
  },
  stroke: {
    colors: ['#fff']
  },
  fill: {
    opacity: 0.8
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
};

var chart = new ApexCharts(document.querySelector("#apexcharts-polar-area"), options);
chart.render();

});

  // Código JavaScript
  var ctx = document.getElementById("chartjs-pie").getContext('2d');
  var myChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ocorrencias,
      datasets: [{
        data: valores,
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)',
          'rgba(54, 162, 235, 0.7)',
          'rgba(255, 206, 86, 0.7)',
          'rgba(75, 192, 192, 0.7)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
      cutoutPercentage: 65,
    }
  });
</script>
