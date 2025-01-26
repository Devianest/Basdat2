<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Kedai Kopi Kenangan</title>
<?php include "head.php"; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
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
                <a class="navbar-brand" href="index_admin.php">Halo <b><?php echo $_SESSION['username']; ?></a>
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
                        <h2 class="pull-left">Menu List</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Menu</a>
                    </div>
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM menu");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->
                      <tr>
                        <td>id_menu</td>
                        <td>nama_menu</td>
                        <td>deskripsi</td>
                        <td>kategori</td>
                        <td>harga</td>
                      </tr>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>



                    <!-- BUAT MANGGIL VALUE DATABASE TABLE NYA -->
                    <tr>
                        <td><?php echo $row["id_menu"]; ?></td>

                        <td><?php echo $row["nama_menu"]; ?></td>

                        <td><?php echo $row["deskripsi"]?></td>

                        <td><?php echo $row["kategori"]?></td>

                        <td><?php echo $row["harga"]?></td>



                    <!-- UPDATE UPDATE -->
                        <td><a href="update.php?id_menu=<?php echo $row["id_menu"]; ?>" title='Update Record'><span class='glyphicon glyphicon-pencil'></span></a>

                    
                    
                    <!-- DELETE RECORD -->
                        <a href="delete.php?id_menu=<?php echo $row["id_menu"]; ?>" title='Delete Record'><i class='material-icons'><span class='glyphicon glyphicon-trash'></span></a>
                        </td>
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