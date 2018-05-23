<?php
class Controller{
    //no json
	public function __construct(){
		$model =new model();

        if(isset($_POST['login']))
        {
           $sucess =  $model->login($_POST);
            if($sucess == TRUE){
                    echo '<script>document.location.href="admin.php?page=projectLeads"</script>';
            }else{
            	$_POST['error']['login']= 'Invalid Username/Password!';
            }
        }
        if(isset($_GET['logout']))
        {
                mysql_query("update tbl_logs set logout_date = NOW(), logout_time = CURTIME(), logs_status=0 where logs_status=1 and logger_type='Contractor' and logger_id='".$_SESSION['contractorlogged']['contractor_id']."'")or die(mysql_error());
                 if(session_destroy()){
                     echo '<script>document.location.href="index.php"</script>';
                 }
                
        }
	}	
}
$contro = new Controller();
?>

<?php
if(isset($_GET['approveReq_userID']))
{               
        approveReq_userID();     //method ne sa model
}
if(isset($_GET['disapproveReq_userID']))
{               
        disapproveReq_userID();   //method ne sa model
}
if(isset($_GET['allApproveReq_userID']))
{               
        allApproveReq_userID();     //method ne sa model
}
if(isset($_GET['allDisapproveReq_userID']))
{               
        allDisapproveReq_userID();   //method ne sa model
}
if(isset($_GET['cateredReq_userID']))
{               
        cateredReq_userID();   //method ne sa model
}
if(isset($_GET['deactBuilder']))
{               
        deactivateBuilder();     //method ne sa model
}
if(isset($_GET['actBuilder']))
{               
        activateBuilder();   //method ne sa model
}

if(isset($_GET['deactService']))
{               
        deactivateService();     //method ne sa model
}
if(isset($_GET['actService']))
{               
        activateService();   //method ne sa model
}
if(isset($_GET['deactBuildingCategory']))
{               
        deactivateBuildingCategory();     //method ne sa model
}
if(isset($_GET['actBuildingCategory']))
{               
        activateBuildingCategory();   //method ne sa model
}
if(isset($_GET['deactSubCategory']))
{               
        deactivateSubCategory();     //method ne sa model
}
if(isset($_GET['actSubCategory']))
{               
        activateSubCategory();   //method ne sa model
}
if(isset($_GET['deactAccomplished']))
{               
        deactivateAccomplished();     //method ne sa model
}
if(isset($_GET['actAccomplished']))
{               
        activateAccomplished();   //method ne sa model
}

//EDITING//
if(isset($_POST['updateProfile']))
{   
        updateProfile($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editUser']))
{   
        editUser($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['p_save']))
{   
        p_save($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editBuilder']))
{   
        editBuilder($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editService']))
{   
        editService($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editCategory']))
{   
        editCategory($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editSubCategory']))
{   
        editSubCategory($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['submit_bid']))
{   
        submit_bid($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}




?>
