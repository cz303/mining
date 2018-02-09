-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2017 at 09:17 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echyip_installer`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `country_id` int(20) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `dial_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country`, `dial_code`) VALUES
(1, 'Afghanistan', '+93'),
(2, 'Albania', '+355'),
(3, 'Algeria', '+213'),
(4, 'American Samoa', '+684'),
(5, 'Andorra', '+376'),
(6, 'Angola', '+244'),
(7, 'Anguilla', '+1-264'),
(8, 'Antarctica', '+672'),
(9, 'Antigua And Barbuda', '+1-268'),
(10, 'Argentina', '+54'),
(11, 'Armenia', '+374'),
(12, 'Aruba', '+297'),
(13, 'Australia', '+61'),
(14, 'Austria', '+43'),
(15, 'Azerbaijan', '+994'),
(16, 'Bahamas', '+1-242'),
(17, 'Bahrain', '+973'),
(18, 'Bangladesh', '+880'),
(19, 'Barbados', '+1-246'),
(20, 'Belarus', '+375'),
(21, 'Belgium', '+32'),
(22, 'Belize', '+501'),
(23, 'Benin', '+229'),
(24, 'Bermuda', '+1-441'),
(25, 'Bhutan', '+975'),
(26, 'Bolivia', '+591'),
(27, 'Bosnia and Herzegovina', '+387'),
(28, 'Botswana', '+267'),
(29, 'Bouvet Island', ''),
(30, 'Brazil', '+55'),
(31, 'British Indian Ocean Territory', ''),
(32, 'Brunei', '+673'),
(33, 'Bulgaria', '+359'),
(34, 'Burkina Faso', '+226'),
(35, 'Burundi', '+257'),
(36, 'Cambodia', '+855'),
(37, 'Cameroon', '+237'),
(38, 'Canada', '+1'),
(39, 'Cape verde', '+238'),
(40, 'Cayman Islands', '+1-345'),
(41, 'Central African Republic', '+236'),
(42, 'Chad', '+235'),
(43, 'Chile', '+56'),
(44, 'China', '+86'),
(45, 'Christmas Island', '+61'),
(46, 'Cocos (keeling) Islands', '+61'),
(47, 'Colombia', '+57'),
(48, 'Comoros', '+269'),
(49, 'Congo', '+242'),
(50, 'Cook Islands', '+682'),
(51, 'Costa Rica', '+506'),
(52, 'Croatia', '+385'),
(53, 'Cuba', '+53'),
(54, 'Cyprus', '+357'),
(55, 'Czech Republic', '+420'),
(56, 'Dem Rep of Congo (Zaire)', '+243'),
(57, 'Denmark', '+45'),
(58, 'Djibouti', '+253'),
(59, 'Dominica', '+1-767'),
(60, 'Dominican Republic', '+1-809'),
(61, 'East Timor', '+670'),
(62, 'Ecuador', '+593'),
(63, 'Egypt', '+20'),
(64, 'El Salvador', '+503'),
(65, 'England', '+689'),
(66, 'Equatorial Guinea', '+240'),
(67, 'Eritrea', '+291'),
(68, 'Estonia', '+372'),
(69, 'Ethiopia', '+251'),
(70, 'Falkland Islands', '+500'),
(71, 'Faroe Islands', '+298'),
(72, 'Fiji', '+679'),
(73, 'Finland', '+358'),
(74, 'France', '+33'),
(75, 'French Guiana', '+594'),
(76, 'French Polynesia', '+689'),
(77, 'French Southern Territories', ''),
(78, 'Gabon', '+241'),
(79, 'Gambia', '+220'),
(80, 'Georgia', '+995'),
(81, 'Germany', '+49'),
(82, 'Ghana', '+233'),
(83, 'Gibraltar', '+350'),
(84, 'Greece', '+30'),
(85, 'Greenland', '+299'),
(86, 'Grenada', '+1-473'),
(87, 'Guadeloupe', '+590'),
(88, 'Guam', '+1-671'),
(89, 'Guatemala', '+502'),
(90, 'Guinea', '+224'),
(91, 'Guinea-Bissau', '+245'),
(92, 'Guyana', '+592'),
(93, 'Haiti', '+509'),
(94, 'Heard and McDonald Islands', ''),
(95, 'Honduras', '+504'),
(96, 'Hungary', '+36'),
(97, 'Iceland', '+354'),
(98, 'India', '+91'),
(99, 'Indonesia', '+62'),
(100, 'Iran', '+98'),
(101, 'Iraq', '+964'),
(102, 'Ireland', '+353'),
(103, 'Israel', '+972'),
(104, 'Italy', '+39'),
(105, 'Ivory Coast', '+225'),
(106, 'Jamaica', '+1-876'),
(107, 'Japan', '+81'),
(108, 'Jordan', '+962'),
(109, 'Kazakhstan', '+7'),
(110, 'Kenya', '+254'),
(111, 'Kiribati', '+686'),
(112, 'Korea', '+850'),
(113, 'Korea (D.P.R.)', '+82'),
(114, 'Kuwait', '+965'),
(115, 'Kyrgyzstan', '+996'),
(116, 'Lao', '+856'),
(117, 'Latvia', '+371'),
(118, 'Lebanon', '+961'),
(119, 'Lesotho', '+266'),
(120, 'Liberia', '+231'),
(121, 'Libya', '+218'),
(122, 'Liechtenstein', '+423'),
(123, 'Lithuania', '+370'),
(124, 'Luxembourg', '+352'),
(125, 'Macedonia', '+389'),
(126, 'Madagascar', '+261'),
(127, 'Malawi', '+265'),
(128, 'Malaysia', '+60'),
(129, 'Maldives', '+960'),
(130, 'Mali', '+223'),
(131, 'Malta', '+356'),
(132, 'Marshall Islands', '+692'),
(133, 'Martinique', '+596'),
(134, 'Mauritania', '+222'),
(135, 'Mauritius', '+230'),
(136, 'Mayotte', '+269'),
(137, 'Mexico', '+52'),
(138, 'Micronesia', '+691'),
(139, 'Moldova', '+373'),
(140, 'Monaco', '+377'),
(141, 'Mongolia', '+976'),
(142, 'Montserrat', '+1-664'),
(143, 'Morocco', '+212'),
(144, 'Mozambique', '+258'),
(145, 'Myanmar', '+95'),
(146, 'Namibia', '+264'),
(147, 'Nauru', '+674'),
(148, 'Nepal', '+977'),
(149, 'Netherlands', '+31'),
(153, 'Nicaragua', '+505'),
(154, 'Niger', '+227'),
(155, 'Nigeria', '+234'),
(156, 'Niue', '+683'),
(157, 'Norfolk Island', '+672'),
(158, 'Northern Mariana Islands', '+1-670'),
(159, 'Norway', '+47'),
(160, 'Oman', '+968'),
(161, 'Other', ''),
(162, 'Pakistan', '+92'),
(163, 'Palau', '+680'),
(164, 'Palestinian Territory, Occupie', '+970'),
(165, 'Panama', '+507'),
(166, 'Papua new Guinea', '+675'),
(167, 'Paraguay', '+595'),
(168, 'Peru', '+51'),
(169, 'Philippines', '+63'),
(170, 'Pitcairn Island', '+872'),
(171, 'Poland', '+48'),
(172, 'Portugal', '+351'),
(173, 'Puerto Rico', '+1-787'),
(174, 'Qatar', '+974'),
(175, 'Reunion', '+262'),
(176, 'Romania', '+40'),
(177, 'Russia', '+998'),
(178, 'Rwanda', '+250'),
(179, 'Saint Kitts And Nevis', '+1-869'),
(180, 'Saint Lucia', '+1-758'),
(181, 'Saint Vincent And The Grenadin', '+1-784'),
(182, 'Samoa', '+685'),
(183, 'San Marino', '+378'),
(184, 'Sao Tome and Principe', '+239'),
(185, 'Saudi Arabia', '+966'),
(186, 'Scotland', '+44'),
(187, 'Senegal', '+221'),
(188, 'Seychelles', '+248'),
(189, 'Sierra Leone', '+232'),
(190, 'Singapore', '+65'),
(191, 'Slovak Republic', '+421'),
(192, 'Slovenia', '+386'),
(193, 'Solomon Islands', '+677'),
(194, 'Somalia', '+252'),
(195, 'South Africa', '+27'),
(196, 'South Georgia, Sth Sandwich Islands', ''),
(197, 'Spain', '+34'),
(198, 'Sri Lanka', '+94'),
(199, 'St Helena', '+290'),
(200, 'St Pierre and Miquelon', '+508'),
(201, 'Sudan', '+249'),
(202, 'Suriname', '+597'),
(203, 'Svalbard And Jan Mayen Islands', ''),
(204, 'Swaziland', '+268'),
(205, 'Sweden', '+46'),
(206, 'Switzerland', '+41'),
(207, 'Syria', '+963'),
(208, 'Taiwan', '+886'),
(209, 'Tikistan', '+992'),
(210, 'Tanzania', '+255'),
(211, 'Thailand', '+66'),
(212, 'Togo', '+228'),
(213, 'Tokelau', '+690'),
(214, 'Tonga', '+676'),
(215, 'Trinidad And Tobago', '+1-868'),
(216, 'Tunisia', '+216'),
(217, 'Turkey', '+90'),
(218, 'Turkmenistan', '+993'),
(219, 'Turks And Caicos Islands', '+1-649'),
(220, 'Tuvalu', '+688'),
(221, 'Uganda', '+256'),
(222, 'Ukraine', '+380'),
(223, 'United Arab Emirates', '+971'),
(224, 'United States', '+1'),
(225, 'Uruguay', '+598'),
(226, 'Uzbekistan', '+998'),
(227, 'Vanuatu', '+678'),
(228, 'Vatican City State (Holy See)', '+39'),
(229, 'Venezuela', '+58'),
(230, 'Vietnam', '+84'),
(231, 'Virgin Islands (British)', '+1'),
(232, 'Virgin Islands (US)', '+1-340'),
(233, 'Wales', '+44'),
(234, 'Wallis And Futuna Islands', '+681'),
(235, 'Western Sahara', '+685'),
(236, 'Yemen', '+967'),
(237, 'Zambia', '+260'),
(238, 'Zimbabwe', '+263');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `plan_id` int(20) DEFAULT NULL,
  `amount` double(30,3) DEFAULT NULL,
  `compound_amount` double(30,3) DEFAULT NULL,
  `invest_date` datetime NOT NULL,
  `maturity_date` date DEFAULT NULL,
  `status` enum('new','active','matured','released') DEFAULT 'new',
  `intrest_alloted` enum('yes','no') DEFAULT 'no',
  `payment_thro` varchar(100) NOT NULL,
  `intrest_earned` double NOT NULL,
  `intrest_earned_date` date NOT NULL,
  `compound_rate` int(30) NOT NULL,
  `transaction_id` text NOT NULL,
  `cron_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `amount` float(10,5) DEFAULT NULL,
  `type` enum('deposit','bonus','penality','earning','withdrawal','commissions','early_deposit_release','early_deposit_charge','release_deposit','add_funds','withdraw_pending','exchange_in','exchange_out','internal_transaction_spend','internal_transaction_receive','intrest_earned','reinvest') DEFAULT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'request_date',
  `payment_thro` varchar(150) NOT NULL DEFAULT '0',
  `no_withdraw` int(4) NOT NULL DEFAULT '0',
  `reference_number` varchar(200) NOT NULL,
  `transaction_id` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `installer`
