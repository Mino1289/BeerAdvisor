<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.scss">
    <link rel="stylesheet" href="./css/beer.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <title>Beer Advisor</title>
</head>
<body >
    <?php
        include 'header.php';
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="spacing">
    <h1 class="title">BEER ADVISOR</h1>
        <div id="search">
            <div id=""><i class="fa fa-fw fa-search" id="logosearch"></i></div>
            <input name="value" id="input" type="text" placeholder="Find a beer" maxlength="32" autocomplete="off">
            <input type="submit" value="Research" id="submit">
        </div>
    </form>

    <?php
    include "database.php";
    include "beerinfo.php";

    global $db;
    // define variables and set to empty values
    $value = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["value"])) {
            return;
        } else {
            $value = test_input($_POST["value"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($value == "") {
        return;
    } else {
        $sql = "SELECT * FROM beer WHERE name LIKE '%$value%'";
    }

    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    $n = count($result);
    foreach ($result as $beer) {
        $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color'],$beer['strength'],$beer['taste'],$beer['brewery'], $beer['category']);
        $beer->display_box();
    }
    if ($n == 0) {
        echo "<p class='add_beer'> No beer found. <a href='add_beer.php'>Add one ?<a> </p>";
    }


    ?>

</body>
</html>
