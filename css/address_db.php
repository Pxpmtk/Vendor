<?php
include('connection.php');
if(isset($_POST) && !empty($_POST) && $_POST['function'] == 'province') {
    $name_th = $_POST['name_th'];
    $sql_province = "SELECT * FROM provinces WHERE name_th = '$name_th'";
    $query_province = mysqli_query($con, $sql_province);
    $row_province = mysqli_num_rows($query_province);
    if($row_province > 0) {
        $result_province = mysqli_fetch_assoc($query_province);
        $province_id = $result_province['id'];
        $sql_amphure = "SELECT * FROM amphures WHERE province_id = '$province_id'";
        $query_amphure = mysqli_query($con, $sql_amphure);
        echo '<option selected disabled>เลือกอำเภอ</option>';
        foreach($query_amphure as $result) {
        echo '<option value="'.$result['name_th'].'">'.$result['name_th'].'</option>';
        }
    }
}

if(isset($_POST) && !empty($_POST) && $_POST['function'] == 'amphure') {
    $name_th = $_POST['name_th'];
    $sql_amphure = "SELECT * FROM amphures WHERE name_th = '$name_th'";
    $query_amphure = mysqli_query($con, $sql_amphure);
    $row_amphure = mysqli_num_rows($query_amphure);
    if($row_amphure > 0) {
        $result_amphure = mysqli_fetch_assoc($query_amphure);
        $amphure_id = $result_amphure['id'];
        $sql_district = "SELECT * FROM districts WHERE amphure_id = '$amphure_id'";
        $query_district = mysqli_query($con, $sql_district);
        echo '<option selected disabled>เลือกตำบล</option>';
        foreach($query_district as $result) {
        echo '<option value="'.$result['name_th'].'">'.$result['name_th'].'</option>';
        }
    }
}

if(isset($_POST) && !empty($_POST) && $_POST['function'] == 'district') {
    $name_th = $_POST['name_th'];
    $sql_district = "SELECT * FROM districts WHERE name_th = '$name_th'";
    $query_district = mysqli_query($con, $sql_district);
    $row_district = mysqli_num_rows($query_district);
    if($row_district > 0) {
        $result_district = mysqli_fetch_assoc($query_district);
        $id = $result_district['id'];
        $sql_zipcode = "SELECT * FROM districts WHERE id = '$id'";
        $query_zipcode = mysqli_query($con, $sql_zipcode);
        $row_zipcode = mysqli_num_rows($query_zipcode);
        if($row_zipcode > 0) {
            $result_zipcode = mysqli_fetch_assoc($query_zipcode);
            echo $result_zipcode['zip_code'];
        }
    }
}

?>