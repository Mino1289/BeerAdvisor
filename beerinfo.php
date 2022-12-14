<?php
    class Beer {
        public $ID_beer;
        public $name;
        public $location;
        public $color;
        public float $strength;
        public float $IBU;
        public $taste;
        public $brewery;
        public $category;
        public $hops;
        public $grains;
        public $calories;
        public $clarity;
        public $carbohydrates;
        public $picture_beer;

        function __construct($ID_beer, $name, $location, $color, $strength, $taste, 
            $brewery, $category, $IBU, $hops, $grains, $calories, $clarity, $carbohydrates, $picture_beer) {

            $this->ID_beer = $ID_beer;
            $this->name = $name;
            $this->location = $location;
            $this->color = $color;
            $this->strength = $strength;
            $this->taste = $taste;
            $this->brewery = $brewery;
            $this->category = $category;
            $this->hops = $hops;
            $this->grains = $grains;
            $this->calories = $calories;
            $this->clarity = $clarity;
            $this->carbohydrates = $carbohydrates;
            $this->IBU = $IBU;
            $this->picture_beer = $picture_beer;
        }

        function display_box() {
            global $db;

            $sql = "SELECT AVG(grade) AS avgrade FROM comment WHERE ID_beer = ?";
            $result = $db->prepare($sql);
            $result->execute([$this->ID_beer]);
            $grades = $result->fetch();
            $grade = $grades['avgrade'];
            if ($grade == 0 || $grade == NULL) {
                $grade = "-";
            }
            else {
                $grade = round($grade, 1)."/5";
            }

            echo "<div class='beerbox'>";
            echo "<a href='beer.php?id=".$this->ID_beer."'><h2>".$this->name."</h2></a>";
            echo "<p>Average grade : ".$grade."</p>";
            echo "</div>";
        }

        function display_page() {
            echo "<title> Beer Advisor | ".$this->name ."</title>";
            echo "<h1>".$this->name."</h1>";
            echo "<div class='beer'>";
            echo "<div id='black_box'>";

            if(!empty($this->picture_beer)){
                echo '<img id="picture_beer" alt="profile_picture" src="data:image/png;base64,'. base64_encode($this->picture_beer) . '" />';
            }
            else
            {
                echo '<img id="picture_beer" alt="profile_picture" src="img/no connect.png" />';
            }

            echo "<ul id='green_box'>";
            echo "<li>Color : ".$this->color."</li>";
            echo "<li>Category : ".$this->category."</li>";
            echo "<li>Taste : ".$this->taste."</li>";
            echo "<li>Strength : ".$this->strength."%</li>";
            echo "<li>Brewery : ".$this->brewery."</li>";
            echo "</ul></div>";

            echo "<div id='info_supp'>";

            echo "<ul id='red_box'>";
            echo "<li>Calories : ".$this->calories."</li>";
            echo "<li>Location : ".$this->location."</li>";
            echo "<li>IBU : ".$this->IBU."</li>";
           
            // les commentaires + btn ajouter commentaire
            include "comment.php";
            global $db;

            $sql = "SELECT * FROM comment WHERE ID_beer = ?";
            $result = $db->prepare($sql);
            $result->execute([$this->ID_beer]);
            $comments = $result->fetchAll(PDO::FETCH_ASSOC);

            $sql = "SELECT AVG(grade) AS avgrade FROM comment WHERE ID_beer = ?";
            $result = $db->prepare($sql);
            $result->execute([$this->ID_beer]);
            $grades = $result->fetch();
            $grade = round($grades['avgrade'],1);
            if ($grade == 0) {
                $grade = "-";
            } else {
                $grade = $grade."/5";
            }
            echo "<li>Average Grade : ".$grade."</li>";
            echo "</ul>";

            echo "<ul id='pink_box'>";
            echo "<li>Hops : ".$this->hops."</li>";
            echo "<li>Grains : ".$this->grains."</li>";
            echo "<li>Carbohydrates : ".$this->carbohydrates."</li>";
            echo "<li>Clarity : ".$this->clarity."</li>";
            echo "</ul>";

            echo "</div>";

            echo "<div id='button_box'><a href='add_beer.php?id=".$this->ID_beer."'><button id='edit_beer'>Edit this beer</button></a>";

 
            if (isset($_SESSION['ID_user'])) {
                $sql = "SELECT * FROM beer_user WHERE ID_beer = ? AND ID_user = ?"; 
                $result = $db->prepare($sql);
                $result->execute([$this->ID_beer, $_SESSION['ID_user']]);
                $beer_user = $result->fetch();
                if (empty($beer_user)) {
                    $act = "Like";
                } else {
                    $act = "Dislike";
                }
    
                echo "<a href='add_comment.php?id=".$this->ID_beer."'><button>Add a comment</button></a>";
                echo "<form method='post' action='beer.php?id=".$this->ID_beer."'>
                <button type='submit'>$act</button></div></form>";
            }
            echo "</div>";
            // echo "<link rel='stylesheet' href='./css/beer_display.scss'>";

            $n = count($comments);
            if ($n > 0) {
                echo "<div id='comments_box'><h2 class='titlecomment'>" . $n . " Comment". ($n > 1 ? "s" : "") ."</h2>";
            }
            foreach ($comments as $comment) {
                $comment = new Comment($comment["ID_comment"], $comment["ID_beer"], $comment["ID_user"], $comment["content"], $comment["grade"], $comment["date_publication"], $comment["date_drinking"], $comment["picture"]);
                $comment->display_comment();
                echo "<div class='border_separation'></div>";
            }
            if ($n > 0) {
                echo "<div class='border_separation_undo'></div>";
            }
            
            echo "</div>";
        }
    }
?>