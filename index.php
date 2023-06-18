<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Iforum - For blog Lovers</title>
  </head>
  <body>
  <?php include 'partial/_nav.php'; ?>
  <?php include 'partial/_db_connect.php'; ?>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1600x500/?computer,blockchain" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?computer,programming" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?computer,business" class="d-block w-100" alt="...">
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
  
  <div class="container my-3">
    <h2 class='text-center'>Iforum - Categories</h2>
    <div class="row">

    <?php

    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $cat_title = $row['cat_name'];
      $cat_desc = $row['cat_desc'];
      echo '<div class="col-md-4">
      <div class="card" style="width: 18rem;">
<img src="https://source.unsplash.com/500x400/?technology,'.$cat_title.'" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title">'.$cat_title.'</h5>
  <p class="card-text">'.substr($cat_desc, 0, 50).'</p>
  <a href="#" class="btn btn-primary">View Threads</a>
</div>
</div>
      </div>';
    }
    ?>
    </div>
  </div>
  <!-- https://source.unsplash.com/ -->


  <?php include 'partial/_footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>