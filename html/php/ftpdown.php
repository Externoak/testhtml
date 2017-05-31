<?php

$ftp_server = "192.168.8.124";
$ftp_username = "usuario3";
$ftp_userpass = "usuario3";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

$arch = $_POST['downfile'];
$filename = "/tmp/".$arch;
$remote_file_path = "/tmp/".$arch;

if (ftp_get($ftp_conn, $remote_file_path, $filename, FTP_ASCII)) {
} else {
    echo "Ha habido un problema\n";
}


header("Content-disposition: attachment; filename=".$arch);
header("Content-Type: application/force-download");
readfile($filename);

ftp_close($ftp_conn);
?>