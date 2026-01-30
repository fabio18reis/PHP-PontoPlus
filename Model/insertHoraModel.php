<?php

require_once "../controller/config.php";

class InsertHoraModel
{
    private $db;

    public function __construct($conexao)
    {
        $this->db = $conexao;
        $this->criarTabelaSeNaoExistir();
    }

    private function criarTabelaSeNaoExistir()
    {
        $sql = "CREATE TABLE IF NOT EXISTS tb_plantao (
            id_registro INT(11) NOT NULL AUTO_INCREMENT,
            id_user INT(11) NOT NULL,
            data DATE NOT NULL,
            hora_inicio TIME NOT NULL,
            hora_fim TIME NOT NULL,
            almoco_saida TIME NOT NULL,
            almoco_volta TIME NOT NULL,
            criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id_registro),
            FOREIGN KEY (id_user) REFERENCES tb_users(id_user)
        )";
        $this->db->exec($sql);
    }

    public function inserirRegistro($dados, $id_user)
    {
        $sql = "INSERT INTO tb_plantao 
            (id_user, data, hora_inicio, hora_fim, almoco_saida, almoco_volta)
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