<?php
    Class Comment {
        public $ID_comment;
        public $ID_beer;
        public $ID_user;
        public $content;
        public $grade;
        public $date;
        public $date_drinking;
        public $picture;

        function __construct($ID_comment, $ID_beer, $ID_user, $content, $grade, $date, $date_drinking, $picture) {
            $this->ID_comment = $ID_comment;
            $this->ID_beer = $ID_beer;
            $this->ID_user = $ID_user;
            $this->content = $content;
            $this->grade = $grade;
            $this->date = strtotime($date);
            $this->date_drinking = date("jS F Y",strtotime($date_drinking));
            $this->picture = $picture;
        }      
            
        function display_comment() {
            global $db;
            $sql = "SELECT * FROM user WHERE ID_user = ".$this->ID_user;
            $result = $db->prepare($sql);
            $result->execute();
            $user = $result->fetch();

            echo "<div class='comment'>";
            if (!empty($user["profile_picture"])) {
                echo '<img width="20em" heigth="20em" src="data:image/png;base64,'. base64_encode($user["profile_picture"]) . '" />';
            }
            echo "<h3><span>From</span><a href='user.php?id=". $user['ID_user'] ."' class='user_name'> ".$user['username']."</a>
                <span>| Drinking Date : ". $this->date_drinking ."</span></h3>";

            if (!empty($this->content)) {
                echo "<p class='comment_text'>Comment : ". $this->content ."</p>";
                // echo "<div class='border_separation'></div>";
            }
            
            echo "<p class='grade'>Grade : ". $this->grade ."/5</p>";
            echo "<p class='post_date'> Posted on : ".date('jS F Y',$this->date)."</p>";
            echo "</div>";
        }
    }
?>