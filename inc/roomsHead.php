<div class="agile_inner_banner_info">
   <h2>
   	<?php 	$roomtype='';
   		$query = $model->getRoomType($_GET['roomtype']);  //FROM MODEL
		if( $result = $model->fetch($query) ){ $roomtype=$result['descategory'];}
		echo $roomtype;
   	?>
   </h2>
   <!--p>Add Some Short Description</p-->
</div>