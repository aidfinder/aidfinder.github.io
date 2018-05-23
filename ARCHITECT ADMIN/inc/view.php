<?php
if(!isset($_SESSION['page']))
{
    $_SESSION['page']='dashboard';
}

if(isset($_GET['page']))
{
    $_SESSION['page']=$_GET['page'];
}



 switch($_SESSION['page'])
    {
      case 'dashboard':
          include('dashboard.php');
        break;
      case 'allServReq':
          include('allServReq.php');
        break;
      case 'pendingServReq':
          include('pendingServReq.php');
        break;
      case 'approvedServReq':
          include('approvedServReq.php');
        break;
      case 'disapprovedServReq':
          include('disapprovedServReq.php');
        break;
      case 'cancelledServReq':
          include('cancelledServReq.php');
        break;
      case 'cateredServReq':
          include('cateredServReq.php');
        break;
      case 'addAccomProj':
          include('addAccomProj.php');
        break;
      case 'viewAccomProj':
          include('viewAccomProj.php');
        break;
      case 'addDesign':
          include('addDesign.php');
        break;
      case 'addServiceRates':
          include('addServiceRates.php');
        break;
      case 'addMyService':
          include('addMyService.php');
        break;
      case 'servRates':
          include('servRates.php');
        break;



      case 'viewDesign':
          include('viewDesign.php');
        break;
      case 'viewLogs':
          include('viewLogs.php');
        break;
      case 'viewActivityLog':
          include('viewActivityLog.php');
        break;
      case 'viewServiceRates':
          include('viewServiceRates.php');
        break;
      case 'viewClientProject':
          include('viewClientProject.php');
        break;
      case 'viewMyService':
          include('viewMyService.php');
        break;




      case 'editDesignIdeas':
          include('editDesignIdeas.php');
        break;
      case 'editAccomplished':
          include('editAccomplished.php');
        break;
      case 'editServiceRate':
          include('editServiceRate.php');
        break;
      case 'editMyService':
          include('editMyService.php');
        break;
      
    }
