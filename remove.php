<?php
    session_start();
    include 'database.php';
    global $db;

    if (!isset($_SESSION["ID_user"]) || $_SESSION["ID_user"] != 1) {
        // admin is not logged in
        header("Location: ./index.php");
    }

    $types = ["beer", "category", "color", "taste", "hops"];
    if (isset($_GET["type"]) && !empty($_GET["type"])) {
        // check if $_GET["type"] is in $types
        if (in_array($_GET["type"], $types)) {
            $type = $_GET["type"];
        } else {
            // if not, redirect to panel.php
            header("Location: ./panel.php");
        }
        // check if $_GET["id"] is set and not empty
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id = $_GET["id"];

            // check if the id exists in the database
            $sql = "SELECT * FROM ".$type." WHERE ID_".$type." = ?";
            $query = $db->prepare($sql);
            $query->execute([$id]);
            $result = $query->fetch();
            if (empty($result)) {
                echo "<p>".$id."not found for ".$type."</p>";
            }
            // if it does, delete it
            if ($id == 1 && $type != "beer") {
                // don't delete the first item which is the default "unknown" item
                echo "<p>Can't remove ".$type." with id 1</p>";
            } else {
                // remove the id from the database
                $sql = "DELETE FROM ".$type." WHERE ID_".$type." = ?";
                $query = $db->prepare($sql);
                $query->execute([$id]);
                echo "<p>".$type." with id ".$id." removed</p>";
            }
        }
    }
    header("Location: ./panel.php");
?>