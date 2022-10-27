<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/beer_display.scss">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">

</head>
<body>
    <?php
        session_start();
        include 'header.php';

        if (isset($_GET["id"])) {
            $ID_beer = $_GET["id"];
            include 'database.php';
            include 'beerinfo.php'; 
            global $db;

            $sql = "SELECT * FROM beer INNER JOIN color ON beer.ID_color = color.ID_color 
                    INNER JOIN taste ON beer.ID_taste = taste.ID_taste 
                    INNER JOIN category ON beer.ID_category = category.ID_category
                    INNER JOIN hops ON beer.ID_hops = hops.ID_hops
                    INNER JOIN grains ON beer.ID_grains = grains.ID_grains
                    WHERE ID_beer = ?";

            $query = $db->prepare($sql);
            $query->execute([$ID_beer]);
            $beer = $query->fetch();
            if (isset($beer["ID_beer"])) {
                $beer = new Beer($beer['ID_beer'], $beer['name'], $beer['location'], $beer['color_name'],
                $beer['strength'], $beer['taste_name'], $beer['brewery'], $beer['category_name'], $beer['IBU'],
                $beer['hops_name'], $beer['grains_name'], $beer['calories'], $beer['clarity'], $beer['carbohydrates']);

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ID_user = $_SESSION["ID_user"];
                    
                    $sql = "SELECT * FROM beer_user WHERE ID_user = ? AND ID_beer = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$ID_user, $ID_beer]);
                    $beer_user = $query->fetch();
                    if (empty($beer_user)) {
                        // like -> add in the db
                        $sql = "INSERT INTO beer_user (ID_beer, ID_user) VALUES (?, ?)";
                        $query = $db->prepare($sql);
                        $query->execute([$ID_beer, $ID_user]);
                    } else {
                        $ID_beer_user = $beer_user["ID"];
                        // dislike -> delete from the db
                        $sql = "DELETE FROM beer_user WHERE ID = ?";
                        $query = $db->prepare($sql);
                        $query->execute([$ID_beer_user]);
                    }
                }
                
                $beer->display_page();

                
            } else {
                echo "<p>This beer does not exist. <a href='add_beer.php'> Add one</a> ?</p>";
            }
        } else {
            echo "<p>This beer does not exist. <a href='add_beer.php'> Add one</a> ?</p>";
        }

    ?>
    
</body>
</html>
