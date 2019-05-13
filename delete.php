<?php
require_once('conn.php');

$id=$_GET['id'];
$sql="DELETE FROM web WHERE id=$id";



if($conn->query($sql)===TRUE){
	echo "Delete Success";
	header('location:admin.php');
}
else{
	echo "Deleting Error: ". $conn->error;
}
?>