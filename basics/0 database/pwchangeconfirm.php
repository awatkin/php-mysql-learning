<?php

session_start();  //starts a sessions which is needed to stay logged in
if(!$_SESSION["ssnlogin"]){  //if no login has been completed

    header("refresh:5;url=login.html");  //redirects them to login
    echo"You are not currently logged in, redirecting to login page";  //error message to reflect that
}else{
    include "db_connect.php";  //connects to the database
    echo "<!DOCTYPE html>  <!-- Declares doctype, important -->";

    echo "<html lang='en'>";
    echo "<head>";
    echo "<title> Password Updater </title>";  //echoes title to the page
    $usnm = $_SESSION['uname'];  //copies session name
    $userid = $_SESSION['userid'];  //copies session userid
    $cpassword = $_POST['cpassword'];
    $npassword1 = $_POST['npassword1'];
    $npassword2 = $_POST['npassword2'];



}


echo "</head>";
echo "<body>";

$sql = "SELECT * FROM mem WHERE userid = ?";  //prepares sql to get details for logged in user

$stmt = $conn->prepare($sql); //prepares the sql

$stmt->bindParam(1,$userid);  //binds the parameters ready for execute

$stmt->execute();  // runs the query

$result = $stmt->fetch(PDO::FETCH_ASSOC);  //gets the result

if(!password_verify($cpassword, $result['password'])){
    session_destroy();
    $act = "apc";
    $logtime = time();

    $sql = "INSERT INTO activity (userid, activity, date) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $userid);  //bind parameters for security
    $stmt->bindParam(2, $act);
    $stmt->bindParam(3, $logtime);

    $stmt->execute();  //run the query to insert
    header("refresh:5;url=login.html");
    echo "Incorrect current password given!";
} elseif($npassword1 != $npassword2){
    $act = "apc";
    $logtime = time();

    $sql = "INSERT INTO activity (userid, activity, date) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $userid);  //bind parameters for security
    $stmt->bindParam(2, $act);
    $stmt->bindParam(3, $logtime);

    $stmt->execute();  //run the query to insert
    header("refresh:5;url=pwchange.html");
    echo "New passwords do not match!";
}else{
    $hpswd = password_hash($pswd, PASSWORD_DEFAULT);  //has the password
    $sql = "UPDATE mem SET password=? WHERE userid = ?";  //sets up the statement
    $stmt = $conn->prepare($sql);  //prepares it
    $stmt->bindParam(1,$hpswd);  //binding all the parameters
    $stmt->bindParam(2,$userid);
    $stmt->execute();  //execute the code

    $act = "spc";
    $logtime = time();

    $sql = "INSERT INTO activity (userid, activity, date) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $userid);  //bind parameters for security
    $stmt->bindParam(2, $act);
    $stmt->bindParam(3, $logtime);

    $stmt->execute();  //run the query to insert
    header("refresh:5; url=prof.php");  //redirect with confirmation message
    echo "Password updated successfully";

}


echo "</body>";
echo"</html>";

?>