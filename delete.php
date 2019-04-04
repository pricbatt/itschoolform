<?php
   date_default_timezone_set('Asia/Bangkok');
  
?>
<?php

require 'connection_database.php';
$id=$_GET['id'];

//$sql = "DELETE FROM questions where id=$id;";
//$sql = "DELETE FROM answers where question_id=$id;";
$sql="DELETE FROM form where id=$id;";
$result=mysqli_query($conn,$sql);



$query = mysqli_query($conn,$sql);
if ($query == TRUE) {
echo "<script type='text/javascript'>";
	echo "alert('delete Succesfuly');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
}
mysqli_close($conn);