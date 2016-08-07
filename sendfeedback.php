<?php 

	$sender  = trim($_POST["contact_sender"]) ;
	$subject = trim($_POST["contact_subject"]) ;
	$message = trim($_POST["contact_message"]) ;

	// Handle message here

	$message_thanks = "<div id=form_contact><p>Thank you for sending the message.<p><br /><p><strong>Your message is sent successfully.</strong></p></div>" ;
	//echo $message_thanks ;

	write_log("Sender:$sender");
	write_log("Sub:$subject");
	write_log("Message:$message");
	write_log("--------------------------------------------------\n");

	sendmail($subject,$sender,$message) ;


/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////	

	function write_log($message){
		$now = date("H:i:s.u");
		file_put_contents("./data/my-feedback.log", "\n$now :$message", FILE_APPEND | LOCK_EX);
	}

	function sendmail($sub,$sender,$msg){
		$to      = 'mahfoozk@gmail.com, mail@wordingup.com';
		$subject = 'WordingUp: ' . $sub;
		$message = "Got an email from: $sender \n" ;
		$message = $message . str_replace("\n.", "\n..", $msg);
		$headers = 'From: office@wordingup.com' . "\r\n" .
   					'Reply-To: office@wordingup.com' . "\r\n" .
    				'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
	}		
?>