<?php
    Class Comment {
        public $ID_comment;
        public $ID_beer;
        public $ID_user;
        public $content;
        public $grade;
        public $date;

        function __construct($ID_comment, $ID_beer, $ID_user, $content, $grade, $date) {
            $this->ID_comment = $ID_comment;
            $this->ID_beer = $ID_beer;
            $this->ID_user = $ID_user;
            $this->content = $content;
            $this->grade = $grade;
            $this->date = $date;
        }      
            
        function display_comment() {
            global $db;
            $sql = "SELECT * FROM user WHERE ID_user = ".$this->ID_user;
            $result = $db->prepare($sql);
            $result->execute();
            $user = $result->fetch();

            echo "<div class='comment'>";
            echo "<a href='user.php?username=". $user['username'] ."'><h3>".$user['username']."</h3></a>";
            echo "<p>". $this->content ."</p>";
            echo "<p>". $this->grade ."/5</p>";
            echo "<p>".date('l jS F Y',$this->date)."</p>";
            echo "</div>";
        }
    }
?>