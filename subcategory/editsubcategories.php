<?php
require_once "../dbconnection.php";
//  $sql="select category_name,id from categories";
//  $all_categories = mysqli_query($connect,$sql);
//  $category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC);

// require_once('db_connection.php');
if ($_GET['id']) {
    $id = $_GET['id'];

    $sqlu = "SELECT * FROM sub_category WHERE id = {$id}";
    $result = $connect->query($sqlu);
    
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}
// print_r($row);
$sql = "select category_name,id from categories";
$all_categories = mysqli_query($connect, $sql);
// $category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC);
?>


<html>

<head>
    <title>Edit Sub Category</title>

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

 
        <form action="updatesubcategories.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
        <legend>Edit Category </legend><table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?php echo $row['sub_category_name']; ?>">
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <th>Category_name</th>
                    <td>
                        <select class="th1" name="category">
                            <?php
                            while ($category = mysqli_fetch_array($all_categories, MYSQLI_ASSOC)) {
                        //    print_r($category['id']);
                           ?>
                                <option value="<?php echo $category['id']; ?>"
                                 <?php if ($row['category_id'] == $category['id']) 
                                 {
                                echo 'selected';
                                } ?>><?php echo  $category['category_name']; ?></option>
                            <?php } ?>
                        </select></p>

                        </select>
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
                            <option value="Active" <?php echo ($row['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                            <option value="Inactive" <?php echo ($row['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></td>
                </tr>

                <tr>
                    <td><input type="submit" class="buttons" value="submit"></td>
                    <td><a href="sub_categories.php"><button type="button">Back</button></a></td>
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
                        required: true,
                    }





                },

            });



        });
    </script>
</body>
</head>

</html>