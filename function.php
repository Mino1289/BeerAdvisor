<?php
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
?>