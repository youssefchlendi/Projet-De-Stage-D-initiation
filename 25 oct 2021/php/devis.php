<?php
include "send.php";

if (isset($_POST['email']))
    {
        $email=$_POST['email'];
        $message="Merci de m'envoyer une devis general";
        sendmail("Tijara-Tunvita.","dont.reply.ht@gmail.com","Demande de devis de ($email)",$message);
        $message="
    <html>
    <head>	<meta charset='utf-8' /></head>
        <body>
            <strong>
            Merci d'avoir pris contact avec nous !
            </strong><br>
            Nous vous remercions de nous avoir contactés / Tunvita.<br>
            Un de nos collègues vous envoyera une devis le plus tot possible !<br>
            Passez une excellente journée ! 
        </body>
    </html>    ";
        sendmail("Tijara-Tunvita.",$email,"Merci d'avoir pris contact avec nous !",$message);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sending Mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/main.css" />
	<link rel="stylesheet" href="../assets/boot/all.css" />
	<link rel="stylesheet" href="../assets/boot/bootstrap.min.css" />
	<link rel="icon" href="../images/minilogo.png">
    <meta http-equiv="refresh" content="8; url=../index.html">

</head>
<body class="jumbotron">
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Vous allez recevoir un email de verification de l'envoi. </strong> <br>en vas vous contactez le plus tots possible. </p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a>
  </p>
</div>
</body>
</html>