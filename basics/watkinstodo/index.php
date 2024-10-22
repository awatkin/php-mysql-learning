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
                echo "<a href='list.php'><li> Lists </li></a>";
                echo "<a href='logout.php'<li> Logout </li></a>";
            }

        echo "</ul>";

    echo "</div>";

    echo "<div id='content'>";

    echo "<p>Welcome to the Watkin's ToDo list website. Here you can sign up to create and manage all of your to do lists in one easy place</p>";

    echo "<p>You will need to register first to be able to make use of the system, but after that its all free to use.</p>";

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";

?>