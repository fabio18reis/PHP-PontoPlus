<?php

require_once "../Controller/config.php";

Class updateHoraModel{

 public function __construct(private $conexao){}

    public function updateHoraById(int $idregistro, int $idstatus): bool{
        try{
            $sql = "UPDATE tb_plantao 
            SET fk_status = :id_status
            WHERE id_registro = :id_registro";
            $stmt = $this->conexao->prepare($sql);
           $stmt->bindParam(':id_status', $idstatus, PDO::PARAM_INT);
            $stmt->bindParam(':id_registro', $idregistro, PDO::PARAM_INT);
           return $stmt->execute();
            
        } catch (Exception $e){
           var_dump("Erro ao atualizar hora: " . $e->getMessage());
            return false;
        }
    }

}

?>  