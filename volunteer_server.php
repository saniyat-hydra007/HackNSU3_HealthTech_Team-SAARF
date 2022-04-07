<?php
     include_once 'db_connect.php';

     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $email = $_POST['email'];
     $phone_num = $_POST['phone_num'];
     $location = $_POST['location'];
     $institution= $_POST['institution'];
     $date_of_birth= $_POST['date_of_birth'];
     $blood_group= $_POST['blood_group'];
     $id_num= $_POST['id_num'];

        $sql = "INSERT INTO volunteer(first_name,last_name,email,phone_num,location,institution,date_of_birth,blood_group,id_num)
        values ('$first_name','$last_name','$email','$phone_num' ,'$location','$institution','$date_of_birth','$blood_group','$id_num');";

       $result = mysqli_query($conn,$sql);

       header("Location: volunteer_reg.php?signup=success");
    ?>