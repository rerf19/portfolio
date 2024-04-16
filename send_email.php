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
mail($to,$subject,$msg,$headers);

if ($error == false) {
    $result='<div class="alert alert-success">Thank You! I will be in touch soon.</div>';
}else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
}

header("Location: https://rodrigoferreira.dev?meg=t");
die();
?>