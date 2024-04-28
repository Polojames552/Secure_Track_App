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
</style>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="CrimeLabDashboard"><img src="images/PNP.png" class="mr-2" alt="logo"  style="width:30px;height:40px;margin-left:8px;"/>PNP Crime Lab</a>
        <a class="navbar-brand brand-logo-mini" href="CrimeLabDashboard"><img src="images/PNP.png" alt="logo" style="width:40px;height:50px;"/></a>
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
            <a class="nav-link" href="CrimeLabDashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Data/Records</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="CrimeLabProperty">Property/Goods</a></li>
                <li class="nav-item"> <a class="nav-link" href="CrimeLabMotorVehicle">Motorcycle</a></li>
                <li class="nav-item"> <a class="nav-link" href="CrimeLabCar">Cars</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CrimeTurnOverReceipt">
              <i style="padding-right:10px;" class="mdi mdi-file-document-box"></i>
              <span class="menu-title">Make Receipt</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">PNP Crime Laboratory</h3>
                  <!-- <h6 class="font-weight-normal mb-0">The PESO aims to ensure prompt and efficient delivery of employment facilitation services as well as to provide timely information on labor market and DOLE Programs. <span class="text-primary">https://www.dole.gov.ph/public-employment-services-pes-contents/</span></h6> -->
                </div>
              </div>
            </div>
          </div>
        
          <div class="row">
    <div class="col-md-6 grid-margin transparent" id="box-numbers">
        <div class="row">
            <!-- <div class="col-md-6 mb-2  stretch-card transparent" id="box-numbers-items">
                <div class="card card-tale" id="cardtale">
                    <div class="card-box">
                        <div class="inner">
                            <p class="mb-4">No. of Investigators</p>
                            <p class="fs-30 mb-2">2</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-12 mb-2 stretch-card transparent" id="box-numbers-items">
                <div class="card card-dark-blue">
                    <div class="card-box">
                        <div class="inner">
                            <p class="mb-4">No. of Records</p>
                            <p class="fs-30 mb-2">{{$totel_record}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2 mb-lg-0 stretch-card transparent" id="box-numbers-items">
                <div class="card card-light-blue">
                    <div class="card-box">
                        <div class="inner">
                            <p class="mb-4">No. of Active Evidences</p>
                            <p class="fs-30 mb-2">{{$active}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card transparent" id="box-numbers-items">
                <div class="card card-light-danger">
                    <div class="card-box">
                        <div class="inner">
                            <p class="mb-4">No. of Disposed Evidences</p>
                            <p class="fs-30 mb-2">{{$disposed}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chart</h4>
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
        <!-- start here -->

          </div>
      </div>
    </div>   
  </div>
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

