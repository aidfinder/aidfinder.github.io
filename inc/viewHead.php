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
          include('homesHead.php');
        break;
      case 'interior_port':
        include('interior_portHead.php');
      break;
      case 'homes':
          include('homeHead.php');
        break;
      case 'signup':
          include('signupHead.php');
        break;
      case 'architect_signup':
          include('architect_signupHead.php');
        break;
      case 'carp_signup':
          include('carp_signupHead.php');
        break;
      case 'archi_services':
	      include('archi_serviceHead.php');
	    break; 
      case 'archi_page':
        include('archi_pageHead.php');
      break; 
      case 'top_rated_builders':
        include('top_rated_buildersHead.php');
      break; 
      case 'postProject':
        include('postProjectHead.php');
      break; 
      case 'projectDetails':
        include('projectDetailsHead.php');
      break; 
      case 'interior_page':
        include('interior_pageHead.php');
      break; 
      case 'rooms':
        include('roomsHead.php');
      break; 
      case 'interiorDesignPage':
        include('interiorDesignPageHead.php');
      break; 
      case 'architecture':
        include('architectureHead.php');
      break;
    }
