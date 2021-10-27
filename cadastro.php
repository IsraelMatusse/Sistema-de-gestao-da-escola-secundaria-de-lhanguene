<?php
require_once 'usuario.php';
$u= new usuarios;
 ?>


<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $nome= addslashes($_POST['nome']);
	$senha=addslashes($_POST['senha']);
	$confsenha=addslashes($_POST['confsenha']);
$u->conectar("sis_login", "localhost", "root", "");
if(!empty($nome) && !empty($senha)){
    if($u->msgerro==""){
        if($senha==$confsenha){
            if($u->cadastrar($nome, $senha)){
            ?>
            <script type="text/javascript">
            	window.alert('Cadastrado com sucesso!')
            </script>
			   // header('location: 15deagosto.html');
			   <?php
            }else{
                echo "nome e senha ja cadastrados, tente outro ou faca login";
            }
        }else{
            echo "Digitou a senha erradamente, reveja";
        }
    }else{
        echo "erro:". $u->msgerro;
    }
}else{
    echo "Preencha todos os campos";
}}
/*

	
	
	
		
	
			if($u->cadastrar($id_usuario,$nome,$telefone, $email, $senha)){
				echo"cadastrado com sucesso";
			}else{
				echo "email ja cadastrado";
			}
		}else{
			echo"digitou senha errada, reveja";
		}
	}else{
		echo "erro:". $u->msgerro;
	}
	}else{
		echo "preencha todos os campos";
	}}
*/

     ?>
