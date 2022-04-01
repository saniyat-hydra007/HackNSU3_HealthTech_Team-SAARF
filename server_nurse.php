<?php
     include_once 'db_connect.php';

     $name = $_POST['name'];
     $phone_number = $_POST['phone_number'];
     $thana = $_POST['thana'];
     $district = $_POST['district'];
     $off_day = $_POST['off_day'];
     $wage_per_hour= $_POST['wage_per_hour'];
     $gender = $_POST['gender'];

        $sql = "INSERT INTO nurse(name,phone_number,thana,district,off_day,wage_per_hour,gender)
        values ('$name','$phone_number','$thana','$district' ,'$off_day','$wage_per_hour','$gender');";

       $result = mysqli_query($conn,$sql);

       header("Location:nurse_reg.php?signup=success");
    ?>