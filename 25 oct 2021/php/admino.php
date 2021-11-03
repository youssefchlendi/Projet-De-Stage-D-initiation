<?php     
    session_start();
    if($_SESSION['status']!=true)
    header("location:../login.html");

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/boot/all.css" />
    <link rel="stylesheet" href="../assets/boot/bootstrap.min.css" />
    <link rel="icon" href="../images/minilogo.png">
    <script src="../assets/js/reply.js"></script>
    <title>ADMIN</title>
</head>
<body class="bg-dark">
    <?php   echo "<h4 class='border border-primary rounded-10 float-right mr-5 p-2 text-light'>$_SESSION[user]</h4>'"?>
    <a href="logout.php"class="btn btn-danger float-right mr-5 ">Deconnecter</a>
    <?php
include "db.php";
$query = "SELECT * FROM form"; //You don't need a ; like you do in SQL
    $result = mysqli_query($conn,$query);
    echo "<table id='table' style='z-index:-1;' class='table table-striped table-dark'><thead><tr><td  scope'col'>ID</td><td  scope'col'>Nom</td><td  scope'col'>Email</td><td  scope'col'>Sujet</td><td  scope'col'>Message</td><td  scope'col'>repondu</td><td  scope'col'>Action</td></tr></thead><tbody>"; // start a table t ag in the HTML
    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    echo "<tr class=''><td>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['Subject'] . "</td><td>" . $row['Message'] . "</td>";
    if ($row['Sent']==0)
    echo "<td><i class='fa fa-times'></i></td><td><button type='button' class='btn btn-primary' onclick='doit(this.id)' id=" . $row['ID'] . ">Envoyer un email</button><form style='display:inline;'class='ml-3' action='delete.php' method='POST'><input type='hidden' name='delete' value=" . $row['ID'] . "><button type='submit' class='btn btn-danger'> &nbspSupprimer&nbsp</button></form></td></tr>";
    else
    echo "<td><i class='fa fa-check'></i></td><td><button type='button' class='btn btn-primary' onclick='doit(this.id)' id=" . $row['ID'] . ">Renvoyer un email</button><form style='display:inline;'class='ml-3' action='delete.php' method='POST'><input type='hidden' name='delete' value=" . $row['ID'] . "><button type='submit' class='btn btn-danger'> &nbspSupprimer&nbsp</button></form></td></tr>";
    //$row['index'] the index here is a field name
    }
echo "</tbody></table>"; //Close the table in HTML
?>
<div id="reply" style='display:none'>
<div class="row justify-content-center">
          <div class="col-md-6">
            <span class="anchor" id="formContact"></span>
            <hr class="my-5">
            <!-- form contact -->
            <div class="card card-outline-secondary">
              <div class="card-header">
                <h3 class="mb-0">Mail client</h3>
              </div>
              <div class="card-body">
                <form class="form" method="POST" action="sendmail.php">
                    <fieldset>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                            <label class="mb-0" for="message2">Subject</label>
                            <input type="text" name="subject" placeholder="subject">
                                <label class="mb-0" for="message2">Message</label>
                                <div class="row mb-1">
                                    <input id='clue'type="hidden" name="id" value="id">
                                    <input type="hidden" name="email" >
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="message2" name="message2" required=""
                                            rows="6"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-6 btn-lg float-right" type="submit">Send mail</button>
                                <button class="btn btn-secondary mt-6 btn-lg mr-2 float-right" type="reset" onclick='doit(null)'>Cancel</button>
                    </fieldset>
                </form>
            </div>
            </div><!-- /form contact -->
          </div><!--/col-->
        </div>
</div>
</body>
</html>
