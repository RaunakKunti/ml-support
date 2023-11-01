<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "mlsupport";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo '<div class="alert alert-danger my-0" role="alert">
    <h4 class="alert-heading">Error!</h4>
    <p>Some server side error occured from our side. We are trying to fix this issue</p>
    <hr>
    <p class="mb-0">Pleaase try aagain laater</p>
  </div>';
}
?>