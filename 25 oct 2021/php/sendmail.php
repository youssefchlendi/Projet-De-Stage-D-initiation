<?php
include "db.php";
include "send.php";


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

    /* remplissage des variables avec les champs des form */
    $subject=$_POST['subject'];
    $message=$_POST['message2'];
    sendmail("Tijara-Tunvita.",$email,$subject,$message);

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
  <h1 class="display-3">Réponse envoyée !</h1>
  <p class="lead"><strong>Vous avez repondu au client. </strong> <br>. </p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="admino.php" role="button">Continuer vers la page d'administration</a>
  </p>
</div>
</body>
</html>

