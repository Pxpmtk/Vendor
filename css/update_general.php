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
            include ('connection.php');
            $id = $_GET['id'];
            $query = "SELECT * FROM general WHERE id=$id";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            extract($row);
        ?>

<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h3 align="center" style="color: black">ข้อมูลทั่วไป/General Information</h3>
            <br />
            <h4 style="color: black"> ชื่อบริษัทผู้ค้าหรือผู้ให้บริการ/Company Name </h4>
            <form method="POST" action="general_update.php" >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="namethai" style="color: black">ภาษาไทย/Thai*</label></th>
                    <input type="text" name="name_th" id="name_th" class="form-control" value="<?php echo $row['name_th'];?>">         
                </div>
                <div class="form-group col-md-6">
                    <label for="nameeng" style="color: black">ภาษาอังกฤษ/English*</label>
                    <input type="text" name="name_en" id="name_en" class="form-control" value="<?php echo $row['name_en'];?>">         
                </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <b><label for="address" style="color: black">ที่อยู่/Address*</label></b>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $row['address'];?>">         
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="province" style="color: black">จังหวัด/Province*</label>
                        <input type="text" name="province" id="province" class="form-control" value="<?php echo $row['province'];?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="amphure" style="color: black">อำเภอ(เขต)/Amphur*</label>
                        <input type="text" name="amphure" id="amphure" class="form-control" value="<?php echo $row['amphure'];?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="district" style="color: black">ตำบล/Subdistrict*</label>
                        <input type="text" name="district" id="district" class="form-control" value="<?php echo $row['district'];?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="zipcode" style="color: black">รหัสไปรษณีย์/Zip code*</label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control" value="<?php echo $row['zip_code'];?>"> 
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <b><label for="tax" style="color: black">เลขประจำตัวผู้เสียภาษี/Texpayer Identification No.*</label></b>
                    <input type="text" name="taxpayer_no" id="taxpayer_no" class="form-control" value="<?php echo $row['taxpayer_no'];?>">         
                </div>
                </div>
                <br />
                <div align="right">
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row['id'];?>">
                <button type="submit" class="btn btn-primary">next</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>