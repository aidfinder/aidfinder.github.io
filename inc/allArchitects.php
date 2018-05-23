<!-- /agile_inner_banner_info -->													
<div class="agile_inner_banner_info">
<h2>A R C H I T E C T S' L I S T</h2>

</div>
<!-- //agile_inner_banner_info -->
<!-- events-top -->
	<div class="services">
	   <div class="container">	
	     	<h3 class="tittle_agile_w3">A R C H I T E C T S</h3>
		    <div class="heading-underline">
				<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
			</div>
			<ul class="portfolio_agile_info_w3ls">	
				
					<?php
			        $count=0;$totalPages=0;
			        $query = $model->__list_Architect_count('Architect');  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        	$count=$result['count(builder_id)'];
			        	$totalPages=ceil($count/6);
			        }  
			         // Check that the page number is set.
					if(!isset($_GET['pages'])){
					    $_GET['pages'] = 0;
					}else{
					    // Convert the page number to an integer
					    $_GET['pages'] = (int)$_GET['pages'];
					}

					// If the page number is less than 1, make it 1.
					if($_GET['pages'] < 1){
					    $_GET['pages'] = 1;
					    // Check that the page is below the last page
					}else if($_GET['pages'] > $totalPages){
					    $_GET['pages'] = $totalPages;
					}
					$startArticle=0;

					$startArticle = ($_GET['pages'] - 1) * 6;

			        $query = $model->__list_Architect_limit($startArticle,6,'Architect');  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
			        <li>
					<div class="agile_events_top_grid">
						<?php if(!isset($_SESSION['userlogged'])){?>
							<a class="active" href="#" data-toggle="modal" data-target="#myModal2">
						<?php }else{ ?>	
							<a href="#" data-toggle="modal" data-target="#myModalArch<?php echo $result['builder_id']; ?>">
						<?php } ?>
						<div class="w3_agileits_evets_text_img">
							<!--a href="ARCHITECT ADMIN/accomplished_img/<?php echo $result['accomp_id']; ?>.jpg" width="512" height="384" img_attributes='width="100" height="100"' class="lsb-preview" data-lsb-group="header"-->
							
								<div class="view view-eighth" >
									<img alt=" " class="img-responsive" style="width:600px;height:300px" src="architect pictures/<?php echo $result['builder_id']; ?>.jpg" />
									
									<div class="mask">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</div>
								</div>
							<!--/a-->
						</div>
						<div class="agileits_w3layouts_events_text port_info_agile">
							<h3><?php echo ucwords($result['b_username']); ?></h3>
						</div>
						</a>
					</div>
					</li>
					<?php 
			        }while($result = $model->fetch($query));
			        } 

			       
			        ?>
				
			</ul>
			<center>			
			<nav>
				<ul class="pagination pagination-lg">
					<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
					<?php
						foreach(range(1, $totalPages) as $page){
							if($page == $_GET['pages']){ ?>

							<li class="active"><a href="#"><?php echo $page; ?> <span class="sr-only">(current)</span></a></li>

					<?php   }else if($page == 1 || $page == $totalPages || ($page >= $_GET['pages'] - 2 && $page <= $_GET['pages'] + 2)){
					?>
							<li><a href="index.php?page=<?php echo $_GET['page']; ?>&pages=<?php echo $page; ?>"><?php echo $page; ?></a></li>
						<?php 
							} 
						} 
					?>
					<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				</ul>
			</nav>
			</center>

	</div>
</div>
<!-- //events-top -->