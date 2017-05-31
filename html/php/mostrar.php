<style>
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
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
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}
</style>

<?php
require('conecta.php');

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

}

echo "</table>";
mysqli_free_result($resul);
mysqli_close($conn);
?>
