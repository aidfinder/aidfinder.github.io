<?php
class model
{
    public $query;
    var $con;
    var $logged;
    var $dbhost;
    var $dbuser;
    var $dbpass;
    var $dbname;
    function __construct() {
     
    }
    public function fetch($post){
        return mysql_fetch_assoc($post);
    } 
    public function query($post){
        return mysql_query($post);
    }
    public function numrows($post){
        return mysql_num_rows($post);
    }
    
    public function login($post){
        $query = $this->query('SELECT * from tbl_builder where b_username = "'.$post['archiusername'].'" and b_password = "'.$post['archipassword'].'" and b_type="Architect" and b_status = 1');
        if($qwerty = $this->fetch($query)){
            $logged = mysql_query("INSERT INTO tbl_logs (logger_type,logger_id,login_date,login_time,logs_status)values('Architect',".$qwerty['builder_id'].",NOW(),CURTIME(),1)")or die(mysql_error()); 
            $_SESSION['architectlogged'] = $qwerty;
            return true;
        }else{
            $_POST['error'] = '* Either Username or Password is Invalid';
        }
    }


    public function list_activityLog(){
        return $this->query('SELECT * FROM tbl_activity_log a, tbl_logs t where a.log_id=t.log_id and logger_type="Architect" and t.logger_Id = "'.$_SESSION['architectlogged']['builder_id'].'" ');
    }
    public function list_Logs(){
        return $this->query('SELECT * FROM tbl_logs where logger_type="Architect" and logger_Id = "'.$_SESSION['architectlogged']['builder_id'].'" ');
    }

    public function all_customer(){
        return $this->query('SELECT * FROM tbl_user ');
    }

    public function getAccomplishedID(){
        return $this->query('SELECT max(t.accomp_id)+1 FROM tbl_accomplished t');
    }
    public function getDesignID(){
        return $this->query('SELECT max(t.design_id)+1 FROM tbl_design_ideas t');
    }
    public function getCountlog(){
        return $this->query('SELECT count(log_id) FROM tbl_logs where logger_type="Architect" and logger_id= "'.$_SESSION['architectlogged']['builder_id'].'"');
    }
    public function all_provinces(){
        return $this->query('SELECT * FROM tbl_province ');
    }
    public function all_specialization(){
        return $this->query('SELECT * FROM tbl_specialization');
    }
    public function all_buildingcategory(){
        return $this->query('SELECT * FROM tbl_building_category order by build_cat_id asc ');
    }
    public function all_builderCarpenter(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Carpenter"order by builder_id asc ');
    }
    public function all_builderArchitect(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Architect"order by builder_id asc ');
    }
    public function list_subcategory(){
        return $this->query('SELECT * FROM tbl_subcategory m, tbl_building_category y where m.build_cat_id=y.build_cat_id');
    }
    public function all_service(){
        return $this->query('SELECT * FROM tbl_builder_services bs, tbl_builder b, tbl_tier t where bs.tier_id=t.tier_id and b.builder_id=bs.builder_id and b.builder_id="'.$_SESSION['architectlogged']['builder_id'].'"');
    }
    public function all_tiers(){
        return $this->query('SELECT * FROM tbl_tier;');
    }
    public function service_list(){
        return $this->query('SELECT * FROM tbl_services where service_category="Additional";');
    }
    public function all_accomplished_project(){
        return $this->query('SELECT * FROM tbl_accomplished a, tbl_subcategory t,tbl_specialization s where a.subcat_id=t.subcat_id and builder_id = "'.$_SESSION['architectlogged']['builder_id'].'" and a.specialization_id=s.specialization_id');
    }
    public function all_design_ideas(){
        return $this->query('SELECT * FROM tbl_design_ideas a, tbl_subcategory t,tbl_specialization s where a.subcat_id=t.subcat_id and builder_id = "'.$_SESSION['architectlogged']['builder_id'].'" and a.specialization_id=s.specialization_id');
    }
    public function all_service_rates(){
        return $this->query('SELECT * FROM tbl_builder_services a, tbl_services t where a.service_id=t.service_id and builder_id = "'.$_SESSION['architectlogged']['builder_id'].'"');
    }
    public function all_clientproject(){
        return $this->query('SELECT * FROM tbl_clientproject a, tbl_user t where a.user_id=t.user_id and builder_id = "'.$_SESSION['architectlogged']['builder_id'].'"');
    }
    public function all_myservice(){
        return $this->query('SELECT * FROM tbl_myservices a, tbl_services t where a.service_id=t.service_id and builder_id = "'.$_SESSION['architectlogged']['builder_id'].'"');
    }
    public function all_myservice_dashboard(){
        return $this->query('SELECT * FROM tbl_myservices a, tbl_services t where a.service_id=t.service_id and builder_id = "'.$_SESSION['architectlogged']['builder_id'].'" limit 5');
    }
   




