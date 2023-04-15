<?php

if(! isset($_SESSION["logged_in"])){
    header("location:../loginredirect.html");
}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" class="form" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Current Password:</label>
            <input type="password" class="form-control" id="Cname" name="Cname">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">New Password:</label>
            <input type="password" class="form-control" id="pass" name="Pass">
            <span class="error"></span>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Re-type Password:</label>
            <input type="password" class="form-control" id="Cpass" name="Cpass">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" value="submit" class="btn btn-primary" class="submit">
      </div>
</form>
    </div>
  </div>
</div>
<script>

        // $(document).ready(function() {
        
        //     $.validator.addMethod("passcheck", function (value) {
        //         return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
        //             && /[a-z]/.test(value) // has a lowercase letter
        //             && /\d/.test(value) // has a digit
        //     }, "please enter valid password");
        //     $(".form").validate({
        //         rules: {
        //             Cname:{
        //                 required:true,
        //                 passcheck:true,

        //             },
        //             Pass:{
        //                 required:true,
        //                 passcheck:true,
        //             },
        //             Cpass: {
        //                 required: true,
        //                 equalTo: '[name="Pass"]'
        //             },

                  

        //         },
        //         submitHandler:function(form){
$(document).ready(function(){
  $(document).on('click','.submit',function (){

                     var Cname=$('#Cname').val();
                     var Pass=$('#pass').val();
                     var Cpass=$('#Cpass').val();


        $.ajax({
            type: 'POST',
            data: {
                Cname: Cname,
                Pass:Pass,
                Cpass:Cpass,

            },
            url: 'pass.php',
            success: function(data) {

              // var data = JSON.parse(data);
              if(data.status == 200){
                Notify.suc(data.message);
              }else if(data.status == 205){
                Notify.alert(data.message);
              }
               
            }
          })
        })
        })
        
        //         }
                
                
        //     });



        // });

     
        
    </script>
