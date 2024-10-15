<?php
include "db_connect.php"; //brings in the database connect
session_start();

echo"<!DOCTYPE html>";

echo "<html lang='en'>";

    echo "<head>";

        echo"<link rel='stylesheet' href='styles.css'>";

        echo"<title> Watkin's ToDo List website</title>";

    echo "</head>";

    echo "<body>";

        echo "<div id='container'>";

        echo "<div id='title'>";

            echo "<h3 id='banner'>Watkin's ToDo List</h3>";

        echo "</div>";

        echo "<div id='navbar'>";

            echo "<ul id='menu'>";

            echo "<li> Home </li>";

            if (empty($_SESSION["ssnlogin"])) {
                echo "<li><a href='login.php'> Login </a></li>";
                echo "<li><a href='register.php'> Register </a></li>";
            }

            elseif ($_SESSION["ssnlogin"]) {
                echo "<li><a href='profile.php'> Profile </a></li>";
                echo "<li><a href='logout.php'> Logout </a></li>";
            }


echo "</ul>";

        echo "</div>";

        echo "<div id='content'>";


        $signupdate = date("U");


        if($pswd!=$cpswd){  //checks if the sent passwords dont match
            header("refresh:5; url=index.html"); //gives error message and reroutes
            echo"Your passwords do not match";
        }elseif(strlen($pswd)<8){  //if password under 8 chars
            header("refresh:5; url=index.html");  //redirect with error message
            echo"Your passwords not long enough";
        } else {
            try {  //otherwise if everything passes, do this stuff
                $sql = "SELECT uname FROM mem WHERE uname = ?";  //prepare statement
                $stmt = $conn->prepare($sql);  // send to sql, but don't run
                $stmt->bindParam(1,$usnm);  //binds parameter which is secure
                $stmt->execute(); // runs the query

                $result = $stmt->fetch(PDO::FETCH_ASSOC); // gets results

                if($result){  // if there is a result, which is bad in this case, because username exists
                    header("refresh:5; url=index.html"); //error and redirect
                    echo "User Exists, try another name";

                } else { //otherwise
                    try {  //try this code

                        $hpswd = password_hash($pswd, PASSWORD_DEFAULT);  //has the password
                        $sql = "INSERT INTO mem (uname, password, fname, sname, email, signup) VALUES (?, ?, ?, ?, ?, ?)";  //prepare the sql to be sent
                        $stmt = $conn->prepare($sql); //prepare to sql

                        $stmt->bindParam(1,$usnm);  //bind parameters for security
                        $stmt->bindParam(2,$hpswd);
                        $stmt->bindParam(3,$fname);
                        $stmt->bindParam(4,$sname);
                        $stmt->bindParam(5,$email);
                        $stmt->bindParam(6,$signupdate);

                        $stmt->execute();  //run the query to insert
                        header("refresh:5; url=login.html"); //confirm and redirect
                        echo "Successfully registered";
                    } catch (PDOException $e) { //catch error
                        echo "Error: " . $e->getMessage();
                    }

                }
            } catch (PDOException $e) {  //catch bigger error
                echo "Error: " . $e->getMessage();
            }


        }
        echo "</div>";

        echo "</div>";

        echo "</body>";

        echo "</html>";

?>