<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Edit Student Data</h2>

  <?php   
   
   //  creating conection with database
             //funtcion to connect to mysql
            //servername,usrname (default is root),password,database name
            $conn=mysqli_connect('localhost','root','','studentadmin'); 

            //if val ocmes in url then we use gte always url 
            if(isset($_GET['edit'])){
                //if del value which is coming from get varialbe del is avialabel then store it in $delid
        echo $edit_id=$_GET['edit'];
         
          
         //select data from table
      $select="SELECT * FROM studentdata WHERE student_id='$edit_id'";
   
      $run=mysqli_query($conn, $select);
   
      // to run loop of data avilable
       // to pick the as array at once in run variable
      $row_user=mysqli_fetch_array($run);
      
      //to pick values from the form using post method
      $student_id=$row_user['student_id'];
    $student_name=$row_user['student_name'];
    $student_email=$row_user['student_email'];
    $student_password=$row_user['student_password'];
    $student_tel=$row_user['student_tel'];
    $student_address=$row_user['student_address'];
    $image=$row_user['student_image'];
    $student_details=$row_user['student_detail'];
            

      

            }
    


            //  if($rundelete===true){
            //     echo "record deleted";
            //  }else{
            //     echo "no record deleted";
            //  }

            // }

  ?>


  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label >Name:</label>
      <input type="text" class="form-control"  placeholder="Name" name="student_name" value="<?php echo $student_name; ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="student_email" value="<?php echo $student_email; ?>">
    </div>
   
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="student_password" value="<?php echo $student_password; ?>">
    </div>

    <div class="mb-3">
      <label for="pwd">Telephone:</label>
      <input type="tel" class="form-control"  placeholder="Enter Telephone" name="student_tel" value="<?php echo $student_tel; ?>">
    </div>


    <div class="mb-3">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter address" name="student_address"  value="<?php echo $student_address; ?>">
    </div>

    <div class="mb-3 mt-3">
      <label>Image:</label>
      <input type="file" class="form-control" placeholder="Enter email" name="student_image">
    </div>

    <div class="mb-3 mt-3">
      <label >Details:</label>
      <textarea name="student_detail"  class="'form-control" cols="40" rows="5">
      <?php echo $student_details; ?>
      </textarea>
    </div>

    <input type="submit" name="insert-btn" class="btn btn-primary"/>


  </form>
  <br>
   <a class="btn btn-primary" href="view_user.php" >View Panel</a>
</div>


   <?php
   
   //  creating conection with database
             //funtcion to connect to mysql
            //servername,usrname (default is root),password,database name
   $conn=mysqli_connect('localhost','root','','schoolmangement');     
     //to check  if connection is made to mysql
    // if(mysqli_connect_errno()){
    //     echo 'connection error';
    // }else{
    //     echo 'connection ok';
    // }

      // isset() method is used to check if someting exist or not
      // to check if submit button clicked or not if clicked then pick values
     if(isset($_POST['insert-btn'])){

    //to pick values from the form using post method
    $edit_name=$_POST['student_name'];
    $edit_email=$_POST['student_email'];
    $edit_password=$_POST['student_password'];
    $edit_tel=$_POST['student_tel'];
    $edit_address=$_POST['student_address'];
    //to pick image name and its temporary name
    //we can add only images text data like size, name in database
    $editimage=$_FILES['student_image']['name'];
    $edit_temp_img=$_FILES['student_image']['tmp_name'];
    $edit_details=$_POST['student_detail'];
    
    //if image empty then set previouse image fi we dont update image while updating other data
    if(empty($editimage)){
        $editimage=$image;
    }
  

    $updateuser= "UPDATE studentdata SET student_name='$edit_name',student_email='$edit_email',student_password='$edit_password', student_image='$editimage', student_detail='$edit_details' WHERE student_id='$edit_id'";

    //to run query
    //we use method inside we use conection and query to be runned
    $update_run=mysqli_query($conn, $updateuser);
   //check if  working
    if($update_run===true){
        echo "Data updated";
        //move temp name img file to upload folder with that name
         $file_destination = 'upload/' . $editimage;
         move_uploaded_file($edit_temp_img, $file_destination);
    }else{
        echo "Data update Failed, Try again";
    }

}

   ?>




</body>
</html>