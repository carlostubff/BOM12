<?php   
	// form variables via POST   
	$name= $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	// Basic HTML mail
	$content = "<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	</head>
	<body>
	Name: $name<br />
	Email: $email<br />
	Message: $msg
	</body>
	</html>";
	// Email configurations
	require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "youremail@gmail.com";  // GMAIL username
	$mail->Password   = "yourpassword";            // GMAIL password
	$mail->SMTPDebug = 1;
	$mail->From = 'youremail@gmail.com';		// Sender's email
	$mail->FromName = 'Your Name';				//Sender's name
	$mail->Subject    = UTF8_decode("Email Subjecto"); //Email subject
	$mail->AltBody    = strip_tags(str_replace( '<br/>', "\n", $content)); 	
	$mail->MsgHTML(utf8_decode($content));
	$mail->AddAddress('Email recipient', "Name recipient"); //Email recipient
	$mail->clearReplyTos();
	$mail->AddReplyTo('youremail@gmail.com',"No-Reply"); //It must be the same as Sender's email for avoid get into spam
	if(!$mail->Send()) 
	{
		//email fail
		echo 0;
	} 
	else 
	{
		//email sent
		echo 1;
	}
?>