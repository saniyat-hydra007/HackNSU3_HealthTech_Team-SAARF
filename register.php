<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Register</title>

        <style>

            body {
            background-color: lightblue;
            }

            .text{

            height: 20px;
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

        <form id="box" action="registeruser.php" method="POST">

          <div style="font-size: 20px;margin: 10px;">Sign Up</div>

              <label for="username">Username</label>:
              <input class="text" type="text" id="username" name="username" placeholder="ex: anika">
              <br>
              <label for="mypass">Password</label>:
              <input class="text" type="password" id="mypass" name="mypass" placeholder="ex: abc123">
              <br>
              <label for="myname">Full Name</label>:
              <input class="text" type="text" id="myname" name="myname" placeholder="ex: Anika Khaer">
              <br>
              <label for="addrees">Address</label>:
              <input class="text" type="text" id="address" name="address" placeholder="ex: 4th Floor, House 21">
              <br>
              <label for="contact">Contact No</label>:
              <input class="text" type="number" id="contact" name="contact" placeholder="ex: 01*********">
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

            <div>
            Are you a :
            <br>
            <input id="text" type="radio" name="role" value="buyer"> Buyer<br>
			<input id="text" type="radio" name="role" value="farmer"> Farmer<br>
		    </Are>
            <br>
            <input id="button" type="submit" value="Click to Register">

        </form>

        <br><br>

        <input id="button" type='button' value="Back to login" onclick="login();">

        <script>
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

            function login(){
                location.assign('login.php');
            }


        </script>



    </body>
</html>
