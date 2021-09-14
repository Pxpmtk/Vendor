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
            $query = "SELECT * FROM company WHERE id=$id";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            extract($row);
        ?>
        <div class="container my-10">
    <div class="card">
        <div class="card-body">
            <h3 align="center" style="color: black">ข้อมูลผู้ติดต่อและเอกสารแนบ/Contact Information and Enclosed document</h3>
            <br />
            <form method="post" action="contact_update.php">
                <label style="color: black"> ชื่อผู้ติดต่อ/Contract Person </label>
            <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="province" style="color: black">ชื่อ-นามสกุล</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name'];?>"><br />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="province" style="color: black">ตำแหน่งงาน</label>
                        <input type="text" name="position" id="position" class="form-control" value="<?php echo $row['position'];?>"><br />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="province" style="color: black">หน่วยงาน/แผนก</label>
                        <input type="text" name="department" id="department" class="form-control" value="<?php echo $row['department'];?>"><br />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="province" style="color: black">หมายเลขโทรศัพท์</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" value="<?php echo $row['telephone'];?>"><br />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="province" style="color: black">E-mail Address</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email'];?>"><br />
                    </div>
                </div><br />
                <b style="color: black">โปรดแนบเอกสารดังต่อไปนี้/Contract Person</b>
                <b style="color: black">*เอกสารลำดับที่ 1-4 ให้รับรองสำเนาถูกต้อง โดยผู้มีอำนาจตามหนังสือรับรองฯ และประทับตราบริษัท</b>
                <br />
                <div class="form-row">
                    <label for="" style="color: black">1. หนังสือรับรองบริษัท Company Affidavit</label>
                </div>
                <div class="form-row">
                    <input type="file" id="fileupload" name="fileupload" class="from-control" multiple="multiple">
                </div><br />
                <div class="form-row">
                    <label for="" style="color: black">2. ใบทะเบียนพานิชย์,ทะเบียนการค้า Commercial Registration</label>
                </div>
                <div class="form-row">
                    <input type="file" id="fileupload" name="fileupload" class="from-control" multiple="multiple">
                </div><br />
                <div class="form-row">
                    <label for="" style="color: black">3. รายชื่อผู้ถือหุ้น/บริคณห์สนธิ emomorandum of Association</label>
                </div>
                <div class="form-row">
                    <input type="file" id="fileupload" name="fileupload" class="from-control" multiple="multiple">
                </div><br />
                <div class="form-row">
                    <label for="" style="color: black">4. ทะเบียนภาษีมูลค่าเพิ่ม(ภ.พ 20) Value Added Tax Registration</label>
                </div>
                <div class="form-row">
                    <input type="file" id="fileupload" name="fileupload" class="from-control" multiple="multiple">
                </div><br />
                <div class="form-row">
                    <label for="" style="color: black">5. สำเนาบัตรประชาชนผู้มีอำนาจ Copy of ID Card of Authorized Person</label>
                </div>
                <div class="form-row">
                    <input type="file" id="fileupload" name="fileupload" class="from-control" multiple="multiple">
                </div><br />
                <div class="form-row">
                    <label for="" style="color: black">6. รายงานการเคลื่อนไหวทางบัญชีย้อนหลัง 3 เดือน Bank Satatement for past 3 months</label>
                </div>
                <div class="form-row">
                    <input type="file" id="fileupload" name="fileupload" class="from-control" multiple="multiple">
                </div><br />
                <div class="form-row">
                    <label for="" style="color: black">7. ประวัติบริษัทและหนังสือรับรองผลงาน Company Profile and Certificates</label>
                </div>
                <div class="form-row">
                    <input type="file" id="fileupload" name="fileupload" class="from-control" multiple="multiple">
                </div><br />
                <div align="right">
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row['id'];?>">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>