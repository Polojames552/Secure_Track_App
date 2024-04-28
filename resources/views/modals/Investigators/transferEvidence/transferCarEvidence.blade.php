<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Show Password Example</title>
</head>
<body>

<!-- CSS Styles -->
<style>
    /* Your existing CSS styles */
    /* ... */

    /* Adjusted CSS for image preview */
    #image-preview {
        width: 100%; /* Set the width to 100% of its container */
        height: auto; /* Auto adjust the height to maintain aspect ratio */
        max-width: none; /* Remove the maximum width constraint */
        max-height: none; /* Remove the maximum height constraint */
        object-fit: contain; /* Maintain aspect ratio and fit within container */
        border-radius: 0; /* Remove any border radius */
    }
</style>

<!-- HTML Content -->
<div class="modal fade" id="transferCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-motorbike"></i> <b>Add Motorcycle Evidences</b> </h3> 
        <!-- Add Property/Goods Evidences -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addMotorCycle_Evidence" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <br>
          
          <label id="image-preview" style="">
            <input type="file" id="image-input" accept="image/*" style="display: none;">
            <img style="width:20%;height:auto;border-radius: 0;" src="https://bit.ly/3ubuq5o" alt="">
          </label>
          
        </div>
        <div class="modal-footer">
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
</div>

<!-- JavaScript -->
<!-- JavaScript -->
<script>
    const imageInput = document.getElementById('image-input');
    const imagePreview = document.querySelector('#image-preview img');

    imageInput.addEventListener('change', function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
          const imageUrl = e.target.result;
          imagePreview.src = imageUrl;
        };

        reader.readAsDataURL(file);
      } else {
        imagePreview.src = ''; // Clear the preview if no file is selected
      }
    });
</script>



</body>
</html>
