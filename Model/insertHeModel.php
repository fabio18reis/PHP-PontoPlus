<?php

require_once "../controller/config.php";

class InsertHoraModel
{
    private $db;

    public function __construct($conexao)
    {
        $this->db = $conexao;
       
    }

    public function inserirRegistroHe($dados, $id_user)
    {
        $sql = "INSERT INTO tb_he
            (inicio_he, fim_he, hora_inicio, hora_fim, almoco_saida, almoco_volta)
            VALUES 
            (:id_user, :data, :hora_inicio, :hora_fim, :almoco_saida, :almoco_volta)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':data', $dados['data'], PDO::PARAM_STR);
        $stmt->bindParam(':hora_inicio', $dados['inicio'], PDO::PARAM_STR);
        $stmt->bindParam(':hora_fim', $dados['fim'], PDO::PARAM_STR);
        $stmt->bindParam(':almoco_saida', $dados['almoco'], PDO::PARAM_STR);
        $stmt->bindParam(':almoco_volta', $dados['volta_almoco'], PDO::PARAM_STR);

        return $stmt->execute();
    }
}