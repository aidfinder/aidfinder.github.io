<?php
$conn = new mysqli("localhost","root","","panday");
$count=0;
if(!empty($_POST['add'])) {
	$subject = mysqli_real_escape_string($conn,$_POST["subject"]);
	$comment = mysqli_real_escape_string($conn,$_POST["comment"]);
	$sql = "INSERT INTO comments (subject,comment) VALUES('" . $subject . "','" . $comment . "')";
	mysqli_query($conn, $sql);
}
$sql2='SELECT * FROM tbl_clientproject c,tbl_bids b where b.project_id=c.clientproject_id and c.user_id="'.$_SESSION['userlogged']['user_id'].'" AND dummy_status = "1" ';
$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Facebook Like Header Notification in PHP</title>
	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
	</script>
	</head>
	<body>
	<div class="demo-content">
		<div id="notification-header">
			   <div style="position:relative">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="notification-icon.png" /></button>
				 <div id="notification-latest"></div>
				</div>			
		</div>
	<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>


	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>

		</div>
	</body>
</html>