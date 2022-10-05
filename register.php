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
<?php include 'header.php'; ?>

<?php 
    
    include 'database.php';
    $nameErr = $firstnameErr = $usernameErr = $mailErr =" ";  // Useful to display an error if there is already the same data in the table 'user'
    $name= $firstname = $username = $mail = $password = $profile_picture = $rank =" ";
    $validation =" ";
    global $db;
    $Bool = FALSE;
    
    // Function which is able to  look for double data in the same field
    function __ishere($item,$nameOfField,$db){
        
        $Booll = FALSE;
        $isSame=" ";
        $sql="SELECT $nameOfField FROM user";
        $result = $db->prepare($sql);
        $result->execute();
        $items = $result->fetchAll(PDO::FETCH_COLUMN);

        foreach ($items as $isSame){
            if($item == $isSame){
                $Booll = TRUE;
            }
        }
        return $Booll;
    }

    function test_input($data) {
        $data = trim($data); // Remove whitespace and other predifined caracter from both sides of a string
        $data = stripslashes($data);// Remove backslashes
        $data = htmlspecialchars($data);// Convert predifined caracters
        return $data;
    }
    
    // final function to send safe data 
    function __sendData($name,$firstname,$username,$mail,$password,$profile_picture,$rank,$db){
        
        $sql="INSERT INTO user(name,firstname,username,mail,password,profile_picture,rank) VALUES (?,?,?,?,?,?,?)";
        $result = $db->prepare($sql);
        $result->execute(array($name,$firstname,$username,$mail,$password,$profile_picture,$rank));

    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 

        $password = test_input($_POST["password"]);
        $firstname = test_input($_POST["firstname"]);
        $username = test_input($_POST["username"]);        
        $name = test_input($_POST["name"]);
        $mail = test_input($_POST["mail"]);
        $profile_picture = $_POST["profile_picture"];
        $rank= $_POST["rank"];
        
        
        
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) { // preg_match look for a specific pattern in the string 
            $nameErr = "Only letters and white space allowed";
        }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { // filter_var filters a variable with a specific filter. In this case it's for email
            $mailErr = "Invalid mail format";
        }
        

        if(__ishere($name,'name',$db)){
            $nameErr ="This name is already taken";
        }
        if(__ishere($firstname,'firstname',$db)){
            $firstnameErr ="This firstname is already taken";
        }
        if(__ishere($username,'username',$db)){
            $usernameErr ="This username is already taken";
        }
        if(__ishere($mail,'mail',$db)){
            $mailErr ="This mail is already taken";
        }

        if($nameErr == " " &&  $firstnameErr == " " && $usernameErr == " " && $mailErr == " "  ){
            __sendData($name,$firstname,$username,$mail,$password,$profile_picture,$rank,$db);
            $validation=" Welcome $username !";
        }
       
    }
?>

<div id="form">
    <form name="sign" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- Useful to prevent from attackers who can exploit the code by injecting javascript code -->

        <label for='name'>Name </label>
        <input   required id='name' name='name' type="text" maxlength=20 /><span class="error"><?php echo $nameErr;?></span>
        </br>
        <label for='firstname'>Firstname</label>
        <input   required id='firstname' name="firstname" type="text" maxlength=20/><span class="error"><?php echo $firstnameErr;?></span>
        </br>
        <label for='username'>Username</label>
        <input   required id='username' name="username" type="text" maxlength=20/><span class="error"><?php echo $usernameErr;?></span>
        </br>
        <label for='mail'>Mail</label>
        <input   id='mail' required name="mail" type="email" placeholder="email@domain " maxlength=60/><span class="error"><?php echo $mailErr;?></span>
        </br>
        <label for='password'>Password</label>
        <input   id='password' required name="password"  type="password" maxlength=40/>
        </br>
        <label for='profile_picture'>Profile Picture</label>
        <input   id='profile_picture' name="profile_picture" type="file" />
        </br>

        <label for='rank'>Rank</label>
        <select id='rank' name="rank">
            <option value="novice">novice</option>
            <option value="amateur">amateur</option>
            <option value="intermediate">intermediate</option>
            <option value="expert">expert</option>
            <option value="professionnal">professionnal</option>
            <option value="alcoholic">alcoholic</option>
        </select> </br>

        <input name="submit" type="submit" value="Submit" /><?php echo $validation;?>
    </form>
</div>


</body>
</html>