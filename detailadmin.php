<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Admin Page</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dash.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <a href="admin.php" class="navbar-brand">BLOGKU</a>
        <a class="navbar-brand navbar-right" onclick="return confirm('Are you sure want to logout?')" href="logout.php">Log-out</a>
      </div>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <div class="nav nav-sidebar">
            <div>
              <center><a href="admin.php" class="btn btn-primary" style="float:center">Back To Home</a></center>
            </div>
            <hr>
            <form id="form-container" class="form-container">
              <div class="wikipedia-container">
                <label id="wikipedia-header" for="input">Search Wiki: </label>
                <input type="text" id="input" value="">
                <button id="submit-btn">Submit</button>
                <ul id="wikipedia-links">Relevant Wikipedia articles here!</ul>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Admin Article<a href="add.php" class="btn btn-primary" style="float:right">Add Data</a></h1>
          
          <?php
            require_once('conn.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM web WHERE id=$id";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo "<img src=\"pic/".$row['gambar']."\" width=\"200\" height=\"180\">"."<br>";
                echo "<br>"."<b>"."Title: ". $row["title"]."</b>" . "<br>" ."Content: "."<br>"."<p align=\"justify\">". $row["content"]."</p>"."<br>"."<div>Created time:</div>".$row['time'];  
                echo "<br>";
                echo "<a href='edit.php?id=".$row['id']."'>Edit</a>";
                echo " | <a onclick=\"return confirm('Are you sure deleting this post?');\"href='delete.php?id=". $row['id']."'>Delete</a><br>";
                echo "<hr>";
              }
            }
            else {
              echo "No result";
            }
          ?>
        </div>
          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
    
          </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>
  </body>
</html>
