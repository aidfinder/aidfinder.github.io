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
        $query = $this->query('SELECT * from tbl_contractor where contractor_username = "'.$post['contractor_username'].'" and contractor_password = "'.$post['contractor_password'].'" and contractor_status = 1');
        if($qwerty = $this->fetch($query)){
            $logged = mysql_query("INSERT INTO tbl_logs (logger_type,logger_id,login_date,login_time,logs_status)values('Contractor',".$qwerty['contractor_id'].",NOW(),CURTIME(),1)")or die(mysql_error()); 
            $_SESSION['contractorlogged'] = $qwerty;
            return true;
        }else{
            $_POST['error'] = '* Either Username or Password is Invalid';
        }
    }
    public function all_projectleads(){
        return $this->query('SELECT * FROM tbl_clientproject p, tbl_user u, tbl_subcategory s, tbl_building_category b, tbl_builder d where p.user_id=u.user_id and p.builder_id=d.builder_id and s.build_cat_id=b.build_cat_id and p.subcat_id=s.subcat_id');
    }
    public function all_clientproject(){
        return $this->query('SELECT * FROM tbl_clientproject a, tbl_user t , tbl_builder b where a.user_id=t.user_id and a.builder_id=b.builder_id');
    }
    public function count_client_posted_projects(){
        return $this->query('SELECT count(clientproject_id) FROM tbl_clientproject where project_status=1');
    }

















    public function total_accomplished_count(){
         $query = $this->query('SELECT COUNT(accomp_id) as totalCount FROM tbl_accomplished');
         $result = $this->fetch($query);
         return $result['totalCount'];
    }


    public function list_activityLog(){
        return $this->query('SELECT * FROM tbl_activity_log a, tbl_logs t where a.log_id=t.log_id and logger_type="Admin" and t.logger_Id = "'.$_SESSION['contractorlogged']['builder_id'].'" ');
    }
    public function list_Logs(){
        return $this->query('SELECT * FROM tbl_logs where logger_type="Architect" and logger_Id = "'.$_SESSION['contractorlogged']['builder_id'].'" ');
    }

    public function all_customer(){
        return $this->query('SELECT * FROM tbl_user ');
    }
    public function biddingMaxID(){
        return $this->query('SELECT max(t.bid_id)+1 FROM tbl_bids t');
    }
    public function getAccomplishedID(){
        return $this->query('SELECT max(t.accomp_id)+1 FROM tbl_accomplished t');
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
        return $this->query('SELECT * FROM tbl_services order by service_id asc ');
    }
    public function all_accomplished_project(){
        return $this->query('SELECT * FROM tbl_accomplished a, tbl_subcategory t, tbl_builder b, tbl_specialization s where a.subcat_id=t.subcat_id and a.builder_id=b.builder_id and a.specialization_id=s.specialization_id');
    }








    
    public function pending_request(){
        return $this->query('SELECT * FROM tbl_request where req_status=0 and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" group by user_id');
    }
    public function all_request(){
        return $this->query('SELECT * FROM tbl_request where builder_id="'.$_SESSION['contractorlogged']['builder_id'].'"');
    }
    public function user_parameter($id){
        return $this->query('SELECT * FROM tbl_user where user_id="'.$id.'"');
    }
    public function project_details($id){
        return $this->query('SELECT * FROM tbl_clientproject where clientproject_id="'.$id.'"');
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
    public function accomp_location($id){
        return $this->query('SELECT * FROM tbl_province p, tbl_municipality m, barangay b where p.prov_id=m.prov_id and m.mun_id=b.mun_id and b.barangay_id="'.$id.'";');
    }
    public function accomp_location_province($id){
        return $this->query('SELECT * FROM tbl_province p where p.prov_id="'.$id.'";');
    }
    public function accomp_location_municipality($id){
        return $this->query('SELECT * FROM tbl_municipality p where p.mun_id="'.$id.'";');
    }
    public function services_parameter($user_id){
        return $this->query('SELECT * FROM tbl_request r,tbl_services s where r.service_id=s.service_id and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" and r.user_id="'.$user_id.'" and r.req_status=0 ');
    }
    public function request_details($req_id){
        return $this->query('SELECT * FROM tbl_request r,tbl_user s where r.user_id=s.user_id and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" and r.request_id="'.$req_id.'" ');
    }
}
$model = new model();
?>
<?php

function getLogID(){
         $result = '';
         $insa = 'Select * from tbl_logs where logger_type="Contractor" and logger_id="'.$_SESSION['contractorlogged']['contractor_id'].'" and logs_status=1';
         
         $quer1 = mysql_query($insa);
         
         if( $awesome=mysql_fetch_assoc($quer1) ){
            $result=$awesome['log_id'];
         }
         return $result;
    }

