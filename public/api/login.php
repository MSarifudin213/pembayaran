<?php
  include "koneksi.php";
  $email = $_GET['email'];
  $password = $_GET['password'];
//   $username = 'masrud';
//   $password = 'masrud';
  $query = "select * from users where email='$email' and password='$password' ";
  $hasil = mysqli_query($con, $query);
  if (mysqli_num_rows($hasil) > 0) {
    $response = array();
    $response["login"] = array();
    while ($data = mysqli_fetch_array($hasil)) {
        
	      $h['email'] = $data['email'] ;
        $h['password'] = $data['password'];
        $h['name'] = $data['name'] ;
        $h['id'] = $data['id'] ;
       array_push($response["login"], $h);
    }
	$response["success"] = "1";
	echo json_encode($response);
  }else {
   	$response["success"] = "0";
   	$response["message"] = "Tidak ada data";
  	echo json_encode($response);
  }
?>
