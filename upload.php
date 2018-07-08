<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/uploadscript.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
    <title>uploaden!</title>
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

    <br><br>

    <div id="upload">
        <form id="Imgfrm" action="upload.php" enctype="multipart/form-data" method="post">
<!--            <input name="MAX_FILE_SIZE" type="hidden" value="50000">-->
            <input id="image" name="image" type="file">
            <br><br>
<!--            <img id="preview" src="#" alt="" width="250px" height="auto"/>-->
            <br><br>
<!--            <label style="font-weight: bold" for="description">Beschrijving (max. 140 karakters):</label><br><br>-->
            <textarea name="description" id="description" rows="10" cols="30"></textarea>
            <br><br>

            <input name="submit_upload" type="submit" value="Submit"/><br>
        </form>

</div>
<!--    <input id="image" onchange="readURL(this)" name="image" type="file">-->


    <?php
    require_once 'connectvars.php';

//
//    $image = $_FILES['image']['type'];
//    //    if (isset($_POST['image'])) {
//    if ($image && imagefilter($image, IMG_FILTER_GRAYSCALE)) {
//        echo 'joe grijs';
//    } else {
//        echo 'jammer niet grijs';
//    }
//    imagedestroy($image);
//    //    }


    if(isset($_POST['submit_upload'])){
        $dbc = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die ('Error in db komen..');
        $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
        $temp = $_FILES['image']['tmp'];
        $target = 'images/' . time() . $_FILES['image']['name'];


        if(!empty($description)) {
            if(move_uploaded_file($temp, $target)){
                echo '<br>Gelukt!<br>';

                $query = "INSERT INTO hier VALUES (0, NOW(), '$description', '$target', 'hmhm')";
                $result = mysqli_query($dbc, $query) or die ('Error querying');
            } else{
                echo '<br>Mislukt!<br>';
            }
        }else{
            echo 'Je moet nog iets in de beschrijving typen..';
        }
        mysqli_close($dbc);
    }

//dit is om alle afbeeldingen op de uploadpagina te laten zien.

//    $dbc = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die ('Error 2');
//    $query = "SELECT * FROM nope ORDER BY id DESC";
//    $result = mysqli_query($dbc, $query) or die ('Error querying 2');
//
//    while ( $row = mysqli_fetch_array($result)){
//        $target = $row['target'];
//        $date = $row['date'];
//        $username = $row['username'];
//        $description = $row['description'];
//        echo '<img src="' . $target . '"/><br>';
//        echo $date . '*' . $username . '*' . $description . '<br>';
//    }
//
//    mysqli_close($dbc);

    ?>


    <script src="js/uploadscript.js"></script>

</body>
</html>
