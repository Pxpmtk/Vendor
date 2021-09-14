<?php //สำรองไว้ลองเขียนโค้ด
    require_once('connect.php');

	$organization_type=$_POST["organization_type"];
	$business_type=$_POST["business_type"];
	$established=$_POST["established"];
	$num_officer=$_POST["num_officer"];
	$regis_capital=$_POST["regis_capital"];
	$paid_capital=$_POST["paid_capital"];
	$description=$_POST["description"];
	$brandname=$_POST["brandname"];
	$agent=$_POST["agent"];
	$manufacturer=$_POST["manufacturer"];
	$certified=$_POST["certified"];
	$status = "";

	$sql = "INSERT INTO business(organization_type,business_type,established,num_officer,regis_capital,paid_capital,description,brandname,agent,manufacturer,certified,status) 
	VALUES ('$organization_type','$business_type','$established','$num_officer','$regis_capital','$paid_capital','$description','$brandname','$agent','$manufacturer','$certified',1)";

	$result=mysqli_query($conn,$sql);

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'Financial.php'; ";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}
?>
