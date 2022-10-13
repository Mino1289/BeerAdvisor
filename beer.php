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
                    WHERE ID_beer = $ID_beer";

            $result = $db->prepare($sql);
            $result->execute();
            $beer = $result->fetch();
            if (isset($beer["ID_beer"])) {
                $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],$beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name']);
                $beer->display_page();
            } else {
                echo "<p>This beer does not exist. <a href='add_beer.php'> Add one</a> ?</p>";
            }
        } else {
            echo "<p>This beer does not exist. <a href='add_beer.php'> Add one</a> ?</p>";
        }
    ?>
    
    <!-- <div class='beer'>

        <h1>1664 Kronenbourg</h1>
        <div id="picture_beer"></div>

        <div id="green_box">
            <p>Color : blonde</p>
            <p>Category : lager</p>
            <p>Taste : soft</p>
            <p>Strength : 6%</p>
        </div>

        <div id="red_box">
            <p>Brewery : Kronenbourg</p>
            <p>Location :  Strasbourg, France</p>
            <p>Average Grade : 4,35/5</p>
            <p>Comments</p>
        </div>

        <a href='add_comment.php?id=".$this->ID_beer."' id="comment_button">
            <button>Add a comment</button>
        </a>

    </div> -->
    
</body>
</html>
