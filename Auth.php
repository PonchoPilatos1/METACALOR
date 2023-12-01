<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "conexion.php";

class Auth extends Conexion{

    #-----------------------------------Usuario--------------------------------------------

    public function registrarUsuario($usuario, $password, $nombre, $edad, $sexo, $peso, $altura, $caloriasMeta, $imc, $puntaje, $kcalMantenimiento)
    {
        $conexion = parent::conectar();
    
        // Verificar si ya existe un usuario con el mismo nombre
        $sqlVerificar = "SELECT usuario FROM usuario WHERE usuario = ?";
        $queryVerificar = $conexion->prepare($sqlVerificar);
        $queryVerificar->bind_param('s', $usuario);
        $queryVerificar->execute();
        $queryVerificar->store_result();
    
        if ($queryVerificar->num_rows > 0) {
            // Ya existe un usuario con el mismo nombre
            return false;
        }
    
        // Si no existe, proceder con la inserción
        $sqlInsertar = "INSERT INTO usuario (usuario, password, nombre, sexo, caloriasMeta, edad, altura, peso, imc, kcalMantenimiento, puntaje) 
                        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $queryInsertar = $conexion->prepare($sqlInsertar);
        $queryInsertar->bind_param('sssssssssss', $usuario, $password, $nombre, $sexo, $caloriasMeta, $edad, $altura, $peso, $imc, $kcalMantenimiento, $puntaje);
        
        // Verificar si la inserción fue exitosa
        $insercionExitosa = $queryInsertar->execute();
    
        // Cerrar las consultas preparadas
        $queryVerificar->close();
        $queryInsertar->close();
    
        return $insercionExitosa;
    }

    public function editarUsuario($id, $usuario, $nombre, $edad, $sexo, $peso, $altura, $caloriasMeta, $imc, $kcalMantenimiento)
    {
        $conexion = parent::conectar();
    
        // Verificar si ya existe un usuario con el nuevo nombre
        $sqlVerificar = "SELECT usuario FROM usuario WHERE usuario = ? AND id <> ?";
        $queryVerificar = $conexion->prepare($sqlVerificar);
        $queryVerificar->bind_param('si', $usuario, $id);
        $queryVerificar->execute();
        $queryVerificar->store_result();
    
        if ($queryVerificar->num_rows > 0) {
            // Ya existe un usuario con el nuevo nombre
            return false;
        }
    
        // Si no existe, proceder con la actualización
        $sql = "UPDATE usuario 
                SET usuario=?, nombre=?, sexo=?, caloriasMeta=?, edad=?, altura=?, peso=?, imc=?, kcalMantenimiento=? 
                WHERE id=?";
        $query = $conexion->prepare($sql);
        $query->bind_param('sssssssssi', $usuario, $nombre, $sexo, $caloriasMeta, $edad, $altura, $peso, $imc, $kcalMantenimiento, $id);
    
        // Verificar si la actualización fue exitosa
        $actualizacionExitosa = $query->execute();
    
        // Cerrar las consultas preparadas
        $queryVerificar->close();
        $query->close();
    
        return $actualizacionExitosa;
    }

    public function UserUsuario($password)
    {
        $conexion = parent::conectar();
        $CurrentUser = $_SESSION['usuario'];
        $sql = "SELECT * FROM administradores WHERE idAdmin = ? and password=?";

        $query = $conexion->prepare($sql);
        $query->bind_param('ss', $CurrentUser, $password);
        $query->execute();

        $resultado = $query->get_result();

        if ($resultado->num_rows > 0) {
            #GetDatos($CurrentUser);
            return $resultado->fetch_assoc();
        } else {
            return null; 
        }
    }

