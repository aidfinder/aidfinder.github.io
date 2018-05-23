function baseUrl(){
	return location.protocol + "//" + location.host + "/";
}
function baseUrlAction(){
     return location.protocol + "//" + location.host + "/PANDAY/SUPER ADMIN/inc/ajax/ajax_controller.php";
}
$('#addNewBuilder').bind('click', function(eve){
		eve.preventDefault();   
		$('#addNewBuilder').show('slow').html('<i class="fa fa-spinner"></i>&nbsp;&nbsp;Processing...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addNewBuilder',
					            context: this,
					            dataType: 'json',
					            data: { 
					                   
					                    //province : $('#province').val(),
					                    //town : $('#town').val(),
					                    //citybarangay : $('#citybarangay').val(),
					                    
					                    s_fname : $('#s_fname').val(),
					                    s_lname : $('#s_lname').val(),
					                    s_mname : $('#s_mname').val(),
					                    s_gender: $('#s_gender').val(),
					                    s_birthdate: $('#s_birthdate').val(),
					                    s_address: $('#s_address').val(),
					                    s_type : $('#s_type').val(),
					                    s_contact_no: $('#s_contact_no').val(),
					                    s_username: $('#s_username').val(),
					                    s_password: $('#s_password').val(),
					                    s_latitude: $('#s_latitude').val(),
					                    s_longitude: $('#s_longitude').val(),
					                    s_email: $('#s_email').val()


					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addNewBuilder').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-danger');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Added!");
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addNewBuilder').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-danger').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
   
			 });
$('#addNewCustomer').bind('click', function(eve){
		eve.preventDefault();   
		$('#addNewCustomer').show('slow').html('<i class="fa fa-spinner"></i>&nbsp;&nbsp;Processing...');
				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addNewCustomer',
					            context: this,
					            dataType: 'json',
					            data: { 
					                   
					                    //province : $('#province').val(),
					                    //town : $('#town').val(),
					                    //citybarangay : $('#citybarangay').val(),
					                    
					                    s_fname : $('#s_fname').val(),
					                    s_lname : $('#s_lname').val(),
					                    s_mname : $('#s_mname').val(),
					                    s_gender: $('#s_gender').val(),
					                    s_birthdate: $('#s_birthdate').val(),
					                    s_address: $('#s_address').val(),
					                    s_email : $('#s_email').val(),
					                    s_contact_no: $('#s_contact_no').val(),
					                    s_username: $('#s_username').val(),
					                    s_password: $('#s_password').val()


					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addNewCustomer').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-danger');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Added!");
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addNewCustomer').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-danger').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
   
			 });

$('#addservice').bind('click', function(eve){
		eve.preventDefault();
		$('#addservice').show('slow').html('<i class="fa fa-spinner"></i>&nbsp;&nbsp;Processing...');

				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addservice',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    service_type : $('#service_type').val(),
					                    service_specialization_area : $('#service_specialization_area').val(),
					                    service_details : $('#service_details').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addservice').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-warning');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Added !");
								          $( '.message' ).css( "color" , "#00A300" );	
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addservice').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-warning').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
});
$('#addspecialization').bind('click', function(eve){
		eve.preventDefault();
		$('#addspecialization').show('slow').html('<i class="fa fa-spinner"></i>&nbsp;&nbsp;Processing...');

				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addspecialization',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    specialization : $('#specialization').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addspecialization').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-warning');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Added !");
								          $( '.message' ).css( "color" , "#00A300" );	
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addspecialization').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-warning').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
});
$('#addprovince').bind('click', function(eve){
		eve.preventDefault();
		$('#addprovince').show('slow').html('<i class="fa fa-spinner"></i>&nbsp;&nbsp;Processing...');

				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addprovince',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    name : $('#name').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addprovince').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-warning');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Added !");
								          $( '.message' ).css( "color" , "#00A300" );	
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addprovince').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-warning').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
});
$('#addcategory').bind('click', function(eve){
		eve.preventDefault();
		$('#addcategory').show('slow').html('<i class="fa fa-spinner"></i>&nbsp;&nbsp;Processing...');

				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addcategory',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    building_category : $('#building_category').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addcategory').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-warning');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Added !");
								          $( '.message' ).css( "color" , "#00A300" );	
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addcategory').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-warning').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
});
$('#addsubcategory').bind('click', function(eve){
		eve.preventDefault();
		$('#addsubcategory').show('slow').html('<i class="fa fa-spinner"></i>&nbsp;&nbsp;Processing...');

				        $.ajax({
					            type:'POST',
					            url: baseUrlAction() + '?btn=addsubcategory',
					            context: this,
					            dataType: 'json',
					            data: { 
					                    subcategory : $('#subcategory').val(),
					                    build_cat_id : $('#build_cat_id').val()
					            },
					            error: function(ts) { console.log(ts.responseText) },
					            success: function(data) { 
					                if(parseFloat(data.status)==1){          
								          $('#addsubcategory').html('Submit').fadeIn('slow');
								          $('.alert').removeClass('alert-warning');
								          $('.alert').addClass('alert-success').show().slideDown('slow');
								          $('.message').html("Successfully Added !");
								          $( '.message' ).css( "color" , "#00A300" );	
					                      setTimeout(function(){
					                            window.location.href = data.redirect_page ;
					                      }, 1500)
					                }else { 
  										  $('#addsubcategory').html('Submit').fadeIn('slow');
  										  $('.alert').removeClass('alert-success');
								          $('.alert').addClass('alert-warning').show().slideDown('slow');
								          $('.message').html(data.status);
					                }
					            }
					        });
});