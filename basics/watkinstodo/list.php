<?php

include "db_connect.php";  //connect to the database

session_start();

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

elseif ($_SESSION["ssnlogin"]) {
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

echo "<h4>". $_SESSION["fname"]. "'s Lists </h4>";


echo "<hr>";
echo "<br>";

echo "<form action='listadd.php' method='POST'>";

echo "<label for='listname'>Create a List: </label>";
echo "<input type='text' name='listname' placeholder='List Name'>";
echo "<input type='submit' name='submit' value='Submit'>";

echo "<hr>";
echo "<br>";

$sql = "SELECT * FROM lists WHERE userid = ?"; //set up the sql statement

$stmt = $conn->prepare($sql); //prepares

$stmt->bindParam(1,$_SESSION['userid']);  //binds the parameters to execute

$stmt->execute(); //run the sql code

$result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results

if(!$result) {  // if there is a result returned
    echo "No lists to display";
}

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";


?>