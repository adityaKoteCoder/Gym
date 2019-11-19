<?php
// Include config file
require_once "uconfig.php";
 
// Define variables and initialize with empty values
$name = $uname = $dob = $gen = $pno = $email = $pword = "";
$name_err = $uname_err = $dob_err = $gen_err =  $pno_err =  $email_err =  $pword_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["uname"]) && !empty($_POST["uname"])){
    // Get hidden input value
    $uname = $_POST["uname"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address date of birth
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter an date of birth.";     
    } else{
        $dob = $input_dob;
    }
    
    // Validate gender
    $input_gen = trim($_POST["gen"]);
    if(empty($input_gen)){
        $dur_err = "Please enter the gender.";     
    // } elseif(!ctype_digit($input_gen)){
    //     $gen_err = "Please enter a the correct integer value.";
    } else{
        $gen = $input_gen;
    }
    
     // Validate phone number
     $input_pno = trim($_POST["pno"]);
     if(empty($input_pno)){
         $pno_err = "Please enter the phone number.";     
     } else{
         $pno = $input_pno;
     }

     // Validate email
     $input_email = trim($_POST["email"]);
     if(empty($input_email)){
         $email_err = "Please enter the Email.";     
     } else{
         $email = $input_email;
     }

     // Validate password
     $input_pass = trim($_POST["pass"]);
     if(empty($input_pword)){
         $pword_err = "Please enter the phone number.";     
     } else{
         $pword = $input_pword;
     }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($dob_err) && empty($gen_err) && empty($pno_err) && empty($email_err) && empty($pword_err)){
        // Prepare an update statement
        $sql = "UPDATE user_details SET name=?, dob=?, gen=?, pno=?, email=?, pword=? WHERE uname=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_dob, $param_gen, $param_pno, $param_email, $param_pword, $param_email);
            
            // Set parameters
            $param_name = $name;
            $param_uname = $uname;
            $param_dob = $dob;
            $param_gen = $gen;
            $param_pno = $pno;
            $param_email = $email;
            $param_pword = $pword;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: u_index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["uname"]) && !empty(trim($_GET["uname"]))){
        // Get URL parameter
        $id =  trim($_GET["uname"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM user_details WHERE uname = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_uname);
            
            // Set parameters
            $param_uname = $uname;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $uname = $row['uname']; 
                    $dob = $row['dob']; 
                    $gen = $row['gen']; 
                    $pno = $row['pno']; 
                    $email = $row['email'];
                    $pword = $row['pword'];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: u_error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: u_error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="date" name="name" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $dob_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($gen_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <input type="text" name="gen" class="form-control" value="<?php echo $gen; ?>">
                            <span class="help-block"><?php echo $gen_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pno_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <textarea name="pno" class="form-control"><?php echo $pno; ?></textarea>
                            <span class="help-block"><?php echo $pno_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="file" name="pass" class="form-control" value="<?php echo $pass; ?>">
                            <span class="help-block"><?php echo $pass_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="u_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>