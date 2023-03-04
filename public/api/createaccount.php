<?php

include 'koneksi.php' ; 
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
// $no_telp = $_POST['no_telp'];


$Sql_Query = "insert into users (name,password,email) values ('$name','$password','$email')";
 
 if(mysqli_query($con,$Sql_Query)){
 
 echo 'Data Submit Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>