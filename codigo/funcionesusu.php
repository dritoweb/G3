<?php
function misfiestas(){
    if($c=mysqli_connect("localhost","usuario","usuario","pinata_feliz")){
        $id=$_SESSION['id'];
        $sentencia="SELECT idfiesta,fecha,especialidad,duracion,tipodefiesta,edadmedia,importe,cliente FROM FIESTAS WHERE IDCLIENTE LIKE '$id'";
        if($resultado=mysqli_query($c,$sentencia)){
            ?><table class="table">
                <thead>
                    <tr>
                    <th scope="col">IDFiesta</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Especialidad</th>
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
    $importe="";
    $id=$_SESSION['id'];
}
?>