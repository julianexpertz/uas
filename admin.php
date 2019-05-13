<?php
  require_once('conn.php');
?>
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
          <a href="start.php" class="navbar-brand">BLOGKU</a>
          <a class="navbar-brand navbar-right" onclick="return confirm('Are you sure want to logout?')" href="logout.php">Log-out</a>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <form id="form-container" class="form-container">
              <li class="wikipedia-container">
                <label id="wikipedia-header" for="input">Search Wiki: </label>
                <input type="text" id="input" value="">
                <button id="submit-btn">Submit</button>
                <ul id="wikipedia-links">Relevant Wikipedia articles here!</ul>
              </li>
            </form>
            <hr>
              <form>
                <label>Search Youtube: </label>
                <input type="text" id="search" value="">
                <input type="submit" value="Search">
              </form>
              <div id="results"></div>
          </ul>
    
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Admin Article<a href="add.php" class="btn btn-primary" style="float:right">Add Data</a></h1>
          <br>
    			<?php
          $sql = "SELECT * FROM web";
    			$result = $conn->query($sql);
          if($result->num_rows > 0){
    				while($row = $result->fetch_assoc()){
              echo "<img src=\"pic/".$row['gambar']."\" width=\"200\" height=\"180\">"."<br>";
              echo "<br>"."<b>"."Title: ". $row["title"]."</b>" . "<br>" ."Content: "."<a href='detailadmin.php?id=".$row['id']."'>Detail</a>"."<br>"."<div>Created time:</div>".$row['time'];  
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
    </div>
    
    <script src="jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="yutub.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=init"></script>
  </body>
</html>
