<?php
include "db_connect.php"; //brings in the database connect
session_start(); //connects to sessions if available, probs not needed.

$signupdate = date("U");

$times = $_POST['date']." ".$_POST['time'];

$epoct = strtotime($times);

echo $epoct;
echo "<br>";
echo date("Y-m-d H:i:s", $epoct);
echo "<br>";
echo $_POST['task'];
echo "<br>";
echo $_POST['datetime'];
//echo $_POST['time'];
echo "<br>";
//echo $_POST['date'];
echo "<br>";
echo $_SESSION['lid'];

?>