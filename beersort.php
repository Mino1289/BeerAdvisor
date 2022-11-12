<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/sort.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./img/logo.ico" type="image/x-icon">
        <title>Beer Advisor</title>
    </head>
    
    <body>
        <script>
            
            function affichage() {
                if (document.getElementById("table1").classList.contains("hidden"))
                {
                    document.getElementById("table1").classList.remove("hidden");
                    document.getElementById("table2").classList.add("hidden");
                }
                
                else
                {
                    document.getElementById("table1").classList.add("hidden");
                    document.getElementById("table2").classList.remove("hidden");
                }
            }
            
        </script>

        <?php
            include 'header.php';
            include 'database.php';
            global $db;

            echo "<h1 id='title'>Beer grades</h1>";

            echo '<button onclick="affichage(this)">Change display</button>';

            if (!isset($_SESSION["ID_user"]) || empty($_SESSION["ID_user"]))
            {
                header("Location: index.php");
            }

            $sql = "SELECT beer.ID_beer, name, grade FROM comment INNER JOIN beer ON comment.ID_beer = beer.ID_beer WHERE comment.ID_user = ? GROUP BY ID_beer ORDER BY AVG(grade) DESC";
            $query = $db->prepare($sql);
            $query->execute([$_SESSION["ID_user"]]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // affichage des nom des bières et de la note en table
            echo "<div id='table1' class='none' class='container'>";

                echo "<div class='box'>";

                    echo "<table>";
                        echo "<tr>";
                            echo "<th>Beer</th>";
                            echo "<th>Grade</th>";
                        echo "</tr>";

                        echo "<tr>";
            foreach ($result as $row)
            {
                        echo "<tr>";
                            echo "<td><a href='beer.php?id=" . $row['ID_beer'] . "'>" . $row['name'] . "</a></td>";
                            echo "<td>". number_format($row['grade'],2) . "</td>";
                        echo "</tr>";
            }
                    echo "</table>";

                echo "</div>";

            echo "</div>";

            $sql = "SELECT beer.ID_beer, name, AVG(grade) AS average FROM comment INNER JOIN beer ON comment.ID_beer = beer.ID_beer GROUP BY ID_beer ORDER BY AVG(grade) DESC";
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            echo "<div id='table2' class='hidden' class='container'>";
                
                echo "<div class='box'>";
                
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>Beer</th>";
                            echo "<th>Average grade</th>";
                        echo "</tr>";

            foreach ($result as $row)
            {       
                        echo "<tr>";
                            echo "<td><a href='beer.php?id=" . $row['ID_beer'] . "'>" . $row['name'] . "</a></td>";
                            echo "<td>". number_format($row['average'],2) . "</td>";
                        echo "</tr>";
            }
            
                    echo "</table>";

                echo "</div>";

            echo "</div>";
            
        ?>
    </body>
</html>
