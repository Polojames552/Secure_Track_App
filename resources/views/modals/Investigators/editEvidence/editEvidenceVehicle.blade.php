<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Show Password Example</title>
</head>
<body>



<style>
    .modal-table td {
    /* color: blue; */
    font-size: 14px;
    /* font-weight: bold; */
    /* font-style: italic; */
    }
    .modal-table {
        width: 100%;
        border-collapse: collapse;
    }
    .modal-table th, .modal-table td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    @media only screen and (max-width: 600px) {
        .modal-table, .modal-table thead, .modal-table tbody, .modal-table th,.modal-table td,.modal-table tr {
            display: block;
        }
        .modal-table thead,.modal-table tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        .modal-table tr {
            border: 1px solid #dddddd;
            margin-bottom: 10px;
        }
        .modal-table td {
            border: none;
            position: relative;
            /* padding-left: 50%; */
        }
        .modal-table td:before {
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
        #Rear-Back-Portion{
            font-size:15px;
        }
        #beyond-economical{
            word-wrap: break-word;
        }
        
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
<div class="modal fade" id="editEvidenceVehicleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-car"></i> <b style="color:#79B650;">Edit Evidence - Vehicles</b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{ route ('editEvidence_Vehicles', $data->id) }}" method="POST">
      @csrf
      <div class="modal-body">
   
    <section style="padding-bottom:10px;">
              <h4 style="color:#79B650;"><b>Motor Vehicle Description:</b></h4>
    </section>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Make/Type:</b></label>
                <input type="text" class="form-control" name="make_type" id="make_type" placeholder="" value="{{$data->make_type}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Plate No:</b></label>
                <input type="text" class="form-control" name="plate_no" id="plate_no" placeholder="" value="{{$data->plate_no}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Engine No:</b></label>
                <input type="text" class="form-control" name="engine_no" id="engine_no" placeholder="" value="{{$data->engine_no}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Fuel:</b></label>
                <input type="text" class="form-control" name="fuel" id="fuel" placeholder="" value="{{$data->fuel}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Chasis No:</b></label>
                <input type="text" class="form-control" name="chasis_no" id="chasis_no" placeholder="" value="{{$data->chasis_no}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Color:</b></label>
                <input type="text" class="form-control" name="color" id="color" placeholder="" value="{{$data->color}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Registered Owner:</b></label>
                <input type="text" class="form-control" name="registered_owner" id="registered_owner" placeholder="" value="{{$data->registered_owner}}" required>
            </div>
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Owner's Addres:</b></label>
                <input type="text" class="form-control" name="owner_address" id="owner_address" placeholder="" value="{{$data->owner_address}}" required>
            </div>
        </div>
        <section style="padding-bottom:10px;">
              <h4 style="color:#79B650;"><b>Tires:</b></h4>
    </section>
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Brand/Make:</b></label>
                <input type="text" class="form-control" name="brand_make" id="brand_make" placeholder="" value="{{$data->brand_make}}" required>
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
                        <input type="radio" name="general_condition" id="general_condition" value="Running" checked >
                        <label for="option1_1">Running</label>
                    </td>
                    <td style="font-size:11px;">
                        <input type="radio" name="general_condition" id="general_condition" value="Deadline" >
                        <label for="option2_1">Deadline</label>
                    </td>
                    @else
                    <td style="font-size:11px;">
                        <input type="radio" name="general_condition" id="general_condition" value="Running"  >
                        <label for="option1_1">Running</label>
                    </td>
                    <td style="font-size:11px;">
                        <input type="radio" name="general_condition" id="general_condition" value="Deadline" checked>
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
                <input type="text" class="form-control" name="size" id="size" placeholder="" value="{{$data->size}}" required>
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Condition:</b></label>
                <input type="text" class="form-control" name="condition" id="condition" placeholder="" value="{{$data->condition}}" required>
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Type:</b></label>
                <input type="text" class="form-control" name="type" id="type" placeholder="" value="{{$data->type}}" required>
            </div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>No. of Studs:</b></label>
                <input type="number" class="form-control" name="no_studs" id="no_studs" placeholder="" value="{{$data->no_studs}}" required>
            </div>
        </div>
       

        <section style="padding-bottom:20px;">
              <h4 style="color:#79B650;"><b>Outside Features Front:</b></h4>
        </section>
        <table name="modal-table">
          <tbody>
            <tr>
            @if($data->bumper_front == "true")
                <td style="font-size:11px;"><input type="checkbox" id="bumper_front" name="bumper_front" value="bumper_front" checked> Bumper Front</td>
            @else
                <td style="font-size:11px;"><input type="checkbox" id="bumper_front" name="bumper_front" value="bumper_front"> Bumper Front</td>
            @endif
            <td style="font-size:11px;">
                @if($data->fog_light == "true")
                    <input type="checkbox" id="fog_light" name="fog_light" value="fog_light" checked> Fog light
                @else
                    <input type="checkbox" id="fog_light" name="fog_light" value="fog_light"> Fog light
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->brand_marking_emblem == "true")
                    <input type="checkbox" id="brand_marking_emblem" name="brand_marking_emblem" checked> Brand Marking Emblem
                @else
                    <input type="checkbox" id="brand_marking_emblem" name="brand_marking_emblem"> Brand Marking Emblem
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->headlights_lr == "true")
                    <input type="checkbox" id="headlights_lr" name="headlights_lr" checked> Headlights LR
                @else
                    <input type="checkbox" id="headlights_lr" name="headlights_lr"> Headlights LR
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->radiator_grill == "true")
                    <input type="checkbox" id="radiator_grill" name="radiator_grill" checked> Radiator Grill
                @else
                    <input type="checkbox" id="radiator_grill" name="radiator_grill"> Radiator Grill
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->windshield_wiper == "true")
                    <input type="checkbox" id="windshield_wiper" name="windshield_wiper" checked> Windshield Wiper
                @else
                    <input type="checkbox" id="windshield_wiper" name="windshield_wiper"> Windshield Wiper
                @endif
            </td>

            </tr>

            <tr>
            <td style="font-size:11px;">
                @if($data->signal_lights_lr == "true")
                    <input type="checkbox" id="signal_lights_lr" name="signal_lights_lr" checked> Signal Lights L/R
                @else
                    <input type="checkbox" id="signal_lights_lr" name="signal_lights_lr"> Signal Lights L/R
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->windshield_glass == "true")
                    <input type="checkbox" id="windshield_glass" name="windshield_glass" checked> Windshield Glass
                @else
                    <input type="checkbox" id="windshield_glass" name="windshield_glass"> Windshield Glass
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->hazzard_lights_lr == "true")
                    <input type="checkbox" id="hazzard_lights_lr" name="hazzard_lights_lr" checked> Hazard Lights L/R
                @else
                    <input type="checkbox" id="hazzard_lights_lr" name="hazzard_lights_lr"> Hazard Lights L/R
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->windshield_wiper_blade == "true")
                    <input type="checkbox" id="windshield_wiper_blade" name="windshield_wiper_blade" checked> Windshield Wiper Blade
                @else
                    <input type="checkbox" id="windshield_wiper_blade" name="windshield_wiper_blade"> Windshield Wiper Blade
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->headlights_guard == "true")
                    <input type="checkbox" id="headlights_guard" name="headlights_guard" checked> Headlights Guard
                @else
                    <input type="checkbox" id="headlights_guard" name="headlights_guard"> Headlights Guard
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->windshield_wiper_motor == "true")
                    <input type="checkbox" id="windshield_wiper_motor" name="windshield_wiper_motor" checked> Windshield Wiper Motor
                @else
                    <input type="checkbox" id="windshield_wiper_motor" name="windshield_wiper_motor"> Windshield Wiper Motor
                @endif
            </td>

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
              <td data-label="Left side portion">
    @if($data->side_mirror_L == "true")
        <input type="checkbox" id="side_mirror_L" name="side_mirror_L" checked> Side Mirror
    @else
        <input type="checkbox" id="side_mirror_L" name="side_mirror_L"> Side Mirror
    @endif
