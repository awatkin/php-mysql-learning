<?php

$times = date("U");  // gives the int of number of seconds

echo $times;  // echos out the time as an int to check

echo date("Y-m-d H:i:s", $times); // formats the date, tester to check pulling dates from database

?>