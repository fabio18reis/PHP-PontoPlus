<?php

require_once "../Controller/config.php";

Class ListarUsuarioModel{

 public function __construct(private $conexao){}

    public function listarUsuarios(): array{
        try{
            $sql = "SELECT user_name, user_email, t.team_name AS user_equipe, p.position_name as user_cargo FROM tb_users as u
            Left Join tb_team as t ON u.id_team = t.id_team
            Left Join tb_position as p ON u.id_position = p.id_position";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (Exception $e){
           error_log("Erro ao listar usuários: " . $e->getMessage());
            return [];
        }
    }

}

?>