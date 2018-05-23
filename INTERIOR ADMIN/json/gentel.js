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



