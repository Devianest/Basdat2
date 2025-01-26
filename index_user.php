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
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">User List</h2>
                    </div>
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM pemesan");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      


                    <!-- MEMBUAT DATABASE TABLE -->
                      <tr>
                        <td>Id Pemesan</td>
                        <td>Nama Pemesan</td>
                        <td>Kode Meja</td>
                      </tr>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>


<?php
                    $query = "SELECT id FROM pemesan ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($query);
                    $lastId = $result->fetch_assoc();

                    if ($lastId) {
                        // Ambil angka terakhir dari ID
                        $lastNumber = (int)substr($lastId['id'], 4);
                        $newNumber = $lastNumber + 1;
                        $newId = "Pemesan" . str_pad($newNumber, 3, "0", STR_PAD_LEFT); // Format ID baru
                    } else {
                        $newId = "Pemesan001"; // Jika belum ada data, mulai dari USER001
                    }

                    echo "ID Baru: " . $newId;
                    ?>

                    <!-- BUAT MANGGIL VALUE DATABASE TABLE NYA -->
                    <tr>
                        <td><?php echo $row["nama_pemesan"]; ?></td>

                        <td><?php echo $row["kode_meja"]; ?></td>

                        <td><?php echo $row["id_pemesan"]; ?></td>
                    
                        


                    <!-- UPDATE UPDATE -->
                        <a href="update.php?id=<?php echo urlencode($newId['id']); ?>" title="Update Record"><span class='glyphicon glyphicon-pencil'></span></a>

                    
                    
                    <!-- DELETE RECORD -->

                        <a href="delete.php?id=<?php echo urlencode($newId['id']); ?>" title="Delete Record"><span class='glyphicon glyphicon-trash'></span></a>
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