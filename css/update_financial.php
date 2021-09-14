<!DOCTYPE html>
<html>
    <?php include("menu.php");?>
<head>
    <meta charset="UTF-8">
    <title>Vendor list</title>
</head>
<body>
<div style="border: medium none; background: #0A85CB; width: 1305px; height: 65px;border-radius: 5px; padding-right: 30px;">
      		<h4 align="right" style="padding-top: 25px;"> แก้ไขข้อมูล </h4>
   			</div>
            <br>
<?php
            $con= mysqli_connect("localhost","root","","vendor") or die("Error: " . mysqli_error($con));
            mysqli_query($con, "SET NAMES 'utf8' ");
            $id = $_GET['id'];
            $query = "SELECT * FROM financial WHERE id=$id";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            extract($row);
        ?>
        <div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h3 align="center" style="color: black">ข้อมูลด้านการเงิน/Financial Information</h3>
            <br />
            <form method="POST" action="financial_update.php" >
            <b style="color: black">รายชื่อลูกค้าที่สำคัญ/Customer List</b>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo $row['customer_name'];?>"><br />
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control"><br />
                    </div>
                </div>
                <div class="form-row" align="center">
                    <div class="form-group col-md-4">
                        <label for="authorized" style="color: black">ชื่อผู้มีอำนาจกระทำการแทน/<br>Name of Authorized Persons</label>
                        <input type="text" name="name_th" id="name_th" class="form-control" placeholder="1." value="<?php echo $row['name_th'];?>"><br />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="title" style="color: black">ตำแหน่ง/<br>Title</label>
                        <br />
                        <input type="text" name="position_th" id="position_th" class="form-control" value="<?php echo $row['position_th'];?>"><br />
                    </div>
                    <div class="form-group col-md-4">
                    <label for="signature" style="color: black">ลายมือชื่อ/<br>Specimen Signature</label>
                    <input type="file" name="signature" id="signature" class="form-control" value="<?php echo $row['signature'];?>"><br />
                    </div>
                </div><br />
                <div class="form-row" align="center">
                    <div class="form-group col-md-4">
                        <label for="bank_name" style="color: black">ชื่อธนาคาร<br>Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name" class="form-control" value="<?php echo $row['bank_name'];?>"><br />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="branch" style="color: black">สาขา<br>Branch</label>
                        <input type="text" name="branch" id="branch" class="form-control" value="<?php echo $row['branch'];?>"><br />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="accout_no" style="color: black">เลขที่บัญชี<br>Bank Account</label>
                        <input type="text" name="account_no" id="account_no" class="form-control" value="<?php echo $row['account_no'];?>"><br />
                    </div>
                </div><br />
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="Type" style="color: black">เงื่อนไขการชำระเงิน/Normal Payment Term</label>
                    <select class="form-control" name="payment" id="payment" value="<?php echo $row['payment'];?>">
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
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row['id'];?>">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>