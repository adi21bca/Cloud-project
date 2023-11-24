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
        padding-left: 100px;
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
        text-align: right;
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
        padding: 20px;
        
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
</style>
</head>
<body>
<main>
        <table width="100%" cellspacing="10">
            <tbody>
<tr>
<td style="background-color: black; border-color:black ;"><span class="widgets widsp"><a href="login.html">Login</a></span>
        &nbsp;&nbsp;&nbsp;
    <span class="widgets"><a href="Register.html">Register</a></span></td>
    <td colspan="3" style="background-color: black; border-color:black ;">

    <nav id="nav">
        PIXHUB&nbsp;<i class=" fa fa-camera "></i>
            </nav>
</td></tr></tbody></table>
<table width="100%" cellpadding="10"><tr><td>
        <?php
// Database connection
$conn = new mysqli("localhost", "Akhlad", "Akhlad#123", "login");
$count=0;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1="SELECT * FROM image WHERE ID >='I1' AND ID < 'I9'";
        $result1=$conn->query($sql1);
for($j=0;$j<$result1->num_rows;$j++)
{
    
    $i=$j;
    if($i==0)
    {
        echo"<table width=\"100%\" class=\"sv\">";
    }
if($i%3==0)
{
    $temp=0;
    echo"<tr>";
}

    $id="I".$j+1;
$query = "SELECT image_data,LINK FROM image where ID=\"$id\"";
$result = $conn->query($query);

if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        $image_data = $row['image_data'];
        $link=$row['LINK'];
        // Output the image data

        echo"<td>";
        echo '<img src="data:image/png;base64,' . base64_encode($image_data) . '" height="300" width="480">'; ?>
        <p class="down"><a href="<?php echo $link;?>"><i class="fa fa-solid fa-download" ></i></a></p>
        <?php
        $count++;
        $temp++;
        echo"</td>";
        }
    
    }
    else{
        echo"<td>";
        echo "No images found in the database.";
        $temp++;
        $count++;
        echo"</td>";
    }
    if($temp==3)
    {
        echo"</tr>";
    }
    if($i==$result1->num_rows)
    {
        echo"</table>";
    }
    }
    // Close the database connection
$conn->close();

       ?>  
       </td></tr>
     <?php 
if($count>=9){
    ?>
<tr><td colspan="3" style="background-color: black; border-color:black ;"><p align="center" class="page"><a href="register.html" class="a">Next&raquo;</a></p> </td></tr>
<?php       
}
       ?>
       <tr><td colspan="3" style="background-color: black; border-color:black ;"> <hr>
    <footer >&copy;CopyRight 2030 PIXHUB Licensed BY WWW.webcp.com </footer></td></tr>
</table>
</body>
</html>
    