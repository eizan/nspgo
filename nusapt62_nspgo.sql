-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2018 at 03:16 PM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nusapt62_nspgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_nama`) VALUES
(12, 'admin', 'b02abb8a3a942e1d1cf6911bd5ee4043', 'Muhammad Ikhsan Thohir'),
(13, 'fauziani', '107f55eda00d856e3aab8c0fdcdc3a61', 'Fauziani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `mhs_id` int(11) NOT NULL,
  `mhs_nim` varchar(255) NOT NULL,
  `mhs_no_nspgo` varchar(255) NOT NULL,
  `mhs_nama` varchar(255) NOT NULL,
  `mhs_jurusan` varchar(255) NOT NULL,
  `mhs_semester` varchar(255) NOT NULL,
  `mhs_status` varchar(255) NOT NULL,
  `mhs_keterangan` text NOT NULL,
  `mhs_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_negara`
--

CREATE TABLE `tbl_negara` (
  `negara_id` int(11) NOT NULL,
  `negara_kode` varchar(255) NOT NULL,
  `negara_poin` int(11) NOT NULL,
  `negara_nama` varchar(255) NOT NULL,
  `negara_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_negara`
--

INSERT INTO `tbl_negara` (`negara_id`, `negara_kode`, `negara_poin`, `negara_nama`, `negara_keterangan`) VALUES
(194, 'af', 26, 'Afghanistan', 'af'),
(195, 'za', 37, 'Afrika Selatan', ''),
(196, 'cf', 38, 'Afrika Tengah', ''),
(197, 'al', 33, 'Albania', ''),
(198, 'dz', 37, 'Aljazair', ''),
(199, 'us', 35, 'Amerika Serikat', ''),
(200, 'ad', 33, 'Andorra', ''),
(201, 'ao', 38, 'Angola', ''),
(202, 'sa', 26, 'Arab Saudi', ''),
(203, 'ar', 39, 'Argentina', ''),
(204, 'am', 23, 'Armenia', ''),
(205, 'au', 20, 'Australia', ''),
(206, 'at', 30, 'Austria', ''),
(207, 'az', 23, 'Azerbaijan', ''),
(208, 'bh', 26, 'Bahrain', ''),
(209, 'bd', 18, 'Bangladesh', ''),
(210, 'nl', 35, 'Belanda', ''),
(211, 'by', 30, 'Belarusia', ''),
(212, 'be', 35, 'Belgia', ''),
(213, 'bz', 38, 'Belize', ''),
(214, 'bj', 40, 'Benin', ''),
(215, 'bt', 18, 'Bhutan', ''),
(216, 'bo', 39, 'Bolivia', ''),
(217, 'ba', 33, 'Bosnia', ''),
(218, 'bw', 37, 'Bostwana', ''),
(219, 'br', 39, 'Brasil', ''),
(220, 'bn', 10, 'Brunei Darussalam', ''),
(221, 'bg', 30, 'Bulgaria', ''),
(222, 'bf', 40, 'Burkina Faso', ''),
(223, 'bi', 38, 'Burundi', ''),
(224, 'cz', 30, 'Ceko', ''),
(225, 'td', 37, 'Chad', ''),
(226, 'cl', 39, 'Chile', ''),
(227, 'dk', 36, 'Denmark', ''),
(228, 'dj', 38, 'Djibouti', ''),
(229, 'dm', 38, 'Dominika', ''),
(230, 'ec', 39, 'Ekuador', ''),
(231, 'sv', 38, 'El Salvador', ''),
(232, 'er', 38, 'Eritrea', ''),
(233, 'ee', 30, 'Estonia', ''),
(234, 'et', 38, 'Ethiopia', ''),
(235, 'ph', 14, 'Filipina', ''),
(236, 'fi', 36, 'Finlandia', ''),
(237, 'ga', 38, 'Gabon', ''),
(238, 'gm', 40, 'Gambia', ''),
(239, 'ge', 30, 'Georgia', ''),
(240, 'gh', 40, 'Ghana', ''),
(241, 'gd', 38, 'Grenada', ''),
(242, 'gt', 38, 'Guatemala', ''),
(243, 'gn', 40, 'Guinea', ''),
(244, 'gw', 40, 'Guinea Bissau', ''),
(245, 'gy', 39, 'Guyana', ''),
(246, 'gf', 39, 'Guyana Prancis', ''),
(247, 'ht', 38, 'Haiti', ''),
(248, 'hn', 38, 'Honduras', ''),
(249, 'hu', 30, 'Hungaria', ''),
(250, 'in', 18, 'India', ''),
(251, 'gb', 35, 'Inggris', ''),
(252, 'iq', 26, 'Irak', ''),
(253, 'ir', 26, 'Iran', ''),
(254, 'ie', 35, 'Irlandia', ''),
(255, 'is', 36, 'Islandia', ''),
(256, 'il', 26, 'Israel', ''),
(257, 'it', 33, 'Italia', ''),
(258, 'jp', 24, 'Jepang', ''),
(259, 'de', 35, 'Jerman', ''),
(260, 'kh', 10, 'Kamboja', ''),
(261, 'cm', 38, 'Kamerun', ''),
(262, 'ca', 35, 'Kanada', ''),
(263, 'kz', 23, 'Kazakhstan', ''),
(264, 'ke', 38, 'Kenya', ''),
(265, 'bs', 38, 'Kep. Bahama', ''),
(266, 'kg', 23, 'Kirgystan', ''),
(267, 'km', 38, 'Komoro', ''),
(268, 'cg', 38, 'Kongo', ''),
(269, 'kr', 24, 'Korea Selatan', ''),
(270, 'kp', 24, 'Korea Utara', ''),
(271, 'cr', 38, 'Kosta Rika', ''),
(272, 'hr', 33, 'Kroasia', ''),
(273, 'cu', 38, 'Kuba', ''),
(274, 'kw', 26, 'Kuwait', ''),
(275, 'la', 10, 'Laos', ''),
(276, 'lv', 30, 'Latvia', ''),
(277, 'lb', 26, 'Lebanon', ''),
(278, 'ls', 37, 'Lesotho', ''),
(279, 'lr', 40, 'Liberia', ''),
(280, 'ly', 37, 'Libia', ''),
(281, 'lt', 30, 'Lithuania', ''),
(282, 'lu', 35, 'Luksemburg', ''),
(283, 'mk', 33, 'Macedonia', ''),
(284, 'mv', 18, 'Maladewa', ''),
(285, 'mg', 38, 'Malagasi', ''),
(286, 'mw', 38, 'Malawi', ''),
(287, 'my', 6, 'Malaysia', ''),
(288, 'ml', 40, 'Mali', ''),
(289, 'ma', 37, 'Maroko', ''),
(290, 'mr', 40, 'Mauritania', ''),
(291, 'mu', 38, 'Mauritius', ''),
(292, 'mx', 38, 'Meksiko', ''),
(293, 'eg', 37, 'Mesir', ''),
(294, 'md', 30, 'Moldova', ''),
(295, 'mc', 33, 'Monaco', ''),
(296, 'mn', 24, 'Mongolia', ''),
(297, 'mz', 38, 'Mozambik', ''),
(298, 'mm', 10, 'Myanmar', ''),
(299, 'na', 37, 'Namibia', ''),
(300, 'np', 18, 'Nepal', ''),
(301, 'nz', 20, 'NewZeland', ''),
(302, 'ng', 37, 'Nigeria', ''),
(303, 'ni', 38, 'Nikaragua', ''),
(304, 'no', 36, 'Norwegia', ''),
(305, 'om', 26, 'Oman', ''),
(306, 'pk', 18, 'Pakistan', ''),
(307, 'ps', 26, 'Palestina', ''),
(308, 'pa', 38, 'Panama', ''),
(309, 'ci', 40, 'Pantai Gading', ''),
(310, 'py', 39, 'Paraguay', ''),
(311, 'pe', 39, 'Peru', ''),
(312, 'pl', 30, 'Polandia', ''),
(313, 'pt', 33, 'Portugal', ''),
(314, 'fr', 35, 'Prancis', ''),
(315, 'pr', 38, 'Puerto Rico', ''),
(316, 'qa', 26, 'Qatar', ''),
(317, 'do', 38, 'Rep. Dominika', ''),
(318, 'cn', 24, 'RRC', ''),
(319, 'ro', 30, 'Rumania', ''),
(320, 'ru', 30, 'Rusia', ''),
(321, 'rw', 38, 'Rwanda', ''),
(322, 'eh', 37, 'Sahara Barat', ''),
(323, 'lc', 38, 'Saint Lucia', ''),
(324, 'sm', 33, 'San Marino', ''),
(325, 'st', 38, 'Saotome & Principe', ''),
(326, 'sn', 40, 'Senegal', ''),
(327, 'sc', 38, 'Seychelles', ''),
(328, 'sl', 40, 'Sierra Leone', ''),
(329, 'sg', 5, 'Singapura', ''),
(330, 'cy', 26, 'Siprus', ''),
(331, 'sk', 30, 'Slovakia', ''),
(332, 'si', 33, 'Slovenia', ''),
(333, 'so', 38, 'Somalia', ''),
(334, 'es', 33, 'Spanyol', ''),
(335, 'lk', 18, 'Sri Lanka', ''),
(336, 'vc', 38, 'St. Vincent & Grenadines', ''),
(337, 'sy', 26, 'Suriah', ''),
(338, 'sr', 39, 'Suriname', ''),
(339, 'sz', 37, 'Swaziland', ''),
(340, 'se', 36, 'Swedia', ''),
(341, 'ch', 30, 'Swiss', ''),
(342, 'tw', 24, 'Taiwan', ''),
(343, 'tj', 23, 'Tajikistan', ''),
(344, 'cv', 40, 'Tanjung Verde', ''),
(345, 'tz', 38, 'Tanzania', ''),
(346, 'th', 14, 'Thailand', ''),
(347, 'tl', 4, 'Timor Leste', ''),
(348, 'tg', 40, 'Togo', ''),
(349, 'tt', 38, 'Trinidad and Tobago', ''),
(350, 'tn', 37, 'Tunisia', ''),
(351, 'tr', 26, 'Turki', ''),
(352, 'tm', 23, 'Turkmenistan', ''),
(353, 'ug', 38, 'Uganda', ''),
(354, 'ua', 30, 'Ukraina', ''),
(355, 'ae', 26, 'Uni Emirat Arab', ''),
(356, 'uy', 39, 'Uruguay', ''),
(357, 'uz', 23, 'Uzbekistan', ''),
(358, 'va', 33, 'Vatikan', ''),
(359, 've', 39, 'Venezuela', ''),
(360, 'vn', 10, 'Vietnam', ''),
(361, 'ye', 26, 'Yaman', ''),
(362, 'jo', 26, 'Yordania', ''),
(363, 'gr', 33, 'Yunani', ''),
(364, 'cd', 38, 'Zaire', ''),
(365, 'zm', 38, 'Zambia', ''),
(366, 'zw', 37, 'Zimbabwe', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poin`
--

CREATE TABLE `tbl_poin` (
  `poin_id` int(11) NOT NULL,
  `poin_nim` varchar(255) NOT NULL,
  `mhs_nim` varchar(11) NOT NULL,
  `poin_nama` varchar(255) NOT NULL,
  `poin_jurusan` varchar(255) NOT NULL,
  `poin_asal_sekolah` varchar(255) NOT NULL,
  `poin_status` varchar(255) NOT NULL,
  `poin_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`mhs_id`);

--
-- Indexes for table `tbl_negara`
--
ALTER TABLE `tbl_negara`
  ADD PRIMARY KEY (`negara_id`);

--
-- Indexes for table `tbl_poin`
--
ALTER TABLE `tbl_poin`
  ADD PRIMARY KEY (`poin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tbl_negara`
--
ALTER TABLE `tbl_negara`
  MODIFY `negara_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `tbl_poin`
--
ALTER TABLE `tbl_poin`
  MODIFY `poin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
