<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Secure Track App</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo_peso.png"/>
 <!-- font awesome refresh -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
   

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->


<!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->

</head>
<style>
#bttns{
  height: 40px;
  font-size: 16px;
}
.card-box {
    /* position: relative; */
    color: #fff;
    padding: 20px 10px 40px;
    margin: 5px 0px;
    
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 18px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 80px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}

#cardtale{
  height: 100%;
}
td{
  word-break:break;
  
}
.head-title{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: -50px;
    margin-bottom: 20px;
}
/* Adjusting the dropdown menu positioning */
.dropdown-menu.show {
      display: block;
    }
    .input--style-5 {
      border: 1px solid #cccccc; /* Border style */
  background-color: #ffffff;
  /* line-height: 50px; */
  background:#f2f2f2;
  height: 40px;
  width: 80%;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  /* padding: 0 10px; */
  font-size: 16px;
  color: #333333;
  -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
}
#filter_search{
  margin-bottom:60px;
}
.button-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: start; /* Center the buttons horizontally */
      margin-bottom: 20px; /* Add some space between the buttons and the bottom */

    }
    .button-container form {
      margin: 3px;
    }
    .button-container .add {
      width: 150px; /* Set the initial width of the buttons */
    }
    @media only screen and (max-width: 600px) {
    .button-container .add {
        width: calc(50% - 5px); /* Adjust the width to half minus the margins */
        min-width: 130px; /* Set a minimum width for the buttons */
    }
    #form-download{
        margin-left: -12px;
    }
    }

