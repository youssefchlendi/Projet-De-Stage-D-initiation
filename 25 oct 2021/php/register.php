<?php

include "db.php";
include "send.php";

    /* Envoi de mail */
    use PHPMailer\PHPMailer\PHPMailer;
$stat=0;

    $email=$_POST['email'];
    $query="SELECT * FROM registration WHERE email='".$email."' AND statu=1";
    $run=mysqli_query($conn,$query);    
    if (mysqli_num_rows($run)==1){
        $stat=2;
    }

$email=$_POST['email'];
$query="SELECT * FROM registration WHERE email='".$email."'";
$run=mysqli_query($conn,$query);

if (mysqli_num_rows($run)==0){
    if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['email'])){
        /* remplissage des variables avec les champs des form */
            $user=$_POST['username'];
            $pass=$_POST['password'];
            $email=$_POST['email'];
        /* initialization de commande remplissage de table */
        $token = md5($_POST['email']).rand(10,9999);
        $query="INSERT INTO registration(name, email, email_verification_link ,password) VALUES('" . $_POST['username'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . md5($_POST['password']) . "')";
        $run= mysqli_query($conn,$query);
    }
    /*verification que champs nom et email sont non null */
    if (isset($_POST['username'])&&isset($_POST['email'])){
        /* remplissage des variables avec les champs des form */
        $link = "<a href='tijara-tunvita1.000webhostapp.com/php/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
        $stat=1;
        sendmail("Tijara-Tunvita",$email,"Lien de Verification","Cliquez sur ce lien pour vérifier l'e-mail '.$link.'");
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                    <?php if ($stat==1) echo "<h1>Enregistré avec succès</h1>
                        <h5>Veuillez vérifier votre e-mail pour le confirmer
                        <p class='mt-5'>
    <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continuer vers la page de connexion</a>
  </p> "?>
                    <?php if (!$stat) echo "<h1>Vous êtes déjà inscrit <br> <small>Mais vous n'êtes pas vérifié</small></h1>
                        <h5>Cliquez sur le bouton pour recevoir l'email de confirmation</h5>
                        <p class=' mt-5'>
    <form method='POST' action='resend-verification.php'><input type='hidden' name='email' value='$email'><button class='btn btn-danger btn-sm' type='submit'>Renvoyer l'e-mail de vérification</button>
    <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continuer vers la page de connexion</a>
  </p> "?>
<?php if ($stat==2) echo "<h1>Vous êtes déjà inscrit<br><small>Et vérifié</small></h1>
                        <h5>Cliquez sur le bouton pour accéder à la page de connexion</h5>
                        <p class=' mt-5'>
                        <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continuer vers la page de connexion</a>
</p> "?>

</div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
