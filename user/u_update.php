<?php
// Include config file
include("uconfig.php");
$uname = $_GET["uname"];

 
$sql = "SELECT * FROM user_details where uname='$uname'";
$res = mysqli_query($link, $sql);
$row = mysqli_fetch_array($res);
$name = $row["name"];
$gen = $row["gen"];
$dob = $row["dob"];
$pno = $row["pno"];
$email = $row["email"];
$pword = $row["pword"];
 

// Processing form data when form is submitted
if(isset($_POST["submit"])){
    // Get hidden input value
    $name = $_POST["name"];
    // echo "$name";
    // Validate address date of birth
    // $input_dob = trim($_POST["dob"]);
    // Validate gender
    $gen = $_POST["gen"];
     // Validate phone number
     $pno = $_POST["pno"];
     //Validate address date of birth
    //  $dob = $_POST["dob"];
     // Validate email
     $email = $_POST["email"];
     // Validate password
     $pword = $_POST["pword"];
     $sql = "UPDATE user_details SET name='$name', gen='$gen', pno='$pno', email='$email', pword='$pword' WHERE uname='$uname'";
     $res = mysqli_query($link, $sql);

    // Check input errors before inserting in database
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="ad">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="" method="post">
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        </div>

                        <div class="form-group " >
                            <label>Gender</label>
                            <br>
                            <!-- <input type="radio" name="gen"  value="<?php echo $gen; ?>"> -->
                            <div style="color:White";>
                            <input type="radio" name="gen" value="Male" checked>Male<br>
                        <input type="radio" name="gen" value="Female" >Female<br>
                        <input type="radio" name="gen" value="Other">Other
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <textarea name="pno" class="form-control"><?php echo $pno; ?></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                        </div> -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="pword" class="form-control" value="<?php echo $pword; ?>">
                        </div>
                        <!-- <input type="hidden" name="uname" value="<?php echo $uname; ?>"/> -->
                        <input type="submit" class="btn btn-primary" value="submit" name="submit">
                        <a href="u_index.php?uname=<?php echo $uname ?>" class="btn btn-default">Cancel</a>
                        <a href="u_index.php?uname=<?php echo $uname ?>" class="btn btn-default">Back</a>

                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

