<?php

include "db_connect.php";  //connect to the database

try {  //try this code, catch errors

    session_start();  //connect to session data for logged in

    $usnm = $_POST['username']; //copy username from post data

    $sql = "SELECT * FROM user WHERE username = ?"; //set up the sql statement

    $stmt = $conn->prepare($sql); //prepares

    $stmt->bindParam(1,$_POST['username']);  //binds the parameters to execute

    $stmt->execute(); //run the sql code

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results

    if($result){  // if there is a result returned

        $_SESSION["username"] = $_POST['username'];

        $_SESSION["fname"] = $result["fname"];

        $_SESSION["userid"] = $result["userid"];

        $_SESSION["lid"] = -1; //-1 is used as we index from 0, so this is an easy way to check / reset the variable

        if (password_verify($_POST["password"], $result["password"])) { // verifies the password is matched

            $_SESSION["ssnlogin"] = true;  // sets up the session variables

            $act = "log";

            $logtime = date("U");

            $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent

            $stmt = $conn->prepare($sql); //prepare to sql

            $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security

            $stmt->bindParam(2, $logtime);

            $stmt->bindParam(3,$act);

            $stmt->execute();  //run the query to insert

            header("location:list.php");  //redirect on success

            exit();

        } else{

            $act = "flog";  //failed login abbreviated

            $logtime = date("U");  // captures epoch time

            $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent

            $stmt = $conn->prepare($sql); //prepare to sql

            $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security

            $stmt->bindParam(2, $logtime);

            $stmt->bindParam(3,$act);

            $stmt->execute();  //run the query to insert

            session_destroy(); //if failed, kills session and error message
            header("refresh:4; url=login.php");
            echo "<link rel='stylesheet' href='styles.css'>";
            echo "invalid password";
        }

    } else {
        header("refresh:4; url=login.php");
        echo "<link rel='stylesheet' href='styles.css'>";
        echo "User not found";

    }




} catch (Exception $e) {
    echo $e;
}