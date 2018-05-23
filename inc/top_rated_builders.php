<div class="services">
		<div class="container">
			<div class="col-md-8 event-left w3-agile-event-left" >
				<?php     $countpa=1;
	                $querys = $model->orderby_rating_avg($_GET['builder']); 
	                  if( $results = $model->fetch($querys) ){
	                    do{ 
	              ?>
					<div class="event-left1 w3-agile-event-left1">
						<div class="col-xs-3 event-left1-left agile-event-left1-left" >
							<?php if(isset($_SESSION['userlogged'])){ ?>
								<a href="index.php?page=archi_page&architect=<?php echo $results['builder_id']; ?>">
							<?php }else{ ?>
								<a href="#" data-toggle="modal" data-target="#myModal2">
							<?php } ?>
								<img src="architect pictures/<?php echo $results['builder_id']; ?>.jpg" alt=" " class="img-responsive" style="height:180px;width:100%;border:2px solid #979494;" /></a>

							<div class="event-left1-left-pos agileits-w3layouts-event-left1-left-pos">
								<ul>
									<li><a href="#"><?php if($results['AVG(t.rate)']>=4&$results['AVG(t.rate)']<5){ ?>
			                      <p><img src="rate_pics/4.png" alt="post Image" style="height:35px; width:160px;"></p>
			                    <?php }else if($results['AVG(t.rate)']>=3&$results['AVG(t.rate)']<4){ ?>
			                      <p><img src="rate_pics/3.png" alt="post Image" style="height:35px; width:160px;"></p>
			                    <?php }else if($results['AVG(t.rate)']>=2&$results['AVG(t.rate)']<3){ ?>
			                      <p><img src="rate_pics/2.png" alt="post Image" style="height:35px; width:160px;"></p>
			                    <?php }else if($results['AVG(t.rate)']>=1&$results['AVG(t.rate)']<2){ ?>
			                      <p><img src="rate_pics/1.png" alt="post Image" style="height:35px; width:160px;"></p>
			                    <?php }else if($results['AVG(t.rate)']==5){ ?>
			                      <p><img src="rate_pics/5.png" alt="post Image" style="height:35px; width:160px;"></p>
			                    <?php } ?></a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-6 event-left1-right w3-agileits-event-left1-right">
							
							<h5>
								<?php if(isset($_SESSION['userlogged'])){ ?>
								<a href="index.php?page=archi_page&architect=<?php echo $results['builder_id']; ?>"><?php echo ucwords($results['b_username']); ?>
								</a>
								<?php }else{ ?>
									<a href="#" data-toggle="modal" data-target="#myModal2"><?php echo ucwords($results['b_username']); ?>
									</a>
								<?php } ?>
							</h5>
							
								<i class="fa fa-user"> </i>&nbsp;&nbsp;<span> Expertise : </span>
								<?php 
					              	$querying = $model->getExpertise($result['expertise_id']);  
											    if( $resulting = $model->fetch($querying) ){
					              	echo $resulting['expertise']; }
					              ?>
								<br/><br/>
				              <i class="fa fa-home"> </i>&nbsp;&nbsp;<span> Accomplished Project : </span>
				                <?php 
				                  $queryq = $model->count_architect_accomplished($results['builder_id']);  
				                    if( $resultq = $model->fetch($queryq) ){ 
				                      echo $resultq['count(accomp_id)'];
				                    }
				                ?>
				              <br/><br/>
				              <i class="fa fa-eye"> </i>&nbsp;&nbsp;<span> Design Ideas : </span>
				              <?php 
				                $queryq = $model->count_architect_design($results['builder_id']);  
				                if( $resultq = $model->fetch($queryq) ){ 
				                  echo $resultq['count(design_id)'];
				                } 
				              ?>
							
						</div>
						<div class="clearfix"> </div>
					</div>

				<?php }while($results = $model->fetch($querys)); } ?>
				<nav class="paging1 agileits-w3layouts-paging1">
				  <ul class="pagination paging w3-agileits-paging">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>

						<li><a href="#">1</a></li>

					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
			<div class="col-md-4 event-right wthree-event-right">
				<!--img src="architect pictures/1.jpg" alt=" " class="img-responsive" style="height:180px;width:100%;" />
				<div class="event-right1 agileinfo-event-right1">
					<div class="search1 agileits-search1">
						<form action="#" method="post">
							<input type="search" name="Search" placeholder="Search here..." required="">
							<input type="submit" value="Send">
						</form>
					</div>
					<!--div class="categories w3ls-categories">
						<h3>Categories</h3>
						<ul>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">At vero eos et accusamus iusto</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Sed ut perspiciatis unde omnis</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Accusantium doloremque lauda</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Vel illum qui dolorem fugiat quo</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Quis autem vel eum reprehenderit</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Neque porro quisquam est qui</a></li>
						</ul>
					</div>
					<div class="posts w3l-posts">
						<h3>Our Events</h3>
						<div class="posts-grids w3-posts-grids">
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><img src="images/1.jpg" alt=" " class="img-responsive" /></a>
								</div>
								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="single.html">Sed ut perspiciatis unde omnis iste natus</a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i>10/5/2017</li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><img src="images/6.jpg" alt=" " class="img-responsive" /></a>
								</div>
								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="single.html">Neque porro quisquam qui dolorem</a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i>12/5/2017</li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><img src="images/7.jpg" alt=" " class="img-responsive" /></a>
								</div>
								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="single.html">Nemo enim ipsam voluptatem quia</a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i>13/5/2017</li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html">Admin</a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="tags tags1 w3layouts-tags">
						<h3>Recent Tags</h3>
						<ul>
							<li><a href="single.html">Designs</a></li>
							<li><a href="single.html">Growth</a></li>
							<li><a href="single.html">Latest</a></li>
							<li><a href="single.html">Price</a></li>
							<li><a href="single.html">Tools</a></li>
							<li><a href="single.html">Agile</a></li>
							<li><a href="single.html">Category</a></li>
							<li><a href="single.html">Themes</a></li>
							<li><a href="single.html">Growth</a></li>
							<li><a href="single.html">Agile</a></li>
							<li><a href="single.html">Price</a></li>
							<li><a href="single.html">Tools</a></li>
							<li><a href="single.html">Business</a></li>
							<li><a href="single.html">Category</a></li>
						</ul>
					</div>
				</div-->
				<div class="tags tags1 w3layouts-tags">
						<h3>Categories</h3>
						<ul>
							<?php $query = $model->all_designcategory();  //FROM MODEL
							    if( $result = $model->fetch($query) ){
							        do{ ?>
								<li><a href="single.html"><?php echo $result['descategory']; ?></a></li>
							<?php 
						        }while($result = $model->fetch($query));
						        } 
							?>
						</ul>
					</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>