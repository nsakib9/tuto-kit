(function($) {
    'use strict';

    if ($("#summernote").length) {
      $('#summernote').summernote({
        height: 300,
        tabsize: 2 ,
        callbacks: {
              onImageUpload:(files) => {
                if(files.length == 1){
                  var formData = new FormData();
                  formData.append('file',files[0]);
                  UploadImage(formData);
                }else{
                  Array.prototype.forEach.call(files,(function(file){
                  var formData = new FormData();
                  formData.append('file',file);
                  UploadImage(formData);
                  }));
                }
              },
              onMediaDelete : function(target) {
                  $.post(base_url+'admin/delete_temp_file',{_token:csrf,img:target[0].src},function(data){
                    ImageArrayList.splice(ImageArrayList.indexOf(target[0].src),1);
                  });
              }
          },
      });
    }
  
  })(jQuery);