</td>

<td style="font-size:11px;">
    @if($data->wind_tunnel_glass_L == "true")
        <input type="checkbox" id="wind_tunnel_glass_L" name="wind_tunnel_glass_L" checked> Wind Tunnel Glass
    @else
        <input type="checkbox" id="wind_tunnel_glass_L" name="wind_tunnel_glass_L"> Wind Tunnel Glass
    @endif
</td>

<td style="font-size:11px;">
    @if($data->window_glass_front_seat_L == "true")
        <input type="checkbox" id="window_glass_front_seat_L" name="window_glass_front_seat_L" checked> Window Glass Front Seat
    @else
        <input type="checkbox" id="window_glass_front_seat_L" name="window_glass_front_seat_L"> Window Glass Front Seat
    @endif
</td>

<td style="font-size:11px;">
    @if($data->weather_window_strip_L == "true")
        <input type="checkbox" id="weather_window_strip_L" name="weather_window_strip_L" checked> Weather/Window Strip
    @else
        <input type="checkbox" id="weather_window_strip_L" name="weather_window_strip_L"> Weather/Window Strip
    @endif
</td>

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
              <td data-label="Right side portion">
    @if($data->side_mirror_R == "true")
        <input type="checkbox" id="side_mirror_R" name="side_mirror_R" checked> Side Mirror
    @else
        <input type="checkbox" id="side_mirror_R" name="side_mirror_R"> Side Mirror
    @endif
</td>

