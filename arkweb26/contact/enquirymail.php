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
// ------- three variables you MUST change below  -------------------------------------------------------

//$replyemail="kashish@arknewtech.com"; //change to your email address
$replyemail="kashish@arknewtech.com";
$valid_ref1="index.html";
$valid_ref2="index.html"; //chamge to your domain name

// -------- No changes required below here -------------------------------------------------------------
//
// email variable not set - load $valid_ref1 page
if (!isset($_POST['enqemails'])){
    echo "<script language=\"JavaScript\"><!--\n ";
    echo "top.location.href = \"$valid_ref1\"; \n// --></script>";
    exit;
}
//check provided email address is VALID.
if(filter_var($_POST["enqemails"], FILTER_VALIDATE_EMAIL)==FALSE ){
    echo "<script language=\"JavaScript\"><!--\n alert(\"ERROR - email address provided is invalid.\\n\\n\");\n";
    echo "top.location.href = \"$valid_ref1\"; \n// --></script>";
    exit;
}
$ref_page=$_SERVER["HTTP_REFERER"];
$valid_referrer=0;
if($ref_page==$valid_ref1) $valid_referrer=1;
elseif($ref_page==$valid_ref2) $valid_referrer=1;
/*if((!$valid_referrer) OR ($_POST["block_spam_bots"]!=12))//you can change this but remember to change it in the contact form too
{
 echo '<h2>ERROR - not sent.';
 if (file_exists("debug.flag")) echo '<hr>"$valid_ref1" and "$valid_ref2" are incorrect within the file:<br>
                                      contact_process.php <br><br>On your system these should be set to: <blockquote>
                                                                          $valid_ref1="'.str_replace("www.","",$ref_page).'"; <br>
                                                                          $valid_ref2="'.$ref_page.'";
                                                                          </blockquote></h2>Copy and paste the two lines above
                                                                          into the file: contact_process.php <br> (replacing the existing variables and settings)';
 exit;
}*/

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

foreach ($_REQUEST as $key => $value) //check all input
{

}
$name = $_POST['enqnames'];
$email = $_POST['enqemails'];
$mobile = $_POST['enqmobileNumbers'];


    $message = "ARK NEWTECH| New Enquiry";
    			
			$body = '<html><head><style> table { border: thick solid blue; } </style></head><body>';
			$body .= '<table rules="all" style="border-color: #green;  font-size: 19px;" cellpadding="10">';
					
			$body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['enqnames']) . "</td></tr>";
			$body .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['enqemails']) . "</td></tr>";
			$body .= "<tr style='background: #eee;'><td><strong>Contact No:</strong> </td><td>" . strip_tags($_POST['enqmobileNumbers']) . "</td></tr>";
			
			$body .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['enqmess']) . "</td></tr>";
			
			$body .= "</table>";
			$body .= "</body></html>";	

$success_sent_msg='<p align="center"><strong>&nbsp;</strong></p>
                   <p align="center"><strong>Your message has been successfully sent to us<br>
                   </strong> and we will reply as soon as possible.</p>
                  
                   <p align="center">Thank you for contacting us.</p>';

$replymessage = "Hi $name

Thank you for your email.

We will endeavour to reply to you shortly.

Please DO NOT reply to this email.

Thank you";

$message = "ARK NEWTECH :  $name";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $headers .= 'From: ' . $email . "\r\n";
    mail($replyemail,$message,$body,$headers);
    
    $messages = "Welcome Message | ARK NEWTECH";
    
    mail("$email",
     "Receipt: $messages",
     "$replymessage",
     "From: $replyemail\nReply-To: $replyemail");
echo $success_sent_msg;

echo "<script language=\"JavaScript\"><!--\n ";
echo "var timer = setTimeout(function() { window.location='index.html'}, 1000); \n// --></script>";
	
	}
?>