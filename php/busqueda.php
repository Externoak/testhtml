<?php

require('conecta.php');
    
if (mysqli_connect_errno()) {
    printf("Error de conexion: %s\n", mysqli_connect_error());
    exit();
}

mysqli_select_db($conn, "dbmalaga");

?>
<!DOCTYPE html>
<style>
 h2{
    color: #4CAF50; 
    font-family: 'Droid serif', serif; 
    font-size: 36px; 
    font-weight: 400; 
    font-style: italic; 
    line-height: 44px; 
    margin: 0 0 12px; 
    text-align: center;
}
.button {
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

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

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
input[type="text"]{
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
    
select{
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
div{
    text-align: center; 
}

</style>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Busqueda Personalizada</title>
    </head>
    <h2>Busqueda Personalizada</h2>
    <body>
<div>
<form action="" method="post">  
<?php
  $csql = "select * from tbpueblosmalaga";
$resul=mysqli_query($conn,$csql);

    $campo=mysqli_fetch_field($resul);   
    $cabecera=$campo->name;

echo "<select name='Campo'>";
while  ($campo = mysqli_fetch_field($resul))
    {
     	echo "<option value='".$campo->name."'>" .$campo->name."</option>";
        
    }
echo "</select>";   

?>    
<input type="text" name="term" placeholder="" /><br /> 
<input class="button" type="submit" value="Buscar" />  
<a href='/index.html'><input href='/index.html' class="button" type="button" value='Menu'></a>    
</form>  
</div>
<?php
if (!empty($_POST['term'])) {

$campo = $_POST['Campo'];
$term = $_POST['term'];   



$sql = "SELECT * FROM tbpueblosmalaga where $campo = '$term';
"; 
     
$resul = mysqli_query($conn, $sql); 


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
    
  

}
?>
    </body>
</html>