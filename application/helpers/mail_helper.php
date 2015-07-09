<?php
function mail_send($param,$isHTML) {
 	require_once "Mail.php";
	require_once "Mail/mime.php";
 
 	$from = $param['from'];
 	$to = $param['to'];
 	$subject = $param['subject'];
 	$message = $param['message'];

	$mime_params = array(
  		'text_encoding' => '7bit',
		'text_charset'  => 'UTF-8',
		'html_charset'  => 'UTF-8',
		'head_charset'  => 'UTF-8'
	);
 
 	$host = "mail.desitiffani.my.id";
 	$username = "admin@desitiffani.my.id";
 	$password = "skilaboodb";

	// create a new Mail_Mime for use
 	$mime = new Mail_mime();
	if($isHTML == false){ 
		// define body for Text only receipt
 		$mime->setTXTBody($message); 
	}else{
 		// define body for HTML capable recipients
 		$mime->setHTMLBody($message);
	}
 
 	$headers = array ('From' => $from,
   			    'To' => $to,
   			    'Subject' => $subject,
			    'Content-Type'  => 'text/html; charset=UTF-8');
	$body = $mime->get($mime_params);
	$headers = $mime->headers($headers);

 	$smtp = Mail::factory('smtp',
   	array ('host' => $host,
     		'auth' => true,
     		'username' => $username,
     		'password' => $password));
 
 	$mail = $smtp->send($to, $headers, $body);
 
 	if (PEAR::isError($mail)) {
   	  echo("<p>" . $mail->getMessage() . "</p>");
	  die;
  	} else {
   	  return true;
  	}
}
 ?>
