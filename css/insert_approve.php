<?php
    require('connect.php');

    $comment=$_POST["comment"];
    $checkbox1 = $_POST['chkapprove'];

    if($_POST["Submit"]=="Submit") {
        for($i=0; $i<sizeof($checkbox1);$i++) {
            for($i=0; $i<sizeof($comment);$i++)  {
            $sql = "INSERT INTO approve(status,comment) VALUES ('".$checkbox1[$i]."','".$comment[$i]."')";
            $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
            }
        }
    }

    if($result){
        echo "<script type='text/javascript'>";
        echo "window.location = 'view.php'; ";
        echo "</script>";
        }
    
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error!!');";
        echo "</script>";
    }
?>