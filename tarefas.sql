-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2023 às 22:43
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  `feito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `feito`) VALUES
(39, 'Teste', 'teste1', 0),
(40, 'Teste 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquet mattis nulla, id interdum sapien malesuada eu. Mauris condimentum urna tincidunt efficitur ullamcorper. Nullam ac velit luctus, molestie libero ut, varius est. Sed commodo quis lorem nec maximus. Fusce commodo orci arcu, semper vehicula magna feugiat a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin erat eros, sodales nec sapien interdum, luctus eleifend turpis. Proin mattis pharetra tincidunt. Nam porttitor tellus quis tempor aliquam. Maecenas vitae dapibus lectus. Maecenas placerat efficitur mi sed luctus. Integer dictum, erat nec maximus fermentum, risus lectus elementum odio, at posuere ipsum metus ut eros. In hac habitasse platea dictumst. Mauris posuere a nunc sed commodo.', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
