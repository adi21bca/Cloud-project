<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <body>
      <?php
       $conn = mysqli_connect('localhost','Akhlad','Akhlad#123','login');
       if(!$conn){
         echo"Connection error: ".mysqli_connect_error();
       }
       $n=$_POST['N'];
         $e=$_POST['E'];
       $sql1="SELECT * FROM login WHERE name='$n'AND Email='$e'";
       $result1=mysqli_query($conn,$sql1);
       if($result1->num_rows>0)
       {
        
         header("Location:pixhub1.php");
         echo"<script>alert(\"Login Sucessfully\");</script>";
         exit;
       }
       elseif($n="admin" && $e="admin123@gmail.com")
       {
        header("Location:pixhubadmin.php");
       }
       else{
        header("Location:login1.html");
       }
    
      
      ?>  
     
     
</body>
</html>