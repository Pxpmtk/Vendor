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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $('#province').change(function() {
                var name_th = $(this).val();
            $.ajax({
                type: "post",
                url: "test_1.php",
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
                url: "test_1.php",
                data:{name_th:name_th,function:'amphure'},
                success: function(data) {
                    //console.log(data)
                    $('#district').html(data);
                    $('#zip_code').val('');
                }
            });
        });
        $('#district').change(function() {
                var name_th = $(this).val();
            $.ajax({
                type: "post",
                url: "test_1.php",
                data:{name_th:name_th,function:'district'},
                success: function(data) {
                    //console.log(data)
                    $('#zip_code').val(data);
                }
            });
        });
        </script>
    </body>
</html>