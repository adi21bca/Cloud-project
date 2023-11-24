<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixhub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<style>
    body{
        margin: 0;
     background-color: black;
        padding: 0;
        overflow-x: hidden;
        
    }
    #nav{
        background-color: black;
       font-family: roboto;
        font-weight: 900;
        font-size: 80px;
       color:yellow;
        display:block;
    }
    .logo{
        font-size: 70px;
        color: yellow;
      
    }
    .down{
        color: yellow;
        font-size: 30px;
        margin: 0;
        margin-left:460px;
    }
    .down1{
        color:yellow;
        font-size:25px;
        margin:0;
        margin-left:3px;
    }
    a{
        color:yellow;
       
    }
 footer{
        width:100%;
        height: 40px;
        background-color:black;
        color: white;
        font-family: roboto;
        font-weight: 500;
        font-size: 25px;
        text-align: center;
        padding: 5px;
        margin:0;
        
    }
    button{
        padding:0;
        background-color:black;
       
    }
    .a{
        text-decoration: none;
        font-family: roboto;
        font-size: 25px;
        font-weight: 700px;
    }
    
.sv td:hover{
        background-color: rgb(158, 158, 158);
    }
    button{
        cursor:grab;
    }
    .widgets{
        color: yellow;
        font-size: 25px;
     
    }
    .widsp{
    padding-left: 30px;
    }
    .widgets>a{
        text-decoration: none;
    }
    .imgb{
        height:1000px;
        width:100%
    }
  table{
    margin:0;
  }
  .inputsearch{
    width:80%;
   padding:10px;
  }
  
</style>
</head>
<body>
        <table width="100%" cellspacing="10" >
            <tbody>
<tr>
<td colspan="5" align="center" style="background-color: black; border-color:black ;">
<nav id="nav">
        PIXHUB&nbsp;<i class=" fa fa-camera "></i>
            </nav>
        </td></tr>
    <tr><td colspan="3" align="center" style="background-color: black; border-color:black ;"><form action="" method="post"><input type="text" name="search" class="inputsearch" placeholder="Search image i.e fish" ><button><p class="down1"><a href=""><i class="fa fa-solid fa-search" ></i></a></p></button><button value="1" name="back"><p class="down1"><a href=""><i class="fa fa-solid fa-arrow-left" ></i></a></p></button></form></td></tr>
    </tbody></table>
<table width="100%" cellpadding="10"><tr><td style="background-color: black; border-color:black ;">
        <?php
// Database connection
$conn = new mysqli("localhost", "Akhlad", "Akhlad#123", "login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['back']))
{
    $back=$_POST['back'];
    if($back==1)
{
    header("Location:pixhub1.php");
}
}

if(isset($_POST['search']))
{
$name=$_POST['search'];
$sql2="SELECT * FROM image where NAME=\"$name\"";
$result2=$conn->query($sql2);
for($j=0;$j<$result2->num_rows;$j++)
{
    
    $i=$j;
    if($i==0)
    {
        echo"<table width=\"100%\">";
    }
if($i%3==0)
{
    $temp=0;
    echo"<tr>";
}

 $query1="SELECT NAME FROM image where NAME=\"$name\"";
    $result1 = $conn->query($query1);
    
if ($result1->num_rows > 0) {
    // Fetch the product ID from the result set
    $row1 = $result1->fetch_assoc();
    $name1 = $row1['NAME'];
$query = "SELECT image_data,LINK FROM image where NAME=\"$name1\"";
$result = $conn->query($query);
if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        $image_data = $row['image_data'];
        $link=$row['LINK'];
        // Output the image data
        echo"<td >";
        echo '<img src="data:image/png;base64,' . base64_encode($image_data) . '" height="350" width="480">';?>
        <p class="down"><a href="<?php echo $link;?>"><i class="fa fa-solid fa-download" ></i></a></p>
       <?php
        $temp++;
        echo"</td>";
        }
    
    }
    else {
        echo"<td>";
        echo "No images found in the database.";
        $temp++;
        echo"</td>";
    }
    if($temp==3)
    {
        echo"</tr>";
    }
    if($i==$result2->num_rows)
    {
        echo"</table>";
    }
    
    }

}

}
    // Close the database connection
    $conn->close();
?>
</td></tr>

<tr><td colspan="3" style="background-color: black; border-color:black ;"> 
<hr>
    <footer>&copy;CopyRight 2030 PIXHUB Licensed BY WWW.webcp.com </footer></td></tr>
</table>
</body>
</html>