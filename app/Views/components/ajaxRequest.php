<script type="text/javascript">
      
// UPLOAD ANNOUNCEMENT IMAGE
      
      $(document).ready(function(){

          $('#submit').click(function(){

            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            // Get the selected file
            var files = $('#file')[0].files;

            if(files.length > 0){
               var fd = new FormData();

               // Append data 
               fd.append('file',files[0]);
               fd.append([csrfName],csrfHash);
               
               // Hide alert 
               $('#responseMsg').hide();

               // AJAX request 
               $.ajax({
                  url: "<?=site_url('fileUpload')?>",
                  method: 'post',
                  data: fd,
                  contentType: false,
                  processData: false,
                  dataType: 'json',
                  success: function(response){

                     // Update CSRF hash
                     $('.txt_csrfname').val(response.token);

                     // Hide error container
                     $('#err_file').removeClass('d-block');
                     $('#err_file').addClass('d-none');

                     if(response.success == 1){ // Uploaded successfully

                        // Response message
                        // $('#responseMsg').removeClass("alert-danger");
                        // $('#responseMsg').addClass("alert-success");
                        // $('#responseMsg').html(response.message);
                        // $('#responseMsg').show();

                        // display alert msg
                        $('#msg_alert').addClass("bg-success");
                        $('#msg_alert').html(response.message);
                        $('#msg_alert').show();

                        // auto close alert msg
                        $("#msg_alert").fadeTo(2000, 500).slideUp(500, function(){
                           $("#msg_alert").slideUp(500);
                        });

                        // File preview
                        $('#filepreview').show();
                        $('#filepreview img,#filepreview a').hide();
                        if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png' ){
                           $('#filepreview img').attr('src',response.filepath);
                           $('#filepreview img').show();
                        }else{
                           $('#filepreview a').attr('href',response.filepath).show();
                           $('#filepreview a').show();
                        }

                     }else if(response.success == 2){ // File not uploaded

                        // Response message
                        // $('#responseMsg').removeClass("alert-success");
                        // $('#responseMsg').addClass("alert-danger");
                        // $('#responseMsg').html(response.message);
                        // $('#responseMsg').show();

                        $('#msg_alert').addClass("bg-danger");
                        $('#msg_alert').html(response.message);
                        $('#msg_alert').show();

                        // auto close alert msg
                        $("#msg_alert").fadeTo(2000, 500).slideUp(500, function(){
                           $("#msg_alert").slideUp(500);
                        });

                     }else{
                        // Display Error
                        $('#msg_alert').text(response.error);
                        $('#msg_alert').addClass("bg-danger");

                        //auto close alert msg
                        $("#msg_alert").fadeTo(2000, 500).slideUp(500, function(){
                              $("#msg_alert").slideUp(500);
                        });
                     }
                  },
                  error: function(response){
                     console.log("error : " + JSON.stringify(response) );
                     // auto close alert msg
                     $("#msg_alert").fadeTo(2000, 500).slideUp(500, function(){
                           $("#msg_alert").slideUp(500);
                     });
                  }
               });
            }else{
               // Display Error
               $('#msg_alert').text('Please select a file!');
                  $('#msg_alert').addClass("bg-danger");

                  //auto close alert msg
                  $("#msg_alert").fadeTo(2000, 500).slideUp(500, function(){
                  $("#msg_alert").slideUp(500);
               });
            }

          });
        });

// XXXXXX

// SAVE ANNOUNCEMENT AJAX REQUEST

   // $(document).ready(function(){
   //    $(document).on('click', '#btn_save_ann', function() {
   //       var data = {
   //          'ann_content' : $('#txt_content').val()
   //       };
   //       $.ajax({
   //          method: "POST",
   //          url: "",
   //          data: data,
   //          success: function (response) {
   //             $('#msg_alert').addClass("bg-success");
   //             $('#msg_alert').html(response.message);
   //             $('#msg_alert').show();

   //             // auto close alert msg
   //             $("#msg_alert").fadeTo(2000, 500).slideUp(500, function(){
   //                $("#msg_alert").slideUp(500);
   //             });
   //          }
   //       });
   //    });
   // });

// XXXX

</script>