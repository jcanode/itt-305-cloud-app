<?php
session_start();


include "db_connect.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$joke = $_GET[newjoke];

$jokeanswer = $_GET[jokeanswer];

$sql_rows = "select * from jokes_table;"; 

$row_result = $conn->query($sql_rows);

$index = $row_result->num_rows + 1;

$username = $_SESSION['username'];

$userid = $_SESSION['userid'];

//echo "joke: ". $joke;

//echo "<br> punchline: " . $jokeanswer;

//$sql = "insert into jokes_table values (0, '" . $joke ."', '"  . $jokeanswer . "');";  
$sql = "insert into jokes_table (ID, joke, punchline, userid)  values ($index, '$joke', '$jokeanswer', '$userid');";
// echo $sql;
echo "</br> Inserting Joke from user $userid: $joke </br> Punchline: $jokeanswer </br>";

$result = $conn->query($sql) or die (mysqli_error($conn));

echo "</br> <a href = 'index.php'>Return to main</a>";


//echo $result->num_rows;
?>
