<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/add_beer.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <title>Beer Advisor | Add a beer</title>
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

        global $db, $beer;

        if (isset($_GET["id"]) && !empty($_GET["id"]))
        {
            // fill all the fields with the known beer's info
            $id = $_GET["id"];
            $sql = "SELECT MAX(ID_beer) FROM beer";
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            $max_id = $result[0];
            if ($id > $max_id) {
                echo "This beer doesn't exist";
                return;
            } else {
                $sql = "SELECT * FROM beer INNER JOIN color ON beer.ID_color = color.ID_color 
                        INNER JOIN taste ON beer.ID_taste = taste.ID_taste 
                        INNER JOIN category ON beer.ID_category = category.ID_category 
                        WHERE ID_beer = ?";
                        
                $query = $db->prepare($sql);
                $query->execute([$id]);
                $beer = $query->fetch();
                if (!empty($beer)) {
                    $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],$beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name']);
                }
                

            }
            $ID_BEER = $id;
            $_SESSION["ID_ADD_BEER"] = $ID_BEER;
        }

        $nameErr = $locationErr = $colorErr = $strengthErr = $tasteErr = $breweryErr = $categoryErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name = test_input($_POST["name"]);
            $location = test_input($_POST["location"]);
            $color = test_input($_POST["color"]);
            $strength = test_input($_POST["strength"]);
            $taste = test_input($_POST["taste"]);
            $brewery = test_input($_POST["brewery"]);
            $category = test_input($_POST["category"]);
            
            if (!empty($name) && __isbeerhere($name, "name", $db)) {
                if (!isset($_SESSION["ID_ADD_BEER"])) {
                    
                    $nameErr = "<script>validate('name_box');</script>
                    <p class='error_message'>This Beer already exists</p>";
                }
            } 
            if ($color == "0") {
                
                $colorErr = "<script>validate('color_box');</script>
                <p class='error_message'>Color is required</p>";
            } 
            if ($taste == "0") {
                
                $tasteErr = "<script>validate('taste_box');</script>
                <p class='error_message'>Taste is required</p>";
            } 
            if ($category == "0") {
                
                $categoryErr = "<script>validate('category_box');</script>
                <p class='error_message'>Category is required</p>";
            } 
            if (empty($nameErr) && empty($colorErr) && empty($tasteErr) && empty($categoryErr)) {
                if (isset($_SESSION["ID_ADD_BEER"]) && !empty($_SESSION["ID_ADD_BEER"])) {
                    // update a beer            
                    $ID_beer = $_SESSION["ID_ADD_BEER"];
                    $sql = "UPDATE beer SET name = ?, location = ?, ID_color = ?, strength = ?, ID_taste = ?, brewery = ?, ID_category = ? WHERE ID_beer = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$name, $location, $color, $strength, $taste, $brewery, $category, $ID_beer]);	
                    $id=$ID_beer;
                    
                } else {
                    // add a beer
                    $sql = "INSERT INTO beer (name, location, ID_color, strength, ID_taste, brewery, ID_category) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $query = $db->prepare($sql);
                    $query->execute([$name, $location, $color, $strength, $taste, $brewery, $category]);
                    $id=$db->lastInsertId();
                }
                if (empty($id)) {
                    echo "Error";
                } else {
                    // header("Location: beer.php?id=$id");
                    echo "<script> window.location.href='beers.php?id=".$id."'; </script>";
                }                
            }    
        }
    ?>

    <h1 id="title"><a href="./add_beer.php">Add a beer</a></h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <div class="spacing"></div>

        <div id="add_beer_form">

            <div id="boiteD">
            
                <div class="conteneur" name="name_box">
                    <div><i class="fa fa-fw fa-tag" id="logosearch"></i></div>
                    <input required class='input' placeholder="Name" type="text" name="name" value="<?php if (isset($beer->name)) {echo $beer->name;} ?>">
                </div>  

                <?php echo $nameErr ?>

                <div class="conteneur">
                    <div><i class="fa fa-fw fa-map-marker" id="logosearch"></i></div>
                    <input class='input' placeholder="Location" type="text" name="location" value="<?php if (isset($beer->location)) {echo $beer->location;} ?>">
                </div>
                
                <?php echo $locationErr ?>

                <div class="conteneur">
                    <div><i class="fa fa-fw fa-beer" id="logosearch"></i></div>
                    <input class='input' placeholder="Brewery" type="text" name="brewery" value="<?php if (isset($beer->brewery)) {echo $beer->brewery;} ?>">
                </div>

                <?php echo $breweryErr ?>

                <div class="conteneur">
                    <div><i class="fa fa-fw fa-thermometer-3" id="logosearch"></i></div>
                    <input class='input' placeholder="Strength" type="number" step="0.1" min=0 name="strength" value="<?php if (isset($beer->strength)) {echo $beer->strength;} ?>">
                </div>

                <?php echo $strengthErr ?>

            </div>

            <div id="boiteG">

                <div class="conteneur" name="color_box">

                    <div><i class="fa fa-fw fa-tint" id="logosearch"></i></div>
                    <select name="color" class="select_options">

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

                </div>
            
                <?php echo $colorErr ?>
                
                <div class="conteneur" name="taste_box">
                    
                    <div><i class="fa fa-fw fa-flask" id="logosearch"></i></div>
                    <select name="taste" class="select_options">

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

                </div>

                <?php echo $tasteErr ?>

                <div class="conteneur" name="category_box">

                    <div><i class="fa fa-fw fa-folder" id="logosearch"></i></div>
                    <select name="category" class="select_options">

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

                </div>
                
                <?php echo $categoryErr ?>
                
                <input type="submit" value="Submit" id="submit">

            </div>

        </div>

    </form>
</body>

</html>