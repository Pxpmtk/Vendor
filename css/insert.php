<?php
    require('connect.php');

    $name=$_POST["name"];
    $email=$_POST["email"];
    $status="";

    $emcompany=implode(",",$_POST["chkCompany"]);

        $sql = "INSERT INTO vendors(name,email,company,status) VALUES ('$name','$email','$emcompany',1)";

        $result=mysqli_query($conn,$sql);

        if($result){
            echo "<script type='text/javascript'>";
            echo "alert('Register Succesfuly');";
            echo "window.location = 'home.php'; ";
            echo "</script>";
            }
            else{
            echo "<script type='text/javascript'>";
            echo "alert('Error back to register again');";
            echo "</script>";
          }
          ?>