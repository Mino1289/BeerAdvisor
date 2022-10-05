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
    $email = $password =" ";
    $emailErr = $passwordErr=" ";
    
    

?>
<?php include 'header.php'; ?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="name">
        <div id=""><i class="fa fa-fw fa-envelope" id="logosearch"></i></div>
        <input required id='input' name="mail" type="text" maxlength=60 placeholder="Email" autocomplete="off"/><span class="error"><?php echo $mailErr;?></span>
    </div>      
    <div class="name">
        <div id=""><i class="fa fa-fw fa-lock" id="logosearch"></i></div>
        <input required id='input' name="password" type="password" maxlength=40 placeholder="Password" autocomplete="off"/><span class="error">
    </div>
   
</form>
</body>
</html>