</style>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="myInvestigatorsProfile"><img src="images/PNP.png" class="mr-2" alt="logo"  style="width:30px;height:40px;margin-left:8px;"/>{{Auth::user()->name}}</a>
        <a class="navbar-brand brand-logo-mini" href="myInvestigatorsProfile"><img src="images/PNP.png" alt="logo" style="width:40px;height:50px;"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <!-- <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul> -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/usericon.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <a href="UserDash" class="dropdown-item">
                <i class="ti-eye text-primary"></i>
                View As User
              </a>  -->

              <!-- <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a> -->


                    <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a  class="dropdown-item" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                         <i class="ti-power-off text-primary"></i>     
                    <span>Logout</span> 
                    </a>
                    </form>
            
                   

            </div>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>

        
      </div>
    </nav>
    <!-- partial -->
     <!-- partial:partials/_settings-panel.html -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="myInvestigatorsProfile">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="UserDash">
            <i class="fa fa-eye" style="font-size:20px;"></i>
           <i class="icon- menu-icon"></i>
              <span class="menu-title">View as User</span>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="Manageduser">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Manage User</span>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-head menu-icon"></i>
              <span class="menu-title">Manage Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="stationsPanel">Municipal Stations</a></li>
                <li class="nav-item"> <a class="nav-link" href="investigatorsPanel">Investigators</a></li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="manageInvestigatorsPanel">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Manage Investigators</span>
            </a>
          </li> -->



          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
          <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
        </svg>
        <i class="icon- menu-icon"></i>
              <span class="menu-title">Manage Company</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="ListOfCompany">List Of Company</a></li>
                <li class="nav-item"> <a class="nav-link" href="ManagedCompany">Add Company</a></li>
              </ul>
            </div>
          </li> -->



            <!-- <li class="nav-item">
            <a class="nav-link" href="ManagedCompany">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
            </svg>
            <i class="icon- menu-icon"></i>
              <span class="menu-title">Manage Stations</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="Chart">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Manage Investigators</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Data/Records</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="Investigator_PropertyGoodsRecords">Property/Goods</a></li>
                <li class="nav-item"> <a class="nav-link" href="Investigator_MotorVehiclesRecords">Motorcycle</a></li>
                <li class="nav-item"> <a class="nav-link" href="Investigator_vehiclesRecords">Cars</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="Investigator_otherRecords">Others</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="MakeTurnOverReceipt">
              <i style="padding-right:10px;" class="mdi mdi-file-document-box"></i>
              <span class="menu-title">Make Receipt</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="municipalRecords">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Data/Records</span>
            </a>
          </li> -->

         

          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="log">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
        </ul>
      </nav>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
              <!-- message -->
              @if ($errors->any())
              <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
              </div>
              @endif
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
              @endif
          <!-- message -->
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold"><i class="mdi mdi-car"></i> List of all Car Records - {{auth::user()->municipality}}</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- <form action="" id="filter_search">
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <label for="year">Year:</label>
                  <select class="input--style-5 form-control" id="year" name="year">
                    <option value="" selected="selected"></option>
                    <option value="2023">2023</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="month">Month:</label>
                  <select class="input--style-5 form-control" id="month" name="month">
                    <option value="" selected="selected" disabled></option>
                    <option value="November">January</option>
                    <option value="November">Febuary</option>
                    <option value="November">March</option>
                    <option value="November">April</option>
                    <option value="November">May</option>
                    <option value="November">June</option>
                    <option value="November">July</option>
                    <option value="November">August</option>
                    <option value="November">September</option>
                    <option value="November">October</option>
                    <option value="November">November</option>
                    <option value="November">December</option>
                  </select>
                </div>
                  <div class="col-md-1" style="padding-top: 20px;">
                    <button type="submit" class="btn btn-primary"><i class="icon-search"></i></button>
                  </div>
              </div>
            </div>
          </form> -->
 
          <div class="container" style="margin-top:10px;">
            <!-- <div class="btn-group">
              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Small button
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Another action</a>
              </div>
            </div> -->
           
            <!-- <div class="container">
                <div class="row"> -->
                <div class="button-container">
                <!-- <div style="margin:5px;">
                  <button type="submit" class="add btn btn-danger todo-list-add-btn" id="clear-task"> <i class="mdi mdi-redo"></i> Clear</button>
                </div> -->
                <div style="margin:5px;">
                  <button type="submit" data-toggle="modal" data-target="#addEvidenceVehicleModal" class="add btn btn-info todo-list-add-btn" id="evidence-button">  <i class="fa fa-plus"></i> Add Records</button>
                  @include('modals/Investigators.addEvidence.addEvidenceVehicle')
                </div>
                <div style="margin:5px;">
                  <button type="submit" data-toggle="modal" data-target="#scannerVehicle" class="add btn btn-success todo-list-add-btn" id="scan-task"> <i class="fa fa-qrcode"></i> Scan Record</button>
                  @include('modals/Investigators.scanners.scannerVehicle')
                </div>
                <!-- <div style="margin:3px;">
                  <button type="submit" class="add btn btn-warning todo-list-add-btn" id="download-task"><i class="mdi mdi-download"></i> Download</button>
                </div> -->
  </div>

    <div class="table-responsive">
        <table id="ListTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th></th> <!-- Placeholder for QR Code -->
            <th colspan="3" style="text-align: center;">Actions</th> <!-- colspan="2" indicates two separate columns -->
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th style="padding-bottom: 50px;">QR Code</th>
            <th style="border-top: 1px solid black; padding-bottom: 30px; text-align: center; font-size:11.5px;">Edit</th>
            <th style="border-top: 1px solid black; padding-bottom: 30px; text-align: center; font-size:11.5px;">Transfer</th>
            <th style="border-top: 1px solid black; padding-bottom: 30px; text-align: center; font-size:11.5px;">Download</th>
            <th style="padding-bottom: 50px; text-align: center;">Status</th>
            <th style="padding-bottom: 50px;">Make Type</th>
            <th style="padding-bottom: 50px;">Plate No</th>
            <th style="padding-bottom: 50px;">Engine No</th>
            <th style="padding-bottom: 50px;">Fuel</th>
            <th style="padding-bottom: 50px;">Chasis</th>
            <th style="padding-bottom: 50px;">Color</th>
            <th style="padding-bottom: 50px;">Registered Owner</th>
            <th style="padding-bottom: 50px;">Owner Address</th>
            <th style="padding-bottom: 50px;">Brand Make</th>
            <th style="padding-bottom: 50px;">Size</th>
            <th style="padding-bottom: 50px;">Condition</th>
            <th style="padding-bottom: 50px;">Type</th>
            <th style="padding-bottom: 50px;">No Studs</th>
            <th style="padding-bottom: 50px;">General Condition</th>
              <!-- <th>Bumper Front</th>
              <th>Fog Light</th>
              <th>Brand Marking Emblem</th>
              <th>Headlights LR</th>
              <th>Radiator Grill</th>
              <th>Windshield Wiper</th>
              <th>Signal Lights LR</th>
              <th>Windshield Glass</th>
              <th>Hazzard Lights LR</th>
              <th>Windshield Wiper Blade</th>
              <th>Headlights Guard</th>
              <th>Windshield Wiper Motor</th>
              <th>Side Mirror L</th>
              <th>Wind Tunnel Glass L</th>
              <th>Window Glass Front Seat L</th>
              <th>Weather Window Strip L</th>
              <th>Side Mirror R</th>
              <th>Wind Tunnel Glass R</th>
              <th>Window Glass Front Seat R</th>
              <th>Weather Window Strip R</th>
              <th>Rear Bumper</th>
              <th>Brand Emblem Marking</th>
              <th>Window Glass Front Seat</th>
              <th>Spare Tire Mounting</th>
              <th>Tools</th>
              <th>Steering Wheel</th>
              <th>Shifting Rod with Knob</th>
              <th>Hand Break</th>
              <th>Ammeter</th>
              <th>Oil Pressure Gauge</th>
              <th>Temperature Gauge</th>
              <th>RPM Gauge</th>
              <th>Headlight Knob</th>
              <th>Parking Hazard Knob</th>
              <th>Wiper Knob</th>
              <th>Dimmer Switch</th>
              <th>Directional Level</th>
              <th>Speedometer</th>
              <th>Fuel Gauge</th>
              <th>Cars Seats Front</th>
              <th>Car Seat Back</th>
              <th>Car Seat Cover</th>
              <th>Floor Carpet</th>
              <th>Floor Matting</th>
              <th>Computer Box</th>
              <th>Air Condition Unit</th>
              <th>Car Stereo</th>
              <th>Interceptor Cable</th>
              <th>Stereo Speaker</th>
              <th>Twitter</th>
              <th>Car Radio</th>
              <th>Equalizer</th>
              <th>CD Charger</th>
              <th>Lighter</th>
              <th>Barometer</th>
              <th>Fire Extinguisher</th>
              <th>Antennae</th>
              <th>Air Con Compressor</th>
              <th>Radiator</th>
              <th>Radiator Cover</th>
              <th>Radiator Inlet Hose</th>
              <th>Radiator Outlet Hose</th>
              <th>Water Bypass Hose</th>
              <th>Ignition Coil</th>
              <th>High Tension Wire</th>
              <th>Distibutor Cap</th>
              <th>Distributor Assembly</th>
              <th>Contact Point</th>
              <th>Condenser</th>
              <th>Air Con Condenser</th>
              <th>Rotor</th>
              <th>Advancer</th>
              <th>Oil Dipstick</th>
              <th>Air Con Driver Belt</th>
              <th>Carburettor Assembly</th>
              <th>Alternator</th>
              <th>Alternator Voltage Regulator</th>
              <th>Oil Filter</th>
              <th>Steering Gear Box</th>
              <th>Water Pump Assembly</th>
              <th>Engine Fan</th>
              <th>Auxiliary Fan</th>
              <th>Fan Belt</th>
              <th>Spark Plugs</th>
              <th>Battery</th>
              <th>Battery Cable</th>
              <th>Battery Terminal</th>
              <th>Horn Assembly</th>
              <th>Horn Relay</th>
              <th>Accelerator Cable</th>
              <th>Intake Manifold</th>
              <th>Exhaust Manifold</th>
              <th>Engine Mounting</th>
              <th>Ignition Wiring</th>
              <th>Transmission</th>
              <th>Suspension Assembly</th>
              <th>Tie Rod End</th>
              <th>Idler Arm</th>
              <th>Front Coil Spring</th>
              <th>Pitman Arm</th>
              <th>Newly Painted</th>
              <th>Paint Discoloration</th>
              <th>Good Body Shape</th>
              <th>Body in Bad Shape</th>
              <th>Body Ongoing Repair</th>
              <th>For Repainting</th>
              <th>Beyond Economical Repair</th> -->
              <th style="padding-bottom: 50px;">Remark</th>
              <th style="padding-bottom: 50px;">Recovering Personel</th>
              <th style="padding-bottom: 50px;">Witness Owner Barangay Official</th>
              <th style="padding-bottom: 50px;">Noted By</th>
              <th style="padding-bottom: 50px;">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
            <tr>
                <td>  
                      {!! $data->qr_code_image !!}
                </td>
                <!-- <td>{{$data->id}}</td> -->
                <td>
                    @if($data->changes == 0)
                      <button style="width: 50px;height: 35px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#editEvidenceVehicleModal{{$data->id}}"><i class="mdi mdi-lead-pencil"></i></button>
                    @endif
                    @if($count > 0)
                      @include('modals/Investigators.editEvidence.editEvidenceVehicle')
                    @endif
                </td>
                <td> 
                    @if($count > 0)
                        @if($data->status == 'MPS Custodian')
                          <button style="width: 50px;height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#transferEvidenceVehicleModal{{$data->id}}"><i class="mdi mdi-file-send"></i></button>
                        @endif
                      @include('modals/Investigators.transferEvidence.transferVehicleEvidence')
                    @endif
                </td>
                <td>
                    @if($count > 0)
                      <button style="width: 50px;height: 35px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#downloadCar{{$data->id}}"><i class="mdi mdi-download"></i></button>
                      @include('modals/downloadCar')
                    @endif
                </td>
                <td style="color: {{$data->status == 'MPS Custodian' || $data->status == 'Crime Lab' ? '#13870d' : '#bc1515'}};">
                    <b>{{$data->status}}</b>
                </td>
                <td>{{$data->make_type}}</td>
                <td>{{$data->plate_no}}</td>
                <td>{{$data->engine_no}}</td>
                <td>{{$data->fuel}}</td>
                <td>{{$data->chasis_no}}</td>
                <td>{{$data->color}}</td>
                <td>{{$data->registered_owner}}</td>
                <td>{{$data->owner_address}}</td>
                <td>{{$data->brand_make}}</td>
                <td>{{$data->size}}</td>
                <td>{{$data->condition}}</td>
                <td>{{$data->type}}</td>
                <td>{{$data->no_studs}}</td>
                <td>{{$data->general_condition}}</td>
                <!-- @if($data->bumper_front == 'true')
                <td><i class="mdi mdi-checkbox-marked" style="color:blue; font-size: 25px;"></i> </td>
                @else
                <td></td>
                @endif
                
                @foreach(['fog_light',
                  'brand_marking_emblem',
                  'headlights_lr',
                  'radiator_grill',
                  'windshield_wiper',
                  'signal_lights_lr',
                  'windshield_glass',
                  'hazzard_lights_lr',
                  'windshield_wiper_blade',
                  'headlights_guard',
                  'windshield_wiper_motor',
                  'side_mirror_L',
                  'wind_tunnel_glass_L',
                  'window_glass_front_seat_L',
                  'weather_window_strip_L',
                  'side_mirror_R',
                  'wind_tunnel_glass_R',
                  'window_glass_front_seat_R',
                  'weather_window_strip_R',
                  'rear_bumper',
                  'brand_emblem_marking',
                  'window_glass_front_seat',
                  'spare_tire_mounting',
                  'tools',
                  'steering_wheel',
                  'shifting_rod_with_knob',
                  'hand_break',
                  'ammeter',
                  'oil_pressure_gauge',
                  'temperature_gauge',
                  'rpm_gauge',
                  'headlight_knob',
                  'parking_hazard_knob',
                  'wiper_knob',
                  'dimmer_switch',
                  'directional_level',
                  'speedometer',
                  'fuel_gauge',
                  'cars_seats_front',
                  'car_seat_back',
                  'car_seat_cover',
                  'floor_carpet',
                  'floor_matting',
                  'computer_box',
                  'air_condition_unit',
                  'car_stereo',
                  'interceptor_cable',
                  'stereo_speaker',
                  'twitter',
                  'car_radio',
                  'equalizer',
                  'cd_charger',
                  'lighter',
                  'barometer',
                  'fire_extinguisher',
                  'antennae',
                  'air_con_compressor',
                  'radiator',
                  'radiator_cover',
                  'radiator_inlet_hose',
                  'radiator_outlet_hose',
                  'water_bypass_hose',
                  'ignition_coil',
                  'high_tension_wire',
                  'distibutor_Cap',
                  'distributor_assembly',
                  'contact_point',
                  'condenser',
                  'air_con_condenser',
                  'rotor',
                  'advancer',
                  'oil_dipstick',
                  'air_con_driver_belt',
                  'carburettor_assembly',
                  'alternator',
                  'alternator_voltage_regulator',
                  'oil_filter',
                  'steering_gear_box',
                  'water_pump_assembly',
                  'engine_fan',
                  'auxiliary_fan',
                  'fan_belt',
                  'spark_plugs',
                  'battery',
                  'battery_cable',
                  'battery_terminal',
                  'horn_assembly',
                  'horn_relay',
                  'accelerator_cable',
                  'intake_manifold',
                  'exhaust_manifold',
                  'engine_mounting',
                  'ignition_wiring',
                  'transmission',
                  'suspension_assembly',
                  'tie_rod_end',
                  'idler_arm',
                  'front_coil_spring',
                  'pitman_arm',
                  'newly_painted',
                  'paint_discoloration',
                  'good_body_shape',
                  'body_in_bad_shape',
                  'body_ongoing_repair',
                  'for_repainting',
                  'beyond_economical_repair'] as $word)
              @if($data->$word == 'true')
                  <td><i class="mdi mdi-checkbox-marked" style="color:blue; font-size: 25px;"></i> </td>
              @else
                  <td></td>
              @endif
              @endforeach -->
               
                <td>{{$data->remark}}</td>
                <td>{{$data->recovering_personel}}</td>
                <td>{{$data->witness_owner_barangay_official}}</td>
                <td>{{$data->noted_by}}</td>
                <td>{{$data->date}}</td>
            </tr>
            @endforeach
        </tbody>
       
    </table>
  
</div>
</div>

        <!-- partial -->
      </div>
   
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<script>
$(document).ready(function() {
    $('#ListTable').DataTable();
} );

</script>
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="../../js/chart.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

