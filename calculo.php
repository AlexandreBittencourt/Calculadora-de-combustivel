<?php

$mensagem = "";

if ($_POST) {
  $distancia = $_POST['distancia'];
  $autonomia = $_POST['autonomia'];

  $valorGasolina = 5.58;
  $valorAlcool = 3.89;
  $valorDiesel = 4.27;

  if (is_numeric($distancia) && is_numeric($autonomia)) {
    if ($distancia > 0 && $autonomia >0) {
          $calculoGasolina = ($distancia / $autonomia) * $valorGasolina;
          $calculoGasolina = number_format($calculoGasolina, 2, ',', '.');
          $calculoAlcool = ($distancia / $autonomia) * $valorAlcool;
          $calculoAlcool = number_format($calculoAlcool, 2, ',', '.');
          $calculoDiesel = ($distancia / $autonomia) * $valorDiesel;
          $calculoDiesel = number_format($calculoDiesel, 2, ',', '.');

          $mensagem.= "<div class='sucesso'>";
		  $mensagem.= "O valor total gasto será de:";
		  $mensagem.= "<ul>";
	      $mensagem.= "<li><b>Gasolina:</b> R$ ".$calculoGasolina."</li>";
		  $mensagem.= "<li><b>Álcool:</b> R$ ".$calculoAlcool."</li>";
		  $mensagem.= "<li><b>Diesel</b>: R$ ".$calculoDiesel."</li>";
		  $mensagem.= "</ul>";
		  $mensagem.= "</div>";
    			# code...
         }  else  {
     	      $mensagem.= "<div class='erro'>";
			  $mensagem.= "<b>O valor da distância e da autonomia deve ser maior que zero.</b>";
			  $mensagem.= "</div>";
         }  	
  
    	# code...
     }   else {
	       $mensagem.= "<div class='erro'>";
		   $mensagem.= "<b>O valor recebido não é numérico</b>";
		   $mensagem.= "</div>";
     }

 }  else {
      $mensagem = "<div class='erro'>";
	  $mensagem.= "<b>Nenhum dado foi recebido pelo formulário</b>";
	  $mensagem.= "</div>";
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calculo de Consumo de Combustível</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<main>
		<div class="painel">
			<h2>Resultado do cálculo de consumo</h2>
			<div class="conteudo-painel">
				<?php
				echo $mensagem;
				?>
				<a class="botao" href="index.php">Voltar</a>
			</div>
		</div>
	</main>
</body>
</html>