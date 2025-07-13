-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Maio-2024 às 03:59
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
-- Estrutura da tabela `attempts`
--

DROP TABLE IF EXISTS `attempts`;
CREATE TABLE IF NOT EXISTS `attempts` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Senha` varchar(65) DEFAULT NULL,
  `Ip` varchar(20) DEFAULT NULL,
  `ErrorMsg` varchar(45) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirmations`
--

DROP TABLE IF EXISTS `confirmations`;
CREATE TABLE IF NOT EXISTS `confirmations` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) DEFAULT NULL,
  `Token` text,
  `DataCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DataModification` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `confirmations`
--

INSERT INTO `confirmations` (`Id`, `Email`, `Token`, `DataCreation`, `DataModification`) VALUES
(1, 'ricardomasungui@gmail.com', '35bcb7abb79f59239c2952529a3efc7e577cb7c241cc994504fa02aa005e0154e29dee8b5ce253712470dbab7b76c90c0f11c9cc85e93de1d6173a66d75ddc56', '2026-05-05 18:07:40', '2026-05-05 18:07:40'),
(2, 'ricardomasungui@gmail.com', '6b441c79e7eb368bb68fdeb183de2ba97c40c83fc6dd0f4d4371a5aedc169f73cf180836f3cab70d94e96cf2b8859a482def6bdc48d95816e11a5e1bf5ccf35b', '2026-05-05 18:10:32', '2026-05-05 18:10:32'),
(3, 'ricardo@gmail.com', '42f82940b1d7eb0641de46027bb68243b3b22883e1ea87e33784bdb90c8c2055039346c4ca643bbad2bb37be04365a04eec9deaaacfc3e6d2401ea0c1b2258da', '2026-05-05 18:15:22', '2026-05-05 18:15:22'),
(4, 'ricardo@gmail.com', '6644e3f2e44b69d6c254bfe86a5059fc35e7953506294b811aa832c7d1bb0df16b4659383d39145bbbe625436d181609c68f4172942f1ae4ce5cdf5e0a9ba584', '2026-05-05 18:18:47', '2026-05-05 18:18:47'),
(5, 'Marquiano@gmail.co.ao', '1f5445a8f34a1174b2f7cb4f4a244d96ac3b0a11f23bda69e5617f37034eb487025d5afc04241f882f8efc80666b6768f486bf2a3de101525e97f135e953540d', '2026-05-05 18:21:11', '2026-05-05 18:21:11'),
(6, 'Marquiano@gmail.co.ao', 'a6298a5cb4cd59d8c0b2c91b2547966b75ed677381361defb987753cac8927f02c50ea9b3930b1ed3eadd6a2cf8222009c4002dfbe27ecd74d5bfac175570387', '2026-05-05 18:27:38', '2026-05-05 18:27:38'),
(7, 'Marquiano@gmail.co.ao', '70c710cb76c535765c5d83a7928755a7207e2f7cd0977877d30dd4c7909b488e8ae3f88e8dada2a042ff4780646e97e80bfaa5103f8f589d5ee0c68f2edd5aee', '2026-05-05 18:28:44', '2026-05-05 18:28:44'),
(8, 'Marquiano@gmail.co.ao', '915020639eae9b7602fe5a17fb2fb66092961b3e8cff98060ee2036c750eebee2c922063ebc96291d77a1637c1be2d7d89f2cb51c949053f23c88ad1d73c2de7', '2026-05-05 18:31:50', '2026-05-05 18:31:50'),
(9, 'Marquiano@gmail.co.ao', '108f58d3a9730ae8e580cd68734f3e9d91a3bb69e8681aefc5dfd9d95db0d505c615b2a3db44cfeeab5db3aa0f502747d108545efdc948fde99d4ad55da0d679', '2026-05-05 18:42:14', '2026-05-05 18:42:14'),
(10, 'Marquiano@gmail.co.ao', '94eff739b14064ad097de487a6e9ae374c3035096838d53567053a4baef5e6c26a24f12cd11cd861bffacb55fa92c4f7c5748a827c4b09ef7e29b397acf3b48b', '2026-05-05 18:43:03', '2026-05-05 18:43:03'),
(11, 'ricardomassungui@gmail.com', 'b586deb41666793d0edb13d8263446056270ae1aab04cc299f16ac82ba02090b40bdca1fc4a85aa883617421252776e79e5c62e4b0a6a776e86f810239498f29', '2026-05-06 00:05:41', '2026-05-06 00:05:41'),
(12, 'edvaniosaldanha@gmail.com', '18ed3776ab1889a7ca1df48f8647036a689f9acd3bbda472a156c6e74926dc48914897d2312a2a4c0a1a38b7f15f68846ace64eb410eb8a5c99317030fa8151d', '2026-05-07 14:20:44', '2026-05-07 14:20:44'),
(13, 'ricardomassungui@gmail.com', 'f332a0d9d08763d8cd46312b318e46e8f79b1e25136935c29cb9d27e402dcf853e3e3ccf9305ab574e7f44059ce5c663109f5fd75fe3cf135e13192c157ec74a', '2026-05-07 17:24:03', '2026-05-07 17:24:03'),
(14, 'milde@gmail.com', '734b6095b093f43d3b6fdff71589f31d5efa69ab6f7b81d8544a811fd181bd5ef83fe47f9652231769be3b9bddb6248de503bfac760f1aed1e0a7aa1cedf227b', '2026-05-07 17:28:50', '2026-05-07 17:28:50'),
(15, 'SPCB@gmail.co.ao', 'b88386041c0f920fcb662e297cc89e1c47c965ec21cb7fc9fb0ced424d302235075212657d8582493fd04fa41fb1100f87ae21b16f7b2f7ca6fd3b615ed52068', '2026-05-09 23:42:59', '2026-05-09 23:42:59'),
(16, 'ricardomassungui@gmail.com', '6df356ccd8ea6bd1e5b29fc64e5da6e00d9185cb89671f80529647b49aa82b2db93c20538baf84df58bfd90a4c748cc9294387acc27e69728314fee672ce2222', '2026-05-10 04:53:49', '2026-05-10 04:53:49'),
(17, 'geral@candimbatecnologia.co.ao', '645cf81bffad2dc2d89da01ccd93976ec64ab9f4a88498f4d7c5073eb5cf7614526af2389ae98c0bb93a489bbbf06e6faf984076b96a7a44a095ae960c7c5d0d', '2026-05-10 17:06:46', '2026-05-10 17:06:46'),
(18, 'NULL', 'bb02a4425014675f249fab607f94c9257e8cee505616f321a06b2c875befa0f60849fc0ef5d5ea1fa1b3bd0471e4a2b491b1d15d5425fcca7a8eb2e752884d6c', '2024-05-17 21:08:49', '2024-05-17 21:08:49'),
(19, 'rubem@gmail.com', '1890cb96cac3a37b5b7f753d33f4b2d6af936cf7c8a103d39d0c76661362fc8cba880d28be0ecfe7f8a9a499ac8e0331c537be72517cd086194065f39534a54a', '2024-05-20 01:54:56', '2024-05-20 01:54:56'),
(20, 'ritacassequel@gmail.co.ao', 'cb5185dfc77d1c85ff4e7b6023968898654c39216a99794aca1ef305335ed5f99ef423829d72a0b426257b1d99b472b881c38ffbd0a222e9419203d8f12377ba', '2024-05-20 10:38:17', '2024-05-20 10:38:17'),
(21, 'ritacassequel@gmail.co.ao', '1f59e2757cabff5ff15e97f24b245e872667799ce5ad235cdbe998db33bbb7114f9fde0a386d33665d0ae912982295bdcd57abb75e6648a59fb1aac22fd3e7a3', '2024-05-20 10:40:04', '2024-05-20 10:40:04'),
(22, 'sanda@gmail.com', 'cd3d48823bffcbbcf2e600a9671d0d0948d60d0475fa95880dcfd642765fcc60b8fcac12d4528b68e1a9204c679644582d1255bc27682b599875359c08da8188', '2024-05-20 10:50:21', '2024-05-20 10:50:21'),
(23, 'mucuenge@gmail.com', '59636551774920853188ab6f1027fbf3da80995ad531666fb5c5eb977d947a9ea270da26f688aaa48b725c5b4571b667f380e4210ca753e2aa1a754a7e969ff4', '2024-05-20 11:36:04', '2024-05-20 11:36:04'),
(24, 'sungo@gmail.com', '2d3d95df3177bc996262439f55334bcc1e0798b2d9266ed69d78643b08ee3e4d13802ec1f7d365ce73d5f69e8a8ea4ce096cb7ced392329489791bc91b2068ca', '2024-05-20 12:01:51', '2024-05-20 12:01:51'),
(25, 'sungo@gmail.com', '32d18e483310ac495ca105461849b39c4c20361083a7e8dba91510302ec38d61cb2513e5c29ec5078408c234b16656ca93dac242d0a9830c2328279f84a66f30', '2024-05-20 12:07:22', '2024-05-20 12:07:22'),
(26, 'sungo@gmail.com', '382a0d8357819a285fba47a28b003d34090694b6989c68a301c5d22c686588c1d84a6a929d3356d7ea8f54c6a801f2301c8188dc69b1428fe1f8aecc2ff10f5c', '2024-05-20 12:27:46', '2024-05-20 12:27:46'),
(27, 'brigite@gmail.com', '941b2bebe7985ef7664e8fd43c7556a4669c4429ca353970d2ca2c49e8fad8b3f12ed55083d902bf7938f792cb571a488950af4d9b4bdf33bf17f4c44c1ae3ac', '2024-05-20 14:24:09', '2024-05-20 14:24:09'),
(28, 'caculo@gmail.com', '81a70bd5c12dba7081d76a1a4f63db916310700df6782510397ab7c61157800afca8a446a3144e12a64529c13d1cfea06547f46bf3f34004911416493a46b659', '2024-05-20 14:39:02', '2024-05-20 14:39:02'),
(29, 'caculo@gmail.com', '75d9acb23880f4e5403881fb95cd193ee68428c0909ac88cb9ba9d247c15c5e7b1a4df03fd8eabe281c331a9660e78f6f1976aa5fad9ce3dbeebad21c3c8f635', '2024-05-20 14:42:51', '2024-05-20 14:42:51'),
(30, 'carlos@gmail.com', '26824a00563ab9142e83ce1738b4a2c31b41461e5ac4f31da632ca7158696b200b31a83124c418b8651ec7dd05e368a436ece94aec19f000e93c467867febd66', '2024-05-20 14:45:43', '2024-05-20 14:45:43'),
(31, 'ribeiro@gmail.co.ao', '91c5ca26e78fb837b1ce301cb2b966c853e4a7e78b23f4ee01a012423fc77d74ed4e14016870ca44befa8c770fff22353e6bf62627a2b3404920ec9e3069cea1', '2024-05-20 14:53:52', '2024-05-20 14:53:52'),
(32, 'sebastiaogarcia@gmail.co.ao', '2d3aedc7f5cf2125bea02c3bd0f2fcb1ec0980b88afe63cc5e2e2910a13da8414d9fee10442206ed73f3e90f1ca28dd4fae60a706da18a2c60b578fc66c2ca42', '2024-05-20 14:55:20', '2024-05-20 14:55:20'),
(33, 'silva@gmail.com', 'bcdeee73a93968e6a7b2bf2cdf4c184ce6cda294a8add4ec03cc79668a160cb822203a11f7b3816372c7453a88ebbf95b628a6f64fa1b1027d16eefa80dab89d', '2024-05-20 15:16:08', '2024-05-20 15:16:08'),
(34, 'silva@gmail.com', 'f41fc7615f2782adfe1ee67d645f44cd469d5d898782b48ad83eac6827c9dca3b324803b5994a1ff2a5be6152988017f0db8221e2c25ea9cfdd14b3f57fe32c2', '2024-05-20 15:17:14', '2024-05-20 15:17:14'),
(35, 'lucia@gmail.com', 'f9373571f02544143115cb7f1eee3fd34d92260c5eb1c6424fe6bd5d4832b190bfc3447d7dad793efd67e4ae3f497c7dd81ebb8abcd56450bed73c578f7b0040', '2024-05-20 15:20:07', '2024-05-20 15:20:07'),
(36, 'cesaralmeida@gmail.com', '75aa551998999ac3f198095452ee24af0f8b25c5fe3da7af78c261021c0b042e32688ee223d8e75adc18aef8cbf836534db5de7d8b85c93afe9d1c4337f385fc', '2025-05-20 23:40:04', '2025-05-20 23:40:04'),
(37, 'gaspar@gmail.com', '6f82efad291efc7fbe7cd9d10526ace226764ad12827e937adb5f4a99cec745adea87dab229aa55d1391e8c8d4ad031c2c5a0d339788bc7285c66046c72b31a8', '2025-05-20 23:41:43', '2025-05-20 23:41:43'),
(38, 'carlosr@gmail.com', '8e7c1d78dbf85007498f6cec485d0c6b4df846fca8152a1c5ca927aa87543663e75640de235d7c75043609231cb79cf47ecab397929eb163b9a1d759e63db1de', '2025-05-20 23:43:39', '2025-05-20 23:43:39'),
(39, 'gesolon@gmail.com', '4c9e531aa657bbed5f46d2642c25ef08f69d7a94443f2cd35b9fc699d32dd6d04a0248323c5b11589fce5bb22e3504927315b2ed02e0e62cd95e9fbc6344d761', '2025-05-21 04:32:59', '2025-05-21 04:32:59'),
(40, 'jorgina@gmail.com', 'eee558bda95034e6779ef9683a0078a5b31b20cbc4454612c343842e0e6f214c4215df90f5ef88e94e2d44a9742c52822ce3322060d34e40ed6172a695a3e265', '2025-05-21 05:08:31', '2025-05-21 05:08:31'),
(41, 'merciana@gmail.com', 'dbca6baa9939b728b80e770588808a1c10d20cf02550f233ca94bdadaf3094d3ce9b9204821f968ce02522e694364f38fe68bc1eab565b8da030501704bf8321', '2025-05-21 05:44:50', '2025-05-21 05:44:50'),
(42, 'bismuto@gmail.com', '0906fc481f5eabee0e7f450147b79257f090fe8b81fcd76a285675ede2b827cd350fd8970813bfe860a752097367ec7982a72ed51e5317ed5aa0f11b8cc4a95c', '2025-05-21 06:18:24', '2025-05-21 06:18:24'),
(43, 'bismuto@gmail.com', '290b9aa0890d260ee8aa96f5eafa6bd0d8651de423564b616a79676e9700179d5ba27e6c225d6f87e9651df491786de835c39d2b3ee7c5ce67358e31dc74e89b', '2025-05-21 06:19:51', '2025-05-21 06:19:51'),
(44, 'bismuto@gmail.com', 'bf1474784c9ff48f1e6962793de1dc29886a30a1d4b247d4b3e6e1165f11992f747dbb34315ffc2e621361a018171f9188db83444614fcf7427c33b3693bfc86', '2025-05-21 06:21:04', '2025-05-21 06:21:04'),
(45, 'bismuto@gmail.com', '2b6f01706e2ba2e77c3306e7be94a1a205dd65aa2539cec949075143b24045c35aadf8b534b62d0691b5baf492c1993c333a43d72cdc1f5580cc815b7c114015', '2025-05-21 06:22:29', '2025-05-21 06:22:29'),
(46, 'lorenco@gmail.com', 'ebd597c480052f3e7498441ffd5fe1abf36d8a7608e4d0310d2ea45179867e1424d8063233b1cf48d835267e34ddf2b074dd947d96d32f92f812b2f79e90a2cf', '2024-05-22 23:10:01', '2024-05-22 23:10:01'),
(47, 'anadias@gmail.com', '425993510d6bc4abbf21324b22095fc7dd05fd8caf3a435227e44008e424c19f7b7ad03eb2357c35fdfa701ec004ce0450512d3a385a0e584ed80ff07a18a739', '2024-05-22 23:11:04', '2024-05-22 23:11:04'),
(48, 'mbenza@gmail.com', 'b2aaab353d343dbd3ee8a445f7c718b236a82055757144b2c96699a6e0c4f00856738ba0335d44bd404e1114fa9b167df9eb95b29031d67aff9efa995b3d5a9a', '2024-05-23 01:42:27', '2024-05-23 01:42:27'),
(49, 'boantumba@gmail.com', 'f6277395d7d29ab90d1fe77aee361eb9121760f665b60ff03efcac6e337091ac9af706046e177f3bb31cb13e704e5b32fbea47b3d22fe9aa7be614eb348e7fcd', '2024-05-23 01:48:35', '2024-05-23 01:48:35'),
(50, 'gelson.cri@gmail.com', '9dc1b19d8492ce763da4994b6aa40389a744cbf09b98d965f28620b9d73e21ea8f0f82740ac787bc69f7b88692716df665afc188f14e3d7973469e522ec1def2', '2024-05-23 01:56:58', '2024-05-23 01:56:58'),
(51, 'salomon@gmail.com', '572275040ce0025f2e24a4032b30aef6801699b8d6f9ff49ba699f59bb48b4cd6fd669bbaca237b26aea84d27b6ddd1468ac18c732828ddd3643c47a35ea7dfa', '2024-05-23 02:41:57', '2024-05-23 02:41:57'),
(52, 'bornito@gmail.co.ao', '7d10bc903a90a813c6d6bd886db13d7082d9ac0561b50a2af50f7751a609db43aa097cbf1baf5ddc6a10cee2969309794f5af6d7878a0f0ca7ad94994074c574', '2024-05-23 02:48:18', '2024-05-23 02:48:18'),
(53, 'valeriamassungui@gmail.com', '051107376e091f6695356708307f14b806aaa802970091962d2f33d4ed5ace794d176f3f5b29e676ba203aeec4efad58ca3c15a04ffed6e73a4e9cf94984ac87', '2024-05-23 02:55:01', '2024-05-23 02:55:01'),
(54, 'madalenamassungui@gmail.com', '2112ad94b98c22ebce154d86141f4b0426d7f00333002b8f6d50768ce677214673311559a73a90dd2a78793e6f781517edf25864fa3a9adc58b847bf121512ad', '2024-05-23 02:55:41', '2024-05-23 02:55:41'),
(55, 'satos@gmail.com', 'edd59f7da342ee7c76c2d074601910ece7597c429fef724a0c8b45f71195418c49ae9702489437427937b77cf692386c9c31c81bfc87b1ae7247eb1ce4ffb6bb', '2024-05-23 03:00:40', '2024-05-23 03:00:40'),
(56, 'hamiltonmualenge@gmail.com', '21e16533d54e2dd64838b212835ba5819ac9fb6722aba806abf8d3f38e225ffbf04bac97a64e52c09d8eaf8ad8a98257e5d795df5c240da82d4079ce064a93c1', '2024-05-23 03:04:47', '2024-05-23 03:04:47'),
(57, 'mualenge@gmail.com', 'f7d9597a0c5ee88b5614c56944675f85d946c0fad7c42ea9c63c96c7eb110a4c478933f930298ae2bc6466a8fa664db0691b7c8fa4b4910f58b8406c3a4b6c8b', '2024-05-23 03:06:45', '2024-05-23 03:06:45'),
(58, 'jocas@gmail.com', 'dd7590007a1df756d29d69f210d6e7b0eb5857145ff8ac87cae0f7e6f017e6b455c93c68e4a03e3e6889a57e5abe296688da584c6a382d136c5535a43ab8d22b', '2024-05-23 03:24:15', '2024-05-23 03:24:15'),
(59, 'joca@gmail.com', '64178c617597f689dcde63ac765e59f5f88adfe5ff4705c6bbfffa34b1ce7040dfce6a40fb09ab79ccb222b09437e98b0bae132c7bdcbfb9f03b37cb6c0f827f', '2024-05-23 03:24:54', '2024-05-23 03:24:54'),
(60, 'teste@gmail.com', 'c443652f729486b9736d6baeb8314e2ec84b84e3b61f04f3bc144440cd5236f4ef806078a9e7561648f053c4b39ff6e132b45eb95780a3599362ea70bb1c7f24', '2024-05-23 03:41:25', '2024-05-23 03:41:25'),
(61, 'teste2@gmail.com', '07a7332c2b5e53f0e48674f5263cc79d5753e9120fba65d85a47be4c19029dbdade649fb14be8dee67d6ed7eeba3d5f6a8c8734f05b2d266d016d3c9b1909347', '2024-05-23 03:42:15', '2024-05-23 03:42:15'),
(62, 'teste3@gmail.com', '71187b8f999f941305e7cc9a0bbdf7c583a24d4381982c7d14333cc66f3565792ee087e4dc09f33fcd7956cd0894abd972fdd44efb776d8a6022c81f5dadb78f', '2024-05-23 03:43:21', '2024-05-23 03:43:21'),
(63, 'teste3@gmail.com', '2d980caff7ec47df895f6211fd9c2ff937d5ef13c537f066a6d248730b5d2a1d2f3295e54f51a02eb3cab873653dcd8c51889e7c5e5db6bc81302292e5f5a944', '2024-05-23 03:44:38', '2024-05-23 03:44:38'),
(64, 'teste3@gmail.com', '6d38dfc68bc5d1c4ec611053ff6673502222f4dd234030a07e8f92520cae0eb5f44a7be236a0e9159d4ab0167b81404889c577dbdf479e96931436fdc46b8b95', '2024-05-23 04:44:10', '2024-05-23 04:44:10'),
(65, 'teste43@gmail.com', '443238a759138e77584363cf79849cfa786b0bab6b7df827d52eb77c67e3c726c329bd0766bb5a01c34823ddf3f4efaebbf489b8f2abf528872c871ab0b769d1', '2024-05-23 04:45:28', '2024-05-23 04:45:28'),
(66, 'teste43@gmail.com', 'f2c2276880d8b81270a329b54e51217c056509ab7e95f87431a3ec812be7cc0c3f362144e84024ba78a046e8d76918c977cf8f4956f09e5869adc0ce431954a8', '2024-05-23 04:48:00', '2024-05-23 04:48:00'),
(67, 'teste43@gmail.com', 'e488ee6ccb0aaaa346f4b6939b1a476b21605cbc95ddc9de52be7692aa1efb60bdb1c9ab6ca5f7e0d638bc9485c397c7a16310054ea77e234742d07c37e8ef39', '2024-05-23 04:49:26', '2024-05-23 04:49:26'),
(68, 'teste43@gmail.com', 'fe14103be90bf69fe36c60d46108dee36a7cf686ebfc1846a2412df1002adffde65d94ed6c91531e041c47ac8d39a8c6d56307b4acd821c4fb49c4e9fe92ea41', '2024-05-23 04:50:33', '2024-05-23 04:50:33'),
(69, 'teste43@gmail.com', '630adef7685042b05cfaded4cbf98c0bbbebfbe6f53eee800465790702849083219d551bbb67ef1858145ad7d5625fdede555564d3aa0b72c836d94e082a722a', '2024-05-23 04:57:36', '2024-05-23 04:57:36'),
(70, 'teste43@gmail.com', '993c51727c69e2b9ccd108a737f240291878e45a50ac53ddd51d7196c758680e0bf550e19032139e868c5a033816c542dd243a3b9b374c80fbbd067c681a796c', '2024-05-23 05:01:49', '2024-05-23 05:01:49'),
(71, 'gels2021@gmail.com', 'e0850cb9d147d2d9c16ddc79431d6485f2722d439a81d672992257cefaee9c241eb49b5f3624d127ffdf93179039967e427ffae8fcaa011e2469e351c18da02d', '2024-05-23 05:11:13', '2024-05-23 05:11:13'),
(72, 'gels2021@gmail.com', '01da6dc4082ff5466b16e59b06205a6c491acdd54d84aa37a5bb0d3ae56625e364d77282456abe282a2504c47472aa1477b8ec2dad768250be11810bfff569ac', '2024-05-23 05:18:58', '2024-05-23 05:18:58'),
(73, 'gls2021@gmail.com', '381e92636d39ba054fcbfbbbf984d2e17d338dc4a0742a527444a77090dd846b9a013b7a25bd1db684c08813dfd843b553f8e95056048a09f628cf2cc90fd8d3', '2024-05-23 05:20:06', '2024-05-23 05:20:06'),
(74, 'gls2021@gmail.com', '7d9f896ab3ea61b25ac5d6e907787fd1b8b6cb002c625219838557e48f29b4d57727f1f483fb3bb7c90c1667a68e8511cc825e0a7a11a20d9b76c6fe1e5ea8ef', '2024-05-23 05:21:26', '2024-05-23 05:21:26'),
(75, 'gls2021@gmail.com', '4fc3a94a2985630e4d822cdc0ab95621b42a82dafb6b5f579b4c0edcfb6031d1cecde725f55c9df2fb5a7a0f39629f9d5f7cac6993e3f6760c9e2fdf50ad1a37', '2024-05-23 05:24:48', '2024-05-23 05:24:48'),
(76, 'gls2021@gmail.com', 'ae429af5caa8ad4803f2fbe95704d12edbec7cf162653cd23cd033e8b41e0a2ff2105f7efca65f2dedbd1e27ef25f97c5100cff9be4f9ae86ad1020e5352acd6', '2024-05-23 05:41:25', '2024-05-23 05:41:25'),
(77, 'gls2021@gmail.com', '3223c569a797c262b6816f13b168ec44a554278e851255ec8d26e4d4fa855e312756370b48f2d0e3713e8d35b78faa4698fd5c95257b7accc3b5819614eed315', '2024-05-23 05:46:58', '2024-05-23 05:46:58'),
(78, 'gls2021@gmail.com', '01fdc03d8acd95eaf06c321ed4bf185314674ab6079036c8891313e01669f4ad593e281aab991548d56ad2ac58df42d1432d3dc8efca6dd797aa481e798ec17c', '2024-05-23 05:47:46', '2024-05-23 05:47:46'),
(79, 'gls2021@gmail.com', '2c0694287d1a522b24d1e97657b1a3c86fe110c81d1a7c55f993de5340963ce98cabfe031ed8949ed421f5e8663c7006006b830fdc1baccf19c176b4322ac35a', '2024-05-23 05:48:42', '2024-05-23 05:48:42'),
(80, 'gls2021@gmail.com', '92aebd5d9054893534079024a146544653f985f9bc9ac45ee57e2fff951aabccfbd26051ba64d558276620f1b8998f886b4449eca67adfd0380e69645614731a', '2024-05-23 05:49:19', '2024-05-23 05:49:19'),
(81, 'gls2021@gmail.com', '3e3f608b08b804274c49c706f3e778ca6c80309e231fbffd49fa6dd1e2dc426ae8d17310589471e675b53860dc533debb54a993df6a764edea29f12df2342331', '2024-05-23 05:49:55', '2024-05-23 05:49:55'),
(82, 'gls2021@gmail.com', '787b50c3b194dd2efa89006fbddfeff6be7a25a3ef6a6ed054f2ef9591b590e64e4b7abc8d7edc782c4fbc39e5b303bbccd9e10622a7cdacbdbef80238c6c570', '2024-05-23 05:52:30', '2024-05-23 05:52:30'),
(83, 'gls2021@gmail.com', 'c8550b5c2e0c86c3a96ae4534f64df55f33dab49b17701d82951eb1a0a8cb9a53cd137f71fa3569276ec6fa01007a34127dfec214014f2a858b03363ab29ee62', '2024-05-23 06:27:51', '2024-05-23 06:27:51'),
(84, 'gls2021@gmail.com', '7779ba8d218c99670c0da0beee9b67ff5605433e92b5a958e0bd121c5b14ca6c26fa39aac9009b351819969e2ed536501304a268457e2bda3198662ab4b0cc45', '2024-05-23 06:28:13', '2024-05-23 06:28:13'),
(85, 'gls2021@gmail.com', 'bdd6cd904cdc8b7da85d3d5b23ee5fdbe8fc6ae86c1191e846da5c1b9be4a77f6adfb2821b59a6f6eda398953c23ce291c25e2f384265c98cd23d42e1f685cbf', '2024-05-23 06:31:31', '2024-05-23 06:31:31'),
(86, 'xxxxxx2021@gmail.com', 'ce776812d22b7f9e097dbb1ffb9013e135ea6a1b6636af39c3f9530b4b2582dfbd874a281d5e4774438e7caab57f8d19f54bde17bef3b6a0b32f290bee4750c0', '2024-05-23 06:34:25', '2024-05-23 06:34:25'),
(87, 'yyyyy@gamail.com', 'af52f0651b8d7f04d498152a662899e75023e401af082745cce277b43debdf3c17258f139e19c681bb3075920214027bcf67d66ae8eec7dd038a99c1cb8f2d86', '2024-05-23 06:36:19', '2024-05-23 06:36:19'),
(88, 'ghjjj@gamail.com', 'd42d9cd636dff4be1605fc6188d557432d879872a4be4a8e76df486f6bfa7785c4bb11796d0f56a75a1fca7e8f421d90716f2eb02320f03af5f196b2723fe9da', '2024-05-23 06:51:48', '2024-05-23 06:51:48'),
(89, 'uuuuuj@gamail.com', '8cb790e08387aef8d94cf29f4b950f2f3bf60a4b1b743dbae53c7fbf0fd23d5c51c78c08c7652be45764cd9791ca1ef49f7f58f0c7320bd1d3d85930054e666b', '2024-05-23 06:53:08', '2024-05-23 06:53:08'),
(90, 'uuuuuj@gamail.com', '19e2ffe8f93b1329fd296312362744e893d556600f2f1f2a9819be2420090d0e05992a2ef039a79830065a352c3ac11b39d0dbf627126196f128315c5fd4e899', '2024-05-23 06:53:47', '2024-05-23 06:53:47'),
(91, 'jjjjjjj@gamail.com', '4488d0631a647992623b44c9a7cc80ee94e7d6e68313277cdf0662d66d209b15cada9b882d36570c45cf25f0042b7112032c5fea63c587db72a34250e3b1bb92', '2024-05-23 06:55:05', '2024-05-23 06:55:05'),
(92, 'iiiij@gamail.com', '9daf5103082d073e4ccd1e6b69937b918314ee38555bd35ca617c8f9524d749ea72f092ec3a1d87dd99c27cae0a3f8eb7ae11b0c6f86be82cd1d825e24ed500b', '2024-05-23 06:55:52', '2024-05-23 06:55:52'),
(93, 'hgfds@gamail.com', 'dd6ad660e444ea6975ff1da35dbd01d978949a6d95d26e7bbf9c8f72ab5b801e7eab3d365924d09a1653edcff5f4f687a41133b48d2909fb49421b53e19495a9', '2024-05-23 06:58:00', '2024-05-23 06:58:00'),
(94, '0ds@gamail.com', 'e33b6bcb7af9426e475183dafc663cac78edabd92c30955a2c1cc9dd6f0de6eb2c6a4265096cdb640b92a057e5ef5cc022fbb84502ab89843a3dd9ee3a40d783', '2024-05-23 06:59:37', '2024-05-23 06:59:37'),
(95, 'abcd@gmail.com', '7a4b1125d973133be9ab12499677baf8611675180a79205c4c5050adac3d59a68afb873f4901f14c93769c9324bbf088dc2350501e1c929200078d7fab8b5547', '2024-05-23 07:04:49', '2024-05-23 07:04:49'),
(96, 'fermando@gmail.com', '9e97d7d1ee6cf28ffee9c6b78982692a8bf58faa7562b083523fbefcf3cf2e27cde2e5635a027fd0dde13d98f0c7c364de12b4cfc294af4671f59270b8466921', '2024-05-23 07:25:53', '2024-05-23 07:25:53'),
(97, 'jualina@gmail.com', 'ca5cb17a29d9b20b236a604737fed01ede9c54468dd07d46a79bd9ff4b66af182d55bbe42fdd0d7f64a7ce399a780fd0f6e6827c982bbe3326b761bdd7eee1ff', '2024-05-23 07:29:30', '2024-05-23 07:29:30'),
(98, 'julainadk@gmail.com', 'faec951d2c2c1be6b6032bdba02a23da6762d203d68f2702ec98b3b703ef32ab73d84d748bb670402f93b236bb7f2176a3d93729d653fd72131de48e6e359a4a', '2024-05-23 07:31:54', '2024-05-23 07:31:54'),
(99, 'maissungui@gmail.com', '38e999a0489f19821fd88a2705c79d8a85a70fa623e4fd08756281eb25bfef6130300ebf1cf3b9042e808a1e3f578d2808feed4fe945e0636ea0874702af60ce', '2024-05-23 07:38:02', '2024-05-23 07:38:02'),
(100, 'luziatonod@gmail.com', '0a671826f233bfb83dc38b48e34f5bb8ad4879c5d503a84db368ab0032f5aeba7d3a7bf228a296f071b6b206f8ce1170f4032197cbb527812847bda621cffb0f', '2024-05-23 07:54:59', '2024-05-23 07:54:59'),
(101, 'luziato@gmail.com', '36ec816fb7aa3f718c5fa528b2f49c490c06ddb9e9577f0e17299454a7a3ae2db6148fe15022cd248da3c7dbdbd159ceb4e59112b81e32cc19c38b2d084c9e64', '2024-05-23 07:57:59', '2024-05-23 07:57:59'),
(102, 'sdfkjklsdjf83ato@gmail.com', '0bdbe8cc850ea0aeef6f672614b717fdb36dd044cfdb635c6ddde1118c3bd173d69d671421c129434dfbdfde384311316882bda35658d964940e904fea76c57d', '2024-05-23 08:01:01', '2024-05-23 08:01:01'),
(103, 'matodto@gmail.com', '912b2bfa442f30b07eb1fc9abefc6bfda12546fd1b91c7af3b6329589fa7d6e8cd012b0ff4494d729cbbec51efe122780b4b348678cddc1db902f21ea346f428', '2024-05-23 08:03:16', '2024-05-23 08:03:16'),
(104, 'matoto@gmail.com', '31fc26086525d82ea16c2f57af53f2bed68a5f3d813e193ca31985280a1644ba5ed66425a67f7c348562591aca4720594d567d2fdb0a17ec2b47e1276589ef57', '2024-05-23 08:04:53', '2024-05-23 08:04:53'),
(105, 'matoto@mail.com', '75c763a35cccb193cbe192c749155402c0299b89720c0765e058f4b0d3c058752014472600713b7489cd176912a67e869293c4ae39dd34e513d63fab666992ee', '2024-05-23 08:08:18', '2024-05-23 08:08:18'),
(106, 'santana@gmail.com', 'f1ba4beb484b694078083c3feed3479ba2fe6d53b8436dfa56fca2902c334600cdd964774fbde2494cdb62f67302194e32fd592e812ebe086f2bc5651ad9ba10', '2024-05-23 08:12:44', '2024-05-23 08:12:44'),
(107, 'cardoso@gmai.com', '8c0d2f0845c56004bb5dc2cf674534638177bdb7fb6341ea2087e00988a40e2990366e5a15d2a9deb2ab87e8649633ca08afc3ad321942ba3d36fb851b17b628', '2024-05-23 08:21:54', '2024-05-23 08:21:54'),
(108, 'cardoso@gmai.com', 'e6945593ca4d1bbedde4de47e77c9714bcf1109024deb4eaed934b25289c5f8a5264f483eeca04ddf26eaa23584e9ceb144c52bf4dba60949bde0b73e6069f48', '2024-05-23 08:23:46', '2024-05-23 08:23:46'),
(109, 'maguida@gmai.com', 'abd499864ace40ebe587544718b9360f1fdd1e0baafe6b9f00b38d06c45e9bfd9b103de7c1fc6eed3e58df448c53207f6e9db012193431e3aafb660188797e14', '2024-05-23 08:24:28', '2024-05-23 08:24:28'),
(110, 'maguida@gmai.com', '49094b24dc5d23dcf034d6fdbe6bac04ab1f25a1576f4b190338325d9a83e0c2f77d147a01fb00f5cee68e235464dcd13ede4105c58987ad97d5cb742e61c50b', '2024-05-23 08:26:30', '2024-05-23 08:26:30'),
(111, 'maguid@gmai.com', '7da3ae88bfdbf3f506bf7f52aee5eabdb8338f494854f9ede89f6ac1a217ec90e5fe0e58eeb463c7b04ce2d0df830dfedf658b88453782c39640f2b204578991', '2024-05-23 08:27:22', '2024-05-23 08:27:22'),
(112, 'maguid@gmai.com', 'aa30a3c6c12cc8204173e4bbc6859349c0da8d88b62855c0e2a5ac4a9d8763e4d9d61d404aad03450f2e35b0ee0da9b296104c0356a6b98b52d186d70f662561', '2024-05-23 08:28:30', '2024-05-23 08:28:30'),
(113, 'maguid@gmai.com', 'bcd99a76802bd8e9b8b81440dcf1f54338d073ddbbeef2eb319af5c715176faefd2093a8f5a893eca2d4282f8c0e732b20cf0d791b8a052eb798be218ea8fb31', '2024-05-23 08:30:32', '2024-05-23 08:30:32'),
(114, 'maguid@gmai.com', '31b3d653d593e4831e99df4c40e8197f5d1d1e3023493453de61da23f0ca5f1b05a0971bcb2528acbab3c57e72c408dbc977a1a5263810953f38d7a8ec8b4ea2', '2024-05-23 08:33:51', '2024-05-23 08:33:51'),
(115, 'maguid@gmai.com', '271df945311fac8f3b33513f647341d593e69a3877ebc2baa62a968945a6a246cd94f7b9aebe4c3d79a27c14d9acd33f98cc58a94ad332f133899471d5d39631', '2024-05-23 08:35:17', '2024-05-23 08:35:17'),
(116, 'maguid@gmai.com', 'df3c04deecbef88bd8614fff0bef0c8d604c5fbbd1d33f57ece14bc3c98a3313f4e17fb05f4686cdf6dff1e3baa429797a4d24cda90a6b71ca3b2ce058722c15', '2024-05-23 08:36:30', '2024-05-23 08:36:30'),
(117, 'maguid@gmai.com', '418ec698ecea66a4b2f60db1bd5cb5238b748d8906b73b2a45ce1746a737b36af21c780cc821b71137866c3215e1c49ebd16ac1d32bbfe4a5a20f914aa7be868', '2024-05-23 08:37:23', '2024-05-23 08:37:23'),
(118, 'maguid@gmai.com', '58f5785936c1cb8e9bc74be4a83f949e9fd72c865e3dee627e432f78f1b79a204dc46612de4f88eb8136f2fa7831457e4d3d6ed985d548dec9bec75ddc6473e4', '2024-05-23 08:39:58', '2024-05-23 08:39:58'),
(119, 'mauid@gmai.com', 'd8fbe24a863d24cb47d2b4e237bf4b9269199f09c53ac841413c5b892e3256a2530f9a611eaa3e2cd327d6c6439e735d30f07767115c8b6c2ed2b505d03c750a', '2024-05-23 08:40:20', '2024-05-23 08:40:20'),
(120, 'ma@gmai.com', '6fbafa4b42d475cf142ee442cd6c429b3b16f798cd504cc84d76ca7fa9c2a05fd29845160bd9320a72b18109174acada0bf4bf77100b72ae94415e81ef82b32f', '2024-05-23 08:41:51', '2024-05-23 08:41:51'),
(121, 'ma@gmai.com', '3c8906b0ee72f63781442f6cde1cde32597560b4b1fd9017edaa61d27b3c57db32169663ef7b71d98aaad83a1a66c3bc54579cf5fb7c8a45266421bf683cbc95', '2024-05-23 08:44:26', '2024-05-23 08:44:26'),
(122, 'ma@gmai.com', '1afb7a11fd9788f92eb8387ec5f10b0608f2ec80c92186d9cb203357ee319f8389c9948318edb0067d823623fcfc9a0db10d2e8d0aae565bba77d36674de896c', '2024-05-23 08:47:50', '2024-05-23 08:47:50'),
(123, 'ma@gmai.com', '57289f39178c9f8c59f685e0e0019fbe921ba5761d9801012e12c94547a26a8461468a502b0ca3c7e022c8fcdc1bd3e15071c7345fd6dfe1ee3757b0d441a05e', '2024-05-23 08:49:57', '2024-05-23 08:49:57'),
(124, 'ma@gmai.com', 'baec207476b14ac24caab816ff6578ef2efa71d87e4109c9c71119dced89e9bf58e3c7b4121575d1d562b01d466230db4ecd6d77537fa74354985f622d7fae76', '2024-05-23 08:50:37', '2024-05-23 08:50:37'),
(125, 'fotoa@gmai.com', '2642f3e830f0861f65457d5ce143406b361a0194425b44d5b92214cd5e82d138cf503a90a06dcd0d3566786b15ae0a7012f8ea745ba0cc3b73333bbd4eb60cbc', '2024-05-23 08:51:42', '2024-05-23 08:51:42'),
(126, 'alda002@gmail.com', 'b2e2c54c8d491b85bd8981579d844915069ecc3e61b0b7e1f193f4b6c5258698dcfb395e708f561d9a568d8139241f089b35098462f3044d0e6af52fd25d3844', '2024-05-23 08:54:40', '2024-05-23 08:54:40'),
(127, 'alda002@gmail.com', '67a04fe6738ac10820f9173d630bf301253fba49d6615339aebe53cce1caea111ce11e47f5180b948714b389d1e01f675eb1087b001239a870ac298376777ae6', '2024-05-23 08:55:45', '2024-05-23 08:55:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_ocorrencia`
--

DROP TABLE IF EXISTS `detalhes_ocorrencia`;
CREATE TABLE IF NOT EXISTS `detalhes_ocorrencia` (
  `id_ocorrencia` int NOT NULL AUTO_INCREMENT,
  `gravidade_ocorrencia` enum('Baixa','Média','Alta') DEFAULT NULL,
  `status_ocorrencia` enum('Aberta','Em andamento','Fechada') DEFAULT 'Aberta',
  `solicitante` int DEFAULT NULL,
  `vitima_situacao` int DEFAULT NULL,
  `tipo_ocorrencias` int DEFAULT NULL,
  `horario_deslocamento` int DEFAULT NULL,
  `orgaos_apoio` int DEFAULT NULL,
  `data_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ocorrencia`),
  KEY `orgaos_apoio` (`orgaos_apoio`),
  KEY `horario_deslocamento` (`horario_deslocamento`),
  KEY `tipo_ocorrencias` (`tipo_ocorrencias`),
  KEY `solicitante` (`solicitante`),
  KEY `vitima_situacao` (`vitima_situacao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

DROP TABLE IF EXISTS `equipes`;
CREATE TABLE IF NOT EXISTS `equipes` (
  `id_equipe` int NOT NULL AUTO_INCREMENT,
  `nome_equipe` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nome_bombeiro` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `matricula_viatura` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `equipes`
--

INSERT INTO `equipes` (`id_equipe`, `nome_equipe`, `nome_bombeiro`, `matricula_viatura`, `data_criacao`, `data_modificacao`) VALUES
(2, 'Equipe-guarni&ccedil;&atilde;o-alfa/23-05-2024-08:', 'Juliana Sergío , Teste , Mualenge , Thomas Nt', 'Veiculos-alfa/16-05-2024-09:16:32708 , Veiculos-alfa/16-05-2024-08:54:52489 , ', '2024-05-23 09:44:27', NULL),
(3, 'Equipe-guarni&ccedil;&atilde;o-alfa/23-05-2024-08:', 'Guida , Luziana Cardoso , Santana , Matondo Vantunda , Massungui Tsingui , Juliana Sergío , Yyyyyttttt , Teste , Jocas , Mualenge , Hamilton Mualenge , Thomas Ntimba , Madalena Massungui , Valéria Massungui , Bornito De Sousa , Salomão Dos Santos , Gesloonj , Boa Ntumba Massungui , Mbenza Madalena ,', 'Veiculos-alfa/16-05-2024-09:16:32708 , Veiculos-alfa/16-05-2024-09:15:28440 , Ve', '2024-05-23 09:47:25', NULL),
(4, 'Equipe-guarni&ccedil;&atilde;o-alfa/23-05-2024-08:', 'Guida , Luziana Cardoso , Santana , Matondo Vantunda , Massungui Tsingui , Juliana Sergío , Yyyyyttttt , Teste , Jocas , Mualenge , Hamilton Mualenge , Thomas Ntimba , Madalena Massungui , Valéria Massungui , Bornito De Sousa , Salomão Dos Santos , Gesloonj , Boa Ntumba Massungui , Mbenza Madalena , Ana Dias , Merciana Marcos , Liriandra De Sousa , Brigite  , Sungo Afonso , Sanda Ndombaxi , Rubem Marcos 3 , Juliano Valdmir , Augusto Pereira Bastos , Ricardo Massungui , ', 'Veiculos-alfa/16-05-2024-09:16:32708 , Veiculos-alfa/16-05-2024-09:15:28440 , Ve', '2024-05-23 09:49:31', NULL),
(5, 'Equipe-guarni&ccedil;&atilde;o-alfa/23-05-2024-08:', 'Guida , Luziana Cardoso , Santana , Matondo Vantunda , Massungui Tsingui , Juliana Sergío , Yyyyyttttt , Teste , Jocas , Mualenge , Hamilton Mualenge , Thomas Ntimba , Madalena Massungui , Valéria Massungui , Bornito De Sousa , Salomão Dos Santos , Gesloonj , Boa Ntumba Massungui , Mbenza Madalena , Ana Dias , Merciana Marcos , Liriandra De Sousa , Brigite  , Sungo Afonso , Sanda Ndombaxi , Rubem Marcos 3 , Juliano Valdmir , Augusto Pereira Bastos , Ricardo Massungui , ', 'Veiculos-alfa/16-05-2024-09:16:32708 , Veiculos-alfa/16-05-2024-09:15:28440 , Ve', '2024-05-23 09:51:22', NULL),
(6, 'Equipe-guarni&ccedil;&atilde;o-este/23-05-2024-08:', 'Jocas , Valéria Massungui , Salomão Dos Santos , Boa Ntumba Massungui , Ana Dias , Rubem Marcos 3 , ', 'Veiculos-alfa/16-05-2024-09:16:32708 , Veiculos-alfa/16-05-2024-09:15:28440 , Ve', '2024-05-23 09:52:14', NULL),
(7, 'Equipe-guarni&ccedil;&atilde;o-este/23-05-2024-08:', 'Jocas , Valéria Massungui , Salomão Dos Santos , Boa Ntumba Massungui , Ana Dias , Rubem Marcos 3 , ', 'Veiculos-alfa/16-05-2024-09:16:32708 , Veiculos-alfa/16-05-2024-09:15:28440 , Veiculos-alfa/16-05-2024-08:58:43953 , Veiculos-alfa/16-05-2024-08:58:43953 , Veiculos-alfa/16-05-2024-08:54:52489 , ', '2024-05-23 09:54:47', NULL),
(8, 'Equipe-guarni&ccedil;&atilde;o-norte/23-05-2024-09', 'Madalena Massungui , Gesloonj , Sungo Afonso , Sanda Ndombaxi , Juliano Valdmir , ', 'Veiculos-alfa/16-05-2024-08:58:43953 , ', '2024-05-23 10:13:40', NULL),
(9, 'Equipe-guarni&ccedil;&atilde;o-oeste/23-05-2024-10', 'Mualenge , Madalena Massungui , Salomão Dos Santos , Ana Dias , Liriandra De Sousa , Juliano Valdmir , ', 'Veiculos-alfa/16-05-2024-09:15:28440 , Veiculos-alfa/16-05-2024-08:58:43953 , ', '2024-05-23 11:28:53', NULL),
(10, 'Equipe-guarni&ccedil;&atilde;o-sul/23-05-2024-08:1', 'Juliana Sergío , Thomas Ntimba , Bornito De Sousa , Salomão Dos Santos , Mbenza Madalena , Juliano Valdmir , ', 'Veiculos-zeus/23-05-2024-07:51:28190 , Veiculos-este/23-05-2024-09:17:32439 , Veiculos-sul/23-05-2024-09:17:02474 , ', '2024-05-23 21:16:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_vitima_dadosocorrencia`
--

DROP TABLE IF EXISTS `ficha_vitima_dadosocorrencia`;
CREATE TABLE IF NOT EXISTS `ficha_vitima_dadosocorrencia` (
  `id_dados_ocorrencia` int NOT NULL AUTO_INCREMENT,
  `tipo_ocorrencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `uso_cinto` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `uso_capacete` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `escala_cipe` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valor_total_escala_glasgow` int DEFAULT NULL,
  `abertura_ocular` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `melhor_resposta_motora` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `melhor_resposta_verbal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `obito` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_vitima_situacao` int DEFAULT NULL,
  `id_dados_basicos` int DEFAULT NULL,
  `Id_endereco` int DEFAULT NULL,
  PRIMARY KEY (`id_dados_ocorrencia`),
  KEY `id_vitima_situacao` (`id_vitima_situacao`),
  KEY `Id_endereco` (`Id_endereco`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_vitima_dadospessoais`
--

DROP TABLE IF EXISTS `ficha_vitima_dadospessoais`;
CREATE TABLE IF NOT EXISTS `ficha_vitima_dadospessoais` (
  `id_dados_basicos` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contacto` varchar(9) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idade` date DEFAULT NULL,
  `genero` enum('Masculino','Feminino') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bi_cedula` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `relato` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `endereco` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_dados_basicos`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ficha_vitima_dadospessoais`
--

INSERT INTO `ficha_vitima_dadospessoais` (`id_dados_basicos`, `nome`, `contacto`, `idade`, `genero`, `bi_cedula`, `relato`, `endereco`) VALUES
(1, 'Ricardo Massungui', '999383737', '1999-09-12', 'Masculino', '939393930LA303', 'Teste Relato 1', 'Bita Mutamba'),
(2, 'Francisco Dos Santos', '939373737', '1992-05-08', 'Masculino', '939393930LA303', 'Relato 8', 'Bita Mutamba'),
(3, 'Francisco Dos Santos', '939373737', '2007-07-12', 'Masculino', '939393990LA303', 'R5', 'Luanda Sul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_vitima_situacao`
--

DROP TABLE IF EXISTS `ficha_vitima_situacao`;
CREATE TABLE IF NOT EXISTS `ficha_vitima_situacao` (
  `id_situacao` int NOT NULL AUTO_INCREMENT,
  `local_lesao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `local_fratura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `local_queimadura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `febril` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `consciente` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receptorPaciente` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localConduzido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `orientado` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `obito` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `medida_pupilarEs` int DEFAULT NULL,
  `medida_pupilarDir` int DEFAULT NULL,
  `imobilizacoes_efetuadas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `pressao_arterial` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saturacao_oxigenio` int DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `escala_cipe` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `abertura_ocular` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `melhor_resposta_motora` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `melhor_resposta_verbal` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `bpm` int DEFAULT NULL,
  `procedimentos_realizados` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quantidade_vitimas` int DEFAULT NULL,
  `Escala_Glasgow` int DEFAULT NULL,
  `id_dados_basicos` int DEFAULT NULL,
  PRIMARY KEY (`id_situacao`),
  KEY `id_dados_basicos` (`id_dados_basicos`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ficha_vitima_situacao`
--

INSERT INTO `ficha_vitima_situacao` (`id_situacao`, `local_lesao`, `local_fratura`, `local_queimadura`, `febril`, `consciente`, `receptorPaciente`, `localConduzido`, `orientado`, `obito`, `medida_pupilarEs`, `medida_pupilarDir`, `imobilizacoes_efetuadas`, `pressao_arterial`, `saturacao_oxigenio`, `temperatura`, `escala_cipe`, `abertura_ocular`, `melhor_resposta_motora`, `melhor_resposta_verbal`, `bpm`, `procedimentos_realizados`, `quantidade_vitimas`, `Escala_Glasgow`, `id_dados_basicos`) VALUES
(1, 'abdomén , vertebras , lesoa , ', 'mão , braço/anti-braço , fratura , ', 'abdomén , vertebras , costas , queimadura , ', 'Sim', 'Sim', 'Lucas', 'Hospital(centro M&eacute;dico)', 'Sim', 'Sim', 45, 66, ' ,  ,  , imobi , ', '22', 77, '55.00', 'Est&aacute;vel', '', '', '', 44, 'procedimentos , coxa , perna , ', 333, 666, 0),
(2, 'cabeça , outros , lesao , ', 'pé , olhos , boca/dente , fratura , ', 'queimaduara , ', 'Sim', 'Sim', 'Massungui', 'Morgas(casas Mortu&aacute;rias)', 'Sim', 'Sim', 44, 333, ' ,  ,  , imobilicções , ', '444', 333, '55.00', 'Est&aacute;vel', '', '', '', 444, 'prodcediments , mão , abdomén , costas , ', 555, 333, 0),
(3, 'cabeça , outros , lesao , ', 'pé , olhos , boca/dente , fratura , ', 'queimaduara , ', 'Sim', 'Sim', 'Massungui', 'Morgas(casas Mortu&aacute;rias)', 'Sim', 'Sim', 44, 333, ' ,  ,  , imobilicções , ', '444', 333, '55.00', 'Est&aacute;vel', '', '', '', 444, 'prodcediments , mão , abdomén , costas , ', 555, 333, 0),
(4, 'coxa , perna , lesao , ', 'costas , olhos , fratura , ', 'mão , braço/anti-braço , perna , perna , ', 'Sim', 'Sim', 'Ricardo', 'Morgas(casas Mortu&aacute;rias)', 'Sim', 'Sim', 444, 222, ' ,  , mob , ', '333', 222, '999.99', 'Est&aacute;vel', '', '', '', 2222, 'proced , coxa , perna , ', 444, 333, 0),
(5, 'coxa , perna , lesao , ', 'costas , olhos , fratura , ', 'mão , braço/anti-braço , perna , perna , ', 'Sim', 'Sim', 'Ricardo', 'Morgas(casas Mortu&aacute;rias)', 'Sim', 'Sim', 444, 222, ' ,  , mob , ', '333', 222, '999.99', 'Est&aacute;vel', '', '', '', 2222, 'proced , coxa , perna , ', 444, 333, 0),
(6, 'abdomén , f , ', 'abdomén , f , ', 'boca/dente , q , ', 'Sim', 'Sim', 'Marta', 'Hospital(centro M&eacute;dico)', 'Sim', 'Sim', 14, 1, ' , eee , ', '11', 33, '11.00', 'Est&aacute;vel', '', '', '', 44, 'fff , costas , ', 55, 44, 0),
(7, 'abdomén , f , ', 'abdomén , f , ', 'boca/dente , q , ', 'Sim', 'Sim', 'Marta', 'Hospital(centro M&eacute;dico)', 'Sim', 'Sim', 14, 1, ' , eee , ', '11', 33, '11.00', 'Est&aacute;vel', '', '', '', 44, 'fff , costas , ', 55, 44, 0),
(8, 'abdomén , f , ', 'abdomén , f , ', 'boca/dente , q , ', 'Sim', 'Sim', 'Marta', 'Hospital(centro M&eacute;dico)', 'Sim', 'Sim', 14, 1, ' , eee , ', '11', 33, '11.00', 'Est&aacute;vel', '', '', '', 44, 'fff , costas , ', 55, 44, 0),
(9, 'perna , pé , l , ', 'costas , perna , f , ', 'abdomén , coxa , q , ', 'Sim', 'Sim', 'Ribeiro', 'Hospital(centro M&eacute;dico)', 'Sim', 'Sim', 22, 11, ' ,  , sfdf44 , ', '99', 55, '22.00', 'Est&aacute;vel', '', '', '', 77, 'sdflkl , abdomén , vertebras , ', 4442, 333, 1),
(10, ' , ', ' , ', ' , ', 'Sim', 'Sim', 'Massungui', 'Em Casa(resid&ecirc;ncia Vit&iacute;ma)', 'Sim', 'Sim', 833, 99873737, ' ,  ,  , imobilizaç~eos 2 , ', '222', 8837, '999.99', 'Melhora', '', '', '', 993383, 'procedimentoes , cabeça , ombro , ', 773, 76655, 2),
(11, 'cabeça , ombro , peito , abdomén , vertebras , costas , lesao , ', 'braço/anti-braço , abdomén , vertebras , pé , frtura , ', 'braço/anti-braço , abdomén , vertebras , queimadura , ', 'Sim', 'N&a', 'Marta Fila', 'Hospital(centro M&eacute;dico)', 'N&a', 'Sim', 3, 5, ' ,  ,  ,  , imobiliza , ', '111', 21, '666.00', 'Inst&aacute;vel', '', '', '', 76, 'procedimento , abdomén , vertebras , coxa , ', 2222, 444, 2),
(12, 'braço/anti-braço , perna , pé ,  , ', 'perna , olhos , coluna/costas ,  , ', 'vertebras , costas , coluna/costas , quema , ', 'Sim', 'Sim', 'Ribeiro', 'Hospital(centro M&eacute;dico)', 'Sim', 'Sim', 8765678, 557, ' ,  , efetuadas , ', '38338', 76545678, '999.99', 'Agravamento', 'Ao Est&iacute;mulo Doloroso', 'Sem Resposta', 'Confusa', 986567, 'procedimentos , vertebras , costas , perna , ', 98765, 88, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_deslocamento`
--

DROP TABLE IF EXISTS `horarios_deslocamento`;
CREATE TABLE IF NOT EXISTS `horarios_deslocamento` (
  `id_horario_deslocamento` int NOT NULL AUTO_INCREMENT,
  `partidaInicio` datetime DEFAULT NULL,
  `chegadaDestino` datetime DEFAULT NULL,
  `saidaDestino` datetime DEFAULT NULL,
  `fimOcorrencia` datetime DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `id_equipe` int DEFAULT NULL,
  `observacoes` text,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_horario_deslocamento`),
  KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `horarios_deslocamento`
--

INSERT INTO `horarios_deslocamento` (`id_horario_deslocamento`, `partidaInicio`, `chegadaDestino`, `saidaDestino`, `fimOcorrencia`, `longitude`, `latitude`, `id_equipe`, `observacoes`, `data_criacao`, `data_modificacao`) VALUES
(1, '2024-05-23 09:58:00', '2024-05-23 09:58:00', '2024-04-30 09:56:00', '2024-05-23 11:56:00', '99.99999999', '999.99999999', 3, 'Obs Teste 001', '2024-05-23 09:56:44', '2024-05-23 09:56:44'),
(2, '2024-05-08 10:15:00', '2024-05-23 10:16:00', '2024-05-23 13:15:00', '2024-05-12 10:15:00', '99.99999999', '999.99999999', 8, 'Obs 002', '2024-05-23 10:15:48', '2024-05-23 10:15:48'),
(3, '2024-05-24 22:48:00', '2024-06-01 22:46:00', '2024-05-24 01:46:00', '2024-05-24 00:46:00', '-99.99999999', '-999.99999999', 2, 'Obs 44', '2024-05-24 22:46:57', NULL),
(4, '2024-05-18 22:48:00', '2024-05-10 22:48:00', '2024-05-11 22:48:00', '2024-05-24 01:48:00', '-99.99999999', '-999.99999999', 8, 'Obs', '2024-05-24 22:50:36', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias_acidentes_transito`
--

DROP TABLE IF EXISTS `ocorrencias_acidentes_transito`;
CREATE TABLE IF NOT EXISTS `ocorrencias_acidentes_transito` (
  `id_acidente` int NOT NULL AUTO_INCREMENT,
  `veiculos_envolvidos` varchar(45) DEFAULT NULL,
  `quantos_envolvidos` int DEFAULT NULL,
  `numero_vitimas` int DEFAULT NULL,
  `preso_algo` varchar(3) DEFAULT NULL,
  `produtos_perigos` text,
  `data_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_acidente`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ocorrencias_acidentes_transito`
--

INSERT INTO `ocorrencias_acidentes_transito` (`id_acidente`, `veiculos_envolvidos`, `quantos_envolvidos`, `numero_vitimas`, `preso_algo`, `produtos_perigos`, `data_creation`) VALUES
(1, 'Carro, Caminhão, AutoCarro', 86, 5, 'Sim', 'n&atilde;o', '2031-05-11 21:02:18'),
(2, 'Carro, Caminhão, AutoCarro', 77, 78, 'N&a', 'sim', '2031-05-12 09:26:30'),
(3, 'Avi&atilde;o, Comboio', 383893, 399393, 'Sim', 'sim', '2031-05-13 00:34:11'),
(4, 'Avi&atilde;o, Comboio', 383893, 399393, 'Sim', 'sim', '2031-05-13 00:42:55'),
(5, 'jksdjlkfjsdlk , Comboio, Trem , outros , ', 44, 333, 'Sim', 'sim', '2024-05-16 01:15:10'),
(6, 'trote , Carro, Caminhão, AutoCarro ,  Moto, b', 4444, 2222, 'Sim', 'sim', '2024-05-16 08:04:40'),
(7, 'trote ,  Moto, bicleta , outros , ', 332, 111, 'Sim', 'sim', '2024-05-16 08:05:26'),
(8, 'trote , Carro, Caminhão, AutoCarro ,  Moto, b', 999, 9999, 'Sim', 'sim', '2025-05-21 05:44:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias_clinico_traumas_diversos`
--

DROP TABLE IF EXISTS `ocorrencias_clinico_traumas_diversos`;
CREATE TABLE IF NOT EXISTS `ocorrencias_clinico_traumas_diversos` (
  `id_clinico` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) DEFAULT NULL,
  `idade` varchar(75) DEFAULT NULL,
  `local_ocorrencia` varchar(75) DEFAULT NULL,
  `motivo_ativacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `acordada` varchar(3) DEFAULT NULL,
  `respirando` varchar(3) DEFAULT NULL,
  `sangramento` varchar(3) DEFAULT NULL,
  `fraturas_visiveis` varchar(3) DEFAULT NULL,
  `data_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_clinico`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ocorrencias_clinico_traumas_diversos`
--

INSERT INTO `ocorrencias_clinico_traumas_diversos` (`id_clinico`, `nome`, `idade`, `local_ocorrencia`, `motivo_ativacao`, `acordada`, `respirando`, `sangramento`, `fraturas_visiveis`, `data_creation`) VALUES
(1, 'Ricardo Massungui', '2031-05-15', 'Akjsdkljfklsdjfkljldk', 'sjdfkljsdlkfj', 'Sim', 'Sim', 'Sim', 'Sim', '2031-05-13 00:33:06'),
(2, 'Ricardo Massungui', '2031-05-14', 'Casa, Escola, Empressa', 'teste hoje', 'Sim', 'Sim', 'Sim', 'Sim', '2031-05-13 00:33:48'),
(3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 01:13:45'),
(4, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 01:21:31'),
(5, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 07:51:26'),
(6, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 07:55:16'),
(7, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 07:56:37'),
(8, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 07:59:05'),
(9, '', '', ',', '', 'Sim', 'Sim', 'Sim', 'Sim', '2024-05-16 07:59:56'),
(10, '', '', ',', '', 'Sim', 'Sim', 'Sim', 'Sim', '2024-05-16 08:00:05'),
(11, 'Teste Hoje', '2024-05-31', 'em casa,Residência,Instituição Comercial,Instituição Empresarial,Instituiçã', 'jsdljkdlfk', 'Sim', 'Sim', 'Sim', 'Sim', '2024-05-16 08:01:34'),
(12, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 08:02:16'),
(13, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 08:02:50'),
(14, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 08:03:30'),
(15, 'Sanda Ndombaxi', '2024-05-28', ',Instituição Comercial,Instituição Empresarial,Instituição Social,', 'sjksdjlfk', 'Sim', 'Sim', 'Sim', 'Sim', '2024-05-16 08:04:04'),
(16, 'Sanda Ndombaxi', '2024-05-20', 'em casa,Residência,Instituição Comercial,Instituição Empresarial,', 'partiu a perna na brincadeira', 'Sim', 'Sim', 'Sim', 'Sim', '2024-05-17 18:28:12'),
(17, 'Ricardo Massungui', '1996-05-22', 'em casa,Instituição Comercial,Instituição Empresarial,Instituição Acadêmica', 'm5', 'Sim', 'Sim', 'Sim', 'Sim', '2025-05-21 05:45:41'),
(18, 'Francisco Dos Santos', '1999-09-19', 'em casa,Residência,Instituição Comercial,Instituição Empresarial,', 'motivo 3', 'Sim', 'Sim', 'Não', 'Sim', '2024-05-24 21:00:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias_incendio`
--

DROP TABLE IF EXISTS `ocorrencias_incendio`;
CREATE TABLE IF NOT EXISTS `ocorrencias_incendio` (
  `id_incendio` int NOT NULL AUTO_INCREMENT,
  `objeto_queimando` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `quant_objecto` varchar(45) NOT NULL,
  `ha_edificacoes_proximas` varchar(3) DEFAULT NULL,
  `numero_vitimas` int DEFAULT NULL,
  `data_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_incendio`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ocorrencias_incendio`
--

INSERT INTO `ocorrencias_incendio` (`id_incendio`, `objeto_queimando`, `quant_objecto`, `ha_edificacoes_proximas`, `numero_vitimas`, `data_creation`) VALUES
(1, 'Residência', '6', 'N&a', 9866, '2031-05-12 09:28:05'),
(2, 'Natureza', '6', 'N&a', 9866, '2031-05-12 09:28:05'),
(3, 'Paisagem Ou Natureza', '344', 'Sim', 3333, '2031-05-13 00:43:26'),
(4, 'Paisagem Ou Natureza', '344', 'Sim', 3333, '2031-05-13 00:53:52'),
(5, 'florestea , Meios De Transportes , Natureza , ', '44', 'Sim', 22, '2024-05-16 01:15:31'),
(6, 'florestea , Residência , Meios De Transportes , Natureza , ', '33', 'Sim', 222, '2024-05-16 08:06:02'),
(7, 'poste de energia , Residência , Meios De Transportes , Natureza , outros , ', '88766', 'N&a', 5555, '2025-05-21 05:46:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias_obstetrico`
--

DROP TABLE IF EXISTS `ocorrencias_obstetrico`;
CREATE TABLE IF NOT EXISTS `ocorrencias_obstetrico` (
  `id_obstetrico` int NOT NULL AUTO_INCREMENT,
  `idade_gestante` date DEFAULT NULL,
  `tempo_gestacao` int DEFAULT NULL,
  `primeira_gravidez` varchar(3) DEFAULT NULL,
  `ha_contracoes` varchar(3) DEFAULT NULL,
  `perda_sangue` varchar(3) DEFAULT NULL,
  `data_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_obstetrico`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ocorrencias_obstetrico`
--

INSERT INTO `ocorrencias_obstetrico` (`id_obstetrico`, `idade_gestante`, `tempo_gestacao`, `primeira_gravidez`, `ha_contracoes`, `perda_sangue`, `data_creation`) VALUES
(1, '0000-00-00', 0, NULL, NULL, NULL, '2031-05-11 20:24:19'),
(2, '0000-00-00', 0, NULL, NULL, NULL, '2031-05-11 20:30:07'),
(3, '0000-00-00', 0, NULL, NULL, NULL, '2031-05-11 20:35:36'),
(4, '0000-00-00', 2031, 'Sim', 'N&a', 'Sim', '2031-05-12 09:29:11'),
(5, '0000-00-00', 2031, 'Sim', 'Sim', 'Sim', '2031-05-12 09:30:17'),
(6, '0000-00-00', 0, NULL, NULL, NULL, '2024-05-16 01:15:49'),
(7, '0000-00-00', 0, NULL, NULL, NULL, '2024-05-16 08:07:26'),
(8, '0000-00-00', 0, NULL, NULL, NULL, '2024-05-16 08:08:50'),
(9, '0000-00-00', 1, 'Sim', 'Sim', 'Sim', '2024-05-16 08:12:54'),
(10, '0000-00-00', 1, 'Sim', 'Sim', 'Sim', '2024-05-16 08:13:16'),
(11, '2024-05-29', 1, 'Sim', 'Sim', 'Sim', '2024-05-16 08:14:56'),
(12, '2000-09-12', 5, 'Não', 'Não', 'Sim', '2025-05-21 05:47:26'),
(13, '1999-05-09', 6, 'Sim', 'Sim', 'Sim', '2024-05-24 21:01:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orgaos_apoio`
--

DROP TABLE IF EXISTS `orgaos_apoio`;
CREATE TABLE IF NOT EXISTS `orgaos_apoio` (
  `id_orgao` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `contacto` varchar(9) DEFAULT NULL,
  `atendente` varchar(45) DEFAULT NULL,
  `dataHora` datetime DEFAULT NULL,
  `data_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_orgao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `orgaos_apoio`
--

INSERT INTO `orgaos_apoio` (`id_orgao`, `nome`, `contacto`, `atendente`, `dataHora`, `data_creation`, `data_modified`) VALUES
(1, 'Defesa(pm)', '938937373', 'Ricardo Massungui', '2024-05-31 02:15:00', '2024-05-23 21:15:23', NULL),
(2, 'Segurança(polícia) , Ambulância(inema) , Defesa(pm) , ', '938937373', 'Rita Cassequel', '2024-06-01 04:43:00', '2024-05-25 04:43:10', NULL),
(3, 'Segurança(polícia) , Ambulância(inema) , Defesa(pm) , ', '938937333', 'Marcos Dos Santos', '2024-05-03 04:50:00', '2024-05-25 04:50:56', NULL),
(4, 'Segurança(polícia) , Ambulância(inema) , Defesa(pm) , ', '938937088', 'Ana Dias', '2024-05-25 04:54:00', '2024-05-25 04:51:53', NULL);

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
  `data_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_solicitante`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `solicitantes`
--

INSERT INTO `solicitantes` (`id_solicitante`, `nome`, `nif`, `telefone`, `email`, `relato`, `bairro`, `cidade`, `rua`, `referencia`, `data_creation`) VALUES
(1, 'António Mutondo', '99339937773737', '993337772', 'antonia@gmail.com', 'relato 3', 'sagrada familia', 'huíla', 'Mutamba', 'Na Porta Do Shopping', '2026-05-10 17:27:54'),
(2, 'Ricardo Massungui', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'jsdlfjdk', 'calungo auto', 'lunda_norte', 'Bita Sapú 2', 'Igreja Católica', '2026-05-10 17:50:03'),
(4, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', '2026-05-10 18:21:51'),
(5, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', '2026-05-10 18:22:02'),
(6, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', '2026-05-10 18:22:53'),
(7, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', '2026-05-10 18:24:21'),
(8, 'Sanda Ndombaxi', '99339937773737', '983833938', 'sandamassungui@gmail.com', 'relato 3', 'bita ', 'cunene', 'Talatona', 'Na Porta Do Shopping', '2026-05-10 18:24:50'),
(9, 'franciso bráulio', '993830938LA949', '983833938', 'franca@gmail.com', 'teste relato5', 'belas siac', 'cuanza_sul', 'Parte Braço Zango 1', 'Na Cantinat', '2026-05-10 19:40:31'),
(10, 'Ricardo Massungui', '93833737333211', '993337772', 'rubem3@gmai.com', 'ijkkjl', 'belas siac', 'lunda_norte', 'Bita Sapú 2', 'Na Porta Do Shopping', '2026-05-10 23:20:01'),
(12, 'Ricardo Massungui', '99339937773737', '983833849', 'sandamassungui@gmail.com', 'ricardo', 'calungo auto', 'lunda_norte', 'Talatona', 'Na Cantina', '2031-05-11 19:10:55'),
(13, 'Emilio snatoas', '99339932222223', '983833849', 'emiloi@gmail.com', 'meu relato', 'calungo auto', 'lunda_norte', 'Talatona', 'Na Cantina', '2031-05-11 19:13:31'),
(14, 'António Mutondo', '99383333333333', '993337772', 'gera@gami.com.ao', 'kjkjl', 'bita ', 'cunene', 'Calungo', 'Na Cantinat', '2031-05-11 20:03:09'),
(15, 'Rubem Marcos', '93833737333332', '993337772', 'antonia@gmail.com', 'teste reaaskljdfçljf', 'calungo auto', 'cuando_cubango', 'Talatona', 'Cetep', '2031-05-12 09:17:50'),
(16, 'sandra piedade', '99383000000000', '983833938', 'sanda@gmail.com', 'relato 4', 'luanda sul', 'luanda', 'Luanda , Viana - Estalagem', 'No Arreiou', '2024-05-17 18:26:08'),
(17, 'Tamara dos santos', '993830009LA993', '983833938', 'ttamar@gmail.com', 'relato 7', 'bita ', 'huíla', 'Parte Braço Zango 1', 'Igreja Católica', '2025-05-21 05:50:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ocorrencias`
--

DROP TABLE IF EXISTS `tipo_ocorrencias`;
CREATE TABLE IF NOT EXISTS `tipo_ocorrencias` (
  `id_tipo_ocorrencias` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Id_ClinicoTD` int DEFAULT NULL,
  `Id_Acidente` int DEFAULT NULL,
  `Id_obtrectico` int DEFAULT NULL,
  `Id_Incendio` int DEFAULT NULL,
  PRIMARY KEY (`id_tipo_ocorrencias`),
  KEY `Id_ClinicoTD` (`Id_ClinicoTD`),
  KEY `Id_Acidente` (`Id_Acidente`),
  KEY `Id_obtrectico` (`Id_obtrectico`),
  KEY `Id_Incendio` (`Id_Incendio`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_ocorrencias`
--

INSERT INTO `tipo_ocorrencias` (`id_tipo_ocorrencias`, `nome`, `Id_ClinicoTD`, `Id_Acidente`, `Id_obtrectico`, `Id_Incendio`) VALUES
(1, NULL, 4, 5, 6, 5),
(2, 'Incêndios , Obstetríco , ', 4, 5, 6, 5),
(3, 'Acidentes de Trânsitos , Incêndios ', 4, 5, 6, 5),
(4, 'Acidentes de Trânsitos , Incêndios , Obstetríco , Cliníco , ', 4, 5, 6, 5),
(5, 'Acidentes de Trânsitos , Incêndios , Obstetríco , Cliníco , ', 15, 7, 11, 6),
(6, 'Cliníco , ', 15, 7, 11, 6),
(7, 'Acidentes de Trânsitos , Incêndios , Obstetríco , Cliníco , ', 17, 8, 11, 7),
(8, 'Obstetríco , Cliníco , ', 18, 8, 12, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_bombeiro` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `nip` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idade` date DEFAULT NULL,
  `senha` varchar(64) DEFAULT NULL,
  `patente` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `permissao` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `data_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bombeiro`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_bombeiro`, `foto`, `path`, `nome`, `nip`, `email`, `idade`, `senha`, `patente`, `cargo`, `permissao`, `status`, `data_creation`, `data_modified`) VALUES
(3, 'Fri-24-May-2024-06-11-23_spcb_66502f8b5fb13.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Fri-24-May-2024-06-11-23_spcb_66502f8b5fb13.jpg', 'RIcardo Massungui', '933445566', 'ricardomassungui@gmail.com', '1987-05-21', '$2y$10$hDgjO0lnK0GCM7gQ93QWwOlbOuOMGzJEawRvMIFEYxFxyWcNLl2M2', 'I&ordm; Agente', 'Comandante', 'admin', 'Ativo', '2026-05-10 04:53:49', '2024-05-24 07:11:23'),
(8, 'Wed-21-May-2025-02-45-39_spcb_682d3e534c494.png', 'http://localhost/spcb/public/assets/uploads/pics/Wed-21-May-2025-02-45-39_spcb_682d3e534c494.png', 'Augusto Pereira Bastos', '393838383', 'bastos@gmai.co.ao', '1998-05-09', '$2y$10$6MiomDK9v0S/FOvaeYHEQuyHDv0N7dsHiEtu5R4s1dhQDKDYP/Vgq', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2026-05-10 17:06:46', '2025-05-21 03:57:24'),
(9, 'Thu-23-May-2024-00-38-28_spcb_664e900437f50.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-00-38-28_spcb_664e900437f50.jpg', 'Juliano Valdmir', '987383393', 'juliana@gmail.com', '2003-05-06', '$2y$10$0v4kb97o.58ndVUTg/dv.OnnRSGdOnUXg3hTIRUcugTkkx3fzbvyK', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-17 21:08:49', '2024-05-23 01:38:28'),
(10, 'Mon-20-May-2024-09-48-02_spcb_664b1c52e9cf5.png', 'http://localhost/spcb/public/assets/uploads/pics/Mon-20-May-2024-09-48-02_spcb_664b1c52e9cf5.png', 'Rubem Marcos 3', '904804894', 'rubem@gmail.com', '2003-05-17', '$2y$10$XIHgujEv5NcUzl62hiJIVOy/oHFm1/Q8aDIMDnEHvAPjZJJOW3x/W', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-20 01:54:56', '2024-05-20 10:48:02'),
(13, 'Mon-20-May-2024-09-51-01_spcb_664b1d05b5344.png', 'http://localhost/spcb/public/assets/uploads/pics/Mon-20-May-2024-09-51-01_spcb_664b1d05b5344.png', 'Sanda Ndombaxi', '009837363', 'sanda@gmail.com', '2001-05-19', '$2y$10$n6K/aGQcRNQpNCA7cSPL9.QUf1yeuyUQvJL9xwWkqkiqw.odPnhJ2', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-20 10:50:21', '2024-05-20 10:51:01'),
(19, 'Mon-20-May-2024-11-30-06_spcb_664b343e2d0ec.png', 'http://localhost/spcb/public/assets/uploads/pics/Mon-20-May-2024-11-30-06_spcb_664b343e2d0ec.png', 'Sungo Afonso', '003883377', 'sungo@gmail.com', '1998-05-21', '$2y$10$l8Yxsx5VfbKbmE3c7GVl1u7lIbFrbOMlkhmkkk4pU8vRk5icXvBvq', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-20 12:27:46', '2024-05-20 12:30:06'),
(20, 'Wed-21-May-2025-02-17-41_spcb_682d37c54427b.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Wed-21-May-2025-02-17-41_spcb_682d37c54427b.jpg', 'Brigite ', '987777336', 'brigite@gmail.com', '1997-05-17', '$2y$10$1e0o1z8b2QFVX/GOrCnG4.j9aszR/7dP1.H78aDrxYew0RVrI8H4C', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-20 14:24:09', '2025-05-21 03:17:41'),
(35, 'Wed-21-May-2025-05-15-12_spcb_682d6160a3af3.png', 'http://localhost/spcb/public/assets/uploads/pics/Wed-21-May-2025-05-15-12_spcb_682d6160a3af3.png', 'Liriandra De Sousa', '000001100', 'jorgina@gmail.com', '1999-12-13', '$2y$10$CO4VAO4K16tBGhQsCFrdVOiNNOhPk4h2mH02/X7ryAs0fZ2POh/Se', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2025-05-21 05:08:31', '2025-05-21 06:15:12'),
(36, 'Wed-21-May-2025-05-26-50_spcb_682d641adf080.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Wed-21-May-2025-05-26-50_spcb_682d641adf080.jpg', 'Merciana Marcos', '030888877', 'merciana@gmail.com', '2005-12-13', '$2y$10$A4i5CGzZ6LSdyRQyYKOKTeJNITL4FV/EXWBLjTQXWAHV0nyfCFEE6', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2025-05-21 05:44:50', '2025-05-21 06:26:50'),
(42, 'Thu-23-May-2024-00-29-40_spcb_664e8df42fc07.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-00-29-40_spcb_664e8df42fc07.jpg', 'Ana Dias', '333300838', 'anadias@gmail.com', '1954-05-01', '$2y$10$w2wuPQA/zVG8tI4vg4eVYe8FCxU6wHyH08AlxjK0jSSE5s/VH7yDC', 'I&ordm; Agente', 'Coordenador De Equipes', 'admin', 'Ativo', '2024-05-22 23:11:04', '2024-05-23 01:29:40'),
(43, 'Thu-23-May-2024-10-27-51_spcb_664f1a2758307.jpeg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-10-27-51_spcb_664f1a2758307.jpeg', 'Mbenza Madalena', '900377383', 'mbenza@gmail.com', '1955-05-23', '$2y$10$.HSzkAt8gXgxoZ7riYzWP.7gyV0Cj3iWs1o32IjTN8uaraijak46i', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 01:42:27', '2024-05-23 11:27:51'),
(44, 'Thu-23-May-2024-00-48-35_spcb_664e92639bc63.png', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-00-48-35_spcb_664e92639bc63.png', 'Boa Ntumba Massungui', '439837838', 'boantumba@gmail.com', '1992-09-19', '$2y$10$dLCgS5a3Fr2ozUq1pzgBZeVtZ16pPfqeamgz9oT3S410z.DnAugjK', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 01:48:35', NULL),
(45, 'Thu-23-May-2024-10-27-30_spcb_664f1a1292fbe.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-10-27-30_spcb_664f1a1292fbe.jpg', 'Gesloonj', '999999999', 'gelson.cri@gmail.com', '1999-09-19', '$2y$10$w3A4G4DEKDvpFrzMZFKItedA3GBw.gQD5mNwcmmrR/zCld5wxn4WK', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 01:56:58', '2024-05-23 11:27:30'),
(46, 'Thu-23-May-2024-10-26-27_spcb_664f19d30ce9a.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-10-26-27_spcb_664f19d30ce9a.jpg', 'Salom&atilde;o Dos Santos', '083377999', 'salomon@gmail.com', '1999-09-19', '$2y$10$XITEx52VnVwYH6Qvl95m1eoCA/guYofRA6LwrIcLbFGN43XabwNJS', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 02:41:57', '2024-05-23 11:26:27'),
(47, 'Thu-23-May-2024-01-52-56_spcb_664ea17846309.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-01-52-56_spcb_664ea17846309.jpg', 'Bornito De Sousa', '993737377', 'bornito@gmail.co.ao', '2003-05-25', '$2y$10$smWLNkqoA4ickbr9FWtZB.TaFJZcVPc28JqlrOHWtzF/3eU4PxEha', 'Iii&ordm; Sargento', 'Comandante', 'admin', 'Ativo', '2024-05-23 02:48:17', '2024-05-23 02:52:56'),
(48, 'Thu-23-May-2024-01-55-00_spcb_664ea1f4f2f27.png', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-01-55-00_spcb_664ea1f4f2f27.png', 'Val&eacute;ria Massungui', '093838383', 'valeriamassungui@gmail.com', '1976-12-01', '$2y$10$mBwUwJOTHyRZM1/P3wjH3eyqxiFtdte8skn5PUNjMSox.1rcXvzM6', 'I&ordm; Comiss&aacute;rio', 'Comandante', 'admin', 'Ativo', '2024-05-23 02:55:01', NULL),
(49, '', '', 'Madalena Massungui', '093039838', 'madalenamassungui@gmail.com', '1976-12-01', '$2y$10$y13JXFEZbitqX.WFYqdqdOYP7BihC/nkerQXA21GNUR3G9fT0W.1i', 'I&ordm; Agente', 'Comandante', 'operador', 'Ativo', '2024-05-23 02:55:40', NULL),
(50, 'Thu-23-May-2024-02-00-39_spcb_664ea347ebb68.txt', '', 'Thomas Ntimba', '093039933', 'satos@gmail.com', '1976-12-01', '$2y$10$b/TcXg9DIXLfXfqLQGwCwuHDoG1o8z/SQ0MWWkcAgY7Wk4EuYawna', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 03:00:39', NULL),
(51, 'Thu-23-May-2024-02-04-47_spcb_664ea43f25619.txt', '', 'Hamilton Mualenge', '093339933', 'hamiltonmualenge@gmail.com', '1976-12-01', '$2y$10$qHlS0QfmjwjjTjc2wrSjGez97kuSLSSR2qzWtdHD8DaTEcX1IDUhm', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 03:04:47', NULL),
(52, 'Thu-23-May-2024-02-06-45_spcb_664ea4b51a9ec.txt', '', 'Mualenge', '093330978', 'mualenge@gmail.com', '1976-12-01', '$2y$10$31oxuX1GFbYUPXYq5cuEAOSvT5QNZJ4k.pk0DbL1xnbIip8M5akR2', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 03:06:45', NULL),
(53, '', '', 'Jocas', '000111122', 'jocas@gmail.com', '1967-02-19', '$2y$10$x/lS2HgUgY975.LrHEgMU.rCflZus4ZhyyZ0uf.x0Or8xW8pXcB6q', 'Tendente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 03:24:15', NULL),
(55, '', '', 'Teste', '030389383', 'teste@gmail.com', '1999-09-09', '$2y$10$KHPhEokvDYnIitTB62WS6.ApYJ09v2E6JSxR7GRLWRsTjH8Nfscqe', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 03:41:25', NULL),
(89, 'Thu-23-May-2024-05-59-37_spcb_664edb4991d5d.png', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-05-59-37_spcb_664edb4991d5d.png', 'Yyyyyttttt', '978650000', '0ds@gamail.com', '1999-08-12', '$2y$10$3t30eVui9rKEq149K8JoeOhs8oNhvQqtL4zv5/DH6IIEdjAprbRum', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 06:59:37', NULL),
(93, 'Thu-23-May-2024-06-31-54_spcb_664ee2dad8d8c.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-06-31-54_spcb_664ee2dad8d8c.jpg', 'Juliana Serg&iacute;o', '999948484', 'julainadk@gmail.com', '1988-02-19', '$2y$10$2P5GfoKVMiUVenW8lZVbD.U7AN.ikC/Lt72NNJah7w9StIpZjhQsi', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 07:31:54', NULL),
(94, 'Thu-23-May-2024-06-38-01_spcb_664ee449e9786.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-06-38-01_spcb_664ee449e9786.jpg', 'Massungui Tsingui', '991123455', 'maissungui@gmail.com', '1998-05-31', '$2y$10$2vXs.MYZnxesR3xKTMFBDuzFhd2pnAR7mraBcgQFnNbWMk4/B6kqe', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 07:38:01', NULL),
(101, 'Thu-23-May-2024-07-12-44_spcb_664eec6c20330.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-07-12-44_spcb_664eec6c20330.jpg', 'Santana', '008883838', 'santana@gmail.com', '1987-09-10', '$2y$10$CCGoqrWhvfOJjgXFeh12R.5veYedSZHSF0jsHa.sPYPBAjNnF/ovu', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 08:12:44', NULL),
(103, 'Thu-23-May-2024-07-23-46_spcb_664eef0275f59.jpg', 'http://localhost/spcb/public/assets/uploads/pics/Thu-23-May-2024-07-23-46_spcb_664eef0275f59.jpg', 'Luziana Cardoso', '993888883', 'cardoso@gmai.com', '1987-12-09', '$2y$10$6SSLAz/Y1ATm2DIsucbsQuXswOkEq94YSTfgvSkTxHnkjDoIZ0AGS', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 08:23:46', NULL),
(119, '', '', 'GUIDA', '009397626', 'ma@gmai.com', '1998-02-19', '$2y$10$wEuEqP9eGCRKzvEualqobOebYFODz0G7E6uS9IXfw58V4XWD2HeRm', 'I&ordm; Agente', 'Comandante', 'coordenador', 'Ativo', '2024-05-23 08:50:37', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viaturas`
--

DROP TABLE IF EXISTS `viaturas`;
CREATE TABLE IF NOT EXISTS `viaturas` (
  `id_viatura` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `cor` varchar(20) DEFAULT NULL,
  `matricula` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_viatura`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `viaturas`
--

INSERT INTO `viaturas` (`id_viatura`, `marca`, `modelo`, `cor`, `matricula`, `ano`, `data_criacao`, `data_modificacao`) VALUES
(5, 'Toyota', 'Getz', 'Vermelho-preto', 'Veiculos-alfa/23-05-2024-07:11:46981', 2024, '2024-05-16 09:59:22', '2024-05-23 20:16:30'),
(9, 'Hunday', '4x4', 'Preto', 'Veiculos-sul/23-05-2024-09:17:02474', 2019, '2024-05-23 10:17:32', NULL),
(10, 'Kia', 'Vxld', 'Preto', 'Veiculos-este/23-05-2024-09:17:32439', 2018, '2024-05-23 10:17:53', NULL),
(15, 'Toyota', '4x4', 'Vermelho-preto', 'Veiculos-zeus/23-05-2024-06:33:25567', 2024, '2024-05-23 19:37:19', NULL),
(16, 'Toyota', 'Txl', 'Preto', 'Veiculos-zeus/23-05-2024-07:51:28190', 2020, '2024-05-23 19:39:44', '2024-05-23 20:59:28'),
(17, 'Toyota', 'Carinae', 'Preto', 'Veiculos-sul/23-05-2024-08:07:01565', 2024, '2024-05-23 19:40:57', '2024-05-23 21:07:22'),
(19, 'Mercedes', 'Vxld', 'Preto-vermelho', 'Veiculos-este/23-05-2024-08:09:11675', 2019, '2024-05-23 21:10:38', NULL),
(20, 'Mercedes', 'Vxld', 'Preto-vermelho', 'Veiculos-este/23-05-2024-08:09:11675', 2019, '2024-05-23 21:11:02', NULL);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `horarios_deslocamento`
--
ALTER TABLE `horarios_deslocamento`
  ADD CONSTRAINT `horarios_deslocamento_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
