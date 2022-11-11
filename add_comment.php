<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/add_comment.scss">
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
            $grade = test_input($_POST["grade"]);
            $date = test_input($_POST["date_drinking"]);


            $date = strtotime($date);
            $date = date('Y-m-d', $date);

            if (empty($comment)) {
                $commentErr = "<p>Comment is required</p>";
            } else if (empty($date)) {
                $dateErr = "<p>Date is required</p>";
            } else {
                $sql = "INSERT INTO 
                        comment (ID_user, ID_beer, content, grade, date_publication, date_drinking) 
                        VALUES (?, ?, ?, ?, NOW(), ?)";

                $query = $db->prepare($sql);
                $query->execute([$ID_user, $ID_beer, $comment, $grade, $date]);
                $id = $db->lastInsertId();

                if ($_FILES["beer_picture"]['size'] != 0) {
                    $picture = $_FILES["beer_picture"]["tmp_name"];
                    $picture = file_get_contents($picture);
                    $sql = "UPDATE comment SET picture = ? WHERE ID_comment = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$picture, $id]);
                }
                echo "<script> window.location.href='beer.php?id=".$ID_beer."'; </script>";
            }
        }
    ?>

    <h1 id="title">Add a comment</h1>

    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        
        <div class="comment">
            <div><i class="fa fa-fw fa-comments" id="logosearch"></i></div>
            <textarea style="overflow:hidden" required class='input' name="content" maxlength=300 placeholder="Comment content" autocomplete="off" cols="30" rows="5"></textarea>
        </div>
        
        <?php echo $commentErr; ?>

        <div class="name">
            <div><i class="fa fa-fw fa-star" id="logosearch"></i></div>
            <p>Grade :</p>
            <div id="range_grade">
                <input type="range" name="grade" max="5" min="0" step="0.5" value="2.5">
            </div>
        </div>

        <div class="name">
            <div><i class="fa fa-fw fa-calendar" id="logosearch"></i></div>
            <p>Drinking date :</p>
            <div id="date_case">
                <input type="date" name="date_drinking" max="<?php echo date('Y-m-d', time());?>">
            </div>
        </div>

        <div class="name">
            <div><i class="fa fa-fw fa-camera" id="logosearch"></i></div>
            <input type="hidden" name="MAX_FILE_SIZE" value="250000" />

            <div class="parent-div">
                <button class="btn-upload">Picture</button>
                <input class='input' id='beer_picture' name="beer_picture" type="file" accept="image/png, image/jpeg, image/jpg" autocomplete="off"/>
            </div>

        </div>
        
        <?php echo $dateErr;?>
        
        <input name="submit" type="submit" value="Add Comment" id="submit"/>

    </form>

</body>
</html>