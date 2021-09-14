<?php //สำรองไว้ลองเขียนโค้ด
    include('connect.php');

    $customer_name=$_POST["customer_name"];
    $name_th=$_POST["name_th"];
    $position_th=$_POST["position_th"];
    $signature=$_POST["signature"]["name"];
    $bank_name=$_POST["bank_name"];
    $branch=$_POST["branch"];
    $account_no=$_POST["account_no"];
    $payment=$_POST["payment"];
    

$sql = "INSERT INTO financial (vendor_id,customer_name, name_th, position_th, signature, bank_name, branch, account_no, payment) 
VALUES('$vendor_id','$customer_name','$name_th','$position_th','$signature','$bank_name','$branch','$account_no','$payment')";
$result = mysqli_query($conn, $sql);



    if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Save Succesfuly');";
        echo "window.location = 'Contact.php'; ";
        echo "</script>";
        }
    
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error!!');";
        echo "</script>";
    }

mysqli_close($conn);
?>





