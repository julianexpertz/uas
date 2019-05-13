 <?php
 require_once("conn.php");



 $judul = $_POST['title'];
 $content = $_POST['content'];
 $gambar = upload();
//  if(!$gambar){
//  	return false;
//  }


$sql = "INSERT INTO web VALUES (NULL,'$gambar','$judul', '$content',NULL)";

if ($conn->query($sql) === TRUE) {
    header('location:admin.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>