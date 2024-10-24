<?php

include "db_connect.php";
function auditor($userid, $act) {

    try{

    $logtime = date("U");

    $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent

    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1,$userid);  //bind parameters for security

    $stmt->bindParam(2, $logtime);

    $stmt->bindParam(3,$act);

    $stmt->execute();  //run the query to insert

        return "logged";
    }
    catch (PDOException $e){
        return $e->getMessage();
    }
}

?>
