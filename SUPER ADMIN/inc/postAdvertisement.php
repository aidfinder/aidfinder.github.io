<div class="container-fluid">
    <div class="side-body">

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-9">
							<form method="post" enctype="multipart/form-data">
								<h3><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Post Advertisement</h3>
								<br/><br/>
								<?php $adverID=0;
				                  $query = $model->getAdverID();  
				                  if( $result = $model->fetch($query) ){
				                    $adverID=$result['max(advertisement_id)+1'];
				                   }else{
				                      $archiID=1;
				                   } ?>
				                <input type="hidden" name="adverID" value="<?php echo $adverID; ?>">
								<input name="imgss"type="file" required></span>
				                 <br/><br/>  
								<div class="form-group">
							      <label>Advertisement Title </label>&nbsp;&nbsp;<span style="color:red"> *</span>
							      <br/>
							      <input name="adTitle" type="text" class="form-control" required/>
							    </div>

							      <div class="form-group">
							      <label>Advertisement Details</label>&nbsp;&nbsp;<span style="color:red"> *</span>
							      <br/>
							      <textarea style="height:200px" name="adDetails"type="text" class="form-control" required></textarea>
							    </div>
								
								<?php if(isset($_POST['error']['exist'])){ ?>
		                        <div class="alert alert-warning">                            
		                          <strong>OOOPss!</strong> <?php echo $_POST['error']['exist']; ?>
		                        </div>
		                          <?php }else if(isset($_POST['ok'])){ ?>
		                        <div class="alert alert-success">                           
		                          <strong>Well done!</strong> <?php echo $_POST['ok']; ?>
		                      	</div>
		                   		<?php } ?>
								 <!--div class="x_content bs-example-popovers">
                                      <div style="display: none" class="alert alert-dismissible fade in" role="alert">
                                        <span class="message"></span>
                                      </div>
                                    </div-->
								<button name="addAdvertisement"type="submit" class="btn btn-success">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
								
							</div>
							
								
								
							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

