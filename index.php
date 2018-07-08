<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
    <title>homeSweetHome</title>
</head>
<body>

<?php
   // require_once 'check.php';
?>

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
        <div id="keuzes">
                    <form id="eersteform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <select name="sorteer">
                            <option value="date_desc">Datum nieuw - oud</option>
                            <option value="date_asc">Datum oud - nieuw</option>
                            <option value="descr_asc">Beschrijving oplopend</option>
                            <option value="descr_desc">Beschrijving aflopend</option>
                            <option value="random">Random</option>
                        </select>
                        <input type="submit" id="submithome" name="submit_sort" value="sorteer!"/>
                    </form>
<!--            <script type="text/javascript">document.getElementById('sorteer').value = "?php echo $_GET['sorteer'];?>";</script>-->


                    <form id="tweedeform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" name="searchterm" placeholder="Zoeken..."/>
                        <input type="submit" id="submithome" name="submit_search" value="zoeken!">
                    </form>


                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="submit" id="submithome" name="submit_alles" value="alles weergeven!">
                    </form>
        </div>



        <?php
        require_once 'connectvars.php';

        $dbc = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die ('Error 2');

        $column = 'date';
        $order = 'DESC';

        if(isset($_GET['submit_sort'])){
            switch($_GET['sorteer']){
                case 'date_asc': $column = 'date';//date moet in je database staan als naam voor dtaumtabel
                    $order= 'ASC';
                    break;
                case 'date_desc': $column = 'date';//date moet in je database staan als naam voor dtaumtabel
                    $order= 'DESC';
                    break;
                case 'descr_asc': $column = 'description';
                    $order= 'ASC';
                    break;
                case 'descr_desc': $column = 'description';
                    $order= 'DESC';
                    break;
                case 'random': $column = 'rand()';
                    $order= '';
                    break;
            }
        }


        if (isset($_POST['submit_search'])){
            $searchterm = mysqli_real_escape_string($dbc, trim($_POST['searchterm']));
            //dit was het eerst maar is onveilig dus de onderstaande code is nieuw$searchterm = '%' . $_POST['searchterm'] . '%';
            $searchterm = '%' . $searchterm . '%';
        } else{
            $searchterm = '%';
        }

        if (isset($_POST['submit_alles'])){
            $searchterm = '%';
        }


        $query = "SELECT * FROM bap_wall_images WHERE description LIKE '$searchterm' ORDER BY $column $order";
        $result = mysqli_query($dbc, $query) or die ('Error querying 2');

        while ( $row = mysqli_fetch_array($result)){
            $target = $row['target'];
            $date = $row['date'];
            $username = $row['username'];
            $description = $row['description'];

            echo '<span id="foto"><img id="myImg" src="' . $target . '"/></span><br>';
            echo'<div id="myModal" class="modal">';
            echo '<span class="close" onclick="document.getElementById(\'myModal\').style.display=\'none\'">&times;</span>';


            echo ' <div id="blokken">';
            echo '<span id="gebruiker">' . $username . '</span><br><br>';
            echo '<span id="foto"><img id="img01" class="modal-content" src="' . $target . '"/></span><br>';
            echo $date . '*' . $username . '*' . $description . '<br>';
            echo '<span id="caption">' . $description . '</span>';
            echo '</div></div><br><br>';
        }

        mysqli_close($dbc);

        ?>



        <br>
        <br>

    </div><!--einde main-->


<script src="js/script.js"></script>
</body>
</html>