<td style="font-size:11px;">
    @if($data->wind_tunnel_glass_R == "true")
        <input type="checkbox" id="wind_tunnel_glass_R" name="wind_tunnel_glass_R" checked> Wind Tunnel Glass
    @else
        <input type="checkbox" id="wind_tunnel_glass_R" name="wind_tunnel_glass_R"> Wind Tunnel Glass
    @endif
</td>

<td style="font-size:11px;">
    @if($data->window_glass_front_seat_R == "true")
        <input type="checkbox" id="window_glass_front_seat_R" name="window_glass_front_seat_R" checked> Window Glass Front Seat
    @else
        <input type="checkbox" id="window_glass_front_seat_R" name="window_glass_front_seat_R"> Window Glass Front Seat
    @endif
</td>

<td style="font-size:11px;">
    @if($data->weather_window_strip_R == "true")
        <input type="checkbox" id="weather_window_strip_R" name="weather_window_strip_R" checked> Weather/Window Strip
    @else
        <input type="checkbox" id="weather_window_strip_R" name="weather_window_strip_R"> Weather/Window Strip
    @endif
</td>

              </tr>
       
          </tbody>
        </table>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#79B650;" id="Rear-Back-Portion"><b>Rear Back Portion/Luggage Compartment:</b></h4>
        </section>
        <table name="modal-table">
          <thead>
          </thead>
          <tbody>
              <tr>
              <td style="font-size:11px;">
    @if($data->rear_bumper == "true")
        <input type="checkbox" id="rear_bumper" name="rear_bumper" checked> Rear bumper
    @else
        <input type="checkbox" id="rear_bumper" name="rear_bumper"> Rear bumper
    @endif
</td>

<td style="font-size:11px;">
    @if($data->brand_emblem_marking == "true")
        <input type="checkbox" id="brand_emblem_marking" name="brand_emblem_marking" checked> Brand Emblem Marking
    @else
        <input type="checkbox" id="brand_emblem_marking" name="brand_emblem_marking"> Brand Emblem Marking
    @endif
</td>

<td style="font-size:11px;">
    @if($data->window_glass_front_seat == "true")
        <input type="checkbox" id="window_glass_front_seat" name="window_glass_front_seat" checked> Window Glass Front Seat
    @else
        <input type="checkbox" id="window_glass_front_seat" name="window_glass_front_seat"> Window Glass Front Seat
    @endif
</td>

<td style="font-size:11px;">
    @if($data->spare_tire_mounting == "true")
        <input type="checkbox" id="spare_tire_mounting" name="spare_tire_mounting" checked> Spare Tire Mounting
    @else
        <input type="checkbox" id="spare_tire_mounting" name="spare_tire_mounting"> Spare Tire Mounting
    @endif
</td>

<td style="font-size:11px;">
    @if($data->tools == "true")
        <input type="checkbox" id="tools" name="tools" checked> Tools
    @else
        <input type="checkbox" id="tools" name="tools"> Tools
    @endif
</td>

              </tr>
          </tbody>
        </table>

        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#79B650;"><b>Inside Features:</b></h4>
        </section>
        <table name="modal-table">
          <thead>
          </thead>
          <tbody>
              <tr>
              <td style="font-size:11px;">
    @if($data->steering_wheel == "true")
        <input type="checkbox" id="steering_wheel" name="steering_wheel" checked> Steering Wheel
    @else
        <input type="checkbox" id="steering_wheel" name="steering_wheel"> Steering Wheel
    @endif
</td>

<td style="font-size:11px;">
    @if($data->shifting_rod_with_knob == "true")
        <input type="checkbox" id="shifting_rod_with_knob" name="shifting_rod_with_knob" checked> Shifting Rod with Knob
    @else
        <input type="checkbox" id="shifting_rod_with_knob" name="shifting_rod_with_knob"> Shifting Rod with Knob
    @endif
</td>

<td style="font-size:11px;">
    @if($data->hand_break == "true")
        <input type="checkbox" id="hand_break" name="hand_break" checked> Hand Brake
    @else
        <input type="checkbox" id="hand_break" name="hand_break"> Hand Brake
    @endif
</td>

<td style="font-size:11px;">
    @if($data->ammeter == "true")
        <input type="checkbox" id="ammeter" name="ammeter" checked> Ammeter
    @else
        <input type="checkbox" id="ammeter" name="ammeter"> Ammeter
    @endif
</td>

<td style="font-size:11px;">
    @if($data->oil_pressure_gauge == "true")
        <input type="checkbox" id="oil_pressure_gauge" name="oil_pressure_gauge" checked> Oil Pressure Gauge
    @else
        <input type="checkbox" id="oil_pressure_gauge" name="oil_pressure_gauge"> Oil Pressure Gauge
    @endif
</td>

