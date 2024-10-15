<?php
session_start();

if ($_SESSION["ssnlogin"]) {
    header("location:profile.php");
} else {

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

echo "<li> Home </li>";

if (!$_SESSION["ssnlogin"]) {
    echo "<li> Login </li>";
    echo "<li> Register </li>";
}

if ($_SESSION["ssnlogin"]) {
    echo "<li> Profile </li>";
    echo "<li> Logout </li>";
}

echo "</ul>";

echo "</div>";

echo "<div id='content'>";

echo "<h4> Register here for the Watkin's ToDo Website</h4>";

echo "<br>";

echo "<form method='post' action='reg.php'>";

echo "<input type='text' name='username' placeholder='Username' required><br>";

echo "<input type='password' name='password' placeholder='Password' required><br>";

echo "<input type='text' name='fname' placeholder='First Name' required><br>";

echo "<input type='text' name='sname' placeholder='Surname' required><br>";

echo "<input type='text' name='email' placeholder='Email' required><br>";

echo "<input type='submit' name='submit' value='Register'>";

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
}
?>