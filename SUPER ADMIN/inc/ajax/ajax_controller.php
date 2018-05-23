<?php

class Json_Controller{

	public function __construct(){
		
		$button=null;
		if(isset($_GET['editVehicleYearModal'])){
              $this->editVehicleYearModal();
        }
		if(isset($_GET['btn']))
		{		   
	       $button = $_GET['btn'];		   
		}
		switch($button)
		{	
			case 'addNewCustomer':
				  $this->addNewCustomer();
		    break;

		    case 'addNewBuilder':
				  $this->addNewBuilder();
		    break;

		    case 'addservice':
				  $this->addservice();
		    break;
		    case 'addcategory':
				  $this->addcategory();
		    break;
		    case 'addsubcategory':
				  $this->addsubcategory();
		    break;
		    case 'addspecialization':
				  $this->addspecialization();
		    break;
		    case 'addprovince':
				  $this->addprovince();
		    break;
		   
		   
		}
	}

	function login(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->login($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = 'index.php?page=dashboard';
			}else{
				$data['status'] = 'Invalid Username/Password';

			}
            echo json_encode($data);
    }
    public function addservice(){
		include 'ajax_model.php';
		$data = array();
		$error = false;
		if( empty($_POST['service_type']) ||
		    empty($_POST['service_specialization_area']) ||
		    empty($_POST['service_details']) 
		    ){
			$data['status'] = "( Empty Field Found ! )";
			$error = true;
		}
		$query = $model->filterExistingservice( $_POST['service_type']);
		if( $query == true ){
			$data['status'] = "( Service Type Already Exist ! )";
			$error = true;
		}

		if(!$error){
			$query = $model->addservice($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listServices';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addprovince(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['name'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}

		$query = $model->filterExistingprovince( $_POST['name']);
		if( $query == true ){
			$data['status'] = "( Province Already Exist ! )";
			$error = true;
		}

		if(!$error){
			$query = $model->addprovince($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listProvince';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addspecialization(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['specialization'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}

		$query = $model->filterExistingspecialization( $_POST['specialization']);
		if( $query == true ){
			$data['status'] = "( Specialization Already Exist ! )";
			$error = true;
		}

		if(!$error){
			$query = $model->addspecialization($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listSpecialization';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addcategory(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['building_category'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}

		$query = $model->filterExistingbuilding_category( $_POST['building_category']);
		if( $query == true ){
			$data['status'] = "( Building Category Already Exist ! )";
			$error = true;
		}

		if(!$error){
			$query = $model->addcategory($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listBuildingCategory';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
    public function addNewCustomer(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['s_fname']) ||
		    empty($_POST['s_lname']) ||
		    empty($_POST['s_email']) ||
		    empty($_POST['s_address']) ||
		    empty($_POST['s_contact_no']) ||
		    empty($_POST['s_birthdate']) ||
		    empty($_POST['s_gender']) ||
		    empty($_POST['s_username']) ||
		    empty($_POST['s_password']) 
		    ){
			$data['status'] = "( Empty Field Found ! )";
			$error = true;
		}
		
		$query = $model->filterExistingNameUser( $_POST['s_fname'], $_POST['s_lname'] );
		if( $query == true ){
			$data['status'] = "User's Name Already Exist!";
			$error = true;
		}
		$query = $model->filterExistingEmailUser( $_POST['s_email'] );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}
		$query = $model->filterExistingUsernameUser( $_POST['s_username'] );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		}

		if(!$error){
			$query = $model->addNewCustomer($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listUser';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}


	public function addNewBuilder(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['s_fname']) ||
		    empty($_POST['s_lname']) ||
		    empty($_POST['s_type']) ||
		    empty($_POST['s_address']) ||
		    empty($_POST['s_contact_no']) ||
		    empty($_POST['s_birthdate']) ||
		    empty($_POST['s_gender']) ||
		    empty($_POST['s_username']) ||
		    empty($_POST['s_email']) ||
		    empty($_POST['s_latitude']) ||
		    empty($_POST['s_longitude') ||
		    empty($_POST['s_password']) 
		    ){
			$data['status'] = "( Empty Field Found ! )";
			$error = true;
		}
		
		$query = $model->filterExistingNameBuilder( $_POST['s_fname'], $_POST['s_lname'] );
		if( $query == true ){
			$data['status'] = "User's Name Already Exist!";
			$error = true;
		}
		
		$query = $model->filterExistingUsernameBuilder( $_POST['s_username'] );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		}

		if(!$error){
			$query = $model->addNewBuilder($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listBuilder';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}


	public function addsubcategory(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['subcategory'])||
		    empty($_POST['build_cat_id'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}
		$query = $model->filterExistingsubcategory( $_POST['subcategory'],$_POST['build_cat_id']);
		if( $query == true ){
			$data['status'] = "( Sub category on this Category already exist ! )";
			$error = true;
		}
		

		if(!$error){
			$query = $model->addsubcategory($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listSubCategory';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
 
}

$contros = new Json_Controller();
?>