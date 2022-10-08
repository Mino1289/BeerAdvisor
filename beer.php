<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.scss">
    <link rel="stylesheet" href="./css/beer.scss">
    <link rel='stylesheet' href='./css/comment.scss'>
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
</head>
<body>
    <?php
        include 'header.php';

        if ($_GET["id"] != "") {
            $ID_beer = $_GET["id"];
            include 'database.php';
            include 'beerinfo.php';
            global $db;

            $sql = "SELECT * FROM beer WHERE ID_beer = $ID_beer";

            $result = $db->prepare($sql);
            $result->execute();
            $beer = $result->fetch(PDO::FETCH_ASSOC);

            $beer = new Beer($beer["ID_beer"], $beer["name"], $beer["location"], $beer["color"], $beer["strength"], $beer["taste"], $beer["brewery"]);
            $beer->display_page();
        } else {
            echo "<p>Cette bière n'existe pas</p>";
        }
    ?>
    
</body>
</html>
