<?php

session_start();

$conn = *maakt connectie*

$user_check = $_SESSION['user'];
$sql = mysqli_query($conn, "SELECT gebruiker FROM gebruikers WHERE user = '$user_check'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$login_user = $row['user'];

if(!isset($user_check)){
    header("location:logreg.php");
}


?>
