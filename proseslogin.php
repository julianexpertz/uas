<?php 
	require 'conn.php';
	session_start();
	$urname = $_POST['username'];
	$pass = md5($_POST['password']);

	$result = mysqli_query($conn,"SELECT * FROM user where username='$urname' and password ='$pass'");

	$data	= mysqli_fetch_assoc($result);

 	if (mysqli_num_rows($result)){
 		//login
 		$_SESSION['username'] = $urname;
 		header('location:admin.php');
 	}
 	
 	else {
 		echo "<center>"."PASSWORD SALAH";
 		echo "<br>";
 		echo "<a href='daftar.php'>Daftar<a>";
 		echo " dulu BRO!";
 		echo "<br>";
 		echo "<br>";
 		echo "Kalau punya akun silahkan ";
 		echo "<a href='login.php'>login<a>";
 		echo "</center>";
 	}

?>