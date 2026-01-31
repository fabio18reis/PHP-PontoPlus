<?php

require_once "../Controller/config.php";

Class ListarUsuarioModel{

 public function __construct(private $conexao){}

    public function listarUsuarios(): array{
        try{
            $sql = "
SELECT 
    u.user_name,
    u.user_email,
    t.title AS user_equipe,
    p.description AS user_cargo
FROM tb_users AS u
LEFT JOIN tb_team AS t ON u.user_team = t.id_team
Left JOIN tb_position AS p ON u.user_position = p.id_position
Order by u.user_name asc
";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (Exception $e){
           var_dump("Erro ao listar usuários: " . $e->getMessage());
            return [];
        }
    }

}

?>