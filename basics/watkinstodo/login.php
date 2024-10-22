<?php
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

echo "<a href='index.php'><li> Home </li></a>";

if (empty($_SESSION["ssnlogin"])) {
    echo "<a href='login.php'><li> Login </li></a>";
    echo "<a href='register.php'><li> Register </li></a>";
}

elseif ($_SESSION["ssnlogin"]) {
    echo "<a href='profile.php' <li> Profile </li></a>";
    echo "<a href='logout.php'<li> Logout </li></a>";
}

echo "</ul>";

echo "</div>";

echo "<div id='content'>";

echo "<h4> Register here for the Watkin's ToDo Website</h4>";

echo "<br>";

echo "<form method='post' action='validate.php'>";

echo "<input type='text' name='username' placeholder='Username' required><br>";

echo "<input type='password' name='password' placeholder='Password' required><br>";

echo "<input type='submit' name='submit' value='Register'>";

echo "<br><br>";

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";

?>