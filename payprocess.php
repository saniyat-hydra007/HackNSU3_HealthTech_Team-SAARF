<?php
/*
step 1: to receive the email and password data from register.php
step 2: to store the data within the database
step 3: if data store is successful then forward to login.php
        else forward to register.php
*/

session_start();

if(
    isset($_SESSION['username'])
    && isset($_SESSION['role'])
    && !empty($_SESSION['username'])
    && !empty($_SESSION['role']))
    {

    $role = $_SESSION['role'];
    $username = $_SESSION['username'];


    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_POST['transaction'])

            && !empty($_POST['transaction'])
            )
            {

                $transaction = $_POST['transaction'];
                $total=$_POST['total'];


                    ///store the data to database
                try{
                    // PHP Data Object
                    $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket2;","root","");
                    ///setting 1 environment variable
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $cartquery="SELECT * FROM Buyer_Product
                        WHERE Buyerb_username = '$username'
                        GROUP BY Buyerb_username, Productp_id";

                        $returnobj=$conn->query($cartquery);
                        $returntable=$returnobj->fetchAll();

                        if($returnobj->rowCount() >= 1)
                        {

                        foreach($returntable as $row){

                            $name = $row[2];
                            $amount = $row[3];
                            $total = $row[4];
                            $pid = $row[1];
                            $f_username = null;

                            $cartquery1="SELECT farmerf_username FROM Product
                            WHERE p_id = $pid";

                            $returnobj1=$conn->query($cartquery1);
                            $returntable1=$returnobj1->fetchAll();

                            if($returnobj1->rowCount() == 1)
                            {
                                foreach($returntable1 as $row1){
                                    $f_username = $row1[0];
                                }
                            }

                            $paymentquery="INSERT INTO payment VALUES (NULL, $transaction, '$amount <br>$total Taka.' , 'On the Way', '".$username."', '".$f_username."', NOW(), $pid)";
                            echo $paymentquery;

                            //update home
                            $deletecart="DELETE FROM Buyer_Product WHERE Buyerb_username = '".$username."' AND Productp_id = $pid;";
                            echo $deletecart;
                            $msg = "Payment successfull for $amount $name total cost $total taka. <br>Check your payment history for more details.";
                            $msg1 = "Payment successfull for $amount $name total cost $total taka.";
                            $notifycart="INSERT INTO notification VALUES (NULL, '$msg', NOW(), '$f_username', '$username', '$msg1')";
                            echo $notifycart;

                            $conn->exec($paymentquery);
                            $conn->exec($deletecart);
                            $conn->exec($notifycart);


                        }
                    }


                    ?>
                    <script>alert("Payment Successful");</script>
                    <script>location.assign("payhistory.php");</script>
                    <?php


                }
                catch(PDOException $ex){
                    ?>
                        <script>alert("Database Error!");</script>
                        <!-- <script>location.assign("cart.php");</script> -->
                    <?php
                }

                }

                else{
                ///if email and password data is empty or not set
                /// register.php --> registeruser.php --> register.php
                ?>
                <script>alert("Fill up all required fields!");</script>
                <script>location.assign("home.php");</script>
                <?php

                }

            }
            else{
                ///if email and password data is empty or not set
                /// register.php --> registeruser.php --> register.php
                ?>
                <script>location.assign("home.php");</script>
                <?php

            }

    }

?>
