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
            include 'comment.php';
            global $db;

            $sql = "SELECT * FROM beer_user WHERE ID_user = ?";
            $query = $db->prepare($sql);
            $query->execute([$this->ID_user]);

            $beeruser = $query->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<h1 id='username'>What about ".$this->username." ?</h1>";
            echo "<div id='black_box'>";
            if(!empty($this->profile_picture)){
                echo '<img id="picture_beer" alt="profile_picture" src="data:image/png;base64,'. base64_encode($this->profile_picture) . '" />';
            }
            else
            {
                echo '<img id="picture_beer" alt="profile_picture" src="img/No_account.png" />';
            }
            echo "<ul id='information_user'>";
            echo "<li>Name : ".$this->name."</li>";
            echo "<li>Firstname : ".$this->firstname."</li>";
            echo "<li>Mail : ".$this->mail."</li>";
            echo "<li>Rank : ".$this->rank."</li>";
            echo "</ul>";
            echo "</div>";
            

            if (isset($_SESSION["ID_user"])) {
                $ID_user = $_SESSION["ID_user"];

                if ($_SESSION["ID_user"] != $this->ID_user) {
                    $sql = "SELECT * FROM follow WHERE ID_user = ? AND ID_followed = ?";
                    $result = $db->prepare($sql);
                    $result->execute([$ID_user, $this->ID_user]);
                    $follow = $result->fetch();
                    if (empty($follow)) {
                        $act = "Follow";
                    } else {
                        $act = "Unfollow";
                    }
                    // add a btn to follow the user
                    echo "<form method='post'>
                    <div id='follow_button'><button type='submit'>$act</button></div></form>";
                }
                if (!empty($follow) || $_SESSION["ID_user"] == $this->ID_user) {
                    echo "<div class='border_separation2'></div>";
                    echo "<div id='beeruser'>";
                    echo "<h1>Beers informations</h1>";
                    echo "<div id='beersort_page_box'><a href='beersort.php' id='beersort_page'>Check out the beer ordered by grade / average grade</a></div>";
                    foreach ($beeruser as $beer) {
                        $sql = "SELECT * FROM beer INNER JOIN color ON beer.ID_color = color.ID_color 
                        INNER JOIN taste ON beer.ID_taste = taste.ID_taste 
                        INNER JOIN category ON beer.ID_category = category.ID_category
                        INNER JOIN hops ON beer.ID_hops = hops.ID_hops
                        INNER JOIN grains ON beer.ID_grains = grains.ID_grains
                        WHERE ID_beer = ?";
                                
                        $query = $db->prepare($sql);
                        $query->execute([$beer["ID_beer"]]);
        
                        $beer = $query->fetch();

                        $beer = new Beer($beer['ID_beer'],$beer['name'],$beer['location'],$beer['color_name'],
                        $beer['strength'],$beer['taste_name'],$beer['brewery'], $beer['category_name'], $beer['IBU'],
                        $beer['hops_name'], $beer['grains_name'],$beer['calories'],$beer['clarity'],$beer['carbohydrates'], $beer['beer_picture']);
                        
                        $beer->display_box();
                        echo "<div class='border_separation'></div>";
                    }

                    echo "<div class='border_separation_undo'></div>";

                    echo "</div>";


                    $sql = "SELECT * FROM comment WHERE ID_user = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$this->ID_user]);
                    $comments = $query->fetchAll(PDO::FETCH_ASSOC);

                    if (count($comments) >= 1) {
                        echo "<div id='comments'>";
                        if (count($comments) == 1) {
                            echo "<div class='border_separation3'></div>";
                            echo "<h1>Comment</h1>";
                        } else {
                            echo "<div class='border_separation3'></div>";
                            echo "<h1>Comments</h1>";
                        }
                        
                        foreach ($comments as $comment) {
                            $comment = new Comment($comment['ID_comment'], $comment['ID_beer'], $comment['ID_user'], $comment['content'], $comment["grade"], $comment['date_publication'], $comment["date_drinking"], $comment["picture"]);

                            $comment->display_comment();
                            echo "<div class='border_separation'></div>";
                        }
                        echo "<div class='border_separation_undo'></div>";
                        echo "</div>";
                        echo "<div class='border_separation4'></div>";
                    }
                    else
                    {
                        echo "<div class='border_separation3'></div>";
                    }
                    
                    echo "<div id='followed'>";
                    echo "<h1>Followed</h1>";
                    $sql = "SELECT * FROM follow WHERE ID_user = ?";
                    $query = $db->prepare($sql);
                    $query->execute([$this->ID_user]);
                    $followed = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($followed as $user) {
                        // echo table
                        echo "<table>
                        <tr>
                            <th>Name</th>
                        </tr>";
                        $sql = "SELECT ID_user, username FROM user WHERE ID_user = ?";
                        $query = $db->prepare($sql);
                        $query->execute([$user["ID_followed"]]);
                        $result = $query->fetchAll();
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td><a href='user.php?id=".$row["ID_user"]."'>" . $row["username"] . "</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    

                }
            
                echo "</div>";
            
            }

            if(isset($_SESSION['ID_user']) && $this->ID_user == $_SESSION['ID_user'])
            {
                echo "<div id='disconnect_button_box'><a id='disconnect_button' href='./disconnect.php'>Disconnect</a></div>";
            }    
        }

    }
?>