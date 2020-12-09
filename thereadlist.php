<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <title>FORUM</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <?php include 'login.php' ?>
    <?php include 'singhup.php' ?>

    <div class="container py-4 col-md-8">
        <div class="jumbotron">
            <?php 
        include '_dbconnection.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM `categories` WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $desc = $row['description'];
        }
        
        ?>
            <h1 class="display-4">Welcome to <?php echo $title; ?> forum</h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p>No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <div class="container col-md-8">
    <h1>Start a Discussion</h1>
    <?php

        if(isset($_POST['submit'])){
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', CURRENT_TIMESTAMP())";
            $result = mysqli_query($conn,$sql);
        }

    ?>
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            echo '<form action="'. $_SERVER['REQUEST_URI'].'" Method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="desc">Descrition</label>
                <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
       </form>';
        }
        else
        {
            echo '<p class="display-5">you are not login this page please before login.</p>';
        }
    ?>
    

    </div>

    <div class="container col-md-8 my-3">
        <h1>Browers Question</h1>

        <?php 
        include '_dbconnection.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $noresult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noresult = false;
            $thread_id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2  = "SELECT email FROM `users` WHERE sno = '$thread_user_id'";
            $result2  = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            

            echo ' <div class="media my-3">
                <img src="images/profile.png" width="80" class="mr-3" alt="...">
                <div class="media-body">
                <p class="font-weight-bold my-0"> <i>'. $row2['email'] .'</i>  '. $thread_time .'</p>
                <h5 class="mt-0"><a href="threads.php?threadid='.$thread_id.'">'.$title.'</a></h5>
                 <p>'.$desc.'</p>
                    </div>
                </div>';

        }
        if($noresult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No Result Found</h1>
              <p class="lead">Be the first person to ask question</p>
            </div>
          </div>';
        }

    ?>

        
    </div>

    <?php  include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js">
    </script>

</body>

</html>