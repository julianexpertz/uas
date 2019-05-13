<?php
	$host='sql313.epizy.com';
	$urname='epiz_23899227';
	$pass='LWTu5sSaZjAh';
	$dbname='epiz_23899227_blog';

	$conn= new mysqli($host,$urname,$pass,$dbname);
	
	function upload(){
		$newgambar = $_FILES['gambar']['name'];
		$tmp = $_FILES['gambar']['tmp_name'];
		
		move_uploaded_file($tmp, 'pic/' . $newgambar);
		return $newgambar;
	}
?>