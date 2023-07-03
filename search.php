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
    <?php include 'partial/_db_connect.php'; ?>
  <?php include 'partial/_nav.php'; ?>

  <div class="container py-3">
    <h2>Search Results For: "<?php echo $_GET['search']; ?>"</h2>
    <div class="searchResults py-3">
        <?php
        $noResults = true;
        $searched = $_GET['search'];
        $searchSql = "SELECT * FROM `threads` WHERE `thread_title` LIKE '%".$searched."%'";
        $result = mysqli_query($conn, $searchSql);
        while($row = mysqli_fetch_assoc($result)){
            $noResults = false;
            echo '<h5><a href="/iforum/thread.php?thread_id='.$row['thread_id'].'">'.$row['thread_title'].'</a></h5>
            <p>'.$row['thread_desc'].'</p>';
        }

        if($noResults){
            echo '<b>Sorry, There are no threads found against your query.</b>';
        }
        ?>
    </div>
  </div>


  <?php include 'partial/_footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>