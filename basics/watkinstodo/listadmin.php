<?php
session_start();

include "db_connect.php";  //connect to the database

if (isset($_POST['edit']) OR strpos($_SERVER['HTTP_REFERER'], 'listadd.php') !== false) {

    echo $_SESSION["lid"];
    echo $_POST["lid"];
    if (isset($_POST['edit'])) {
            $_SESSION["lid"] = $_POST['lid'];
            echo $_SESSION["lid"];
    }

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


    echo "<hr>";
    echo "<br>";
    echo "<form action='taskadd.php' method='POST'>";
    echo "<label for='listname'>Add a task: </label>";
    echo "<input type='text' name='task' placeholder='Task text'>";
    echo "<input type='date' name='date' value='2024-10-23'>";
    echo "<input type='time' name='time' value='12:00'>";
    echo "<input type='submit' name='submit' value='Submit'>";
    echo "</form>";
    echo "<hr>";
    echo "<br>";

    $sql = "SELECT * FROM tasks WHERE listid = ?"; //set up the sql statement
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1,$_SESSION['lid']);  //binds the parameters to execute
    $stmt->execute(); //run the sql code
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //brings back results

    if($result){
        foreach ($result as $row) {
            echo $row['task'] . " - Due Date: " . date("Y-m-d H:i:s", $row['duedate']) . "<br>";
        }
    } else {
        echo "There are no tasks to display here right now!";
    }

    echo "</div>";

    echo "</div>";

    echo "</body>";

    echo "</html>";
} elseif (isset($_POST['delete'])) {
    $_SESSION['lid'] = $_POST['lid'];

}

?>
