<?php

session_start();

include "db_connect.php";  //connect to the database

if(!$_POST['listname']=="") {
    // creates the list in the database
    $logtime = date("U");
    $sql = "INSERT INTO lists (userid, listname, date) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security
    $stmt->bindParam(2, $_POST['listname']);
    $stmt->bindParam(3,$logtime);
    $stmt->execute();  //run the query to insert

    //creates an audit log trail
    $act = "cli";  //create a new list
    $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security
    $stmt->bindParam(2, $logtime);
    $stmt->bindParam(3,$act);
    $stmt->execute();  //run the query to insert

    //gets list id to send on
    $sql = "SELECT listid from lists WHERE userid=? AND listname = ?";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security
    $stmt->bindParam(2, $_POST['listname']);
    $stmt->execute();  //run the query to insert
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results

    $urls = "listadmin.php?lid=".$result["listid"];

    header("refresh:3; url=$urls");
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "List created";
} else {
    $act = "fli";  //failed to create new list

    $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent

    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security

    $stmt->bindParam(2, $logtime);

    $stmt->bindParam(3,$act);

    $stmt->execute();  //run the query to insert

    header("refresh:3; url=list.php");
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "List name empty, so not created";
}



?>