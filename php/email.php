<?php

	$yourEmail = 'youremail@domain.com';

	$email = $_POST['email'];
	$subject  = $_POST['subject'];
	$message = $_POST['message'];

	if( $email == '' || $subject == '' || $message == '') {
		echo "<p>Please fill out all fields *</p>";
	} else {
		if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {

			$to = $yourEmail;
			$header = 'From:'. $email ."\r\n";
			$header .= 'Reply-To:'. $email ."\r\n";
			$header .= 'X-Mailer: PHP/' .  phpversion();

			$mail = mail( $to,  $subject, $message, $header );

			if( $mail ){
				echo "<p>Your message has been sent. Thank you!</p>";
			} else {
				echo "<p>Something went wrong, try again!</p>";
			}

		} else {
			echo "<p>Invalid email format *</p>";
		}
	}


?>
