<?php
session_start();

   require_once("conn.php");
   $urname = $_POST['username'];
   $pass = md5($_POST['password']);
   
   $sql = "SELECT * FROM user WHERE username = '$urname'";
   $query = $conn->query($sql);
  
  if($query->num_rows != 0) {
    echo "<div align='center'>Username Already Taken! <a href='daftar.php'>Back</a></div>";
  } 
  else {
    if(!$urname || !$pass) {
      echo "<div align='center'>Please Enter Username or Password! <a href='daftar.php'>Back</a></div>";
    }
    else if($_POST["kode"] != $_SESSION["kode_cap"] OR $_POST["kode"] == ""){ 
      echo"<div align='center'>Wrong Captcha!!! <a href='daftar.php'>Back</a></div>";
    }
    else{
      $data = "INSERT INTO user VALUES (NULL, '$urname', '$pass')";
      $simpan = $conn->query($data);
      if($simpan) {
        echo "<div align='center'>Register Success, please <a href='login.php'>Login</a></div>";
      }
      else {
        echo "<div align='center'>Fail!</div>";
      }
    }
  }
?>
