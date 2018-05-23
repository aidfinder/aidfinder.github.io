<?php

class Json_Controller{

	public function __construct(){
		
		$button=null;
		if(isset($_GET['btn']))
		{		   
	       $button = $_GET['btn'];		   
		}
		switch($button)
		{	

			
			case 'addyear':
				  $this->addyear();
		    break;
		    case 'addModSub':
				  $this->addModSub();
		    break;
		    case 'addmake':
				  $this->addmake();
		    break;
		    case 'addmodel':
				  $this->addmodel();
		    break;

		    case 'saveYearEdit':
				  $this->saveYearEdit();
		    break;
		    case 'addNewCustomer':
				  $this->addNewCustomer();
		    break;
		    case 'buildcategorydropdown';
		    	$this->buildcategorydropdown();
		    break;
		    case 'municipalitydropdown';
		    	$this->municipalitydropdown();
		    break;
		    case 'barangaydropdown';
		    	$this->barangaydropdown();
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
				$data['redirect_page'] = '?page=addCustomer';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
    public function addyear(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['year'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}

		$query = $model->filterExistingYear( $_POST['year']);
		if( $query == true ){
			$data['status'] = "( Year Already Exist ! )";
			$error = true;
		}

		if(!$error){
			$query = $model->addyear($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listYear';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function saveYearEdit(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['Svyear']) ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		$query = $model->filterExistingvYear_FOR_edit( $_POST['Svyear'],$_POST['SvID']);
		if( $query == true ){
			$data['status'] = "Vehicle Year Already Exist!";
			$error = true;
		}

		if(!$error){
			$query = $model->saveYearEdit($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listYear';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	function editVehicleYearModal()
	{
		include 'ajax_model.php';
		$lst = array();	
		$data['results'] = $model->editVehicleYearModal($_GET['id']);
		if($data['results']){
			foreach($data['results'] as $row)
			{		
				$lst[] = array( 'year_id'=>$row['year_id'],'vyear'=>$row['year'] );	
			}
		}
		echo json_encode($lst);
	}
	function buildcategorydropdown()
	{
		include 'ajax_model.php';
		$error = false;
		$lst = array();
		$data['results'] = $model->buildcategorydropdown($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{		
				$lst[] = array('id'=>$row['subcat_id'],'name'=>$row['subcategory']);	
			}
		}
		echo json_encode($lst);
	}
	function barangaydropdown()
	{
		include 'ajax_model.php';
		$error = false;
		$lst = array();
		$data['results'] = $model->barangaydropdown($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{		
				$lst[] = array('id'=>$row['barangay_id'],'name'=>$row['barangay_spec']);	
			}
		}
		echo json_encode($lst);
	}
	function municipalitydropdown()
	{
		include 'ajax_model.php';
		$error = false;
		$lst = array();
		$data['results'] = $model->municipalitydropdown($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{		
				$lst[] = array('id'=>$row['mun_id'],'name'=>$row['name']);	
			}
		}
		echo json_encode($lst);
	}
	public function addmake(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['make_name'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}

		$query = $model->filterExistingMake( $_POST['make_name'],$_POST['year_id']);
		if( $query == true ){
			$data['status'] = "( Make name on this year already exist ! )";
			$error = true;
		}


		if(!$error){
			$query = $model->addmake($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listMake';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addmodel(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['model_name'])||
		    empty($_POST['make_id2'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}
		$query = $model->filterExistingModel( $_POST['model_name'],$_POST['make_id2']);
		if( $query == true ){
			$data['status'] = "( Model on this make already exist ! )";
			$error = true;
		}
		

		if(!$error){
			$query = $model->addmodel($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listModel';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addsubmodel(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['submod_type'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}

		$query = $model->filterExistingsubmodel( $_POST['submod_type']);
		if( $query == true ){
			$data['status'] = "( Submodel Type Already Exist ! )";
			$error = true;
		}

		if(!$error){
			$query = $model->addsubmodel($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listSubmodel';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addservice(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['service_type'])  ){
			$data['status'] = "( Empty Fields Found ! )";
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
				$data['redirect_page'] = '?page=listService';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addengine(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['engine_type'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}

		$query = $model->filterExistingengine( $_POST['engine_type']);
		if( $query == true ){
			$data['status'] = "( Engine Type Already Exist ! )";
			$error = true;
		}

		if(!$error){
			$query = $model->addengine($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=listEngine';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function updateProfile(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['fname']) ||
		    empty($_POST['lname']) ||
		    empty($_POST['email']) ||
		    empty($_POST['mname']) ||
		   
		    empty($_POST['username']) ||
		    empty($_POST['password'])
		   
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( empty($_POST['password'])  ){
			$data['status'] = "( Empty Fields Found ! )";
			$error = true;
		}
		
		$query = $model->filterExistingAdmin( $_POST['fname'], $_POST['mname'], $_POST['lname'], $_POST['ID'] );
		if( $query == true ){
			$data['status'] = "Admin Name Already Exist!";
			$error = true;
		}
		
		$query = $model->filterExistingEmailAdmin( $_POST['email'], $_POST['ID']  );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}

		$query = $model->filterExistingUsernameAdmin( $_POST['username'], $_POST['ID']  );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		} 

		if(!$error){
			$query = $model->updateProfile($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = 'admin.php?page=dashboard';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function updateSecurity(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['username']) ||
		    empty($_POST['password']) ||
		    empty($_POST['password2']) ||
		    empty($_POST['password3']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( $_POST['password'] != $_POST['password2'] ){
			$data['status'] = "Password Fields Did not match!";
			$error = true;
		}
		if( $_POST['sessionPword'] != $_POST['password3'] ){
			$data['status'] = "Incorrect Password!";
			$error = true;
		}
		if( $_POST['sessionUname'] != $_POST['username'] ){
			$data['status'] = "Incorrect Username!";
			$error = true;
		}
	
		if(!$error){
			$query = $model->updateSecurity($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = 'index.php';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}








































	public function update_account(){
		include 'ajax_model.php';
		$data = array();
		$error = false;
		
		if( empty($_POST['email']) ){
			$data['status'] = "E-Mail field is required";
			$error = true;
		}
		if( empty($_POST['mname']) ){
			$data['status'] = "Middle Name field is required";
			$error = true;
		}
		if( empty($_POST['lname']) ){
			$data['status'] = "Last Name field is required";
			$error = true;
		}
		if( empty($_POST['fname']) ){
			$data['status'] = "First Name field is required";
			$error = true;
		}
		if( empty($_POST['username']) ){
			$data['status'] = "Username field is required";
			$error = true;
		}
		if( empty($_POST['password']) ){
			$data['status'] = "Password field is required";
			$error = true;
		}
		if(!$error){
			$query = $model->update_account($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);

	}
	
	public function addNewTourist(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['tlname']) ||
		    empty($_POST['tfname']) ||
		    empty($_POST['temail']) ||
		    empty($_POST['address']) ||
		    empty($_POST['contact']) ||
		    empty($_POST['tdob']) ||
		    empty($_POST['nationality']) ||
		    empty($_POST['tusername']) ||
		    empty($_POST['tpassword']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if(!is_numeric($_POST['contact'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}
		
		$query = $model->filterExistingTourist( $_POST['tfname'], $_POST['tlname'], $_POST['tmname'] );
		if( $query == true ){
			$data['status'] = "Tourist Name Already Exist!";
			$error = true;
		}

		$query = $model->filterExistingEmailTourist( $_POST['temail'] );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}

		$query = $model->filterExistingUsernameTourist( $_POST['tusername'] );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		}

		if(!$error){
			$query = $model->addNewTourist($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=addtourist';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}


























































	function removeDiagnosis(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->removeDiagnosis($_GET['id']);

			if($query){
				$data['status'] = 1;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
            echo json_encode($data);
    }
    function removeThisMedicineOnCompDiagnosis(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->removeThisMedicineOnCompDiagnosis($_GET['id'],$_GET['id2']);

			if($query){
				$data['status'] = 1;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
            echo json_encode($data);
    }
    function removePrescribedMed(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->removePrescribedMed($_GET['id']);

			if($query){
				$data['status'] = 1;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}

            echo json_encode($data);
    }
    function searchForThisMedicineInComplaintDiagnosis()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->searchForThisMedicineInComplaintDiagnosis($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('medicine_Name'=>$row['medicine_Name']);	
			}
		}
		echo json_encode($lst);
	}
	function searchForThisMedicineFiltering()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->searchForThisMedicineFiltering($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('medicine_Name'=>$row['medicine_Name']);	
			}
		}
		echo json_encode($lst);
	}
	function searchForThisIllnessFiltering()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->searchForThisIllnessFiltering($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('diagnosis_Name'=>$row['diagnosis_Name']);	
			}
		}
		echo json_encode($lst);
	}
	function dataForBarGraph()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results1'] = $model->dataForBarGraph1($_POST);
		$data['results2'] = $model->dataForBarGraph2($_POST);
		$data['results3'] = $model->dataForBarGraph3($_POST);
		$data['results4'] = $model->dataForBarGraph4($_POST);
		$data['results5'] = $model->dataForBarGraph5($_POST);
		$data['results6'] = $model->dataForBarGraph6($_POST);
		$data['results7'] = $model->dataForBarGraph7($_POST);
		$data['results8'] = $model->dataForBarGraph8($_POST);
		$data['results9'] = $model->dataForBarGraph9($_POST);
		$data['results10'] = $model->dataForBarGraph10($_POST);
		$data['results11'] = $model->dataForBarGraph11($_POST);
		$data['results12'] = $model->dataForBarGraph12($_POST);
		if($data['results1']){
			//foreach($data['results'] as $row)
			//{	
				$lst[] = array('jan'=>$data['results1']['jan'],'feb'=>$data['results2']['feb'],'mar'=>$data['results3']['mar'],'apr'=>$data['results4']['apr'],'may'=>$data['results5']['may'],'jun'=>$data['results6']['jun'],'jul'=>$data['results7']['jul'],'aug'=>$data['results8']['aug'],'sep'=>$data['results9']['sep'],'oct'=>$data['results10']['oct'],'nov'=>$data['results11']['nov'],'december'=>$data['results12']['dece']);	
			//}
		}
		echo json_encode($lst);
	}
	function viewMessagesForConversation()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->viewMessagesForConversation($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('conversationID'=>$row['conversationID'],'complaintID'=>$row['complaintID'],'userID'=>$row['userID'],'message'=>$row['message'],'status'=>$row['status'],'type'=>$row['usertype'],'user_name'=>$model->what_student_name($row['userID']) );	
			}
		}
		echo json_encode($lst);
	}
	public function submitMessage(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['replyM']) ){
			$data['status'] = "Message is Empty";
			$error = true;
		}
	
		if(!$error){
			$query = $model->submitMessage($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=consultations';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	function searchForMedicine()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->searchForMedicine($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('medname'=>$row['medicine_Name'],'medID'=>$row['medicineID']);	
			}
		}
		echo json_encode($lst);
	}
	function viewDiagnosis()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->viewDiagnosis($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('tblComDiagID'=>$row['tblComDiagID'],'diagnosisID'=>$row['diagnosisID'],'name'=>$row['diagnosis_Name'],'details'=>$row['details']);	
			}
		}
		echo json_encode($lst);
	}
	function viewMedType()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->viewMedType($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('medicineID'=>$row['medicineID'],'type'=>$row['type']);	
			}
		}
		echo json_encode($lst);
	}
	function viewPrescribedMed()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->viewPrescribedMed($_POST);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('diagnosismedicineID'=>$row['diagnosismedicineID'],'medicineID'=>$row['medicineID'],'name'=>$row['medicine_Name']);	
			}
		}
		echo json_encode($lst);
	}
	function editDiagnosisModal()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->editDiagnosisModal($_GET['id']);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('diagnosisID'=>$row['diagnosisID'],'diagnosis_Name'=>$row['diagnosis_Name'],'details'=>$row['details']);	
			}
		}
		echo json_encode($lst);
	}
	function editMedicineStockModal()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->editMedicineStockModal($_GET['id']);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('medicineID'=>$row['medicineID'],'medicine_Name'=>$row['medicine_Name'],'pieces'=>$row['pieces']);	
			}
		}
		echo json_encode($lst);
	}
	function editMedicineModal()
	{
		include 'ajax_model.php';
		$error = false;
		$count=1;
		$lst = array();
		$data['results'] = $model->editMedicineModal($_GET['id']);
		if($data['results']){
			foreach($data['results'] as $row)
			{	
				$lst[] = array('medicine_Name'=>$row['medicine_Name'],'medType'=>$row['type']);	
			}
		}
		echo json_encode($lst);
	}
	public function submitPresMedicineOfDiagnosis(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['allmedicine']) ){
			$data['status'] = "Table is Empty";
			$error = true;
		}
		$id = $_POST['complaintID'];
		if(!$error){
			$query = $model->submitPresMedicineOfDiagnosis($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=diagnosisPrescribe&id='.$id;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function submitMedicineOfDiagnosis(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['allIllness']) ){
			$data['status'] = "Table is Empty";
			$error = true;
		}
	
		if(!$error){
			$query = $model->submitMedicineOfDiagnosis($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=diagnosis';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function submitDiagnosisOfComplaint(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['allIllness']) ){
			$data['status'] = "Table is Empty";
			$error = true;
		}
	
	
		if(!$error){
			$query = $model->submitDiagnosisOfComplaint($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=diagnosisPrescribe&id='.$_POST['complaintID'];
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	function deactivateStudent(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->deactivateStudent($_GET['id']);

			if($query){
				$data['status'] = 1;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}

            echo json_encode($data);
    }
    function activateStudent(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->activateStudent($_GET['id']);

			if($query){
				$data['status'] = 1;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}

            echo json_encode($data);
    }
    function deactivateStaff(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->deactivateStaff($_GET['id']);

			if($query){
				$data['status'] = 1;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}

            echo json_encode($data);
    }
    function activateStaff(){
           include 'ajax_model.php'; 
            $data = array();
            $query = $model->activateStaff($_GET['id']);

			if($query){
				$data['status'] = 1;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}

            echo json_encode($data);
    }
    public function addNewIllness(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['iN']) ||
		    empty($_POST['iD']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
	
		if(!$error){
			$query = $model->addNewIllness($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=diagnosis';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function editStockMedicine(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['pieces']) ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		$id=$_POST['topID'];
		if(!$error){
			$query = $model->editStockMedicine($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=medicineStockHistory&id='.$id;
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addStockMedicine(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['pieces']) ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
	
		if(!$error){
			$query = $model->addStockMedicine($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=medicine';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addNewMedicine(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['medicineName']) ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( $model->filterExistingMedicine_for_Add($_POST['medicineName'],$_POST['medType']) ){
			$data['status'] = "Medicine Already Exist!";
			$error = true;
		}
		if(!$error){
			$query = $model->addNewMedicine($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=medicine';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function createAccount(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['Sfname']) ||
		    empty($_POST['Slname']) ||
		    empty($_POST['Semail']) ||
		    empty($_POST['Semail2']) ||
		    empty($_POST['Saddress']) ||
		    empty($_POST['Sphone']) ||
		    empty($_POST['Suname']) ||
		    empty($_POST['Spassword']) ||
		    empty($_POST['Sguardianname']) ||
		    empty($_POST['Sguardianaddress']) ||
		    empty($_POST['Sheight']) ||
		    empty($_POST['Sweight']) ||
		    empty($_POST['Spassword2']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( $_POST['Semail'] != $_POST['Semail2'] ){
			$data['status'] = "Email Fields Did not match!";
			$error = true;
		}
		if( $_POST['Spassword'] != $_POST['Spassword2'] ){
			$data['status'] = "Password Fields Did not match!";
			$error = true;
		}
		if(!is_numeric($_POST['Sphone'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}

		if(!is_numeric($_POST['Sheight'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}
		if(!is_numeric($_POST['Sweight'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}

		$query = $model->filterExistingStudent( $_POST['Sfname'], $_POST['Slname'], $_POST['Smname'] );
		if( $query == true ){
			$data['status'] = "Student Name Already Exist!";
			$error = true;
		}

		$query = $model->filterExistingEmail( $_POST['Semail'] );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}

		$query = $model->filterExistingUsername( $_POST['Suname'] );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		}

		if(!$error){
			$query = $model->createAccount($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = 'STUDENT/';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addNewStudent(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['Sfname']) ||
		    empty($_POST['Slname']) ||
		    empty($_POST['Semail']) ||
		    empty($_POST['Semail2']) ||
		    empty($_POST['Saddress']) ||
		    empty($_POST['Sphone']) ||
		    empty($_POST['Suname']) ||
		    empty($_POST['Spassword']) ||
		    empty($_POST['Sguardianname']) ||
		    empty($_POST['Sguardianaddress']) ||
		    empty($_POST['Sheight']) ||
		    empty($_POST['Sweight']) ||
		    empty($_POST['Spassword2']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( $_POST['Semail'] != $_POST['Semail2'] ){
			$data['status'] = "Email Fields Did not match!";
			$error = true;
		}
		if( $_POST['Spassword'] != $_POST['Spassword2'] ){
			$data['status'] = "Password Fields Did not match!";
			$error = true;
		}
		if(!is_numeric($_POST['Sphone'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}
		if(!is_numeric($_POST['Sheight'])){
			$data['status'] = "Invalid height value!";
			$error = true;
		}
		if(!is_numeric($_POST['Sweight'])){
			$data['status'] = "Invalid weight value!";
			$error = true;
		}

		$query = $model->filterExistingStudent( $_POST['Sfname'], $_POST['Slname'], $_POST['Smname'] );
		if( $query == true ){
			$data['status'] = "Student Name Already Exist!";
			$error = true;
		}

		$query = $model->filterExistingEmail( $_POST['Semail'] );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}

		$query = $model->filterExistingUsername( $_POST['Suname'] );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		}

		if(!$error){
			$query = $model->addNewStudent($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=student';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function addNewStaff(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['Sfname']) ||
		    empty($_POST['Slname']) ||
		    //empty($_POST['Smname']) ||
		    empty($_POST['Semail']) ||
		    empty($_POST['Semail2']) ||
		    empty($_POST['Saddress']) ||
		    empty($_POST['Sphone']) ||
		    empty($_POST['Suname']) ||
		    empty($_POST['Spassword']) ||
		    empty($_POST['Spassword2']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( $_POST['Semail'] != $_POST['Semail2'] ){
			$data['status'] = "Email Fields Did not match!";
			$error = true;
		}
		if( $_POST['Spassword'] != $_POST['Spassword2'] ){
			$data['status'] = "Password Fields Did not match!";
			$error = true;
		}
		if(!is_numeric($_POST['Sphone'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}

		$query = $model->filterExistingStaff( $_POST['Sfname'], $_POST['Slname'], $_POST['Smname'] );
		if( $query == true ){
			$data['status'] = "Staff Name Already Exist!";
			$error = true;
		}

		$query = $model->filterExistingEmail_staff( $_POST['Semail'] );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}

		$query = $model->filterExistingUsername_staff( $_POST['Suname'] );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		}

		if(!$error){
			$query = $model->addNewStaff($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=staffs';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	
	
	public function saveChangesStudent(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['Sfname']) ||
		    empty($_POST['Slname']) ||
		    empty($_POST['Semail']) ||
		    empty($_POST['Semail2']) ||
		    empty($_POST['Saddress']) ||
		    empty($_POST['Sphone']) ||
		    empty($_POST['Suname']) ||
		    empty($_POST['Spassword']) || 
		    empty($_POST['Sguardianname']) || 
		    empty($_POST['Sguardianaddress']) ||
		    empty($_POST['Sheight']) || 
		    empty($_POST['Sweight']) || 
		    empty($_POST['Spassword2']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( $_POST['Semail'] != $_POST['Semail2'] ){
			$data['status'] = "Email Fields Did not match!";
			$error = true;
		}
		if( $_POST['Spassword'] != $_POST['Spassword2'] ){
			$data['status'] = "Password Fields Did not match!";
			$error = true;
		}
		if(!is_numeric($_POST['Sphone'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}
		if(!is_numeric($_POST['Sheight'])){
			$data['status'] = "Invalid height value!";
			$error = true;
		}
		if(!is_numeric($_POST['Sweight'])){
			$data['status'] = "Invalid weight value!";
			$error = true;
		}

		$query = $model->filterExistingStudent_FOR_edit( $_POST['Sfname'], $_POST['Slname'], $_POST['Smname'], $_POST['SID'] );
		if( $query == true ){
			$data['status'] = "Student Name Already Exist!";
			$error = true;
		}
		
		$query = $model->filterExistingEmail_FOR_edit( $_POST['Semail'], $_POST['SID']  );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}

		$query = $model->filterExistingUsername_FOR_edit( $_POST['Suname'], $_POST['SID']  );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		} 

		if(!$error){
			$query = $model->saveChangesStudent($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=student';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function saveIllnessEdit(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['illnessName']) ||
		    empty($_POST['illnessDetails'])
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}

		if(!$error){
			$query = $model->saveIllnessEdit($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=diagnosis';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function saveChangesStaff(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['Sfname']) ||
		    empty($_POST['Slname']) ||
		    empty($_POST['Semail']) ||
		    empty($_POST['Semail2']) ||
		    empty($_POST['Saddress']) ||
		    empty($_POST['Sphone']) ||
		    empty($_POST['Suname']) ||
		    empty($_POST['Spassword']) ||
		    empty($_POST['Spassword2']) 
		    ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}
		if( $_POST['Semail'] != $_POST['Semail2'] ){
			$data['status'] = "Email Fields Did not match!";
			$error = true;
		}
		if( $_POST['Spassword'] != $_POST['Spassword2'] ){
			$data['status'] = "Password Fields Did not match!";
			$error = true;
		}
		if(!is_numeric($_POST['Sphone'])){
			$data['status'] = "Invalid Phone Number!";
			$error = true;
		}

		$query = $model->filterExistingStudent_FOR_edit_staff( $_POST['Sfname'], $_POST['Slname'], $_POST['Smname'], $_POST['SID'] );
		if( $query == true ){
			$data['status'] = "Student Name Already Exist!";
			$error = true;
		}
		
		$query = $model->filterExistingEmail_FOR_edit_staff( $_POST['Semail'], $_POST['SID']  );
		if( $query == true ){
			$data['status'] = "The Email Address was Already Registered by Another Account!";
			$error = true;
		}

		$query = $model->filterExistingUsername_FOR_edit_staff( $_POST['Suname'], $_POST['SID']  );
		if( $query == true ){
			$data['status'] = "The Username was Already Registered by Another Account!";
			$error = true;
		} 

		if(!$error){
			$query = $model->saveChangesStaff($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=staffs';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	public function saveChangesMedicine(){
		include 'ajax_model.php';
		$data = array();
		$error = false;

		if( empty($_POST['medicineName']) ){
			$data['status'] = "Empty Field Found!";
			$error = true;
		}

		if( $model->filterExistingMedicine_for_edit($_POST['medicineName'],$_POST['medType'],$_POST['medicneID']) ){
			$data['status'] = "Medicine Already Exist!";
			$error = true;
		}
		
		if(!$error){
			$query = $model->saveChangesMedicine($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=medicine';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}
		}
		echo json_encode($data);
	}
	function editmodalstudent()
	{
		include 'ajax_model.php';
		$lst = array();	
		$data['results'] = $model->editmodalstudent($_GET['id']);
		if($data['results']){
			foreach($data['results'] as $row)
			{		
				$lst[] = array( 'height'=>$row['height'],'weight'=>$row['weight'],'guardianAddress'=>$row['guardianAddress'],'guardianName'=>$row['guardianName'],'courseName'=>$model->what_course_acro($row['courseID']),'courseID'=>$row['courseID'],'birthdate'=>$row['birthdate'],'fname'=>$row['fname'],'lname'=>$row['lname'],'mname'=>$row['mname'],'gender'=>$row['gender'],'email'=>$row['email'],'address'=>$row['address'],'phone'=>$row['contactno'],'username'=>$row['username'] ,'password'=>$row['password'] );	
			}
		}
		echo json_encode($lst);
	} 
	function editmodalstaff()
	{
		include 'ajax_model.php';
		$lst = array();	
		$data['results'] = $model->editmodalstaff($_GET['id']);
		if($data['results']){
			foreach($data['results'] as $row)
			{		
				$lst[] = array( 'fname'=>$row['fname'],'lname'=>$row['lname'],'mname'=>$row['mname'],'gender'=>$row['gender'],'email'=>$row['email'],'address'=>$row['address'],'phone'=>$row['contactno'],'username'=>$row['username'] ,'password'=>$row['password'] );	
			}
		}
		echo json_encode($lst);
	} 
}

$contros = new Json_Controller();
?>