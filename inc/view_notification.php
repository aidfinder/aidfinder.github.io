<?php
$conn = new mysqli("localhost","root","","panday");


$sql="UPDATE tbl_clientproject SET dummy_status=1 WHERE dummy_status=0";	
$result=mysqli_query($conn, $sql);
if(!empty($response)) {
	print $response;
}


?>