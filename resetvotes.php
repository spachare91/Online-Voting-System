<?php 
session_start();
require 'config.php';


if($_SESSION['admin']=='admin' && $_SESSION['password']=='admin'){

}
else{
  header('location:index.html');
}


?>

<?php

include 'dbcon.php';


$updatequery="update tbl_users set voted_for='NONE'" ;
$query=mysqli_query($con,$updatequery);

if($query){
  ?>
  <script>
    alert('RESER successful!!!')
  </script>
  <?php
  header('location:userlist.php');

}
else{
  ?>
  <script>
    alert('error')
  </script>
  <?php
}



 ?>