    public function GetReporteDiario($id){
        $conexion = parent::conectar();
        $query = "SELECT * FROM reporte_diario WHERE idusuario='$id'";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado){
            $fila = mysqli_fetch_assoc($resultado);

            if ($fila){
                return $fila;
            } else {
                return 0;
            }
        }
    }

    public function getKcalMantenimiento($id) {
        $conexion = $this->conectar();
    
        $query = "SELECT kcalMantenimiento FROM usuario WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $query);
    
        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
    
            if ($fila) {
                return $fila['kcalMantenimiento'];
            }
        }
    
        return 0;
    }

    #----------------------Alimentos--------------------------

    public function registrarAlimentos()
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO usuario (categoria, Alimento, Cantidad, Unidad, Peso_bruto_g, Peso_neto_g, Energia_kcal, Proteina_g, Lipidos_g, Hidratos_de_carbono_g) 
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        #$query->bind_param('sssssssssss', $categoria, $alimento, $cantidad, $unidad, $peso_bruto_g, $peso_neto_g, $edad, $altura, $imc, $kcalMantenimiento, $puntaje);
        return $query->execute();
    }

    public function buscarAlimentos($busqueda){
        $conexion = parent::conectar();
        $query = "SELECT * FROM alimentos WHERE Alimento LIKE '%$busqueda%'";
        $resultado = mysqli_query($conexion, $query);
    
        // Muestra los resultados
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo $fila['Alimento'] . "<br>";
        }
    }

    public function GetInformacionAlimento($busqueda){
        $conexion = parent::conectar();
        $query = "SELECT * FROM alimentos WHERE Alimento='$busqueda'";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado){
            $fila = mysqli_fetch_assoc($resultado);

            if ($fila){
                return $fila;
            } else {
                return 0;
            }
        }
    }

    public function GetInformacionEjercicio($busqueda){
        $conexion = parent::conectar();
        $query = "SELECT * FROM ejercicios WHERE nombreActividad='$busqueda'";
        $resultado = mysqli_query($conexion, $query);
    
        if ($resultado){
            $fila = mysqli_fetch_assoc($resultado);
    
            if ($fila){
                return $fila;
            } else {
                return false; 
            }
        } else {
            return false; 
        }
    }

    public function GetInformacionUsuario($id){
        $conexion = parent::conectar();
        $query = "SELECT * FROM usuario WHERE id='$id'";
        $resultado = mysqli_query($conexion, $query);
    
        if ($resultado){
            $fila = mysqli_fetch_assoc($resultado);
    
            if ($fila){
                return $fila;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    #---------------------------------------------------------------------------------------
    public function getTop50Usuarios() {
        $conexion = $this->conectar();
    
        $sql = "SELECT nombre, puntaje FROM usuario ORDER BY puntaje DESC LIMIT 50";
    
        $query = $conexion->query($sql);
    
        if ($query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        } else {
            return array(); 
        }
    }

    public function getPosicionUsuario($id) {
        $conexion = $this->conectar();
    
        try {
            $sql = "SELECT id, RANK() OVER (ORDER BY puntaje DESC) as posicion FROM usuario";
    
            $query = $conexion->query($sql);
    
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    if ($row['id'] == $id) {
                        return $row['posicion'];
                    }
                }
            }
    
            return false;
        } catch (Exception $e) {

            echo 'Error en la consulta: ' . $e->getMessage();
        } finally {

            $conexion->close();
        }
    }
    

    public function getPosicionPuntajeUsuario($id) {
        $conexion = $this->conectar();
    
        try {
            $sql = "SELECT DENSE_RANK() OVER (ORDER BY puntaje DESC) as posicion, puntaje FROM usuario WHERE id = ? LIMIT 1";
    
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $id);
            $query->execute();
            $query->store_result();
    
            if ($query->num_rows > 0) {
                $query->bind_result($posicion, $puntaje);
                $query->fetch();
                return ['posicion' => $posicion, 'puntaje' => $puntaje];
            } else {
                return false;
            }
        } catch (Exception $e) {

            echo 'Error en la consulta: ' . $e->getMessage();
        } finally {

            $conexion->close();
        }
    }
    

    #------------------Si deseamos 
    public function verificarCredenciales($correo, $contrasena) {
        $conexion = $this->conectar(); 
        
        $sql = "SELECT id, usuario, password FROM usuario WHERE usuario = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $correo);
        $query->execute();
        
        $resultado = $query->get_result();
        
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $id = $row['id'];
            $nombre = $row['usuario'];
            $hashContraseña = $row['password'];
    
            if (password_verify($contrasena, $hashContraseña)) {
                return array($id, $nombre);
            } else {
                return "0";
            }
        } else {
            return "3";
        }
    }

    #-------------------Reporte diario----------------------

    public function ActualizarReporteDiario($usuario, $calorias, $proteina, $lipidos, $carbohidratos) {
        $conexion = $this->conectar();
    
        $sql_select = "SELECT kcalconsumidas, proteina, lipidos, carbohidratos FROM reporte_diario WHERE idusuario = '$usuario'";
        $resultado = $conexion->query($sql_select);

        $sql_puntaje = "SELECT puntaje FROM usuario WHERE id = '$usuario'";
        $resultado_puntaje = $conexion->query($sql_puntaje);
    
        if ($resultado_puntaje->num_rows > 0) {
            $fila_puntaje = $resultado_puntaje->fetch_assoc();
            $puntaje_actual = $fila_puntaje['puntaje'];

            $nuevo_puntaje = $puntaje_actual + 5;

            $sql_update_puntaje = "UPDATE usuario SET puntaje = '$nuevo_puntaje' WHERE id = '$usuario'";
            $query_update_puntaje = $conexion->query($sql_update_puntaje);
    
            if (!$query_update_puntaje) {
                echo "Error al actualizar el puntaje en la tabla usuario: " . $conexion->error;
            }
        } else {
            echo "No se encontraron resultados para el usuario con ID: $usuario";
        }
    
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
    
            $nuevas_calorias = $fila['kcalconsumidas'] + $calorias;
            $nueva_proteina = $fila['proteina'] + $proteina;
            $nuevos_lipidos = $fila['lipidos'] + $lipidos;
            $nuevos_carbohidratos = $fila['carbohidratos'] + $carbohidratos;
    
            $sql_update = "UPDATE reporte_diario SET kcalconsumidas = '$nuevas_calorias', proteina = '$nueva_proteina', carbohidratos = '$nuevos_carbohidratos', lipidos = '$nuevos_lipidos' WHERE idusuario = '$usuario'";
            $query = $conexion->query($sql_update);
    
            if (!$query) {

                echo "Error al actualizar la base de datos: " . $conexion->error;
            }
        } else {

            echo "No se encontraron resultados para el usuario con ID: $usuario";
        }
    

        $conexion->close();
    }

    public function ActualizarReporteDiarioCAL($usuario, $Cal) {
        $conexion = $this->conectar();

        $sql_select = "SELECT kcalgastadas FROM reporte_diario WHERE idusuario = '$usuario'";
        $resultado = $conexion->query($sql_select);

        $sql_puntaje = "SELECT puntaje FROM usuario WHERE id = '$usuario'";
        $resultado_puntaje = $conexion->query($sql_puntaje);
    
        if ($resultado_puntaje->num_rows > 0) {
            $fila_puntaje = $resultado_puntaje->fetch_assoc();
            $puntaje_actual = $fila_puntaje['puntaje'];

            $nuevo_puntaje = $puntaje_actual + 10;
    
            $sql_update_puntaje = "UPDATE usuario SET puntaje = '$nuevo_puntaje' WHERE id = '$usuario'";
            $query_update_puntaje = $conexion->query($sql_update_puntaje);
    
            if (!$query_update_puntaje) {
                echo "Error al actualizar el puntaje en la tabla usuario: " . $conexion->error;
            }
        } else {
            echo "No se encontraron resultados para el usuario con ID: $usuario";
        }

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();

            $nuevas_cal_gastadas = $fila['kcalgastadas'] + $Cal;
    
            $sql_update = "UPDATE reporte_diario SET kcalgastadas = '$nuevas_cal_gastadas' WHERE idusuario = '$usuario'";
            $query = $conexion->query($sql_update);
    
            if (!$query) {

                echo "Error al actualizar la base de datos: " . $conexion->error;
            }
        } else {

            echo "No se encontraron resultados para el usuario con ID: $usuario";
        }
    

        $conexion->close();
    }
    
}   
?>
