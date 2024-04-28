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
#file-1-preview img {
    width: 100%;
    height: auto;
    max-width: 100%; 
    max-height: 100%; /* Ensure image does not exceed container height */
    object-fit: contain; /* Maintain aspect ratio and fit within container */
    border-radius: 0; /* Remove any border radius */
  }
</style>

<!-- Modal -->
<div class="modal fade" id="transferMotorVehicleEvidence{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-motorbike"></i> <b style="color:#EC5E50;">Transfer Evidence - Motorcycle</b> </h3> 
        <!-- Add Property/Goods Evidences -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="transfer-form{{$data->id}}" action="{{ route ('transferMotorCycle_Evidence', $data->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
    <!-- <section style="padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Motor Vehicle Description:</b></h4>
    </section> -->
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Make/Type:</b></label>
                <input type="text" class="form-control" name="make_type1" id="make_type1" placeholder="" value="{{$data->make_type}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="make_type" id="make_type" placeholder="" value="{{$data->make_type}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Chassis No.:</b></label>
                <input type="text" class="form-control" name="chasis1" id="chasis1" placeholder="" value="{{$data->chasis}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="chasis" id="chasis" placeholder="" value="{{$data->chasis}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Motor No.:</b></label>
                <input type="text" class="form-control" name="motor_no1" id="motor_no1" placeholder="" value="{{$data->motor_no}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="motor_no" id="motor_no" placeholder="" value="{{$data->motor_no}}" required>
            </div>
        </div>
       
        <div class="form-row">
          <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Plate No.:</b></label>
                <input type="text" class="form-control" name="plate_no1" id="plate_no1" placeholder="" value="{{$data->plate_no}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="plate_no" id="plate_no" placeholder="" value="{{$data->plate_no}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Color:</b></label>
                <input type="text" class="form-control" name="color1" id="color1" placeholder="" value="{{$data->color}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="color" id="color" placeholder="" value="{{$data->color}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>CR/OR No.:</b></label>
                <input type="text" class="form-control" name="ORCR_no1" id="ORCR_no1" placeholder="" value="{{$data->ORCR_no}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="ORCR_no" id="ORCR_no" placeholder="" value="{{$data->ORCR_no}}" required>
            </div>
         
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>LTO FileN:</b></label>
                <input type="text" class="form-control" name="LTO_File_no1" id="LTO_File_no1" placeholder="" value="{{$data->LTO_File_no}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="LTO_File_no" id="LTO_File_no" placeholder="" value="{{$data->LTO_File_no}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Registered Owner.:</b></label>
                <input type="text" class="form-control" name="registered_owner1" id="registered_owner1" placeholder="" value="{{$data->registered_owner}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="registered_owner" id="registered_owner" placeholder="" value="{{$data->registered_owner}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Address:</b></label>
                <input type="text" class="form-control" name="address1" id="address1" placeholder="" value="{{$data->address}}" required disabled>
                <input style="display: none;" type="text" class="form-control" name="address" id="address" placeholder="" value="{{$data->address}}" required>
            </div>
        </div>
       
        <label id="headlabel" for="inputEmail4"><b>Violations:</b></label>
            <textarea class="form-control"  name="violations1" id="violations1" cols="10" rows="5" disabled>{{$data->violations}}</textarea>
            <textarea style="display: none;" class="form-control"  name="violations" id="violations" cols="10" rows="5">{{$data->violations}}</textarea>
            <br>
            <div class="form-row">
              <div class="form-group col-md-4"></div>
              <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label id="headlabel" for="inputEmail4"><b>Received by:</b></label>
                    <input type="text" class="form-control" name="received" id="received" placeholder="" value="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                </div>
                <div class="form-group col-md-4">
                    <label id="status_label" for="inputEmail4"><b>Status:</b></label>
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
            <div class="form-row">
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4">
              <div class="form_item">
                 <div class="form">
                    <div class="grid">
                      <div class="form-element">
                          <input type="file" id="file-{{$data->id}}" accept="image/*" name="Picture" required>
                          <label style="height: 100%; width:100%; max-width: 100%; max-height: 100%;" for="file-{{$data->id}}" id="file-{{$data->id}}-preview" >
                              <img src="https://bit.ly/3ubuq5o" alt="" style="border-radius: 0;object-fit: contain;">
                              <div>
                                  <span style="font-size:13px;">Insert image receipt</span>
                              </div>
                          </label>
                      </div>
                    </div> 
                 </div>
               </div> 
              </div>
              <div class="form-group col-md-4"> </div>
          </div> 
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
<script>
function previewBeforeUpload(id) {
  document.querySelector("#" + id).addEventListener("change", function (e) {
    if (e.target.files.length == 0) {
      return;
    }
    let file = e.target.files[0];
    if (file.size > 2097152) { // 2 MB in bytes
      alert("Error: Image size should be less than 2MB.");
      return;
    } else {
      let url = URL.createObjectURL(file);
      let previewId = id + "-preview";
      document.querySelector("#" + previewId + " div").innerText = file.name;
      document.querySelector("#" + previewId + " img").src = url;
    }
  });
}
document.querySelectorAll('[id^="file-"]').forEach(function(element) {
  let fileId = element.id;
  previewBeforeUpload(fileId);
});
</script>
<script>
   document.getElementById('confirmSaveBtn{{$data->id}}').addEventListener('click', function() {
    // Get the ID of the form associated with the button
    var formId = 'transfer-form{{$data->id}}';
    // Set the enctype attribute to "multipart/form-data"
    document.getElementById(formId).setAttribute('enctype', 'multipart/form-data');
    // Submit the form
    document.getElementById(formId).submit();
});

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
