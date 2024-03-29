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
  $no_result = true;
  $thread_id = $_GET['thread_id'];
  $sql = "SELECT * FROM `threads` WHERE thread_id = $thread_id";
  $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $no_result = false;
      $thread_name = $row['thread_title'];
      $thread_desc = $row['thread_desc'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Insert comment into db
      $comment = $_POST['comment'];
      $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`) VALUES ('$comment', '$thread_id', '0');
      ";
      $result = mysqli_query($conn, $sql);
      $showAlert = true;
    }
  
    if ($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your comment has been added.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }

  ?>
  
  <div class="container my-3">

  <div class="jumbotron">
  <h1 class="display-4">Welcome to <?php echo $thread_name; ?> forums</h1>
  <p class="lead"><?php echo $thread_desc;?></p>
  <hr class="my-4">
  <p>Read our forums everyday and stay tuned to the solutions of the upcoming problems</p>
  <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
  <p class='py-2 font-weight-bold'>Posted by: Umar</p>
</div>

<h2>Post a comment</h2>

<?php
echo
'<form action="/forum/thread.php?thread_id='.$thread_id.'" method="post" class="my-3">
  <div class="form-group">
    <label for="comment">Type Your Comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Post Comment</button>
</form>';
?>

<h3 class='py-2'>Browse Comments</h3>

<?php

// $cat_id = $_GET['cat_id'];
$sql = "SELECT * FROM `comments` WHERE thread_id = $thread_id";
$result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $comment_content = $row['comment_content'];

    echo '<div class="media py-3">
    <img src="http://localhost:8080/forum/user.png" width="54" class="mr-3" alt="...">
    <div class="media-body">
      
      '.$comment_content.'
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