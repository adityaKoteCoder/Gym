<?php 
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="offer";


$conn=mysqli_connect("$servername","$username","$password","$dbname")or die(Mysqli_error());

$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));

$sql="SELECT * FROM $tbl_name";

$result=mysqli_query($conn,$sql)or die(mysqli_error($connection));



    $name=$_POST['name'];
    //$id=$_POST['id'];
    $price=$_POST['price'];
    $dur=$_POST['dur'];
    $img=$_POST['img'];

    $query="INSERT INTO offer (name, price, dur, img) VALUES ('$name','$price','$dur','$img')";

$result=mysqli_query($conn,$sql)or die(mysqli_error($connection));
// INSERTION
mysqli_query($conn,$query)or die(mysqli_error($conn));
    // <script>
    // alert="Offer added successfully"
    // </script>

// UPDATE
$sql = "UPDATE offer SET name='$name',id='$id',cost='$cost' ,dur='$dur',img='$img' WHERE id=$id";
mysqli_select_db($conn,$db_name);
$retval1 = mysqli_query($conn, $sql );

if($retval1) {
    header("location:manage.php");
 }else {
    echo "<script> alert:Update failed!</script>";
 }
mysqli_close($conn);

// DELETION
$id = $_GET['id'];

   
    $sql = "DELETE FROM offer where id = '$id'";
   mysqli_select_db($conn,$dbname);
   $retval2 = mysqli_query($conn, $sql );
   
if($retval2) {
        echo "<script> alert:Deletion Successful!</script>";
      }else {
        echo "<script> alert:Deletion failed!</script>";
      }
?>

<!-- #}
Mysqli_close($conn);
?> -->

<!-- <?php
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?> -->