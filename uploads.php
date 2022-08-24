<?php
error_reporting(0);
 
$msg = "";
 

if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/" . $filename;
 
    $db = mysqli_connect("localhost", "root", "", "geekforgeeks");
 
  
    $sql = "INSERT INTO image (filename) VALUES ('$filename')";
 
   
    mysqli_query($db, $sql);
 
    
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>
<html>

<body>
<?php
        $query = " select * from image ";
        $result = mysqli_query($db, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <img src="image/<?php echo $data['filename']; ?>">
 
        <?php
        }
        ?>
</body>
</html>
       
   