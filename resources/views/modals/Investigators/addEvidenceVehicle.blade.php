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
<div class="modal fade" id="addEvidenceVehicleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-car"></i> <b>Add Evidence - Vehicles</b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="addEvidence_Vehicles" method="POST">
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
              <h4 style="color:#00A3BE;"><b>Motor Vehicle Description:</b></h4>
    </section>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Make/Type:</b></label>
                <input type="text" class="form-control" name="make_type" id="make_type" placeholder="" value="" >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Plate No:</b></label>
                <input type="text" class="form-control" name="plate_no" id="plate_no" placeholder="" value="" >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Engine No:</b></label>
                <input type="text" class="form-control" name="engine_no" id="engine_no" placeholder="" value="" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Fuel:</b></label>
                <input type="text" class="form-control" name="fuel" id="fuel" placeholder="" value="" >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Chasis No:</b></label>
                <input type="text" class="form-control" name="chasis_no" id="chasis_no" placeholder="" value="" >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Color:</b></label>
                <input type="text" class="form-control" name="color" id="color" placeholder="" value="" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Registered Owner:</b></label>
                <input type="text" class="form-control" name="registered_owner" id="registered_owner" placeholder="" value="" >
            </div>
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Owner's Addres:</b></label>
                <input type="text" class="form-control" name="owner_address" id="owner_address" placeholder="" value="" >
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
              <h4 style="color:#00A3BE;"><b>Tires:</b></h4>
    </section>
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Brand/Make:</b></label>
                <input type="text" class="form-control" name="brand_make" id="brand_make" placeholder="" value="" >
            </div>
            <div class="form-group col-md-6">
            <label id="headlabel" for="inputEmail4"><b>General Condition of the MV:</b></label>
            <table id="General-Condition-of-the-MV">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="radio" name="general_condition" id="general_condition" value="Running">
                    <label for="option1_1">Running</label>
                  </td>
                  <td>
                    <input type="radio" name="general_condition" id="general_condition" value="Deadline">
                    <label for="option2_1">Deadline</label>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>


            
        </div>
        <div class="form-row">
        <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Size:</b></label>
                <input type="text" class="form-control" name="size" id="size" placeholder="" value="" >
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Condition:</b></label>
                <input type="text" class="form-control" name="condition" id="condition" placeholder="" value="" >
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Type:</b></label>
                <input type="text" class="form-control" name="type" id="type" placeholder="" value="" >
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>No. of Studs:</b></label>
                <input type="number" class="form-control" name="no_studs" id="no_studs" placeholder="" value="" >
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
              <h4 style="color:#00A3BE;"><b>Outside Features Front:</b></h4>
        </section>
        <table>
          <tbody>
            <tr>
              <td><input type="checkbox" id="bumper_front" name="bumper_front" value="bumper_front"> Bumper Front</td>
              <td><input type="checkbox" id="fog_light" name="fog_light" value="fog_light"> Fog light</td>
              <td><input type="checkbox" id="brand_marking_emblem" name="brand_marking_emblem"> Brand Marking Emblem</td>
              <td><input type="checkbox" id="headlights_lr" name="headlights_lr"> Headlights LR</td>
              <td><input type="checkbox" id="radiator_grill" name="radiator_grill"> Radiator Grill</td>
              <td><input type="checkbox" id="windshield_wiper" name="windshield_wiper"> Windshield Wiper</td>
            </tr>
            <tr>
              <td><input type="checkbox" id="signal_lights_lr" name="signal_lights_lr"> Signal Lights L/R</td>
              <td><input type="checkbox" id="windshield_glass" name="windshield_glass"> Windshield Glass</td>
              <td><input type="checkbox" id="hazzard_lights_lr" name="hazzard_lights_lr"> Hazard Lights L/R</td>
              <td><input type="checkbox" id="windshield_wiper_blade" name="windshield_wiper_blade"> Windshield Wiper Blade</td>
              <td><input type="checkbox" id="headlights_guard" name="headlights_guard"> Headlights Guard</td>
              <td><input type="checkbox" id="windshield_wiper_motor" name="windshield_wiper_motor"> Windshield Wiper Motor</td>
            </tr>
       
          </tbody>
        </table>
       
        <br>
        <table id="left-right-portion">
          <thead>
            <tr>
              <th>Left Side Portion <i style="color:white;">_</i></th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td data-label="Left side portion"><input type="checkbox" id="side_mirror_L" name="side_mirror_L"> Side Mirror</td>
                <td><input type="checkbox" id="wind_tunnel_glass_L" name="wind_tunnel_glass_L"> Wind Tunnel Glass</td>
                <td><input type="checkbox" id="window_glass_front_seat_L" name="window_glass_front_seat_L"> Window Glass Front Seat</td>
                <td><input type="checkbox" id="weather_window_strip_L" name="weather_window_strip_L"> Weather/Window Strip</td>
              </tr>
       
          </tbody>
        </table>
        <br>
        <table id="left-right-portion">
          <thead>
            <tr>
              <th>Right Side Portion</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td data-label="Right side portion"><input type="checkbox" id="side_mirror_R" name="side_mirror_R"> Side Mirror</td>
                <td><input type="checkbox" id="wind_tunnel_glass_R" name="wind_tunnel_glass_R"> Wind Tunnel Glass</td>
                <td><input type="checkbox" id="window_glass_front_seat_R" name="window_glass_front_seat_R"> Window Glass Front Seat</td>
                <td><input type="checkbox" id="weather_window_strip_R" name="weather_window_strip_R"> Weather/Window Strip</td>
              </tr>
       
          </tbody>
        </table>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Rear Back Portion/Luggage Compartment:</b></h4>
        </section>
        <table>
          <thead>
          </thead>
          <tbody>
              <tr>
                <td><input type="checkbox" id="rear_bumper" name="rear_bumper"> Rear bumper</td>
                <td><input type="checkbox" id="brand_emblem_marking" name="brand_emblem_marking"> Brand Emblem Marking</td>
                <td><input type="checkbox" id="window_glass_front_seat" name="window_glass_front_seat"> Window Glass Front Seat</td>
                <td><input type="checkbox" id="spare_tire_mounting" name="spare_tire_mounting"> Spare Tire Mounting</td>
                <td><input type="checkbox" id="tools" name="tools"> Tools</td>
              </tr>
          </tbody>
        </table>

        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Inside Features:</b></h4>
        </section>
        <table>
          <thead>
          </thead>
          <tbody>
              <tr>
                <td><input type="checkbox" id="steering_wheel" name="steering_wheel"> Steering Wheel</td>
                <td><input type="checkbox" id="shifting_rod_with_knob" name="shifting_rod_with_knob"> Shifting Rod with Knob</td>
                <td><input type="checkbox" id="hand_break" name="hand_break"> Hand Brake</td>
                <td><input type="checkbox" id="ammeter" name="ammeter"> Ammeter</td>
                <td><input type="checkbox" id="oil_pressure_gauge" name="oil_pressure_gauge"> Oil Pressure Gauge</td>
                <td><input type="checkbox" id="temperature_gauge" name="temperature_gauge"> Temperature Gauge</td>

              </tr>
              <tr>
                <td><input type="checkbox" id="rpm_gauge" name="rpm_gauge"> RPM Gauge</td>
                <td><input type="checkbox" id="headlight_knob" name="headlight_knob"> Headlight Knob</td>
                <td><input type="checkbox" id="parking_hazard_knob" name="parking_hazard_knob"> Parking/Hazard Knob</td>
                <td><input type="checkbox" id="wiper_knob" name="wiper_knob"> Wiper Knob</td>
                <td><input type="checkbox" id="dimmer_switch" name="dimmer_switch"> Dimmer Switch</td>
                <td><input type="checkbox" id="directional_level" name="directional_level"> Directional Level</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="speedometer" name="speedometer"> Speedometer</td>
                <td><input type="checkbox" id="fuel_gauge" name="fuel_gauge"> Fuel Gauge</td>
                <td><input type="checkbox" id="cars_seats_front" name="cars_seats_front"> Cars Seats Front</td>
                <td><input type="checkbox" id="car_seat_back" name="car_seat_back"> Car Seat Back</td>
                <td><input type="checkbox" id="car_seat_cover" name="car_seat_cover"> Car Seat Cover</td>
                <td><input type="checkbox" id="floor_carpet" name="floor_carpet"> Floor Carpet</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="floor_matting" name="floor_matting"> Floor Matting</td>
                <td><input type="checkbox" id="computer_box" name="computer_box"> Computer Box</td>
                <td><input type="checkbox" id="air_condition_unit" name="air_condition_unit"> Air-condition Unit</td>
                <td><input type="checkbox" id="car_stereo" name="car_stereo"> Car Stereo</td>
                <td><input type="checkbox" id="interceptor_cable" name="interceptor_cable"> Interceptor Cable</td>
                <td><input type="checkbox" id="stereo_speaker" name="stereo_speaker"> Stereo Speakers</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="twitter" name="twitter"> Twitters</td>
                <td><input type="checkbox" id="car_radio" name="car_radio"> Car Radio</td>
                <td><input type="checkbox" id="equalizer" name="equalizer"> Equalizer</td>
                <td><input type="checkbox" id="cd_charger" name="cd_charger"> CD Charger</td>
                <td><input type="checkbox" id="lighter" name="lighter"> Lighter</td>
                <td><input type="checkbox" id="barometer" name="barometer"> Barometer</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="fire_extinguisher" name="fire_extinguisher"> Fire Extinguisher</td>
                <td><input type="checkbox" id="antennae" name="antennae"> Antennae</td>
              </tr>
       
          </tbody>
        </table>


        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Engine Compartment:</b></h4>
        </section>
        <table>
          <thead>
          </thead>
          <tbody>
              <tr>
                <td><input type="checkbox" id="air_con_compressor" name="air_con_compressor"> Air-con Compressor</td>
                <td><input type="checkbox" id="radiator" name="radiator"> Radiator</td>
                <td><input type="checkbox" id="radiator_cover" name="radiator_cover"> Radiator Cover</td>
                <td><input type="checkbox" id="radiator_inlet_hose" name="radiator_inlet_hose"> Radiator Inlet Hose</td>
                <td><input type="checkbox" id="radiator_outlet_hose" name="radiator_outlet_hose"> Radiator Outlet Hose</td>
                <td><input type="checkbox" id="water_bypass_hose" name="water_bypass_hose"> Water Bypass Hose</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="ignition_coil" name="ignition_coil"> Ignition Coil</td>
                <td><input type="checkbox" id="high_tension_wire" name="high_tension_wire"> High Tension Wire</td>
                <td><input type="checkbox" id="distibutor_Cap" name="distibutor_Cap"> Distributor Cap</td>
                <td><input type="checkbox" id="distributor_assembly" name="distributor_assembly"> Distributor Assembly</td>
                <td><input type="checkbox" id="contact_point" name="contact_point"> Contact Point</td>
                <td><input type="checkbox" id="condenser" name="condenser"> Condenser</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="air_con_condenser" name="air_con_condenser"> Air-con Condenser</td>
                <td><input type="checkbox" id="rotor" name="rotor"> Rotor</td>
                <td><input type="checkbox" id="advancer" name="advancer"> Advancer</td>
                <td><input type="checkbox" id="oil_dipstick" name="oil_dipstick"> Oil Dipstick</td>
                <td><input type="checkbox" id="air_con_driver_belt" name="air_con_driver_belt"> Air-con Driver Belt</td>
                <td><input type="checkbox" id="carburettor_assembly" name="carburettor_assembly"> Carburettor Assembly</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="alternator" name="alternator"> Alternator</td>
                <td><input type="checkbox" id="alternator_voltage_regulator" name="alternator_voltage_regulator"> Alternator Voltage Regulator</td>
                <td><input type="checkbox" id="oil_filter" name="oil_filter"> Oil filter</td>
                <td><input type="checkbox" id="steering_gear_box" name="steering_gear_box"> Steering Gear Box</td>
                <td><input type="checkbox" id="water_pump_assembly" name="water_pump_assembly"> Water Pump Assembly</td>
                <td><input type="checkbox" id="engine_fan" name="engine_fan"> Engine Fan</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="auxiliary_fan" name="auxiliary_fan"> Auxiliary Fan</td>
                <td><input type="checkbox" id="fan_belt" name="fan_belt"> Fan Belt</td>
                <td><input type="checkbox" id="spark_plugs" name="spark_plugs"> Spark Plugs</td>
                <td><input type="checkbox" id="battery" name="battery"> Battery</td>
                <td><input type="checkbox" id="battery_cable" name="battery_cable"> Battery Cable</td>
                <td><input type="checkbox" id="battery_terminal" name="battery_terminal"> Battery Terminal</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="horn_assembly" name="horn_assembly"> Horn Assembly</td>
                <td><input type="checkbox" id="horn_relay" name="horn_relay"> Horn Relay</td>
                <td><input type="checkbox" id="accelerator_cable" name="accelerator_cable"> Accelerator Cable</td>
                <td><input type="checkbox" id="intake_manifold" name="intake_manifold"> Intake Manifold</td>
                <td><input type="checkbox" id="exhaust_manifold" name="exhaust_manifold"> Exhaust Manifold</td>
                <td><input type="checkbox" id="engine_mounting" name="engine_mounting"> Engine Mounting</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="ignition_wiring" name="ignition_wiring"> Ignition wiring</td>
                <td><input type="checkbox" id="transmission" name="transmission"> Transmission</td>
                <td><input type="checkbox" id="suspension_assembly" name="suspension_assembly"> Suspension Assembly</td>
                <td><input type="checkbox" id="tie_rod_end" name="tie_rod_end"> Tie Rod End</td>
                <td><input type="checkbox" id="idler_arm" name="idler_arm"> Idler Arm</td>
                <td><input type="checkbox" id="front_coil_spring" name="front_coil_spring"> Front Coil Spring</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="pitman_arm" name="pitman_arm"> Pitman Arm</td>
              </tr>
          </tbody>
        </table>
        <br>
        <section style="padding-bottom:20px;">
              <h4 style="color:#00A3BE;"><b>General Apperance:</b></h4>
        </section>
        <table>
          <tbody>
            <tr>
              <td><input type="checkbox" id="newly_painted" name="newly_painted"> Newly Painted</td>
              <td><input type="checkbox" id="paint_discoloration" name="paint_discoloration"> Paint Discoloration</td>
              <td><input type="checkbox" id="good_body_shape" name="good_body_shape"> Good Body Shape</td>
              <td><input type="checkbox" id="body_in_bad_shape" name="body_in_bad_shape"> Body in Bad Shape</td>
              <td><input type="checkbox" id="body_ongoing_repair" name="body_ongoing_repair"> Body ongoing repair</td>
              <td><input type="checkbox" id="for_repainting" name="for_repainting"> For Repainting</td>
            </tr>
            <tr>
            <td><input type="checkbox" id="beyond_economical_repair" name="beyond_economical_repair"> Beyond Economical Repair and corrosion have set in, which requires a major body repair</td>
            </tr>
          </tbody>
        </table>
        <br>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Remarks:</b></h4>
        </section>
        <textarea class="form-control"  name="remark" id="remark" cols="10" rows="5"></textarea>
        <br>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Recovering Personnel:</b></label>
                <input type="text" class="form-control" name="recovering_personel" id="recovering_personel" placeholder="" value="" >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Witness/Owner/Barangay Official:</b></label>
                <input type="text" class="form-control" name="witness_owner_barangay_official" id="witness_owner_barangay_official" placeholder="" value="" >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Noted by(Head of Office):</b></label>
                <input type="text" class="form-control" name="noted_by" id="noted_by" placeholder="" value="" >
            </div>
        </div>
      </div>
  
   
    <div class="modal-footer">
    <!-- <button type="submit" class="btn btn-primary">Save</button> -->
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
        <div class="col-md-6" id="cancel-button">
            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
    </form>
 
    </div>
  </div>
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
