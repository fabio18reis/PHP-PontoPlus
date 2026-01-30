<?php
// listarHorasController.php

require_once "../Model/listarHorasModel.php";
require_once "config.php";

class ListarHorasController
{
    private $model;

    public function __construct($conexao)
    {
        $this->model = new ListarHorasModel($conexao);
    }

    public function listarHoras($userId)
    {

        try {
            $horas = $this->model->listarHorasPorUsuario($userId);
            if (!empty($horas)) {
                return $horas;
            } else {
                return $horas = [];
            }
        } catch (Exception $e) {
            echo "Erro ao listar horas: " . $e->getMessage();
            return [];
        }
    }

    public function contarHoras($userId)
    {
        try {
            $contagem = $this->model->listarContagemHoras($userId);
            if (!empty($contagem)) {
                return $contagem;
            } else {
                return $contagem = [];
            }
        } catch (Exception $e) {
            echo "Erro ao retornar horas: " . $e->getMessage();
            return [];
        }
    }



    public function Pendentes($userId)
    {
        try {
            $contagem = $this->model->listarPendentes($userId);
            if (!empty($contagem)) {
                return $contagem;
            } else {
                return $contagem = [];
            }
        } catch (Exception $e) {
            echo "Erro ao retornar horas: " . $e->getMessage();
            return [];
        }
    }

 public function Aprovadas($userId)
    {
        try {
            $contagem = $this->model->listarAprovadas($userId);
            if (!empty($contagem)) {
                return $contagem;
            } else {
                return $contagem = [];
            }
        } catch (Exception $e) {
            echo "Erro ao retornar horas: " . $e->getMessage();
            return [];
        }
    }


     public function Rejeitadas($userId)
    {
        try {
            $contagem = $this->model->listarRejeitadas($userId);
            if (!empty($contagem)) {
                return $contagem;
            } else {
                return $contagem = [];
            }
        } catch (Exception $e) {
            echo "Erro ao retornar horas: " . $e->getMessage();
            return [];
        }
    }

}


$userId = $_SESSION['user_id'] ?? null;
// Execução do controller
$controller = new ListarHorasController($conexao);
$horasUser = $controller->listarHoras($userId);
$contagemHoras = $controller->contarHoras($userId);
$aprovadas = $controller->Aprovadas($userId);
$pendentes = $controller->Pendentes($userId);   
$rejeitadas = $controller->Rejeitadas($userId);
