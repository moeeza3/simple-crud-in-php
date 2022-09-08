<?php   

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
  
    <div class="container text-center py-5">
     <h2>Student Login</h2>

<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <input type="submit" name="logbtn" class="btn btn-primary"/>
       
    </form>
    <a href="Studentregistration.php">Student registration</a>
    <br>
    <br>
    <a href="view_user.php">admin panel</a>
    </div>
    <?php 
    
    $conn=mysqli_connect('localhost','root','','studentadmin');   

    if(isset($_POST['logbtn'])){
        

        $email=$_POST['email'];
        $password=$_POST['password'];


        $select="SELECT * FROM studentdata WHERE student_email='$email' AND student_password='$password'";

        $run=mysqli_query($conn, $select);
     
        // to run loop of data avilable
         // to pick the as array at once in run variable
        $row_user=mysqli_fetch_array($run);
       
        $dbemail=$row_user['student_email'];
        $dbpassword=$row_user['student_password'];
      
     if($email==$dbemail && $password==$dbpassword){
        // echo "<script>window.open('index.php','_self');</script>";
        header('location:index.php');
        $_SESSION['email']=$email;
        
     }else{
        echo "wrong email or password";
     }

   

    }
    
    
    ?>


</div>
</body>
</html>