<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/register.scss">
        <link rel="icon" href="./img/logo.ico" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Register</title>
    </head>

    <body>

        <script>
            function validate(input)
            {
                document.getElementsByName(input)[0].classList.add("error");
            }
        </script>

        <?php 
            
            include 'database.php';
            include 'function.php';
            $nameErr = $firstnameErr = $usernameErr = $mailErr =" ";  // Useful to display an error if there is already the same data in the table 'user'
            $name= $firstname = $username = $mail = $password = $profile_picture = $rank =" ";
            $validation =" ";
            global $db;
        

            if ($_SERVER["REQUEST_METHOD"] == "POST") { 

                $password = test_input($_POST["password"]);
                $firstname = test_input($_POST["firstname"]);
                $username = test_input($_POST["username"]);        
                $name = test_input($_POST["name"]);
                $mail = test_input($_POST["mail"]);
                $profile_picture = $_POST["profile_picture"];
                $rank= $_POST["rank"];
                
            
                
                if (!preg_match("/^[a-zA-Z-'éàèê ]*$/",$name)) { // preg_match look for a specific pattern in the string 
                    $nameErr = "<script>validate('name_box');</script>
                    <p class='error_message'>Only letters and white space allowed</p>";
                }
                if (!preg_match("/^[a-zA-Z-'éàèê ]*$/",$firstname)) { // preg_match look for a specific pattern in the string 
                    $firstnameErr = "<script>validate('firstname_box');</script>
                    <p class='error_message'>Only letters and white space allowed</p>";
                }
                if(__ishere($username,'username',$db)){
                    $usernameErr ="<script>validate('username_box');</script>
                    <p class='error_message'>This username is already taken</p>";
                }
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { // filter_var filters a variable with a specific filter. In this case it's for email
                    $mailErr = "<script>validate('mail_box');</script>
                    <p class='error_message'>Invalid mail format</p>";
                }    
                if(__ishere($mail,'mail',$db)){
                    $mailErr = "<script>validate('mail_box');</script>
                    <p class='error_message'>This mail is already taken</p>";
                }
                if($nameErr == " " &&  $firstnameErr == " " && $usernameErr == " " && $mailErr == " "  ){
                    $password = md5($password);
                    __sendData($name,$firstname,$username,$mail,$password,$profile_picture,$rank,$db);
                    $validation="<p id='welcome'>Welcome $username !</p>";
                }
        
            }
        ?>

        <?php include "header.php"?>

        <h1 id="title"><a href="./register.php">Register form</a></h1>

        <form name="sign" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- Useful to prevent from attackers who can exploit the code by injecting javascript code -->
        
            <div class="spacing"></div>

            <div id="register_form">

                <div id="boiteD">
                    
                    <div class="name" name="name_box">
                        <div><i class="fa fa-fw fa-user" id="logosearch"></i></div>
                        <input required class='input' name="name" type="text" maxlength=20 placeholder="Name" autocomplete="off"/>
                    </div>

                    <?php echo $nameErr;?>

                    <div class="name" name="firstname_box">
                        <div><i class="fa fa-fw fa-user" id="logosearch"></i></div>
                        <input required class='input' name="firstname" type="text" maxlength=20 placeholder="Firstname" autocomplete="off"/>                        
                    </div>

                    <?php echo $firstnameErr;?>

                    <div class="name" name="username_box">
                        <div><i class="fa fa-fw fa-user" id="logosearch"></i></div>
                        <input required class='input' name="username" type="text" maxlength=20 placeholder="Username" autocomplete="off"/>
                    </div>

                    <?php echo $usernameErr;?>

                    <div class="name" name="mail_box">
                        <div><i class="fa fa-fw fa-envelope" id="logosearch"></i></div>
                        <input required class='input' name="mail" type="text" maxlength=60 placeholder="Email" autocomplete="off"/>
                    </div>

                    <?php echo $mailErr;?>
                
                </div>

                <div id="boiteG">

                    <div class="name">
                        <div><i class="fa fa-fw fa-lock" id="logosearch"></i></div>
                        <input required class='input' name="password" type="password" maxlength=40 placeholder="Password" autocomplete="off"/>
                    </div>

                    <div class="name">
                        <div><i class="fa fa-fw fa-camera" id="logosearch"></i></div>
                        <input class='input' id='profile_picture' name="profile_picture" type="file" placeholder="Avatar" autocomplete="off"/>
                    </div>

                    <div class="name">
                        
                        <div><i class="fa fa-fw fa-star" id="logosearch"></i></div>
                        <select id='rank' name="rank">
                            <option value="novice">novice</option>
                            <option value="amateur">amateur</option>
                            <option value="intermediate">intermediate</option>
                            <option value="expert">expert</option>
                            <option value="professionnal">professionnal</option>
                            <option value="alcoholic">alcoholic</option>
                        </select>

                    </div>

                    <input name="submit" type="submit" value="Sign up" id="submit"/>

                </div>

            </div>

            <?php echo $validation;?>

        </form>

    </body>
</html>