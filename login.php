<?php
session_start();

if(isset($_COOKIE['uname'])&&isset($_COOKIE['pass'])){
    $_SESSION['uname']=$_COOKIE['uname'];
    $_SESSION['pass']=$_COOKIE['pass'];
    header("location: index.php");
}

if(isset($_POST['submit'])){
    
    if(isset($_POST['Username'])&&isset($_POST['Password'])){
        
        include('conn.php');
        $uname=$_POST['Username'];
        $pass=$_POST['Password'];
  	    $query="SELECT * FROM `users` WHERE username='".$uname."'&& password='".$pass."'";
  	    $sql=mysqli_query($conn, $query);
            
          if ($sql->num_rows == 1) {
              
            if(isset($_POST['remember'])){
                
                setcookie('uname',$uname, time()+60*60*24*30);
                setcookie('pass', $pass, time()+60*60*24*30);
            }
            
                $_SESSION['uname'] = $uname;
                $_SESSION['pass'] = $pass;
                header("location: home.php");
        }
        else{
            echo "Invalid Details";
        }
    }
    else{
        echo "Enter All the fields";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login-ibridge</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="util.css">
	<link rel="stylesheet" type="text/css" href="main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="login.php" method="post">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="Username" id="uname">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" name="Password" id="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<input type="submit" value="LOGIN" class="login100-form-btn" name="submit">
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
</body>
</html>