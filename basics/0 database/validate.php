<?php

include "db_connect.php";

try {
    $usnm = $_POST['uname'];
    $pswd = $_POST['password'];
    $sql = "SELECT username, password FROM mem WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);;
    mysqli_stmt_bind_param($stmt, "s", $usnm);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    echo $result;

} catch (Exception $e) {
    echo $e;
}