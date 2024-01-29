<?php

$to = "rodrigo.e09@hotmail.com";
$subject = "Message from rodrigoferreira.dev";
$headers = "From:" . $_POST["email"] ."\r\n";
$additional_headers = "-f" . $_POST["email"] ."";

// the message
$msg = "Nome: " . $_POST["nome"] . "\nEmail: " . $_POST["email"] . "\nMensagem:\n " . $_POST["mgs"];

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
mail($to,$subject,$msg,$headers);

header("Location: https://rodrigoferreira.dev");
die();
?>