    public function pending_request(){
        return $this->query('SELECT * FROM tbl_request where req_status=0 and builder_id="'.$_SESSION['architectlogged']['builder_id'].'" group by user_id');
    }
    public function all_request(){
        return $this->query('SELECT * FROM tbl_request where builder_id="'.$_SESSION['architectlogged']['builder_id'].'"');
    }
    public function myMinimumExistence(){
        return $this->query('SELECT * FROM tbl_myminimum_rate where builder_id="'.$_SESSION['architectlogged']['builder_id'].'"');
    }
    public function user_parameter($id){
        return $this->query('SELECT * FROM tbl_user where user_id="'.$id.'"');
    }
    public function subcategory_parameter($id){
        return $this->query('SELECT * FROM tbl_subcategory where subcat_id="'.$id.'"');
    }
    public function category_parameter($id){
        return $this->query('SELECT * FROM tbl_building_category b,tbl_subcategory s where b.build_cat_id=s.build_cat_id and subcat_id="'.$id.'"');
    }
    public function specialization_parameter($id){
        return $this->query('SELECT * FROM tbl_specialization where specialization_id="'.$id.'"');
    }
    public function services_parameter($user_id){
        return $this->query('SELECT * FROM tbl_request r,tbl_services s where r.service_id=s.service_id and builder_id="'.$_SESSION['architectlogged']['builder_id'].'" and r.user_id="'.$user_id.'" and r.req_status=0 ');
    }
    public function request_details($req_id){
        return $this->query('SELECT * FROM tbl_request r,tbl_user s where r.user_id=s.user_id and builder_id="'.$_SESSION['architectlogged']['builder_id'].'" and r.request_id="'.$req_id.'" ');
    }





    public function edit_designIdeas($id){
        return $this->query('SELECT * FROM tbl_design_ideas where design_id="'.$id.'" and design_status=1');
    }
    public function edit_accomplished(){
        return $this->query('SELECT * FROM tbl_accomplished where accomp_id="'.$_GET['ide'].'" and accproj_status=1');
    }
    public function edit_serviceRates(){
        return $this->query('SELECT * FROM tbl_builder_services s,tbl_tier b where builder_service_id="'.$_GET['ide'].'" and s.tier_id=b.tier_id and builder_service_status=1');
    }
    public function edit_myservice(){
        return $this->query('SELECT * FROM tbl_myservices s,tbl_services b where myserve_id="'.$_GET['ide'].'" and s.service_id=b.service_id and my_status=1');
    }


