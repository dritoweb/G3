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

        mysqli_select_db($c, "PIÑATA_FELIZ");

        $resultado= mysqli_query($c, "SELECT NOMBRECLIENTE FROM Clientes WHERE (NOMBRECLIENTE='$nombre' AND CONTRASEÑA='$contrasenia')");

        $numero=mysqli_num_rows($resultado);
        
        $resultado2= mysqli_query($c, "SELECT NOMBREANIMADOR FROM Animadores WHERE (NOMBREANIMADOR='$nombre' AND CONTRASEÑA='$contrasenia')");

        $numero2=mysqli_num_rows($resultado);

        if ($numero == 1) 
        {
            while ($registro = mysqli_fetch_row($resultado))
            {
    
                foreach($registro  as $clave)
                {
                    $_SESSION['usuario'] = $clave;
                }
            }
            header("Location:index.php");
        }
        elseif ($numero2 == 1) 
        {
            while ($registro = mysqli_fetch_row($resultado2))
            {
    
                foreach($registro  as $clave)
                {
                    $_SESSION['usuario'] = $clave;
                }
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

    if(mysqli_query($c, "CREATE DATABASE PIÑATA_FELIZ "))
    { 
        echo "<h4>Base de datos creada</h4>"; 
    }
    else
    { 
        echo "<h4>La base de datos ya esta creada</h4>"; 
    }

    mysqli_select_db ($c,"PIÑATA_FELIZ"); 

    $crear ="CREATE TABLE IF NOT EXISTS ";
    $crear .="Animadores";
    $crear .= "("; 
    $crear .="IDANIMADOR INT ,"; 
    $crear .="NOMBREANIMADOR VARCHAR(50) ,";
    $crear .="ESPECIALIDAD VARCHAR(50) ,";
    $crear .="CONTRASEÑA VARCHAR(50) ,";  
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
    $crear .="CONTRASEÑA VARCHAR(50) ,";  
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
    $crear .="FECHA DATE ,";
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
        if ("PIÑATA_FELIZ" == $fila[0]) 
        {
            $comprueba=1; 
        }
    }

    if ($comprueba == 0) 
    {
        if(mysqli_query($c, "DROP DATABASE PIÑATA_FELIZ"))
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

    mysqli_select_db($c, "PIÑATA_FELIZ");
    
    mysqli_query($c, "INSERT Clientes (NOMBRECLIENTE,DIRECCION,EMAIL,CONTRASEÑA) VALUES ('$Nombre','$Direccion','$email','$contrasenia')"); 

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

    mysqli_select_db($c, "PIÑATA_FELIZ");
    
    mysqli_query($c, "INSERT Animadores (IDANIMADOR,NOMBREANIMADOR,ESPECIALIDAD,PRECIO,CONTRASEÑA) VALUES ('$id','$Nombre','$especialidad','$precio','$contrasenia')"); 

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

    mysqli_select_db($c, "PIÑATA_FELIZ");

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

    mysqli_select_db($c, "PIÑATA_FELIZ");
    
    $p=mysqli_query($c, "UPDATE Animadores SET NOMBREANIMADOR='$Nombre',ESPECIALIDAD='$especialidad',PRECIO='$precio',CONTRASEÑA='$contrasenia' WHERE IDANIMADOR='$id'");

    echo "<h4>Proceso de actualización terminado</h4>";
    
    mysqli_close($c); 
}

function TodosAnimadores()
{
    $c=mysqli_connect("localhost","usuapp","");

    mysqli_select_db($c, "PIÑATA_FELIZ");

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

?>