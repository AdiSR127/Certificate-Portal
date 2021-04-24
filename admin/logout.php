<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["valid"]);
   echo "<script>location.href='../admin.php?msg=Logout Successfully!';</script>";
?>