<?php
class usuarios{
private $pdo;
public $msgerro="";
public function conectar( $nome,$host, $usuario, $senha)
{global $msgerro;
	global $pdo;
	try{
	$pdo= new PDO("mysql:dbname=".$nome. ";host=".$host, $usuario, $senha);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully";
}catch(PDOException $e){
$msgerro=$e->getmessage();
}
}
public function cadastrar( $nome, $senha){
global $pdo;
//verificar se ja existe cadastro
$sql=$pdo->prepare("SELECT  id_usuarios FROM usuarios  WHERE nome_usuario = :n  ");
$sql->bindValue(":n", $nome);
$sql->execute();
if($sql->rowcount()>0){
	return false;
} else {
//cadastrar
$sql=$pdo->prepare("INSERT INTO usuarios ( nome_usuario,senha )
	VALUES(:n,:s)");
$sql->bindValue(":n", $nome);
$sql->bindValue(":s", md5($senha));
$sql->execute();
return true;
}



}
public function login($nome){
global $pdo;
//verificar se o email e senha existem
$sql=$pdo->prepare("SELECT id_usuarios FROM usuarios WHERE nome_usuario=:n ");
$sql->bindValue(":n", $nome);
//$sql->bindValue(":s", md5($senha));
$sql->execute();
if($sql->rowcount()>0){
$dados=$sql->fetch();
session_start();
$_SESSION['id_usuario']=$dados['id_usuario'];
return true;
}else{
return false;
}
//entrar com sessao
}
}

 ?>