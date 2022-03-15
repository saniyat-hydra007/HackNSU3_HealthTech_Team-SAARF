<?php
session_start();
if(
    isset($_SESSION['username'])
    && isset($_SESSION['role'])
    && !empty($_SESSION['username'])
    && !empty($_SESSION['role'])
)
{
    $role = $_SESSION['role'];
    $username = $_SESSION['username'];
    ?>

    <!DOCTYPE html>

    <html lang="en">
        <head>
        <title>Cart</title>

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
                            width: 130px;
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
        <div style="font-size: 20px;margin: 10px;">Welcome <?php echo $username?> </div>
        <br><br>



        <div style="font-size: 20px;margin: 10px;">All Product List</div>

        <?php $total = 0; ?>

                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Total Cost</th>
                                <th>Remove Item</th>
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
                                $cartquery="SELECT * FROM Buyer_Product WHERE Buyerb_username = '$username'";

                                $returnobj=$conn->query($cartquery);
                                $returntable=$returnobj->fetchAll();


                                if($returnobj->rowCount()==0){
                                    ?>
                                        <tr>
                                            <td colspan="5">No values found</td>
                                        <tr>
                                    <?php
                                }
                                else{
                                    foreach($returntable as $row){
                                        ?>

                                        <tr>
                                            <td><?php echo $row[1] ?></td>
                                            <td><?php echo $row[2] ?></td>
                                            <td><?php echo $row[3] ?></td>
                                            <td><?php echo $row[4]." Taka" ?></td>
                                            <td>
                                                <br>
                                                <?php
                                                if ($row[5] == 1)
                                                {?>
                                                    <input id="button" type="button" value="Not Removable" onclick="">
                                                <?php
                                                }
                                                else{?>
                                                    <input id="button" type="button" value="Remove item" onclick="removeitem(<?php echo $row[1]?>, <?php echo $row[3]?>);">
                                                <?php
                                                }
                                                ?>

                                                <br><br>
                                            </td>
                                        </tr>
                                        <?php

                                        $total += $row[4];
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


                    <div id="box" style="font-size: 20px;margin: 10px;">
                <br>

                <?php

                try{
                    // PHP Data Object
                    $conn=new PDO("mysql:host=localhost:3306;dbname=eMarket2;","root","");
                    ///setting 1 environment variable
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    ///executing mysql quer


                    // $signupquery="SELECT b.buyer_acc_no, f.farmer_acc_no, f.f_username
                    //         FROM
                    //         Buyer as b
                    //         JOIN Buyer_Product as bp
                    //         ON bp.Buyerb_username = b.b_username
                    //         JOIN Product as p
                    //         ON p.p_id = bp.Productp_id
                    //         JOIN farmer as f
                    //         ON f.f_username = p.farmerf_username

                    //     WHERE b.b_username = '".$username."' && bp.Productp_id = 2";     // && bp.Productp_id = 2 selling to only one farmer


                  

                ?>

                <form action="paycart.php" method="GET">

                <br>

                <label for="mypass">Total Amount</label>:
                <input class="text" type="text" id="mypass" name="total" value="<?php echo $total; ?>" readonly>
                <br>

                <br><br>

                <input id="button" type="submit" value="Pay Now">

                </form>




<?php


                }
                catch(PDOException $ex){
                    ?>
                        <script>location.assign("cart.php");</script>
                    <?php
                }

                ?>

        <br>





        <input id="button" type="button" value="Click to Logout" onclick="logoutfn();">



        <br>

        <script>
                    function home(){
                        location.assign('home.php');   ///default GET method
                    }

                    function profile(){
                        location.assign('profile.php');   ///default GET method
                    }
                    function logoutfn(){
                        location.assign('logout.php');   ///default GET method
                    }

                    function update(){
                        location.assign('updateprofile.php');   ///default GET method
                    }

                    function notification(){
                        location.assign('notification.php');
                    }

                    function removeitem(pid, quantity){
                        location.assign('removeitem.php?prodid='+pid+'&Quantity='+quantity);
                    }

                    function payhistory(){
                        location.assign('payhistory.php');
                    }

        </script>



        </body>
    </html>

    <?php
}
else
{
    ?>
            <script>location.assign("login.php");</script>
    <?php
}

?>
