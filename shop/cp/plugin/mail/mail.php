<?php
set_time_limit(160);

include_once "/../../../lib/webconfig.php";
include 'PHPMailerAutoload.php';

function SendMail($email,$invoice,$cmd){
	$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->SMTPDebug = 0;
	$mail->CharSet = 'UTF-8';
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "username";
	$mail->Password = "password";

	if($cmd == 1){ // Send Invoice
		$file = DOMAIN . "cp/plugins/mail/formate.php?sec=sendinvoice&invoice=".$invoice;
		$mail->IsHTML(true);
		$mail->setFrom($email, "#Invoice " . $invoice);
		$mail->Subject = '#Invoice ' . $invoice;
		$mail->msgHTML(file_get_contents($file));
		$mail->AltBody = 'This is a plain-text message body';
		$mail->addAddress($email);

		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}
	}
	if($cmd == 2){// Payments
		$file = DOMAIN . "cp/plugins/mail/formate.php?sec=payments&invoice=".$invoice;
		$mail->IsHTML(true);
		$mail->setFrom($email, "แจ้งการโอนเงิน  #Invoice " . $invoice);
		$mail->Subject = 'แจ้งการโอนเงิน #Invoice ' . $invoice;
		$mail->msgHTML(file_get_contents($file));
		$mail->AltBody = 'This is a plain-text message body';
		$mail->addAddress($email);

		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}
	}
	if($cmd == 3){// Approved
		$file = DOMAIN . "cp/plugins/mail/formate.php?sec=approved&invoice=".$invoice;
		$mail->IsHTML(true);
		$mail->setFrom($email, "อนุมัติ #Invoice " . $invoice);
		$mail->Subject = 'อนุมัติ #Invoice ' . $invoice;
		$mail->msgHTML(file_get_contents($file));
		$mail->AltBody = 'This is a plain-text message body';
		$mail->addAddress($email);

		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}
	}
}