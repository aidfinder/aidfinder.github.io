<?php if(isset($_SESSION['interiorlogged'])){ include('admin.php');  }else{ ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Interior Designer</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="logo/logo6.png">
    </head>
    <?php  
      include('inc/config.php'); 
      include('inc/model.php');
      include('inc/controller.php');
    ?>
    <body>
        <div id="loginbox">            
            <form id="loginform" method="post">
                 <div class="control-group normal_text"> <h3>Interior Designer</h3></div>
                   
                    
        
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="archiusername" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="archipassword" placeholder="Password" required/>
                            <br/><br/><br/>
                            <?php if(isset( $_POST['error'] )){ ?>             
                              <strong style="color:orange"> <?php echo $_POST['error']; ?></strong>
                            <?php } ?>
                        </div>

                    </div>

                </div>

                <div class="form-actions">
                    <!--span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span-->
                    <span class="pull-right"><button type="submit" name="login" class="btn btn-success" /><i class="icon-signin"></i>&nbsp;&nbsp;Login</button></span>
                </div>
            </form>
            <!--form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form-->
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
<?php } ?>