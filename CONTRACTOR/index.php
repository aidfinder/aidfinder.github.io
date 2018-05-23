<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Contractor</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/maruti-login.css" />
</head>
<?php  
      include('inc/config.php'); 
      include('inc/model.php');
      include('inc/controller.php');
?>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="post">
				 <div style="background-color:#01a990;font-size:15pt" class="control-group normal_text"><br/><b>CONTRACTOR PANEL</b> <br/><br/><!--h3><img src="img/logo.png" alt="Logo" /></h3--></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input name="contractor_username" type="text" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input name="contractor_password" type="password" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!--span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost password?</a></span-->
                    <span class="pull-right"><button name="login" type="submit" class="btn btn-success"/><i class="icon-circle-arrow-right"></i>&nbsp;&nbsp;Login</button>
                </div>
                    <?php if(isset( $_POST['error'] )){ ?>
                        <div class="x_panel">  
                          <div class="x_content bs-example-popovers">
                            
                            <div class="alert alert-success alert-dismissible fade in" role="alert" style="font-size:8pt;color:White" >
                              
                              <center><strong style="height:30px;color:red"> <?php echo $_POST['error']; ?></strong></center>
                            </div>
                          </div>
                        </div>
                     <?php } ?>
            </form>
            <!--form id="recoverform"class="form-vertical" method="post">
				<p style="background-color:#01a990"class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
                </div>
            </form-->
        
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/maruti.login.js"></script>



    </body>

</html>
