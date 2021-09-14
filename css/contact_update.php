<?php
    include('connect.php');

        $name=$_POST["name"];
        $position=$_POST["position"];
        $department=$_POST["department"];
        $telephone=$_POST["telephone"];
        $email=$_POST["email"];
        $id=$_POST["id"];

        $sql = "UPDATE contact SET 
        name = '$name' ,
        position = '$position' ,
        department = '$department' ,
        telephone = '$telephone' ,
        email = '$email'
        WHERE id = '$id' ";

        $result = mysqli_query($conn,$sql);

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'view.php'";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}
?>