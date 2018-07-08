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
    <title>inloggen! | registreren!</title>
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

    <br><br><br><br>

    <div id="sub-title">
        <div id="login">
            <strong>Login</strong>
            <br><br>
            <form action="login.php" method="post">
                <table>
                    <tbody>
                    <tr>
                        <td>Email: </td>
                        <td><input name="email" type="email"/></td>
                    </tr>
                    <tr>
                        <td>Wachtwoord: </td>
                        <td><input name="password" type="password"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="login!"/></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>




        <div id="register">
            <strong>Registreren</strong>
            <br><br>
            <form action="registreer.php" method="post">
                <table>
                    <tbody>
                    <tr>
                        <td><label for="username">Gebruikersnaam: </label></td>
                        <td><input id="username" name="username" type="text" required/></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input id="email" name="email" type="email" required/></td>
                    </tr>
                    <tr>
                        <td><label for="password">Wachtwoord: </label></td>
                        <td><input id="password" name="password" type="password" required/></td>
                    </tr>
                    <tr>
                        <td><label for="hhpassword">Herhaal wachtwoord: </label></td>
                        <td><input id="hhpassword" name="hhpassword" type="password" required/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="registreer!" name="submitreg"/></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>

        <div class="registrationFormAlert" id="divCheckPasswordMatch">
        </div>

        <div class="clear-both"></div>
    </div>

</div>

<?php

if(isset($_GET['Message'])){
    echo '<div id="wachtwoorden">';
    echo 'De wachtwoorden <br> komen niet overeen...';
    echo '</div>';

}
?>

<script src="js/script.js"></script>


</body>
</html>