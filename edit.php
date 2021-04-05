<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dbpegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}
$sql= "SELECT * FROM pegawai WHERE id_pegawai=$_GET[id]";
$result= mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Pegawai</title>
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
	<h1>Ubah Data</h1>
<form method="POST" action="#">
	<table width="400" cellpadding="2" cellspacing="2">
		<tr>
			<td>ID</td>
			<td><input type="text" name="id_pegawai" value="<?php echo $row['id_pegawai'] ?>" required></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $row['nama'] ?>" required></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?php echo $row['email']?>" required></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td><input type="text" name="isi" value="<?php echo $row['isi']?>" required></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="Ubah" value="Ubah">
			</td>
		</tr>
	</table>
</form>
<form action="datapegawai.php">
    <input type="submit" value="Batal" />
</form>
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

if(isset($_POST['Ubah'])){

	$sql= "UPDATE pegawai SET id_pegawai='$_POST[id_pegawai]', nama='$_POST[nama]', email='$_POST[email]', isi='$_POST[isi]'";
	if(mysqli_query($conn, $sql)){
		echo "Data berhasil diubah";
		echo "<meta HTTP-EQUIV='REFRESH' content='1; url=datapegawai.php'>";
	} else{
		echo "Error: ". $sql ."<br>". mysqli_error($conn);
	}
	mysqli_close($conn);	
}

?>
