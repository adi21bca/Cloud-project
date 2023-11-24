<?php
// Database connection
$conn = new mysqli("localhost", "Akhlad", "Akhlad#123", "login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_FILES["image"])) {
    $image = $_FILES["image"]["tmp_name"];
    $image_type = $_FILES["image"]["type"];
    $id=$_POST['id'];
    $name=$_POST['name'];
    $link=$_POST['link'];

    // Check if the uploaded file is an image
    if (substr($image_type, 0, 5) === "image") {
        $image_data = file_get_contents($image);
        $image_data = $conn->real_escape_string($image_data);

        // Insert the image into the database
        $sql1="SELECT * FROM image WHERE ID=\"$id\" ";
        $result1=$conn->query($sql1);
        if($result1->num_rows>0)
        {
            echo "<script>alert(\"The image id you entered is already exist\");</script>";
            header("Location:Adminaddimage.html");
        }
        else{
        $query = "INSERT INTO image VALUES ('$id','$name','$image_data', '$image_type', '$link')";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert(\"Sucessfully Uploaded\");</script>";
            header("Location:Adminaddimage.html");

        } else {
            echo "Error: " . $conn->error;
        }
        }
    } else {
        echo "Invalid file type. Please upload an image.";
    }


}

$conn->close();
?>