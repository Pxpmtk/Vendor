<?php
include ('menu.php');
?>

<?php
include ("connect.php");

$query = "SELECT g.*,b.type_business
FROM general as g
INNER JOIN business as b ON g.id=b.id
ORDER BY g.id ASC";

//echo $query;
//exit;

$result = mysqli_query($conn, $query);
?>

<table class="table table-striped table-hover">
        <thead>
            <tr>
                    <th class="th">No.</th>
                    <th class="th">Date</th>
                    <th class="th">Company Name</th>
                    <th class="th">Nature of Business</th>
                    <th class="th">Status</th>
                    <th class="th">Detail</th>
            </tr>
        </thead>
				<?php while($row = $result->fetch_object() ): ?>
					<tr>
						<td style="color: black"><?php echo $row->id ?></td>
						<td style="color: black"><?php echo date("d/m/Y", strtotime($row->create_at)); ?></td>
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
					<td>
					<a href='view_information.php?id=<?php echo $row->id?>' title="View Data" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                	<a href='update_general.php?id=<?php echo $row->id?>' title="Edit Data" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					</td>
			</tr>
			<?php endwhile; ?>
		</table>