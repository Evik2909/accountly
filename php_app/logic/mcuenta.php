<?php 
class Mcue{
    //ATRIBUTOS
    private $idcue;
    private $idusu;
    private $tipo;
    private $nomcue;
    private $acceso;
    private $clave;

    //GETTERS
    public function getIdcue(){
        return $this->idcue;
    }
    public function getIdusu(){
        return $this->idusu;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getNomcue(){
        return $this->nomcue;
    }
    public function getAcceso(){
        return $this->acceso;
    }
    public function getClave(){
        return $this->clave;
    }

    //SETTERS
    public function SetIdcue($idcue){
        $this->idcue = $idcue;
    }
    public function SetIdusu($idusu){
        $this->idusu = $idusu;
    }
    public function SetTipo($tipo){
        $this->tipo = $tipo;
    }
    public function SetNomcue($nomcue){
        $this->nomcue = $nomcue;
    }
    public function SetAcceso($acceso){
        $this->acceso = $acceso;
    }
    public function SetClave($clave){
        $this->clave = $clave;
    }

    //METODOS Y FUNCIONES CRUD
    public function getAll(){
        $res=NULL;
        $sql="SELECT c.idcue, c.idusu, c.tipo, c.nomcue, c.acceso, c.clave, t.idtip, t.nomtip, t.valor FROM cuenta AS c INNER JOIN tipo AS t ON c.tipo=t.idtip";
        $modelo = new Conexion;
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getOne(){
        $res=NULL;
        $sql="SELECT c.idcue, c.idusu, c.tipo, c.nomcue, c.acceso, c.clave, t.idtip, t.nomtip, t.valor FROM cuenta AS c INNER JOIN tipo AS t ON c.tipo=t.idtip WHERE c.idcue=:idcue";
        $modelo = new Conexion;
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idcue = $this->getIdcue();
        $result->bindParam(":idcue", $idcue);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    public function save(){
        $sql="INSERT INTO cuenta(idusu, tipo, nomcue, acceso, clave) VALUES (:idusu, :tipo, :nomcue, :acceso, :clave)";
        $modelo = new Conexion;
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idusu = $this->getIdusu();
        $result->bindParam(":idusu", $idusu);
        $tipo = $this->getTipo();
        $result->bindParam(":tipo", $tipo);
        $nomcue = $this->getNomcue();
        $result->bindParam(":nomcue", $nomcue);
        $acceso = $this->getAcceso();
        $result->bindParam(":acceso", $acceso);
        $clave = $this->getClave();
        $result->bindParam(":clave", $clave);
        $result->execute();
    }
    public function edit(){
        $sql="UPDATE cuenta SET idusu=:idusu, tipo=:tipo, nomcue=:nomcue ,acceso= :acceso, clave= :clave WHERE idcue= :idcue";
        $modelo = new Conexion;
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idcue = $this->getIdcue();
        $result->bindParam(":idcue", $idcue);
        $idusu = $this->getIdusu();
        $result->bindParam(":idusu", $idusu);
        $tipo = $this->getTipo();
        $result->bindParam(":tipo", $tipo);
        $nomcue = $this->getNomcue();
        $result->bindParam(":nomcue", $nomcue);
        $acceso = $this->getAcceso();
        $result->bindParam(":acceso", $acceso);
        $clave = $this->getClave();
        $result->bindParam(":clave", $clave);
        $result->execute();
    }
    public function delete(){
        $sql="DELETE FROM cuenta WHERE idcue= :idcue";
        $modelo = new Conexion;
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idcue = $this->getIdcue();
        $result->bindParam(":idcue", $idcue);
        $result->execute();
    }
    public function getCategoria(){
        $res=NULL;
        $sql="SELECT idtip, nomtip, valor FROM tipo";
        $modelo = new Conexion;
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
}
?>