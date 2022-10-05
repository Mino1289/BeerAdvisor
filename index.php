<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/beer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Beer Advisor</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <h1 id="title">BEER ADVISOR</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div id="search">
            <div id=""><i class="fa fa-fw fa-search" id="logosearch"></i></div>
            <input name="value" id="input" type="text" placeholder="Find a beer" maxlength="32" autocomplete="off">
            <input type="submit" value="research" id="submit">
        </div>
    </form>
    <div id="spacing">
        
    </div>

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
    foreach ($result as $beer) {
        $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color'],$beer['strength'],$beer['taste'],$beer['brewery']);
        $beer->display_box();
        // echo "<script>console.log('Debug Objects: " . $beer->display() . "' );</script>";
    }
    

    ?>

</body>
</html>
