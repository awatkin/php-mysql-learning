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
    $userid = $_SESSION['userid'];
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


$sql = "SELECT * FROM mem WHERE userid = ?";

$stmt = $conn->prepare($sql);

$stmt->bindParam(1,$userid);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "<form method='post' action='updater.php'>";

foreach($result as $key=>$value){

    if($key=="userid"){
        echo $key.": ". $value."<br>";
    } elseif ($key!="password"){
        echo "<label for='".$key."'>".$key."</label>";
        echo "<input type='text' name='".$key."' value='".$value."'><br>";

    }

}
echo "<input type='submit'' value='Update'>";
?>

</body>
</html>