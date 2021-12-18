<?php
include "db_connect.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$joke = $_GET[newjoke];

$jokeanswer = $_GET[jokeanswer];

//echo "joke: ". $joke;

//echo "<br> punchline: " . $jokeanswer;

//$sql = "insert into jokes_table values (0, '" . $joke ."', '"  . $jokeanswer . "');";  
$sql = "insert into jokes_table (ID, joke, punchline)  values (null, '$joke', '$jokeanswer');";
echo $sql;
$result = $conn->query($sql) or die (mysqli_error($conn));

echo "</br> <a href = 'index.php'>Return to main</a>";


//echo $result->num_rows;
?>
