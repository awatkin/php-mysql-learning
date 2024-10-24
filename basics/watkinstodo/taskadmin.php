<?php
session_start();

include "db_connect.php";  //connect to the database

if (isset($_POST['delete'])) {
    $_SESSION['lid'] = $_POST['lid'];

    header("Location: listdelete.php");
    die();
} elseif(isset($_POST['complete'])) {



}
?>