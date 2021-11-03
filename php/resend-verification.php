<?php

include "db.php";
    /* Envoi de mail */
    use PHPMailer\PHPMailer\PHPMailer;
    if (isset($_POST['email'])){
$email=$_POST['email'];
$query="SELECT * FROM registration WHERE email='".$email."'";
$run=mysqli_query($conn,$query);
$row = mysqli_fetch_array($run);
$token=$row['email_verification_link'];
/*verification que champs nom et email sont non null */
/* remplissage des variables avec les champs des form */
$link = "<a href='localhost/php/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
$stat=1;
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
$mail->setFrom("dont.reply.ht@gmail.com","Verification mail");
$mail->addAddress("$email");               //Adresse reception
$mail->Subject=("Click on link");                       //Le sujet de l'email
$mail->Body    = 'Click On This Link to Verify Email '.$link.'';    //Le contenu de mail
$mail->send();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification link</title>
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/boot/all.css" />
    <link rel="stylesheet" href="../assets/boot/bootstrap.min.css" />
    <link rel="icon" href="../images/minilogo.png">
    <link rel="stylesheet" href="../assets/css/login.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="box">
                    <h1>Verification mail resent</h1>
                        <h5>Please check your email to confirm it
                        <p class='mt-5'>
    <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continue to login page</a>
  </p>

</div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>