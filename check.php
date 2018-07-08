<?php

session_start();

$conn = new mysqli('localhost', '23519_bap_wall', '23519', '23519_bap_wall');

$user_check = $_SESSION['user'];
$sql = mysqli_query($conn, "SELECT user FROM users WHERE user = '$user_check'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$login_user = $row['user'];

if(!isset($user_check)){
    header("location:logreg.php");
}


?>