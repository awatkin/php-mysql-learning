<?php
session_start();

include "db_connect.php";  //connect to the database
include "auditlogger.php";


if (isset($_POST['Delete'])) {

    try {
        $sql = "DELETE FROM tasks WHERE taskid = ?"; //set up the sql statement

        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindParam(1,$_POST['tid']);  //binds the parameters to execute
        $stmt->execute(); //run the sql code
        $affectedRows = $stmt->rowCount();

        if ($affectedRows > 0) {
            header("refresh:2; url=listadmin.php");
            echo "<link rel='stylesheet' href='styles.css'>";
            auditor($_SESSION["userid"], "dta");
            echo "Task deleted successfully.";
        } else {
            echo "No rows were affected.";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

} elseif(isset($_POST['Complete'])) {

    try {
        $status ="y";
        $sql = "UPDATE tasks SET complete = ? WHERE taskid = ?"; //set up the sql statement

        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindParam(1,$status);  //binds the parameters to execute
        $stmt->bindParam(2,$_POST['tid']);
        $stmt->execute(); //run the sql code
        $affectedRows = $stmt->rowCount();

        if ($affectedRows > 0) {
            header("refresh:2; url=listadmin.php");
            echo "<link rel='stylesheet' href='styles.css'>";
            auditor($_SESSION["userid"], "ccta");
            echo "Task updated to completed.";
        } else {
            echo "No rows were affected.";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

} elseif(isset($_POST['Uncomplete'])){
    try {
        $status ="n";
        $sql = "UPDATE tasks SET complete = ? WHERE taskid = ?"; //set up the sql statement

        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindParam(1,$status);  //binds the parameters to execute
        $stmt->bindParam(2,$_POST['tid']);
        $stmt->execute(); //run the sql code
        $affectedRows = $stmt->rowCount();

        if ($affectedRows > 0) {
            header("refresh:2; url=listadmin.php");
            echo "<link rel='stylesheet' href='styles.css'>";
            auditor($_SESSION["userid"], "ucta");
            echo "Task updated to not complete.";
        } else {
            echo "No rows were affected.";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {

    header("refresh:2; url=listadmin.php");
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "nothing updated";

}
?>