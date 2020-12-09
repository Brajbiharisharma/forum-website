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
    <?php 
       
       include '_dbconnection.php';
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $Post_by = $row['thread_user_id'];
            $sql3 = "SELECT email FROM `users` WHERE sno = '$Post_by'";
            $result3 = mysqli_query($conn,$sql3);
            $row3 = mysqli_fetch_assoc($result3);
        }
        
        ?>

    <div class="container py-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <?php echo $desc; ?>
            <hr class="my-4">
            <p>1.It uses utility classes for typography and spacing to space content out within the larger container.</p><br>
            <p>2.No Spam / Advertising / Self-promote in the forums.<br>
               3. Do not post copyright-infringing material.<br>
               4. Do not post “offensive” posts, links or images.<br>
               5. Do not cross post questions.</p><br>
           <p><b>Post By:- <?php echo $row3['email']; ?></b></p>
        </div>
        </div>
    
  
    </div>
    
    <div class="container">
    <?php

        if(isset($_POST['submit'])){
            $comment = $_POST['comment'];
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '0', CURRENT_TIME());";
            $result = mysqli_query($conn,$sql);
        }
    ?>
    <h1>Post a Comment</h1>

    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            echo ' <form action=" '. $_SERVER['REQUEST_URI']. '" Method="POST">
            <div class="form-group">
                <label for="desc">Type your comment</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Post Comment</button>
                 </form>';
        }
        else
        {
            echo '<p class="display-5">you are not login this page please before login.</p>';
        }
    ?>

    </div>

    <div class="container mt-4">
    
    <h1>Discussion</h1>
        
   
    <?php 
    

        include '_dbconnection.php';
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $noresult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noresult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            
            $comment_by = $row['comment_by'];
            $sql2  = "SELECT email FROM `users` WHERE sno = '$comment_by'";
            $result2  = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo ' <div class="media my-3">
                    <img src="images/profile.png" width="80" class="mr-3" alt="...">
                    <div class="media-body">
                  '. $content .' .<div class="font-weight-bold">'.$row2['email'].'</div>
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