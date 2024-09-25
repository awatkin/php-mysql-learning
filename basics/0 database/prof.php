<!DOCTYPE html>

<html lang="en">
<head>
<?php
session_start();
if(!$_SESSION["ssnlogin"]){

    header("refresh:5;url=login.html");
    echo"You are not currently logged in, redirecting to login page";
}else{
    $usnm = $_SESSION['uname'];
    echo "<title>". $usnm. "'s profile page</title>";
}

?>
</head>
<body>
<?php


echo "Welcome ".$usnm. " To your profile page";

?>
<br><br>
Here is your data
<?php
include "db_connect.php";
$sql = "SELECT * FROM mem WHERE uname = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1,$usnm);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

foreach($result as $key=>$value){
    echo $key.": ".$value."<br>";
}

?>

</body>
</html>