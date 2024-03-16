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
<div class="modal fade" id="vehicles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-car"></i> <b>Add Evidence - Vehicles</b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="addInvestigators" method="POST">
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
                <input type="text" class="form-control" name="make_type" id="make_type" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Plate No:</b></label>
                <input type="text" class="form-control" name="plate_no" id="plate_no" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Engine No:</b></label>
                <input type="text" class="form-control" name="engine_no" id="engine_no" placeholder="" value="" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Fuel:</b></label>
                <input type="text" class="form-control" name="fuel" id="fuel" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Chasis No:</b></label>
                <input type="text" class="form-control" name="chasis_no" id="chasis_no" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Color:</b></label>
                <input type="text" class="form-control" name="color" id="color" placeholder="" value="" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Registered Owner:</b></label>
                <input type="text" class="form-control" name="registered_owner" id="registered_owner" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Owner's Addres:</b></label>
                <input type="text" class="form-control" name="owner_address" id="owner_address" placeholder="" value="" required>
            </div>
        </div>

        <section style="padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Tires:</b></h4>
    </section>
        <div class="form-row" >
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Brand/Make:</b></label>
                <input type="text" class="form-control" name="brand_make" id="brand_make" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-2">
                <label id="headlabel" for="inputEmail4"><b>Size:</b></label>
                <input type="text" class="form-control" name="size" id="size" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-2">
                <label id="headlabel" for="inputEmail4"><b>Condition:</b></label>
                <input type="text" class="form-control" name="condition" id="condition" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Type:</b></label>
                <input type="text" class="form-control" name="type" id="type" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-2">
                <label id="headlabel" for="inputEmail4"><b>No. of Studs:</b></label>
                <input type="text" class="form-control" name="no_studs" id="no_studs" placeholder="" value="" required>
            </div>
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>General Condition of MV(running):</b></label>
                <input type="text" class="form-control" name="chasis_no" id="chasis_no" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Color:</b></label>
                <input type="text" class="form-control" name="color" id="color" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
            <label id="headlabel" for="inputEmail4"><b>General Condition of the MV:</b></label>
            <table id="General-Condition-of-the-MV">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="radio" name="option1" id="running">
                    <label for="option1_1">Running</label>
                  </td>
                  <td>
                    <input type="radio" name="option1" id="deadline">
                    <label for="option2_1">Deadline</label>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
        </div>
       

        <section style="padding-bottom:20px;">
              <h4 style="color:#00A3BE;"><b>Outside Features Front:</b></h4>
        </section>
        <table>
          <tbody>
            <tr>
              <td><input type="checkbox" id="bumper_front"> Bumper Front</td>
              <td><input type="checkbox" id="fog_light"> Fog light</td>
              <td><input type="checkbox" id="brand_marking_emblem"> Brand Marking Emblem</td>
              <td><input type="checkbox" id="headlights_lr"> Headlights LR</td>
              <td><input type="checkbox" id="radiator_grill"> Radiator Grill</td>
              <td><input type="checkbox" id="windshield_wiper"> Windshield Wiper</td>
            </tr>
            <tr>
              <td><input type="checkbox" id="signal_lights_lr"> Signal Lights L/R</td>
              <td><input type="checkbox" id="windshield_glass"> Windshield Glass</td>
              <td><input type="checkbox" id="hazzard_lights_lr"> Hazard Lights L/R</td>
              <td><input type="checkbox" id="windshield_wiper_blade"> Windshield Wiper Blade</td>
              <td><input type="checkbox" id="headlights_guard"> Headlights Guard</td>
              <td><input type="checkbox" id="windshield_wiper_motor"> Windshield Wiper Motor</td>
            </tr>
            <!-- Add more rows here if needed -->
          </tbody>
        </table>
       
        <br>
        <!-- <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Left</b></h4>
        </section> -->
        <table id="left-right-portion">
          <thead>
            <tr>
              <th>Left Side Portion <i style="color:white;">_</i></th>
            </tr>
          </thead>
          <tbody>
              <tr>
           
                <td data-label="Left side portion"><input type="checkbox" id="side_mirror_L"> Side Mirror</td>
                <td><input type="checkbox" id="wind_tunnel_glass_L"> Wind Tunnel Glass</td>
                <td><input type="checkbox" id="window_glass_front_seat_L"> Window Glass Front Seat</td>
                <td><input type="checkbox" id="weather_window_strip_L"> Weather/Window Strip</td>
                <!-- <td><input type="checkbox" id="fog_light"> Radiator Grill</td>
                <td><input type="checkbox" id="fog_light"> Windshield Wiper</td> -->
              </tr>
            <!-- Add more rows here if needed -->
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
                <td data-label="Right side portion"><input type="checkbox" id="side_mirror_R"> Side Mirror</td>
                <td><input type="checkbox" id="wind_tunnel_glass_R"> Wind Tunnel Glass</td>
                <td><input type="checkbox" id="window_glass_front_seat_R"> Window Glass Front Seat</td>
                <td><input type="checkbox" id="weather_window_strip_R"> Weather/Window Strip</td>
                <!-- <td><input type="checkbox" id="fog_light"> Windshield Wiper</td> -->
              </tr>
            <!-- Add more rows here if needed -->
          </tbody>
        </table>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Rear Back Portion/Luggage Compartment:</b></h4>
        </section>
        <table>
          <thead>
            <!-- <tr>
              <th>Right Side Portion</th>
            </tr> -->
          </thead>
          <tbody>
              <tr>
                <td><input type="checkbox" id="rear_bumper"> Rear bumper</td>
                <td><input type="checkbox" id="brand_emblem_marking"> Brand Emblem Marking</td>
                <td><input type="checkbox" id="window_glass_front_seat"> Window Glass Front Seat</td>
                <td><input type="checkbox" id="spare_tire_mounting"> Spare Tire Mounting</td>
                <td><input type="checkbox" id="tools"> Tools</td>
                <!-- <td><input type="checkbox" id="fog_light"> Windshield Wiper</td> -->
              </tr>
            <!-- Add more rows here if needed -->
          </tbody>
        </table>

        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Inside Features:</b></h4>
        </section>
        <table>
          <thead>
            <!-- <tr>
              <th>Right Side Portion</th>
            </tr> -->
          </thead>
          <tbody>
              <tr>
                <td><input type="checkbox" id="rear_bumper"> Steering Wheel</td>
                <td><input type="checkbox" id="brand_emblem_marking"> Shifting Rod with Knob</td>
                <td><input type="checkbox" id="window_glass_front_seat"> Hand Brake</td>
                <td><input type="checkbox" id="spare_tire_mounting"> Ammeter</td>
                <td><input type="checkbox" id="tools"> Oil Pressure Gauge</td>
                <td><input type="checkbox" id="rear_bumper"> Temperature Gauge</td>
               
              </tr>
              <tr>
              <td><input type="checkbox" id="brand_emblem_marking"> RPM Gauge</td>
                <td><input type="checkbox" id="window_glass_front_seat"> Headlight Knob</td>
                <td><input type="checkbox" id="spare_tire_mounting"> Parking/Hazard Knob</td>
                <td><input type="checkbox" id="tools"> Wiper Knob</td>
                <td><input type="checkbox" id="tools"> Dimmer Switch</td>
                <td><input type="checkbox" id="rear_bumper"> Directional Level</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="brand_emblem_marking"> Speedometer</td>
                <td><input type="checkbox" id="window_glass_front_seat"> Fuel Gauge</td>
                <td><input type="checkbox" id="spare_tire_mounting"> Cars Seats Front</td>
                <td><input type="checkbox" id="tools"> Car Seat Back</td>
                <td><input type="checkbox" id="rear_bumper"> Car Seat Cover</td>
                <td><input type="checkbox" id="brand_emblem_marking"> Floor Carpet</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="window_glass_front_seat"> Floor Matting</td>
                <td><input type="checkbox" id="spare_tire_mounting"> Steering Wheel</td>
                <td><input type="checkbox" id="tools"> Computer Box</td>
                <td><input type="checkbox" id="tools"> Air-condition Unit</td>
                <td><input type="checkbox" id="rear_bumper"> Car Stereo</td>
                <td><input type="checkbox" id="brand_emblem_marking"> Interceptor Cable</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="rear_bumper"> Stereo Speakers</td>
                <td><input type="checkbox" id="brand_emblem_marking"> Twitters</td>
                <td><input type="checkbox" id="window_glass_front_seat"> Car Radio</td>
                <td><input type="checkbox" id="spare_tire_mounting"> Equalizer</td>
                <td><input type="checkbox" id="tools"> CD Charger</td>
                <td><input type="checkbox" id="tools"> Lighter</td>
              </tr>
              <tr>
              <td><input type="checkbox" id="rear_bumper"> Barometer</td>
                <td><input type="checkbox" id="brand_emblem_marking"> Fire Extinguisher</td>
                <td><input type="checkbox" id="brand_emblem_marking"> Antennae</td>
              </tr>
            <!-- Add more rows here if needed -->
          </tbody>
        </table>


        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Engine Compartment:</b></h4>
        </section>
        <table>
          <thead>
            <!-- <tr>
              <th>Right Side Portion</th>
            </tr> -->
          </thead>
          <tbody>
              <tr>
                <td><input type="checkbox" id="tools"> Air-con Compressor</td>
                <td><input type="checkbox" id="tools"> Radiator</td>
                <td><input type="checkbox" id="tools"> Radiator Cover</td>
                <td><input type="checkbox" id="tools"> Radiator Inlet Hose</td>
                <td><input type="checkbox" id="tools"> Radiator Outlet Hose</td>
                <td><input type="checkbox" id="tools"> Water Bypass Hose</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="tools"> Ignition Coil</td>
                <td><input type="checkbox" id="tools"> High Tension Wire</td>
                <td><input type="checkbox" id="tools"> Distributor Cap</td>
                <td><input type="checkbox" id="tools"> Distributor Assembly</td>
                <td><input type="checkbox" id="tools"> Contact Point</td>
                <td><input type="checkbox" id="tools"> Condenser</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="tools"> Air-con Condenser</td>
                <td><input type="checkbox" id="tools"> Rotor</td>
                <td><input type="checkbox" id="tools"> Advancer</td>
                <td><input type="checkbox" id="tools"> Oil Dipstick</td>
                <td><input type="checkbox" id="tools"> Air-con Driver Belt</td>
                <td><input type="checkbox" id="tools"> Carburettor Assembly</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="tools"> Alternator</td>
                <td><input type="checkbox" id="tools"> Alternator Voltage Regulator</td>
                <td><input type="checkbox" id="tools"> Oil filter</td>
                <td><input type="checkbox" id="tools"> Steering Gear Box</td>
                <td><input type="checkbox" id="tools"> Water Pump Assembly</td>
                <td><input type="checkbox" id="tools"> Engine Fan</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="tools"> Auxiliary Fan</td>
                <td><input type="checkbox" id="tools"> Fan Belt</td>
                <td><input type="checkbox" id="tools"> Spark Plugs</td>
                <td><input type="checkbox" id="tools"> Battery</td>
                <td><input type="checkbox" id="tools"> Battery Cable</td>
                <td><input type="checkbox" id="tools"> Battery Terminal</td>
               
              </tr>
              <tr>
                <td><input type="checkbox" id="tools"> Horn Assembly</td>
                <td><input type="checkbox" id="tools"> Horn Relay</td>
                <td><input type="checkbox" id="tools"> Accelerator Cable</td>
                <td><input type="checkbox" id="tools"> Intake Manifold</td>
                <td><input type="checkbox" id="tools"> Exhaust Manifold</td>
                <td><input type="checkbox" id="tools"> Engine Mounting</td>
                
              </tr>
              <tr>
                <td><input type="checkbox" id="tools"> Ignition wiring</td>
                <td><input type="checkbox" id="tools"> Transmission</td>
                <td><input type="checkbox" id="tools"> Suspension Assembly</td>
                <td><input type="checkbox" id="tools"> Tie Rod End</td>
                <td><input type="checkbox" id="tools"> Idler Arm</td>
                <td><input type="checkbox" id="tools"> Front Coil Spring</td>
              </tr>
              <tr>
                <td><input type="checkbox" id="tools"> Pitman Arm</td>
              </tr>
            <!-- Add more rows here if needed -->
          </tbody>
        </table>
        <br>
        <section style="padding-bottom:20px;">
              <h4 style="color:#00A3BE;"><b>General Apperance:</b></h4>
        </section>
        <table>
          <tbody>
            <tr>
              <td><input type="checkbox" id="bumper_front"> Newly Painted</td>
              <td><input type="checkbox" id="fog_light"> Paint Discoloration</td>
              <td><input type="checkbox" id="fog_light"> Good Body Shape</td>
              <td><input type="checkbox" id="fog_light"> Body in Bad Shape</td>
              <td><input type="checkbox" id="fog_light"> Body ongoing repair</td>
              <td><input type="checkbox" id="fog_light"> For Repainting</td>
            </tr>
            <tr>
            <td><input type="checkbox" id="fog_light"> Beyong Economical Repair and corrosion have set in, which requires a major body repair</td>
            </tr>
            <!-- Add more rows here if needed -->
          </tbody>
        </table>
        <br>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Remarks:</b></h4>
        </section>
        <textarea class="form-control"  name="Remark" id="Remark" cols="10" rows="5"></textarea>
        <br>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Recovering Personnel:</b></label>
                <input type="text" class="form-control" name="make_type" id="make_type" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Witness/Owner/Barangay Official:</b></label>
                <input type="text" class="form-control" name="plate_no" id="plate_no" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Noted by(Head of Office):</b></label>
                <input type="text" class="form-control" name="engine_no" id="engine_no" placeholder="" value="" required>
            </div>
        </div>
      </div>
  
      <!-- <section style="padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Motor Vehicle Description:</b></h4>
    </section> -->
       
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
