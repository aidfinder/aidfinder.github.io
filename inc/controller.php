<?php
class Controller{
    //no json
	public function __construct(){
		$model =new model();

        if(isset($_POST['login']))
        {
           $sucess =  $model->login($_POST);
            if($sucess == TRUE){
                    echo '<script>document.location.href="index.php?page=home"</script>';
            }else{
            	$_POST['error']['login']= 'Invalid Username/Password!';
            }
        }
        if(isset($_GET['logout']))
        {
                mysql_query("update tbl_logs set logout_date = NOW(), logout_time = CURTIME(), logs_status=0 where logs_status=1 and logger_type='User' and logger_id='".$_SESSION['userlogged']['user_id']."'")or die(mysql_error());
                 if(session_destroy()){
                     echo '<script>document.location.href="index.php"</script>';
                 }
                
        }
	}	
}
$contro = new Controller();
?>

<?php
if(isset($_GET['deactCustomer']))
{               
        deactivateCustomer();    
}
if(isset($_GET['actCustomer']))
{               
        activateCustomer();  
}

if(isset($_GET['deactBuilder']))
{               
        deactivateBuilder();   
}
if(isset($_GET['actBuilder']))
{               
        activateBuilder();   
}

if(isset($_GET['deactService']))
{               
        deactivateService();     
}
if(isset($_GET['actService']))
{               
        activateService();  
}
if(isset($_GET['deactBuildingCategory']))
{               
        deactivateBuildingCategory();     
}
if(isset($_GET['actBuildingCategory']))
{               
        activateBuildingCategory();   
}
if(isset($_GET['deactSubCategory']))
{               
        deactivateSubCategory();     
}
if(isset($_GET['actSubCategory']))
{               
        activateSubCategory();  
}

//EDITING//
if(isset($_POST['signupbutton']))
{   
        signupbutton($_POST); 
}
if(isset($_POST['archi_signupbutton']))
{   
        archi_signupbutton($_POST); 
}
if(isset($_POST['interior_signupbutton']))
{   
        interior_signupbutton($_POST); 
}
if(isset($_POST['contractor_signupbutton']))
{   
        contractor_signupbutton($_POST); 
}
if(isset($_POST['submitAdRequest']))
{   
        submitAdRequest($_POST); 
}
if(isset($_POST['requestbutton']))
{   
        requestbutton($_POST); 
}
if(isset($_POST['goRate']))
{   
        goRate($_POST); 
}
if(isset($_POST['postProj']))
{   
        postProj($_POST); 
}
if(isset($_POST['requestArchitectService']))
{   
        requestArchitectService($_POST); 
}
if(isset($_POST['submitReviewArchitect']))
{   
        submitReviewArchitect($_POST); 
}
if(isset($_POST['submitUpdateReviewArchitect']))
{   
        submitUpdateReviewArchitect($_POST); 
}
if(isset($_POST['submitTestingan']))
{   
        submitTestingan($_POST); 
}
?>