<td style="font-size:11px;">
    @if($data->temperature_gauge == "true")
        <input type="checkbox" id="temperature_gauge" name="temperature_gauge" checked> Temperature Gauge
    @else
        <input type="checkbox" id="temperature_gauge" name="temperature_gauge"> Temperature Gauge
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->rpm_gauge == "true")
        <input type="checkbox" id="rpm_gauge" name="rpm_gauge" checked> RPM Gauge
    @else
        <input type="checkbox" id="rpm_gauge" name="rpm_gauge"> RPM Gauge
    @endif
</td>

<td style="font-size:11px;">
    @if($data->headlight_knob == "true")
        <input type="checkbox" id="headlight_knob" name="headlight_knob" checked> Headlight Knob
    @else
        <input type="checkbox" id="headlight_knob" name="headlight_knob"> Headlight Knob
    @endif
</td>

<td style="font-size:11px;">
    @if($data->parking_hazard_knob == "true")
        <input type="checkbox" id="parking_hazard_knob" name="parking_hazard_knob" checked> Parking/Hazard Knob
    @else
        <input type="checkbox" id="parking_hazard_knob" name="parking_hazard_knob"> Parking/Hazard Knob
    @endif
</td>

<td style="font-size:11px;">
    @if($data->wiper_knob == "true")
        <input type="checkbox" id="wiper_knob" name="wiper_knob" checked> Wiper Knob
    @else
        <input type="checkbox" id="wiper_knob" name="wiper_knob"> Wiper Knob
    @endif
</td>

<td style="font-size:11px;">
    @if($data->dimmer_switch == "true")
        <input type="checkbox" id="dimmer_switch" name="dimmer_switch" checked> Dimmer Switch
    @else
        <input type="checkbox" id="dimmer_switch" name="dimmer_switch"> Dimmer Switch
    @endif
</td>

<td style="font-size:11px;">
    @if($data->directional_level == "true")
        <input type="checkbox" id="directional_level" name="directional_level" checked> Directional Level
    @else
        <input type="checkbox" id="directional_level" name="directional_level"> Directional Level
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->speedometer == "true")
        <input type="checkbox" id="speedometer" name="speedometer" checked> Speedometer
    @else
        <input type="checkbox" id="speedometer" name="speedometer"> Speedometer
    @endif
</td>

<td style="font-size:11px;">
    @if($data->fuel_gauge == "true")
        <input type="checkbox" id="fuel_gauge" name="fuel_gauge" checked> Fuel Gauge
    @else
        <input type="checkbox" id="fuel_gauge" name="fuel_gauge"> Fuel Gauge
    @endif
</td>

<td style="font-size:11px;">
    @if($data->cars_seats_front == "true")
        <input type="checkbox" id="cars_seats_front" name="cars_seats_front" checked> Cars Seats Front
    @else
        <input type="checkbox" id="cars_seats_front" name="cars_seats_front"> Cars Seats Front
    @endif
</td>

<td style="font-size:11px;">
    @if($data->car_seat_back == "true")
        <input type="checkbox" id="car_seat_back" name="car_seat_back" checked> Car Seat Back
    @else
        <input type="checkbox" id="car_seat_back" name="car_seat_back"> Car Seat Back
    @endif
</td>

<td style="font-size:11px;">
    @if($data->car_seat_cover == "true")
        <input type="checkbox" id="car_seat_cover" name="car_seat_cover" checked> Car Seat Cover
    @else
        <input type="checkbox" id="car_seat_cover" name="car_seat_cover"> Car Seat Cover
    @endif
</td>

<td style="font-size:11px;">
    @if($data->floor_carpet == "true")
        <input type="checkbox" id="floor_carpet" name="floor_carpet" checked> Floor Carpet
    @else
        <input type="checkbox" id="floor_carpet" name="floor_carpet"> Floor Carpet
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->floor_matting == "true")
        <input type="checkbox" id="floor_matting" name="floor_matting" checked> Floor Matting
    @else
        <input type="checkbox" id="floor_matting" name="floor_matting"> Floor Matting
    @endif
</td>

<td style="font-size:11px;">
    @if($data->computer_box == "true")
        <input type="checkbox" id="computer_box" name="computer_box" checked> Computer Box
    @else
        <input type="checkbox" id="computer_box" name="computer_box"> Computer Box
    @endif
</td>

<td style="font-size:11px;">
    @if($data->air_condition_unit == "true")
        <input type="checkbox" id="air_condition_unit" name="air_condition_unit" checked> Air-condition Unit
    @else
        <input type="checkbox" id="air_condition_unit" name="air_condition_unit"> Air-condition Unit
    @endif
</td>

<td style="font-size:11px;">
    @if($data->car_stereo == "true")
        <input type="checkbox" id="car_stereo" name="car_stereo" checked> Car Stereo
    @else
        <input type="checkbox" id="car_stereo" name="car_stereo"> Car Stereo
    @endif
</td>

<td style="font-size:11px;">
    @if($data->interceptor_cable == "true")
        <input type="checkbox" id="interceptor_cable" name="interceptor_cable" checked> Interceptor Cable
    @else
        <input type="checkbox" id="interceptor_cable" name="interceptor_cable"> Interceptor Cable
    @endif
