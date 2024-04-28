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
<div class="modal fade" id="addInvestigators" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Investigator</h5>
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
   
        
    <div class="form-row">
            <div class="form-group col-md-12">
                <label id="headlabel" for="inputEmail4"><b>Name:</b></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="" value="" required>
            </div>
        </div>
        <!-- <div class="form-row">
            <div class="form-group col-md-12">
                <label id="headlabel" for="inputEmail4"><b>Municipality:</b></label>
                <input type="text" class="form-control" name="municipality" id="municipality" placeholder="" value="{{Auth::user()->municipality}}" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label id="headlabel" for="inputEmail4"><b>Municipal Director:</b></label>
                <input type="text" class="form-control" name="municipal_director" id="municipal_director" placeholder="" value="{{Auth::user()->municipal_director}}" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label id="headlabel" for="inputEmail4"><b>Station Address:</b></label>
                <input type="text" class="form-control" name="address" id="address" placeholder=""  value="{{Auth::user()->address}}" disabled>
            </div>
        </div> -->
       
        <div class="form-row">
            <div class="form-group col-md-6">
                <label id="Username" for="Username"><b>Username:</b></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="" value="" required>
            </div>
            <div class="form-group col-md-6">
                <label id="headlabel" for="Password"><b>Password:</b></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="" value="" required>
                <br>
                <input type="checkbox" id="showPasswordCheckbox"> Show Password
            </div>
            <!-- <div class="form-group col-md-6">
                <label id="headlabel" for="inputEmail4"><b>Industry:</b></label>
                <select id="Industry" name="Industry" class="form-control" required>
                            <option value="Accounting & Finance" selected>Accounting & Finance</option>
							<option value="BPO">BPO</option>
							<option value="Consumer Products">Consumer Products</option>
							<option value="Financial Services">Financial Services</option>
							<option value="Government">Government</option>
							<option value="Hotel & Restaurants">Hotel & Restaurants</option>
							<option value="Insurance">Insurance</option>
							<option value="Manufacturing">Manufacturing</option>
							<option value="Tourism">Tourism</option>
							<option value="Transportation">Transportation</option>
							<option value="Advertising">Advertising</option>
							<option value="Call Center">Call Center</option>
							<option value="Engineering">Engineering</option>
							<option value="Food & Beverages">Food & Beverages</option>
							<option value="Healthcare">Healthcare</option>
							<option value="Information Technology">Information Technology</option>
							<option value="Legal">Legal</option>
							<option value="Non-Profit Organisation">Non-Profit Organisation</option>
							<option value="Retail">Retail</option>
							<option value="Telecommunications">Telecommunications</option>
							<option value="Training & Education">Training & Education</option>
                        </select>
            </div> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
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
