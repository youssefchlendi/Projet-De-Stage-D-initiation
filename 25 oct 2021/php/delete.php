<?php
include "db.php";
$id = trim($_POST['delete']);
$delete = "DELETE FROM form WHERE id = '$id'";
$run= mysqli_query($conn,$delete);

$delete="SET  @num := 0;";
$run= mysqli_query($conn,$delete);

$delete="UPDATE form SET id = @num := (@num+1);";
$run= mysqli_query($conn,$delete);

$delete="ALTER TABLE form AUTO_INCREMENT =1;";
$run= mysqli_query($conn,$delete);




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="0; url=admino.php">
</head>
<body>
    
</body>
</html>