<!DOCTYPE html>
<html>
<head>
	<title>DATA PEGAWAI</title>
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
	<h1>DATA PEGAWAI</h1>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbpegawai";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}

	$sql = "SELECT * FROM pegawai";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<br>";
		echo "ID Pegawai: ". $row["id_pegawai"] ."<br>Nama: ". $row["nama"] ."<br>Email: ". $row["email"] ."<br>Keterangan: ". $row["isi"] ;
		echo "<tr>
		<td><a href='editdata.php?id=$row[id_pegawai]'>Edit</a></td>
		&emsp;|&emsp;
		<td><a href='?id=$row[id_pegawai]'>Hapus</a></td>
		</tr><br>";
	}
	} else {
		echo "Data Tidak Ditemukan";
	}

	echo"<br><br><form action='input1.php'><input type='submit' name='Tambah' value='Tambah Data'></form>";
	mysqli_close($conn);
	?>
</body>
</html>

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dbpegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

if(isset($_GET['id'])){

	$sql= "DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'";
	if(mysqli_query($conn, $sql)){
		echo "Data telah berhasil dihapus";
		echo "<meta HTTP-EQUIV='REFRESH' content='1; url=datapegawai.php'>";
	} else{
		echo "Error: ". $sql ."<br>". mysqli_error($conn);
	}
	mysqli_close($conn);	
}
?>
