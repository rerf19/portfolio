<?php

$to = "rodrigo.e09@hotmail.com";
$subject = "Message from rodrigoferreira.dev";
$headers = "From:" . $_POST["email"] ."\r\n";
$additional_headers = "-f" . $_POST["email"] ."";

// the message
$msg = "Name: " . $_POST["name"] . "\nEmail: " . $_POST["email"] . "\nMessage:\n " . $_POST["mgs"];

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
$mail = mail($to,$subject,$msg,$headers);
if(!$mail) {   
    $mg = "f" ;
} else {
    $mg = "t";
}

$mg = "t";

header("Location: https://rodrigoferreira.dev?mg=$mg");
die();
?>