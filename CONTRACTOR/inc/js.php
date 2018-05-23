<?php
if(!isset($_SESSION['page']))
{
    $_SESSION['page']='dashboard';
}

if(isset($_GET['page']))
{
    $_SESSION['page']=$_GET['page'];
}

switch($_SESSION['page'])
{
  case 'projectLeads':
  ?>
  	<script src="js/jquery.min.js"></script> 
	<script src="js/jquery.ui.custom.js"></script> 
	<script src="js/bootstrap.min.js"></script> 
	<script src="js/jquery.uniform.js"></script> 
	<script src="js/select2.min.js"></script> 
	<script src="js/jquery.dataTables.min.js"></script> 
	<script src="js/maruti.js"></script> 
	<script src="js/maruti.tables.js"></script>


	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="css/uniform.css" />
	<link rel="stylesheet" href="css/select2.css" />
	<link rel="stylesheet" href="css/maruti-style.css" />
	<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
	
  <?php
    break;
    case 'projectDetails':
  ?>
  	<script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/maruti.js"></script>


    <!--UPLOAD PDF-->
    <script type="text/javascript" src="ajax_upload/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="ajax_upload/js/jquery.form.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() { 
		var options = { 
				target:   '#output',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				success:       afterSuccess,  // post-submit callback 
				uploadProgress: OnProgress, //upload progress callback 
				resetForm: true        // reset the form after successful submit 
			}; 
			
		 $('#MyUploadForm').submit(function() { 
		 		$.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=submit_btn',
					            context: this,
					            dataType: 'json',
					            data: { 
					                   
					                    myID : $('#myID').val(),
					                    projectID : $('#projectID').val()


					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){  
					                	$(this).ajaxSubmit(options);    
					                }else { 
  										  $('#submit-btn').html('Upload').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
  										  $('.message').addClass('alert').show().slideDown('slow');
								          $('.alert').addClass('alert-danger').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
							
				// always return false to prevent standard browser submit and page navigation 
				return false; 
			}); 
			

	//function after succesful file upload (when server response)
	function baseUrl(){
	return location.protocol + "//" + location.host + "/";
	}
	function baseUrlAction(){
	     return location.protocol + "//" + location.host + "/PANDAY/Architect Admin/inc/ajax/ajax_controller.php";
	}
	function afterSuccess()
	{
		$('#submit-btn').show(); //hide submit button
		$('#loading-img').hide(); //hide submit button
		$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
		

	}

	//function to check file size before uploading.
	function beforeSubmit(){
	    //check whether browser fully supports all File API
	   if (window.File && window.FileReader && window.FileList && window.Blob)
		{
			
			if( !$('#FileInput').val()) //check empty input filed
			{
				//$("#output").html("Are you kidding me?");
				$('.alert').removeClass('alert-success');
				 $('.message').addClass('alert').show().slideDown('slow');
			      $('.alert').addClass('alert-danger').show().slideDown('slow');
			      $('.message').html("You have not chosen a file yet!");
				return false
			}
			
			var fsize = $('#FileInput')[0].files[0].size; //get file size
			var ftype = $('#FileInput')[0].files[0].type; // get file type
			

			//allow file types 
			switch(ftype)
	        {
	            case 'image/png': 
				case 'image/gif': 
				case 'image/jpeg': 
				case 'image/pjpeg':
				case 'text/plain':
				case 'text/html':
				case 'application/x-zip-compressed':
				case 'application/pdf':
				case 'application/msword':
				case 'application/vnd.ms-excel':
				case 'video/mp4':
	                break;
	            default:
	                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
					return false
	        }
			
			//Allowed file size is less than 5 MB (1048576)
			if(fsize>5242880) 
			{
				$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
				return false
			}
					
			$('#submit-btn').hide(); //hide submit button
			$('#loading-img').show(); //hide submit button
			$("#output").html("");  
		}
		else
		{
			//Output error to older unsupported browsers that doesn't support HTML5 File API
			$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
			return false;
		}
	}

	//progress bar function
	function OnProgress(event, position, total, percentComplete)
	{
	    //Progress bar
		$('#progressbox').show();
	    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
	    $('#statustxt').html(percentComplete + '%'); //update status text
	    if(percentComplete>50)
	        {
	            $('#statustxt').css('color','#000'); //change status text to white after 50%
	        }
	}

	//function to format bites bit.ly/19yoIPO
	function bytesToSize(bytes) {
	   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	   if (bytes == 0) return '0 Bytes';
	   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}

	}); 

	</script>

	<!--UPLOAD PDF-->
	
  <?php
    break;
	  case 'dashboard':
	  ?>
	  	<script src="js/excanvas.min.js"></script> 
		<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.flot.min.js"></script> 
		<script src="js/jquery.flot.resize.min.js"></script> 
		<script src="js/jquery.peity.min.js"></script> 
		<script src="js/fullcalendar.min.js"></script> 
		<script src="js/maruti.js"></script> 
		<script src="js/maruti.dashboard.js"></script> 
		<script src="js/maruti.chat.js"></script>

	 <?php
    break;
	  case 'clientProject':
	  ?>
	  	<script src="js/excanvas.min.js"></script> 
		<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
	 
		
		<script src="js/maruti.js"></script> 
		
		


	  <?php
	  break;
	  case 'chart':
	  ?>
	  	<script src="js/excanvas.min.js"></script> 
		<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.flot.min.js"></script> 
		<script src="js/jquery.flot.pie.min.js"></script> 
		<script src="js/jquery.flot.resize.min.js"></script> 
		<script src="js/maruti.js"></script> 
		<script src="js/maruti.charts.js"></script> 
		<script src="js/maruti.dashboard.js"></script> 
		<script src="js/jquery.peity.min.js"></script>
		
	  <?php
	  break;
	  case 'approvedServReq':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'disapprovedServReq':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'cancelledServReq':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'cateredServReq':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'cancelledServReq':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'addAccomProj':
	  ?>
	  	<!--end-Footer-part--> 
		<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/bootstrap-colorpicker.js"></script> 
		<script src="js/bootstrap-datepicker.js"></script> 
		<script src="js/jquery.toggle.buttons.js"></script> 
		<script src="js/masked.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.form_common.js"></script> 
		<script src="js/wysihtml5-0.3.0.js"></script> 
		<script src="js/jquery.peity.min.js"></script> 
		<script src="js/bootstrap-wysihtml5.js"></script> 
		<!--this is a plugin--> 
		<script src="js/bootstrap-fileupload.js"></script>
		<!--this is a plugin--> 
		<script>
			$('.textarea_editor').wysihtml5();
		</script>

		<script src="json/jquery-1.11.0.js"></script>
	    <script src="json/jquery-1.11.3.min.js"></script>
	    <script src="json/gentel.js"></script>
	  <?php
	  break;
  	  case 'viewAccomProj':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'servRates':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'viewActivityLog':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	   break;
	  case 'viewLogs':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php
	  break;
	  case 'reviews':
	  ?>
	  	<script src="js/jquery.min.js"></script> 
		<script src="js/jquery.ui.custom.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/matrix.js"></script> 
		<script src="js/matrix.tables.js"></script>
	  <?php

}
