<?php
include "db_connect.php"; //brings in the database connect
session_start(); //connects to sessions if available, probs not needed.

        $signupdate = date("U");

        if($_POST['password']!=$_POST['cpassword']){  //checks if the sent passwords don't match
            header("refresh:5; url=index.php"); //gives error message and reroutes
            echo "<link rel='stylesheet' href='styles.css'>";
            echo"Your passwords do not match";
        }elseif(strlen($_POST['password'])<8){  //if password under 8 chars
            header("refresh:5; url=index.php");  //redirect with error message
            echo "<link rel='stylesheet' href='styles.css'>";
            echo"Your passwords not long enough";
        } else {
            try {  //otherwise if everything passes, do this stuff
                $sql = "SELECT username FROM user WHERE username = ?";  //prepare statement
                $stmt = $conn->prepare($sql);  // send to sql, but don't run
                $stmt->bindParam(1,$_POST['username']);  //binds parameter which is secure
                $stmt->execute(); // runs the query

                $result = $stmt->fetch(PDO::FETCH_ASSOC); // gets results

                if($result){  // if there is a result, which is bad in this case, because username exists
                    header("refresh:5; url=index.php"); //error and redirect
                    echo "<link rel='stylesheet' href='styles.css'>"; // adds styling to the page
                    echo "User Exists, try another name";  //outputs suitable error message

                } else { //otherwise
                    try {  //try this code

                        $hpswd = password_hash($_POST['password'], PASSWORD_DEFAULT);  //has the password
                        $sql = "INSERT INTO user (username, password, fname, sname, email, signup) VALUES (?, ?, ?, ?, ?, ?)";  //prepare the sql to be sent
                        $stmt = $conn->prepare($sql); //prepare to sql

                        $stmt->bindParam(1,$_POST['username']);  //bind parameters for security
                        $stmt->bindParam(2,$hpswd);
                        $stmt->bindParam(3,$_POST['fname']);
                        $stmt->bindParam(4,$_POST['sname']);
                        $stmt->bindParam(5,$_POST['email']);
                        $stmt->bindParam(6,$signupdate);

                        $stmt->execute();  //run the query to insert
                        header("refresh:5; url=login.php"); //confirm and redirect
                        echo "<link rel='stylesheet' href='styles.css'>";
                        echo "Successfully registered";
                    } catch (PDOException $e) { //catch error
                        echo "Error: " . $e->getMessage();
                    }

                }
            } catch (PDOException $e) {  //catch bigger error
                echo "Error: " . $e->getMessage();
            }


        }

?>