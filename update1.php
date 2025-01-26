<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE admin_kedai set id_admin='" . $_POST['id_admin'] . "', username='" . $_POST['username'] . "' , password='" . $_POST['password'] . "', jabatan='" . $_POST['jabatan'] . "' WHERE id_admin='" . $_POST['id_admin'] . "'");
     
     header("location: index_admin.php");
     exit();
    }
    $result1 = mysqli_query($conn,"SELECT * FROM admin_kedai WHERE id_admin='" . $_GET['id_admin'] . "'");
    $row= mysqli_fetch_array($result1);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                            <label>id_admin</label>
                            <input type="text" name="id_admin" class="form-control" value="<?php echo $row["id_admin"]; ?>" maxlength="100" required="">
                        </div>


                        <div class="form-group ">
                            <label>username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $row["username"]; ?>" maxlength="200" required="">
                        </div>


                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $row["password"]; ?>" maxlength="200"required="">
                        </div>

                        <div class="form-group">
                            <label>jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo $row["jabatan"]; ?>" maxlength="200"required="">
                        </div>


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index_admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>