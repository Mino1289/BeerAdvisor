<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.scss">
        <link rel="stylesheet" href="./css/panel.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./img/logo.ico" type="image/x-icon">
        <title>Beer Advisor</title>
    </head>
    
    <body>
        <?php
            include 'header.php';
            include 'function.php';
            include 'database.php';
            global $db;
        
            if (!isset($_SESSION["ID_user"]) || $_SESSION["ID_user"] != 1) {
                // admin is not logged in
                header("Location: index.php");
            }

        ?>
        
        <h1>Admin panel</h1>

        <!-- create an admin panel where we can remove beers, add/edit/remove category/colors/tastes. -->
        <div class="container">
            
            <div class="box">
                <h2>Beers</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM beer";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll();
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["ID_beer"] . "</td>";
                            echo "<td><a href='beer.php?id=".$row["ID_beer"]."'>" . $row["name"] . "</a></td>";
                            echo "<td><a href='add_beer.php?id=" . $row["ID_beer"] . "'>Edit</a></td>";
                            echo "<td><a href='remove.php?type=beer&id=" . $row["ID_beer"] . "'>Remove</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <br>
                <a href="add_beer.php" class="button">Add a beer</a>
            </div>

            <div class="box">
                <h2>Categories</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM category";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll();
                        foreach ($result as $row) {
                            if ($row["ID_category"] != 1) {
                                echo "<tr>";
                                echo "<td>" . $row["ID_category"] . "</td>";
                                echo "<td>" . $row["category_name"] . "</td>";
                                echo "<td><a href='add.php?type=category&id=" . $row["ID_category"] . "'>Rename</a></td>";
                                echo "<td><a href='remove.php?type=category&id=" . $row["ID_category"] . "'>Remove</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <br>
                <a href="add.php?type=category" class="button">Add a category</a>
            </div>

            <div class="box">
                <h2>Colors</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM color";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll();
                        foreach ($result as $row) {
                            if ($row["ID_color"] != 1) {
                                echo "<tr>";
                                echo "<td>" . $row["ID_color"] . "</td>";
                                echo "<td>" . $row["color_name"] . "</td>";
                                echo "<td><a href='add.php?type=color&id=" . $row["ID_color"] . "'>Rename</a></td>";
                                echo "<td><a href='remove.php?type=color&id=" . $row["ID_color"] . "'>Remove</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <br>
                <a href="add.php?type=color" class="button">Add a color</a>
            </div>

            <div class="box">
                <h2>Taste</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM taste";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll();
                        foreach ($result as $row) {
                            if ($row["ID_taste"] != 1) {
                                echo "<tr>";
                                echo "<td>" . $row["ID_taste"] . "</td>";
                                echo "<td>" . $row["taste_name"] . "</td>";
                                echo "<td><a href='add.php?type=color&id=" . $row["ID_taste"] . "'>Rename</a></td>";
                                echo "<td><a href='remove.php?type=taste&id=" . $row["ID_taste"] . "'>Remove</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <br>
                <a href="add.php?type=taste" class="button">Add a taste</a>
            </div>

            <div class="box">
                <h2>Hops</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM hops";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll();
                        foreach ($result as $row) {
                            if ($row["ID_hops"] != 1) {
                                echo "<tr>";
                                echo "<td>" . $row["ID_hops"] . "</td>";
                                echo "<td>" . $row["hops_name"] . "</td>";
                                echo "<td><a href='add.php?type=color&id=" . $row["ID_hops"] . "'>Rename</a></td>";
                                echo "<td><a href='remove.php?type=hops&id=" . $row["ID_hops"] . "'>Remove</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <br>
                <a href="add.php?type=hops" class="button">Add a hops</a>
            </div>

            <div class="box">
                <h2>Grains</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM grains";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll();
                        foreach ($result as $row) {
                            if ($row["ID_grains"] != 1) {
                                echo "<tr>";
                                echo "<td>" . $row["ID_grains"] . "</td>";
                                echo "<td>" . $row["grains_name"] . "</td>";
                                echo "<td><a href='add.php?type=color&id=" . $row["ID_grains"] . "'>Rename</a></td>";
                                echo "<td><a href='remove.php?type=grains&id=" . $row["ID_grains"] . "'>Remove</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <br>
                <a href="add.php?type=grains" class="button">Add a grains</a>
            </div>
        </div>

       
    </body>
</html>
