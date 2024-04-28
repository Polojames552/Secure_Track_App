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
        <a class="navbar-brand brand-logo mr-5" href="CrimeLabDashboard"><img src="images/PNP.png" class="mr-2" alt="logo"  style="width:30px;height:40px;margin-left:8px;"/>PNP Crime Lab</a>
        <a class="navbar-brand brand-logo-mini" href="CrimeLabDashboard"><img src="images/PNP.png" alt="logo" style="width:40px;height:50px;"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/usericon.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
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
    <div class="container-fluid page-body-wrapper">
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
                  <h3 class="font-weight-bold"><i class="mdi mdi-car"></i> List of all Car Records</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="container" style="margin-top:10px;">
                <div class="button-container">
                <div style="margin:5px;">
                  <button type="submit" data-toggle="modal" data-target="#scannerVehicle" class="add btn btn-success todo-list-add-btn" id="scan-task"> <i class="fa fa-qrcode"></i> Scan Record</button>
                  @include('modals/Investigators.scanners.scannerVehicle')
                </div>
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
                <td>
                    @if($data->changes == 0)
                      <button style="width: 50px;height: 35px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#editEvidenceVehicleModal{{$data->id}}"><i class="mdi mdi-lead-pencil"></i></button>
                    @endif
                    @if($count > 0)
                      @include('modals/Investigators.editEvidence.editEvidenceVehicle')
                    @endif
                </td>
                <td>
                    <button style="width: 50px;height: 35px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#transferEvidenceVehicleModal{{$data->id}}"><i class="mdi mdi-file-send"></i></button>
                    @if($count > 0)
                      @include('modals/Investigators.transferEvidence.transferVehicleEvidence')
                    @endif
                </td>
                <td>
                    <button style="width: 50px;height: 35px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#downloadCar{{$data->id}}"><i class="mdi mdi-download"></i></button>
                    @if($count > 0)
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

