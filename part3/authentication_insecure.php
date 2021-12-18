
<?php
// start user session
session_start();



// show errors but not warning -- warnings about futuer php versions removed
error_reporting(E_ERROR);
ini_set('display_errors',1);

include "db_connect.php";

$username = $_GET[username];
$password = $_GET[password];

echo "User attempted to login in with username: '$username' and password: '$password' </br>";

// check database
$sql = "select UserID, username, password from users where username = '$username' AND password = '$password';";

$result = $conn->query($sql);

echo "SQL RESULT: " . $sql;
echo "<p> SQL RESULT "; 
print_r($result);

echo "</p>";

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $userid = $row['UserID'];
    echo "login successful </br>";
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $userid;


} else {
    echo "0 results. In correct login information";
    $_SESSION=[];
    session_destroy();

}

echo "sesssion = </br>";
echo "<p> "; 
print_r($_SESSION);

echo "</p>";



echo "</br> <a href = 'index.php'>Return to main</a>";
?>


