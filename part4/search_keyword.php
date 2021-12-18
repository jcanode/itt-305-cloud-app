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
$keyword = addslashes($_GET[keyword]);

$keyword = "%" . $keyword . "%";

$stmt = $conn->prepare(" SELECT ID, joke, punchline, username from jokes_table join users on users.UserID = jokes_table.userid where joke like ?");
$stmt->bind_param("s",$keyword);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($ID, $joke,$punchline, $uname);



//$sql = "insert into jokes_table values (0, '" . $joke ."', '"  . $jokeanswer . "');";  
// $sql = "select ID, joke, punchline, username from jokes_table join users ON users.UserID = jokes_table.userid where joke like  '%$keyword%';";


// echo $sql;
// $result = $conn->query($sql) or die (mysqli_error($conn));


if ($stmt->num_rows > 0) {
            // output data of each row
        
            echo "<div id='accordion'>";
            while($row = $stmt->fetch()) {
                echo "<h3><p>"  . htmlspecialchars($joke) . "</p></h3>";
                

                echo "<div><p>" . htmlspecialchars($punchline) . "</p>";
                echo "<p> From user " . $uname . "</p></div>";
            }
        
            echo "   </div>";
        } else {
            echo "0 results";
}

echo "</br> <a href = 'index.php'>Return to main</a>";


//echo $result->num_rows;
?>
