<?php 
  $connect = mysqli_connect(
          'localhost', 
          'root', 
          'root', 
          'wnba' 
        );

        if(!$connect){
          echo "Connection Failed: " . mysqli_connect_error();
        }

?>