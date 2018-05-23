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
                            "'.ucwords($post['s_mname']).'",
                            "'.ucwords($post['s_lname']).'",
                            "'.ucwords($post['s_gender']).'",
                            "'.$post['s_birthdate'].'",
                            "'.ucwords($post['s_address']).'",
                            "'.$post['s_email'].'",
                            "'.$post['s_contact_no'].'",
                            "'.$post['s_username'].'",
                            "'.$post['s_password'].'",
                            "'.$post['s_latitude'].'",
                            "'.$post['s_longitude'].'",
                            "'.ucwords($post['s_title']).'",
                            "1"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA CUSTOMER "'.ucwords($post['citybarangay']).', '.ucwords($post['town']).', '.ucwords($post['province']).'",*/
    public function filterExistingNameUser($s_fname,$s_lname){
        $query = $this->query('SELECT * FROM tbl_user WHERE user_fname = "'.$s_fname.'" and user_lname = "'.$s_lname.'"');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingEmailUser($s_email){
        $query = $this->query('SELECT * FROM tbl_user WHERE user_email = "'.$s_email.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function filterExistingUsernameUser($s_username){
        $query = $this->query('SELECT * FROM tbl_user WHERE user_username = "'.$s_username.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    public function addNewBuilder($post){
        $query = $this->query('INSERT INTO tbl_builder VALUES(
                            null,
                            "'.ucwords($post['s_fname']).'",
                            "'.ucwords($post['s_mname']).'",
                            "'.ucwords($post['s_lname']).'",
                            "'.ucwords($post['s_gender']).'",
                            "'.$post['s_birthdate'].'",
                            "'.ucwords($post['s_address']).'",
                            "'.ucwords($post['s_type']).'",
                            "'.$post['s_username'].'",
                            "'.$post['s_password'].'",
                            "1",
                            "'.$post['s_contact_no'].'",
                            "'.$post['s_latitude'].'",
                            "'.$post['s_longitude'].'",
                            "'.$post['s_email'].'"
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA CUSTOMER                              "'.$post['citybarangay'].', '.$post['town'].', '.$post['province'].'",*/
    public function filterExistingNameBuilder($s_fname,$s_lname){
        $query = $this->query('SELECT * FROM tbl_builder WHERE b_fname = "'.$s_fname.'" and b_lname = "'.$s_lname.'"');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    
    public function filterExistingUsernameBuilder($s_username){
        $query = $this->query('SELECT * FROM tbl_builder WHERE b_username = "'.$s_username.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    /*END FILTERING*/

    public function addcategory($post){
        $query = $this->query('INSERT INTO tbl_building_category VALUES(
                            null,
                            "'.$post['building_category'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }

    /*FILTERING SA MGA building_category*/
    public function filterExistingbuilding_category($building_category){
        $query = $this->query('SELECT * FROM tbl_building_category WHERE building_category = "'.$building_category.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    
    public function addspecialization($post){
        $query = $this->query('INSERT INTO tbl_specialization VALUES(
                            null,
                            "'.$post['specialization'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }

    /*FILTERING SA MGA specialization*/
    public function filterExistingspecialization($specialization){
        $query = $this->query('SELECT * FROM tbl_specialization WHERE specialization = "'.$specialization.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    public function addprovince($post){
        $query = $this->query('INSERT INTO tbl_province VALUES(
                            null,
                            "'.$post['name'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }

    /*FILTERING SA MGA specialization*/
    public function filterExistingprovince($name){
        $query = $this->query('SELECT * FROM tbl_province WHERE name = "'.$name.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    
    public function addservice($post){
        $query = $this->query('INSERT INTO tbl_services VALUES(
                            null,
                            "'.$post['service_type'].'",
                            "'.$post['service_specialization_area'].'",
                            "'.$post['service_details'].'",
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
        $query = $this->query('SELECT * FROM tbl_services WHERE service_type = "'.$service_type.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }
    
    public function addsubcategory($post){
        $query = $this->query('INSERT INTO tbl_subcategory VALUES(
                            null,
                            "'.$post['build_cat_id'].'",
                            "'.$post['subcategory'].'",
                            1
                             )');
        if($query){
            return 1;
        }else{
            return mysql_error();
        }
    }
    /*FILTERING SA MGA subcategory*/
    public function filterExistingsubcategory($subcategory,$build_cat_id){
        $query = $this->query('SELECT * FROM tbl_subcategory WHERE subcategory = "'.$subcategory.'" and build_cat_id= "'.$build_cat_id.'" ');
        if ( $result = $this->fetch_data($query) ) {
            return true;
        }else{
            return false;
        }
    }

}
$model = new json_model();

?>
