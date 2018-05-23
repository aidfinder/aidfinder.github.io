<?php
class Controller{
    //no json
    public function __construct(){
        $model =new model();

        if(isset($_POST['login']))
        {
           $sucess =  $model->login($_POST);
            if($sucess == TRUE){
                    echo '<script>document.location.href="admin.php?page=dashboard"</script>';
            }else{
                $_POST['error']['login']= 'Invalid Username/Password!';
            }
        }
        if(isset($_GET['logout']))
        {
                mysql_query("update tbl_logs set logout_date = NOW(), logout_time = CURTIME(), logs_status=0 where logs_status=1 and logger_type='Admin' and logger_id='".$_SESSION['adminlogged']['admin_id']."'")or die(mysql_error());
                 if(session_destroy()){
                     echo '<script>document.location.href="index.php"</script>';
                 }
                
        }
    }   
}
$contro = new Controller();
?>

<?php
if(isset($_GET['deactMun']))
{               
        deactivateMun();     //method ne sa model
}
if(isset($_GET['actMun']))
{               
        activateMun();   //method ne sa model
}
if(isset($_GET['deactCustomer']))
{               
        deactivateCustomer();     //method ne sa model
}
if(isset($_GET['actCustomer']))
{               
        activateCustomer();   //method ne sa model
}

if(isset($_GET['deactArchitect']))
{               
        deactivateArchitect();     //method ne sa model
}
if(isset($_GET['actArchitect']))
{               
        activateArchitect();   //method ne sa model
}
if(isset($_GET['deactInterior']))
{               
        deactivateInterior();     //method ne sa model
}
if(isset($_GET['actInterior']))
{               
        activateInterior();   //method ne sa model
}
if(isset($_GET['deactExpertise']))
{               
        deactivateExpertise();     //method ne sa model
}
if(isset($_GET['actExpertise']))
{               
        activateExpertise();   //method ne sa model
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
if(isset($_GET['deactSpecialization']))
{               
        deactivateSpecialization();     //method ne sa model
}
if(isset($_GET['approveAdvertiser']))
{               
        approveAdvertiser();     //method ne sa model
}
if(isset($_GET['disApproveAdvertiser']))
{               
        disApproveAdvertiser();     //method ne sa model
}
if(isset($_GET['actSpecialization']))
{               
        activateSpecialization();   //method ne sa model
}
if(isset($_GET['deactProvince']))
{               
        deactivateProvince();     //method ne sa model
}
if(isset($_GET['actProvince']))
{               
        activateProvince();   //method ne sa model
}

if(isset($_GET['deactAdvertisement']))
{               
        deactivateAdvertisement();     //method ne sa model
}
if(isset($_GET['actAdvertisement']))
{               
        activateAdvertisement();   //method ne sa model
}
//EDITING//
if(isset($_POST['editExpertise']))
{   
        editExpertise($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editUser']))
{   
        editUser($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editArchitect']))
{   
        editArchitect($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editInterior']))
{   
        editInterior($_POST); 
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
if(isset($_POST['editBuildingCategory']))
{   
        editBuildingCategory($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editSubCategory']))
{   
        editSubCategory($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editSpecialization']))
{   
        editSpecialization($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editMunicipality']))
{   
        editMunicipality($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editProvince']))
{   
        editProvince($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}











if(isset($_POST['addAdvertisement']))
{   
        addAdvertisement($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}
if(isset($_POST['editSubCategory']))
{   
        editSubCategory($_POST); 
        // echo '<script>document.location.href="index.php?page=balay"</script>';
}

if(isset($_POST['addNewBuilder']))
{
    addNewBuilder($_POST);
}
if(isset($_POST['addExpertise']))
{
    addExpertise($_POST);
}
if(isset($_POST['addNewCustomer']))
{
    addNewCustomer($_POST);
}
if(isset($_POST['addservice']))
{
    addservice($_POST);

}
if(isset($_POST['addBuildingCategory']))
{
    addBuildingCategory($_POST);
    
}
if(isset($_POST['addsubcategory']))
{
    addsubcategory($_POST);
    
}
if(isset($_POST['addSpecialization']))
{
    addSpecialization($_POST);
    
}
if(isset($_POST['addMunicipality']))
{
    addMunicipality($_POST);
    
}
if(isset($_POST['addProvince']))
{
    addProvince($_POST);
    
}

?>
