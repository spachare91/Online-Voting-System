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
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
            <li><a href="userlist.php"><span class="subFont"><strong>User's List</strong></span></a></li>

          
          </ul>
          
          
          <span class="normalFont"><a href="logout.php" class="btn btn-danger navbar-right navbar-btn"><strong>Sign Out</strong></a></span></button>
        </div>

      </div> <!-- end of container -->
    </nav>
    <?php 
    require 'dbcon.php';
    
    
    if(isset($_POST['xupdatestatus'])){

      $status=$_POST['xstatus'];
  
   
  
      $insertquery="update tbl_admin set status='$status' where aid=1";
      $query= mysqli_query($con,$insertquery);
  
      if($query){
        ?>
   
        <?php
        
  
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



    <div class="container" style="padding:100px;">
      <div class="row">
        <div class="col-sm-12" style="border:2px solid gray;">
        <form action="" method="post">
          <?php 
          require 'dbcon.php';
          
          $selectquery="select * from tbl_admin";
          $query= mysqli_query($con,$selectquery);
          while($result=mysqli_fetch_assoc($query)){
            if($result['status']=='on'){
              //on button
              ?>
              <div class="radio">
              <label for="">
                <input type="radio" name="xstatus" value="on" checked="checked"> <strong>ON</strong>
              </label><br>
              <label for="">
                <input type="radio" name="xstatus" value="off"> <strong>OFF</strong>
              </label><br>

              <button type="submit" name="xupdatestatus" class="btn btn-primary"><strong>Update Status</strong></button>


    
        </div>

        <?php

            }
            else{
              //off button
              ?>
              <div class="radio">
              <label for="">
                <input type="radio" name="xstatus" value="on" > <strong>ON</strong>
              </label><br>
              <label for="">
                <input type="radio" name="xstatus" value="off" checked="checked"> <strong>OFF</strong>
              </label><br>

              <button type="submit" name="xupdatestatus" class="btn btn-primary"><strong>Update Status</strong></button>


    
        </div>
        <?php

            }
          }

          
          ?>

   
          
        </form>
            
          <div class="page-header">
          <h1 STYLE="text-align:center"><b>ADMIN PANEL</b></h1>
            <h2 class="specialHead">LIVE STANDINGS</h2>
            <p class="normalFont">Here you can see live standings of ongoing election</p>
          </div>
          
          <div class="col-sm-12">
            <?php
             require 'dbcon.php';

 
            
            
              
              

              $TMC=0;


              $conn = mysqli_connect($hostname, $username, $password, $database);
              if(!$conn)
              {
                echo "Error While Connecting.";
              }
              else
              {

                $selectquery="select * from tbl_nomine";
                $runquery=mysqli_query($conn,$selectquery);

                while($resrun=mysqli_fetch_array($runquery)){

                  
                  $xyz=$resrun['party'];
                  echo "<h4><strong>$xyz</strong></h4>";
                  echo "<br>";

                  $sql = "select * from tbl_users where voted_for='$xyz'";
                    if ($result=mysqli_query($conn,$sql)) {

                        $rowcount=mysqli_num_rows($result);
                        echo "Total Votes : ".$rowcount; 
                        echo "<br>";
                        echo "<br>";
                        $TMC=$TMC+$rowcount;
                    }

                    $ans=$rowcount * 10;

                    echo "
                    <div class='progress'>
                      <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$ans."%'>
                        <span class='sr-only'>TMC</span>
                      </div>
                    </div>
                    ";



    
              
                }
   

             


               echo "<hr>";

                $total=0;

                // Total
                $sql ="SELECT * FROM tbl_users";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                  while($row= mysqli_fetch_assoc($result))
                  {
                    if($row['voted_for'])
                      $total++;
                  }


                  $tptal= $total*10;

                  echo "<strong>Total People Voted:</strong><br>";
                  
                  echo "
                  <div class='text-primary'>
                    <h3 class='normalFont'>VOTED : $TMC </h3>
                  </div>
                  ";
                  

                  echo "<strong>Total People In database :</strong><br>";
                  echo "
                  <div class='text-primary'>
                    <h3 class='normalFont'>TOTAL : $total </h3>
                  </div>
                  ";
                }

              }
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
