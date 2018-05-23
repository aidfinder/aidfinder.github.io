<div class="banner-bottom">
		<div class="container">
			<div class="mid_agile_bannner_top_info">
				<h2>Let’s made Your own Business</h2>
				<div class="heading-underline">
					<div class="h-u1"></div>
					<div class="h-u2"></div>
					<div class="h-u3"></div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner-bottom -->

	<!-- banner-bottom-icons -->
	<div class="banner-bottom-icons">
		<?php 
					$query = $model->all_interiorAccomplished();  
				    if( $result = $model->fetch($query) ){
				     	do{
				?>
		<div class="col-md-4 w3_banner_bottom_icons_left">

			<div class="w3_agile_banner_bottom">
				<a href="#" class="hvr-rectangle-out">
					<h5 class="grow"><?php echo $result['accproj_title']; ?></h5>
					<img src="INTERIOR ADMIN/interior_accomplished_img/<?php echo $result['ID_accomp_id']; ?>.jpg" style="width:1680px;height:300px;" alt=" " class="img-responsive hvr-radial-in" />
				</a>
			</div>
		</div>
				<?php 
				    	}while($result = $model->fetch($query));
					} 
				?>
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
	<div class="why-choose-agile">
		<div class="container">
			<h3 class="tittle_agile_w3 two">What We Do</h3>
			<div class="heading-underline">
				<div class="h-u1"></div>
				<div class="h-u2"></div>
				<div class="h-u3"></div>
				<div class="clearfix"></div>
			</div>
			<div class="why-choose-agile-grids-top">
				<div class="col-md-4 agileits-w3layouts-grid">
					<div class="wthree_agile_us">
						<div class="col-xs-3 agile-why-text">
							<div class="wthree_features_grid">
								<i class="fa fa-laptop" aria-hidden="true"></i>
							</div>
						</div>
						<div class="col-xs-9 agile-why-text">
							<h4>Responsive Layout </h4>
							<p>Lorem ipsum magna, vehicula ut.</p>
						</div>

						<div class="clearfix"> </div>
					</div>
					<div class="wthree_agile_us">
						<div class="col-xs-3 agile-why-text">
							<div class="wthree_features_grid">
								<i class="fa fa-globe" aria-hidden="true"></i>
							</div>
						</div>
						<div class="col-xs-9 agile-why-text">
							<h4>Web design</h4>
							<p>Lorem ipsum magna, vehicula ut.</p>
						</div>

						<div class="clearfix"> </div>
					</div>
					<div class="wthree_agile_us">
						<div class="col-xs-3 agile-why-text">
							<div class="wthree_features_grid">
								<i class="fa fa-life-ring" aria-hidden="true"></i>
							</div>
						</div>
						<div class="col-xs-9 agile-why-text">
							<h4>Support 24x7 </h4>
							<p>Lorem ipsum magna, vehicula ut.</p>
						</div>

						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 agileits-w3layouts-grid">
					<div class="wthree_agile_us">
						<div class="col-xs-3 agile-why-text">
							<div class="wthree_features_grid">
								<i class="fa fa-folder-open-o" aria-hidden="true"></i>
							</div>
						</div>
						<div class="col-xs-9 agile-why-text">
							<h4>Easy Customization</h4>
							<p>Lorem ipsum magna, vehicula ut.</p>
						</div>

						<div class="clearfix"> </div>
					</div>
					<div class="wthree_agile_us">
						<div class="col-xs-3 agile-why-text">
							<div class="wthree_features_grid">
								<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
							</div>
						</div>
						<div class="col-xs-9 agile-why-text">
							<h4>Creative Design </h4>
							<p>Lorem ipsum magna, vehicula ut.</p>
						</div>

						<div class="clearfix"> </div>
					</div>
					<div class="wthree_agile_us">
						<div class="col-xs-3 agile-why-text">
							<div class="wthree_features_grid">
								<i class="fa fa-users" aria-hidden="true"></i>
							</div>
						</div>
						<div class="col-xs-9 agile-why-text">
							<h4>Easy For Users</h4>
							<p>Lorem ipsum magna, vehicula ut.</p>
						</div>

						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 agileits-w3layouts-grid img">
					<img src="images/serve.png" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
	</div>
	</div>
	<!-- //choose-us -->

	<!-- News -->
	<div class="w3l-news-content events">
		<div class="container">
			<h3 class="tittle_agile_w3">Latest News</h3>
			<div class="heading-underline">
				<div class="h-u1"></div>
				<div class="h-u2"></div>
				<div class="h-u3"></div>
				<div class="clearfix"></div>
			</div>
			<div class="w3l-news_info_agile_its">
				<div class="col-md-6 w3l-news">
					<div class="media response-info">
						<div class="media-left response-text-left">
							<a href="#" data-toggle="modal" data-target="#myModal">
						<img class="media-object" src="images/n1.jpg" alt="">
					</a>
						</div>
						<div class="media-body response-text-right">
							<h5>Conse ctetur adipisi</h5>
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i>May 11, 2017</li>
								<li><i class="fa fa-users" aria-hidden="true"></i>Followers : 7685</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, Lorem ipsum Lorem ipsum.</p>
							<div class="read">
								<a href="single.html" class="view resw3">Read More</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="media response-info">
						<div class="media-left response-text-left">
							<a href="#" data-toggle="modal" data-target="#myModal">
						<img class="media-object" src="images/n2.jpg" alt="">
					</a>
						</div>
						<div class="media-body response-text-right">
							<h5>Dolor sit amet</h5>
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i>May 15, 2017</li>
								<li><i class="fa fa-users" aria-hidden="true"></i>Followers : 2546</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, Lorem ipsum Lorem ipsum.</p>
							<div class="read">
								<a href="single.html" class="view resw3">Read More</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="media response-info">
						<div class="media-left response-text-left">
							<a href="#" data-toggle="modal" data-target="#myModal">
						<img class="media-object" src="images/n3.jpg" alt="">
					</a>
						</div>
						<div class="media-body response-text-right">
							<h5>Sit Lorem ipsum</h5>
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i>May 17, 2017</li>
								<li><i class="fa fa-users" aria-hidden="true"></i>Followers : 7485</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, Lorem ipsum Lorem ipsum.</p>
							<div class="read">
								<a href="single.html" class="view resw3">Read More</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 wthree_events_grid_right">
					<div class="wthree_events_grid_right1">
						<h3>News Letter</h3>
						<p>Never Miss Any Update From Us!</p>
						<div class="w3layouts_newsletter_right">
							<form action="#" method="post">
								<input type="email" name="Email" placeholder="Email..." required="">
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>