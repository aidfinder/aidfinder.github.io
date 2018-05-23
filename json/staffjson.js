 function baseUrlAction(){
     return location.protocol + "//" + location.host + "/smhotel/inc/json_tools/json_controller.php";
 }
 //forms show
 function show_modal_edit_hotel_admin(id){
	
    $.ajaxSetup({ cache: false });
    $.get(baseUrlAction()+"?editmodalhoteladmin&id="+id, function(data) {
         $.each(data, function(key,value){
            $('#fname').val(value.fname);
            $('#lname').val(value.lname);
            $('#mname').val(value.mname);
            $('#address').val(value.address);
            $('#contact').val(value.contact);
            $('#gender').val(value.gender);
            $('#username').val(value.username);
            $('#email').val(value.email);
            $('#bday').val(value.bday);
            $('#id').val(value.id);
            $('#position').val(value.position);
         });
          jQuery('#modal-2').modal('show');
    },'json'); 
    //alert('hello='+hoteladmin_no);
 // 	jQuery('#modal-2').modal('show');
}
function filtered_town(){
 		 
 				  var id_province = $('#province').val();
 					//alert("province "+id_province);
		     		$.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=listoftown_specific_country_dropdown',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    ids : id_province
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					           			var row="";
					           			
						                if(jQuery.isEmptyObject(data)){
						                	 row +='<select disabled id="citytown" class="frm-field required" >';
						                     row +='<option value="">--No Filtered Result--</option>';
						                	 row +='</select>';
						                }else{
						                	row +='<select id="citytown" class="frm-field required" >';
						                   	 row +='<option value="">Choose City/Town</option>'
						                    $.each(data, function(key,value){        
						                    row +='<option value="'+value.id+'">' + value.name+'</option>';
						                    });   
						                    row +='</select>';
						                } 
						                $('#citytown_div').html(row).fadeIn('slow').slideDown('slow');     
					                }
					        });  
		   
 	}
function filtered_province(){
	
 				  var id_country = $('#country').val();
		     		$.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=listofprovince_specific_country_dropdown',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    ids : id_country
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					           			var row="";
					           			
						                if(jQuery.isEmptyObject(data)){
						                	 row +='<select disabled id="province"  class="frm-field required" >';
						                     row +='<option value="">--No Filtered Result--</option>';
						                	 row +='</select>';
						                }else{
						                	row +='<select onchange="return filtered_town()" id="province"  class="frm-field required" >';
						                    row +='<option value="">Choose Province</option>'
						                    $.each(data, function(key,value){        
						                    row +='<option value="'+value.id+'">' + value.name+'</option>';
						                    });   
						                    row +='</select>';
						                } 
						                $('#province_div').html(row).fadeIn('slow').slideDown('slow');     
					                }
					        });  
		     		 setTimeout(function(){
		     			 filtered_town();
		     		 }, 1500)
		   
 	}
 	function what_city_province(hotel_no,place){
 					var hotel_no = hotel_no;
 					var place = place;
 					var result="";
		     			$.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=what_city_province',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    hotel : hotel_no,
					                    place : place
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					            	   
					           			//result ="NEIL";
						              // if(jQuery.isEmptyObject(data)){
						               // 	result = data;
						                	//console.log(data.name);
						               // }else{
						                //	result = data[0];
						                	console.log(data);
						               // }
						              return data;
					             }
					        }); 
		     //	alert("log: "+result);
				//return result;
 	}
 //forms show
