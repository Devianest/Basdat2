<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<?php include "head.php"; ?>

</head>
<body>
 
	<h1>SELAMAT DATANG DI KEDAI KOPI KENANGAN</h1>


	<div class="kotak_login">
		<p class="tulisan_login">Silahkan Lengkapi Form</p>
 
		<form action="check_login.php" method="post">
			<label>Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form_login" placeholder="Tulis Disini" required="required">
 
			<label for="pilihan">Pilih Mejamu:</label>
            <select name="pilihan" id="pilihan">
            <option value="1">MEJA01</option>
            <option value="2">MEJA02</option>
            <option value="3">MEJA03</option>
            </select>

			<input type="submit" class="tombol_login" value="NEXT">
 
			<br/>
			<br/>
		</form>
		
	</div>
 
 
</body>
</html>