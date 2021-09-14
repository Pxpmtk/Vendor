<?php include ('menu.php'); ?>
<meta charset="utf-8">
<!DOCTYPE html>
<body>
<title>ข้อมูลการจัดซื้อ</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<br />
<?php include ("connection.php");?>
    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    $strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
    ?>
<div class="container">
    <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="POST">
        <div class="col-md-3">
            <input type="text" name="txtKeyword" class="form-control" placeholder="Search" value="<?php echo $strKeyword;?>">
        </div>
        <div class="text-left">
            <button class="btn btn-success">Search</button>
        </div>
    </form>
</div>
    
    <div class="table-responsive">
	<table class="table table-striped table-hover" >
<!--ส่วนหัว-->
<?php
     $query = "SELECT g.*,b.type_business FROM general as g
     INNER JOIN business as b ON g.id=b.id WHERE g.vendor_id LIKE '%".$strKeyword."%' OR g.name_en LIKE '%".$strKeyword."%'
     ORDER BY g.id ASC";
    $result = mysqli_query($con, $query);
?>
<thead>
            <tr align="center">
                    <th class="th">No.</th>
                    <th class="th">Vendor List No.</th>
                    <th class="th">Date</th>
                    <th class="th">Company Name</th>
                    <th class="th">Nature of Business</th>
                    <th class="th">Status</th>
                    <th class="th">Detail</th>
            </tr>
        </thead>

        <?php
        while($row = mysqli_fetch_array($result)) { 
        ?>
            <tr>
                <td style="color: black"><?php echo $row["id"] ?></td>
                <td style="color: black"><?php echo $row["vendor_id"] ?></td>
                <td style="color: black"><?php echo date("d/m/Y", strtotime($row["create_at"])); ?></td>
                <td style="color: black"><?php echo $row["name_en"] ?></td>
                <td style="color: black"><?php echo $row["type_business"] ?></td>
                <td style="color: black"><?php 
                $st = $row["status"];
                if($st==1) {
                    echo 'Open';
                }elseif($st==2) {
                    echo 'Waiting';
                }elseif($st==3) {
                    echo 'Approve';
                }elseif($st==4) {
                    echo 'Reject';
                }else{
                    echo 'Cancel';
                }
                ?>
                </td>
                <td>
                <a href='view_information.php?id=<?php echo $row["id"]?>' title="View Data" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                <a href='update_general.php?id=<?php echo $row["id"]?>' title="Edit Data" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <?php
                }
            ?>
</div><br />
</body>
</html>
