<?php
  require_once('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Admin Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dash.css" rel="stylesheet">

</head>
<body>
    <?php
      session_start();
      if(!isset($_SESSION['username'])) {
         header('location:home.php'); 
      } else { 
         $username = $_SESSION['username']; 
      }
      
      $id=$_GET['id'];

      $sql="SELECT * FROM web WHERE id=$id";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {       
        while($row = $result->fetch_assoc()) {
    ?>
 
  <form action="prosesedit.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">
  <input type="hidden" name="oldgambar" value="<?= $row['gambar']?>" >

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <b>Edit Article Form</b>
          </div>
          <div class="card-body">
            <form action="addproses.php" method="POST" enctype="multipart/form-data">
              <div class="form-group" style="text-align: center">
                <label for="gambar">Picture </label>
                <br>
                <img src="pic/<?= $row['gambar']; ?>" width="200" height="150">
                <input type="file" name="gambar" placeholder="Image">
              </div>
            <div class="form-group">
                <label for="title">Title </label>
                <input type="text" name="title" class="form-control" placeholder="Judul" value="<?= $row['title'] ?>">
              </div>    
              <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" name="content" rows="4" cols="50" class="form-control" placeholder="Konten"><?= $row['content']?></textarea>
              </div>
              <button type="submit" value="Submit" name="tambah" class="btn btn-primary float-right">Edit Article</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <center><a href="admin.php" class="btn btn-primary" style="float:center">Back To Home</a></center>
      <?php
          }
        }
      ?>
    <script src="jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script> 
</body>
</html>
