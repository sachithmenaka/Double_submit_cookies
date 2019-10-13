<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CSRF Protection</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
  </head>
    
    <style>
        body{
            margin: 0;
            padding: 0;
            background: url(Gray-plain-website-background.jpg);
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }
        .loginbox{
            width: 320px;
            height: 420px;
            background: transparent;
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 70px 30px;
        }
        .avatar{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: -10%;
            left: calc(50% - 50px);
        }
        h1{
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
            color: darkblue;
        }
        .loginbox p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .loginbox input{
            width: 100%;
            margin-bottom: 20px;
        }
        .loginbox input[type="email"], input[type="password"]{
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .loginbox input[type="submit"]{
            border: none;
            outline: none;
            height: 40px;
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .loginbox input[type="submit"]:hover{
            cursor: pointer;
            background: green;
            color: #fff;
        }
    </style>
    
  <body>
    
    <div class="loginbox">
            <img src="avatars-profile-picture-5.png" class="avatar">
            <h1>Login Here</h1>
                      <form action='user-login.php' method='POST' enctype='multipart/form-data'>

                        
                          <label for="Email" class="col-sm-2 col-form-label">Email</label>
                          

                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">

                         

                        

                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          

                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                          

                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Login</button>

                      </form>
                    </div>
                
  </body>
</html>

<?php
	if(isset($_POST['submit'])){
		userlogin();
	}
?>

<?php

	function userlogin()
	{

		$user_email='user@gmail.com';
		$user_password='Password';


		$email_in = $_POST['email'];
		$password_in = $_POST['password'];


		if(($email_in == $user_email)&&($password_in == $user_password))
		{
			session_set_cookie_params(300);
			session_start();
			session_regenerate_id();


			setcookie('session_cookie', session_id(), time() + 300, '/');

			$_SESSION['CSRF_Token'] = generate_token();


			header("Location:user-profile.php");
   			exit;

		}
		else
		{
			echo "<script>alert('Invalid login, Please try again.')</script>";
		}


	}

function generate_token()
	{

	  return sha1(base64_encode(openssl_random_pseudo_bytes(30)));

	}


?>
