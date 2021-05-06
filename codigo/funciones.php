<?php
  
function iniciar()
{
    $nombre = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    if ($nombre == "administrador" && $contrasenia == "123456") 
    {
        $_SESSION['admin'] = $nombre;
        header("Location:index.php");
    }
    else 
    {
        $c=mysqli_connect("localhost","usuapp","");

        mysqli_select_db($c, "PINATA_FELIZ");

        $resultado= mysqli_query($c, "SELECT IDCLIENTE, NOMBRECLIENTE FROM Clientes WHERE (NOMBRECLIENTE='$nombre' AND CONTRASENA='$contrasenia')");

        $numero=mysqli_num_rows($resultado);
        

        if ($numero == 1) 
        {
            while ($registro = mysqli_fetch_row($resultado))
            {
                $_SESSION['id'] = $registro[0];
                $_SESSION['usuario'] = $registro[1];

            }
            header("Location:index.php");
        }
        mysqli_close($c);  
    }
}

function cerrarSesion()
{
    session_destroy();
    header("Location:index.php");
}

function error(&$vec)
{
    $vec[1062]="Dato repetido en la base de datos";
    $vec[1046]="No se pudo conectar a la base de datos";
}

function CBD()
{
    $c = @mysqli_connect("localhost","adminapp","123") or die("No se conecto");

    if(mysqli_query($c, "CREATE DATABASE PINATA_FELIZ "))
    { 
        echo "<h4>Base de datos creada</h4>"; 
    }
    else
    { 
        echo "<h4>La base de datos ya esta creada</h4>"; 
    }

    mysqli_select_db ($c,"PINATA_FELIZ"); 

    $crear ="CREATE TABLE IF NOT EXISTS ";
    $crear .="Animadores";
    $crear .= "("; 
    $crear .="IDANIMADOR INT ,"; 
    $crear .="NOMBREANIMADOR VARCHAR(50) ,";
    $crear .="ESPECIALIDAD VARCHAR(50) ,";
    $crear .="CONTRASENA VARCHAR(50) ,";  
    $crear .="PRECIO INT,"; 
    $crear .="PRIMARY KEY(IDANIMADOR)";    
    $crear .=")";  
    
    if(mysqli_query($c,$crear))
    {
        echo "<h4>Se ha creado la tabla Animadores</h4>";
    }
    else
    {
        if (mysqli_errno($c)==1062)
        {
            echo "<h4>No ha podido añadirse el registro<br>Ya existe un campo con este ID</h4>";
        }
        else
        { 
        $numerror=mysqli_errno($c);
        $descrerror=mysqli_error($c);
        echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
        }
    }
    
    $crear ="CREATE TABLE IF NOT EXISTS ";
    $crear .="Clientes";
    $crear .= "("; 
    $crear .="IDCLIENTE INT AUTO_INCREMENT,"; 
    $crear .="NOMBRECLIENTE VARCHAR(50) ,";
    $crear .="DIRECCION VARCHAR(50) ,";
    $crear .="CONTRASENA VARCHAR(50) ,";  
    $crear .="EMAIL VARCHAR(50) ,";
    $crear .="PRIMARY KEY(IDCLIENTE)";    
    $crear .=")";   

    if(mysqli_query($c,$crear))
    {
        echo "<h4>Se ha creado la tabla Clientes</h4>";
    }
    else
    {
        echo "La tabla Clientes ya esta creada<br>";
    }

    $crear ="CREATE TABLE IF NOT EXISTS ";
    $crear .="Fiestas";
    $crear .= "("; 
    $crear .="IDFIESTA INT AUTO_INCREMENT,"; 
    $crear .="FECHA varchar(35) ,";
    $crear .="IDANIMADOR INT ,";
    $crear .="DURACION INT ,";
    $crear .="NUMERO INT ,";
    $crear .="TIPOFIESTA VARCHAR(50) ,";
    $crear .="EDADMEDIA INT ,";
    $crear .="IMPORTE INT ,";
    $crear .="IDCLIENTE INT ,"; 
    $crear .="PRIMARY KEY(IDFIESTA) ,";  
    $crear .="FOREIGN KEY (IDANIMADOR) REFERENCES Animadores(IDANIMADOR) ON DELETE CASCADE ON UPDATE CASCADE ,";
    $crear .="FOREIGN KEY (IDCLIENTE) REFERENCES Clientes(IDCLIENTE) ON DELETE CASCADE ON UPDATE CASCADE  ";      
    $crear .=")";  
            
    if(mysqli_query($c,$crear))
    {
        echo "<h4>Se ha creado la tabla Fiestas</h4>";
    }
    else
    {
        if (mysqli_errno($c)==1062)
        {
            echo "<h4>No ha podido añadirse el registro<br>Ya existe un campo con este id</h4>";
        }
        else
        { 
        $numerror=mysqli_errno($c);
        $descrerror=mysqli_error($c);
        echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
        }
    }
    mysqli_close($c);
}

