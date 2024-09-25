<?php
$servername = "localhost";
//inschool user
$username = "membs";
// little laptop
//$username = "membss";
$password = "password1234";
//inschool at home
$dbname = "membs";
//little laptop
//$dbname = "membss";

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

/*
 *
 * removeed due to being for legacy code not for modern projects
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/
?>