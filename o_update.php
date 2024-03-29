<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $price = $dur = $img ="";
$name_err = $price_err = $dur_err = $img_err ="";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } 
    // elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $name_err = "Please enter a valid name.";}
     else{
        $name = $input_name;
    }
    
    // Validate address address
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter an price.";     
    } else{
        $price = $input_price;
    }
    
    // Validate salary
    $input_dur = trim($_POST["dur"]);
    if(empty($input_dur)){
        $dur_err = "Please enter the duration.";     
    } 
    // elseif(!ctype_digit($input_dur)){
    //     $dur_err = "Please enter a positive integer value.";
    // } 
    else{
        $dur = $input_dur;
    }
    
     // Validate image
     $input_img = trim($_POST["img"]);
     if(empty($input_img)){
         $img_err = "Please enter an img.";     
     } else{
         $img = $input_img;
     }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($price_err) && empty($dur_err) && empty($img_err)){
        // Prepare an update statement
        $sql = "UPDATE offer SET name=?, price=?, dur=?, img=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_price, $param_dur, $param_img, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_price = $price;
            $param_dur = $dur;
            $param_img = $img;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: o_index.php");
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
}else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM offer WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $price = $row["price"];
                    $dur = $row["dur"];
                    $img = $row["img"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
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
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body class='ad'>
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
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <textarea name="price" class="form-control"><?php echo $price; ?></textarea>
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($dur_err)) ? 'has-error' : ''; ?>">
                            <label>Duration</label>
                            <input type="text" name="dur" class="form-control" value="<?php echo $dur; ?>">
                            <span class="help-block"><?php echo $dur_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($img_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control" value="<?php echo $img; ?>">
                            <span class="help-block"><?php echo $img_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="o_index.php" class="btn btn-default">Cancel</a>
                        <a href="o_index.php" class="btn btn-default">Back</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>