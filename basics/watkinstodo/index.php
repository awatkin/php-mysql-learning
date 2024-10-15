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

    echo "<p>Welcome to the Watkin's ToDo list website. Here you can sign up to create and manage all of your to do lists in one easy place</p>";

    echo "<p>You will need to register first to be able to make use of the system, but after that its all free to use.</p>";

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";

?>