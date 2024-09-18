<!DOCTYPE html>

<html lang="en">
<head>
    <title> Basic Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<h1> Basic Calculator</h1>

<form method="post" action="">
    <input type="text" name="num1" placeholder="Enter first num" required>
    <br>
    <input type="text" name="num2" placeholder="Enter second num" required>
    <br>
    <select name="operator">
        <option value="+">+</option>
        <option value="-">- </option>
        <option value="*"> * </option>
        <option value="/"> / </option>
    </select>
    <button type="submit"> Calculate</button>
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    switch ($operator) {
        case "+":
            $result = $num1 + $num2;
            break;
        case "-":
            $result = $num1 - $num2;
            break;
        case "*":
            $result = $num1 * $num2;
            break;
        case "/":
            $result = $num1 / $num2;
            break;
        default:
            echo("Invalid operator");
    }
    echo "Result: " . $result;
}
?>


</body>

</html>