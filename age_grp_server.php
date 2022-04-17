<?php
     include_once 'db_connect.php';

     $name = $_POST['name'];
     $age = $_POST['age'];
     $blood_group = $_POST['blood_group'];
     $contact_no = $_POST['district'];
     $location = $_POST['location'];
     $bp= $_POST['bp'];
     $diabetics = $_POST['diabetics'];
     $temp = $_POST['temp'];
     $heartrate = $_POST['heartrate'];
     $cholesterol= $_POST['cholesterol'];
     $gender = $_POST['gender'];


        $sql = "INSERT INTO age_grp(name,age,blood_group,contact_no,location,
        bp,diabetics,temp,heartrate,cholesterol,)
        values ('$name','$age','$blood_group','$contact_no' ,'$location',
        '$bp','$diabetics','$temp','$heartrate','$cholesterol','$gender');";

       $result = mysqli_query($conn,$sql);

       header("Location:age_grp_reg.php?signup=success");
    ?>