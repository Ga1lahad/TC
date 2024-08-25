-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/08/2024 às 05:35
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
-- Banco de dados: `tc`
--
CREATE DATABASE IF NOT EXISTS `tc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tc`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamado`
--

CREATE TABLE `chamado` (
  `idChamado` int(11) NOT NULL,
  `DataDeCriacao` datetime NOT NULL,
  `DataDeAtendimento` datetime NOT NULL,
  `Motivo` varchar(255) NOT NULL,
  `Valor` float NOT NULL,
  `Estado` enum('Pendente','Atendimento','Cancelado','Aguardando','Concluido') NOT NULL,
  `FK_Pessoa` int(11) NOT NULL,
  `FK_Tecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Nome Fantasia` varchar(255) NOT NULL,
  `CNPJ` bigint(20) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Telefone` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `CPF` bigint(20) NOT NULL,
  `Telefone` bigint(20) NOT NULL,
  `Endereço` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `idServiço` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Valor` float NOT NULL,
  `Descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos/chamado`
--

CREATE TABLE `servicos/chamado` (
  `fk_serviço` int(11) NOT NULL,
  `fk_chamado` int(11) NOT NULL,
  `Estado` enum('Concluido','Cancelado','Progesso','Pausado') NOT NULL,
  `Laudo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `idTecnico` int(11) NOT NULL,
  `Status` enum('disponivel','inativo','ocupado','ferias') NOT NULL,
  `fk_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`idChamado`),
  ADD KEY `fk_pessoa` (`FK_Pessoa`),
  ADD KEY `fk_tecnico` (`FK_Tecnico`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `CNPJ_unique` (`CNPJ`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD UNIQUE KEY `CPF_unique` (`CPF`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServiço`);

--
-- Índices de tabela `servicos/chamado`
--
ALTER TABLE `servicos/chamado`
  ADD KEY `fk_chamado` (`fk_chamado`),
  ADD KEY `dk_servico` (`fk_serviço`);

--
-- Índices de tabela `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idTecnico`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `idChamado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServiço` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `idTecnico` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `fk_pessoa` FOREIGN KEY (`FK_Pessoa`) REFERENCES `pessoa` (`idPessoa`),
  ADD CONSTRAINT `fk_tecnico` FOREIGN KEY (`FK_Tecnico`) REFERENCES `tecnico` (`idTecnico`);

--
-- Restrições para tabelas `servicos/chamado`
--
ALTER TABLE `servicos/chamado`
  ADD CONSTRAINT `dk_servico` FOREIGN KEY (`fk_serviço`) REFERENCES `servico` (`idServiço`),
  ADD CONSTRAINT `fk_chamado` FOREIGN KEY (`fk_chamado`) REFERENCES `chamado` (`idChamado`);

--
-- Restrições para tabelas `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`fk_empresa`) REFERENCES `empresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
