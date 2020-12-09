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

    <div class="container search my-5">
    <h1 >Search Result for " <i> <?php  echo  $_GET['search']; ?> </i>"</h1>
    <?php 
        $noresult = true;
         include '_dbconnection.php';
        $search = $_GET['search'];
        $sql = "SELECT * FROM `threads` WHERE match (thread_title, thread_desc) against('$search')";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $theard_title = $row['thread_title'];
            $theard_desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $noresult = false;
            $url = "threads.php?threadid=".$thread_id;
            
            echo '<div class="reault">
            <h4> <a href="'.$url.'" class="text-dark">'.$theard_title.'</a></h4>
            <p>'.$theard_desc.'</p>    
            </div>';
        }
        if($noresult){
            echo "<h5>Search Result for Not Found</h5>";
        }
    ?>
    
    </div>


    <?php  include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js">
    </script>

</body>

</html>