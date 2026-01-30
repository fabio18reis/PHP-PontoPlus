-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para dbo_ponto
CREATE DATABASE IF NOT EXISTS `dbo_ponto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbo_ponto`;

-- Copiando estrutura para tabela dbo_ponto.tb_he
CREATE TABLE IF NOT EXISTS `tb_he` (
  `id_reg_He` int NOT NULL AUTO_INCREMENT,
  `inicio_he` time DEFAULT NULL,
  `fim_he` time DEFAULT NULL,
  `descricao_he` varchar(50) DEFAULT NULL,
  `status_he` int DEFAULT NULL,
  `fk_userId` int DEFAULT NULL,
  PRIMARY KEY (`id_reg_He`),
  KEY `fk_userId` (`fk_userId`),
  CONSTRAINT `fk_userid` FOREIGN KEY (`fk_userId`) REFERENCES `tb_users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela dbo_ponto.tb_he: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbo_ponto.tb_plantao
CREATE TABLE IF NOT EXISTS `tb_plantao` (
  `id_registro` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `almoco_saida` time NOT NULL,
  `almoco_volta` time NOT NULL,
  `fk_status` int NOT NULL DEFAULT (1),
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_registro`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_plantao_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela dbo_ponto.tb_plantao: ~6 rows (aproximadamente)
INSERT INTO `tb_plantao` (`id_registro`, `id_user`, `data`, `hora_inicio`, `hora_fim`, `almoco_saida`, `almoco_volta`, `fk_status`, `criado_em`) VALUES
	(5, 1, '2025-09-06', '07:00:00', '16:00:00', '13:00:00', '14:00:00', 1, '2025-09-09 15:50:32'),
	(7, 1, '2025-07-19', '07:00:00', '16:00:00', '14:00:00', '15:00:00', 2, '2025-09-10 11:26:01'),
	(8, 1, '2025-07-16', '07:00:00', '16:00:00', '13:00:00', '14:00:00', 2, '2025-09-10 11:28:06'),
	(9, 1, '2025-08-30', '08:00:00', '17:00:00', '12:10:00', '13:10:00', 1, '2025-09-10 11:29:43'),
	(13, 1, '2025-09-13', '08:00:00', '17:00:00', '14:00:00', '15:00:00', 1, '2025-09-13 17:48:51'),
	(14, 1, '2025-09-20', '07:00:00', '16:00:00', '13:00:00', '14:00:00', 1, '2025-09-23 13:42:49'),
	(15, 1, '2025-10-25', '07:00:00', '16:00:00', '13:00:00', '14:00:00', 1, '2025-10-23 20:44:24');

-- Copiando estrutura para tabela dbo_ponto.tb_status
CREATE TABLE IF NOT EXISTS `tb_status` (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `status` varchar(110) DEFAULT NULL,
  `front` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela dbo_ponto.tb_status: ~3 rows (aproximadamente)
INSERT INTO `tb_status` (`id_status`, `status`, `front`) VALUES
	(1, 'Pendente', 'bg-warning'),
	(2, 'Aprovada', 'bg-success'),
	(3, 'Negadas', 'bg-danger');

-- Copiando estrutura para tabela dbo_ponto.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(110) NOT NULL,
  `user_email` varchar(110) NOT NULL,
  `user_password` varchar(110) NOT NULL,
  `user_team` varchar(110) DEFAULT NULL,
  `user_position` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela dbo_ponto.tb_users: ~1 rows (aproximadamente)
INSERT INTO `tb_users` (`id_user`, `user_name`, `user_email`, `user_password`, `user_team`, `user_position`) VALUES
	(1, 'Fabio Henrique', 'freis1801@gmail.com', '$2y$10$p12XjaUD7W1vQu1LNPG7iu6hEWv7OUJhpS06I9FnxBs.KLspJIaIe', 'OBI - Olos Business Intelligence', 'Junior');

-- Copiando estrutura para tabela dbo_ponto.tb_valor_hora
CREATE TABLE IF NOT EXISTS `tb_valor_hora` (
  `id_valor_hora` int NOT NULL AUTO_INCREMENT,
  `fk_idusuario` int NOT NULL,
  `valor_hora` decimal(10,2) NOT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_valor_hora`),
  KEY `fk_idusuario` (`fk_idusuario`),
  CONSTRAINT `tb_valor_hora_ibfk_1` FOREIGN KEY (`fk_idusuario`) REFERENCES `tb_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela dbo_ponto.tb_valor_hora: ~1 rows (aproximadamente)
INSERT INTO `tb_valor_hora` (`id_valor_hora`, `fk_idusuario`, `valor_hora`, `criado_em`) VALUES
	(1, 1, 14.70, '2025-09-10 17:04:15');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
