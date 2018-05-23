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
        $query = $this->query('SELECT * from tbl_admin where ad_username = "'.$post['adminusername'].'" and ad_password = "'.$post['adminpassword'].'" and ad_status = 1');
        if($qwerty = $this->fetch($query)){
            $logged = mysql_query("INSERT INTO tbl_logs (logger_type,logger_id,login_date,login_time,logs_status)values('Admin',".$qwerty['admin_id'].",NOW(),CURTIME(),1)")or die(mysql_error()); 
            $_SESSION['adminlogged'] = $qwerty;
            return true;
        }else{
            $_POST['error'] = '* Either Username or Password is Invalid';
        }
    }
   
    public function all_customer(){
        return $this->query('SELECT * FROM tbl_user ');
    }
    public function all_advertiser(){
        return $this->query('SELECT * FROM tbl_advertiser');
    }
    public function all_advertisements(){
        return $this->query('SELECT * FROM tbl_advertisement');
    }
    public function all_buildingcategory(){
        return $this->query('SELECT * FROM tbl_building_category order by build_cat_id asc ');
    }
    public function all_builderInterior(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Interior Designer"');
    }
    public function all_builderArchitect(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Architect"');
    }
    public function all_builderArchitectLimit(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Architect" limit 4');
    }
    public function list_subcategory(){
        return $this->query('SELECT * FROM tbl_subcategory m, tbl_building_category y where m.build_cat_id=y.build_cat_id');
    }
    public function all_service(){
        return $this->query('SELECT * FROM tbl_services order by service_id asc ');
    }
    public function all_specialization(){
        return $this->query('SELECT * FROM tbl_specialization order by specialization_id asc ');
    }
    public function all_expertise(){
        return $this->query('SELECT * FROM tbl_expertise order by expertise_id asc ');
    }
    public function all_province(){
        return $this->query('SELECT * FROM tbl_province order by prov_id asc ');
    }
    public function all_municipality(){
        return $this->query('SELECT * FROM tbl_municipality');
    }
    public function list_activityLog(){
        return $this->query('SELECT * FROM tbl_activity_log a, tbl_logs t where a.log_id=t.log_id and logger_type="Admin" and t.logger_Id = "'.$_SESSION['adminlogged']['admin_id'].'" ');
    }
    public function list_Logs(){
        return $this->query('SELECT * FROM tbl_logs order by log_id desc');
    }
    public function getAdverID(){
        return $this->query('SELECT max(advertisement_id)+1 FROM tbl_advertisement');
    }

    public function edit_expertise(){
        return $this->query('SELECT * FROM tbl_expertise where expertise_id="'.$_GET['ide'].'"');
    }
    public function edit_buildingcategory(){
        return $this->query('SELECT * FROM tbl_building_category where build_cat_id="'.$_GET['ide'].'"');
    }
     public function edit_subbuildingcategory(){
        return $this->query('SELECT * FROM tbl_subcategory s, tbl_building_category n where s.build_cat_id=n.build_cat_id and subcat_id="'.$_GET['ide'].'"');
    }
     public function edit_specialization(){
        return $this->query('SELECT * FROM tbl_specialization where specialization_id="'.$_GET['ide'].'"');
    }
    public function edit_service(){
        return $this->query('SELECT * FROM tbl_services where service_id="'.$_GET['ide'].'"');
    }





    public function total_service_count(){
         $query = $this->query('SELECT COUNT(service_id) as totalCount FROM tbl_services');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_user_count(){
         $query = $this->query('SELECT COUNT(user_id) as totalCount FROM tbl_user');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_architect_count(){
         $query = $this->query('SELECT COUNT(builder_id) as totalCount FROM tbl_builder where b_type="Architect"');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_interiorDesigner_count(){
         $query = $this->query('SELECT COUNT(builder_id) as totalCount FROM tbl_builder where b_type="Interior Designer"');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_specialization_count(){
         $query = $this->query('SELECT COUNT(specialization_id) as totalCount FROM tbl_specialization');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_buildingcategory_count(){
         $query = $this->query('SELECT COUNT(build_cat_id) as totalCount FROM tbl_building_category');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_subcategory_count(){
         $query = $this->query('SELECT COUNT(m.subcat_id) as totalCount FROM tbl_subcategory m, tbl_building_category y where m.build_cat_id=y.build_cat_id');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }





    public function all_listArchitect(){
        return $this->query('SELECT * FROM tbl_builder where builder_id="'.$_GET['ide'].'" and b_status=1');
    }
    public function all_listInterior(){
        return $this->query('SELECT * FROM tbl_builder where builder_id="'.$_GET['ide'].'" and b_status=1');
    }

    
}
$model = new model();
?>
<?php

function getLogID(){
         $result = '';
         $insa = 'Select * from tbl_logs where logger_type="Admin" and logger_id="'.$_SESSION['adminlogged']['admin_id'].'" and logs_status=1';
         
         $quer1 = mysql_query($insa);
         
         if( $awesome=mysql_fetch_assoc($quer1) ){
            $result=$awesome['log_id'];
         }
         return $result;
    }

// EDITING  --------//
function addAdvertisement($marfa){
    if(isset($_FILES['imgss'])){
      $nameerror;
      $errors= array();
   //   $file_name = $_FILES['imgss']['name'];
      $file_size =$_FILES['imgss']['size'];
      $file_tmp =$_FILES['imgss']['tmp_name'];
      $file_type=$_FILES['imgss']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['imgss']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
        }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"advertisement_img/".$marfa['adverID'].".jpg");
       //echo '<script>alert("SUCCESS UPLOADING")</script>';
      }
      else{
         print_r($errors);
      }
   }else{
         //echo '<script>alert("MALI")</script>';
   }  
    if( filterExistingAdvertisement( $marfa['adTitle']) == true){
        echo '<script>alert("This title was already posted !")</script>';
    }else{ 
            $insa = 'Insert into tbl_advertisement values(
                        NULL,
                        "'.$_GET['advertiserID'].'",
                        "'.($marfa['adDetails']).'",
                        "'.$marfa['adTitle'].'",
                        1,
                        CURDATE()
                        ) ';
            //$logID=getLogID();
            //mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Customer",1)');
            if(mysql_query($insa)){
                echo '<script>alert("Advertisement Succesfully Posted !")</script>';
                echo '<script>document.location.href="admin.php?page=listAdvertisements"</script>';
               
               
            }
    }
}
function editArchitect($marfa){  
    if( filterExistingEditArchitect( $marfa['b_fname'],$marfa['b_lname'] ) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Somebody already got this account !';

    }else if( filterExistingEditArchitectPhone( $marfa['b_contact']) == true){
        $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Somebody already got this phone number !';
        //echo '<script>alert("Somebody already got this phone number !")</script>';
    }else if( filterExistingEditArchitectEmail( $marfa['b_email']) == true){
        $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;The email was already taken by another user !';
       // echo '<script>alert("Either the email, username or password was already taken by another user !")</script>';
    }else{
             $insa = 'Update tbl_builder set
                b_fname = "'.$marfa['b_fname'].'",
                b_mname = "'.$marfa['b_mname'].'",
                b_lname = "'.$marfa['b_lname'].'",
                b_contact = "'.$marfa['b_contact'].'",
                b_email = "'.$marfa['b_email'].'"
                
                where builder_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Architect Information",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}
function filterExistingEditArchitect($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_fname = "'.$marfa.'" and b_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingEditArchitectEmail($marfa){
     $result = false;
     $insa = 'Select * from tbl_builder where b_email = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingAdvertisement($marfa){
     $result = false;
     $insa = 'Select * from tbl_advertisement where advertisement_title = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingEditArchitectPhone($marfa){
     $result = false;
     $insa = 'Select * from tbl_builder where b_contact = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function editInterior($marfa){  
    if( filterExistingEditInterior( $marfa['b_fname'],$marfa['b_lname'] ) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Somebody already got this account !';

    }else if( filterExistingEditInteriorPhone( $marfa['b_contact']) == true){
        $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Somebody already got this phone number !';
        //echo '<script>alert("Somebody already got this phone number !")</script>';
    }else if( filterExistingEditInteriorEmail( $marfa['b_email']) == true){
        $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;The email was already taken by another user !';
       // echo '<script>alert("Either the email, username or password was already taken by another user !")</script>';
    }else{
             $insa = 'Update tbl_builder set
                b_fname = "'.$marfa['b_fname'].'",
                b_mname = "'.$marfa['b_mname'].'",
                b_lname = "'.$marfa['b_lname'].'",
                b_contact = "'.$marfa['b_contact'].'",
                b_email = "'.$marfa['b_email'].'"
                
                where builder_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Interior Designer Information",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}
function filterExistingEditInterior($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_fname = "'.$marfa.'" and b_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingEditInteriorEmail($marfa){
     $result = false;
     $insa = 'Select * from tbl_builder where b_email = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function filterExistingEditInteriorPhone($marfa){
     $result = false;
     $insa = 'Select * from tbl_builder where b_contact = "'.$marfa.'"';
     
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
                
                service_type = "'.$marfa['service_type'].'",
                service_details = "'.$marfa['service_details'].'"
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
function filterExistingEditService($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_services where service_type = "'.$marfa.'" ';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function editCategory($marfa){  
    if( filterExistingEditCategory( $marfa['building_category'] ) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_building_category set
                
                building_category = "'.$marfa['building_category'].'"
                where build_cat_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Category",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}

//Add , Edit, Activate/Deactivate Customer -->
function activateAdvertisement(){
    $quers = 'Update tbl_advertisement set advertisement_status=1 where advertisement_id= "'.$_GET['actAdvertisement'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Advertisement",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listAdvertisements""</script>';
    }
}
function deactivateAdvertisement(){
    $quers = 'Update tbl_advertisement set advertisement_status=0 where advertisement_id= "'.$_GET['deactAdvertisement'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Advertisement",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listAdvertisements""</script>';
    }
}
function activateExpertise(){
    $quers = 'Update tbl_expertise set ex_status=1 where expertise_id= "'.$_GET['actExpertise'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Expertise",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listExpertise""</script>';
    }
}
function deactivateExpertise(){
    $quers = 'Update tbl_expertise set ex_status=0 where expertise_id= "'.$_GET['deactExpertise'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Expertise",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listExpertise""</script>';
    }
}
function activateMun(){
    $quers = 'Update tbl_municipality set mun_status=1 where mun_id= "'.$_GET['actMun'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Municipality",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listMunicipality""</script>';
    }
}
function deactivateMun(){
    $quers = 'Update tbl_municipality set mun_status=0 where mun_id= "'.$_GET['deactMun'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Municipality",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listMunicipality""</script>';
    }
}
function activateCustomer(){
    $quers = 'Update tbl_user set user_status=1 where user_id= "'.$_GET['actCustomer'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Customer",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listCustomer""</script>';
    }
}
function deactivateCustomer(){
    $quers = 'Update tbl_user set user_status=0 where user_id= "'.$_GET['deactCustomer'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Customer",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listCustomer""</script>';
    }
}

function activateArchitect(){
    $quers = 'Update tbl_builder set b_status=1 where builder_id= "'.$_GET['actArchitect'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Builder",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listArchitect""</script>';
    }
}
function deactivateArchitect(){
    $quers = 'Update tbl_builder set b_status=0 where builder_id= "'.$_GET['deactArchitect'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Builder",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listArchitect""</script>';
    }
}

function activateInterior(){
    $quers = 'Update tbl_builder set b_status=1 where builder_id= "'.$_GET['actInterior'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Builder",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listInterior""</script>';
    }
}
function deactivateInterior(){
    $quers = 'Update tbl_builder set b_status=0 where builder_id= "'.$_GET['deactInterior'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Builder",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listInterior""</script>';
    }
}

function activateService(){
    $quers = 'Update tbl_services set service_status=1 where service_id= "'.$_GET['actService'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Service",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listService""</script>';
    }
}
function deactivateService(){
    $quers = 'Update tbl_services set service_status=0 where service_id= "'.$_GET['deactService'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Service",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listService""</script>';
    }
}
function activateBuildingCategory(){
    $quers = 'Update tbl_building_category set building_status=1 where build_cat_id= "'.$_GET['actBuildingCategory'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Building Category",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listBuildingCategory""</script>';
    }
}
function approveAdvertiser(){
    $quers = 'Update tbl_advertiser set advertiser_status=2 where advertiser_id= "'.$_GET['approveAdvertiser'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Approved Advertisers Request ",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=adrequests""</script>';
    }
}
function disApproveAdvertiser(){
    $quers = 'Update tbl_advertiser set advertiser_status=3 where advertiser_id= "'.$_GET['disApproveAdvertiser'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Disapproved Advertisers Request ",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=adrequests""</script>';
    }
}
function deactivateBuildingCategory(){
    $quers = 'Update tbl_building_category set building_status=0 where build_cat_id= "'.$_GET['deactBuildingCategory'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Building Category",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listBuildingCategory""</script>';
    }
}
function activateSubCategory(){
    $quers = 'Update tbl_subcategory set subcat_status=1 where subcat_id= "'.$_GET['actSubCategory'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Sub Category",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listSubCategory""</script>';
    }
}
function deactivateSubCategory(){
    $quers = 'Update tbl_subcategory set subcat_status=0 where subcat_id= "'.$_GET['deactSubCategory'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Sub Category",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listSubCategory""</script>';
    }
}
function activateSpecialization(){
    $quers = 'Update tbl_specialization set specialization_status=1 where specialization_id= "'.$_GET['actSpecialization'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Specialization",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listSpecialization""</script>';
    }
}
function deactivateSpecialization(){
    $quers = 'Update tbl_specialization set specialization_status=0 where specialization_id= "'.$_GET['deactSpecialization'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Specialization",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listSpecialization""</script>';
    }
}
function activateProvince(){
    $quers = 'Update tbl_province set prov_status=1 where prov_id= "'.$_GET['actProvince'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Province",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listProvince""</script>';
    }
}
function deactivateProvince(){
    $quers = 'Update tbl_province set prov_status=0 where prov_id= "'.$_GET['deactProvince'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Province",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listProvince""</script>';
    }
}





function addMunicipality($marfa){
    if( filterExistingMun( $marfa['m_name'],$marfa['prov_id'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_municipality values(
                        NULL,
                        "'.$marfa['prov_id'].'",
                        "'.ucwords($marfa['m_name']).'",
                        "'.$marfa['zipcode_id'].'",
                        "'.$marfa['lat'].'",
                        "'.$marfa['long'].'",
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Municipality",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
               
            }
    }
}

function filterExistingMun($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_municipality where m_name = "'.$marfa.'" and prov_id = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function addProvince($marfa){
    if( filterExistingProvince( $marfa['name'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_province values(
                        NULL,
                        "'.ucwords($marfa['name']).'",
                        
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Province",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
               
            }
    }
}
function filterExistingProvince($marfa){
     $result = false;
     $insa = 'Select * from tbl_province where name = "'.$marfa.'" ';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function addSpecialization($marfa){
    if( filterExistingSpecialization( $marfa['specialization'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_specialization values(
                        NULL,
                        "'.ucwords($marfa['specialization']).'",
                        
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Specialization",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
               
            }
    }
}
function filterExistingSpecialization($marfa){
     $result = false;
     $insa = 'Select * from tbl_specialization where specialization = "'.$marfa.'" ';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function addExpertise($marfa){
    if( filterExistingExpertise( $marfa['expertise'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_expertise values(
                        NULL,
                        "'.ucwords($marfa['expertise']).'",
                        "'.ucwords($marfa['ex_dec']).'",
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Expertise",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
               
            }
    }
}
function filterExistingExpertise($marfa){
     $result = false;
     $insa = 'Select * from tbl_expertise where expertise = "'.$marfa.'" ';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function addsubcategory($marfa){
    if( filterExistingSubCat( $marfa['subcategory'],$marfa['build_cat_id'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_subcategory values(
                        NULL,
                        "'.$marfa['build_cat_id'].'",
                        "'.ucwords($marfa['subcategory']).'", 
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Sub Category",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
               
            }
    }
}

function filterExistingSubCat($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_subcategory where subcategory = "'.$marfa.'" and build_cat_id = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function addBuildingCategory($marfa){
    if( filterExistingBuildingCat( $marfa['building_category'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_building_category values(
                        NULL,
                        "'.ucwords($marfa['building_category']).'",
                        
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Building Category",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
               
            }
    }
}
function filterExistingBuildingCat($marfa){
     $result = false;
     $insa = 'Select * from tbl_building_category where building_category = "'.$marfa.'" ';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}


function addservice($marfa){
    if( filterExistingService( $marfa['service_type'],$marfa['service_category'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_services values(
                        NULL,
                        "'.ucwords($marfa['service_type']).'",
                        "'.ucwords($marfa['service_category']).'",
                        "'.ucwords($marfa['service_details']).'",
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Service",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';

            }
    }
}
function filterExistingService($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_services where service_type = "'.$marfa.'" and service_category = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}


function addNewBuilder($marfa){
    if( filterExistingBuilder( $marfa['b_fname'],$marfa['b_lname'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_builder values(
                        NULL,
                        "'.ucwords($marfa['b_fname']).'",
                        "'.ucwords($marfa['b_mname']).'",
                        "'.ucwords($marfa['b_lname']).'",
                        "'.ucwords($marfa['b_gender']).'",
                        "'.($marfa['b_birthdate']).'",
                        "'.ucwords($marfa['b_address']).'",
                        "'.($marfa['b_type']).'",
                        "'.($marfa['b_username']).'",
                        "'.($marfa['b_password']).'",
                        1,
                        "'.($marfa['b_contact_no']).'",
                        "'.($marfa['b_latitude']).'",
                        "'.($marfa['b_longitude']).'",
                        "'.($marfa['b_email']).'"
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Builder",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
            }
    }
}
function filterExistingBuilder($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_fname = "'.$marfa.'" and b_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function addNewCustomer($marfa){
    if( filterExistingCustomer( $marfa['user_fname'],$marfa['user_lname'] ) == true){
          $_POST['error']['exist'] = ' Already exist on the database !';
    }else{ 
            $insa = 'Insert into tbl_user values(
                        NULL,
                        "'.ucwords($marfa['user_fname']).'",
                        "'.ucwords($marfa['user_mname']).'",
                        "'.ucwords($marfa['user_lname']).'",
                        "'.ucwords($marfa['user_gender']).'",
                        "'.($marfa['user_birthdate']).'",
                        "'.ucwords($marfa['user_address']).'",
                        "'.($marfa['user_email']).'",
                        "'.($marfa['user_contact_no']).'",
                        "'.($marfa['user_username']).'",
                        "'.($marfa['user_password']).'",
                        "'.($marfa['user_latitude']).'",
                        "'.($marfa['user_longitude']).'",
                        "'.($marfa['user_title']).'",
                        1
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Client",1)');
            if(mysql_query($insa)){
               
               $_POST['ok'] = 'Succesfully Added';
            }
    }
}
function filterExistingCustomer($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_user where user_fname = "'.$marfa.'" and user_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function editExpertise($marfa){  
   if( filterExistingeditExpertise( $marfa['expertise']) == true){
        echo '<script>alert("Already exist on the database!");</script>'; 
          //$_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
}else{

             $insa = 'Update tbl_expertise set
                expertise = "'.$marfa['expertise'].'",
                ex_desc = "'.$marfa['ex_desc'].'"
                where expertise_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Expertise",1)');
            if(mysql_query($insa)){
              // echo '<script>alert("Changes Succesfully Saved !");</script>';
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="admin.php?page=listExpertise"</script>';   
            }
   }
}
function filterExistingeditExpertise($marfa){
     $result = false;
     $insa = 'Select * from tbl_expertise where expertise = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function editBuildingCategory($marfa){  
   if( filterExistingeditBuildingCategory( $marfa['building_category']) == true){
        echo '<script>alert("Already exist on the database!");</script>'; 
          //$_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
}else{

             $insa = 'Update tbl_building_category set
               
                building_category = "'.$marfa['building_category'].'"
                where build_cat_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Building Category",1)');
            if(mysql_query($insa)){
              // echo '<script>alert("Changes Succesfully Saved !");</script>';
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="admin.php?page=listExpertise"</script>';   
            }
   }
}
function filterExistingeditBuildingCategory($marfa){
     $result = false;
     $insa = 'Select * from tbl_building_category where building_category = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function editSubCategory($marfa){  
             $insa = 'Update tbl_subcategory set
               
                subcategory = "'.$marfa['subcategory'].'"
                where subcat_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Sub-Building Category",1)');
            if(mysql_query($insa)){
              // echo '<script>alert("Changes Succesfully Saved !");</script>';
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="admin.php?page=listExpertise"</script>';   
            }
}
function editSpecialization($marfa){  
   if( filterExistingeditSpecialization( $marfa['specialization']) == true){
        //echo '<script>alert("Already exist on the database!");</script>'; 
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
}else{

             $insa = 'Update tbl_specialization set
                specialization = "'.$marfa['specialization'].'"
                where specialization_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Specialization",1)');
            if(mysql_query($insa)){
              // echo '<script>alert("Changes Succesfully Saved !");</script>';
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="admin.php?page=listExpertise"</script>';   
            }
   }
}
function filterExistingeditSpecialization($marfa){
     $result = false;
     $insa = 'Select * from tbl_specialization where specialization = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

















function changeStatus(){ 
    if($_GET['stat']==0){     
            $quers = 'Update tbl_schedule set schedstatus=1,dateapproved=CURDATE() where sched_id= "'.$_GET['changeStatus'].'" ';
            if(mysql_query($quers)){
            echo '<script>document.location.href="admin.php?page=listReservation""</script>';
            }
    }else{
      echo '<script>alert(" Action is Invalid, Only Pending appointment must be Approved/Disapproved !")</script>';
  
   }      
}             
 function decline(){
     if($_GET['stat']==0){
            $quers = 'Update tbl_schedule set schedstatus=2 where sched_id= "'.$_GET['decline'].'" ';
            if(mysql_query($quers)){
                echo '<script>document.location.href="admin.php?page=listReservation""</script>';
            }
    }else{
      echo '<script>alert(" Action is Invalid, Only Pending appointment must be Approved/Disapproved !")</script>';
  
   }    
}      
function done(){
     if($_GET['stat']==1){
            $quers = 'Update tbl_schedule set schedstatus=4,datefinished=CURDATE() where sched_id= "'.$_GET['done'].'" ';
            if(mysql_query($quers)){
                echo '<script>document.location.href="admin.php?page=listReservation""</script>';
            }
    }else{
       echo '<script>alert(" Action is Invalid, Only Reserved appointment must be have status to be Done !")</script>';
  
   }    
}   

?>