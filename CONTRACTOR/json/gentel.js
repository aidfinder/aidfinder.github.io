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
		                	 row +='<select disabled id="subcat" name="subcat" style="width:100%;height:45px;" required>';
		                     row +='<option value="">--No Filtered Result--</option>';
		                	 row +='</select>';
		                }else{
		                	row +='<select id="subcat" name="subcat" style="width:100%;height:45px;" >';
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
		                	 row +='<select disabled id="municipalityz" name="municipalityz" style="width:100%;height:45px;">';
		                     row +='<option value="">--No Filtered Result--</option>';
		                	 row +='</select>';
		                }else{
		                	row +='<select id="municipalityz" name="municipalityz"  onchange="filtered_barangay()" style="width:100%;height:45px;">';
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
		                	 row +='<select disabled id="barangay" name="barangay" style="width:100%;height:45px;">';
		                     row +='<option value="">--No Filtered Result--</option>';
		                	 row +='</select>';
		                }else{
		                	row +='<select id="barangay" name="barangay" style="width:100%;height:45px;">';
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

function filtered_notifications(){
	
	 var the_user_id = $('#the_user_id').val();
		$.ajax({
	            type:'POST',
	            url: baseUrlAction() + '?btn=notificationdropdown',
	            context: this,
	            dataType: 'json',
	            data: { 
	                    the_user_id : the_user_id
	            },
	            error: function(ts) { console.log(ts.responseText) },
	            success: function(data) { 
	            		$("#notification-count").remove();
	           			var row="";

	           			//alert("ok");
		                if(jQuery.isEmptyObject(data)){
		                	 row +='<li><a href="#"><strong>--No Notifications--<small><em></strong><br/><small><em></a>';
		                }else{
		                	
		                	$.each(data, function(key,value){
							row +='<li><a href="'+value.id+'">'+'<strong>'+value.ptitle+'</strong><br/><small><em>' + value.bidcost+'</em></small></a>';
		                    });   
		                } 
		                $('#notification-latest').html(row).fadeIn('slow').slideDown('slow');     
	                }
	        });  
		 setTimeout(function(){ 
		 }, 1500)
   
}
function checkPass()
{
  var pass1 = document.getElementById('pass1');
  var pass2 = document.getElementById('pass2');
  var message = document.getElementById('confirmMessage');
  if(pass1.value == pass2.value){
      $('.alert').removeClass('alert-danger');
      $('.alert').addClass('alert-success').show().slideDown('slow');
      $('.message').html("Passwords Matched");
  }else{
      $('.alert').removeClass('alert-success');
      $('.alert').addClass('alert-danger').show().slideDown('slow');
      $('.message').html("Passwords Do Not Match!");
  }
}  
$('#submitAdRequest').bind('click', function(eve){
		eve.preventDefault();   
		$('#submitAdRequest').show('slow').html('<i class="fa fa-spinner"></i>Processing...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=submitAdRequest',
					            context: this,
					            dataType: 'json',
					            data: { 
					                   
					                    //province : $('#province').val(),
					                    //town : $('#town').val(),
					                    //citybarangay : $('#citybarangay').val(),
					                    
					                    emailad : $('#emailad').val()


					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#submitAdRequest').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-danger');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Submitted!");
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#submitAdRequest').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-danger').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
   
			 });

$('#archi_signupbutton').bind('click', function(eve){ //alert('ok');
		eve.preventDefault();   
		$('#archi_signupbutton').show('slow').html('<i class="fa fa-spinner"></i>Signing up...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=archi_signupbutton',
					            context: this,
					            dataType: 'json',
					            data: { 
					                   
					                    expertise_id : $('#expertise_id').val(),
					                    gender : $('#gender').val(),
					                    fname : $('#fname').val(),
					                    mname : $('#mname').val(),
					                    lname : $('#lname').val(),
					                    birthdate : $('#birthdate').val(),
					                    phone : $('#phone').val(),
					                    username : $('#username').val(),
					                    email : $('#email').val(),
					                    type : $('#type').val(),
					                    address : $('#address').val(),
					                    latitude : $('#latitude').val(),
					                    longitude : $('#longitude').val(),
					                    pass2 : $('#pass2').val(),
					                    pass1 : $('#pass1').val()


					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#archi_signupbutton').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-danger');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Signed Up!");
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#archi_signupbutton').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-danger').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
   
			 });