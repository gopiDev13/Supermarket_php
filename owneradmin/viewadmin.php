<?php 
include "../sidebar.php";
if(! isset($_SESSION["logged_in"])){
    header("location:../loginredirect.html");
}
?>
<style>
body {
    color: #404E67;
    background-color: white;
    font-family: 'Open Sans', sans-serif;
}
body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    border-collapse: separate;
}

tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
.test{
        height: 100%;
    }
@media (min-width: 1200px){
    .container-lg{
        max-width: 1500px !important;
    }
}
.table-wrapper {
    margin-left: 240px !important;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 150px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 30px;
    height: 30px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 16px;
}
table.table td a.add i {
    font-size: 16px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}

table tbody tr td:last-child{
    display: flex;
}
</style>

<body>

<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                    <!-- <a href="employees.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a> -->
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                  
                    
                        <th>Name</th>
                        <th>Role Id</th>
                        <th>Email</th>
                   
                       
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once "../dbconnection.php";
                require_once "../functions/orderdata.php";
               // require_once('db_connection.php');
                if ($_GET['id']) {
                    $id = $_GET['id'];
                  
                $sql = "SELECT * FROM users WHERE id = {$id}";
                $result = $connect->query($sql);
                
                if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
                }
                }
                
                     
                echo "<tr>
                <td></td>
                <td>" . $row['user_name'] ."</td>
                <td>" . getAdminName($row['role_id']) . "</td>
                
                <td>" . $row['email'] ."</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['status'] ."</td>
               
           
                
                  <td><a href='adminmainpage.php?id=" . $row['id'] . "'><i class='glyphicon glyphicon-log-out'></i></a>
                  
						</td>
					</tr>";
                    
              
                ?>
            
                </tbody>
            </table>
        </div>
    </div>
</div>     
</body>
</html>