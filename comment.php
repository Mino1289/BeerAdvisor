<?php
    Class Comment {
        public $ID_comment;
        public $ID_beer;
        public $ID_user;
        public $content;
        public $grade;
        public $date;
        public $date_drinking;

        function __construct($ID_comment, $ID_beer, $ID_user, $content, $grade, $date, $date_drinking) {
            $this->ID_comment = $ID_comment;
            $this->ID_beer = $ID_beer;
            $this->ID_user = $ID_user;
            $this->content = $content;
            $this->grade = $grade;
            $this->date = strtotime($date);
            $this->date_drinking = date("l jS F Y",strtotime($date_drinking));
        }      
            
        function display_comment() {
            global $db;
            $sql = "SELECT * FROM user WHERE ID_user = ".$this->ID_user;
            $result = $db->prepare($sql);
            $result->execute();
            $user = $result->fetch();

            echo "<div class='comment'>";
            echo "<a href='user.php?id=". $user['ID_user'] ."'><h3>".$user['username']."</h3></a>";
            echo "<p>". $this->content ."</p>";
            echo "<p>". $this->grade ."/5</p>";
            echo "<p> Drinking Date: ". $this->date_drinking ."</p>";
            echo "<p> Posted: ".date('l jS F Y',$this->date)."</p>";
            echo "</div>";
        }
    }
?>