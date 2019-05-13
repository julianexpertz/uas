<?php

 require_once("conn.php");
 $id=$_POST['id'];
 $gambar= upload();
 $judul=$_POST['title'];
 $content=$_POST['content'];
$oldgambar=$_POST['oldgambar'];

if($_FILES['gambar']['error']===4){
	$gambar=$oldgambar;
}else{
	$gambar=upload();
}

 $update = "UPDATE web SET gambar='$gambar', title='$judul', content='$content' WHERE id='$id'";

 if ($conn->query($update)===TRUE){
 	header('location:admin.php');
 }else{
 	echo "error updating record";
 }
 ?>



 