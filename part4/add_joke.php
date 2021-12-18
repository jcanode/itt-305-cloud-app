<?php
session_start();


include "db_connect.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$joke = htmlspecialchars(addslashes($_GET[newjoke]));

$jokeanswer = htmlspecialchars(addslashes($_GET[jokeanswer]));

$sql_rows = "select * from jokes_table;"; 


$row_result = $conn->query($sql_rows);

$index = $row_result->num_rows + 1;

$username = $_SESSION['username'];

$userid = $_SESSION['userid'];

$stmt = $conn->prepare("insert into jokes_table (ID, joke, punchline, userid)  values (?, ?, ?, ?)");
$stmt->bind_param("issi",$index, $joke, $jokeanswer, $userid);
$stmt->execute();
$stmt->close();


echo "</br> Inserting Joke from user $userid: $joke </br> Punchline: $jokeanswer </br>";


echo "</br> <a href = 'index.php'>Return to main</a>";


//echo $result->num_rows;
?>
