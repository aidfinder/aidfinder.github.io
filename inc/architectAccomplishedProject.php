<!-- /agile_inner_banner_info -->													
<div class="agile_inner_banner_info">
<h2>PROJECT </h2>
<p>Architect Accomplished Project</p>
</div>
<!-- //agile_inner_banner_info -->
<!-- events-top -->
	<div class="services">
	   <div class="container">	
	     	<h3 class="tittle_agile_w3">P R O J E C T S</h3>
		    <div class="heading-underline">
				<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
			</div>
			<ul class="portfolio_agile_info_w3ls">	
				
					<?php
			        $count=0;
			        $query = $model->__list_ArchitectAccomplishedProject();  //FROM MODEL
			        if( $result = $model->fetch($query) ){
			        do{
			        $count++;
			        ?> 
			        <li>
					<div class="agile_events_top_grid">
						<a href="#" data-toggle="modal" data-target="#myModalz<?php echo $result['accomp_id']; ?>">
						<div class="w3_agileits_evets_text_img">
							<!--a href="ARCHITECT ADMIN/accomplished_img/<?php echo $result['accomp_id']; ?>.jpg" width="512" height="384" img_attributes='width="100" height="100"' class="lsb-preview" data-lsb-group="header"-->
							
							<div class="view view-eighth" >
								<img alt=" " class="img-responsive" style="width:600px;height:300px" src="ARCHITECT ADMIN/accomplished_img/<?php echo $result['accomp_id']; ?>.jpg" />
								<div class="mask">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</div>
							</div>
							<!--/a-->
						</div>
						<div class="agileits_w3layouts_events_text port_info_agile">
							<h3><?php echo $result['accproj_title']; ?></h3>
						</div>
						</a>
					</div>
					</li>
					<?php 
			        }while($result = $model->fetch($query));
			        } 
			        ?>
				
			</ul>
	</div>
</div>
<!-- //events-top -->