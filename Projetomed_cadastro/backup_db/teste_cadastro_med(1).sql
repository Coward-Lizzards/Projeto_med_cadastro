-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/01/2025 às 23:51
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
-- Banco de dados: `teste_cadastro_med`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidade` int(11) NOT NULL,
  `nome_esp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especialidades`
--

INSERT INTO `especialidades` (`id_especialidade`, `nome_esp`) VALUES
(8, 'Alergologia'),
(9, 'Angiologia'),
(10, 'Buco Maxilo'),
(1, 'Cardiologia Clínica'),
(2, 'Cardiologia Infantil'),
(11, 'Cirurgia Cabeça e Pescoço'),
(12, 'Cirurgia Cardíaca'),
(13, 'Cirurgia Geral'),
(14, 'Cirurgia Pediátrica'),
(15, 'Cirurgia Plástica'),
(16, 'Cirurgia Torácica'),
(17, 'Cirurgia Vascular'),
(18, 'Clínica Médica'),
(3, 'Dermatologia'),
(4, 'Neurologia'),
(5, 'Ortopedia'),
(6, 'Pediatria'),
(7, 'Psiquiatria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `crm` varchar(10) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `id_especialidade` int(11) DEFAULT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id_medico`, `nome`, `crm`, `telefone`, `id_especialidade`, `cep`, `endereco`, `id_usuario`) VALUES
(77, 'pedro', '70893564', '8765543289', 15, '77410-901', 'Alameda Madrid, Jardim Sevilha, Gurupi - TO', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`) VALUES
(1, 'exemplo@hotmail.com', '123456778'),
(4, 'teste2@hotmail.com', '12345678'),
(5, 'teste3@gmail.com', '12345678'),
(6, 'teste4@gmail.com', '12345678');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidade`),
  ADD UNIQUE KEY `nome` (`nome_esp`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`),
  ADD UNIQUE KEY `crm` (`crm`),
  ADD KEY `fk_especialidade` (`id_especialidade`),
  ADD KEY `fk_medicos_usuarios` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_especialidade` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidades` (`id_especialidade`),
  ADD CONSTRAINT `fk_medicos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
