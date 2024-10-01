<?php
session_start();

include "db_connect.php";

$usnm = $_POST['uname'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
$userid = $_SESSION["userid"];


try {
    $sql = "UPDATE mem SET uname='$usnm', fname='$fname', sname='$sname', email='$email' WHERE userid = '$userid'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $_SESSION["uname"]=$usnm;
        header("refresh:5; url=prof.php");
    echo "Details updated successfully";
} catch(PDOException $e) {
    header("refresh:5; url=prof.php");
    echo $e->getMessage();

}

?>