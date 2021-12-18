
<?php
// start user session
session_start();



// show errors but not warning -- warnings about futuer php versions removed
error_reporting(E_ERROR);
ini_set('display_errors',1);

include "db_connect.php";

$username = $_POST[username];
$password = $_POST[password];

echo "User attempted to login in with username: '$username' and password: '$password' </br>";



// implement prepared statemetns 

$stmt = $conn->prepare(" SELECT UserID, username, password from users where username = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname,$pw);

if ($stmt->num_rows == 1){
    echo "one user with username";
    $stmt->fetch();

    if(password_verify($password,$pw)){
        echo "</br>password matched</br>";
        echo "login successful! </br>";
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $userid;
        echo "</br> <a href = 'index.php'>Return to main</a>";

        exit;
    
    } else {
        // echo "";
        $_SESSION=[];
        session_destroy();
    }
     
}
 else {
    echo "0 results. In correct login information";
    $_SESSION=[];
    session_destroy();
}

echo "login failed";
// else {
// check database
// $sql = "select UserID, username, password from users where username = '$username' AND password = '$password';";

// $result = $conn->query($sql);

// echo "SQL RESULT: " . $sql;
// echo "<p> SQL RESULT "; 
// print_r($result);

// echo "</p>";

?>


