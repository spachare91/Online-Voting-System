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
    <title>Nomination Panel</title>

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
      .leftt{
        margin-right:15px;
      }
    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
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
            
             <li><a href="nomination.html"><span class="subFont"><strong>Nomination's List</strong></span></a></li>
            <li><a href="userlist.php"><span class="subFont"><strong>User List</strong></span></a></li>

          
          </ul>
          <span class="normalFont"><a href="addnomine.php" class="btn btn-info navbar-right navbar-btn"><strong>ADD NOMINEE</strong></a></span></button>
          
         
          <span class="normalFont"><a href="logout.php" class="btn btn-danger navbar-right navbar-btn leftt"><strong>SIGN OUT</strong></a></span></button>
        </div>

      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
        <br>
        



      <?php    
        
        require 'dbcon.php';

        $selectquery="select * from tbl_nomine";
        $query=mysqli_query($con,$selectquery);

        while($result = mysqli_fetch_assoc($query)){

          ?>
                


          <div class="col-sm-3">
          <img src="<?php echo $result['src'] ?>" class="img img-thumbnail" style="width:200px;height:200px;" alt="">
          <h4 class="normalFont text-center"><?php echo $result['nname'] ?></h4>
          <h5 class="normalFont text-center">Details: <?php echo $result['details'] ?></h5>
          <h5 class="normalFont text-center">Party :<?php echo $result['party'] ?></h5>
          <hr>
          <a href="deleteccc.php?id=<?php echo $result['id'] ?>"><button type="button" name="delete" class="btn btn-danger">Delete</button></a>
          <a href="updatenominee.php?id=<?php echo $result['id'] ?>"><button type="button" name="delete" class="btn btn-success">Update</button></a>
        </div>










      <?php
        }
        ?>

      </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>