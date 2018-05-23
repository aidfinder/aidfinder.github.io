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
	<script src="js/matrix.js"></script> 
	<script src="js/matrix.dashboard.js"></script> 
	<script src="js/jquery.gritter.min.js"></script> 
	<script src="js/matrix.interface.js"></script> 
	<script src="js/matrix.chat.js"></script> 
	<script src="js/jquery.validate.js"></script> 
	<script src="js/matrix.form_validation.js"></script> 
	<script src="js/jquery.wizard.js"></script> 
	<script src="js/jquery.uniform.js"></script> 
	<script src="js/select2.min.js"></script> 
	<script src="js/matrix.popover.js"></script> 
	<script src="js/jquery.dataTables.min.js"></script> 
	<script src="js/matrix.tables.js"></script> 

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
				$(this).ajaxSubmit(options);  			
				// always return false to prevent standard browser submit and page navigation 
				return false; 
			}); 
			

	//function after succesful file upload (when server response)
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
				$("#output").html("Are you kidding me?");
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
	
	<script type="text/javascript">
	  // This function is called from the pop-up menus to transfer to
	  // a different page. Ignore if the value returned is a null string:
	  function goPage (newURL) {

	      // if url is empty, skip the menu dividers and reset the menu selection to default
	      if (newURL != "") {
	      
	          // if url is "-", it is this page -- reset the menu:
	          if (newURL == "-" ) {
	              resetMenu();            
	          } 
	          // else, send page to designated URL            
	          else {  
	            document.location.href = newURL;
	          }
	      }
	  }

	// resets the menu selection upon entry to this page:
	function resetMenu() {
	   document.gomenu.selector.selectedIndex = 2;
	}
	</script>
 	<?php
	break;
  	case 'allServReq':
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
	case 'pendingServReq':
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
	case 'addDesign':
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
	case 'addServiceRates':
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
	case 'addMyService':
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
	case 'viewClientProject':
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
	case 'viewDesign':
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
	case 'viewServiceRates':
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
	case 'viewMyService':
	?>
  	<script src="js/jquery.min.js"></script> 
	<script src="js/jquery.ui.custom.js"></script> 
	<script src="js/bootstrap.min.js"></script> 
	<script src="js/jquery.uniform.js"></script> 
	<script src="js/select2.min.js"></script> 
	<script src="js/jquery.dataTables.min.js"></script> 
	<script src="js/matrix.js"></script> 
	<script src="js/matrix.tables.js"></script>

	

	<script src="json/jquery-1.11.0.js"></script>
    <script src="json/jquery-1.11.3.min.js"></script>
    <script src="json/gentel.js"></script>
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
	break;
	case 'editDesignIdeas':
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
	case 'editServiceRate':
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
	case 'editMyService':
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
	case 'editAccomplished':
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

}
