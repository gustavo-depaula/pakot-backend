<?php
function sendEmail($email){
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.mailgun.org';
	$mail->SMTPAuth = true;
	$mail->Username = 'no_reply@usepakot.com';
	$mail->Password = 'noreply';
	$mail->SMTPSecure = 'ssl';
	$mail->Port= 465;
	$mail->From = 'no_reply@usepakot.com';
	$mail->FromName = 'Servico Pakot';
	$mail->CharSet = 'UTF-8';
	$mail->addAddress($email,"Novo Usuario");
	$mail->isHTML(true);

	$mail->Subject = 'Bem vindo ao servico Pakot!';
	$mail->Body    = file_get_contents(HTMLEMAILPATH);

	$result = $mail->send(); 
	if(!$result)
		return 'Mailer Error: ' . $mail->ErrorInfo . "\n";
	else 
		return 'done';
}

?>