function BBD()
{
    $c = @mysqli_connect("localhost","adminapp","123") or die("No se conecto");

    $p=mysqli_query($c, "SHOW DATABASES");

    $comprueba=0; 

    while ($fila = mysqli_fetch_row($p)) 
    {
        if ("PINATA_FELIZ" == $fila[0]) 
        {
            $comprueba=1; 
        }
    }

    if ($comprueba == 0) 
    {
        if(mysqli_query($c, "DROP DATABASE PINATA_FELIZ"))
        { 
            echo "<h4>Base de datos borrada</h4>"; 
        }
        else
        { 
            echo "<h4>La base de datos ya no existe</h4>"; 
        }
    }
    else
    {
        echo "<h4>La base de datos ya no existe</h4>"; 
    }
    
         

    if (mysqli_close($c)) 
    {
        echo "<h4>Conexion cerrada con exito</h4>";
    }
    else
    {
        echo "<h4>No se ha cerrada la conexión</h4>";
    }
}

function altaCliente()
{
    $Nombre=$_POST['nombre'];
    $Direccion=$_POST['direccion'];
    $email=$_POST['email'];
    $contrasenia=$_POST['contrasenia'];

    $c=mysqli_connect("localhost","usuapp","");

    mysqli_select_db($c, "PINATA_FELIZ");
    
    mysqli_query($c, "INSERT Clientes (NOMBRECLIENTE,DIRECCION,EMAIL,CONTRASENA) VALUES ('$Nombre','$Direccion','$email','$contrasenia')"); 

    if (mysqli_errno($c)==0)
    {
        echo "<h4>Usuario dado de alta</b></H4>";
    }
    else
    {
        if (mysqli_errno($c)==1062)
        {
            echo "<h4>No ha podido añadirse el registro<br>Ya existe un campo con este id</h4>";
        }
        else
        { 
            $numerror=mysqli_errno($c);
            $descrerror=mysqli_error($c);
            echo "Se ha producido un error $numerror que corresponde a: $descrerror  <br>";
        }
    }
    mysqli_close($c); 
}

function altaAnimador()
{
    $id=$_POST['id'];
    $Nombre=$_POST['nombre'];
    $especialidad=$_POST['especialidad'];
    $precio=$_POST['precio'];
    $contrasenia=$_POST['contrasenia'];

    $c=mysqli_connect("localhost","usuapp","");

    mysqli_select_db($c, "PINATA_FELIZ");
    
    mysqli_query($c, "INSERT Animadores (IDANIMADOR,NOMBREANIMADOR,ESPECIALIDAD,PRECIO,CONTRASENA) VALUES ('$id','$Nombre','$especialidad','$precio','$contrasenia')"); 

    if (mysqli_errno($c)==0)
    {
        echo "<h4>Usuario dado de alta</b></H4>";
    }
    else
    {
        if (mysqli_errno($c)==1062)
        {
            echo "<h4>No ha podido añadirse el registro<br>Ya existe un campo con este id</h4>";
        }
        else
        { 
            $numerror=mysqli_errno($c);
            $descrerror=mysqli_error($c);
            echo "Se ha producido un error $numerror que corresponde a: $descrerror  <br>";
        }
    }
    mysqli_close($c); 
}

function bajaAnimador()
{
    $id=$_POST['id'];

    $c=mysqli_connect("localhost","usuapp","");

    mysqli_select_db($c, "PINATA_FELIZ");

    mysqli_query($c, "DELETE FROM Animadores WHERE (IDANIMADOR='$id')");

    if (mysqli_errno($c)==0)
    {
        echo "<h4>Usuario dado de baja</b></H4>";
    }
    else
    {
        if (mysqli_errno($c)==1062)
        {
            echo "<h4>No ha podido borrarse el registro</h4>";
        }
        else
        { 
            $numerror=mysqli_errno($c);
            $descrerror=mysqli_error($c);
            echo "Se ha producido un error $numerror que corresponde a: $descrerror  <br>";
        }
    }

    mysqli_close($c); 
}

function modAnimador()
{
    $id=$_POST['id'];
    $Nombre=$_POST['nombre'];
    $especialidad=$_POST['especialidad'];
    $precio=$_POST['precio'];
    $contrasenia=$_POST['contrasenia'];

    $c=mysqli_connect("localhost","usuapp","");

    mysqli_select_db($c, "PINATA_FELIZ");
    
    $p=mysqli_query($c, "UPDATE Animadores SET NOMBREANIMADOR='$Nombre',ESPECIALIDAD='$especialidad',PRECIO='$precio',CONTRASENA='$contrasenia' WHERE IDANIMADOR='$id'");

    echo "<h4>Proceso de actualización terminado</h4>";
    
    mysqli_close($c); 
}

