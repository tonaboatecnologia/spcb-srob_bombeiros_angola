-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Maio-2026 às 01:41
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `spcb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitantes`
--

DROP TABLE IF EXISTS `solicitantes`;
CREATE TABLE IF NOT EXISTS `solicitantes` (
  `id_solicitante` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `nif` varchar(14) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `relato` text,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `id_equipe` int NOT NULL,
  `id_tipOcorrencia` int NOT NULL,
  `id_orgaoApoio` int NOT NULL,
  `data_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_solicitante`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `solicitantes`
--

INSERT INTO `solicitantes` (`id_solicitante`, `nome`, `nif`, `telefone`, `email`, `relato`, `bairro`, `cidade`, `rua`, `referencia`, `id_equipe`, `id_tipOcorrencia`, `id_orgaoApoio`, `data_creation`) VALUES
(1, 'António Mutondo', '99339937773737', '993337772', 'antonia@gmail.com', 'relato 3', 'sagrada familia', 'huíla', 'Mutamba', 'Na Porta Do Shopping', 0, 0, 0, '2026-05-10 18:27:54'),
(2, 'Ricardo Massungui', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'jsdlfjdk', 'calungo auto', 'lunda_norte', 'Bita Sapú 2', 'Igreja Católica', 0, 0, 0, '2026-05-10 18:50:03'),
(4, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', 0, 0, 0, '2026-05-10 19:21:51'),
(5, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', 0, 0, 0, '2026-05-10 19:22:02'),
(6, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', 0, 0, 0, '2026-05-10 19:22:53'),
(7, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', 0, 0, 0, '2026-05-10 19:24:21'),
(8, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', 0, 0, 0, '2026-05-10 19:24:50'),
(9, 'franciso bráulio', '993830938LA949', '983833938', 'franca@gmail.com', 'teste relato5', 'belas siac', 'cuanza_sul', 'Parte Braço Zango 1', 'Na Cantinat', 0, 0, 0, '2026-05-10 20:40:31'),
(10, 'Ricardo Massungui', '93833737333211', '993337772', 'rubem3@gmai.com', 'ijkkjl', 'belas siac', 'lunda_norte', 'Bita Sapú 2', 'Na Porta Do Shopping', 18, 0, 0, '2026-05-11 00:20:01'),
(12, 'Ricardo Massungui', '99339937773737', '983833849', 'sandamassungui@gmail.com', 'ricardo', 'calungo auto', 'lunda_norte', 'Talatona', 'Na Cantina', 18, 0, 0, '2031-05-11 20:10:55'),
(13, 'Emilio snatoas', '99339932222223', '983833849', 'emiloi@gmail.com', 'meu relato', 'calungo auto', 'lunda_norte', 'Talatona', 'Na Cantina', 21, 0, 0, '2031-05-11 20:13:31'),
(14, 'António Mutondo', '99383333333333', '993337772', 'gera@gami.com.ao', 'kjkjl', 'bita ', 'cunene', 'Calungo', 'Na Cantinat', 0, 0, 0, '2031-05-11 21:03:09'),
(15, 'Rubem Marcos', '93833737333332', '993337772', 'antonia@gmail.com', 'teste reaaskljdfçljf', 'calungo auto', 'cuando_cubango', 'Talatona', 'Cetep', 0, 0, 0, '2031-05-12 10:17:50'),
(16, 'sandra piedade', '99383000000000', '983833938', 'sanda@gmail.com', 'relato 4', 'luanda sul', 'luanda', 'Luanda , Viana - Estalagem', 'No Arreiou', 0, 0, 0, '2024-05-17 19:26:08'),
(17, 'Tamara dos santos', '993830009LA993', '983833938', 'ttamar@gmail.com', 'relato 7', 'bita ', 'huíla', 'Parte Braço Zango 1', 'Igreja Católica', 21, 0, 0, '2025-05-21 06:50:56'),
(18, 'Marcos dos santos de sousa', '98766544677888', '983833938', 'antonia@gmail.com', 'relato 33', 'luanda sul', 'lunda_norte', 'Talatona', 'Na Porta Do Shopping', 10, 0, 0, '2026-05-27 08:45:29'),
(19, 'António Mutondo', '93833737333222', '993337772', 'antonia@gmail.com', 'relato', 'luanda sul', 'cunene', 'Mutamba', 'Na Porta Do Shopping', 0, 0, 0, '2026-05-28 00:33:56'),
(20, 'Emilio snatoas', '99383837373733', '983833938', 'antnia@gmail.com', 'relato', 'luanda sul', 'luanda', 'Mutamba', 'Cetep', 0, 0, 0, '2026-05-28 00:37:58'),
(21, 'Emilio snatoas', '99383837373733', '983833938', 'antnia@gmail.com', 'relato', 'luanda sul', 'luanda', 'Mutamba', 'Cetep', 19, 0, 0, '2026-05-28 00:38:50'),
(22, 'Ricardo Massungui', '93833737333332', '983833938', 'sandamassungui@gmail.com', 'relato', 'belas siac', 'lunda_norte', 'Talatona', 'Cetep', 20, 0, 0, '2026-05-28 01:19:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
