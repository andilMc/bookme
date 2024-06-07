$(function () { 
  
 });

$(function(){
    $('#imgProfile').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
       {
          var reader = new FileReader();
  
          reader.onload = function (e) {
             $("[for='imgProfile'] img").attr('src', e.target.result);
          }
         reader.readAsDataURL(input.files[0]);
      }
      else
      {
        $('#img').attr('src', 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png');
      }
    });
  
  });

  $(function(){
    $('[img-input]').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
       {
          var reader = new FileReader();
          let imgId = $(this).attr("img-input");
          let imgPath = $(this).attr("img-path");
          if (imgPath) {
            $(`#${imgPath}`).text(url);
          }
          reader.onload = function (e) {
             $(`#${imgId}`).attr('src', e.target.result);
          }
         reader.readAsDataURL(input.files[0]);
      }
     
    });
  
  });