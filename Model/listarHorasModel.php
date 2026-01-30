<?php
class ListarHorasModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Lista as horas do usuário pelo ID
    public function listarHorasPorUsuario($userId)
    {
        $sql = "SELECT 
    id_registro,
    id_user, 
    data, 
    hora_inicio, 
    hora_fim, 
    almoco_saida, 
    almoco_volta,
    criado_em,
    st.status AS Status,
    st.front as Front,
    SEC_TO_TIME(
        TIME_TO_SEC(TIMEDIFF(hora_fim, hora_inicio)) -
        CASE 
            WHEN almoco_saida IS NOT NULL AND almoco_volta IS NOT NULL THEN 
                TIME_TO_SEC(TIMEDIFF(almoco_volta, almoco_saida))
            ELSE 
                0
        END
    ) AS Horas_trabalhadas 
FROM 
    tb_plantao AS hs
INNER JOIN 
    tb_status AS st 
ON 
    hs.fk_status = st.id_status    
WHERE 
    id_user = :id_user 
ORDER BY 
    data ASC;

";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_user', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarContagemHoras($userId)
    {
        $sql = "SELECT Count(*) as Total_Solicitacoes From tb_plantao WHERE id_user = :id_user";
        $query = $this->db->prepare($sql);   
        $query->bindParam(':id_user', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
}


public function listarAprovadas($userId)
    {
        $sql = "SELECT Count(*) as Total_Solicitacoes From tb_plantao WHERE id_user = :id_user and fk_status = 2";
        $query = $this->db->prepare($sql);   
        $query->bindParam(':id_user', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
}

public function listarPendentes($userId)
    {
        $sql = "SELECT Count(*) as Total_Solicitacoes From tb_plantao WHERE id_user = :id_user and fk_status = 1";
        $query = $this->db->prepare($sql);   
        $query->bindParam(':id_user', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
}

public function listarRejeitadas($userId)
    {
        $sql = "SELECT Count(*) as Total_Solicitacoes From tb_plantao WHERE id_user = :id_user and fk_status = 3";
        $query = $this->db->prepare($sql);   
        $query->bindParam(':id_user', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
}

}
