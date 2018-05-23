<!DOCTYPE html>
<html>
<head>
<title>P-A-N-D-A-Y</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include('inc/css.php'); ?>

</head>


<?php  
      include('inc/config.php'); 
      include('inc/model.php');
      include('inc/controller.php');
?>

<body class="flat-blue">
    <div class="app-container">

        <div class="row content-container">
           
            <?php include('inc/top_nav.php'); ?>
            <?php include('inc/left_col.php'); ?>
            <!-- Main Content -->
            <?php include('inc/view.php'); ?>
            <?php include('inc/json.php');?>

        </div>
        <footer class="app-footer">
            <div class="wrapper">
                <span class="pull-right">2.1<a href="#"><i class="fa fa-long-arrow-up"></i></a></span>Panday.com © 2017 Copyright.
            </div>
        </footer>
        <div>
            <?php include('inc/js.php'); ?>
          
           
    </body>

</html>
