<?php
if(!isset($_SESSION['page']))
{
    $_SESSION['page']='homes';
}

if(isset($_GET['page']))
{
    $_SESSION['page']=$_GET['page'];
}



 switch($_SESSION['page'])
    {
      case 'home':
          include('home.php');
        break;
      case 'dashboard':
          include('dashboard.php');
        break;





        case 'addExpertise':
          include('addExpertise.php');
        break;
      case 'addUser':
          include('addUser.php');
        break;
      case 'addDesigner':
          include('addDesigner.php');
        break;
      case 'addService':
          include('addService.php');
        break;
      case 'addBuildingCategory':
          include('addBuildingCategory.php');
        break;
      case 'addsubcategory':
          include('addsubcategory.php');
        break;
      case 'addSpecialization':
          include('addSpecialization.php');
        break;
      case 'addMunicipality':
          include('addMunicipality.php');
        break;
      case 'addProvince':
          include('addProvince.php');
        break;











       case 'viewExpertise':
          include('viewExpertise.php');
        break;
      case 'viewLogged':
          include('viewLogged.php');
        break;
      case 'activityLog':
          include('activityLog.php');
        break;

      case 'editArchitect':
          include('editArchitect.php');
        break;


      case 'editInterior':
          include('editInterior.php');
        break;
      case 'editCategory':
          include('editCategory.php');
        break;
      case 'editSubCategory':
          include('editSubCategory.php');
        break;
      case 'editService':
          include('editService.php');
        break;
      case 'editUser':
          include('editUser.php');
        break;
      case 'editExpertise':
          include('editExpertise.php');
        break;
      case 'editBuildingCategory':
          include('editBuildingCategory.php');
        break;
      case 'editSubCategory':
          include('editSubCategory.php');
        break;
      case 'editSpecialization':
          include('editSpecialization.php');
        break;
      case 'editProvince':
          include('editProvince.php');
        break;
      case 'editMunicipality':
          include('editMunicipality.php');
        break;




      case 'listLogged':
          include('listLogged.php');
        break;
      case 'listUser':
          include('listUser.php');
        break;
      case 'listBuildingCategory':
          include('listBuildingCategory.php');
        break;
      case 'listInterior':
          include('listInterior.php');
        break;
       case 'listArchitect':
          include('listArchitect.php');
        break;
      case 'listSubCategory':
          include('listSubCategory.php');
        break;
      case 'listServices':
          include('listServices.php');
        break;
      case 'listSpecialization':
          include('listSpecialization.php');
        break;
      case 'listProvince':
          include('listProvince.php');
        break;
      case 'listMunicipality':
          include('listMunicipality.php');
        break;
      case 'listExpertise':
          include('listExpertise.php');
        break;




      case 'addSubcategory':
          include('addSubcategory.php');
        break;
       case 'addSampleMapa':
          include('addSampleMapa.php');
        break;
      case 'adrequests':
          include('adrequests.php');
        break;
      case 'postAdvertisement':
          include('postAdvertisement.php');
        break;
      case 'listAdvertisements':
          include('listAdvertisements.php');
        break;
    }
