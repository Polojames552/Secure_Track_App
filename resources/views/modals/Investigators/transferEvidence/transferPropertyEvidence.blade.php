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
<div class="modal fade" id="transferPropertyGoodsEvidence{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-dots-vertical"></i> <b style="color:#EC5E50;">Transfer Evidence - Property/Goods</b> </h3> 

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{ route ('editProperty_Evidence', $data->id) }}" method="POST">
      @csrf
      <div class="modal-body">
   
    <!-- <section style="padding-bottom:10px;">
              <h4 style="color:#00A3BE;"><b>Motor Vehicle Description:</b></h4>
    </section> -->
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Place/Establishment:</b></label>
                <input type="text" class="form-control" name="establishment" id="establishment" placeholder="" value="{{$data->establishment}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Address:</b></label>
                <input type="text" class="form-control" name="address" id="address" placeholder="" value="{{$data->address}}" required>
            </div>
            <div class="form-group col-md-4">
                <label id="headlabel" for="inputEmail4"><b>Quantity/Units:</b></label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="" value="{{$data->quantity}}" required>
            </div>
        </div>
      
            <label id="headlabel" for="inputEmail4"><b>Description:</b></label>
            <textarea class="form-control"  name="description" id="description" cols="10" rows="5">{{$data->description}}</textarea>
            <br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Seizing Officer:</b></label>
                <input type="text" class="form-control" name="seizing_officer" id="seizing_officer" placeholder="" value="{{$data->seizing_officer}}" required>
            </div>
            <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Witness:</b></label>
                <input type="text" class="form-control" name="witness" id="witness" placeholder="" value="{{$data->witness}}" required>
            </div>
          
        </div>
        <div class="form-row">
                <div class="form-group col-md-9">
                </div>
                <div class="form-group col-md-3">
                    <label id="status_label" for="inputEmail4"><b>Status:</b></label>
                        <select id="status" name="status" class="form-control" required>
                            @if($data->status == 'Active')
                                <option value="Active" selected>Active</option>
                                <option value="Disposed">Disposed</option>
                            @else		
                            <option value="Active">Active</option>
                                <option value="Disposed" selected>Disposed</option>
                            @endif
                        </select>
                </div>
            </div>
    <div class="modal-footer">
    <!-- <button type="submit" class="btn btn-primary">Save</button> -->
    <div class="row">
        <div class="col-md-6">
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

</div>
</body>
</html>
