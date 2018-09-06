-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 10:14 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cruise_survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_admin`
--

CREATE TABLE `cs_admin` (
  `admin_id` bigint(11) NOT NULL,
  `admin_type` char(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_key` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_admin`
--

INSERT INTO `cs_admin` (`admin_id`, `admin_type`, `email`, `password`, `admin_key`, `firstname`, `lastname`, `phone`, `address`, `status`, `created_at`) VALUES
(1, 'S', 'superadmin@gmail.com', '4a332b3a019ca5bbb9d80704e3fcc27f', '', 'Admin', '', '', 'test', 'A', 0),
(2, '', 'paul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ff155d9cbc055bd13c7e3457c312ac755b855b23b529e', 'paul', 'Pandi', '9999434342', 'test', 'A', 1535466275);

-- --------------------------------------------------------

--
-- Table structure for table `cs_countries`
--

CREATE TABLE `cs_countries` (
  `country_id` int(11) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_countries`
--

INSERT INTO `cs_countries` (`country_id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 'A'),
(2, 'AL', 'Albania', 'A'),
(3, 'DZ', 'Algeria', 'A'),
(4, 'DS', 'American Samoa', 'A'),
(5, 'AD', 'Andorra', 'A'),
(6, 'AO', 'Angola', 'A'),
(7, 'AI', 'Anguilla', 'A'),
(8, 'AQ', 'Antarctica', 'A'),
(9, 'AG', 'Antigua and Barbuda', 'A'),
(10, 'AR', 'Argentina', 'A'),
(11, 'AM', 'Armenia', 'A'),
(12, 'AW', 'Aruba', 'A'),
(13, 'AU', 'Australia', 'A'),
(14, 'AT', 'Austria', 'A'),
(15, 'AZ', 'Azerbaijan', 'A'),
(16, 'BS', 'Bahamas', 'A'),
(17, 'BH', 'Bahrain', 'A'),
(18, 'BD', 'Bangladesh', 'A'),
(19, 'BB', 'Barbados', 'A'),
(20, 'BY', 'Belarus', 'A'),
(21, 'BE', 'Belgium', 'A'),
(22, 'BZ', 'Belize', 'A'),
(23, 'BJ', 'Benin', 'A'),
(24, 'BM', 'Bermuda', 'A'),
(25, 'BT', 'Bhutan', 'A'),
(26, 'BO', 'Bolivia', 'A'),
(27, 'BA', 'Bosnia and Herzegovina', 'A'),
(28, 'BW', 'Botswana', 'A'),
(29, 'BV', 'Bouvet Island', 'A'),
(30, 'BR', 'Brazil', 'A'),
(31, 'IO', 'British Indian Ocean Territory', 'A'),
(32, 'BN', 'Brunei Darussalam', 'A'),
(33, 'BG', 'Bulgaria', 'A'),
(34, 'BF', 'Burkina Faso', 'A'),
(35, 'BI', 'Burundi', 'A'),
(36, 'KH', 'Cambodia', 'A'),
(37, 'CM', 'Cameroon', 'A'),
(38, 'CA', 'Canada', 'A'),
(39, 'CV', 'Cape Verde', 'A'),
(40, 'KY', 'Cayman Islands', 'A'),
(41, 'CF', 'Central African Republic', 'A'),
(42, 'TD', 'Chad', 'A'),
(43, 'CL', 'Chile', 'A'),
(44, 'CN', 'China', 'A'),
(45, 'CX', 'Christmas Island', 'A'),
(46, 'CC', 'Cocos (Keeling) Islands', 'A'),
(47, 'CO', 'Colombia', 'A'),
(48, 'KM', 'Comoros', 'A'),
(49, 'CG', 'Congo', 'A'),
(50, 'CK', 'Cook Islands', 'A'),
(51, 'CR', 'Costa Rica', 'A'),
(52, 'HR', 'Croatia (Hrvatska)', 'A'),
(53, 'CU', 'Cuba', 'A'),
(54, 'CY', 'Cyprus', 'A'),
(55, 'CZ', 'Czech Republic', 'A'),
(56, 'DK', 'Denmark', 'A'),
(57, 'DJ', 'Djibouti', 'A'),
(58, 'DM', 'Dominica', 'A'),
(59, 'DO', 'Dominican Republic', 'A'),
(60, 'TP', 'East Timor', 'A'),
(61, 'EC', 'Ecuador', 'A'),
(62, 'EG', 'Egypt', 'A'),
(63, 'SV', 'El Salvador', 'A'),
(64, 'GQ', 'Equatorial Guinea', 'A'),
(65, 'ER', 'Eritrea', 'A'),
(66, 'EE', 'Estonia', 'A'),
(67, 'ET', 'Ethiopia', 'A'),
(68, 'FK', 'Falkland Islands (Malvinas)', 'A'),
(69, 'FO', 'Faroe Islands', 'A'),
(70, 'FJ', 'Fiji', 'A'),
(71, 'FI', 'Finland', 'A'),
(72, 'FR', 'France', 'A'),
(73, 'FX', 'France, Metropolitan', 'A'),
(74, 'GF', 'French Guiana', 'A'),
(75, 'PF', 'French Polynesia', 'A'),
(76, 'TF', 'French Southern Territories', 'A'),
(77, 'GA', 'Gabon', 'A'),
(78, 'GM', 'Gambia', 'A'),
(79, 'GE', 'Georgia', 'A'),
(80, 'DE', 'Germany', 'A'),
(81, 'GH', 'Ghana', 'A'),
(82, 'GI', 'Gibraltar', 'A'),
(83, 'GK', 'Guernsey', 'A'),
(84, 'GR', 'Greece', 'A'),
(85, 'GL', 'Greenland', 'A'),
(86, 'GD', 'Grenada', 'A'),
(87, 'GP', 'Guadeloupe', 'A'),
(88, 'GU', 'Guam', 'A'),
(89, 'GT', 'Guatemala', 'A'),
(90, 'GN', 'Guinea', 'A'),
(91, 'GW', 'Guinea-Bissau', 'A'),
(92, 'GY', 'Guyana', 'A'),
(93, 'HT', 'Haiti', 'A'),
(94, 'HM', 'Heard and Mc Donald Islands', 'A'),
(95, 'HN', 'Honduras', 'A'),
(96, 'HK', 'Hong Kong', 'A'),
(97, 'HU', 'Hungary', 'A'),
(98, 'IS', 'Iceland', 'A'),
(99, 'IN', 'India', 'A'),
(100, 'IM', 'Isle of Man', 'A'),
(101, 'ID', 'Indonesia', 'A'),
(102, 'IR', 'Iran (Islamic Republic of)', 'A'),
(103, 'IQ', 'Iraq', 'A'),
(104, 'IE', 'Ireland', 'A'),
(105, 'IL', 'Israel', 'A'),
(106, 'IT', 'Italy', 'A'),
(107, 'CI', 'Ivory Coast', 'A'),
(108, 'JE', 'Jersey', 'A'),
(109, 'JM', 'Jamaica', 'A'),
(110, 'JP', 'Japan', 'A'),
(111, 'JO', 'Jordan', 'A'),
(112, 'KZ', 'Kazakhstan', 'A'),
(113, 'KE', 'Kenya', 'A'),
(114, 'KI', 'Kiribati', 'A'),
(115, 'KP', 'Korea, Democratic People''s Republic of', 'A'),
(116, 'KR', 'Korea, Republic of', 'A'),
(117, 'XK', 'Kosovo', 'A'),
(118, 'KW', 'Kuwait', 'A'),
(119, 'KG', 'Kyrgyzstan', 'A'),
(120, 'LA', 'Lao People''s Democratic Republic', 'A'),
(121, 'LV', 'Latvia', 'A'),
(122, 'LB', 'Lebanon', 'A'),
(123, 'LS', 'Lesotho', 'A'),
(124, 'LR', 'Liberia', 'A'),
(125, 'LY', 'Libyan Arab Jamahiriya', 'A'),
(126, 'LI', 'Liechtenstein', 'A'),
(127, 'LT', 'Lithuania', 'A'),
(128, 'LU', 'Luxembourg', 'A'),
(129, 'MO', 'Macau', 'A'),
(130, 'MK', 'Macedonia', 'A'),
(131, 'MG', 'Madagascar', 'A'),
(132, 'MW', 'Malawi', 'A'),
(133, 'MY', 'Malaysia', 'A'),
(134, 'MV', 'Maldives', 'A'),
(135, 'ML', 'Mali', 'A'),
(136, 'MT', 'Malta', 'A'),
(137, 'MH', 'Marshall Islands', 'A'),
(138, 'MQ', 'Martinique', 'A'),
(139, 'MR', 'Mauritania', 'A'),
(140, 'MU', 'Mauritius', 'A'),
(141, 'TY', 'Mayotte', 'A'),
(142, 'MX', 'Mexico', 'A'),
(143, 'FM', 'Micronesia, Federated States of', 'A'),
(144, 'MD', 'Moldova, Republic of', 'A'),
(145, 'MC', 'Monaco', 'A'),
(146, 'MN', 'Mongolia', 'A'),
(147, 'ME', 'Montenegro', 'A'),
(148, 'MS', 'Montserrat', 'A'),
(149, 'MA', 'Morocco', 'A'),
(150, 'MZ', 'Mozambique', 'A'),
(151, 'MM', 'Myanmar', 'A'),
(152, 'NA', 'Namibia', 'A'),
(153, 'NR', 'Nauru', 'A'),
(154, 'NP', 'Nepal', 'A'),
(155, 'NL', 'Netherlands', 'A'),
(156, 'AN', 'Netherlands Antilles', 'A'),
(157, 'NC', 'New Caledonia', 'A'),
(158, 'NZ', 'New Zealand', 'A'),
(159, 'NI', 'Nicaragua', 'A'),
(160, 'NE', 'Niger', 'A'),
(161, 'NG', 'Nigeria', 'A'),
(162, 'NU', 'Niue', 'A'),
(163, 'NF', 'Norfolk Island', 'A'),
(164, 'MP', 'Northern Mariana Islands', 'A'),
(165, 'NO', 'Norway', 'A'),
(166, 'OM', 'Oman', 'A'),
(167, 'PK', 'Pakistan', 'A'),
(168, 'PW', 'Palau', 'A'),
(169, 'PS', 'Palestine', 'A'),
(170, 'PA', 'Panama', 'A'),
(171, 'PG', 'Papua New Guinea', 'A'),
(172, 'PY', 'Paraguay', 'A'),
(173, 'PE', 'Peru', 'A'),
(174, 'PH', 'Philippines', 'A'),
(175, 'PN', 'Pitcairn', 'A'),
(176, 'PL', 'Poland', 'A'),
(177, 'PT', 'Portugal', 'A'),
(178, 'PR', 'Puerto Rico', 'A'),
(179, 'QA', 'Qatar', 'A'),
(180, 'RE', 'Reunion', 'A'),
(181, 'RO', 'Romania', 'A'),
(182, 'RU', 'Russian Federation', 'A'),
(183, 'RW', 'Rwanda', 'A'),
(184, 'KN', 'Saint Kitts and Nevis', 'A'),
(185, 'LC', 'Saint Lucia', 'A'),
(186, 'VC', 'Saint Vincent and the Grenadines', 'A'),
(187, 'WS', 'Samoa', 'A'),
(188, 'SM', 'San Marino', 'A'),
(189, 'ST', 'Sao Tome and Principe', 'A'),
(190, 'SA', 'Saudi Arabia', 'A'),
(191, 'SN', 'Senegal', 'A'),
(192, 'RS', 'Serbia', 'A'),
(193, 'SC', 'Seychelles', 'A'),
(194, 'SL', 'Sierra Leone', 'A'),
(195, 'SG', 'Singapore', 'A'),
(196, 'SK', 'Slovakia', 'A'),
(197, 'SI', 'Slovenia', 'A'),
(198, 'SB', 'Solomon Islands', 'A'),
(199, 'SO', 'Somalia', 'A'),
(200, 'ZA', 'South Africa', 'A'),
(201, 'GS', 'South Georgia South Sandwich Islands', 'A'),
(202, 'ES', 'Spain', 'A'),
(203, 'LK', 'Sri Lanka', 'A'),
(204, 'SH', 'St. Helena', 'A'),
(205, 'PM', 'St. Pierre and Miquelon', 'A'),
(206, 'SD', 'Sudan', 'A'),
(207, 'SR', 'Suriname', 'A'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', 'A'),
(209, 'SZ', 'Swaziland', 'A'),
(210, 'SE', 'Sweden', 'A'),
(211, 'CH', 'Switzerland', 'A'),
(212, 'SY', 'Syrian Arab Republic', 'A'),
(213, 'TW', 'Taiwan', 'A'),
(214, 'TJ', 'Tajikistan', 'A'),
(215, 'TZ', 'Tanzania, United Republic of', 'A'),
(216, 'TH', 'Thailand', 'A'),
(217, 'TG', 'Togo', 'A'),
(218, 'TK', 'Tokelau', 'A'),
(219, 'TO', 'Tonga', 'A'),
(220, 'TT', 'Trinidad and Tobago', 'A'),
(221, 'TN', 'Tunisia', 'A'),
(222, 'TR', 'Turkey', 'A'),
(223, 'TM', 'Turkmenistan', 'A'),
(224, 'TC', 'Turks and Caicos Islands', 'A'),
(225, 'TV', 'Tuvalu', 'A'),
(226, 'UG', 'Uganda', 'A'),
(227, 'UA', 'Ukraine', 'A'),
(228, 'AE', 'United Arab Emirates', 'A'),
(229, 'GB', 'United Kingdom', 'A'),
(230, 'US', 'United States', 'A'),
(231, 'UM', 'United States minor outlying islands', 'A'),
(232, 'UY', 'Uruguay', 'A'),
(233, 'UZ', 'Uzbekistan', 'A'),
(234, 'VU', 'Vanuatu', 'A'),
(235, 'VA', 'Vatican City State', 'A'),
(236, 'VE', 'Venezuela', 'A'),
(237, 'VN', 'Vietnam', 'A'),
(238, 'VG', 'Virgin Islands (British)', 'A'),
(239, 'VI', 'Virgin Islands (U.S.)', 'A'),
(240, 'WF', 'Wallis and Futuna Islands', 'A'),
(241, 'EH', 'Western Sahara', 'A'),
(242, 'YE', 'Yemen', 'A'),
(243, 'ZR', 'Zaire', 'A'),
(244, 'ZM', 'Zambia', 'A'),
(245, 'ZW', 'Zimbabwe', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cs_guests`
--

CREATE TABLE `cs_guests` (
  `guest_id` varchar(35) NOT NULL,
  `guest_numeric_id` bigint(11) NOT NULL,
  `voyage_id` varchar(35) NOT NULL,
  `firstname` varchar(75) NOT NULL,
  `lastname` varchar(75) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login_name` varchar(75) NOT NULL,
  `password` varchar(50) NOT NULL,
  `title` char(5) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `sex` char(1) NOT NULL,
  `nationality` char(2) NOT NULL,
  `language` char(2) NOT NULL,
  `billing_no` bigint(11) NOT NULL,
  `passenger_no` bigint(11) NOT NULL,
  `booking_no` bigint(11) NOT NULL,
  `cabin_no` int(11) NOT NULL,
  `ship_card_no` bigint(11) NOT NULL,
  `embark_date` int(11) NOT NULL,
  `debark_date` int(11) NOT NULL,
  `passport_no` bigint(11) NOT NULL,
  `passport_expire` int(11) NOT NULL,
  `passport_issued` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_guest_survey_answers`
--

CREATE TABLE `cs_guest_survey_answers` (
  `voyage_id` varchar(35) NOT NULL,
  `survey_id` varchar(35) NOT NULL,
  `guest_id` varchar(35) NOT NULL,
  `section_id` varchar(35) NOT NULL,
  `question_id` varchar(35) NOT NULL,
  `question_type` varchar(50) NOT NULL,
  `option_id` varchar(35) NOT NULL,
  `value` varchar(255) NOT NULL,
  `language_variable` varchar(255) NOT NULL,
  `other_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_guest_survey_comments`
--

CREATE TABLE `cs_guest_survey_comments` (
  `voyage_id` varchar(35) NOT NULL,
  `survey_id` varchar(35) NOT NULL,
  `guest_id` varchar(35) NOT NULL,
  `section_id` varchar(35) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_guest_survey_reports`
--

CREATE TABLE `cs_guest_survey_reports` (
  `voyage_id` varchar(35) NOT NULL,
  `survey_id` varchar(35) NOT NULL,
  `guest_id` varchar(35) NOT NULL,
  `guest_language` char(2) NOT NULL,
  `status` enum('OPEN','FINISHED') NOT NULL DEFAULT 'OPEN',
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_languages`
--

CREATE TABLE `cs_languages` (
  `language_id` int(11) NOT NULL,
  `language_code` char(2) NOT NULL,
  `language_name` varchar(75) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_languages`
--

INSERT INTO `cs_languages` (`language_id`, `language_code`, `language_name`, `status`) VALUES
(1, 'en', 'English', 'A'),
(2, 'pt', 'Portuguese', 'A'),
(3, 'es', 'Spanish', 'A'),
(4, 'fr', 'French', 'A'),
(5, 'de', 'German', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cs_language_values`
--

CREATE TABLE `cs_language_values` (
  `language_code` char(2) NOT NULL,
  `variable_name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` enum('STATIC','DYNAMIC') NOT NULL DEFAULT 'DYNAMIC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_language_values`
--

INSERT INTO `cs_language_values` (`language_code`, `variable_name`, `value`, `type`) VALUES
('de', '0-12-months', '0-12 months', 'DYNAMIC'),
('de', '12-36-months', '12-36 months', 'DYNAMIC'),
('de', 'africa', 'Africa', 'DYNAMIC'),
('de', 'afternoon-tea', 'Afternoon tea', 'DYNAMIC'),
('de', 'air-arrangements', 'Air Arrangements', 'DYNAMIC'),
('de', 'alaska', 'Alaska', 'DYNAMIC'),
('de', 'andrea-fontana-cocktail-planist', 'Andrea fontana- cocktail planist', 'DYNAMIC'),
('de', 'are-you-sure-want-to-exit-survey', 'Are you sure want to exit survey?', 'STATIC'),
('de', 'are-you-sure-want-to-quit-survey', 'Your changes will be lost. Are you sure want to quit survey?', 'STATIC'),
('de', 'artist-loft', 'Artist Loft', 'DYNAMIC'),
('de', 'ashley-carruthers-plano-show-man', 'Ashley carruthers- Plano show man', 'DYNAMIC'),
('de', 'asia', 'Asia', 'DYNAMIC'),
('de', 'australianew-zealand', 'Australia/New Zealand', 'DYNAMIC'),
('de', 'azamara', 'Azamara', 'DYNAMIC'),
('de', 'bar-staff', 'Bar staff', 'DYNAMIC'),
('de', 'baristas', 'Baristas', 'DYNAMIC'),
('de', 'bedding-sleep-experience', 'Bedding /Sleep Experience', 'DYNAMIC'),
('de', 'boutiques', 'Boutiques', 'DYNAMIC'),
('de', 'canadanew-england', 'Canada/New England', 'DYNAMIC'),
('de', 'canyon-ranch-spaclub', 'Canyon Ranch Spaclub', 'DYNAMIC'),
('de', 'caribbeantropics', 'Caribbean/Tropics', 'DYNAMIC'),
('de', 'casino', 'Casino', 'DYNAMIC'),
('de', 'celebrity-cruis', 'Celebrity cruis', 'DYNAMIC'),
('de', 'comments-regarding', 'Comments regarding', 'STATIC'),
('de', 'concierge-lounge-facilities', 'Concierge Lounge Facilities', 'DYNAMIC'),
('de', 'confirm', 'Confirm', 'STATIC'),
('de', 'consistency-of-personalized-service-and-attention-to-detail', 'Consistency of personalized service and attention to detail', 'DYNAMIC'),
('de', 'cruise-director', 'Cruise director', 'DYNAMIC'),
('de', 'crystal-cruises', 'Crystal Cruises', 'DYNAMIC'),
('de', 'customer-login', ' Customer Login', 'STATIC'),
('de', 'deck-attendants-pool-deck-service', 'Deck attendants- Pool deck service', 'DYNAMIC'),
('de', 'definitely', 'Definitely', 'DYNAMIC'),
('de', 'definitely-not', 'Definitely not ', 'DYNAMIC'),
('de', 'destination-services-staff', 'Destination services staff', 'DYNAMIC'),
('de', 'enter-your-message', 'Enter your message', 'STATIC'),
('de', 'entertainment-staff', 'Entertainment staff', 'DYNAMIC'),
('de', 'excellent', 'Excellent', 'DYNAMIC'),
('de', 'executive-lounge-facilities', 'Executive Lounge Facilities', 'DYNAMIC'),
('de', 'exit-survey', ' Exit Survey', 'STATIC'),
('de', 'fair', 'Fair', 'DYNAMIC'),
('de', 'fill-out-our-survey', 'Fill Out our Survey', 'STATIC'),
('de', 'finish-survey', ' Finish Survey', 'STATIC'),
('de', 'friendliness-interaction-with-guests', 'Friendliness & interaction with guests', 'DYNAMIC'),
('de', 'gangway-security-staff', 'Gangway security staff ', 'DYNAMIC'),
('de', 'good', 'Good', 'DYNAMIC'),
('de', 'graham-denison-artist-in-residence', 'Graham denison- Artist in residence', 'DYNAMIC'),
('de', 'greeek-isles', 'Greeek Isles', 'DYNAMIC'),
('de', 'have-you-ever-cruised-before', 'Have you ever cruised before', 'DYNAMIC'),
('de', 'head-sommelierceller-master', 'Head sommelier/Celler master', 'DYNAMIC'),
('de', 'highly-likely', 'Highly likely', 'DYNAMIC'),
('de', 'holland-america', 'Holland America', 'DYNAMIC'),
('de', 'holy-land', 'Holy land', 'DYNAMIC'),
('de', 'how-likely-are-you-to-cruises-with-oceania-cruises-again', 'How likely are you to cruises with oceania cruises again?', 'DYNAMIC'),
('de', 'how-likely-are-you-to-recommend-oceania-cruises-to-a-friend', 'How likely are you to recommend oceania cruises to a friend?', 'DYNAMIC'),
('de', 'if-yeswhich-cruise-lines-have-you-sailed-with-previously', 'If yes,which cruise lines have you sailed with previously?', 'DYNAMIC'),
('de', 'information-and-documentation', 'Information and Documentation', 'DYNAMIC'),
('de', 'invalid-survey-id', 'Invalid Survey ID', 'STATIC'),
('de', 'itinerary', 'Itinerary ', 'DYNAMIC'),
('de', 'jennifer-singer-vocalist', 'Jennifer Singer- Vocalist', 'DYNAMIC'),
('de', 'jerryspeed-ventrlioquist', 'Jerryspeed- Ventrlioquist', 'DYNAMIC'),
('de', 'library-selection', 'Library Selection', 'DYNAMIC'),
('de', 'lightscamera-music-production-show', 'Lights,camera music - production show', 'DYNAMIC'),
('de', 'login', ' Login', 'STATIC'),
('de', 'login-name', 'Login Name', 'STATIC'),
('de', 'logout', 'Logout ', 'STATIC'),
('de', 'maitre-ds', 'Maitre D''s', 'DYNAMIC'),
('de', 'medical-services', 'Medical Services ', 'DYNAMIC'),
('de', 'mediterranean', 'Mediterranean', 'DYNAMIC'),
('de', 'more-than-36-months', 'more than 36 months', 'DYNAMIC'),
('de', 'music-station-band', 'Music station band', 'DYNAMIC'),
('de', 'na', 'N/A', 'DYNAMIC'),
('de', 'no', 'No', 'DYNAMIC'),
('de', 'no-questions-found', 'No questions found', 'STATIC'),
('de', 'no-surveys-found', 'No surveys found', 'STATIC'),
('de', 'no-voyage-is-active', ' No voyage is active', 'STATIC'),
('de', 'no-voyage-is-active-description', 'Sorry currently no voyage is active. Please try again later', 'STATIC'),
('de', 'northern-europe', 'Northern Europe', 'DYNAMIC'),
('de', 'ocean-string-quartet', 'Ocean string Quartet', 'DYNAMIC'),
('de', 'oceania-club-ambassador', 'Oceania club ambassador', 'DYNAMIC'),
('de', 'oceania-cruises', 'Oceania CRUISES', 'DYNAMIC'),
('de', 'oceaniasea-staff', 'Oceania@Sea Staff', 'DYNAMIC'),
('de', 'officers', 'Officers', 'DYNAMIC'),
('de', 'other', ' Other', 'DYNAMIC'),
('de', 'other-please-specify-here', 'If other please specify here', 'STATIC'),
('de', 'overall-cuisine-grand-dining-room', 'Overall cuisine- Grand dining room ', 'DYNAMIC'),
('de', 'overall-cuisine-jacques', 'Overall cuisine- Jacques', 'DYNAMIC'),
('de', 'overall-cuisine-polo-grill', 'Overall cuisine- Polo grill', 'DYNAMIC'),
('de', 'overall-cuisine-red-ginger', 'Overall cuisine - Red ginger', 'DYNAMIC'),
('de', 'overall-cuisine-terrace-cafe', 'Overall cuisine- Terrace cafe', 'DYNAMIC'),
('de', 'overall-cuisine-toscana', 'Overall cuisine -Toscana', 'DYNAMIC'),
('de', 'overall-cuisine-waves-grill', 'Overall cuisine- Waves Grill', 'DYNAMIC'),
('de', 'overall-curise-experience', 'Overall curise experience', 'DYNAMIC'),
('de', 'overall-quality-of-cuisine', 'Overall quality of cuisine', 'DYNAMIC'),
('de', 'overall-reserve-cuisine-wine-experience', 'Overall reserve cuisine &wine experience', 'DYNAMIC'),
('de', 'page-not-found', 'Page Not Found', 'STATIC'),
('de', 'page-not-found-description', 'Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('de', 'panama-canal', 'Panama Canal', 'DYNAMIC'),
('de', 'password', ' Password', 'STATIC'),
('de', 'poor', 'Poor', 'DYNAMIC'),
('de', 'port-lectures', 'Port Lectures', 'DYNAMIC'),
('de', 'ports-of-call', 'Ports of call', 'DYNAMIC'),
('de', 'pre-cruise-hoteltransfor-arrangements', 'Pre cruise Hotel/Transfor arrangements', 'DYNAMIC'),
('de', 'presentation-of-cuisine', 'Presentation of cuisine', 'DYNAMIC'),
('de', 'price', 'Price', 'DYNAMIC'),
('de', 'princes-cruises', 'Princes cruises', 'DYNAMIC'),
('de', 'probably', 'Probably', 'DYNAMIC'),
('de', 'probably-not', 'Probably not', 'DYNAMIC'),
('de', 'quality-of-shore-excursion-experience', 'Quality of shore excursion experience', 'DYNAMIC'),
('de', 'quit-survey', 'Quit Survey', 'STATIC'),
('de', 'reception-staff', 'Reception staff', 'DYNAMIC'),
('de', 'reputation-of-cruise-line', 'Reputation of cruise Line', 'DYNAMIC'),
('de', 'reputation-of-ship', 'Reputation of Ship', 'DYNAMIC'),
('de', 'riviera-orchestra', 'Riviera Orchestra', 'DYNAMIC'),
('de', 'room-service-menu', 'Room service menu', 'DYNAMIC'),
('de', 'room-service-staff', 'Room service staff', 'DYNAMIC'),
('de', 'royal-caribbean', 'Royal Caribbean', 'DYNAMIC'),
('de', 'salute-from-the-crew', 'Salute from the crew', 'DYNAMIC'),
('de', 'save-survey', ' Save Survey', 'STATIC'),
('de', 'service-unavailable', 'Service unavailable', 'STATIC'),
('de', 'service-unavailable-description', ' Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('de', 'silver-sea-cruises', 'Silver sea cruises', 'DYNAMIC'),
('de', 'southern-america', 'Southern America', 'DYNAMIC'),
('de', 'stateroom-maintenance', 'Stateroom Maintenance', 'DYNAMIC'),
('de', 'stateroom-or-suite-cleanliess', 'Stateroom or Suite  Cleanliess', 'DYNAMIC'),
('de', 'staterooms-or-suites-stewardstewardess', 'Staterooms or suites -Steward/Stewardess', 'DYNAMIC'),
('de', 'survey-not-available', 'Survey not available. Please try again.', 'STATIC'),
('de', 'tender-service', 'Tender Service', 'DYNAMIC'),
('de', 'thank-you-for-finishing-survey', 'Thank you for taking the time to complete this survey', 'STATIC'),
('de', 'the-culinary-center-chef', 'The culinary center chef', 'DYNAMIC'),
('de', 'the-culinary-center-classes', 'The culinary center classes', 'DYNAMIC'),
('de', 'the-yachts-of-seabours', 'The Yachts of seabours', 'DYNAMIC'),
('de', 'travel-agent', 'Travel agent', 'DYNAMIC'),
('de', 'tv-programming-movies', 'TV Programming & Movies', 'DYNAMIC'),
('de', 'valet-laundry-services', 'Valet Laundry Services', 'DYNAMIC'),
('de', 'variety-of-menu-items', 'Variety of menu items', 'DYNAMIC'),
('de', 'very-good', 'Very Good', 'DYNAMIC'),
('de', 'wait-staff-grand-dining-room', 'Wait staff- Grand dining room ', 'DYNAMIC'),
('de', 'wait-staff-jacques', 'Wait staff- Jacques', 'DYNAMIC'),
('de', 'wait-staff-la-reserve', 'Wait staff- La Reserve', 'DYNAMIC'),
('de', 'wait-staff-polo-grill', 'Wait staff- Polo grill', 'DYNAMIC'),
('de', 'wait-staff-red-ginger', 'Wait staff - Red ginger', 'DYNAMIC'),
('de', 'wait-staff-terrace-cafe', 'Wait staff- Terrace cafe', 'DYNAMIC'),
('de', 'wait-staff-toscana', 'Wait staff-Toscana', 'DYNAMIC'),
('de', 'wait-staff-wave-grill', 'Wait staff- Wave Grill', 'DYNAMIC'),
('de', 'what-was-the-deciding-factor-in-booking-this-cruises', 'What was the deciding factor in booking this cruises', 'DYNAMIC'),
('de', 'when-would-you-like-to-cruise-next', 'When would you like to cruise next?', 'DYNAMIC'),
('de', 'which-destination-would-you-like-to-cruise-next', 'Which destination would you like to cruise next ?', 'DYNAMIC'),
('de', 'wine-selelctions', 'Wine selelctions', 'DYNAMIC'),
('de', 'wine-waiterssommelier', 'Wine waiters/Sommelier', 'DYNAMIC'),
('de', 'world-beat-production-show', 'World beat - production show', 'DYNAMIC'),
('de', 'yes', 'Yes', 'DYNAMIC'),
('de', 'you-finished-survey', 'You were already finished this survey', 'STATIC'),
('de', 'your-changes-been-saved', 'Your changes have been saved', 'STATIC'),
('en', '0-12-months', '0-12 months', 'DYNAMIC'),
('en', '12-36-months', '12-36 months', 'DYNAMIC'),
('en', 'africa', 'Africa', 'DYNAMIC'),
('en', 'afternoon-tea', 'Afternoon tea', 'DYNAMIC'),
('en', 'air-arrangements', 'Air Arrangements', 'DYNAMIC'),
('en', 'alaska', 'Alaska', 'DYNAMIC'),
('en', 'andrea-fontana-cocktail-planist', 'Andrea fontana- cocktail planist', 'DYNAMIC'),
('en', 'are-you-sure-want-to-exit-survey', 'Are you sure want to exit survey?', 'STATIC'),
('en', 'are-you-sure-want-to-quit-survey', 'Your changes will be lost. Are you sure want to quit survey?', 'STATIC'),
('en', 'artist-loft', 'Artist Loft', 'DYNAMIC'),
('en', 'ashley-carruthers-plano-show-man', 'Ashley carruthers- Plano show man', 'DYNAMIC'),
('en', 'asia', 'Asia', 'DYNAMIC'),
('en', 'australianew-zealand', 'Australia/New Zealand', 'DYNAMIC'),
('en', 'azamara', 'Azamara', 'DYNAMIC'),
('en', 'bar-staff', 'Bar staff', 'DYNAMIC'),
('en', 'baristas', 'Baristas', 'DYNAMIC'),
('en', 'bedding-sleep-experience', 'Bedding /Sleep Experience', 'DYNAMIC'),
('en', 'boutiques', 'Boutiques', 'DYNAMIC'),
('en', 'canadanew-england', 'Canada/New England', 'DYNAMIC'),
('en', 'canyon-ranch-spaclub', 'Canyon Ranch Spaclub', 'DYNAMIC'),
('en', 'caribbeantropics', 'Caribbean/Tropics', 'DYNAMIC'),
('en', 'casino', 'Casino', 'DYNAMIC'),
('en', 'celebrity-cruis', 'Celebrity cruis', 'DYNAMIC'),
('en', 'comments-regarding', 'Comments regarding', 'STATIC'),
('en', 'concierge-lounge-facilities', 'Concierge Lounge Facilities', 'DYNAMIC'),
('en', 'confirm', 'Confirm', 'STATIC'),
('en', 'consistency-of-personalized-service-and-attention-to-detail', 'Consistency of personalized service and attention to detail', 'DYNAMIC'),
('en', 'cruise-director', 'Cruise director', 'DYNAMIC'),
('en', 'crystal-cruises', 'Crystal Cruises', 'DYNAMIC'),
('en', 'customer-login', ' Customer Login', 'STATIC'),
('en', 'deck-attendants-pool-deck-service', 'Deck attendants- Pool deck service', 'DYNAMIC'),
('en', 'definitely', 'Definitely', 'DYNAMIC'),
('en', 'definitely-not', 'Definitely not ', 'DYNAMIC'),
('en', 'destination-services-staff', 'Destination services staff', 'DYNAMIC'),
('en', 'enter-your-message', 'Enter your message', 'STATIC'),
('en', 'entertainment-staff', 'Entertainment staff', 'DYNAMIC'),
('en', 'excellent', 'Excellent', 'DYNAMIC'),
('en', 'executive-lounge-facilities', 'Executive Lounge Facilities', 'DYNAMIC'),
('en', 'exit-survey', ' Exit Survey', 'STATIC'),
('en', 'fair', 'Fair', 'DYNAMIC'),
('en', 'fill-out-our-survey', 'Fill Out our Survey', 'STATIC'),
('en', 'finish-survey', ' Finish Survey', 'STATIC'),
('en', 'friendliness-interaction-with-guests', 'Friendliness & interaction with guests', 'DYNAMIC'),
('en', 'gangway-security-staff', 'Gangway security staff ', 'DYNAMIC'),
('en', 'good', 'Good', 'DYNAMIC'),
('en', 'graham-denison-artist-in-residence', 'Graham denison- Artist in residence', 'DYNAMIC'),
('en', 'greeek-isles', 'Greeek Isles', 'DYNAMIC'),
('en', 'have-you-ever-cruised-before', 'Have you ever cruised before', 'DYNAMIC'),
('en', 'head-sommelierceller-master', 'Head sommelier/Celler master', 'DYNAMIC'),
('en', 'highly-likely', 'Highly likely', 'DYNAMIC'),
('en', 'holland-america', 'Holland America', 'DYNAMIC'),
('en', 'holy-land', 'Holy land', 'DYNAMIC'),
('en', 'how-likely-are-you-to-cruises-with-oceania-cruises-again', 'How likely are you to cruises with oceania cruises again?', 'DYNAMIC'),
('en', 'how-likely-are-you-to-recommend-oceania-cruises-to-a-friend', 'How likely are you to recommend oceania cruises to a friend?', 'DYNAMIC'),
('en', 'if-yeswhich-cruise-lines-have-you-sailed-with-previously', 'If yes,which cruise lines have you sailed with previously?', 'DYNAMIC'),
('en', 'information-and-documentation', 'Information and Documentation', 'DYNAMIC'),
('en', 'invalid-survey-id', 'Invalid Survey ID', 'STATIC'),
('en', 'itinerary', 'Itinerary ', 'DYNAMIC'),
('en', 'jennifer-singer-vocalist', 'Jennifer Singer- Vocalist', 'DYNAMIC'),
('en', 'jerryspeed-ventrlioquist', 'Jerryspeed- Ventrlioquist', 'DYNAMIC'),
('en', 'library-selection', 'Library Selection', 'DYNAMIC'),
('en', 'lightscamera-music-production-show', 'Lights,camera music - production show', 'DYNAMIC'),
('en', 'login', ' Login', 'STATIC'),
('en', 'login-name', ' Login Name', 'STATIC'),
('en', 'logout', 'Logout ', 'STATIC'),
('en', 'maitre-ds', 'Maitre D''s', 'DYNAMIC'),
('en', 'medical-services', 'Medical Services ', 'DYNAMIC'),
('en', 'mediterranean', 'Mediterranean', 'DYNAMIC'),
('en', 'more-than-36-months', 'more than 36 months', 'DYNAMIC'),
('en', 'music-station-band', 'Music station band', 'DYNAMIC'),
('en', 'na', 'N/A', 'DYNAMIC'),
('en', 'no', 'No', 'DYNAMIC'),
('en', 'no-questions-found', 'No questions found', 'STATIC'),
('en', 'no-surveys-found', 'No surveys found', 'STATIC'),
('en', 'no-voyage-is-active', ' No voyage is active', 'STATIC'),
('en', 'no-voyage-is-active-description', 'Sorry currently no voyage is active. Please try again later', 'STATIC'),
('en', 'northern-europe', 'Northern Europe', 'DYNAMIC'),
('en', 'ocean-string-quartet', 'Ocean string Quartet', 'DYNAMIC'),
('en', 'oceania-club-ambassador', 'Oceania club ambassador', 'DYNAMIC'),
('en', 'oceania-cruises', 'Oceania CRUISES', 'DYNAMIC'),
('en', 'oceaniasea-staff', 'Oceania@Sea Staff', 'DYNAMIC'),
('en', 'officers', 'Officers', 'DYNAMIC'),
('en', 'other', ' Other', 'DYNAMIC'),
('en', 'other-please-specify-here', 'If other please specify here', 'STATIC'),
('en', 'overall-cuisine-grand-dining-room', 'Overall cuisine- Grand dining room ', 'DYNAMIC'),
('en', 'overall-cuisine-jacques', 'Overall cuisine- Jacques', 'DYNAMIC'),
('en', 'overall-cuisine-polo-grill', 'Overall cuisine- Polo grill', 'DYNAMIC'),
('en', 'overall-cuisine-red-ginger', 'Overall cuisine - Red ginger', 'DYNAMIC'),
('en', 'overall-cuisine-terrace-cafe', 'Overall cuisine- Terrace cafe', 'DYNAMIC'),
('en', 'overall-cuisine-toscana', 'Overall cuisine -Toscana', 'DYNAMIC'),
('en', 'overall-cuisine-waves-grill', 'Overall cuisine- Waves Grill', 'DYNAMIC'),
('en', 'overall-curise-experience', 'Overall curise experience', 'DYNAMIC'),
('en', 'overall-quality-of-cuisine', 'Overall quality of cuisine', 'DYNAMIC'),
('en', 'overall-reserve-cuisine-wine-experience', 'Overall reserve cuisine &wine experience', 'DYNAMIC'),
('en', 'page-not-found', ' Page Not Found', 'STATIC'),
('en', 'page-not-found-description', 'Sorry the page you are looking for currently not found. Please try again later.', 'STATIC'),
('en', 'panama-canal', 'Panama Canal', 'DYNAMIC'),
('en', 'password', ' Password', 'STATIC'),
('en', 'poor', 'Poor', 'DYNAMIC'),
('en', 'port-lectures', 'Port Lectures', 'DYNAMIC'),
('en', 'ports-of-call', 'Ports of call', 'DYNAMIC'),
('en', 'pre-cruise-hoteltransfor-arrangements', 'Pre cruise Hotel/Transfor arrangements', 'DYNAMIC'),
('en', 'presentation-of-cuisine', 'Presentation of cuisine', 'DYNAMIC'),
('en', 'price', 'Price', 'DYNAMIC'),
('en', 'princes-cruises', 'Princes cruises', 'DYNAMIC'),
('en', 'probably', 'Probably', 'DYNAMIC'),
('en', 'probably-not', 'Probably not', 'DYNAMIC'),
('en', 'quality-of-shore-excursion-experience', 'Quality of shore excursion experience', 'DYNAMIC'),
('en', 'quit-survey', 'Quit Survey', 'STATIC'),
('en', 'reception-staff', 'Reception staff', 'DYNAMIC'),
('en', 'reputation-of-cruise-line', 'Reputation of cruise Line', 'DYNAMIC'),
('en', 'reputation-of-ship', 'Reputation of Ship', 'DYNAMIC'),
('en', 'riviera-orchestra', 'Riviera Orchestra', 'DYNAMIC'),
('en', 'room-service-menu', 'Room service menu', 'DYNAMIC'),
('en', 'room-service-staff', 'Room service staff', 'DYNAMIC'),
('en', 'royal-caribbean', 'Royal Caribbean', 'DYNAMIC'),
('en', 'salute-from-the-crew', 'Salute from the crew', 'DYNAMIC'),
('en', 'save-survey', ' Save Survey', 'STATIC'),
('en', 'service-unavailable', ' Service unavailable', 'STATIC'),
('en', 'service-unavailable-description', 'Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('en', 'silver-sea-cruises', 'Silver sea cruises', 'DYNAMIC'),
('en', 'southern-america', 'Southern America', 'DYNAMIC'),
('en', 'stateroom-maintenance', 'Stateroom Maintenance', 'DYNAMIC'),
('en', 'stateroom-or-suite-cleanliess', 'Stateroom or Suite  Cleanliess', 'DYNAMIC'),
('en', 'staterooms-or-suites-stewardstewardess', 'Staterooms or suites -Steward/Stewardess', 'DYNAMIC'),
('en', 'survey-not-available', 'Survey not available. Please try again.', 'STATIC'),
('en', 'tender-service', 'Tender Service', 'DYNAMIC'),
('en', 'thank-you-for-finishing-survey', 'Thank you for taking the time to complete this survey', 'STATIC'),
('en', 'the-culinary-center-chef', 'The culinary center chef', 'DYNAMIC'),
('en', 'the-culinary-center-classes', 'The culinary center classes', 'DYNAMIC'),
('en', 'the-yachts-of-seabours', 'The Yachts of seabours', 'DYNAMIC'),
('en', 'travel-agent', 'Travel agent', 'DYNAMIC'),
('en', 'tv-programming-movies', 'TV Programming & Movies', 'DYNAMIC'),
('en', 'valet-laundry-services', 'Valet Laundry Services', 'DYNAMIC'),
('en', 'variety-of-menu-items', 'Variety of menu items', 'DYNAMIC'),
('en', 'very-good', 'Very Good', 'DYNAMIC'),
('en', 'wait-staff-grand-dining-room', 'Wait staff- Grand dining room ', 'DYNAMIC'),
('en', 'wait-staff-jacques', 'Wait staff- Jacques', 'DYNAMIC'),
('en', 'wait-staff-la-reserve', 'Wait staff- La Reserve', 'DYNAMIC'),
('en', 'wait-staff-polo-grill', 'Wait staff- Polo grill', 'DYNAMIC'),
('en', 'wait-staff-red-ginger', 'Wait staff - Red ginger', 'DYNAMIC'),
('en', 'wait-staff-terrace-cafe', 'Wait staff- Terrace cafe', 'DYNAMIC'),
('en', 'wait-staff-toscana', 'Wait staff-Toscana', 'DYNAMIC'),
('en', 'wait-staff-wave-grill', 'Wait staff- Wave Grill', 'DYNAMIC'),
('en', 'what-was-the-deciding-factor-in-booking-this-cruises', 'What was the deciding factor in booking this cruises', 'DYNAMIC'),
('en', 'when-would-you-like-to-cruise-next', 'When would you like to cruise next?', 'DYNAMIC'),
('en', 'which-destination-would-you-like-to-cruise-next', 'Which destination would you like to cruise next ?', 'DYNAMIC'),
('en', 'wine-selelctions', 'Wine selelctions', 'DYNAMIC'),
('en', 'wine-waiterssommelier', 'Wine waiters/Sommelier', 'DYNAMIC'),
('en', 'world-beat-production-show', 'World beat - production show', 'DYNAMIC'),
('en', 'yes', 'Yes', 'DYNAMIC'),
('en', 'you-finished-survey', 'You were already finished this survey', 'STATIC'),
('en', 'your-changes-been-saved', 'Your changes have been saved', 'STATIC'),
('es', '0-12-months', '0-12 months', 'DYNAMIC'),
('es', '12-36-months', '12-36 months', 'DYNAMIC'),
('es', 'africa', 'Africa', 'DYNAMIC'),
('es', 'afternoon-tea', 'Afternoon tea', 'DYNAMIC'),
('es', 'air-arrangements', 'Air Arrangements', 'DYNAMIC'),
('es', 'alaska', 'Alaska', 'DYNAMIC'),
('es', 'andrea-fontana-cocktail-planist', 'Andrea fontana- cocktail planist', 'DYNAMIC'),
('es', 'are-you-sure-want-to-exit-survey', 'Are you sure want to exit survey?', 'STATIC'),
('es', 'are-you-sure-want-to-quit-survey', 'Your changes will be lost. Are you sure want to quit survey?', 'STATIC'),
('es', 'artist-loft', 'Artist Loft', 'DYNAMIC'),
('es', 'ashley-carruthers-plano-show-man', 'Ashley carruthers- Plano show man', 'DYNAMIC'),
('es', 'asia', 'Asia', 'DYNAMIC'),
('es', 'australianew-zealand', 'Australia/New Zealand', 'DYNAMIC'),
('es', 'azamara', 'Azamara', 'DYNAMIC'),
('es', 'bar-staff', 'Bar staff', 'DYNAMIC'),
('es', 'baristas', 'Baristas', 'DYNAMIC'),
('es', 'bedding-sleep-experience', 'Bedding /Sleep Experience', 'DYNAMIC'),
('es', 'boutiques', 'Boutiques', 'DYNAMIC'),
('es', 'canadanew-england', 'Canada/New England', 'DYNAMIC'),
('es', 'canyon-ranch-spaclub', 'Canyon Ranch Spaclub', 'DYNAMIC'),
('es', 'caribbeantropics', 'Caribbean/Tropics', 'DYNAMIC'),
('es', 'casino', 'Casino', 'DYNAMIC'),
('es', 'celebrity-cruis', 'Celebrity cruis', 'DYNAMIC'),
('es', 'comments-regarding', 'Comments regarding', 'STATIC'),
('es', 'concierge-lounge-facilities', 'Concierge Lounge Facilities', 'DYNAMIC'),
('es', 'confirm', 'Confirm', 'STATIC'),
('es', 'consistency-of-personalized-service-and-attention-to-detail', 'Consistency of personalized service and attention to detail', 'DYNAMIC'),
('es', 'cruise-director', 'Cruise director', 'DYNAMIC'),
('es', 'crystal-cruises', 'Crystal Cruises', 'DYNAMIC'),
('es', 'customer-login', ' Customer Login', 'STATIC'),
('es', 'deck-attendants-pool-deck-service', 'Deck attendants- Pool deck service', 'DYNAMIC'),
('es', 'definitely', 'Definitely', 'DYNAMIC'),
('es', 'definitely-not', 'Definitely not ', 'DYNAMIC'),
('es', 'destination-services-staff', 'Destination services staff', 'DYNAMIC'),
('es', 'enter-your-message', 'Enter your message', 'STATIC'),
('es', 'entertainment-staff', 'Entertainment staff', 'DYNAMIC'),
('es', 'excellent', 'Excellent', 'DYNAMIC'),
('es', 'executive-lounge-facilities', 'Executive Lounge Facilities', 'DYNAMIC'),
('es', 'exit-survey', ' Exit Survey', 'STATIC'),
('es', 'fair', 'Fair', 'DYNAMIC'),
('es', 'fill-out-our-survey', 'Fill Out our Survey', 'STATIC'),
('es', 'finish-survey', ' Finish Survey', 'STATIC'),
('es', 'friendliness-interaction-with-guests', 'Friendliness & interaction with guests', 'DYNAMIC'),
('es', 'gangway-security-staff', 'Gangway security staff ', 'DYNAMIC'),
('es', 'good', 'Good', 'DYNAMIC'),
('es', 'graham-denison-artist-in-residence', 'Graham denison- Artist in residence', 'DYNAMIC'),
('es', 'greeek-isles', 'Greeek Isles', 'DYNAMIC'),
('es', 'have-you-ever-cruised-before', 'Have you ever cruised before', 'DYNAMIC'),
('es', 'head-sommelierceller-master', 'Head sommelier/Celler master', 'DYNAMIC'),
('es', 'highly-likely', 'Highly likely', 'DYNAMIC'),
('es', 'holland-america', 'Holland America', 'DYNAMIC'),
('es', 'holy-land', 'Holy land', 'DYNAMIC'),
('es', 'how-likely-are-you-to-cruises-with-oceania-cruises-again', 'How likely are you to cruises with oceania cruises again?', 'DYNAMIC'),
('es', 'how-likely-are-you-to-recommend-oceania-cruises-to-a-friend', 'How likely are you to recommend oceania cruises to a friend?', 'DYNAMIC'),
('es', 'if-yeswhich-cruise-lines-have-you-sailed-with-previously', 'If yes,which cruise lines have you sailed with previously?', 'DYNAMIC'),
('es', 'information-and-documentation', 'Information and Documentation', 'DYNAMIC'),
('es', 'invalid-survey-id', 'Invalid Survey ID', 'STATIC'),
('es', 'itinerary', 'Itinerary ', 'DYNAMIC'),
('es', 'jennifer-singer-vocalist', 'Jennifer Singer- Vocalist', 'DYNAMIC'),
('es', 'jerryspeed-ventrlioquist', 'Jerryspeed- Ventrlioquist', 'DYNAMIC'),
('es', 'library-selection', 'Library Selection', 'DYNAMIC'),
('es', 'lightscamera-music-production-show', 'Lights,camera music - production show', 'DYNAMIC'),
('es', 'login', ' Login', 'STATIC'),
('es', 'login-name', 'Login Name', 'STATIC'),
('es', 'logout', 'Logout ', 'STATIC'),
('es', 'maitre-ds', 'Maitre D''s', 'DYNAMIC'),
('es', 'medical-services', 'Medical Services ', 'DYNAMIC'),
('es', 'mediterranean', 'Mediterranean', 'DYNAMIC'),
('es', 'more-than-36-months', 'more than 36 months', 'DYNAMIC'),
('es', 'music-station-band', 'Music station band', 'DYNAMIC'),
('es', 'na', 'N/A', 'DYNAMIC'),
('es', 'no', 'No', 'DYNAMIC'),
('es', 'no-questions-found', 'No questions found', 'STATIC'),
('es', 'no-surveys-found', 'No surveys found', 'STATIC'),
('es', 'no-voyage-is-active', ' No voyage is active', 'STATIC'),
('es', 'no-voyage-is-active-description', 'Sorry currently no voyage is active. Please try again later', 'STATIC'),
('es', 'northern-europe', 'Northern Europe', 'DYNAMIC'),
('es', 'ocean-string-quartet', 'Ocean string Quartet', 'DYNAMIC'),
('es', 'oceania-club-ambassador', 'Oceania club ambassador', 'DYNAMIC'),
('es', 'oceania-cruises', 'Oceania CRUISES', 'DYNAMIC'),
('es', 'oceaniasea-staff', 'Oceania@Sea Staff', 'DYNAMIC'),
('es', 'officers', 'Officers', 'DYNAMIC'),
('es', 'other', ' Other', 'DYNAMIC'),
('es', 'other-please-specify-here', 'If other please specify here', 'STATIC'),
('es', 'overall-cuisine-grand-dining-room', 'Overall cuisine- Grand dining room ', 'DYNAMIC'),
('es', 'overall-cuisine-jacques', 'Overall cuisine- Jacques', 'DYNAMIC'),
('es', 'overall-cuisine-polo-grill', 'Overall cuisine- Polo grill', 'DYNAMIC'),
('es', 'overall-cuisine-red-ginger', 'Overall cuisine - Red ginger', 'DYNAMIC'),
('es', 'overall-cuisine-terrace-cafe', 'Overall cuisine- Terrace cafe', 'DYNAMIC'),
('es', 'overall-cuisine-toscana', 'Overall cuisine -Toscana', 'DYNAMIC'),
('es', 'overall-cuisine-waves-grill', 'Overall cuisine- Waves Grill', 'DYNAMIC'),
('es', 'overall-curise-experience', 'Overall curise experience', 'DYNAMIC'),
('es', 'overall-quality-of-cuisine', 'Overall quality of cuisine', 'DYNAMIC'),
('es', 'overall-reserve-cuisine-wine-experience', 'Overall reserve cuisine &wine experience', 'DYNAMIC'),
('es', 'page-not-found', 'Page Not Found', 'STATIC'),
('es', 'page-not-found-description', 'Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('es', 'panama-canal', 'Panama Canal', 'DYNAMIC'),
('es', 'password', ' Password', 'STATIC'),
('es', 'poor', 'Poor', 'DYNAMIC'),
('es', 'port-lectures', 'Port Lectures', 'DYNAMIC'),
('es', 'ports-of-call', 'Ports of call', 'DYNAMIC'),
('es', 'pre-cruise-hoteltransfor-arrangements', 'Pre cruise Hotel/Transfor arrangements', 'DYNAMIC'),
('es', 'presentation-of-cuisine', 'Presentation of cuisine', 'DYNAMIC'),
('es', 'price', 'Price', 'DYNAMIC'),
('es', 'princes-cruises', 'Princes cruises', 'DYNAMIC'),
('es', 'probably', 'Probably', 'DYNAMIC'),
('es', 'probably-not', 'Probably not', 'DYNAMIC'),
('es', 'quality-of-shore-excursion-experience', 'Quality of shore excursion experience', 'DYNAMIC'),
('es', 'quit-survey', 'Quit Survey', 'STATIC'),
('es', 'reception-staff', 'Reception staff', 'DYNAMIC'),
('es', 'reputation-of-cruise-line', 'Reputation of cruise Line', 'DYNAMIC'),
('es', 'reputation-of-ship', 'Reputation of Ship', 'DYNAMIC'),
('es', 'riviera-orchestra', 'Riviera Orchestra', 'DYNAMIC'),
('es', 'room-service-menu', 'Room service menu', 'DYNAMIC'),
('es', 'room-service-staff', 'Room service staff', 'DYNAMIC'),
('es', 'royal-caribbean', 'Royal Caribbean', 'DYNAMIC'),
('es', 'salute-from-the-crew', 'Salute from the crew', 'DYNAMIC'),
('es', 'save-survey', ' Save Survey', 'STATIC'),
('es', 'service-unavailable', 'Service unavailable', 'STATIC'),
('es', 'service-unavailable-description', ' Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('es', 'silver-sea-cruises', 'Silver sea cruises', 'DYNAMIC'),
('es', 'southern-america', 'Southern America', 'DYNAMIC'),
('es', 'stateroom-maintenance', 'Stateroom Maintenance', 'DYNAMIC'),
('es', 'stateroom-or-suite-cleanliess', 'Stateroom or Suite  Cleanliess', 'DYNAMIC'),
('es', 'staterooms-or-suites-stewardstewardess', 'Staterooms or suites -Steward/Stewardess', 'DYNAMIC'),
('es', 'survey-not-available', 'Survey not available. Please try again.', 'STATIC'),
('es', 'tender-service', 'Tender Service', 'DYNAMIC'),
('es', 'thank-you-for-finishing-survey', 'Thank you for taking the time to complete this survey', 'STATIC'),
('es', 'the-culinary-center-chef', 'The culinary center chef', 'DYNAMIC'),
('es', 'the-culinary-center-classes', 'The culinary center classes', 'DYNAMIC'),
('es', 'the-yachts-of-seabours', 'The Yachts of seabours', 'DYNAMIC'),
('es', 'travel-agent', 'Travel agent', 'DYNAMIC'),
('es', 'tv-programming-movies', 'TV Programming & Movies', 'DYNAMIC'),
('es', 'valet-laundry-services', 'Valet Laundry Services', 'DYNAMIC'),
('es', 'variety-of-menu-items', 'Variety of menu items', 'DYNAMIC'),
('es', 'very-good', 'Very Good', 'DYNAMIC'),
('es', 'wait-staff-grand-dining-room', 'Wait staff- Grand dining room ', 'DYNAMIC'),
('es', 'wait-staff-jacques', 'Wait staff- Jacques', 'DYNAMIC'),
('es', 'wait-staff-la-reserve', 'Wait staff- La Reserve', 'DYNAMIC'),
('es', 'wait-staff-polo-grill', 'Wait staff- Polo grill', 'DYNAMIC'),
('es', 'wait-staff-red-ginger', 'Wait staff - Red ginger', 'DYNAMIC'),
('es', 'wait-staff-terrace-cafe', 'Wait staff- Terrace cafe', 'DYNAMIC'),
('es', 'wait-staff-toscana', 'Wait staff-Toscana', 'DYNAMIC'),
('es', 'wait-staff-wave-grill', 'Wait staff- Wave Grill', 'DYNAMIC'),
('es', 'what-was-the-deciding-factor-in-booking-this-cruises', 'What was the deciding factor in booking this cruises', 'DYNAMIC'),
('es', 'when-would-you-like-to-cruise-next', 'When would you like to cruise next?', 'DYNAMIC'),
('es', 'which-destination-would-you-like-to-cruise-next', 'Which destination would you like to cruise next ?', 'DYNAMIC'),
('es', 'wine-selelctions', 'Wine selelctions', 'DYNAMIC'),
('es', 'wine-waiterssommelier', 'Wine waiters/Sommelier', 'DYNAMIC'),
('es', 'world-beat-production-show', 'World beat - production show', 'DYNAMIC'),
('es', 'yes', 'Yes', 'DYNAMIC'),
('es', 'you-finished-survey', 'You were already finished this survey', 'STATIC'),
('es', 'your-changes-been-saved', 'Your changes have been saved', 'STATIC'),
('fr', '0-12-months', '0-12 months', 'DYNAMIC'),
('fr', '12-36-months', '12-36 months', 'DYNAMIC'),
('fr', 'africa', 'Africa', 'DYNAMIC'),
('fr', 'afternoon-tea', 'Afternoon tea', 'DYNAMIC'),
('fr', 'air-arrangements', 'Air Arrangements', 'DYNAMIC'),
('fr', 'alaska', 'Alaska', 'DYNAMIC'),
('fr', 'andrea-fontana-cocktail-planist', 'Andrea fontana- cocktail planist', 'DYNAMIC'),
('fr', 'are-you-sure-want-to-exit-survey', 'Are you sure want to exit survey?', 'STATIC'),
('fr', 'are-you-sure-want-to-quit-survey', 'Your changes will be lost. Are you sure want to quit survey?', 'STATIC'),
('fr', 'artist-loft', 'Artist Loft', 'DYNAMIC'),
('fr', 'ashley-carruthers-plano-show-man', 'Ashley carruthers- Plano show man', 'DYNAMIC'),
('fr', 'asia', 'Asia', 'DYNAMIC'),
('fr', 'australianew-zealand', 'Australia/New Zealand', 'DYNAMIC'),
('fr', 'azamara', 'Azamara', 'DYNAMIC'),
('fr', 'bar-staff', 'Bar staff', 'DYNAMIC'),
('fr', 'baristas', 'Baristas', 'DYNAMIC'),
('fr', 'bedding-sleep-experience', 'Bedding /Sleep Experience', 'DYNAMIC'),
('fr', 'boutiques', 'Boutiques', 'DYNAMIC'),
('fr', 'canadanew-england', 'Canada/New England', 'DYNAMIC'),
('fr', 'canyon-ranch-spaclub', 'Canyon Ranch Spaclub', 'DYNAMIC'),
('fr', 'caribbeantropics', 'Caribbean/Tropics', 'DYNAMIC'),
('fr', 'casino', 'Casino', 'DYNAMIC'),
('fr', 'celebrity-cruis', 'Celebrity cruis', 'DYNAMIC'),
('fr', 'comments-regarding', 'Comments regarding', 'STATIC'),
('fr', 'concierge-lounge-facilities', 'Concierge Lounge Facilities', 'DYNAMIC'),
('fr', 'confirm', 'Confirm', 'STATIC'),
('fr', 'consistency-of-personalized-service-and-attention-to-detail', 'Consistency of personalized service and attention to detail', 'DYNAMIC'),
('fr', 'cruise-director', 'Cruise director', 'DYNAMIC'),
('fr', 'crystal-cruises', 'Crystal Cruises', 'DYNAMIC'),
('fr', 'customer-login', ' Customer Login', 'STATIC'),
('fr', 'deck-attendants-pool-deck-service', 'Deck attendants- Pool deck service', 'DYNAMIC'),
('fr', 'definitely', 'Definitely', 'DYNAMIC'),
('fr', 'definitely-not', 'Definitely not ', 'DYNAMIC'),
('fr', 'destination-services-staff', 'Destination services staff', 'DYNAMIC'),
('fr', 'enter-your-message', 'Enter your message', 'STATIC'),
('fr', 'entertainment-staff', 'Entertainment staff', 'DYNAMIC'),
('fr', 'excellent', 'Excellent', 'DYNAMIC'),
('fr', 'executive-lounge-facilities', 'Executive Lounge Facilities', 'DYNAMIC'),
('fr', 'exit-survey', ' Exit Survey', 'STATIC'),
('fr', 'fair', 'Fair', 'DYNAMIC'),
('fr', 'fill-out-our-survey', 'Fill Out our Survey', 'STATIC'),
('fr', 'finish-survey', ' Finish Survey', 'STATIC'),
('fr', 'friendliness-interaction-with-guests', 'Friendliness & interaction with guests', 'DYNAMIC'),
('fr', 'gangway-security-staff', 'Gangway security staff ', 'DYNAMIC'),
('fr', 'good', 'Good', 'DYNAMIC'),
('fr', 'graham-denison-artist-in-residence', 'Graham denison- Artist in residence', 'DYNAMIC'),
('fr', 'greeek-isles', 'Greeek Isles', 'DYNAMIC'),
('fr', 'have-you-ever-cruised-before', 'Have you ever cruised before', 'DYNAMIC'),
('fr', 'head-sommelierceller-master', 'Head sommelier/Celler master', 'DYNAMIC'),
('fr', 'highly-likely', 'Highly likely', 'DYNAMIC'),
('fr', 'holland-america', 'Holland America', 'DYNAMIC'),
('fr', 'holy-land', 'Holy land', 'DYNAMIC'),
('fr', 'how-likely-are-you-to-cruises-with-oceania-cruises-again', 'How likely are you to cruises with oceania cruises again?', 'DYNAMIC'),
('fr', 'how-likely-are-you-to-recommend-oceania-cruises-to-a-friend', 'How likely are you to recommend oceania cruises to a friend?', 'DYNAMIC'),
('fr', 'if-yeswhich-cruise-lines-have-you-sailed-with-previously', 'If yes,which cruise lines have you sailed with previously?', 'DYNAMIC'),
('fr', 'information-and-documentation', 'Information and Documentation', 'DYNAMIC'),
('fr', 'invalid-survey-id', 'Invalid Survey ID', 'STATIC'),
('fr', 'itinerary', 'Itinerary ', 'DYNAMIC'),
('fr', 'jennifer-singer-vocalist', 'Jennifer Singer- Vocalist', 'DYNAMIC'),
('fr', 'jerryspeed-ventrlioquist', 'Jerryspeed- Ventrlioquist', 'DYNAMIC'),
('fr', 'library-selection', 'Library Selection', 'DYNAMIC'),
('fr', 'lightscamera-music-production-show', 'Lights,camera music - production show', 'DYNAMIC'),
('fr', 'login', ' Login', 'STATIC'),
('fr', 'login-name', 'Login Name', 'STATIC'),
('fr', 'logout', 'Logout ', 'STATIC'),
('fr', 'maitre-ds', 'Maitre D''s', 'DYNAMIC'),
('fr', 'medical-services', 'Medical Services ', 'DYNAMIC'),
('fr', 'mediterranean', 'Mediterranean', 'DYNAMIC'),
('fr', 'more-than-36-months', 'more than 36 months', 'DYNAMIC'),
('fr', 'music-station-band', 'Music station band', 'DYNAMIC'),
('fr', 'na', 'N/A', 'DYNAMIC'),
('fr', 'no', 'No', 'DYNAMIC'),
('fr', 'no-questions-found', 'No questions found', 'STATIC'),
('fr', 'no-surveys-found', 'No surveys found', 'STATIC'),
('fr', 'no-voyage-is-active', ' No voyage is active', 'STATIC'),
('fr', 'no-voyage-is-active-description', 'Sorry currently no voyage is active. Please try again later', 'STATIC'),
('fr', 'northern-europe', 'Northern Europe', 'DYNAMIC'),
('fr', 'ocean-string-quartet', 'Ocean string Quartet', 'DYNAMIC'),
('fr', 'oceania-club-ambassador', 'Oceania club ambassador', 'DYNAMIC'),
('fr', 'oceania-cruises', 'Oceania CRUISES', 'DYNAMIC'),
('fr', 'oceaniasea-staff', 'Oceania@Sea Staff', 'DYNAMIC'),
('fr', 'officers', 'Officers', 'DYNAMIC'),
('fr', 'other', ' Other', 'DYNAMIC'),
('fr', 'other-please-specify-here', 'If other please specify here', 'STATIC'),
('fr', 'overall-cuisine-grand-dining-room', 'Overall cuisine- Grand dining room ', 'DYNAMIC'),
('fr', 'overall-cuisine-jacques', 'Overall cuisine- Jacques', 'DYNAMIC'),
('fr', 'overall-cuisine-polo-grill', 'Overall cuisine- Polo grill', 'DYNAMIC'),
('fr', 'overall-cuisine-red-ginger', 'Overall cuisine - Red ginger', 'DYNAMIC'),
('fr', 'overall-cuisine-terrace-cafe', 'Overall cuisine- Terrace cafe', 'DYNAMIC'),
('fr', 'overall-cuisine-toscana', 'Overall cuisine -Toscana', 'DYNAMIC'),
('fr', 'overall-cuisine-waves-grill', 'Overall cuisine- Waves Grill', 'DYNAMIC'),
('fr', 'overall-curise-experience', 'Overall curise experience', 'DYNAMIC'),
('fr', 'overall-quality-of-cuisine', 'Overall quality of cuisine', 'DYNAMIC'),
('fr', 'overall-reserve-cuisine-wine-experience', 'Overall reserve cuisine &wine experience', 'DYNAMIC'),
('fr', 'page-not-found', 'Page Not Found', 'STATIC'),
('fr', 'page-not-found-description', 'Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('fr', 'panama-canal', 'Panama Canal', 'DYNAMIC'),
('fr', 'password', ' Password', 'STATIC'),
('fr', 'poor', 'Poor', 'DYNAMIC'),
('fr', 'port-lectures', 'Port Lectures', 'DYNAMIC'),
('fr', 'ports-of-call', 'Ports of call', 'DYNAMIC'),
('fr', 'pre-cruise-hoteltransfor-arrangements', 'Pre cruise Hotel/Transfor arrangements', 'DYNAMIC'),
('fr', 'presentation-of-cuisine', 'Presentation of cuisine', 'DYNAMIC'),
('fr', 'price', 'Price', 'DYNAMIC'),
('fr', 'princes-cruises', 'Princes cruises', 'DYNAMIC'),
('fr', 'probably', 'Probably', 'DYNAMIC'),
('fr', 'probably-not', 'Probably not', 'DYNAMIC'),
('fr', 'quality-of-shore-excursion-experience', 'Quality of shore excursion experience', 'DYNAMIC'),
('fr', 'quit-survey', 'Quit Survey', 'STATIC'),
('fr', 'reception-staff', 'Reception staff', 'DYNAMIC'),
('fr', 'reputation-of-cruise-line', 'Reputation of cruise Line', 'DYNAMIC'),
('fr', 'reputation-of-ship', 'Reputation of Ship', 'DYNAMIC'),
('fr', 'riviera-orchestra', 'Riviera Orchestra', 'DYNAMIC'),
('fr', 'room-service-menu', 'Room service menu', 'DYNAMIC'),
('fr', 'room-service-staff', 'Room service staff', 'DYNAMIC'),
('fr', 'royal-caribbean', 'Royal Caribbean', 'DYNAMIC'),
('fr', 'salute-from-the-crew', 'Salute from the crew', 'DYNAMIC'),
('fr', 'save-survey', ' Save Survey', 'STATIC'),
('fr', 'service-unavailable', 'Service unavailable', 'STATIC'),
('fr', 'service-unavailable-description', ' Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('fr', 'silver-sea-cruises', 'Silver sea cruises', 'DYNAMIC'),
('fr', 'southern-america', 'Southern America', 'DYNAMIC'),
('fr', 'stateroom-maintenance', 'Stateroom Maintenance', 'DYNAMIC'),
('fr', 'stateroom-or-suite-cleanliess', 'Stateroom or Suite  Cleanliess', 'DYNAMIC'),
('fr', 'staterooms-or-suites-stewardstewardess', 'Staterooms or suites -Steward/Stewardess', 'DYNAMIC'),
('fr', 'survey-not-available', 'Survey not available. Please try again.', 'STATIC'),
('fr', 'tender-service', 'Tender Service', 'DYNAMIC'),
('fr', 'thank-you-for-finishing-survey', 'Thank you for taking the time to complete this survey', 'STATIC'),
('fr', 'the-culinary-center-chef', 'The culinary center chef', 'DYNAMIC'),
('fr', 'the-culinary-center-classes', 'The culinary center classes', 'DYNAMIC'),
('fr', 'the-yachts-of-seabours', 'The Yachts of seabours', 'DYNAMIC'),
('fr', 'travel-agent', 'Travel agent', 'DYNAMIC'),
('fr', 'tv-programming-movies', 'TV Programming & Movies', 'DYNAMIC'),
('fr', 'valet-laundry-services', 'Valet Laundry Services', 'DYNAMIC'),
('fr', 'variety-of-menu-items', 'Variety of menu items', 'DYNAMIC'),
('fr', 'very-good', 'Very Good', 'DYNAMIC'),
('fr', 'wait-staff-grand-dining-room', 'Wait staff- Grand dining room ', 'DYNAMIC'),
('fr', 'wait-staff-jacques', 'Wait staff- Jacques', 'DYNAMIC'),
('fr', 'wait-staff-la-reserve', 'Wait staff- La Reserve', 'DYNAMIC'),
('fr', 'wait-staff-polo-grill', 'Wait staff- Polo grill', 'DYNAMIC'),
('fr', 'wait-staff-red-ginger', 'Wait staff - Red ginger', 'DYNAMIC'),
('fr', 'wait-staff-terrace-cafe', 'Wait staff- Terrace cafe', 'DYNAMIC'),
('fr', 'wait-staff-toscana', 'Wait staff-Toscana', 'DYNAMIC'),
('fr', 'wait-staff-wave-grill', 'Wait staff- Wave Grill', 'DYNAMIC'),
('fr', 'what-was-the-deciding-factor-in-booking-this-cruises', 'What was the deciding factor in booking this cruises', 'DYNAMIC'),
('fr', 'when-would-you-like-to-cruise-next', 'When would you like to cruise next?', 'DYNAMIC'),
('fr', 'which-destination-would-you-like-to-cruise-next', 'Which destination would you like to cruise next ?', 'DYNAMIC'),
('fr', 'wine-selelctions', 'Wine selelctions', 'DYNAMIC'),
('fr', 'wine-waiterssommelier', 'Wine waiters/Sommelier', 'DYNAMIC'),
('fr', 'world-beat-production-show', 'World beat - production show', 'DYNAMIC'),
('fr', 'yes', 'Yes', 'DYNAMIC'),
('fr', 'you-finished-survey', 'You were already finished this survey', 'STATIC'),
('fr', 'your-changes-been-saved', 'Your changes have been saved', 'STATIC'),
('pt', '0-12-months', '0-12 months', 'DYNAMIC'),
('pt', '12-36-months', '12-36 months', 'DYNAMIC'),
('pt', 'africa', 'Africa', 'DYNAMIC'),
('pt', 'afternoon-tea', 'Afternoon tea', 'DYNAMIC'),
('pt', 'air-arrangements', 'Air Arrangements', 'DYNAMIC'),
('pt', 'alaska', 'Alaska', 'DYNAMIC'),
('pt', 'andrea-fontana-cocktail-planist', 'Andrea fontana- cocktail planist', 'DYNAMIC'),
('pt', 'are-you-sure-want-to-exit-survey', 'Are you sure want to exit survey?', 'STATIC'),
('pt', 'are-you-sure-want-to-quit-survey', 'Your changes will be lost. Are you sure want to quit survey?', 'STATIC'),
('pt', 'artist-loft', 'Artist Loft', 'DYNAMIC'),
('pt', 'ashley-carruthers-plano-show-man', 'Ashley carruthers- Plano show man', 'DYNAMIC'),
('pt', 'asia', 'Asia', 'DYNAMIC'),
('pt', 'australianew-zealand', 'Australia/New Zealand', 'DYNAMIC'),
('pt', 'azamara', 'Azamara', 'DYNAMIC'),
('pt', 'bar-staff', 'Bar staff', 'DYNAMIC'),
('pt', 'baristas', 'Baristas', 'DYNAMIC'),
('pt', 'bedding-sleep-experience', 'Bedding /Sleep Experience', 'DYNAMIC'),
('pt', 'boutiques', 'Boutiques', 'DYNAMIC'),
('pt', 'canadanew-england', 'Canada/New England', 'DYNAMIC'),
('pt', 'canyon-ranch-spaclub', 'Canyon Ranch Spaclub', 'DYNAMIC'),
('pt', 'caribbeantropics', 'Caribbean/Tropics', 'DYNAMIC'),
('pt', 'casino', 'Casino', 'DYNAMIC'),
('pt', 'celebrity-cruis', 'Celebrity cruis', 'DYNAMIC'),
('pt', 'comments-regarding', 'Comments regarding', 'STATIC'),
('pt', 'concierge-lounge-facilities', 'Concierge Lounge Facilities', 'DYNAMIC'),
('pt', 'confirm', 'Confirm', 'STATIC'),
('pt', 'consistency-of-personalized-service-and-attention-to-detail', 'Consistency of personalized service and attention to detail', 'DYNAMIC'),
('pt', 'cruise-director', 'Cruise director', 'DYNAMIC'),
('pt', 'crystal-cruises', 'Crystal Cruises', 'DYNAMIC'),
('pt', 'customer-login', ' Customer Login', 'STATIC'),
('pt', 'deck-attendants-pool-deck-service', 'Deck attendants- Pool deck service', 'DYNAMIC'),
('pt', 'definitely', 'Definitely', 'DYNAMIC'),
('pt', 'definitely-not', 'Definitely not ', 'DYNAMIC'),
('pt', 'destination-services-staff', 'Destination services staff', 'DYNAMIC'),
('pt', 'enter-your-message', 'Enter your message', 'STATIC'),
('pt', 'entertainment-staff', 'Entertainment staff', 'DYNAMIC'),
('pt', 'excellent', 'Excellent', 'DYNAMIC'),
('pt', 'executive-lounge-facilities', 'Executive Lounge Facilities', 'DYNAMIC'),
('pt', 'exit-survey', ' Exit Survey', 'STATIC'),
('pt', 'fair', 'Fair', 'DYNAMIC'),
('pt', 'fill-out-our-survey', 'Fill Out our Survey', 'STATIC'),
('pt', 'finish-survey', ' Finish Survey', 'STATIC'),
('pt', 'friendliness-interaction-with-guests', 'Friendliness & interaction with guests', 'DYNAMIC'),
('pt', 'gangway-security-staff', 'Gangway security staff ', 'DYNAMIC'),
('pt', 'good', 'Good', 'DYNAMIC'),
('pt', 'graham-denison-artist-in-residence', 'Graham denison- Artist in residence', 'DYNAMIC'),
('pt', 'greeek-isles', 'Greeek Isles', 'DYNAMIC'),
('pt', 'have-you-ever-cruised-before', 'Have you ever cruised before', 'DYNAMIC'),
('pt', 'head-sommelierceller-master', 'Head sommelier/Celler master', 'DYNAMIC'),
('pt', 'highly-likely', 'Highly likely', 'DYNAMIC'),
('pt', 'holland-america', 'Holland America', 'DYNAMIC'),
('pt', 'holy-land', 'Holy land', 'DYNAMIC'),
('pt', 'how-likely-are-you-to-cruises-with-oceania-cruises-again', 'How likely are you to cruises with oceania cruises again?', 'DYNAMIC'),
('pt', 'how-likely-are-you-to-recommend-oceania-cruises-to-a-friend', 'How likely are you to recommend oceania cruises to a friend?', 'DYNAMIC'),
('pt', 'if-yeswhich-cruise-lines-have-you-sailed-with-previously', 'If yes,which cruise lines have you sailed with previously?', 'DYNAMIC'),
('pt', 'information-and-documentation', 'Information and Documentation', 'DYNAMIC'),
('pt', 'invalid-survey-id', 'Invalid Survey ID', 'STATIC'),
('pt', 'itinerary', 'Itinerary ', 'DYNAMIC'),
('pt', 'jennifer-singer-vocalist', 'Jennifer Singer- Vocalist', 'DYNAMIC'),
('pt', 'jerryspeed-ventrlioquist', 'Jerryspeed- Ventrlioquist', 'DYNAMIC'),
('pt', 'library-selection', 'Library Selection', 'DYNAMIC'),
('pt', 'lightscamera-music-production-show', 'Lights,camera music - production show', 'DYNAMIC'),
('pt', 'login', ' Login', 'STATIC'),
('pt', 'login-name', 'Login Name', 'STATIC'),
('pt', 'logout', 'Deslogar', 'STATIC'),
('pt', 'maitre-ds', 'Maitre D''s', 'DYNAMIC'),
('pt', 'medical-services', 'Medical Services ', 'DYNAMIC'),
('pt', 'mediterranean', 'Mediterranean', 'DYNAMIC'),
('pt', 'more-than-36-months', 'more than 36 months', 'DYNAMIC'),
('pt', 'music-station-band', 'Music station band', 'DYNAMIC'),
('pt', 'na', 'N/A', 'DYNAMIC'),
('pt', 'no', 'No', 'DYNAMIC'),
('pt', 'no-questions-found', 'No questions found', 'STATIC'),
('pt', 'no-surveys-found', 'No surveys found', 'STATIC'),
('pt', 'no-voyage-is-active', ' No voyage is active', 'STATIC'),
('pt', 'no-voyage-is-active-description', 'Sorry currently no voyage is active. Please try again later', 'STATIC'),
('pt', 'northern-europe', 'Northern Europe', 'DYNAMIC'),
('pt', 'ocean-string-quartet', 'Ocean string Quartet', 'DYNAMIC'),
('pt', 'oceania-club-ambassador', 'Oceania club ambassador', 'DYNAMIC'),
('pt', 'oceania-cruises', 'Oceania CRUISES', 'DYNAMIC'),
('pt', 'oceaniasea-staff', 'Oceania@Sea Staff', 'DYNAMIC'),
('pt', 'officers', 'Officers', 'DYNAMIC'),
('pt', 'other', ' Other', 'DYNAMIC'),
('pt', 'other-please-specify-here', 'If other please specify here', 'STATIC'),
('pt', 'overall-cuisine-grand-dining-room', 'Overall cuisine- Grand dining room ', 'DYNAMIC'),
('pt', 'overall-cuisine-jacques', 'Overall cuisine- Jacques', 'DYNAMIC'),
('pt', 'overall-cuisine-polo-grill', 'Overall cuisine- Polo grill', 'DYNAMIC'),
('pt', 'overall-cuisine-red-ginger', 'Overall cuisine - Red ginger', 'DYNAMIC'),
('pt', 'overall-cuisine-terrace-cafe', 'Overall cuisine- Terrace cafe', 'DYNAMIC'),
('pt', 'overall-cuisine-toscana', 'Overall cuisine -Toscana', 'DYNAMIC'),
('pt', 'overall-cuisine-waves-grill', 'Overall cuisine- Waves Grill', 'DYNAMIC'),
('pt', 'overall-curise-experience', 'Overall curise experience', 'DYNAMIC'),
('pt', 'overall-quality-of-cuisine', 'Overall quality of cuisine', 'DYNAMIC'),
('pt', 'overall-reserve-cuisine-wine-experience', 'Overall reserve cuisine &wine experience', 'DYNAMIC'),
('pt', 'page-not-found', 'Page Not Found', 'STATIC'),
('pt', 'page-not-found-description', 'Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('pt', 'panama-canal', 'Panama Canal', 'DYNAMIC'),
('pt', 'password', ' Password', 'STATIC'),
('pt', 'poor', 'Poor', 'DYNAMIC'),
('pt', 'port-lectures', 'Port Lectures', 'DYNAMIC'),
('pt', 'ports-of-call', 'Ports of call', 'DYNAMIC'),
('pt', 'pre-cruise-hoteltransfor-arrangements', 'Pre cruise Hotel/Transfor arrangements', 'DYNAMIC'),
('pt', 'presentation-of-cuisine', 'Presentation of cuisine', 'DYNAMIC'),
('pt', 'price', 'Price', 'DYNAMIC'),
('pt', 'princes-cruises', 'Princes cruises', 'DYNAMIC'),
('pt', 'probably', 'Probably', 'DYNAMIC'),
('pt', 'probably-not', 'Probably not', 'DYNAMIC'),
('pt', 'quality-of-shore-excursion-experience', 'Quality of shore excursion experience', 'DYNAMIC'),
('pt', 'quit-survey', 'Quit Survey', 'STATIC'),
('pt', 'reception-staff', 'Reception staff', 'DYNAMIC'),
('pt', 'reputation-of-cruise-line', 'Reputation of cruise Line', 'DYNAMIC'),
('pt', 'reputation-of-ship', 'Reputation of Ship', 'DYNAMIC'),
('pt', 'riviera-orchestra', 'Riviera Orchestra', 'DYNAMIC'),
('pt', 'room-service-menu', 'Room service menu', 'DYNAMIC'),
('pt', 'room-service-staff', 'Room service staff', 'DYNAMIC'),
('pt', 'royal-caribbean', 'Royal Caribbean', 'DYNAMIC'),
('pt', 'salute-from-the-crew', 'Salute from the crew', 'DYNAMIC'),
('pt', 'save-survey', ' Save Survey', 'STATIC'),
('pt', 'service-unavailable', 'Service unavailable', 'STATIC'),
('pt', 'service-unavailable-description', ' Sorry the page you are looking for currently not found. Please try again later. ', 'STATIC'),
('pt', 'silver-sea-cruises', 'Silver sea cruises', 'DYNAMIC'),
('pt', 'southern-america', 'Southern America', 'DYNAMIC'),
('pt', 'stateroom-maintenance', 'Stateroom Maintenance', 'DYNAMIC'),
('pt', 'stateroom-or-suite-cleanliess', 'Stateroom or Suite  Cleanliess', 'DYNAMIC'),
('pt', 'staterooms-or-suites-stewardstewardess', 'Staterooms or suites -Steward/Stewardess', 'DYNAMIC'),
('pt', 'survey-not-available', 'Survey not available. Please try again.', 'STATIC'),
('pt', 'tender-service', 'Tender Service', 'DYNAMIC'),
('pt', 'thank-you-for-finishing-survey', 'Thank you for taking the time to complete this survey', 'STATIC'),
('pt', 'the-culinary-center-chef', 'The culinary center chef', 'DYNAMIC'),
('pt', 'the-culinary-center-classes', 'The culinary center classes', 'DYNAMIC'),
('pt', 'the-yachts-of-seabours', 'The Yachts of seabours', 'DYNAMIC'),
('pt', 'travel-agent', 'Travel agent', 'DYNAMIC'),
('pt', 'tv-programming-movies', 'TV Programming & Movies', 'DYNAMIC'),
('pt', 'valet-laundry-services', 'Valet Laundry Services', 'DYNAMIC'),
('pt', 'variety-of-menu-items', 'Variety of menu items', 'DYNAMIC'),
('pt', 'very-good', 'Very Good', 'DYNAMIC'),
('pt', 'wait-staff-grand-dining-room', 'Wait staff- Grand dining room ', 'DYNAMIC'),
('pt', 'wait-staff-jacques', 'Wait staff- Jacques', 'DYNAMIC'),
('pt', 'wait-staff-la-reserve', 'Wait staff- La Reserve', 'DYNAMIC'),
('pt', 'wait-staff-polo-grill', 'Wait staff- Polo grill', 'DYNAMIC'),
('pt', 'wait-staff-red-ginger', 'Wait staff - Red ginger', 'DYNAMIC'),
('pt', 'wait-staff-terrace-cafe', 'Wait staff- Terrace cafe', 'DYNAMIC');
INSERT INTO `cs_language_values` (`language_code`, `variable_name`, `value`, `type`) VALUES
('pt', 'wait-staff-toscana', 'Wait staff-Toscana', 'DYNAMIC'),
('pt', 'wait-staff-wave-grill', 'Wait staff- Wave Grill', 'DYNAMIC'),
('pt', 'what-was-the-deciding-factor-in-booking-this-cruises', 'What was the deciding factor in booking this cruises', 'DYNAMIC'),
('pt', 'when-would-you-like-to-cruise-next', 'When would you like to cruise next?', 'DYNAMIC'),
('pt', 'which-destination-would-you-like-to-cruise-next', 'Which destination would you like to cruise next ?', 'DYNAMIC'),
('pt', 'wine-selelctions', 'Wine selelctions', 'DYNAMIC'),
('pt', 'wine-waiterssommelier', 'Wine waiters/Sommelier', 'DYNAMIC'),
('pt', 'world-beat-production-show', 'World beat - production show', 'DYNAMIC'),
('pt', 'yes', 'Yes', 'DYNAMIC'),
('pt', 'you-finished-survey', 'You were already finished this survey', 'STATIC'),
('pt', 'your-changes-been-saved', 'Your changes have been saved', 'STATIC');

-- --------------------------------------------------------

--
-- Table structure for table `cs_question_categories`
--

CREATE TABLE `cs_question_categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `language_variable` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_question_categories`
--

INSERT INTO `cs_question_categories` (`category_id`, `category`, `language_variable`, `status`) VALUES
(1, 'Before your cruise', 'before-your-cruise', 'A'),
(2, 'Accommodations', 'accommodations', 'A'),
(3, 'Ship Services and Amenities', 'ship-services-and-amenities', 'A'),
(4, 'Culinary Experience', 'culinary-experience', 'A'),
(5, 'Culinary Activities & Enrichment', 'culinary-activities-enrichment', 'A'),
(6, 'Entertainment', 'entertainment', 'A'),
(7, 'Destination Services', 'destination-services', 'A'),
(8, 'Overall rating', 'overall-rating', 'A'),
(9, 'Satisfaction', 'satisfaction', 'A'),
(10, 'Staff Performance & Service', 'staff-performance-service', 'A'),
(11, 'Overall Performance of ships crew staff, and officers', 'overall-performance-of-ships-crew-staff-and-officers', 'A'),
(12, 'conclusion', 'conclusion', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cs_sessions`
--

CREATE TABLE `cs_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_sessions`
--

INSERT INTO `cs_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('lb08umjdeofi2u9dtfl4tarqo1rklva2', '::1', 1535984356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353938343335333b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('e4hrvo5ulph9deqd7fkuae7iu0en1q0r', '::1', 1535989758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353938393438313b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('5edh2revmvrq8avdes7d5qh2t3ji6e4m', '::1', 1535990223, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353938393932353b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('pstlidp8lismnfh7dkfdc7vu3d6m17gt', '::1', 1535990064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353939303036343b),
('d9en1ts2jm3dcqhj5mrrf41u2jjad8fd', '::1', 1535990064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353939303036343b),
('qhp83u9t0s2p42imkjr6ejiro2sdubo7', '::1', 1535990472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353939303432363b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('2gqk7lonfe0l9qmm5oqnl0fpt100qja0', '::1', 1535991670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353939313636393b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('bqkibh5jufj9nsgcgt2uuglh1k0fdbda', '::1', 1535992614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353939323339343b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('eq69adja0f6p301f1s7q6vbr9qbr9ech', '::1', 1535998264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353939383236333b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('1r0hepisgdfks0sl1qt5tiuhq3q6o7t9', '::1', 1535998299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353939383236343b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d6163746976655f7461627c733a31353a2267656e6572616c2d636f6e74656e74223b),
('7o0fba9vjh779iqtdlgt5mvec8su9edp', '::1', 1536050254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035303235343b),
('fbm9uh1nfisorektc99u9sebelu5tm76', '::1', 1536050492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035303439323b),
('u3kbrimtun00vuhac2629igloncmpb3d', '::1', 1536052851, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035323739393b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d),
('8frqan5vggi1ddkvj940l0cu34ped6ee', '::1', 1536053110, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035333130353b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d),
('nk6dkqvoo3eb642msnpi9qo1tns07tbv', '::1', 1536054303, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035343031303b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d),
('dj7jqh4j50q7vmnh87n5b8utdfjcggp6', '::1', 1536054331, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035343332393b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d666c6173685f6d6573736167657c733a3230303a223c64697620636c6173733d22616c65727420616c6572742d666978656420616c6572742d7375636365737320616c6572742d6469736d69737361626c65223e3c6120687265663d22232220636c6173733d22636c6f73652220646174612d6469736d6973733d22616c6572742220617269612d6c6162656c3d22636c6f7365223e2674696d65733b3c2f613e3c7374726f6e673e5375636365737321203c2f7374726f6e673e596f7572206368616e6765732068617665206265656e2073617665643c2f6469763e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('o85trv34rj0q6f52ppo0tucvfatb5t9j', '::1', 1536055658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035353336353b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d),
('h88cl67amhah8jpmsshlfqudt1v9tt12', '::1', 1536056803, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363035363737303b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d),
('h8diuqo77dq6hu46d5grtjpev37tsl0f', '::1', 1536062946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363036323930363b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d),
('fj65fihu61m0pf9hvbpb8kj923al43s9', '::1', 1536063332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363036333333313b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d666c6173685f6d6573736167657c733a38393a223c64697620636c6173733d2263616c6c6f75742063616c6c6f75742d696e666f223e3c68343e53756363657373213c2f68343e3c703e4c616e67756167652076616c7565207761732061646465642e3c2f703e3c2f6469763e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('dqj4u7s8gb71ol97sede9pvqb3hga8ce', '::1', 1536063867, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363036333633333b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d73656c65637465645f6c616e67756167657c733a323a22656e223b),
('o52tfljf2ar5locor08842rhge9br597', '::1', 1536064207, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363036333938333b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475533223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31353a22666473667340676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31353a2273617261756c743139393030343138223b67756573745f6c6173746e616d657c733a373a2273617261756c74223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475533223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2233223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a31333a226d61726761726574206d617279223b733a383a226c6173746e616d65223b733a373a2273617261756c74223b733a353a22656d61696c223b733a31353a22666473667340676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31353a2273617261756c743139393030343138223b733a383a2270617373776f7264223b733a32333a2273617261756c7431393930303431383137333338383431223b733a353a227469746c65223b733a333a224d5253223b733a31333a22646174655f6f665f6269727468223b733a31303a2231382d30342d31393930223b733a333a22736578223b733a313a2246223b733a31313a226e6174696f6e616c697479223b733a323a225553223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a363a22353035303936223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a373a2231373333383834223b733a383a22636162696e5f6e6f223b733a343a2237303431223b733a31323a22736869705f636172645f6e6f223b733a31323a22313030303030303030303030223b733a31313a22656d6261726b5f64617465223b733a31303a2231353239363932323030223b733a31313a2264656261726b5f64617465223b733a31303a2231353332323834323030223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335363530343632223b733a31303a22757064617465645f6174223b733a31303a2231353335373233323036223b7d73656c65637465645f6c616e67756167657c733a323a22656e223b),
('mac9rkj1otinnc9d4bir1g0tdi1ig5at', '::1', 1536205217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230353038373b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d),
('3b9n79ef8btmk1200ipt59ro9u60h3r1', '::1', 1536206643, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230363433303b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475531223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31343a227061756c40676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31333a2270616e64693139393930343037223b67756573745f6c6173746e616d657c733a353a2250616e6469223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475531223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2231223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a343a225061756c223b733a383a226c6173746e616d65223b733a353a2250616e6469223b733a353a22656d61696c223b733a31343a227061756c40676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31333a2270616e64693139393930343037223b733a383a2270617373776f7264223b733a32313a2250616e646931393939303430373137333338383431223b733a353a227469746c65223b733a303a22223b733a31333a22646174655f6f665f6269727468223b733a31303a2230372d30342d31393939223b733a333a22736578223b733a313a224d223b733a31313a226e6174696f6e616c697479223b733a323a22494e223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a313a2230223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a313a2230223b733a383a22636162696e5f6e6f223b733a313a2230223b733a31323a22736869705f636172645f6e6f223b733a313a2230223b733a31313a22656d6261726b5f64617465223b733a313a2230223b733a31313a2264656261726b5f64617465223b733a313a2230223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335343830333532223b733a31303a22757064617465645f6174223b733a31303a2231353335363439373633223b7d),
('s1iff8k68oathssk4h88l8ncoebiqbrk', '::1', 1536207098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230363830303b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475531223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31343a227061756c40676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31333a2270616e64693139393930343037223b67756573745f6c6173746e616d657c733a353a2250616e6469223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475531223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2231223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a343a225061756c223b733a383a226c6173746e616d65223b733a353a2250616e6469223b733a353a22656d61696c223b733a31343a227061756c40676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31333a2270616e64693139393930343037223b733a383a2270617373776f7264223b733a32313a2250616e646931393939303430373137333338383431223b733a353a227469746c65223b733a303a22223b733a31333a22646174655f6f665f6269727468223b733a31303a2230372d30342d31393939223b733a333a22736578223b733a313a224d223b733a31313a226e6174696f6e616c697479223b733a323a22494e223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a313a2230223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a313a2230223b733a383a22636162696e5f6e6f223b733a313a2230223b733a31323a22736869705f636172645f6e6f223b733a313a2230223b733a31313a22656d6261726b5f64617465223b733a313a2230223b733a31313a2264656261726b5f64617465223b733a313a2230223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335343830333532223b733a31303a22757064617465645f6174223b733a31303a2231353335363439373633223b7d);
INSERT INTO `cs_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('9hnkvr3fvimdcsijk5sm7iip5kiole0n', '::1', 1536207190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230373130333b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475531223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31343a227061756c40676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31333a2270616e64693139393930343037223b67756573745f6c6173746e616d657c733a353a2250616e6469223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475531223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2231223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a343a225061756c223b733a383a226c6173746e616d65223b733a353a2250616e6469223b733a353a22656d61696c223b733a31343a227061756c40676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31333a2270616e64693139393930343037223b733a383a2270617373776f7264223b733a32313a2250616e646931393939303430373137333338383431223b733a353a227469746c65223b733a303a22223b733a31333a22646174655f6f665f6269727468223b733a31303a2230372d30342d31393939223b733a333a22736578223b733a313a224d223b733a31313a226e6174696f6e616c697479223b733a323a22494e223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a313a2230223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a313a2230223b733a383a22636162696e5f6e6f223b733a313a2230223b733a31323a22736869705f636172645f6e6f223b733a313a2230223b733a31313a22656d6261726b5f64617465223b733a313a2230223b733a31313a2264656261726b5f64617465223b733a313a2230223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335343830333532223b733a31303a22757064617465645f6174223b733a31303a2231353335363439373633223b7d),
('3de83csdlqqvosfboc7blgd970f9uc6j', '::1', 1536208025, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230373733303b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475531223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31343a227061756c40676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31333a2270616e64693139393930343037223b67756573745f6c6173746e616d657c733a353a2250616e6469223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475531223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2231223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a343a225061756c223b733a383a226c6173746e616d65223b733a353a2250616e6469223b733a353a22656d61696c223b733a31343a227061756c40676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31333a2270616e64693139393930343037223b733a383a2270617373776f7264223b733a32313a2250616e646931393939303430373137333338383431223b733a353a227469746c65223b733a303a22223b733a31333a22646174655f6f665f6269727468223b733a31303a2230372d30342d31393939223b733a333a22736578223b733a313a224d223b733a31313a226e6174696f6e616c697479223b733a323a22494e223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a313a2230223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a313a2230223b733a383a22636162696e5f6e6f223b733a313a2230223b733a31323a22736869705f636172645f6e6f223b733a313a2230223b733a31313a22656d6261726b5f64617465223b733a313a2230223b733a31313a2264656261726b5f64617465223b733a313a2230223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335343830333532223b733a31303a22757064617465645f6174223b733a31303a2231353335363439373633223b7d),
('h4eivg45pmm4aglr9dh6phjvlbb0pohi', '::1', 1536208242, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230383033383b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475531223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31343a227061756c40676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31333a2270616e64693139393930343037223b67756573745f6c6173746e616d657c733a353a2250616e6469223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475531223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2231223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a343a225061756c223b733a383a226c6173746e616d65223b733a353a2250616e6469223b733a353a22656d61696c223b733a31343a227061756c40676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31333a2270616e64693139393930343037223b733a383a2270617373776f7264223b733a32313a2250616e646931393939303430373137333338383431223b733a353a227469746c65223b733a303a22223b733a31333a22646174655f6f665f6269727468223b733a31303a2230372d30342d31393939223b733a333a22736578223b733a313a224d223b733a31313a226e6174696f6e616c697479223b733a323a22494e223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a313a2230223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a313a2230223b733a383a22636162696e5f6e6f223b733a313a2230223b733a31323a22736869705f636172645f6e6f223b733a313a2230223b733a31313a22656d6261726b5f64617465223b733a313a2230223b733a31313a2264656261726b5f64617465223b733a313a2230223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335343830333532223b733a31303a22757064617465645f6174223b733a31303a2231353335363439373633223b7d),
('nlhkrkni9r89lj85p1gpv5uaculnd19e', '::1', 1536208709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230383437353b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475531223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31343a227061756c40676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31333a2270616e64693139393930343037223b67756573745f6c6173746e616d657c733a353a2250616e6469223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475531223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2231223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a343a225061756c223b733a383a226c6173746e616d65223b733a353a2250616e6469223b733a353a22656d61696c223b733a31343a227061756c40676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31333a2270616e64693139393930343037223b733a383a2270617373776f7264223b733a32313a2250616e646931393939303430373137333338383431223b733a353a227469746c65223b733a303a22223b733a31333a22646174655f6f665f6269727468223b733a31303a2230372d30342d31393939223b733a333a22736578223b733a313a224d223b733a31313a226e6174696f6e616c697479223b733a323a22494e223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a313a2230223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a313a2230223b733a383a22636162696e5f6e6f223b733a313a2230223b733a31323a22736869705f636172645f6e6f223b733a313a2230223b733a31313a22656d6261726b5f64617465223b733a313a2230223b733a31313a2264656261726b5f64617465223b733a313a2230223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335343830333532223b733a31303a22757064617465645f6174223b733a31303a2231353335363439373633223b7d),
('pacat6fe4ekgthf8lfvcdv2c56qojip1', '::1', 1536209040, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230383830323b61646d696e5f69647c733a313a2231223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b61646d696e5f6c6f676765645f696e7c623a313b61646d696e5f747970657c733a313a2253223b61646d696e5f726f6c655f69647c693a303b61646d696e5f696e666f7c4f3a383a22737464436c617373223a31313a7b733a383a2261646d696e5f6964223b733a313a2231223b733a31303a2261646d696e5f74797065223b733a313a2253223b733a353a22656d61696c223b733a32303a22737570657261646d696e40676d61696c2e636f6d223b733a383a2270617373776f7264223b733a33323a223461333332623361303139636135626262396438303730346533666363323766223b733a393a2261646d696e5f6b6579223b733a303a22223b733a393a2266697273746e616d65223b733a353a2241646d696e223b733a383a226c6173746e616d65223b733a303a22223b733a353a2270686f6e65223b733a303a22223b733a373a2261646472657373223b733a343a2274657374223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a313a2230223b7d67756573745f69647c733a31353a2252564132303138303832382d475531223b67756573745f766f796167655f69647c733a31313a225256413230313830383238223b67756573745f656d61696c7c733a31343a227061756c40676d61696c2e636f6d223b67756573745f6c6f67696e5f6e616d657c733a31333a2270616e64693139393930343037223b67756573745f6c6173746e616d657c733a353a2250616e6469223b67756573745f6c616e67756167657c733a323a22656e223b67756573745f6c6f676765645f696e7c623a313b67756573745f696e666f7c4f3a383a22737464436c617373223a32363a7b733a383a2267756573745f6964223b733a31353a2252564132303138303832382d475531223b733a31363a2267756573745f6e756d657269635f6964223b733a313a2231223b733a393a22766f796167655f6964223b733a31313a225256413230313830383238223b733a393a2266697273746e616d65223b733a343a225061756c223b733a383a226c6173746e616d65223b733a353a2250616e6469223b733a353a22656d61696c223b733a31343a227061756c40676d61696c2e636f6d223b733a31303a226c6f67696e5f6e616d65223b733a31333a2270616e64693139393930343037223b733a383a2270617373776f7264223b733a32313a2250616e646931393939303430373137333338383431223b733a353a227469746c65223b733a303a22223b733a31333a22646174655f6f665f6269727468223b733a31303a2230372d30342d31393939223b733a333a22736578223b733a313a224d223b733a31313a226e6174696f6e616c697479223b733a323a22494e223b733a383a226c616e6775616765223b733a323a22656e223b733a31303a2262696c6c696e675f6e6f223b733a313a2230223b733a31323a2270617373656e6765725f6e6f223b733a383a223137333338383431223b733a31303a22626f6f6b696e675f6e6f223b733a313a2230223b733a383a22636162696e5f6e6f223b733a313a2230223b733a31323a22736869705f636172645f6e6f223b733a313a2230223b733a31313a22656d6261726b5f64617465223b733a313a2230223b733a31313a2264656261726b5f64617465223b733a313a2230223b733a31313a2270617373706f72745f6e6f223b733a313a2230223b733a31353a2270617373706f72745f657870697265223b733a313a2230223b733a31353a2270617373706f72745f697373756564223b733a313a2230223b733a363a22737461747573223b733a313a2241223b733a31303a22637265617465645f6174223b733a31303a2231353335343830333532223b733a31303a22757064617465645f6174223b733a31303a2231353335363439373633223b7d666c6173685f6d6573736167657c733a39333a223c64697620636c6173733d2263616c6c6f75742063616c6c6f75742d696e666f223e3c68343e53756363657373213c2f68343e3c703e596f7572206368616e6765732068617665206265656e2073617665642e3c2f703e3c2f6469763e223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `cs_settings_general`
--

CREATE TABLE `cs_settings_general` (
  `setting_id` int(11) NOT NULL,
  `cruise_name` varchar(255) NOT NULL,
  `cruise_code` char(3) NOT NULL,
  `cruise_logo` varchar(255) NOT NULL,
  `cruise_logo_alternate_text` varchar(255) NOT NULL,
  `fav_icon` varchar(255) NOT NULL,
  `is_survey_editable` char(1) NOT NULL DEFAULT 'N',
  `active_voyage_id` varchar(35) NOT NULL,
  `guest_password_scheme` enum('FCI','RANDOM') NOT NULL DEFAULT 'RANDOM',
  `site_offline` char(1) NOT NULL DEFAULT 'N',
  `cruise_admin_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_settings_general`
--

INSERT INTO `cs_settings_general` (`setting_id`, `cruise_name`, `cruise_code`, `cruise_logo`, `cruise_logo_alternate_text`, `fav_icon`, `is_survey_editable`, `active_voyage_id`, `guest_password_scheme`, `site_offline`, `cruise_admin_email`) VALUES
(1, 'Oceania Cruises', 'RVA', 'oceania-cruises.png', '', '', 'N', '', 'FCI', 'N', 'paul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey`
--

CREATE TABLE `cs_survey` (
  `voyage_id` varchar(35) NOT NULL,
  `survey_id` varchar(35) NOT NULL,
  `survey_numeric_id` int(11) NOT NULL,
  `survey_title` varchar(255) NOT NULL,
  `language_variable` varchar(255) NOT NULL,
  `survey_image` varchar(255) NOT NULL,
  `survey_template_id` bigint(11) NOT NULL,
  `status` char(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey_default_questions`
--

CREATE TABLE `cs_survey_default_questions` (
  `template_id` bigint(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `language_variable` varchar(255) NOT NULL,
  `question_type` enum('RATING','RADIOBUTTONS','CHECKBOXES') NOT NULL,
  `position` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_survey_default_questions`
--

INSERT INTO `cs_survey_default_questions` (`template_id`, `section_id`, `question_id`, `question`, `language_variable`, `question_type`, `position`, `status`) VALUES
(1, 1, 1, 'Information and Documentation', 'information-and-documentation', 'RATING', 0, 'A'),
(1, 1, 2, 'Pre cruise Hotel/Transfor arrangements', 'pre-cruise-hoteltransfor-arrangements', 'RATING', 0, 'A'),
(1, 1, 3, 'Air Arrangements', 'air-arrangements', 'RATING', 0, 'A'),
(1, 2, 1, 'Bedding /Sleep Experience', 'bedding-sleep-experience', 'RATING', 0, 'A'),
(1, 2, 2, 'Stateroom or Suite  Cleanliess', 'stateroom-or-suite-cleanliess', 'RATING', 0, 'A'),
(1, 2, 3, 'Stateroom Maintenance', 'stateroom-maintenance', 'RATING', 0, 'A'),
(1, 3, 1, 'Casino', 'casino', 'RATING', 0, 'A'),
(1, 3, 2, 'Canyon Ranch Spaclub', 'canyon-ranch-spaclub', 'RATING', 0, 'A'),
(1, 3, 3, 'Executive Lounge Facilities', 'executive-lounge-facilities', 'RATING', 0, 'A'),
(1, 3, 4, 'Concierge Lounge Facilities', 'concierge-lounge-facilities', 'RATING', 0, 'A'),
(1, 3, 5, 'Valet Laundry Services', 'valet-laundry-services', 'RATING', 0, 'A'),
(1, 3, 6, 'Medical Services ', 'medical-services', 'RATING', 0, 'A'),
(1, 3, 7, 'Boutiques', 'boutiques', 'RATING', 0, 'A'),
(1, 3, 8, 'Library Selection', 'library-selection', 'RATING', 0, 'A'),
(1, 3, 9, 'TV Programming & Movies', 'tv-programming-movies', 'RATING', 0, 'A'),
(1, 3, 10, 'Oceania@Sea Staff', 'oceaniasea-staff', 'RATING', 0, 'A'),
(1, 3, 11, 'Tender Service', 'tender-service', 'RATING', 0, 'A'),
(1, 4, 1, 'Overall quality of cuisine', 'overall-quality-of-cuisine', 'RATING', 0, 'A'),
(1, 4, 2, 'Variety of menu items', 'variety-of-menu-items', 'RATING', 0, 'A'),
(1, 4, 3, 'Presentation of cuisine', 'presentation-of-cuisine', 'RATING', 0, 'A'),
(1, 4, 4, 'Overall cuisine- Grand dining room ', 'overall-cuisine-grand-dining-room', 'RATING', 0, 'A'),
(1, 4, 5, 'Overall cuisine- Jacques', 'overall-cuisine-jacques', 'RATING', 0, 'A'),
(1, 4, 6, 'Overall cuisine - Red ginger', 'overall-cuisine-red-ginger', 'RATING', 0, 'A'),
(1, 4, 7, 'Overall cuisine- Polo grill', 'overall-cuisine-polo-grill', 'RATING', 0, 'A'),
(1, 4, 8, 'Overall cuisine -Toscana', 'overall-cuisine-toscana', 'RATING', 0, 'A'),
(1, 4, 9, 'Overall cuisine- Terrace cafe', 'overall-cuisine-terrace-cafe', 'RATING', 0, 'A'),
(1, 4, 10, 'Overall cuisine- Waves Grill', 'overall-cuisine-waves-grill', 'RATING', 0, 'A'),
(1, 4, 11, 'Overall reserve cuisine &wine experience', 'overall-reserve-cuisine-wine-experience', 'RATING', 0, 'A'),
(1, 4, 12, 'Afternoon tea', 'afternoon-tea', 'RATING', 0, 'A'),
(1, 4, 13, 'Wine selelctions', 'wine-selelctions', 'RATING', 0, 'A'),
(1, 4, 14, 'Room service menu', 'room-service-menu', 'RATING', 0, 'A'),
(1, 4, 15, 'Baristas', 'baristas', 'RATING', 0, 'A'),
(1, 5, 1, 'The culinary center classes', 'the-culinary-center-classes', 'RATING', 0, 'A'),
(1, 5, 2, 'Artist Loft', 'artist-loft', 'RATING', 0, 'A'),
(1, 6, 1, 'Lights,camera music - production show', 'lightscamera-music-production-show', 'RATING', 0, 'A'),
(1, 6, 2, 'World beat - production show', 'world-beat-production-show', 'RATING', 0, 'A'),
(1, 6, 3, 'Salute from the crew', 'salute-from-the-crew', 'RATING', 0, 'A'),
(1, 6, 4, 'Riviera Orchestra', 'riviera-orchestra', 'RATING', 0, 'A'),
(1, 6, 5, 'Ocean string Quartet', 'ocean-string-quartet', 'RATING', 0, 'A'),
(1, 6, 6, 'Andrea fontana- cocktail planist', 'andrea-fontana-cocktail-planist', 'RATING', 0, 'A'),
(1, 6, 7, 'Music station band', 'music-station-band', 'RATING', 0, 'A'),
(1, 6, 8, 'Graham denison- Artist in residence', 'graham-denison-artist-in-residence', 'RATING', 0, 'A'),
(1, 6, 9, 'Jerryspeed- Ventrlioquist', 'jerryspeed-ventrlioquist', 'RATING', 0, 'A'),
(1, 6, 10, 'Jennifer Singer- Vocalist', 'jennifer-singer-vocalist', 'RATING', 0, 'A'),
(1, 6, 11, 'Ashley carruthers- Plano show man', 'ashley-carruthers-plano-show-man', 'RATING', 0, 'A'),
(1, 7, 1, 'Destination services staff', 'destination-services-staff', 'RATING', 0, 'A'),
(1, 7, 2, 'Port Lectures', 'port-lectures', 'RATING', 0, 'A'),
(1, 7, 3, 'Quality of shore excursion experience', 'quality-of-shore-excursion-experience', 'RATING', 0, 'A'),
(1, 8, 1, 'Overall curise experience', 'overall-curise-experience', 'RATING', 0, 'A'),
(1, 8, 2, 'Ports of call', 'ports-of-call', 'RATING', 0, 'A'),
(1, 9, 1, 'How likely are you to recommend oceania cruises to a friend?', 'how-likely-are-you-to-recommend-oceania-cruises-to-a-friend', 'RADIOBUTTONS', 0, 'A'),
(1, 9, 2, 'How likely are you to cruises with oceania cruises again?', 'how-likely-are-you-to-cruises-with-oceania-cruises-again', 'RADIOBUTTONS', 0, 'A'),
(1, 10, 1, 'Officers', 'officers', 'RATING', 0, 'A'),
(1, 10, 2, 'Oceania club ambassador', 'oceania-club-ambassador', 'RATING', 0, 'A'),
(1, 10, 3, 'Reception staff', 'reception-staff', 'RATING', 0, 'A'),
(1, 10, 4, 'Cruise director', 'cruise-director', 'RATING', 0, 'A'),
(1, 10, 5, 'Entertainment staff', 'entertainment-staff', 'RATING', 0, 'A'),
(1, 10, 6, 'Staterooms or suites -Steward/Stewardess', 'staterooms-or-suites-stewardstewardess', 'RATING', 0, 'A'),
(1, 10, 7, 'Room service staff', 'room-service-staff', 'RATING', 0, 'A'),
(1, 10, 8, 'Maitre D''s', 'maitre-ds', 'RATING', 0, 'A'),
(1, 10, 9, 'Wait staff- Grand dining room ', 'wait-staff-grand-dining-room', 'RATING', 0, 'A'),
(1, 10, 10, 'Wait staff- Jacques', 'wait-staff-jacques', 'RATING', 0, 'A'),
(1, 10, 11, 'Wait staff - Red ginger', 'wait-staff-red-ginger', 'RATING', 0, 'A'),
(1, 10, 12, 'Wait staff- Polo grill', 'wait-staff-polo-grill', 'RATING', 0, 'A'),
(1, 10, 13, 'Wait staff-Toscana', 'wait-staff-toscana', 'RATING', 0, 'A'),
(1, 10, 14, 'Wait staff- Terrace cafe', 'wait-staff-terrace-cafe', 'RATING', 0, 'A'),
(1, 10, 15, 'Wait staff- Wave Grill', 'wait-staff-wave-grill', 'RATING', 0, 'A'),
(1, 10, 16, 'Wait staff- La Reserve', 'wait-staff-la-reserve', 'RATING', 0, 'A'),
(1, 10, 17, 'The culinary center chef', 'the-culinary-center-chef', 'RATING', 0, 'A'),
(1, 10, 18, 'Bar staff', 'bar-staff', 'RATING', 0, 'A'),
(1, 10, 19, 'Head sommelier/Celler master', 'head-sommelierceller-master', 'RATING', 0, 'A'),
(1, 10, 20, 'Wine waiters/Sommelier', 'wine-waiterssommelier', 'RATING', 0, 'A'),
(1, 10, 21, 'Deck attendants- Pool deck service', 'deck-attendants-pool-deck-service', 'RATING', 0, 'A'),
(1, 10, 22, 'Gangway security staff ', 'gangway-security-staff', 'RATING', 0, 'A'),
(1, 11, 1, 'Consistency of personalized service and attention to detail', 'consistency-of-personalized-service-and-attention-to-detail', 'RATING', 0, 'A'),
(1, 11, 2, 'Friendliness & interaction with guests', 'friendliness-interaction-with-guests', 'RATING', 0, 'A'),
(1, 12, 1, 'Have you ever cruised before', 'have-you-ever-cruised-before', 'RADIOBUTTONS', 0, 'A'),
(1, 12, 2, 'If yes,which cruise lines have you sailed with previously?', 'if-yeswhich-cruise-lines-have-you-sailed-with-previously', 'CHECKBOXES', 0, 'A'),
(1, 12, 3, 'What was the deciding factor in booking this cruises', 'what-was-the-deciding-factor-in-booking-this-cruises', 'CHECKBOXES', 0, 'A'),
(1, 12, 4, 'Which destination would you like to cruise next ?', 'which-destination-would-you-like-to-cruise-next', 'CHECKBOXES', 0, 'A'),
(1, 12, 5, 'When would you like to cruise next?', 'when-would-you-like-to-cruise-next', 'CHECKBOXES', 0, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey_default_question_options`
--

CREATE TABLE `cs_survey_default_question_options` (
  `template_id` bigint(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `language_variable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_survey_default_question_options`
--

INSERT INTO `cs_survey_default_question_options` (`template_id`, `section_id`, `question_id`, `option_id`, `option_name`, `language_variable`) VALUES
(1, 1, 1, 1, 'Excellent', 'excellent'),
(1, 1, 1, 2, 'Very Good', 'very-good'),
(1, 1, 1, 3, 'Good', 'good'),
(1, 1, 1, 4, 'Fair', 'fair'),
(1, 1, 1, 5, 'Poor', 'poor'),
(1, 1, 1, 6, 'N/A', 'na'),
(1, 1, 2, 1, 'Excellent', 'excellent'),
(1, 1, 2, 2, 'Very Good', 'very-good'),
(1, 1, 2, 3, 'Good', 'good'),
(1, 1, 2, 4, 'Fair', 'fair'),
(1, 1, 2, 5, 'Poor', 'poor'),
(1, 1, 2, 6, 'N/A', 'na'),
(1, 1, 3, 1, 'Excellent', 'excellent'),
(1, 1, 3, 2, 'Very Good', 'very-good'),
(1, 1, 3, 3, 'Good', 'good'),
(1, 1, 3, 4, 'Fair', 'fair'),
(1, 1, 3, 5, 'Poor', 'poor'),
(1, 1, 3, 6, 'N/A', 'na'),
(1, 2, 1, 1, 'Excellent', 'excellent'),
(1, 2, 1, 2, 'Very Good', 'very-good'),
(1, 2, 1, 3, 'Good', 'good'),
(1, 2, 1, 4, 'Fair', 'fair'),
(1, 2, 1, 5, 'Poor', 'poor'),
(1, 2, 1, 6, 'N/A', 'na'),
(1, 2, 2, 1, 'Excellent', 'excellent'),
(1, 2, 2, 2, 'Very Good', 'very-good'),
(1, 2, 2, 3, 'Good', 'good'),
(1, 2, 2, 4, 'Fair', 'fair'),
(1, 2, 2, 5, 'Poor', 'poor'),
(1, 2, 2, 6, 'N/A', 'na'),
(1, 2, 3, 1, 'Excellent', 'excellent'),
(1, 2, 3, 2, 'Very Good', 'very-good'),
(1, 2, 3, 3, 'Good', 'good'),
(1, 2, 3, 4, 'Fair', 'fair'),
(1, 2, 3, 5, 'Poor', 'poor'),
(1, 2, 3, 6, 'N/A', 'na'),
(1, 3, 1, 1, 'Excellent', 'excellent'),
(1, 3, 1, 2, 'Very Good', 'very-good'),
(1, 3, 1, 3, 'Good', 'good'),
(1, 3, 1, 4, 'Fair', 'fair'),
(1, 3, 1, 5, 'Poor', 'poor'),
(1, 3, 1, 6, 'N/A', 'na'),
(1, 3, 2, 1, 'Excellent', 'excellent'),
(1, 3, 2, 2, 'Very Good', 'very-good'),
(1, 3, 2, 3, 'Good', 'good'),
(1, 3, 2, 4, 'Fair', 'fair'),
(1, 3, 2, 5, 'Poor', 'poor'),
(1, 3, 2, 6, 'N/A', 'na'),
(1, 3, 3, 1, 'Excellent', 'excellent'),
(1, 3, 3, 2, 'Very Good', 'very-good'),
(1, 3, 3, 3, 'Good', 'good'),
(1, 3, 3, 4, 'Fair', 'fair'),
(1, 3, 3, 5, 'Poor', 'poor'),
(1, 3, 3, 6, 'N/A', 'na'),
(1, 3, 4, 1, 'Excellent', 'excellent'),
(1, 3, 4, 2, 'Very Good', 'very-good'),
(1, 3, 4, 3, 'Good', 'good'),
(1, 3, 4, 4, 'Fair', 'fair'),
(1, 3, 4, 5, 'Poor', 'poor'),
(1, 3, 4, 6, 'N/A', 'na'),
(1, 3, 5, 1, 'Excellent', 'excellent'),
(1, 3, 5, 2, 'Very Good', 'very-good'),
(1, 3, 5, 3, 'Good', 'good'),
(1, 3, 5, 4, 'Fair', 'fair'),
(1, 3, 5, 5, 'Poor', 'poor'),
(1, 3, 5, 6, 'N/A', 'na'),
(1, 3, 6, 1, 'Excellent', 'excellent'),
(1, 3, 6, 2, 'Very Good', 'very-good'),
(1, 3, 6, 3, 'Good', 'good'),
(1, 3, 6, 4, 'Fair', 'fair'),
(1, 3, 6, 5, 'Poor', 'poor'),
(1, 3, 6, 6, 'N/A', 'na'),
(1, 3, 7, 1, 'Excellent', 'excellent'),
(1, 3, 7, 2, 'Very Good', 'very-good'),
(1, 3, 7, 3, 'Good', 'good'),
(1, 3, 7, 4, 'Fair', 'fair'),
(1, 3, 7, 5, 'Poor', 'poor'),
(1, 3, 7, 6, 'N/A', 'na'),
(1, 3, 8, 1, 'Excellent', 'excellent'),
(1, 3, 8, 2, 'Very Good', 'very-good'),
(1, 3, 8, 3, 'Good', 'good'),
(1, 3, 8, 4, 'Fair', 'fair'),
(1, 3, 8, 5, 'Poor', 'poor'),
(1, 3, 8, 6, 'N/A', 'na'),
(1, 3, 9, 1, 'Excellent', 'excellent'),
(1, 3, 9, 2, 'Very Good', 'very-good'),
(1, 3, 9, 3, 'Good', 'good'),
(1, 3, 9, 4, 'Fair', 'fair'),
(1, 3, 9, 5, 'Poor', 'poor'),
(1, 3, 9, 6, 'N/A', 'na'),
(1, 3, 10, 1, 'Excellent', 'excellent'),
(1, 3, 10, 2, 'Very Good', 'very-good'),
(1, 3, 10, 3, 'Good', 'good'),
(1, 3, 10, 4, 'Fair', 'fair'),
(1, 3, 10, 5, 'Poor', 'poor'),
(1, 3, 10, 6, 'N/A', 'na'),
(1, 3, 11, 1, 'Excellent', 'excellent'),
(1, 3, 11, 2, 'Very Good', 'very-good'),
(1, 3, 11, 3, 'Good', 'good'),
(1, 3, 11, 4, 'Fair', 'fair'),
(1, 3, 11, 5, 'Poor', 'poor'),
(1, 3, 11, 6, 'N/A', 'na'),
(1, 4, 1, 1, 'Excellent', 'excellent'),
(1, 4, 1, 2, 'Very Good', 'very-good'),
(1, 4, 1, 3, 'Good', 'good'),
(1, 4, 1, 4, 'Fair', 'fair'),
(1, 4, 1, 5, 'Poor', 'poor'),
(1, 4, 1, 6, 'N/A', 'na'),
(1, 4, 2, 1, 'Excellent', 'excellent'),
(1, 4, 2, 2, 'Very Good', 'very-good'),
(1, 4, 2, 3, 'Good', 'good'),
(1, 4, 2, 4, 'Fair', 'fair'),
(1, 4, 2, 5, 'Poor', 'poor'),
(1, 4, 2, 6, 'N/A', 'na'),
(1, 4, 3, 1, 'Excellent', 'excellent'),
(1, 4, 3, 2, 'Very Good', 'very-good'),
(1, 4, 3, 3, 'Good', 'good'),
(1, 4, 3, 4, 'Fair', 'fair'),
(1, 4, 3, 5, 'Poor', 'poor'),
(1, 4, 3, 6, 'N/A', 'na'),
(1, 4, 4, 1, 'Excellent', 'excellent'),
(1, 4, 4, 2, 'Very Good', 'very-good'),
(1, 4, 4, 3, 'Good', 'good'),
(1, 4, 4, 4, 'Fair', 'fair'),
(1, 4, 4, 5, 'Poor', 'poor'),
(1, 4, 4, 6, 'N/A', 'na'),
(1, 4, 5, 1, 'Excellent', 'excellent'),
(1, 4, 5, 2, 'Very Good', 'very-good'),
(1, 4, 5, 3, 'Good', 'good'),
(1, 4, 5, 4, 'Fair', 'fair'),
(1, 4, 5, 5, 'Poor', 'poor'),
(1, 4, 5, 6, 'N/A', 'na'),
(1, 4, 6, 1, 'Excellent', 'excellent'),
(1, 4, 6, 2, 'Very Good', 'very-good'),
(1, 4, 6, 3, 'Good', 'good'),
(1, 4, 6, 4, 'Fair', 'fair'),
(1, 4, 6, 5, 'Poor', 'poor'),
(1, 4, 6, 6, 'N/A', 'na'),
(1, 4, 7, 1, 'Excellent', 'excellent'),
(1, 4, 7, 2, 'Very Good', 'very-good'),
(1, 4, 7, 3, 'Good', 'good'),
(1, 4, 7, 4, 'Fair', 'fair'),
(1, 4, 7, 5, 'Poor', 'poor'),
(1, 4, 7, 6, 'N/A', 'na'),
(1, 4, 8, 1, 'Excellent', 'excellent'),
(1, 4, 8, 2, 'Very Good', 'very-good'),
(1, 4, 8, 3, 'Good', 'good'),
(1, 4, 8, 4, 'Fair', 'fair'),
(1, 4, 8, 5, 'Poor', 'poor'),
(1, 4, 8, 6, 'N/A', 'na'),
(1, 4, 9, 1, 'Excellent', 'excellent'),
(1, 4, 9, 2, 'Very Good', 'very-good'),
(1, 4, 9, 3, 'Good', 'good'),
(1, 4, 9, 4, 'Fair', 'fair'),
(1, 4, 9, 5, 'Poor', 'poor'),
(1, 4, 9, 6, 'N/A', 'na'),
(1, 4, 10, 1, 'Excellent', 'excellent'),
(1, 4, 10, 2, 'Very Good', 'very-good'),
(1, 4, 10, 3, 'Good', 'good'),
(1, 4, 10, 4, 'Fair', 'fair'),
(1, 4, 10, 5, 'Poor', 'poor'),
(1, 4, 10, 6, 'N/A', 'na'),
(1, 4, 11, 1, 'Excellent', 'excellent'),
(1, 4, 11, 2, 'Very Good', 'very-good'),
(1, 4, 11, 3, 'Good', 'good'),
(1, 4, 11, 4, 'Fair', 'fair'),
(1, 4, 11, 5, 'Poor', 'poor'),
(1, 4, 11, 6, 'N/A', 'na'),
(1, 4, 12, 1, 'Excellent', 'excellent'),
(1, 4, 12, 2, 'Very Good', 'very-good'),
(1, 4, 12, 3, 'Good', 'good'),
(1, 4, 12, 4, 'Fair', 'fair'),
(1, 4, 12, 5, 'Poor', 'poor'),
(1, 4, 12, 6, 'N/A', 'na'),
(1, 4, 13, 1, 'Excellent', 'excellent'),
(1, 4, 13, 2, 'Very Good', 'very-good'),
(1, 4, 13, 3, 'Good', 'good'),
(1, 4, 13, 4, 'Fair', 'fair'),
(1, 4, 13, 5, 'Poor', 'poor'),
(1, 4, 13, 6, 'N/A', 'na'),
(1, 4, 14, 1, 'Excellent', 'excellent'),
(1, 4, 14, 2, 'Very Good', 'very-good'),
(1, 4, 14, 3, 'Good', 'good'),
(1, 4, 14, 4, 'Fair', 'fair'),
(1, 4, 14, 5, 'Poor', 'poor'),
(1, 4, 14, 6, 'N/A', 'na'),
(1, 4, 15, 1, 'Excellent', 'excellent'),
(1, 4, 15, 2, 'Very Good', 'very-good'),
(1, 4, 15, 3, 'Good', 'good'),
(1, 4, 15, 4, 'Fair', 'fair'),
(1, 4, 15, 5, 'Poor', 'poor'),
(1, 4, 15, 6, 'N/A', 'na'),
(1, 5, 1, 1, 'Excellent', 'excellent'),
(1, 5, 1, 2, 'Very Good', 'very-good'),
(1, 5, 1, 3, 'Good', 'good'),
(1, 5, 1, 4, 'Fair', 'fair'),
(1, 5, 1, 5, 'Poor', 'poor'),
(1, 5, 1, 6, 'N/A', 'na'),
(1, 5, 2, 1, 'Excellent', 'excellent'),
(1, 5, 2, 2, 'Very Good', 'very-good'),
(1, 5, 2, 3, 'Good', 'good'),
(1, 5, 2, 4, 'Fair', 'fair'),
(1, 5, 2, 5, 'Poor', 'poor'),
(1, 5, 2, 6, 'N/A', 'na'),
(1, 6, 1, 1, 'Excellent', 'excellent'),
(1, 6, 1, 2, 'Very Good', 'very-good'),
(1, 6, 1, 3, 'Good', 'good'),
(1, 6, 1, 4, 'Fair', 'fair'),
(1, 6, 1, 5, 'Poor', 'poor'),
(1, 6, 1, 6, 'N/A', 'na'),
(1, 6, 2, 1, 'Excellent', 'excellent'),
(1, 6, 2, 2, 'Very Good', 'very-good'),
(1, 6, 2, 3, 'Good', 'good'),
(1, 6, 2, 4, 'Fair', 'fair'),
(1, 6, 2, 5, 'Poor', 'poor'),
(1, 6, 2, 6, 'N/A', 'na'),
(1, 6, 3, 1, 'Excellent', 'excellent'),
(1, 6, 3, 2, 'Very Good', 'very-good'),
(1, 6, 3, 3, 'Good', 'good'),
(1, 6, 3, 4, 'Fair', 'fair'),
(1, 6, 3, 5, 'Poor', 'poor'),
(1, 6, 3, 6, 'N/A', 'na'),
(1, 6, 4, 1, 'Excellent', 'excellent'),
(1, 6, 4, 2, 'Very Good', 'very-good'),
(1, 6, 4, 3, 'Good', 'good'),
(1, 6, 4, 4, 'Fair', 'fair'),
(1, 6, 4, 5, 'Poor', 'poor'),
(1, 6, 4, 6, 'N/A', 'na'),
(1, 6, 5, 1, 'Excellent', 'excellent'),
(1, 6, 5, 2, 'Very Good', 'very-good'),
(1, 6, 5, 3, 'Good', 'good'),
(1, 6, 5, 4, 'Fair', 'fair'),
(1, 6, 5, 5, 'Poor', 'poor'),
(1, 6, 5, 6, 'N/A', 'na'),
(1, 6, 6, 1, 'Excellent', 'excellent'),
(1, 6, 6, 2, 'Very Good', 'very-good'),
(1, 6, 6, 3, 'Good', 'good'),
(1, 6, 6, 4, 'Fair', 'fair'),
(1, 6, 6, 5, 'Poor', 'poor'),
(1, 6, 6, 6, 'N/A', 'na'),
(1, 6, 7, 1, 'Excellent', 'excellent'),
(1, 6, 7, 2, 'Very Good', 'very-good'),
(1, 6, 7, 3, 'Good', 'good'),
(1, 6, 7, 4, 'Fair', 'fair'),
(1, 6, 7, 5, 'Poor', 'poor'),
(1, 6, 7, 6, 'N/A', 'na'),
(1, 6, 8, 1, 'Excellent', 'excellent'),
(1, 6, 8, 2, 'Very Good', 'very-good'),
(1, 6, 8, 3, 'Good', 'good'),
(1, 6, 8, 4, 'Fair', 'fair'),
(1, 6, 8, 5, 'Poor', 'poor'),
(1, 6, 8, 6, 'N/A', 'na'),
(1, 6, 9, 1, 'Excellent', 'excellent'),
(1, 6, 9, 2, 'Very Good', 'very-good'),
(1, 6, 9, 3, 'Good', 'good'),
(1, 6, 9, 4, 'Fair', 'fair'),
(1, 6, 9, 5, 'Poor', 'poor'),
(1, 6, 9, 6, 'N/A', 'na'),
(1, 6, 10, 1, 'Excellent', 'excellent'),
(1, 6, 10, 2, 'Very Good', 'very-good'),
(1, 6, 10, 3, 'Good', 'good'),
(1, 6, 10, 4, 'Fair', 'fair'),
(1, 6, 10, 5, 'Poor', 'poor'),
(1, 6, 10, 6, 'N/A', 'na'),
(1, 6, 11, 1, 'Excellent', 'excellent'),
(1, 6, 11, 2, 'Very Good', 'very-good'),
(1, 6, 11, 3, 'Good', 'good'),
(1, 6, 11, 4, 'Fair', 'fair'),
(1, 6, 11, 5, 'Poor', 'poor'),
(1, 6, 11, 6, 'N/A', 'na'),
(1, 7, 1, 1, 'Excellent', 'excellent'),
(1, 7, 1, 2, 'Very Good', 'very-good'),
(1, 7, 1, 3, 'Good', 'good'),
(1, 7, 1, 4, 'Fair', 'fair'),
(1, 7, 1, 5, 'Poor', 'poor'),
(1, 7, 1, 6, 'N/A', 'na'),
(1, 7, 2, 1, 'Excellent', 'excellent'),
(1, 7, 2, 2, 'Very Good', 'very-good'),
(1, 7, 2, 3, 'Good', 'good'),
(1, 7, 2, 4, 'Fair', 'fair'),
(1, 7, 2, 5, 'Poor', 'poor'),
(1, 7, 2, 6, 'N/A', 'na'),
(1, 7, 3, 1, 'Excellent', 'excellent'),
(1, 7, 3, 2, 'Very Good', 'very-good'),
(1, 7, 3, 3, 'Good', 'good'),
(1, 7, 3, 4, 'Fair', 'fair'),
(1, 7, 3, 5, 'Poor', 'poor'),
(1, 7, 3, 6, 'N/A', 'na'),
(1, 8, 1, 1, 'Excellent', 'excellent'),
(1, 8, 1, 2, 'Very Good', 'very-good'),
(1, 8, 1, 3, 'Good', 'good'),
(1, 8, 1, 4, 'Fair', 'fair'),
(1, 8, 1, 5, 'Poor', 'poor'),
(1, 8, 1, 6, 'N/A', 'na'),
(1, 8, 2, 1, 'Excellent', 'excellent'),
(1, 8, 2, 2, 'Very Good', 'very-good'),
(1, 8, 2, 3, 'Good', 'good'),
(1, 8, 2, 4, 'Fair', 'fair'),
(1, 8, 2, 5, 'Poor', 'poor'),
(1, 8, 2, 6, 'N/A', 'na'),
(1, 9, 1, 1, 'Definitely', 'definitely'),
(1, 9, 1, 2, 'Highly likely', 'highly-likely'),
(1, 9, 1, 3, 'Probably', 'probably'),
(1, 9, 1, 4, 'Probably not', 'probably-not'),
(1, 9, 1, 5, 'Definitely not ', 'definitely-not'),
(1, 9, 2, 1, 'Definitely', 'definitely'),
(1, 9, 2, 2, 'Highly likely', 'highly-likely'),
(1, 9, 2, 3, 'Probably', 'probably'),
(1, 9, 2, 4, 'Probably not', 'probably-not'),
(1, 9, 2, 5, 'Definitely not ', 'definitely-not'),
(1, 10, 1, 1, 'Excellent', 'excellent'),
(1, 10, 1, 2, 'Very Good', 'very-good'),
(1, 10, 1, 3, 'Good', 'good'),
(1, 10, 1, 4, 'Fair', 'fair'),
(1, 10, 1, 5, 'Poor', 'poor'),
(1, 10, 1, 6, 'N/A', 'na'),
(1, 10, 2, 1, 'Excellent', 'excellent'),
(1, 10, 2, 2, 'Very Good', 'very-good'),
(1, 10, 2, 3, 'Good', 'good'),
(1, 10, 2, 4, 'Fair', 'fair'),
(1, 10, 2, 5, 'Poor', 'poor'),
(1, 10, 2, 6, 'N/A', 'na'),
(1, 10, 3, 1, 'Excellent', 'excellent'),
(1, 10, 3, 2, 'Very Good', 'very-good'),
(1, 10, 3, 3, 'Good', 'good'),
(1, 10, 3, 4, 'Fair', 'fair'),
(1, 10, 3, 5, 'Poor', 'poor'),
(1, 10, 3, 6, 'N/A', 'na'),
(1, 10, 4, 1, 'Excellent', 'excellent'),
(1, 10, 4, 2, 'Very Good', 'very-good'),
(1, 10, 4, 3, 'Good', 'good'),
(1, 10, 4, 4, 'Fair', 'fair'),
(1, 10, 4, 5, 'Poor', 'poor'),
(1, 10, 4, 6, 'N/A', 'na'),
(1, 10, 5, 1, 'Excellent', 'excellent'),
(1, 10, 5, 2, 'Very Good', 'very-good'),
(1, 10, 5, 3, 'Good', 'good'),
(1, 10, 5, 4, 'Fair', 'fair'),
(1, 10, 5, 5, 'Poor', 'poor'),
(1, 10, 5, 6, 'N/A', 'na'),
(1, 10, 6, 1, 'Excellent', 'excellent'),
(1, 10, 6, 2, 'Very Good', 'very-good'),
(1, 10, 6, 3, 'Good', 'good'),
(1, 10, 6, 4, 'Fair', 'fair'),
(1, 10, 6, 5, 'Poor', 'poor'),
(1, 10, 6, 6, 'N/A', 'na'),
(1, 10, 7, 1, 'Excellent', 'excellent'),
(1, 10, 7, 2, 'Very Good', 'very-good'),
(1, 10, 7, 3, 'Good', 'good'),
(1, 10, 7, 4, 'Fair', 'fair'),
(1, 10, 7, 5, 'Poor', 'poor'),
(1, 10, 7, 6, 'N/A', 'na'),
(1, 10, 8, 1, 'Excellent', 'excellent'),
(1, 10, 8, 2, 'Very Good', 'very-good'),
(1, 10, 8, 3, 'Good', 'good'),
(1, 10, 8, 4, 'Fair', 'fair'),
(1, 10, 8, 5, 'Poor', 'poor'),
(1, 10, 8, 6, 'N/A', 'na'),
(1, 10, 9, 1, 'Excellent', 'excellent'),
(1, 10, 9, 2, 'Very Good', 'very-good'),
(1, 10, 9, 3, 'Good', 'good'),
(1, 10, 9, 4, 'Fair', 'fair'),
(1, 10, 9, 5, 'Poor', 'poor'),
(1, 10, 9, 6, 'N/A', 'na'),
(1, 10, 10, 1, 'Excellent', 'excellent'),
(1, 10, 10, 2, 'Very Good', 'very-good'),
(1, 10, 10, 3, 'Good', 'good'),
(1, 10, 10, 4, 'Fair', 'fair'),
(1, 10, 10, 5, 'Poor', 'poor'),
(1, 10, 10, 6, 'N/A', 'na'),
(1, 10, 11, 1, 'Excellent', 'excellent'),
(1, 10, 11, 2, 'Very Good', 'very-good'),
(1, 10, 11, 3, 'Good', 'good'),
(1, 10, 11, 4, 'Fair', 'fair'),
(1, 10, 11, 5, 'Poor', 'poor'),
(1, 10, 11, 6, 'N/A', 'na'),
(1, 10, 12, 1, 'Excellent', 'excellent'),
(1, 10, 12, 2, 'Very Good', 'very-good'),
(1, 10, 12, 3, 'Good', 'good'),
(1, 10, 12, 4, 'Fair', 'fair'),
(1, 10, 12, 5, 'Poor', 'poor'),
(1, 10, 12, 6, 'N/A', 'na'),
(1, 10, 13, 1, 'Excellent', 'excellent'),
(1, 10, 13, 2, 'Very Good', 'very-good'),
(1, 10, 13, 3, 'Good', 'good'),
(1, 10, 13, 4, 'Fair', 'fair'),
(1, 10, 13, 5, 'Poor', 'poor'),
(1, 10, 13, 6, 'N/A', 'na'),
(1, 10, 14, 1, 'Excellent', 'excellent'),
(1, 10, 14, 2, 'Very Good', 'very-good'),
(1, 10, 14, 3, 'Good', 'good'),
(1, 10, 14, 4, 'Fair', 'fair'),
(1, 10, 14, 5, 'Poor', 'poor'),
(1, 10, 14, 6, 'N/A', 'na'),
(1, 10, 15, 1, 'Excellent', 'excellent'),
(1, 10, 15, 2, 'Very Good', 'very-good'),
(1, 10, 15, 3, 'Good', 'good'),
(1, 10, 15, 4, 'Fair', 'fair'),
(1, 10, 15, 5, 'Poor', 'poor'),
(1, 10, 15, 6, 'N/A', 'na'),
(1, 10, 16, 1, 'Excellent', 'excellent'),
(1, 10, 16, 2, 'Very Good', 'very-good'),
(1, 10, 16, 3, 'Good', 'good'),
(1, 10, 16, 4, 'Fair', 'fair'),
(1, 10, 16, 5, 'Poor', 'poor'),
(1, 10, 16, 6, 'N/A', 'na'),
(1, 10, 17, 1, 'Excellent', 'excellent'),
(1, 10, 17, 2, 'Very Good', 'very-good'),
(1, 10, 17, 3, 'Good', 'good'),
(1, 10, 17, 4, 'Fair', 'fair'),
(1, 10, 17, 5, 'Poor', 'poor'),
(1, 10, 17, 6, 'N/A', 'na'),
(1, 10, 18, 1, 'Excellent', 'excellent'),
(1, 10, 18, 2, 'Very Good', 'very-good'),
(1, 10, 18, 3, 'Good', 'good'),
(1, 10, 18, 4, 'Fair', 'fair'),
(1, 10, 18, 5, 'Poor', 'poor'),
(1, 10, 18, 6, 'N/A', 'na'),
(1, 10, 19, 1, 'Excellent', 'excellent'),
(1, 10, 19, 2, 'Very Good', 'very-good'),
(1, 10, 19, 3, 'Good', 'good'),
(1, 10, 19, 4, 'Fair', 'fair'),
(1, 10, 19, 5, 'Poor', 'poor'),
(1, 10, 19, 6, 'N/A', 'na'),
(1, 10, 20, 1, 'Excellent', 'excellent'),
(1, 10, 20, 2, 'Very Good', 'very-good'),
(1, 10, 20, 3, 'Good', 'good'),
(1, 10, 20, 4, 'Fair', 'fair'),
(1, 10, 20, 5, 'Poor', 'poor'),
(1, 10, 20, 6, 'N/A', 'na'),
(1, 10, 21, 1, 'Excellent', 'excellent'),
(1, 10, 21, 2, 'Very Good', 'very-good'),
(1, 10, 21, 3, 'Good', 'good'),
(1, 10, 21, 4, 'Fair', 'fair'),
(1, 10, 21, 5, 'Poor', 'poor'),
(1, 10, 21, 6, 'N/A', 'na'),
(1, 10, 22, 1, 'Excellent', 'excellent'),
(1, 10, 22, 2, 'Very Good', 'very-good'),
(1, 10, 22, 3, 'Good', 'good'),
(1, 10, 22, 4, 'Fair', 'fair'),
(1, 10, 22, 5, 'Poor', 'poor'),
(1, 10, 22, 6, 'N/A', 'na'),
(1, 11, 1, 1, 'Excellent', 'excellent'),
(1, 11, 1, 2, 'Very Good', 'very-good'),
(1, 11, 1, 3, 'Good', 'good'),
(1, 11, 1, 4, 'Fair', 'fair'),
(1, 11, 1, 5, 'Poor', 'poor'),
(1, 11, 1, 6, 'N/A', 'na'),
(1, 11, 2, 1, 'Excellent', 'excellent'),
(1, 11, 2, 2, 'Very Good', 'very-good'),
(1, 11, 2, 3, 'Good', 'good'),
(1, 11, 2, 4, 'Fair', 'fair'),
(1, 11, 2, 5, 'Poor', 'poor'),
(1, 11, 2, 6, 'N/A', 'na'),
(1, 12, 1, 1, 'Yes', 'yes'),
(1, 12, 1, 2, 'No', 'no'),
(1, 12, 2, 1, 'Azamara', 'azamara'),
(1, 12, 2, 2, 'Celebrity cruis', 'celebrity-cruis'),
(1, 12, 2, 3, 'Crystal Cruises', 'crystal-cruises'),
(1, 12, 2, 4, 'Holland America', 'holland-america'),
(1, 12, 2, 5, 'Oceania CRUISES', 'oceania-cruises'),
(1, 12, 2, 6, 'Princes cruises', 'princes-cruises'),
(1, 12, 2, 7, 'Royal Caribbean', 'royal-caribbean'),
(1, 12, 2, 8, 'Silver sea cruises', 'silver-sea-cruises'),
(1, 12, 2, 9, 'The Yachts of seabours', 'the-yachts-of-seabours'),
(1, 12, 2, 10, ' Other', 'other'),
(1, 12, 3, 1, 'Itinerary ', 'itinerary'),
(1, 12, 3, 2, 'Price', 'price'),
(1, 12, 3, 3, 'Reputation of cruise Line', 'reputation-of-cruise-line'),
(1, 12, 3, 4, 'Travel agent', 'travel-agent'),
(1, 12, 3, 5, 'Reputation of Ship', 'reputation-of-ship'),
(1, 12, 3, 6, 'Other', 'other'),
(1, 12, 4, 1, 'Africa', 'africa'),
(1, 12, 4, 2, 'Alaska', 'alaska'),
(1, 12, 4, 3, 'Asia', 'asia'),
(1, 12, 4, 4, 'Australia/New Zealand', 'australianew-zealand'),
(1, 12, 4, 5, 'Caribbean/Tropics', 'caribbeantropics'),
(1, 12, 4, 6, 'Greeek Isles', 'greeek-isles'),
(1, 12, 4, 7, 'Holy land', 'holy-land'),
(1, 12, 4, 8, 'Mediterranean', 'mediterranean'),
(1, 12, 4, 9, 'Panama Canal', 'panama-canal'),
(1, 12, 4, 10, 'Northern Europe', 'northern-europe'),
(1, 12, 4, 11, 'Southern America', 'southern-america'),
(1, 12, 4, 12, 'Canada/New England', 'canadanew-england'),
(1, 12, 4, 13, 'Other', 'other'),
(1, 12, 5, 1, '0-12 months', '0-12-months'),
(1, 12, 5, 2, '12-36 months', '12-36-months'),
(1, 12, 5, 3, 'more than 36 months', 'more-than-36-months');

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey_default_sections`
--

CREATE TABLE `cs_survey_default_sections` (
  `template_id` bigint(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `language_variable` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_survey_default_sections`
--

INSERT INTO `cs_survey_default_sections` (`template_id`, `section_id`, `category_id`, `category`, `language_variable`, `position`, `status`) VALUES
(1, 1, 1, 'Before your cruise', 'before-your-cruise', 0, 'A'),
(1, 2, 2, 'Accommodations', 'accommodations', 0, 'A'),
(1, 3, 3, 'Ship Services and Amenities', 'ship-services-and-amenities', 0, 'A'),
(1, 4, 4, 'Culinary Experience', 'culinary-experience', 0, 'A'),
(1, 5, 5, 'Culinary Activities & Enrichment', 'culinary-activities-enrichment', 0, 'A'),
(1, 6, 6, 'Entertainment', 'entertainment', 0, 'A'),
(1, 7, 7, 'Destination Services', 'destination-services', 0, 'A'),
(1, 8, 8, 'Overall rating', 'overall-rating', 0, 'A'),
(1, 9, 9, 'Satisfaction', 'satisfaction', 0, 'A'),
(1, 10, 10, 'Staff Performance & Service', 'staff-performance-service', 0, 'A'),
(1, 11, 11, 'Overall Performance of ships crew staff, and officers', 'overall-performance-of-ships-crew-staff-and-officers', 0, 'A'),
(1, 12, 12, 'conclusion', 'conclusion', 0, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey_default_templates`
--

CREATE TABLE `cs_survey_default_templates` (
  `template_id` bigint(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_file` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_survey_default_templates`
--

INSERT INTO `cs_survey_default_templates` (`template_id`, `template_name`, `template_file`, `status`) VALUES
(1, 'Butler Cruise', 'butler-cruise.csv', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey_questions`
--

CREATE TABLE `cs_survey_questions` (
  `voyage_id` varchar(35) NOT NULL,
  `survey_id` varchar(35) NOT NULL,
  `section_id` varchar(35) NOT NULL,
  `question_id` varchar(35) NOT NULL,
  `question_numeric_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `language_variable` varchar(255) NOT NULL,
  `question_type` enum('RATING','RADIOBUTTONS','CHECKBOXES') NOT NULL,
  `position` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey_question_options`
--

CREATE TABLE `cs_survey_question_options` (
  `voyage_id` varchar(35) NOT NULL,
  `survey_id` varchar(35) NOT NULL,
  `section_id` varchar(35) NOT NULL,
  `question_id` varchar(35) NOT NULL,
  `option_id` varchar(35) NOT NULL,
  `option_numeric_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `language_variable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_survey_sections`
--

CREATE TABLE `cs_survey_sections` (
  `voyage_id` varchar(35) NOT NULL,
  `survey_id` varchar(35) NOT NULL,
  `section_id` varchar(35) NOT NULL,
  `section_numeric_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `language_variable` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_voyage`
--

CREATE TABLE `cs_voyage` (
  `cruise_code` char(3) NOT NULL,
  `voyage_id` varchar(35) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cs_admin`
--
ALTER TABLE `cs_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cs_countries`
--
ALTER TABLE `cs_countries`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `country_code` (`country_code`);

--
-- Indexes for table `cs_guests`
--
ALTER TABLE `cs_guests`
  ADD PRIMARY KEY (`guest_id`) USING BTREE,
  ADD UNIQUE KEY `Login` (`voyage_id`,`lastname`,`date_of_birth`,`password`) USING BTREE,
  ADD KEY `Guest_by_voyage` (`voyage_id`);

--
-- Indexes for table `cs_guest_survey_answers`
--
ALTER TABLE `cs_guest_survey_answers`
  ADD PRIMARY KEY (`voyage_id`,`survey_id`,`guest_id`,`section_id`,`question_id`,`option_id`) USING BTREE,
  ADD KEY `Question_option_count` (`voyage_id`,`survey_id`,`section_id`,`question_id`) USING BTREE;

--
-- Indexes for table `cs_guest_survey_comments`
--
ALTER TABLE `cs_guest_survey_comments`
  ADD PRIMARY KEY (`voyage_id`,`survey_id`,`guest_id`,`section_id`);

--
-- Indexes for table `cs_guest_survey_reports`
--
ALTER TABLE `cs_guest_survey_reports`
  ADD PRIMARY KEY (`voyage_id`,`survey_id`,`guest_id`) USING BTREE,
  ADD KEY `By_language` (`voyage_id`,`survey_id`,`guest_language`,`status`) USING BTREE,
  ADD KEY `By_Survey` (`voyage_id`,`survey_id`,`status`) USING BTREE;

--
-- Indexes for table `cs_languages`
--
ALTER TABLE `cs_languages`
  ADD PRIMARY KEY (`language_id`),
  ADD UNIQUE KEY `language_code` (`language_code`);

--
-- Indexes for table `cs_language_values`
--
ALTER TABLE `cs_language_values`
  ADD PRIMARY KEY (`language_code`,`variable_name`) USING BTREE;

--
-- Indexes for table `cs_question_categories`
--
ALTER TABLE `cs_question_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `cs_sessions`
--
ALTER TABLE `cs_sessions`
  ADD KEY `cs_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `cs_settings_general`
--
ALTER TABLE `cs_settings_general`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `cs_survey`
--
ALTER TABLE `cs_survey`
  ADD PRIMARY KEY (`survey_id`) USING BTREE,
  ADD KEY `Survey` (`voyage_id`,`status`) USING BTREE;

--
-- Indexes for table `cs_survey_default_questions`
--
ALTER TABLE `cs_survey_default_questions`
  ADD PRIMARY KEY (`template_id`,`section_id`,`question_id`) USING BTREE,
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `cs_survey_default_question_options`
--
ALTER TABLE `cs_survey_default_question_options`
  ADD PRIMARY KEY (`template_id`,`section_id`,`question_id`,`option_id`) USING BTREE,
  ADD KEY `section and question` (`section_id`,`question_id`);

--
-- Indexes for table `cs_survey_default_sections`
--
ALTER TABLE `cs_survey_default_sections`
  ADD PRIMARY KEY (`template_id`,`section_id`) USING BTREE,
  ADD KEY `Template Id` (`template_id`);

--
-- Indexes for table `cs_survey_default_templates`
--
ALTER TABLE `cs_survey_default_templates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `cs_survey_questions`
--
ALTER TABLE `cs_survey_questions`
  ADD PRIMARY KEY (`question_id`) USING BTREE,
  ADD KEY `Questions` (`voyage_id`,`survey_id`,`section_id`,`status`) USING BTREE,
  ADD KEY `cs_quetions` (`section_id`),
  ADD KEY `cs_survey_questions` (`survey_id`);

--
-- Indexes for table `cs_survey_question_options`
--
ALTER TABLE `cs_survey_question_options`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `options` (`voyage_id`,`survey_id`,`section_id`,`question_id`) USING BTREE,
  ADD KEY `cs_options` (`question_id`),
  ADD KEY `cs_section_options` (`section_id`),
  ADD KEY `cs_survey_options` (`survey_id`);

--
-- Indexes for table `cs_survey_sections`
--
ALTER TABLE `cs_survey_sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `Sections` (`voyage_id`,`survey_id`,`status`),
  ADD KEY `cs_survey_sections` (`survey_id`);

--
-- Indexes for table `cs_voyage`
--
ALTER TABLE `cs_voyage`
  ADD PRIMARY KEY (`voyage_id`),
  ADD KEY `status` (`status`),
  ADD KEY `Cruise Code` (`cruise_code`,`voyage_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cs_admin`
--
ALTER TABLE `cs_admin`
  MODIFY `admin_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cs_countries`
--
ALTER TABLE `cs_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `cs_languages`
--
ALTER TABLE `cs_languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cs_question_categories`
--
ALTER TABLE `cs_question_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cs_settings_general`
--
ALTER TABLE `cs_settings_general`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cs_survey_default_templates`
--
ALTER TABLE `cs_survey_default_templates`
  MODIFY `template_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cs_guest_survey_answers`
--
ALTER TABLE `cs_guest_survey_answers`
  ADD CONSTRAINT `Survey_Answers` FOREIGN KEY (`voyage_id`,`survey_id`,`guest_id`) REFERENCES `cs_guest_survey_reports` (`voyage_id`, `survey_id`, `guest_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_guest_survey_comments`
--
ALTER TABLE `cs_guest_survey_comments`
  ADD CONSTRAINT `Survey_Comments` FOREIGN KEY (`voyage_id`,`survey_id`,`guest_id`) REFERENCES `cs_guest_survey_reports` (`voyage_id`, `survey_id`, `guest_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_language_values`
--
ALTER TABLE `cs_language_values`
  ADD CONSTRAINT `Language Code` FOREIGN KEY (`language_code`) REFERENCES `cs_languages` (`language_code`);

--
-- Constraints for table `cs_survey`
--
ALTER TABLE `cs_survey`
  ADD CONSTRAINT `cs_voyage_id` FOREIGN KEY (`voyage_id`) REFERENCES `cs_voyage` (`voyage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_survey_default_questions`
--
ALTER TABLE `cs_survey_default_questions`
  ADD CONSTRAINT `Default Sections` FOREIGN KEY (`template_id`,`section_id`) REFERENCES `cs_survey_default_sections` (`template_id`, `section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_survey_default_question_options`
--
ALTER TABLE `cs_survey_default_question_options`
  ADD CONSTRAINT `Default Questions` FOREIGN KEY (`template_id`,`section_id`,`question_id`) REFERENCES `cs_survey_default_questions` (`template_id`, `section_id`, `question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_survey_default_sections`
--
ALTER TABLE `cs_survey_default_sections`
  ADD CONSTRAINT `Default Templates` FOREIGN KEY (`template_id`) REFERENCES `cs_survey_default_templates` (`template_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_survey_questions`
--
ALTER TABLE `cs_survey_questions`
  ADD CONSTRAINT `cs_section_questions` FOREIGN KEY (`section_id`) REFERENCES `cs_survey_sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_survey_questions` FOREIGN KEY (`survey_id`) REFERENCES `cs_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_voyage_questions` FOREIGN KEY (`voyage_id`) REFERENCES `cs_voyage` (`voyage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_survey_question_options`
--
ALTER TABLE `cs_survey_question_options`
  ADD CONSTRAINT `cs_question_options` FOREIGN KEY (`question_id`) REFERENCES `cs_survey_questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_section_options` FOREIGN KEY (`section_id`) REFERENCES `cs_survey_sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_survey_options` FOREIGN KEY (`survey_id`) REFERENCES `cs_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_voyage_options` FOREIGN KEY (`voyage_id`) REFERENCES `cs_voyage` (`voyage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cs_survey_sections`
--
ALTER TABLE `cs_survey_sections`
  ADD CONSTRAINT `cs_survey_sections` FOREIGN KEY (`survey_id`) REFERENCES `cs_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_voyage_sections` FOREIGN KEY (`voyage_id`) REFERENCES `cs_voyage` (`voyage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
