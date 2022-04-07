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
        <title>Update Profile</title>
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

        <br>
        <div id="box"style="font-size: 20px;margin: 10px;">Welcome <?php echo $username?>





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
                ?>


                <form action="profileprocess.php" method="POST">
                <br>

                <label for="myname">Name</label>:
                <input class="text" type="text" id="myname" name="myname" value="<?php echo $row['Name'];?>">

                <br>

                <label for="oldpass">Old Password</label>:
                <input class="text" type="password" id="oldpass" name="oldpass" placeholder="Enter Old Password">

                <br>

                <label for="mypass">New Password</label>:
                <input class="text" type="password" id="mypass" name="mypass" placeholder="Enter New Password">

                <br>

                <label for="addrees">Address</label>:
                <input class="text" type="text" id="address" name="address" value="<?php echo $row['Address'];?>">

                <br>

                <label for="contact">Contact No</label>:
                <input class="text" type="number" id="contact" name="contact" value="<?php echo "0".$row['Contact_no'];?>">

                <br>

                <label for="district">District</label>:
                <select class="text" id="input" name="district" onchange="selectArea()">
                    <option selected="selected" value="">Select District</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Khulna">Khulna</option>
                </select>

                <br>
                <div>
                <label for="area">Area</label>:
                <select class="text" name="area" id="output">
                    <option selected="selected" value="">Select Area</option>
                </select>
                </div>

                <br>


                <input id="button" type="submit" value="Save Changes">

                </form>

                <?php

            }
            }
        }
        catch(PDOException $ex){
            ?>
                <script>location.assign("login.php");</script>
            <?php
        }

        ?>
        </div>

        <br>
        <input id="button" type="button" value="Delete Account" onclick="deletefn();">


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
                    function deletefn(){
                        ///for multiple values: file.php?varname=value&var1=value1
                        location.assign('deleteprofile.php');
                    }
                    function selectArea(){
                        var a=document.getElementById("input").value;
                        if(a === "Dhaka")
                        {
                            var arr=["Mohammadpur","Mirpur","Badda", ];
                        }
                        else if(a === "Chittagong")
                        {
                            var arr=["Pahartali","Chawk Bazar", "Patenga"];
                        }
                        else if(a === "Rajshahi")
                        {
                            var arr=["Shaheb Bazar","Chhota Banagram", "Shiroil"];
                        }
                        else if(a === "Sylhet")
                        {
                            var arr=["coming soon"];
                        }
                        else if(a === "Khulna")
                        {
                            var arr=["coming soon"];
                        }

                        var string="";

                        for(i=0;i<arr.length;i++)
                        {
                            string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
                        }
                        document.getElementById("output").innerHTML=string;
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
