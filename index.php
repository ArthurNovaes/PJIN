<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>MonOP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="shortcut icon" href="img/icone.ico">

</head>
<body>
	<div class="container">

		<?php include "header.html"; ?>
    <?php include "dashboard.php";

          $dashboard = new Dashboard();
          $dashboard->init();
          //echo $dashboard->getTotalObrasStatusNaoInformado();
     ?>
		<!--<h1>Estados onde estão ocorrendo obras do PAC</h1>-->

    <!-- MAIOR INVESTIMENTO / MENOR INVESTIMENTO / MEDIA DE INVESTIMENTO -->

		<script type="text/javascript" src="js/jsapi.js"></script>
    	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Estagio', 'TotalObras'],
          ['Em Execução', <?php echo $dashboard->getTotalObrasStatusEmExecucao(); ?>],
          ['Em Obras', <?php echo $dashboard->getTotalObrasStatusEmObras(); ?>],
          ['Em contratação', <?php echo $dashboard->getTotalObrasStatusEmContratacao(); ?>],
          ['Em licitação de obra', <?php echo $dashboard->getTotalObrasStatusEmLicitacao(); ?>],
          ['Concluído', <?php echo $dashboard->getTotalObrasStatusConcluido();?>]
        ]);

        var options = {
          title: 'Porcentagem por Status',
          backgroundColor: 'fff'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Médio", <?php echo $dashboard->getMediaInvestimento(); ?>, "#b87333"],
        ["Maior", <?php echo $dashboard->getMaiorInvestimento(); ?>, "silver"],
        ["Menor", <?php echo $dashboard->getMenorInvestimento(); ?>, "gold"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Investimento",
        width: 600,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("piechart2"));
      chart.draw(view, options);
      }

    </script>
  </head>
  <body>
    <h1>MONITORAMENTO DE OBRAS PÚBLICAS</h1>
    <div class="container" style="margin-top: 10%;">

      <div class="row">
        <div class="col-md-5">
          <div id="piechart" style="width: 400px; height: 300px;"></div>
        </div>
        <div class="col-md-5">
          <div id="piechart2"></div>
        </div>
      </div>
    </div>

  </body>
		
	</div>
	<?php include "footer.html"; ?>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>