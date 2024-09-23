<?php

include "db_connect.php";

$usnm = $_POST['uname'];
$pswd = $_POST['password'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
echo $usnm, $pswd, $fname, $sname, $email;

$sql = "INSERT INTO mem (username, password, fname, sname, email) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);;
mysqli_stmt_bind_param($stmt, "sssss", $usnm, $pswd, $fname, $sname, $email);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_error($stmt)) {
    echo "Error: " . mysqli_stmt_error($stmt);
} else {
    echo "New records created successfully";
}
?>