</td>

<td style="font-size:11px;">
    @if($data->stereo_speaker == "true")
        <input type="checkbox" id="stereo_speaker" name="stereo_speaker" checked> Stereo Speakers
    @else
        <input type="checkbox" id="stereo_speaker" name="stereo_speaker"> Stereo Speakers
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->floor_matting == "true")
        <input type="checkbox" id="floor_matting" name="floor_matting" checked> Floor Matting
    @else
        <input type="checkbox" id="floor_matting" name="floor_matting"> Floor Matting
    @endif
</td>

<td style="font-size:11px;">
    @if($data->computer_box == "true")
        <input type="checkbox" id="computer_box" name="computer_box" checked> Computer Box
    @else
        <input type="checkbox" id="computer_box" name="computer_box"> Computer Box
    @endif
</td>

<td style="font-size:11px;">
    @if($data->air_condition_unit == "true")
        <input type="checkbox" id="air_condition_unit" name="air_condition_unit" checked> Air-condition Unit
    @else
        <input type="checkbox" id="air_condition_unit" name="air_condition_unit"> Air-condition Unit
    @endif
</td>

<td style="font-size:11px;">
    @if($data->car_stereo == "true")
        <input type="checkbox" id="car_stereo" name="car_stereo" checked> Car Stereo
    @else
        <input type="checkbox" id="car_stereo" name="car_stereo"> Car Stereo
    @endif
</td>

<td style="font-size:11px;">
    @if($data->interceptor_cable == "true")
        <input type="checkbox" id="interceptor_cable" name="interceptor_cable" checked> Interceptor Cable
    @else
        <input type="checkbox" id="interceptor_cable" name="interceptor_cable"> Interceptor Cable
    @endif
</td>

<td style="font-size:11px;">
    @if($data->stereo_speaker == "true")
        <input type="checkbox" id="stereo_speaker" name="stereo_speaker" checked> Stereo Speakers
    @else
        <input type="checkbox" id="stereo_speaker" name="stereo_speaker"> Stereo Speakers
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->fire_extinguisher == "true")
        <input type="checkbox" id="fire_extinguisher" name="fire_extinguisher" checked> Fire Extinguisher
    @else
        <input type="checkbox" id="fire_extinguisher" name="fire_extinguisher"> Fire Extinguisher
    @endif
</td>

<td style="font-size:11px;">
    @if($data->antennae == "true")
        <input type="checkbox" id="antennae" name="antennae" checked> Antennae
    @else
        <input type="checkbox" id="antennae" name="antennae"> Antennae
    @endif
</td>

              </tr>
       
          </tbody>
        </table>


        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#79B650;"><b>Engine Compartment:</b></h4>
        </section>
        <table name="modal-table">
          <thead>
          </thead>
          <tbody>
              <tr>
              <td style="font-size:11px;">
    @if($data->air_con_compressor == "true")
        <input type="checkbox" id="air_con_compressor" name="air_con_compressor" checked> Air-con Compressor
    @else
        <input type="checkbox" id="air_con_compressor" name="air_con_compressor"> Air-con Compressor
    @endif
</td>

<td style="font-size:11px;">
    @if($data->radiator == "true")
        <input type="checkbox" id="radiator" name="radiator" checked> Radiator
    @else
        <input type="checkbox" id="radiator" name="radiator"> Radiator
    @endif
</td>

<td style="font-size:11px;">
    @if($data->radiator_cover == "true")
        <input type="checkbox" id="radiator_cover" name="radiator_cover" checked> Radiator Cover
    @else
        <input type="checkbox" id="radiator_cover" name="radiator_cover"> Radiator Cover
    @endif
</td>

<td style="font-size:11px;">
    @if($data->radiator_inlet_hose == "true")
        <input type="checkbox" id="radiator_inlet_hose" name="radiator_inlet_hose" checked> Radiator Inlet Hose
    @else
        <input type="checkbox" id="radiator_inlet_hose" name="radiator_inlet_hose"> Radiator Inlet Hose
    @endif
</td>

<td style="font-size:11px;">
    @if($data->radiator_outlet_hose == "true")
        <input type="checkbox" id="radiator_outlet_hose" name="radiator_outlet_hose" checked> Radiator Outlet Hose
    @else
        <input type="checkbox" id="radiator_outlet_hose" name="radiator_outlet_hose"> Radiator Outlet Hose
    @endif
</td>

<td style="font-size:11px;">
    @if($data->water_bypass_hose == "true")
        <input type="checkbox" id="water_bypass_hose" name="water_bypass_hose" checked> Water Bypass Hose
    @else
        <input type="checkbox" id="water_bypass_hose" name="water_bypass_hose"> Water Bypass Hose
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->ignition_coil == "true")
        <input type="checkbox" id="ignition_coil" name="ignition_coil" checked> Ignition Coil
    @else
        <input type="checkbox" id="ignition_coil" name="ignition_coil"> Ignition Coil
    @endif
