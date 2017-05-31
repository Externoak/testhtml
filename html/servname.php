<?php
header('Refresh: 6; URL=/formulario.html');

$service = $_POST['protocolo'];

    $port = getservbyname($service, 'tcp');
    echo "El protocolo " . $service . " utiliza de manera predefinida el puerto : " . $port . "<br />\n";

?>