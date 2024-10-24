<?php

function qstat($lid)
{

    include "db_connect.php";

    $sql = "SELECT * FROM tasks WHERE listid = ?"; //set up the sql statement
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1, $lid);  //binds the parameters to execute
    $stmt->execute(); //run the sql code
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //brings back results

    if ($result) {
        $working = 0; // store uncompleted tasks
        $completed = 0; // store completed tasks

        //iterate the results to split on the page
        foreach ($result as $row) {
            if ($row['complete'] == "n") {
                $working++;
            } elseif ($row['complete'] == "y") {
                $completed++;
            }
        }
        return [count($result), $working, $completed];

    } else {
        return [0,0,0];
    }
}
?>