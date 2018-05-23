<div class="banner-bottom">
		<div class="container">
			<div class="mid_agile_bannner_top_info">
				<h2>Find Your Dream House Builder</h2>
				<div class="heading-underline">
					<div class="h-u1"></div>
					<div class="h-u2"></div>
					<div class="h-u3"></div>
					<div class="clearfix"></div>
				</div>
				<p>Everyone wants a comfortable home to stay. Something that matches their vision of their dream house becoming into a reality.</p>
			</div>
			<div class="col-md-6 agileits_banner_bottom_left">
				<h3>welcome to <span>A I D FINDER</span></h3>
				<p class="w3l_para">We are giving you the best options on choosing a builder. You could look at each of their reviews for partial evaluation.</p>
				<div class="w3l_social_icons">
					<div class="w3l_social_icon_grid">
						<div class="w3l_social_icon_gridl w3_facebook">
							<a href="#">
								<i class="fa fa-user" aria-hidden="true"></i>
							</a>
						</div>
						<div class="w3l_social_icon_gridr">
							<p>Architects<?php $countArch=0;
									?></p><p class="counter">
								<?php $query = $model->__list_Architect_count('Architect');  //FROM MODEL
							        if( $result = $model->fetch($query) ){$countArch=$result['count(builder_id)'];echo $countArch;}
								?>
							</p>
						</div>
						<div class="clearfix"> </div>
						<div class="w3l_social_icon_grid_pos">
							<label>-</label>
						</div>
					</div>
					<div class="w3l_social_icon_grid w3ls_social_icon_grid">
						<div class="w3l_social_icon_gridl w3_dribbble">
							<a href="#">
								<i class="fa fa-dribbble" aria-hidden="true"></i>
							</a>
						</div>
						<div class="w3l_social_icon_gridr">
							<p>I D</p><p class="counter">
								<?php 
									$queryd = $model->__list_Architect_count('Interior Designer');$countID=0;  //FROM MODEL
							        if( $resultd = $model->fetch($queryd) ){echo $countID=$resultd['count(builder_id)'];$countID;}
								?>
							</p>
						</div>
						<div class="clearfix"> </div>
						<div class="w3l_social_icon_grid_pos">
							<label>-</label>
						</div>
					</div>
					<div class="w3l_social_icon_grid">
						<div class="w3l_social_icon_gridl w3_instagram">
							<a href="#">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</div>
						<div class="w3l_social_icon_gridr">
							<p>Contractors</p><p class="counter">45,342</p>
						</div>
						<div class="clearfix"> </div>
						<div class="w3l_social_icon_grid_pos">
							<label>-</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 agileits_banner_bottom_right">
				<div class="w3ls_banner_bottom_right">
					<img src="images/2.jpg" alt=" " class="img-responsive" />
					<div class="w3ls_banner_bottom_right_pos">
						<img src="images/1.jpg" alt=" " class="img-responsive" />
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //banner-bottom -->

	<!-- banner-bottom-icons -->
	<div class="banner-bottom-icons">
		<div class="col-md-6 w3_banner_bottom_icons_left">

			<div class="w3_agile_banner_bottom">
				<a href="index.php?page=findArchitect" class="hvr-rectangle-out">
					<h5 class="grow">Find an Architect</h5>
					<img src="images/banner4.jpg" style="width:1680px;height:342px;" alt=" " class="img-responsive hvr-radial-in" />
				</a>
			</div>
		</div>
		<div class="col-md-6 w3_banner_bottom_icons_left">
			<div class="w3_agile_banner_bottom">
				<h5 class="grow">Find an Interior Designer</h5>
				<a href="index.php?page=findInterior" class="hvr-rectangle-out"><img src="images/banner2.jpg" alt=" " class="img-responsive hvr-radial-in" /></a>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!-- //banner-bottom-icons -->

	<div class="skills">
		<div class="container">
			<h3 class="tittle_agile_w3">Our Skills</h3>
			<div class="heading-underline">
				<div class="h-u1"></div>
				<div class="h-u2"></div>
				<div class="h-u3"></div>
				<div class="clearfix"></div>
			</div>
			<div class="why-choose-agile-grids-top">
				<div class="col-md-6 skills_img_agile">
					<h4>Modern business Template</h4>
					<p>Lorem ipsum magna, vehicula ut.Curabitur nec purus eget urna pulvinar placerat. Integer varius est vitae iaculis suscipit.
						Integer sed rutrum lectus.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit.</p>

					<div class="read">
						<a href="#" class="view resw3" data-toggle="modal" data-target="#myModal">Read More</a>
					</div>
				</div>
				<div class="col-md-6 services_bottom_grid_right">

					<div class='bar_group'>
						<div class='bar_group__bar thin elastic' label='Graphic Design' value='130'></div>
						<div class='bar_group__bar thin elastic' label='SEO' value='160'></div>
						<div class='bar_group__bar thin elastic' label='Web Development' value='180'></div>
						<div class='bar_group__bar thin elastic' label='Web Design' value='230'></div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- choose-us -->