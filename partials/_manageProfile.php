<?php
    include '_dbconnect.php';
    session_start();
    $userId = $_SESSION['userId'];
    

    if(isset($_POST["updateProfileDetail"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password =$_POST["password"];

        $passSql = "SELECT * FROM users WHERE id='$userId'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        if (password_verify($password, $passRow['password'])){ 
            $sql = "UPDATE `users` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `phone` = '$phone' WHERE `id` ='$userId'";   
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Updated successfully!!");
                        window.history.back(1);
                    </script>';
            }else{
                echo '<script>alert("Update Failed!! Please Try Again.");
                        window.history.back(1);
                    </script>';
            } 
        }
        else {
            echo '<script>alert("Password is incorrect!!");
                        window.history.back(1);
                    </script>';
        }
    }
    
?>