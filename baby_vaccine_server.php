<?php
     include_once 'db_connect.php';

     $name = $_POST['name'];
     $father_name = $_POST['father_name'];
     $mother_name = $_POST['mother_name'];
     $date_of_birth = $_POST['date_of_birth'];
     $phone_number = $_POST['phone_number'];
     $email= $_POST['email'];
     

        $sql = "INSERT INTO baby_vaccine(name,father_name,mother_name,date_of_birth,phone_number,email)
        values ('$name','$father_name','$mother_name','$date_of_birth' ,'$phone_number','$email');";

       $result = mysqli_query($conn,$sql);

       header("Location: baby_info_reg.php?signup=success");
    ?>