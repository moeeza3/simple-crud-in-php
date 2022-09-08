<?php   

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

     
<?php   
$conn=mysqli_connect('localhost','root','','studentadmin');  
  if(isset($_SESSION['email'])){
    
       
    $_SESSION["email"];
    $studentemail=$_SESSION["email"];
    $qury="SELECT * FROM studentdata WHERE student_email='$studentemail'";
    $runq=mysqli_query($conn, $qury);
     
    $rowquery=mysqli_fetch_array($runq);

    
    $studentid=$rowquery['student_id'];
    $student_name=$rowquery['student_name'];
    $student_email=$rowquery['student_email'];
    $student_password=$rowquery['student_password'];
    $student_tel=$rowquery['student_tel'];
    $student_address=$rowquery['student_address'];
    $image=$rowquery['student_image'];
    $student_detail=$rowquery['student_detail'];
    
    echo "
    <div class='container my-5'>
    <h1 class='text-center display-1'>Student Detail</h1>

    <div class='d-flex justify-content-around'>
    <div>
    <h3>Student ID: $studentid</h3>
    <h3>Name: $student_name</h3>
    <h4>email: $student_email</h4>
    <h4>password: $student_password</h4>
    <h4>tel: $student_tel</h4>
    <h4>address: $student_address</h4>
    <p>$student_detail</p>
    </div>
    <img src='upload/$image' alt='$image' style='width: 200px'> 
    </div>
     
    
  
    </div>
    
    ";
 

  }

?>



</body>
</html>
