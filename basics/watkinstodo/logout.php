<?php
include "auditlogger.php";

session_start();
auditor($_SESSION["userid"], "logo");
session_destroy();

header("refresh:2; url=index.php");
echo "<link rel='stylesheet' href='styles.css'>";

echo "You have been logged out successfully";

?>