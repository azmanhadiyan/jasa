<?php
session_start();
include 'connection.php';
$uid = $_POST['username']; 
$pwd = $_POST['password'];
$sql = "SELECT * FROM users WHERE username='".mysqli_real_escape_string($con, $uid)."'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
	$response=array();
	if (password_verify($pwd, $row['password'])) {
		array_push($response, array(
			'status'=>'OK'
		));
	} else {
		array_push($response, array(
			'status'=>'FAILED'
		));
	}
} else {
	array_push($response, array(
		'status'=>'FAILED'
	));
}

echo json_encode(array("server_response"=>$response));
mysqli_close($close);
?>