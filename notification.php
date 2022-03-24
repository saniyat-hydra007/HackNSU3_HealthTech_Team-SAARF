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



                <br>
                <br>


                <div style="font-size: 20px;margin: 10px;">Welcome
                <?php
                    echo $username;
                ?></div>


                <br>
                <br>

                <div>
                <div style="font-size: 20px;margin: 10px;">All My Notifications</div>

                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>Datetime</th>
                                <th>Notification</th>
                                <?php
                                if ($role != 'farmer')
                                {
                                    ?><th>Pharmacy Name</th>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <th>Buyer Name</th>
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
                                $mysqlquery="SELECT * FROM notification WHERE ".$role.$role[0]."_username = '$username' ORDER BY notify_datetime DESC";



                                $returnobj=$conn->query($mysqlquery);
                                $returntable=$returnobj->fetchAll();


                                if($returnobj->rowCount()==0){
                                    ?>
                                        <tr>
                                            <td colspan="3">No values found</td>
                                        <tr>
                                    <?php
                                }
                                else{
                                    foreach($returntable as $row){
                                        ?>

                                        <tr>
                                            <td> Hello <?php echo $row[2] ?></td>


                                            <td>
                                            <?php
                                                if ($role=='farmer')
                                                {
                                                    ?><?php echo $row[5] ?>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <?php echo $row[1] ?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($role != 'farmer')
                                                {
                                                    ?><?php echo $row[3] ?>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <?php echo $row[4] ?>
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
                                        <td colspan="3">No values found</td>
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
                    function logoutfn(){
                        location.assign('logout.php');   ///default GET method
                    }

                    function home(){
                        location.assign('home.php');   ///default GET method
                    }

                    function profile(){
                        location.assign('profile.php');   ///default GET method
                    }

                    function uploadfn(){
                        location.assign('upload.php');
                    }

                    function deletefn(pid){
                        ///for multiple values: file.php?varname=value&var1=value1
                        location.assign('delete.php?prodid='+pid);
                    }

                    function notification(){
                        location.assign('notification.php');
                    }

                    function payhistory(){
                        location.assign('payhistory.php');
                    }


                </script>


            </body>
        </html>

    <?php
}
else{
     ?>
        <script>alert("give farmer name!");</script>
        <script>location.assign("home.php");</script>
    <?php
}


?>
