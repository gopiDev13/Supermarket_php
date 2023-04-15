<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js"></script> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data" name="cusval">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Customer Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Number:</label>
            <input type="number" class="form-control" id="recipient-number" name="number">
            <span class="error"></span>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Address:</label>
            <textarea class="form-control" id="message-text" name="address"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
       </div>
     </form>
    </div>
  </div>
</div>
<script>
        $(document).ready(function() {
         
          jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Letters only please");
            $.validator.addMethod("passcheck", function (value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    && /[a-z]/.test(value) // has a lowercase letter
                    && /\d/.test(value) // has a digit
            }, "please enter valid password");
          
            $(".form").validate({
                rules: {
                    name: {
                        required: true,
                        lettersonly: true,
                        minlength: 3
                    },
                   number : {
                        required: true,
                        number:true,
                        minlength: 3,
                        maxlength: 10
                    },
                    address: {
                        required: true,
                    },
                   

                },
                
       
            


       
                submitHandler: function(form) {
                  var cus_name=$('#recipient-name').val();
        var cus_num=$('#recipient-number').val();
        var cus_address=$('#message-text').val();
        $.ajax ({
          
          method:'POST',
          data:{
            cus_name:cus_name,
            cus_num:cus_num,
            cus_address:cus_address,
          },
          url:'customer.php',
          success:function(data){
           
            $('.js-example-basic-single').html(data);
         
            $("#exampleModal").hide();

          }
        }) 
          }
        });
       
      });

        
    </script>

