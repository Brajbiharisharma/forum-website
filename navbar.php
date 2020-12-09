<?php 
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky">
  <a class="navbar-brand mx-3" href="index.php">iFOURM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="container">
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="contact.php" tabindex="-1" >Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="sing row mx-2 ">

   <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
      {
      echo '<form class="form-inline my-lg-0 mx-2">
            <p class="mx-2 my-0 text-white"> Welcome '. $_SESSION['email'] .'</p>
            <a href="logout.php" >Logout</a>
            </form>';
      }
      else{

      echo '<button class="btn btn-outline-success my-2 my-sm-0 mx-1 " type="submit" data-toggle="modal" data-target="#login">Login</button>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#singhup">Singup</button>
        ';
      }
      
  

    
?>
 </div>
 </div>
  </div>
</nav>
