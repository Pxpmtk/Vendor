<?php //สำรองไว้ลองเขียนโค้ด
require_once('connect.php');

$name=$_POST["name"];
$position=$_POST["position"];
$department=$_POST["department"];
$telephone=$_POST["telephone"];
$email=$_POST["email"];

$sql = "INSERT INTO contact_person(name,position,department,telephone,email) 
VALUES ('$name','$position','$department','$telephone','$email')";

$result=mysqli_query($conn,$sql);

if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}

?>