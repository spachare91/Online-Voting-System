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

$id=$_GET['id'];

$deletequery="delete from tbl_nomine where id='$id' " ;
$query=mysqli_query($con,$deletequery);

if($query){
  ?>
  <script>
    alert('deleted successful!!!')
  </script>
  <?php
  header('location:nomination.php');

}
else{
  ?>
  <script>
    alert('error')
  </script>
  <?php
}



 ?>
