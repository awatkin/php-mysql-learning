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
    $hpswd = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
    $sql = "INSERT INTO mem (username, password, fname, sname, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);;
    mysqli_stmt_bind_param($stmt, "sssss", $usnm, $hpswd, $fname, $sname, $email);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_error($stmt)) {
        echo "Error: " . mysqli_stmt_error($stmt);
    } else {
        header("refresh:5; url=login.html");
        echo "New records created successfully";
    }
}
?>