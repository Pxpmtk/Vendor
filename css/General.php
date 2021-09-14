<?php
    include('connection.php');
    $sql = "SELECT * FROM provinces";  
    $query = mysqli_query($con, $sql);
?>
<?php include('vendor_menu.php');?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
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
        $query2 = "select * from general order by vendor_id desc limit 1";
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
            $name_th=$_POST["name_th"];
            $name_en=$_POST["name_en"];
            $address=$_POST["address"];
            $district=$_POST["district"];
            $amphure=$_POST["amphure"];
            $province=$_POST["province"];
            $zip_code=$_POST["zip_code"];
            $taxpayer_no=$_POST["taxpayer_no"];
            $status = "";
        
            $sql1 = "INSERT INTO general (vendor_id, name_th, name_en, address, district, amphure, province, zip_code, taxpayer_no, status) 
            VALUES ('$vendor_id','$name_th','$name_en','$address','$district','$amphure','$province','$zip_code','$taxpayer_no',1)";
            $result=mysqli_query($con,$sql1);
        
            if($result){
            echo "<script type='text/javascript'>";
            echo "window.location = 'Business.php'; ";
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
            <h3 align="center" style="color: black">ข้อมูลทั่วไป/General Information</h3>
            <br />
            <h4 style="color: black"> ชื่อบริษัทผู้ค้าหรือผู้ให้บริการ/Company Name </h4>
            <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">
            <div>
            <input type="hidden" class="form-control" name="vendor_id" id="vendor_id" style="color: red" value="<?php echo $vendor_id; ?>" readonly>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="namethai" style="color: black">ภาษาไทย/Thai*</label></th>
                    <input type="text" name="name_th" id="name_th" class="form-control" required>         
                </div>
                <div class="form-group col-md-6">
                    <label for="nameeng" style="color: black">ภาษาอังกฤษ/English*</label>
                    <input type="text" name="name_en" id="name_en" class="form-control">         
                </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <b><label for="address" style="color: black">ที่อยู่/Address*</label></b>
                    <input type="text" name="address" id="address" class="form-control">         
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="province" style="color: black">จังหวัด/Province*</label>
                        <select name="province" id="province" class="form-control">
                            <option value="" selected disabled>เลือกจังหวัด</option>
                            <?php foreach($query as $result) { ?>
                                <option value="<?=$result['name_th']?>"><?=$result['name_th']?></option>
                             <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="amphure" style="color: black">อำเภอ(เขต)/Amphur*</label>
                        <select name="amphure" id="amphure" class="form-control">
                            <option value="">เลือกอำเภอ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="district" style="color: black">ตำบล/Subdistrict*</label>
                        <select name="district" id="district" class="form-control">
                            <option value="">เลือกตำบล</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="zipcode" style="color: black">รหัสไปรษณีย์/Zip code*</label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control" readonly> 
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <b><label for="tax" style="color: black">เลขประจำตัวผู้เสียภาษี/Texpayer Identification No.*</label></b>
                    <input type="text" name="taxpayer_no" id="taxpayer_no" class="form-control">         
                </div>
                </div>
                <input type="hidden" name="id" id="id" class="form-control">
                <div align="right">
                <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $('#province').change(function() {
                var name_th = $(this).val();
            $.ajax({
                type: "post",
                url: "address_db.php",
                data:{name_th:name_th,function:'province'},
                success: function(data) {
                    $('#amphure').html(data);
                    $('#district').html('');
                    $('#zip_code').val('');
                }
            });
        });
        $('#amphure').change(function() {
                var name_th = $(this).val();
            $.ajax({
                type: "post",
                url: "address_db.php",
                data:{name_th:name_th,function:'amphure'},
                success: function(data) {
                    $('#district').html(data);
                    $('#zip_code').val('');
                }
            });
        });
        $('#district').change(function() {
                var name_th = $(this).val();
            $.ajax({
                type: "post",
                url: "address_db.php",
                data:{name_th:name_th,function:'district'},
                success: function(data) {
                    $('#zip_code').val(data);
                }
            });
        });
        </script>
</body>
</html>