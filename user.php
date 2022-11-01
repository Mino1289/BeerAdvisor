<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.scss">
    <link rel="stylesheet" href="./css/comment.scss">
    <link rel='stylesheet' href='./css/user.scss'>
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
</head>
<body>
    <?php
        session_start();
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

            $sql = "SELECT ID_user from user WHERE ID_user = ?";
            $query = $db->prepare($sql);
            $query->execute([$_GET["id"]]);
            $exist = $query->fetch();


            if ($_GET["id"] > $max_id || empty($exist)) {
                echo "<p>This user doesn't exist</p>";
            }
            
            $ID_user = $_GET["id"];

            $sql = "SELECT * FROM user INNER JOIN rank ON user.ID_rank = rank.ID_rank WHERE ID_user = ?";

            $result = $db->prepare($sql);
            $result->execute([$ID_user]);
            $user = $result->fetch();

            $user = new User($user["ID_user"], $user["name"], $user["firstname"], $user["username"], $user["mail"], $user["profile_picture"],
                             $user["password"], $user["rank_name"]);
                             
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ID_user = $_SESSION["ID_user"];
                
                $sql = "SELECT * FROM follow WHERE ID_user = ? AND ID_followed = ?";
                $result = $db->prepare($sql);
                $result->execute([$ID_user, $user->ID_user]);
                $follow = $result->fetch();
                if (empty($follow)) {
                    // follow -> add in the db
                    $sql = "INSERT INTO follow (ID_user, ID_followed) VALUES (?, ?)";
                    $query = $db->prepare($sql);
                    $query->execute([$ID_user, $user->ID_user]);
                } else {
                    // dislike -> delete from the db
                    $ID_follow = $follow["ID"];
                    $sql = "DELETE FROM follow WHERE ID = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$ID_follow]);
                }
            }
            $user->display_page();

        } else {
            echo "<p>This user doesn't exist</p>";
        }
    ?>
    
</body>
</html>
