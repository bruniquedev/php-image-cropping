<?php
echo $filename ="60093519b6f1d.png";
 echo $pos = strrpos($filename, '.');
 $ext = substr($filename, $pos);//extension only
echo basename($filename);//file name with extension
echo basename($filename,$ext); //only file name no extension
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Crop Image Before Upload using Cropper JS</title>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="assets/bootstrap4.1/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap4.1/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/imagecropper/cropper.css" />
   <link rel="stylesheet" type="text/css" href="assets/my-css/style.css" />
</head>

<body>
<div class="container">
    <h1>PHP Crop Image Before Upload using Cropper JS - NiceSnippets.com</h1>
    <form method="post">
    <input type="file" name="image" class="image">
    <input type="text" name="profileImage" class="profileImage" id="profileImage">
    </form>

  <div class="circle-image-profile">
<img class="imgcircle center-block" id="imgcircle" src="images/loading.gif" alt=""> 
</div>

</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">PHP Crop Image Before Upload using Cropper JS - NiceSnippets.com</h5>
       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>-->
      </div>
      <div class="modal-body">
        <div class="img-container">
            <div class="row">
                <div class="col-md-8">
                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
                <div class="col-md-4">
                    <div class="preview"></div>

                             <!-- Display upload status -->
<div id="profileuploadStatus"></div>           
 <!-- Progress bar -->
<div id="profileprogress" class="progress">
    <div id="profileprogress-bar" class="progress-bar"></div>
</div> 
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel upload</button>
        <button type="button" class="btn btn-primary" id="crop">Upload</button>
      </div>
    </div>
  </div>
</div>

</div>
</div>


     <script src="assets/bootstrap4.1/js/jquery.min.js"></script>
     <script src="assets/bootstrap4.1/js/bootstrap.min.js"></script>
     <script src="assets/bootstrap4.1/js/html5shiv.min.js"></script>
     <script src="assets/bootstrap4.1/js/popper.min.js"></script>
     <script src="assets/imagecropper/cropper.js"></script>
     <script src="assets/mycustom-js/customjs.js"></script>


</body>
</html>