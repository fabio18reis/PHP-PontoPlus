-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/01/2026 às 21:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pontoplus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_he`
--

CREATE TABLE `tb_he` (
  `id_reg_He` int(11) NOT NULL,
  `inicio_he` time DEFAULT NULL,
  `fim_he` time DEFAULT NULL,
  `descricao_he` varchar(50) DEFAULT NULL,
  `status_he` int(11) DEFAULT NULL,
  `fk_userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_plantao`
--

CREATE TABLE `tb_plantao` (
  `id_registro` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `almoco_saida` time NOT NULL,
  `almoco_volta` time NOT NULL,
  `fk_status` int(11) NOT NULL DEFAULT 1,
  `criado_em` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_plantao`
--

INSERT INTO `tb_plantao` (`id_registro`, `id_user`, `data`, `hora_inicio`, `hora_fim`, `almoco_saida`, `almoco_volta`, `fk_status`, `criado_em`) VALUES
(16, 2, '2026-01-31', '07:00:00', '16:00:00', '13:00:00', '14:00:00', 1, '2026-01-30 16:00:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_position`
--

CREATE TABLE `tb_position` (
  `id_position` int(11) NOT NULL,
  `description` varchar(110) NOT NULL,
  `criado_em` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_position`
--

INSERT INTO `tb_position` (`id_position`, `description`, `criado_em`) VALUES
(16, 'Junior', '2026-01-30 23:21:54'),
(17, 'Pleno', '2026-01-30 23:22:02'),
(18, 'Senior', '2026-01-30 23:22:10'),
(19, 'Coordenador ', '2026-01-30 23:22:21'),
(20, 'Head', '2026-01-30 23:22:26'),
(21, 'C-Level', '2026-01-30 23:22:36'),
(22, 'CEO', '2026-01-30 23:22:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(110) DEFAULT NULL,
  `front` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`, `front`) VALUES
(1, 'Pendente', 'bg-warning'),
(2, 'Aprovada', 'bg-success'),
(3, 'Negadas', 'bg-danger');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_team`
--

CREATE TABLE `tb_team` (
  `id_team` int(11) NOT NULL,
  `id_user_leader` int(11) NOT NULL,
  `title` varchar(110) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_team`
--

INSERT INTO `tb_team` (`id_team`, `id_user_leader`, `title`, `criado_em`) VALUES
(17, 3, 'OHD1 - Olos Help Desk L1', '2026-01-30 23:29:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(110) NOT NULL,
  `user_email` varchar(110) NOT NULL,
  `user_password` varchar(110) NOT NULL,
  `user_team` int(11) DEFAULT NULL,
  `user_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `user_name`, `user_email`, `user_password`, `user_team`, `user_position`) VALUES
(2, 'Fabio Reis', 'freis1801@gmail.com', '$2y$10$S6/khLlSlvYL7Yn0zg/E1e9ZiXT/P7fvnGlWBTcs3jk9E7OU/cy96', 17, 16),
(3, 'Elizangela Ribeiro Rodrigues', 'elizangela.rodrigues@olos.com.br', '$2y$10$S6/khLlSlvYL7Yn0zg/E1e9ZiXT/P7fvnGlWBTcs3jk9E7OU/cy96', 17, 19);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_valor_hora`
--

CREATE TABLE `tb_valor_hora` (
  `id_valor_hora` int(11) NOT NULL,
  `fk_idusuario` int(11) NOT NULL,
  `valor_hora` decimal(10,2) NOT NULL,
  `criado_em` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_valor_hora`
--

INSERT INTO `tb_valor_hora` (`id_valor_hora`, `fk_idusuario`, `valor_hora`, `criado_em`) VALUES
(1, 2, 14.20, '2026-01-30 22:56:17');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_he`
--
ALTER TABLE `tb_he`
  ADD PRIMARY KEY (`id_reg_He`),
  ADD KEY `fk_userId` (`fk_userId`);

--
-- Índices de tabela `tb_plantao`
--
ALTER TABLE `tb_plantao`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `tb_position`
--
ALTER TABLE `tb_position`
  ADD PRIMARY KEY (`id_position`);

--
-- Índices de tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id_team`),
  ADD KEY `id_user` (`id_user_leader`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_position` (`user_position`),
  ADD KEY `user_team` (`user_team`);

--
-- Índices de tabela `tb_valor_hora`
--
ALTER TABLE `tb_valor_hora`
  ADD PRIMARY KEY (`id_valor_hora`),
  ADD KEY `fk_idusuario` (`fk_idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_he`
--
ALTER TABLE `tb_he`
  MODIFY `id_reg_He` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_plantao`
--
ALTER TABLE `tb_plantao`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_position`
--
ALTER TABLE `tb_position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_team`
--
ALTER TABLE `tb_team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_valor_hora`
--
ALTER TABLE `tb_valor_hora`
  MODIFY `id_valor_hora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_he`
--
ALTER TABLE `tb_he`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`fk_userId`) REFERENCES `tb_users` (`id_user`);

--
-- Restrições para tabelas `tb_plantao`
--
ALTER TABLE `tb_plantao`
  ADD CONSTRAINT `tb_plantao_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);

--
-- Restrições para tabelas `tb_team`
--
ALTER TABLE `tb_team`
  ADD CONSTRAINT `tb_teaam_ldfk_1` FOREIGN KEY (`id_user_leader`) REFERENCES `tb_users` (`id_user`);

--
-- Restrições para tabelas `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_psfk` FOREIGN KEY (`user_position`) REFERENCES `tb_position` (`id_position`),
  ADD CONSTRAINT `tb_users_tmfk` FOREIGN KEY (`user_team`) REFERENCES `tb_team` (`id_team`);

--
-- Restrições para tabelas `tb_valor_hora`
--
ALTER TABLE `tb_valor_hora`
  ADD CONSTRAINT `tb_valor_hora_ibfk_1` FOREIGN KEY (`fk_idusuario`) REFERENCES `tb_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
