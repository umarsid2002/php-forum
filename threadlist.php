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
  <?php

  $showAlert = false;

  $cat_id = $_GET['cat_id'];
  $sql = "SELECT * FROM `categories` WHERE sno = $cat_id";
  $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $cat_name = $row['cat_name'];
      $cat_desc = $row['cat_desc'];
    }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pTitle = $_POST['pTitle'];
    $pDesc = $_POST['pDesc'];
    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$pTitle', '$pDesc', '$cat_id', '0')";
    $result = mysqli_query($conn, $sql);
    $showAlert = true;
  }

  if ($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your question has been added and now you can receieve cool solutions from other people.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }

  ?>
  
  <div class="container my-3">

  <div class="jumbotron">
  <h1 class="display-4">Welcome to <?php echo $cat_name; ?> forums</h1>
  <p class="lead"><?php echo $cat_desc;?></p>
  <hr class="my-4">
  <p>Read our forums everyday and stay tuned to the solutions of the upcoming problems</p>
  <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
</div>

<h2>Be the first to raise a question</h2>

<?php
echo
'<form action="/forum/threadlist.php?cat_id='.$cat_id.'" method="post" class="my-3">
  <div class="form-group">
    <label for="pTitle">Problem Title</label>
    <input type="text" class="form-control" id="pTitle" name="pTitle" placeholder="Problem Title">
  </div>
  <div class="form-group">
    <label for="pDesc">Problem Description</label>
    <textarea class="form-control" id="pDesc" name="pDesc" rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>';
?>

<h2 class='py-2'>Browse Questions</h2>

<?php

$cat_id = $_GET['cat_id'];
$sql = "SELECT * FROM `threads` WHERE thread_cat_id = $cat_id";
$result = mysqli_query($conn, $sql);
$no_result = true;

  while($row = mysqli_fetch_assoc($result)){
    $id = $row['thread_id'];
    $thread_title = $row['thread_title'];
    $thread_desc = $row['thread_desc'];
    $no_result = false;

    echo '<div class="media py-3">
    <img src="http://localhost:8080/forum/user.png" width="54" class="mr-3" alt="...">
    <div class="media-body">
      <h5 class="mt-0"><a class="text-dark" href="/forum/thread.php?thread_id='.$id.'">'.$thread_title.'</a></h5>
      '.$thread_desc.'
    </div>
  </div>';
  }

  if($no_result){
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">No Threads found</h1>
      <p class="lead">Be the first person to ask a question </p>
    </div>
  </div>';
  }

?>



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