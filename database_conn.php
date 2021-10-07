<?php
//Establish connection to database
$dbConn = new mysqli('localhost', 'username', 'password', 'database');

// Check for and handle connection failure
if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}
?>
