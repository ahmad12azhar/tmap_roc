-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2020 at 07:37 PM
-- Server version: 10.3.18-MariaDB-0+deb10u1
-- PHP Version: 7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_tagline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namarek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analytic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `norek` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `site_title`, `site_tagline`, `site_description`, `email`, `address`, `telephone`, `namarek`, `analytic`, `norek`, `logo_path`, `instagram`, `whatsapp`, `facebook`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'TMAP', 'TMAP', 'zxc', 'support@tmap.com', 'TMAP', '0123456', 'null', '<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-9CMQHREDCF\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-9CMQHREDCF\');\r\n</script>', 'null', 'uploads/config/20201116172259_logo map.png', NULL, 'produklokal', 'airlanggaglobalday', NULL, NULL, '2020-11-25 19:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `drawing_map`
--

CREATE TABLE `drawing_map` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_object` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `unique_id` bigint(20) NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `object_id` bigint(20) UNSIGNED DEFAULT 2,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `used` int(11) DEFAULT 0,
  `occ` int(11) DEFAULT 0,
  `capacity` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `length_of_line` double(20,2) DEFAULT 0.00
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drawing_map`
--

INSERT INTO `drawing_map` (`id`, `name`, `type_object`, `coordinates`, `unique_id`, `description`, `user_id`, `object_id`, `project_id`, `created_at`, `updated_at`, `used`, `occ`, `capacity`, `status`, `length_of_line`) VALUES
(7, 'ODP-SUG-FA/01', 'Marker', '[\"-5.15495495400405\",\"119.46091120329797\"]', 1606900210065, NULL, 1, 3, 1, '2020-12-02 02:08:13', '2020-12-02 04:38:16', 1, 0, 8, 1, 0.00),
(6, 'marker 2', 'Marker', '[\"-5.1795566364807035\",\"119.42752306548059\"]', 1606883373491, NULL, 1, 4, 1, '2020-12-01 21:27:34', '2020-12-02 02:09:04', 0, 0, 0, 1, 0.00),
(8, 'name', 'Marker', '[\"-5.194914083492981\",\"119.45088416827488\"]', 1606903754999, NULL, 1, 2, 1, '2020-12-02 03:09:15', '2020-12-02 03:21:34', 0, 0, 0, 1, 0.00),
(9, 'asd', 'Polyline', '[[\"-5.142257360733109\",\"119.46650535357762\"],[\"-5.140889595425779\",\"119.47663337481785\"],[\"-5.151318731642058\",\"119.4738867927866\"],[\"-5.142257360733109\",\"119.46650535357762\"]]', 1606903893268, NULL, 1, 2, 1, '2020-12-02 03:11:33', '2020-12-02 03:11:37', 0, 0, 0, 1, 0.00),
(11, 'ODC-SUG-FB', 'Marker', '[\"-5.161438854306004\",\"119.43598344168639\"]', 1606915315915, NULL, 1, 4, 1, '2020-12-02 06:22:00', '2020-12-02 06:22:48', 0, 0, 0, 1, 0.00),
(12, 'ODC-SUG-FC', 'Marker', '[\"-5.162721092904923\",\"119.44405152640319\"]', 1606915322701, NULL, 1, 4, 1, '2020-12-02 06:22:07', '2020-12-02 06:23:11', 0, 0, 0, 1, 0.00),
(13, 'ODP-SUG-FC/01', 'Marker', '[\"-5.169602395743697\",\"119.45063903174376\"]', 1606915327282, NULL, 1, 3, 1, '2020-12-02 06:22:11', '2020-12-02 06:23:26', 0, 0, 0, 1, 0.00),
(17, 'ODC-SUG-FC', 'Marker', '[\"-5.1618256043763795\",\"119.43794370478244\"]', 1606915584868, NULL, 1, 4, 1, '2020-12-02 06:26:29', '2020-12-02 06:27:41', 0, 0, 0, 1, 0.00),
(15, 'DISTRIBUSI', 'Polyline', '[[\"-5.162528757280356\",\"119.44403006873107\"],[\"-5.169516914179292\",\"119.45061757407164\"]]', 1606915342871, NULL, 1, 2, 1, '2020-12-02 06:22:30', '2020-12-02 06:23:48', 0, 0, 0, 1, 0.00),
(16, 'FEEDER', 'Polygon', '[[\"-5.167110594402408\",\"119.45271722763422\"]]', 1606915450421, NULL, 1, 2, 1, '2020-12-02 06:24:15', '2020-12-02 06:27:10', 0, 0, 0, 1, 0.00),
(18, 'name', 'Polyline', '[[\"-5.16143024719326\",\"119.4359561879024\"],[\"-5.161814919050353\",\"119.43794370478244\"]]', 1606915599395, NULL, 1, 2, 1, '2020-12-02 06:26:44', '2020-12-02 06:26:44', 0, 0, 0, 1, 0.00),
(19, 'name', 'Polyline', '[[\"-5.161438261192668\",\"119.43595350569339\"],[\"-5.161817590381869\",\"119.43794102257343\"]]', 1606915608155, NULL, 1, 2, 1, '2020-12-02 06:26:52', '2020-12-02 06:26:52', 0, 0, 0, 1, 0.00),
(20, 'name', 'Polyline', '[[\"-5.1618337340720135\",\"119.43791214125184\"],[\"-5.162624447688773\",\"119.44383445875673\"]]', 1606915732896, NULL, 1, 2, 1, '2020-12-02 06:28:57', '2020-12-02 06:28:57', 0, 0, 0, 1, 0.00),
(22, 'name', 'Polygon', '[[\"-5.163212607486225\",\"119.49936335173547\"],[\"-5.182360380228165\",\"119.49455683318078\"],[\"-5.178770216981694\",\"119.51652948943078\"]]', 1606973228716, NULL, 1, 2, 1, '2020-12-02 22:25:10', '2020-12-02 22:25:10', 0, 0, 0, 1, 0.00),
(24, 'poly gon ts', 'Polygon', '[[\"-5.128676771186249\",\"119.50674479094445\"],[\"-5.1413287307226625\",\"119.50485651579797\"],[\"-5.1385931931819755\",\"119.49060862151086\"]]', 1606973293351, 'dd', 1, 2, 1, '2020-12-02 22:26:14', '2020-12-02 22:26:36', 0, 0, 0, 1, 0.00),
(26, 'ODP-001-123', 'Marker', '[\"-5.189293871146584\",\"119.44762260211277\"]', 1606983602589, NULL, 1, 3, 4, '2020-12-03 01:20:04', '2020-12-03 01:22:03', 0, 0, 0, 1, 0.00),
(27, 'name', 'Marker', '[\"-5.126356907772104\",\"119.45438697283716\"]', 1606983786968, NULL, 1, 4, 4, '2020-12-03 01:23:07', '2020-12-03 01:28:50', 0, 0, 0, 1, 0.00),
(28, 'name', 'Marker', '[\"-5.128429973166055\",\"119.45749833529443\"]', 1606983803841, NULL, 1, 4, 4, '2020-12-03 01:23:24', '2020-12-03 01:29:07', 0, 0, 0, 1, 0.00),
(29, 'name', 'Polyline', '[[\"-5.126976690914744\",\"119.44398353497586\"],[\"-5.129487882668572\",\"119.44750259526175\"],[\"-5.126143189307585\",\"119.45029209057888\"],[\"-5.131101439261866\",\"119.45372531811795\"],[\"-5.132704313551056\",\"119.45044229428372\"]]', 1606983821065, 'AA-LINE-BB', 1, NULL, 4, '2020-12-03 01:23:41', '2020-12-03 01:28:19', NULL, NULL, NULL, 1, 0.00),
(30, 'ODP 1', 'Marker', '[\"-5.130237249193451\",\"119.44848090899754\"]', 1606983971256, NULL, 1, 2, 4, '2020-12-03 01:26:11', '2020-12-03 01:26:31', 0, 0, 0, 1, 0.00),
(31, 'name', 'Marker', '[\"-5.125022529928879\",\"119.44976836932469\"]', 1606984001919, NULL, 1, 2, 4, '2020-12-03 01:26:42', '2020-12-03 01:26:42', 0, 0, 0, 1, 0.00),
(32, 'name', 'Polyline', '[[\"-5.1305270749949194\",\"119.44579869998265\"],[\"-5.132365038829178\",\"119.44528371585179\"],[\"-5.132771099892369\",\"119.44693595660496\"],[\"-5.131958977507509\",\"119.44837362063694\"]]', 1606985062282, NULL, 1, 2, 4, '2020-12-03 01:44:23', '2020-12-03 01:44:23', 0, 0, 0, 1, 0.00),
(50, 'ODP-2', 'Marker', '[\"-5.172098695533058\",\"119.46326178034009\"]', 1607066395011, NULL, 1, 2, 7, '2020-12-04 00:19:54', '2020-12-04 00:20:02', 0, 0, 0, 1, 0.00),
(51, 'name', 'Polyline', '[[\"-5.175090531217397\",\"119.45596617181958\"],[\"-5.177398509078119\",\"119.4595710607356\"],[\"-5.178167833159912\",\"119.46154516657056\"],[\"-5.179108116877464\",\"119.46317594965161\"],[\"-5.178082352752605\",\"119.46343344171704\"],[\"-5.174663126985707\",\"119.46424883325757\"],[\"-5.173642104986378\",\"119.46457069833936\"],[\"-5.175090531217397\",\"119.45596617181958\"]]', 1607066429097, NULL, 1, 2, 7, '2020-12-04 00:20:28', '2020-12-04 00:20:46', 0, 0, 0, 1, 285559.58),
(59, 'ODC-SUG-FAY', 'Marker', '[\"-5.2175386719092405\",\"119.40126617809932\"]', 1607066788378, 'Pertigaan jalan', 13, 4, 7, '2020-12-04 00:26:35', '2020-12-04 00:28:58', 0, 0, 144, 1, 0.00),
(60, 'ODP-SUG-FAZ/01', 'Marker', '[\"-5.217644180175512\",\"119.4015156235377\"]', 1607066790937, 'Pertigaan Jalan xxxx', 13, 3, 7, '2020-12-04 00:26:37', '2020-12-04 00:28:06', 0, 0, 8, 1, 0.00),
(61, 'ODP-SUG-FAY/02', 'Marker', '[\"-5.217495934378621\",\"119.4016229118983\"]', 1607066793477, 'Depan rumah pak RT', 13, 3, 7, '2020-12-04 00:26:39', '2020-12-04 00:28:29', 0, 0, 8, 1, 0.00),
(62, 'KABEL DISTRIBUSI', 'Polyline', '[[\"-5.217542678552595\",\"119.40126617809932\"],[\"-5.217645515723081\",\"119.40151830574672\"],[\"-5.217491927734974\",\"119.4016229118983\"]]', 1607066801042, NULL, 13, 2, 7, '2020-12-04 00:26:48', '2020-12-04 00:46:16', NULL, NULL, NULL, 1, 305.32),
(63, 'name', 'Marker', '[\"-5.217079430038813\",\"119.40190634881432\"]', 1607067234089, NULL, 13, 2, 7, '2020-12-04 00:34:00', '2020-12-04 00:34:00', 0, 0, 0, 1, 0.00),
(64, 'name', 'Marker', '[\"-5.2165665791038345\",\"119.40221748506005\"]', 1607067236790, NULL, 13, 2, 7, '2020-12-04 00:34:02', '2020-12-04 00:34:02', 0, 0, 0, 1, 0.00),
(66, 'asdf', 'Marker', '[\"-5.158775165284687\",\"119.41071540606785\"]', 1607329923606, 'sadf', 1, 7, 1, '2020-12-07 01:32:03', '2020-12-07 01:32:14', 0, 0, 0, 1, 0.00),
(67, 'asdf 1', 'Marker', '[\"-5.143729975857773\",\"119.46393043292332\"]', 1607330653008, 'sdf', 1, 4, 7, '2020-12-07 01:44:13', '2020-12-07 01:44:26', 0, 0, 0, 1, 0.00),
(68, 'name', 'Polygon', '[[\"-5.162785197847961\",\"119.39773981657922\"],[\"-5.182616822288136\",\"119.37078898039758\"],[\"-5.1933871851766815\",\"119.40134470549523\"]]', 1607396271803, NULL, 1, 2, 1, '2020-12-07 19:55:54', '2020-12-07 19:55:54', 0, 0, 0, 1, 5530420.78),
(69, 'jasljfalj', 'Polyline', '[[\"-5.1825389988316015\",\"119.46013242495823\"],[\"-5.183970784031214\",\"119.45948869479466\"]]', 1607396271056, 'asdfjlasd', 1, NULL, 7, '2020-12-07 19:57:51', '2020-12-07 19:58:29', NULL, NULL, NULL, 1, 0.00),
(70, '1234', 'Polyline', '[[\"-5.17595701916404\",\"119.44616348040867\"],[\"-5.178435954616291\",\"119.4453051735239\"],[\"-5.178521434975788\",\"119.44727927935887\"],[\"-5.17595701916404\",\"119.44616348040867\"]]', 1607396374978, 'sadfasdf', 1, 2, 7, '2020-12-07 19:59:35', '2020-12-07 19:59:47', 0, 0, 0, 1, 30650.30),
(71, 'ODP-1', 'Marker', '[\"-5.160140807733022\",\"119.45965044457111\"]', 1607399542244, NULL, 1, 3, 8, '2020-12-07 20:52:22', '2020-12-07 20:52:42', 0, 0, 0, 1, 0.00),
(72, 'ODP-2', 'Marker', '[\"-5.156673996146798\",\"119.4587492223421\"]', 1607399611304, NULL, 1, 3, 8, '2020-12-07 20:53:31', '2020-12-07 20:53:43', 0, 0, 0, 1, 0.00),
(73, 'Distribusi-1', 'Polyline', '[[\"-5.178794789100461\",\"119.46227699643927\"],[\"-5.179136710275023\",\"119.46347862607794\"],[\"-5.169135439557223\",\"119.4656673086341\"],[\"-5.168024177500823\",\"119.46635395414191\"],[\"-5.163621850969875\",\"119.46734100705939\"],[\"-5.162553320501865\",\"119.4634357107337\"],[\"-5.160886409376866\",\"119.4607320440467\"],[\"-5.159946098604727\",\"119.45965916044074\"],[\"-5.15721044093842\",\"119.45853730097976\"],[\"-5.156697541355523\",\"119.45868750468459\"]]', 1607399672617, NULL, 1, 3, 8, '2020-12-07 20:54:32', '2020-12-07 20:54:58', 0, 0, 0, 1, 952237.04),
(74, 'Distribusi-2', 'Polyline', '[[\"-5.178367383540738\",\"119.46102373558674\"],[\"-5.174862678472359\",\"119.45578806358967\"],[\"-5.17340950238336\",\"119.45999376732502\"],[\"-5.171528916608947\",\"119.45286982018146\"],[\"-5.163408141188766\",\"119.45304148155842\"],[\"-5.1606726986740075\",\"119.4600795980135\"]]', 1607421557105, NULL, 1, 2, 8, '2020-12-08 02:59:17', '2020-12-08 02:59:42', 0, 0, 0, 1, 3751.81),
(75, 'ODP-SUG-FAX/01', 'Marker', '[\"-5.194128248515548\",\"119.4520527645643\"]', 1607572235102, NULL, 13, 7, 5, '2020-12-09 20:50:36', '2020-12-10 07:34:55', 0, 0, 8, 1, 0.00),
(81, 'Kabel Distribusi', 'Polyline', '[[\"-5.19411712286885\",\"119.45203069798553\"],[\"-5.194165204378056\",\"119.45240084282959\"],[\"-5.193828633736606\",\"119.45261005513275\"]]', 1607684433284, NULL, 13, NULL, 5, '2020-12-11 04:00:32', '2020-12-11 04:00:50', NULL, NULL, NULL, NULL, 85.45),
(77, 'ODP-SUG-FAX/03', 'Marker', '[\"-5.193834416995912\",\"119.45260529962137\"]', 1607572249120, NULL, 13, 7, 5, '2020-12-09 20:50:50', '2020-12-09 20:53:55', 0, 0, 8, 1, 0.00),
(78, 'ODP-SUG-FAX/04', 'Marker', '[\"-5.193113193594271\",\"119.45262675729349\"]', 1607572251893, NULL, 13, 7, 5, '2020-12-09 20:50:53', '2020-12-09 20:54:10', 0, 0, 8, 1, 0.00),
(79, 'ODP-SUG-FAX/05', 'Marker', '[\"-5.192792649595348\",\"119.45282524076059\"]', 1607572254788, NULL, 13, 7, 5, '2020-12-09 20:50:55', '2020-12-09 20:55:28', 0, 0, 8, 1, 0.00),
(82, 'Kabel Feeder', 'Polyline', '[[\"-5.193812716175108\",\"119.45260566295912\"],[\"-5.193096835147426\",\"119.4526217562132\"],[\"-5.192770945135188\",\"119.45282292188932\"]]', 1607779961710, NULL, 13, NULL, 5, '2020-12-12 06:32:42', '2020-12-12 06:32:59', NULL, NULL, NULL, NULL, 122.30);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `designator` varchar(25) NOT NULL,
  `uraian_pekerjaan` varchar(250) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `material` int(10) DEFAULT NULL,
  `jasa` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`designator`, `uraian_pekerjaan`, `satuan`, `material`, `jasa`) VALUES
