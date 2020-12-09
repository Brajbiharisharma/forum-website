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
    <!-- start silder -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/silder 1.jpg" class="d-block w-100 " alt="..."
                    style="background-size: cover;height: 100vh;width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="images/silder 2.jpg" class="d-block w-100 " alt="..."
                    style="background-size: cover;height: 92vh;width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="images/silder 3.jpg" class="d-block w-100 " alt="..."
                    style="background-size: cover;height: 100vh;width: 100%;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- closed silder -->

    <div class="container">
        <h1 class="display-5 text-center my-5">iFORUM Brower Categories</h1>
        <div class="row">
            <?php 
            include '_dbconnection.php';
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $title = $row['title'];
                $descr = $row['description'];
                $id = $row['id'];
                echo '<div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="images/card 2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="thereadlist.php?id='. $id .'">'. $title .'</a></h5>
                            <p class="card-text">'. substr($descr, 0,80) .'...</p>
                            <a href="thereadlist.php?id='. $id .'" class="btn btn-primary">view threads</a>
                        </div>
                    </div>
                </div>';
           
        }
            
            ?>



        </div>

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