<?php 
    if(!isset($_SESSION['user_ulogged'])){
?>
<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">

        <div class="breadcrumbs">
                <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Carpenter</span>
            </div> 

        <div class="row-fluid">
            <!--Edit Main Content Area here-->
                <div class="span8" id="divMain">

                    <h1>List of Carpenters</h1>
                    <hr>                    
                    <p><strong>There are many variations of passages of Lorem Ipsum available.</strong></p>                                 
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. 
                                         
              
            <div class="row-fluid">     
                <div class="span2">                           
                    <img src="images/services-image-4.jpg" class="img-polaroid" style="margin:5px 0px 15px;" alt="">   </div>          
                <div class="span10">              
                    <p>Lorem ipsum dolor sit amet, consectetueradipiscing elied diam nonummy nibh euisod tincidunt ut laoreet dolore magna aliquam erat volutpatorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>       
            </div>
             
                </div>
                <!--End Main Content Area here-->
                
                <!--Edit Sidebar Content here-->
                <div class="span4 sidebar">

                    <div class="sidebox">
                                <h4 class="sidebox-title">Refine your search by :</h4>
                                <div class="input-append">
                                <form method="post">
                                <select  name="val" style="width:281px;height:40px;" >
                                    <option value="Carpenter">Carpenter</option>
                                    <option value="Architect">Architect</option>
                                </select>
                                <button class="btn btn-warning ttip" data-toggle="tooltip" data-placement="right" style="height:40px;"title="Find" type="submit" >Find</button>
                                </form>
                                </div>
                                <form method="post">
                                    <div class="input-append">
                                        <input style="width:267px;height:30px;"placeholder="Address, City, State" type="text" required><button class="btn btn-warning ttip" data-toggle="tooltip" data-placement="right" style="height:40px;"title="Find" type="submit">Find</button>
                                    </div>
                                </form>
                          

                   
                          <h4 class="sidebox-title">Our Skills</h4>                    
                            
                                <h5>Web Design ( 40% )</h5>
                                <div class="progress progress-info">
                                <div class="bar" style="width: 20%"></div>
                                </div>                          
                            
                                <h5>Wordpress ( 80% )</h5>
                                <div class="progress progress-success">
                                <div class="bar" style="width: 40%"></div>
                                </div>                          
                            
                                <h5>Branding ( 100% )</h5>
                                <div class="progress progress-warning">
                                <div class="bar" style="width: 60%"></div>
                                </div>                          
                            
                                <h5>SEO Optmization ( 60% )</h5>
                                <div class="progress progress-danger">
                                <div class="bar" style="width: 80%"></div>
                                </div>          
                        
                            
                    </div>
                    
                </div>
                <!--End Sidebar Content here-->
            </div>

        <div id="footerInnerSeparator"></div>
    </div>

</div>
<?php } ?>