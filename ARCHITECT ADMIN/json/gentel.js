function baseUrl(){
	return location.protocol + "//" + location.host + "/";
}
function baseUrlAction(){
     return location.protocol + "//" + location.host + "/PANDAY/Architect Admin/inc/ajax/ajax_controller.php";
}

function filtered_type(){
	//
	 var buildCat = $('#buildCat').val();
		$.ajax({
	            type:'POST',
	            url: baseUrlAction() + '?btn=buildcategorydropdown',
	            context: this,
	            dataType: 'json',
	            data: { 
	                    buildCat : buildCat
	            },
	            error: function(ts) { console.log(ts.responseText) },
	            success: function(data) { 
	           			var row="";
	           			
		                if(jQuery.isEmptyObject(data)){
		                	 row +='<select disabled id="subcat" name="subcat" class="span12" required>';
		                     row +='<option value="">--No Filtered Result--</option>';
		                	 row +='</select>';
		                }else{
		                	row +='<select id="subcat" name="subcat" class="span12" >';
		                    $.each(data, function(key,value){        
		                    row +='<option value="'+value.id+'">' + value.name+'</option>';
		                    });   
		                    row +='</select>';
		                } 
		                $('#subcat_div').html(row).fadeIn('slow').slideDown('slow');     
	                }
	        });  
		 setTimeout(function(){ 
		 }, 1500)
   
}
function filtered_municipality(){
	//
	 var ids = $('#provincess').val();
		$.ajax({
	            type:'POST',
	            url: baseUrlAction() + '?btn=municipalitydropdown',
	            context: this,
	            dataType: 'json',
	            data: { 
	                    idr : ids
	            },
	            error: function(ts) { console.log(ts.responseText) },
	            success: function(data) { 
	           			var row="";
	           			
		                if(jQuery.isEmptyObject(data)){
		                	 row +='<select disabled id="municipalityz" name="municipalityz" class="span12">';
		                     row +='<option value="">--No Filtered Result--</option>';
		                	 row +='</select>';
		                }else{
		                	row +='<select id="municipalityz" name="municipalityz" class="span12" onchange="filtered_barangay()">';
		                    $.each(data, function(key,value){        
		                    row +='<option value="'+value.id+'">' + value.name+'</option>';
		                    });   
		                    row +='</select>';
		                } 
		                $('#mun_div').html(row).fadeIn('slow').slideDown('slow');     
	                }
	        });  
		 setTimeout(function(){ filtered_barangay();
		 }, 1500)
   
}
function filtered_barangay(){
	//
	 var municipalityzz = $('#municipalityz').val();
		$.ajax({
	            type:'POST',
	            url: baseUrlAction() + '?btn=barangaydropdown',
	            context: this,
	            dataType: 'json',
	            data: { 
	                    municipyo : municipalityzz
	            },
	            error: function(ts) { console.log(ts.responseText) },
	            success: function(data) { 
	           			var row="";
	           			
		                if(jQuery.isEmptyObject(data)){
		                	 row +='<select disabled id="barangay" name="barangay" class="span12">';
		                     row +='<option value="">--No Filtered Result--</option>';
		                	 row +='</select>';
		                }else{
		                	row +='<select id="barangay" name="barangay" class="span12">';
		                    $.each(data, function(key,value){        
		                    row +='<option value="'+value.id+'">' + value.name+'</option>';
		                    });   
		                    row +='</select>';
		                } 
		                $('#bar_div').html(row).fadeIn('slow').slideDown('slow');     
	                }
	        });  
		 setTimeout(function(){ 
		 }, 1500)
   
}
$('#addMyMinimum').bind('click', function(eve){ //alert('ok');
		eve.preventDefault();   
		$('#addMyMinimum').show('slow').html('<i class="fa fa-spinner"></i>Submitting...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addMyMinimum',
					            context: this,
					            dataType: 'json',
					            data: { 
					                   
					                    myID : $('#myID').val(),
					                    min_rate : $('#min_rate').val()


					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addMyMinimum').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-danger');
								          $('.message').addClass('alert').show().slideDown('slow');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Minimum Rate Successfully Submitted!");
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addMyMinimum').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
  										  $('.message').addClass('alert').show().slideDown('slow')
								          $('.alert').addClass('alert-danger').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
   
			 });

$('#updateMyMinimum').bind('click', function(eve){ //alert('ok');
		eve.preventDefault();   
		$('#updateMyMinimum').show('slow').html('<i class="fa fa-spinner"></i>Saving...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=updateMyMinimum',
					            context: this,
					            dataType: 'json',
					            data: { 
					                   
					                    myUpdateID : $('#myUpdateID').val(),
					                    myCurrentMinimum : $('#myCurrentMinimum').val()


					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#updateMyMinimum').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-danger');
								          $('.message').addClass('alert').show().slideDown('slow');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Minimum Rate Successfully Updated!");
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#updateMyMinimum').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
  										  $('.message').addClass('alert').show().slideDown('slow')
								          $('.alert').addClass('alert-danger').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
   
			 });


