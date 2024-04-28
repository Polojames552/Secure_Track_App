<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Show Password Example</title>
</head>


<script src="js/mod.js"></script>

<style>

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
#scannerVideo {
        transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        -ms-transform: scaleX(-1);
    }
    
</style>

<!-- Modal -->
</body>
<!-- Make sure jQuery is properly included -->
<!-- Load required libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

<!-- Add this code inside your blade template where you have the modal -->
<div class="modal fade" id="scannerVehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle"><b>Scan Car Records</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Add a button to trigger the scan process -->

            <form id="scanForm" action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12" style="margin-bottom:-130px;">
                            <!-- Add the video element for camera preview -->
                            <video id="scannerVideo" width="100%" height="auto" autoplay playsinline></video>
                            <canvas id="scannerCanvas" style="display: none;"></canvas>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input style="display: none; text-align:center; font-weight:bold; color:3AB830;" type="text" id="uuid" name="uuid" class="form-control" placeholder="Scanned Value" value="" disabled>
                            <input style="display: none; text-align:center; font-weight:bold; color:3AB830;" type="text" id="scannedValue" name="scannedValue" class="form-control" placeholder="Scanned Value" value="" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-info">Proceed</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript code for automatic QR code scanning -->


<!-- Modal -->
<div style="margin-top: -70px;" class="modal fade" id="show-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-car"></i> <b style="color:#79B650;">Evidence History</b> </h3> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="#" method="POST" id="scanForm">
            @csrf
            <div class="modal-body" id="modal-body" style="max-height: 280px; overflow-y: auto; padding-bottom:20px;">
                <!-- <p><strong>make-type:</strong> <span style="color:black;" id="make-type"></span></p> -->
            </div>
            <div class="modal-footer">
              <!-- <div class="row">
                  <div class="col-md-6">
                      <button type="submit" class="btn btn-primary btn-block">Save</button>
                  </div>
                  <div class="col-md-6" id="cancel-button">
                      <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                  </div>
              </div> -->
            </div>
          </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        let video = document.getElementById('scannerVideo');
        let canvas = document.createElement('canvas');
        let stream;

        $('#scannerVehicle').on('shown.bs.modal', function() {
            // Activate camera when modal is opened
            $('#scannerVideo').show();
            $('#scannerCanvas').show();
            $('#scannedValue').hide();
            activateScanner();
        });

        $('#scannerVehicle').on('hidden.bs.modal', function() {
            // Deactivate camera when modal is closed
            $('#scannedValue').val("");
            deactivateScanner();
        });
        function activateScanner() {
            // Access the camera and stream its feed to the video element
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(mediaStream) {
                    stream = mediaStream;
                    video.srcObject = mediaStream;
                    video.onloadedmetadata = function(e) {
                        video.play();
                        scanQRCode();
                    };
                })
                .catch(function(err) {
                    console.log("Error accessing camera: " + err);
                });
        }

        function deactivateScanner() {
            // Stop the camera stream when modal is closed
            if (stream) {
                stream.getTracks().forEach(track => {
                    track.stop();
                });
            }
        }
        function scanQRCode() {
          // Continuously scan for QR codes in the video feed
          setInterval(function() {
              canvas.width = video.videoWidth;
              canvas.height = video.videoHeight;
              let context = canvas.getContext('2d');
              context.drawImage(video, 0, 0, canvas.width, canvas.height);
              let imageData = context.getImageData(0, 0, canvas.width, canvas.height);
              let code = jsQR(imageData.data, imageData.width, imageData.height, {
                  inversionAttempts: "dontInvert",
              });
              if (code) {
                  // if($('#scannedValue').val() == ""){
                  // QR code detected, display the scanned input
                  // $('#scannedValue').val(code.data);
                  // $('#scannedValue').val("Scanning Successful");
                  // $('#uuid').val(code.data);
                  deactivateScanner();
                  $('#scannerVehicle').modal('hide');
                  // $('#show-details').modal('show');
                  var uuid = "{{ route('scanner_vehicle_record', '') }}/" + code.data;
                  $.ajax({
                    url: uuid,
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  success: function(response) {
                    $('#modal-body').empty();
 //displaying present data
                    if (response[1].length > 0) {
                      response[1].forEach(function(data) {
                // Create a new div to display each data item
                var div = $('<div>');
                // Create an unordered list to hold the data items
                var ul = $('<ul>');

                // Iterate through the properties of the data object
                Object.keys(data).forEach(function(key) {
                    // Exclude specific fields
                    if (key !== 'id'&& key !== 'changes' && key !== 'picture' && key !== 'municipality' && key !== 'qr_code_image' && key !== 'uuid' && key !== 'user_id' && key !== 'remember_token' && key !== 'created_at' && key !== 'updated_at') {
                        // Remove underscores from the key and make it bold
                        var formattedKey = key.replace(/_/g, ' ');
                        var boldKey = $('<strong>').text(formattedKey);
                        // Create a list item for each property
                        var li = $('<li>');
                        // Check if the value is boolean
                        if (data[key] === 'true') {
                            // Change text and color based on boolean value
                            var text = data[key] = 'present';
                            var color = data[key] = 'green';
                            li.append(boldKey).append(': <span style="color:' + color + '">' + text + '</span>');
                        }else  if (data[key] === 'false') {
                            var text = data[key] = 'not present';
                            var color = data[key] = 'red';
                            li.append(boldKey).append(': <span style="color:' + color + '">' + text + '</span>');
                        } else {
                            // For non-boolean values, just display the value
                            li.append(boldKey).append(': ' + data[key]);
                        }
                        // Append the list item to the unordered list
                        ul.append(li);
                    }
                });
                var pic = $('<img>').attr('src', "images/"+data.picture).css({
                    'width': '50%', // Set width to 50%
                    'height': 'auto', // Maintain aspect ratio
                    'display': 'block', // Ensure the image is treated as a block element
                    'margin': 'auto', // Center the image horizontally
                    'margin-bottom': '15px'
                });
                // Assuming 'modalContent' is the content area of your modal
                // Empty the modal content and append the unordered list
                var date = $('<div>').css('color', '#E05D44').text(data.date);
                var modalContent = $('<div>').append(date, ul);
                var present = $('<h3>').css('color', '#009A00').text("Present data");
                // Append the modal content to the modal body
                $('#modal-body').append(pic,present,modalContent);
            });
            // Show the modal
            $('#show-details').modal('show');
          }



            //displaying history
                    if (response[0].length > 0) {
                      response[0].forEach(function(data) {
                // Create a new div to display each data item
                var div = $('<div>');

                // Create an unordered list to hold the data items
                var ul = $('<ul>');

                // Iterate through the properties of the data object
                Object.keys(data).forEach(function(key) {
                    // Exclude specific fields
                    if (key !== 'id' && key !== 'municipality' && key !== 'uuid' && key !== 'user_id' && key !== 'remember_token' && key !== 'created_at' && key !== 'updated_at') {
                        // Remove underscores from the key and make it bold
                        var formattedKey = key.replace(/_/g, ' ');
                        var boldKey = $('<strong>').text(formattedKey);
                        // Create a list item for each property
                        var li = $('<li>');
                        // Check if the value is boolean
                        if (data[key] === 'true') {
                            // Change text and color based on boolean value
                            var text = data[key] = 'present';
                            var color = data[key] = 'green';
                            li.append(boldKey).append(': <span style="color:' + color + '">' + text + '</span>');
                        }else  if (data[key] === 'false') {
                            var text = data[key] = 'not present';
                            var color = data[key] = 'red';
                            li.append(boldKey).append(': <span style="color:' + color + '">' + text + '</span>');
                        }else if (key === 'receipt') {
                            // li.append(boldKey).append(': <a href="http://127.0.0.1:8000/images/' + data[key] + '" target="_blank">http://127.0.0.1:8000/images/' + data[key] + '</a>');
                            li.append(boldKey).append(': <a href="http://127.0.0.1:8000/images/' + data[key] + '" target="_blank">View Receipt</a>');
                          } else {
                            // For non-boolean values, just display the value
                            li.append(boldKey).append(': ' + data[key]);
                        }
                        // Append the list item to the unordered list
                        ul.append(li);
                    }
                });

                // Assuming 'modalContent' is the content area of your modal
                // Empty the modal content and append the unordered list
                var date = $('<div>').css('color', '#E05D44').text(data.date);
                var modalContent = $('<div>').append(date, ul);
                var history = $('<h3>').css('color', '#009A00').text("Evidence History");
                var br =$('<br>');
                // Append the modal content to the modal body
                $('#modal-body').append(br,history,modalContent);
            });



            
            // Show the modal
            $('#show-details').modal('show');
                //     response.forEach(function(data) {
                //     var motorVehicleSection = $('<section>').css('padding-bottom', '10px');
                //     var br = $('<br>');
                //     var dateParagraph = $('<h3>').css('color', '#EC5E50').text("*"+data.date);
                //     var motorVehicleTitle = $('<h5>').css('color', '#79B650').append($('<b>').text('Motor Vehicle Description:'));
                //     motorVehicleSection.append(br,br,br,dateParagraph, motorVehicleTitle);
                //     var formRow1 = $('<div>').addClass('form-row');
                //     formRow1.append(
                //         createFormGroup('Make/Type', 'make_type', 'make_type', data.make_type),
                //         createFormGroup('Plate No', 'plate_no', 'plate_no', data.plate_no),
                //         createFormGroup('Engine No', 'engine_no', 'engine_no', data.engine_no)
                //     );
                //     var formRow2 = $('<div>').addClass('form-row');
                //     formRow2.append(
                //         createFormGroup('Fuel', 'fuel', 'fuel', data.fuel),
                //         createFormGroup('Chasis No', 'chasis_no', 'chasis_no', data.chasis_no),
                //         createFormGroup('Color', 'color', 'color', data.color)
                //     );
                //     var formRow3 = $('<div>').addClass('form-row');
                //     formRow3.append(
                //         createFormGroup('Registered Owner', 'registered_owner', 'registered_owner', data.registered_owner),
                //         createFormGroup("Owner's Address", 'owner_address', 'owner_address', data.owner_address)
                //     );
                //     var group1 = $('<div>');
                //     group1.append(motorVehicleSection, formRow1, formRow2, formRow3);
                //     var tiresSection = $('<section>').css('padding-bottom', '10px').append(
                //         $('<h5>').css('color', '#79B650').append($('<b>').text('Tires:'))
                //     );
                //     var formRowTires = $('<div>').addClass('form-row').append(
                //         createFormGroup('Brand/Make', 'brand_make', 'brand_make', data.brand_make),
                //         $('<div>').addClass('form-group col-md-6').append(
                //             $('<label>').attr({ id: 'headlabel', for: 'inputEmail4' }).append($('<b>').text('General Condition of the MV:')),
                //             $('<table>').attr({ id: 'General-Condition-of-the-MV', name: 'modal-table' }).append(
                //                 $('<tbody>').append(
                //                     $('<tr>').append(
                //                         $('<td>').css('font-size', '11px').append(
                //                             $('<input>').attr({ type: 'radio', name: 'general_condition', id: 'general_condition_running', value: 'Running', checked: data.general_condition == "Running" }),
                //                             $('<label>').attr('for', 'general_condition_running').text('Running')
                //                         ),
                //                         $('<td>').css('font-size', '11px').append(
                //                             $('<input>').attr({ type: 'radio', name: 'general_condition', id: 'general_condition_deadline', value: 'Deadline', checked: data.general_condition == "Deadline" }),
                //                             $('<label>').attr('for', 'general_condition_deadline').text('Deadline')
                //                         )
                //                     )
                //                 )
                //             )
                //         )
                //     );
                //     var formRow4 = $('<div>').addClass('form-row').append(
                //       createFormGroup2('Size', 'size', 'size', data.size),
                //       createFormGroup2('Condition', 'condition', 'condition', data.condition),
                //       createFormGroup2('Type', 'type', 'type', data.type),
                //       createFormGroup2('No Studs', 'no_studs', 'no_studs', data.no_studs)
                //     );
                //     var group2 = $('<div>'); // create a container for form rows
                //     group2.append(tiresSection, formRowTires,formRow4);

                //     $('#modal-body').append(group1, group2);
                // });

                // function createFormGroup2(labelText, inputName, inputId, value) {
                //     var input = $('<input>').attr({
                //         type: 'text',
                //         class: 'form-control',
                //         name: inputName,
                //         id: inputId,
                //         placeholder: '',
                //         value: value,
                //         required: true,
                //         disabled: true 
                //     });

                //     var label = $('<label>').attr({
                //         id: 'headlabel',
                //         for: 'inputEmail4'
                //     }).append($('<b>').text(labelText + ':'));
                //     var formGroup = $('<div>').addClass('form-group col-md-3').append(label, input);
                //     return formGroup;
                // }
               
                // function createFormGroup(labelText, inputName, inputId, value) {
                //     var input = $('<input>').attr({
                //         type: 'text',
                //         class: 'form-control',
                //         name: inputName,
                //         id: inputId,
                //         placeholder: '',
                //         value: value,
                //         required: true,
                //         disabled: true 
                //     });
                //     var label = $('<label>').attr({
                //         id: 'headlabel',
                //         for: 'inputEmail4'
                //     }).append($('<b>').text(labelText + ':'));
                //     var formGroup = $('<div>').addClass('form-group col-md-4').append(label, input);
                //     return formGroup;
                // }
                //     // Show the modal
                //     $('#show-details').modal('show');
                }
                //  else {
                //     // No records found
                //     alert("No records found for the given UUID.");
                // }
               
                      // console.log("response: " + response.length);
                  },
                  error: function(xhr, status, error) {
                      alert(error);
                      console.error(error);
                      // Handle error
                  }
              });
                  // console.log("QR code detected: " + code.data);
                // }
                  // Optionally, you can submit the form or perform any other action here
              }
              else{
                  // No QR code detected, display an error message
                  // $('#scannedValue').val("No QR code found");
                  console.log("No QR code detected");
              }
              if ($('#scannedValue').val() != "") {
                  // scannerVideo
                  // scannerCanvas
                 $('#scannerVideo').hide();
                 $('#scannerCanvas').hide();
                 $('#scannedValue').show();
                //  $('#uuid').show();
                 deactivateScanner();
              }
          }, 500); // Adjust the interval as needed (here we're scanning every 0.5 seconds)
      }
    });
</script>
<style>
  .dynamic-paragraph {
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}
</style>
</body>
</html>
