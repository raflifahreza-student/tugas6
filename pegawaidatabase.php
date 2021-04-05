<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dbpegawai";

$conn = mysqli_connect($servername, $username, $password);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

$sql= "CREATE DATABASE dbpegawai";
if(mysqli_query($conn, $sql)){
    echo "Database created succesfully<br>";
} else{
    echo "Error creating database<br>". mysqli_error($conn);
}

mysqli_close($conn);

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql= "CREATE TABLE pegawai(
id_pegawai VARCHAR(12) PRIMARY KEY,
nama VARCHAR(200) NOT NULL,
email VARCHAR(100) NOT NULL,
isi VARCHAR(200) NOT NULL
)";
if(mysqli_query($conn, $sql)){
	echo "Table created succesfully<br>";
} else{
	echo "Error creating table<br>". mysqli_error($conn);
}

mysqli_close($conn);
?>
