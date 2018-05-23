<?php 
if(isset($_POST["view"]))
{
	$connect = mysqli_connect("localhost","root", "", "panday");
	$query = "SELECT * FROM tbl_clientproject";
	$result=mysqli_query($connect, $query);
	$output='';
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<li>
					<a href="#">
						<strong>'.$row["project_title"].'</strong><br/>
						<small><em>'.$row["project_title"].'</em></small>
					</a>
				</li>
			';
		}
	}else
	{
		$output .= '
		<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>
		'
	}
	$query_1 = "SELECT * FROM tbl_clientproject where dummy_status=0";
	$result_1=mysqli_query($connect, $query_1);
	$count = mysqli_num_rows($result_1);
	$data = array(
		'notification' => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
}
?>