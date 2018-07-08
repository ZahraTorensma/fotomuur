<?php

session_start()
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inloggen!</title>
</head>
<body>





<?php

if (!isset($_POST['submit'])){
    echo 'alleen als je op de knop drukt, kan je verder';
    exit();
}else{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username=='username' &&$password=='password'){
        $_SESSION['username'] = $username;
    }

}
?>

<!--uiloggen is nieuwe pagina-->
<!---->
<!--php session start-->
<!--session unset-->
<!--session destroy-->
<!--header-->
<script src="js/script.js"></script>

</body>
</html>