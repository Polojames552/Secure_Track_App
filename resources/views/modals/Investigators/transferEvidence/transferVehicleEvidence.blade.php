<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Show Password Example</title>
</head>
<body>


<script src="js/mod.js"></script>
<style>
    td {
    /* color: blue; */
    font-size: 14px;
    /* font-weight: bold; */
    /* font-style: italic; */
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    @media only screen and (max-width: 600px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        tr {
            border: 1px solid #dddddd;
            margin-bottom: 10px;
        }
        td {
            border: none;
            position: relative;
            /* padding-left: 50%; */
        }
        td:before {
            position: absolute;
            left: 6px;
            content: attr(data-label);
        }
        #left-right-portion td {
            /* border: none;
            position: relative; */
            padding-left: 50%;
        }
        #cancel-button{
          margin-top:5px;
        }
        /* #General-Condition-of-the-MV td{
          padding-left: 63%;
        } */
    
    }
.center {
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;

}
.form-input {
  width:350px;
  padding:20px;
  background:#fff;
  box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
              3px 3px 7px rgba(94, 104, 121, 0.377);
}

.form-input img {
  width:100%;
  display:none;
  margin-bottom:30px;
}
.form-input input {
  display:none;
}

.form-input label {
  display:block;
  width:45%;
  height:45px;
  margin-left: 25%;
  line-height:50px;
  text-align:center;
  background:#1172c2;
  color:#fff;
  font-size:15px;
  font-family:"Open Sans",sans-serif;
  text-transform:Uppercase;
  font-weight:600;
  border-radius:5px;
  cursor:pointer;
}


.form .grid {
  display:flex;
  justify-content:space-around;
  flex-wrap:wrap;
  gap:20px;
}
.form .grid .form-element {
  width:200px;
  height:200px;
  box-shadow:0px 0px 20px 5px rgba(100,100,100,0.1);
}
.form .grid .form-element input {
  display:none;
}
.form .grid .form-element img {
  width:100%;
  height:100%;
  object-fit:cover;
}
.form .grid .form-element div {
  position:relative;
  height:40px;
  margin-top:-40px;
  background:rgba(0,0,0,0.5);
  text-align:center;
  line-height:40px;
  font-size:13px;
  color:#f5f5f5;
  font-weight:600;
}
.form .grid .form-element div span {
  font-size:40px;
}

