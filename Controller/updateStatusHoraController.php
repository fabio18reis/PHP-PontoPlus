<?php
session_start();
require_once "../Model/updateHoraModel.php";
require_once "config.php";

Class Hora {

public function __construct(private updateHoraModel $model) {}


public function updateStatusPlantao(int $idplantao, int $statusplantao){

try{
    $result = $this->model->updateHoraById($idplantao,$statusplantao);
}catch (Exception $e){
    error_log('Erro ao realizar update na base:' .$e-> getMessage(), $e->getCode());
    return [];
}
}
}


$idPlantao = $_POST['hora_id'] ?? null;
$status    = $_POST['status'] ?? null;
$acao      = $_POST['acao'] ?? null;

if (!$idPlantao) {
    echo "ID do plantão não fornecido.";
    exit;
}

if ($status !== null) {

    if (!in_array($status, ['2', '3'], true)) {
        header('Location: ../View/erro.php');
        exit;
    }

   $controller = new Hora((new updateHoraModel($conexao)));
   $controller->updateStatusPlantao((int)$idPlantao, (int)$status);

    header('Location: ../View/home.php');
    exit;
}