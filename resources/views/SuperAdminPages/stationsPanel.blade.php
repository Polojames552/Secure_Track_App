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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
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
</style>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="superAdminDashboard"><img src="images/PNP.png" class="mr-2" alt="logo"  style="width:30px;height:40px;margin-left:8px;"/>Super Admin</a>
        <a class="navbar-brand brand-logo-mini" href="superAdminDashboard"><img src="images/PNP.png" alt="logo" style="width:40px;height:50px;"/></a>
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
            <a class="nav-link" href="superAdminDashboard">
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

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-head menu-icon"></i>
              <span class="menu-title">Manage Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="investigatorsPanel">Investigators</a></li>
                <li class="nav-item"> <a class="nav-link" href="stationsPanel">Municipal Stations</a></li>
              </ul>
            </div>
          </li>




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
                <li class="nav-item"> <a class="nav-link" href="forensicRecords">Forensics</a></li>
                <li class="nav-item"> <a class="nav-link" href="weaponsRecords">Weapons</a></li>
                <li class="nav-item"> <a class="nav-link" href="vehiclesRecords">Vehicle</a></li>
                <li class="nav-item"> <a class="nav-link" href="otherRecords">Others</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="superAdminRecords">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Data/Records</span>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">Data/Records</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="superAdminRecordsInvestigators">Investigators</a></li>
                <li class="nav-item"> <a class="nav-link" href="superAdminRecordsStations">Municipal Stations</a></li>
               
              </ul>
            </div>
          </li> -->
       
          <!-- <li class="nav-item">
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
                  <h3 class="font-weight-bold">List of Municipal Stations</h3>
                  <!-- <h6 class="font-weight-normal mb-0">The PESO aims to ensure prompt and efficient delivery of employment facilitation services as well as to provide timely information on labor market and DOLE Programs. <span class="text-primary">https://www.dole.gov.ph/public-employment-services-pes-contents/</span></h6> -->
                </div>

              </div>
            </div>
          </div>
        
          <div class="row">
            
       
      
          <div class="container" style="margin-top:10px;">
        <div class="head-title">
                <h4> </h4>
            <button type="button" data-toggle="modal" data-target="#addStations" class="add btn btn-primary todo-list-add-btn" id="add-task"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
            </svg>
            <i class="icon- menu-icon"></i>    Add Stations</button>
             @include('modals/superAdmin.modalCreateStations')
        </div>
    <div class="table-responsive">
        <table id="ListTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <!-- <th>Name</th> -->
                <th>Municipality</th>
                <th>Municipality Director</th>
                <th>Address</th>
                <th>User Name</th>
                <th>Status</th>
                <th></th>
                <!-- <th>Salary</th>
                <th>Address</th> -->
        
            </tr>
        </thead>
        <tbody>
          @foreach($data as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->municipality}}</td>
                <td>{{$data->municipal_director}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->username}}</td>
                @if($data->status == 'Active')
                  <td style="color:#13870d;"><b>{{$data->status}}</b></td>
                @else
                  <td style="color:#bc1515;"><b>{{$data->status}}</b></td>
                @endif
               <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#editStation{{$data->id}}"><i class="mdi mdi-lead-pencil"></i></button></td>
                  @include('modals/superAdmin.editStation')
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

