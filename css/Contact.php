<!DOCTYPE html>
<html>
<?php include("vendor_menu.php");?>
<head>
    <meta charset="UTF-8">
    <title>Vendor list</title>
</head>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vendor";
        $con = mysqli_connect($servername, $username, $password, $dbname);
    ?>

    <?php
        $query2 = "select * from contact order by vendor_id desc limit 1";
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

<div class="container my-10">
    <div class="card">
        <div class="card-body">
            <h3 align="center" style="color: black">ข้อมูลผู้ติดต่อและเอกสารแนบ/Contact Information and Enclosed document</h3>
            <br />
            <form action="insert_contact.php" method="post"enctype="multipart/form-data">
                <label style="color: black"> ชื่อผู้ติดต่อ/Contract Person </label>

            <div>
                <input type="hidden" class="form-control" name="vendor_id" id="vendor_id" style="color: red" value="<?php echo $vendor_id; ?>" readonly>
            </div>

            <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="province" style="color: black">ชื่อ-นามสกุล</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="1."><br />
                        <input type="text" class="form-control" placeholder="2."><br />
                        <input type="text" class="form-control" placeholder="3.">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="province" style="color: black">ตำแหน่งงาน</label>
                        <input type="text" name="position" id="position" class="form-control"><br />
                        <input type="text" class="form-control"><br />
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="province" style="color: black">หน่วยงาน/แผนก</label>
                        <input type="text" name="department" id="department" class="form-control"><br />
                        <input type="text" class="form-control"><br />
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="province" style="color: black">หมายเลขโทรศัพท์</label>
                        <input type="text" name="telephone" id="telephone" class="form-control"><br />
                        <input type="text" class="form-control"><br />
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="province" style="color: black">E-mail Address</label>
                        <input type="text" name="email" id="email" class="form-control"><br />
                        <input type="text" name="email" id="email" class="form-control"><br />
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <b style="color: black">*กรุณากรอกข้อมูลอย่างน้อย 1 ลำดับ</b>
                </div><br />
                <b style="color: black">โปรดแนบเอกสารดังต่อไปนี้/Contract Person</b>
                <b style="color: black">*เอกสารลำดับที่ 1-4 ให้รับรองสำเนาถูกต้อง โดยผู้มีอำนาจตามหนังสือรับรองฯ และประทับตราบริษัท</b>
                <br />
                <div class="form-row">
                <?php 
                //วนลูปตัว upload file 7 รายการ
                $con= mysqli_connect("localhost","root","","vendor") or die("Error: " . mysqli_error($con));
                mysqli_query($con, "SET NAMES 'utf8' ");
                $query = "SELECT * FROM file_type" or die("Error:" . mysqli_error($con));  
                $result = mysqli_query($con, $query);
                while($file_type = mysqli_fetch_array($result)){?>
                <div class="form-row">
                <label style="color: black"><?php echo $file_type["id"]?>. <?php echo $file_type["file_type"]?></label><br />
                    <input style="color: black" type="file" name="file[]" id="file" >
                </div>
                <?php } ?>
                </div><br />
                <div align="right">
                <input type="submit" name="submit" class="btn btn-primary"role="button">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>