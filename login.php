<?php
require_once 'usuario.php';
$u= new usuarios;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        input{
            display: block;
            height: 20px;
            width: 150px;
            margin: 10px;
            border-radius: 30px;
            border: 1px solid black;
        
    
        }
        a{
            color: black;
            text-decoration: none;
        }
    
       a:hover{
        text-decoration: underline;
       }
    
        form{
            width: 420px;
            margin: 150px auto 0px auto;
            
        }
        input[type=submit]{
            background-color: palevioletred;
            border: none;
        }
       
        </style>
    
</head>
<body>
    <div  id="Login" >
      
        <form action="" method="POST">
              <h2>Login</h2>
    <p>
        <label for="nome">nome</label>
        <input type="text" name="nome" id="tl" maxlength="30">
    </p>
    <p>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="tl" maxlength="10">
    </p> 
    <p>

<p>
    <input type="submit" value="Login" id="btn">
</p>
</form>
    </div>
    <p>
       
    </p>

<?php 
//include 'conexao.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
//$senha=$_POST['senha'];
$nome=$_POST['nome'];

//$e="Dados invalidos, tente novamente";

    $u->conectar("sis_login", "localhost", "root", "");
    if(!empty($nome) ){
        if($u->login($nome)){
            echo "acesso concedido";;
        }else{
            echo"nao possue conta, pretende se cadastrar?";}

        }else{
            echo "preencha os campos";
        }

}

?>