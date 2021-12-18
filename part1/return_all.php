<?php

include "db_connect.php";
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$sql = "select * from jokes_table;";


$result = $conn->query($sql);




if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h3>" . $row['joke'] . "</h3>";

        echo "<div><p>" . $row["punchline"]. "</p></div>";
    }
} else {
    echo "0 results";
}

echo "</br> <a href = 'index.php'>Return to main</a>";
?>
