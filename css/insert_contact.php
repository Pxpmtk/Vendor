<?php
require_once('connect.php');

		$vendor_id=$_POST["vendor_id"];
		$name=$_POST["name"];
        $position=$_POST["position"];
        $department=$_POST["department"];
        $telephone=$_POST["telephone"];
        $email=$_POST["email"];

if(isset($_POST) && !empty($_POST) || isset($_FILES) && !empty($_FILES)) {
	
	$extension = array("jpeg", "jpg", "png", "pdf", "JPEG", "JPG", "PNG", "PDF");
	$target = '../backVendor/assets/uploads/'; //pathข้อมูล
	//การอัพโหลดไฟล์ลง database
	foreach($_FILES["file"]["tmp_name"] as $key => $tmp_name) {
		$file_name=$_FILES["file"]["name"][$key];
		$file_tmp=$_FILES["file"]["tmp_name"][$key];
		$ext = pathinfo($file_name,PATHINFO_EXTENSION);
		//$count = sizeof($_FILES["file"]["name"]);
		//for($i=0;$i<$count;$i++) {
		//$num = $i + 1;
		if(in_array($ext, $extension)) {
			if(!file_exists($target.$file_name)) {
				if(move_uploaded_file($_FILES["file"]["tmp_name"][$key],$target.$file_name)){
					$sql = "INSERT INTO attachment (file_name) VALUES ('$file_name')";
					$query = mysqli_query($conn,$sql);
				//เงื่อนไขเมื่อมีการอัพโหลดไฟล์ที่ซ้ำ จะทำการเปลี่ยนชื่อไฟล์
					}else{
				}
			}

			}
		}
	}


	$sql1 = "INSERT INTO contact (vendor_id,name, position, department, telephone, email) VALUES ('$vendor_id','$name','$position','$department','$telephone','$email')";
	$result = mysqli_query($conn,$sql1);


if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Success!!');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}

?>