<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.scss">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
</head>
<body>
    <?php
        include 'header.php';
        if ((isset($_GET["id"]) && !empty($_GET["id"])) || (isset($_SESSION["ID_user"]) && !empty($_SESSION["ID_user"]))) {
            include 'database.php';
            include 'userinfo.php';
            global $db;

            $sql = "SELECT MAX(ID_user) FROM user";
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            $max_id = $result[0];
            if ($_GET["id"] > $max_id) {
                echo "<p>This user doesn't exist</p>";
            }
            
            $ID_user = $_GET["id"];

            $sql = "SELECT * FROM user INNER JOIN rank ON user.ID_rank = rank.ID_rank WHERE ID_user = " .$ID_user;

            $result = $db->prepare($sql);
            $result->execute();
            $user = $result->fetch();

            $user = new User($user["ID_user"], $user["name"], $user["firstname"], $user["username"], $user["mail"], $user["profile_picture"], $user["password"], $user["rank_name"]);
            $user->display_page();
        } else {
            echo "<p>This user doesn't exist</p>";
        }
    ?>
    
</body>
</html>
