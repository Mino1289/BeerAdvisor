<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <title>Beer Advisor</title>
</head>
<body>
    <?php
        session_start();
        include 'header.php';
        include 'database.php';
        global $db;
        include 'userinfo.php';
        include 'function.php';

        if (isset($_SESSION["ID_user"])) {
            $ID_user = $_SESSION["ID_user"];
        } else {
            return;
        }
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
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
                $_SESSION["ID_ADD_COMMENT"] = $ID_beer = $id;
            }
        } else {
            
        }

        $commentErr = $dateErr = $date = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ID_beer = $_SESSION["ID_ADD_COMMENT"];
            $comment = test_input($_POST["content"]);
            $nocom = test_input($_POST["nocom"]);
            $grade = test_input($_POST["grade"]);
            $date = test_input($_POST["date_drinking"]);

            $date = strtotime($date);
            $date = date('Y-m-d', $date);

            if (empty($comment) && empty($nocom)) {
                $commentErr = "<p>Comment is required</p>";
            } else if (empty($date)) {
                $dateErr = "<p>Date is required</p>";
            } else {
                $sql = "INSERT INTO comment (ID_user, ID_beer, content, grade, date_publication, date_drinking) VALUES ($ID_user, $ID_beer, '$comment', $grade, NOW(), '$date')";
                echo "$sql";
                $query = $db->prepare($sql);
                $query->execute();
                header("Location: beer.php?id=$ID_beer");
            }
        }
        

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="content">Comment content</label>
        <input type="text" name="content" id="" maxlength="300"><br>
        <?php echo $commentErr; ?>

        <label for="nocom">No comment</label>
        <input type="text" name="nocom" id=""><br>

        <label for="grade">Grade</label>
        <input type="range" name="grade" id="" max="5" min="0" step="0.5" value="2.5"><br>

        <label for="date">Driking date</label>
        <input type="date" name="date_drinking" id=""><br>
        <?php echo $dateErr;echo $date; ?>
        <br>
        <button type="submit">Add Comment</button>

    </form>
</body>
</html>