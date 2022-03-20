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
        <title>Profile</title>

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



                </style>

        </head>

        <body>



                <input id="button" type="button" value="Home Page" onclick="home()">
                <input id="button" type="button" value="My Profile" onclick="profile()">
                <input id="button" type="button" value="My Notifications" onclick="notification()">
                <input id="button" type="button" value="Payment History" onclick="payhistory()">

        <br><br>
        <div id="box" style="font-size: 20px;margin: 10px;">Welcome <?php echo $username?>
        <br><br>

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
                echo "Username : ".$row[$role[0].'_username'];
                ?><br><?php
                echo "Full Name : ".$row['Name'];
                ?><br><?php
                echo "Address : ".$row['Address'];
                ?><br><?php
                echo "District : ".$row['District'];
                ?><br><?php
                echo "Area : ".$row['Area'];
                ?><br><?php
                echo "Phone Number : +880".$row['Contact_no'];
            }
            }
        }
        catch(PDOException $ex){
            ?>
                <script>location.assign("login.php");</script>
            <?php
        }

        ?>

        <br>
        <br><br>

        <input id="button" type="button" value="Update Profile" onclick="update();">

        <input id="button" type="button" value="Click to Logout" onclick="logoutfn();">

        </div>


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
