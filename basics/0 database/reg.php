<?php

include "db_connect.php";

$usnm = $_POST['uname'];
$pswd = $_POST['password'];
$cpswd = $_POST['cpassword'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];


if($pswd!=$cpswd){
    header("refresh:5; url=index.html");
    echo"Your passwords do not match";
}elseif(strlen($pswd)<8){
    header("refresh:5; url=index.html");
    echo"Your passwords do not match";
} else {
    try {

        $hpswd = password_hash($pswd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO mem (uname, password, fname, sname, email) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1,$usnm);
        $stmt->bindParam(2,$hpswd);
        $stmt->bindParam(3,$fname);
        $stmt->bindParam(4,$sname);
        $stmt->bindParam(5,$email);

        $stmt->execute();
        echo "Successfully registered";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


}
?>