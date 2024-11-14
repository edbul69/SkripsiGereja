-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2024 at 05:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','engineer') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id`, `username`, `name`, `password`, `role`, `last_login`) VALUES
(8, 'Admin', 'Admin', '$2y$10$XonHQjCbVbPM2/zBVkRkb.Yr9J4/BJYziMgnjZDGRh8K2b39ELwQm', 'admin', '2024-11-09 15:53:33'),
(9, 'Engineer', 'Engineer', '$2y$10$5OB.2if6nSkGK0frY/2SMO6sDtS.mzRpAqx1w9WWhlrsMxEQ2FFli', 'engineer', '2024-11-09 18:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `title`, `slug`, `img`, `text`, `source`, `created`, `modified`, `author`) VALUES
(67, 'Tarantula Tiarap Wakwaw', 'tarantula-tiarap-wakwaw', '1730747128_43e62e0874435c50db3f.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Google', '2024-11-04 19:05:28', '2024-11-07 00:17:57', NULL),
(68, 'Dunia Kekacauan', 'dunia-kekacauan', '1730747151_9f82dac26032e81722bc.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Twitter', '2024-11-04 19:05:51', '2024-11-04 19:05:51', NULL),
(69, 'Makhluk Tuhan Yang Paling Berisi', 'makhluk-tuhan-yang-paling-berisi', '1730747176_c46fc43209ab74f2fff1.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Facebook', '2024-11-04 19:06:16', '2024-11-04 19:06:16', NULL),
(70, 'Masak Masak Apa Yang', 'masak-masak-apa-yang', '1730747202_4d3aca3b861d94fe2761.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Facebook', '2024-11-04 19:06:42', '2024-11-04 19:06:42', NULL),
(71, 'Bakar Undi Negara', 'bakar-undi-negara', '1730747221_6ee8b8432e93eb956a88.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Jawa', '2024-11-04 19:07:01', '2024-11-04 19:07:01', NULL),
(72, 'Makin Merakyat Ya Ges Ya', 'makin-merakyat-ya-ges-ya', '1730747246_b8252266d18a3006f59d.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Tipu', '2024-11-04 19:07:26', '2024-11-04 19:07:26', NULL),
(73, 'Banyak Aja Rezekinya Amin', 'banyak-aja-rezekinya-amin', '1730747270_1d4a1859ce246dbd60ac.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Anak Haram', '2024-11-04 19:07:50', '2024-11-04 19:07:50', NULL),
(74, 'Perjalanan Hidup Seorang Wibu Di Isekai Bersama Pacar Dari Sodara Kakak Laki-Laki Iparnya', 'perjalanan-hidup-seorang-wibu-di-isekai-bersama-pacar-dari-sodara-kakak-laki-laki-iparnya', '1730747313_e337b32a3d70dfda23b5.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Kesadaran Moral', '2024-11-04 19:08:33', '2024-11-04 19:08:33', NULL),
(75, 'Mata Najwa Internasional', 'mata-najwa-internasional', '1730747362_5a1c31fb8738f20e2376.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Bibir', '2024-11-04 19:09:22', '2024-11-04 19:09:22', NULL),
(76, 'Lorem Ipsum Dolor', 'lorem-ipsum-dolor', '1730747378_072e27f66157f08d6cea.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Bahu', '2024-11-04 19:09:38', '2024-11-04 19:09:38', NULL),
(77, 'Dewa 19 Sudah Jadi 18', 'dewa-19-sudah-jadi-18', '1730747401_c0b8a58f058b88978ce8.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Cindo', '2024-11-04 19:10:01', '2024-11-04 19:10:01', NULL),
(78, 'Mama Aku Takut', 'mama-aku-takut', '1730747422_9ff78732cbc1cfaeb8c0.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Dunia Tipu Tipu', '2024-11-04 19:10:22', '2024-11-04 19:10:22', NULL),
(79, 'Acu Bocil Melodean', 'acu-bocil-melodean', '1731100796_a7167011f76784c1571b.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi ut quam eu lorem placerat auctor vitae vel neque. Nunc nunc nunc, cursus a malesuada ut, convallis convallis nunc. Curabitur sit amet consequat risus. Vestibulum viverra ultricies nibh, ac cursus lacus tempor a. Maecenas facilisis nibh sit amet magna scelerisque congue. Fusce pellentesque tincidunt condimentum. Cras malesuada neque quis iaculis eleifend. Curabitur sit amet malesuada ex. Suspendisse vel libero ornare, consequat nisl a, faucibus est. Mauris eu risus et odio maximus vulputate. Donec consequat volutpat urna, vel blandit ante consequat dignissim. Vestibulum lacinia, neque a varius fringilla, ex sapien pretium ligula, in maximus quam augue id nisl. Pellentesque iaculis tincidunt tellus, ut dictum ex sagittis cursus. Morbi lacinia augue nec nunc consectetur tincidunt. Maecenas quis elementum nisi, a sagittis felis. Ut nec nulla et diam faucibus elementum in nec nibh.</p>\r\n<p>&nbsp;</p>\r\n<p>Vivamus et ante ut metus finibus aliquet. Vivamus ornare massa sed turpis auctor finibus id id lectus. Donec sit amet nisi mauris. Sed ut mollis ipsum. Nam sed sodales nulla, a elementum massa. Nam lacinia felis vitae nisi tincidunt molestie sit amet volutpat dolor. Integer at volutpat diam, ac iaculis sem.</p>\r\n<p>&nbsp;</p>', 'Google', '2024-11-08 21:19:56', '2024-11-08 21:19:56', NULL),
(80, 'FC kitty Mas', 'fc-kitty-mas', '1731100909_af528b3136a1f56f269f.jpeg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>', 'Gugel', '2024-11-08 21:21:49', '2024-11-08 21:21:49', NULL),
(81, 'Gwenchana Guy', 'gwenchana-guy', '1731101051_7b6146aacb4e3db53599.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet tincidunt tempus. Cras pellentesque sapien eu sem vulputate, in fringilla tellus facilisis. Etiam efficitur viverra sem scelerisque aliquet. Suspendisse eget libero ac quam rutrum faucibus. Vivamus venenatis lacus ac nunc laoreet, sed luctus nisl molestie. Duis a quam sapien. Fusce maximus convallis ex, sit amet euismod purus finibus sit amet.</p>\r\n<p>&nbsp;</p>\r\n<p>Morbi ut quam eu lorem placerat auctor vitae vel neque. Nunc nunc nunc, cursus a malesuada ut, convallis convallis nunc. Curabitur sit amet consequat risus. Vestibulum viverra ultricies nibh, ac cursus lacus tempor a. Maecenas facilisis nibh sit amet magna scelerisque congue. Fusce pellentesque tincidunt condimentum. Cras malesuada neque quis iaculis eleifend. Curabitur sit amet malesuada ex. Suspendisse vel libero ornare, consequat nisl a, faucibus est. Mauris eu risus et odio maximus vulputate. Donec consequat volutpat urna, vel blandit ante consequat dignissim. Vestibulum lacinia, neque a varius fringilla, ex sapien pretium ligula, in maximus quam augue id nisl. Pellentesque iaculis tincidunt tellus, ut dictum ex sagittis cursus. Morbi lacinia augue nec nunc consectetur tincidunt. Maecenas quis elementum nisi, a sagittis felis. Ut nec nulla et diam faucibus elementum in nec nibh.</p>\r\n<p>&nbsp;</p>\r\n<p>Vivamus et ante ut metus finibus aliquet. Vivamus ornare massa sed turpis auctor finibus id id lectus. Donec sit amet nisi mauris. Sed ut mollis ipsum. Nam sed sodales nulla, a elementum massa. Nam lacinia felis vitae nisi tincidunt molestie sit amet volutpat dolor. Integer at volutpat diam, ac iaculis sem.</p>\r\n<p>&nbsp;</p>', 'Gigel', '2024-11-08 21:24:11', '2024-11-08 21:24:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `location` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `title`, `start`, `end`, `location`, `description`, `created`, `modified`, `by`) VALUES
(32, 'Youth Gathering', '2024-11-12 17:00:00', '2024-11-12 19:00:00', 'Youth Cen', 'Monthly youth meeting with discussions and activities.', '2024-11-02 09:00:00', '2024-11-07 00:17:16', 'John Doe'),
(33, 'Bible Study', '2024-11-15 18:30:00', '2024-11-15 20:00:00', 'Room A101', 'Weekly Bible study session led by Pastor.', '2024-11-03 10:00:00', '2024-11-03 10:00:00', 'Pastor'),
(34, 'Community Service', '2024-11-20 10:00:00', '2024-11-20 15:00:00', 'Local Park', 'Community cleanup and outreach program.', '2024-11-04 11:00:00', '2024-11-04 11:00:00', 'Community Leader'),
(35, 'Christmas Rehearsal', '2024-12-01 14:00:00', '2024-12-01 17:00:00', 'Church Auditorium', 'Rehearsal for the Christmas celebration performance.', '2024-11-05 12:00:00', '2024-11-05 12:00:00', 'Music Director'),
(36, 'Leadership Training', '2024-11-25 09:00:00', '2024-11-25 15:00:00', 'Conference Hall', 'Training session for new church leaders.', '2024-11-06 08:00:00', '2024-11-06 08:00:00', 'Admin'),
(37, 'Christmas Decoration', '2024-12-05 09:00:00', '2024-12-05 17:00:00', 'Church Grounds', 'Volunteers gathering to decorate for Christmas.', '2024-11-07 08:00:00', '2024-11-07 08:00:00', 'Volunteer Coordinator'),
(38, 'Men\'s Fellowship', '2024-11-30 19:00:00', '2024-11-30 21:00:00', 'Community Center', 'Monthly men\'s fellowship and Bible study.', '2024-11-08 09:00:00', '2024-11-08 09:00:00', 'Elder John'),
(39, 'Women\'s Group Meeting', '2024-12-02 10:00:00', '2024-12-02 12:00:00', 'Room B202', 'Weekly meeting for the women\'s ministry.', '2024-11-09 09:00:00', '2024-11-09 09:00:00', 'Elder Mary'),
(40, 'Youth Movie Night', '2024-12-08 18:00:00', '2024-12-08 20:00:00', 'Youth Hall', 'Fun movie night for the youth group.', '2024-11-10 09:00:00', '2024-11-10 09:00:00', 'Youth Leader'),
(41, 'Outreach Program', '2024-12-10 14:00:00', '2024-12-10 18:00:00', 'City Square', 'Community outreach and evangelism.', '2024-11-11 08:00:00', '2024-11-11 08:00:00', 'Outreach Coordinator'),
(42, 'Prayer Vigil', '2024-12-15 20:00:00', '2024-12-15 23:59:00', 'Main Hall', 'Evening of prayer and reflection.', '2024-11-12 09:00:00', '2024-11-12 09:00:00', 'Prayer Team'),
(43, 'New Year Celebration', '2024-12-31 21:00:00', '2025-01-01 00:30:00', 'Church Hall', 'Celebrating the New Year with worship and fellowship.', '2024-11-13 08:00:00', '2024-11-13 08:00:00', 'Event Coordinator'),
(44, 'Kids Christmas Party', '2024-12-22 15:00:00', '2024-12-22 17:00:00', 'Children\'s Room', 'Christmas party for children with games and snacks.', '2024-11-14 09:00:00', '2024-11-14 09:00:00', 'Children\'s Ministry'),
(45, 'Choir Practice', '2024-11-18 18:00:00', '2024-11-18 20:00:00', 'Music Room', 'Weekly choir practice session.', '2024-11-15 08:00:00', '2024-11-15 08:00:00', 'Choir Director'),
(46, 'Marriage Seminar', '2024-12-14 09:00:00', '2024-12-14 12:00:00', 'Conference Room', 'Seminar for married couples and those preparing for marriage.', '2024-11-16 08:00:00', '2024-11-16 08:00:00', 'Marriage Counselor'),
(47, 'Young Adults Workshop', '2024-11-19 14:00:00', '2024-11-19 16:00:00', 'Youth Center', 'Workshop for young adults on faith and career.', '2024-11-17 09:00:00', '2024-11-17 09:00:00', 'Young Adults Ministry'),
(48, 'Church Picnic', '2024-11-23 10:00:00', '2024-11-23 14:00:00', 'Lakeside Park', 'Annual church picnic with games and food.', '2024-11-18 08:00:00', '2024-11-18 08:00:00', 'Event Coordinator'),
(49, 'Volunteer Appreciation', '2024-11-27 18:00:00', '2024-11-27 20:00:00', 'Church Hall', 'Dinner and celebration for church volunteers.', '2024-11-19 08:00:00', '2024-11-19 08:00:00', 'Admin'),
(50, 'Christmas Eve Service', '2024-12-24 19:00:00', '2024-12-24 21:00:00', 'Main Hall', 'Special service to celebrate Christmas Eve.', '2024-11-20 08:00:00', '2024-11-20 08:00:00', 'Senior Pastor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jemaat`
--

CREATE TABLE `tb_jemaat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal` varchar(255) NOT NULL,
  `jns_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `telp` varchar(14) NOT NULL,
  `alamat` varchar(2048) NOT NULL,
  `api_code` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jemaat`
--

INSERT INTO `tb_jemaat` (`id`, `nama`, `tgl_lahir`, `asal`, `jns_kelamin`, `telp`, `alamat`, `api_code`, `created`, `modified`, `by`) VALUES
(23, 'Nadine BTR', '2024-11-22', 'Jakarta', 'laki-laki', '1234567890', 'Kota Manado, Malalayang, Bahu, Lingkungan 2', '', '2024-11-04 22:57:00', '2024-11-04 22:57:00', NULL),
(24, 'Rico Sanjaya', '1995-08-15', 'Surabaya', 'laki-laki', '081234567890', 'Kota Surabaya, Wonokromo, Sawahan, Lingkungan 4', '', '2024-11-05 10:00:00', '2024-11-05 10:00:00', 'Admin'),
(25, 'Lina Kartika', '1998-05-22', 'Bandung', 'perempuan', '082345678901', 'Kota Bandung, Coblong, Dago, Lingkungan 1', '', '2024-11-05 11:00:00', '2024-11-05 11:00:00', 'Admin'),
(26, 'Andre Putra', '1990-03-10', 'Medan', 'laki-laki', '083456789012', 'Kota Medan, Medan Baru, Suka Damai, Lingkungan 3', '', '2024-11-05 12:00:00', '2024-11-05 12:00:00', 'User1'),
(27, 'Sinta Permata', '1993-01-05', 'Yogyakarta', 'perempuan', '084567890123', 'Kota Yogyakarta, Gondokusuman, Terban, Lingkungan 5', '', '2024-11-05 13:00:00', '2024-11-05 13:00:00', 'User2'),
(28, 'Fajar Setiawan', '1987-07-11', 'Malang', 'laki-laki', '085678901234', 'Kota Malang, Klojen, Rampal Celaket, Lingkungan 2', '', '2024-11-05 14:00:00', '2024-11-05 14:00:00', 'Admin'),
(30, 'Maya Sari', '1985-09-21', 'Surabaya', 'perempuan', '081345678912', 'Kota Surabaya, Gubeng, Airlangga, Lingkungan 7', '', '2024-11-05 16:00:00', '2024-11-05 16:00:00', 'Admin'),
(32, 'Rina Kusuma', '1995-03-08', 'Yogyakarta', 'perempuan', '087812345678', 'Kota Yogyakarta, Umbulharjo, Semaki, Lingkungan 1', '', '2024-11-05 18:00:00', '2024-11-05 18:00:00', 'User5'),
(33, 'Dian Rahman', '1988-12-05', 'Medan', 'laki-laki', '081234567890', 'Kota Medan, Medan Helvetia, Helvetia Tengah, Lingkungan 4', '', '2024-11-05 19:00:00', '2024-11-05 19:00:00', 'Admin'),
(34, 'Lisa Marlina', '1993-07-24', 'Malang', 'perempuan', '082345678901', 'Kota Malang, Blimbing, Purwantoro, Lingkungan 3', '', '2024-11-05 20:00:00', '2024-11-05 20:00:00', 'User6'),
(35, 'Hendra Wijaya', '1991-11-30', 'Jakarta', 'laki-laki', '089876543210', 'Kota Jakarta, Kebayoran Baru, Melawai, Lingkungan 8', '', '2024-11-05 21:00:00', '2024-11-05 21:00:00', 'User7'),
(36, 'Susi Lestari', '1986-02-17', 'Denpasar', 'perempuan', '081234567891', 'Kota Denpasar, Denpasar Utara, Pemecutan Kelod, Lingkungan 6', '', '2024-11-05 22:00:00', '2024-11-05 22:00:00', 'Admin'),
(37, 'Agus Santoso', '1994-10-10', 'Semarang', 'laki-laki', '087712345678', 'Kota Semarang, Semarang Tengah, Miroto, Lingkungan 5', '', '2024-11-05 23:00:00', '2024-11-05 23:00:00', 'User8'),
(38, 'Dewi Anggraini', '1989-05-01', 'Makassar', 'perempuan', '082123456789', 'Kota Makassar, Tamalate, Mangasa, Lingkungan 2', '', '2024-11-06 00:00:00', '2024-11-06 00:00:00', 'User9'),
(39, 'Wawan Kurniawan', '1992-11-11', 'Balikpapan', 'laki-laki', '081234567890', 'Kota Balikpapan, Balikpapan Tengah, Karang Jati, Lingkungan 3', '', '2024-11-06 08:00:00', '2024-11-06 08:00:00', 'Admin'),
(40, 'Citra Permata', '1987-04-25', 'Surakarta', 'perempuan', '085234567891', 'Kota Surakarta, Laweyan, Purwosari, Lingkungan 5', '', '2024-11-06 09:00:00', '2024-11-06 09:00:00', 'User10'),
(41, 'Ahmad Fauzi', '1993-01-19', 'Palembang', 'laki-laki', '082123456780', 'Kota Palembang, Ilir Timur, 16 Ulu, Lingkungan 4', '', '2024-11-06 10:00:00', '2024-11-06 10:00:00', 'User11'),
(42, 'Fitriani Widya', '1990-06-12', 'Banjarmasin', 'perempuan', '081765432198', 'Kota Banjarmasin, Banjarmasin Utara, Sungai Andai, Lingkungan 7', '', '2024-11-06 11:00:00', '2024-11-06 11:00:00', 'Admin'),
(43, 'Fajar Nugroho', '1985-08-30', 'Manado', 'laki-laki', '087812345679', 'Kota Manado, Malalayang, Winangun, Lingkungan 2', '', '2024-11-06 12:00:00', '2024-11-06 12:00:00', 'User12'),
(44, 'Nina Sari', '1994-03-15', 'Pontianak', 'perempuan', '089912345678', 'Kota Pontianak, Pontianak Kota, Sungai Bangkong, Lingkungan 1', '', '2024-11-06 13:00:00', '2024-11-06 13:00:00', 'User13'),
(45, 'Yusuf Hidayat', '1991-10-05', 'Bandar Lampung', 'laki-laki', '081354678912', 'Kota Bandar Lampung, Sukarame, Way Dadi, Lingkungan 6', '', '2024-11-06 14:00:00', '2024-11-06 14:00:00', 'Admin'),
(46, 'Rina Yuliani', '1986-07-07', 'Cirebon', 'perempuan', '085678123456', 'Kota Cirebon, Harjamukti, Kalijaga, Lingkungan 8', '', '2024-11-06 15:00:00', '2024-11-06 15:00:00', 'User14'),
(47, 'Bambang Triyono', '1995-02-20', 'Padang', 'laki-laki', '083213456789', 'Kota Padang, Padang Timur, Simpang Haru, Lingkungan 4', '', '2024-11-06 16:00:00', '2024-11-06 16:00:00', 'User15'),
(48, 'Ayu Kartika', '1988-12-31', 'Malang', 'perempuan', '084321456789', 'Kota Malang, Lowokwaru, Dinoyo, Lingkungan 9', '', '2024-11-06 17:00:00', '2024-11-06 17:00:00', 'Admin'),
(49, 'Toni Pranata', '1992-04-14', 'Denpasar', 'laki-laki', '081234576890', 'Kota Denpasar, Denpasar Selatan, Sidakarya, Lingkungan 5', '', '2024-11-06 18:00:00', '2024-11-06 18:00:00', 'User16'),
(50, 'Mila Saputra', '1990-11-25', 'Tangerang', 'perempuan', '086543219876', 'Kota Tangerang, Cipondoh, Cipondoh Makmur, Lingkungan 3', '', '2024-11-06 19:00:00', '2024-11-06 19:00:00', 'User17'),
(51, 'Arif Rachman', '1989-09-17', 'Bekasi', 'laki-laki', '082987654321', 'Kota Bekasi, Bekasi Barat, Bintara, Lingkungan 2', '', '2024-11-06 20:00:00', '2024-11-06 20:00:00', 'User18'),
(52, 'Siska Andini', '1993-02-28', 'Mataram', 'perempuan', '083456789123', 'Kota Mataram, Mataram Barat, Karang Pule, Lingkungan 7', '', '2024-11-06 21:00:00', '2024-11-06 21:00:00', 'Admin'),
(53, 'David Wijaya', '1994-07-19', 'Surabaya', 'laki-laki', '085678912345', 'Kota Surabaya, Wonokromo, Dukuh Pakis, Lingkungan 6', '', '2024-11-06 22:00:00', '2024-11-06 22:00:00', 'User19'),
(54, 'Andi Supriyadi', '1985-02-13', 'Makassar', 'laki-laki', '081234567800', 'Kota Makassar, Tamalanrea, Biringkanaya, Lingkungan 2', '', '2024-11-07 08:00:00', '2024-11-07 08:00:00', 'Admin'),
(55, 'Rizki Ramadhani', '1991-06-21', 'Medan', 'laki-laki', '081345678901', 'Kota Medan, Medan Baru, Sei Putih, Lingkungan 5', '', '2024-11-07 09:00:00', '2024-11-07 09:00:00', 'User20'),
(56, 'Siti Hajar', '1987-10-30', 'Palembang', 'perempuan', '085678901234', 'Kota Palembang, Seberang Ulu, Kertapati, Lingkungan 4', '', '2024-11-07 10:00:00', '2024-11-07 10:00:00', 'User21'),
(57, 'Hendra Wijaya', '1993-04-17', 'Semarang', 'laki-laki', '082234567890', 'Kota Semarang, Semarang Timur, Kaligawe, Lingkungan 6', '', '2024-11-07 11:00:00', '2024-11-07 11:00:00', 'User22'),
(58, 'Aulia Lestari', '1989-12-12', 'Bandung', 'perempuan', '086789012345', 'Kota Bandung, Cibeunying, Padasuka, Lingkungan 1', '', '2024-11-07 12:00:00', '2024-11-07 12:00:00', 'Admin'),
(59, 'Rudy Hartono', '1990-05-28', 'Surabaya', 'laki-laki', '089123456780', 'Kota Surabaya, Gubeng, Ketintang, Lingkungan 3', '', '2024-11-07 13:00:00', '2024-11-07 13:00:00', 'User23'),
(60, 'Maya Dwi', '1986-07-22', 'Bali', 'perempuan', '083456789001', 'Kota Denpasar, Denpasar Utara, Peguyangan, Lingkungan 7', '', '2024-11-07 14:00:00', '2024-11-07 14:00:00', 'User24'),
(61, 'Dimas Saputra', '1995-03-15', 'Bekasi', 'laki-laki', '082987654321', 'Kota Bekasi, Jatiasih, Jatisari, Lingkungan 2', '', '2024-11-07 15:00:00', '2024-11-07 15:00:00', 'User25'),
(62, 'Yuli Setiawati', '1991-08-11', 'Malang', 'perempuan', '087654321098', 'Kota Malang, Sukun, Ciptomulyo, Lingkungan 5', '', '2024-11-07 16:00:00', '2024-11-07 16:00:00', 'Admin'),
(63, 'Reza Pratama', '1992-09-05', 'Tangerang', 'laki-laki', '081678912345', 'Kota Tangerang, Ciputat, Sawah Lama, Lingkungan 3', '', '2024-11-07 17:00:00', '2024-11-07 17:00:00', 'User26'),
(64, 'Nurul Huda', '1988-11-19', 'Makassar', 'perempuan', '082345678912', 'Kota Makassar, Panakkukang, Tamamaung, Lingkungan 8', '', '2024-11-07 18:00:00', '2024-11-07 18:00:00', 'User27'),
(65, 'Aditya Kusuma', '1990-01-28', 'Yogyakarta', 'laki-laki', '086789123456', 'Kota Yogyakarta, Tegalrejo, Bener, Lingkungan 4', '', '2024-11-07 19:00:00', '2024-11-07 19:00:00', 'User28'),
(66, 'Rina Kurniasih', '1994-06-08', 'Semarang', 'perempuan', '084321098765', 'Kota Semarang, Gayamsari, Tlogosari, Lingkungan 6', '', '2024-11-07 20:00:00', '2024-11-07 20:00:00', 'Admin'),
(67, 'Budi Santoso', '1991-04-03', 'Medan', 'laki-laki', '083214567890', 'Kota Medan, Medan Barat, Kampung Baru, Lingkungan 1', '', '2024-11-07 21:00:00', '2024-11-07 21:00:00', 'User29'),
(68, 'Mira Adinda', '1993-10-25', 'Padang', 'perempuan', '089876543210', 'Kota Padang, Lubuk Begalung, Pengambiran, Lingkungan 9', '', '2024-11-07 22:00:00', '2024-11-07 22:00:00', 'User30'),
(69, 'Rama Wijaya', '1982-12-15', 'Surabaya', 'laki-laki', '081234567811', 'Kota Surabaya, Wonokromo, Dukuh Kupang, Lingkungan 5', '', '2024-11-07 08:00:00', '2024-11-07 08:00:00', 'Admin'),
(70, 'Linda Maretha', '1996-09-22', 'Jakarta', 'perempuan', '082345678812', 'Kota Jakarta Timur, Cipayung, Pondok Ranggon, Lingkungan 4', '', '2024-11-07 09:00:00', '2024-11-07 09:00:00', 'User31'),
(71, 'Hadi Santoso', '1985-07-10', 'Bandung', 'laki-laki', '083456789013', 'Kota Bandung, Cicendo, Pajajaran, Lingkungan 3', '', '2024-11-07 10:00:00', '2024-11-07 10:00:00', 'User32'),
(72, 'Anisa Putri', '1993-03-29', 'Bali', 'perempuan', '084567890124', 'Kota Denpasar, Denpasar Barat, Pemecutan Kelod, Lingkungan 2', '', '2024-11-07 11:00:00', '2024-11-07 11:00:00', 'Admin'),
(73, 'Rendy Pratama', '1991-11-08', 'Malang', 'laki-laki', '085678901235', 'Kota Malang, Blimbing, Polowijen, Lingkungan 1', '', '2024-11-07 12:00:00', '2024-11-07 12:00:00', 'User33'),
(74, 'Sari Kusuma', '1987-05-15', 'Yogyakarta', 'perempuan', '086789012346', 'Kota Yogyakarta, Jetis, Gowongan, Lingkungan 7', '', '2024-11-07 13:00:00', '2024-11-07 13:00:00', 'User34'),
(75, 'Dion Wijaya', '1990-02-12', 'Medan', 'laki-laki', '087890123457', 'Kota Medan, Medan Helvetia, Helvetia Tengah, Lingkungan 6', '', '2024-11-07 14:00:00', '2024-11-07 14:00:00', 'Admin'),
(76, 'Yuni Lestari', '1992-04-25', 'Makassar', 'perempuan', '088901234568', 'Kota Makassar, Tamalate, Mangasa, Lingkungan 9', '', '2024-11-07 15:00:00', '2024-11-07 15:00:00', 'User35'),
(77, 'Bambang Hartono', '1984-08-03', 'Semarang', 'laki-laki', '089012345679', 'Kota Semarang, Genuk, Terboyo Wetan, Lingkungan 3', '', '2024-11-07 16:00:00', '2024-11-07 16:00:00', 'User36'),
(78, 'Rika Sulastri', '1989-10-17', 'Padang', 'perempuan', '081123456780', 'Kota Padang, Padang Utara, Air Tawar Barat, Lingkungan 4', '', '2024-11-07 17:00:00', '2024-11-07 17:00:00', 'User37'),
(79, 'Teguh Wibowo', '1986-12-29', 'Bekasi', 'laki-laki', '082234567891', 'Kota Bekasi, Pondok Gede, Jatibening, Lingkungan 5', '', '2024-11-07 18:00:00', '2024-11-07 18:00:00', 'Admin'),
(80, 'Mira Adelia', '1994-11-11', 'Tangerang', 'perempuan', '083345678902', 'Kota Tangerang, Karawaci, Bencongan, Lingkungan 2', '', '2024-11-07 19:00:00', '2024-11-07 19:00:00', 'User38'),
(81, 'Dedi Saputra', '1987-01-19', 'Medan', 'laki-laki', '084456789013', 'Kota Medan, Medan Tembung, Bandar Khalipah, Lingkungan 8', '', '2024-11-07 20:00:00', '2024-11-07 20:00:00', 'User39'),
(82, 'Putri Ramadhani', '1995-06-23', 'Bandung', 'perempuan', '085567890124', 'Kota Bandung, Coblong, Dago, Lingkungan 1', '', '2024-11-07 21:00:00', '2024-11-07 21:00:00', 'User40'),
(83, 'Anton Nugroho', '1993-09-05', 'Jakarta', 'laki-laki', '086678901235', 'Kota Jakarta Barat, Kebon Jeruk, Kedoya, Lingkungan 4', '', '2024-11-07 22:00:00', '2024-11-07 22:00:00', 'User41'),
(92, 'aaaaaa', '2024-10-31', 'asdasd', 'laki-laki', '1234567890', 'Kab. Minahasa Tenggara, Ratatotok, Ratatotok Selatan, Lingkungan 1', '{\"city\":\"71.07\",\"kecamatan\":\"71.07.04\",\"kelurahan\":\"71.07.04.2003\",\"lingkungan\":\"1\"}', '2024-11-08 21:14:17', '2024-11-08 21:14:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_live`
--

CREATE TABLE `tb_live` (
  `id` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_live`
--

INSERT INTO `tb_live` (`id`, `link`) VALUES
(1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Z4-FjbA4fzw?si=jbUZLalT0pIh8fmB\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jemaat`
--
ALTER TABLE `tb_jemaat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_live`
--
ALTER TABLE `tb_live`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_jemaat`
--
ALTER TABLE `tb_jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_live`
--
ALTER TABLE `tb_live`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
