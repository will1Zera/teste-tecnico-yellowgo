-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/11/2023 às 13:44
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
-- Banco de dados: `avaliacao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `domains`
--

CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `domain_type` varchar(200) DEFAULT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `domains`
--

INSERT INTO `domains` (`id`, `users_id`, `name`, `domain_type`, `user_type`) VALUES
(5, 4, 'Osirnet', 'osirnet.com.br', 1),
(6, 4, 'Osirnet', 'osirnet.suporte.com.br', 2),
(7, 4, 'Osirnet', 'osirnet.cliente.com.br', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `protocol` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `responsable_name` varchar(200) DEFAULT NULL,
  `closure_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tickets`
--

INSERT INTO `tickets` (`id`, `users_id`, `title`, `protocol`, `type`, `description`, `responsable_name`, `closure_reason`, `created_at`, `update_at`) VALUES
(1, 1, 'Problema no pagamento da fatura', '42980329', 'Erro', 'Estou tentando pagar a fatura mas ela não está sendo gerada pelo aplicativo, aparece um erro na tela escrito \"Erro 404\".', 'Suporte', 'Olá, você deve reiniciar o seu roteador, esperando 5 minutos com ele desligado, depois você pode tentar pagar novamente sua fatura.', '2023-10-31 22:08:13', '2023-11-01 01:57:54'),
(2, 1, 'Aumentar a velocidade do meu plano de internet', '86163362', 'Dúvida', 'Gostaria de aumentar a velocidade do meu plano de internet que está em 100 mega para 200 mega.', NULL, NULL, '2023-10-31 22:10:15', '2023-10-31 22:10:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_user_type` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `id_user_type`, `name`, `email`, `password`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Cliente', 'cliente@osirnet.cliente.com.br', '$2y$10$KB6Oy3pvxK11VKS5FgP.bOpXgpzGY/KEKboTPUqRTu/cUfIW7Eppe', '28dfe2aaee239929db5952641eb003eddc955c680dda86a1e21fcd85846ef42d10e628003a4586102a1de499cd6ec288a12a', 1, '2023-10-31 18:23:38', '2023-11-01 02:33:21'),
(3, 2, 'Suporte', 'suporte@osirnet.suporte.com.br', '$2y$10$crXoOXcCY68lq.dUAn/zeeMsu8jvt/yX0KLnOcpi0oL6D.iF4iZo2', '3c3fd90f55a0111067367ef99b9a11d696faf0d0e9c9d2bf0a77190e08e0bd352d512c375ce8e1da1779bb731f40a371dceb', 1, '2023-11-01 00:27:35', '2023-11-01 02:07:54'),
(4, 1, 'Administrador', 'administrador@osirnet.com.br', '$2y$10$BZAF9kxFkasXDD6Ogsghu.OpgtbHaEkPPszJ2hJT.cd653k/367NG', 'e046fb8be9fc2b38d6998b1787d68c068279c5d5f998002928f3f89ccfc2437879167b5d449701aa483fb37ab14ed4fc215d', 1, '2023-11-01 00:28:27', '2023-11-01 02:33:31'),
(12, 3, 'William Bierhals', 'william.bierhals@osirnet.cliente.com.br', '$2y$10$roKwWpyzZDjq2wJ4df84LueGIk2KT/cXLtPAWP7wGsuidmNegFpTC', '3b2c32438d0817c6488663bbd0385a9a16ff1ec65f1fd4a3314b6a34d1fd2f6769041fa256b93ecbfed2dc5ad30d080be1fc', 1, '2023-11-01 11:59:29', '2023-11-01 11:59:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_type`
--

CREATE TABLE `user_type` (
  `id_user_type` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `user_type`
--

INSERT INTO `user_type` (`id_user_type`, `type_name`) VALUES
(1, 'administrator'),
(3, 'client'),
(2, 'support');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_domains_users1_idx` (`users_id`);

--
-- Índices de tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `protocol_UNIQUE` (`protocol`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_tickets_users1_idx` (`users_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_users_user_type_idx` (`id_user_type`);

--
-- Índices de tabela `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id_user_type`),
  ADD UNIQUE KEY `id_user_type_UNIQUE` (`id_user_type`),
  ADD UNIQUE KEY `type_name_UNIQUE` (`type_name`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `domains`
--
ALTER TABLE `domains`
  ADD CONSTRAINT `fk_domains_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tickets_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_type` FOREIGN KEY (`id_user_type`) REFERENCES `user_type` (`id_user_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
