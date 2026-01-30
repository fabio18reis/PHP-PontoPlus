<?php
// listarHorasController.php

require_once "../Model/quantoFizModel.php";
require_once "config.php";

class ListarGanhosController
{
    private $model;

    public function __construct($conexao)
    {
        $this->model = new QuantoFizModel($conexao);
    }

    public function listarGanhos($userId)
    {

        try {
            $ganhos = $this->model->getGanhosPorDia($userId);
            if (!empty($ganhos)) {
                return $ganhos;
            } else {
                return $ganhos = [];
            }
        } catch (Exception $e) {
            echo "Erro ao listar seus ganhos: " . $e->getMessage();
            return [];
        }
    }
}


$userId = $_SESSION['user_id'] ?? null;
// Execução do controller
$controller = new ListarGanhosController($conexao);
$ganhos = $controller->listarGanhos($userId);
