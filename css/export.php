<?php  
include('connection.php');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT g.*,b.type_business
 FROM general as g
 INNER JOIN business as b ON g.id=b.id ORDER BY g.id ASC";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
  
  <table class="table table-striped table-hover" >
        <tr align="center">
            <th class="th">No.</th>
            <th class="th">Vendor List No.</th>
            <th class="th">Date</th>
            <th class="th">Company Name</th>
            <th class="th">Nature of Business</th>
            <th class="th">Status</th>
            <th class="th">Detail</th>
        </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
            <tr>  
                <td>'.$row["id"].'</td>  
                <td>'.$row["vendor_id"].'</td>  
                <td>'.date("d/m/Y", strtotime($row["create_at"]));'</td>  
                <td>'.$row["name_en"].'</td>  
                <td>'.$row["type_business"].'</td>
                <td>'.$st = $row["status"];
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
                }'</td>
                <td>'.$row["id"].'</td>
            </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
