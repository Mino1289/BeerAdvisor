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
            include "database.php";
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
                // add a btn to follow the user
                echo "<button>Follow</button>";
            }
            
            echo "</div>";
            echo "<div class='beeruser'>";
            echo "<h1>Bières</h1>";
            foreach ($beeruser as $beer) {
                $sql = "SELECT * FROM beer WHERE ID_beer = " .$beer["ID_beer"];
                $query = $db->prepare($sql);
                $query->execute();

                $beer = $query->fetch(PDO::FETCH_ASSOC);
                $beer = new Beer($beer["ID_beer"], $beer["name"], $beer["location"], $beer["color"], $beer["strength"], $beer["taste"], $beer["brewery"], $beer["category"]);
                $beer->display_box();
            }
            echo "</div>";

        }

    }
?>