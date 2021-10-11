<?php 
session_start();
require 'config.php';


if($_SESSION['admin']=='admin' && $_SESSION['password']=='admin'){

}
else{
  header('location:index.html');
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADD USER</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <style>
      .headerFont{
        font-family: 'Ubuntu', sans-serif;
        font-size: 24px;
      }

      .subFont{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        
      }
      
      .specialHead{
        font-family: 'Oswald', sans-serif;
      }

      .normalFont{
        font-family: 'Roboto Condensed', sans-serif;
      }
       .active, .btn:hover {
  color: white;
    </style>

  </head>
  <body>
  <?php
  require 'dbcon.php';



  if(isset($_POST['submit222'])){

    $name=$_POST['nname'];
    $details=$_POST['details'];
    $party=$_POST['party'];

 

    $insertquery="insert into tbl_users(full_name,email,voter_id) values('$name','$details','$party') ";
    $query= mysqli_query($con,$insertquery);

    if($query){
      ?>
      <script>
        alert('inserted successful!!!')
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
  }

?>
	
	<div class="container">
  	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="cpanel.php" class="navbar-brand headerFont text-lg"><strong>eVoting</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
          <li><a href="nomination.html"><span class="subFont active"><strong>Nomination's List</strong></span></a></li>
            <li><a href="userlist.php"><span class="subFont" ><strong>User List</strong></span></a></li>
        	-->
          </ul>
          

          <button type="submit" class="btn btn-success navbar-right navbar-btn"><span class="normalFont"><strong>Admin Panel</strong></span></button>
          <span>       </span>
        <button type="addnomine" name="submit" class="btn btn-success navbar-right navbar-btn"><span class="normalFont"><strong>Add Nomine</strong></button>
        </div>

      </div> <!-- end of container -->
    </nav>
    <BR>
    <BR>
    <BR>
    





<div class="container">
      
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="cpanel.php" class="navbar-brand headerFont text-lg"><strong>Online Voting</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            
             <li><a href="nomination.php"><span class="subFont"><strong>Nomination's List</strong></span></a></li>
            <li><a href="userlist.php"><span class="subFont"><strong>User's List</strong></span></a></li>

          
          </ul>
          
          
          <span class="normalFont"><a href="logout.php" class="btn btn-danger navbar-right navbar-btn"><strong>Sign Out</strong></a></span></button>
        </div>

      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
        <div class="col-sm-12" style="border:2px solid gray;">
          
          <div class="page-header">
            <h2 class="specialHead">Enter User Details.</h2>

          </div>
          
          <form action="" method="post">
          <div class="form-group">
            <label>Full Name:</label><br>
            
            <input type="text" name="nname"  title="Enter Your Full Name" placeholder="Enter Full Name" class="form-control" required/><br>

            <label>Email :</label><br>
            <input type="email" name="details" placeholder="Details here" class="form-control"/><br>

            <label>Voter ID :</label><br>
            <input type="number" name="party" placeholder="Party name" class="form-control"/><br>

          </div>
          <hr>
              <button type="submit" name="submit222" class="btn btn-primary"><strong>Submit</strong></button>
           
                 </form>
<br>
        </div>
      </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

