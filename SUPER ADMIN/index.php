<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('inc/css.php'); ?>
</head>
<?php  
      include('inc/config.php'); 
      include('inc/model.php');
      include('inc/controller.php');
  ?>

<body class="flat-blue login-page"style="background-image: url(img/app-header-bg.jpg)">
    <div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title">ADMIN PANEL</h4>
                        <p style="font-size:10pt">Please login with your Username and Password.</p>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
                            <form method="post">
                                <?php if(isset( $_POST['error'] )){ ?>
                                    <div class="x_panel">  
                                      <div class="x_content bs-example-popovers">
                                        
                                        <div class="alert alert-success alert-dismissible fade in" role="alert" style="font-size:8pt;color:White" >
                                          
                                          <center><strong style="height:30px;color:red"> <?php echo $_POST['error']; ?></strong></center>
                                        </div>
                                      </div>
                                    </div>
                                 <?php } ?>
                                <div class="control">
                                    <input type="text" name="adminusername" class="form-control" placeholder="Username" required/>
                                </div>
                                <div class="control">
                                    <input type="password" name="adminpassword" class="form-control" placeholder="Password" required/>
                                </div>
                                <div class="login-button text-center">
                                    <input type="submit" name="login" class="btn btn-primary" value="Login">
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

     <?php include('inc/js.php'); ?>

</body>

</html>
