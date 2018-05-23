<?php
if(!isset($_SESSION['page']))
{
    $_SESSION['page']='home';
}

if(isset($_GET['page']))
{
    $_SESSION['page']=$_GET['page'];
}

switch($_SESSION['page'])
{
  case 'home':
      include('homes.php');
    break;
  case 'interior_port':
      include('interior_port.php');
    break;
  case 'viewOnMapArchiLegend':
      include('viewOnMapArchiLegend.php');
    break;
  case 'homes':
      include('home.php');
    break;
  case 'architectAccomplishedProject':
      include('architectAccomplishedProject.php');
    break;
  case 'signup':
      include('signup.php');
    break; 
  case 'architect_signup':
      include('architect_signup.php');
    break;
  case 'signup_contractor':
      include('signup_contractor.php');
    break; 
  case 'carp_signup':
      include('carp_signup.php');
    break;  
  case 'projectgallery':
      include('projectgallery.php');
    break;  
  case 'archi_services':
      include('archi_services.php');
    break; 
  case 'archi_page':
      include('archi_page.php');
    break; 
  case 'top_rated_builders':
      include('top_rated_builders.php');
    break;
  case 'findArchitect':
      include('findArchitect.php');
    break;
  case 'findInterior':
      include('findInterior.php');
    break;
  case 'viewOnMapArchitect':
      include('viewOnMapArchitect.php');
    break;
  case 'pay_option':
      include('pay_option.php');
    break;
  case 'viewOnMapInterior':
      include('viewOnMapInterior.php');
    break; 
  case 'postProject':
      include('postProject.php');
    break; 
  case 'projectDetails':
      include('projectDetails.php');
    break; 
  case 'allArchitects':
      include('allArchitects.php');
    break;
   case 'allInteriorDesigners':
      include('allInteriorDesigners.php');
    break;  
  case 'budget':
      include('budget.php');
    break; 
  case 'interior_page':
      include('interior_page.php');
    break; 
  case 'rooms':
      include('rooms.php');
    break; 
  case 'interiorDesignPage':
        include('interiorDesignPage.php');
      break; 
  case 'architecture':
        include('architecture.php');
      break; 
}
