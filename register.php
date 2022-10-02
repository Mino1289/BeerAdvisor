<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">

    
</head>
<body>
<div id="form">
<form name="sign" method="post" action="register.php">
   
    <input  name='name' type="text" maxlength=20/>
    <input  required name="firstname" type="text" maxlength=20/>
    <input  required name="username" type="text" maxlength=20/>
    <input  required  name="mail" type="email" placeholder="email@domain " maxlength=60/>
    <input  required  name="password"  type="password" maxlength=40/>
    <input  name="profile_picture" type="file" />
    
    <select name="rank">
        <option value="novice">novice</option>
        <option value="amateur">amateur</option>
        <option value="intermediate">intermediate</option>
        <option value="expert">expert</option>
        <option value="professionnal">professionnal</option>
        <option value="alcoholic">alcoholic</option>
    </select> -->

    <input name="validate" type="submit" />
</form>


</div>

</body>
</html>