<?php
class models
{
    public $query;
    $conn = new mysqli("localhost","root","","panday");
    function __construct() {
     
    }
    public function fetch($post){
        return mysqli_fetch_array($post);
    } 
    public function query($post){
        return mysqli_query($conn,$post);
    }
    public function numrows($post){
        return mysqli_num_rows($post);
    }
    
   
    public function client_posted_projects_notif(){
        return $this->query('SELECT * FROM tbl_clientproject where dummy_status=0 and user_id="'.$_SESSION['userlogged']['user_id'].'"');
    }
    public function archi_parameter($id,$type){
        return $this->query('SELECT * FROM tbl_builder where builder_id="'.$id.'" and b_type="'.$type.'"');
    }

    public function __list_ArchitectAccomplishedProject(){
        return $this->query('SELECT * FROM tbl_accomplished');
    }
    public function __list_Architect(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Architect" and b_status=1');
    }
    public function __list_Interiors(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Interior Designer" and b_status=1');
    }
    public function __recommend_Architect($service,$budget){
        return $this->query('SELECT * FROM tbl_builder b, tbl_builder_services bs where b.builder_id=bs.builder_id and b.b_type="Architect" and bs.tier_id="'.$service.'" and bs.service_cost_rangefrom<="'.$budget.'" order by bs.service_cost_rangefrom ASC');
    }
    public function __list_Architect_limit($id,$id2,$type){
        return $this->query('SELECT * FROM tbl_builder where b_type="'.$type.'" and b_status="1" limit '.$id.','.$id2);
    }
    public function __list_Architect_count($type){
        return $this->query('SELECT count(builder_id) FROM tbl_builder where b_type="'.$type.'"');
    }
    public function count_clientproject(){
        return $this->query('SELECT count(clientproject_id) FROM tbl_clientproject where dummy_status=0 and user_id="'.$_SESSION['userlogged']['user_id'].'"');
    }
    public function __list_InteriorDesigner(){
        return $this->query('SELECT * FROM tbl_builder where b_type="Interior Designer"');
    }
    public function __list_myServices($builderID){
        return $this->query('SELECT * FROM tbl_myservices ms,tbl_services s where ms.service_id=s.service_id and ms.builder_id="'.$builderID.'"');
    }
    public function deletedumm(){
       return $this->query('DELETE FROM tbl_dummy;');
    }
    public function listDummy_Architect(){
       return $this->query('SELECT * FROM tbl_builder sh,tbl_dummy d where b_type="Architect" and sh.builder_id=d.builder_id order by d.distance ASC limit 10;');
    }
    public function count_listDummy_Architect(){
       return $this->query('SELECT count(sh.builder_id) FROM tbl_builder sh,tbl_dummy d where b_type="Architect" and sh.builder_id=d.builder_id order by d.distance ASC limit 10;');
    }
    public function listDummy_Interior(){
       return $this->query('SELECT * FROM tbl_builder sh,tbl_dummy d where b_type="Interior Designer" and sh.builder_id=d.builder_id order by d.distance ASC limit 10;');
    }
    public function count_listDummy_Interior(){
       return $this->query('SELECT count(sh.builder_id) FROM tbl_builder sh,tbl_dummy d where b_type="Interior Designer" and sh.builder_id=d.builder_id order by d.distance ASC limit 10;');
    }
    public function orderby_rating_avg($type){
       return $this->query('SELECT s.builder_id,s.b_username,s.b_type,s.b_address,AVG(t.rate) FROM tbl_rating t, tbl_builder s where t.builder_id=s.builder_id and s.b_type="'.$type.'" group by s.builder_id order by AVG(t.rate) desc limit 10');
    }
    public function orderby_rating_avg2($type){
       return $this->query('SELECT s.builder_id,s.b_username,s.b_birthdate,s.b_type,s.b_address,AVG(t.rate) FROM tbl_rating t, tbl_builder s where t.builder_id=s.builder_id and s.b_type="'.$type.'" group by s.builder_id order by AVG(t.rate) desc limit 3');
    }
   

