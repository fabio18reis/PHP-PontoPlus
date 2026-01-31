<?php

require_once "../Model/listarUsuarioModel.php";
require_once "config.php";

Class ListarUsuariosController{

public function __construct(
    private ListarUsuarioModel $model
){}

    public function listarUsuarios():array{
        try{
            return $this->model->listarUsuarios() ?? [];
        }catch (Exception $e)
        {
            log::error("Erro ao listar usuários: " . $e->getMessage());
            return [];
        }
    }
}


 $controller = new ListarUsuariosController(new ListarUsuarioModel($conexao));
 $usuarios = $controller->listarUsuarios();
 
?>