</td>

<td style="font-size:11px;">
    @if($data->high_tension_wire == "true")
        <input type="checkbox" id="high_tension_wire" name="high_tension_wire" checked> High Tension Wire
    @else
        <input type="checkbox" id="high_tension_wire" name="high_tension_wire"> High Tension Wire
    @endif
</td>

<td style="font-size:11px;">
    @if($data->distibutor_Cap == "true")
        <input type="checkbox" id="distibutor_Cap" name="distibutor_Cap" checked> Distributor Cap
    @else
        <input type="checkbox" id="distibutor_Cap" name="distibutor_Cap"> Distributor Cap
    @endif
</td>

<td style="font-size:11px;">
    @if($data->distributor_assembly == "true")
        <input type="checkbox" id="distributor_assembly" name="distributor_assembly" checked> Distributor Assembly
    @else
        <input type="checkbox" id="distributor_assembly" name="distributor_assembly"> Distributor Assembly
    @endif
</td>

<td style="font-size:11px;">
    @if($data->contact_point == "true")
        <input type="checkbox" id="contact_point" name="contact_point" checked> Contact Point
    @else
        <input type="checkbox" id="contact_point" name="contact_point"> Contact Point
    @endif
</td>

<td style="font-size:11px;">
    @if($data->condenser == "true")
        <input type="checkbox" id="condenser" name="condenser" checked> Condenser
    @else
        <input type="checkbox" id="condenser" name="condenser"> Condenser
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->air_con_condenser == "true")
        <input type="checkbox" id="air_con_condenser" name="air_con_condenser" checked> Air-con Condenser
    @else
        <input type="checkbox" id="air_con_condenser" name="air_con_condenser"> Air-con Condenser
    @endif
</td>

<td style="font-size:11px;">
    @if($data->rotor == "true")
        <input type="checkbox" id="rotor" name="rotor" checked> Rotor
    @else
        <input type="checkbox" id="rotor" name="rotor"> Rotor
    @endif
</td>

<td style="font-size:11px;">
    @if($data->advancer == "true")
        <input type="checkbox" id="advancer" name="advancer" checked> Advancer
    @else
        <input type="checkbox" id="advancer" name="advancer"> Advancer
    @endif
</td>

<td style="font-size:11px;">
    @if($data->oil_dipstick == "true")
        <input type="checkbox" id="oil_dipstick" name="oil_dipstick" checked> Oil Dipstick
    @else
        <input type="checkbox" id="oil_dipstick" name="oil_dipstick"> Oil Dipstick
    @endif
</td>

<td style="font-size:11px;">
    @if($data->air_con_driver_belt == "true")
        <input type="checkbox" id="air_con_driver_belt" name="air_con_driver_belt" checked> Air-con Driver Belt
    @else
        <input type="checkbox" id="air_con_driver_belt" name="air_con_driver_belt"> Air-con Driver Belt
    @endif
</td>

<td style="font-size:11px;">
    @if($data->carburettor_assembly == "true")
        <input type="checkbox" id="carburettor_assembly" name="carburettor_assembly" checked> Carburettor Assembly
    @else
        <input type="checkbox" id="carburettor_assembly" name="carburettor_assembly"> Carburettor Assembly
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->alternator == "true")
        <input type="checkbox" id="alternator" name="alternator" checked> Alternator
    @else
        <input type="checkbox" id="alternator" name="alternator"> Alternator
    @endif
</td>

<td style="font-size:11px;">
    @if($data->alternator_voltage_regulator == "true")
        <input type="checkbox" id="alternator_voltage_regulator" name="alternator_voltage_regulator" checked> Alternator Voltage Regulator
    @else
        <input type="checkbox" id="alternator_voltage_regulator" name="alternator_voltage_regulator"> Alternator Voltage Regulator
    @endif
</td>

<td style="font-size:11px;">
    @if($data->oil_filter == "true")
        <input type="checkbox" id="oil_filter" name="oil_filter" checked> Oil filter
    @else
        <input type="checkbox" id="oil_filter" name="oil_filter"> Oil filter
    @endif
</td>

<td style="font-size:11px;">
    @if($data->steering_gear_box == "true")
        <input type="checkbox" id="steering_gear_box" name="steering_gear_box" checked> Steering Gear Box
    @else
        <input type="checkbox" id="steering_gear_box" name="steering_gear_box"> Steering Gear Box
    @endif
</td>

<td style="font-size:11px;">
    @if($data->water_pump_assembly == "true")
        <input type="checkbox" id="water_pump_assembly" name="water_pump_assembly" checked> Water Pump Assembly
    @else
        <input type="checkbox" id="water_pump_assembly" name="water_pump_assembly"> Water Pump Assembly
    @endif
