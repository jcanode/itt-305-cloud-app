<?php 
session_start();
session_destroy();

echo " <h2> You have been logged out </h2>";

echo "</br> <a href = 'index.php'>Return to main</a>";



?>