<?php
//To connect php to database

$host = "localhost";   
$user = "root";        
$pass = "";            
$dbname = "dev1";  

// Create connection
    // $conn = new mysqli($host, $user, $pass, $dbname);

try {
    $conn = new mysqli($host, $user, $pass, $dbname);
    // echo "Connected";
} catch (Exception $e) {
    // echo "Connection failed";
}
?>