function TodosAnimadores()
{
    $c=mysqli_connect("localhost","usuapp","");

    mysqli_select_db($c, "PINATA_FELIZ");

    $resultado= mysqli_query($c, "SELECT IDANIMADOR, NOMBREANIMADOR, ESPECIALIDAD, PRECIO FROM Animadores");

        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td>Id del Animador</td>";
        echo "<td>Nombre del animador</td>";
        echo "<td>Especialidad</td>";
        echo "<td>Precio</td>";
        echo "</tr>";

        while ($registro = mysqli_fetch_row($resultado))
        {
        
            echo "<tr>";
    
            foreach($registro  as $clave)
            {
                echo "<td>",$clave,"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    mysqli_close($c);  
}
function misfiestas(){
    if($c=mysqli_connect("localhost","usuapp","","pinata_feliz")){
        $id=$_SESSION['id'];
        $sentencia="SELECT F.IDFIESTA, F.FECHA, F.IDANIMADOR, F.DURACION, F.TIPOFIESTA, F.EDADMEDIA, 
                    F.IMPORTE, C.NOMBRECLIENTE
         FROM FIESTAS F JOIN CLIENTES C ON F.IDCLIENTE = C.IDCLIENTE 
         WHERE F.IDCLIENTE LIKE '$id'";
        if($resultado=mysqli_query($c,$sentencia)){
            ?><table class="table">
                <thead>
                    <tr>
                    <th scope="col">IDFiesta</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Animador</th>
                    <th scope="col">Duracion</th>
                    <th scope="col">Tipo de fiesta</th>
                    <th scope="col">Edad Media</th>
                    <th scope="col">Importe</th>
                    <th scope="col">Cliente</th>
                    </tr>
                </thead><?php
            while ($registro = mysqli_fetch_row($resultado)){
                ?><tbody>
                    <tr><?php
                foreach($registro  as $clave){
                echo "<td>",$clave,"</td>";
                }
                echo "<td><a name='id' method='post' value='$registro[0]' class='nav-link scrollto active' style='width: 100px; height: 50px; border-radius: 2em;' href='index.php?eliminarregistro'>Cancelar</a></td>";
                ?></tr>
                </tbody><?php
            }
        }else{
            echo "No ha sido posible ejecutar la consulta";
        }
    }else{
        echo "No ha sido posible conectarse";
    }
}
function reservar(){
    
    $fecha=$_POST['fecha'];
    $animador=$_POST['animador'];
    $duracion=$_POST['duracion'];
    $tipo=$_POST['tipo'];
    $numero=$_POST['asistentes'];
    $media=$_POST['mediaedad'];
    $id=$_SESSION['id'];
    if($c=mysqli_connect("localhost","usuapp","","pinata_feliz")){
        $sentencia="INSERT INTO FIESTAS (FECHA, IDANIMADOR, DURACION, NUMERO, TIPOFIESTA, EDADMEDIA, IMPORTE, IDCLIENTE)
        SELECT '$fecha', '$animador', '$duracion', '$numero', '$tipo', '$media', precio+200, '$id'
        FROM ANIMADORES
        WHERE IDANIMADOR LIKE '$animador'";
        if($resultado=mysqli_query($c,$sentencia)){
            echo "<h3>Reserva realizada</h3>";
        }else{
            echo "<h3>No ha sido posible realizar la reserva</h3>";
        }
    }else{
        echo "Ha sido imposible conectarse";
    }
}
function eliminarregistro(){
    $id=$_POST['id'];
    echo "<h1>$id</h1>";    /*if($c=mysqli_connect("localhost","usuapp","","pinata_feliz")){
        $sentencia="INSERT INTO FIESTAS (FECHA, IDANIMADOR, DURACION, NUMERO, TIPOFIESTA, EDADMEDIA, IMPORTE, IDCLIENTE)
        SELECT '$fecha', '$animador', '$duracion', '$numero', '$tipo', '$media', precio+200, '$id'
        FROM ANIMADORES
        WHERE IDANIMADOR LIKE '$animador'";
        if($resultado=mysqli_query($c,$sentencia)){
            echo "<h3>Reserva realizada</h3>";
        }else{
            echo "<h3>No ha sido posible realizar la reserva</h3>";
        }
    }else{
        echo "Ha sido imposible conectarse";
    }*/
}
?>