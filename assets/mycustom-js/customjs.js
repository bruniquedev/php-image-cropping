
var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;
  
$("body").on("change", ".image", function(e){

//let's specify supported image formats
 var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
     

    var files = e.target.files;
    var done = function (url) {
      image.src = url;
      $modal.modal('show');
    };
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
      file = files[0];

       var fileType = file.type;
        if(allowedTypes.includes(fileType)){

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }else{//end checking file types
         alert('Please select a valid profile image');
           $(".image").val(''); 
        }
    

  }//end checking length




});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
    aspectRatio: 1,
    viewMode: 3,
    preview: '.preview'
    });
}).on('hidden.bs.modal', function () {
   cropper.destroy();
   cropper = null;
});

$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
      //final resize is this
      width: 400,
      height: 400,
    });

    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
         reader.readAsDataURL(blob); 
         reader.onloadend = function() {
            var base64data = reader.result;  
            
            $.ajax({

                xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $("#profileprogress-bar").width(percentComplete + '%');
                        $("#profileprogress-bar").html(percentComplete+'%');

                    }
                }, false);
                return xhr;
            },
                type: "POST",
                dataType: "json",
                url: "upload.php",
                data: {image: base64data},
                 beforeSend: function(){
                $("#profileprogress-bar").width('0%');
                $('#profileuploadStatus').html('<img src="images/loading.gif"/>');
            },
             error:function(){
                $('#profileuploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
            success: function(data){
                  //alert(data);
                  $(".image").val('');
                   
                  document.getElementById("imgcircle").src = "uploads/"+data;
                  document.getElementById("profileImage").value = data;
                  $("#profileprogress-bar").width('0%');
                $('#profileuploadStatus').html('<img src="images/loading.gif"/>');
                    $modal.modal('hide');
                    //alert("success upload image");
                }
              });
         }
    });
})
