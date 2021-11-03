<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/boot/all.css" />
    <link rel="stylesheet" href="../assets/boot/bootstrap.min.css" />
    <link rel="icon" href="../images/minilogo.png">
    <link rel="stylesheet" href="../assets/css/login.css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Account Activation </title>
</head>
<body>
<?php
if($_GET['key'] && $_GET['token'])
{

include "db.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query="SELECT * FROM registration WHERE email_verification_link='".$token."' and email='".$email."' ";
$run = mysqli_query($conn,$query);
$d = date('Y-m-d H:i:s');
$stat=0;
if (mysqli_num_rows($run) > 0) {
$row= mysqli_fetch_array($run);
if($row['email_verified_at'] == NULL){
    mysqli_query($conn,"UPDATE registration set statu='1', email_verified_at ='" . $d . "' WHERE email='" . $email . "'");
    $stat=1;

    $msg = "<h1>Félicitations ! Votre compte a été vérifié.</h1>";
}elseif($row['email_verified_at'] != NULL) {
        
    $stat=1;
$msg = "<h1>Vous avez déjà vérifié votre compte avec nous</h1><h4>Accout vérifié à <br><b>$row[email_verified_at]</b></h4>";
}
} else if(!isset($row)){
$msg = "Cet e-mail n'a pas été enregistré chez nous";

}
}
else
{
$msg = "Danger ! Quelque chose a mal tourné.";
}
?>

<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="box">>
                        <?php echo $msg?>
                        <?php if($stat) echo '
                        <p class=" mt-5">
    <a class="btn btn-primary btn-sm" href="../login.html" role="button">Continuer vers la page de connexion</a>
  </p>'?>
                        <?php if(!$stat) echo '
                        <p class=" mt-5">
    <a class="btn btn-primary btn-sm" href="../register.html" role="button">Continuer à la page d enregistrement</a>
  </p>'?>

</div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>