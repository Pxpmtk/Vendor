<?php  //สำรองไว้ลองเขียนโค้ด
    require_once('connect.php');

    $vendor_id=$_POST["vendor_id"];
    $name_th=$_POST["name_th"];
    $name_en=$_POST["name_en"];
    $address=$_POST["address"];
    $district=$_POST["district"];
    $amphure=$_POST["amphure"];
    $province=$_POST["province"];
    $zip_code=$_POST["zip_code"];
    $taxpayer_no=$_POST["taxpayer_no"];
    $status = "";

        $sql = "INSERT INTO general(vendor_id, name_th, name_en, address, district, amphure, province, zip_code, taxpayer_no, status) 
        VALUES ('$vendor_id','$name_th','$name_en','$address','$district','$amphure','$province','$zip_code','$taxpayer_no',1)";

        $result=mysqli_query($conn,$sql);

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'Business.php'?id=$id";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}
?>
