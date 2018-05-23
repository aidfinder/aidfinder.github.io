<?php
$connect=mysqli("localhost", "root","","panday");
if(isset($_POST["build_serv_id"]{
  $query = "SELECT * FROM tbl_builder_services bs, tbl_builder b, tbl_tier t where bs.tier_id=t.tier_id and b.builder_id=bs.builder_id and bs.builder_id='".$_POST['build_serv_id']."'";
  $result=mysqli($connect,$query);
  $row=mysqli($connect,$query)
 	echo json_encode($row);
 	
}
	
?>