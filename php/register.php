<?php

include "db.php";
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
    echo"true";
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
                    <?php if ($stat==1) echo "<h1>Succefuly registered</h1>
                        <h5>Please check your email to confirm it
                        <p class='mt-5'>
    <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continue to login page</a>
  </p> "?>
                    <?php if (!$stat) echo "<h1>You're already registred <br> <small>But you're not verified</small></h1>
                        <h5>Click on the button to get confirmation email</h5>
                        <p class=' mt-5'>
    <form method='POST' action='resend-verification.php'><input type='hidden' name='email' value='$email'><button class='btn btn-danger btn-sm' type='submit'>Resend verification email</button>
  </p> "?>
<?php if ($stat==2) echo "<h1>You're already registred<br><small>And verified</small></h1>
                        <h5>Click on the button to go to login page</h5>
                        <p class=' mt-5'>
                        <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continue to login page</a>
</p> "?>

</div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>