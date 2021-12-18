
<?php

include "db_connect.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$username = $_POST[username];
$password = $_POST[password];
$password2 = $_POST[password2];


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if ($password == $password2){



$sql_rows = "select * from users;";

$row_result = $conn->query($sql_rows);

$index = $row_result->num_rows + 1;


// add password requirements

//require number
preg_match('/[0-9]+/',$password,$matches);
if(sizeof($matches ) == 0){
    echo "password must have at least one nunber</br>";
    exit;
}

//require special character
preg_match('/[!@#$%^&*()]+/',$password,$matches);
if(sizeof($matches ) == 0){
    echo "password must have at least one special character such as !@#$%^&*()</br>";
    exit;
}

//require at least 8 characters
if (strlen($password)<8 ){
    echo " The password must be at least 8 characters long";
    exit;
}

// check for duplicate users
$sql = "SELECT * FROM users WHERE username = '$username';"; 


$result = $conn->query($sql);

// disallow user registration if already in databse
if ($result->num_rows > 0){
    echo "<h2>user is already in databse</h2>";
} else { // else insert user into database

$sql = "insert into users (UserID, username, password) values ($index, '$username', '$hashed_password');";

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