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
$result = match($option) {
    1 => "Barry",
    2, 3 => "Steven",
};

echo $result;

?>




</body>
</html>

