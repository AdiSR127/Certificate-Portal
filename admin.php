<?php
   ob_start();
   session_start();
   if((isset($_SESSION['valid'])) && ($_SESSION['valid'])){
	echo "<script>location.href='statall.php'</script>";
}
else{
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
	<title>Certificate Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/LC logo small.png"/>
<!--===============================================================================================-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.15.2/css/all.css">
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

      
      
      <style>
        body {
  margin: 0;
  padding: 0;
  background-color: #4d94ff;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #0066ff;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  padding: 3px;
  color: white ;
}
footer a:hover {
    text-decoration: none;
}
      </style>
      
   </head>
	
   <body>
      
      <div class = "container form-signin">
         
         <?php
           require_once('./dbDet/db.php');
            
            if (isset($_POST['submit']) and !empty($_POST['email']) 
               and !empty($_POST['password'])) {
                $email = $_POST['email'];
                $query = "select * from admin where email = '$email'";
                $result = mysqli_query($conn,$query);
                $nums = mysqli_num_rows($result);
                $res = mysqli_fetch_array($result);
                if($nums>0){
               if ($_POST['email'] ==  $res['email'] and 
                  md5($_POST['password']) == $res['pass']) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['password'] = '1234';
                  echo '<script type="text/javascript"> window.open("statall.php","_self");</script>';
                  
               }else{
                  $error = 'Wrong password';
               }
            }
            else{
            $error = 'Wrong user';
            }
            }
        }
         ?>
      </div> <!-- /container -->


      <div id="login">
        <h3 class="text-center text-white pt-5">Admin Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="admin.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="email" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div>
                                <p class="text-danger text-center"><?php echo $error; ?></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <footer>
       <p class="text-center text-light"><b>Copyright &#169; 2021 • Designed By <a  class="text-warning" target="_blank" href="https://www.linkedin.com/in/aditya-s-b29ab0120/">Aditya Singh</a></b> </b></p>
    </footer>
   </body>
</html>