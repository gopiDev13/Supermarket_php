<?php
     require_once "../dbconnection.php";
 
    // require_once('db_connection.php');
     if ($_GET['id']) {
         $id = $_GET['id'];
       
     $sql = "SELECT * FROM users WHERE id = {$id}";
     $result = $connect->query($sql);
     
     if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
     }
     }
     ?>
     
     <body>
     <?php
include "../sidebar.php"; 

if(! isset($_SESSION["logged_in"])){
    header("location:../loginredirect.html");
}
    ?>
    
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
    
  
        <form action="updateadmin.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
        <h3>Edit Admin</h3>    
        <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?php echo $row['user_name']; ?>">
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
                    <th>Mail</th>
                    <td><input type="text" name="email" value="<?php echo $row['email']; ?>">
                        <span class="error"></span>
                    </td>
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
                   
                    <td><input type="hidden" value="<?php echo $row['id'];?>" name="id" id="userid"> </td>
                </tr>
              
             
                <tr>
                    <td><button type="submit" name="submit">Submit</button></td>
                    <td><a href="adminmainpage.php"><button type="button">Back</button></a></td>
                </tr>
                <tr><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Change Password</button></td></tr>
            </table>
        </div>
        </form>
        
<?php include "passwordadmin.php"; ?>

    
    <!-- <script>
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
                  
                    address: {
                        required: true,
                    },
              
                    status: {
                        required:true,
                    }
            
                   
                   


                },
                
            });



        });

     
        
    </script> -->
</body>


</html>
