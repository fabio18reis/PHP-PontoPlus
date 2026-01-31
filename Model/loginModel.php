<?php

require_once "../Controller/config.php";
class UserModel {

public function __construct(private $conexao) {}

    public function getUserByEmail(string $email): ?array{
        try{
        $sql = "SELECT * FROM tb_users WHERE user_email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
        } catch (Exception $e){
            error_log("Erro ao buscar usuário por email: " . $e->getMessage());
            return null;
        }
    }
    // Adicione métodos adicionais conforme necessário.
}
?>