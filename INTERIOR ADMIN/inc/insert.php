<?php
$connect=mysqli_connect("localhost", "root","","panday");
$output='';
$cost=mysqli_real_escape_string($connect,$_POST["cost"]);
$details=mysqli_real_escape_string($connect,$_POST["details"]);
if($_POST["build_serv_id"]!=''){	
	$query="UPDATE tbl_builder_services SET service_cost_rangefrom='$cost', builder_service_details='$details' where builder_service_id='".$_POST['builder_service_id']."'";
	$message='Data Updated';
}
if(mysqli_query($connect,$query)){
	$output.='<label class="text-success">Data Inserted</label>';
	$select_query="SELECT * FROM tbl_builder_services";
	$output.='
		<div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                
                <th>Action</th>
                <th>Service Tier</th> 
                <th>Cost</th> 
                <th>Details</th>
              </tr>
            </thead>

            <tbody>
	';
	while($row=mysqli_fetch_array($result)){
		$output.='
			<td>
                  <div class="btn-group">
                    <button type="button"class="btn btn-success btn-xs"><i class="icon-legal"></i></button>
                    <button type="button"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><input type="button" name="view" value="Edit" id="<?php echo $result['builder_service_id']; ?>" data-toggle="modal" class="btn btn-info btn-xs edit_data"/></li>
                      <li><a href="admin.php?page=editServiceRate&ide=<?php echo $result['builder_service_id']; ?>">Edit Cost & Details</a></li>
                    </ul>
                  </div>
                </td>
                
                <td>'.$row["name"].'</td> 
                <td></td> 
                <td></td> 

				'
	}
}	
?>