</td>

<td style="font-size:11px;">
    @if($data->engine_fan == "true")
        <input type="checkbox" id="engine_fan" name="engine_fan" checked> Engine Fan
    @else
        <input type="checkbox" id="engine_fan" name="engine_fan"> Engine Fan
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->auxiliary_fan == "true")
        <input type="checkbox" id="auxiliary_fan" name="auxiliary_fan" checked> Auxiliary Fan
    @else
        <input type="checkbox" id="auxiliary_fan" name="auxiliary_fan"> Auxiliary Fan
    @endif
</td>

<td style="font-size:11px;">
    @if($data->fan_belt == "true")
        <input type="checkbox" id="fan_belt" name="fan_belt" checked> Fan Belt
    @else
        <input type="checkbox" id="fan_belt" name="fan_belt"> Fan Belt
    @endif
</td>

<td style="font-size:11px;">
    @if($data->spark_plugs == "true")
        <input type="checkbox" id="spark_plugs" name="spark_plugs" checked> Spark Plugs
    @else
        <input type="checkbox" id="spark_plugs" name="spark_plugs"> Spark Plugs
    @endif
</td>

<td style="font-size:11px;">
    @if($data->battery == "true")
        <input type="checkbox" id="battery" name="battery" checked> Battery
    @else
        <input type="checkbox" id="battery" name="battery"> Battery
    @endif
</td>

<td style="font-size:11px;">
    @if($data->battery_cable == "true")
        <input type="checkbox" id="battery_cable" name="battery_cable" checked> Battery Cable
    @else
        <input type="checkbox" id="battery_cable" name="battery_cable"> Battery Cable
    @endif
</td>

<td style="font-size:11px;">
    @if($data->battery_terminal == "true")
        <input type="checkbox" id="battery_terminal" name="battery_terminal" checked> Battery Terminal
    @else
        <input type="checkbox" id="battery_terminal" name="battery_terminal"> Battery Terminal
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
    @if($data->horn_assembly == "true")
        <input type="checkbox" id="horn_assembly" name="horn_assembly" checked> Horn Assembly
    @else
        <input type="checkbox" id="horn_assembly" name="horn_assembly"> Horn Assembly
    @endif
</td>

<td style="font-size:11px;">
    @if($data->horn_relay == "true")
        <input type="checkbox" id="horn_relay" name="horn_relay" checked> Horn Relay
    @else
        <input type="checkbox" id="horn_relay" name="horn_relay"> Horn Relay
    @endif
</td>

<td style="font-size:11px;">
    @if($data->accelerator_cable == "true")
        <input type="checkbox" id="accelerator_cable" name="accelerator_cable" checked> Accelerator Cable
    @else
        <input type="checkbox" id="accelerator_cable" name="accelerator_cable"> Accelerator Cable
    @endif
</td>

<td style="font-size:11px;">
    @if($data->intake_manifold == "true")
        <input type="checkbox" id="intake_manifold" name="intake_manifold" checked> Intake Manifold
    @else
        <input type="checkbox" id="intake_manifold" name="intake_manifold"> Intake Manifold
    @endif
</td>

<td style="font-size:11px;">
    @if($data->exhaust_manifold == "true")
        <input type="checkbox" id="exhaust_manifold" name="exhaust_manifold" checked> Exhaust Manifold
    @else
        <input type="checkbox" id="exhaust_manifold" name="exhaust_manifold"> Exhaust Manifold
    @endif
</td>

<td style="font-size:11px;">
    @if($data->engine_mounting == "true")
        <input type="checkbox" id="engine_mounting" name="engine_mounting" checked> Engine Mounting
    @else
        <input type="checkbox" id="engine_mounting" name="engine_mounting"> Engine Mounting
    @endif
