<?php
$con = mysqli_connect("localhost","root","","project");
if(!$con){
    echo "Connection Failed!" . mysqli_connect_error();
}
?>