    public function total_accomplished_count(){
         $query = $this->query('SELECT COUNT(accomp_id) as totalCount FROM tbl_accomplished');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_designIdeas_count(){
         $query = $this->query('SELECT COUNT(design_id) as totalCount FROM tbl_design_ideas where builder_id="'.$_SESSION['architectlogged']['builder_id'].'"');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_accomplishedProject_count(){
         $query = $this->query('SELECT COUNT(accomp_id) as totalCount FROM tbl_accomplished where builder_id="'.$_SESSION['architectlogged']['builder_id'].'"');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_serviceRates_count(){
         $query = $this->query('SELECT COUNT(builder_service_id) as totalCount FROM tbl_builder_services where builder_id="'.$_SESSION['architectlogged']['builder_id'].'"');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_clientProject_count(){
         $query = $this->query('SELECT COUNT(clientproject_id) as totalCount FROM tbl_clientproject where builder_id="'.$_SESSION['architectlogged']['builder_id'].'"');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }




}
$model = new model();
?>
<?php

function getLogID(){
         $result = '';
         $insa = 'Select * from tbl_logs where logger_type="Architect" and logger_id="'.$_SESSION['architectlogged']['builder_id'].'" and logs_status=1';
         
         $quer1 = mysql_query($insa);
         
         if( $awesome=mysql_fetch_assoc($quer1) ){
            $result=$awesome['log_id'];
         }
         return $result;
    }

// EDITING  --------//
function updateProfile($marfa){  
    if( filterExistingupdateProfile( $marfa['b_username'],$marfa['b_password']) == true){
          echo '<script>alert("Already exist on the database!");</script>';  
          //$_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_builder set
                b_fname = "'.$marfa['b_fname'].'",
                b_mname = "'.$marfa['b_mname'].'",
                b_lname = "'.$marfa['b_lname'].'",
                b_username = "'.$marfa['b_username'].'",
                b_password = "'.$marfa['b_password'].'",
                b_email = "'.$marfa['b_email'].'"
           
                
                where builder_id = "'.$marfa['builder_id'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Personal Information",1)');
            if(mysql_query($insa)){
               //$_POST['ok'] = 'Changes Succesfully Saved !';
              echo '<script>alert("Changes Succesfully Saved !");</script>';
              echo '<script>document.location.href="?logout"</script>';    
            }
    }
}
function filterExistingupdateProfile($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_username = "'.$marfa.'" and  b_password = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function editMyService($marfa){  


             $insa = 'Update tbl_myservices set
               
                cost = "'.$marfa['cost'].'",
                cost_details = "'.$marfa['cost_details'].'"
                where myserve_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Service",1)');
            if(mysql_query($insa)){
               echo '<script>alert("Changes Succesfully Saved !");</script>';
               //$_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
  }
function editServiceRate($marfa){  
   // if( filterExistingeditServiceRate( $marfa['service_cost_rangefrom']) == true){
        //echo '<script>alert("Already exist on the database!");</script>'; 
          //$_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
   // }else{

             $insa = 'Update tbl_builder_services set
                service_cost_rangefrom = "'.$marfa['service_cost_rangefrom'].'",
                service_cost_rangeto = "'.$marfa['service_cost_rangeto'].'"
                where builder_service_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Service Rates",1)');
            if(mysql_query($insa)){
               echo '<script>alert("Changes Succesfully Saved !");</script>';
               //$_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
   //}
}
function filterExistingeditServiceRate($marfa){
     $result = false;
     $insa = 'Select * from tbl_builder_services where service_cost_rangefrom = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function editDesignIdeas($marfa){  
    if( filterExistingeditDesignIdeas( $marfa['design_title']) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_design_ideas set
                design_title = "'.$marfa['design_title'].'",
                
                specialization_id = "'.$marfa['specialization_id'].'",
                design_cost = "'.$marfa['design_cost'].'"
                
                where design_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Design Ideas Information",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}
function filterExistingeditDesignIdeas($marfa){
     $result = false;
     $insa = 'Select * from tbl_design_ideas where design_title = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function editAccomplished($marfa){  
    if( filterExistingeditAccomplished( $marfa['accproj_title']) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_accomplished set
                specialization_id = "'.$marfa['specialization_id'].'",
                accproj_duration = "'.$marfa['accproj_duration'].'",
                accproj_date_started = "'.$marfa['accproj_date_started'].'",
                accproj_date_finished = "'.$marfa['accproj_date_finished'].'",
                accproj_title = "'.$marfa['accproj_title'].'",
                accproj_projectamount = "'.$marfa['accproj_projectamount'].'",
                accproj_servicefee_paid = "'.$marfa['accproj_servicefee_paid'].'"
                where accomp_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Accomplished Information",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}
function filterExistingeditAccomplished($marfa){
     $result = false;
     $insa = 'Select * from tbl_accomplished where accproj_title = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function editUser($marfa){  
    if( filterExistingEditCustomer( $marfa['user_fname'],$marfa['user_lname'] ) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_user set
                user_fname = "'.$marfa['user_fname'].'",
                user_mname = "'.$marfa['user_mname'].'",
                user_lname = "'.$marfa['user_lname'].'",
                user_contact = "'.$marfa['user_contact'].'",
                
                user_email = "'.$marfa['user_email'].'",
                user_username = "'.$marfa['user_username'].'",
                user_password = "'.$marfa['user_password'].'"
                where user_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated User Information",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}

function p_save($marfa){
    if(isset($_FILES['image_file'])){
      // Give the Complete Path of the folder where you want to save the image  
      $folder="accomplished_img/".$marfa['accompID'].".jpg";
      move_uploaded_file($_FILES["image_file"]["tmp_name"], "$folder".$_FILES["image_file"]["name"]);
      

      $uploadimage=$folder.$_FILES["image_file"]["name"];
      //$newname=$_FILES["image_file"]["name"];

      // Set the thumbnail name
      $thumbnail = $folder; 
      //$actual = $folder.".jpg";
      //$imgname=$newname."_thumbnail.jpg";

      // Load the mian image
      $source = imagecreatefromjpeg($uploadimage);

      // load the image you want to you want to be watermarked
      $watermark = imagecreatefrompng('img/sample2.png');

      // get the width and height of the watermark image
      $water_width = imagesx($watermark);
      $water_height = imagesy($watermark);

      // get the width and height of the main image image
      $main_width = imagesx($source);
      $main_height = imagesy($source);

      // Set the dimension of the area you want to place your watermark we use 0
      // from x-axis and 0 from y-axis 
      $dime_x = 0;
      $dime_y = 0;

      // copy both the images
      imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

      // Final processing Creating The Image
      imagejpeg($source, $thumbnail, 100);
      if( filterExistingTitle( $marfa['p_title'],$_SESSION['architectlogged']['builder_id']) == true){
          //$_POST['error']['exist'] = $marfa['p_title'].' Already exist in your records !';
          echo '<script>alert("Title Already Exists in Your Records !");</script>'; 
        }else{ 
                $insa = 'Insert into tbl_accomplished values(
                            NULL,
                            "'.$marfa['subcat'].'",
                            "'.$_SESSION['architectlogged']['builder_id'].'",
                            "'.$marfa['p_spec'].'",
                            "'.$marfa['p_duration'].' '.$marfa['p_period'].'",
                            "'.$marfa['p_start'].'",
                            "'.$marfa['p_finish'].'",
                            "'.$marfa['barangay'].'",
                            "'.ucwords($marfa['p_title']).'",
                            "'.$marfa['p_cost'].'",
                            "'.$marfa['p_service'].'",
                            "'.$marfa['p_detail'].'",
                            1
                            
                            
                            ) ';
                $logID=getLogID();
                mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Accomplished Project",1)');
                if(mysql_query($insa)){
                   echo '<script>alert("Succesfully Added");</script>'; 
                   //$_POST['ok'] = 'Succesfully Added';
                }
        }
    }
   else{
        echo '<script>alert("MALI")</script>';
   }
    
    
}

function addServiceRates($marfa){ //$checked_count = count($marfa['check_list']);
    $b=implode(",", $marfa['check_list']);
    if( filterExistingPackage( $marfa['interior'],$_SESSION['userlogged']['user_id']) == true){
      $_POST['error']['exist'] = 'You still have a pending request with the designer you have chosen';
      //echo '<script>alert("Project Name Already Exists in Your Records !");</script>'; 
    }else{ 
        $insa = 'Insert into tbl_appointment values(
                    NULL,
                    "'.$marfa['interior'].'",
                    "'.$marfa['style_id'].'",
                    "'.$marfa['from'].'",
                    "'.$marfa['to'].'",
                    "'.$b.'"," "," ",0,
                    "'.$marfa['address'].'",
                    "'.$_SESSION['userlogged']['user_id'].'",
                    3
                    
                    
                    ) ';
        $logID=getLogID();
        mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Request Appointment",1)');
        if(mysql_query($insa)){
           //echo '<script>alert("Succesfully Requested Appointment");</script>'; 
           $_POST['ok'] = 'Request Successfully Submitted';
        }
    } 
}
function requestArchitectService($marfa){ 
    if( filterExistingArchReq( $marfa['architect'],$_SESSION['userlogged']['user_id']) == true){
      $_POST['error']['exist'] = 'You still have a pending request with the architect you have chosen';
    }else{ //echo '<script>alert("ok1");</script>'; 
        $insa = 'Insert into tbl_request values(
                    NULL,
                    "'.$_SESSION['userlogged']['user_id'].'",
                    "'.$marfa['subcat'].'",
                    CURDATE(),CURTIME(),
                    "",
                    "",
                    "'.$marfa['architect'].'",
                    "'.$marfa['from'].'",
                    "'.$marfa['to'].'",
                    0
                    
                    
                    ) ';
        $logID=getLogID();//echo '<script>alert("ok2");</script>'; 
        mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Request Appointment",1)');
        if(mysql_query($insa)){ //echo '<script>alert("ok3");</script>'; 
           $_POST['ok'] = 'Request Successfully Submitted';
        }
    } 
}
function filterExistingTierRate($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder_services where tier_id = "'.$marfa.'" and builder_id = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function addMyService($marfa){
  if( filterExistingMyService( $marfa['service_id'],$_SESSION['architectlogged']['builder_id']) == true){
          $_POST['error']['exist'] =' Already exist in your records !';
          //echo '<script>alert("Service Already Exists in Your Records !");</script>'; 
  }else{ 
            $insa = 'Insert into tbl_myservices values(
              NULL,
              "'.$marfa['service_id'].'",
              "'.$_SESSION['architectlogged']['builder_id'].'",
              "'.$marfa['cost'].'",
              "'.$marfa['cost_details'].'",
              1
                            ) ';
                $logID=getLogID();
                mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added My Service",1)');
                if(mysql_query($insa)){
                  // echo '<script>alert("Succesfully Added");</script>'; 
                  // echo '<script>document.location.href="admin.php?page=viewMyService"</script>';
                  $_POST['ok'] = 'Succesfully Added';
                }
      }
}
function filterExistingMyService($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_myservices where service_id = "'.$marfa.'" and builder_id = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function d_save($marfa){
    if(isset($_FILES['image_filess'])){
      // Give the Complete Path of the folder where you want to save the image  
      $folders="design_img/".$marfa['desID'].".jpg";
      move_uploaded_file($_FILES["image_filess"]["tmp_name"], "$folders".$_FILES["image_filess"]["name"]);
      

      $uploadimages=$folders.$_FILES["image_filess"]["name"];
      //$newname=$_FILES["image_file"]["name"];

      // Set the thumbnail name
      $thumbnails = $folders; 
      //$actual = $folder.".jpg";
      //$imgname=$newname."_thumbnail.jpg";

      // Load the mian image
      $sources = imagecreatefromjpeg($uploadimages);

      // load the image you want to you want to be watermarked
      $watermarks = imagecreatefrompng('img/sample2.png');

      // get the width and height of the watermark image
      $water_widths = imagesx($watermarks);
      $water_heights = imagesy($watermarks);

      // get the width and height of the main image image
      $main_widths = imagesx($sources);
      $main_heights = imagesy($sources);

      // Set the dimension of the area you want to place your watermark we use 0
      // from x-axis and 0 from y-axis 
      $dime_xs = 0;
      $dime_ys = 0;

      // copy both the images
      imagecopy($sources, $watermarks, $dime_xs, $dime_ys, 0, 0, $water_widths, $water_heights);

      // Final processing Creating The Image
      imagejpeg($sources, $thumbnails, 100);

      if( filterExistingDesign( $marfa['design_title'],$_SESSION['architectlogged']['builder_id']) == true){
          //$_POST['error']['exist'] = $marfa['p_title'].' Already exist in your records !';
          echo '<script>alert("Title Already Exists in Your Records !");</script>'; 
        }else{ 
                $insa = 'Insert into tbl_design_ideas values(
                            NULL,
                            "'.$_SESSION['architectlogged']['builder_id'].'",
                            "'.ucwords($marfa['design_title']).'",
                            "'.$marfa['d_detail'].'",
                            "'.$marfa['subcat'].'",
                            "'.$marfa['d_spec'].'",
                            CURDATE(),
                            1,
                            "'.$marfa['d_cost'].'",
                            0
                            ) ';
                $logID=getLogID();
                mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Design",1)');
                if(mysql_query($insa)){
                   echo '<script>alert("Succesfully Added");</script>'; 
                   //$_POST['ok'] = 'Succesfully Added';
                }
        }
    }
   else{
        echo '<script>alert("MALI")</script>';
   }
    
    
}
function filterExistingDesign($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_design_ideas where design_title = "'.$marfa.'" and builder_id = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingTitle($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_accomplished where accproj_title = "'.$marfa.'" and builder_id = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingEditCustomer($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_user where user_fname = "'.$marfa.'" and user_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function editService($marfa){  
    if( filterExistingEditService( $marfa['service_type'] ) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_services set
                
                service_type = "'.$marfa['service_type'].'"
                where service_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Service",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}

//Add , Edit, Activate/Deactivate Customer -->
function approveReq_dateReq(){
    $quers = 'Update tbl_request set req_status=1, date_approved=CURDATE(), time_approved=CURTIME() where user_id= "'.$_GET['approveReq_userID'].'" and date_requested= "'.$_GET['approveReq_dateReq'].'" and builder_id="'.$_SESSION['architectlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Approved Request",1)');
    if(mysql_query($quers)){ 
        echo '<script>document.location.href="admin.php?page=allServReq"</script>';
    }
}
function disapproveReq_userID(){
    $quers = 'Update tbl_request set req_status=2 where user_id= "'.$_GET['disapproveReq_userID'].'" and date_requested= "'.$_GET['disapproveReq_dateReq'].'" and builder_id="'.$_SESSION['architectlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"disapproved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=pendingServReq"</script>';
    }
} 

function allDisapproveReq_userID(){
    $quers = 'Update tbl_request set req_status=2 where user_id= "'.$_GET['allDisapproveReq_userID'].'" and date_requested= "'.$_GET['disapproveReq_dateReq'].'" and builder_id="'.$_SESSION['architectlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"disapproved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=allServReq"</script>';
    }
}
function cateredReq_userID(){
    $quers = 'Update tbl_request set req_status=4 where user_id= "'.$_GET['cateredReq_userID'].'" and date_requested= "'.$_GET['caterReq_dateReq'].'" and builder_id="'.$_SESSION['architectlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"disapproved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=allServReq"</script>';
    }
}



function activateAccomplished(){
    $quers = 'Update tbl_accomplished set accproj_status=1 where accomp_id= "'.$_GET['actAccomplished'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Accomplished Project",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=viewAccomProj""</script>';
    }
}
function deactivateAccomplished(){
    $quers = 'Update tbl_accomplished set accproj_status=0 where accomp_id= "'.$_GET['deactAccomplished'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Accomplished Project",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=viewAccomProj""</script>';
    }
}
function activateServiceRates(){
    $quers = 'Update tbl_builder_services set builder_service_status=1 where builder_service_id= "'.$_GET['actServiceRates'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Service Rates",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=viewServiceRates""</script>';
    }
}
function deactivateServiceRates(){
    $quers = 'Update tbl_builder_services set builder_service_status=0 where builder_service_id= "'.$_GET['deactServiceRates'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Service Rates",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=viewServiceRates""</script>';
    }
}
function activateClientProject(){
    $quers = 'Update tbl_clientproject set project_status=1 where clientproject_id= "'.$_GET['actClientProject'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Client Project",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=viewClientProject""</script>';
    }
}
function deactivateClientProject(){
    $quers = 'Update tbl_clientproject set project_status=0 where clientproject_id= "'.$_GET['deactClientProject'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Client Project",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=viewClientProject""</script>';
    }
}

function activateDesignIdeas(){
    $quers = 'Update tbl_design_ideas set design_status=1 where design_id= "'.$_GET['actDesignIdeas'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated DesignIdeas",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=viewDesign""</script>';
    }
}
function deactivateDesignIdeas(){
    $quers = 'Update tbl_design_ideas set design_status=0 where design_id= "'.$_GET['deactDesignIdeas'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Design Ideas",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=viewDesign""</script>';
    }
}
function activateMyService(){
    $quers = 'Update tbl_myservices set my_status=1 where myserve_id= "'.$_GET['actMyService'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Service",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=viewMyService""</script>';
    }
}
function deactivateMyService(){
    $quers = 'Update tbl_myservices set my_status=0 where myserve_id= "'.$_GET['deactMyService'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Service",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=viewMyService""</script>';
    }
}

?>