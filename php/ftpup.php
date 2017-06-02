<?php

header('Refresh: 2; URL=/formulario.html');

$ftp_server = "192.168.8.124";
$ftp_username = "usuario3";
$ftp_userpass = "usuario3";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);


$filename = basename($_FILES['subir']['name']);
$remote_file_path = "/tmp/".$filename;


ftp_chdir($ftp_conn, '/tmp/');
if (ftp_put($ftp_conn, $remote_file_path, $_FILES['subir']['tmp_name'], FTP_ASCII))
  {
  echo "$filename se ha subido correctamente.";
  }
else
  {
  echo "Error al subir $filename.";
  }

ftp_close($ftp_conn);
?>