    public function total_ArchitectAccomplishedProject_count(){
         $query = $this->query('SELECT COUNT(accomp_id) as totalCount FROM tbl_accomplished t, tbl_builder b where t.builder_id=b.builder_id');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_builderReviews($id){
         $query = $this->query('SELECT COUNT(review_id) as totalCount FROM tbl_review t where builder_id="'.$id.'"');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function total_clientproject($id){
         $query = $this->query('SELECT COUNT(clientproject_id) as totalCount FROM tbl_clientproject where dummy_status=0');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }
    public function getBuilderName($id){
         $query = $this->query('SELECT b_username as builder FROM tbl_builder where builder_id="'.$id.'"');
         $result = $this->fetch($query);
         return $result['builder'];
    }







    public function total_this_month_complaint(){
        $count=0;
        $query = $this->all_complaints();
            if( $result = $this->fetch($query) ){
                do{
                   $date = new DateTime();
                   $today = $date->format('Y-m');

                    $dateMonth = array();
                    $dateMonth = explode("-",$result['comp_date']);

                    if( $today == $dateMonth[0].'-'.$dateMonth[1] ){
                        $count++;
                    }
                }while($result = $this->fetch($query));
            }
        return $count;
    }
    public function rankingInDashboard(){
        $data="";
        $query = $this->query('SELECT * FROM tbldiagnosis');
        if( $result = $this->fetch($query) ){
            do{
                   $query2 = $this->query('SELECT diagnosisID, COUNT(complaintID) as totalID FROM tblcomplaintdiagnosis where diagnosisID = "'.$result['diagnosisID'].'" ');
                   $result2 = $this->fetch($query2);
                   $data += $result2['diagnosisID'].'-'.$result2['totalID'].';';
                   //$data1] = $result2['totalID'];
            }while($result = $this->fetch($query));
        }
        return $data;
    }
    
}
$models = new models();
?>
<?php

function getLogID(){
         $result = '';
         $insa = 'Select * from tbl_logs where logger_type="User" and logger_id="'.$_SESSION['userlogged']['user_id'].'" and logs_status=1';
         
         $quer1 = mysql_query($insa);
         
         if( $awesome=mysql_fetch_assoc($quer1) ){
            $result=$awesome['log_id'];
         }
         return $result;
    }

// EDITING  --------//
function editBuilder($marfa){  
    if( filterExistingEditBuilder( $marfa['b_fname'],$marfa['b_lname'] ) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_builder set
                b_fname = "'.$marfa['b_fname'].'",
                b_mname = "'.$marfa['b_mname'].'",
                b_lname = "'.$marfa['b_lname'].'",
                
                b_gender = "'.$marfa['b_gender'].'",
                
                b_type = "'.$marfa['b_type'].'",
                b_contact = "'.$marfa['b_contact'].'",
                b_username = "'.$marfa['b_username'].'",
                b_password = "'.$marfa['b_password'].'"
                where builder_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Builder Information",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}
function submitTestingan($marfa){ //$checked_count = count($marfa['check_list']);
    $b=implode(",", $marfa['check_list']);
    if( filterExistingApp( $marfa['interior'],$_SESSION['userlogged']['user_id']) == true){
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
function requestArchitectService($marfa){ //$checked_count = count($marfa['check_list']);
    $b=implode(",", $marfa['check_list']);
    if( filterExistingApp( $marfa['interior'],$_SESSION['userlogged']['user_id']) == true){
      $_POST['error']['exist'] = 'You still have a pending request with the designer you have chosen';
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
           $_POST['ok'] = 'Request Successfully Submitted';
        }
    } 
}
function postProj($marfa){
    if(isset($_FILES['image_file'])){
      // Give the Complete Path of the folder where you want to save the image  
      $folder="ARCHITECT ADMIN/clientproject_img/".$marfa['clientProjID'].".jpg";
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
      $watermark = imagecreatefrompng('images/sample2.png');

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
      if( filterExistingProject( $marfa['projTitle'],$_SESSION['userlogged']['user_id']) == true){
          //$_POST['error']['exist'] = $marfa['p_title'].' Already exist in your records !';
          echo '<script>alert("Project Name Already Exists in Your Records !");</script>'; 
        }else{ 
                $insa = 'Insert into tbl_clientproject values(
                            NULL,
                            
                            "'.$_SESSION['userlogged']['user_id'].'",
                            "'.$marfa['architect'].'",
                            "'.$marfa['subcat'].'",
                            "'.$marfa['projTitle'].'",
                            "'.$marfa['project_description'].'",
                            "'.$marfa['deadline_date'].'",
                            CURDATE(),
                            "'.$marfa['estimated_cost'].'",
                            "'.$marfa['spec'].'",
                            "'.$marfa['barangay'].'",
                            1
                            
                            
                            ) ';
                $logID=getLogID();
                mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Accomplished Project",1)');
                if(mysql_query($insa)){
                   echo '<script>alert("Succesfully Posted Project");</script>'; 
                   //$_POST['ok'] = 'Succesfully Added';
                }
        }
    }
   else{
        echo '<script>alert("MALI")</script>';
   }
    
    
}
function filterExistingProject($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_clientproject where project_title = "'.$marfa.'" and user_id = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingEditBuilder($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_fname = "'.$marfa.'" and b_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingApp($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_appointment where builder_id = "'.$marfa.'" and user_id = "'.$marfa2.'" and appointment_status=3';
     
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
function filterExistingEditService($marfa){
     $result = false;
     $insa = 'Select * from tbl_services where service_type = "'.$marfa.'"';
     
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
function filterExistingEditCategory($marfa){
     $result = false;
     $insa = 'Select * from tbl_building_category where building_category = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function editSubCategory($marfa){  
    if( filterExistingEditSubCategory( $marfa['subcategory'],$marfa['build_cat_id'] ) == true){
          $_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_subcategory set
                build_cat_id = "'.$marfa['build_cat_id'].'",
                subcategory = "'.$marfa['subcategory'].'"
                where subcat_id = "'.$marfa['proID'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Sub Category",1)');
            if(mysql_query($insa)){
               $_POST['ok'] = 'Changes Succesfully Saved !';
              //echo '<script>document.location.href="index.php?page=listProduct"</script>';   
            }
    }
}
function filterExistingEditSubCategory($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_subcategory where subcategory = "'.$marfa.'" and build_cat_id= "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
//Add , Edit, Activate/Deactivate Customer -->
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
function activateBuilder(){
    $quers = 'Update tbl_builder set b_status=1 where builder_id= "'.$_GET['actBuilder'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Builder",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listCustomer""</script>';
    }
}
function deactivateBuilder(){
    $quers = 'Update tbl_builder set b_status=0 where builder_id= "'.$_GET['deactBuilder'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Builder",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listBuilder""</script>';
    }
}
function activateService(){
    $quers = 'Update tbl_services set serv_status=1 where service_id= "'.$_GET['actService'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Service",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listService""</script>';
    }
}
function deactivateService(){
    $quers = 'Update tbl_services set serv_status=0 where service_id= "'.$_GET['deactService'].'" ';
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

function contractor_signupbutton($marfa){  
    if( filterExistingContractor( $marfa['contractor_fname'],$marfa['contractor_lname'] ) == true){
        echo '<script>alert("Somebody already got this account !")</script>';
    }else if( filterExistingContractorPhone( $marfa['contractor_contact']) == true){
        echo '<script>alert("Somebody already got this phone number !")</script>';
    }else if( filterExistingContractorEmail( $marfa['contractor_email'],$marfa['contractor_username'],$marfa['contractor_password']) == true){
        echo '<script>alert("Either the email, username or password was already taken by another user !")</script>';
    }else{ 
            $insa = 'Insert into tbl_contractor values(
                        NULL,
                        "'.ucwords($marfa['contractor_fname']).'",
                        "'.ucwords($marfa['contractor_mname']).'",
                        "'.ucwords($marfa['contractor_lname']).'",
                        "'.$marfa['contractor_gender'].'",
                        "'.$marfa['contractor_contact'].'",
                        "'.($marfa['contractor_address']).'",
                        "'.($marfa['contractor_email']).'",
                        "'.($marfa['contractor_dob']).'",
                        "'.($marfa['contractor_expertise']).'",
                        "'.($marfa['contractor_username']).'",
                        "'.($marfa['contractor_password']).'",
                        1
                        ) ';
            //$logID=getLogID();
            //mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Customer",1)');
            if(mysql_query($insa)){
                echo '<script>alert("Congratulations ! You have Succesfully Signed Up ! Sign in now !")</script>';
                echo '<script>document.location.href="index.php?page=homes"</script>';
               
               
            }
    }
}
function filterExistingContractorEmail($marfa,$marfa1,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_contractor where contractor_email = "'.$marfa.'" and contractor_username = "'.$marfa1.'" and contractor_password = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingContractor($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_contractor where contractor_fname = "'.$marfa.'" and contractor_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingContractorPhone($marfa){
     $result = false;
     $insa = 'Select * from tbl_contractor where contractor_contact = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}

function interior_signupbutton($marfa){
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
         move_uploaded_file($file_tmp,"architect pictures/".$marfa['archi_id'].".jpg");
       //echo '<script>alert("SUCCESS UPLOADING")</script>';
      }
      else{
         print_r($errors);
      }
   }else{
         //echo '<script>alert("MALI")</script>';
   }  
    if( filterExistingArchitect( $marfa['fname'],$marfa['lname'] ) == true){
        echo '<script>alert("Somebody already got this account !")</script>';
    }else if( filterExistingArchitectPhone( $marfa['phone']) == true){
        echo '<script>alert("Somebody already got this phone number !")</script>';
    }else if( filterExistingArchitectEmail( $marfa['email'],$marfa['username'],$marfa['password']) == true){
        echo '<script>alert("Either the email, username or password was already taken by another user !")</script>';
    }else{ 
            $insa = 'Insert into tbl_builder values(
                        NULL,
                        "'.ucwords($marfa['fname']).'",
                        "'.ucwords($marfa['mname']).'",
                        "'.ucwords($marfa['lname']).'",
                        "'.$marfa['gender'].'",
                        "'.($marfa['birthdate']).'",
                        "'.($marfa['address']).'",
                        "'.($marfa['type']).'",
                        "'.($marfa['username']).'",
                        "'.($marfa['password']).'",
                        1,
                        "'.$marfa['phone'].'",
                        "'.$marfa['latitude'].'",
                        "'.($marfa['longitude']).'",
                        "'.($marfa['email']).'",
                        "'.$marfa['expertise_id'].'"
                        ) ';
            //$logID=getLogID();
            //mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Customer",1)');
            if(mysql_query($insa)){
                echo '<script>alert("Congratulations ! You have Succesfully Signed Up ! Sign in now !")</script>';
                echo '<script>document.location.href="index.php?page=homes"</script>';
               
               
            }
    }
}
function archi_signupbutton($marfa){
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
         move_uploaded_file($file_tmp,"architect pictures/".$marfa['archi_id'].".jpg");
       //echo '<script>alert("SUCCESS UPLOADING")</script>';
      }
      else{
         print_r($errors);
      }
   }else{
         //echo '<script>alert("MALI")</script>';
   }  
    if( filterExistingArchitect( $marfa['fname'],$marfa['lname'] ) == true){
        echo '<script>alert("Somebody already got this account !")</script>';
    }else if( filterExistingArchitectPhone( $marfa['phone']) == true){
        echo '<script>alert("Somebody already got this phone number !")</script>';
    }else if( filterExistingArchitectEmail( $marfa['email'],$marfa['username'],$marfa['password']) == true){
        echo '<script>alert("Either the email, username or password was already taken by another user !")</script>';
    }else{ 
            $insa = 'Insert into tbl_builder values(
                        NULL,
                        "'.ucwords($marfa['fname']).'",
                        "'.ucwords($marfa['mname']).'",
                        "'.ucwords($marfa['lname']).'",
                        "'.$marfa['gender'].'",
                        "'.($marfa['birthdate']).'",
                        "'.($marfa['address']).'",
                        "'.($marfa['type']).'",
                        "'.($marfa['username']).'",
                        "'.($marfa['password']).'",
                        1,
                        "'.$marfa['phone'].'",
                        "'.$marfa['latitude'].'",
                        "'.($marfa['longitude']).'",
                        "'.($marfa['email']).'",
                        "'.$marfa['expertise_id'].'"
                        ) ';
            //$logID=getLogID();
            //mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Customer",1)');
            if(mysql_query($insa)){
                echo '<script>alert("Congratulations ! You have Succesfully Signed Up ! Sign in now !")</script>';
                echo '<script>document.location.href="index.php?page=homes"</script>';
               
               
            }
    }
}
function filterExistingArchitectEmail($marfa,$marfa1,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_email = "'.$marfa.'" and b_username = "'.$marfa1.'" and b_password = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingArchitect($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_fname = "'.$marfa.'" and b_lname = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingArchitectPhone($marfa){
     $result = false;
     $insa = 'Select * from tbl_builder where b_contact = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function signupbutton($marfa){
    if( filterExistingCustomer( $marfa['fname'],$marfa['lname'] ) == true){
        echo '<script>alert("Somebody already got this account !")</script>';
    }else if( filterExistingCustomerPhone( $marfa['phone']) == true){
        echo '<script>alert("Somebody already got this phone number !")</script>';
    }else if( filterExistingCustomerEmail( $marfa['email'],$marfa['username'],$marfa['password']) == true){
        echo '<script>alert("Either the email, username or password was already taken by another user !")</script>';
    }else{ 
            $insa = 'Insert into tbl_user values(
                        NULL,
                        "'.ucwords($marfa['fname']).'",
                        "'.ucwords($marfa['mname']).'",
                        "'.ucwords($marfa['lname']).'",
                        "'.$marfa['gender'].'",
                        "'.($marfa['birthdate']).'",
                        "'.($marfa['address']).'",
                        "'.$marfa['email'].'",
                        "'.($marfa['phone']).'",
                        "'.($marfa['username']).'",
                        "'.($marfa['password']).'",
                        "'.$marfa['latitude'].'",
                        "'.($marfa['longitude']).'",
                        "'.$marfa['title'].'",
                        1
                        
                        
                        ) ';
            //$logID=getLogID();
            //mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Customer",1)');
            if(mysql_query($insa)){
               // echo '<script>document.location.href="index.php?page=pay_option"</script>';
                echo '<script>alert("Congratulations ! You have Succesfully Signed Up ! Sign in now !")</script>';
               
            }
    }
}
function requestbutton($marfa){
  $insa = 'Insert into tbl_request values(
              NULL,
              "'.$_SESSION['userlogged']['user_id'].'",
              "'.$marfa['subcat'].'",
              CURDATE(),CURTIME(),
              "0000-00-00","00:00:00",
              "'.$marfa['details'].'",
              "'.$marfa['spec'].'",
              "'.$marfa['b_id'].'",
              1
              
              
              ) ';
  //$logID=getLogID();
  //mysql_query('insert into tbl_requestservices values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Customer",1)');
  //      echo '<script>alert("'.$marfa['mgaid'].'")</script>';

  if(mysql_query($insa)){
        $id = mysql_insert_id();
        $data = array();
         $data = explode(",", $marfa['mgaid'] );
         for( $a=0; $a<sizeof($data)-1; $a++){
            mysql_query('insert into tbl_requestservices values(NULL,"'.$data[$a].'","'.$id.'",1)');      
         }
         echo '<script>document.location.href="index.php?page=archi_services"</script>';
         echo '<script>alert("Succesfully Requested an Appointment")</script>';
    }
}
function submitAdRequest($marfa){
    if( filterExistingEmailForAdReq( $marfa['emailad'] ) == true){
        //echo '<script>alert("Email Already Exist !")</script>';
        $_POST['error']['exist'] = 'Email Already Exist !';
    }else{ 
            $insa = 'Insert into tbl_advertiser values(
                        NULL,
                        "'.$marfa['emailad'].'",
                        CURDATE(),
                        1
                        ) ';
            //$logID=getLogID();
            //mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Added New Customer",1)');
            if(mysql_query($insa)){
              echo '<script>document.location.href="index.php?page=homes"</script>';
              $_POST['ok'] = 'Request Successfully Submitted! Just checkout your email.';
            }
    }
}
function goRate($marfa){
    if( filterRating( $marfa['userID'],$marfa['architectID'] ) == true){
        echo '<script>alert("You already rated this architect!")</script>';
    }else{ 
            $insa = 'Insert into tbl_rating values(
                        NULL,
                        "'.$marfa['architectID'].'",
                        "'.$marfa['userID'].'",
                        "'.$marfa['rating'].'",
                        CURDATE(),CURTIME(),
                        1
                        ) ';
            if(mysql_query($insa)){
               echo '<script>alert("Thank you for rating !")</script>';
               
            }
    }
}
function submitReviewArchitect($marfa){
    if( filterReview( $marfa['userIDs'],$marfa['architectIDs'] ) == true){
        echo '<script>alert("You already reviewed this architect!")</script>';
    }else{ 
            $insa = 'Insert into tbl_review values(
                        NULL,
                        "'.$marfa['userIDs'].'",
                        "'.$marfa['architectIDs'].'",
                        "'.$marfa['message'].'",
                        CURDATE(),CURTIME(),
                        1
                        ) ';
            if(mysql_query($insa)){
               echo '<script>alert("Review successfully submitted !")</script>';
               
            }
    }
}
function submitUpdateReviewArchitect($marfa){
    $insa = 'Update tbl_review set message="'.$marfa['messages'].'" where review_id="'.$marfa['revID'].'";
                ) ';
    if(mysql_query($insa)){
       echo '<script>alert("Review successfully Updated !")</script>';
       
    }
}
function filterExistingCustomerEmail($marfa,$marfa1,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_user where user_email = "'.$marfa.'" and user_username = "'.$marfa1.'" and user_password = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterExistingEmailForAdReq($marfa){
     $result = false;
     $insa = 'Select * from tbl_advertiser where advertiser_email = "'.$marfa.'";';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterRating($marfa,$marfa1){
     $result = false;
     $insa = 'Select * from tbl_rating where user_id = "'.$marfa.'" and builder_id = "'.$marfa1.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function filterReview($marfa,$marfa1){
     $result = false;
     $insa = 'Select * from tbl_review where user_id = "'.$marfa.'" and builder_id = "'.$marfa1.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
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
function filterExistingCustomerPhone($marfa){
     $result = false;
     $insa = 'Select * from tbl_user where user_contact = "'.$marfa.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}
function activateYear(){
    $quers = 'Update tbl_year set status=1 where year_id= "'.$_GET['actYear'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Year",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listYear""</script>';
    }
}
function deactivateYear(){
    $quers = 'Update tbl_year set status=0 where year_id= "'.$_GET['deactYear'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Year",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listYear""</script>';
    }
}
function activateMake(){
    $quers = 'Update tbl_make set make_status=1 where make_id= "'.$_GET['actMake'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Vehicle Make",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listMake""</script>';
    }
}
function deactivateMake(){
    $quers = 'Update tbl_make set make_status=0 where make_id= "'.$_GET['deactMake'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Vehicle Make",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listMake""</script>';
    }
}
function activateModel(){
    $quers = 'Update tbl_model set model_status=1 where model_id= "'.$_GET['actModel'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Vehicle Model",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listModel""</script>';
    }
}
function deactivateModel(){
    $quers = 'Update tbl_model set model_status=0 where model_id= "'.$_GET['deactModel'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Vehicle Model",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listModel""</script>';
    }
}
function activateSubModel(){
    $quers = 'Update tbl_submodel set submodel_status=1 where submod_id= "'.$_GET['actSubModel'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Vehicle Model",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listModel""</script>';
    }
}
function deactivateSubModel(){
    $quers = 'Update tbl_submodel set submodel_status=0 where submod_id= "'.$_GET['deactSubModel'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Vehicle Model",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listSubmodel""</script>';
    }
}

function activateEngine(){
    $quers = 'Update tbl_engine set status=1 where engine_id= "'.$_GET['actEngine'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Engine",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=listService""</script>';
    }
}
function deactivateEngine(){
    $quers = 'Update tbl_engine set status=0 where engine_id= "'.$_GET['deactEngine'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Deactivated Engine",1)');
    if(mysql_query($quers)){
       echo '<script>document.location.href="admin.php?page=listEngine""</script>';
    }
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