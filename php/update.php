<style>
input{
    width:250px;
    height:50px;
    margin: 15px auto;
    padding-left:15px;
    border-radius:6px;
    border:none;
    color:#939393;
    font-weight:500;
    background-color:#fffbf8;
    -webkit-box-shadow:
        0 -2px 2px 0 rgba(199, 199, 199, 0.55),
        0 1px 1px 0 #fff,
        0 2px 2px 1px #fafafa,
        0 2px 4px 0 #b2b2b2 inset,
        0 -1px 1px 0 #f2f2f2 inset,
        0 15px 15px 0 rgba(41, 41, 41, 0.09) inset;
    -moz-box-shadow:
        0 -2px 2px 0 rgba(199, 199, 199, 0.55),
        0 1px 1px 0 #fff,
        0 2px 2px 1px #fafafa,
        0 2px 4px 0 #b2b2b2 inset,
        0 -1px 1px 0 #f2f2f2 inset,
        0 15px 15px 0 rgba(41, 41, 41, 0.09) inset;
    box-shadow:
        0 -2px 2px 0 rgba(199, 199, 199, 0.55),
        0 1px 1px 0 #fff,
        0 2px 2px 1px #fafafa,
        0 2px 4px 0 #b2b2b2 inset,
        0 -1px 1px 0 #f2f2f2 inset,
        0 15px 15px 0 rgba(41, 41, 41, 0.09) inset;
}
input[type="radio"]{
width:25px;
height:20px;
padding-left:5px;
    border-radius:0px;
    border:none;
    color:#939393;
}
input[type="submit"]{
  padding: 10px 20px;
  font-size: 20px;
  margin:auto;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;

}
input[type="file"]{
width:315px;
height:20px;
padding-left:5px;
    border-radius:0px;
    border:none;
    color:#939393;
}
    .input[type="submit"]:hover {background-color: #3e8e41}

.input[type="submit"]:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
  width: 100%;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;

}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
    width: 25%;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;

}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    width: 25%;
    padding: 1em;
  }
}
</style>

<?php

require('conecta.php');

$csql="select * from tbpueblosmalaga order by NumeroElementoQuimico";
$resul=mysqli_query($conn,$csql);


if(!empty($_POST['SimboloQuimico'])){

        $SQupdate=$_POST['SimboloQuimico'];
        $que = ("SELECT * FROM tbpueblosmalaga WHERE SimboloQuimico='$SQupdate'") or die ("Error al borrar");

        $resul = mysqli_query($conn, $que);
        $fila = mysqli_fetch_array($resul, MYSQLI_BOTH);

    echo "<form name='modificar' method='POST' action='updateBD.php' enctype='multipart/form-data'>";

        echo "<input type='hidden' name='SimboloQuimico' value=".$fila['SimboloQuimico']."> <br>";
        echo "Simbolo Quimico : ".$fila['SimboloQuimico']."<br>";
        echo "<br>";

        $NombreLoca = $fila['NombreLocalidad'];
        echo "Nombre Localidad : ".$fila['NombreLocalidad']."<br>";
        echo "<input name='NombreLocalidad' value=\"$NombreLoca\"> <br>";

        $Com = $fila['Comarca'];
        echo "Comarca : ".$fila['Comarca']."<br>";
        echo "<input name='Comarca' value=\"$Com\"> <br>";


        echo "Habitantes : ".$fila['Habitantes']."<br>";
        echo "<input name='Habitantes' value=".$fila['Habitantes']."> <br>";

        echo "Superficie : ".$fila['Superficie']."<br>";
        echo "<input name='Superficie' value=".$fila['Superficie']."> <br>";

        echo "<input type='hidden' name='NumeroElementoQuimico' value=".$fila['NumeroElementoQuimico']."> <br>";
        echo "Numero Elemento Quimico:  ".$fila['NumeroElementoQuimico']."<br>";

        $data = base64_encode($fila['Escudo']);
        echo"<br>";
        echo "Escudo";
        echo "<td>".'<img height="70" width="60" src="data:image/gif;base64,' . $data . '" />'."</td>";
        echo "<input type='file' name='Escudo' id='Escudo'>";


		echo "<tr><td COLSPAN=5><center> <input name='update' value='Finalizado' type='submit'></button>";

    echo "</form>";

    }

    else{
    echo "<form name='Borrado' method='post' action='update.php'>";
      $csql = "select * from tbpueblosmalaga order by NumeroElementoQuimico";

	$resul=mysqli_query($conn,$csql);

echo "<tr>";

    $campo=mysqli_fetch_field($resul);
    echo '<table class="responstable">';
    $cabecera=$campo->name;
    echo "<th>".$campo->name."</th>";

while  ($campo = mysqli_fetch_field($resul))
    {
     	echo "<th>".$campo->name."</th>";

        $cabecera .= ",".$campo->name;
    }

$campostabla = explode(",",$cabecera);

while($fila=mysqli_fetch_array($resul))
{

	echo "<tr>";
	$data = base64_encode($fila['Escudo']);

	foreach($campostabla as $valor)
        if ($valor == 'Escudo'){
	     $data = base64_encode($fila['Escudo']);
         echo "<td>".'<img height="70" width="60" src="data:image/gif;base64,' . $data . '" />'."</td>";
        }
        else {
	       echo "<td>".$fila[$valor]."</td>";
        }
        echo "<td><input type='radio' name='SimboloQuimico' value=".$fila['SimboloQuimico']."></td>";
}

echo "<tr><td COLSPAN=5><center> <input name='Enviar' value='Modificar' type='submit'></button>";
echo "</table>";
mysqli_free_result($resul);
mysqli_close($conn);
    }



?>
