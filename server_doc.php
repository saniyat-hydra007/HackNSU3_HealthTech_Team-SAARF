<?php
     include_once 'db_connect.php';

     $name = $_POST['name'];
     $designation = $_POST['designation'];
     $appointment_number = $_POST['appointment_number'];
     $thana = $_POST['thana'];
     $district = $_POST['district'];
     $visiting_charge= $_POST['visiting_charge'];
     $hospital_name= $_POST['hospital_name'];
     
        $sql = "INSERT INTO doctor(name,designation,appointment_number,thana,district,visiting_charge,hospital_name)
        values ('$name','$designation','$appointment_number','$thana' ,'$district','$visiting_charge','$hospital_name');";

       $result = mysqli_query($conn,$sql);

       header("Location: doctor_reg.php?signup=success");
    ?>