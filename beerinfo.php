<?php
    class Beer {
        public $ID_beer;
        public $name;
        public $location;
        public $color;
        public float $strength;
        public $taste;
        public $brewery;
        public $category;


        function __construct($ID_beer, $name, $location, $color, $strength, $taste, $brewery, $category) {
            $this->ID_beer = $ID_beer;
            $this->name = $name;
            $this->location = $location;
            $this->color = $color;
            $this->strength = $strength;
            $this->taste = $taste;
            $this->brewery = $brewery;
            $this->category = $category;
        }

        function get_ID_beer() {
            return $this->ID_beer;
        }

        function get_name() {
            return $this->name;
        }

        function display_box() {
            global $db;

            $sql = "SELECT AVG(grade) AS avgrade FROM comment WHERE ID_beer =". $this->ID_beer;
            $result = $db->prepare($sql);
            $result->execute();
            $grades = $result->fetch();
            $grade = $grades['avgrade'];

            echo "<div class='beerbox'>";
            echo "<a href='beer.php?id=".$this->ID_beer."'><h2>".$this->name."</h2></a>";
            echo "<p>Average grade : ".round($grade,1)."/5</p>";
            echo "</div>";
        }

        function display_page() {
            echo "<title> Beer Advisor | ".$this->name ."</title>";
            echo "<h1>".$this->name."</h1>";
            echo "<div class='beer'>";
            echo "<div id='black_box'>";
            echo "<img src='img/photo_test.jpg' id='picture_beer'>";
            echo "<ul id='green_box'>";
            echo "<li>Color : ".$this->color."</li>";
            echo "<li>Category : ".$this->category."</li>";
            echo "<li>Taste : ".$this->taste."</li>";
            echo "<li>Strength : ".$this->strength."%</li>";
            echo "</ul></div>";
            echo "<ul id='red_box'>";
            echo "<li>Brewery : ".$this->brewery."</li>";
            echo "<li>Location : ".$this->location."</li>";
           
            // les commentaires + btn ajouter commentaire
            include "comment.php";
            global $db;

            $sql = "SELECT * FROM comment WHERE ID_beer = $this->ID_beer";
            $result = $db->prepare($sql);
            $result->execute();
            $comments = $result->fetchAll(PDO::FETCH_ASSOC);

            $sql = "SELECT AVG(grade) AS avgrade FROM comment WHERE ID_beer =". $this->ID_beer;
            $result = $db->prepare($sql);
            $result->execute();
            $grades = $result->fetch();
            $grade = round($grades['avgrade'],1);

            echo "<li>Average Grade : ".$grade."/5</li>";
            echo "</ul>";
            echo "<div id='button_box'><a href='add_beer.php?id=".$this->ID_beer."'><button id='edit_beer'>Edit this beer</button></a>";

            $sql = "SELECT * FROM beer_user WHERE ID_beer = $this->ID_beer AND ID_user = ".$_SESSION['ID_user'];
            $result = $db->prepare($sql);
            $result->execute();
            $beer_user = $result->fetch();
            if (empty($beer_user)) {
                $act = "Like";
            } else {
                $act = "Dislike";
            }

            if (isset($_SESSION['ID_user'])) {
                echo "<a href='add_comment.php?id=".$this->ID_beer."'><button>Add a comment</button></a>";
                echo "<form method='post'>
                <button type='submit'>$act</button></div></form>";
            }
            echo "</div>";
            // echo "<link rel='stylesheet' href='./css/beer_display.scss'>";

            $n = count($comments);
            if ($n == 1) {
                echo "<div id='comments_box'><h2 class='titlecomment'>" . $n . " Comment</h2>";
                foreach ($comments as $comment) {
                    $comment = new Comment($comment["ID_comment"], $comment["ID_beer"], $comment["ID_user"], $comment["content"], $comment["grade"], $comment["date_publication"], $comment["date_drinking"]);
                    $comment->display_comment();
                    echo "<div class='border_separation'></div>";
                }
                echo "<div class='border_separation_undo'></div>";
                echo "</div>";
            }
            if ($n > 1) {
                echo "<div id='comments_box'><h2 class='titlecomment'>" . $n . " Comments</h2>";
                foreach ($comments as $comment) {
                    $comment = new Comment($comment["ID_comment"], $comment["ID_beer"], $comment["ID_user"], $comment["content"], $comment["grade"], $comment["date_publication"], $comment["date_drinking"]);
                    $comment->display_comment();
                    echo "<div class='border_separation'></div>";
                }
                echo "<div class='border_separation_undo'></div>";
                echo "</div>";
            }
        }
    }
?>