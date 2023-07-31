<style>
    table{
	border: solid 2px beige;
	border-collapse: collapse;
}
th,h1{
	background-color: aquamarine;

}
td,th{
	border: solid 1px beige;
	padding: 2px;
	text-align: Center;
	
}
</style>



<?php
$User = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $User, $pass);

$nombre = $_POST["Nombre" ];
$Apellidos = $_POST["Apellidos"];
$Email = $_POST["Email"];
$Asunto = $_POST["Asunto"];
$Mensaje = $_["Mensaje"];

if(!$connection){
    echo "No se ha podido conectar con el servidor" . mysqli_error();

}
else{
    echo "<b><h3>Hemos conectado al servidor</h3></b>";

}

$datab = "formulario";

$db = mysqli_select_db($connection,$datab);

if (!$db){
    echo "No se ha podido encontrar la tabla";
}
else{
    echo "<h3>Tabla Seleccionada:</h3>";

}
$intrucciones_SQL = "INSERT INTO TABLA (Nombre, Apellido, Email, Asunto, Mensaje)
                                values('$Nombre','$Apellidos','$Email','$Asunto','$Mensaje') ";

   
$resultado = mysqli_query($connection,$intrucciones_SQL);

$consulta = "SELECT * FROM TABLA";

$resultado = mysqli_query($connection, $consulta);
if(!$resultado){
    echo "No se ha podido realizar la consulta";

}
echo "<table>";
echo "<tr>";
echo "<th><h1>Nombre</h1></th>";
echo "<th><h1>Apellidos</h1></th>";
echo "<th><h1>Email</h1></th>";
echo "<th><h1>Asunto</h1></th>";
echo "<th><h1>Mensaje</h1></th>";
echo "</tr>";

while ($colum = mysqli_fetch_array($resultado))
{
    echo "<tr>";
    echo "<td><h2>" . $colum['Nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['Apelllidos']. "</td></h2>";
    echo "<td><h2>" . $colum['Email']. "</td></h2>";
    echo "<td><h2>" . $colum['Asunto']. "</td></h2>";
    echo "<td><h2>" . $colum['Mensaje']. "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

    echo '<a href="Conctato.html"> Volver Atras</a>';

    ?>