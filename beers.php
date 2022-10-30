<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/beers.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <title>Beer Advisor | Search a beer</title>
</head>

<body>

    <script>
        function validate(input)
        {
            document.getElementsByName(input)[0].classList.add("error");
        }
    </script>

    <?php

        session_start();
        include 'header.php';
        include 'database.php';
        include 'beerinfo.php';
        include 'function.php';

        global $db;
        
    ?>
    
    <h1 id="title"><a href="./beers.php">Search a beer</a></h1>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="spacing">

        <div id="search">
            <div><i class="fa fa-fw fa-search" id="logosearch"></i></div>
            <select name="category">

                <option value="0">Category</option>

                <?php
                    $sql = "SELECT * FROM category";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $category) {
                        if (isset($beer->category) && $beer->category == $category['category_name']) {
                            echo "<option value='" . $category['ID_category'] . "' selected>" . $category['category_name'] . "</option>";
                        } else {
                            echo "<option value='" . $category['ID_category'] . "'>" . $category['category_name'] . "</option>";
                        }
                    }
                ?>

            </select>
            <select name="color">

                <option value="0">Color</option>
                
                <?php
                    $sql = "SELECT * FROM color";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $color) {
                        if (isset($beer->color) && $beer->color == $color['color_name']) {
                            echo "<option value='" . $color['ID_color'] . "' selected>" . $color['color_name'] . "</option>";
                        } else {
                            echo "<option value='" . $color['ID_color'] . "'>" . $color['color_name'] . "</option>";
                        }
                    }
                ?>

            </select>
            <select name="taste">

                <option value="0">Taste</option>
                
                <?php
                    $sql = "SELECT * FROM taste";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $taste) {
                        if (isset($beer->taste) && $beer->taste == $taste['taste_name']) {
                            echo "<option value='" . $taste['ID_taste'] . "' selected>" . $taste['taste_name'] . "</option>";
                        } else {
                            echo "<option value='" . $taste['ID_taste'] . "'>" . $taste['taste_name'] . "</option>";
                        }
                    }
                ?>

            </select>
            <select name="grains">

                <option value="0">Grains</option>
                
                <?php
                    $sql = "SELECT * FROM grains";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $grains) {
                        if (isset($beer->grains) && $beer->grains == $grains['grains_name']) {
                            echo "<option value='" . $grains['ID_grains'] . "' selected>" . $grains['grains_name'] . "</option>";
                        } else {
                            echo "<option value='" . $grains['ID_grains'] . "'>" . $grains['grains_name'] . "</option>";
                        }
                    }
                ?>

            </select>
            <select name="hops">

                <option value="0">Hops</option>
                
                <?php
                    $sql = "SELECT * FROM hops";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $hops) {
                        if (isset($beer->hops) && $beer->hops == $hops['hops_name']) {
                            echo "<option value='" . $hops['ID_hops'] . "' selected>" . $hops['hops_name'] . "</option>";
                        } else {
                            echo "<option value='" . $hops['ID_hops'] . "'>" . $hops['hops_name'] . "</option>";
                        }
                    }
                ?>

            </select>
            <input type="submit" value="Research" id="submit">
        </div>

    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $category = test_input($_POST["category"]);
            $taste = test_input($_POST["taste"]);
            $color = test_input($_POST["color"]);
            $hops = test_input($_POST["hops"]);
            $grains = test_input($_POST["grains"]); 
            
            if ($color != 0 || $taste != 0 || $category != 0 || $hops != 0 || $grains != 0)
            {
                $rq = "WHERE ";

                if ($color != 0)
                {
                    $rq = $rq." color.ID_color = $color ";
                }
                
                if ($taste != 0 && $color != 0)
                {
                    $rq = $rq."AND taste.ID_taste = $taste ";
                }
                else if ($taste != 0)
                {
                    $rq = $rq."taste.ID_taste = $taste ";
                }

                if ($category != 0 && ($taste != 0 || $color != 0))
                {
                    $rq = $rq."AND category.ID_category = $category ";
                }
                else if ($category != 0)
                {
                    $rq = $rq." category.ID_category = $category ";
                }

                if ($hops != 0 && ($category != 0 || $taste != 0 || $color != 0))
                {
                    $rq = $rq."AND hops.ID_hops = $hops ";
                }
                else if ($hops != 0)
                {
                    $rq = $rq." hops.ID_hops = $hops ";
                }

                if ($grains != 0 && ($hops != 0 || $category != 0 || $taste != 0 || $color != 0))
                {
                    $rq = $rq."AND grains.ID_grains = $grains ";
                }
                else if ($grains != 0)
                {
                    $rq = $rq." grains.ID_grains = $grains ";
                }
            }
            else
            {
                $rq = "";
            }

            $sql = "SELECT * FROM beer INNER JOIN color ON beer.ID_color = color.ID_color 
                INNER JOIN taste ON beer.ID_taste = taste.ID_taste 
                INNER JOIN category ON beer.ID_category = category.ID_category
                INNER JOIN hops ON beer.ID_hops = hops.ID_hops
                INNER JOIN grains ON beer.ID_grains = grains.ID_grains " . $rq . ";";

            $result = $db->prepare($sql);
            $result->execute();
            $beers = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach($beers as $beer){

                $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],
                    $beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name'], $beer['IBU'],$beer['hops_name']
                    ,$beer['grains_name'],$beer['calories'],$beer['clarity'],$beer['carbohydrates'], $beer['beer_picture']);

                $beer->display_box();
                echo "<div class='border_separation'></div>";
            }
            
            echo "<div class='border_separation_undo'></div>";
        }
    ?>
        
</body>

</html>