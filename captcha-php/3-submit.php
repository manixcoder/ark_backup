<?php
// (A) CAPTCHA CHECK
$result = "";
require "1-captcha.php";
if (!$PHPCAP->verify($_POST["captcha"])) {
  $result = "CAPTCHA does not match!";
}

// (B) PROCEED IF CAPTCHA CHECK OK
if ($result == "") {
  // DO SOMETHING
  $result = "Congrats, CAPTCHA is correct.";
}

// (C) THE END
print_r($_POST);
echo $result;
