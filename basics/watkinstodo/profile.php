<?php

session_start();
include "db_connect.php";
include "auditlogger.php";

echo"<!DOCTYPE html>";

echo "<html lang='en'>";

echo "<head>";

echo"<link rel='stylesheet' href='styles.css'>";

echo"<title> Watkin's ToDo List website</title>";

echo "</head>";

echo "<body>";

echo "<div id='container'>";

echo "<div id='title'>";

echo "<h3 id='banner'>Watkin's ToDo List</h3>";

echo "</div>";

echo "<div id='navbar'>";

echo "<ul id='menu'>";
echo " <li> :: </li>";
echo "<li><a href='index.php'> Home </a></li>";
echo " <li> :: </li>";
if (empty($_SESSION["ssnlogin"])) {
    echo "<li><a href='login.php'> Login </a></li>";
    echo "<li><a href='register.php'> Register </a></li>";
}

else {
    echo " <li><a href='profile.php'> Profile </a></li>";
    echo " <li> :: </li>";
    echo "<li><a href='list.php'> Lists </a></li>";
    echo " <li> :: </li>";
    echo "<li><a href='logout.php'> Logout </a></li>";
    echo " <li> :: </li>";
}

echo "</ul>";

echo "</div>";

echo "<div id='listcontent'>";

echo "<h4>". $_SESSION["fname"]. "'s Profile Information </h4>";

echo "<hr>";
echo "<br>";

$sql = "SELECT * FROM audit WHERE userid = ?"; //set up the sql statement
$stmt = $conn->prepare($sql); //prepares
$stmt->bindParam(1,$_SESSION['userid']);  //binds the parameters to execute
$stmt->execute(); //run the sql code
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //brings back results

$log = 0;
$cli = 0;
$cta = 0;
$ccta = 0;



foreach ($result as $row) {
    if($row['activity']=="log"){
        $log++;
    }elseif ($row['activity']=="cli"){
        $cli++;
    }elseif ($row['activity']=="cta"){
        $cta++;
    }elseif ($row['activity']=="ccta"){
        $ccta++;
    }
}

echo "<h4> Quick Stats: Total logins: ".$log." Total Lists made: ".$cli."Total tasks made: ".$cta." Total tasks completed: ".$ccta."</h4>";

echo "<hr>";
echo "<br>";

echo "Your last login was on: ";
echo "<hr>";
echo "<br>";

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";

?>