<?php
     require_once "../dbconnection.php";

    // require_once('db_connection.php');
     if ($_GET['id']) {
         $id = $_GET['id'];
       
     $sql = "SELECT * FROM emp_details WHERE id = {$id}";
     $result = $connect->query($sql);
     
     if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
     }
     }
     ?>
<html>

<head>
    <title>Add Employess</title>

<body>
   
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
            margin-left: 400px !important;
        }

        table tr th {
            padding-top: 20px;
        }
        button {
           background-color: cornflowerblue;
        }
        .buttons {
           background-color: cornflowerblue;
        }
    </style>
    <?php
    include "../sidebar.php";
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }
    ?>
 
    
        <form action="updateemployee.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
        <legend>Edit Employess</legend>   
        <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?php echo $row['emp_name']; ?>">
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>

                    <td><input type="text" name="address" value="<?php echo $row['address']; ?>">
                        <span class="error"></span>
                    </td>
                </tr>
               
              
              
                <tr>
                    <th>Contact</th>
                    <td><input type="text" name="number" value="<?php echo $row['number']; ?>">
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <th>Joining Date</th>
                    <td><input type="date" name="date" value="<?php echo $row['join_date']; ?>">
                <span class="error"></span></td>
                </tr>
                <tr>
                    <th>Mail</th>
                    <td><input type="text" name="email" value="<?php echo $row['email']; ?>">
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <th>Aadhar No</th>
                    <td><input type="text" name="aadhar" value="<?php echo $row['aadhar_number']; ?>">
                <span class="error"></span></td>
                </tr>
                
                <tr>
                    <th>Status</th>
                    <td>
                        <select class="th1" name="status">
                            <option value="">select</option>
                            <option value="Active" <?php echo ($row['status'] == 'Active') ?'selected' : ''; ?>>Active</option>
                            <option value="Inactive" <?php echo ($row['status'] == 'Inactive') ?'selected' : ''; ?>>Inactive</option>
                        </select>
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $row['id']; ?>" id="userid"></td>
                <tr>
              
             
                <tr>
                    <td><input type="submit" class="buttons" value="submit"></td>
                    <td><a href="mainemployees.php"><button type="button">Back</button></a></td>
                </tr>
                <tr><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Change Password</button></td></tr>
            </table>
        </form>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data">
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
        <button type="button" name="submit" value="submit" class="btn btn-primary" id="sub">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $(document).on("click","#sub",function(){
        var id = $('#userid').val();
        var Cname=$('#Cname').val();
        var Pass=$('#pass').val();
        var Cpass=$('#Cpass').val();


        $.ajax({
            type: 'POST',
            data: {
                Cname: Cname,
                Pass:Pass,
                Cpass:Cpass,
                id:id,

            },
            url: 'emppass.php',
            success: function(data) {
                alert(data)
                setTimeout('Redirect()', 0);
                function Redirect(){
                    window.location = '../owneradmin/adminmainpage.php';
                }
               
            }

    });
});
});
        $(document).ready(function() {
        
            $.validator.addMethod("passcheck", function (value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    && /[a-z]/.test(value) // has a lowercase letter
                    && /\d/.test(value) // has a digit
            }, "please enter valid password");
            $(".form").validate({
                rules: {
                    Cname:{
                        required:true,
                        passcheck:true,

                    },
                    Pass:{
                        required:true,
                        passcheck:true,
                    },
                    Cpass: {
                        required: true,
                        equalTo: '[name="Pass"]'
                    },

                  

                },
                
            });



        });

     
        
    </script>
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
                    
                    email: {
                        required: true,
                        email: true
                    },
                    number: {
                        required: true,
                        number:true,
                        minlength: 3,
                        maxlength: 10
                    },
                    address: {
                        required: true,
                    },
                    aadhar:{
                        required:true,
                        number:true,
                        minlength:12,
                        maxlength:12,
                    },
                    date:{
                        required:true,
                        date:true,

                    },
                    password:{
                        required:true,
                        passcheck:true,
                    },
                    pwd: {
                        required: true,
                        equalTo: '[name="password"]'
                    },

                    status: {
                        required:true,
                    }
            
                   
                   


                },
                
            });



        });

     
        
    </script>
</body>
</head>

</html>
    
