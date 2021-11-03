<?php

include "db.php";
include "send.php";

    /* Envoi de mail */
    if (isset($_POST['email'])){
        $email=$_POST['email'];
        $query="SELECT * FROM registration WHERE email='".$email."'";
        $run=mysqli_query($conn,$query);
        $row = mysqli_fetch_array($run);
        $token=$row['email_verification_link'];
        // remplissage des variables avec les champs des form 
        $link = "<a href='tijara-tunvita1.000webhostapp.com/php/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
        $stat=1;
        sendmail("Tijara-Tunvita.",$email,"email de verification",'Cliquez sur ce lien pour vérifier votre e-mail '.$link.'');
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
                    <h1>Email de verification renvoyé</h1>
                        <h5>Veuillez vérifier votre e-mail pour le confirmer
                        <p class='mt-5'>
    <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continuer vers la page de connexion</a>
  </p>

</div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
