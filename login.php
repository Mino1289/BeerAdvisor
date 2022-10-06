<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>login</title>
</head>
<body>
<?php
    include 'database.php';
    include 'function.php';
    global $db;
    $mail = $password =$validation=$username= " ";
    $mailErr = $passwordErr=" ";
    $verifPassword=" ";

    if($_SERVER["REQUEST_METHOD"]=="POST"){ // Variable are already define because we use required balise 
        $password = test_input($_POST["password"]);
        $mail = test_input($_POST["mail"]);
        echo $mail;
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { // filter_var filters a variable with a specific filter. In this case it's for email
            $mailErr = "Invalid mail format";
        }

        if(!__ishere($mail,'mail',$db)){
            $mailErr ="This mail does not exist";
        }
        
        $password= md5($password);
        
        if($mailErr == " "){
            $sql="SELECT password FROM user WHERE mail=?";
            $qry = $db->prepare($sql);
            $qry->execute([$mail]);
            $verifPassword =$qry->fetch();

            if($verifPassword[0] != $password){
                $passwordErr="incorrect password, retry please";
            }else{
                $sql="SELECT username FROM user WHERE password=?";
                $qry = $db->prepare($sql);
                $qry->execute([$password]);
                $username =$qry->fetch();
                $validation = " Welcome Back $username[0] !";
            }
        }

    }
    

?>
<?php include 'header.php'; ?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="name">
        <div id=""><i class="fa fa-fw fa-envelope" id="logosearch"></i></div>
        <input required id='input' name="mail" type="text" maxlength=60 placeholder="Email" autocomplete="off"/><span class="error"><?php echo $mailErr;?></span>
    </div>      
    <div class="name">
        <div id=""><i class="fa fa-fw fa-lock" id="logosearch"></i></div>
        <input required id='input' name="password" type="password" maxlength=40 placeholder="Password" autocomplete="off"/><span class="error"><?php echo $passwordErr;?></span>
    </div>
    
    <input name="submit" type="submit" value="Submit" /><?php echo $validation;?>

   
</form>
</body>
</html>