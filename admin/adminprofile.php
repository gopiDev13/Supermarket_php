<html>
<title>Edit</title>
<style type="text/css">
    .table {

border: 12px double black;


cursor: pointer;


}

table.center {

border-radius: 12px;
margin-left: auto;
margin-right: auto;
border: 2px solid black;
height: 50%;
width: 35%;
cursor: pointer;


}

</style>
<body>

<?php
session_start();

require_once('../dbconnection.php');

if (isset($_SESSION['id'])) {

    
    $id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = {$id}";
$result = $connect->query($sql);


     $row = $result->fetch_assoc();
}


 ?>
  
        
            
           <table class="center">
            <tr>
             <th>Name</th>
                   <td><p><?php echo $row['user_name']; ?></p></td>
            </tr>
           

                <tr>
                    <th>Id</th>
                    <td><p><?php echo $row['id']; ?></p>
                        
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <td><p><?php echo $row['role_id']; ?></p>
                        
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <td><p><?php echo $row['email']; ?></p>
                        
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <td><p><?php echo $row['address']; ?></p>
                        
                    </td>
                </tr>
               
                
                
               
                
                <tr>
                    <td></td>
                    <td><a href="dashboard.php"><button type="button">Back</button></a></td>
                </tr>
            </table> 
        

</body>
</html>