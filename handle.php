<?php
    include '_dbconnection.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        $existsql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($conn,$existsql);
        $row = mysqli_num_rows($result);
        if($row > 0){
            echo "you are alreay singup";
        }
        else
        { 
            if($pass == $cpass){
                $hash = password_hash($pass , PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$hash')";
                $result = mysqli_query($conn,$sql);  
                if($result){

                    header("location: index.php?sucesssinghup=true");  
                }            
            }
            else{
                echo "password do not match";
            }
             
        }
    }

?>