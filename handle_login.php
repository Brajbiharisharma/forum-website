<?php
    include '_dbconnection.php';
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $numrow = mysqli_num_rows($result);
        if($numrow == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['password']))
            {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                echo "logged in ". $email;


            }
            header("location: index.php");  
        }
        header("location: index.php"); 
    }

?>