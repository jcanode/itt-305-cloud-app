
<?php

include "db_connect.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$username = $_GET[username];
$password = $_GET[password];
$password2 = $_GET[password2];

if ($password == $password2){



$sql_rows = "select * from users;";

$row_result = $conn->query($sql_rows);

$index = $row_result->num_rows + 1;
    
// check for duplicate users
$sql = "SELECT * FROM users WHERE username = '$username';"; 


$result = $conn->query($sql);

// disallow user registration if already in databse
if ($result->num_rows > 0){
    echo "<h2>user is already in databse</h2>";
} else { // else insert user into database

$sql = "insert into users (UserID, username, password) values ($index, '$username', '$password');";

$result = $conn->query($sql) or die (mysqli_error($conn));

echo "<h3> Created user, '$username'  </h3>";

}

} else{
    echo "<h3> Passwords '$password' and '$password2' do not match </h3>";

}

// $sql_rows = "select * from users;";

// $row_result = $conn->query($sql_rows);

// $index = $row_result->num_rows + 1;
    
// // check for duplicate users
// $sql = "SELECT * FROM users WHERE username = '$username';"; 


// $result = $conn->query($sql);

// // disallow user registration if already in databse
// if ($result->num_rows > 0){
//     echo "<h2>user is already in databse</h2>";
// } else { // else insert user into database

// $sql = "insert into users (UserID, username, password) values ($index, '$username', '$password');";

// $result = $conn->query($sql) or die (mysqli_error($conn));

// echo "<h3> Created user, '$username'  </h3>";

// }

echo "</br> <a href = 'index.php'>Return to main</a>";




?>