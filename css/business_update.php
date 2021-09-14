<?php
    include('connect.php');

    $type_organization=$_POST["type_organization"];
	$type_business=$_POST["type_business"];
	$established=$_POST["established"];
	$num_officer=$_POST["num_officer"];
	$regis_capital=$_POST["regis_capital"];
	$paid_capital=$_POST["paid_capital"];
	$description=$_POST["description"];
	$brandname=$_POST["brandname"];
	$agent=$_POST["agent"];
	$manufacturer=$_POST["manufacturer"];
	$certified=$_POST["certified"];
    $id = $_POST['id'];

    $sql = "UPDATE business SET
        organization_type = '$organization_type' ,
        type_business = '$type_business' ,
        established = '$established' ,
        num_officer = '$num_officer' ,
        regis_capital = '$regis_capital' ,
        paid_capital = '$paid_capital' ,
        description = '$description' ,
        brandname = '$brandname' ,
        agent = '$agent' ,
        manufacturer = '$manufacturer' ,
        certified = '$certified'
        WHERE id = '$id' ";

        $result = mysqli_query($conn,$sql);

		//echo $sql;

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'update_financial.php?id=$id'";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}
?>