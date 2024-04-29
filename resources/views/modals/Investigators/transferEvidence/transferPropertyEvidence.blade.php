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

/* .form-input img {
  width:100%;
  display:none;
  margin-bottom:30px;
} */
/* .form-input input {
  display:none;
} */

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
#file-{{$data->id}}-preview img {
    width: 100%;
    height: auto;
    max-width: 100%; 
    max-height: 100%; /* Ensure image does not exceed container height */
    object-fit: contain; /* Maintain aspect ratio and fit within container */
    border-radius: 0; /* Remove any border radius */
  }

</style>

<!-- Modal -->
<div class="modal fade" id="transferPropertyGoodsEvidence{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-dots-vertical"></i> <b style="color:#EC5E50;">Transfer Evidence - Property/Goods</b> </h3> 

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form enctype="multipart/form-data" id="transfer-form{{$data->id}}" action="{{ route ('transferProperty_Evidence', $data->id) }}" method="POST" >
      @csrf
      <div class="modal-body">
   
    <!-- <section style="padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Motor Vehicle Description:</b></h4>
    </section> -->
        <div class="form-row" >
            <div class="form-group col-md-5">
                <label id="headlabel" for="inputEmail4"><b>Item:</b></label>
                <input type="text" class="form-control" name="item1" id="item1" placeholder="" value="{{$data->item}}" required disabled>
                <input style="display:none;" type="text" class="form-control" name="item" id="item" placeholder="" value="{{$data->item}}" required >
            </div>
            <div class="form-group col-md-5">
                <label id="headlabel" for="inputEmail4"><b>Place/Establishment:</b></label>
                <input type="text" class="form-control" name="establishment1" id="establishment1" placeholder="" value="{{$data->establishment}}" required  disabled>
                <input style="display:none;" type="text" class="form-control" name="establishment" id="establishment" placeholder="" value="{{$data->establishment}}" required  >
            </div>
            <div class="form-group col-md-2">
                <label id="headlabel" for="inputEmail4"><b>Quantity/Units:</b></label>
                <input type="number" class="form-control" name="quantity1" id="quantity1" placeholder="" value="{{$data->quantity}}" required  disabled>
                <input style="display:none;" type="number" class="form-control" name="quantity" id="quantity" placeholder="" value="{{$data->quantity}}" required  >
            </div>
        </div>
      
            <label id="headlabel" for="inputEmail4"><b>Description:</b></label>
            <textarea class="form-control"  name="description1" id="description1" cols="10" rows="5"  disabled>{{$data->description}}</textarea >
            <textarea style="display:none;" class="form-control"  name="description" id="description" cols="10" rows="5"  >{{$data->description}}</textarea >
            <br>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label id="headlabel" for="inputEmail4"><b>Address:</b></label>
                <input type="text" class="form-control" name="address1" id="address1" placeholder="" value="{{$data->address}}" required  disabled>
                <input style="display:none;" type="text" class="form-control" name="address" id="address" placeholder="" value="{{$data->address}}" required  >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Seizing Officer:</b></label>
                <input type="text" class="form-control" name="seizing_officer1" id="seizing_officer1" placeholder="" value="{{$data->seizing_officer}}" required  disabled>
                <input style="display:none;" type="text" class="form-control" name="seizing_officer" id="seizing_officer" placeholder="" value="{{$data->seizing_officer}}" required  >
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Witness:</b></label>
                <input type="text" class="form-control" name="witness1" id="witness1" placeholder="" value="{{$data->witness}}" required disabled>
                <input style="display:none;" type="text" class="form-control" name="witness" id="witness" placeholder="" value="{{$data->witness}}" required>
              
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Received by:</b></label>
                <input type="text" class="form-control" name="received" id="received" placeholder="" value="" required>
            </div>
        </div>
        <!-- <div class="form-row">
        <div class="form-group col-md-9"></div>
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4"><b>Received by:</b></label>
                <input type="text" class="form-control" name="received" id="received" placeholder="" value="{{$data->received}}" required>
            </div>
        </div> -->
        <div class="form-row">
                <div class="form-group col-md-9">
                </div>
                <div class="form-group col-md-3">
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
    <!-- <button type="submit" class="btn btn-primary"> Save</button> -->
    <div class="row">
        <div class="col-md-6">
        <button style="height:35px; width:100px;" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#confirmationModal{{$data->id}}">Transfer</button>
          <!-- <button style="height:35px; width:100px;" type="submit" class="btn btn-primary btn-block">Transfer</button> -->
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
