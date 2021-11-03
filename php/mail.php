<?php

/*Envoi des donées de form a la base de donées*/
$servername="localhost";
$username="id17319573_admin";
$password="Aa-123456789";
$dbname="id17319573_contact";
/*initialization de connection mysql*/
    $name1=$_POST['name'];
    $email1=$_POST['email'];
    $subject1=$_POST['subject'];
    $message1=$_POST['message'];
    if (isset($_POST['name'])&&isset($_POST['email']))
    {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "insert into form(name,email,subject,message) values( '$name1','$email1','$subject1','$message1')";
    $conn->exec($query);
    }


/* Envoi de mail */
use PHPMailer\PHPMailer\PHPMailer;
    /*verification que champs nom et email sont non null */
if (isset($_POST['name'])&&isset($_POST['email']))
{
    /* remplissage des variables avec les champs des form */
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
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
    $mail->setFrom("dont.reply.ht@gmail.com","Contact:".$name);
    $mail->addAddress("dont.reply.ht@gmail.com");               //Adresse reception
    $mail->Subject=("$email ($subject)");                       //Le sujet de l'email
    $mail->Body=$message;                                       //Le contenu de mail
    
    /* Commande pour envoyer le mail */
    $mail->send();
    /*
    if ( $mail->send()){
        $status ="success";
        $reponse="Email is sent!";
    }
    else{
        $status="failed";
        $reponse="something is wrong : <br> " . $mail->ErrorInfo;
    }*/
    /* Contenu de mail de Client */
    $mail->ClearAllRecipients();                                                                 //effacer les autre Rec
    $mail->setFrom("dont.reply.ht@gmail.com","Tijara-Tunvita.");   
    $mail->addAddress($email);                                                                  //Adresse reception
    $mail->Subject=("Thank you for getting in touch!");                                         //Le Sujet de mail
    $mail->Body="<html><body><strong>Thank you for getting in touch!</strong><br>We appreciate  
     you contacting us/ Tunvita.
     One of our colleagues will get back in touch with you soon!Have a great day!
     
     </body></html>    ";                                                                       //Contenu de mail
    $mail->send();                                                                              //Commande pour envoyer le mail
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