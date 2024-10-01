<?php
session_start(); //connects to the session data

include "db_connect.php";  // connects to the database

$usnm = $_POST['uname'];  // pulls data from posted form
$fname = $_POST['fname']; // pulls data from posted form
$sname = $_POST['sname']; // pulls data from posted form
$email = $_POST['email']; // pulls data from posted form
$userid = $_SESSION["userid"]; //pulls data from session variable
$susnm = $_SESSION["uname"]; //pulls the current username from session variables

try {  // attempts this code

    if ($susnm!=$usnm) {
        echo "usernames are different";
        $sql = "SELECT * FROM mem WHERE uname = ?";  // Selects usernames from database that match entered
        $stmt = $conn->prepare($sql);  //perpares the statement
        $stmt->bindParam(1,$usnm);  // secures this parameters, good coding method
        $stmt->execute();  //executes the code

        $result = $stmt->fetch(PDO::FETCH_ASSOC);  //fetches the result

        if($result){  //
            header("refresh:5; url=prof.php");
            echo "Usernames Exists, try another name";
            exit();
    }


    $sql = "UPDATE mem SET uname=?, fname=?, sname=?, email=? WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$usnm);
    $stmt->bindParam(2,$fname);
    $stmt->bindParam(3,$sname);
    $stmt->bindParam(4,$email);
    $stmt->bindParam(5,$userid);
    $stmt->execute();
    $_SESSION["uname"]=$usnm;
    header("refresh:5; url=prof.php");
    echo "Details updated successfully";
}




} catch(PDOException $e) {
    header("refresh:5; url=prof.php");
    echo $e->getMessage();

}

?>