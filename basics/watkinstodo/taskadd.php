<?php
//connects to sessions if available, probs not needed.
session_start();

include "db_connect.php"; //brings in the database connect

echo $_SESSION["lid"];


if($_SESSION["lid"]==-1) {
    $logtime = date("U");
    $act = "fta";  //failed to create new task

    $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent

    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security

    $stmt->bindParam(2, $logtime);

    $stmt->bindParam(3,$act);

    $stmt->execute();  //run the query to insert

    header("refresh:3; url=listadmin.php");
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "Task failed to be created";

} else {
    // creates the list in the database
    $times = $_POST['date']." ".$_POST['time'];
    $epoct = strtotime($times);
    $logtime = date("U");
    $complete=0;
    $sql = "INSERT INTO tasks (listid, task, complete, date, duedate) VALUES (?, ?, ?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    $stmt->bindParam(1,$_SESSION["lid"]);  //bind parameters for security
    $stmt->bindParam(2, $_POST['task']);
    $stmt->bindParam(3,$complete);
    $stmt->bindParam(4,$logtime);
    $stmt->bindParam(5,$epoct);
    $stmt->execute();  //run the query to insert

    //creates an audit log trail
    $act = "cta";  //create a new list
    $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security
    $stmt->bindParam(2, $logtime);
    $stmt->bindParam(3,$act);
    $stmt->execute();  //run the query to insert


    header("refresh:2; url=listadmin.php");
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "task created";


}

/*
echo $epoct;
echo "<br> time formatted";
echo date("Y-m-d H:i:s", $epoct);
echo "<br>";
echo $_POST['task'];
echo "<br>";
echo $_POST['time'];
echo "<br>";
echo $_POST['date'];
echo "<br>";
echo $_SESSION['lid'];
*/
?>