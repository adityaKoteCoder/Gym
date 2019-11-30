<?php
include('uconfig.php');
$uname = $_GET["uname"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body class="ad">
    <div class="wrapper">
    <button class="lout lout1" type="submit" name="logout"><a href="../user.php?uname=<?php echo $uname ?>" class="btn btn-default">Back</a>
</button>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">My Details</h2>
                    </div>
                    <?php
                    // Include config file
                    // require_once "uconfig.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM user_details where uname = '$uname'    ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>User Name</th>";
                                        echo "<th>Date of Birth</th>";
                                        echo "<th>Gender</th>";
                                        echo "<th>Phone Number</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Password</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    $dob = date("d-m-Y", strtotime($row["dob"]));

                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['uname'] . "</td>";
                                        echo "<td>"  .$dob ."</td>";
                                        echo "<td>" . $row['gen'] . "</td>";
                                        echo "<td>" . $row['pno'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['pword'] . "</td>";
                                        echo "<td>";
                                            // echo "<a href='u_read.php?uname=". $row['uname'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='u_update.php?uname=". $row['uname'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            // echo "<a href='u_delete.php?uname=". $row['uname'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>