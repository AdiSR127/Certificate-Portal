<?php 
session_start();

if((!isset($_SESSION['valid'])) && (!$_SESSION['valid'])){
	echo "<script>location.href='admin.php?msg= Login First!';</script>";
}
else{
	$msg = "";
	 if(isset($_POST['msg']) && $_POST['msg']!=""){
		 $msg = $_POST['msg'];
	 }
	 if(isset($_GET['msg']) && $_GET['msg']!=""){
		 $msg = $_GET['msg'];
	 }
require_once('./dbDet/db.php');
$email="";
$name="";
if(isset($_POST['option'])){
	if($_POST['option']=='Delete'){
		$id = $_POST['id'];
		$query = "DELETE FROM nprint WHERE id = $id";
		if(mysqli_query($conn,$query)){ ?>
		     
			<form id="now" action="statall.php" method="POST">
                            <input name="email" type="hidden" value='<?php echo $_POST['email'] ?>'>
							<input name="name" type="hidden" value='<?php echo $_POST['name'] ?>'>
		    </form>
			<script>
			alert("Certificate Deleted!");
			document.getElementById("now").submit();
			</script>;
			<?php
		}
	}
	if($_POST['option']=='NoCopy'){
		$id = $_POST['id'];
		$query = "UPDATE nprint SET printed=0,time=0 WHERE id='$id'";
		if(mysqli_query($conn,$query)){
			?>
			<form id="now" action="statall.php" method="POST">
                            <input name="email" type="hidden" value='<?php echo $_POST['email'] ?>'>
							<input name="name" type="hidden" value='<?php echo $_POST['name'] ?>'>
		    </form>
			<script>
			alert("Print Data Erased!");
			document.getElementById("now").submit();
			</script>;
			<?php
		}
	}
	if($_POST['option']=='NoCopyAll'){
		$query = "UPDATE nprint SET printed=0,time=0 where printed>0";
		if(mysqli_query($conn,$query)){
			?>
			<form id="now" action="statall.php" method="POST">
		    </form>
			<script>
			alert("All Print Data Erased!");
			document.getElementById("now").submit();
			</script>;
			<?php
		}
	}
	if($_POST['option']=='Delall'){
		$email = $_POST['email'];
		$query = "DELETE FROM nprint WHERE email = '$email'";
		if(mysqli_query($conn,$query)){ ?>
			<form id="now" action="statall.php" method="POST">
		    </form>
			<script>
			alert("Record Deleted!");
			document.getElementById("now").submit();
			</script>;
			<?php
		}
	}
	


}

if(isset($_POST['add'])){
		$email= $_POST['email'];
        $name= $_POST['name'];
		$post= $_POST['post'];
		$event= $_POST['event'];
		$q = "SELECT * FROM nprint where (email = '$email' AND name= '$name' AND post= '$post' AND event= '$event')";
		$r = mysqli_query($conn,$q);
		$no = mysqli_num_rows($r); 
		if($no==0){
		$query = "INSERT INTO `nprint` (`id`, `name`, `post`, `event`, `email`, `printed`) VALUES (NULL, '$name', '$post', '$event', '$email', 0)";
		if(mysqli_query($conn,$query)){
			?>
			<form id="now" action="statall.php" method="POST">
                            <input name="email" type="hidden" value='<?php echo $email ?>'>
							<input name="name" type="hidden" value='<?php echo $name ?>'>
		    </form>
			<script>
			alert("New Certificate Created!");
			document.getElementById("now").submit();
			</script>;
			<?php
	    }
       }
	   else{
		   ?>
		<form id="now" action="statall.php" method="POST">
		<input name="email" type="hidden" value='<?php echo $email ?>'>
		<input name="name" type="hidden" value='<?php echo $name ?>'>
		</form>
		<script>
		alert("Certificate Already Exist!");
		document.getElementById("now").submit();
		</script>;
		<?php 
	   }
}

if(isset($_POST['editmain'])){
	$olde = $_POST['oemail'];
	$newe = $_POST['nemail'];
	$newn = $_POST['nname'];
	$q = "SELECT name, email FROM nprint where email = '$olde'";
	$r = mysqli_query($conn,$q);
	$no = mysqli_num_rows($r); 
	if( $no != 0){
	if(mysqli_query($conn,$q)){
	$q = "UPDATE nprint SET email = '$newe', name = '$newn' where email = '$olde'";
	if(mysqli_query($conn,$q)){
		?>
		<form id="now" action="statall.php" method="POST">
		</form>
		<script>
		alert("Details Updated!");
		document.getElementById("now").submit();
		</script>
		<?php
	}
}
}
}

if(isset($_POST['adminch']) && $_POST['npwd'] != ''){
	$pwd = md5($_POST['npwd']);
	$query = "UPDATE admin SET pass='$pwd'";
    if(mysqli_query($conn,$query)){
		?>
		<form id="now" action="statall.php" method="POST">
		</form>
		<script>
		alert("Admin Password Changed!");
		document.getElementById("now").submit();
		</script>
		<?php
	}
}


if(isset($_POST['editmag'])){
	$nid = $_POST['nid'];
	$newe = $_POST['nemail'];
	$newn = $_POST['nname'];
	$newp = $_POST['npost'];
	$newev = $_POST['nevent'];
	$q = "UPDATE nprint SET post = '$newp', event = '$newev' where id = '$nid'";
	if(mysqli_query($conn,$q)){
		?>
		<form id="now" action="statall.php" method="POST">
		<input name="email" type="hidden" value='<?php echo $newe ?>'>
		<input name="name" type="hidden" value='<?php echo $newn ?>'>
		</form>
		<script>
		alert("Details Updated!");
		document.getElementById("now").submit();
		</script>
		<?php
	}
}

if(isset($_POST['email']) && isset($_POST['name'])){
	$email= $_POST['email'];
    $name= $_POST['name'];
}

	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.15.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="./css/admin.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>

<body class="hero-image">
		<nav class="navbar navbar-light" style="background-color: #e4f834;">
            <a class="navbar-brand" href="/">
                <img src="./images/LC logo mid.png" width="120" height="60" alt="">
            </a>
			</nav>
			
        <section>
		<div class="container-fluid ">
		<div class="float-right">
        <?php include './admin/addcerti.php'; ?>
		<?php include './admin/chadmin.php'; ?>
		<button type="button" onclick="window.location.href='./admin/logout.php';" class="btn btn-danger">Logout</button>
		</div>
		<h2 class="mt-5"><a href="/statall.php" class="nounderline text-dark"><i class="fas fa-lock"></i><b> Admin</b> Dashboard</a> </h2>
		<hr class="mb-5">
		


<?php

if(!isset($_POST['email'])){
	    include './admin/main.php';
	}else{
		include './admin/manage.php';
	}
			
?>
            
</div>
</section>
</div>
<datalist id='eventlist'>
    <option value='Documentation'>
    <option value='PR'>
    <option value='Design'>
    <option value='Activity'>
    <option value='Resource'>
    <option value='Executive'>
    <option value='Advisory'>
</datalist>
<datalist id='postlist'>
    <option value='Member'>
    <option value='Organising Member'>
    <option value='Head'>
    <option value='Co-Head'>
    <option value='Overall Head'>
    <option value='Overall Co-Head'>
</datalist>
<?php include './admin/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
<?php  }?>