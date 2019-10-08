<?php

include('conexion.php');

if(isset($_POST["boton"])){
    
    $nro = $_POST["nro"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    if($_FILES["imagen"]["error"] > 0){
            echo "Error: " . $_FILES["imagen"]["error"] . "<br />";
        } else {
            $fileName = $nombre . "." . end(explode(".", $_FILES["imagen"]["name"]));

            if(file_exists("recursos/upload/" . $fileName)){
                echo $fileName . " ya existe. ";
            } else {
                move_uploaded_file($_FILES["imagen"]["tmp_name"],
                "recursos/upload/" . $fileName );
            }
        }
 
    $conn = getConexion();
    
    $sql = "Insert into pokemon (nro, nombre, tipo, img) values ($nro, '". $nombre ."', $tipo, '". $fileName ."')" ;
    $result = mysqli_query($conn, $sql);

    header("location: index.php"); 
}

if(isset($_GET['nro'])){
    
    $eliminaNro = $_GET["nro"];
    
    $conn = getConexion();
    
    $sql = "SELECT img FROM pokemon WHERE nro = $eliminaNro";
    $result = mysqli_query($conn, $sql);
    $img = mysqli_fetch_assoc($result);

    unlink("recursos/upload/". $img['img']);

    $sql = "DELETE FROM pokemon WHERE nro = $eliminaNro" ;
    $result = mysqli_query($conn, $sql);
    
    header("location: index.php");
}

if(isset($_POST["actualizar"])){
    $nro = $_POST["nro"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];

    $conn = getConexion();
    
    $sql = "update pokemon set nombre = '". $nombre ."', tipo = $tipo where nro = $nro" ;
    $result = mysqli_query($conn, $sql);
    header("location: index.php");
}



function getPokemonsAsArray($filtro = '*'){       
        $conn = getConexion();
        
        $sql = "SELECT p.nro, p.nombre, t.descripcion tipo, p.img FROM pokemon p JOIN tipo t ON p.tipo = t.id";
        
        if($filtro != '*' && $filtro != '' ){
            $sql = $sql . " WHERE nombre like '%" . $filtro . "%'";
        }
        $result = mysqli_query($conn, $sql);
        
        
        $listaPokemons = Array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $pokemon = Array();
                $pokemon['nro'] = $row['nro'];
                $pokemon['nombre'] = $row['nombre'];
                $pokemon['tipo'] = $row['tipo'];
                $pokemon['img'] = $row['img'];
                $listaPokemons[] = $pokemon;
            }
        }
    
    
        mysqli_close($conn);


        return $listaPokemons;
    }

function getTipos(){       
        $conn = getConexion();
        
        $sql = "SELECT * FROM tipo";
        $result = mysqli_query($conn, $sql);
        
        
        $tipos = Array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $tipo = Array();
                $tipo['id'] = $row['id'];
                $tipo['descripcion'] = $row['descripcion'];
                $tipos[] = $tipo;
            }
        }
    
    
        mysqli_close($conn);


        return $tipos;
    }

?>