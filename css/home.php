<?php
include('menu.php')
?>
<!DOCTYPE html>
<html>
<head>
    <div style="border: medium none; background: #0A85CB; width: 1305px; height: 65px;border-radius: 5px; padding-right: 30px;">
    <h4 align="right" style="padding-top: 25px;">Vendor List System</h4>
   		</div>
        <br>
        <br>
	<?php
        include('connection.php');
        $query = "SELECT * FROM vendors ORDER BY id DESC limit 5" or die("Error:" . mysqli_error($con));  
        $result = mysqli_query($con, $query); 
    ?>

	<div class="table-responsive">
    <b style="color: black"> รอ Vendor บันทึกข้อมูล </b><br />
	    <table class="table table-striped table-hover" >
        <thead>
            <tr>
                    <th class="th">No.</th>
                    <th class="th">Company Name</th>
                    <th class="th">Email Address</th>
            </tr>
        </thead>
		<?php
            while($row = mysqli_fetch_array($result)) { 
        echo '
			<tr>
				<td style="color: black">'.$row['id'].'</td>
				<td style="color: black">'.$row['name'].'</td>
				<td style="color: black">'.$row['email'].'</td>
				
			</tr>
			';
		?>
		<?php
			}
		?>
            </table>
        </div>
        <?php 
        echo '<hr>'; 
        ?> 

		<?php
            $query1 = "SELECT g.*,b.type_business FROM general as g
            INNER JOIN business as b ON g.id=b.id WHERE g.status='2' ORDER BY id DESC limit 5" or die("Error:" . mysqli_error($con));  
            $result1 = mysqli_query($con, $query1); 
        ?>
        <div class="table-responsive">
        <b style="color: black"> รออนุมัติ </b><br />
	    <table class="table table-striped table-hover">
        <thead>
            <tr>
                    <th class="th">No.</th>
                    <th class="th">Vendor List No.</th>
                    <th class="th">Date</th>
                    <th class="th">Company Name</th>
                    <th class="th">Nature of Business</th>
                    <th class="th">Status</th>
                    <th class="th">Detail</th>
            </tr>
        </thead>
        <?php while($row = $result1->fetch_object() ): ?>
            <tr>
                <td style="color: black"><?php echo $row->id ?></td>
                <td style="color: black"><?php echo $row->vendor_id ?></td>
                <td style="color: black"><?php echo date("d/m/Y", strtotime($row->create_at));?></td>
                <td style="color: black"><?php echo $row->name_en ?></td>
                <td style="color: black"><?php echo $row->type_business ?></td>
                <td style="color: black"><?php 
                $st = $row->status;
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
                <a href='view_information.php?id=<?php echo $row->id?>' title="View Data" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                <a href='update_general.php?id=<?php echo $row->id?>' title="Edit Data" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <?php endwhile; ?>
		</table>
		</div>
        <?php 
        echo '<hr>'; 
        ?> 
		<?php
            $query2 = "SELECT g.*,b.type_business
            FROM general as g
            INNER JOIN business as b ON g.id=b.id
            WHERE g.status='3' ORDER BY id DESC limit 5" or die("Error:" . mysqli_error($con));   
            $result2 = mysqli_query($con, $query2); 
        ?>
        <div class="table-responsive">
        <b style="color: black"> รอบันทึกข้อมูลเข้า Mango </b><br />
	    <table class="table table-striped table-hover">
        <thead>
            <tr>
                    <th class="th">No.</th>
                    <th class="th">Vendor List No.</th>
                    <th class="th">Date Approve</th>
                    <th class="th">Company Name</th>
                    <th class="th">Nature of Business</th>
                    <th class="th">Status</th>
            </tr>
        </thead>
        <?php while($row = $result2->fetch_object() ): ?>
            <tr>
                <td style="color: black"><?php echo $row->id ?></td>
                <td style="color: black"><?php echo $row->vendor_id ?></td>
                <td style="color: black"><?php echo date("d/m/Y", strtotime($row->create_at) ); ?></td>
                <td style="color: black"><?php echo $row->name_en ?></td>
                <td style="color: black"><?php echo $row->type_business ?></td>
                <td style="color: black"><?php 
                $st = $row->status;
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
                </tr>
            <?php endwhile; ?>
            </table>
        </div><br />
    </body>
</html>