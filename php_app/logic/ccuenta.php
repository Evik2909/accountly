<?php 
    include('mcuenta.php');

    $idcue = isset($_REQUEST['idcue']) ? $_REQUEST['idcue']:NULL;
    $idusu = isset($_REQUEST['idusu']) ? $_REQUEST['idusu']:NULL;
    $tipo = isset($_REQUEST['tipo']) ? $_REQUEST['tipo']:NULL;
    $nomcue = isset($_REQUEST['nomcue']) ? $_REQUEST['nomcue']:NULL;
    $acceso = isset($_REQUEST['acceso']) ? $_REQUEST['acceso']:NULL;
    $clave = isset($_REQUEST['clave']) ? $_REQUEST['clave']:NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $mcue = new Mcue();
    $mcue->setIdcue($idcue);

    if ($ope=="save") {
        $mcue->SetIdusu($idusu);
        $mcue->SetTipo($tipo);
        $mcue->SetNomcue($nomcue);
        $mcue->SetAcceso($acceso);
        $mcue->SetClave($clave);
        if($idcue){
            $mcue->edit();
        }else{
            $mcue->save();
        }
    }
    if($ope=="del" && $idcue)$mcue->delete();
    if($ope=="edi" && $idcue){
        $dtOne = $mcue->getOne();
    }else{
        $dtOne = NULL;
    }

    $dtAll = $mcue->getAll();
    $dtCat = $mcue->getCategoria();
?>