<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./img/logo.ico" type="image/x-icon">
        <title>Beer Advisor</title>
    </head>
        
    <body>

        <?php
           include 'header.php';
        ?>

        <h1 id="title"><a href="./index.php">BEER ADVISOR</a></h1>

        <div id="box_google_type">

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="spacing">

                <div id="search">
                    <div id=""><i class="fa fa-fw fa-search" id="logosearch"></i></div>
                    <input name="value" id="input" type="text" placeholder="Find a beer" maxlength="32" autocomplete="off">
                    <input type="submit" value="Research" id="submit">
                </div>

                <div id="bordure_separation"></div>
            </form>

            <?php
        
                include "beerinfo.php";
                include "function.php";
                include "database.php";
                global $db;
                // define variables and set to empty values
                $value = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["value"])) {
                        header("Location: ./beers.php");
                    } else {
                        $value = test_input($_POST["value"]);
                    }
                }

                if ($value == "") {
                    return;
                } else {
                    $sql = "SELECT * FROM beer INNER JOIN color ON beer.ID_color = color.ID_color 
                            INNER JOIN taste ON beer.ID_taste = taste.ID_taste 
                            INNER JOIN category ON beer.ID_category = category.ID_category 
                            WHERE name LIKE '%$value%'";
                }

                $query = $db->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);

                $n = count($result);
                foreach ($result as $beer) {
                    $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],$beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name']);
                    $beer->display_box();
                }
                if ($n == 0) {
                    echo "<p id='no_beer_found'> No beer found. <a href='add_beer.php'>Add one <a> ?</p>";
                } else {
                    echo "<p id='add_beer'> Not what you were looking for ? <a href='add_beer.php'>Add a beer<a> ?</p>";
                }
                echo "<link rel='stylesheet' href='./css/beer_research.scss'>";

            ?>

            <!-- Affichage d'une bière 
            <div class='beerbox'>"
                <h2><a href='beer.php?id=".$this->ID_beer."'>".$this->name."</a></h2>
                <p>Average grade : ".$grade."</p>
            </div> -->

        </div>
    </body>
</html>
