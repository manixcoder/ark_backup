<?php

set_time_limit(20);
session_start();

$_SESSION['error'] = 'error';
if(isset($_POST['inquiry'])){
    // $replyemail= "pathakmanish86@gmail.com";
    $replyemail="business.development@arknewtech.com";
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['phone_number'];
    $project_description = $_POST['project_description'];
    $budget = $_POST['budget'];
    
    $secret ='6LcdkWEdAAAAAJw3YaPY_guTwDogBwL1NFt2XMm2';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);   
    If( $responseData->success) {
        
        
    if(isset($_POST['request_agreement'])){
       $nondisclosure = "Yes"; 
    }else{
        $nondisclosure = 'No';
    }
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your file.";
    }
    $url = "https://www.arknewtech.com/".$target_file;
    
    $message = "ARK NEWTECH| New Enquiry";
    $body = '<html><head><style> table { border: thick solid blue; } </style></head><body>';
    $body .= '<table rules="all" style="border-color: #green;  font-size: 19px;" cellpadding="10">';
    $body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
    $body .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
    $body .= "<tr style='background: #eee;'><td><strong>Contact No:</strong> </td><td>" . strip_tags($mobile) . "</td></tr>";
    $body .= "<tr style='background: #eee;'><td><strong>Nondisclosure:</strong> </td><td>" . strip_tags($nondisclosure) . "</td></tr>";
    $body .= "<tr style='background: #eee;'><td><strong>Budget:</strong> </td><td>" . strip_tags($budget) . "</td></tr>";
    $body .= "<tr style='background: #eee;'><td><strong>Files Path:</strong> </td><td>" . $url . "</td></tr>";
    $body .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($project_description) . "</td></tr>";
    $body .= "</table>";
    $body .= "</body></html>";
    $success_sent_msg='<p align="center"><strong>&nbsp;</strong></p>
    <p align="center"><strong>Your message has been successfully sent to us<br>
    </strong> and we will reply as soon as possible.</p>
    <p align="center">Thank you for contacting us.</p>';
    $replymessage = "Hi $name
    Thank you for your email.
    We will endeavour to reply to you shortly.
    You can always contatc us via this email.
    Thank you";
    $message = "ARK NEWTECH :  $name";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: ' . $email . "\r\n";
    mail($replyemail,$message,$body,$headers);
    $messages = "Welcome Message | ARK NEWTECH";
    mail("$email","Receipt: $messages","$replymessage","From: $replyemail\nReply-To: $replyemail");
    echo $success_sent_msg;
    header("Location: https://arknewtech.com/Thank-you.php"); 
    exit();
}else{?>
   <script>
    // alert('Please check captch !'); 
    window.history.go(-1);
     </script>
     <?php
}
}

echo "<title>ARK NEWTECH</title>";
$i=1;
if($i!=1) // or 1 != 1 thsi cab be used if necessary 
	{
		echo '<script language="JavaScript">alert("The captcha code does not match!!")</script>';
		echo "<script language=\"JavaScript\"><!--\n ";
		echo "var timer = setTimeout(function() { window.location='index.html'}, 000); \n// --></script>";
	}
	else
	{
// ------- three variables you MUST change below  -------------------------------------------------------

$replyemail="kashish@arknewtech.com"; //change to your email address
// $replyemail="pathakmanish86@gmail.com";
$valid_ref1="index.php";
$valid_ref2="index.php"; //chamge to your domain name

// -------- No changes required below here -------------------------------------------------------------
//
// email variable not set - load $valid_ref1 page
if (!isset($email)){
    echo "<script language=\"JavaScript\"><!--\n ";
    echo "top.location.href = \"$valid_ref1\"; \n// --></script>";
    exit;
}
//check provided email address is VALID.
if(filter_var($email, FILTER_VALIDATE_EMAIL)==FALSE ){
    echo "<script language=\"JavaScript\"><!--\n alert(\"ERROR - email address provided is invalid.\\n\\n\");\n";
    echo "top.location.href = \"$valid_ref1\"; \n// --></script>";
    exit;
}
$ref_page=$_SERVER["HTTP_REFERER"];
$valid_referrer=0;
if($ref_page==$valid_ref1) $valid_referrer=1;
elseif($ref_page==$valid_ref2) $valid_referrer=1;

//check user input for possible header injection attempts!
function is_forbidden($str,$check_all_patterns = true)
{
 $patterns[0] = '/content-type:/';
 $patterns[1] = '/mime-version/';
 $patterns[2] = '/multipart/';
 $patterns[3] = '/Content-Transfer-Encoding/';
 $patterns[4] = '/to:/';
 $patterns[5] = '/cc:/';
 $patterns[6] = '/bcc:/';
 $forbidden = 0;
 for ($i=0; $i<count($patterns); $i++)
  {
   $forbidden = preg_match($patterns[$i], strtolower($str));
   if ($forbidden) break;
  }
 //check for line breaks if checking all patterns
 if ($check_all_patterns AND !$forbidden) $forbidden = preg_match("/(%0a|%0d)/i", $str);
 if ($forbidden)
 {
  echo "<font color=red><center><h3>STOP! Message not sent.</center></h3></font>";
  
   echo "<script language=\"JavaScript\"><!--\n ";
	echo "var timer = setTimeout(function() { window.location='index.php'}, 1000); \n// --></script>";     
   
 }
}

foreach ($_REQUEST as $key => $value) //check all input
{

}
//$replyemail= "pathakmanish86@gmail.com";
$replyemail="business.development@arknewtech.com";
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['phone_number'];
    $project_description = $_POST['project_description'];
    $budget = $_POST['budget'];


    $message = "ARK NEWTECH| New Enquiry";
    			
			$body = '<html><head><style> table { border: thick solid blue; } </style></head><body>';
			$body .= '<table rules="all" style="border-color: #green;  font-size: 19px;" cellpadding="10">';
					
			$body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
			$body .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
			$body .= "<tr style='background: #eee;'><td><strong>Contact No:</strong> </td><td>" . strip_tags($mobile) . "</td></tr>";
			
			$body .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($project_description) . "</td></tr>";
			
			$body .= "</table>";
			$body .= "</body></html>";
			$success_sent_msg='<p align="center"><strong>&nbsp;</strong></p>
                   <p align="center"><strong>Your message has been successfully sent to us<br>
                   </strong> and we will reply as soon as possible.</p>
                   <p align="center">Thank you for contacting us.</p>';
            $replymessage = "Hi $name Thank you for your email.
                             We will endeavour to reply to you shortly.
                             Please DO NOT reply to this email.
                             Thank you";
            $message = "ARK NEWTECH :  $name";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $email . "\r\n";
            mail($replyemail,$message,$body,$headers);
            $messages = "Welcome Message | ARK NEWTECH";
            mail("$email","Receipt: $messages","$replymessage","From: $replyemail\nReply-To: $replyemail");
            echo $success_sent_msg;
            echo "<script language=\"JavaScript\"><!--\n ";
            echo "var timer = setTimeout(function() { window.location='index.php'}, 1000); \n// --></script>";
	
	}
?>