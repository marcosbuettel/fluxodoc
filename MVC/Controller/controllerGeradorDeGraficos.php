<?php 
	
	include("controllerGerarGraficoSexo.php");	
	include("controllerGerarGraficoIdade.php");	
	include("controllerGerarGraficoContato.php");
	include("controllerGerarGraficoTipoLead.php");

?>

<script type="text/javascript">

	google.charts.load('current', {'packages':['corechart']});

	function gerarGrafico(tipo){

		$('.janela-modal-grafico').slideToggle();

		gerarGraficoSexo(tipo);
		gerarGraficoIdade(tipo);
		gerarGraficoContato(tipo);
		gerarGraficoTipoLead(tipo);
	}

	function gerarGraficoSexo(tipo) {
	  var data = google.visualization.arrayToDataTable([
          ['Sexo', 'Quantidade'],
          ['Masculino', <?= $masculino?>],
          ['Feminino',  <?= $feminino?>],
        ]);

	    var options = {
	      title: 'Sexo',
	      curveType: 'function',
	      legend: { position: 'bottom' }
	    };

	    if(tipo == 0){
	    	var chart = new google.visualization.PieChart(document.getElementById('sexo_chart'));
	    }else if(tipo == 1){
	    	var chart = new google.visualization.BarChart(document.getElementById('sexo_chart'));
	    }else{
	    	var chart = new google.visualization.ScatterChart(document.getElementById('sexo_chart'));
	    }

	    chart.draw(data, options);
	}

	function gerarGraficoIdade(tipo) {
	  var data = google.visualization.arrayToDataTable([
          ['Idade', 'Quantidade'],
          ['18-24', <?= $entre18e24?>],
          ['25-34',  <?= $entre25e34?>],
          ['35-44',  <?= $entre35e44?>],
          ['45-54',  <?= $entre45e54?>],
          ['55-64',  <?= $entre55e64?>],
          ['65+',  <?= $mais65?>],
        ]);

	    var options = {
	      title: 'Idade',
	      curveType: 'function',
	      legend: { position: 'bottom' }
	    };

	    if(tipo == 0){
	    	var chart = new google.visualization.PieChart(document.getElementById('idade_chart'));
	    }else if(tipo == 1){
	    	var chart = new google.visualization.BarChart(document.getElementById('idade_chart'));
	    }else{
	    	var chart = new google.visualization.ScatterChart(document.getElementById('idade_chart'));
	    }

	    chart.draw(data, options);
	}

	function gerarGraficoContato(tipo) {
	  var data = google.visualization.arrayToDataTable([
          ['Origem do contato', 'Quantidade'],
          ['Base', <?= $base?>],
          ['Indicação',  <?= $indicacao?>],
          ['Indicação Parceiro',  <?= $indicacaoParceiro?>],
          ['Doctoraria',  <?= $doctoraria?>],
          ['Google',  <?= $google?>],
          ['Facebook',  <?= $facebook?>],
          ['Instagram',  <?= $instagram?>],
          ['Youtube',  <?= $youtube?>],
          ['Site',  <?= $site?>],
          ['Radio',  <?= $radio?>],
          ['TV',  <?= $tv?>],
          ['Jornal',  <?= $jornal?>],
          ['Revista',  <?= $revista?>],
          ['Outdoor',  <?= $outdoor?>],
          ['Panfleto',  <?= $panfleto?>],
        ]);

	    var options = {
	      title: 'Contato',
	      curveType: 'function',
	      legend: { position: 'bottom' }
	    };

	    if(tipo == 0){
	    	var chart = new google.visualization.PieChart(document.getElementById('contato_chart'));
	    }else if(tipo == 1){
	    	var chart = new google.visualization.BarChart(document.getElementById('contato_chart'));
	    }else{
	    	var chart = new google.visualization.ScatterChart(document.getElementById('contato_chart'));
	    }

	    chart.draw(data, options);
	}

	function gerarGraficoTipoLead(tipo) {
	  var data = google.visualization.arrayToDataTable([
          ['Origem do contato', 'Quantidade'],
          ['Entrou em contato', <?= $entrouContato?>],
          ['Marcou consulta',  <?= $marcouConsulta?>],
          ['Agendou tratamento',  <?= $agendouTratamento?>],
        ]);

	    var options = {
	      title: 'Tipo de Lead',
	      curveType: 'function',
	      legend: { position: 'bottom' }
	    };

	    if(tipo == 0){
	    	var chart = new google.visualization.PieChart(document.getElementById('tipo_lead_chart'));
	    }else if(tipo == 1){
	    	var chart = new google.visualization.BarChart(document.getElementById('tipo_lead_chart'));
	    }else{
	    	var chart = new google.visualization.ScatterChart(document.getElementById('tipo_lead_chart'));
	    }

	    chart.draw(data, options);
	}
</script>