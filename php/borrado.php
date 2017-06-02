<style>
    
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


if(!empty($_POST['SimboloQuimico'])){
    
        $SQborrar=$_POST['SimboloQuimico'];
        $que = "DELETE FROM tbpueblosmalaga where SimboloQuimico = '$SQborrar'";
        mysqli_query($conn,$que) or die ("Error al borrar");
        
        echo "Localidad borrada correctamente. Volver al menú";
        echo "<a href='/index.html'><input type='button' name='Volver al menú' value='Volver'></a>";
    }

    else{
        echo "<form class='responstable' name='formborrado' method='POST' action='borrado.php'>";
        $query = "select SimboloQuimico,NombreLocalidad,Comarca,Habitantes,NumeroElementoQuimico from tbpueblosmalaga order by NumeroElementoQuimico";
        $datos=mysqli_query($conn,$query);
        echo "<table border=2>";
        $cabecera = array ("SimboloQuimico","NombreLocalidad","Comarca","Habitantes","NumeroQuimico");
        echo "<tr>";
        foreach($cabecera as $campo) echo "<th>".$campo."</th>";
        while($fila=mysqli_fetch_array($datos)) 
            {
		      echo "<tr>";
		      echo "<td><input type='radio' name='SimboloQuimico' value=".$fila['SimboloQuimico'].">".$fila['SimboloQuimico']."</td>";
		      echo "<td>".$fila['NombreLocalidad']."</td>";
		      echo "<td>".$fila['Comarca']."</td>";
		      echo "<td>".$fila['Habitantes']."</td>";
		      echo "<td>".$fila['NumeroElementoQuimico']."</td>";
            }		
        echo "<tr><td COLSPAN=5><center> <input name='submit' value='Borrar' type='submit'></button>";
        echo "<a href='/index.html'><input type='button' name='Volver al menú' value='Volver al menu'></a>";
        echo "</table>";
        
        echo "</form>";
        

    }



?>

