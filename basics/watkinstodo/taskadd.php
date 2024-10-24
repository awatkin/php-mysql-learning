<?php
//connects to sessions if available, probs not needed.
session_start();

include "db_connect.php"; //brings in the database connect
include "auditlogger.php";

if($_SESSION["lid"]==-1) {

    auditor($_POST["userid"],"fta");
    header("refresh:3; url=listadmin.php");
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "Task failed to be created";

} else {
    // creates the list in the database
    $times = $_POST['date']." ".$_POST['time'];
    $epoct = strtotime($times);
    $logtime = date("U");
    $complete="n";
    $sql = "INSERT INTO tasks (listid, task, complete, date, duedate) VALUES (?, ?, ?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    $stmt->bindParam(1,$_SESSION["lid"]);  //bind parameters for security
    $stmt->bindParam(2, $_POST['task']);
    $stmt->bindParam(3,$complete);
    $stmt->bindParam(4,$logtime);
    $stmt->bindParam(5,$epoct);
    $stmt->execute();  //run the query to insert

    //creates an audit log trail

    auditor($_SESSION["userid"],"cta");
    header("refresh:2; url=listadmin.php");
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "task created";


}

?>