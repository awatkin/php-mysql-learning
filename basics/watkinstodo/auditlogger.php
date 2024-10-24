<?php

function auditor($userid, $act) {
    include "db_connect.php";

    try{

        $logtime = date("U");

        $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent

        $stmt = $conn->prepare($sql); //prepare to sql

        $stmt->bindParam(1,$userid);  //bind parameters for security

        $stmt->bindParam(2, $logtime);

        $stmt->bindParam(3,$act);

        $stmt->execute();  //run the query to insert

    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}

//log - log in
//logo - logged out
//flog - failed login

//cli - created a list
//fli - failed to make a list
//lde - list delete

//fta - failed to create task
//cta - created a task
//dta - delete a task
//ccta - complete a task
//ucta - uncomplete a task
?>
