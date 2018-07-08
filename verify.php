<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
    <title>verifieren!</title>
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

        <?php

        require_once 'connectvars.php';
        $dbc = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die('Error connecting to MySQL server.');

        $email = mysqli_real_escape_string($dbc, trim($_GET['email']));
        $hashcode = mysqli_real_escape_string($dbc, trim($_GET['hashcode']));


        $query = "SELECT * FROM bap_wall_members
                      WHERE email='$email' AND hashcode='$hashcode'";
        $result = mysqli_query($dbc, $query) or die('Error querying for user.');

        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $query = "UPDATE nee SET status=1 WHERE id=$id";
            $result = mysqli_query($dbc, $query) or die ('Error updating');
            echo '<br>Bedankt, je inschrijving is compleet!';
        }else{
            echo 'er klopt iets niet';
        }

        mysqli_close($dbc);


        ?>

    </div>
    <script src="js/script.js"></script>

</body>
</html>

