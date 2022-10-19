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

                <option value="0">Choose a category</option>

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

                        <option value="0">Choose a color</option>
                        
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

                        <option value="0">Choose a taste</option>
                        
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
            <input type="submit" value="Research" id="submit">
        </div>

        <div id="bordure_separation"></div>

    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $category = test_input($_POST["category"]);
            $taste = test_input($_POST["taste"]);
            $color = test_input($_POST["color"]);
            
            if ($color != 0 || $taste != 0 || $category != 0)
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

                if ($category != 0 && $taste != 0 && $color != 0)
                {
                    $rq = $rq."AND category.ID_category = $category;";
                }
                else if ($category != 0)
                {
                    $rq = $rq." category.ID_category = $category;";
                }
            }
            else
            {
                $rq = "";
            }

            $sql = "SELECT * FROM beer INNER JOIN color ON beer.ID_color = color.ID_color 
                        INNER JOIN taste ON beer.ID_taste = taste.ID_taste 
                        INNER JOIN category ON beer.ID_category = category.ID_category " . $rq;

            $result = $db->prepare($sql);
            $result->execute();
            $beers = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach($beers as $beer){

                $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],$beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name']);
                $beer->display_box();
            }
        }
    ?>
        
</body>

</html>