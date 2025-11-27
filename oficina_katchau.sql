-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27/11/2025 às 22:05
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
-- Banco de dados: `oficina_katchau`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone_cliente` varchar(20) DEFAULT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `endereco_cliente` varchar(200) DEFAULT NULL,
  `dt_nasc_client` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `cpf`, `telefone_cliente`, `email_cliente`, `endereco_cliente`, `dt_nasc_client`) VALUES
(1, 'Raquel', '050.050.505-05', '(61) 99257-9669', 'alissomsantos099@gmail.com', 'df-150', '1999-09-15'),
(2, 'Raquel', '9999', '(61) 99257-9669', 'alissomsantos099@gmail.com', 'df-150', '2025-11-13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_servico`
--

CREATE TABLE `ordem_servico` (
  `id_ordem` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `data_abertura` date NOT NULL,
  `data_fechamento` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ABERTA',
  `valor_total` decimal(10,2) DEFAULT 0.00,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ordem_servico`
--

INSERT INTO `ordem_servico` (`id_ordem`, `id_cliente`, `id_veiculo`, `id_servico`, `data_abertura`, `data_fechamento`, `status`, `valor_total`, `observacoes`) VALUES
(1, 1, 1, 1, '2025-11-10', '2025-12-12', 'ABERTA', 60000.00, '🚗 TROCA COMPLETA DO SISTEMA DE FREIOS – FIAT UNO\r\n\r\nA troca completa dos freios de um Fiat Uno envolve a substituição das pastilhas dianteiras, discos (se necessário), sapatas traseiras, cilindros de roda, lonas, tambores (se necessário) e fluido de freio.\r\nAbaixo está o passo a passo detalhado, como realizado em oficinas profissionais.\r\n\r\n🔧 1. Preparação do Veículo\r\n\r\nEstacionar em local plano e travar o freio de mão.\r\n\r\nSoltar levemente os parafusos das rodas.\r\n\r\nLevantar o carro com macaco e apoiar em cavaletes de segurança.\r\n\r\nRemover as rodas dianteiras e traseiras.\r\n\r\n🔧 2. Freios Dianteiros (Disco + Pastilhas)\r\n2.1 Remoção\r\n\r\nRetirar os parafusos da pinça de freio.\r\n\r\nSuspender a pinça sem tensionar o flexível (usar arame para prender).\r\n\r\nRetirar as pastilhas usadas.\r\n\r\nInspecionar o disco:\r\n\r\nSe estiver abaixo da espessura mínima, empenado ou muito riscado → substituir.\r\n\r\nRemover os parafusos do disco (se for trocar).\r\n\r\n2.2 Instalação\r\n\r\nLimpar suporte da pinça e guias.\r\n\r\nRecolher o êmbolo da pinça com ferramenta apropriada.\r\n\r\nInstalar o novo disco (se aplicável).\r\n\r\nColocar as novas pastilhas.\r\n\r\nMontar a pinça no lugar e apertar os parafusos com torque correto.\r\n\r\nBombear o pedal algumas vezes para assentar as pastilhas.\r\n\r\n🔧 3. Freios Traseiros (Tambor + Lonas)\r\n3.1 Remoção\r\n\r\nSoltar o freio de mão completamente.\r\n\r\nRetirar o tambor (às vezes exige desengripante ou um leve toque).\r\n\r\nExaminar o estado das lonas, molas e do cilindro de roda.\r\n\r\nSe houver vazamento de fluido → trocar o cilindro de roda.\r\n\r\nRemover as molas, pinos de travamento e em seguida as lonas antigas.\r\n\r\n3.2 Instalação\r\n\r\nInstalar o novo cilindro de roda (se necessário).\r\n\r\nColocar as lonas novas no suporte.\r\n\r\nReinstalar molas e pinos tensionando corretamente.\r\n\r\nLimpar e lubrificar o ponto de apoio da lona com graxa específica.\r\n\r\nAjustar o regulador automático (se aplicável).\r\n\r\nRecolocar o tambor e verificar folga.\r\n\r\nAjustar o freio de mão conforme especificação.\r\n\r\n🔧 4. Troca do Fluido de Freio\r\n\r\nUm dos passos mais importantes!\r\n\r\nProcedimento:\r\n\r\nAbrir o reservatório de fluido.\r\n\r\nConectar mangueira ao sangrador da roda traseira direita.\r\n\r\nPedalista pressiona o pedal de freio → abre-se o sangrador → fluido sai → fecha-se → repete.\r\n\r\nRepetir na ordem:\r\n\r\nTraseira direita\r\n\r\nTraseira esquerda\r\n\r\nDianteira direita\r\n\r\nDianteira esquerda\r\n\r\nCompletar com fluido DOT 3 ou DOT 4 conforme recomendado.\r\n\r\nGarantir que não entre ar no sistema.\r\n\r\n🔧 5. Testes Finais\r\n\r\nVerificar folga e resposta do pedal.\r\n\r\nTestar freio de mão.\r\n\r\nConferir se há vazamentos.\r\n\r\nFazer teste em baixa velocidade antes de liberar o veículo.\r\n\r\nLembrar o cliente de que as pastilhas e lonas novas precisam de período de assentamento (aprox. 200 km).\r\n\r\n📌 Componentes trocados em uma troca completa\r\n\r\nPastilhas dianteiras\r\n\r\nDiscos dianteiros (se necessário)\r\n\r\nLonas traseiras\r\n\r\nCilindros de roda\r\n\r\nTambores (se necessário)\r\n\r\nFluido de freio\r\n\r\nMolas e acessórios do tambor (opcional, recomendado)');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `nome_servico` varchar(100) NOT NULL,
  `descricao_servico` text DEFAULT NULL,
  `valor_base` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `nome_servico`, `descricao_servico`, `valor_base`) VALUES
(1, 'TROCA DE FREIO', '🚗 TROCA COMPLETA DO SISTEMA DE FREIOS – FIAT UNO\r\n\r\nA troca completa dos freios de um Fiat Uno envolve a substituição das pastilhas dianteiras, discos (se necessário), sapatas traseiras, cilindros de roda, lonas, tambores (se necessário) e fluido de freio.\r\nAbaixo está o passo a passo detalhado, como realizado em oficinas profissionais.\r\n\r\n🔧 1. Preparação do Veículo\r\n\r\nEstacionar em local plano e travar o freio de mão.\r\n\r\nSoltar levemente os parafusos das rodas.\r\n\r\nLevantar o carro com macaco e apoiar em cavaletes de segurança.\r\n\r\nRemover as rodas dianteiras e traseiras.\r\n\r\n🔧 2. Freios Dianteiros (Disco + Pastilhas)\r\n2.1 Remoção\r\n\r\nRetirar os parafusos da pinça de freio.\r\n\r\nSuspender a pinça sem tensionar o flexível (usar arame para prender).\r\n\r\nRetirar as pastilhas usadas.\r\n\r\nInspecionar o disco:\r\n\r\nSe estiver abaixo da espessura mínima, empenado ou muito riscado → substituir.\r\n\r\nRemover os parafusos do disco (se for trocar).\r\n\r\n2.2 Instalação\r\n\r\nLimpar suporte da pinça e guias.\r\n\r\nRecolher o êmbolo da pinça com ferramenta apropriada.\r\n\r\nInstalar o novo disco (se aplicável).\r\n\r\nColocar as novas pastilhas.\r\n\r\nMontar a pinça no lugar e apertar os parafusos com torque correto.\r\n\r\nBombear o pedal algumas vezes para assentar as pastilhas.\r\n\r\n🔧 3. Freios Traseiros (Tambor + Lonas)\r\n3.1 Remoção\r\n\r\nSoltar o freio de mão completamente.\r\n\r\nRetirar o tambor (às vezes exige desengripante ou um leve toque).\r\n\r\nExaminar o estado das lonas, molas e do cilindro de roda.\r\n\r\nSe houver vazamento de fluido → trocar o cilindro de roda.\r\n\r\nRemover as molas, pinos de travamento e em seguida as lonas antigas.\r\n\r\n3.2 Instalação\r\n\r\nInstalar o novo cilindro de roda (se necessário).\r\n\r\nColocar as lonas novas no suporte.\r\n\r\nReinstalar molas e pinos tensionando corretamente.\r\n\r\nLimpar e lubrificar o ponto de apoio da lona com graxa específica.\r\n\r\nAjustar o regulador automático (se aplicável).\r\n\r\nRecolocar o tambor e verificar folga.\r\n\r\nAjustar o freio de mão conforme especificação.\r\n\r\n🔧 4. Troca do Fluido de Freio\r\n\r\nUm dos passos mais importantes!\r\n\r\nProcedimento:\r\n\r\nAbrir o reservatório de fluido.\r\n\r\nConectar mangueira ao sangrador da roda traseira direita.\r\n\r\nPedalista pressiona o pedal de freio → abre-se o sangrador → fluido sai → fecha-se → repete.\r\n\r\nRepetir na ordem:\r\n\r\nTraseira direita\r\n\r\nTraseira esquerda\r\n\r\nDianteira direita\r\n\r\nDianteira esquerda\r\n\r\nCompletar com fluido DOT 3 ou DOT 4 conforme recomendado.\r\n\r\nGarantir que não entre ar no sistema.\r\n\r\n🔧 5. Testes Finais\r\n\r\nVerificar folga e resposta do pedal.\r\n\r\nTestar freio de mão.\r\n\r\nConferir se há vazamentos.\r\n\r\nFazer teste em baixa velocidade antes de liberar o veículo.\r\n\r\nLembrar o cliente de que as pastilhas e lonas novas precisam de período de assentamento (aprox. 200 km).\r\n\r\n📌 Componentes trocados em uma troca completa\r\n\r\nPastilhas dianteiras\r\n\r\nDiscos dianteiros (se necessário)\r\n\r\nLonas traseiras\r\n\r\nCilindros de roda\r\n\r\nTambores (se necessário)\r\n\r\nFluido de freio\r\n\r\nMolas e acessórios do tambor (opcional, recomendado)', 60000.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id_veiculo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `ano` int(11) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`id_veiculo`, `id_cliente`, `placa`, `marca`, `modelo`, `ano`, `cor`) VALUES
(1, 1, 'PAI-3922', 'fiat', 'uno', 2000, 'preto');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD PRIMARY KEY (`id_ordem`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_veiculo` (`id_veiculo`),
  ADD KEY `id_servico` (`id_servico`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  MODIFY `id_ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD CONSTRAINT `ordem_servico_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `ordem_servico_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`),
  ADD CONSTRAINT `ordem_servico_ibfk_3` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`);

--
-- Restrições para tabelas `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
