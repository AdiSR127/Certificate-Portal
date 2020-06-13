<?php
   $error = "";
    if(isset($_POST['msg']) && $_POST['msg']!=""){
        $error = $_POST['msg'];
    }
    if(isset($_GET['msg']) && $_GET['msg']!=""){
        $error = $_GET['msg'];
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>CSI Skill Hunt Certificate Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="validate.php" method="POST">
					<div class="login100-form-image">
					<img src="images/CSI Logo.png" alt="IMG" width="320px" height="120px" >
					
				   </div>
					<span class="login100-form-title">
						Certificate Generator
						<p style="color: blue; font-size:10px;">NOTE: Certificate Will Be Generated Only Once So Remember To Save it.
			                      Enter a valid Email ID and Your Proper Name which Has To Be Printed On Certificate.
								  </p>
					</span>
                    <div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
				    

					
					
					<tr class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" href="javascript:submit();" name="submit">
							Get Certificate
						</button>
						
						
                   </tr>
					<div style="color: red">
						<div  align="center"><?php echo $error ?></div>
				    </div>
					
					<div class="text-center p-t-136">
						<a class="txt2" href="javascript:alert('Give us a call or Drop a Message on Whatsapp At: +918941847380');">
							Facing Any Problem?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
