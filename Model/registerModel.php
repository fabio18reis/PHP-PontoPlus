
<?php
// RegistroModel.php

require_once "../controller/config.php";

class RegistroModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
        $this->criarTabelaSeNaoExistir();
    }

    private function criarTabelaSeNaoExistir() {
        $sql = "CREATE TABLE IF NOT EXISTS tb_users (
            id_user INT(11) NOT NULL AUTO_INCREMENT,
            user_name VARCHAR(110) NOT NULL,
            user_email VARCHAR(110) NOT NULL,
            user_password VARCHAR(110) NOT NULL,
            PRIMARY KEY (id_user)
        ) COLLATE='utf8mb4_0900_ai_ci';";
        $this->db->exec($sql);
    }

    public function manipularRegistro($dadosPost) {
        // Consulta para verificar se o email já existe
        $consultaEmail = $this->db->prepare("SELECT * FROM tb_users WHERE user_email = :email");
        $consultaEmail->bindParam(':email', $dadosPost['email'], PDO::PARAM_STR);
        $consultaEmail->execute();

        if ($consultaEmail->rowCount() > 0) {
            // O email já existe, retorne uma mensagem de erro
            return "Este email já foi cadastrado. Tente com outro.";
        } elseif ($dadosPost['password'] == $dadosPost['confirm_password']) {
            // A senha foi confirmada e o email não existe, então prossiga com a inserção no banco de dados
            $senhaHash = password_hash($dadosPost['password'], PASSWORD_DEFAULT);

            $inserirQuery = "INSERT INTO tb_users (user_name, user_email, user_password) 
                             VALUES (:nome, :email, :senha)";

            $inserirInstrucao = $this->db->prepare($inserirQuery);
            $inserirInstrucao->bindParam(':nome', $dadosPost['name'], PDO::PARAM_STR);
            $inserirInstrucao->bindParam(':email', $dadosPost['email'], PDO::PARAM_STR);
            $inserirInstrucao->bindParam(':senha', $senhaHash, PDO::PARAM_STR);           
            $inserirInstrucao->execute();

            if ($inserirInstrucao->rowCount() > 0) {
                // Cadastro bem-sucedido, retorne uma mensagem de sucesso
                return "Usuário Cadastrado com Sucesso!";
            } else {
                // Erro na inserção, retorne uma mensagem de erro
                return "Erro ao Inserir os Dados!";
            }
        } else {
            // Senhas não coincidem, retorne uma mensagem de erro
            return "Senhas não coincidem";
        }
    }
}