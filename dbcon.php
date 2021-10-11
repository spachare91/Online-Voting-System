<?php 

$con=mysqli_connect("localhost","root","","db_evoting");
if($con){
    ?>
    <?php
}
else{
    
        ?>
        <script>
        alert("connection failed");
        </script>
        <?php
    
}

?>