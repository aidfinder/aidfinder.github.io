<div class="agile_inner_banner_info">
	
  <h2>Interior Designer</h2> <h4 style="font-size:20pt;color:white;"><?php 
	$query = $model->archi_parameter($_GET['interior'],"Interior Designer");  
    if( $result = $model->fetch($query) ){
	?>
	<?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?>
	<?php } ?></h4>
  
</div>