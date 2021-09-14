<?php
    include('connect.php');

    $name_th=$_POST["name_th"];
    $name_en=$_POST["name_en"];
    $address=$_POST["address"];
    $district=$_POST["district"];
    $amphure=$_POST["amphure"];
    $province=$_POST["province"];
    $zip_code=$_POST["zip_code"];
    $taxpayer_no=$_POST["taxpayer_no"];
    $id=$_POST["id"];

        $sql = "UPDATE general SET
        name_th = '$name_th' ,
        name_en = '$name_en' ,
        address = '$address' ,
        district = '$district' ,
        amphure = '$amphure' ,
        province = '$province' ,
        zip_code = '$zip_code' ,
        taxpayer_no = '$taxpayer_no'
        WHERE id = '$id' ";

        $result = mysqli_query($conn,$sql);


	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'update_business.php?id=$id'";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}
?>
