<?php

require_once "../Controller/config.php";
class UserModel {
    private $conexao;

    public function __construct($conexao) {
         $this->conexao = $conexao;
    }

    public function getUserByEmail($email) {
        $query = $this->conexao->prepare("SELECT * FROM tb_users WHERE user_email = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Adicione métodos adicionais conforme necessário.
}
?>