-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2024 at 12:02 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saulite`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_latvian_ci NOT NULL,
  `Password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_latvian_ci NOT NULL,
  `Type` text COLLATE utf8mb4_latvian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `Name`, `Password`, `Type`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'sponsor', '123', 'sponsor');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` text COLLATE utf8mb4_latvian_ci NOT NULL,
  `Type` int NOT NULL,
  `Date` text COLLATE utf8mb4_latvian_ci NOT NULL,
  `Price` float NOT NULL,
  `Info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_latvian_ci NOT NULL,
  `Picture` text COLLATE utf8mb4_latvian_ci NOT NULL,
  `Filter` text COLLATE utf8mb4_latvian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `Name`, `Type`, `Date`, `Price`, `Info`, `Picture`, `Filter`) VALUES
(1, 'Izlaidums no bērnudārza', 1, '23.05.2024', 15, 'Sveiciens jums visiem svarīgajā dienā, kad mūsu bērnudārza mazie audzināmie pabeidz savu pirmo posmu izglītībā un dodas ceļā uz jauniem izaicinājumiem skolas dzīvē!\r\n\r\nLai mūsu bērni varētu dalīties ar prieku un lepnumu, mēs jūs visus aicinām uz mūsu bērnudārza izlaidumu pasākumu. Šajā dienā mēs kopā atcerēsimies visus svētku brīžus, kas ir pavadijuši mūsu dārgos bērnus cauri viņu pirmajiem dzīves gadiem.\r\n\r\nPasākums būs piepildīts ar prieku, smiekliem un mūziku. Mūsu mazie diplomanti būs sagatavojuši īpašas izrādes, kurās viņi spilgti izpaudīs savu talantu un radošumu. Tāpat būs iespēja iegūt atmiņu fotogrāfijās, kā arī nosvinēt šo svarīgo soli viņu dzīvē.\r\n\r\nLūdzu, nāciet kopā ar savām ģimenēm, draugiem un radiem, lai dalītos šajā prieka brīdī mūsu bērnudārza diplomantiem. Ceram, ka šis pasākums būs neaizmirstams un piepildīts ar daudzām smaidīgām sejām un siltu atmosfēru.\r\n\r\nLai mums kopā atzīmēt šo svarīgo dienu un piedzīvot tos neaizmirstamos mirkļus kopā ar mūsu mazajiem diplomantiem!', '1bernudarzs.jpg', 'Bērnudārzs, Māksa ieieja'),
(2, 'Skolas ballīte', 3, '12.03.2024', 30, 'Svētku gaisotne ir uz mums nākusi, un esam ļoti priecīgi aicināt jūs visus piedalīties mūsu skolas lielajā ballītē! Šī ir brīnišķīga iespēja izsmelties un atpūsties kopā ar draugiem un ģimeni, atzīmējot mūsu pusaudžu izcilos sasniegumus un kopīgi daloties priekā.\r\n\r\nMūsu skolas ballīte ir pasākums, kurā varēsiet izbaudīt mūzikas ritmus, deju soļus un pārsteigumus, kas būs sagatavoti īpaši šai dienai. Būs arī garšīga ēdienkarte ar dažādiem uzkodāniem un dzērieniem, lai garsētu kopīgām sarunām ar draugiem un ģimeni.\r\n\r\nTātad, ņemiet līdzi savus labākos apģērbus un dejošanas kurpes un nāciet, lai mēs kopā pavadītu aizraujošu vakaru! Šī būs lieliska iespēja radīt vēl vienu neaizmirstamu atmiņu mūsu skolas dzīvē. Jūs varat būt droši, ka šajā pasākumā būs daudz smieklu, dejām un prieka.\r\n\r\nLai mūsu skolas ballīte būtu veiksmīga un aizraujoša, lūdzu, apstipriniet savu dalību. Mēs nevarētu sagaidīt vairāk, lai svinētu kopā ar jums un jūsu ģimenēm.', '1ballite.jpeg', 'Skola, Māksa ieieja'),
(3, 'Programmēšanas olimpiāde', 2, '22.01.2024', 0, 'Esam sajūsmā jums visiem piedāvāt un aicināt piedalīties mūsu gaidāmajā programmēšanas olimpiādē! Šī ir lieliska iespēja izmēģināt savas spējas, risinot interesantas un aizraujošas programmēšanas uzdevumu, un sacensties ar citiem talantīgajiem skolēniem no visām mūsu pilsētas skolām.\r\n\r\n Mēs esam ļoti gandarīti, ka jūs izrādījāt interesi un aizrautību par programmēšanu, un šis pasākums sniegs iespēju pierādīt savu prasmi un piedalīties izglītojošā un aizraujošā sacensībā.\r\n\r\nMēs sagatavojam vairākas programmēšanas uzdevumu kategorijas, lai atbilstu dažādām zināšanu un pieredzes līmeņiem. Neatkarīgi no tā, vai jūs esat jauni programmēšanas entuziasti vai jau pieredzējuši kodētāji, šī olimpiāde piedāvās iespēju iegūt jaunas zināšanas un iepazīties ar citiem programmēšanas entuziastiem.\r\n\r\nLai pieteiktos šajā uzņēmējdarbības piedzīvojumā, lūdzu, aizpildiet pieteikuma veidlapu. Mēs ceram, ka jūs pievienosieties mums šajā stimulējošajā sacensībā un palīdzēsiet veidot nākotnes tehnoloģiju pasaules sākumus.', '1program.jpg', 'Bezmaksas ieieja, Programmēšana');

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

DROP TABLE IF EXISTS `search_history`;
CREATE TABLE IF NOT EXISTS `search_history` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Time` text COLLATE utf8mb4_latvian_ci NOT NULL,
  `Result` text COLLATE utf8mb4_latvian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`ID`, `Time`, `Result`) VALUES
(1, '18-01-2024, 21:55', 'bērudārza'),
(3, '18-01-2024, 21:58', 'bērnudārza');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
