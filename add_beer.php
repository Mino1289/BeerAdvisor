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
                        INNER JOIN hops ON beer.ID_hops = hops.ID_hops
                        INNER JOIN grains ON beer.ID_grains = grains.ID_grains
                        WHERE ID_beer = ?";
                        
                $query = $db->prepare($sql);
                $query->execute([$id]);
                $beer = $query->fetch();
                if (!empty($beer)) {
                    $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],
                                    $beer['color_name'],$beer['strength'],$beer['taste_name'],
                                    $beer['brewery'], $beer['category_name'], $beer['IBU'],
                                    $beer['hops_name'], $beer['grains_name'], $beer['calories'],
                                    $beer['clarity'], $beer['carbohydrates'], $beer['beer_picture']);
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
            $calories = test_input($_POST["calories"]);
            $clarity = test_input($_POST["clarity"]);
            $carbohydrates = test_input($_POST["carbohydrates"]);
            $IBU = test_input($_POST["IBU"]);
            $hops_name = test_input($_POST["hops"]);
            $grains_name = test_input($_POST["grains"]);
            $picture_beer = test_input($_POST["beer_picture"]);
            
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
                    $sql = "UPDATE beer SET name = ?, location = ?, ID_color = ?, strength = ?, 
                                            ID_taste = ?, brewery = ?, ID_category = ?, IBU = ?, ID_hops = ?,
                                            ID_grains = ?, clarity = ?, calories = ?, carbohydrates = ?, beer_picture = ? WHERE ID_beer = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$name, $location, $color, $strength, $taste, $brewery, $category, 
                                    $IBU, $hops_name, $grains_name, $clarity, $calories, $carbohydrates, $picture_beer, $ID_beer]);	

                    $id=$ID_beer;
                    
                } else {
                    // add a beer
                    $sql = "INSERT INTO beer 
                    (name, location, ID_color, strength, ID_taste, brewery, ID_category, IBU, ID_hops, ID_grains, clarity, calories, carbohydrates, beer_picture) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $query = $db->prepare($sql);
                    $query->execute([$name, $location, $color, $strength, $taste, $brewery, $category,
                                    $IBU, $hops_name, $grains_name, $clarity, $calories, $carbohydrates, $picture_beer]);

                    $id=$db->lastInsertId();
                }
                if (empty($id)) {
                    echo "Error";
                } else {
                    // header("Location: beer.php?id=$id");
                    echo "<script> window.location.href='beer.php?id=".$id."'; </script>";
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
                    <div><i class="fa fa-fw fa-thermometer-2" id="logosearch"></i></div>
                    <input class='input' placeholder="Strength" type="number" step="0.1" min=0 max=100 name="strength" value="<?php if (isset($beer->strength)) {echo $beer->strength;} ?>">
                </div>

                <?php echo $strengthErr ?>

                <div class="conteneur">
                    <div><i class="fa fa-fw fa-thermometer-3" id="logosearch"></i></div>
                    <input class='input' placeholder="IBU" type="number" step="0.1" min=0 name="IBU" max=100000 value="<?php if (isset($beer->IBU)) {echo $beer->IBU;} ?>">
                </div>

                <div class="conteneur">
                    <div><i class="fa fa-fw fa-fire" id="logosearch"></i></div>
                    <input class='input' placeholder="Calories" type="number" step="0.5" min=0 max=1000 name="calories" value="<?php if (isset($beer->calories)) {echo $beer->calories;} ?>">
                </div>

                <div class="conteneur">
                    <div><i class="fa fa-fw fa-eye" id="logosearch"></i></div>
                    <input class='input' placeholder="Clarity" type="number" step="1" min=0 name="clarity" max=100 value="<?php if (isset($beer->clarity)) {echo $beer->clarity;} ?>">
                </div>

            </div>

            <div id="boiteG">

                <div class="conteneur">
                    <div><i class="fa fa-fw fa-battery-2" id="logosearch"></i></div>
                    <input class='input' placeholder="Carbohydrates" type="number" step="1" min=0 name="carbohydrates" max=1000 value="<?php if (isset($beer->carbohydrates)) {echo $beer->carbohydrates;} ?>">
                </div>

                <div class="conteneur">
                        <div><i class="fa fa-fw fa-camera" id="logosearch"></i></div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                        <input class='input' id='beer_picture' name="beer_picture" type="file" placeholder="Avatar" autocomplete="off"/>
                    </div>

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

                <div class="conteneur" name="grains_box">

                    <div><i class="fa fa-fw fa-tree" id="logosearch"></i></div>
                    <select name="grains" class="select_options">

                        <option value="0">Choose a grains</option>
                        
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

                </div>

                <div class="conteneur" name="hops_box">

                    <div><i class="fa fa-fw fa-tree" id="logosearch"></i></div>
                    <select name="hops" class="select_options">

                        <option value="0">Choose a hops</option>
                        
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

                </div>
                
            </div>

        </div>

        <div id='button_submit'>

                <input type="submit" value="Submit" id="submit">
                
            </div>

    </form>
</body>

</html>