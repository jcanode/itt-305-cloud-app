<?php

include "db_connect.php";
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// $sql = "select id, joke, punchline, username from jokes_table join users on ON users.UserID = jokes_table.userid;";
$sql = "select ID, joke, punchline, username from jokes_table join users ON users.UserID = jokes_table.userid;";


$result = $conn->query($sql);




if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h3> Joke: " . $row['joke'] . "</h3>";

        echo "<div><p> Punchline: " . $row["punchline"]. "</p></div>";

        echo "<div><p> From user " . $row["username"]. "</p></div>";
    }
} else {
    echo "0 results";
}

echo "</br> <a href = 'index.php'>Return to main</a>";
?>
