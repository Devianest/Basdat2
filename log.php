<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>LOG ACCESS</title>
<?php include "head.php"; ?>
</head>
<body>
    <?php 
	    session_start();
	    // cek apakah yang mengakses halaman ini sudah login
	    if($_SESSION['jabatan']==""){
		    header("location:dashboard.php?pesan=gagal");
	    }
	?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="dashboard.php">Halo <b><?php echo $_SESSION['username']; ?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <span>
                <p class="navbar-text navbar-right"><b><?php echo $_SESSION['jabatan']; ?>, <a href="logout.php">LOGOUT</a></b></p>
            </span>
        </div>    
        </div> 
    </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Log Kegiatan Admin</h2>
                    </div>
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM log_user");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      
                      <tr>
                        <td>Kejadian</td>
                        <td>Waktu</td>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["kejadian"]; ?></td>
                        <td><?php echo $row["waktu"]; ?></td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     
        </div>

</body>
</html>