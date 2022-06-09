<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "inspirasicofee";

$koneksi = mysqli_connect($host,$user, $password, $db);
// Check connection
if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
}
else{
    // echo "konek";
}