// EDITING  --------//

function updateProfile($marfa){  
    if( filterExistingupdateProfile( $marfa['contractor_username'],$marfa['contractor_password']) == true){
          echo '<script>alert("Already exist on the database!");</script>';  
          //$_POST['error']['exist'] = '&nbsp;&nbsp;&nbsp;Already exist on the database!';
    }else{
             $insa = 'Update tbl_contractor set
                contractor_fname = "'.$marfa['contractor_fname'].'",
                contractor_mname = "'.$marfa['contractor_mname'].'",
                contractor_lname = "'.$marfa['contractor_lname'].'",
                contractor_email = "'.$marfa['contractor_email'].'",
                contractor_username = "'.$marfa['contractor_username'].'",
                contractor_password = "'.$marfa['contractor_password'].'"
                
           
                
                where contractor_id = "'.$marfa['contractor_id'].'"
                ';

            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Updated Contractor Information",1)');
            if(mysql_query($insa)){
               //$_POST['ok'] = 'Changes Succesfully Saved !';
              echo '<script>alert("Changes Succesfully Saved !");</script>';
              echo '<script>document.location.href="?logout"</script>';    
            }
    }
}
function filterExistingupdateProfile($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_contractor where contractor_username = "'.$marfa.'" and  contractor_password = "'.$marfa2.'"';
     
     $quer1 = mysql_query($insa);
     
     if( mysql_fetch_assoc($quer1) ){
        $result = true;
     }
     return $result;
}




















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
function filterExistingEditBuilder($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_builder where b_fname = "'.$marfa.'" and b_lname = "'.$marfa2.'"';
     
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
function submit_bid($marfa){
      
  if( filterExistingBid( $_GET['id'],$_SESSION['contractorlogged']['contractor_id']) == true){
      //$_POST['error']['exist'] = $marfa['p_title'].' Already exist in your records !';
      echo '<script>alert("You Already Posted Your Bid on this Project!");</script>'; 
    }else{ 
            $insa = 'Insert into tbl_bids values(
                        NULL,
                        "'.$_GET['id'].'",
                        "'.$_SESSION['contractorlogged']['contractor_id'].'",
                        CURDATE(),
                        1,
                        0
                        
                        
                        ) ';
            $logID=getLogID();
            mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Responded to Bid",1)');
            if(mysql_query($insa)){
               echo '<script>alert("Succesfully Posted Bid");</script>'; 
               //$_POST['ok'] = 'Succesfully Added';
            }
    }

    
}
function filterExistingBid($marfa,$marfa2){
     $result = false;
     $insa = 'Select * from tbl_bids where contractor_id = "'.$marfa2.'" and project_id = "'.$marfa.'"';
     
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
function approveReq_userID(){
    $quers = 'Update tbl_request set req_status=1, date_approved=CURDATE(), time_approved=CURTIME() where user_id= "'.$_GET['approveReq_userID'].'" and date_requested= "'.$_GET['approveReq_dateReq'].'" and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Approved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=pendingServReq"</script>';
    }
}
function disapproveReq_userID(){
    $quers = 'Update tbl_request set req_status=2 where user_id= "'.$_GET['disapproveReq_userID'].'" and date_requested= "'.$_GET['disapproveReq_dateReq'].'" and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"disapproved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=pendingServReq"</script>';
    }
} 

function allApproveReq_userID(){
    $quers = 'Update tbl_request set req_status=1, date_approved=CURDATE(), time_approved=CURTIME() where user_id= "'.$_GET['approveReq_userID'].'" and date_requested= "'.$_GET['approveReq_dateReq'].'" and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Approved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=allServReq"</script>';
    }
}
function allDisapproveReq_userID(){
    $quers = 'Update tbl_request set req_status=2 where user_id= "'.$_GET['disapproveReq_userID'].'" and date_requested= "'.$_GET['disapproveReq_dateReq'].'" and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"disapproved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=allServReq"</script>';
    }
}
function cateredReq_userID(){
    $quers = 'Update tbl_request set req_status=4 where user_id= "'.$_GET['disapproveReq_userID'].'" and date_requested= "'.$_GET['disapproveReq_dateReq'].'" and builder_id="'.$_SESSION['contractorlogged']['builder_id'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"disapproved Request",1)');
    if(mysql_query($quers)){
        echo '<script>document.location.href="admin.php?page=allServReq"</script>';
    }
}



function activateAccomplished(){
    $quers = 'Update tbl_accomplished set accproj_status=1 where accomp_id= "'.$_GET['actAccomplished'].'" ';
    $logID=getLogID();
    mysql_query('insert into tbl_activity_log values(NULL,"'.$logID.'",CURDATE(),CURTIME(),"Activated Accomplished Projec",1)');
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
?>