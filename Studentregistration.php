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
  <h2>Student Registration</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label >Name:</label>
      <input type="text" class="form-control"  placeholder="Name" name="student_name">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="student_email">
    </div>
   
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="student_password">
    </div>

    <div class="mb-3">
      <label for="pwd">Telephone:</label>
      <input type="tel" class="form-control"  placeholder="Enter Telephone" name="student_tel">
    </div>


    <div class="mb-3">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter address" name="student_address">
    </div>

    <div class="mb-3 mt-3">
      <label>Image:</label>
      <input type="file" class="form-control" placeholder="Enter email" name="student_image">
    </div>

    <div class="mb-3 mt-3">
      <label >Details:</label>
      <textarea name="student_details" class="'form-control"  cols="40" rows="5"></textarea>
    </div>

    <input type="submit" name="insert-btn" class="btn btn-primary"/>


  </form>

    <a href="login.php">Student login</a>
</div>


   <?php
   //  creating conection with database
             //funtcion to connect to mysql
            //servername,usrname (default is root),password,database name
   $conn=mysqli_connect('localhost','root','','studentadmin');     
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
    $student_name=$_POST['student_name'];
    $student_email=$_POST['student_email'];
    $student_password=$_POST['student_password'];
    $student_tel=$_POST['student_tel'];
    $student_address=$_POST['student_address'];
    //to pick image name and its temporary name
    //we can add only images text data like size, name in database
    $image=$_FILES['student_image']['name'];
    $student_temp_img=$_FILES['student_image']['tmp_name'];
    $student_details=$_POST['student_details'];
    
    //to insert values use query
            //query + table-name(its row names) + Values(variables above)
    $insert= "INSERT INTO studentdata(student_name,student_email,student_password,student_tel,student_address, student_image,student_detail) VALUES('$student_name','$student_email','$student_password','$student_tel','$student_address','$image','$student_details')";

    //to run query
    //we use method inside we use conection and query to be runned
    $insert_run=mysqli_query($conn, $insert);
   //check if  working
    if($insert_run===true){
        echo "Data has been sent";
        //move temp name img file to upload folder with that name
        $file_destination = 'upload/' . $image;
        move_uploaded_file($student_temp_img, $file_destination);
    }else{
        echo "Data sent Failed, Try again";
    }



}


   ?>




</body>
</html>
