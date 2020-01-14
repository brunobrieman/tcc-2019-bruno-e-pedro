-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/11/2019 às 17:27
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.13-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `newprojeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(15) NOT NULL,
  `desc_curso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`cod_curso`, `desc_curso`) VALUES
(1, 'informatica'),
(2, 'Agropecuária'),
(3, 'Química');

-- --------------------------------------------------------

--
-- Estrutura para tabela `discente`
--

CREATE TABLE `discente` (
  `curso` varchar(100) NOT NULL,
  `emailResp` varchar(100) DEFAULT NULL,
  `matricula` int(11) NOT NULL,
  `nomeResp` varchar(100) DEFAULT NULL,
  `cod_user` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL,
  `cod_turma` int(15) DEFAULT NULL,
  `DiscStatus` char(1) DEFAULT NULL,
  `foto` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `discente`
--

INSERT INTO `discente` (`curso`, `emailResp`, `matricula`, `nomeResp`, `cod_user`, `senha`, `cod_turma`, `DiscStatus`, `foto`) VALUES
('informÃ¡tica', 'pat@gmail.com', 153, 'Patricia Monteiro', 121, 270503, 4, '0', '../fotos/1574527404.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `externo`
--

CREATE TABLE `externo` (
  `Nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` int(11) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nupe`
--

CREATE TABLE `nupe` (
  `codNupe` int(15) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL,
  `foto` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `nupe`
--

INSERT INTO `nupe` (`codNupe`, `cod_user`, `senha`, `foto`) VALUES
(201901, 100, 1234, 0x2e2e2f666f746f732f313537343434363235352e6a706567);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `descricao` varchar(100) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `codTipocorrencia` int(11) NOT NULL,
  `dth` varchar(100) DEFAULT NULL,
  `codOcorrencia` int(11) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `siape` int(11) DEFAULT NULL,
  `aprovacaoprof` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`descricao`, `motivo`, `codTipocorrencia`, `dth`, `codOcorrencia`, `matricula`, `siape`, `aprovacaoprof`) VALUES
('teste', 'teste', 1, '2020-02-02', 59, 153, 20200, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `portaria`
--

CREATE TABLE `portaria` (
  `codportaria` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL,
  `foto` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `portaria`
--

INSERT INTO `portaria` (`codportaria`, `cod_user`, `senha`, `foto`) VALUES
(201502, 127, 35456, 0x2e2e2f666f746f732f313537343434383036392e706e67);

-- --------------------------------------------------------

--
-- Estrutura para tabela `prof`
--

CREATE TABLE `prof` (
  `siape` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL,
  `formacao` varchar(100) DEFAULT NULL,
  `foto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `prof`
--

INSERT INTO `prof` (`siape`, `cod_user`, `senha`, `formacao`, `foto`) VALUES
(20200, 128, 4589, 'Matematico', '../fotos/1574959625.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `profturma`
--

CREATE TABLE `profturma` (
  `siape` int(11) NOT NULL,
  `cod_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `profturma`
--

INSERT INTO `profturma` (`siape`, `cod_turma`) VALUES
(20200, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipocorrencia`
--

CREATE TABLE `tipocorrencia` (
  `descTipocorrencia` varchar(100) DEFAULT NULL,
  `codTipocorrencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipocorrencia`
--

INSERT INTO `tipocorrencia` (`descTipocorrencia`, `codTipocorrencia`) VALUES
('Entrada tardia', 1),
('Saída previa', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipouser`
--

CREATE TABLE `tipouser` (
  `descTipuser` varchar(100) DEFAULT NULL,
  `codTipuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipouser`
--

INSERT INTO `tipouser` (`descTipuser`, `codTipuser`) VALUES
('nupe', 1),
('portaria', 2),
('professor', 3),
('discente', 4),
('externo', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `desc_turma` varchar(100) DEFAULT NULL,
  `cod_turma` int(15) NOT NULL,
  `ano` varchar(100) DEFAULT NULL,
  `cod_curso` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `turma`
--

INSERT INTO `turma` (`desc_turma`, `cod_turma`, `ano`, `cod_curso`) VALUES
('3info3', 4, '2019', 1),
('3agro3', 5, '2019', 2),
('3quimi', 8, '2019', 3),
('3info2', 9, '2020', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cod_user` int(11) NOT NULL,
  `codTipuser` int(11) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`email`, `nome`, `cod_user`, `codTipuser`, `status`, `cpf`) VALUES
('pedro@gmail.com', 'Pedro', 100, 1, '0', '67986376040'),
('roque@gmail.com', 'Pedro Roque', 121, 4, '1', '85290078088'),
('benisio@gmail.com', 'Benisio Moreira', 127, 2, '1', '73754324063'),
('cabral@gmail.com', 'Cabral Silvo', 128, 1, '0', '92128755050'),
('damascenoraissa7@gmail.com', 'Raissa Damasceno Sousa', 129, 4, '1', '192876548'),
('ant@gmail.com', 'Antonio ', 131, 4, '1', '7894561212');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Índices de tabela `discente`
--
ALTER TABLE `discente`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`),
  ADD KEY `cod_turma` (`cod_turma`);

--
-- Índices de tabela `externo`
--
ALTER TABLE `externo`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `nupe`
--
ALTER TABLE `nupe`
  ADD PRIMARY KEY (`codNupe`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Índices de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`codOcorrencia`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `siape` (`siape`),
  ADD KEY `fk_ocorrencia_1_idx` (`codTipocorrencia`);

--
-- Índices de tabela `portaria`
--
ALTER TABLE `portaria`
  ADD PRIMARY KEY (`codportaria`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Índices de tabela `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`siape`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Índices de tabela `profturma`
--
ALTER TABLE `profturma`
  ADD KEY `siape` (`siape`),
  ADD KEY `cod_turma` (`cod_turma`);

--
-- Índices de tabela `tipocorrencia`
--
ALTER TABLE `tipocorrencia`
  ADD PRIMARY KEY (`codTipocorrencia`);

--
-- Índices de tabela `tipouser`
--
ALTER TABLE `tipouser`
  ADD PRIMARY KEY (`codTipuser`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod_turma`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `codTipuser` (`codTipuser`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `discente`
--
ALTER TABLE `discente`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `codOcorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de tabela `tipocorrencia`
--
ALTER TABLE `tipocorrencia`
  MODIFY `codTipocorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tipouser`
--
ALTER TABLE `tipouser`
  MODIFY `codTipuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `cod_turma` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `discente`
--
ALTER TABLE `discente`
  ADD CONSTRAINT `discente_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`),
  ADD CONSTRAINT `discente_ibfk_2` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`);

--
-- Restrições para tabelas `nupe`
--
ALTER TABLE `nupe`
  ADD CONSTRAINT `nupe_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`);

--
-- Restrições para tabelas `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_ocorrencia_1` FOREIGN KEY (`codTipocorrencia`) REFERENCES `tipocorrencia` (`codTipocorrencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ocorrencia_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `discente` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ocorrencia_ibfk_2` FOREIGN KEY (`siape`) REFERENCES `prof` (`siape`);

--
-- Restrições para tabelas `portaria`
--
ALTER TABLE `portaria`
  ADD CONSTRAINT `portaria_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`);

--
-- Restrições para tabelas `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `prof_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`);

--
-- Restrições para tabelas `profturma`
--
ALTER TABLE `profturma`
  ADD CONSTRAINT `profturma_ibfk_1` FOREIGN KEY (`siape`) REFERENCES `prof` (`siape`),
  ADD CONSTRAINT `profturma_ibfk_2` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`codTipuser`) REFERENCES `tipouser` (`codTipuser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
