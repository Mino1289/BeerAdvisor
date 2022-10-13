<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.scss">
    <link rel="stylesheet" href="./css/add_beer.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <title>Beer Advisor</title>
</head>

<body>
    <?php
    session_start();
    include 'header.php';
    include 'database.php';
    global $db, $beer;
    include 'beerinfo.php';
    include 'function.php';

    if (isset($_GET["id"]) && !empty($_GET["id"])) {
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
                    WHERE ID_beer = $id";
                    
            $query = $db->prepare($sql);
            $query->execute();
            $beer = $query->fetch();
            if (!empty($beer)) {
                $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],$beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name']);
            }
            

        }
        $ID_BEER = $id;
        $_SESSION["ID_ADD_BEER"] = $ID_BEER;
    }
    $nameErr = $locationErr = $colorErr = $strengthErr = $tasteErr = $breweryErr = $categoryErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $location = test_input($_POST["location"]);
        $color = test_input($_POST["color"]);
        $strength = test_input($_POST["strength"]);
        $taste = test_input($_POST["taste"]);
        $brewery = test_input($_POST["brewery"]);
        $category = test_input($_POST["category"]);

        if (empty($name)) {
            $nameErr = "<p>Name is required</p><br>";
        } 
        if (!empty($name) && __isbeerhere($name, "name", $db)) {
            if (!isset($_SESSION["ID_ADD_BEER"])) {
                $nameErr = "<p>This Beer already exists</p><br>";
            }
        } 
        if ($color == "0") {
            $colorErr = "<p>Color is required</p><br>";
        } 
        if ($taste == "0") {
            $tasteErr = "<p>Taste is required</p><br>";
        } 
        if ($category == "0") {
            $categoryErr = "<p>Category is required</p><br>";
        } 
        if (empty($nameErr) && empty($colorErr) && empty($tasteErr) && empty($categoryErr)) {
            if (isset($_SESSION["ID_ADD_BEER"])) {
                if (empty($_SESSION["ID_ADD_BEER"])) {
                    echo "No ID";
                    return;
                } 
                // update a beer            
                $ID_beer = $_SESSION["ID_ADD_BEER"];
                $sql = "UPDATE beer SET name = '$name', location = '$location', ID_color = '$color', strength = '$strength', ID_taste = '$taste', brewery = '$brewery', ID_category = '$category' WHERE ID_beer = $ID_beer";
                $query = $db->prepare($sql);
                $query->execute();
                $id=$ID_beer;
                
            } else {
                // add a beer
                $sql = "INSERT INTO beer (name, location, ID_color, strength, ID_taste, brewery, ID_category) VALUES ('$name', '$location', '$color', '$strength', '$taste', '$brewery', '$category')";
                $query = $db->prepare($sql);
                $query->execute();
                $id=$db->lastInsertId();
            }
            if (empty($id)) {
                echo "Error";
            } else {
                header("Location: beer.php?id=$id");
            }                
        }    
    }



    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="" value="<?php if (isset($beer->name)) {echo $beer->name;} ?>"> <br>
        <?php echo $nameErr ?>
        <label for="location">Location</label>
        <input type="text" name="location" id="" value="<?php if (isset($beer->location)) {echo $beer->location;} ?>"> <br>
        <?php echo $locationErr ?>
        <label for="brewery">Brewery</label>
        <input type="text" name="brewery" id="" value="<?php if (isset($beer->brewery)) {echo $beer->brewery;} ?>"> <br>
        <?php echo $breweryErr ?>
        <label for="strength">Strength</label>
        <input type="text" name="strength" id="" value="<?php if (isset($beer->strength)) {echo $beer->strength;} ?>"> <br>
        <?php echo $strengthErr ?>
        <label for="color">Color</label>
        <select name="color" id="">
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
        </select> <br>
        <?php echo $colorErr ?>
        <label for="taste">Taste</label>
        <select name="taste" id="">
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
        </select> <br>
        <?php echo $tasteErr ?>
        <label for="category">Category</label>
        <select name="category" id="">
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
        </select> <br>
        <?php echo $categoryErr ?>
        <input type="submit" value="Submit">
    </form>
</body>

</html>