
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
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

    <form id="box" action="loginprocess.php" method="POST">

    <div style="font-size: 20px;margin: 10px;">Log In</div>

        <label for="username">Username</label>:
        <input class="text" type="text" id="username" name="username" placeholder="ex: anika">
        <br>
        <label for="mypass">Password</label>:
        <input class="text" type="password" id="mypass" name="mypass" placeholder="ex: abc123">
        <br>
        Are you a :
        <div>
        <input type="radio" name="role" value="buyer"> Buyer<br>
		<input type="radio" name="role" value="farmer"> Pharmacy<br>
		</div>
        <br>
        <input id="button" type="submit" value="Click to Login">
    </form>




    <form id="box" action="register.php" method="POST">
    <div style="font-size: 20px;margin: 10px;">Don't have an account?</div>

            <button id="button" type="submit">Sign Up</button>

    </form>

</body>

</html>
