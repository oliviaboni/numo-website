<?php

/* Code by David McKeown - craftedbydavid.com */
/* Editable entries are bellow */

mysql_connect("localhost", "numozmrr_numo", "20coryks15") or die(mysql_error());  
mysql_select_db("numozmrr_beta") or die(mysql_error());  

/*Be careful when editing below this line */

$platform = $_POST['platform'];
$f_email = cleanupentries($_POST['email']);
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];

function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);

	return $entry;
}



$send_message = "This email was submitted on " . date('m-d-Y') .  
"\n\nE-Mail: " . $f_email . 

$send_to = "info@numoapp.com";
$send_subject = "Beta Sign-up";
$send_subject .= " - {$f_email}";

$send_headers = "From: " . $f_email . "\r\n" .
    "Reply-To: " . $f_email . "\r\n" .
    "X-Mailer: PHP/" . phpversion();



$to = $_POST['email'];
$subject = "Welcome to Numo";

$headers = "From: " . 'info@numoapp.com' . "\r\n" .
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .=	'<div style="border-bottom:2px solid #c8c8c8">
			<img height="40px" width="auto" style="padding:20px" src="http://numoapp.com/images/logo.svg"/>
		</div>';
$message .=	'<div style="background:#36C3AA; color:white; padding:5%; font-family:verdana">
			<p style="text-align:center; font-size:2em; padding-bottom:30px"><strong>Hi there!</strong></p>
			<p style="text-align:left; font-size:1.2em">Yay! You are in! And Numo is so excited. We will be contacting you with more information once our beta version is ready to go. In the meantime, please follow Numo on <a href="https://twitter.com/numoapp" style="text-decoration:none; color:#FFCF70">twitter</a> and <a href="https://www.facebook.com/Numoapp" style="text-decoration:none; color:#FFCF70">facebook</a> to keep up with our latest updates<br><br>Talk to ya soon!<br><br>Cheers,</p>
			<p style="text-align:left; font-size:1.3em">Numo</p>
		</div>';
$message .='<div style="text-align:center; font-size:.6em; color:grey; font-family:verdana">
			<p> You are receiving this email because ' . $to . ' was just registered <br>to beta test through our website.</p>
			<p><a href="mailto:info@numoapp.com" style="text-decoration:none; color:#36C3AA">Contact</a> us wheneva!</p>
		</div>';
$message .=	'</body></html>';

if (!$f_email) {
	echo "no email";
	exit;
}else{
	if (filter_var($f_email, FILTER_VALIDATE_EMAIL)) {
		mail($send_to, $send_subject, $send_message, $send_headers);
		mail($to, $subject, $message, $headers);
		mysql_query("INSERT INTO beta_list (emails, platforms) VALUES ('$f_email', '$platform')");  
		// For parameters doc, refer to: http://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php
		include 'inc/Mailchimp.php';
		$api = new Mailchimp('f1d7e74aae1b0cb3ff65e20f657edd4a-us10');	
		$merge_vars = string('PFORM'=>$_POST['platform']);
		$retval = $api->listSubscribe(['0c8a830b6a'], $f_email, $merge_vars); 
		Print "Success."; 
		echo "true";
	}else{
		echo "invalid email";
		exit;
	}
}


?>

