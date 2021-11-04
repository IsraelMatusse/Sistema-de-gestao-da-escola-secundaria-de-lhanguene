<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Gestão de Professor </title> 
	  <link rel="stylesheet" href="css/telainicial.css">
	  <link rel="stylesheet" href="css//bootstrap.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  	  
  	</head>
		  <body>

			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">ESLH</a>
				</div>
				
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.html">Início</a></li>
						<li><a href="#">Enviar Convocatória</a></li>
						<li><a href="#">Responder Solicitação</a></li>
					</ul>
				</div>
			</nav>
			
			<div class="row">
				<div class="col-md-10"></div>
				<div class="col-md-1"><h5 class="txt-danger"> Professor</h5></div>
			</div>
			

			<div class="linha">
			</div>


	   <div class="container">

      <form action=""  method="POST" name="formulario" > 
		 <div>
			  <div class="form-group">
			  <label for="nomeecn">Nome do Encaregado</label>
			  <input type="text" class="form-control" id="nomeecn" placeholder="Digite o nome do encaregado" required="" >
				</div>
				<div class="form-group">
				  <label for="nomeal">Nome do Aluno</label>
				  <input type="text" class="form-control" id="nomeal" placeholder="Digite o nome do aluno" required="" >
			   </div>
			    <div class="row">
			     <div class="col-xs-6">
				  <label for="data">Data</label>
				  <input type="date" class="form-control" id="data" placeholder="Digite a data" required="" >
				</div>
				 <div class="col-xs-6">
				  <label for="hora">Hora</label>
				  <input type="time" class="form-control" id="hora" placeholder="Digite a hora" required="" >
			   </div>
			   </div>
			  	<div class="form-group">
				  <label for="nomeal">Assunto</label><br>
  				  <textarea class="form-control" rows="5" id="assunto"></textarea>
			   </div>
			   <br>
				<div class="form-group">
			  <button type="button"  class="btn btn-danger">Agendar</button>
			</div>
		</div>
	</form>
	</div>
	<footer class=footer>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			  <div>
				  Copyright &copy; Escola Secundária de Lhanguene. Todos os direitos reservados
				</div> 
			</div>
			<div class="col-md-2"></div>
		</div>
		</footer> 

		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeecn = filter_input(INPUT_POST, 'nomeecn');
    $nomeal = filter_input(INPUT_POST, 'nomeal');
    $data= filter_input(INPUT_POST, 'data');
    $hora=filter_input(INPUT_POST, 'hora');
    $assunto=filter_input(INPUT_POST, 'assunto');

    /* validar os dados recebidos do formulario */ 
    if (empty($nomeecn) || empty($nomeal) || empty($data)  || empty($hora)  || empty($assunto)){
        echo "Todos os campos do formulário devem estar preenchidos ";
        exit();
    }    
}
else{
   echo " Erro, formulário não submetido ";
   exit();
} 

/* estabelece a ligação à base de dados */
$conexao = new mysqli("localhost", "root", "sis_gestao_esc_lhanguene");

/* verifica se ocorreu algum erro na ligação */
if ($conexao->connect_errno) {
    echo "Falha na ligação: " . $conexao->connect_error; 
    exit();
}

/* texto sql da consulta*/
$consulta = "INSERT INTO reunicao (id, nome) VALUES ('$nomeal', '$nomeenc','$da', '$hora','$assunto' )";

/* executar a consulta e testar se ocorreu erro */
if (!$conexao->query($consulta)) {
    echo " Falha ao executar a consulta: \"$consulta\" <br>" . $conexao->error;
    $conexao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    echo " Agendado com Sucesso com sucesso" ;
    }

$conexao->close();       /* fechar a ligação */

?>

