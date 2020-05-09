-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 08:14 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vkpsolut_teachers_tools`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `sId` varchar(50) NOT NULL,
  `firstName` char(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `rollNumber` int(11) NOT NULL,
  `classId` char(25) DEFAULT NULL,
  `sectionId` char(1) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `systemEmail` varchar(50) NOT NULL COMMENT 'This will be auto generated',
  `pw` varchar(50) NOT NULL,
  `joinYear` varchar(25) DEFAULT NULL,
  `endYear` varchar(25) DEFAULT NULL,
  `phoneMobile` varchar(15) NOT NULL,
  `visibility` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`sId`, `firstName`, `lastName`, `rollNumber`, `classId`, `sectionId`, `Email`, `systemEmail`, `pw`, `joinYear`, `endYear`, `phoneMobile`, `visibility`) VALUES
('AabhaAcharya7440502336', 'Aabhra', 'Acharya', 15, '10', '5', 'AabhaAcharya@pxp.com', 'AabhaAcharya@mydomain.com', '7440502336', '2017', '', '7440502336', 'Y'),
('AabharanAgarwal6467471751', 'Aabharan', 'Agarwal', 16, '4', '1', 'AabharanAgarwal@mzb.com', 'AabharanAgarwal@mydomain.com', '6467471751', '2017', '', '6467471751', 'Y'),
('AabhasAgate2103988461', 'Aabhas', 'Agate', 17, '1', '3', 'AabhasAgate@wbu.com', 'AabhasAgate@mydomain.com', '2103988461', '2018', '', '2103988461', 'Y'),
('AabhassAggarwal1299381499', 'Aabhadua', 'Aggarwal', 18, '4', '6', 'AabhassAggarwal@jjz.com', 'AabhassAggarwal@mydomain.com', '1299381499', '2019', '', '1299381499', 'Y'),
('AabhavannanAgrawal1233971509', 'Aabhavannan', 'Agrawal', 19, '1', '4', 'AabhavannanAgrawal@teg.co', 'AabhavannanAgrawal@mydomain.com', '1233971509', '2014', '', '1233971509', 'Y'),
('AabheerAhluwalia5740600229', 'Aabheer', 'Ahluwalia', 20, '7', '1', 'AabheerAhluwalia@ahx.com', 'AabheerAhluwalia@mydomain.com', '5740600229', '2019', '', '5740600229', 'Y'),
('AabherAhuja4829971174', 'Aabher', 'Ahuja', 21, '2', '1', 'AabherAhuja@czp.com', 'AabherAhuja@mydomain.com', '4829971174', '2018', '', '4829971174', 'Y'),
('AacharappanAmble2655320758', 'Aacharappan', 'Amble', 22, '7', '5', 'AacharappanAmble@ltr.com', 'AacharappanAmble@mydomain.com', '2655320758', '2015', '', '2655320758', 'Y'),
('AacharyaAnand1201548763', 'Aacharya', 'Anand', 23, '5', '5', 'AacharyaAnand@duj.com', 'AacharyaAnand@mydomain.com', '1201548763', '2018', '', '1201548763', 'Y'),
('AachmanAndra5544423172', 'Aachman', 'Andra', 24, '9', '2', 'AachmanAndra@xtt.com', 'AachmanAndra@mydomain.com', '5544423172', '2014', '', '5544423172', 'Y'),
('AachuthanAnne2364020462', 'Aachuthan', 'Anne', 25, '10', '2', 'AachuthanAnne@pog.com', 'AachuthanAnne@mydomain.com', '2364020462', '2018', '', '2364020462', 'Y'),
('AadalarasanArora4293462099', 'Aadalarasan', 'Arora', 27, '10', '3', 'AadalarasanArora@tnp.com', 'AadalarasanArora@mydomain.com', '4293462099', '2016', '', '4293462099', 'Y'),
('AadalarasuArya1263296970', 'Aadalarasu', 'Arya', 28, '5', '3', 'AadalarasuArya@aqi.com', 'AadalarasuArya@mydomain.com', '1263296970', '2019', '', '1263296970', 'Y'),
('AadApte2005948474', 'Aad', 'Apte', 26, '5', '3', 'AadApte@nmr.com', 'AadApte@mydomain.com', '2005948474', '2015', '', '2005948474', 'Y'),
('AadarshAtwal3642347592', 'Aadarsh', 'Atwal', 29, '4', '5', 'AadarshAtwal@aix.com', 'AadarshAtwal@mydomain.com', '3642347592', '2016', '', '3642347592', 'Y'),
('AadavanAurora5300946917', 'Aadavan', 'Aurora', 30, '6', '4', 'AadavanAurora@awe.com', 'AadavanAurora@mydomain.com', '5300946917', '2019', '', '5300946917', 'Y'),
('AadavanBabu6833836173', 'Aadavan', 'Babu', 31, '5', '6', 'AadavanBabu@jsx.com', 'AadavanBabu@mydomain.com', '6833836173', '2014', '', '6833836173', 'Y'),
('AaddharBadal2355862007', 'Aaddhar', 'Badal', 32, '7', '6', 'AaddharBadal@sua.com', 'AaddharBadal@mydomain.com', '2355862007', '2015', '', '2355862007', 'Y'),
('AadeepBadami6967636528', 'Aadeep', 'Badami', 33, '1', '2', 'AadeepBadami@rnf.com', 'AadeepBadami@mydomain.com', '6967636528', '2019', '', '6967636528', 'Y'),
('AadeshBahl3212828130', 'Aadesh', 'Bahl', 34, '1', '6', 'AadeshBahl@eey.com', 'AadeshBahl@mydomain.com', '3212828130', '2014', '', '3212828130', 'Y'),
('AadeshwarBahri2870840118', 'Aadeshwar', 'Bahri', 35, '9', '3', 'AadeshwarBahri@vqx.com', 'AadeshwarBahri@mydomain.com', '2870840118', '2017', '', '2870840118', 'Y'),
('AadhanBail9873231318', 'Aadhan', 'Bail', 36, '12', '2', 'AadhanBail@irt.com', 'AadhanBail@mydomain.com', '9873231318', '2014', '', '9873231318', 'Y'),
('AbhijitPai9196633047', 'Abhijit', 'Pai', 12, '8', '1', 'apai193@yahoo.co.in', 'AbhijitPai@mydomain.com', '', '0000-00-00', '0000-00-00', '9196633047', 'Y'),
('AbhijitPai9663304791', 'Abhijit', 'Pai', 9, '3', '5', 'apai1993@yahoo.com', 'AbhijitPai@mydomain.com', '', '0000-00-00', '0000-00-00', '9663304791', 'Y'),
('AdityaPai9663304792', 'Aditya', 'Pai', 10, '8', '1', 'adityapai@y7mail.com', 'AdityaPaimydomain.com', '', '0000-00-00', '0000-00-00', '9663304792', 'Y'),
('ChorBhajia3322556688', 'Chor', 'Bhajia', 6, '2', '2', 'cbha@vkpsolutions.com', 'ChorBhajia@mydomain.com', '', '0000-00-00', '0000-00-00', '3322556688', 'Y'),
('DaamodarBains6697460354', 'Daamodar', 'Bains', 37, '9', '3', 'DaamodarBains@ciy.com', 'DaamodarBains@mydomain.com', '6697460354', '2016', '', '6697460354', 'Y'),
('DaarshikBajaj6252028601', 'Daarshik', 'Bajaj', 38, '9', '3', 'DaarshikBajaj@zif.com', 'DaarshikBajaj@mydomain.com', '6252028601', '2019', '', '6252028601', 'Y'),
('DaarukBajwa9599498968', 'Daaruk', 'Bajwa', 39, '2', '4', 'DaarukBajwa@kia.com', 'DaarukBajwa@mydomain.com', '9599498968', '2017', '', '9599498968', 'Y'),
('DaarunBakshi1759930847', 'Daarun', 'Bakshi', 40, '4', '3', 'DaarunBakshi@sst.com', 'DaarunBakshi@mydomain.com', '1759930847', '2014', '', '1759930847', 'Y'),
('DaasuBal5564801148', 'Daasu', 'Bal', 41, '10', '5', 'DaasuBal@idq.com', 'DaasuBal@mydomain.com', '5564801148', '2015', '', '5564801148', 'Y'),
('DabangBala7816307738', 'Dabang', 'Bala', 42, '5', '5', 'DabangBala@wqj.com', 'DabangBala@mydomain.com', '7816307738', '2015', '', '7816307738', 'Y'),
('DabeetBala5632918737', 'Dabeet', 'Bala', 43, '1', '3', 'DabeetBala@qzu.com', 'DabeetBala@mydomain.com', '5632918737', '2016', '', '5632918737', 'Y'),
('DabhitiBalakrishnan3415180208', 'Dabhiti', 'Balakrishnan', 44, '4', '4', 'DabhitiBalakrishnan@cpv.c', 'DabhitiBalakrishnan@mydomain.com', '3415180208', '2015', '', '3415180208', 'Y'),
('DabnshuBalan5281612819', 'Dabnshu', 'Balan', 45, '9', '1', 'DabnshuBalan@kfz.com', 'DabnshuBalan@mydomain.com', '5281612819', '2017', '', '5281612819', 'Y'),
('DadasahebBalasubramanian9396067830', 'Dadasaheb', 'Balasubramanian', 46, '12', '2', 'DadasahebBalasubramanian@', 'DadasahebBalasubramanian@mydomain.com', '9396067830', '2019', '', '9396067830', 'Y'),
('DadhicaBalay2211072885', 'Dadhica', 'Balay', 47, '12', '2', 'DadhicaBalay@vmc.com', 'DadhicaBalay@mydomain.com', '2211072885', '2016', '', '2211072885', 'Y'),
('DroopyStuppi15995611590', 'Droopy', 'Stuppi', 14, '9', '2', 'dstu@vkpsolutions.com', 'DroopiStuppi@mydomain.com', '', '0000-00-00', '0000-00-00', '15995611590', 'Y'),
('FalorSofa1424344454', 'Falor', 'Sofa', 13, '9', '2', 'fsof@vkpsolutions.com', 'FalorSofa@mydomain.com', '', '0000-00-00', '0000-00-00', '1424344454', 'Y'),
('fikkSicck1591591590', 'fikk', 'Sicck', 11, '8', '1', 'fs@fds.com', 'fikkSicck@mydomain.com', '', '0000-00-00', '0000-00-00', '1591591590', 'Y'),
('IKoota9966338855', 'Piddi', 'Koota', 4, '5', '1', 'pikoo@vkpsolutions.com', 'PiddiKoota@mydomain.com', '', '', '', '9966338855', 'Y'),
('IPoori1234567890', 'Joori', 'Poori', 7, '3', '5', 'jooripoori@asd.com', 'JooriPoori@mydomain.com', '', '2018', '2021', '1234567890', 'Y'),
('KavyaPai9611907001', 'Kavya', 'Pai', 1, '1', '1', 'vkaapai@yahoo.com', 'KavyaPai@mydomain.com', '', '0000-00-00', '0000-00-00', '9611907001', 'Y'),
('PramodDumbo3652365201', 'Pramod', 'Dumbo', 2, '5', '1', 'pdum@vkpsolutions.com', 'PramodDumbo@mydomain.com', '', '0000-00-00', '0000-00-00', '3652365201', 'Y'),
('VarthaManishu6454342421', 'Vartha', 'Manishu', 3, '1', '2', 'vman@vkpsolutions.com', 'VarthaManishu@mydomain.com', '', '0000-00-00', '0000-00-00', '6454342421', 'Y'),
('VBaltu8787878787', 'Faltu', 'Baltu', 8, '3', '5', 'falbal@wewe.com', 'FaltuBaltu@mydomain.com', '', '2017', '2022', '8787878787', 'Y'),
('VIPanju4564564560', 'Ganju', 'Panju', 5, '2', '2', 'ganpan@vkpsolutions.com', 'GanjuPanju@mydomain.com', '', '', '', '4564564560', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`sId`),
  ADD UNIQUE KEY `firstName` (`firstName`,`lastName`,`Email`,`phoneMobile`),
  ADD KEY `classNumber` (`classId`),
  ADD KEY `sectionAlpha` (`sectionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