('AC-OF-SM-12-SC', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 12 core G 652 D, \"Easy to split\"', 'meter', 20481, 5089),
('AC-OF-SM-12C', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 12 core G 655 C', 'meter', 20790, 5089),
('AC-OF-SM-12D', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 12 core G 652 D', 'meter', 15915, 5127),
('AC-OF-SM-24-SC', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 24 core G 652 D, \"Easy to split\"', 'meter', 25177, 5089),
('AC-OF-SM-24C', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 24 core G 655 C', 'meter', 27525, 5089),
('AC-OF-SM-24D', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 24 core G 652 D', 'meter', 19568, 5089),
('AC-OF-SM-48C', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 48 core G 655 C', 'meter', 43049, 5089),
('AC-OF-SM-48D', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 48 core G 652 D', 'meter', 27395, 5089),
('AC-OF-SM-8-SC', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 8 core G 652 D, \"Easy to split\"', 'meter', 15654, 5089),
('AC-OF-SM-96C', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 96 core G 655 C', 'meter', 74357, 5089),
('AC-OF-SM-96D', 'Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 96 core G 652 D', 'meter', 41744, 5089),
('BC-MTR-0.4', 'Pekerjaan galian pada permukaan jalan aspal dengan lebar galian 8 cm dan kedalaman 40 cm, termasuk pemetaan utility eksisting dengan metode Geo Penetrating Radar, perbaikan, pengurugan (backfilling) menggunakan concrete type K225 dan pengaspalan', 'meter', 0, 184572),
('BC-TR-0.4', 'Pekerjaan Galian, Pengurugan kembali dan perbaikan kembali, pengisian pasir, warning tape dan tanda rute kabel serta tempat sambung kedalaman 0.4 meter', 'meter', 0, 12421),
('BC-TR-0.6', 'Pekerjaan Galian, Pengurugan kembali dan perbaikan kembali, pengisian pasir, warning tape dan tanda rute kabel serta tempat sambung, kedalaman 0,6 meter', 'meter', 0, 16373),
('BC-TR-1', 'Pekerjaan Galian, Pengurugan kembali dan perbaikan kembali, pengisian pasir, warning tape dan tanda rute kabel serta tempat sambung, kedalaman 1 meter', 'meter', 0, 25689),
('BC-TR-2', 'Pekerjaan Galian, Pengurugan kembali dan perbaikan kembali, pengisian pasir, warning tape dan tanda rute kabel serta tempat sambung, kedalaman 1,2 meter', 'meter', 0, 30584),
('BC-TR-3', 'Pekerjaan Galian, Pengurugan kembali dan perbaikan kembali, pengisian pasir, warning tape dan tanda rute kabel serta tempat sambung, kedalaman 1,3 meter', 'meter', 0, 32676),
('BC-TR-4', 'Pekerjaan Galian, Pengurugan kembali dan perbaikan kembali, pengisian pasir, warning tape dan tanda rute kabel serta tempat sambung, kedalaman 1,4 meter', 'meter', 0, 35156),
('BC-TR-5', 'Pekerjaan Galian, Pengurugan kembali dan perbaikan kembali, pengisian pasir, warning tape dan tanda rute kabel serta tempat sambung kedalaman 1,5 meter', 'meter', 0, 37472),
('BCTR-ROCK', 'Pengadaan galian batu masif kedalaman 1,5 meter, panjang minimum 5 m, termasuk pengadaan marking post', 'meter', 0, 225080),
('BD-SK', 'Pekerjaan bobokan dan perbaikan Dinding Chamber / BTS / STO untuk lubang Sparing Kabel', 'Titik', 66997, 85602),
('Close Rack 12U', '19\" Wallmounted Rack 12U Depth 450mm', 'Unit', 5302793, 668040),
('CO-OF', 'Pekerjaan Cut Over Kabel Serat Optik', 'core', 0, 62918),
('Coring', 'Pekerjaan bobokan tembok/coring Cor Beton di ruang Shaft', 'titik', 0, 890720),
('DC-OF-SM-12-SC', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 12 core G 652 D, \"Easy to split\"', 'meter', 16014, 3681),
('DC-OF-SM-12C', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 12 core G 655 C', 'meter', 15132, 3681),
('DC-OF-SM-12D', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 12 core G 652 D', 'meter', 11197, 3681),
('DC-OF-SM-144D', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 144 core G 652 D', 'meter', 55441, 4478),
('DC-OF-SM-24-SC', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 24 core G 652 D, \"Easy to split\"', 'meter', 22437, 3681),
('DC-OF-SM-24C', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 24 core G 655 C', 'meter', 21524, 3681),
('DC-OF-SM-24D', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 24 core G 652 D', 'meter', 14610, 3681),
('DC-OF-SM-288D', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 288 core G 652 D', 'meter', 100447, 4470),
('DC-OF-SM-2A', 'Pengadaan dan pemasangan Kabel Serat Optic Penanggal Single Mode 2 core dgn pelindung pipa G 657 A (indoor)', 'meter', 8349, 3118),
('DC-OF-SM-48C', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 48 core G 655 C', 'meter', 33917, 3681),
('DC-OF-SM-48D', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 48 core G 652 D', 'meter', 21524, 3681),
('DC-OF-SM-8-SC', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 8 core G 652 D, \"Easy to split\"', 'meter', 12915, 3681),
('DC-OF-SM-96C', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 96 core G 655 C', 'meter', 70443, 3681),
('DC-OF-SM-96D', 'Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 96 core G 652 D', 'meter', 39135, 3681),
('DC-SD-28-1', 'Pengadaan dan Pemasangan 1 Subduct 28/32 mm pada polongan route Duct', 'meter', 11251, 1740),
('DC-SD-28-3', 'Pengadaan dan Pemasangan 1 Subduct 28/32 mm pada polongan route Duct, 3 pipa', 'meter', 33754, 2271),
('DC-SD-33-1', 'Pengadaan dan Pemasangan 1 Subduct 40/33 pada polongan route Duct', 'meter', 12093, 1740),
('DC-SD-33-2', 'Pengadaan dan Pemasangan 1 Subduct 40/33 pada polongan route Duct, 2 pipa', 'meter', 24531, 2262),
('DC-SD-43-1', 'Pengadaan dan Pemasangan 1 Subduct 50/42 pada polongan route Duct', 'meter', 26742, 1740),
('DC-SD-43-2', 'engadaan dan Pemasangan 1 Subduct 50/42 pada polongan route Duct, 2 pipa', 'meter', 53485, 2262),
('DCD-PVC-1', 'Pengadaan dan Pemasangan Duct Cable Penanggal diameter pipa PVC 2 inch (Class AW) 1  pipa', 'meter', 16510, 1719),
('DD-BM-100-1', 'Pengadaan dan Pemasangan Pipa galvanis dengan ukuran diameter 100 mm dan ketebalan 3,65 mm dengan cara boring manual /mesin   1 pipa dengan kedalaman minimal 150 cm', 'meter', 391366, 74162),
('DD-BM-100-2', 'Pengadaan dan Pemasangan Pipa galvanis dengan ukuran diameter 100 mm dan ketebalan 3,65 mm dengan cara boring manual /mesin   1 pipa dengan kedalaman minimal 150 cm, 2 pipa', 'meter', 782733, 76998),
('DD-BM-50-1', 'Pengadaan dan Pemasangan Pipa galvanis dengan ukuran diameter 50 mm dan ketebalan 2,7 mm cara boring manual /mesin 1 pipa dengan kedalaman minimal 150 cm', 'meter', 228288, 37333),
('DD-BM-50-2', 'Idem, 2 pipa', 'meter', 453614, 37333),
('DD-BM-HDPE-40-1', 'Pekerjaan Boring manual (rojok) HDPE  40/33 mm 1 pipa dengan kedalaman 1,5 meter', 'meter', 0, 37472),
('DD-BM-HDPE-40-2', 'Pengadaan dan Pemasangan Pipa galvanis dengan ukuran diameter 50 mm dan ketebalan 2,7 mm cara boring manual /mesin 1 pipa dengan kedalaman minimal 150 cm, 2 pipa', 'meter', 0, 37361),
('DD-BM-HDPE-50-1', 'Pekerjaan Boring manual (rojok)  HDPE  50/42 mm 1 pipa dengan kedalaman 1,5 meter', 'meter', 0, 37472),
('DD-BM-HDPE-50-2', 'Pekerjaan Boring manual (rojok)  HDPE  50/42 mm 2 pipa dengan kedalaman 1,5 meter', 'meter', 0, 37333),
('DD-BMR-1', 'Pengadaan dan Pemasangan Boring pada Lintasan Kereta Api menggunakan 1 pipa Galvanis diameter 100 mm tebal 3,65 mm', 'track', 1174098, 23579474),
('DD-BMR-2', 'Pengadaan dan Pemasangan Boring pada Lintasan Kereta Api menggunakan 2 pipa Galvanis diameter 100 mm tebal 3,65 mm', 'track', 2348198, 35369211),
('DD-BMR-4', 'Pengadaan dan Pemasangan Boring pada Lintasan Kereta Api menggunakan 4 pipa Galvanis diameter 100 mm tebal 3,65 mm', 'track', 4696394, 47158948),
('DD-BSS-S1', 'Pengadaan dan pemasangan pipa Duct pada jembatan dengan self support berpenguatan menggunakan Pipa besi Galv 1 pipa, bentang 6 - 12 meter', 'meter', 504189, 256805),
('DD-BSS-S2', 'Pengadaan dan pemasangan pipa Duct pada jembatan dengan self support berpenguatan menggunakan Pipa besi Galv 2 pipa, bentang 6 - 12 meter', 'meter', 1008287, 513608),
('DD-BTS-S1', 'Pengadaan dan pemasangan pipa Duct pada jembatan menggunakan Pipa besi Galv 1 pipa, bentang 6 - 12 meter', 'meter', 502233, 256805),
('DD-BTS-S2', 'Pengadaan dan pemasangan pipa Duct pada jembatan menggunakan Pipa besi Galv 2 pipa, bentang 6 - 12 meter', 'meter', 1004465, 513608),
('DD-BTS-S4', 'Pengadaan dan pemasangan pipa Duct pada jembatan menggunakan Pipa besi Galv 4 pipa, bentang 6 - 12 meter', 'meter', 1997167, 778597),
('DD-DA-S1', 'Pengadaan dan pemasangan pipa Duct menempel pada  jembatan existing menggunakan Pipa Galvanis diamenter 100 mm, tebal 3,65 mm, 1 pipa', 'meter', 391366, 256805),
('DD-DA-S2', 'Pengadaan dan pemasangan pipa Duct menempel pada  jembatan existing menggunakan Pipa Galvanis diamenter 100 mm, tebal 3,65 mm, 2 pipa', 'meter', 782733, 513608),
('DD-DA-S4', 'Pengadaan dan pemasangan pipa Duct menempel pada  jembatan existing menggunakan Pipa Galvanis diamenter 100 mm, tebal 3,65 mm, 4 pipa', 'meter', 1565465, 1027216),
('DD-DS-COD1-M', 'Pengadaan dan pemasangan duct  baru type COD, dengan mesin pengeboran (borring) dibawah parit, pada kedalaman 1,50 m di bawah dasar selokan, tanpa perlindungan PVC, 1 pipa', 'meter', 31241, 504081),
('DD-DS-S1', 'Pengadaan dan pemasangan duct baru dengan cara melakukan boring dibawah dasar parit/sungai dengan kedalaman 1,5 M dengan menggunakan PVC diamater 100 mm dan ketebalan 5,5 mm 1 pipa', 'meter', 324548, 179763),
('DD-HDPE-40-1', 'Pengadaan dan pemasangan pipa  HDPE  40/33 mm 1 pipa dengan kedalaman 1,5 meter', 'meter', 15200, 1657),
('DD-HDPE-40-1C', 'Pengadaan dan pemasangan pipa HDPE 40/33 mm 1 pipa dengan kedalaman 1,5 meter sudah termasuk connector HDPE tipe compression fitting', 'meter', 15817, 1657),
('DD-HDPE-40-2', 'Pengadaan dan pemasangan pipa  HDPE  40/33 mm 2 pipa dengan kedalaman 1,5 meter', 'meter', 30401, 2004),
('DD-HDPE-40-2C', 'Pengadaan dan pemasangan pipa HDPE 40/33 mm 2 pipa dengan kedalaman 1,5 meter sudah termasuk connector HDPE tipe compression fitting', 'meter', 31416, 2004),
('DD-HDPE-50-1', 'Pengadaan dan pemasangan pipa HDPE  50/42 mm 1 pipa dengan kedalaman 1,5 meter', 'meter', 25829, 1657),
('DD-HDPE-50-2', 'Pengadaan dan pemasangan pipa HDPE  50/42 mm 2 pipa dengan kedalaman 1,5 meter', 'meter', 51658, 2004),
('DD-ROD', 'Pekerjaan Pembersihan pada route Duct yang kosong / Rodding Duct Existing.', 'meter', 0, 2140),
('DD-RV-1', 'Pekerjaan Perbaikan Route Duct / HDPE, 1 pipa.', 'meter', 45720, 85602),
('DD-RV-CONCRETE', 'Pekerjaan bobok dinding MH / HH termasuk perbaikan kembali', 'm3', 1339930, 770413),
('DD-S3-1', 'Pengadaan dan pemasangan Pipa Besi Diameter 100 mm dan ketebalan pipa 3,65 mm untuk crossing 1 pipa  bentang ? 6 meter', 'meter', 391366, 64201),
('DD-S3-2', 'Pengadaan dan pemasangan Pipa Besi Diameter 100 mm dan ketebalan pipa 3,65 mm untuk crossing 2 pipa  bentang ? 6 meter', 'meter', 782733, 85602),
('DD-S3-3', 'Pengadaan dan pemasangan Pipa Besi Diameter 100 mm dan ketebalan pipa 3,65 mm untuk crossing 3 pipa  bentang ? 6 meter', 'meter', 1174098, 128402),
('DD-V4-1', 'Pengadan dan Pemasangan Pipa Duct PVC diameter dalam 100 mm, ketebalan 4 mm, 1 pipa termasuk pengecoran', 'meter', 74465, 64201),
('DD-V4-2', 'Pengadan dan Pemasangan Pipa Duct PVC diameter dalam 100 mm, ketebalan 4 mm, 2 pipa termasuk pengecoran', 'meter', 148928, 85732),
('DD-V5-1', 'Pemasangan Pipa Duct dengan selubung pasir dia 100 mm dengan ketebalan 5,5 mm, 1 pipa ( crossing )', 'meter', 72002, 64201),
('DD-V5-2', 'Pemasangan Pipa Duct dengan selubung pasir dia 100 mm dengan ketebalan 5,5 mm, 2 pipa ( crossing )', 'meter', 144800, 85602),
('FC-SC-DC', 'Pengadaan dan pemasangan SC/UPC Connector for Drop / Indoor Cable (Fusion)', 'pcs', 57398, 64577),
('GB-G-INTG', 'Pengadaan dan Pemasangan material Grounding di lokasi gedung eksisting dengan cara integrasi', 'pcs', 314411, 174131),
('GB-G1', 'Pengadaan dan Pemasangan Grounding 1 titik rod pada ODP /kotak pembagi dengan tahanan maks 3 ohm', 'pcs', 1039356, 432186),
('GB-G3', 'Pengadaan dan Pemasangan Grounding 3 titik rod pada ODC dengan tahanan maks 1 ohm', 'pcs', 3130800, 501030),
('GU-G', 'Pengadaan dan Pemasangan Temberang Tarik', 'pcs', 605021, 64299),
('HB-PC-2', 'Pengadaan dan pemasangan Pipa Duct dengan system gantung 2 tiang beton, bentang s/d 100 meter', 'meter', 594852, 49124),
('HB-PC-4', 'Pengadaan dan pemasangan Pipa Duct dengan system gantung 4 tiang beton, bentang ? 100 meter', 'meter', 1165684, 57311),
('HB-PS-1', 'Pengadaan dan pemasangan Pipa Duct dengan system gantung 1 tiang besi, bentang s/d 40 meter', 'meter', 175689, 40936),
('HB-PS-2', 'Pengadaan dan pemasangan Pipa Duct dengan system gantung 2 tiang besi, bentang s/d 100 meter', 'meter', 361643, 49124),
('HB-PS-4', 'Pengadaan dan pemasangan Pipa Duct dengan system gantung 4 tiang besi, bentang ? 100 meter', 'meter', 699995, 57311),
('HH-PIT-P-HA', 'Pekerjaan Pembuatan HH Pit Portable Home Access  beserta aksesorisnya', 'pcs', 997447, 194121),
('HH-PIT-P-ODC', 'Pekerjaan Pembuatan HH Pit Portable ODC beserta aksesorisnya', 'pcs', 12366660, 546358),
('HH-PIT-P-ODP', 'Pekerjaan Pembuatan HH Pit Portable ODP beserta aksesorisnya', 'pcs', 3261250, 289553),
('Klem Galvanise', 'Pengadaan & Pemasangan klem galvanise untuk airblown pipe dengan ketebalan 2mm, lebar 2.5 cm menggunakan dynabolt termasuk rekondisi atau perbaikan kerusakan', 'pcs', 16045, 2227),
('Klem HDPE', 'Pengkleman HDPE di dinding beton dengan klem ketebalan 2mm lebar 2,5 cm menggunakan dynabolt termasuk rekondisi atau perbaikan kerusakan', 'pcs', 11500, 2300),
('MH-CA', 'Pekerjaan Peninggian Tutup Manhole/Handhole', 'pcs', 1058831, 757112),
('MH-HH1', 'Pekerjaan Pembuatan Handhole Type HH1 ukuran dimensi dalam (P X L X T = 170x150x165) cor beton 1 : 2 : 3', 'pcs', 7566100, 2874693),
('MH-HH2', 'Pekerjaan Pembuatan Handhole Type HH2 ukuran dimensi dalam (P X L X T = 120x130x165) cor beton 1 : 2 : 3', 'pcs', 5293515, 2188466),
('ODC-C-144', 'Pengadaan dan pemasangan kabinet ODC (Outdoor) kap 144 core dengan space untuk spliter modular termasuk material adaptor SC, pigtail, pondasi berlapis keramik, lantai kerja keramik, patok pengaman (5 buah), berikut pelabelan', 'pcs', 15369489, 5975618),
('ODC-C-288', 'Pengadaan dan pemasangan kabinet ODC (Outdoor) kap 288 core dengan space untuk spliter modular termasuk material adaptor SC, pigtail, pondasi berlapis keramik, lantai kerja keramik, patok pengaman (5 buah), berikut pelabelan', 'pcs', 29006862, 6020711),
('ODC-C-48', 'Pengadaan dan pemasangan ODC-Pole (Outdoor)  dengan space untuk spliter modular termasuk material adaptor SC  kap 48 core, berikut pelabelan', 'pcs', 5505386, 4422251),
('ODC-C-576', 'Pengadaan dan pemasangan kabinet ODC (Outdoor) kap 576 core dengan space untuk spliter modular termasuk material adaptor SC, pigtail, pondasi berlapis keramik, lantai kerja keramik, patok pengaman (5 buah), berikut pelabelan', 'pcs', 68953057, 5973506),
('ODC-C-96', 'Pengadaan dan pemasangan kabinet ODC (Outdoor) kap 96 core dengan space untuk spliter modular termasuk material adaptor SC, pigtail, pondasi berlapis keramik, lantai kerja keramik, patok pengaman (5 buah), berikut pelabelan', 'pcs', 9099000, 4699000),
('ODC-PROT-144', 'Pengaman ODC 144 (Besi siku 4cmx4cmx4mm, besi beton 10mm (jarak antar besi beton 10cm, engsel besar, baut ram set 14mm dan kunci gembok 50mm', 'unit', 1750000, 700000),
('ODC-PROT-288', 'Pengaman ODC 288 (Besi siku 4cmx4cmx4mm, besi beton 10mm (jarak antar besi beton 10cm, engsel besar, baut ram set 14mm dan kunci gembok 50mm', 'unit', 1900000, 750000),
('ODP-A-16', 'Pengadaan dan pemasangan ODP type Indoor/wall Kap 16 core berikut space 2 pasive spliter (1:8), adapter SC,berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)', 'pcs', 1330590, 144742),
('ODP-A-8', 'Pengadaan dan pemasangan ODP type Indoor/wall Kap 8 core berikut space pasive spliter (1:8), adapter SC,berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)', 'pcs', 1151968, 144742),
('ODP-CA-16', 'Pengadaan dan pemasangan ODP type Closure Aerial Kap 16 core berikut space 2 pasive spliter (1:8), adapter SC,berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)', 'pcs', 1643670, 144742),
('ODP-CA-8', 'Pengadaan dan pemasangan ODP type Closure Aerial Kap 8 core berikut space pasive spliter (1:8), adapter SC,berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)', 'pcs', 1449952, 144742),
('ODP-PL-16', 'Pengadaan dan pemasangan ODP ( Pilar ) kap  16 core termasuk pigtail, berikut space 2 splitter (1:8),  pelabelan penempelan QR code (disediakan oleh Telkom)', 'pcs', 2873498, 144742),
('ODP-PL-8', 'Pengadaan dan pemasangan ODP ( Pilar ) kap  8 core termasuk pigtail, berikut space 1 splitter (1:8),  pelabelan penempelan QR code (disediakan oleh Telkom)', 'pcs', 2527678, 144742),
('ODP-Solid-PB-16', 'Pengadaan dan pemasangan ODP type SOLID Kap 16 core adaptor SC/UPC terdiri dari 2 Box Spliter (termasuk 2 spliter 1:8) beserta Accessories, berikut pelabelandan penempelan QR code (disediakan oleh Telkom)', 'pcs', 2028498, 167010),
('ODP-Solid-PB-8', 'Pengadaan dan pemasangan ODP type SOLID Kap 8 core adaptor SC/UPC terdiri dari 1 Box Spliter (termasuk 1 spliter 1:8), 1 Box Dummy beserta Accessories, berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)', 'pcs', 1565400, 167010),
('OS-SM-1', 'Penyambungan Kabel Optik Single Mode kap 1 core dengan cara fusion splice', 'core', 0, 62223),
('PC-APC-652-2', 'Pengadaan dan pemasangan Patch cord 2 meter, (FC/LC/SC-APC To FC/LC/SC-APC), G.652 D', 'pcs', 84271, 3215),
('PC-APC-655-2', 'Pengadaan dan pemasangan Patch cord 2 meter, (FC/LC/SC-APC To FC/LC/SC-APC), G.655C', 'pcs', 82184, 3215),
('PC-APC-657-2', 'Pengadaan dan pemasangan Patch cord 2 meter, (FC/LC/SC-APC To FC/LC/SC-APC), G.657', 'pcs', 90095, 3215),
('PC-APC/UPC-652-A1', 'Additional patch cord, G.652D', 'meter', 5949, 1592),
('PC-APC/UPC-655-A1', 'Additional patch cord, G.655', 'meter', 5949, 1592),
('PC-APC/UPC-657-A1', 'Additional patch cord, G.657', 'meter', 5949, 1592),
('PC-UPC-652-2', 'Pengadaan dan pemasangan Patch cord 2 meter, (FC/LC/SC-UPC To FC/LC/SC-UPC), G.652D', 'pcs', 68186, 3215),
('PC-UPC-655-2', 'Pengadaan dan pemasangan Patch cord 2 meter, (FC/LC/SC-UPC To FC/LC/SC-UPC), G.655C', 'pcs', 71258, 3215),
('PC-UPC-657-2', 'Pengadaan dan pemasangan Patch cord 2 meter, (FC/LC/SC-UPC To FC/LC/SC-UPC), G.657', 'pcs', 74573, 3215),
('PP-OF-IN', 'Pengadaan dan Pemasangan Pipe Protector Indoor Cable (PVC White) High Impact Conduit 20 mm', 'meter', 31047, 4280),
('PP-OF-OUT', 'Pengadaan dan Pemasangan Pipe Protector  Outdoor Cable ( PVC Black) High Impact Conduit 20 mm', 'meter', 30678, 4280),
('PS-1-16-ODP', 'Pengadaan dan pemasangan Passive Splitter 1:16, type modular SC/UPC, for ODP, termasuk pigtail', 'pcs', 1009683, 36008),
('PS-1-2-ODC', 'Pengadaan dan pemasangan Passive Splitter 1:2, type modular SC/UPC, for ODC, termasuk pigtail', 'pcs', 309430, 36008),
('PS-1-32-ODX', 'Pengadaan dan pemasangan Passive Splitter 1:32, type modular SC/UPC, for ODC/ODP, termasuk pigtail', 'pcs', 1376000, 35000),
('PS-1-4-ODC', 'Pengadaan dan pemasangan Passive Splitter 1:4, type modular SC/UPC, for ODC, termasuk pigtail', 'pcs', 410330, 36008),
('PS-1-8-ODP', 'Pengadaan dan pemasangan Passive Splitter 1:8, type modular SC/UPC, for ODP, termasuk pigtail', 'pcs', 672014, 36008),
('PS-2-2-ODC', 'Pengadaan dan pemasangan Passive Splitter 2:2, type modular SC/UPC, for ODC, termasuk pigtail', 'pcs', 795745, 36269),
('PS-2-4-ODC', 'Pengadaan dan pemasangan Passive Splitter 2:4, type modular SC/UPC, for ODC, termasuk pigtail', 'pcs', 939240, 36269),
('PS-2-8-ODX', 'Pengadaan dan pemasangan Passive Splitter 2:8, type modular SC/UPC, for ODC, termasuk pigtail', 'pcs', 720000, 35000),
('PU-AS', 'Pengadaan dan Pemasangan Asesoris tiang eksisting', 'set', 38099, 42800),
('PU-C7.0-250', 'Pengadaan dan Pemasangan Tiang Beton  7 meter, berikut assesories dengan kekuatan tarik 250 kg', 'pcs', 3261250, 207525),
('PU-C9.0-300', 'Pengadaan dan Pemasangan Tiang Beton  9 meter, berikut assesories dengan kekuatan tarik 300 kg', 'pcs', 3900455, 204965),
('PU-S7.0-140', 'Pengadaan dan Pemasangan Tiang Besi 7 meter, berikut cat & cor pondasi dan assesories dengan kekuatan tarik 140 kg', 'pcs', 1565400, 255152),
('PU-S9.0-140', 'Pengadaan dan Pemasangan Tiang Besi 9 meter, berikut cat & cor dan assesories dengan kekuatan tarik 140 kg', 'pcs', 2478550, 257956),
('Rak Pasif spliter 1:4', '19 inch 24 core Pull type optical fiber distribution frame 24 port Rack Mounted Indoor fiber patch panel, Include RS232 Passive Splitter Rackmount Chassis - 2U', 'pcs', 2021975, 467628),
('RS-IN-SC-1P', 'Pemasangan dan terminasi Roset/Indoor Optical Outlet with SC Adaptor - kap 1 port berikut pigtail', 'pcs', 112709, 28859),
('SC-OF-SM-144', 'Pengadaan dan pemasangan alat sambung (cabang/ lurus) untuk Fiber Optik kapasitas 12 - 144 core', 'pcs', 1526265, 36186),
('SC-OF-SM-24', 'Pengadaan dan pemasangan alat sambung (cabang/ lurus) untuk Fiber Optik kapasitas 12 - 24 core', 'pcs', 851186, 36186),
('SC-OF-SM-288', 'Pengadaan dan pemasangan alat sambung (cabang/ lurus) untuk Fiber Optik kapasitas 12 - 288 core', 'pcs', 3000350, 36186),
('SC-OF-SM-48', 'Pengadaan dan pemasangan alat sambung (cabang/ lurus) untuk Fiber Optik kapasitas 12 - 48 core', 'pcs', 961610, 36186),
('SC-OF-SM-96', 'Pengadaan dan pemasangan alat sambung (cabang/ lurus) untuk Fiber Optik kapasitas 12 - 96 core', 'pcs', 1097737, 36186),
('SITAC ODC', 'Akuisisi Lahan SITAC ODC', 'Node', 0, 7859825),
('TC-02-ODC', 'Pengadaan dan Pemasangan Riser Pipe untuk pengaman kabel optik ke ODC Pole / titik naik KU diamater 2 inch  panjang 3 meter', 'pcs', 282895, 64577),
('TC-SM-12', 'Pengadaan dan Pemasangan OTB termasuk terminasi dan penyambungan kabel optik Single mode kap 12 core serta Adapter (SC Connector), pigtail dan protection sleeve pada cassette/box', 'pcs', 1203339, 785982),
('TC-SM-144', 'Pengadaan dan Pemasangan OTB Single Mode kapasitas 144 core (tidak termasuk terminasi), Adapter (SC Connector), pigtail dan protection sleeve pada cassette/box', 'pcs', 12382222, 95149),
('TC-SM-24', 'Pengadaan dan Pemasangan OTB termasuk terminasi dan penyambungan kabel optik Single mode kap 24 core serta Adapter (SC Connector), pigtail dan protection sleeve pada cassette/box', 'pcs', 1691739, 1571965),
('TC-SM-48', 'Pengadaan dan Pemasangan OTB termasuk terminasi dan penyambungan kabel optik Single mode kap 48 core serta Adapter (SC Connector), pigtail dan protection sleeve pada cassette/box', 'pcs', 3448283, 3143930),
('TC-SM-96', 'Pengadaan dan Pemasangan OTB termasuk terminasi dan penyambungan kabel optik Single mode kap 96 core serta Adapter (SC Connector), pigtail dan protection sleeve pada cassette/box', 'pcs', 6257687, 6287860);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_23_031703_create_permission_tables', 1),
(6, '2020_10_17_134016_create_configuration_table', 3),
(8, '2020_11_24_085717_create_places_table', 3),
(9, '2020_11_26_063832_create_project_table', 3),
(10, '2020_11_23_040449_create_test_table', 4),
(11, '2020_11_24_065527_create_object_map_table', 4),
(12, '2020_11_27_034509_add_reset_code_om_users_table', 5),
(13, '2020_11_30_044155_add_coordinates_on_test_table', 6),
(16, '2020_12_01_085829_create_drawing_table', 7),
(17, '2020_12_02_093257_add_some_field_on_drawing_map', 8),
(18, '2020_12_03_160841_add_completed_at_on_project', 9),
(19, '2020_12_03_161145_add_length_of_line_on_drawing', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(1, 'App\\Models\\User', 14),
(1, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `ms_object`
--

CREATE TABLE `ms_object` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lat` double(9,6) DEFAULT NULL,
  `lang` double(9,6) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'ODP',
  `used` int(10) DEFAULT NULL,
  `occ` int(10) DEFAULT NULL,
  `capacity` int(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_object`
--

INSERT INTO `ms_object` (`id`, `name`, `lat`, `lang`, `type`, `used`, `occ`, `capacity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ODC-SUG-FAA', -5.218300, 119.447200, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(2, 'ODC-SUG-FAB', -5.218400, 119.447400, 'High_Priority', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(3, 'ODC-SUG-FAC', -5.198400, 119.394100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(4, 'ODC-SUG-FAF', -5.208000, 119.439300, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(5, 'ODC-SUG-FAG', -5.177100, 119.437100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(6, 'ODC-SUG-FAH', -5.187600, 119.424700, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(7, 'ODC-SUG-FAJ', -5.236700, 119.388200, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(8, 'ODC-SUG-FAK', -5.186800, 119.451600, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(9, 'ODC-SUG-FAL', -5.197400, 119.454300, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(10, 'ODC-SUG-FAM', -5.192200, 119.443500, 'ODC', 0, 0, 0, 1, '2020-11-26 05:18:00', '2020-11-26 05:18:00'),
(11, 'ODC-SUG-FAN', -5.214300, 119.465200, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(12, 'ODC-SUG-FAS', -5.239500, 119.432700, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(13, 'ODC-SUG-FAY', -5.214100, 119.466600, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(14, 'ODC-SUG-FAZ', -5.187000, 119.428700, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(15, 'ODC-SUG-FBA', -5.218200, 119.447400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(16, 'ODC-SUG-FBB', -5.207800, 119.455500, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(17, 'ODC-SUG-FBC', -5.174600, 119.447900, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(18, 'ODC-SUG-FBN', -5.249226, 119.526680, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(19, 'ODC-SUG-FBP', -5.215000, 119.471400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(20, 'ODC-SUG-FBQ', -5.203104, 119.468386, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(21, 'ODC-SUG-FBS', -5.214367, 119.466713, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(22, 'ODC-SUG-FBT', -5.292619, 119.437775, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(23, 'ODC-SUG-FBU', -5.224556, 119.443081, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(24, 'ODC-SUG-FBV', -5.208700, 119.455100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(25, 'ODC-SUG-FBW', -5.181865, 119.440726, 'High_Priority', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(26, 'ODC-SUG-FBX', -5.209089, 119.387310, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(27, 'ODC-SUG-FBZ', -5.207125, 119.467343, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(28, 'ODC-SUG-FCA', -5.217400, 119.475000, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(29, 'ODC-SUG-FD', -5.208300, 119.455100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(30, 'ODC-SUG-FE', -5.186800, 119.429700, 'ODC', 0, 0, 0, 1, '2020-11-26 05:19:36', '2020-11-26 05:19:36'),
(31, 'ODC-SUG-FF', -5.181000, 119.440400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(32, 'ODC-SUG-FG', -5.174000, 119.441800, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(33, 'ODC-SUG-FGD', -5.203900, 119.455100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(34, 'ODC-SUG-FGH', -5.208600, 119.455100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(35, 'ODC-SUG-FH', -5.176600, 119.435900, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(36, 'ODC-SUG-FK', -5.194900, 119.461600, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(37, 'ODC-SUG-FL', -5.186400, 119.473000, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(38, 'ODC-SUG-FM', -8.036800, 115.072700, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(39, 'ODC-SUG-FMA', -5.187900, 119.464400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(40, 'ODC-SUG-FN', -5.179000, 119.462700, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(41, 'ODC-SUG-FNF', -5.208300, 119.455100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:33', '2020-11-26 05:20:33'),
(42, 'ODC-SUG-FP', -5.196600, 119.492500, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(43, 'ODC-SUG-FQ', -5.206900, 119.507800, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(44, 'ODC-SUG-FR', -5.200600, 119.488600, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(45, 'ODC-SUG-FS', -5.208300, 119.480400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(46, 'ODC-SUG-FT', -5.203000, 119.468400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(47, 'ODC-SUG-FU', -5.207300, 119.468000, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(48, 'ODC-SUG-FV', -5.215000, 119.471400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(49, 'ODC-SUG-FW', -5.217900, 119.475600, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(50, 'ODC-SUG-FX', -5.224200, 119.493200, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(51, 'ODC-SUG-FY', -5.194700, 119.394200, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(52, 'ODC-SUG-FZ', -5.208700, 119.389800, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(53, 'ODC-SUG-FZA', -5.186900, 119.451500, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(54, 'ODC-SUG-FZD', -5.195000, 119.461700, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(55, 'ODC-SUG-FZF', -5.202200, 119.507900, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(56, 'ODC-SUG-FZH', -5.218500, 119.447200, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(57, 'ODC-SUG-FZJ', -5.194700, 119.461600, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(58, 'ODC-SUG-FZK', -5.236600, 119.388500, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(59, 'ODC-SUG-FZL', -5.211400, 119.418500, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(60, 'ODC-SUG-FZM', -5.196200, 119.488400, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(61, 'ODC-SUG-FZN', -5.208400, 119.455100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(62, 'ODC-SUG-FZP', -5.208700, 119.389900, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(63, 'ODC-SUG-FZV', -5.218400, 119.405100, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(64, 'ODC-SUG-FZX', -5.220100, 119.446300, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(65, 'ODC-SUG-FZY', -5.222100, 119.407000, 'ODC', 0, 0, 0, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(66, 'ODP-SUG-F01/01', -5.191270, 119.447799, 'ODP', 1, 1, 8, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(67, 'ODP-SUG-FA/001', -5.219122, 119.474385, 'ODP', 7, 7, 8, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(68, 'ODP-SUG-FA/002', -5.219358, 119.473411, 'ODP', 8, 8, 8, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(69, 'ODP-SUG-FA/003', -5.219498, 119.472901, 'ODP', 6, 6, 8, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(70, 'ODP-SUG-FA/004', -5.218994, 119.473024, 'ODP', 3, 7, 8, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(71, 'ODP-SUG-FA/005', -5.218820, 119.473262, 'ODP', 4, 4, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(72, 'ODP-SUG-FA/006', -5.218986, 119.473907, 'ODP', 6, 6, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(73, 'ODP-SUG-FA/007', -5.217364, 119.473741, 'ODP', 3, 3, 8, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(74, 'ODP-SUG-FA/008', -5.216554, 119.472809, 'ODP', 9, 9, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(75, 'ODP-SUG-FA/009', -5.215916, 119.472477, 'ODP', 6, 6, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(76, 'ODP-SUG-FA/010', -5.215071, 119.472086, 'ODP', 6, 6, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(77, 'ODP-SUG-FAA/01', -5.216500, 119.448300, 'ODP', 5, 5, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(78, 'ODP-SUG-FAA/02', -5.214300, 119.404900, 'ODP', 11, 13, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(79, 'ODP-SUG-FAA/03', -5.214500, 119.403500, 'ODP', 13, 13, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(80, 'ODP-SUG-FAA/04', -5.213900, 119.403100, 'ODP', 11, 13, 16, 1, '2020-11-26 05:20:34', '2020-11-26 05:20:34'),
(81, 'ODP-SUG-FAA/05', -5.215000, 119.402300, 'ODP', 11, 12, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(82, 'ODP-SUG-FAA/06', -5.218500, 119.400800, 'ODP', 12, 12, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(83, 'ODP-SUG-FAA/07', -5.216400, 119.402200, 'ODP', 10, 12, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(84, 'ODP-SUG-FAA/076', -5.228199, 119.416550, 'ODP', 3, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(85, 'ODP-SUG-FAA/08', -5.220000, 119.408600, 'ODP', 1, 1, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(86, 'ODP-SUG-FAA/09', -5.220600, 119.410100, 'ODP', 3, 3, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(87, 'ODP-SUG-FAA/10', -5.220400, 119.409000, 'ODP', 5, 5, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(88, 'ODP-SUG-FAA/11', -5.222100, 119.409800, 'ODP', 2, 2, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(89, 'ODP-SUG-FAA/12', -5.221500, 119.409500, 'ODP', 3, 4, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(90, 'ODP-SUG-FAA/13', -5.221000, 119.406700, 'High_Priority', 1, 1, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(91, 'ODP-SUG-FAA/14', -5.222300, 119.409400, 'ODP', 3, 6, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(92, 'ODP-SUG-FAA/15', -5.221900, 119.408700, 'ODP', 3, 3, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(93, 'ODP-SUG-FAA/16', -5.221700, 119.408500, 'ODP', 1, 1, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(94, 'ODP-SUG-FAA/17', -5.221700, 119.408600, 'ODP', 3, 3, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(95, 'ODP-SUG-FAA/18', -5.221500, 119.408400, 'ODP', 3, 3, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(96, 'ODP-SUG-FAA/19', -5.221500, 119.407800, 'ODP', 5, 5, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(97, 'ODP-SUG-FAA/20', -5.222200, 119.405700, 'ODP', 12, 13, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(98, 'ODP-SUG-FAA/21', -5.219400, 119.405600, 'ODP', 2, 2, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(99, 'ODP-SUG-FAA/22', -5.222300, 119.406200, 'ODP', 11, 13, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(100, 'ODP-SUG-FAA/23', -5.209200, 119.403100, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(101, 'ODP-SUG-FAA/24', -5.209700, 119.403200, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(102, 'ODP-SUG-FAA/25', -5.210300, 119.402900, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(103, 'ODP-SUG-FAA/26', -5.210600, 119.402400, 'ODP', 1, 1, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(104, 'ODP-SUG-FAA/27', -5.210800, 119.402900, 'ODP', 5, 5, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(105, 'ODP-SUG-FAA/28', -5.210900, 119.402900, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(106, 'ODP-SUG-FAA/29', -5.211100, 119.402400, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(107, 'ODP-SUG-FAA/30', -5.211800, 119.402100, 'ODP', 12, 12, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(108, 'ODP-SUG-FAA/31', -5.210900, 119.400400, 'ODP', 7, 7, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(109, 'ODP-SUG-FAA/32', -5.211900, 119.400100, 'ODP', 1, 1, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(110, 'ODP-SUG-FAA/33', -5.211900, 119.400500, 'ODP', 2, 6, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(111, 'ODP-SUG-FAA/34', -5.211500, 119.400900, 'ODP', 10, 10, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(112, 'ODP-SUG-FAA/35', -5.212000, 119.401400, 'ODP', 6, 7, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(113, 'ODP-SUG-FAA/36', -5.217200, 119.406100, 'ODP', 1, 1, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(114, 'ODP-SUG-FAA/37', -5.218000, 119.405600, 'ODP', 1, 1, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(115, 'ODP-SUG-FAA/38', -5.218200, 119.405500, 'ODP', 3, 3, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(116, 'ODP-SUG-FAA/39', -5.218400, 119.405400, 'ODP', 10, 10, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(117, 'ODP-SUG-FAA/40', -5.218300, 119.405100, 'ODP', 4, 4, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(118, 'ODP-SUG-FAA/41', -5.218500, 119.407900, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(119, 'ODP-SUG-FAA/42', -5.218600, 119.408100, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(120, 'ODP-SUG-FAA/43', -5.218800, 119.408000, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(121, 'ODP-SUG-FAA/44', -5.219000, 119.408200, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(122, 'ODP-SUG-FAA/45', -5.218700, 119.408300, 'ODP', 2, 5, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(123, 'ODP-SUG-FAA/46', -5.218900, 119.408500, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(124, 'ODP-SUG-FAA/47', -5.219100, 119.408800, 'ODP', 3, 3, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(125, 'ODP-SUG-FAA/48', -5.219100, 119.408400, 'ODP', 2, 2, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(126, 'ODP-SUG-FAA/49', -5.219600, 119.408700, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(127, 'ODP-SUG-FAA/50', -5.219400, 119.408900, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(128, 'ODP-SUG-FAA/52', -5.202362, 119.398505, 'ODP', 1, 1, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(129, 'ODP-SUG-FAA/53', -5.210506, 119.394789, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(130, 'ODP-SUG-FAA/54', -5.232332, 119.436115, 'ODP', 1, 1, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(131, 'ODP-SUG-FAA/55', -5.233615, 119.435369, 'ODP', 1, 1, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(132, 'ODP-SUG-FAA/56', -5.235092, 119.434531, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(133, 'ODP-SUG-FAA/57', -5.237556, 119.431706, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(134, 'ODP-SUG-FAA/58', -5.236963, 119.430393, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(135, 'ODP-SUG-FAA/59', -5.236300, 119.427754, 'ODP', 4, 5, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(136, 'ODP-SUG-FAA/60', -5.237089, 119.427565, 'ODP', 6, 7, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(137, 'ODP-SUG-FAA/61', -5.237091, 119.426505, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(138, 'ODP-SUG-FAA/62', -5.236842, 119.425041, 'High_Priority', 5, 5, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(139, 'ODP-SUG-FAA/63', -5.236082, 119.422676, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(140, 'ODP-SUG-FAA/64', -5.234683, 119.421771, 'ODP', 5, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(141, 'ODP-SUG-FAA/65', -5.232524, 119.421425, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(142, 'ODP-SUG-FAA/66', -5.230016, 119.430273, 'ODP', 7, 8, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(143, 'ODP-SUG-FAA/67', -5.230308, 119.424327, 'ODP', 7, 8, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(144, 'ODP-SUG-FAA/68', -5.230673, 119.422864, 'ODP', 4, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(145, 'ODP-SUG-FAA/69', -5.231156, 119.421087, 'ODP', 5, 5, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(146, 'ODP-SUG-FAA/70', -5.230452, 119.419932, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(147, 'ODP-SUG-FAA/71', -5.222031, 119.421893, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(148, 'ODP-SUG-FAA/72', -5.220899, 119.419469, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(149, 'ODP-SUG-FAA/73', -5.225418, 119.419139, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(150, 'ODP-SUG-FAA/74', -5.229935, 119.419238, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(151, 'ODP-SUG-FAB/01', -5.214300, 119.449300, 'ODP', 8, 8, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(152, 'ODP-SUG-FAC/01', -5.241100, 119.430600, 'ODP', 5, 5, 8, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(153, 'ODP-SUG-FAC/02', -5.240800, 119.430300, 'ODP', 13, 13, 16, 1, '2020-11-26 05:22:19', '2020-11-26 05:22:19'),
(154, 'ODP-SUG-FAC/03', -5.239300, 119.430400, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(155, 'ODP-SUG-FAC/04', -5.238600, 119.430300, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(156, 'ODP-SUG-FAC/06', -5.257670, 119.426460, 'ODP', 5, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(157, 'ODP-SUG-FAC/068', -5.227043, 119.450594, 'ODP', 7, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(158, 'ODP-SUG-FAC/069', -5.226605, 119.441623, 'ODP', 6, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(159, 'ODP-SUG-FAC/070', -5.227398, 119.440974, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(160, 'ODP-SUG-FAC/071', -5.241781, 119.431865, 'ODP', 5, 5, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(161, 'ODP-SUG-FAC/072', -5.238895, 119.430440, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(162, 'ODP-SUG-FAC/073', -5.238638, 119.430300, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(163, 'ODP-SUG-FAC/15', -5.292885, 119.438501, 'ODP', 5, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(164, 'ODP-SUG-FAC/17', -5.231459, 119.455950, 'ODP', 3, 3, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(165, 'ODP-SUG-FAC/18', -5.230897, 119.454166, 'ODP', 6, 7, 16, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(166, 'ODP-SUG-FAC/19', -5.230318, 119.452378, 'ODP', 6, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(167, 'ODP-SUG-FAC/20', -5.226508, 119.450827, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(168, 'ODP-SUG-FAC/21', -5.227747, 119.450346, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(169, 'ODP-SUG-FAC/22', -5.229206, 119.449941, 'ODP', 6, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(170, 'ODP-SUG-FAC/23', -5.227257, 119.445863, 'ODP', 7, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(171, 'ODP-SUG-FAC/24', -5.226311, 119.445094, 'ODP', 15, 16, 16, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(172, 'ODP-SUG-FAC/25', -5.225162, 119.442558, 'ODP', 13, 14, 16, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(173, 'ODP-SUG-FAC/26', -5.226322, 119.441834, 'ODP', 5, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(174, 'ODP-SUG-FAC/27', -5.227151, 119.441212, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(175, 'ODP-SUG-FAC/28', -5.228125, 119.440301, 'ODP', 2, 2, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(176, 'ODP-SUG-FAC/29', -5.229075, 119.439381, 'ODP', 6, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(177, 'ODP-SUG-FAC/30', -5.230352, 119.438106, 'ODP', 13, 13, 16, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(178, 'ODP-SUG-FAC/31', -5.233077, 119.435826, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(179, 'ODP-SUG-FAC/32', -5.234712, 119.434892, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(180, 'ODP-SUG-FAC/33', -5.238318, 119.433019, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(181, 'ODP-SUG-FAC/34', -5.224443, 119.442892, 'ODP', 10, 10, 16, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(182, 'ODP-SUG-FAC/35', -5.226465, 119.441577, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(183, 'ODP-SUG-FAC/36', -5.227356, 119.440828, 'ODP', 5, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(184, 'ODP-SUG-FAC/37', -5.228948, 119.439330, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(185, 'ODP-SUG-FAC/38', -5.230232, 119.438033, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(186, 'ODP-SUG-FAC/39', -5.234286, 119.434996, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(187, 'ODP-SUG-FAC/40', -5.236313, 119.433800, 'ODP', 14, 14, 16, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(188, 'ODP-SUG-FAC/41', -5.238311, 119.432908, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(189, 'ODP-SUG-FAC/43', -5.261182, 119.440443, 'ODP', 13, 14, 16, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(190, 'ODP-SUG-FAC/44', -5.259527, 119.439499, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(191, 'ODP-SUG-FAC/45', -5.258441, 119.438950, 'ODP', 5, 5, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(192, 'ODP-SUG-FAC/46', -5.257730, 119.437788, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(193, 'ODP-SUG-FAC/47', -5.256914, 119.436237, 'ODP', 7, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(194, 'ODP-SUG-FAC/48', -5.256346, 119.434955, 'ODP', 5, 5, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(195, 'ODP-SUG-FAC/49', -5.255981, 119.434027, 'ODP', 8, 8, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(196, 'ODP-SUG-FAC/50', -5.254171, 119.431169, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(197, 'ODP-SUG-FAC/51', -5.252659, 119.430363, 'ODP', 6, 6, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(198, 'ODP-SUG-FAC/52', -5.249479, 119.428058, 'ODP', 4, 4, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(199, 'ODP-SUG-FAC/53', -5.248335, 119.428865, 'ODP', 2, 2, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20'),
(200, 'ODP-SUG-FAC/54', -5.247252, 119.429602, 'ODP', 7, 7, 8, 1, '2020-11-26 05:22:20', '2020-11-26 05:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `object_map`
--

CREATE TABLE `object_map` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `object_map`
--

INSERT INTO `object_map` (`id`, `type`, `status`, `path_image`, `created_at`, `updated_at`) VALUES
(2, 'High_Priority', 'Enable', 'uploads/icon/Icon_qATnUl_Icon_8pYDSi_map-marker.png', '2020-11-26 21:28:28', '2020-12-10 07:20:42'),
(3, 'ODP', 'Enable', 'uploads/icon/Icon_C9nTC6_Icon_X1XhyY_MapMarker_Flag2_Right_Azure.png', '2020-11-28 00:56:06', '2020-12-10 07:20:00'),
(4, 'ODC', 'Enable', 'uploads/icon/Icon_eu0k78_Icon_EB3y06_MapMarker_Flag1_Right_Chartreuse.png', '2020-11-28 00:56:30', '2020-12-10 07:18:10'),
(7, 'ODP_PLANNED', 'Enable', 'uploads/icon/Icon_lqaSTq_marker4.png', '2020-12-07 01:31:41', '2020-12-07 21:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'configuration.form', 'web', '2020-11-25 19:25:49', '2020-12-07 01:31:25'),
(2, 'user-list', 'web', '2020-12-07 00:57:56', '2020-12-07 00:57:56'),
(3, 'user-create', 'web', '2020-12-07 00:58:35', '2020-12-07 00:58:35'),
(4, 'user-edit', 'web', '2020-12-07 00:58:43', '2020-12-07 00:58:43'),
(5, 'user-delete', 'web', '2020-12-07 00:58:49', '2020-12-07 00:58:49'),
(6, 'permission-list', 'web', '2020-12-07 00:59:07', '2020-12-07 00:59:07'),
(7, 'permission-create', 'web', '2020-12-07 00:59:14', '2020-12-07 00:59:14'),
(8, 'permission-edit', 'web', '2020-12-07 00:59:20', '2020-12-07 00:59:20'),
(9, 'permission-delete', 'web', '2020-12-07 00:59:26', '2020-12-07 00:59:26'),
(10, 'object-list', 'web', '2020-12-07 01:18:30', '2020-12-07 01:18:30'),
(11, 'object-create', 'web', '2020-12-07 01:18:47', '2020-12-07 01:18:47'),
(12, 'role-list', 'web', '2020-12-07 01:23:16', '2020-12-07 01:23:16'),
(13, 'role-edit', 'web', '2020-12-07 01:23:23', '2020-12-07 01:23:23'),
(14, 'role-update', 'web', '2020-12-07 01:23:35', '2020-12-07 01:23:35'),
(15, 'role-delete', 'web', '2020-12-07 01:23:41', '2020-12-07 01:23:41'),
(16, 'object-delete', 'web', '2020-12-07 01:30:34', '2020-12-07 01:31:12'),
(17, 'configuration.update', 'web', '2020-12-07 01:31:34', '2020-12-07 01:31:34'),
(18, 'object-edit', 'web', '2020-12-07 20:54:13', '2020-12-07 20:54:13'),
(19, 'drawing-list', 'web', '2020-12-07 21:00:33', '2020-12-07 21:00:33'),
(20, 'drawing-create', 'web', '2020-12-07 21:00:46', '2020-12-07 21:00:46'),
(21, 'drawing-edit', 'web', '2020-12-07 21:00:59', '2020-12-07 21:00:59'),
(22, 'drawing-delete', 'web', '2020-12-07 21:01:10', '2020-12-07 21:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `physical_device`
--

CREATE TABLE `physical_device` (
  `project_id` varchar(10) NOT NULL,
  `designator` varchar(25) NOT NULL,
  `material` int(10) NOT NULL,
  `service` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physical_device`
--

INSERT INTO `physical_device` (`project_id`, `designator`, `material`, `service`, `quantity`, `total`) VALUES
('1', 'AC-OF-SM-12D', 15915, 5127, 2, 36957),
('1', 'BC-MTR-0.4', 0, 184572, 4, 184572),
('1', 'ODP-CA-8', 1449952, 144742, 2, 3044646),
('10', 'AC-OF-SM-12C', 20790, 5089, 100, 2084089),
('10', 'ODP-CA-8', 1449952, 144742, 1, 1594694),
('10', 'PU-C7.0-250', 3261250, 207525, 2, 6730025),
('5', 'AC-OF-SM-12-SC', 20481, 5089, 85, 1755190),
('5', 'ODP-A-8', 1151968, 144742, 5, 5904582),
('5', 'PU-C7.0-250', 3261250, 207525, 0, 207525);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` point DEFAULT NULL,
  `area` polygon DEFAULT NULL,
  `position` geometry DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` varchar(15) NOT NULL,
  `polygon_project` varchar(25) DEFAULT NULL,
  `project_name` varchar(25) DEFAULT NULL,
  `tematic_project` varchar(25) DEFAULT NULL,
  `additional_desc` varchar(100) DEFAULT NULL,
  `capex` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `polygon_project`, `project_name`, `tematic_project`, `additional_desc`, `capex`) VALUES
('1', '', '', '', '', 204135),
('10', '', '', '', '', 1301101),
('5', '', '', '', '', 196682);

-- --------------------------------------------------------

--
-- Table structure for table `project_map`
--

CREATE TABLE `project_map` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `polygon_project` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uplink` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tematik_project` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_map`
--

INSERT INTO `project_map` (`id`, `polygon_project`, `name`, `uplink`, `tematik_project`, `description`, `status`, `created_at`, `updated_at`, `completed_at`) VALUES
(1, 'PT3 SUG', 'PT3 SUG', 'ODC-SUG-FA', 'PT3', 'asdf', 'In Progress', '2020-11-26 01:50:40', '2020-12-04 06:47:46', NULL),
(3, '1283-9', 'PT-2 SUG FA', 'AKKK-001', 'PT2', 'test', 'In Progress', '2020-11-26 22:40:39', '2020-12-01 06:38:16', NULL),
(4, 'jdoajsodj', 'whdihasifhd', 'asjdfjoaj', 'PT2', 'ksjahdkfhas', 'In Progress', '2020-12-03 01:18:10', '2020-12-03 01:18:10', NULL),
(5, 'PT2 SUG', 'PT2 SUG RYAN PRAWIRA NEGARA', 'asddfsdf', 'PT2', 'Follow up kendala ODP Full', 'In Progress', '2020-12-03 02:28:46', '2020-12-03 02:28:46', NULL),
(6, 'ddqd', 'qdqdq', 'qdqd', 'PT3', 'qdq', 'Complete', '2020-12-03 20:14:24', '2020-12-04 00:03:17', '2020-12-04 07:03:17'),
(7, 'qeqeq', 'tes project 1', 'ODP-PNK-FAA/01', 'PT2', 'TES', 'In Progress', '2020-12-04 00:15:25', '2020-12-04 00:15:25', NULL),
(8, 'tes', 'Firman-tes', 'ODP-PNK-FAA/02', 'PT3', 'tes', 'In Progress', '2020-12-07 20:51:20', '2020-12-07 20:51:20', NULL),
(9, 'tes-4', 'Firman Project', 'ODP-SUG-FBC/09', 'PT2', 'tes', 'In Progress', '2020-12-08 02:56:18', '2020-12-08 02:56:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Sysadmin', 'web', '2020-11-25 19:08:14', '2020-11-25 19:08:14'),
(2, 'Staff', 'web', '2020-11-25 19:08:19', '2020-11-25 19:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surveyor`
--

CREATE TABLE `surveyor` (
  `id` int(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `id_telegram` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveyor`
--

INSERT INTO `surveyor` (`id`, `nama`, `jabatan`, `id_telegram`) VALUES
(1, 'Amiruddin', 'Operator', '558044906'),
(2, 'Muhammad Akbar Tantu', 'CEO Tmap', '74491926'),
(3, 'Ahmad Azhar', 'Junior Programmer', '668913076');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_object` tinyint(4) NOT NULL,
  `positions` geometry NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `kd_aktivasi` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hp`, `reset_code`, `email_verified_at`, `kd_aktivasi`, `password`, `nid`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TMAP Sysadmin', 'tmap@trikaryateknollogi.com', '546564564654', NULL, NULL, '54654adas', '$2y$12$3YaYtq.cLRf.e6onnYfDKObLEnyEl910ii1WlNEljru7Kt7MsYs6K', '1111111', 1, 'wiiSlvuOQf2VcjPa90moB6kTW9fJqEGVHU82rQKMS33ueespdChr7b9DfHvQ', NULL, '2020-11-30 21:02:36'),
(5, 'Debian Greg', 'debian@linux.dev', '1234567', NULL, NULL, 'Kxc38hT9', '$2y$12$3YaYtq.cLRf.e6onnYfDKObLEnyEl910ii1WlNEljru7Kt7MsYs6K', '1234567', 1, NULL, '2020-11-23 01:24:35', '2020-11-30 21:02:34'),
(6, 'Staf009', 'Staf009@tmap.dev', NULL, NULL, NULL, NULL, '$2y$10$Swn6y9N3QGi/yat5HLFibuqEq4SdXwr4UtnRRDC1qKx9dJHmyrHEy', 'Staf009', 0, NULL, '2020-11-30 21:02:28', '2020-12-01 00:58:57'),
(7, 'Tito Wirianto Majid', 'tito.wirianto@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$5ZVMZUhrYEAnMv3NTE15xuqwqU/Csh3mFeaC2GFHvypQp60Z3J/O2', '18910141', 1, NULL, '2020-12-01 03:25:16', '2020-12-01 03:25:16'),
(8, 'Multi Michael Sinurat', 'multimichaelsinurat@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$4VoB6A8N5diruXhxgfwQw.OJY5trP8V83xgFYUX..ZVWwl6haejvC', '20921176', 1, NULL, '2020-12-01 03:33:18', '2020-12-01 03:33:18'),
(9, 'Wahyudi', 'bank.yudii@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$lsxrHxL4qWPkkiRwczLome75CfyZXBKHj5dYQbDuQ22.EVTp12C0y', '885858', 1, NULL, '2020-12-01 03:34:01', '2020-12-01 03:34:38'),
(10, 'Rustam Rivai', 'rustamrivai@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$6txD555inyl6f4Mosybs1.99Pd7vrPhQLpp8zovY4ankGZ62W/hyy', '18900214', 1, NULL, '2020-12-01 03:34:34', '2020-12-01 03:34:34'),
(11, 'Kabir', 'kabir31juli89@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$fneBxGLgXxTy30hxaF1oz.HPk8emQkLCCsRLfODAOxax0OA2eK23m', '18890165', 1, NULL, '2020-12-01 03:35:12', '2020-12-01 03:35:12'),
(12, 'Christian Arman L', 'armantator@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$LzdtrCTMTChlwvKlZdMOye34yQodqTbLEVeLyysczcbgLEYnkHgU2', '850049', 1, NULL, '2020-12-03 02:27:12', '2020-12-03 02:27:12'),
(13, 'Muhammad Akbar Tantu', 'akbartantu29@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$kfX8A8dlNf.RHB1yWxcYDep1tt8AWj3ENQyPqLSHVAzfs/xnO9Rw2', '920094', 1, NULL, '2020-12-03 02:27:45', '2020-12-03 02:27:45'),
(14, 'Ni Made Ayu Karina Wiraswari', 'karina.wiraswari@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$wEr/6XRrLGIqtZdGZ02fT.nxIW9DAdLkyMjY05KRI8mhxRcR/GG.2', '930313', 1, NULL, '2020-12-04 00:57:27', '2020-12-04 00:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_core`
--

CREATE TABLE `validasi_core` (
  `status_project` varchar(35) DEFAULT NULL,
  `project_id` varchar(35) DEFAULT NULL,
  `nama_dist` varchar(35) DEFAULT NULL,
  `kap_kabel` varchar(35) NOT NULL,
  `nama_feeder` varchar(20) DEFAULT NULL,
  `available_core` int(10) DEFAULT NULL,
  `id_telegram` varchar(25) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `base` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drawing_map`
--
ALTER TABLE `drawing_map`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drawing_map_unique_id_unique` (`unique_id`),
  ADD KEY `drawing_map_user_id_foreign` (`user_id`),
  ADD KEY `drawing_map_object_id_foreign` (`object_id`),
  ADD KEY `drawing_map_project_id_foreign` (`project_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`designator`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ms_object`
--
ALTER TABLE `ms_object`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `object_map`
--
ALTER TABLE `object_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_map`
--
ALTER TABLE `project_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `surveyor`
--
ALTER TABLE `surveyor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drawing_map`
--
ALTER TABLE `drawing_map`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ms_object`
--
ALTER TABLE `ms_object`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_map`
--
ALTER TABLE `project_map`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surveyor`
--
ALTER TABLE `surveyor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
