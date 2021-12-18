<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
</head>

<?php
include "db_connect.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$keyword = $_GET[keyword];



//echo "joke: ". $joke;

//echo "<br> punchline: " . $jokeanswer;

//$sql = "insert into jokes_table values (0, '" . $joke ."', '"  . $jokeanswer . "');";  
$sql = "select ID, joke, punchline, username from jokes_table join users ON users.UserID = jokes_table.userid where joke like  '%$keyword%';";
// echo $sql;
$result = $conn->query($sql) or die (mysqli_error($conn));


if ($result->num_rows > 0) {
            // output data of each row
        
            echo "<div id='accordion'>";
            while($row = $result->fetch_assoc()) {
                echo "<h3><p>"  . $row["joke"] . "</p></h3>";
                

                echo "<div><p>" . $row["punchline"]. "</p>";
                echo "<p> From user " . $row["username"]. "</p></div>";
            }
        
            echo "   </div>";
        } else {
            echo "0 results";
}

echo "</br> <a href = 'index.php'>Return to main</a>";


//echo $result->num_rows;
?>
