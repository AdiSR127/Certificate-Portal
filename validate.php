<?php

session_start();
require_once('./dbDet/db.php');
if(!isset($_POST['submit'])){
    header('Location:index.php?msg=Try Again!');
}
else{
    $name = $_POST['name'];
    strtoupper($name);
    $email = $_POST['email'];

        $query = "select id from nprint where email='$email'";
        if($result = mysqli_query($conn,$query)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $query = "delete from nprint where id='$id';";
                $query.="insert into print(name,email) values('$name','$email');";
                $_SESSION['name'] = $name;
                if(mysqli_multi_query($conn,$query)){
                    header("location:certificate.php");
                }
                }
                else{
                    header('location:index.php?msg=This Email ID is Not Registered!');
                }
            }
            else{
                header('location:index.php?msg=Database Error! Try again Later.');
            }
        }

?>