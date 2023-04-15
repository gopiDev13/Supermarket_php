<?php
     require_once "../dbconnection.php";

    // require_once('db_connection.php');
     if ($_GET['id']) {
         $id = $_GET['id'];
       
     $sql = "SELECT * FROM categories WHERE id = {$id}";
     $result = $connect->query($sql);
     
     if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
     }
     }
     ?>


<html>

<head>
    <title>Edit Employess</title>

<body>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
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

 
        <form action="updatecategories.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
             <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?php echo $row['category_name']; ?>">
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>

                    <td><input type="text" name="des" value="<?php echo $row['description']; ?>">
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
                <td><input type="hidden" name="id" value="<?php echo $row['id'];?>"></td>
              </tr>
             
                <tr>
                    <td><input type="submit" class="buttons" value="submit"></td>
                    <td><a href="categories.php"><button type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <script>
        $(document).ready(function() {
          jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Letters only please");
            
            $(".form").validate({
                rules: {
                    name: {
                        required: true,
                        lettersonly: true,
                        minlength: 3
                    },
                    
                  
                    des: {
                        required: true,
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