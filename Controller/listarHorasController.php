<?php
// listarHorasController.php

require_once "../Model/listarHorasModel.php";
require_once "config.php";

class ListarHorasController
{

    public function __construct(
        private ListarHorasModel $model
    ){}

    public function listarHoras(int $userId): array
    {
        try{
            return $this->model->listarHorasPorUsuario($userId) ?? [];
        } catch (Exception $e) {
            log::error("Erro ao listar horas: " . $e->getMessage());
            return [];
        }
    }

    public function contarHoras(int $userId): array
    {
        try{
            return $this->model->listarContagemHoras($userId) ?? [];
        } catch (Exception $e) {
            log::error("Erro ao contar horas: " . $e->getMessage());
            return [];
        }
    }


    public function pendentes(int $userId): array
    {
      try{
         return $this->model->listarPendentes($userId) ?? [];
            }catch (Exception $e){
                  log::error("Erro ao listar solicitações pendentes: " . $e->getMessage());
            return [];
        }

    }


public function aprovadas(int $userId): array
    {
      try{
         return $this->model->listarAprovadas($userId) ?? [];
            }catch (Exception $e){
                  log::error("Erro ao listar solicitações aprovadas: " . $e->getMessage());
            return [];
        }

    }

public function rejeitadas(int $userId): array
{
    try {
        return $this -> model->listarRejeitadas($userId) ?? [];
    }catch(Exception $e){
        log::error("Erro ao listar solicitações rejeitadas: " . $e->getMessage());
        return [];
    }
}

}


$userId = $_SESSION['user_id'] ?? null;
$controller = new ListarHorasController(new ListarHorasModel($conexao));
$dados = [
    'horasUser' => $controller->listarHoras($userId),
    'contagemHoras' => $controller->contarHoras($userId),
    'aprovadas' => $controller->aprovadas($userId),
    'pendentes' => $controller->pendentes($userId),
    'rejeitadas' => $controller->rejeitadas($userId)
];