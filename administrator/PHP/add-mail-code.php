<?php
/**
 * PHP CODE FOR EDIT  MAIL  ---- START
 */
if (isset($_POST['update_mail'])) {
        $OK = false;
        $update_mail_query = 'UPDATE admin_mail SET admin_mail_text=:admin_mail_text  WHERE admin_mail_id=1';
        $stmt = $connwrite->prepare($update_mail_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':admin_mail_text', $_POST['admin_mail_text'], PDO::PARAM_STR);
// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	    foreach ($connread->query($mailing_list_query) as $row) {
		$mailing_list_email=$row['mailing_list_email'];
		$formated_mailing_list_email=$mailing_list_email . ',';
		$to=substr($formated_mailing_list_email, 0, -1);
		}
	    foreach ($connread->query($website_options_query) as $row) {
        $website_frontend_email=$row['website_frontend_email'];
		}
		$subject = 'New message';
        $from = $website_frontend_email;
        $user_email=$website_frontend_email;
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
        // Create email headers
        $headers .= 'From: '.$user_email."\r\n".
        'Reply-To: '.$user_email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
      $message = '<h1>'.$_POST['admin_mail_title'].'</h1>';
      $message .= $_POST['admin_mail_text'];
	  if(mail($to, $subject, $message, $headers)){
		echo "<script>window.location.replace('mailing-list.php')</script>";
		}
		}
/**
 * PHP CODE FOR EDIT MAIL  ---- END
 */