$('#showbyrate').bind('click', function(eve){
			eve.preventDefault(); 
			$('#byRate').show();
			$('#byPlace').hide();
})
$('#seach_by_rate').bind('click', function(eve){
			 		eve.preventDefault(); 
			 		$(this).val('Searching..');
			 		//alert($('#rate').val());
			 		window.location.href="ratesearch.php?rate="+$('#rate').val()+"#target";
});
$('#seach_by_place').bind('click', function(eve){
			 		eve.preventDefault(); 
			 		 $(this).val('Searching..');
			 		 var id_country = $('#country').val();
			 		 var id_province = $('#province').val();
			 		 var id_citytown = $('#citytown').val();

			 		 if( id_country !="" && id_province =="" && id_citytown =="" ){
			 		 		window.location.href="index.php?country="+id_country+"#target";
			 		 }else if( id_country !="" && id_province !="" && id_citytown =="" ){
			 		 		window.location.href="index.php?country="+id_country+"&province="+id_province+"#target";
			 		 }else if( id_country !="" && id_province !="" && id_citytown !="" ){
			 		 		window.location.href="index.php?country="+id_country+"&province="+id_province+"&town="+id_citytown+"#target";
			 		 }

			 		// window.location.href="index.php?country="+id_country;
			 		/* $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=search_by_country',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    ids : id_country
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					           			var row="";
					           			
						                if(jQuery.isEmptyObject(data)){
						                	 row +='<h3>Featured Hotels & Resorts</h3>';
												 row +='<div class="room-grids">';
															 row +='<div class="col-md-12 room-sec">';
															 	row +="No Result";
															 row +='</div>';
													 row +='<div class="clearfix"></div>';
												 row +='</div>';
												 row +='<?php $model->FeaturedSponsors(); ?>';
											 row +='</div>';
						                }else{
						                	row +='<h3>Featured Hotels & Resorts</h3>';
						                		
								                	$.each(data, function(key,value){ 

								                		var item = what_city_province(value.hotel_no,"town");
								                		//START
								                		//alert(item);
								                		//END
														 row +='<div class="room-grids">';
																	 row +='<div class="col-md-4 room-sec">';
																	 	 row +='<a href="insidehotel.php?hotel='+value.hotel_no+' ">';
																		 row +='<img style="width: 90%;height:30% " src="images/HOTELS/'+value.hotel_no+'.jpg" alt=""/>';
																		 row +='<h4>'+value.hotel_name+'</h4>';
																		 row +='<p>Location:&nbsp;'+item+',&nbsp;<?php echo $model->__what_citytown_province('+value.hotel_no+',"province"); ?>,&nbsp;<?php echo $model->__what_citytown_province('+value.hotel_no+',"country"); ?></p>';
																		 row +='<p>Hello Guest, There are <a style="color: green;font-size: 15pt" href="attraction.php?town=<?php echo $model->__what_citytown_province_id('+value.hotel_no+',"town"); ?>&province=<?php echo $model->__what_citytown_province_id('+value.hotel_no+',"province"); ?>"> <?php echo $model->__count_attraction_specific_town('+value.town_no+'); ?> tourist attraction(s)</a> within <span style="color: red;"><?php echo $model->__what_citytown_province('+value.hotel_no+',"town"); ?></span> and <a style="color: green;font-size: 15pt" href="attraction.php?province=<?php echo $model->__what_citytown_province_id('+value.hotel_no+',"province"); ?>"> <?php echo $model->__count_attraction_specific_province('+value.town_no+'); ?> tourist attraction(s)</a> all over <span style="color: red;"><?php echo $model->__what_citytown_province('+value.hotel_no+',"province"); ?></span></p>';
																		 row +='</a>';
																		 row +='<div class="items">';
																			 row +='<li><a href="#"><span class="img1"> </span></a></li>';
																			 row +='<li><a href="#"><span class="img2"> </span></a></li>';
																			 row +='<li><a href="#"><span class="img3"> </span></a></li>';
																			 row +='<li><a href="#"><span class="img4"> </span></a></li>';
																			 row +='<li><a href="#"><span class="img5"> </span></a></li>';
																			 row +='<li><a href="#"><span class="img6"> </span></a></li>';
																		 row +='</div>';
																	 row +='</div>';
															 row +='<div class="clearfix"></div>';
													 }); 

												 row +='</div>';
												 row +='<?php $model->FeaturedSponsors(); ?>';
											 row +='</div>';
						                } 
						                $('#target_search').html(row).fadeIn('slow').slideDown('slow');     
					                }
					        }); */ 
});  
$('#loginclient').bind('click', function(eve){
			 		eve.preventDefault();   
				        $('#loginclient').show('slow').val('Authenticating..');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=login',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    uname : $('#clientusername').val(),
					                    password : $('#clientadminpassword').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								                  
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                 
					                }else { 
  										  $('.form-login-error').fadeIn('slow');
  										  $('#loginError').html(data.status);
								          setTimeout(function(){
                          			             $('#login').show('fadeIn').html('Login');          
								          }, 100)	
								          setTimeout(function(){
                          			             $('.form-login-error').fadeOut('slow');          
								          }, 5000)	
					                }
					            }
					        }); 
});

$('#booknow').bind('click', function(eve){
			  		   eve.preventDefault(); 
			  		   $(this).show('slow').val('Processing...');
			  		   $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=booknow',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    date : $('#datepicker').val(),
					                    hour : $('#hour').val(),
					                    minute : $('#minute').val(),
					                    client : $('#client').val(),
					                    room_rate_no : $('#rate').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){ 
					               
								   		  $(this).show('slow').val('Book'); 
								   		  $('.mali').hide();
								   		  $('.tama').val(" You have Successfully Booked this room");
								   		  $('.tama').show('fadeIn');
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                 
					                }else { 
								          setTimeout(function(){
								          		$('#booknow').val('Book');
								            	$('.mali').show('slow').val(data.status);
								          }, 700)	
					                }
					            }
					        }); 
});

