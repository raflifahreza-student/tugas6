<!DOCTYPE html>
<html>
<head>
	<title>Input Data Pegawai</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}
		.page {
			width: 17cm;
			margin: auto;
		}
	</style>
</head>
<body>
	<h1>INPUT DATA PEGAWAI BARU</h1>
	<form method="POST" action="#">
		<table width="400" cellpadding="2" cellspacing="2">
			<tr>
				<td>ID Pegawai</td>
				<td><input type="text" name="id_pegawai" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" required></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input type="text" name="isi" required></td>
			</tr>
			<tr>
			<td>
				<input type="submit" name="Simpan" value="Simpan">
				<input type="reset" name="Reset" value="Reset">
			</td>
		</tr>
		</table>
	</form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbpegawai"

$conn = mysqli_connect($servername ,$username ,$password ,$dbname);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

if (isset($_POST['Simpan'])) {
	
	$sql = "INSERT INTO pegawai VALUES ('$_POST[id_pegawai]', '$_POST[nama]', '$_POST[email]', '$_POST[isi]')";
	if (mysqli_query($conn, $sql)) {
		echo "Pembuatan Data Sukses";
	} else {
		echo "Eror : ".$sql	."<br>". mysqli_error($conn);
	}
}
?>
