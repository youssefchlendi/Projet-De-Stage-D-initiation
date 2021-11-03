<?php
include "db.php";

    /*verification que champs nom et email sont non null */
if (isset($_POST['message2'])&&isset($_POST['id'])){
    $id=$_POST['id'];
    /* initialization de commande remplissage de table */
    $query ="SELECT * FROM form  WHERE ID=".$id;
    /* Exucution de commande */
    $result=$conn->query($query);
    $row = mysqli_fetch_array($result);
    $result=$conn->query($query);
    $email= $row['Email']; 

    $query="UPDATE form SET Sent=1 WHERE id=".$id;
    $run= mysqli_query($conn,$query);
}

/* Envoi de mail */
use PHPMailer\PHPMailer\PHPMailer;
    /*verification que champs nom et email sont non null */
if (isset($_POST['message2'])&&isset($_POST['id']))
{
    /* remplissage des variables avec les champs des form */
    $subject=$_POST['subject'];
    $message=$_POST['message2'];
    /* integration des fichiers phpmailer */
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";
    $mail=new PHPMailer();
    /* parametres SMTP */
    $mail->isSMTP();                            //envoyer utilisant SMTP
    $mail->Host="smtp.gmail.com";               //initialization de serveur SMTP
    $mail->SMTPAuth=true;                       //activation SMTP authentification
    $mail->Username="dont.reply.ht@gmail.com";  //ADRESSE SMTP
    $mail->Password="Dont.reply.ht1";           //Mot de passe SMTP
    $mail->Port=465;                            //Port TCP
    $mail->SMTPSecure="ssl";
    /* Contenu De mail de ADMIN*/
    $mail->isHTML(true);                                        //Format de mail html    
    $mail->setFrom("dont.reply.ht@gmail.com","Tijara-Tunvita.");   
    $mail->addAddress($email);                                                                  //Adresse reception
    $mail->Subject=("$subject");                                         //Le Sujet de mail
    $mail->Body=$message;                                                                       //Contenu de mail
    $mail->send();      
}
//Commande pour envoyer le mail
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/main.css" />
	<link rel="stylesheet" href="../assets/boot/all.css" />
	<link rel="stylesheet" href="../assets/boot/bootstrap.min.css" />
	<link rel="icon" href="../images/minilogo.png">
    <meta http-equiv="refresh" content="5; url:admino.php">

</head>
<body class="jumbotron">
<div class="jumbotron text-center">
  <h1 class="display-3">Reply sent!</h1>
  <p class="lead"><strong>Vous avez repondu au client. </strong> <br>. </p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="admino.php" role="button">Continue to admin page</a>
  </p>
</div>
</body>
</html>

