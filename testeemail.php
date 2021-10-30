<?php 
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail= new PHPMailer(true);

try{
$mail->SMTPDebug=SMTP::DEBUG_SERVER;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->isSMTP();
$mail->Host= 'smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username='israelmathusse451@gmail.com';
$mail->Password='19601961mp';
$mail->Port=587;

$mail->setFrom('israelmathusse451@gmail.com');
$mail->addAddress('israelmathusse451@gmail.com');

$mail->isHTML(true);
$mail->Subjet='Teste de email via gmail israel mathusse';
$mail->Body='Chegou o email do <strong> Israel Matusse </strong>';

if($mail->send()){
	echo "email enviado com sucesso";
}else{
	echo "falha no envio do email";
}

}catch(Exception $e){
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}