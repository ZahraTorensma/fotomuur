<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
    <title>inloggen!</title>
</head>
<body>

    <div id="header">
        <a href="index.php"><img src="img/logo.svg"/></a>
    </div>

    <div id="menu" class="menu">
        <ul>
            <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
            <br>
            <li><a href="index.php">My Wall</a></li>
            <br>
            <li><a href="logreg.php">Inloggen | Registreren</a></li>
            <br>
            <li><a href="upload.php">Uploaden</a></li>
        </ul>
    </div>

    <br>
    <span class="menuknop" onclick="openNav()">Menu</span>
    <br>

    <div id="main">
<p>joe</p>

<?php
require_once 'connectvars.php';

$dbc = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die('Error connecting to MySQL server.');


  $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
   $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
  $passhash = hash('sha512', $password);


if ($email=='email' && $passhash=='password'){


    $query = "SELECT * FROM hier WHERE email='$email' and password='$passhash'";
    $result = mysqli_query($dbc, $query) or die('Error querying database.');
    echo 'yo zogenaamd ingelogd';

  } else{
    echo 'het wachtwoord is niet goed';
    }

//$query="SELECT * FROM .. WHERE email='$email' and password='$passhash'";
//$result=mysqli_query($dbc, $query) or die('Error querying database.');
//
//$count=mysqli_num_rows($result);
//
//if($count==1){
//    session_register("email");
//    session_register("password");
//    header("location:inloggen.php");
//}
//else {
//    echo "Wrong Username or Password";
//}



//
////$_SESSION['voornaam'] = 'Joey';
//
//  if (!isset($_SESSION['username'])) {//bracket geopend
//      //dan zet je een form neer
//      ?.>
//      <!--form gaat in de html-->
//
//      <.?php
//  }//bracket gesloten
//else{
//      echo 'hallo' . $_SESSION['username'];
//}
        ?>


    </div>

    <script src="js/script.js"></script>

</body>
</html>
