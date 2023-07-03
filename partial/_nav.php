<?php

session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">Navbar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      // Fetching Categories from databse
      $sql = "SELECT sno, cat_name FROM `categories`";
      $result = mysqli_query($conn, $sql);
      // $cat = mysqli_fetch_assoc($result);
      while ($row = mysqli_fetch_assoc($result)){
        echo'<a class="dropdown-item" href="/iforum/threadlist.php/?cat_id='.$row['sno'].'">'.$row['cat_name'].'</a>';
      }

      echo'</div>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Contact</a>
      </li>
      </ul>';
      
      echo '<form action="search.php" method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>';

      if(isset($_SESSION['loggedin'])){
        echo '<p class="text-light mb-0 px-3">Welcome ' .$_SESSION['useremail']. '</p>
        <form action="partial/_logout.php" method="post">
        <button class="btn btn-outline-success">Logout</button>
        </form>';
      }
      else{
        echo '<div class="mx-2">
        <button class="btn btn-outline-success" data-toggle="modal" data-target="#loginModal">Login</button>
      <button class="btn btn-outline-success" data-toggle="modal" data-target="#signupModal">Signup</button>
    </div>';
      }
      

echo'</div>
</nav>';
      
include '_loginModal.php';
include '_signupModal.php';

if(isset($_GET['signupsuccess'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You have signed up to this website and now you can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>