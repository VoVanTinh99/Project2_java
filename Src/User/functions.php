<?php
function sendMail($title, $content, $To){
	$nFrom = 'Windsor Shop';
	$mFrom = 'ntctuyen.ctu@gmail.com';	
	$mPass = 'Trymybest0!!!!7';		
	$mail             = new PHPMailer();
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     
	$mail->SMTPAuth   = true;                  
	$mail->SMTPSecure = "ssl";                 
	$mail->Host       = "smtp.gmail.com";      	
	$mail->Port       = 465;
	$mail->Username   = $mFrom;  
	$mail->Password   = $mPass;           	 
	$mail->SetFrom($mFrom, $nFrom);
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $To;
	$mail->AddAddress($address, $To);
	$mail->AddReplyTo('ntctuyen.ctu@gmail.com', 'Windsor.com');
	$mail->Send();
}

?>