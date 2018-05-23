<?php
class Json_Model{
    var $con;
    var $logged;
    var $dbhost;
    var $dbuser;
    var $dbpass;
    var $dbname;
    
    function __construct() {
      
        $this->dbhost = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass ="";
        $this->dbname = 'panday';  
        $this->InitDB();
    }
    function InitDB(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass)  or die(mysqli_error($this->con));
        mysqli_select_db($this->con, $this->dbname) or die(mysqli_error($this->con));    
    }
    function query($query){
        return mysqli_query($this->con,$query);
    }
    function free_result($query){
        return mysqli_free_result($query);
    }
    function num_rows($query){
        return mysqli_num_rows($query);
    }
    function fetch_data($query){
        return mysqli_fetch_assoc($query);
    }
    public function addNewCustomer($post){
        $query = $this->query('INSERT INTO tbl_user VALUES(
                            null,
                            "'.ucwords($post['s_fname']).'",
                            "'.ucwords($post['s_lname']).'",
                            "'.$post['s_contact_no'].'",
                            "'.$post['s_birthdate'].'",
                            "'.$post['s_email'].'",
                            "'.$post['s_username'].'",
                            "'.$post['s_password'].'",
                            "'.ucwords($post['s_gender']).'",
                            "'.ucwords($post['s_address']).'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    
    public function submitAdRequest($post){
        $query = $this->query('INSERT INTO tbl_advertiser VALUES(
                            null,
                            "'.$post['emailad'].'",
                            CURDATE(),1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA CUSTOMER*/
    public function filterExistingNameUser($s_fname,$s_lname){
        $query = $this->query('SELECT * FROM tbl_user WHERE fname = "'.$s_fname.'" and lname = "'.$s_lname.'"');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmailUser($s_email){
        $query = $this->query('SELECT * FROM tbl_user WHERE email = "'.$s_email.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmailForAdReq($email){
        $query = $this->query('SELECT * FROM tbl_advertiser WHERE advertiser_email = "'.$email.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsernameUser($s_username){
        $query = $this->query('SELECT * FROM tbl_user WHERE username = "'.$s_username.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/




    public function addyear($post){
        $query = $this->query('INSERT INTO tbl_year VALUES(
                            null,
                            "'.$post['year'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA MGA YEAR*/
    public function filterExistingYear($year){
        $query = $this->query('SELECT * FROM tbl_year WHERE year = "'.$year.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function addmake($post){
        $query = $this->query('INSERT INTO tbl_make VALUES(
                            null,
                             "'.$post['year_id'].'",
                             "'.$post['make_name'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA MGA MAKE*/
    public function filterExistingMake($make_name,$year_id){
        $query = $this->query('SELECT * FROM tbl_make WHERE make_name = "'.$make_name.'" and year_id= "'.$year_id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function addmodel($post){
        $query = $this->query('INSERT INTO tbl_model VALUES(
                            null,
                             "'.$post['make_id2'].'",
                             "'.$post['model_name'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA MGA MODEL*/
    public function filterExistingModel($model_name,$make_id2){
        $query = $this->query('SELECT * FROM tbl_model WHERE model_name = "'.$model_name.'" and make_id= "'.$make_id2.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function buildcategorydropdown($post){
            $data="";

            $query = $this->query('SELECT * from tbl_subcategory where build_cat_id = "'.$post['buildCat'].'" ');

            if($this->num_rows($query)>0){
                while($yu = $this->fetch_data($query)){
                    $data[] = $yu;

                }
                return $data;
            }else{
                return FALSE;
            }
    }
    public function municipalitydropdown($post){
            $data="";

            $query = $this->query('SELECT * from tbl_municipality where prov_id= "'.$post['idr'].'" ');

            if($this->num_rows($query)>0){
                while($yu = $this->fetch_data($query)){
                    $data[] = $yu;

                }
                return $data;
            }else{
                return FALSE;
            }
    }
    public function barangaydropdown($post){
            $data="";

            $query = $this->query('SELECT * from barangay where mun_id= "'.$post['municipyo'].'" ');

            if($this->num_rows($query)>0){
                while($yu = $this->fetch_data($query)){
                    $data[] = $yu;

                }
                return $data;
            }else{
                return FALSE;
            }
    }
    public function addsubmodel($post){
        $query = $this->query('INSERT INTO tbl_submodel VALUES(
                            null,
                            "'.$post['submod_type'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA MGA SUBMODEL*/
    public function filterExistingsubmodel($submod_type){
        $query = $this->query('SELECT * FROM tbl_submodel WHERE submod_type = "'.$submod_type.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function addservice($post){
        $query = $this->query('INSERT INTO tbl_service VALUES(
                            null,
                            "'.$post['service_type'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA MGA SERVICE*/
    public function filterExistingservice($service_type){
        $query = $this->query('SELECT * FROM tbl_service WHERE service_type = "'.$service_type.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function addengine($post){
        $query = $this->query('INSERT INTO tbl_engine VALUES(
                            null,
                            "'.$post['engine_type'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA MGA ENGINE*/
    public function filterExistingengine($engine_type){
        $query = $this->query('SELECT * FROM tbl_engine WHERE engine_type = "'.$engine_type.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }

    public function updateProfile($post){
        $query = $this->query('UPDATE tbl_admin SET
                           fname = "'.ucwords($post['fname']).'",
                           mname = "'.ucwords($post['mname']).'",
                           lname = "'.ucwords($post['lname']).'",
                           email = "'.$post['email'].'",
                           username = "'.$post['username'].'",
                           password = "'.$post['password'].'"
                           WHERE admin_id = "'.$post['ID'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function filterExistingAdmin($fname,$mname,$lname,$id){
        $query = $this->query('SELECT * FROM tbl_admin WHERE fname = "'.$fname.'" and mname = "'.$mname.'" and lname = "'.$lname.'" and admin_id != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmailAdmin($email,$id){
        $query = $this->query('SELECT * FROM tbl_admin WHERE email = "'.$email.'" and admin_id != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsernameAdmin($username,$id){
        $query = $this->query('SELECT * FROM tbl_admin WHERE username = "'.$username.'" and admin_id != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function updateSecurity($post){
        $query = $this->query('UPDATE tbl_admin SET
                           password = "'.$post['password'].'"
                           WHERE admin_id = "'.$post['admin_id'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }


















    /*UPDATING*/
    public function saveChangesSubCategory($post){
        $query = $this->query('UPDATE tblest_subcat SET
                         
                           subcategory = "'.$post['esubcategory'].'"
                           WHERE subcat_id = "'.$post['estID'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function editestsubcategory($id){
        $qwerty = $this->query('SELECT * FROM tblest_subcat where subcat_id= "'.$id.'" ');
        $data="";
        if($this->num_rows($qwerty)>0){
                while($yu = $this->fetch_data($qwerty)){
                    $data[] = $yu;
                }
                return $data;
        }else{
                return FALSE;
        }
    } 



    public function update_account($post){
        $query = $this->query('Update tbladmin set lname="'.$post['lname'].'",
                                                    fname="'.$post['fname'].'",
                                                    mname="'.$post['mname'].'",
                                                    email="'.$post['email'].'",
                                                    username="'.$post['username'].'",
                                                    password="'.$post['password'].'"
                                                    where admin_id = "'.$post['idd'].'"');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    
    /*ADDING*/
    public function addestablishmentcategory($post){
        $query = $this->query('INSERT INTO tblest_categ VALUES(
                            null,
                            "'.$post['est_category'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addestablishmentsubcategory($post){
        $query = $this->query('INSERT INTO tblest_subcat VALUES(
                            null,
                            "'.$post['est_categ_id'].'",
                            "'.$post['subcategory'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
   
    public function addNewTourist($post){
        $query = $this->query('INSERT INTO tbltourist VALUES(
                            null,
                            "'.ucwords($post['tlname']).'",
                            "'.ucwords($post['tfname']).'",
                            "'.ucwords($post['tmname']).'",
                            "'.$post['gender'].'",
                            "'.$post['tdob'].'",
                            "'.$post['contact'].'",
                            "'.ucwords($post['address']).'",
                            "'.ucwords($post['nationality']).'",
                            "'.$post['temail'].'",
                            "'.$post['tusername'].'",
                            "'.$post['tpassword'].'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewMunAdmin($post){
        $query = $this->query('INSERT INTO tblmun_admin VALUES(
                            null,
                            "'.ucwords($post['mfname']).'",
                            "'.ucwords($post['mlname']).'",
                            "'.ucwords($post['mmname']).'",
                            "'.$post['gender'].'",
                            "'.$post['mdob'].'",
                            "'.$post['contact'].'",
                            "'.ucwords($post['address']).'",
                            
                            "'.$post['memail'].'",
                            "'.$post['musername'].'",
                            "'.$post['mpassword'].'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addnationality($post){
        $query = $this->query('INSERT INTO tblnationality VALUES(
                            null,
                            "'.$post['nationalitytype'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewSightOwner($post){
        $query = $this->query('INSERT INTO tblsightowner VALUES(
                            null,
                            "'.ucwords($post['s_fname']).'",
                            "'.ucwords($post['s_mname']).'",
                            "'.ucwords($post['s_lname']).'",
                            "'.$post['gender'].'",
                            "'.$post['contact'].'",
                            "'.ucwords($post['address']).'",
                            "'.$post['temail'].'",
                            "'.$post['s_username'].'",
                            "'.$post['tpassword'].'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
   public function addNewSight($post){
        $query = $this->query('INSERT INTO tblsight VALUES(
                            null,
                            "'.ucwords($post['dname']).'",
                            "'.ucwords($post['downertype']).'",
                            "'.ucwords($post['ownerID']).'",
                            "'.$post['dcategory'].'",
                            "'.ucwords($post['daddress']).'",
                            "'.$post['dlongitude'].'",
                            "'.$post['dlatitude'].'",
                            "'.ucwords($post['dsightdetails']).'",
                            "1",
                            "'.$post['dmun'].'"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewEvent($post){
        $query = $this->query('INSERT INTO tblevent VALUES(
                            null,
                            "'.$post['dsight'].'",
                            "'.ucwords($post['devent']).'",
                            "'.$post['ddate'].'",
                            "'.$post['dtime'].''.$post['dtimeTo'].'",
                            "'.ucwords($post['deventdetails']).'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addcottage($post){
        $query = $this->query('INSERT INTO tblcottage VALUES(
                            null,
                             "'.$post['ssight'].'",
                             "'.$post['cott_type'].'",
                             "'.$post['max_person'].'",
                             "1",
                             "'.$post['cost'].'"
                            
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewEntrance($post){
        $query = $this->query('INSERT INTO tblentrancefee VALUES(
                            null,
                            "'.$post['e_sight'].'",
                            "'.$post['e_adult'].'",
                            "'.$post['e_agefrom'].'",
                            "'.$post['e_ageto'].'",
                            "'.$post['e_child'].'",
                            "'.$post['e_senior'].'",
                            "'.$post['e_tour'].'",
                            "'.$post['e_timefrom'].'",
                            "'.$post['e_timeto'].'",
                            
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }

    public function addridecategory($post){
        $query = $this->query('INSERT INTO tblride_category VALUES(
                            null,
                            "'.$post['ridetype'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addsightride($post){
        $query = $this->query('INSERT INTO tblsight_rides VALUES(
                            null,
                            "'.ucwords($post['dsight']).'",
                            "'.ucwords($post['dride']).'",
                            "'.$post['dfee'].'",
                            "'.$post['dduration'].'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }








    /*FILTERING SA MGA COTTAGE*/
    public function filterExistingCottages($ssight,$cott_type){
        $query = $this->query('SELECT * FROM tblcottage WHERE sight_id = "'.$ssight.'" and cott_type = "'.$cott_type.'"');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
     /*END FILTERING*/
    /*FILTERING SA MGA ENTRANCE*/
    public function filterExistingEntrance($esight,$e_tour){
        $query = $this->query('SELECT * FROM tblentrancefee WHERE sight_id = "'.$esight.'" and tourType = "'.$e_tour.'"');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
     /*END FILTERING*/

    /*FILTERING SA ESTABLISHMENT SUB CATEGORY*/
    public function filterExistingEstSubCategory($subcategory){
        $query = $this->query('SELECT * FROM tblest_subcat WHERE subcategory = "'.$subcategory.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    /*FILTERING SA MGA ESTABLISHMENT CATEGORY*/
    public function filterExistingEstCategory($est_category){
        $query = $this->query('SELECT * FROM tblest_categ WHERE est_category = "'.$est_category.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    /*FILTERING SA MGA NATIONALITY*/
    public function filterExistingnationality($nationalitytype){
        $query = $this->query('SELECT * FROM tblnationality WHERE nationality = "'.$nationalitytype.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    
    /*END FILTERING*/

    /*FILTERING SA MGA TOURIST*/
    public function filterExistingTourist($tfname,$tlname,$tmname){
        $query = $this->query('SELECT * FROM tbltourist WHERE fname = "'.$tfname.'" and lname = "'.$tlname.'" and mname = "'.$tmname.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmailTourist($temail){
        $query = $this->query('SELECT * FROM tbltourist WHERE email = "'.$temail.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsernameTourist($tusername){
        $query = $this->query('SELECT * FROM tbltourist WHERE username = "'.$tusername.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    /*FILTERING SA MGA SIGHT OWNER*/
    public function filterExistingOwner($s_fname,$s_lname,$s_mname){
        $query = $this->query('SELECT * FROM tblsightowner WHERE fname = "'.$s_fname.'" and lname = "'.$s_lname.'" and mname = "'.$s_mname.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmailOwner($temail){
        $query = $this->query('SELECT * FROM tblsightowner WHERE email = "'.$temail.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsernameOwner($s_username){
        $query = $this->query('SELECT * FROM tblsightowner WHERE s_username = "'.$s_username.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    /*FILTERING SA MGA SIGHT*/
    public function filterExistingSight($name){
        $query = $this->query('SELECT * FROM tblsight WHERE sight_name = "'.$name.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingLongitude($longitude){
        $query = $this->query('SELECT * FROM tblsight WHERE longitude = "'.$longitude.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingLatitude($latitude){
        $query = $this->query('SELECT * FROM tblsight WHERE latitude = "'.$latitude.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    /* FILTERING SA MGA EVENTS */
    public function filterExistingEventdetails($eventdetails){
        $query = $this->query('SELECT * FROM tblevent WHERE event_details = "'.$eventdetails.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    /* FILTERING SA MGA COTTAGE */
    public function filterExistingCottagetype($cottagetype){
        $query = $this->query('SELECT * FROM tblcottage WHERE cott_type = "'.$cottagetype.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    /*FILTERING SA MGA RIDE CATEGORY*/
    public function filterExistingRideCategory($ridetype){
        $query = $this->query('SELECT * FROM tblride_category WHERE ride_type = "'.$ridetype.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/
    /*FILTERING SA MGA TOURIST*/
    public function filterExistingMunAdmin($mfname,$mlname,$mmname){
        $query = $this->query('SELECT * FROM tblmun_admin WHERE fname = "'.$mfname.'" and lname = "'.$mlname.'" and mname = "'.$mmname.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmailMunAdmin($memail){
        $query = $this->query('SELECT * FROM tblmun_admin WHERE email = "'.$memail.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsernameMunAdmin($musername){
        $query = $this->query('SELECT * FROM tblmun_admin WHERE username = "'.$musername.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/


    
    













































































    public function deactivateFeature($post){

        $query = $this->query('UPDATE tblfeature set status = 0 where feature_id = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function activateFeature($post){

        $query = $this->query('UPDATE tblfeature set status = 1 where feature_id = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }




    public function saveChangesCategory($post){
        $query = $this->query('UPDATE tblcategory SET
                           
                           category = "'.$post['category'].'"
                           WHERE cat_id = "'.$post['CATID'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }

    public function btn_category_id($post){

        $query = $this->query('UPDATE tblcategory set category="'.$post['cd_wordd'].'"
                                                    where cat_id = "'.$post['cd_idd'].'"');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }


























































    public function filterExistingStaff($fname,$lname,$mname){
        $query = $this->query('SELECT * FROM tblstaff WHERE fname = "'.$fname.'" and lname = "'.$lname.'" and mname = "'.$mname.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }

    public function filterExistingStudent_FOR_edit($fname,$lname,$mname,$id){
        $query = $this->query('SELECT * FROM tblstudent WHERE fname = "'.$fname.'" and lname = "'.$lname.'" and mname = "'.$mname.'" and studentID != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmail($email){
        $query = $this->query('SELECT * FROM tblstudent WHERE email = "'.$email.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmail_staff($email){
        $query = $this->query('SELECT * FROM tblstaff WHERE email = "'.$email.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmail_FOR_edit($email,$id){
        $query = $this->query('SELECT * FROM tblstudent WHERE email = "'.$email.'" and studentID != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingStudent_FOR_edit_staff($fname,$lname,$mname,$id){
        $query = $this->query('SELECT * FROM tblstaff WHERE fname = "'.$fname.'" and lname = "'.$lname.'" and mname = "'.$mname.'" and staffID != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    
    
    public function filterExistingUsername($username){
        $query = $this->query('SELECT * FROM tblstudent WHERE username = "'.$username.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsername_staff($username){
        $query = $this->query('SELECT * FROM tblstaff WHERE username = "'.$username.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsername_FOR_edit($username,$id){
        $query = $this->query('SELECT * FROM tblstudent WHERE username = "'.$username.'" and studentID != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingMedicine_for_Add($medname,$type){
        $query = $this->query('SELECT * FROM tblmedicine WHERE medicine_Name = "'.$medname.'" and type = "'.$type.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingMedicine_for_edit($medname,$type,$id){
        $query = $this->query('SELECT * FROM tblmedicine WHERE medicine_Name = "'.$medname.'" and type = "'.$type.'" and medicineID != "'.$id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*FILTERING*/

    /*INSERTING*/
    public function submitMessage($post){
        $query = $this->query('INSERT INTO tblconversation VALUES(
                            null, 
                            "'.$post['complaintIDReply'].'",
                            "'.$post['staffIDReply'].'",
                            "STAFF",
                            "'.$post['replyM'].'",                      
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function createAccount($post){
        $query = $this->query('INSERT INTO tblstudent VALUES(
                            null,
                            "'.ucwords($post['Sfname']).'",
                            "'.ucwords($post['Slname']).'",
                            "'.ucwords($post['Smname']).'",
                            "'.$post['Sphone'].'",
                            "'.$post['Sgender'].'",
                            "'.$post['Semail'].'",
                            "'.$post['Saddress'].'",
                            "'.$post['Suname'].'",
                            "'.$post['Spassword'].'",
                            "'.$post['Scourse'].'",
                            "'.$post['Syear'].'-'.$post['Smonth'].'-'.$post['Sday'].'",
                            "'.$post['Sguardianname'].'",
                            "'.$post['Sguardianaddress'].'",
                            "'.$post['Sweight'].'",
                            "'.$post['Sheight'].'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewStudent($post){
    	$query = $this->query('INSERT INTO tblstudent VALUES(
                            null,
                            "'.ucwords($post['Sfname']).'",
                            "'.ucwords($post['Slname']).'",
                            "'.ucwords($post['Smname']).'",
                            "'.$post['Sphone'].'",
                            "'.$post['Sgender'].'",
                            "'.$post['Semail'].'",
                            "'.$post['Saddress'].'",
                            "'.$post['Suname'].'",
                            "'.$post['Spassword'].'",
                            "'.$post['Scourse'].'",
                            "'.$post['Syear'].'-'.$post['Smonth'].'-'.$post['Sday'].'",
                            "'.$post['Sguardianname'].'",
                            "'.$post['Sguardianaddress'].'",
                            "'.$post['Sweight'].'",
                            "'.$post['Sheight'].'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewMedicine($post){
        $query = $this->query('INSERT INTO tblmedicine VALUES(
                            null,
                            "'.$post['medicineName'].'",
                            "'.$post['medType'].'"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addStockMedicine($post){
        $query = $this->query('INSERT INTO tblmedicinestocks VALUES(
                            null,
                            "'.$post['medicineIDStock'].'",
                            "'.$post['pieces'].'",
                            CURDATE(),
                            "'.$post['staffID'].'"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function editStockMedicine($post){
        $query = $this->query('UPDATE tblmedicinestocks set pieces = "'.$post['pieces'].'" where medicinestockID = "'.$post['medicineIDStock'].'"  ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewIllness($post){
        $query = $this->query('INSERT INTO tbldiagnosis VALUES(
                            null,
                            "'.$post['iN'].'",
                            "'.$post['iD'].'"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function viewDiagnosis($post){
        $data="";
        $query = $this->query('SELECT * FROM tblcomplaintdiagnosis cd,tbldiagnosis d  WHERE cd.diagnosisID=d.diagnosisID and cd.complaintID = "'.$post['complaintID'].'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    } 
    public function viewMedType($post){
        $data="";
        $query = $this->query('SELECT * FROM tblmedicine where medicine_Name = "'.$post['medname'].'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    }
    public function viewPrescribedMed($post){
        $data="";
        $query = $this->query('SELECT * FROM tbldiagnosismedicine cd,tblmedicine d  WHERE cd.medicineID=d.medicineID and cd.diagnosisID = "'.$post['diagnosisID'].'" and cd.status=1');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    }
    public function editDiagnosisModal($post){
        $data="";
        $query = $this->query('SELECT * FROM tbldiagnosis WHERE diagnosisID = "'.$post.'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    } 
    public function editMedicineStockModal($post){
        $data="";
        $query = $this->query('SELECT * FROM tblmedicine m, tblmedicinestocks ms WHERE m.medicineID = ms.medicineID and ms.medicinestockID = "'.$post.'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    } 
    public function editMedicineModal($post){
        $data="";
        $query = $this->query('SELECT * FROM tblmedicine WHERE medicineID = "'.$post.'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    } 
    public function viewMessagesForConversation($post){
        $data="";
        $query = $this->query('SELECT * FROM tblconversation WHERE complaintID = "'.$post['complaintID'].'" order by conversationID ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    }
    public function searchForThisIllness($post){
        $data="";
        $query = $this->query('SELECT * FROM tbldiagnosis d,tblmedicine m,tbldiagnosismedicine dm  WHERE 
                                                        d.diagnosisID = dm.diagnosisID and
                                                        dm.medicineID = m.medicineID and
                                                        d.diagnosis_Name = "'.$post['illnessName'].'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    } 
    public function searchForMedicine($post){
        $data="";
        $query = $this->query('SELECT * FROM tbldiagnosis d,tblmedicine m,tbldiagnosismedicine dm  WHERE 
                                                        d.diagnosisID = dm.diagnosisID and
                                                        dm.medicineID = m.medicineID and
                                                        d.diagnosis_Name = "'.$post['illnessName'].'" and dm.status = 1');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    } 
    public function searchForThisIllnessFiltering($post){
        $data="";
        $query = $this->query('SELECT * FROM tbldiagnosis d, tblcomplaintdiagnosis c where c.diagnosisID = d.diagnosisID and d.diagnosis_Name = "'.$post['illnessName'].'" and c.complaintID = "'.$post['complaintID'].'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    }
    public function dataForBarGraph1($post){
        $data="";
        $data1="";
        

        $jan = $this->query('SELECT COUNT(complaintID) as jan FROM tblcomplaint where comp_date like "%'.$post['year'].'-01%" ');
        if($janR = $this->fetch_data($jan)){
            $data1 = $janR;
        }else{
            $data1 = 0;
        }
        return $data1;
    }
    public function dataForBarGraph2($post){
        $data="";
        $data2="";
        
        $feb = $this->query('SELECT COUNT(complaintID) as feb FROM tblcomplaint where comp_date like "%'.$post['year'].'-02%" ');
        if($febR = $this->fetch_data($feb)){
            $data2 = $febR['feb'];
        }else{
            $data2 = 0;
        }
        return $data2;
    }  

    public function dataForBarGraph3($post){
        $data="";
        $data3="";
       
        $mar = $this->query('SELECT COUNT(complaintID) as mar FROM tblcomplaint where comp_date like "%'.$post['year'].'-03%" ');
        if($marR = $this->fetch_data($mar)){
             $data3 = $marR['mar'];
        }else{
             $data3 = 0;
        }
        return $data3;
    }
    public function dataForBarGraph4($post){
        $data="";
        $data4="";
       
        $apr = $this->query('SELECT COUNT(complaintID) as apr FROM tblcomplaint where comp_date like "%'.$post['year'].'-04%" ');
        if( $aprR = $this->fetch_data($apr)){
            $data4 = $aprR['apr'];
        }else{
            $data4 = 0;
        }
        return $data4;
    }   
    public function dataForBarGraph5($post){
        $data="";
        $data5="";
        
        $may = $this->query('SELECT COUNT(complaintID) as may FROM tblcomplaint where comp_date like "%'.$post['year'].'-05%" ');
        if( $mayR = $this->fetch_data($may)){
            $data5 = $mayR['may'];
        }else{
            $data5 = 0;
        }
        return $data5;
    }
    public function dataForBarGraph6($post){
        $data="";
        $data6="";
       
        $jun = $this->query('SELECT COUNT(complaintID) as jun FROM tblcomplaint where comp_date like "%'.$post['year'].'-06%" ');
        if($junR = $this->fetch_data($jun)){
            $data6 = $junR['jun'];
        }else{
            $data6 = 0;
        }
        return $data6;
    }
    public function dataForBarGraph7($post){
        $data="";
        $data7="";
       
        $jul = $this->query('SELECT COUNT(complaintID) as jul FROM tblcomplaint where comp_date like "%'.$post['year'].'-07%" ');
        if($julR = $this->fetch_data($jul)){
            $data7 = $julR['jul'];
        }else{
            $data7 = 0;
        }
        return $data7;
    }
    public function dataForBarGraph8($post){
        $data="";
        $data8="";
            

        $aug = $this->query('SELECT COUNT(complaintID) as aug FROM tblcomplaint where comp_date like "%'.$post['year'].'-08%" ');
        if($augR = $this->fetch_data($aug)){
            $data8 = $augR['aug'];
        }else{
            $data8 = 0;
        }
        return $data8;
    }
    public function dataForBarGraph9($post){
        $data="";
        $data9="";
        
        $sep = $this->query('SELECT COUNT(complaintID) as sep FROM tblcomplaint where comp_date like "%'.$post['year'].'-09%" ');
        if($sepR = $this->fetch_data($sep)){
             $data9 = $sepR['sep'];
        }else{
             $data9 = 0;
        }
        return $data9;
    }
    public function dataForBarGraph10($post){
        $data="";
        $data10="";
       
        $oct = $this->query('SELECT COUNT(complaintID) as oct FROM tblcomplaint where comp_date like "%'.$post['year'].'-10%" ');
        if($octR = $this->fetch_data($oct)){
            $data10 = $octR['oct'];
        }else{
            $data10 = 0;
        }
        return $data10;
    }
    public function dataForBarGraph11($post){
        $data="";
        $data11="";
        
        $nov = $this->query('SELECT COUNT(complaintID) as nov FROM tblcomplaint where comp_date like "%'.$post['year'].'-11%" ');
        if($novR = $this->fetch_data($nov)){
            $data11 = $novR['nov'];
        }else{
            $data11 = 0;
        }
        return $data11;
    } 
    public function dataForBarGraph12($post){
        $data="";
        $data12="";  
        
        $dec = $this->query('SELECT COUNT(complaintID) as dece FROM tblcomplaint where comp_date like "%'.$post['year'].'-12%" ');
        if($decR = $this->fetch_data($dec)){
            $data12 = $decR['dece'];
        }else{
            $data12 = 0;
        } 
        //$data= array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12);
       
        return $data12;
       
    }
    public function searchForThisMedicineInComplaintDiagnosis($post){
        $data="";
        $query = $this->query('SELECT * FROM tblcompdiagnosismedicine c, tblmedicine m where c.medicineID = m.medicineID and m.medicine_Name = "'.$post['medicineName'].'" and c.tblComDiagID = "'.$post['complaintDiagID'].'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    }
    public function searchForThisMedicineFiltering($post){
        $data="";
        $query = $this->query('SELECT * FROM tbldiagnosis d, tbldiagnosismedicine c, tblmedicine m where c.diagnosisID = d.diagnosisID and c.medicineID = m.medicineID and m.medicine_Name = "'.$post['illnessName'].'" and d.diagnosisID = "'.$post['diagnosisID'].'" and c.status=1');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;
            }
            return $data;
        }else{
            return FALSE;
        }
    }
    public function submitPresMedicineOfDiagnosis($post){
        $medicineArray = array();
        $medicineArray = explode(";",$post['allmedicine']); 
        $size = sizeof($medicineArray);

        $piecesArray = array();
        $piecesArray = explode(";",$post['piecesmedicine']); 
     
        for($a=0; $a<($size-1); $a++){
            $search = $this->query('SELECT * FROM tblmedicine where medicine_Name = "'.$medicineArray[$a].'" ');
            $result = $this->fetch_data( $search );

            $query = $this->query('INSERT INTO tblcompdiagnosismedicine VALUES(
                            null,
                            "'.$post['complaintDiagID'].'",
                            "'.$result['medicineID'].'",
                            "'.$piecesArray[$a].'"
                             )');
        }

        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function submitMedicineOfDiagnosis($post){
        $illnessArray = array();
        $illnessArray = explode(";",$post['allIllness']); 
        $size = sizeof($illnessArray);

        for($a=0; $a<($size-1); $a++){
            $search = $this->query('SELECT * FROM tblmedicine where medicine_Name = "'.$illnessArray[$a].'" ');
            $result = $this->fetch_data( $search );
            $query = $this->query('INSERT INTO tbldiagnosismedicine VALUES(
                            null,
                            "'.$post['diagnosisID'].'",
                            "'.$result['medicineID'].'",
                            "1"
                             )');
        }

        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function submitDiagnosisOfComplaint($post){
        $illnessArray = array();
        $illnessArray = explode(";",$post['allIllness']); 
        $size = sizeof($illnessArray);

        for($a=0; $a<($size-1); $a++){
            $search = $this->query('SELECT * FROM tbldiagnosis where diagnosis_Name = "'.$illnessArray[$a].'" ');
            $result = $this->fetch_data( $search );
            $query = $this->query('INSERT INTO tblcomplaintdiagnosis VALUES(
                            null,
                            "'.$post['complaintID'].'",
                            "'.$result['diagnosisID'].'",
                            CURDATE()
                             )');
        }
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function addNewStaff($post){
        $query = $this->query('INSERT INTO tblstaff VALUES(
                            null,
                            "'.ucwords($post['Sfname']).'",
                            "'.ucwords($post['Slname']).'",
                            "'.ucwords($post['Smname']).'",
                            "'.$post['Sphone'].'",
                            "'.$post['Sgender'].'",
                            "'.$post['Semail'].'",
                            "'.$post['Saddress'].'",
                            "'.$post['Suname'].'",
                            "'.$post['Spassword'].'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*INSERTING*/

    /*UPDATING*/

    public function saveChangesStudent($post){
        $query = $this->query('UPDATE tblstudent SET
                           fname = "'.ucwords($post['Sfname']).'",
                           lname = "'.ucwords($post['Slname']).'",
                           mname = "'.ucwords($post['Smname']).'",
                           contactno =  "'.$post['Sphone'].'",
                           gender = "'.$post['Sgender'].'",
                           email = "'.$post['Semail'].'",
                           address = "'.$post['Saddress'].'",
                           username = "'.$post['Suname'].'",
                           courseID = "'.$post['Scourse'].'",
                           guardianName = "'.$post['Sguardianname'].'",
                           guardianAddress = "'.$post['Sguardianaddress'].'",

                           weight = "'.$post['Sweight'].'",
                           height = "'.$post['Sheight'].'",

                           birthdate = "'.$post['Syear'].'-'.$post['Smonth'].'-'.$post['Sday'].'",
                           password = "'.$post['Spassword'].'"
                           WHERE studentID = "'.$post['SID'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
   

    public function saveChangesMedicine($post){
        $query = $this->query('UPDATE tblmedicine SET
                           medicine_Name = "'.$post['medicineName'].'",
                           type = "'.$post['medType'].'"
                           WHERE medicineID = "'.$post['medicneID'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function saveChangesStaff($post){
        $query = $this->query('UPDATE tblstaff SET
                           fname = "'.ucwords($post['Sfname']).'",
                           lname = "'.ucwords($post['Slname']).'",
                           mname = "'.ucwords($post['Smname']).'",
                           contactno =  "'.$post['Sphone'].'",
                           gender = "'.$post['Sgender'].'",
                           email = "'.$post['Semail'].'",
                           address = "'.$post['Saddress'].'",
                           username = "'.$post['Suname'].'",
                           password = "'.$post['Spassword'].'"
                           WHERE staffID = "'.$post['SID'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function saveIllnessEdit($post){
        $query = $this->query('UPDATE tbldiagnosis SET
                           diagnosis_Name = "'.$post['illnessName'].'",
                           details = "'.$post['illnessDetails'].'"
                           WHERE diagnosisID = "'.$post['diagnosisID'].'"
                             ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function deactivateStudent ($post){

        $query = $this->query('UPDATE tblstudent set status = 0 where studentID = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function removeDiagnosis($post){

        $query = $this->query('DELETE from tblcomplaintdiagnosis where tblComDiagID = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function removeThisMedicineOnCompDiagnosis($post,$post2){

        $query = $this->query('DELETE from tblcompdiagnosismedicine where tblComDiagID = "'.$post2.'" and medicineID= "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function removePrescribedMed($post){

        $query = $this->query('UPDATE tbldiagnosismedicine set status = 0 where diagnosismedicineID = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function activateStudent($post){

        $query = $this->query('UPDATE tblstudent set status = 1 where studentID = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    public function deactivateStaff($post){

        $query = $this->query('UPDATE tblstaff set status = 0 where staffID = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
     public function activateStaff($post){

        $query = $this->query('UPDATE tblstaff set status = 1 where staffID = "'.$post.'" ');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*UPDATING*/

    /*SEARCHING*/
    public function editmodalstudent($id){
        $qwerty = $this->query('SELECT * FROM tblstudent where studentID= "'.$id.'" ');
        $data="";
        if($this->num_rows($qwerty)>0){
                while($yu = $this->fetch_data($qwerty)){
                    $data[] = $yu;
                }
                return $data;
        }else{
                return FALSE;
        }
    } 
    public function editmodalstaff($id){
        $qwerty = $this->query('SELECT * FROM tblstaff where staffID= "'.$id.'" ');
        $data="";
        if($this->num_rows($qwerty)>0){
                while($yu = $this->fetch_data($qwerty)){
                    $data[] = $yu;
                }
                return $data;
        }else{
                return FALSE;
        }
    } 
    public function what_student_name($id){
        $qwerty = $this->query('SELECT * FROM tblstudent where studentID= "'.$id.'" ');
        $result = $this->fetch_data($qwerty);
        return $result['fname'].' '. $result['lname'];
    }
    public function what_course_acro($id){
        $qwerty = $this->query('SELECT * FROM tblcourse where courseID= "'.$id.'" ');
        $result = $this->fetch_data($qwerty);
        return $result['courseAcro'];
    }
    public function what_staff_name($id){
        $qwerty = $this->query('SELECT * FROM tblstaff where staffID= "'.$id.'" ');
        $result = $this->fetch_data($qwerty);
        return $result['fname'].' '. $result['lname'];
    } 
    /*SEARCHING*/

}
$model = new json_model();

?>
