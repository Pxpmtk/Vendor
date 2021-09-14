<html>
    <?php include("menu.php");?>
    <head>
    <meta charset="UTF-8" />
    </head>
    <body>
            <div style="border: medium none; background: #0A85CB; width: 1305px; height: 65px;border-radius: 5px; padding-right: 30px;">
      		<h4 align="right" style="padding-top: 25px;"> Approve </h4>
   			</div>
            <br>
            <br>
            <?php
            $con= mysqli_connect("localhost","root","","vendor") or die("Error: " . mysqli_error($con));
            mysqli_query($con, "SET NAMES 'utf8' ");
            $query = "SELECT * FROM company ORDER BY id asc" or die("Error:" . mysqli_error($con));  
            $result = mysqli_query($con, $query); 
        ?>
        <form action="insert_approve.php" method="post"> 
        <table id="vendortable" class="display" style="width:100%">
        <thead>
            <tr align="center">
                    <th class="th">No.</th>
                    <th class="th">Vendor List No.</th>
                    <th class="th">Date</th>
                    <th class="th">Company Name</th>
                    <th class="th">Nature of Business</th>
                    <th class="th">Status</th>
                    <th class="th">Detail</th>
                    <th class="th">Approve</th> 
                    <th class="th">Reject</th>
                    <th class="th">Comment</th>       
            </tr>
        </thead>
        <?php
            while($row = mysqli_fetch_array($result)) { 
        ?>
            <tr>
                <td class="td"><?php echo $row['id']?></td>
                <td class="td"><?php echo $row['vendor_id']?></td>
                <td class="td"><?php echo $row['create_at']?></td>
                <td class="td"><?php echo $row['name_en']?></td>
                <td class="td"><?php echo $row['business_type']?></td>
                <td class="td"><?php echo $row['approve_status_id']?></td>
                <td class="td"><?php echo $row['approve_des']?></td>
                <td align="center"><input  type="checkbox" name ="chkapprove[]" value="Approve" id="Approve"> </td>
                <td align="center"><input  type="checkbox" name ="chkapprove[]" value="Reject" id="Reject"> </td>
                <td align="center"><input style="color: black" type="text" placeholder="ใส่เหตุผล" name="comment[]" id="comment" /></td>
            </tr>
            <?php
            }
            ?>
            </table>
            <br />
            <div class="form-group"  align="left">
            <input type="submit" name="Submit" value="Submit" class="btn btn-primary" />
                    </div>
        </div>
        </form>
    </body>
</html>