.avatar-upload {
  position: relative;
  max-width: 205px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>

<!-- Modal -->
<div class="modal fade" id="transferEvidenceVehicleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" ><i class="mdi mdi-car"></i> <b style="color:#EC5E50;">Transfer Evidence - Car</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form enctype="multipart/form-data" id="transfer-form{{$data->id}}" action="{{ route ('transferEvidence_Vehicles', $data->id) }}" method="POST" >
      @csrf
      <div class="modal-body">
	<!-- <center>
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url('images/PNP.png');">
            </div>
        </div>
    </div>
	</center>  -->
   
    <section style="padding-bottom:10px;">
              <h4 style="color:#EC5E50;"><b>Motor Vehicle Description:</b></h4>
    </section>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Make/Type:</b></label>
                <input type="text" class="form-control" name="make_type1" id="make_type1" placeholder="" value="{{$data->make_type}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="make_type" id="make_type" placeholder="" value="{{$data->make_type}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Plate No:</b></label>
                <input type="text" class="form-control" name="plate_no1" id="plate_no1" placeholder="" value="{{$data->plate_no}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="plate_no" id="plate_no" placeholder="" value="{{$data->plate_no}}" required>
            </div>

            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Engine No:</b></label>
                <input type="text" class="form-control" name="engine_no1" id="engine_no1" placeholder="" value="{{$data->engine_no}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="engine_no" id="engine_no" placeholder="" value="{{$data->engine_no}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Fuel:</b></label>
                <input type="text" class="form-control" name="fuel1" id="fuel1" placeholder="" value="{{$data->fuel}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="fuel" id="fuel" placeholder="" value="{{$data->fuel}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Chasis No:</b></label>
                <input type="text" class="form-control" name="chasis_no1" id="chasis_no1" placeholder="" value="{{$data->chasis_no}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="chasis_no" id="chasis_no" placeholder="" value="{{$data->chasis_no}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Color:</b></label>
                <input type="text" class="form-control" name="color1" id="color1" placeholder="" value="{{$data->color}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="color" id="color" placeholder="" value="{{$data->color}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Registered Owner:</b></label>
                <input type="text" class="form-control" name="registered_owner1" id="registered_owner1" placeholder="" value="{{$data->registered_owner}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="registered_owner" id="registered_owner" placeholder="" value="{{$data->registered_owner}}" required>
            </div>
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Owner's Address:</b></label>
                <input type="text" class="form-control" name="owner_address1" id="owner_address1" placeholder="" value="{{$data->owner_address}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="owner_address" id="owner_address" placeholder="" value="{{$data->owner_address}}" required>
            </div>
        </div>

        <!-- <div class="form-row" >
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Bumper Front</b></label>
                <input type="checkbox" id="bumper_front" name="bumper_front" value="bumper_front">
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Fog Light</b></label>
                <input type="checkbox" id="fog_light" name="fog_light" value="fog_light">
            </div>
            <div class="form-group col-md-3">
                    <input type="radio" name="general_condition" id="general_condition" value="Running">
                    <label for="option1_1">Running</label>
                    <input type="radio" name="general_condition" id="general_condition" value="Deadline">
                    <label for="option2_1">Deadline</label>
            </div>
        </div> -->

        <section style="padding-bottom:10px;">
              <h4 style="color:#EC5E50;"><b>Tires:</b></h4>
    </section>
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Brand/Make:</b></label>
                <input type="text" class="form-control" name="brand_make1" id="brand_make1" placeholder="" value="{{$data->brand_make}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="brand_make" id="brand_make" placeholder="" value="{{$data->brand_make}}" required>
            </div>
            <div class="form-group col-md-6">
            <label id="headlabel" for="inputEmail4"><b>General Condition of the MV:</b></label>
            <table id="General-Condition-of-the-MV" name="modal-table">
              <thead>
              </thead>
              <tbody>
                <tr>
                    @if($data->brand_make == "Running")
                    <td style="font-size:11px;">
                        <input type="radio" name="general_condition1" id="general_condition1" value="Running" checked disabled>
                        <input style="display: none;"  type="radio" name="general_condition" id="general_condition" value="Running" checked >
                        <label for="option1_1">Running</label>
                    </td>
                    <td style="font-size:11px;">
                        <input type="radio" name="general_condition1" id="general_condition1" value="Deadline" disabled>
                        <input style="display: none;" type="radio" name="general_condition" id="general_condition" value="Deadline" >
                        <label for="option2_1">Deadline</label>
                    </td>
                    @else
                    <td style="font-size:11px;">
                        <input type="radio" name="general_condition1" id="general_condition1" value="Running"  disabled>
                        <input style="display: none;" type="radio" name="general_condition" id="general_condition" value="Running"  >
                        <label for="option1_1">Running</label>
                    </td>
                    <td style="font-size:11px;">
                        <input type="radio" name="general_condition1" id="general_condition1" value="Deadline" checked disabled>
                        <input style="display: none;" type="radio" name="general_condition" id="general_condition" value="Deadline" checked>
                        <label for="option2_1">Deadline</label>
                    </td>
                    @endif
                </tr>
              </tbody>
            </table>
            </div>
            
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Size:</b></label>
                <input type="text" class="form-control" name="size1" id="size1" placeholder="" value="{{$data->size}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="size" id="size" placeholder="" value="{{$data->size}}" required>
            </div>

            <!-- Condition -->
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Condition:</b></label>
                <input type="text" class="form-control" name="condition1" id="condition1" placeholder="" value="{{$data->condition}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="condition" id="condition" placeholder="" value="{{$data->condition}}" required>
            </div>

            <!-- Type -->
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Type:</b></label>
                <input type="text" class="form-control" name="type1" id="type1" placeholder="" value="{{$data->type}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="type" id="type" placeholder="" value="{{$data->type}}" required>
            </div>

            <!-- No. of Studs -->
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>No. of Studs:</b></label>
                <input type="number" class="form-control" name="no_studs1" id="no_studs1" placeholder="" value="{{$data->no_studs}}" required disabled>
                <input style="display: none;" type="number" class="form-control" name="no_studs" id="no_studs" placeholder="" value="{{$data->no_studs}}" required>
            </div>
            <!-- <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>General Condition of MV(running):</b></label>
                <input type="text" class="form-control" name="chasis_no" id="chasis_no" placeholder="" value="" >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Color:</b></label>
                <input type="text" class="form-control" name="color_tire" id="color_tire" placeholder="" value="" >
            </div> -->
         
        </div>
       

        <section style="padding-bottom:20px;">
              <h4 style="color:#EC5E50;"><b>Outside Features Front:</b></h4>
        </section>
        <table name="modal-table">
          <tbody>
            <tr>
            @if($data->bumper_front == "true")
                <td style="font-size:11px;"><input type="checkbox" id="bumper_front1" name="bumper_front1" value="bumper_front" checked disabled> Bumper Front</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="bumper_front" name="bumper_front" value="bumper_front" checked> Bumper Front</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="bumper_front1" name="bumper_front1" value="bumper_front" disabled> Bumper Front</td>
                <td style="font-size:11px; display: none;"><input  type="checkbox" id="bumper_front" name="bumper_front" value="bumper_front"> Bumper Front</td>
            @endif
            @if($data->fog_light == "true")
                <td style="font-size:11px;"><input type="checkbox" id="fog_light1" name="fog_light1" value="fog_light" checked disabled> Fog light</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fog_light" name="fog_light" value="fog_light" checked> Fog light</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="fog_light1" name="fog_light1" value="fog_light" disabled> Fog light</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fog_light" name="fog_light" value="fog_light"> Fog light</td>
            @endif
            @if($data->brand_marking_emblem == "true")
                <td style="font-size:11px;"><input type="checkbox" id="brand_marking_emblem1" name="brand_marking_emblem1" value="brand_marking_emblem" checked disabled> Brand Marking Emblem</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="brand_marking_emblem" name="brand_marking_emblem" value="brand_marking_emblem" checked> Brand Marking Emblem</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="brand_marking_emblem1" name="brand_marking_emblem1" value="brand_marking_emblem" disabled> Brand Marking Emblem</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="brand_marking_emblem" name="brand_marking_emblem" value="brand_marking_emblem"> Brand Marking Emblem</td>
            @endif

            @if($data->headlights_lr == "true")
                <td style="font-size:11px;"><input type="checkbox" id="headlights_lr1" name="headlights_lr1" value="headlights_lr" checked disabled> Headlights LR</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="headlights_lr" name="headlights_lr" value="headlights_lr" checked> Headlights LR</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="headlights_lr1" name="headlights_lr1" value="headlights_lr" disabled> Headlights LR</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="headlights_lr" name="headlights_lr" value="headlights_lr"> Headlights LR</td>
            @endif

            @if($data->radiator_grill == "true")
                <td style="font-size:11px;"><input type="checkbox" id="radiator_grill1" name="radiator_grill1" value="radiator_grill" checked disabled> Radiator Grill</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_grill" name="radiator_grill" value="radiator_grill" checked> Radiator Grill</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="radiator_grill1" name="radiator_grill1" value="radiator_grill" disabled> Radiator Grill</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_grill" name="radiator_grill" value="radiator_grill"> Radiator Grill</td>
            @endif

            @if($data->windshield_wiper == "true")
                <td style="font-size:11px;"><input type="checkbox" id="windshield_wiper1" name="windshield_wiper1" value="windshield_wiper" checked disabled> Windshield Wiper</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_wiper" name="windshield_wiper" value="windshield_wiper" checked> Windshield Wiper</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="windshield_wiper1" name="windshield_wiper1" value="windshield_wiper" disabled> Windshield Wiper</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_wiper" name="windshield_wiper" value="windshield_wiper"> Windshield Wiper</td>
            @endif
            </tr>
            <tr>
            @if($data->signal_lights_lr == "true")
                <td style="font-size:11px;"><input type="checkbox" id="signal_lights_lr1" name="signal_lights_lr1" value="signal_lights_lr" checked disabled> Signal Lights L/R</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="signal_lights_lr" name="signal_lights_lr" value="signal_lights_lr" checked> Signal Lights L/R</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="signal_lights_lr1" name="signal_lights_lr1" value="signal_lights_lr" disabled> Signal Lights L/R</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="signal_lights_lr" name="signal_lights_lr" value="signal_lights_lr"> Signal Lights L/R</td>
            @endif

            @if($data->windshield_glass == "true")
                <td style="font-size:11px;"><input type="checkbox" id="windshield_glass1" name="windshield_glass1" value="windshield_glass" checked disabled> Windshield Glass</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_glass" name="windshield_glass" value="windshield_glass" checked> Windshield Glass</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="windshield_glass1" name="windshield_glass1" value="windshield_glass" disabled> Windshield Glass</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_glass" name="windshield_glass" value="windshield_glass"> Windshield Glass</td>
            @endif

            @if($data->hazzard_lights_lr == "true")
                <td style="font-size:11px;"><input type="checkbox" id="hazzard_lights_lr1" name="hazzard_lights_lr1" value="hazzard_lights_lr" checked disabled> Hazard Lights L/R</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="hazzard_lights_lr" name="hazzard_lights_lr" value="hazzard_lights_lr" checked> Hazard Lights L/R</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="hazzard_lights_lr1" name="hazzard_lights_lr1" value="hazzard_lights_lr" disabled> Hazard Lights L/R</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="hazzard_lights_lr" name="hazzard_lights_lr" value="hazzard_lights_lr"> Hazard Lights L/R</td>
            @endif

            @if($data->windshield_wiper_blade == "true")
                <td style="font-size:11px;"><input type="checkbox" id="windshield_wiper_blade1" name="windshield_wiper_blade1" value="windshield_wiper_blade" checked disabled> Windshield Wiper Blade</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_wiper_blade" name="windshield_wiper_blade" value="windshield_wiper_blade" checked> Windshield Wiper Blade</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="windshield_wiper_blade1" name="windshield_wiper_blade1" value="windshield_wiper_blade" disabled> Windshield Wiper Blade</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_wiper_blade" name="windshield_wiper_blade" value="windshield_wiper_blade"> Windshield Wiper Blade</td>
            @endif

            @if($data->headlights_guard == "true")
                <td style="font-size:11px;"><input type="checkbox" id="headlights_guard1" name="headlights_guard1" value="headlights_guard" checked disabled> Headlights Guard</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="headlights_guard" name="headlights_guard" value="headlights_guard" checked> Headlights Guard</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="headlights_guard1" name="headlights_guard1" value="headlights_guard" disabled> Headlights Guard</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="headlights_guard" name="headlights_guard" value="headlights_guard"> Headlights Guard</td>
            @endif

            @if($data->windshield_wiper_motor == "true")
                <td style="font-size:11px;"><input type="checkbox" id="windshield_wiper_motor1" name="windshield_wiper_motor1" value="windshield_wiper_motor" checked disabled> Windshield Wiper Motor</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_wiper_motor" name="windshield_wiper_motor" value="windshield_wiper_motor" checked> Windshield Wiper Motor</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="windshield_wiper_motor1" name="windshield_wiper_motor1" value="windshield_wiper_motor" disabled> Windshield Wiper Motor</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="windshield_wiper_motor" name="windshield_wiper_motor" value="windshield_wiper_motor"> Windshield Wiper Motor</td>
            @endif
            </tr>
       
          </tbody>
        </table>
       
        <br>
        <table id="left-right-portion" name="modal-table">
          <thead>
            <tr>
              <th>Left Side Portion <i style="color:white;">_</i></th>
            </tr>
          </thead>
          <tbody>
              <tr>
              @if($data->side_mirror_L == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="side_mirror_L1" name="side_mirror_L1" value="side_mirror_L" checked disabled> Side Mirror</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="side_mirror_L" name="side_mirror_L" value="side_mirror_L" checked> Side Mirror</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="side_mirror_L1" name="side_mirror_L1" value="side_mirror_L" disabled> Side Mirror</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="side_mirror_L" name="side_mirror_L" value="side_mirror_L"> Side Mirror</td>
                @endif

                @if($data->wind_tunnel_glass_L == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="wind_tunnel_glass_L1" name="wind_tunnel_glass_L1" value="wind_tunnel_glass_L" checked disabled> Wind Tunnel Glass</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="wind_tunnel_glass_L" name="wind_tunnel_glass_L" value="wind_tunnel_glass_L" checked> Wind Tunnel Glass</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="wind_tunnel_glass_L1" name="wind_tunnel_glass_L1" value="wind_tunnel_glass_L" disabled> Wind Tunnel Glass</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="wind_tunnel_glass_L" name="wind_tunnel_glass_L" value="wind_tunnel_glass_L"> Wind Tunnel Glass</td>
                @endif

                @if($data->window_glass_front_seat_L == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="window_glass_front_seat_L1" name="window_glass_front_seat_L1" value="window_glass_front_seat_L" checked disabled> Window Glass Front Seat</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="window_glass_front_seat_L" name="window_glass_front_seat_L" value="window_glass_front_seat_L" checked> Window Glass Front Seat</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="window_glass_front_seat_L1" name="window_glass_front_seat_L1" value="window_glass_front_seat_L" disabled> Window Glass Front Seat</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="window_glass_front_seat_L" name="window_glass_front_seat_L" value="window_glass_front_seat_L"> Window Glass Front Seat</td>
                @endif

                @if($data->weather_window_strip_L == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="weather_window_strip_L1" name="weather_window_strip_L1" value="weather_window_strip_L" checked disabled> Weather/Window Strip</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="weather_window_strip_L" name="weather_window_strip_L" value="weather_window_strip_L" checked> Weather/Window Strip</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="weather_window_strip_L1" name="weather_window_strip_L1" value="weather_window_strip_L" disabled> Weather/Window Strip</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="weather_window_strip_L" name="weather_window_strip_L" value="weather_window_strip_L"> Weather/Window Strip</td>
                @endif
              </tr>
       
          </tbody>
        </table>
        <br>
        <table id="left-right-portion" name="modal-table">
          <thead>
            <tr>
              <th>Right Side Portion</th>
            </tr>
          </thead>
          <tbody>
              <tr>
              @if($data->side_mirror_R == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="side_mirror_R1" name="side_mirror_R1" value="side_mirror_R" checked disabled> Side Mirror</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="side_mirror_R" name="side_mirror_R" value="side_mirror_R" checked> Side Mirror</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="side_mirror_R1" name="side_mirror_R1" value="side_mirror_R" disabled> Side Mirror</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="side_mirror_R" name="side_mirror_R" value="side_mirror_R"> Side Mirror</td>
                @endif

                @if($data->wind_tunnel_glass_R == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="wind_tunnel_glass_R1" name="wind_tunnel_glass_R1" value="wind_tunnel_glass_R" checked disabled> Wind Tunnel Glass</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="wind_tunnel_glass_R" name="wind_tunnel_glass_R" value="wind_tunnel_glass_R" checked> Wind Tunnel Glass</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="wind_tunnel_glass_R1" name="wind_tunnel_glass_R1" value="wind_tunnel_glass_R" disabled> Wind Tunnel Glass</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="wind_tunnel_glass_R" name="wind_tunnel_glass_R" value="wind_tunnel_glass_R"> Wind Tunnel Glass</td>
                @endif

                @if($data->window_glass_front_seat_R == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="window_glass_front_seat_R1" name="window_glass_front_seat_R1" value="window_glass_front_seat_R" checked disabled> Window Glass Front Seat</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="window_glass_front_seat_R" name="window_glass_front_seat_R" value="window_glass_front_seat_R" checked> Window Glass Front Seat</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="window_glass_front_seat_R1" name="window_glass_front_seat_R1" value="window_glass_front_seat_R" disabled> Window Glass Front Seat</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="window_glass_front_seat_R" name="window_glass_front_seat_R" value="window_glass_front_seat_R"> Window Glass Front Seat</td>
                @endif

                @if($data->weather_window_strip_R == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="weather_window_strip_R1" name="weather_window_strip_R1" value="weather_window_strip_R" checked disabled> Weather/Window Strip</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="weather_window_strip_R" name="weather_window_strip_R" value="weather_window_strip_R" checked> Weather/Window Strip</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="weather_window_strip_R1" name="weather_window_strip_R1" value="weather_window_strip_R" disabled> Weather/Window Strip</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="weather_window_strip_R" name="weather_window_strip_R" value="weather_window_strip_R"> Weather/Window Strip</td>
                @endif
              </tr>
       
          </tbody>
        </table>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#EC5E50;" id="Rear-Back-Portion"><b>Rear Back Portion/Luggage Compartment:</b></h4>
        </section>
        <table name="modal-table">
          <thead>
          </thead>
          <tbody>
              <tr>
              @if($data->rear_bumper == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="rear_bumper1" name="rear_bumper1" value="rear_bumper" checked disabled> Rear bumper</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="rear_bumper" name="rear_bumper" value="rear_bumper" checked> Rear bumper</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="rear_bumper1" name="rear_bumper1" value="rear_bumper" disabled> Rear bumper</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="rear_bumper" name="rear_bumper" value="rear_bumper"> Rear bumper</td>
                @endif

                @if($data->brand_emblem_marking == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="brand_emblem_marking1" name="brand_emblem_marking1" value="brand_emblem_marking" checked disabled> Brand Emblem Marking</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="brand_emblem_marking" name="brand_emblem_marking" value="brand_emblem_marking" checked> Brand Emblem Marking</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="brand_emblem_marking1" name="brand_emblem_marking1" value="brand_emblem_marking" disabled> Brand Emblem Marking</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="brand_emblem_marking" name="brand_emblem_marking" value="brand_emblem_marking"> Brand Emblem Marking</td>
                @endif

                @if($data->window_glass_front_seat == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="window_glass_front_seat1" name="window_glass_front_seat1" value="window_glass_front_seat" checked disabled> Window Glass Front Seat</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="window_glass_front_seat" name="window_glass_front_seat" value="window_glass_front_seat" checked> Window Glass Front Seat</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="window_glass_front_seat1" name="window_glass_front_seat1" value="window_glass_front_seat" disabled> Window Glass Front Seat</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="window_glass_front_seat" name="window_glass_front_seat" value="window_glass_front_seat"> Window Glass Front Seat</td>
                @endif

                @if($data->spare_tire_mounting == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="spare_tire_mounting1" name="spare_tire_mounting1" value="spare_tire_mounting" checked disabled> Spare Tire Mounting</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="spare_tire_mounting" name="spare_tire_mounting" value="spare_tire_mounting" checked> Spare Tire Mounting</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="spare_tire_mounting1" name="spare_tire_mounting1" value="spare_tire_mounting" disabled> Spare Tire Mounting</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="spare_tire_mounting" name="spare_tire_mounting" value="spare_tire_mounting"> Spare Tire Mounting</td>
                @endif

                @if($data->tools == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="tools1" name="tools1" value="tools" checked disabled> Tools</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="tools" name="tools" value="tools" checked> Tools</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="tools1" name="tools1" value="tools" disabled> Tools</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="tools" name="tools" value="tools"> Tools</td>
                @endif

              </tr>
          </tbody>
        </table>

        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#EC5E50;"><b>Inside Features:</b></h4>
        </section>
        <table name="modal-table">
          <thead>
          </thead>
          <tbody>
              <tr>
              @if($data->steering_wheel == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="steering_wheel1" name="steering_wheel1" value="steering_wheel" checked disabled> Steering Wheel</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="steering_wheel" name="steering_wheel" value="steering_wheel" checked> Steering Wheel</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="steering_wheel1" name="steering_wheel1" value="steering_wheel" disabled> Steering Wheel</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="steering_wheel" name="steering_wheel" value="steering_wheel"> Steering Wheel</td>
                @endif

                @if($data->shifting_rod_with_knob == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="shifting_rod_with_knob1" name="shifting_rod_with_knob1" value="shifting_rod_with_knob" checked disabled> Shifting Rod with Knob</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="shifting_rod_with_knob" name="shifting_rod_with_knob" value="shifting_rod_with_knob" checked> Shifting Rod with Knob</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="shifting_rod_with_knob1" name="shifting_rod_with_knob1" value="shifting_rod_with_knob" disabled> Shifting Rod with Knob</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="shifting_rod_with_knob" name="shifting_rod_with_knob" value="shifting_rod_with_knob"> Shifting Rod with Knob</td>
                @endif

                @if($data->hand_break == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="hand_break1" name="hand_break1" value="hand_break" checked disabled> Hand Brake</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="hand_break" name="hand_break" value="hand_break" checked> Hand Brake</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="hand_break1" name="hand_break1" value="hand_break" disabled> Hand Brake</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="hand_break" name="hand_break" value="hand_break"> Hand Brake</td>
                @endif

                @if($data->ammeter == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="ammeter1" name="ammeter1" value="ammeter" checked disabled> Ammeter</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="ammeter" name="ammeter" value="ammeter" checked> Ammeter</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="ammeter1" name="ammeter1" value="ammeter" disabled> Ammeter</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="ammeter" name="ammeter" value="ammeter"> Ammeter</td>
                @endif

                @if($data->oil_pressure_gauge == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="oil_pressure_gauge1" name="oil_pressure_gauge1" value="oil_pressure_gauge" checked disabled> Oil Pressure Gauge</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="oil_pressure_gauge" name="oil_pressure_gauge" value="oil_pressure_gauge" checked> Oil Pressure Gauge</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="oil_pressure_gauge1" name="oil_pressure_gauge1" value="oil_pressure_gauge" disabled> Oil Pressure Gauge</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="oil_pressure_gauge" name="oil_pressure_gauge" value="oil_pressure_gauge"> Oil Pressure Gauge</td>
                @endif

                @if($data->temperature_gauge == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="temperature_gauge1" name="temperature_gauge1" value="temperature_gauge" checked disabled> Temperature Gauge</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="temperature_gauge" name="temperature_gauge" value="temperature_gauge" checked> Temperature Gauge</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="temperature_gauge1" name="temperature_gauge1" value="temperature_gauge" disabled> Temperature Gauge</td>
                    <td style="font-size:11px; display: none;"><input type="checkbox" id="temperature_gauge" name="temperature_gauge" value="temperature_gauge"> Temperature Gauge</td>
                @endif

              </tr>
              <tr>
              @if($data->rpm_gauge == "true")
                <td style="font-size:11px;"><input type="checkbox" id="rpm_gauge1" name="rpm_gauge1" value="rpm_gauge" checked disabled> RPM Gauge</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="rpm_gauge" name="rpm_gauge" value="rpm_gauge" checked> RPM Gauge</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="rpm_gauge1" name="rpm_gauge1" value="rpm_gauge" disabled> RPM Gauge</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="rpm_gauge" name="rpm_gauge" value="rpm_gauge"> RPM Gauge</td>
            @endif

            @if($data->headlight_knob == "true")
                <td style="font-size:11px;"><input type="checkbox" id="headlight_knob1" name="headlight_knob1" value="headlight_knob" checked disabled> Headlight Knob</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="headlight_knob" name="headlight_knob" value="headlight_knob" checked> Headlight Knob</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="headlight_knob1" name="headlight_knob1" value="headlight_knob" disabled> Headlight Knob</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="headlight_knob" name="headlight_knob" value="headlight_knob"> Headlight Knob</td>
            @endif

            @if($data->parking_hazard_knob == "true")
                <td style="font-size:11px;"><input type="checkbox" id="parking_hazard_knob1" name="parking_hazard_knob1" value="parking_hazard_knob" checked disabled> Parking/Hazard Knob</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="parking_hazard_knob" name="parking_hazard_knob" value="parking_hazard_knob" checked> Parking/Hazard Knob</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="parking_hazard_knob1" name="parking_hazard_knob1" value="parking_hazard_knob" disabled> Parking/Hazard Knob</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="parking_hazard_knob" name="parking_hazard_knob" value="parking_hazard_knob"> Parking/Hazard Knob</td>
            @endif

            @if($data->wiper_knob == "true")
                <td style="font-size:11px;"><input type="checkbox" id="wiper_knob1" name="wiper_knob1" value="wiper_knob" checked disabled> Wiper Knob</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="wiper_knob" name="wiper_knob" value="wiper_knob" checked> Wiper Knob</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="wiper_knob1" name="wiper_knob1" value="wiper_knob" disabled> Wiper Knob</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="wiper_knob" name="wiper_knob" value="wiper_knob"> Wiper Knob</td>
            @endif

            @if($data->dimmer_switch == "true")
                <td style="font-size:11px;"><input type="checkbox" id="dimmer_switch1" name="dimmer_switch1" value="dimmer_switch" checked disabled> Dimmer Switch</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="dimmer_switch" name="dimmer_switch" value="dimmer_switch" checked> Dimmer Switch</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="dimmer_switch1" name="dimmer_switch1" value="dimmer_switch" disabled> Dimmer Switch</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="dimmer_switch" name="dimmer_switch" value="dimmer_switch"> Dimmer Switch</td>
            @endif

            @if($data->directional_level == "true")
                <td style="font-size:11px;"><input type="checkbox" id="directional_level1" name="directional_level1" value="directional_level" checked disabled> Directional Level</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="directional_level" name="directional_level" value="directional_level" checked> Directional Level</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="directional_level1" name="directional_level1" value="directional_level" disabled> Directional Level</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="directional_level" name="directional_level" value="directional_level"> Directional Level</td>
            @endif

              </tr>
              <tr>
              @if($data->speedometer == "true")
                <td style="font-size:11px;"><input type="checkbox" id="speedometer1" name="speedometer1" value="speedometer" checked disabled> Speedometer</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="speedometer" name="speedometer" value="speedometer" checked> Speedometer</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="speedometer1" name="speedometer1" value="speedometer" disabled> Speedometer</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="speedometer" name="speedometer" value="speedometer"> Speedometer</td>
            @endif

            @if($data->fuel_gauge == "true")
                <td style="font-size:11px;"><input type="checkbox" id="fuel_gauge1" name="fuel_gauge1" value="fuel_gauge" checked disabled> Fuel Gauge</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fuel_gauge" name="fuel_gauge" value="fuel_gauge" checked> Fuel Gauge</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="fuel_gauge1" name="fuel_gauge1" value="fuel_gauge" disabled> Fuel Gauge</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fuel_gauge" name="fuel_gauge" value="fuel_gauge"> Fuel Gauge</td>
            @endif

            @if($data->cars_seats_front == "true")
                <td style="font-size:11px;"><input type="checkbox" id="cars_seats_front1" name="cars_seats_front1" value="cars_seats_front" checked disabled> Cars Seats Front</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="cars_seats_front" name="cars_seats_front" value="cars_seats_front" checked> Cars Seats Front</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="cars_seats_front1" name="cars_seats_front1" value="cars_seats_front" disabled> Cars Seats Front</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="cars_seats_front" name="cars_seats_front" value="cars_seats_front"> Cars Seats Front</td>
            @endif

            @if($data->car_seat_back == "true")
                <td style="font-size:11px;"><input type="checkbox" id="car_seat_back1" name="car_seat_back1" value="car_seat_back" checked disabled> Car Seat Back</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_seat_back" name="car_seat_back" value="car_seat_back" checked> Car Seat Back</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="car_seat_back1" name="car_seat_back1" value="car_seat_back" disabled> Car Seat Back</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_seat_back" name="car_seat_back" value="car_seat_back"> Car Seat Back</td>
            @endif

            @if($data->car_seat_cover == "true")
                <td style="font-size:11px;"><input type="checkbox" id="car_seat_cover1" name="car_seat_cover1" value="car_seat_cover" checked disabled> Car Seat Cover</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_seat_cover" name="car_seat_cover" value="car_seat_cover" checked> Car Seat Cover</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="car_seat_cover1" name="car_seat_cover1" value="car_seat_cover" disabled> Car Seat Cover</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_seat_cover" name="car_seat_cover" value="car_seat_cover"> Car Seat Cover</td>
            @endif

            @if($data->floor_carpet == "true")
                <td style="font-size:11px;"><input type="checkbox" id="floor_carpet1" name="floor_carpet1" value="floor_carpet" checked disabled> Floor Carpet</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="floor_carpet" name="floor_carpet" value="floor_carpet" checked> Floor Carpet</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="floor_carpet1" name="floor_carpet1" value="floor_carpet" disabled> Floor Carpet</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="floor_carpet" name="floor_carpet" value="floor_carpet"> Floor Carpet</td>
            @endif

              </tr>
              <tr>
              @if($data->floor_matting == "true")
                <td style="font-size:11px;"><input type="checkbox" id="floor_matting1" name="floor_matting1" value="floor_matting" checked disabled> Floor Matting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="floor_matting" name="floor_matting" value="floor_matting" checked> Floor Matting</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="floor_matting1" name="floor_matting1" value="floor_matting" disabled> Floor Matting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="floor_matting" name="floor_matting" value="floor_matting"> Floor Matting</td>
            @endif

            @if($data->computer_box == "true")
                <td style="font-size:11px;"><input type="checkbox" id="computer_box1" name="computer_box1" value="computer_box" checked disabled> Computer Box</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="computer_box" name="computer_box" value="computer_box" checked> Computer Box</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="computer_box1" name="computer_box1" value="computer_box" disabled> Computer Box</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="computer_box" name="computer_box" value="computer_box"> Computer Box</td>
            @endif

            @if($data->air_condition_unit == "true")
                <td style="font-size:11px;"><input type="checkbox" id="air_condition_unit1" name="air_condition_unit1" value="air_condition_unit" checked disabled> Air-condition Unit</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_condition_unit" name="air_condition_unit" value="air_condition_unit" checked> Air-condition Unit</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="air_condition_unit1" name="air_condition_unit1" value="air_condition_unit" disabled> Air-condition Unit</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_condition_unit" name="air_condition_unit" value="air_condition_unit"> Air-condition Unit</td>
            @endif

            @if($data->car_stereo == "true")
                <td style="font-size:11px;"><input type="checkbox" id="car_stereo1" name="car_stereo1" value="car_stereo" checked disabled> Car Stereo</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_stereo" name="car_stereo" value="car_stereo" checked> Car Stereo</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="car_stereo1" name="car_stereo1" value="car_stereo" disabled> Car Stereo</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_stereo" name="car_stereo" value="car_stereo"> Car Stereo</td>
            @endif

            @if($data->interceptor_cable == "true")
                <td style="font-size:11px;"><input type="checkbox" id="interceptor_cable1" name="interceptor_cable1" value="interceptor_cable" checked disabled> Interceptor Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="interceptor_cable" name="interceptor_cable" value="interceptor_cable" checked> Interceptor Cable</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="interceptor_cable1" name="interceptor_cable1" value="interceptor_cable" disabled> Interceptor Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="interceptor_cable" name="interceptor_cable" value="interceptor_cable"> Interceptor Cable</td>
            @endif

            @if($data->stereo_speaker == "true")
                <td style="font-size:11px;"><input type="checkbox" id="stereo_speaker1" name="stereo_speaker1" value="stereo_speaker" checked disabled> Stereo Speakers</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="stereo_speaker" name="stereo_speaker" value="stereo_speaker" checked> Stereo Speakers</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="stereo_speaker1" name="stereo_speaker1" value="stereo_speaker" disabled> Stereo Speakers</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="stereo_speaker" name="stereo_speaker" value="stereo_speaker"> Stereo Speakers</td>
            @endif

              </tr>
              <tr>
              @if($data->floor_matting == "true")
                <td style="font-size:11px;"><input type="checkbox" id="floor_matting1" name="floor_matting1" checked disabled> Floor Matting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="floor_matting" name="floor_matting" checked> Floor Matting</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="floor_matting1" name="floor_matting1" disabled> Floor Matting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="floor_matting" name="floor_matting"> Floor Matting</td>
            @endif

            @if($data->computer_box == "true")
                <td style="font-size:11px;"><input type="checkbox" id="computer_box1" name="computer_box1" checked disabled> Computer Box</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="computer_box" name="computer_box" checked> Computer Box</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="computer_box1" name="computer_box1" disabled> Computer Box</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="computer_box" name="computer_box"> Computer Box</td>
            @endif

            @if($data->air_condition_unit == "true")
                <td style="font-size:11px;"><input type="checkbox" id="air_condition_unit1" name="air_condition_unit1" checked disabled> Air-condition Unit</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_condition_unit" name="air_condition_unit" checked> Air-condition Unit</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="air_condition_unit1" name="air_condition_unit1" disabled> Air-condition Unit</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_condition_unit" name="air_condition_unit"> Air-condition Unit</td>
            @endif

            @if($data->car_stereo == "true")
                <td style="font-size:11px;"><input type="checkbox" id="car_stereo1" name="car_stereo1" checked disabled> Car Stereo</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_stereo" name="car_stereo" checked> Car Stereo</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="car_stereo1" name="car_stereo1" disabled> Car Stereo</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="car_stereo" name="car_stereo"> Car Stereo</td>
            @endif

            @if($data->interceptor_cable == "true")
                <td style="font-size:11px;"><input type="checkbox" id="interceptor_cable1" name="interceptor_cable1" checked disabled> Interceptor Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="interceptor_cable" name="interceptor_cable" checked> Interceptor Cable</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="interceptor_cable1" name="interceptor_cable1" disabled> Interceptor Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="interceptor_cable" name="interceptor_cable"> Interceptor Cable</td>
            @endif

            @if($data->stereo_speaker == "true")
                <td style="font-size:11px;"><input type="checkbox" id="stereo_speaker1" name="stereo_speaker1" checked disabled> Stereo Speakers</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="stereo_speaker" name="stereo_speaker" checked> Stereo Speakers</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="stereo_speaker1" name="stereo_speaker1" disabled> Stereo Speakers</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="stereo_speaker" name="stereo_speaker"> Stereo Speakers</td>
            @endif

              </tr>
              <tr>
              @if($data->fire_extinguisher == "true")
                <td style="font-size:11px;"><input type="checkbox" id="fire_extinguisher1" name="fire_extinguisher1" checked disabled> Fire Extinguisher</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fire_extinguisher" name="fire_extinguisher" checked> Fire Extinguisher</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="fire_extinguisher1" name="fire_extinguisher1" disabled> Fire Extinguisher</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fire_extinguisher" name="fire_extinguisher"> Fire Extinguisher</td>
            @endif

            @if($data->antennae == "true")
                <td style="font-size:11px;"><input type="checkbox" id="antennae1" name="antennae1" checked disabled> Antennae</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="antennae" name="antennae" checked> Antennae</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="antennae1" name="antennae1" disabled> Antennae</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="antennae" name="antennae"> Antennae</td>
            @endif

              </tr>
       
          </tbody>
        </table>


        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#EC5E50;"><b>Engine Compartment:</b></h4>
        </section>
        <table name="modal-table">
          <thead>
          </thead>
          <tbody>
              <tr>
              @if($data->air_con_compressor == "true")
                <td style="font-size:11px;"><input type="checkbox" id="air_con_compressor1" name="air_con_compressor1" checked disabled> Air-con Compressor</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_con_compressor" name="air_con_compressor" checked> Air-con Compressor</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="air_con_compressor1" name="air_con_compressor1" disabled> Air-con Compressor</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_con_compressor" name="air_con_compressor"> Air-con Compressor</td>
            @endif

            @if($data->radiator == "true")
                <td style="font-size:11px;"><input type="checkbox" id="radiator1" name="radiator1" checked disabled> Radiator</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator" name="radiator" checked> Radiator</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="radiator1" name="radiator1" disabled> Radiator</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator" name="radiator"> Radiator</td>
            @endif

            @if($data->radiator_cover == "true")
                <td style="font-size:11px;"><input type="checkbox" id="radiator_cover1" name="radiator_cover1" checked disabled> Radiator Cover</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_cover" name="radiator_cover" checked> Radiator Cover</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="radiator_cover1" name="radiator_cover1" disabled> Radiator Cover</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_cover" name="radiator_cover"> Radiator Cover</td>
            @endif

            @if($data->radiator_inlet_hose == "true")
                <td style="font-size:11px;"><input type="checkbox" id="radiator_inlet_hose1" name="radiator_inlet_hose1" checked disabled> Radiator Inlet Hose</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_inlet_hose" name="radiator_inlet_hose" checked> Radiator Inlet Hose</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="radiator_inlet_hose1" name="radiator_inlet_hose1" disabled> Radiator Inlet Hose</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_inlet_hose" name="radiator_inlet_hose"> Radiator Inlet Hose</td>
            @endif

            @if($data->radiator_outlet_hose == "true")
                <td style="font-size:11px;"><input type="checkbox" id="radiator_outlet_hose1" name="radiator_outlet_hose1" checked disabled> Radiator Outlet Hose</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_outlet_hose" name="radiator_outlet_hose" checked> Radiator Outlet Hose</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="radiator_outlet_hose1" name="radiator_outlet_hose1" disabled> Radiator Outlet Hose</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="radiator_outlet_hose" name="radiator_outlet_hose"> Radiator Outlet Hose</td>
            @endif

            @if($data->water_bypass_hose == "true")
                <td style="font-size:11px;"><input type="checkbox" id="water_bypass_hose1" name="water_bypass_hose1" checked disabled> Water Bypass Hose</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="water_bypass_hose" name="water_bypass_hose" checked> Water Bypass Hose</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="water_bypass_hose1" name="water_bypass_hose1" disabled> Water Bypass Hose</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="water_bypass_hose" name="water_bypass_hose"> Water Bypass Hose</td>
            @endif

              </tr>
              <tr>
              @if($data->ignition_coil == "true")
                <td style="font-size:11px;"><input type="checkbox" id="ignition_coil1" name="ignition_coil1" checked disabled> Ignition Coil</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="ignition_coil" name="ignition_coil" checked> Ignition Coil</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="ignition_coil1" name="ignition_coil1" disabled> Ignition Coil</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="ignition_coil" name="ignition_coil"> Ignition Coil</td>
            @endif

            @if($data->high_tension_wire == "true")
                <td style="font-size:11px;"><input type="checkbox" id="high_tension_wire1" name="high_tension_wire1" checked disabled> High Tension Wire</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="high_tension_wire" name="high_tension_wire" checked> High Tension Wire</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="high_tension_wire1" name="high_tension_wire1" disabled> High Tension Wire</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="high_tension_wire" name="high_tension_wire"> High Tension Wire</td>
            @endif

            @if($data->distibutor_Cap == "true")
                <td style="font-size:11px;"><input type="checkbox" id="distibutor_Cap1" name="distibutor_Cap1" checked disabled> Distributor Cap</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="distibutor_Cap" name="distibutor_Cap" checked> Distributor Cap</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="distibutor_Cap1" name="distibutor_Cap1" disabled> Distributor Cap</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="distibutor_Cap" name="distibutor_Cap"> Distributor Cap</td>
            @endif

            @if($data->distributor_assembly == "true")
                <td style="font-size:11px;"><input type="checkbox" id="distributor_assembly1" name="distributor_assembly1" checked disabled> Distributor Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="distributor_assembly" name="distributor_assembly" checked> Distributor Assembly</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="distributor_assembly1" name="distributor_assembly1" disabled> Distributor Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="distributor_assembly" name="distributor_assembly"> Distributor Assembly</td>
            @endif

            @if($data->contact_point == "true")
                <td style="font-size:11px;"><input type="checkbox" id="contact_point1" name="contact_point1" checked disabled> Contact Point</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="contact_point" name="contact_point" checked> Contact Point</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="contact_point1" name="contact_point1" disabled> Contact Point</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="contact_point" name="contact_point"> Contact Point</td>
            @endif

            @if($data->condenser == "true")
                <td style="font-size:11px;"><input type="checkbox" id="condenser1" name="condenser1" checked disabled> Condenser</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="condenser" name="condenser" checked> Condenser</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="condenser1" name="condenser1" disabled> Condenser</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="condenser" name="condenser"> Condenser</td>
            @endif

              </tr>
              <tr>
              @if($data->air_con_condenser == "true")
                <td style="font-size:11px;"><input type="checkbox" id="air_con_condenser1" name="air_con_condenser1" checked disabled> Air-con Condenser</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_con_condenser" name="air_con_condenser" checked> Air-con Condenser</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="air_con_condenser1" name="air_con_condenser1" disabled> Air-con Condenser</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_con_condenser" name="air_con_condenser"> Air-con Condenser</td>
            @endif

            @if($data->rotor == "true")
                <td style="font-size:11px;"><input type="checkbox" id="rotor1" name="rotor1" checked disabled> Rotor</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="rotor" name="rotor" checked> Rotor</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="rotor1" name="rotor1" disabled> Rotor</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="rotor" name="rotor"> Rotor</td>
            @endif

            @if($data->advancer == "true")
                <td style="font-size:11px;"><input type="checkbox" id="advancer1" name="advancer1" checked disabled> Advancer</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="advancer" name="advancer" checked> Advancer</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="advancer1" name="advancer1" disabled> Advancer</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="advancer" name="advancer"> Advancer</td>
            @endif

            @if($data->oil_dipstick == "true")
                <td style="font-size:11px;"><input type="checkbox" id="oil_dipstick1" name="oil_dipstick1" checked disabled> Oil Dipstick</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="oil_dipstick" name="oil_dipstick" checked> Oil Dipstick</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="oil_dipstick1" name="oil_dipstick1" disabled> Oil Dipstick</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="oil_dipstick" name="oil_dipstick"> Oil Dipstick</td>
            @endif

            @if($data->air_con_driver_belt == "true")
                <td style="font-size:11px;"><input type="checkbox" id="air_con_driver_belt1" name="air_con_driver_belt1" checked disabled> Air-con Driver Belt</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_con_driver_belt" name="air_con_driver_belt" checked> Air-con Driver Belt</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="air_con_driver_belt1" name="air_con_driver_belt1" disabled> Air-con Driver Belt</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="air_con_driver_belt" name="air_con_driver_belt"> Air-con Driver Belt</td>
            @endif

            @if($data->carburettor_assembly == "true")
                <td style="font-size:11px;"><input type="checkbox" id="carburettor_assembly1" name="carburettor_assembly1" checked disabled> Carburettor Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="carburettor_assembly" name="carburettor_assembly" checked> Carburettor Assembly</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="carburettor_assembly1" name="carburettor_assembly1" disabled> Carburettor Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="carburettor_assembly" name="carburettor_assembly"> Carburettor Assembly</td>
            @endif

              </tr>
              <tr>
              @if($data->alternator == "true")
                <td style="font-size:11px;"><input type="checkbox" id="alternator1" name="alternator1" checked disabled> Alternator</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="alternator" name="alternator" checked> Alternator</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="alternator1" name="alternator1" disabled> Alternator</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="alternator" name="alternator"> Alternator</td>
            @endif

            @if($data->alternator_voltage_regulator == "true")
                <td style="font-size:11px;"><input type="checkbox" id="alternator_voltage_regulator1" name="alternator_voltage_regulator1" checked disabled> Alternator Voltage Regulator</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="alternator_voltage_regulator" name="alternator_voltage_regulator" checked> Alternator Voltage Regulator</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="alternator_voltage_regulator1" name="alternator_voltage_regulator1" disabled> Alternator Voltage Regulator</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="alternator_voltage_regulator" name="alternator_voltage_regulator"> Alternator Voltage Regulator</td>
            @endif

            @if($data->oil_filter == "true")
                <td style="font-size:11px;"><input type="checkbox" id="oil_filter1" name="oil_filter1" checked disabled> Oil filter</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="oil_filter" name="oil_filter" checked> Oil filter</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="oil_filter1" name="oil_filter1" disabled> Oil filter</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="oil_filter" name="oil_filter"> Oil filter</td>
            @endif

            @if($data->steering_gear_box == "true")
                <td style="font-size:11px;"><input type="checkbox" id="steering_gear_box1" name="steering_gear_box1" checked disabled> Steering Gear Box</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="steering_gear_box" name="steering_gear_box" checked> Steering Gear Box</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="steering_gear_box1" name="steering_gear_box1" disabled> Steering Gear Box</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="steering_gear_box" name="steering_gear_box"> Steering Gear Box</td>
            @endif

            @if($data->water_pump_assembly == "true")
                <td style="font-size:11px;"><input type="checkbox" id="water_pump_assembly1" name="water_pump_assembly1" checked disabled> Water Pump Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="water_pump_assembly" name="water_pump_assembly" checked> Water Pump Assembly</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="water_pump_assembly1" name="water_pump_assembly1" disabled> Water Pump Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="water_pump_assembly" name="water_pump_assembly"> Water Pump Assembly</td>
            @endif

            @if($data->engine_fan == "true")
                <td style="font-size:11px;"><input type="checkbox" id="engine_fan1" name="engine_fan1" checked disabled> Engine Fan</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="engine_fan" name="engine_fan" checked> Engine Fan</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="engine_fan1" name="engine_fan1" disabled> Engine Fan</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="engine_fan" name="engine_fan"> Engine Fan</td>
            @endif

              </tr>
              <tr>
              @if($data->auxiliary_fan == "true")
                <td style="font-size:11px;"><input type="checkbox" id="auxiliary_fan1" name="auxiliary_fan1" checked disabled> Auxiliary Fan</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="auxiliary_fan" name="auxiliary_fan" checked> Auxiliary Fan</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="auxiliary_fan1" name="auxiliary_fan1" disabled> Auxiliary Fan</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="auxiliary_fan" name="auxiliary_fan"> Auxiliary Fan</td>
            @endif

            @if($data->fan_belt == "true")
                <td style="font-size:11px;"><input type="checkbox" id="fan_belt1" name="fan_belt1" checked disabled> Fan Belt</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fan_belt" name="fan_belt" checked> Fan Belt</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="fan_belt1" name="fan_belt1" disabled> Fan Belt</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="fan_belt" name="fan_belt"> Fan Belt</td>
            @endif

            @if($data->spark_plugs == "true")
                <td style="font-size:11px;"><input type="checkbox" id="spark_plugs1" name="spark_plugs1" checked disabled> Spark Plugs</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="spark_plugs" name="spark_plugs" checked> Spark Plugs</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="spark_plugs1" name="spark_plugs1" disabled> Spark Plugs</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="spark_plugs" name="spark_plugs"> Spark Plugs</td>
            @endif

            @if($data->battery == "true")
                <td style="font-size:11px;"><input type="checkbox" id="battery1" name="battery1" checked disabled> Battery</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="battery" name="battery" checked> Battery</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="battery1" name="battery1" disabled> Battery</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="battery" name="battery"> Battery</td>
            @endif

            @if($data->battery_cable == "true")
                <td style="font-size:11px;"><input type="checkbox" id="battery_cable1" name="battery_cable1" checked disabled> Battery Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="battery_cable" name="battery_cable" checked> Battery Cable</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="battery_cable1" name="battery_cable1" disabled> Battery Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="battery_cable" name="battery_cable"> Battery Cable</td>
            @endif

            @if($data->battery_terminal == "true")
                <td style="font-size:11px;"><input type="checkbox" id="battery_terminal1" name="battery_terminal1" checked disabled> Battery Terminal</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="battery_terminal" name="battery_terminal" checked> Battery Terminal</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="battery_terminal1" name="battery_terminal1" disabled> Battery Terminal</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="battery_terminal" name="battery_terminal"> Battery Terminal</td>
            @endif

              </tr>
              <tr>
              @if($data->horn_assembly == "true")
                <td style="font-size:11px;"><input type="checkbox" id="horn_assembly1" name="horn_assembly1" checked disabled> Horn Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="horn_assembly" name="horn_assembly" checked> Horn Assembly</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="horn_assembly1" name="horn_assembly1" disabled> Horn Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="horn_assembly" name="horn_assembly"> Horn Assembly</td>
            @endif

            @if($data->horn_relay == "true")
                <td style="font-size:11px;"><input type="checkbox" id="horn_relay1" name="horn_relay1" checked disabled> Horn Relay</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="horn_relay" name="horn_relay" checked> Horn Relay</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="horn_relay1" name="horn_relay1" disabled> Horn Relay</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="horn_relay" name="horn_relay"> Horn Relay</td>
            @endif

            @if($data->accelerator_cable == "true")
                <td style="font-size:11px;"><input type="checkbox" id="accelerator_cable1" name="accelerator_cable1" checked disabled> Accelerator Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="accelerator_cable" name="accelerator_cable" checked> Accelerator Cable</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="accelerator_cable1" name="accelerator_cable1" disabled> Accelerator Cable</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="accelerator_cable" name="accelerator_cable"> Accelerator Cable</td>
            @endif

            @if($data->intake_manifold == "true")
                <td style="font-size:11px;"><input type="checkbox" id="intake_manifold1" name="intake_manifold1" checked disabled> Intake Manifold</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="intake_manifold" name="intake_manifold" checked> Intake Manifold</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="intake_manifold1" name="intake_manifold1" disabled> Intake Manifold</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="intake_manifold" name="intake_manifold"> Intake Manifold</td>
            @endif

            @if($data->exhaust_manifold == "true")
                <td style="font-size:11px;"><input type="checkbox" id="exhaust_manifold1" name="exhaust_manifold1" checked disabled> Exhaust Manifold</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="exhaust_manifold" name="exhaust_manifold" checked> Exhaust Manifold</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="exhaust_manifold1" name="exhaust_manifold1" disabled> Exhaust Manifold</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="exhaust_manifold" name="exhaust_manifold"> Exhaust Manifold</td>
            @endif

            @if($data->engine_mounting == "true")
                <td style="font-size:11px;"><input type="checkbox" id="engine_mounting1" name="engine_mounting1" checked disabled> Engine Mounting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="engine_mounting" name="engine_mounting" checked> Engine Mounting</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="engine_mounting1" name="engine_mounting1" disabled> Engine Mounting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="engine_mounting" name="engine_mounting"> Engine Mounting</td>
            @endif

              </tr>
              <tr>
              @if($data->ignition_wiring == "true")
                <td style="font-size:11px;"><input type="checkbox" id="ignition_wiring1" name="ignition_wiring1" checked disabled> Ignition Wiring</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="ignition_wiring" name="ignition_wiring" checked> Ignition Wiring</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="ignition_wiring1" name="ignition_wiring1" disabled> Ignition Wiring</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="ignition_wiring" name="ignition_wiring"> Ignition Wiring</td>
            @endif

            @if($data->transmission == "true")
                <td style="font-size:11px;"><input type="checkbox" id="transmission1" name="transmission1" checked disabled> Transmission</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="transmission" name="transmission" checked> Transmission</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="transmission1" name="transmission1" disabled> Transmission</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="transmission" name="transmission"> Transmission</td>
            @endif

            @if($data->suspension_assembly == "true")
                <td style="font-size:11px;"><input type="checkbox" id="suspension_assembly1" name="suspension_assembly1" checked disabled> Suspension Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="suspension_assembly" name="suspension_assembly" checked> Suspension Assembly</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="suspension_assembly1" name="suspension_assembly1" disabled> Suspension Assembly</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="suspension_assembly" name="suspension_assembly"> Suspension Assembly</td>
            @endif

            @if($data->tie_rod_end == "true")
                <td style="font-size:11px;"><input type="checkbox" id="tie_rod_end1" name="tie_rod_end1" checked disabled> Tie Rod End</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="tie_rod_end" name="tie_rod_end" checked> Tie Rod End</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="tie_rod_end1" name="tie_rod_end1" disabled> Tie Rod End</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="tie_rod_end" name="tie_rod_end"> Tie Rod End</td>
            @endif

            @if($data->idler_arm == "true")
                <td style="font-size:11px;"><input type="checkbox" id="idler_arm1" name="idler_arm1" checked disabled> Idler Arm</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="idler_arm" name="idler_arm" checked> Idler Arm</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="idler_arm1" name="idler_arm1" disabled> Idler Arm</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="idler_arm" name="idler_arm"> Idler Arm</td>
            @endif

            @if($data->front_coil_spring == "true")
                <td style="font-size:11px;"><input type="checkbox" id="front_coil_spring1" name="front_coil_spring1" checked disabled> Front Coil Spring</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="front_coil_spring" name="front_coil_spring" checked> Front Coil Spring</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="front_coil_spring1" name="front_coil_spring1" disabled> Front Coil Spring</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="front_coil_spring" name="front_coil_spring"> Front Coil Spring</td>
            @endif

              </tr>
              <tr>
                @if($data->pitman_arm == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="pitman_arm1" name="pitman_arm1" checked disabled> Pitman Arm</td>
                    <td style="font-size:11px; display:none;"><input type="checkbox" id="pitman_arm" name="pitman_arm" checked> Pitman Arm</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="pitman_arm1" name="pitman_arm1" disabled> Pitman Arm</td>
                    <td style="font-size:11px; display:none;"><input type="checkbox" id="pitman_arm" name="pitman_arm"> Pitman Arm</td>
                @endif
              </tr>
          </tbody>
        </table>
        <br>
        <section style="padding-bottom:20px;">
              <h4 style="color:#EC5E50;"><b>General Apperance:</b></h4>
        </section>
        <table name="modal-table" style="table-layout: responsive;">
          <tbody>
            <tr>
            @if($data->newly_painted == "true")
                <td style="font-size:11px;"><input type="checkbox" id="newly_painted1" name="newly_painted1" checked disabled> Newly Painted</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="newly_painted" name="newly_painted" checked> Newly Painted</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="newly_painted1" name="newly_painted1" disabled> Newly Painted</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="newly_painted" name="newly_painted"> Newly Painted</td>
            @endif

            @if($data->paint_discoloration == "true")
                <td style="font-size:11px;"><input type="checkbox" id="paint_discoloration1" name="paint_discoloration1" checked disabled> Paint Discoloration</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="paint_discoloration" name="paint_discoloration" checked> Paint Discoloration</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="paint_discoloration1" name="paint_discoloration1" disabled> Paint Discoloration</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="paint_discoloration" name="paint_discoloration"> Paint Discoloration</td>
            @endif

            @if($data->good_body_shape == "true")
                <td style="font-size:11px;"><input type="checkbox" id="good_body_shape1" name="good_body_shape1" checked disabled> Good Body Shape</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="good_body_shape" name="good_body_shape" checked> Good Body Shape</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="good_body_shape1" name="good_body_shape1" disabled> Good Body Shape</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="good_body_shape" name="good_body_shape"> Good Body Shape</td>
            @endif

            @if($data->body_in_bad_shape == "true")
                <td style="font-size:11px;"><input type="checkbox" id="body_in_bad_shape1" name="body_in_bad_shape1" checked disabled> Body in Bad Shape</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="body_in_bad_shape" name="body_in_bad_shape" checked> Body in Bad Shape</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="body_in_bad_shape1" name="body_in_bad_shape1" disabled> Body in Bad Shape</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="body_in_bad_shape" name="body_in_bad_shape"> Body in Bad Shape</td>
            @endif
            </tr>
            <tr>
            @if($data->body_ongoing_repair == "true")
                <td style="font-size:11px;"><input type="checkbox" id="body_ongoing_repair1" name="body_ongoing_repair1" checked disabled> Body ongoing repair</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="body_ongoing_repair" name="body_ongoing_repair" checked> Body ongoing repair</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="body_ongoing_repair1" name="body_ongoing_repair1" disabled> Body ongoing repair</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="body_ongoing_repair" name="body_ongoing_repair"> Body ongoing repair</td>
            @endif

            @if($data->for_repainting == "true")
                <td style="font-size:11px;"><input type="checkbox" id="for_repainting1" name="for_repainting1" checked disabled> For Repainting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="for_repainting" name="for_repainting" checked> For Repainting</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="for_repainting1" name="for_repainting1" disabled> For Repainting</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="for_repainting" name="for_repainting"> For Repainting</td>
            @endif

            @if($data->beyond_economical_repair == "true")
                <td style="font-size:11px;"><input type="checkbox" id="beyond_economical_repair1" name="beyond_economical_repair1" checked disabled> Beyond Economical Repair and corrosion have set in, which requires a major body repair</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="beyond_economical_repair" name="beyond_economical_repair" checked> Beyond Economical Repair and corrosion have set in, which requires a major body repair</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="beyond_economical_repair1" name="beyond_economical_repair1" disabled> Beyond Economical Repair and corrosion have set in, which requires a major body repair</td>
                <td style="font-size:11px; display: none;"><input type="checkbox" id="beyond_economical_repair" name="beyond_economical_repair"> Beyond Economical Repair and corrosion have set in, which requires a major body repair</td>
            @endif
                <!-- <td style="font-size:11px;">
                    @if($data->beyond_economical_repair == "true")
                        <input type="checkbox" id="beyond_economical_repair" name="beyond_economical_repair" checked>
                    @else
                        <input type="checkbox" id="beyond_economical_repair" name="beyond_economical_repair">
                    @endif
                    Beyond Economical Repair and corrosion have set in, which requires a major body repair
                </td> -->
            </tr>
          </tbody>
        </table>
        <br>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#EC5E50;"><b>Remarks:</b></h4>
        </section>
        <textarea class="form-control"  name="remark1" id="remark1" cols="10" rows="5" required disabled>{{$data->remark}}</textarea>
        <textarea style="display:none;" class="form-control"  name="remark" id="remark" cols="10" rows="5" required>{{$data->remark}}</textarea>
        <br>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Recovering Personnel:</b></label>
                <input type="text" class="form-control" name="recovering_personel1" id="recovering_personel1" placeholder="" value="{{$data->recovering_personel}}" required disabled>
                <input style="display:none;" type="text" class="form-control" name="recovering_personel" id="recovering_personel" placeholder="" value="{{$data->recovering_personel}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Witness/Owner/Barangay Official:</b></label>
                <input type="text" class="form-control" name="witness_owner_barangay_official1" id="witness_owner_barangay_official1" placeholder="" value="{{$data->witness_owner_barangay_official}}" required disabled>
                <input style="display:none;" type="text" class="form-control" name="witness_owner_barangay_official" id="witness_owner_barangay_official" placeholder="" value="{{$data->witness_owner_barangay_official}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Noted by(Head of Office):</b></label>
                <input type="text" class="form-control" name="noted_by1" id="noted_by1" placeholder="" value="{{$data->noted_by}}" required disabled>
                <input style="display:none;" type="text" class="form-control" name="noted_by" id="noted_by" placeholder="" value="{{$data->noted_by}}" required>
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Received by:</b></label>
                <input type="text" class="form-control" name="received" id="received" placeholder="" value="" required>
            </div>
        </div>
        <div class="form-row" style="margin-bottom:0px;">
                <div class="form-group col-md-8">
                </div>
                <div class="form-group col-md-4">
                    <label id="status_label" for="inputEmail4"><b style="text-align:left;">Status:</b></label>
                        <select id="status" name="status" class="form-control" required>
                            @if($data->status == 'MPS Custodian')
                                <option value="MPS Custodian" selected>MPS Custodian</option>
                                <option value="Crime Lab">Crime Lab</option>
                                <option value="Released">Released</option>
                                <option value="Disposed">Disposed</option>
                            @elseif($data->status == 'Crime Lab')
                                <option value="MPS Custodian">MPS Custodian</option>
                                <option value="Crime Lab" selected>Crime Lab</option>
                                <option value="Released">Released</option>
                                <option value="Disposed">Disposed</option>
                            @elseif($data->status == 'Released')
                                <option value="MPS Custodian">MPS Custodian</option>
                                <option value="Crime Lab">Crime Lab</option>
                                <option value="Released" selected>Released</option>
                                <option value="Disposed">Disposed</option>
                            @else		
                                <option value="MPS Custodian" >MPS Custodian</option>
                                <option value="Crime Lab">Crime Lab</option>
                                <option value="Released">Released</option>
                                <option value="Disposed" selected>Disposed</option>
                            @endif
                        </select>
                </div>
            </div>
          </div> 
        
          <center>
            <label class="image-preview" style="">
                <input type="file" class="image-input" name="Picture" accept="image/*" style="display: none;">
                <img class="preview-image" src="https://bit.ly/3ubuq5o" alt="" style="border-radius: 0; object-fit: contain; max-width: 50%; max-height: 50%;width: auto;height: auto;">
            </label>
        </center>
        <br><br>
      <div class="modal-footer">
    <!-- <button type="submit" class="btn btn-primary">Save</button> -->
    <div class="row">
        <div class="col-md-6">
            <button style="height:35px; width:100px;" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#confirmationModal{{$data->id}}">Transfer</button>
        </div>
        <div class="col-md-6" id="cancel-button">
            <button style="height:35px; width:100px;" type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
    </form>
 
    </div>
  </div>
    
  <!-- Modal -->
<div class="modal fade" id="confirmationModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel"><b>Confirmation!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to save?
        <br>
        <br>
        <i style="color:#E00000;">(this action is irreversible)</i>
      </div>
     
      <div class="modal-footer">
        <button style="height:35px; width:80px;" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button style="height:35px; width:80px;" id="confirmSaveBtn{{$data->id}}" type="submit" class="btn btn-info">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- JavaScript -->
<script>
   document.querySelectorAll('.image-preview').forEach(function(preview, index) {
    const imageInput = preview.querySelector('.image-input');
    const imagePreview = preview.querySelector('img');

    // Generate unique ID for the input file element
    const uniqueId = 'image-input' + index;
    imageInput.id = uniqueId;

    // Function to update image preview
    function updateImagePreview() {
        const file = imageInput.files[0];
        if (file.size < 2097152) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imageUrl = e.target.result;
                imagePreview.src = imageUrl;
            };
            reader.readAsDataURL(file);
        } else {
            alert("Error: Image size should be less than 2MB.");
            return;
        }
    }

    // Trigger updateImagePreview function when file input changes
    imageInput.addEventListener('change', updateImagePreview);

//    imagePreview.addEventListener('click', function(event) {
//     event.preventDefault(); // Prevent default behavior
//     imageInput.click();
// });
});
document.getElementById('confirmSaveBtn{{$data->id}}').addEventListener('click', function() {
    // Get the ID of the form associated with the button
    var formId = 'transfer-form{{$data->id}}';
    // Set the enctype attribute to "multipart/form-data"
    document.getElementById(formId).setAttribute('enctype', 'multipart/form-data');
    // Submit the form
    document.getElementById(formId).submit();
});
</script>

<script>
   

    document.getElementById("showPasswordCheckbox").addEventListener("change", function() {
        if (this.checked) {
            document.getElementById("password").type = "text";
        } else {
            document.getElementById("password").type = "password";
        }
    });
</script>
</div>
</body>
</html>
