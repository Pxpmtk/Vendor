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
            $query = "SELECT * FROM business WHERE id=$id";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            extract($row);

            echo $query;
        ?>
    <div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h3 align="center" style="color: black">ข้อมูลธุรกิจ/Business Information</h3>
            <br />
            <form method="POST" action="business_update.php" >
            <class="form-row">
                <div class="form-group col-md-12">
                    <label for="Organization" style="color: black">รูปแบบการจัดติดตั้ง/Organization Type*</label>
                    <select class="form-control" name="type_organization" id="type_organization" value="<?php echo $row['type_organization'];?>">
                    <option value="<?php echo $row['type_organization'];?>"><?php echo $row['type_organization'];?></option>
                        <option value="">กรุณาเลือกข้อมูล</option>
                        <option value="1">บุคคลธรรมดา (Individul)</option>
                        <option value="2">บริษัทจำกัด (Company Limited)</option>
                        <option value="3">องค์กรไม่แสวงหากำไร (Non Profit Organization)</option>
                        <option value="4">ห้างหุ้นส่วน (Partnership)</option>
                        <option value="5">บริษัทมหาชน (PCL)</option>
                        <option value="6">กิจการค้าร่วม (Consortium)</option>
                        <option value="7">อื่นๆ (Other)</option>
                    </select>         
                </div>
                <div class="form-group col-md-6">
                    <label for="Business" style="color: black">ประเภทธุรกิจ/Nature of Business*</label>
                    <select class="form-control" name="type_business" id="type_business" value="<?php echo $row['type_business'];?>">
                    <option value="<?php echo $row['type_business'];?>"><?php echo $row['type_business'];?></option>
                        <option value="">กรุณาเลือกข้อมูล</option>
                        <option value="1">Association / Organization / Foundation</option>
                        <option value="2">IT Equipment Provider / IT Distributor</option>
                        <option value="3">Software Development / Software Solution Provider</option>
                        <option value="4">Media Solution Provider / Advertising Agency</option>
                        <option value="5">General Retailer</option>
                        <option value="6">Service Provider</option>
                        <option value="7">System Integrator / Subcontractor</option>
                        <option value="8">Travel Agency</option>
                    </select>           
                </div>
                <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="Established" style="color: black">ปีที่ก่อตั้ง/Established on*</label>
                    <input type="text" name="established" id="established" class="form-control" value="<?php echo $row['established'];?>">         
                </div>
                <div class="form-group col-md-8">
                    <label for="Officer" style="color: black">จำนวนพนักงาน/Number of Officer*</label>
                    <input type="text" name="num_officer" id="num_officer" class="form-control" value="<?php echo $row['num_officer'];?>">         
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Rigister" style="color: black">เงินทุนจดทะเบียน/Rigister Capital*</label>
                    <select class="form-control" name="regis_capital" id="regis_capital" value="<?php echo $row['regis_capital'];?>">
                    <option value="<?php echo $row['regis_capital'];?>"><?php echo $row['regis_capital'];?></option>
                        <option value="">กรุณาเลือกข้อมูล</option>
                        <option value="1">น้อยกว่า 1,000,000 </option>
                        <option value="2">1,000,000 – 5,000,000</option>
                        <option value="3">5,000,000 – 10,000,000</option>
                        <option value="4">มากกว่า 10,000,000</option>
                    </select>           
                </div>
                <div class="form-group col-md-6">
                    <label for="Paid" style="color: black">เงินทุนที่ชำระแล้ว/Paid Capital*</label>
                    <input type="text" name="paid_capital" id="paid_capital" class="form-control" value="<?php echo number_format($row['paid_capital']);?>">         
                </div>
                </div>
                <div class="form-row" align="center">
                    <div class="form-group col-md-3">
                        <label for="Description" style="color: black">กลุ่มวัสดุ อุปกรณ์ หรือบริการ<br>Description of Goods or Service</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="1." value="<?php echo $row['description'];?>"><br />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Brandname" style="color: black">ยี่ห้อและประเทศผู้ผลิต<br>Brand Name and Country of Origin</label>
                        <input type="text" name="brandname" id="brandname" class="form-control" value="<?php echo $row['brandname'];?>"><br />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Agent" style="color: black">เป็นผู้แทนจำหน่าย<br>Agent/Dealer</label>
                        <input type="text" name="agent" id="agent" class="form-control" value="<?php echo $row['agent'];?>"><br />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Manufacturer" style="color: black">เป็นผู้ผลิตหรือให้บริการ<br>Manufacturer/Service Provider</label>
                        <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="<?php echo $row['manufacturer'];?>"><br />                    </div>
                    <b>*กรุณากรอกข้อมูลอย่างน้อย 1 ลำดับ</b>
                </div><br />
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="Certified" style="color: black">การรับรองมาตรฐาน (ถ้ามี)/Standard Certified(if have)</label>
                    <select class="form-control" name="certified" id="certified" value="<?php echo $row['certified'];?>">
                    <option value="<?php echo $row['certified'];?>"><?php echo $row['certified'];?></option>
                        <option value="">กรุณาเลือกข้อมูล</option>
                        <option value="1">ISO 9001</option>
                        <option value="2">ISO 14001</option>
                        <option value="3">OHSAS 18001</option>
                        <option value="4">TIS 18001</option>
                        <option value="5">อื่นๆ (Other)</option>
                    </select>         
                </div>
                </div>
        </div>
    </div>
</div>
<div align="right">
<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row['id'];?>">
<button type="submit" class="btn btn-primary">next</button>
</div>
</form>
<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>