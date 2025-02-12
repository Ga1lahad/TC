-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/02/2025 às 11:40
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
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `status`) VALUES
(1, 'Reparo', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `DataDeCriacao` datetime NOT NULL,
  `DataDeAtendimento` datetime NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `valor` float NOT NULL,
  `estado` enum('Pendente','Atendimento','Cancelado','Aguardando','Concluido') NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_tecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `estado` varchar(8) NOT NULL,
  `nome_fantasia` varchar(255) NOT NULL,
  `cnpj` bigint(20) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `sobre` varchar(100) NOT NULL,
  `cep` bigint(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` bigint(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `atividade_principal` varchar(255) NOT NULL,
  `atividade_secundaria` varchar(255) NOT NULL,
  `pontos` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `estado`, `nome_fantasia`, `cnpj`, `descricao`, `sobre`, `cep`, `endereco`, `telefone`, `email`, `atividade_principal`, `atividade_secundaria`, `pontos`) VALUES
(1, 'Ativo', 'Servicall', 11111111111111, 'Servicall é uma empresa criada com o proposito de forncer de forma rapida e eficaz soluçoes de desenvolvimento e manutenção para nossos clientes. nos dedicamos a Atendimento 24 horas durante todos os dias da semana para garantir um serviço impecavel a qualquer horario.', 'Servicall é uma empresa de desemvolvimento e manutenção 24 horas durante toda a semana ', 87503470, 'Rua Santo Andre, 3531,Umuarama,PR', 11111111111, 'brunodevoficial@gmail.com', 'Desenvolvimento de Sistemas', 'Manutenção de sistemas', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `pontos` float NOT NULL DEFAULT 0,
  `fk_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `valor`, `descricao`, `pontos`, `fk_empresa`) VALUES
(1, 'Desenvolvimento', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quasi nostrum quae minima tenetur magnam repudiandae corporis sapiente repellendus nobis, harum voluptatum? Odio reprehenderit veniam aspernatur commodi labore ab repellendus veritatis co', 0, 1),
(2, 'Manutenção', 10.5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quasi nostrum quae minima tenetur magnam repudiandae corporis sapiente repellendus nobis, harum voluptatum? Odio reprehenderit veniam aspernatur commodi labore ab repellendus veritatis co', 0, 1);

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
-- Estrutura para tabela `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id` int(11) NOT NULL,
  `status` enum('disponivel','inativo','ocupado','ferias') NOT NULL,
  `fk_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `cep` bigint(20) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `administracao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `telefone`, `cep`, `endereco`, `email`, `senha`, `administracao`) VALUES
(1, 'Admin', '1ca7b015f50ed8dd334050da861f89a20bc9ce415a9675dbe308eba13e2ce1dd', 44991724124, 87503470, 'Rua Santo André, 3531 ,Umuarama/PR', 'brunodevoficial@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(21, 'Bruno Cortonezi Lopes', 'f23095d421ab67876ef722dc93f3e314e234697268c991f0369ce5044e44d6f3', 44435817221, 87507230, 'Rua Santo André,123,Umuarama/PR', 'brunodevoficial@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pessoa` (`fk_usuario`),
  ADD KEY `fk_tecnico` (`fk_tecnico`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CNPJ_unique` (`cnpj`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicos_empresas_FK` (`fk_empresa`);

--
-- Índices de tabela `servicos/chamado`
--
ALTER TABLE `servicos/chamado`
  ADD KEY `fk_chamado` (`fk_chamado`),
  ADD KEY `dk_servico` (`fk_serviço`);

--
-- Índices de tabela `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CPF_unique` (`cpf`),
  ADD KEY `usuarios_empresas_FK` (`administracao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chamados`
--
ALTER TABLE `chamados`
  ADD CONSTRAINT `fk_pessoa` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_tecnico` FOREIGN KEY (`FK_Tecnico`) REFERENCES `tecnicos` (`id`);

--
-- Restrições para tabelas `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_empresas_FK` FOREIGN KEY (`fk_empresa`) REFERENCES `empresas` (`id`);

--
-- Restrições para tabelas `servicos/chamado`
--
ALTER TABLE `servicos/chamado`
  ADD CONSTRAINT `dk_servico` FOREIGN KEY (`fk_serviço`) REFERENCES `servicos` (`id`),
  ADD CONSTRAINT `fk_chamado` FOREIGN KEY (`fk_chamado`) REFERENCES `chamados` (`id`);

--
-- Restrições para tabelas `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`fk_empresa`) REFERENCES `empresas` (`id`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_empresas_FK` FOREIGN KEY (`administracao`) REFERENCES `empresas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
