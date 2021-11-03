<?php
session_start();
include "db.php";
    if (isset($_POST['username'])&&isset($_POST['password'])){
        // remplissage des variables avec les champs des form 
            $user=$_POST['username'];
            $pass=md5($_POST['password']);
        // initialization de commande lecture de table 
        $stat=0;
        $query = "SELECT * FROM registration WHERE name='".$user."' AND password='".$pass."' AND statu='1' LIMIT 1 ";
        // Exucution de commande 
        $result= mysqli_query($conn,$query);
        $_SESSION['status']=false;
        if (mysqli_num_rows($result)==1){
            $_SESSION['user']=$user;
            $_SESSION['status']=true;
            header("location: admino.php");
            $stat=1;
        }
        $query = "SELECT * FROM registration WHERE name='".$user."' AND password<>'".$pass."'  LIMIT 1 ";
        // Exucution de commande 
        $result= mysqli_query($conn,$query);
        if (mysqli_num_rows($result)==1){
            $stat=2;
            session_unset();
            $msg="Vous avez saisi un mauvais mot de passe!";
        }
        
        $query = "SELECT * FROM registration WHERE name='".$user."' AND password='".$pass."' AND statu='0' LIMIT 1 ";
        // Exucution de commande 
        $result= mysqli_query($conn,$query);
        if (mysqli_num_rows($result)==1){
            $stat=3;
            session_unset();
           $mail = mysqli_fetch_array($result)["email"];
            $msg="Vous n'avez pas activé votre compte ! <h3>Veuillez vérifier votre courrier!</h3>";
        }
        if ($stat==0)
        {
            session_unset();
            $msg="Vous n'avez pas de compte!";
        }


    }
    

?>
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
<title> Error </title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="box">
                        <h1><?php echo $msg?></h1>
                        <?php if ($stat==2) echo '
                        <p class=" mt-5">
                        <a class="btn btn-primary btn-sm" href="../login.html" role="button">Continue to login page</a>
                      </p> ';
                                            
                    else if ($stat!=1&&$stat!=3)
                    echo '
                        <p class=" mt-5">
                        <a class="btn btn-primary btn-sm" href="../login.html" role="button">Continue to login page</a>
                      </p> 
                                             <p class=" mt-1">
                      <a class="btn btn-primary btn-sm" href="../register.html" role="button">Continue to Register page</a>
                    </p>';
                    else if($stat==3)
                    echo "<p class=' mt-5'>
                    <form method='POST' action='resend-verification.php'><input type='hidden' name='email' value='$mail'><button class='btn btn-danger btn-sm' type='submit'>Renvoyer l'e-mail de vérification</button>
                    <a class='btn btn-primary btn-sm' href='../login.html' role='button'>Continue to login page</a>
                    </p>
                    ";
                    ?>
                    

</div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>