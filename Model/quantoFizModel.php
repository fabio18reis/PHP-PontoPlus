<?php
class QuantoFizModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Retorna quanto um usuário específico fez por dia, considerando o valor da hora padrão e descontando o horário de almoço.
     * @param int $userId O ID do usuário.
     * @return array
     */
    public function getGanhosPorDia($userId)
    {
        $sql = "
           SELECT 
    u.id_user AS user_id,
    u.user_name AS user_nome,
    r.data,
    SUM(
        TIME_TO_SEC(TIMEDIFF(r.hora_fim, r.hora_inicio)) - 
        CASE 
            WHEN r.almoco_saida IS NOT NULL AND r.almoco_volta IS NOT NULL THEN 
                TIME_TO_SEC(TIMEDIFF(r.almoco_volta, r.almoco_saida))
            ELSE 
                0
        END
    ) / 3600 AS horas_trabalhadas,
    vh.valor_hora AS valor_hora,
    ROUND(
        SUM(
            TIME_TO_SEC(TIMEDIFF(r.hora_fim, r.hora_inicio)) - 
            CASE 
                WHEN r.almoco_saida IS NOT NULL AND r.almoco_volta IS NOT NULL THEN 
                    TIME_TO_SEC(TIMEDIFF(r.almoco_volta, r.almoco_saida))
                ELSE 
                    0
            END
        ) / 3600 * vh.valor_hora, 2
    ) AS total_ganho,
    ROUND(
        SUM(
            SUM(
                TIME_TO_SEC(TIMEDIFF(r.hora_fim, r.hora_inicio)) - 
                CASE 
                    WHEN r.almoco_saida IS NOT NULL AND r.almoco_volta IS NOT NULL THEN 
                        TIME_TO_SEC(TIMEDIFF(r.almoco_volta, r.almoco_saida))
                    ELSE 
                        0
                END
            ) / 3600 * vh.valor_hora
        ) OVER (PARTITION BY u.id_user), 2
    ) AS Total_Geral
FROM 
    tb_users u
INNER JOIN 
    tb_plantao r ON r.id_user = u.id_user
INNER JOIN
    tb_valor_hora vh ON vh.fk_idusuario = u.id_user
WHERE 
    u.id_user = :user_id
GROUP BY 
    u.id_user, u.user_name, r.data, vh.valor_hora
ORDER BY 
    r.data DESC;

        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
