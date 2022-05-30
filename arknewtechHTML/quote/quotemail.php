<?php
session_start();
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

$replyemail="sales@arknewtech.com"; //change to your email address
$valid_ref1="index.html";
$valid_ref2="index.html"; //chamge to your domain name

// -------- No changes required below here -------------------------------------------------------------
//
// email variable not set - load $valid_ref1 page
if (!isset($_POST['email'])){
    echo "<script language=\"JavaScript\"><!--\n ";
    echo "top.location.href = \"$valid_ref1\"; \n// --></script>";
    exit;
}
//check provided email address is VALID.
if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==FALSE ){
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
	echo "var timer = setTimeout(function() { window.location='index.html'}, 1000); \n// --></script>";     
   
 }
} 
$fname = $_POST['fname'];
$email = $_POST['email'];
$phone = $_POST['phone']['full'];
$skype_id = !empty($_POST['skype_id'])?$_POST['skype_id']:'';
$budget = !empty($_POST['budget'])?$_POST['budget']:'';
$desc = !empty($_POST['desc'])?$_POST['desc']:'';
$chk = !empty($_POST['chk'])?$_POST['chk']:'';

/*Attachment starts*/ 
    $file_name =  $_FILES['attachment']['name'];
    $tmp_name = $_FILES['attachment']['tmp_name']; 
    $type    = $_FILES['attachment']['type'];  // get type of the file
   
    $content = file_get_contents($tmp_name);
    $attachment = chunk_split(base64_encode($content));
    
    // a random hash will be necessary to send mixed content
    $separator = md5(time());
    // carriage return type (RFC)
    $eol = "\r\n";
    // main header (multipart mandatory)
    $headers = "From: ".$name." <".$email.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/html; charset=\"utf-8\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;
    $body .= "<html><head><style> table { border: thick solid blue; } </style></head><body>". $eol;
	$body .= "<table rules='all' style='border-color: #green;  font-size: 14px'; cellpadding='10'>". $eol;
					
	$body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fname']) . "</td></tr>". $eol;
    $body .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>". $eol;
	$body .= "<tr style='background: #eee;'><td><strong>Contact No.:</strong> </td><td>" . strip_tags($_POST['phone']['full']) . "</td></tr>". $eol;
	if(!empty($_POST['skype_id'])){
        $body .= "<tr style='background: #eee;'><td><strong>Skype ID:</strong> </td><td>" . strip_tags($_POST['skype_id']) . ";</td></tr>". $eol;
    }	
    if(!empty($_POST['budget'])){
        $body .= "<tr style='background: #eee;'><td><strong>Budget:</strong> </td><td>" . strip_tags($_POST['budget']) . ";</td></tr>". $eol;
    }	
    if(!empty($_POST['desc'])){
        $body .= "<tr style='background: #eee;'><td><strong>Project Description:</strong> </td><td>" . strip_tags($_POST['desc']) . ";</td></tr>". $eol;
    }	
    if(!empty($_POST['chk'])){
	    $body .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['chk']) . "</td></tr>". $eol;
    }		
	$body .= "</table>". $eol;
	$body .= "</body></html>". $eol;
    
    // Preparing attachment 
// if(!empty($_FILES) > 0){ 
//     if(is_file($_FILES)){ 
//         $body .= "--{$mime_boundary}\n"; 
//         $fp =    @fopen($file_name,"rb"); 
//         $data =  @fread($fp,filesize($file_name)); 
 
//         @fclose($fp); 
//         $data = chunk_split(base64_encode($data)); 
//         $body .= "Content-Type: application/octet-stream; name=\"".basename($file_name)."\"\n" .  
//         "Content-Description: ".basename($file_name)."\n" . 
//         "Content-Disposition: attachment;\n" . " filename=\"".basename($file_name)."\"; size=".filesize($file_name).";\n" .  
//         "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
//     } 
// } 
//     // attachment
//     $body .= "--" . $separator . $eol;
//     $body .= "Content-Type: ".$type."; name=\"" . $file_name . "\"" . $eol;
//     $body .= "Content-Transfer-Encoding: base64" . $eol;
//     $body .= "Content-Disposition: attachment; filename=\"".$file_name. "\"" .  $eol.$eol;
//     $body .= $attachment . $eol.$eol;
//     $body .= "--" . $separator . "--";

/*Attachment ends */
 $message = "Get A Quote";
    			
// 	$body .= '<html><head><style> table { border: thick solid blue; } </style></head><body>';
// 	$body .= '<table rules="all" style="border-color: #green;  font-size: 14px;" cellpadding="10">';
					
// 	$body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fname']) . "</td></tr>";
//     $body .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
// 	$body .= "<tr style='background: #eee;'><td><strong>Contact No.:</strong> </td><td>" . strip_tags($_POST['phone']['full']) . "</td></tr>";
// 	if(!empty($_POST['skype_id'])){
//         $body .= "<tr style='background: #eee;'><td><strong>Skype ID:</strong> </td><td>" . strip_tags($_POST['skype_id']) . ";</td></tr>";
//     }	
//     if(!empty($_POST['budget'])){
//         $body .= "<tr style='background: #eee;'><td><strong>Budget:</strong> </td><td>" . strip_tags($_POST['budget']) . ";</td></tr>";
//     }	
//     if(!empty($_POST['desc'])){
//         $body .= "<tr style='background: #eee;'><td><strong>Project Description:</strong> </td><td>" . strip_tags($_POST['desc']) . ";</td></tr>";
//     }	
//     if(!empty($_POST['chk'])){
// 	    $body .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['chk']) . "</td></tr>";
//     }		
// 	$body .= "</table>";
// 	$body .= "</body></html>";	
//     $body .= "--" . $separator . "--";
    $success_sent_msg='<p align="center"><strong>&nbsp;</strong></p>
                   <p align="center"><strong>Your message has been successfully sent to us<br>
                   </strong> and we will reply as soon as possible.</p>
                  
                   <p align="center">Thank you for contacting us.</p>';

                   echo $replymessage = "Hi $fname

Thank you for your email.

We will endeavour to reply to you shortly.

Please DO NOT reply to this email.

Thank you"; 
$message = "Get A Quote | ARK NEWTECH :  $fname";

// $headers = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    //$headers .= 'From: ' . $email . "\r\n";
	mail($replyemail,$message,$body,$headers);

$messages = "Get A Quote | ARK NEWTECH";

mail("$email",
     "Receipt: $messages",
     "$replymessage",
     "From: $replyemail\nReply-To: $replyemail");
echo $success_sent_msg;
echo "<script language=\"JavaScript\"><!--\n ";
echo "var timer = setTimeout(function() { window.location='index.html'}, 100); \n// --></script>";
	
	}
?>

