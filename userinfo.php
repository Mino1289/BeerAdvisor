<?php
    Class User {
        // ID_user	name	firstname	username	mail	profile_picture	password	rank
        public $ID_user;
        public $name;
        public $firstname;
        public $username;
        public $mail;
        public $profile_picture;
        public $password;
        public $rank;

        function __construct($ID_user, $name, $firstname, $username, $mail, $profile_picture, $password, $rank) {
            $this->ID_user = $ID_user;
            $this->name = $name;
            $this->firstname = $firstname;
            $this->username = $username;
            $this->mail = $mail;
            $this->profile_picture = $profile_picture;
            $this->password = $password;
            $this->rank = $rank;
        }

        function display_page() {

            include 'beerinfo.php';
            global $db;

            $sql = "SELECT * FROM beer_user WHERE ID_user = " .$this->ID_user;
            $query = $db->prepare($sql);
            $query->execute();

            $beeruser = $query->fetchAll(PDO::FETCH_ASSOC);

            echo "<div class='user'>";
            echo "<h1>".$this->username."</h1>";
            echo "<img src='".$this->profile_picture."' alt='profile_picture'>";
            echo "<p>".$this->name."</p>";
            echo "<p>".$this->firstname."</p>";
            echo "<p>".$this->mail."</p>";
            echo "<p>".$this->rank."</p>";

            if (isset($_SESSION["ID_user"]) && $_SESSION["ID_user"] != $this->ID_user) {
                $ID_user = $_SESSION["ID_user"];

                $sql = "SELECT * FROM follow WHERE ID_user = $ID_user AND ID_followed =". $this->ID_user;
                $result = $db->prepare($sql);
                $result->execute();
                $follow = $result->fetch();
                if (empty($follow)) {
                    $act = "Follow";
                } else {
                    $act = "Unfollow";
                }
                // add a btn to follow the user
                echo "<form method='post'>
                <button type='submit'>$act</button></form>";
            }
            
            echo "</div>";
            echo "<div class='beeruser'>";
            echo "<h1>Bières</h1>";
            foreach ($beeruser as $beer) {
                $sql = "SELECT * FROM beer INNER JOIN color ON beer.ID_color = color.ID_color 
                        INNER JOIN taste ON beer.ID_taste = taste.ID_taste 
                        INNER JOIN category ON beer.ID_category = category.ID_category 
                        WHERE ID_beer = " .$beer["ID_beer"];
                        
                $query = $db->prepare($sql);
                $query->execute();

                $beer = $query->fetch(PDO::FETCH_ASSOC);
                $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],$beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name']);
                $beer->display_box();
            }
            echo "</div>";

        }

    }
?>