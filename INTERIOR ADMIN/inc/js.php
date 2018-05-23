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
