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
    <title>Control Panel</title>

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
}
.leftt{
        margin-right:15px;
      }
    </style>
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
            
             <li><a href="nomination.php"><span class="subFont"><strong>Nomination's List</strong></span></a></li>
            <li><a href="userlist.php"><span class="subFont active" ><strong>User List</strong></span></a></li>

          
          </ul>
          <span class="normalFont"><a href="adduser.php" class="btn btn-info navbar-right navbar-btn"><strong>ADD USER</strong></a></span></button>
          
          <span class="normalFont"><a href="resetvotes.php" class="btn btn-danger navbar-right navbar-btn leftt"><strong>RESET VOTES</strong></a></span></button>
          
          
          
          <span class="normalFont"><a href="logout.php" class="btn btn-danger navbar-right navbar-btn leftt"><strong>Sign Out</strong></a></span></button>
        </div>

      </div> <!-- end of container -->
    </nav>
    <br>
    <br>
    <br>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<h1>CANDIDATES VOTED FOR ELECTIONS</h1>
<BR>
    <div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">EMAIL</th>
            <th scope="col">VOTER ID</th>
            <th scope="col">VOTED FOR</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>

        <?php    
        require 'dbcon.php';
        

        $selectquery="select * from tbl_users";
        $query=mysqli_query($con,$selectquery);

        while($result = mysqli_fetch_assoc($query)){

          ?>
                
          <td><?php echo $result['id'] ?></th>
          <td><?php echo $result['full_name'] ?></td>
          <td><?php echo $result['email'] ?></td>
          <td><?php echo $result['voter_id'] ?></td>
          <td><?php echo $result['voted_for'] ?> </td>
          <td><a href="delete.php?id=<?php echo $result['id'] ?>"><button type="button" name="delete" class="btn btn-danger">Delete</button></a> </td>


        </tr>
      <?php
        }
        ?>
      </table>
    </div>
  </div>
</div>
  </body>
</html>















