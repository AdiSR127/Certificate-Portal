
   <?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
require_once('./dbDet/db.php');
if(!isset($_POST['submit']) && !isset($_POST['email'])){
     echo "<script>location.href='index.php?msg= Login First!';</script>";
} else{
    $email = $_POST['email'];

		$query = "select * from nprint where email = '$email'";
        $result = mysqli_query($conn,$query);
		$nums = mysqli_num_rows($result);
		if($nums==0){
		    echo "<script>location.href='index.php?msg= No Certificates Found!';</script>";
		}
        ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
	<link rel="icon" type="image/png" href="images/LC logo small.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.15.2/css/all.css">
</head>
<style>
	.hero-image {
  background-image: url();
  background-color: #f7ffe6;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  height: 100%;
}
@media (min-width: 991px){
	.container-fluid{
	  width: 80%;
	  margin-left: auto;
	}
  margin-right: auto;
	}
	@media (max-width: 992px) {
		.container-fluid: 100%;
	 }
</style>

        
        <body class="hero-image">
		<nav class="navbar navbar-light" style="background-color: #e4f834;">
            <a class="navbar-brand" href="/">
                <img src="images/LC logo mid.png" width="120" height="60" alt="">
            </a>
			</nav>
        <section>
		
		<?php  
		$i=1;  
        while($res = mysqli_fetch_array($result)){
			if($i==1){
			?>
			       <div class="container-fluid ">
			           	
					<h2 class="text-left mt-5"><i class="fas fa-medal"></i><b> Certificate</b> Dashboard</h2>
					<hr>
					<div class="alert alert-primary text-center mx-auto" role="alert">
					  <h3><b>Welcome </b> <?php echo $res['name'] ?> !</h3>
		              You can access your certificates of the session 2020-21 from the menu given below.
					</div>
					<div class="table-responsive">
					<table class="table table-light" bordercolor="#e4f834">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Event/Team</th>
						<th scope="col">Post</th>
						<th scope="col">Options</th>
						</tr>
					</thead>
					<tbody>
			       <tr>
		<?php }	?>   
					<th scope="row"><?php echo $i ?></th>
					<td><?php echo $res['event'] ?></td>
					<td><?php echo $res['post'] ?></td>
					<td>
					<form action="certificate.php" method="POST" target="_blank">
                            <input name="name" type="hidden" value='<?php echo $res['name'] ?>'>
                            <input name="event" type="hidden" value='<?php echo $res['event'] ?>'>
							<input name="post" type="hidden" value='<?php echo $res['post'] ?>'>
							<input name="id" type="hidden" value='<?php echo $res['id'] ?>'>
							<input name="admin" type="hidden" value=''>
							<div class="btn-group btn-group-sm">
							<button type="submit" name="req" value="Download" title="Download" class="btn btn-primary"><i class="fas fa-download"></i></button>
							<button type="submit" name="req" value="View" title="View" class="btn btn-secondary"><i class="fas fa-eye"></i></button>
							</div>
		            </form>
				    </td>
					</tr>
     
            <?php $i++;
        }
}
?>
            
			</tbody>
</table>
  </div>
</section>
	<div class="text-center">
	    <small > <strong><i class="fas fa-info-circle"></i></strong>  Your download or view count and time will be noted for the record.</small>
    </div>
<div class="text-center mt-4">
<a class="txt2" target="_blank" href="https://api.whatsapp.com/send/?phone=%2B918941847380&text=Hi There! I have to report a missing or incorrect certificate in the LC Certificate Generation Portal 2021. Kindly help me out!">
Any missing or incorrect certificate?
</a>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>