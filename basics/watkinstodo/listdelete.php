<?php
session_start();

include "db_connect.php";
include "auditlogger.php";
try {
    $sql = "DELETE FROM lists WHERE listid = ?"; //set up the sql statement

    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1,$_SESSION['lid']);  //binds the parameters to execute
    $stmt->execute(); //run the sql code
    $affectedRows = $stmt->rowCount();

    if ($affectedRows > 0) {
        header("refresh:4; url=list.php");
        auditor($_SESSION["userid"],"lde");
        echo "<link rel='stylesheet' href='styles.css'>";
        echo "List deleted successfully.";
    } else {
        echo "No rows were affected.";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>