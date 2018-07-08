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
    <title>registreren!</title>
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


</div>

<?php
require_once 'connectvars.php';

    if (!isset($_POST['submitreg'])){
        echo 'Sorry, je zit op de verkeerde pagina.';
        echo 'Klik <a href="logreg.php"> hier</a> om je te registreren.';
        exit();
    }else if($_POST['password'] != $_POST['hhpassword']){

        header("Location: logreg.php?Message" . urlencode($Message));
        exit();
    }

$dbc = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME)
or die('Error connecting to MySQL server.');

$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
$passhash = hash('sha512', $password);
$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
$random_number = rand(1000,9999);
$hashcode = hash('sha512', $random_number);



$query = "INSERT INTO hier
              VALUES (0, NOW(), '$username', '$passhash', '$email', '$hashcode', 0)";
$result = mysqli_query($dbc, $query) or die('Error querying database.');


$to = $email;
$subject = 'Verifieren account Oh Snap!';
$message = 'Hallo ' . $username . '! <br>' .
            ' En welkom op Oh Snap! Ter verificatie willen we u vragen ' .
            'om op de volgende link te klikken: ' .
            'http://www.23519.hosts.ma-cloud.nl/bewijzenmap/p1.3/verify.php?email=' . $email . '&hashcode=' . $hashcode;


$from =  'Team Oh Snap!';

mail($to,$subject,$message,'Tot gauw: ' . $from) or die('Error mailing.');
echo 'Er is een bevestigingsemail gestuurd naar ' . $to . '; ';


mysqli_close($dbc);

?>
<script src="js/script.js"></script>
</body>
</html>
