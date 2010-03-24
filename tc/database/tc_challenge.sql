-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2010 at 12:37 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

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

CREATE TABLE IF NOT EXISTS `tc_challenge` (
  `tc_challenge` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `tc_short_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tc_challenge_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tc_station_count` int(4) NOT NULL DEFAULT '0',
  `tc_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tc_extra_details` text COLLATE utf8_unicode_ci NOT NULL,
  `tc_dates` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tc_order` int(11) DEFAULT NULL,
  `tc_uri` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tc_challenge`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tc_challenge`
--

INSERT INTO `tc_challenge` (`tc_challenge`, `tc_short_name`, `tc_challenge_name`, `tc_station_count`, `tc_description`, `tc_extra_details`, `tc_dates`, `tc_order`, `tc_uri`) VALUES
('A11', 'All Lines', 'All Lines Challenge', 0, 'Complete a journey on each of the 11 lines as quickly as possible.', '', 'December 2007-present (since closure of ELL)', 1, 'alllines'),
('A12', 'All Lines', 'All Lines Challenge', 0, 'Complete a journey on each of the 12 lines as quickly as possible', 'Until December 2007 the East London Line formed part of the London Underground Network, and until its removal, the All Lines Challenge was a 12-line challenge.', 'Until December 2007 (before ELL closure)', 2, 'alllines'),
('D38', 'DLR', 'Docklands Light Railway Challenge', 38, 'Visit every station on the DLR by DLR train as quickly as possible', 'Until December 2007 there was no station at Langdon Park, and a separate record existed for this configuration.', 'Until December 2007 (prior to opening of Langdon Park)', 4, 'dlr'),
('D39', 'DLR', 'Docklands Light Railway Challenge', 39, 'Visit every station on the DLR by DLR train as quickly as possible', 'Between December 2007 and June 2008 the first of two short-term interim configurations existed - this one was 39 stations with the opening of Langdon Park, but before the closure of Tower Gateway.', 'December 2007-June 2008', 3, 'dlr'),
('MOU', 'Mouse', 'The Mouse Challenge', 33, 'Visit every station on or inside the region bounded by the two central London branches of the Northern line as quickly as possible', '', 'Present', NULL, 'mouse'),
('BOT', 'Bottle', 'The Circle Line Bottle Challenge', 50, 'Visit every station on or inside the region bounded by the Circle Line as quickly as possible. Edgware Road (Bakerloo) and Marylebone must be visited.', '', 'Present', NULL, 'bottle'),
('S29', 'South London', 'The South London Challenge', 29, 'Visit every station south of the River Thames as quickly as possible', '', 'December 2007-present (since closure of ELL)', 1, 'southlondon'),
('S33', 'South London', 'The South London Challenge', 33, 'Visit every station south of the River Thames as quickly as possible', 'Until December 2007 the East London Line formed part of the London Underground Network, and until its removal, the South London Challenge included Wapping, Surrey Quays, New Cross &amp; New Cross Gate.', 'Until December 2007 (prior to closure of ELL)', 2, 'southlondon'),
('ABC', 'Alphabet', 'The Alphabet Challenge', 0, 'Visit a station beginning with each letter of the Alphabet (excuding J, X, Y, Z), in sequence, as quickly as possible.', '', 'Present', NULL, 'alphabet'),
('TRM', 'Tramlink', 'The Tramlink Challenge', 39, 'Visit every stop on the Tramlink as quickly as possible', '', 'Present', NULL, 'tramlink'),
('275', 'Full Network', 'The Full Network Challenge', 275, 'Visit every station on the London Underground as quickly as possible.', 'Until December 2007 the East London Line was part of the Underground network, and so the configuration was one of 275 stations. At various stages Shoreditch and Heathrow Terminal 4 were closed, but could be visited by bus to register a full 275 time. Times set without a visit to these closed stations are included below the main list, and incomplete attempts below that.', 'Until June 2006 (with closure of Shoreditch)', 5, 'fullnetwork'),
('274', 'Full Network', 'The Full Network Challenge', 274, 'Visit every station on the London Underground as quickly as possible.', '', 'June 2006-December 2007', 4, 'fullnetwork'),
('269', 'Full Network', 'The Full Network Challenge', 269, 'Visit every station on the London Underground as quickly as possible', '', 'March 2008-October 2008', 2, 'fullnetwork'),
('268', 'Full Network', 'The Full Network Challenge', 268, 'Visit every station on the London Underground as quickly as possible', 'Between December 2007 and March 2008 there existed a short-lived configuration of 268 stations, as the system was inbetween the closure of the East London Line, and the opening of the new Heathrow Terminal 5 branch of the Piccadilly Line.', 'December 2007-March 2008', 3, 'fullnetwork'),
('Z1C', 'Zone 1', 'Zone 1 Challenge', 64, 'Visit every station in Travelcard Zone 1 as quickly as possible, including both Edgware Roads and both Paddingtons.', '', 'Present', NULL, 'zone1'),
('D3E', 'DLR', 'Docklands Light Railway Challenge', 38, 'Visit every station on the DLR by DLR train as quickly as possible', 'In June 2008 Tower Gateway closed, bringing about the second temporary configuration, until the re-opening of Tower Gateway and the opening of Woolwich Arsenal.', 'June 2008-March 2009', 2, 'dlr'),
('R15', 'Random 15', 'Random 15', 15, 'Visit a selection of 15 random station within Zones 1 and 2, knowing only the first station in advance.', 'A strange one to have on the site, as of course the time varies with stations drawn - but this also applies to some extent to other challenges with respect to starting station. It''s good to have a central location to store the times in any case. This site now has its very own <a href="r15generator/"><b>Random Stations Generator</b></a> which can be used to generate a set of stations for an R15 challenge...', 'Present', NULL, 'random15'),
('PRK', 'Xmas Park', 'The Christmas Park Challenge', 24, 'Visit, and photograph the exterior of,  every London Underground station with the word "Park" in the name as quickly as possible', '', 'Present', NULL, 'xmaspark'),
('129', 'Snake', '129 Snake Challenge', 129, 'The 129 snake represents the maximum number of stations that can be visited without leaving the network whilst visiting any station no more than once.', 'The previous configuration was 129 stations, and existed prior to the closure of the East London Line.', 'Until December 2007', 2, 'snake'),
('POC', 'Pts/Compass', 'Points of the Compass', 32, 'Visit every station prefixed or suffixed with a point of the compass as quickly as possible', '', 'Present', NULL, 'pointsofcompass'),
('RSL', 'Roads/Streets', 'Roads, Streets and Lanes Challenge', 27, 'Visit all stations with &#8220;Road&#8221;, &#8220;Street&#8221;, &#8220;Avenue&#8221;, &#8220;Lane&#8221; or &#8220;Crescent&#8221; in the name as quickly as possible, finishing at Mornington Crescent', '', 'Present', NULL, 'roadsstreetslanes'),
('Z12', 'Zones 1 &amp; 2', 'Zones 1 &amp; 2 Challenge', 132, 'Visit every station in travelcard Zones 1 &amp; 2 as quickly as possible', '', 'Present', NULL, 'zones1-2'),
('270', 'Full Network', 'The Full Network Challenge', 270, 'Visit every station on the London Underground as quickly as possible', 'Full list of times achieved on the current full network configuration - completed attempts first, followed by incomplete attempts sorted first by number of stations completed, then by time taken.', 'October 2008-present', 1, 'fullnetwork'),
('128', 'Snake', '128 Snake Challenge', 128, 'The 128 snake represents the maximum number of stations that can be visited without leaving the network whilst visiting any station no more than once.', 'This challenge started as a theoretical exercise or desktop challenge to determine the most stations it is possible to visit without leaving the network, and without repetition. Since the closure of the East London Line, the 129 Snake is no longer valid, and a new 128 configuration is open.', 'December 2007-present', 1, 'snake'),
('D40', 'DLR', 'Docklands Light Railway Challenge', 40, 'Visit every station on the DLR by DLR train as quickly as possible', '', 'Since March 2009', 1, 'dlr'),
('BOR', 'Boroughs', 'The London Boroughs Challenge', 0, 'Visit every london Borough by public transport', '', 'Current', NULL, 'boroughs');
