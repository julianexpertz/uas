<?php
  require_once('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Article</title>
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
    ?>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card">
				  <div class="card-header">
				    <b>Add Article Form</b>
				  </div>
				  <div class="card-body">
				  	<form action="addproses.php" method="POST" enctype="multipart/form-data">
				  		<div class="form-group">
	    					<label for="gambar">Picture </label>
	    					<input type="file" name="gambar" placeholder="Image">
	  					</div>
						<div class="form-group">
	    					<label for="title">Title </label>
	    					<input type="text" name="title" class="form-control" id="Judul" placeholder="Judul" required>
	  					</div>		
	  					<div class="form-group">
	    					<label for="content">Content</label>
	    					<textarea type="text" name="content" rows="4" cols="50" class="form-control" placeholder="Konten" required></textarea>
	  					</div>
	  					<button type="submit" value="Submit" name="tambah" class="btn btn-primary float-right">Add new article</button>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<center><a href="admin.php" class="btn btn-primary" style="float:center">Back To Home</a></center>
	<script src="jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>	
</body>
</html>
