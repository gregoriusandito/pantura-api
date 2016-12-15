-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 12:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pantura`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tempat_kuliner`
--

CREATE TABLE `feedback_tempat_kuliner` (
  `id_feedback_tk` int(11) NOT NULL,
  `id_tempat_kuliner` int(11) NOT NULL,
  `judul` text NOT NULL,
  `feedback` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tempat_wisata`
--

CREATE TABLE `feedback_tempat_wisata` (
  `id_feedback_tw` int(11) NOT NULL,
  `id_tempat_wisata` int(11) NOT NULL,
  `judul` text NOT NULL,
  `feedback` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `nama_kota`, `deskripsi`, `gambar`) VALUES
(1, 'Aceh', 'Aceh adalah sebuah provinsi di Indonesia. Aceh terletak di ujung utara pulau Sumatera dan merupakan provinsi paling barat di Indonesia. Ibu kotanya adalah Banda Aceh. Jumlah penduduk provinsi ini sekitar 4.500.000 jiwa. Letaknya dekat dengan Kepulauan Andaman dan Nikobar di India dan terpisahkan oleh Laut Andaman. Aceh berbatasan dengan Teluk Benggala di sebelah utara, Samudra Hindia di sebelah barat, Selat Malaka di sebelah timur, dan Sumatera Utara di sebelah tenggara dan selatan.', 'aceh.png'),
(2, 'Bangka Belitung', 'Provinsi Kepulauan Bangka Belitung (disingkat Babel) adalah sebuah provinsi di Indonesia yang terdiri dari dua pulau utama yaitu Pulau Bangka dan Pulau Belitung serta pulau-pulau kecil seperti P. Lepar, P. Pongok, P. Mendanau dan P. Selat Nasik, total pulau yang telah bernama berjumlah 470 buah dan yang berpenghuni hanya 50 pulau. Bangka Belitung terletak di bagian timur Pulau Sumatera, dekat dengan Provinsi Sumatera Selatan. Bangka Belitung dikenal sebagai daerah penghasil timah, memiliki pantai yang indah dan kerukunan antar etnis.', 'babel.png'),
(3, 'Bandung', 'Kota Bandung merupakan kota metropolitan terbesar di Provinsi Jawa Barat, sekaligus menjadi ibu kota provinsi tersebut. Kota ini terletak 140 km sebelah tenggara Jakarta, dan merupakan kota terbesar ketiga di Indonesia setelah Jakarta dan Surabaya menurut jumlah penduduk. Selain itu, Kota Bandung juga merupakan kota terbesar di wilayah Pulau Jawa bagian selatan. Sedangkan wilayah Bandung Raya (Wilayah Metropolitan Bandung) merupakan metropolitan terbesar ketiga di Indonesia setelah Jabodetabek.', 'bandung.png'),
(4, 'Banten', 'Banten adalah sebuah provinsi di Tatar Pasundan, serta wilayah paling barat di Pulau Jawa, Indonesia. Provinsi ini pernah menjadi bagian dari Provinsi Jawa Barat, namun menjadi wilayah pemekaran sejak tahun 2000, dengan keputusan Undang-Undang Nomor 23 Tahun 2000. Pusat pemerintahannya berada di Kota Serang.', 'banten.png'),
(5, 'Jakarta', 'Daerah Khusus Ibukota Jakarta (DKI Jakarta) adalah ibu kota negara Republik Indonesia. Jakarta merupakan satu-satunya kota di Indonesia yang memiliki status setingkat provinsi. Jakarta terletak di pesisir bagian barat laut Pulau Jawa. Sebagai pusat bisnis, politik, dan kebudayaan, Jakarta merupakan tempat berdirinya kantor-kantor pusat BUMN, perusahaan swasta, dan perusahaan asing. Kota ini juga menjadi tempat kedudukan lembaga-lembaga pemerintahan dan kantor sekretariat ASEAN. Jakarta dilayani oleh dua bandar udara, yakni Bandara Soekarno–Hatta dan Bandara Halim Perdanakusuma, serta satu pelabuhan laut di Tanjung Priok.', 'jakarta.png'),
(6, 'Malang', 'Kota Malang adalah sebuah kota yang terletak di Provinsi Jawa Timur, Indonesia. Kota ini terletak 90 km sebelah selatan Surabaya dan merupakan kota terbesar di kedua di Jawa Timur setelah Surabaya, serta merupakan salah satu kota terbesar di Indonesia menurut jumlah penduduk. Selain itu, Malang juga merupakan kota terbesar kedua di wilayah Pulau Jawa bagian selatan setelah Bandung. Kota Malang berada di dataran tinggi yang cukup sejuk, dan seluruh wilayahnya berbatasan dengan Kabupaten Malang.', 'malang.png'),
(7, 'Medan', 'Kota Medan adalah ibu kota provinsi Sumatera Utara, Indonesia. Kota ini merupakan kota terbesar di luar Pulau Jawa dan kota metropolitan terbesar ketiga di Indonesia setelah Jakarta dan Surabaya. Kota Medan merupakan pintu gerbang wilayah Indonesia bagian barat dan juga sebagai pintu gerbang bagi para wisatawan untuk menuju objek wisata Brastagi di daerah dataran tinggi Karo, objek wisata penangkaran orang utan di Bukit Lawang, serta kawasan Danau Toba.', 'medan.png'),
(8, 'Padang', 'Kota Padang adalah kota terbesar di pantai barat Pulau Sumatera sekaligus ibu kota dari provinsi Sumatera Barat, Indonesia. Kota ini merupakan pintu gerbang barat Indonesia dari Samudra Hindia. Padang memiliki wilayah seluas 694,96 km² dengan kondisi geografi berbatasan dengan laut dan dikelilingi perbukitan dengan ketinggian mencapai 1.853 mdpl. Berdasarkan data dari Dinas Kependudukan dan Pencatatan Sipil (Disdukcapil) Kota Padang tahun 2014, kota ini memiliki jumlah penduduk sebanyak 1.000.096 jiwa. Padang merupakan kota inti dari pengembangan wilayah metropolitan Palapa.', 'padang.png'),
(9, 'Semarang', 'Kota Semarang adalah ibukota Provinsi Jawa Tengah, Indonesia sekaligus kota metropolitan terbesar kelima di Indonesia sesudah Jakarta, Surabaya, Bandung, dan Medan. Sebagai salah satu kota paling berkembang di Pulau Jawa, Kota Semarang mempunyai jumlah penduduk yang hampir mencapai 2 juta jiwa dan siang hari bisa mencapai 2,5 juta jiwa. Bahkan, Area Metropolitan Kedungsapur (Kendal, Demak, Ungaran Kabupaten Semarang, Kota Salatiga, dan Purwodadi Kabupaten Grobogan) dengan penduduk sekitar 6 juta jiwa, merupakan Wilayah Metropolis terpadat keempat, setelah Jabodetabek (Jakarta), Gerbangkertosusilo (Surabaya), dan Bandung Raya.', 'semarang.png'),
(10, 'Surabaya', 'Kota Surabaya adalah ibu kota Provinsi Jawa Timur, Indonesia sekaligus menjadi kota metropolitan terbesar di provinsi tersebut. Surabaya merupakan kota terbesar kedua di Indonesia setelah Jakarta. Kota Surabaya juga merupakan pusat bisnis, perdagangan, industri, dan pendidikan di Jawa Timur serta wilayah Indonesia bagian timur. Kota ini terletak 796 km sebelah timur Jakarta, atau 415 km sebelah barat laut Denpasar, Bali. Surabaya terletak di tepi pantai utara Pulau Jawa dan berhadapan dengan Selat Madura serta Laut Jawa.', 'surabaya.png'),
(11, 'Yogyakarta', 'Daerah Istimewa Yogyakarta (bahasa Jawa: Dhaérah Istiméwa Ngayogyakarta) adalah Daerah Istimewa setingkat provinsi di Indonesia yang merupakan peleburan Negara Kesultanan Yogyakarta dan Negara Kadipaten Paku Alaman. Daerah Istimewa Yogyakarta terletak di bagian selatan Pulau Jawa, dan berbatasan dengan Provinsi Jawa Tengah dan Samudera Hindia. Daerah Istimewa yang memiliki luas 3.185,80 km persegi ini terdiri atas satu kotamadya, dan empat kabupaten, yang terbagi lagi menjadi 78 kecamatan, dan 438 desa/kelurahan. Menurut sensus penduduk 2010 memiliki populasi 3.452.390 jiwa dengan proporsi 1.705.404 laki-laki, dan 1.746.986 perempuan, serta memiliki kepadatan penduduk sebesar 1.084 jiwa per km persegi', 'jogja.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat_kuliner`
--

CREATE TABLE `tb_tempat_kuliner` (
  `id_tempat_kuliner` int(11) NOT NULL,
  `nama_tempat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `langitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat_wisata`
--

CREATE TABLE `tb_tempat_wisata` (
  `id_tempat_wisata` int(11) NOT NULL,
  `nama_tempat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `langitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `unique_id`, `name`, `email`, `encrypted_password`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'kl2k1k1k', 'mahasiswa', 'mail@unj.ac.id', 'ioioioioio', 'saltsalt', '2016-12-15 00:00:00', '0000-00-00 00:00:00'),
(2, '7838f3fef9045701aba2703', 'dito', 'email', 'nbH+Oh0JsEyYZOQmsx5ePqpimO9iYTI5MDQzNmZh', 'ba290436fa', '2016-12-15 16:56:35', NULL),
(3, 'c2e4c3fe9282115e331fad2', 'Ms', 'mail@yahoo.com', 'g/yR1VwvKO91w2vt6huvlSEEPuJlMWUyZTQ2YTk1', 'e1e2e46a95', '2016-12-15 16:56:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback_tempat_kuliner`
--
ALTER TABLE `feedback_tempat_kuliner`
  ADD PRIMARY KEY (`id_feedback_tk`),
  ADD KEY `id_tempat_kuliner` (`id_tempat_kuliner`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `feedback_tempat_wisata`
--
ALTER TABLE `feedback_tempat_wisata`
  ADD PRIMARY KEY (`id_feedback_tw`),
  ADD KEY `id_tempat_kuliner` (`id_tempat_wisata`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `tb_tempat_kuliner`
--
ALTER TABLE `tb_tempat_kuliner`
  ADD PRIMARY KEY (`id_tempat_kuliner`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `tb_tempat_wisata`
--
ALTER TABLE `tb_tempat_wisata`
  ADD PRIMARY KEY (`id_tempat_wisata`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback_tempat_kuliner`
--
ALTER TABLE `feedback_tempat_kuliner`
  MODIFY `id_feedback_tk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback_tempat_wisata`
--
ALTER TABLE `feedback_tempat_wisata`
  MODIFY `id_feedback_tw` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_tempat_kuliner`
--
ALTER TABLE `tb_tempat_kuliner`
  MODIFY `id_tempat_kuliner` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tempat_wisata`
--
ALTER TABLE `tb_tempat_wisata`
  MODIFY `id_tempat_wisata` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback_tempat_kuliner`
--
ALTER TABLE `feedback_tempat_kuliner`
  ADD CONSTRAINT `feedback_tempat_kuliner_ibfk_1` FOREIGN KEY (`id_tempat_kuliner`) REFERENCES `tb_tempat_kuliner` (`id_tempat_kuliner`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_tempat_kuliner_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback_tempat_wisata`
--
ALTER TABLE `feedback_tempat_wisata`
  ADD CONSTRAINT `feedback_tempat_wisata_ibfk_1` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tb_tempat_wisata` (`id_tempat_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_tempat_wisata_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tempat_kuliner`
--
ALTER TABLE `tb_tempat_kuliner`
  ADD CONSTRAINT `tb_tempat_kuliner_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `tb_kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tempat_wisata`
--
ALTER TABLE `tb_tempat_wisata`
  ADD CONSTRAINT `tb_tempat_wisata_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `tb_kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
