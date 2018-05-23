<?php
$conn = new mysqli("localhost","root","","blog_samples");

$sql="UPDATE tbl_clientproject SET dummy_status=1 WHERE status=0";	
$result=mysqli_query($conn, $sql);

$sql="select * from tbl_clientproject ORDER BY clientproject_id DESC limit 5";
$result=mysqli_query($conn, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["subject"] . "</div>" . 
	"<div class='notification-comment'>" . $row["comment"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>