<?php 
    require_once('conexion.php');
    $user = isset($_POST['cedula']) ? $_POST['cedula']:NULL;
    $pass = isset($_POST['contraseña']) ? $_POST['contraseña']:NULL;
    
    
    if($user && $pass){
        logs($user, $pass);
    }else{
        reg();
    }

    function logs($us, $ps){
        $crd = info($us, $ps);
        $crd = isset($crd) ? $crd:NULL;
        if($crd){
            session_start();
            $_SESSION['idusu'] = $crd[0]['idusu'];
            $_SESSION['nombre'] = $crd[0]['nombre'];
            $_SESSION['documento'] = $crd[0]['documento'];
            echo "<script>window.location='../home.php';</script>";
        }else{
            reg();
        }    
    }
    function reg(){
        echo "<script>alert('Ha ocurrido un error, su usuario o contraseña no es correcto. Intente ingresar de nuevo')</script>";
        echo "<script>window.location='../index.php';</script>";
    }
    
    function info($us, $ps){
        $res=NULL;
        $con=sha1(md5($ps));
        $sql="SELECT idusu, nombre, documento  FROM usuario WHERE documento=:user AND contraseña=:pass";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':user', $us);
        $result->bindParam(':pass', $con);
        $result->execute();
        $res=$result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
?>