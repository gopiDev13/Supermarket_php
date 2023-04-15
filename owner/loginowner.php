<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    
<body>
<div id="bg"></div>

<form action="validateowner.php" method="POST" class="form" enctype="multipart/form-data">
  <div class="form-field">
    <input type="text"  name="uname">
  </div>
  
  <div class="form-field">
    <input type="password" name="password" id="password">
    <img src="../img/hide.png" onclick="pass()" class="pass-icon" id="pass-icon" style="width:30px;position: absolute;top: 10px;right: 10px;width: 24px;cursor: pointer;">
 </div>
  
  <div class="form-field">
    <input class="btn" type="submit" value="submit" name="submit">
    <span></span>
  </div>
</form>
<!-- partial -->
<script>
  $(document).ready(function(){
    
    jQuery.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Letters only please");
            //validate for password
            $.validator.addMethod("passcheck", function (value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    && /[a-z]/.test(value) // has a lowercase letter
                    && /\d/.test(value) // has a digit
            }, "please enter valid password");


   $(".form").validate({
           
                errorClass: "error fail-alert",
                validClass: "valid success-alert",
               

                rules: {
                    uname: {
                        required: true,
                        lettersonly: true,
                        minlength: 3
                    },
                    password:{
                      required:true,
                     
                    }
                    },
                      errorPlacement: function (error, element) {
            element.attr("placeholder", error.text());
        },
                  
                });

  });
  </script>
  <script>
var a;
function pass()
{
if(a==1)
{
document.getElementById('password').type='password';
document.getElementById('pass-icon').src='../img/hide.png';  
a=0;
}
else
{
document.getElementById('password').type='text';
document.getElementById('pass-icon').src='../img/show.png';
a=1;    
}
}
</script>
  
</body>
</html>