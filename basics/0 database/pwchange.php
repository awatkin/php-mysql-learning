<!DOCTYPE html> <!--declares doc type, important-->

<html lang="en"> <!-- declares start of html and the language-->
<head> <!--opens the start of the head section-->

    <?php

    session_start();  //starts a sessions which is needed to stay logged in
    if(!$_SESSION["ssnlogin"]){  //if no login has been completed

    header("refresh:5;url=login.html");  //redirects them to login
    echo"You are not currently logged in, redirecting to login page";  //error message to reflect that
    }
    ?>

    <title> Password Changer</title>  <!-- sets page title -->
    <link rel="stylesheet" href="../styles.css"> <!-- links to style sheet -->
</head> <!-- closes the head section -->


<body> <!-- Declares the start of the body -->

<div id="container"> <!-- Declares a container for content -->
    <form action="pwchangeconfirm.php" method="post"> <!-- Declares a form to login -->
        <input type="text" name="cpassword" placeholder="Enter current Password" required> <!-- declares login box -->
        <br>
        <input type="password" name="npassword1" placeholder="Enter new password" required> <!-- declares password box -->
        <br>
        <input type="password" name="npassword2" placeholder="Re-enter new password" required> <!-- declares password box -->
        <br>
        <input type="submit" value="Login"> <!-- Button to send login -->
        <br>
    </form>  <!-- Close the form -->

    <br>
</div> <!-- Close the div -->
</body> <!-- closes the body -->
</html> <!-- closes the html -->