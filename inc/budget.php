<style type="text/css">
  #slidecontainer {
    width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
    -webkit-appearance: none;  /* Override default CSS styles */
    appearance: none;
    width: 100%; /* Full-width */
    height: 25px; /* Specified height */
    background: #d3d3d3; /* Grey background */
    outline: none; /* Remove outline */
    opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
    -webkit-transition: .2s; /* 0.2 seconds transition on hover */
    transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
    opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use webkit (Chrome, Opera, Safari, Edge) and moz (Firefox) to override default look) */ 
.slider::-webkit-slider-thumb {
    -webkit-appearance: none; /* Override default look */
    appearance: none;
    width: 25px; /* Set a specific slider handle width */
    height: 25px; /* Slider handle height */
    background: #4CAF50; /* Green background */
    cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
    width: 25px; /* Set a specific slider handle width */
    height: 25px; /* Slider handle height */
    background: #4CAF50; /* Green background */
    cursor: pointer; /* Cursor on hover */
}
</style>

<form method="post">
<br/><br/><br/>
<!-- about-bottom -->
  <h3 class="tittle_agile_w3">Define Your Budget</h3>
  <div class="heading-underline">
  <div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
  </div>
  <br/>

  <div class="about-bottom">
    <input id="address"name="address" data-toggle="tooltip" data-placement="right" title="Address" style="font-family:Century Gothic;width: 100%;font-size:8pt;" type="hidden" class="form-control ttip"/>
    <input style="font-family:Century Gothic;width: 10%" type="hidden" class="form-control" id="us2-radius" />
    <input type="hidden" id="latitude"class="form-control" style="width: 250px" name="architect_latitude"/>
    <input type="hidden" id="longitude"class="form-control" style="width: 250px" name="architect_longitude"/>
    <br/>
    <div class="col-md-6 w3l_about_bottom_left">
      <div class="panel-group w3l_panel_group_faq" id="accordions" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOnes">
            <h4 class="panel-title asd">
                <div class="well">
                  <label style="font-size:12pt;float:left;color:#02a68d;">Your Budget *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
                  <div id="slidecontainer">
                    <input type="range" min="1000" max="3000000" value="10000" class="slider" name="myRange" id="myRange">
                    <p>Value: <span id="demo"></span></p>
                  </div>
                </div>
                <div class="well">
                  <label style="font-size:12pt;float:left;color:#02a68d;">Service Tier *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br/><br/>
                  <select name="spec" id="spec" style="width:100%;height:45px;" onchange="submitBudget()">
                    <option>Select Service Tier</option>
                    <?php $querkd = $model->tier();
                        if( $quer2ks = $model->fetch($querkd) ){
                          do{ ?>
                            <option value="<?php echo $quer2ks['tier_id']; ?>"><?php echo $quer2ks['tier_name']; ?></option>
                          <?php 
                            }while($quer2ks = mysql_fetch_assoc($querkd)); 
                          } 
                        ?>
                  </select>
                </div>
                
                <?php $querkd = $model->tier();
                    if( $quer2ks = $model->fetch($querkd) ){
                      do{ 
                  ?>
                <div class="well">
                  <p><label style="font-size:12pt;float:left;color:#02a68d;"><?php echo $quer2ks['tier_name']; ?></label></p>
                  <br/><br/>
                  <p><span class="glyphicon glyphicon-check"></span>Basic Services</p>
                  <?php $que = $model->tier_services($quer2ks['tier_id']);
                    if( $quer = $model->fetch($que) ){
                      do{ 
                  ?>
                        <p><span class="glyphicon glyphicon-check"></span><?php echo $quer['service_type']; ?></p>
                    <?php 
                        }while($quer = mysql_fetch_assoc($que)); 
                      } 
                    ?>
                    
                </div>
                <?php 
                    }while($quer2ks = mysql_fetch_assoc($querkd)); 
                  } 
                ?>
                <br/><br/>
            </h4>
          </div>
        </div>
      </div>
      <br/><br/>
    </div>
    <div class="col-md-6 w3l_about_bottom_right">
       
      <?php 
        if(!isset($_GET['service'])){ ?>
          <h3 class="tittle_agile_w3 why">Architects</h3>
            <div class="heading-underline">
            <div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
          </div>
      <?php
          $querkd = $model->__list_Architect();
          if( $quer2ks = $model->fetch($querkd) ){
          do{
        ?>
          <div class="col-md-3">
            <img alt=" " class="img-responsive" style="width:70px;height:70px;border:1px solid #02a68d;border-radius:3px;" src="architect pictures/<?php echo $quer2ks['builder_id']; ?>.jpg" />
          </div>
          <div class="well col-md-9">
              <b><?php echo ucwords($quer2ks['b_username']); ?></b><br/>
              <b>Expertise :</b> <br/><br/>
              <a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>
            </div>
        
        <?php }while($quer2ks = mysql_fetch_assoc($querkd)); ?><?php } 
          }else{ ?>
              <h3 class="tittle_agile_w3 why">Here are the Suggested Architects for your Budget</h3>
                <div class="heading-underline">
                <div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
              </div>
              <div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
        $serv=0;$serv=$_GET['service'];$budg=0;$budg=$_GET['myRange'];
            $querkd = $model->__recommend_Architect($_GET['service'],$_GET['myRange']);
            if( $quer2ks = $model->fetch($querkd) ){ 
            do{
        ?>
            
              <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne<?php echo $quer2ks['builder_id']; ?>">
                <h4 class="panel-title asd">
                <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $quer2ks['builder_id']; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $quer2ks['builder_id']; ?>">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>
                  <?php echo ucwords($quer2ks['b_username']); ?>
                </a>
                </h4>
              </div>
              <div id="collapseOne<?php echo $quer2ks['builder_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $quer2ks['builder_id']; ?>">
                <div class="panel-body panel_text">
                  <img alt=" " class="img-responsive" style="width:70px;height:70px;border:1px solid #02a68d;" src="architect pictures/<?php echo $quer2ks['builder_id']; ?>.jpg" />
                <i class="glyphicon glyphicon-search"> </i>&nbsp;&nbsp;<i> Expertise : </i><?php echo ucwords($quer2ks['expertise']); ?><br/>
              <i class="glyphicon glyphicon-list"> </i>&nbsp;&nbsp;<i> Accomplished Project : </i>
                <?php 
                  $queryq = $model->count_architect_accomplished($quer2ks['builder_id']);  
                    if( $resultq = $model->fetch($queryq) ){ 
                      echo $resultq['count(accomp_id)'];
                    }
                ?>
              <br/>
              <i class="glyphicon glyphicon-list"> </i>&nbsp;&nbsp;<i> Design Ideas : </i>
              <?php 
                $queryq = $model->count_architect_design($quer2ks['builder_id']);  
                if( $resultq = $model->fetch($queryq) ){ 
                  echo $resultq['count(design_id)'];
                } 
              ?>
              <br/>
              <?php if(!isset($_SESSION['userlogged'])){ ?>
                <a class="view resw3" href="#" data-toggle="modal" data-target="#myModal2">Read More</a>
              <?php }else{ ?>
                <a class="view resw3" href="index.php?page=archi_page&architect=<?php echo $quer2ks['builder_id']; ?>" >Read More</a>
              <?php } ?>
                </div>
              </div>
              </div>
            

        <?php }while($quer2ks = mysql_fetch_assoc($querkd)); } } ?>

        </div>
    </div>
    <div class="clearfix"> </div>
  </div>
<!-- //about-bottom -->   



  </form> 
  <br/><br/><br/>
<!-- //icons -->  


<script type="text/javascript">
  var slider = document.getElementById("myRange");

  var output = document.getElementById("demo");
  output.innerHTML = slider.value; // Display the default slider value

  // Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
      output.innerHTML = this.value;
  }

</script>
<script type="text/javascript">
  function submitBudget(){
      var spec=document.getElementById("spec").value;
      var myRange=document.getElementById("myRange").value;
      document.location.href="index.php?page=budget&service="+spec+"&myRange="+myRange
  }
</script>
  
