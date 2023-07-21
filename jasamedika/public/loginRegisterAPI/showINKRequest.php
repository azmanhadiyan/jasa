<?php 
requeire_once('connection.php');
$sql="SELECT * FROM i_n_k_s";
$r=mysqli_query($con,$sql);
$result=array();
$row=mysqli_fetch_array($r);
array_push($result, array(
	"sender"=>$row['sender'],
	"department"=>$row['department'],
	"building"=>$row['building']
));
echo json_encode(array('result'=>$result));
mysqli_close($con);
?>