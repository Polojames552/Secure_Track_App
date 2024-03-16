

<style>
#exampleModalLongTitle{
  color:black;
  padding-left: 120px;
}
@media only screen and (max-width: 800px) {
  #exampleModalLongTitle{
  padding-left: 90px;
}
    } 
.modal-header {
  align-items: center;
}
#headlabel{
  color:black;
  font-size:13px;
}
#modal_logo {
  width: 60px;
  height: 40px;
}
.btn0{
  background-color: RoyalBlue;
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 0.5rem;
}
.btn0:hover {      background-color: #008CBA;      color: white; }
.btn1:hover {      background-color:  #ff4d4d;      color: white; }
.btn1{
  background-color: #ff3333;
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 0.5rem;
}
.modal-footer{
  margin-top: -1em;
 
}
.form-row{
  align-items: center;
}
</style>
<!-- Modal -->

<?php
?>
<div class="modal fade" id="mylogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img id="modal_logo" src="{{ asset('images/PNP.png') }}" alt="PNP_Logo"> 
        <h5 class="modal-title" id="exampleModalLongTitle">User Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      <!-- <form method="POST" action="{{ route('login') }}"> -->
 
      <form name="form" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
        <div class="form-row col-md-12">
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4">UserName:</label>
              </div>
              <div class="form-group col-md-9">
                <input type="text" class="form-control" name="email" id="email" placeholder="" required>
            </div>
        </div>

        <div class="form-row col-md-12">
            <div class="form-group col-md-3">
                <label id="headlabel" for="inputEmail4">Password:</label>
              </div>
              <div class="form-group col-md-9">
                <input type="password" class="form-control" name="password" id="password" placeholder="" required>
            </div>
        </div>
        <!-- <div class="form-row">
            <div class="form-group col-md-12">
                <label id="headlabel" for="inputEmail4">Password:</label>
                <input type="password" class="form-control" name="Password" id="Password" placeholder="" required>
            </div>
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn0">Login</button>
        <!-- <button type="button" class="btn1" data-dismiss="modal" onclick="myFunction()">Cancel</button> -->
      </div>
    </div>
  </div>
</div>

</form>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>  <!-- gride line table-->
        <script src="js/datatables-simple-demo.js"></script>
