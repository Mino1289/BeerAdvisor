<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.scss">
    <link rel="stylesheet" href="./css/add_beer.scss">
    <link rel="stylesheet" href="./css/beer.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <title>Beer Advisor</title>
</head>

<body>
    <?php
    include 'header.php';
    include 'database.php';
    include 'beerinfo.php';

    if (isset($_GET["id"])) {
        // update a beer
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
            $sql = "SELECT * FROM beer WHERE ID_beer = $id";
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            
            $beer = new Beer($result["ID_beer"], $result["name"], $result["location"], $result["color"], $result["strength"], $result["taste"], $result["brewery"], $result["category"]);
            $beer->display_box();
        }
    } else {
        // add a beer
        echo "add a beer";
    }
    ?>

</body>

</html>