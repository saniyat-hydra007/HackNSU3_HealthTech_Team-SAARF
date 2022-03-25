<?php
     include_once 'db_connect.php';

     $email = $_POST['email'];
     $contact_number = $_POST['contact_number'];
     $blood_group = $_POST['blood_group'];
     $donor_name = $_POST['donor_name'];
     $last_date_of_blood_donation = $_POST['last_date_of_blood_donation'];
     $district= $_POST['district'];
     $postal_code= $_POST['postal_code'];
     $thana= $_POST['thana'];
     $house_no= $_POST['house_no'];
     $Recovered_disease=$_POST['Recovered_disease'];

        $sql = "INSERT INTO plasma_donor(email,contact_number,blood_group,donor_name,last_date_of_blood_donation,district,postal_code,thana,house_no,Recovered_disease)
        values ('$email','$contact_number','$blood_group','$donor_name' ,'$last_date_of_blood_donation','$district','$postal_code','$thana','$house_no','$Recovered_disease');";

       $result = mysqli_query($conn,$sql);

       header("Location: plasma_register.php?signup=success");
    ?>