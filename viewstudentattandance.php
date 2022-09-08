<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" type='text/css'>
</head>
<body>


           
<?php   
   
   //  creating conection with database
             //funtcion to connect to mysql
            //servername,usrname (default is root),password,database name
            $conn=mysqli_connect('localhost','root','','schoolmanagement'); 

            //if val ocmes in url then we use gte always url 
            if(isset($_GET['delatt'])){
                //if del value which is coming from get varialbe del is avialabel then store it in $delid
       $del_id=$_GET['delatt'];
              //delete the row whith id equal to del id on click form adminpanel 
        echo $delete="DELETE FROM stdattandance WHERE attdno='$del_id'";
              //to run query to delete
             $rundelete=mysqli_query($conn,$delete);
            
             if($rundelete===true){
                echo "record deleted";
             }else{
                echo "no record deleted";
             }

            }

  ?>

     <!-- Search filter -->
     <form method='post' action=''>
     Start Date <input type='text' class='dateFilter' name='fromDate'>
 
    End Date <input type='text' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>

     <input type='submit' name='btnsearch' value='Search'>

    
     <input type="submit" name="all" value="ALL">
     <input type="submit" name="today" value="Today">

   </form>
      
      
   <!-- <form method='get' action=''>
      
   <input type="submit" name="all" >

   </form> -->
  
   
   
   <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;'>
       <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Date</th>
         <th>delete</th>
        <th>edit</th>
       </tr>

       <?php  
       
       $conn=mysqli_connect('localhost','root','','schoolmanagement'); 

     if(isset($_POST['btnsearch'])){
           
        $fromdate=$_POST['fromDate'];
        $endate=$_POST['endDate'];

     $selectdata="SELECT * FROM stdattandance WHERE (student_date BETWEEN '$fromdate' AND '$endate')";
     $runquery=mysqli_query($conn,$selectdata);

     while($row_student=mysqli_fetch_array($runquery)){
      $stdid=$row_student['student_id'];
      $stdname=$row_student['student_name'];
     $stdstatus=$row_student['student_present'];
     $stddate=$row_student['student_date'];
     $stdattno=$row_student['attdno'];

     echo "
     <tr>
     <td>$stdid</td>
     <td>$stdname</td>
     <td>$stdstatus</td>
     <td>$stddate</td>
     <td><a href='viewstudentattandance.php?delatt=<?php echo $stdattno; ?>'>Delete</a></td>
   </tr>";

    }     

    }
     if(isset($_POST['all'])){
           
    //  echo $fromdate=$_POST['all'];
      // $endate=$_POST['endDate'];

   $selectdata="SELECT * FROM stdattandance WHERE student_date";
   $runquery=mysqli_query($conn,$selectdata);

   while($row_student=mysqli_fetch_array($runquery)){
    $stdid=$row_student['student_id'];
      $stdname=$row_student['student_name'];
     $stdstatus=$row_student['student_present'];
     $stddate=$row_student['student_date'];
     $stdattno=$row_student['attdno'];
     
     echo "
     <tr>
     <td>$stdid</td>
     <td>$stdname</td>
     <td>$stdstatus</td>
     <td>$stddate</td>
     <td><a href=\"viewstudentattandance.php?delatt=<?php echo $stdattno; ?>\">Delete</a></td>
    
      
   </tr>
     ";
  }     

  }
  if(isset($_POST['today'])){
           
    //  echo $fromdate=$_POST['all'];
      // $endate=$_POST['endDate'];
      echo $currentdate=date('Y/m/d');
   $selectdata="SELECT * FROM stdattandance WHERE student_date='$currentdate'";
   $runquery=mysqli_query($conn,$selectdata);

   while($row_student=mysqli_fetch_array($runquery)){
    $stdid=$row_student['student_id'];
    $stdname=$row_student['student_name'];
   $stdstatus=$row_student['student_present'];
   $stddate=$row_student['student_date'];
  echo $stdattno=$row_student['attdno'];
 
   echo "
   <tr>
   <td>$stdid</td>
   <td>$stdname</td>
   <td>$stdstatus</td>
   <td>$stddate</td>
   <td><a href=viewstudentattandance.php?delatt=<?php echo $stdattno; ?'>Delete</a></td>
   <td></td>
  
    
 </tr>
   ";
  }     

  }


  if(!isset($_POST['today']) && !isset($_POST['all']) && !isset($_POST['btnsearch'])){

 
    $select='SELECT * FROM stdattandance';

  $run=mysqli_query($conn, $select);

  while($row_student=mysqli_fetch_array($run)){ 

           $stdid=$row_student['student_id'];
    $stdname=$row_student['student_name'];
   $stdstatus=$row_student['student_present'];
   $stddate=$row_student['student_date'];
   echo $stdattno=$row_student['attdno'];


 

  ?>   
     <tr>
   <td><?php echo $stdid ?></td>
   <td><?php echo $stdname ?></td>
   <td><?php echo $stdstatus?></td>
   <td><?php echo $stddate ?></td>
   <td><a href='viewstudentattandance.php?delatt=<?php echo $stdattno; ?>'>Delete</a></td>
   <td></td>
 </tr>
 <?php  }  } ?>
      </table>
 
    </div>



         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
 <script type='text/javascript'>
   $(document).ready(function(){
     $('.dateFilter').datepicker({
        dateFormat: "yy-mm-dd"
     });
   });
  //  $(document).ready(function(){
  //    $('.dateFilter').datepicker({
  //       dateFormat: "yy-mm-dd"
  //    });
  //  });
//   $.datepicker.setDefaults({
// showOn: "button",
// buttonImage: "datepicker.png",
// buttonText: "Date Picker",
// buttonImageOnly: true,
// dateFormat: 'dd-mm-yy'  
// });
// $(function() {
// $("#post_at").datepicker();
// $("#post_at_to_date").datepicker();
// });
   </script>
</body>
</html>