<!DOCTYPE html>
<html lang="en">
<head>
<title> This is my page </title>
    <link rel="stylesheet" href="styles.css">

    <?php

    $option = 1

    ?>
</head>

<body>


<?php


$stock = 0;

$message = $stock>0 ? 'in Stock': 'Sold out';
echo $message;

?>




</body>
</html>

