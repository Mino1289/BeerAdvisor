<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./img/logo.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/login.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Login</title>
    </head>

    <body>

        <script>
            function validate(input)
            {
                document.getElementsByName(input)[0].classList.add("error");
            }
        </script>

        <?php
            session_start();
            include 'database.php';
            include 'function.php';
            global $db;
            $mail = $password =$validation=$username= " ";
            $mailErr = $passwordErr=" ";
            $verifPassword=" ";

            if($_SERVER["REQUEST_METHOD"]=="POST"){ // Variables are already define because we use required balise 
                $password = test_input($_POST["password"]);
                $mail = test_input($_POST["mail"]);
            
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { // filter_var filters a variable with a specific filter. In this case it's for email
                    $mailErr = "<script>validate('mail1');</script>
                    <p class='error_message'>Incorrect format mail</p>";
                }

                if(!__isuserhere($mail,'mail',$db))
                {
                    $mailErr ="<script>validate('mail1');</script>
                    <p class='error_message'>Incorrect mail</p>";
                    
                }
                
                $password= md5($password);
                
                if($mailErr == " "){
                    $sql="SELECT password FROM user WHERE mail=?";
                    $qry = $db->prepare($sql);
                    $qry->execute([$mail]);
                    $verifPassword =$qry->fetch();

                    if($verifPassword[0] != $password){
                        $passwordErr="<script>validate('password1');</script>
                        <p class='error_message'>Wrong password</p>";
                    }else{
                        $sql="SELECT username, ID_user FROM user WHERE password=? AND mail= ?";
                        $qry = $db->prepare($sql);
                        $qry->execute([$password,$mail]);
                        $username = $qry->fetch();
                        $validation = "<p id='welcome_back'>Welcome back $username[0] !<p><style>#welcome_back{color:green;}</style>";
                        $_SESSION['ID_user'] = $username["ID_user"];
                        $_SESSION['profile_picture'] = __findPP($mail,$password,$db);
                        header("Location: ./user.php?id=".$username['ID_user']);
                    }
                }

            } 

        ?>

        <?php include 'header.php'; ?>

        <h1 id="title"><a href="./login.php">Member login</a></h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div id="member_login">

                <div class="name" name="mail1">
                    <div><i class="fa fa-fw fa-envelope" id="logosearch"></i></div>
                    <input required class='input' name="mail" type="text" maxlength=60 placeholder="Email" autocomplete="off"/>
                </div>

                <?php echo $mailErr;?>

                <div class="name" name="password1">
                    <div><i class="fa fa-fw fa-lock" id="logosearch"></i></div>
                    <input required class='input' name="password" type="password" maxlength=40 placeholder="Password" autocomplete="off"/>
                </div>
                
                <?php echo $passwordErr;?>

                <input name="submit" type="submit" value="Submit" id="submit"/>

                <?php echo $validation;?>

            </div>
        </form>
    </body>
</html>