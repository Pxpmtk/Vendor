<!DOCTYPE html>
<html>
<?php include("vendor_menu.php");?>
<head>
    <meta charset="UTF-8">
    <title>Vendor list</title>
</head>
<body>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vendor";
        $con = mysqli_connect($servername, $username, $password, $dbname);
    ?>

    <?php
        $query2 = "select * from financial order by vendor_id desc limit 1";
        $result2 = mysqli_query($con,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['vendor_id'];
        if ($last_id == "")
        {
            $vendor_id = "VR0001";
        }
        else
        {
            $vendor_id = substr($last_id, 5);
            $vendor_id = intval($vendor_id);
            $vendor_id = "VR000" . ($vendor_id + 1);
        }
    ?>

<?php
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vendor_id=$_POST["vendor_id"];
            $customer_name=$_POST["customer_name"];
            $name_th=$_POST["name_th"];
            $position_th=$_POST["position_th"];
            $signature=$_FILES["signature"]["name"];
            $bank_name=$_POST["bank_name"];
            $branch=$_POST["branch"];
            $account_no=$_POST["account_no"];
            $payment=$_POST["payment"];
            $status = "";
        
        $sql = "INSERT INTO financial (vendor_id,customer_name, name_th, position_th, signature, bank_name, branch, account_no, payment, status) 
        VALUES('$vendor_id','$customer_name','$name_th','$position_th','$signature','$bank_name','$branch','$account_no','$payment',1)";
        
            $result=mysqli_query($con,$sql);

            move_uploaded_file($_FILES["signature"]["tmp_name"],'../backVendor/assets/uploads/'.$_FILES["signature"]["name"]); //อัพโหลดไฟล์เอกสาร
        
            if($result){
            echo "<script type='text/javascript'>";
            echo "window.location = 'Contact.php'; ";
            echo "</script>";
            }
        
            else{
            echo "<script type='text/javascript'>";
            echo "alert('Error!!');";
            echo "</script>";
        }
            mysqli_close($con);
        }

?>
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h3 align="center" style="color: black">ข้อมูลด้านการเงิน/Financial Information</h3>
            <br />
            <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">
            <b style="color: black">รายชื่อลูกค้าที่สำคัญ/Customer List</b>
            <div>
            <input type="hidden" class="form-control" name="vendor_id" id="vendor_id" style="color: red" value="<?php echo $vendor_id; ?>" readonly>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="1.บริษัท/ห้างร้าน(Customer's Name)"><br />
                        <input type="text" class="form-control"  placeholder="2.บริษัท/ห้างร้าน(Customer's Name)"><br />
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control"  placeholder="3.บริษัท/ห้างร้าน(Customer's Name)"><br />
                        <input type="text" class="form-control"  placeholder="4.บริษัท/ห้างร้าน(Customer's Name)"><br />
                    </div>
                </div>
                <div class="form-row" align="center">
                    <div class="form-group col-md-4">
                        <label for="authorized" style="color: black">ชื่อผู้มีอำนาจกระทำการแทน/<br>Name of Authorized Persons</label>
                        <input type="text" name="name_th" id="name_th" class="form-control" placeholder="1."><br />
                        <input type="text" class="form-control" placeholder="2."><br />
                        <input type="text" class="form-control" placeholder="3.">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="title" style="color: black">ตำแหน่ง/<br>Title</label>
                        <br />
                        <input type="text" name="position_th" id="position_th" class="form-control"><br />
                        <input type="text" class="form-control"><br />
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="signature" style="color: black">ลายมือชื่อ/<br>Specimen Signature</label>
                    <input type="file" name="signature[]" id="signature" class="form-control"><br />
                    <input type="file" name="signature[]" id="signature"class="form-control"><br />
                    <input type="file" name="signature[]" id="signature"class="form-control
                    ">
                    </div>
                </div><br />
                <div class="form-row" align="center">
                    <div class="form-group col-md-4">
                        <label for="bank_name" style="color: black">ชื่อธนาคาร<br>Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="1."><br />
                        <input type="text" class="form-control" placeholder="2."><br />
                        <input type="text" class="form-control" placeholder="3.">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="branch" style="color: black">สาขา<br>Branch</label>
                        <input type="text" name="branch" id="branch" class="form-control"><br />
                        <input type="text" class="form-control"><br />
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="accout_no" style="color: black">เลขที่บัญชี<br>Bank Account</label>
                        <input type="text" name="account_no" id="account_no" class="form-control"><br />
                        <input type="text" class="form-control"><br />
                        <input type="text" class="form-control">
                    </div>
                </div><br />
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="Type" style="color: black">เงื่อนไขการชำระเงิน/Normal Payment Term</label>
                    <select class="form-control" name="payment" id="payment">
                        <option value="Credit 35">Credit 35</option>
                        <option value="Credit 45">Credit 45</option>
                        <option value="Credit 60">Credit 60</option>
                        <option value="Credit 90">Credit 90</option>
                        <option value="Credit 120">Credit 120</option>
                        <option value="อื่นๆ">อื่นๆ (Other)</option>
                    </select>         
                </div>
                </div>
                <div align="right">
                <input type="hidden" name="id" id="id" class="form-control">
                <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>