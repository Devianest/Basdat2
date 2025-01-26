<?php
include_once 'connection.php';
$sql = "DELETE FROM admin_kedai WHERE id_admin='" . $_GET["id_admin"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: index_admin.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>