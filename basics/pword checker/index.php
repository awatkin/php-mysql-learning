<!DOCTYPE html>

<html lang="en">
<head>
<title> Password checker</title>
<link rel="stylesheet" href="styles.css">
</head>

<body>
<div id="container">
<h2> Password Checker</h2>

    <form method="post" action="">
        <input type="text" name="pword" placeholder="Enter your password" required>
        <br>
        <button type="submit"> Check it </button>

    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $pword = $_POST["pword"];
            $flag = 0;

            if(strlen($pword) >= 8){
                $flag++;
            }
            else {//
                echo "Your password is too short. Must be at least 8 characters. <br>";
            }
            /*if (preg_match('/[^£$%&*()}{@#~?><,|=_+¬-]/', $pword)){
                $flag++;
            }
            else {
                echo "Your password does not contain special characters <br>";
            }*/
            if (preg_match('/[A-Z]/', $pword)){
            $flag++;
            }
            else {
                echo "Your password must contain at least 1 uppercase letter <br>";
            }
        }

    ?>
</div>
</body>


</html>