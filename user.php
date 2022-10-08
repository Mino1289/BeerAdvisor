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
        if (isset($_SESSION['id'])) {
            echo '<h1>Bonjour ' . $_SESSION['pseudo'] . '</h1>';
        } else {
            if (isset($_GET["id"])) {
                $ID_user = $_GET["id"];

                include 'database.php';
                include 'userinfo.php';
                global $db;

                $sql = "SELECT * FROM user WHERE ID_user = " .$ID_user;

                $result = $db->prepare($sql);
                $result->execute();
                $user = $result->fetch(PDO::FETCH_ASSOC);

                $user = new User($user["ID_user"], $user["name"], $user["firstname"], $user["username"], $user["mail"], $user["profile_picture"], $user["password"], $user["rank"]);
                $user->display_page();
            } else {
                echo "<p>Cet utilisateur n'existe pas</p>";
            }
    ?>
    
</body>
</html>