</td>

              </tr>
              <tr>
              <td style="font-size:11px;">
                @if($data->ignition_wiring == "true")
                    <input type="checkbox" id="ignition_wiring" name="ignition_wiring" checked> Ignition Wiring
                @else
                    <input type="checkbox" id="ignition_wiring" name="ignition_wiring"> Ignition Wiring
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->transmission == "true")
                    <input type="checkbox" id="transmission" name="transmission" checked> Transmission
                @else
                    <input type="checkbox" id="transmission" name="transmission"> Transmission
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->suspension_assembly == "true")
                    <input type="checkbox" id="suspension_assembly" name="suspension_assembly" checked> Suspension Assembly
                @else
                    <input type="checkbox" id="suspension_assembly" name="suspension_assembly"> Suspension Assembly
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->tie_rod_end == "true")
                    <input type="checkbox" id="tie_rod_end" name="tie_rod_end" checked> Tie Rod End
                @else
                    <input type="checkbox" id="tie_rod_end" name="tie_rod_end"> Tie Rod End
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->idler_arm == "true")
                    <input type="checkbox" id="idler_arm" name="idler_arm" checked> Idler Arm
                @else
                    <input type="checkbox" id="idler_arm" name="idler_arm"> Idler Arm
                @endif
            </td>

            <td style="font-size:11px;">
                @if($data->front_coil_spring == "true")
                    <input type="checkbox" id="front_coil_spring" name="front_coil_spring" checked> Front Coil Spring
                @else
                    <input type="checkbox" id="front_coil_spring" name="front_coil_spring"> Front Coil Spring
                @endif
            </td>

              </tr>
              <tr>
                @if($data->pitman_arm == "true")
                    <td style="font-size:11px;"><input type="checkbox" id="pitman_arm" name="pitman_arm" checked> Pitman Arm</td>
                @else
                    <td style="font-size:11px;"><input type="checkbox" id="pitman_arm" name="pitman_arm"> Pitman Arm</td>
                @endif
              </tr>
          </tbody>
        </table>
        <br>
        <section style="padding-bottom:20px;">
              <h4 style="color:#79B650;"><b>General Apperance:</b></h4>
        </section>
        <table name="modal-table" style="table-layout: responsive;">
          <tbody>
            <tr>
                <td style="font-size:11px;">
                    @if($data->newly_painted == "true")
                        <input type="checkbox" id="newly_painted" name="newly_painted" checked>
                    @else
                        <input type="checkbox" id="newly_painted" name="newly_painted">
                    @endif
                    Newly Painted
                </td>
                <td style="font-size:11px;">
                    @if($data->paint_discoloration == "true")
                        <input type="checkbox" id="paint_discoloration" name="paint_discoloration" checked>
                    @else
                        <input type="checkbox" id="paint_discoloration" name="paint_discoloration">
                    @endif
                    Paint Discoloration
                </td>
                <td style="font-size:11px;">
                    @if($data->good_body_shape == "true")
                        <input type="checkbox" id="good_body_shape" name="good_body_shape" checked>
                    @else
                        <input type="checkbox" id="good_body_shape" name="good_body_shape">
                    @endif
                    Good Body Shape
                </td>
                <td style="font-size:11px;">
                    @if($data->body_in_bad_shape == "true")
                        <input type="checkbox" id="body_in_bad_shape" name="body_in_bad_shape" checked>
                    @else
                        <input type="checkbox" id="body_in_bad_shape" name="body_in_bad_shape">
                    @endif
                    Body in Bad Shape
                </td>
            </tr>
            <tr>
                <td style="font-size:11px;">
                    @if($data->body_ongoing_repair == "true")
                        <input type="checkbox" id="body_ongoing_repair" name="body_ongoing_repair" checked>
                    @else
                        <input type="checkbox" id="body_ongoing_repair" name="body_ongoing_repair">
                    @endif
                    Body ongoing repair
                </td>
                <td style="font-size:11px;">
                    @if($data->for_repainting == "true")
                        <input type="checkbox" id="for_repainting" name="for_repainting" checked>
                    @else
                        <input type="checkbox" id="for_repainting" name="for_repainting">
                    @endif
                    For Repainting
                </td>
                <td style="font-size:11px; word-wrap: break-word; white-space: normal;">
                    @if($data->beyond_economical_repair == "true")
                        <input type="checkbox" id="beyond_economical_repair" name="beyond_economical_repair" checked> Beyond Economical Repair and corrosion have set in, which requires a major body repair
                    @else
                        <input type="checkbox" id="beyond_economical_repair" name="beyond_economical_repair"> Beyond Economical Repair and corrosion have set in, which requires a major body repair
                    @endif
                </td>
              
            </tr>
          </tbody>
        </table>
        <br>
        <section style="padding-top:30px;padding-bottom:10px;">
              <h4 style="color:#79B650;"><b>Remarks:</b></h4>
        </section>
        <textarea class="form-control"  name="remark" id="remark" cols="10" rows="5" required>{{$data->remark}}</textarea>
        <br>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Recovering Personnel:</b></label>
                <input type="text" class="form-control" name="recovering_personel" id="recovering_personel" placeholder="" value="{{$data->recovering_personel}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Witness/Owner/Barangay Official:</b></label>
                <input type="text" class="form-control" name="witness_owner_barangay_official" id="witness_owner_barangay_official" placeholder="" value="{{$data->witness_owner_barangay_official}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Noted by(Head of Office):</b></label>
                <input type="text" class="form-control" name="noted_by" id="noted_by" placeholder="" value="{{$data->noted_by}}" required>
            </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-9">
                </div>
                <div class="form-group col-md-3">
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
  
   
    <div class="modal-footer">
    <div class="row">
        <div class="col-md-6" >
            <button style="height:35px; width:100px;" type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
        <div class="col-md-6" id="cancel-button">
            <button style="height:35px; width:100px;" type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
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
