<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>View Student</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p> 
   
  <a href="Studentregistration.php" class="btn btn-danger">Add Student</a>
  
  <?php   
   
   //  creating conection with database
             //funtcion to connect to mysql
            //servername,usrname (default is root),password,database name
            $conn=mysqli_connect('localhost','root','','studentadmin'); 

            //if val ocmes in url then we use gte always url 
            if(isset($_GET['del'])){
                //if del value which is coming from get varialbe del is avialabel then store it in $delid
       $del_id=$_GET['del'];
              //delete the row whith id equal to del id on click form adminpanel 
        echo $delete="DELETE FROM studentdata WHERE student_id='$del_id'";
              //to run query to delete
             $rundelete=mysqli_query($conn,$delete);
            
             if($rundelete===true){
                echo "record deleted";
             }else{
                echo "no record deleted";
             }

            }

  ?>
  
  
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>tel</th>
        <th>address</th>
        <th>image</th>
        <th>details</th>
        <th>delete</th>
        <th>edit</th>
      </tr>
    </thead>
    <tbody>

    <?php

     //  creating conection with database
             //funtcion to connect to mysql
            //servername,usrname (default is root),password,database name
   $conn=mysqli_connect('localhost','root','','studentadmin');  
      //select data from table
   $select='SELECT * FROM studentdata';

   $run=mysqli_query($conn, $select);

   // to run loop of data avilable
    // to pick the as array at once in run variable
   while($row_user=mysqli_fetch_array($run)){ 
   
       //to pick values from the form using post method
       $student_id=$row_user['student_id'];
       $student_name=$row_user['student_name'];
       $student_email=$row_user['student_email'];
       $student_password=$row_user['student_password'];
       $student_tel=$row_user['student_tel'];
       $student_address=$row_user['student_address'];
       $image=$row_user['student_image'];
       $student_details=$row_user['student_detail'];



    ?>

      <tr>
        <td><?php echo $student_id; ?> </td>
        <td><?php echo $student_name; ?> </td>
        <td><?php echo $student_email; ?> </td>
        <td><?php echo $student_password; ?> </td>
        <td><?php echo $student_tel; ?> </td>
        <td><?php echo $student_address; ?> </td>
        <td> <img src="upload/<?php echo $image; ?>" alt="<?php echo $image; ?>" style='width: 80px'  >  </td>
        <td><?php echo $student_details; ?> </td>
        <!-- get variable declare with question mark ?  -->
        <!-- get variable sends value fom on page to another -->
        <td> <a href="view_user.php?del=<?php echo $student_id; ?>"  class="btn btn-danger">Delete</a>  </td>
        <td><a href="edit_user.php?edit=<?php echo $student_id; ?>"  class="btn btn-success">Edit</a> </td>
        
      </tr>
      
      <?php } ?>
       <!--  loop end -->

      
    </tbody>
  </table>
</div>

</body>
</html>
