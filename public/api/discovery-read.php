<?php
  include "koneksi.php";

  $id = $_POST['id'];
//   $id = '1';

  $query = "SELECT * FROM users, donation where users.id = donation.user_id AND users.id ='$id'";
// $query = "SELECT * FROM donation where donation.user_id ";	
  $hasil = mysqli_query($con, $query);
  if (mysqli_num_rows($hasil) > 0) {
  $response = array();
  $response["kursus"] = array();
  while ($data = mysqli_fetch_array($hasil)) {
	$h['donor_name'] = $data['donor_name'] ;
	$h['donor_email'] = $data['donor_email'] ;
	$h['donation_type'] = $data['donation_type'] ;
	$h['note'] = $data['note'] ;
	$h['status'] = $data['status'];
	$h['created_at'] = $data['created_at'];
	$h['amount'] = $data['amount'];

 	array_push($response["kursus"], $h);
  }
	$response["success"] = "1";
	echo json_encode($response);
  }else {
 	$response["success"] = "0";
 	$response["message"] = "Tidak ada data";
	echo json_encode($response);
  }
?>