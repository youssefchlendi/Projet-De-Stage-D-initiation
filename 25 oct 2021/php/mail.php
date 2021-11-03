<?php

include "db.php";
include "send.php";
/*Envoi des donées de form a la base de donées*/

/*initialization de connection mysql*/
    $name1=$_POST['name'];
    $email1=$_POST['email'];
    $subject1=$_POST['subject'];
    $message1=$_POST['message'];
    if (isset($_POST['name'])&&isset($_POST['email']))
    {
    $query = "insert into form(name,email,subject,message) values( '$name1','$email1','$subject1','$message1')";
    mysqli_query($conn,$query);    
    }


/* Envoi de mail */
    /*verification que champs nom est non null */
if (isset($_POST['name']))

{  
    // remplissage des variables avec les champs des form 
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
        sendmail("Contact:".$name,"dont.reply.ht@gmail.com","email ($subject)",$message);
    $msg="<html>
        <body>
            <strong>
            Merci d'avoir pris contact avec nous !
            </strong><br>
            Nous vous remercions de nous avoir contactés / Tunvita.<br>
            Un de nos collègues vous recontactera bientôt !<br>
            Passez une excellente journée ! 
        </body>
    </html>";  
        sendmail("Tijara-Tunvita.",$email,"Merci d'avoir pris contact avec nous !",$msg);
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