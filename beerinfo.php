<?php
    class Beer {
        public $ID_beer;
        public $name;
        public $location;
        public $color;
        public float $strength;
        public $taste;
        public $brewery;


        function __construct($ID_beer, $name, $location, $color, $strength, $taste, $brewery) {
            $this->ID_beer = $ID_beer;
            $this->name = $name;
            $this->location = $location;
            $this->color = $color;
            $this->strength = $strength;
            $this->taste = $taste;
            $this->brewery = $brewery;
        }

        function get_ID_beer() {
            return $this->ID_beer;
        }

        function get_name() {
            return $this->name;
        }

        function display_box() {
            echo "<div class='beerbox'>";
            echo "<a href='beer.php?id=".$this->ID_beer."'><h2>".$this->name."</h2></a>";
            echo "<div class=beerinfo>";
            echo "<p>Color : ".$this->color."</p>";
            echo "<p>Taste : ".$this->taste."</p>";
            echo "<p>Strength : ".$this->strength."%</p>";
            echo "<p>Brewery : ".$this->brewery."</p>";
            echo "<p>Location : ".$this->location."</p>";
            echo "</div></div>";
        }

        function display_page() {

            echo "<title> Beer Advisor | ".$this->name ."</title>";
            echo "<div class='beer'>";
            echo "<h1>".$this->name."</h1>";
            echo "<div class='info'>";
            echo "<p>Color : ".$this->color."</p>";
            echo "<p>Taste : ".$this->taste."</p>";
            echo "<p>Strength : ".$this->strength."%</p>";
            echo "<p>Brewery : ".$this->brewery."</p>";
            echo "<p>Location : ".$this->location."</p>";
            echo "</div></div>";
            echo "<h2 class='titlecomment'>Comments :</h2>";
            // les commentaires
            include "comment.php";
            global $db;

            $sql = "SELECT * FROM comment WHERE ID_beer = $this->ID_beer";
            $result = $db->prepare($sql);
            $result->execute();
            $comments = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach ($comments as $comment) {
                $comment = new Comment($comment["ID_comment"], $comment["ID_beer"], $comment["ID_user"], $comment["comment"], $comment["grade"], $comment["date"]);
                $comment->display_comment();
            }
            
        }
    }
?>