<!DOCTYPE html>
<html>
    <?php include("vendor_menu.php");?>
<head>
    <meta charset="UTF-8">
    <title>Vendor list</title>
    <body>

    <?php
        include('connect.php');
        $query = "SELECT * FROM business_type ORDER BY id asc" or die("Error:" . mysqli_error($conn));
        $result = mysqli_query($conn, $query);
    ?>

    <?php
        $query2 = "select * from business order by vendor_id desc limit 1";
        $result2 = mysqli_query($conn,$query2);
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
        //$con = mysqli_connect($servername, $username, $password, $dbname);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vendor_id=$_POST["vendor_id"];
            $type_organization=$_POST["type_organization"];
            $type_business=$_POST["type_business"];
            $established=$_POST["established"];
            $num_officer=$_POST["num_officer"];
            $regis_capital=$_POST["regis_capital"];
            $paid_capital=$_POST["paid_capital"];
            $description=$_POST["description"];
            $brandname=$_POST["brandname"];
            $agent=$_POST["agent"];
            $manufacturer=$_POST["manufacturer"];
            $certified=$_POST["certified"];
            $status = "";
        
            $sql = "INSERT INTO business(vendor_id,type_organization,type_business,established,num_officer,regis_capital,paid_capital,description,brandname,agent,manufacturer,certified,status) 
            VALUES ('$vendor_id','$type_organization','$type_business','$established','$num_officer','$regis_capital','$paid_capital','$description','$brandname','$agent','$manufacturer','$certified',1)";
        
            $result=mysqli_query($conn,$sql);
        
            if($result){
            echo "<script type='text/javascript'>";
            echo "window.location = 'Financial.php'; ";
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
            <h3 align="center" style="color: black">ข้อมูลธุรกิจ/Business Information</h3>
            <br />
            <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">
            <div align="left">
            <input type="hidden" class="form-control" name="vendor_id" id="vendor_id" style="color: red" value="<?php echo $vendor_id; ?>" readonly>
            </div>
            <class="form-row">
                <div class="form-group col-md-12">
                    <label for="Organization" style="color: black">รูปแบบการจัดติดตั้ง/Organization Type*</label>
                    <select class="form-control" name="type_organization" id="type_organization" >
                    <option value="NULL">กรุณาเลือกข้อมูล</option>
                    <?php 
                        $query3 = "SELECT * FROM organization_type ORDER BY id asc" or die("Error:" . mysqli_error($conn));
                        $result3 = mysqli_query($conn, $query3);
                            foreach($result3 as $results){?>
                            <option value="<?php echo $results["organization_type"];?>">
                        <?php echo $results["organization_type"]; ?>
                        </option>
                <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="Business" style="color: black">ประเภทธุรกิจ/Nature of Business*</label>
                    <select class="form-control" name="type_business" id="type_business" require>
                        <option value="NULL">กรุณาเลือกข้อมูล</option>
                        <?php foreach($result as $results){?>
                            <option value="<?php echo $results["business_type"];?>">
                        <?php echo $results["business_type"]; ?>
                        </option>
                <?php } ?>
                    </select>           
                </div>
                <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="Established" style="color: black">ปีที่ก่อตั้ง/Established on*</label>
                    <input type="text" name="established" id="established" class="form-control" require>         
                </div>
                <div class="form-group col-md-8">
                    <label for="Officer" style="color: black">จำนวนพนักงาน/Number of Officer*</label>
                    <input type="text" name="num_officer" id="num_officer" class="form-control" require>         
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Rigister" style="color: black">เงินทุนจดทะเบียน/Rigister Capital*</label>
                    <select class="form-control" name="regis_capital" id="regis_capital" require>
                    <option value="NULL">กรุณาเลือกข้อมูล</option>
                    <?php 
                        $query4 = "SELECT * FROM regis_type ORDER BY id asc" or die("Error:" . mysqli_error($conn));
                        $result4 = mysqli_query($conn, $query4);
                            foreach($result4 as $results){?>
                            <option value="<?php echo $results["regis_type"];?>">
                        <?php echo $results["regis_type"]; ?>
                        </option>
                    <?php } ?>
                    </select>
                    </select>           
                </div>
                <div class="form-group col-md-6">
                    <label for="Paid" style="color: black">เงินทุนที่ชำระแล้ว/Paid Capital*</label>
                    <input type="text" name="paid_capital" id="paid_capital" class="form-control" required>         
                </div>
                </div>
                <div class="form-row" align="center">
                    <div class="form-group col-md-3">
                        <label for="Description" style="color: black">กลุ่มวัสดุ อุปกรณ์ หรือบริการ<br>Description of Goods or Service</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="1."><br />
                        <input type="text" name="description" id="description" class="form-control" placeholder="2."><br />
                        <input type="text" name="description" id="description" class="form-control" placeholder="3.">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Brandname" style="color: black">ยี่ห้อและประเทศผู้ผลิต<br>Brand Name and Country of Origin</label>
                        <input type="text" name="brandname" id="brandname" class="form-control"><br />
                        <input type="text" name="brandname" id="brandname" class="form-control"><br />
                        <input type="text" name="brandname" id="brandname" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Agent" style="color: black">เป็นผู้แทนจำหน่าย<br>Agent/Dealer</label>
                        <input type="text" name="agent" id="agent" class="form-control"><br />
                        <input type="text" name="agent" id="agent" class="form-control"><br />
                        <input type="text" name="agent" id="agent" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Manufacturer" style="color: black">เป็นผู้ผลิตหรือให้บริการ<br>Manufacturer/Service Provider</label>
                        <input type="text" name="manufacturer" id="manufacturer" class="form-control"><br />
                        <input type="text" name="manufacturer" id="manufacturer" class="form-control"><br />
                        <input type="text" name="manufacturer" id="manufacturer" class="form-control">
                    </div>
                    <b>*กรุณากรอกข้อมูลอย่างน้อย 1 ลำดับ</b>
                </div><br />
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="Certified" style="color: black">การรับรองมาตรฐาน (ถ้ามี)/Standard Certified(if have)</label>
                    <select class="form-control" name="certified" id="certified">
                    <option value="NULL">กรุณาเลือกข้อมูล</option>
                        <option value="1">ISO 9001</option>
                        <option value="2">ISO 14001</option>
                        <option value="3">OHSAS 18001</option>
                        <option value="4">TIS 18001</option>
                        <option value="5">อื่นๆ (Other)</option>
                    </select>         
                </div>
                </div>
            <input type="hidden" name="id" id="id" class="form-control">
        </div>
    </div>
</div>
<div align="right">
<button type="submit" class="btn btn-primary">Next</button>
</div>
</form>
<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>