--

CREATE TABLE `installer` (
  `id` int(1) NOT NULL,
  `installer_flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `installer`
--

INSERT INTO `installer` (`id`, `installer_flag`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(9) UNSIGNED NOT NULL,
  `parent_id` int(9) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `menu_title` varchar(128) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `route_id` int(128) NOT NULL,
  `content` longtext NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `seo_title` text NOT NULL,
  `meta` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `title`, `menu_title`, `slug`, `route_id`, `content`, `sequence`, `seo_title`, `meta`, `url`, `new_window`) VALUES
(1, 0, 'About Us', 'About', 'about-us', 5, '<section class="about_us">\n<div class="container">\n        <div class="row">\n            <div class="col-xs-12 col-sm-10 col-md-offset-1 col-md-10">\n                <h1>About us</h1>\n\n            </div>\n\n            <div class="col-xs-12 col-sm-10 col-md-offset-1 col-md-10">\n                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\n\n            </div>\n\n           \n\n        </div>\n\n    </div>\n	</section>\n	<div class="container-fluid about_invest">\n		<div class="row">\n		<div class="col-xs-12 col-sm-4 col-md-4">\n                <p><img class="img-responsive" src="asset/img/about1.jpg"/></p>\n\n            </div>\n				<div class="col-md-8 col-sm-8">\n					  <div class="onas-list-text">\n						<p class="heading_about">Hashking is developed in two main directions that secure a high margin:</p>\n						<p><strong>A)</strong> Diversification off investment and group lending. If you invest into this direction you should know:</p>\n						<ul>\n						  <li>Investing a small amount, investor has outstanding portfolio consisting of several loans.</li>\n						  <li>Investor may finance a small part of his loan. And as others investor can divide income and risks.</li>\n						</ul>\n						<p>\n						  <strong>B)</strong> Redemption of public debt. Many people know that banks put their problem credit portfolios on a sale. The price from these portfolios is 10-12 per cent of their original cost. By participating in the redemption of such debt the investor’s profits in this direction can range from 50% and more.</p>\n					  </div>\n				</div>\n		</div>\n	</div>', 0, '', '', '', 0),
(2, 0, 'Contact', 'Services', 'contact', 6, '<section class="contact_us">\n<div class="container">\n        <div class="users form row">\n            <form action="" class="col-md-12 col-sm-12 contt" id="UserLoginForm"  method="post" accept-charset="utf-8">\n                <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>\n                <div class="col-md-12 us" align="center">\n                  CONTACT US\n                </div>\n				<div class="error_login">\n				</div>\n            <div class="person">\n			<div class="col-md-6 col-sm-6">\n                <div class="form-group">\n                    <label class="control-label">Full Name</label>\n                    <input type="text" name="name" required="true" class="form-control person" placeholder="Full Name">                        \n                </div>            \n                <div class="form-group">\n                    <label class="control-label">Email</label>                \n                    <input type="email" required="true" class="form-control person" value="" name="email" placeholder="Email">                           \n                </div>\n                <div class="form-group">\n                    <label class="control-label">Phone</label>                \n                    <input type="tel" required="true" class="form-control person" name="" placeholder="Phone">                \n                </div>\n				</div>\n				<div class="col-md-6 col-sm-6">\n                <div class="form-group">\n                    <label class="control-label">Message </label>            \n                   <textarea class="form-control" rows="6"></textarea>\n                </div>\n                        <button class="btn  btn-theme col-xs-4" id="loginBtn" type="submit">Submit</button> \n				</div>\n            </div>        \n        \n               \n                </form></div>\n            \n        </div>\n   \n	</section>', 0, 'Services', 'Services', '', 0),
(3, 0, 'how it work', 'how it work', 'how-it-work', 7, '<section class="workhow">\n<div class="container">\n<div class="row">\n    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" align="center">\n        <h1>How it Works</h1>\n\n    </div>\n\n    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">\n        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>\n\n    </div>\n\n</div>\n\n</div>\n\n</section>\n<section class="how_work">\n\n<div class="container">\n	<div class="row">\n		<div class="col-md-4 col-sm-4" align="center">\n			<img src="asset/img/demo.png" width="120px">\n		</div>\n\n		<div class="col-md-7 col-sm-7">\n		   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>\n\n		</div>\n\n		</div>\n\n		\n		<div class="row">\n		<div class="col-md-4 col-sm-4" align="center">\n			<img src="asset/img/demo.png" width="120px">\n		</div>\n\n		<div class="col-md-7 col-sm-7">\n		   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>\n\n		</div>\n\n		</div>\n\n			<div class="row">\n		<div class="col-md-4 col-sm-4" align="center">\n			<img src="asset/img/demo.png" width="120px">\n		</div>\n\n		<div class="col-md-7 col-sm-7">\n		   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>\n\n		</div>\n\n		</div>\n\n	\n</div>\n\n</section>\n<section class="workhow">\n<div class="container">\n<div class="row">\n  <div class="col-md-12" align="center">\n  <h1>Lorem Ipsum</h1>\n\n  </div>\n\n    <div class="col-xs-12 col-sm-6">\n        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\n\n    </div>\n\n	  <div class="col-xs-12 col-sm-6">\n     <iframe width="100%" height="200" src="https://www.youtube.com/embed/yAoLSRbwxL8" frameborder="0" allowfullscreen=""></iframe>\n    </div>\n\n</div>\n\n</div>\n\n</section>', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(9) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `route` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `slug`, `route`) VALUES
(1, 'about-us', 'cart/page/1'),
(2, 'contact', 'cart/page/2'),
(3, 'how-it-work', 'cart/page/3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_details`
--

CREATE TABLE `tbl_account_details` (
  `account_details_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'en_US',
  `address` varchar(64) COLLATE utf8_unicode_ci DEFAULT '-',
  `phone` varchar(32) COLLATE utf8_unicode_ci DEFAULT '-',
  `mobile` varchar(32) COLLATE utf8_unicode_ci DEFAULT '',
  `skype` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `language` varchar(40) COLLATE utf8_unicode_ci DEFAULT 'english',
  `departments_id` int(11) DEFAULT '0',
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'uploads/default_avatar.jpg',
  `intro_id` int(20) DEFAULT NULL,
  `address1` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ccode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_join` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `account_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `ip_address` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('new','active','suspended','duplicate') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `verification_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `verified` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `ip_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `new_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lr_num` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `payza_num` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ego_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_num` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `gdb_num` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `st_pay` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `paypal` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bitcoin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eth` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `dashcoin` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `Litcoin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `payeer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `neteller` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `neteller_key` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `skrill` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accnum` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bank_branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `liberty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payza` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_wire` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `refer_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `onlinestatus` int(2) NOT NULL,
  `nametitle` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `suspend_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cron_date` datetime NOT NULL,
  `last_asscess_ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `current_asscess_ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `current_login_time` datetime NOT NULL,
  `last_login_time` datetime NOT NULL,
  `advcash` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `perfect_money` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ltc` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_account_details`
--

INSERT INTO `tbl_account_details` (`account_details_id`, `user_id`, `fullname`, `company`, `city`, `country`, `locale`, `address`, `phone`, `mobile`, `skype`, `language`, `departments_id`, `avatar`, `intro_id`, `address1`, `address2`, `state`, `zipcode`, `ccode`, `date_of_join`, `account_no`, `payment_method`, `lastname`, `gender`, `dob`, `ip_address`, `status`, `verification_code`, `verified`, `ip_code`, `new_ip`, `lr_num`, `payza_num`, `ego_num`, `pm_num`, `gdb_num`, `st_pay`, `paypal`, `bitcoin`, `eth`, `dashcoin`, `Litcoin`, `payeer`, `neteller`, `neteller_key`, `skrill`, `first_name`, `last_name`, `zip_code`, `bank_name`, `accnum`, `bank_branch`, `bank_code`, `question`, `answer`, `street`, `liberty`, `payza`, `bank_wire`, `refer_id`, `onlinestatus`, `nametitle`, `suspend_time`, `cron_date`, `last_asscess_ip`, `current_asscess_ip`, `current_login_time`, `last_login_time`, `advcash`, `perfect_money`, `ltc`) VALUES
(1, 1, 'admin', NULL, NULL, NULL, 'en_US', '-', '-', '', '', 'english', 0, 'uploads/default_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '', '2017-10-15 02:45:03', NULL, 0, NULL, '', '0000-00-00', NULL, 'new', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(4, 2, 'user', '1', NULL, '', 'en_US', '-', '-', '', '', 'english', 0, 'uploads/default_avatar.jpg', 0, NULL, NULL, '', NULL, '', '2017-10-15 06:41:30', NULL, 0, NULL, '', '0000-00-00', '::1', 'new', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123456', '123456', '', '', '', '', 'OJJH5K4534B0', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `activities_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `module` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_field_id` int(11) DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'fa-coffee',
  `value1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`activities_id`, `user`, `module`, `module_field_id`, `activity`, `activity_date`, `icon`, `value1`, `value2`, `deleted`) VALUES
(1, 1, 'user', 2, 'activity_change_status', '2017-10-15 06:42:06', 'fa-user', '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_id` int(11) NOT NULL,
  `primary_contact` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_note` text COLLATE utf8_unicode_ci,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `currency` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'USD',
  `skype_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hosting_company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hostname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_status` tinyint(1) NOT NULL COMMENT '1 = person and 2 = company',
  `profile_photo` text COLLATE utf8_unicode_ci,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`client_id`, `primary_contact`, `name`, `email`, `short_note`, `website`, `phone`, `mobile`, `fax`, `address`, `city`, `zipcode`, `currency`, `skype_id`, `linkedin`, `facebook`, `twitter`, `language`, `country`, `vat`, `hosting_company`, `hostname`, `port`, `password`, `username`, `client_status`, `profile_photo`, `date_added`) VALUES
(1, 0, 'user', 'user@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2017-10-15 06:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `config_key` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`config_key`, `value`) VALUES
('accounting_snapshot', '1'),
('advcash_api_name', ''),
('advcash_api_password', ''),
('advcash_email', ''),
('advcash_sci_batch_key', ''),
('advcash_sci_name', ''),
('advcash_status', '0'),
('advcash_withdraw_email', ''),
('allowed_files', 'gif|png|jpeg|jpg|pdf|doc|txt|docx|xls|zip|rar|xls|mp4'),
('allow_client_registration', 'TRUE'),
('authorize', 'login id'),
('authorize_status', 'active'),
('authorize_transaction_key', 'transfer key'),
('automatic_email_on_recur', 'TRUE'),
('bitcoin_comments', ''),
('bitcoin_merchant_id', ''),
('bitcoin_private_key', ''),
('bitcoin_public_key', ''),
('bitcoin_selectmode', '1'),
('bitcoin_status', '1'),
('bitcoin_title', 'Bitcoin'),
('btc_code', '0'),
('build', '0'),
('captcha_in_contact', '1'),
('captcha_in_login', '1'),
('captcha_in_reg', '1'),
('coin', 'BTC'),
('coin_payments_ipn_key', ''),
('coin_payments_status', '0'),
('company_address', ''),
('company_city', 'Mohali'),
('company_country', ''),
('company_domain', ''),
('company_email', 'info@ecovesolutions.com'),
('company_legal_name', ''),
('company_logo', ''),
('company_name', 'Ecove solutions'),
('company_phone', ''),
('company_phone_2', ''),
('company_start', '2017-10-15'),
('company_vat', ''),
('company_zip_code', ''),
('contact_person', ''),
('country', '0'),
('country_in_reg', '0'),
('cron_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('date_format', '%d-%m-%Y'),
('date_php_format', 'd-m-Y'),
('date_picker_format', 'dd-mm-yyyy'),
('decimal_separator', '0'),
('default_currency', 'USD'),
('default_currency_symbol', '$'),
('default_language', 'english'),
('default_tax', '0.00'),
('default_terms', 'Thank you for <span style="font-weight: bold;">your</span> business. Please process this invoice within the due date.'),
('demo_mode', 'FALSE'),
('developer', 'ig63Yd/+yuA8127gEyTz9TY4pnoeKq8dtocVP44+BJvtlRp8Vqcetwjk51dhSB6Rx8aVIKOPfUmNyKGWK7C/gg=='),
('display_estimate_badge', '0'),
('display_invoice_badge', 'FALSE'),
('email_account_details', 'TRUE'),
('email_estimate_message', 'Hi {CLIENT}<br>Thanks for your business inquiry. <br>The estimate EST {REF} is attached with this email. <br>Estimate Overview:<br>Estimate # : EST {REF}<br>Amount: {CURRENCY} {AMOUNT}<br> You can view the estimate online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}'),
('email_invoice_message', 'Hello {CLIENT}<br>Here is the invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}'),
('email_staff_tickets', 'TRUE'),
('enable_languages', 'FALSE'),
('estimate_color', '0'),
('estimate_language', 'en'),
('estimate_prefix', 'EST'),
('estimate_terms', 'Hey Looking forward to doing business with you.'),
('facebook_link', ''),
('file_max_size', '80000'),
('gcal_api_key', ''),
('gcal_id', ''),
('instagram_link', ''),
('installed', 'TRUE'),
('language', 'english'),
('last_check', '1436363002'),
('last_seen_activities', '0'),
('lisence_key', ''),
('locale', 'en_US'),
('login_bg', 'bg-login.jpg'),
('logofile', '0'),
('payeer_account', ''),
('payeer_api_secret', ''),
('payeer_api_user', ''),
('payeer_shop_id', ''),
('payeer_shop_secret_key', ''),
('payeer_status', '0'),
('pdf_engine', 'invoicr'),
('perfect_money_account_id', ''),
('perfect_money_member_id', ''),
('perfect_money_phrase_hash', ''),
('perfect_money_status', '0'),
('postmark_api_key', ''),
('postmark_from_address', ''),
('project_prefix', 'PRO'),
('protocol', 'mail'),
('purchase_code', ''),
('recurring_invoice', '1'),
('ref_level_1', '0.05'),
('ref_level_2', '0.05'),
('ref_level_3', '0.03'),
('ref_level_4', '.01'),
('ref_level_5', '.01'),
('reminder_message', 'Hello {CLIENT}<br>This is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}'),
('reset_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('routing_transfer_number', 'Routing Transfer Number (or) SWIFT Code (BIC)'),
('rows_per_table', '25'),
('security_token', '5027133599'),
('settings', 'theme'),
('show_estimate_tax', 'on'),
('show_invoice_tax', 'TRUE'),
('show_item_tax', '0'),
('show_login_image', 'TRUE'),
('show_only_logo', 'FALSE'),
('sidebar_theme', 'yellowgreen'),
('site_appleicon', 'logo.png'),
('site_author', 'William M.'),
('site_desc', 'Freelancer Office is a Web based PHP application for Freelancers - buy it on Codecanyon'),
('site_favicon', 'logo.png'),
('site_icon', 'fa-flask'),
('system_font', 'roboto_condensed'),
('thousand_separator', ','),
('timezone', 'Asia/Kolkata'),
('twitter_link', ''),
('use_gravatar', 'TRUE'),
('use_postmark', 'FALSE'),
('valid_license', 'TRUE'),
('webmaster_email', 'support@example.com'),
('website_name', 'Echyip.com'),
('withdraw_allow_month', '5'),
('withdraw_commission', '5'),
('withdraw_maximum', '300'),
('withdraw_minimum', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(6) NOT NULL,
  `value` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `value`) VALUES
(1, 'Afghanistan'),
(2, 'Aringland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo'),
(52, ' Democratic Republic'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Ivory Coast (Ivory Coast)'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea (north)'),
(115, 'Korea (south)'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People''s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territories'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Runion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and the Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and the South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen Islands'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syria'),
(210, 'Taiwan'),
(211, 'Tajikistan'),
(212, 'Tanzania'),
(213, 'Thailand'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Vatican City'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (US)'),
(236, 'Wallis and Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currencies`
--

CREATE TABLE `tbl_currencies` (
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrate` decimal(12,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_currencies`
--

INSERT INTO `tbl_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES
('AUD', 'Australian Dollar', '$', NULL),
('BRL', 'Brazilian Real', 'R$', NULL),
('CAD', 'Canadian Dollar', '$', NULL),
('CHF', 'Swiss Franc', 'Fr', NULL),
('CLP', 'Chilean Peso', '$', NULL),
('CNY', 'Chinese Yuan', '?', NULL),
('CZK', 'Czech Koruna', 'K??', NULL),
('DKK', 'Danish Krone', 'kr', NULL),
('EUR', 'Euro', '?', NULL),
('GBP', 'British Pound', '?', NULL),
('HKD', 'Hong Kong Dollar', '$', NULL),
('HUF', 'Hungarian Forint', 'Ft', NULL),
('IDR', 'Indonesian Rupiah', 'Rp', NULL),
('ILS', 'Israeli New Shekel', '?', NULL),
('INR', 'Indian Rupee', 'INR', NULL),
('JPY', 'Japanese Yen', '?', NULL),
('KRW', 'Korean Won', '?', NULL),
('MXN', 'Mexican Peso', '$', NULL),
('MYR', 'Malaysian Ringgit', 'RM', NULL),
('NOK', 'Norwegian Krone', 'kr', NULL),
('NZD', 'New Zealand Dollar', '$', NULL),
('PHP', 'Philippine Peso', '?', NULL),
('PKR', 'Pakistan Rupee', '?', NULL),
('PLN', 'Polish Zloty', 'zl', NULL),
('RUB', 'Russian Ruble', '?', NULL),
('SEK', 'Swedish Krona', 'kr', NULL),
('SGD', 'Singapore Dollar', '$', NULL),
('THB', 'Thai Baht', '?', NULL),
('TRY', 'Turkish Lira', '?', NULL),
('TWD', 'Taiwan Dollar', '$', NULL),
('USD', 'US Dollar', '$', '1.00000'),
('VEF', 'Bol?var Fuerte', 'Bs.', NULL),
('ZAR', 'South African Rand', 'R', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `departments_id` int(10) NOT NULL,
  `deptname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`departments_id`, `deptname`) VALUES
(1, 'Enquiry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_templates`
--

CREATE TABLE `tbl_email_templates` (
  `email_templates_id` int(11) NOT NULL,
  `email_group` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template_body` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_email_templates`
--

INSERT INTO `tbl_email_templates` (`email_templates_id`, `email_group`, `subject`, `template_body`) VALUES
(1, 'registration', 'Registration successful', '<div style="height: 7px; background-color: #535353;"></div><div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">Welcome to {SITE_NAME}</div><div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;">Thanks for joining {SITE_NAME}. We listed your sign in details below, make sure you keep them safe.<br>To open your {SITE_NAME} homepage, please follow this link:<br><big><b><a href="{SITE_URL}">{SITE_NAME} Account!</a></b></big><br>Link doesn''t work? Copy the following link to your browser address bar:<br><a href="{SITE_URL}">{SITE_URL}</a><br>Your username: {USERNAME}<br>Your email address: {EMAIL}<br>Your password: {PASSWORD}<br>Have fun!<br>The {SITE_NAME} Team.<br><br></div></div>'),
(2, 'forgot_password', 'Forgot Password', '        <div style="height: 7px; background-color: #535353;"></div><div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">New Password</div><div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;">Forgot your password, huh? No big deal.<br>To create a new password, just follow this link:<br><br><big><b><a href="{PASS_KEY_URL}">Create a new password</a></b></big><br>Link doesn''t work? Copy the following link to your browser address bar:<br><a href="{PASS_KEY_URL}">{PASS_KEY_URL}</a><br><br><br>You received this email, because it was requested by a <a href="{SITE_URL}">{SITE_NAME}</a> user. <p></p><p>This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.</p><br>Thank you,<br>The {SITE_NAME} Team</div></div>'),
(3, 'change_email', 'Change Email', '<div style="height: 7px; background-color: #535353;"></div>\r\n<div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">New email address on {SITE_NAME}</div>\r\n\r\n<div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;">You have changed your email address for {SITE_NAME}.<br>Follow this link to confirm your new email address:<br><big><b><a href="{NEW_EMAIL_KEY_URL}">Confirm your new email</a></b></big><br>Link doesn''t work? Copy the following link to your browser address bar:<br><a href="{NEW_EMAIL_KEY_URL}">{NEW_EMAIL_KEY_URL}</a><br><br>Your email address: {NEW_EMAIL}<br><br>You received this email, because it was requested by a <a href="{SITE_URL}">{SITE_NAME}</a> user. If you have received this by mistake, please DO NOT click the confirmation link, and simply delete this email. After a short time, the request will be removed from the system.<br>Thank you,<br>The {SITE_NAME} Team</div>\r\n\r\n</div>'),
(4, 'activate_account', 'Activate Account', '<p>Welcome to {SITE_NAME}!</p>\r\n\r\n<p>Thanks for joining {SITE_NAME}. We listed your sign in details below, make sure you keep them safe.</p>\r\n\r\n<p>To verify your email address, please follow this link:<br />\r\n<big><strong><a href="{ACTIVATE_URL}">Finish your registration...</a></strong></big><br />\r\nLink doesn&#39;t work? Copy the following link to your browser address bar:<br />\r\n<a href="{ACTIVATE_URL}">{ACTIVATE_URL}</a></p>\r\n\r\n<p><br />\r\n<br />\r\nPlease verify your email within {ACTIVATION_PERIOD} hours, otherwise your registration will become invalid and you will have to register again.<br />\r\n<br />\r\n<br />\r\nYour username: {USERNAME}<br />\r\nYour email address: {EMAIL}<br />\r\nYour password: {PASSWORD}<br />\r\n<br />\r\nHave fun!<br />\r\nThe {SITE_NAME} Team</p>\r\n'),
(5, 'reset_password', 'Reset Password', '<div style="height: 7px; background-color: #535353;"></div>\r\n<div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">New password on {SITE_NAME}</div>\r\n<div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;"><p>You have changed your password.<br>Please, keep it in your records so you don''t forget it.<br></p>\r\nYour username: {USERNAME}<br>Your email address: {EMAIL}<br>Your new password: {NEW_PASSWORD}<br><br>Thank you,<br>The {SITE_NAME} Team</div>\r\n</div>'),
(6, 'contact_email', 'A user has contact for you his query', '<p>Hello Admin</p>\r\n\r\n<p>There is query from user at&nbsp;{SITE_NAME}.&nbsp;</p>\r\n\r\n<p>Below are the detail of user and about his comment:&nbsp;<br />\r\nEmail: {EMAIL}<br />\r\nSubject : {SUBJECT}<br />\r\nMessage: {MESSAGE}</p>\r\n\r\n<p><br />\r\nHave fun!<br />\r\nThe {SITE_NAME} Team.</p>\r\n'),
(7, 'withdraw_email_to_admin', 'A user has sent a withdrawal request of amount ${AMOUNT}.', '<p>Hello Admin</p>\r\n\r\n<p>A user has sent a withdrawal request at&nbsp;{SITE_NAME}.&nbsp;</p>\r\n\r\n<p>Below are the detail of withdrawal request:&nbsp;<br />\r\nUser: {USER}<br />\r\nRequest Date: {REQUEST_DATE}<br />\r\nAmount: $ {AMOUNT}<br />\r\nComment: {COMMENT}</p>\r\n\r\n<p><br />\r\nRegards!<br />\r\nThe {SITE_NAME} Team.</p>\r\n'),
(8, 'withdraw_email_to_user', 'Admin has approved your withdrawal request of amount ${AMOUNT}.', '<p>Hi {USERNAME}</p>\n\n<p>Admin has approved your withdrawal request at&nbsp;{SITE_NAME}.&nbsp; of amount ${AMOUNT}</p>\n\n\n<p><br />\nRegards!<br />\nThe {SITE_NAME} Team.</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE `tbl_languages` (
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`code`, `name`, `icon`, `active`) VALUES
('en', 'english', 'us', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locales`
--

CREATE TABLE `tbl_locales` (
  `locale` varchar(10) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_locales`
--

INSERT INTO `tbl_locales` (`locale`, `code`, `language`, `name`) VALUES
('aa_DJ', 'aa', 'afar', 'Afar (Djibouti)'),
('aa_ER', 'aa', 'afar', 'Afar (Eritrea)'),
('aa_ET', 'aa', 'afar', 'Afar (Ethiopia)'),
('af_ZA', 'af', 'afrikaans', 'Afrikaans (South Africa)'),
('am_ET', 'am', 'amharic', 'Amharic (Ethiopia)'),
('an_ES', 'an', 'aragonese', 'Aragonese (Spain)'),
('ar_AE', 'ar', 'arabic', 'Arabic (United Arab Emirates)'),
('ar_BH', 'ar', 'arabic', 'Arabic (Bahrain)'),
('ar_DZ', 'ar', 'arabic', 'Arabic (Algeria)'),
('ar_EG', 'ar', 'arabic', 'Arabic (Egypt)'),
('ar_IN', 'ar', 'arabic', 'Arabic (India)'),
('ar_IQ', 'ar', 'arabic', 'Arabic (Iraq)'),
('ar_JO', 'ar', 'arabic', 'Arabic (Jordan)'),
('ar_KW', 'ar', 'arabic', 'Arabic (Kuwait)'),
('ar_LB', 'ar', 'arabic', 'Arabic (Lebanon)'),
('ar_LY', 'ar', 'arabic', 'Arabic (Libya)'),
('ar_MA', 'ar', 'arabic', 'Arabic (Morocco)'),
('ar_OM', 'ar', 'arabic', 'Arabic (Oman)'),
('ar_QA', 'ar', 'arabic', 'Arabic (Qatar)'),
('ar_SA', 'ar', 'arabic', 'Arabic (Saudi Arabia)'),
('ar_SD', 'ar', 'arabic', 'Arabic (Sudan)'),
('ar_SY', 'ar', 'arabic', 'Arabic (Syria)'),
('ar_TN', 'ar', 'arabic', 'Arabic (Tunisia)'),
('ar_YE', 'ar', 'arabic', 'Arabic (Yemen)'),
('ast_ES', 'ast', 'asturian', 'Asturian (Spain)'),
('as_IN', 'as', 'assamese', 'Assamese (India)'),
('az_AZ', 'az', 'azerbaijani', 'Azerbaijani (Azerbaijan)'),
('az_TR', 'az', 'azerbaijani', 'Azerbaijani (Turkey)'),
('bem_ZM', 'bem', 'bemba', 'Bemba (Zambia)'),
('ber_DZ', 'ber', 'berber', 'Berber (Algeria)'),
('ber_MA', 'ber', 'berber', 'Berber (Morocco)'),
('be_BY', 'be', 'belarusian', 'Belarusian (Belarus)'),
('bg_BG', 'bg', 'bulgarian', 'Bulgarian (Bulgaria)'),
('bn_BD', 'bn', 'bengali', 'Bengali (Bangladesh)'),
('bn_IN', 'bn', 'bengali', 'Bengali (India)'),
('bo_CN', 'bo', 'tibetan', 'Tibetan (China)'),
('bo_IN', 'bo', 'tibetan', 'Tibetan (India)'),
('br_FR', 'br', 'breton', 'Breton (France)'),
('bs_BA', 'bs', 'bosnian', 'Bosnian (Bosnia and Herzegovina)'),
('byn_ER', 'byn', 'blin', 'Blin (Eritrea)'),
('ca_AD', 'ca', 'catalan', 'Catalan (Andorra)'),
('ca_ES', 'ca', 'catalan', 'Catalan (Spain)'),
('ca_FR', 'ca', 'catalan', 'Catalan (France)'),
('ca_IT', 'ca', 'catalan', 'Catalan (Italy)'),
('crh_UA', 'crh', 'crimean turkish', 'Crimean Turkish (Ukraine)'),
('csb_PL', 'csb', 'kashubian', 'Kashubian (Poland)'),
('cs_CZ', 'cs', 'czech', 'Czech (Czech Republic)'),
('cv_RU', 'cv', 'chuvash', 'Chuvash (Russia)'),
('cy_GB', 'cy', 'welsh', 'Welsh (United Kingdom)'),
('da_DK', 'da', 'danish', 'Danish (Denmark)'),
('de_AT', 'de', 'german', 'German (Austria)'),
('de_BE', 'de', 'german', 'German (Belgium)'),
('de_CH', 'de', 'german', 'German (Switzerland)'),
('de_DE', 'de', 'german', 'German (Germany)'),
('de_LI', 'de', 'german', 'German (Liechtenstein)'),
('de_LU', 'de', 'german', 'German (Luxembourg)'),
('dv_MV', 'dv', 'divehi', 'Divehi (Maldives)'),
('dz_BT', 'dz', 'dzongkha', 'Dzongkha (Bhutan)'),
('ee_GH', 'ee', 'ewe', 'Ewe (Ghana)'),
('el_CY', 'el', 'greek', 'Greek (Cyprus)'),
('el_GR', 'el', 'greek', 'Greek (Greece)'),
('en_AG', 'en', 'english', 'English (Antigua and Barbuda)'),
('en_AS', 'en', 'english', 'English (American Samoa)'),
('en_AU', 'en', 'english', 'English (Australia)'),
('en_BW', 'en', 'english', 'English (Botswana)'),
('en_CA', 'en', 'english', 'English (Canada)'),
('en_DK', 'en', 'english', 'English (Denmark)'),
('en_GB', 'en', 'english', 'English (United Kingdom)'),
('en_GU', 'en', 'english', 'English (Guam)'),
('en_HK', 'en', 'english', 'English (Hong Kong SAR China)'),
('en_IE', 'en', 'english', 'English (Ireland)'),
('en_IN', 'en', 'english', 'English (India)'),
('en_JM', 'en', 'english', 'English (Jamaica)'),
('en_MH', 'en', 'english', 'English (Marshall Islands)'),
('en_MP', 'en', 'english', 'English (Northern Mariana Islands)'),
('en_MU', 'en', 'english', 'English (Mauritius)'),
('en_NG', 'en', 'english', 'English (Nigeria)'),
('en_NZ', 'en', 'english', 'English (New Zealand)'),
('en_PH', 'en', 'english', 'English (Philippines)'),
('en_SG', 'en', 'english', 'English (Singapore)'),
('en_TT', 'en', 'english', 'English (Trinidad and Tobago)'),
('en_US', 'en', 'english', 'English (United States)'),
('en_VI', 'en', 'english', 'English (Virgin Islands)'),
('en_ZA', 'en', 'english', 'English (South Africa)'),
('en_ZM', 'en', 'english', 'English (Zambia)'),
('en_ZW', 'en', 'english', 'English (Zimbabwe)'),
('eo', 'eo', 'esperanto', 'Esperanto'),
('es_AR', 'es', 'spanish', 'Spanish (Argentina)'),
('es_BO', 'es', 'spanish', 'Spanish (Bolivia)'),
('es_CL', 'es', 'spanish', 'Spanish (Chile)'),
('es_CO', 'es', 'spanish', 'Spanish (Colombia)'),
('es_CR', 'es', 'spanish', 'Spanish (Costa Rica)'),
('es_DO', 'es', 'spanish', 'Spanish (Dominican Republic)'),
('es_EC', 'es', 'spanish', 'Spanish (Ecuador)'),
('es_ES', 'es', 'spanish', 'Spanish (Spain)'),
('es_GT', 'es', 'spanish', 'Spanish (Guatemala)'),
('es_HN', 'es', 'spanish', 'Spanish (Honduras)'),
('es_MX', 'es', 'spanish', 'Spanish (Mexico)'),
('es_NI', 'es', 'spanish', 'Spanish (Nicaragua)'),
('es_PA', 'es', 'spanish', 'Spanish (Panama)'),
('es_PE', 'es', 'spanish', 'Spanish (Peru)'),
('es_PR', 'es', 'spanish', 'Spanish (Puerto Rico)'),
('es_PY', 'es', 'spanish', 'Spanish (Paraguay)'),
('es_SV', 'es', 'spanish', 'Spanish (El Salvador)'),
('es_US', 'es', 'spanish', 'Spanish (United States)'),
('es_UY', 'es', 'spanish', 'Spanish (Uruguay)'),
('es_VE', 'es', 'spanish', 'Spanish (Venezuela)'),
('et_EE', 'et', 'estonian', 'Estonian (Estonia)'),
('eu_ES', 'eu', 'basque', 'Basque (Spain)'),
('eu_FR', 'eu', 'basque', 'Basque (France)'),
('fa_AF', 'fa', 'persian', 'Persian (Afghanistan)'),
('fa_IR', 'fa', 'persian', 'Persian (Iran)'),
('ff_SN', 'ff', 'fulah', 'Fulah (Senegal)'),
('fil_PH', 'fil', 'filipino', 'Filipino (Philippines)'),
('fi_FI', 'fi', 'finnish', 'Finnish (Finland)'),
('fo_FO', 'fo', 'faroese', 'Faroese (Faroe Islands)'),
('fr_BE', 'fr', 'french', 'French (Belgium)'),
('fr_BF', 'fr', 'french', 'French (Burkina Faso)'),
('fr_BI', 'fr', 'french', 'French (Burundi)'),
('fr_BJ', 'fr', 'french', 'French (Benin)'),
('fr_CA', 'fr', 'french', 'French (Canada)'),
('fr_CF', 'fr', 'french', 'French (Central African Republic)'),
('fr_CG', 'fr', 'french', 'French (Congo)'),
('fr_CH', 'fr', 'french', 'French (Switzerland)'),
('fr_CM', 'fr', 'french', 'French (Cameroon)'),
('fr_FR', 'fr', 'french', 'French (France)'),
('fr_GA', 'fr', 'french', 'French (Gabon)'),
('fr_GN', 'fr', 'french', 'French (Guinea)'),
('fr_GP', 'fr', 'french', 'French (Guadeloupe)'),
('fr_GQ', 'fr', 'french', 'French (Equatorial Guinea)'),
('fr_KM', 'fr', 'french', 'French (Comoros)'),
('fr_LU', 'fr', 'french', 'French (Luxembourg)'),
('fr_MC', 'fr', 'french', 'French (Monaco)'),
('fr_MG', 'fr', 'french', 'French (Madagascar)'),
('fr_ML', 'fr', 'french', 'French (Mali)'),
('fr_MQ', 'fr', 'french', 'French (Martinique)'),
('fr_NE', 'fr', 'french', 'French (Niger)'),
('fr_SN', 'fr', 'french', 'French (Senegal)'),
('fr_TD', 'fr', 'french', 'French (Chad)'),
('fr_TG', 'fr', 'french', 'French (Togo)'),
('fur_IT', 'fur', 'friulian', 'Friulian (Italy)'),
('fy_DE', 'fy', 'western frisian', 'Western Frisian (Germany)'),
('fy_NL', 'fy', 'western frisian', 'Western Frisian (Netherlands)'),
('ga_IE', 'ga', 'irish', 'Irish (Ireland)'),
('gd_GB', 'gd', 'scottish gaelic', 'Scottish Gaelic (United Kingdom)'),
('gez_ER', 'gez', 'geez', 'Geez (Eritrea)'),
('gez_ET', 'gez', 'geez', 'Geez (Ethiopia)'),
('gl_ES', 'gl', 'galician', 'Galician (Spain)'),
('gu_IN', 'gu', 'gujarati', 'Gujarati (India)'),
('gv_GB', 'gv', 'manx', 'Manx (United Kingdom)'),
('ha_NG', 'ha', 'hausa', 'Hausa (Nigeria)'),
('he_IL', 'he', 'hebrew', 'Hebrew (Israel)'),
('hi_IN', 'hi', 'hindi', 'Hindi (India)'),
('hr_HR', 'hr', 'croatian', 'Croatian (Croatia)'),
('hsb_DE', 'hsb', 'upper sorbian', 'Upper Sorbian (Germany)'),
('ht_HT', 'ht', 'haitian', 'Haitian (Haiti)'),
('hu_HU', 'hu', 'hungarian', 'Hungarian (Hungary)'),
('hy_AM', 'hy', 'armenian', 'Armenian (Armenia)'),
('ia', 'ia', 'interlingua', 'Interlingua'),
('id_ID', 'id', 'indonesian', 'Indonesian (Indonesia)'),
('ig_NG', 'ig', 'igbo', 'Igbo (Nigeria)'),
('ik_CA', 'ik', 'inupiaq', 'Inupiaq (Canada)'),
('is_IS', 'is', 'icelandic', 'Icelandic (Iceland)'),
('it_CH', 'it', 'italian', 'Italian (Switzerland)'),
('it_IT', 'it', 'italian', 'Italian (Italy)'),
('iu_CA', 'iu', 'inuktitut', 'Inuktitut (Canada)'),
('ja_JP', 'ja', 'japanese', 'Japanese (Japan)'),
('ka_GE', 'ka', 'georgian', 'Georgian (Georgia)'),
('kk_KZ', 'kk', 'kazakh', 'Kazakh (Kazakhstan)'),
('kl_GL', 'kl', 'kalaallisut', 'Kalaallisut (Greenland)'),
('km_KH', 'km', 'khmer', 'Khmer (Cambodia)'),
('kn_IN', 'kn', 'kannada', 'Kannada (India)'),
('kok_IN', 'kok', 'konkani', 'Konkani (India)'),
('ko_KR', 'ko', 'korean', 'Korean (South Korea)'),
('ks_IN', 'ks', 'kashmiri', 'Kashmiri (India)'),
('ku_TR', 'ku', 'kurdish', 'Kurdish (Turkey)'),
('kw_GB', 'kw', 'cornish', 'Cornish (United Kingdom)'),
('ky_KG', 'ky', 'kirghiz', 'Kirghiz (Kyrgyzstan)'),
('lg_UG', 'lg', 'ganda', 'Ganda (Uganda)'),
('li_BE', 'li', 'limburgish', 'Limburgish (Belgium)'),
('li_NL', 'li', 'limburgish', 'Limburgish (Netherlands)'),
('lo_LA', 'lo', 'lao', 'Lao (Laos)'),
('lt_LT', 'lt', 'lithuanian', 'Lithuanian (Lithuania)'),
('lv_LV', 'lv', 'latvian', 'Latvian (Latvia)'),
('mai_IN', 'mai', 'maithili', 'Maithili (India)'),
('mg_MG', 'mg', 'malagasy', 'Malagasy (Madagascar)'),
('mi_NZ', 'mi', 'maori', 'Maori (New Zealand)'),
('mk_MK', 'mk', 'macedonian', 'Macedonian (Macedonia)'),
('ml_IN', 'ml', 'malayalam', 'Malayalam (India)'),
('mn_MN', 'mn', 'mongolian', 'Mongolian (Mongolia)'),
('mr_IN', 'mr', 'marathi', 'Marathi (India)'),
('ms_BN', 'ms', 'malay', 'Malay (Brunei)'),
('ms_MY', 'ms', 'malay', 'Malay (Malaysia)'),
('mt_MT', 'mt', 'maltese', 'Maltese (Malta)'),
('my_MM', 'my', 'burmese', 'Burmese (Myanmar)'),
('naq_NA', 'naq', 'namibia', 'Namibia'),
('nb_NO', 'nb', 'norwegian bokm?l', 'Norwegian Bokm?l (Norway)'),
('nds_DE', 'nds', 'low german', 'Low German (Germany)'),
('nds_NL', 'nds', 'low german', 'Low German (Netherlands)'),
('ne_NP', 'ne', 'nepali', 'Nepali (Nepal)'),
('nl_AW', 'nl', 'dutch', 'Dutch (Aruba)'),
('nl_BE', 'nl', 'dutch', 'Dutch (Belgium)'),
('nl_NL', 'nl', 'dutch', 'Dutch (Netherlands)'),
('nn_NO', 'nn', 'norwegian nynorsk', 'Norwegian Nynorsk (Norway)'),
('no_NO', 'no', 'norwegian', 'Norwegian (Norway)'),
('nr_ZA', 'nr', 'south ndebele', 'South Ndebele (South Africa)'),
('nso_ZA', 'nso', 'northern sotho', 'Northern Sotho (South Africa)'),
('oc_FR', 'oc', 'occitan', 'Occitan (France)'),
('om_ET', 'om', 'oromo', 'Oromo (Ethiopia)'),
('om_KE', 'om', 'oromo', 'Oromo (Kenya)'),
('or_IN', 'or', 'oriya', 'Oriya (India)'),
('os_RU', 'os', 'ossetic', 'Ossetic (Russia)'),
('pap_AN', 'pap', 'papiamento', 'Papiamento (Netherlands Antilles)'),
('pa_IN', 'pa', 'punjabi', 'Punjabi (India)'),
('pa_PK', 'pa', 'punjabi', 'Punjabi (Pakistan)'),
('pl_PL', 'pl', 'polish', 'Polish (Poland)'),
('ps_AF', 'ps', 'pashto', 'Pashto (Afghanistan)'),
('pt_BR', 'pt', 'portuguese', 'Portuguese (Brazil)'),
('pt_GW', 'pt', 'portuguese', 'Portuguese (Guinea-Bissau)'),
('pt_PT', 'pt', 'portuguese', 'Portuguese (Portugal)'),
('ro_MD', 'ro', 'romanian', 'Romanian (Moldova)'),
('ro_RO', 'ro', 'romanian', 'Romanian (Romania)'),
('ru_RU', 'ru', 'russian', 'Russian (Russia)'),
('ru_UA', 'ru', 'russian', 'Russian (Ukraine)'),
('rw_RW', 'rw', 'kinyarwanda', 'Kinyarwanda (Rwanda)'),
('sa_IN', 'sa', 'sanskrit', 'Sanskrit (India)'),
('sc_IT', 'sc', 'sardinian', 'Sardinian (Italy)'),
('sd_IN', 'sd', 'sindhi', 'Sindhi (India)'),
('seh_MZ', 'seh', 'sena', 'Sena (Mozambique)'),
('se_NO', 'se', 'northern sami', 'Northern Sami (Norway)'),
('sid_ET', 'sid', 'sidamo', 'Sidamo (Ethiopia)'),
('si_LK', 'si', 'sinhala', 'Sinhala (Sri Lanka)'),
('sk_SK', 'sk', 'slovak', 'Slovak (Slovakia)'),
('sl_SI', 'sl', 'slovenian', 'Slovenian (Slovenia)'),
('sn_ZW', 'sn', 'shona', 'Shona (Zimbabwe)'),
('so_DJ', 'so', 'somali', 'Somali (Djibouti)'),
('so_ET', 'so', 'somali', 'Somali (Ethiopia)'),
('so_KE', 'so', 'somali', 'Somali (Kenya)'),
('so_SO', 'so', 'somali', 'Somali (Somalia)'),
('sq_AL', 'sq', 'albanian', 'Albanian (Albania)'),
('sq_MK', 'sq', 'albanian', 'Albanian (Macedonia)'),
('sr_BA', 'sr', 'serbian', 'Serbian (Bosnia and Herzegovina)'),
('sr_ME', 'sr', 'serbian', 'Serbian (Montenegro)'),
('sr_RS', 'sr', 'serbian', 'Serbian (Serbia)'),
('ss_ZA', 'ss', 'swati', 'Swati (South Africa)'),
('st_ZA', 'st', 'southern sotho', 'Southern Sotho (South Africa)'),
('sv_FI', 'sv', 'swedish', 'Swedish (Finland)'),
('sv_SE', 'sv', 'swedish', 'Swedish (Sweden)'),
('sw_KE', 'sw', 'swahili', 'Swahili (Kenya)'),
('sw_TZ', 'sw', 'swahili', 'Swahili (Tanzania)'),
('ta_IN', 'ta', 'tamil', 'Tamil (India)'),
('teo_UG', 'teo', 'teso', 'Teso (Uganda)'),
('te_IN', 'te', 'telugu', 'Telugu (India)'),
('tg_TJ', 'tg', 'tajik', 'Tajik (Tajikistan)'),
('th_TH', 'th', 'thai', 'Thai (Thailand)'),
('tig_ER', 'tig', 'tigre', 'Tigre (Eritrea)'),
('ti_ER', 'ti', 'tigrinya', 'Tigrinya (Eritrea)'),
('ti_ET', 'ti', 'tigrinya', 'Tigrinya (Ethiopia)'),
('tk_TM', 'tk', 'turkmen', 'Turkmen (Turkmenistan)'),
('tl_PH', 'tl', 'tagalog', 'Tagalog (Philippines)'),
('tn_ZA', 'tn', 'tswana', 'Tswana (South Africa)'),
('to_TO', 'to', 'tongan', 'Tongan (Tonga)'),
('tr_CY', 'tr', 'turkish', 'Turkish (Cyprus)'),
('tr_TR', 'tr', 'turkish', 'Turkish (Turkey)'),
('ts_ZA', 'ts', 'tsonga', 'Tsonga (South Africa)'),
('tt_RU', 'tt', 'tatar', 'Tatar (Russia)'),
('ug_CN', 'ug', 'uighur', 'Uighur (China)'),
('uk_UA', 'uk', 'ukrainian', 'Ukrainian (Ukraine)'),
('ur_PK', 'ur', 'urdu', 'Urdu (Pakistan)'),
('uz_UZ', 'uz', 'uzbek', 'Uzbek (Uzbekistan)'),
('ve_ZA', 've', 'venda', 'Venda (South Africa)'),
('vi_VN', 'vi', 'vietnamese', 'Vietnamese (Vietnam)'),
('wa_BE', 'wa', 'walloon', 'Walloon (Belgium)'),
('wo_SN', 'wo', 'wolof', 'Wolof (Senegal)'),
('xh_ZA', 'xh', 'xhosa', 'Xhosa (South Africa)'),
('yi_US', 'yi', 'yiddish', 'Yiddish (United States)'),
('yo_NG', 'yo', 'yoruba', 'Yoruba (Nigeria)'),
('zh_CN', 'zh', 'chinese', 'Chinese (China)'),
('zh_HK', 'zh', 'chinese', 'Chinese (Hong Kong SAR China)'),
('zh_SG', 'zh', 'chinese', 'Chinese (Singapore)'),
('zh_TW', 'zh', 'chinese', 'Chinese (Taiwan)'),
('zu_ZA', 'zu', 'zulu', 'Zulu (South Africa)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `label`, `link`, `icon`, `parent`, `sort`) VALUES
(1, 'dashboard', 'admin/dashboard', 'fa fa-dashboard', 0, 1),
(6, 'tickets', '#', 'fa fa-ticket', 0, 6),
(7, 'all_tickets', 'admin/tickets', 'fa fa-circle-o', 6, 5),
(8, 'answered', 'admin/tickets/answered', 'fa fa-circle-o', 6, 1),
(9, 'open', 'admin/tickets/open', 'fa fa-circle-o', 6, 2),
(10, 'in_progress', 'admin/tickets/in_progress', 'fa fa-circle-o', 6, 3),
(11, 'closed', 'admin/tickets/closed', 'fa fa-circle-o', 6, 4),
(24, 'user', 'admin/user/user_list', 'fa fa-users', 0, 10),
(25, 'settings', '#', 'fa fa-cogs', 0, 11),
(60, 'plans', 'admin/plan/plan_list', 'fa fa-sitemap', 0, 2),
(64, 'logout', 'login/logout', 'fa fa-sign-out', 0, 100),
(65, 'pages', 'admin/pages', 'fa fa-file-text', 0, 10),
(66, 'faq', 'admin/faq', 'fa fa-question-circle', 0, 10),
(68, 'site_setting', 'admin/settings', 'fa fa-circle-o', 25, 1),
(71, 'payout_setting', 'admin/payout', 'fa fa-circle-o', 25, 5),
(73, 'affiliate', 'admin/refferals', 'fa fa-circle-o', 25, 7),
(77, 'transaction', '#', 'fa fa-bank', 0, 2),
(78, 'deposit', 'admin/transaction/index/deposit', 'fa fa-circle-o', 77, 1),
(79, 'bonus', 'admin/transaction/index/bonus', 'fa fa-circle-o', 77, 3),
(80, 'penality', 'admin/transaction/index/penality', 'fa fa-circle-o', 77, 4),
(81, 'send_bonus', 'admin/transaction/send_bonus', 'fa fa-circle-o', 77, 5),
(82, 'send_penality', 'admin/transaction/send_penality', 'fa fa-circle-o', 77, 6),
(83, 'withdrawal_request', 'admin/transaction/index/withdraw_pending', 'fa fa-circle-o', 77, 3),
(84, 'withdrawal_history', 'admin/transaction/index/withdrawal', 'fa fa-circle-o', 77, 3),
(85, 'payment_setting', 'admin/payment', 'fa fa-circle-o', 25, 2),
(86, 'deposits', 'admin/transaction/deposit', 'fa fa-money', 0, 1),
(88, 'activities', 'admin/settings/activities', 'fa fa-circle-o', 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plans`
--

CREATE TABLE `tbl_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_min_amt` decimal(10,5) NOT NULL,
  `plan_max_amt` decimal(10,5) NOT NULL,
  `max_interest` int(11) NOT NULL,
  `period_type` int(11) NOT NULL,
  `interest_type` int(11) NOT NULL,
  `release_status` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `iperiod_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_plans`
--

INSERT INTO `tbl_plans` (`plan_id`, `plan_name`, `plan_min_amt`, `plan_max_amt`, `max_interest`, `period_type`, `interest_type`, `release_status`, `period`, `iperiod_type`) VALUES
(3, '140% After 1 Day', '10.00000', '50000.00000', 7, 2, 0, 0, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_priorities`
--

CREATE TABLE `tbl_priorities` (
  `priority` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_priorities`
--

INSERT INTO `tbl_priorities` (`priority`) VALUES
('Low'),
('Medium'),
('High');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status`) VALUES
(1, 'answered'),
(2, 'closed'),
(3, 'open'),
(5, 'in_progress');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_user_id` int(11) NOT NULL,
  `testimonial_feedback` text COLLATE utf8_unicode_ci NOT NULL,
  `testimonial_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets`
--

CREATE TABLE `tbl_tickets` (
  `tickets_id` int(10) NOT NULL,
  `ticket_code` varchar(32) DEFAULT NULL,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text,
  `status` varchar(200) DEFAULT NULL,
  `departments_id` int(11) DEFAULT NULL,
  `reporter` int(10) DEFAULT '0',
  `priority` varchar(50) DEFAULT NULL,
  `bill_no` text,
  `upload_file` text,
  `upload_path` text,
  `filename` text,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets_replies`
--

CREATE TABLE `tbl_tickets_replies` (
  `tickets_replies_id` int(10) NOT NULL,
  `tickets_id` bigint(10) DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `replier` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `replierid` int(10) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_todo`
--

CREATE TABLE `tbl_todo` (
  `todo_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `online_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = online 0 = offline '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installer`
--
ALTER TABLE `installer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account_details`
--
ALTER TABLE `tbl_account_details`
  ADD PRIMARY KEY (`account_details_id`);

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`activities_id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`config_key`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_currencies`
--
ALTER TABLE `tbl_currencies`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`departments_id`);

--
-- Indexes for table `tbl_email_templates`
--
ALTER TABLE `tbl_email_templates`
  ADD PRIMARY KEY (`email_templates_id`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tbl_locales`
--
ALTER TABLE `tbl_locales`
  ADD PRIMARY KEY (`locale`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  ADD PRIMARY KEY (`tickets_id`);

--
-- Indexes for table `tbl_tickets_replies`
--
ALTER TABLE `tbl_tickets_replies`
  ADD PRIMARY KEY (`tickets_replies_id`);

--
-- Indexes for table `tbl_todo`
--
ALTER TABLE `tbl_todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `country_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_account_details`
--
ALTER TABLE `tbl_account_details`
  MODIFY `account_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `activities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `departments_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_email_templates`
--
ALTER TABLE `tbl_email_templates`
  MODIFY `email_templates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `tickets_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tickets_replies`
--
ALTER TABLE `tbl_tickets_replies`
  MODIFY `tickets_replies_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_todo`
--
ALTER TABLE `tbl_todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