$('.pay').bind('click', function(eve){
	 eve.preventDefault();  
	 var name_no = new Array();
	 name_no = ($(this).val()).split('||');
	 $('#roomname').val(name_no[0]+" @ Room #: "+name_no[1]);
	 $('#reservation_no').val(name_no[2]);
	 $('#two').show('slow');
	 $('#one').hide();
	 $('#title').html('Payment Form'); 
});
$('#addPaymentBook').bind('click', function(eve){
	 eve.preventDefault();
	 $(this).show('slow').val('Processing...');
	 $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addPaymentBook',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    reservation_no : $('#reservation_no').val(),
					                    sender : $('#sender').val(),
					                    kptn : $('#kptn').val(),
					                    amount : $('#amount').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){ 
					               
								   		  $(this).show('slow').val('Update Account'); 
								   		  $('.mali').hide();
								   		  $('.tama').val(" Payment Successfully Submitted!")
								   		  $('.tama').show('fadeIn');
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                 
					                }else { 
								          setTimeout(function(){
								          	$('#signupclient').val('Submit Payment');
								            $('.mali').show('slow').val(data.status);
								          }, 700)	
					                }
					            }
					        }); 
});
$('#saveaccountchanges').bind('click', function(eve){
	 eve.preventDefault();  
	 $(this).show('slow').val('Processing...');
					 $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=saveaccountchanges',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    fname : $('#fname').val(),
					                    mname : $('#lname').val(),
					                    lname : $('#mname').val(),
					                    uname : $('#uname').val(),
					                    gender : $('#gender').val(),
					                    email : $('#email').val(),
					                    contact : $('#contact').val(),
					                    address : $('#address').val(),
					                    birthdate : $('#day').val()+"/"+$('#month').val()+"/"+$('#year').val(),
					                    password:  $('#password').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){ 
					               
								   		  $(this).show('slow').val('Update Account'); 
								   		  $('.mali').hide();
								   		  $('.tama').val(" Account Successfully Updated! Your Account Will Be logged Out in a moment!")
								   		  $('.tama').show('fadeIn');
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                 
					                }else { 
								          setTimeout(function(){
								          	$('#signupclient').val('Update Account');
								            $('.mali').show('slow').val(data.status);
								          }, 700)	
					                }
					            }
					        }); 
});
$('#signupclientss').bind('click', function(eve){
			  		   eve.preventDefault();   
			  		  // alert("hello");
				        $(this).show('slow').val('Processing...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=signupclient',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    fname : $('#fname').val(),
					                    mname : $('#lname').val(),
					                    lname : $('#mname').val(),
					                    uname : $('#uname').val(),
					                    gender : $('#gender').val(),
					                    email : $('#email').val(),
					                    contact : $('#contact').val(),
					                    address : $('#address').val(),
					                    birthdate : $('#day').val()+"/"+$('#month').val()+"/"+$('#year').val(),
					                    password:  $('#password').val(),
					                    rpassword:  $('#rpassword').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){ 
					               
								   		  $(this).show('slow').val('SUBMIT'); 
								   		  $('.mali').hide();
								   		  $('.tama').val(" Successfully Added! Pls. Login Your Account!")
								   		 
								   		  $('.tama').show('fadeIn');
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                 
					                }else { 
								          setTimeout(function(){
								          	$('#signupclient').val('SUBMIT');
								            $('.mali').show('slow').val(data.status);
								          }, 700)	
					                }
					            }
					        }); 
			   });
$('#signuphoteladmin').bind('click', function(eve){
			  		   eve.preventDefault();   
			  		   //alert("hello");
				        $(this).show('slow').val('Processing...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=signuphoteladmin',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    fname : $('#fname').val(),
					                    mname : $('#lname').val(),
					                    lname : $('#mname').val(),
					                    uname : $('#uname').val(),
					                    gender : $('#gender').val(),
					                    email : $('#email').val(),
					                    contact : $('#contact').val(),
					                    position : $('#position').val(),
					                    address : $('#address').val(),
					                    birthdate : $('#day').val()+"/"+$('#month').val()+"/"+$('#year').val(),
					                    password:  $('#password').val(),
					                    rpassword:  $('#rpassword').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){ 
					               
								   		  $(this).show('slow').val('SUBMIT'); 
								   		  $('.mali').hide();
								   		  $('.tama').show('fadeIn');
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                 
					                }else { 
								          setTimeout(function(){
								          	$('#signuphoteladmin').val('SUBMIT');
								            $('.mali').show('slow').val(data.status);
								          }, 700)	
					                }
					            }
					        }); 
			   });
