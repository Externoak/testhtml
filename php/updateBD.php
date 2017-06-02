<?php

require('conecta.php');


$SimboloQuimico=$_POST['SimboloQuimico'];
$NombreLocalidad=$_POST['NombreLocalidad'];
$Comarca=$_POST['Comarca'];
$Habitantes=$_POST['Habitantes'];
$Superficie=$_POST['Superficie'];
$NumeroElementoQuimico=$_POST['NumeroElementoQuimico'];
$Escudo=$_POST['Escudo'];

if ( !is_uploaded_file($_FILES['Escudo']['tmp_name'])){
    $csql = "UPDATE dbmalaga.tbpueblosmalaga SET SimboloQuimico='$SimboloQuimico', NombreLocalidad='$NombreLocalidad', Comarca= '$Comarca', Habitantes='$Habitantes', Superficie='$Superficie', NumeroElementoQuimico='$NumeroElementoQuimico' WHERE SimboloQuimico='$SimboloQuimico';";
}
else {
    $image = file_get_contents($_FILES['Escudo']['tmp_name']);
    $escu = mysqli_real_escape_string($conn, $image);
    $csql = "UPDATE dbmalaga.tbpueblosmalaga SET SimboloQuimico='$SimboloQuimico', NombreLocalidad='$NombreLocalidad', Comarca= '$Comarca', Habitantes='$Habitantes', Superficie='$Superficie', NumeroElementoQuimico='$NumeroElementoQuimico', Escudo='$escu' WHERE SimboloQuimico='$SimboloQuimico';";
}

mysqli_query($conn ,$csql);

if (mysqli_errno($conn)==0) echo "El registro se ha actualizo correctamente";
    else echo "El registro no se ha podido actualizar";
    mysqli_close($conn);   

echo "<br>";
echo "<a href='/index.html'><input type='button' name='Volver al menú' value='Volver al menu'></a>";
    
?>