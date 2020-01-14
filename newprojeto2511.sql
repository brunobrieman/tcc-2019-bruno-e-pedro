-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2019 às 19:41
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newprojeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(15) NOT NULL,
  `desc_curso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cod_curso`, `desc_curso`) VALUES
(1, 'informatica'),
(2, 'Agropecuária'),
(3, 'Química');

-- --------------------------------------------------------

--
-- Estrutura da tabela `discente`
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
-- Extraindo dados da tabela `discente`
--

INSERT INTO `discente` (`curso`, `emailResp`, `matricula`, `nomeResp`, `cod_user`, `senha`, `cod_turma`, `DiscStatus`, `foto`) VALUES
('informÃ¡tica', 'pat@gmail.com', 153, 'Patricia Monteiro', 121, 270503, 4, '1', '../fotos/1574527404.jpg'),
('informatica', 'mironil2710@gmail.com', 154, 'Jarmiro de Sousa', 129, 12345, 4, '1', '../fotos/1574556413.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `externo`
--

CREATE TABLE `externo` (
  `Nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` int(11) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `externo`
--

INSERT INTO `externo` (`Nome`, `email`, `cpf`, `motivo`) VALUES
('Roberth', 'roberth@gmail.com', 12345667, 'Consulta biblioteca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nupe`
--

CREATE TABLE `nupe` (
  `codNupe` int(15) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL,
  `foto` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nupe`
--

INSERT INTO `nupe` (`codNupe`, `cod_user`, `senha`, `foto`) VALUES
(201901, 100, 1234, 0x2e2e2f666f746f732f313537343434363235352e6a706567);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
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
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`descricao`, `motivo`, `codTipocorrencia`, `dth`, `codOcorrencia`, `matricula`, `siape`, `aprovacaoprof`) VALUES
('testando', 'testandoo', 1, '2019-12-31', 52, 153, 20200, '1'),
('chegada em atraso ', 'problemas com transporte coletivo', 2, '2019-11-24', 53, 153, 20200, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `portaria`
--

CREATE TABLE `portaria` (
  `codportaria` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL,
  `foto` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `portaria`
--

INSERT INTO `portaria` (`codportaria`, `cod_user`, `senha`, `foto`) VALUES
(201502, 127, 35456, 0x2e2e2f666f746f732f313537343434383036392e706e67);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof`
--

CREATE TABLE `prof` (
  `siape` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL,
  `formacao` varchar(100) DEFAULT NULL,
  `foto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prof`
--

INSERT INTO `prof` (`siape`, `cod_user`, `senha`, `formacao`, `foto`) VALUES
(20200, 128, 4589, 'Matematico', '../fotos/1574449263.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profturma`
--

CREATE TABLE `profturma` (
  `siape` int(11) NOT NULL,
  `cod_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocorrencia`
--

CREATE TABLE `tipocorrencia` (
  `descTipocorrencia` varchar(100) DEFAULT NULL,
  `codTipocorrencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipocorrencia`
--

INSERT INTO `tipocorrencia` (`descTipocorrencia`, `codTipocorrencia`) VALUES
('Entrada tardia', 1),
('Saída previa', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipouser`
--

CREATE TABLE `tipouser` (
  `descTipuser` varchar(100) DEFAULT NULL,
  `codTipuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipouser`
--

INSERT INTO `tipouser` (`descTipuser`, `codTipuser`) VALUES
('nupe', 1),
('portaria', 2),
('professor', 3),
('discente', 4),
('externo', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `desc_turma` varchar(100) DEFAULT NULL,
  `cod_turma` int(15) NOT NULL,
  `ano` varchar(100) DEFAULT NULL,
  `cod_curso` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`desc_turma`, `cod_turma`, `ano`, `cod_curso`) VALUES
('3info3', 4, '2019', 1),
('3agro3', 5, '2019', 2),
('3quimi', 8, '2019', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`email`, `nome`, `cod_user`, `codTipuser`, `status`, `cpf`) VALUES
('pedro@gmail.com', 'Pedro', 100, 1, '1', '67986376040'),
('roque@gmail.com', 'Pedro Roque', 121, 4, '1', '85290078088'),
('benisio@gmail.com', 'Benisio Moreira', 127, 2, '0', '73754324063'),
('cabral@gmail.com', 'Cabral Silva', 128, 3, '0', '92128755050'),
('damascenoraissa7@gmail.com', 'Raissa Damasceno Sousa', 129, 4, '1', '192876548');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Indexes for table `discente`
--
ALTER TABLE `discente`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`),
  ADD KEY `cod_turma` (`cod_turma`);

--
-- Indexes for table `externo`
--
ALTER TABLE `externo`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `nupe`
--
ALTER TABLE `nupe`
  ADD PRIMARY KEY (`codNupe`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Indexes for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`codOcorrencia`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `siape` (`siape`),
  ADD KEY `fk_ocorrencia_1_idx` (`codTipocorrencia`);

--
-- Indexes for table `portaria`
--
ALTER TABLE `portaria`
  ADD PRIMARY KEY (`codportaria`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`siape`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Indexes for table `profturma`
--
ALTER TABLE `profturma`
  ADD KEY `siape` (`siape`),
  ADD KEY `cod_turma` (`cod_turma`);

--
-- Indexes for table `tipocorrencia`
--
ALTER TABLE `tipocorrencia`
  ADD PRIMARY KEY (`codTipocorrencia`);

--
-- Indexes for table `tipouser`
--
ALTER TABLE `tipouser`
  ADD PRIMARY KEY (`codTipuser`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod_turma`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `codTipuser` (`codTipuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discente`
--
ALTER TABLE `discente`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `codOcorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tipocorrencia`
--
ALTER TABLE `tipocorrencia`
  MODIFY `codTipocorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipouser`
--
ALTER TABLE `tipouser`
  MODIFY `codTipuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `cod_turma` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `discente`
--
ALTER TABLE `discente`
  ADD CONSTRAINT `discente_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`),
  ADD CONSTRAINT `discente_ibfk_2` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`);

--
-- Limitadores para a tabela `nupe`
--
ALTER TABLE `nupe`
  ADD CONSTRAINT `nupe_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`);

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_ocorrencia_1` FOREIGN KEY (`codTipocorrencia`) REFERENCES `tipocorrencia` (`codTipocorrencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ocorrencia_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `discente` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ocorrencia_ibfk_2` FOREIGN KEY (`siape`) REFERENCES `prof` (`siape`);

--
-- Limitadores para a tabela `portaria`
--
ALTER TABLE `portaria`
  ADD CONSTRAINT `portaria_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`);

--
-- Limitadores para a tabela `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `prof_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cod_user`);

--
-- Limitadores para a tabela `profturma`
--
ALTER TABLE `profturma`
  ADD CONSTRAINT `profturma_ibfk_1` FOREIGN KEY (`siape`) REFERENCES `prof` (`siape`),
  ADD CONSTRAINT `profturma_ibfk_2` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`codTipuser`) REFERENCES `tipouser` (`codTipuser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
