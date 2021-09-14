<?php
    include('connect.php');

        $customer_name=$_POST["customer_name"];
        $name_th=$_POST["name_th"];
        $position_th=$_POST["position_th"];
        //$signature=$_POST["signature"]["name"];
        $bank_name=$_POST["bank_name"];
        $branch=$_POST["branch"];
        $account_no=$_POST["account_no"];
        $payment=$_POST["payment"];
        $id=$_POST["id"];


        $sql = "UPDATE financial SET
        customer_name = '$customer_name' ,
        name_th = '$name_th' ,
        position_th = '$position_th' ,
        bank_name = '$bank_name' ,
        branch = '$branch' ,
        account_no = '$account_no' ,
        payment = '$payment'
        WHERE id = '$id' ";

        $result = mysqli_query($conn,$sql);

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'update_contact.php?id=$id'";
	echo "</script>";
	}

	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
}
?>