-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2009 at 10:53 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtubechallengeleague`
--

-- --------------------------------------------------------

--
-- Table structure for table `tc_challenge`
--

CREATE TABLE `tc_challenge` (
  `tc_challenge` char(3) collate utf8_unicode_ci NOT NULL,
  `tc_short_name` varchar(15) collate utf8_unicode_ci NOT NULL,
  `tc_challenge_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tc_station_count` int(4) NOT NULL default '0',
  `tc_description` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tc_dates` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tc_uri` varchar(32) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`tc_challenge`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tc_challenge`
--

INSERT INTO `tc_challenge` (`tc_challenge`, `tc_short_name`, `tc_challenge_name`, `tc_station_count`, `tc_description`, `tc_dates`, `tc_uri`) VALUES
('A11', 'All Lines', 'All Lines Challenge', 0, 'Complete a journey on each of the 11 lines as quickly as possible.', 'December 2007-present (since closure of ELL)', 'alllines'),
('A12', 'All Lines', 'All Lines Challenge', 0, 'Complete a journey on each of the 12 lines as quickly as possible', 'Until December 2007 (before ELL closure)', 'alllines'),
('D38', 'DLR', 'Docklands Light Railway Challenge', 38, 'Visit every station on the DLR by DLR train as quickly as possible', 'Until December 2007 (prior to opening of Langdon Park)', 'dlr'),
('D39', 'DLR', 'Docklands Light Railway Challenge', 39, 'Visit every station on the DLR by DLR train as quickly as possible', 'December 2007-June 2008', 'dlr'),
('MOU', 'Mouse', 'The Mouse Challenge', 33, 'Visit every station on or inside the region bounded by the two central London branches of the Northern line as quickly as possible', 'Present', 'mouse'),
('BOT', 'Bottle', 'The Circle Line Bottle Challenge', 50, 'Visit every station on or inside the region bounded by the Circle Line as quickly as possible. Edgware Road (Bakerloo) and Marylebone must be visited.', 'Present', 'bottle'),
('S29', 'South London', 'The South London Challenge', 29, 'Visit every station south of the River Thames as quickly as possible', 'December 2007-present (since closure of ELL)', 'southlondon'),
('S33', 'South London', 'The South London Challenge', 33, 'Visit every station south of the River Thames as quickly as possible', 'Until december 2007 (prior to closure of ELL)', 'southlondon'),
('ABC', 'Alphabet', 'The Alphabet Challenge', 0, 'Visit a station beginning with each letter of the Alphabet (excuding J, X, Y, Z), in sequence, as quickly as possible.', 'Present', 'alphabet'),
('TRM', 'Tramlink', 'The Tramlink Challenge', 39, 'Visit every stop on the Tramlink as quickly as possible', 'Present', 'tramlink'),
('275', 'Full Network', 'The Full Network Challenge', 275, 'Visit every station on the London Underground as quickly as possible.', 'Until June 2006 (with closure of Shoreditch)', 'fullnetwork'),
('274', 'Full Network', 'The Full Network Challenge', 274, 'Visit every station on the London Underground as quickly as possible.', 'June 2006-December 2007', 'fullnetwork'),
('269', 'Full Network', 'The Full Network Challenge', 269, 'Visit every station on the London Underground as quickly as possible', 'March 2008-October 2008', 'fullnetwork'),
('268', 'Full Network', 'The Full Network Challenge', 268, 'Visit every station on the London Underground as quickly as possible', 'December 2007-March 2008', 'fullnetwork'),
('Z1C', 'Zone 1', 'Zone 1 Challenge', 64, 'Visit every station in Travelcard Zone 1 as quickly as possible, including both Edgware Roads and both Paddingtons.', 'Present', 'zone1'),
('D3E', 'DLR', 'Docklands Light Railway Challenge', 38, 'Visit every station on the DLR by DLR train as quickly as possible', 'June 2008-March 2009', 'dlr'),
('R15', 'Random 15', 'Random 15', 15, 'Visit a selection of 15 random station within Zones 1 and 2, knowing only the first station in advance.', 'Present', 'random15'),
('PRK', 'Xmas Park', 'The Christmas Park Challenge', 24, 'Visit, and photograph the exterior of,  every London Underground station with the word "Park" in the name as quickly as possible', 'Present', 'xmaspark'),
('SNK', '129 Snake', '129 Snake Challenge', 129, 'The 129 snake represents the maximum number of stations that can be visited without leaving the network whilst visiting any station no more than once.', 'Until December 2007', '129snake'),
('POC', 'Pts/Compass', 'Points of the Compass', 32, 'Visit every station prefixed or suffixed with a point of the compass as quickly as possible', 'Present', 'pointsofcompass'),
('RSL', 'Roads/Streets', 'Roads, Streets and Lanes Challenge', 27, 'Visit all stations with &#8220;Road&#8221;, &#8220;Street&#8221;, &#8220;Avenue&#8221;, &#8220;Lane&#8221; or &#8220;Crescent&#8221; in the name as quickly as possible, finishing at Mornington Crescent', 'Present', 'roadsstreetslanes'),
('Z12', 'Zone 1 &amp; 2', 'Zones 1 &amp; 2 Challenge', 132, 'Visit every station in travelcard Zones 1 &amp; 2 as quickly as possible', 'Present', 'zone12'),
('270', 'Full Network', 'The Full Network Challenge', 270, 'Visit every station on the London Underground as quickly as possible', 'October 2008-present', 'fullnetwork'),
('SK2', '128 Snake', '128 Snake Challenge', 128, 'The 128 snake represents the maximum number of stations that can be visited without leaving the network whilst visiting any station no more than once.', 'December 2007-present', '129snake'),
('D40', 'DLR', 'Docklands Light Railway Challenge', 40, 'Visit every station on the DLR by DLR train as quickly as possible', 'Since March 2009', 'dlr'),
('BOR', 'Boroughs', 'The London Boroughs Challenge', 0, 'Visit every london Borough by public transport', 'Current', 'boroughs');
