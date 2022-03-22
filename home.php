<?php

session_start();

if(
    isset($_SESSION['username'])
    && isset($_SESSION['role'])
    && !empty($_SESSION['username'])
    && !empty($_SESSION['role'])
){
    ///already logged in user
    $role = $_SESSION['role'];
    $username = $_SESSION['username'];

    ?>
        <!DOCTYPE html>

        <html lang="en">
            <head>
                <meta charset="utf-8">
                <title>Home</title>

                <style>

                body {
                        background-color: lightblue;
                    }

                .text{

                            height: 25px;
                            border-radius: 5px;
                            padding: 2px;
                            border: solid thin #aaa;
                            width: 90%;
                        }


                        #button{

                            padding: 10px;
                            width: 120px;
                            color: white;
                            background-color: FireBrick;
                            border: none;
                        }

                        #box{

                            background-color: AliceBlue;
                            margin: auto;
                            width: 300px;
                            padding: 20px;
                        }


                    #ptable{
                        width: 100%;
                        border: 1px solid blue;
                        border-collapse: collapse;
                    }

                    #ptable th, #ptable td{
                        border: 1px solid blue;
                        border-collapse: collapse;
                        text-align: center;
                    }

                    #ptable tr:hover{
                        background-color: bisque;
                    }
                </style>

            </head>

            <body>

                <input id="button" type="button" value="Home Page" onclick="home()">
                <input id="button" type="button" value="My Profile" onclick="profile()">
                <input id="button" type="button" value="My Notifications" onclick="notification()">
                <input id="button" type="button" value="Payment History" onclick="payhistory()">
                <br><br>



                <br>
                <br>

                <form id="box" action="farmers.php" method="GET">

                <div style="font-size: 20px;margin: 10px;">Welcome
                <?php

                try{
                    // PHP Data Object
                    $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket2;","root","");
                    ///setting 1 environment variable
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    ///executing mysql query
                    $signupquery="SELECT * FROM ".$role." WHERE ".$role[0]."_username = '".$username."'";


                    $returnobj = $conn->query($signupquery);
                    $returntable = $returnobj->fetchAll();

                    if($returnobj->rowCount() == 1)
                    {
                        foreach($returntable as $row){
                        ?><br><?php
                        echo $row['Name'];
                    }
                    }
                }
                catch(PDOException $ex){
                    ?>
                        <script>location.assign("login.php");</script>
                    <?php
                }

                ?></div>

                    <input class="text" type="search" id="search" name="search" placeholder="Product/Pharmacy">
                    <br><br>
                    <select class="text" id="choose" name="choose">
                    <option value="product">Product</option>
                    <option value="farmer">Pharmacy</option>
                    </select>
                    <br><br>
                    <input id="button" type="submit" value="Search">

                </form>

                <br>
                <br>

                <?php

                if($role == 'farmer'){
                    ?>
                    <input id="button" type="button" value="My Products" onclick="myproduct();">
                    <?php
                }
                else{
                    ?>
                    <input id="button" type="button" value="My Cart" onclick="cart()">
                <?php
                }
                ?>



                <div>
                <div style="font-size: 20px;margin: 10px;">All Products</div>

                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Available Quantity</th>
                                <th>Unit Price</th>
                                <th>Unit</th>
                                <th>Added On</th>
                                <th>Pharmacy Name</th>
                                <?php if($role != 'farmer'){
                                                    ?>
                                                     <th>Action</th>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                     <th>Action</th>
                                                    <?php
                                                }
                                                ?>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            try{
                                ///PDO = PHP Data Object
                                $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket2;","root","");
                                ///setting 1 environment variable
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                ///mysql query string
                                $mysqlquery="SELECT * FROM product";

                                $returnobj=$conn->query($mysqlquery);
                                $returntable=$returnobj->fetchAll();




                                if($returnobj->rowCount()==0){
                                    ?>
                                        <tr>
                                            <td colspan="8">No Products Found</td>
                                        <tr>
                                    <?php
                                }


                                else{
                                    foreach($returntable as $row){
                                        ?>

                                        <tr>
                                            <td><?php echo $row['p_id'] ?></td>
                                            <td><?php echo $row['productName'] ?></td>
                                            <td>
                                                <img src="<?php echo $row['productImage'] ?>" width="150" height="150">
                                            </td>
                                            <td><?php echo $row['AvailableQuantity'] ?></td>
                                            <td><?php echo $row['Price_perUnit']." taka" ?></td>
                                            <td><?php echo $row['Unit'] ?></td>
                                            <td><?php echo $row['Added_date'] ?></td>
                                            <td><?php echo $row['farmerf_username'] ?></td>

                                            <td>

                                                <?php if($role != 'farmer'){
                                                    ?>
                                                    <input id="button" type="button" value="Add to Cart" onclick="gotocart(<?php echo $row['p_id']?>, <?php echo $row['AvailableQuantity']?>);">
                                                    <?php
                                                }

                                                ?>


                                            </td>
                                        </tr>

                                        <?php
                                    }
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="6">No values found</td>
                                    <tr>
                                <?php
                            }


                            ?>

                        </tbody>
                    </table>
                </div>

                <br>
                <input id="button" type="button" value="Click to Logout" onclick="logoutfn();">

                <script>
                    function home(){
                        location.assign('home.php');   ///default GET method
                    }
                    function logoutfn(){
                        location.assign('logout.php');   ///default GET method
                    }

                    function profile(){
                        location.assign('profile.php');   ///default GET method
                    }

                    function uploadfn(){
                        location.assign('upload.php');
                    }

                    function cart(){
                        location.assign('cart.php');
                    }

                    function deletefn(pid){

                        location.assign('delete.php?prodid='+pid);
                    }

                    function gotocart(pid, high){
                        var amount = prompt("Enter the amount: ");
                        if (amount != "" && amount <= high){
                            location.assign('gotoCart.php?prodid='+pid+'&amount='+amount+'&high='+high);
                        }
                        else{
                            alert("Please enter a value less than "+high);
                        }
                    }

                    function notification(){
                        location.assign('notification.php');
                    }

                    function payhistory(){
                        location.assign('payhistory.php');
                    }

                    function myproduct()
                    {
                        location.assign('myproduct.php');
                    }

                    function product_entry(){
                location.assign('product_entry.php');
              }


                </script>


            </body>
        </html>

    <?php
}
else{
     ?>
        <script>alert("Please Login!");</script>
        <script>location.assign("login.php");</script>
    <?php
}


?>
