<?php

$ip=$_POST['ip'];
$nombre_host = gethostbyaddr($ip);

echo "La ip $ip corresponde al equipo $nombre_host";
?>