<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/register.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon">

    
</head>
<body>
<?php include 'header.php'?>


<div id="form">
    <form name="sign" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- Useful to prevent from attackers who can exploit the code by injecting javascript code -->

        <label for='name'>Name </label>
        <input   required id='name' name='name' type="text" maxlength=20/></br>
        <label for='firstname'>Firstname</label>
        <input   required id='firstname' name="firstname" type="text" maxlength=20/></br>
        <label for='username'>Username</label>
        <input   required id='username' name="username" type="text" maxlength=20/></br>
        <label for='mail'>Mail</label>
        <input   id='mail' required name="mail" type="email" placeholder="email@domain " maxlength=60/></br>
        <label for='password'>Password</label>
        <input   id='password' required name="password"  type="password" maxlength=40/></br>
        <label for='profile_picture'>Profile Picture</label>
        <input   id='profile_picture' name="profile_picture" type="file" /></br>

        <label for='rank'>Rank</label>
        <select id='rank' name="rank">
            <option value="novice">novice</option>
            <option value="amateur">amateur</option>
            <option value="intermediate">intermediate</option>
            <option value="expert">expert</option>
            <option value="professionnal">professionnal</option>
            <option value="alcoholic">alcoholic</option>
        </select> </br>

        <input name="validate" type="submit" value="Continue" />
    </form>
</div>

<?php 
    include 'database.php';
    $nameErr = $firstnameErr = $usernameErr = $mailErr =" ";  // Useful to display an error if there is already the same data in the table 'user'
    $name= $firstname = $username = $mail = $password = $profile_picture = $rank =" ";
    global $db;
    
    
    // Function which is able to  look for double data in the same field
    function __ishere($item,$nameOfField){
        
        $Booll = FALSE;
        $isSame=" ";
        $sql="SELECT $nameOfField FROM user";
        $result = $db->prepare($sql);
        $result->execute();
        $items = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $isSame){
            if($items == $isSame){
                return TRUE;
            }
        }
        return $Booll;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // clean the input of a user when he submits
        
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) { // preg_match look for a pattern in the string and return true in this case
            $nameErr = "Only letters and white space allowed";
        }


        $firstname = test_input($_POST["firstname"]);

        $username = test_input($_POST["username"]);

        $mail = test_input($_POST["mail"]);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { // filter var filters a variable with a specific filter. In this case it's for email
            $mailErr = "Invalid mail format";
        }

        $password = test_input($_POST["password"]);
    }

    
    function test_input($data) {
        $data = trim($data); // Remove whitespace and other predifined caracter from both sides of a string
        $data = stripslashes($data);// Remove backslashes
        $data = htmlspecialchars($data);// Convert predifined caracters
        return $data;
    }


    

?>
</body>
</html>