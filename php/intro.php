<?php

$servername = "localhost";
$username = "vagrant";
$password = "vagrant";
$dbname = "dbmalaga";

$conn = new mysqli($servername, $username, $password, $dbname) or die ("Error de conexion");

header('Refresh: 3; URL=/index.html');

$SQ=$_POST['SimboloQuimico'];
$NL=$_POST['NombreLocalidad'];
$Comarca=$_POST['Comarca'];
$ANM=$_POST['AlturaNivelMar'];
$Hab=$_POST['Habitantes'];
$Sup=$_POST['Superficie'];
$NEQ=$_POST['NumeroElementoQuimico'];
$Escudo=$_POST['Escudo'];


$image = file_get_contents($_FILES['Escudo']['tmp_name']);
$escu = mysqli_real_escape_string($conn, $image);


$query = "INSERT INTO dbmalaga.tbpueblosmalaga (SimboloQuimico, Nombrelocalidad, Comarca, AlturaNivelMar, Habitantes, Superficie, NumeroElementoQuimico, Escudo) VALUES ('$SQ', '$NL', '$Comarca', '$ANM', '$Hab','$Sup','$NEQ','$escu');";

mysqli_query($conn, $query) or die ("Los datos no son correctos porfavor compruébelo y vuelva a intentarlo.");

echo "Los datos han sido insertados en la base de datos. Redirigiendo al menu principal.";

mysqli_close($conn);

?>
