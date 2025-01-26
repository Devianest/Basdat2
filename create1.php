<?php
require_once "connection.php";


if(isset($_POST['save']))
{    
    //  Admin
     $id_admin = $_POST['id_admin'];
     $username= $_POST['username'];
     $password= $_POST['password'];
     $jabatan= $_POST['jabatan'];


     $sql1 = "INSERT INTO admin_kedai (id_admin,username,password,jabatan) values ('$id_admin','$username','$password',' $jabatan')";

     if (mysqli_query($conn, $sql1)) {
        header("location: index_admin.php");
        exit();
     } else {
        echo "Error: " . $sql1 . " " . mysqli_error($conn);
     }
     mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add menu record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group">
                            <label>id_admin</label>
                            <input type="text" name="id_admin" class="form-control" value="" maxlength="50" required="">
                        </div>

                        <div class="form-group ">
                            <label>username</label>
                            <input type="text" name="username" class="form-control" value="" maxlength="100" required="">
                        </div>

                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="password" class="form-control" value="" maxlength="200" required="">
                        </div>

                        <div class="form-group">
                            <label>jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="" maxlength="200" required="">
                        </div>


                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index_admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
