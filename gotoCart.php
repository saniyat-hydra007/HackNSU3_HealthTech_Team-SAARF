<?php

session_start();
if(
    isset($_SESSION['username'])
    && isset($_SESSION['role'])
    && !empty($_SESSION['username'])
    && !empty($_SESSION['role'])
){


        $username = $_SESSION['username'];      

        $product_id=$_GET['prodid'];
        $amount=$_GET['amount'];
        $high=$_GET['high'];

   
        
        try{
            ///PDO = PHP Data Object
            $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket2;","root","");
            ///setting 1 environment variable
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            ///executing mysql query
            $signupquery="SELECT f.f_username, p.Price_perUnit, p.productName FROM farmer as f
                            JOIN product as p
                            ON p.farmerf_username = f.f_username
                            WHERE p.p_id = ".$product_id;

            echo $signupquery;


        
            $returnobj = $conn->query($signupquery);
            
            $returntable = $returnobj->fetchAll();


            if($returnobj->rowCount() == 1)
            {
                foreach($returntable as $row){
                ?><br><?php
                $fusername = $row[0];
                echo $fusername;
                ?><br><?php
                $perUnit = $row[1];
                echo $perUnit;
                ?><br><?php
                $product = $row[2];
                echo $product;
                ?><br><?php
            }
            }

            
            ///mysql query string
            $mysqlquerystring="INSERT INTO Buyer_Product VALUES ('$username', $product_id, '$product', $amount, $amount*$perUnit, 0)";

            $msg1 = "$product added to your cart. <br>Please check your cart and complete the payment.";
            $msg2 = "$product is sold. <br>Check your product list.";


            $mynotification="INSERT INTO notification VALUES (NULL, '$msg1', NOW(), '$fusername', '$username', '$msg2')";

            $newquery = "UPDATE Product SET Quantity = $high-$amount, AvailableQuantity = $high-$amount WHERE p_id = '$product_id'";

            echo $mysqlquerystring;
            echo $mynotification;

            $conn->exec($mysqlquerystring);
            $conn->exec($mynotification);
            $conn->exec($newquery);
            
            ?>
                 <script>location.assign("cart.php");</script>
             <?php
        }
        catch(PDOException $ex){
            echo "hi pdo"
            ?>
            <script> alert("This product is already in Cart.");
                location.assign("home.php");</script>
            <?php
        }
        
   


   
}
else{
    ?>
        <script>location.assign("login.php");</script>
    <?php 
}

?>