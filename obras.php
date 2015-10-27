<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<?php 
		$busca=$_GET['uf'];
		echo "<title>Monop - ".$busca."</title>";
	?>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="shortcut icon" href="img/icone.ico">
</head>
<body>
	<div class="container">

		<?php 
			include "header.html";
			$string = file_get_contents("convertcsv.json");
			$result = json_decode($string); 
		?>
			<div class="row">			
				<br>
				<fieldset><legend><h1>Obras do Estado de(o/a) <?php echo $busca; ?></h1></legend>
					<?php
					$i=1;
					while($i<count($result))
					{
						$idn_empreendimento = $result[$i]->idn_empreendimento;
						$idn_digs = $result[$i]->idn_digs;
						$dsc_titulo = $result[$i]->dsc_titulo;
						$investimento_total = $result[$i]->investimento_total;
						if($investimento_total=="")
						{
							$investimento_total="Não foi Informado";
						}
						$sig_uf = $result[$i]->sig_uf;
						$txt_municipios = $result[$i]->txt_municipios;
						$txt_executores = $result[$i]->txt_executores;
						$dsc_orgao = $result[$i]->dsc_orgao;
						$idn_estagio = $result[$i]->idn_estagio;
						switch ($idn_estagio) {
							case 0: $estagio = "Não informado";
									$descricao_estagio="";
									break;
							case 3: $estagio = "A selecionar";
									$descricao_estagio="Empreendimentos que ainda serão selecionados da área social"; 
									break;
							case 5: $estagio = "Em contratação"; 
									$descricao_estagio="Empreendimento selecionado, em processo de envio ou análise de documentação para a contratação.";
									break;
							case 10: $estagio = "Ação Preparatória"; 
									$descricao_estagio="1-Para a área de Infraestrutura Logística e de Energia: empreendimento em etapa prévia à licitação, à contratação ou ao início da execução. <br>2-Para a área Social e Urbana: empreendimento contratado, em fase de preparação para iniciar a licitação.";
									break;
							case 40: $estagio = "Em licitação de obra"; 
									$descricao_estagio="Empreendimento em fase de licitação de obra ou licitação concluída, mas sem ordem de serviço.";
									break;
							case 41: $estagio = "Em licitação de projeto";
									$descricao_estagio="Empreendimento cuja meta é a realização de estudo, projeto, plano, assistência técnica ou desenvolvimento institucional, em fase de licitação.";
									break;
							case 70: $estagio = "Em obras";
									$descricao_estagio="Empreendimento com ordem de início autorizada ou obra já iniciada.";
									break;
							case 71: $estagio = "Em execução";
									$descricao_estagio="Empreendimento já iniciado cuja meta é a realização de estudo, projeto, plano, assistência técnica ou desenvolvimento institucional.";
									break;
							case 90: $estagio = "Concluído";
									$descricao_estagio="Empreendimento concluído, ou obra física concluída, ou estudo, projeto ou contratação finalizados.";
									break;
							case 91: $estagio = "Em operação";
									$descricao_estagio="Empreendimento da área de Petróleo e Gás, que já entrou em operação, porém ainda não foi concluído.";
									break;
								break;
							
							default:
								$estagio = "Não há dados";
								$descricao_estagio="";
								break;
						}
						$dat_ciclo = $result[$i]->dat_ciclo;
						$dat_selecao = $result[$i]->dat_selecao;
						$dat_conclusao_revisada = $result[$i]->dat_conclusao_revisada;
						$val_lat = $result[$i]->val_lat;
						$val_long = $result[$i]->val_long;
						$emblematica = $result[$i]->emblematica;
						$observacao = $result[$i]->observacao;


						$estado = strpos($sig_uf, $busca);
						if($estado)
						{
							echo "<fieldset><legend style='width:30%;' align='left'>".$dsc_titulo."</legend>";
							//echo "<h2>".$dsc_titulo."</h2>";
							echo "<div class='row'>";
								echo "<div class='col-sm-4'>";
									echo "<label>Investimento Total: </label> ".$investimento_total;
								echo "</div";
								echo "<div class='col-sm-4'>";
									echo "<label>Estados onde esta sendo Realizado: </label> ".$sig_uf;
								echo "</div>";
								echo "<div class='col-sm-4'>";
									echo "<label>Municipios onde esta sendo Realizado: </label> ".$txt_municipios;
								echo "</div>";
							echo "</div>";
							echo "<div class='row'>";
								echo "<div class='col-sm-4'>";
									echo "<label>Órgão Responsável pela execução do empreendimento: </label> ".$txt_executores;
								echo "</div>";
								echo "<div class='col-sm-4'>";
									echo "<label>Órgão Responsável pelo monitoramento do empreendimento: </label> ".$dsc_orgao;
								echo "</div>";
								echo "<div class='col-sm-4'>";
									echo "<label>Estágio do empreendimento: </label> ".$estagio; //fazer a descrição.. modal...
								echo "</div>";
							echo "</div>";
							echo "<div class='row'>";
								echo "<div class='col-sm-4'>";
									echo "<label>Data limite de atualizações das informações do empreendimento: </label> ".$dat_ciclo;
								echo "</div>";
								echo "<div class='col-sm-4'>";
									echo "<label>Data em que o empreendimento foi selecionado e incluído na carteira de projetos do PAC: </label> ".$dat_selecao;
								echo "</div>";
								echo "<div class='col-sm-4'>";
									echo "<label>Data de conclusão do empreendimento atualizada e revisada: </label> ".$dat_conclusao_revisada;
								echo "</div>";
							echo "</div>";
							echo "<div class='row'>";
								echo "<div class='col-sm-4'>";
									echo "<label>Observação: </label> ".$observacao;
								echo "</div>";
							echo "</div>";
							echo "</fieldset><br>";
						}
						$i++;
					}					
				?>

				</fieldset>
			
			</div>
		</div>
		<?php include "footer.html"; ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>	