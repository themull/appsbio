-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2020 at 08:22 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u3237443_appsbiomagg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('maultamvan', '$2y$10$nzWMuMgnGVexclBwx80SWe/YrQ3SwI.B9yqPpbeCkGn17DaoAfaUC');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(3) NOT NULL,
  `nama_driver` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `no_hp`, `username`, `password`) VALUES
(1, 'judi', '1023124135', 'juditet', '$2y$10$5/pevPtViDNgziMmdEwjSuoK4eEOZLBGyimtNfusdK6TObkAE6ahW'),
(2, 'Kusnandar', '08561982738', 'Kusnandar', '$2y$10$3rluUCWnBgRqFGgPoSsWeu9IUToPfCvi8EgXkruhDRvQEC62N2EnC'),
(3, 'Hidayatullah ', '0852783790183', 'Dayat', '$2y$10$z.8YPnvaJGCRG80xshyb5.TZYcdf5e4ZChYeyscF7gGAkCyeR3GjS');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `jadwal_waktu` time NOT NULL,
  `jadwal_kegiatan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jadwal_tanggal`, `jadwal_waktu`, `jadwal_kegiatan`, `deskripsi`, `harga`) VALUES
(1, '2020-08-10', '09:00:00', 'cara mengolah sampah', 'mempelajari cara mengolah sampah , mulai dari memilih sampah kering dan basah, kemudia proses mendaur ulang', 20000),
(2, '2020-08-26', '10:00:00', 'Membudidayakan maggot', 'mempelajari cara mengolah sampah menjadi maggot, dan cara pengunaannya', 30000),
(3, '2020-08-11', '06:10:00', 'Mengenalkan jenis-jenis sampah ', 'Cara membedakan sampah basah dan sampah kering ', 50000),
(4, '2020-08-25', '04:08:00', 'Mengolah Sampah Organik', 'Mengolah sampah organik dengan cara penguraian dan penyortiran sampah', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `jemput`
--

CREATE TABLE `jemput` (
  `id_jemput` int(8) NOT NULL,
  `jemput_tanggal` date NOT NULL,
  `jemput_waktu` time NOT NULL,
  `jemput_tempat` text NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(6) NOT NULL,
  `id_user` int(5) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `id_driver` int(3) NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jemput`
--

INSERT INTO `jemput` (`id_jemput`, `jemput_tanggal`, `jemput_waktu`, `jemput_tempat`, `ukuran`, `keterangan`, `harga`, `id_user`, `status`, `id_driver`, `waktu_selesai`) VALUES
(18, '2020-08-10', '20:17:05', 'Jl.Tanjung Barat Rt01/02,Jakarta Selatan', 'Sedang', 'Sampah organik dan non organik', 10000, 16, 3, 2, '00:00:00'),
(19, '2020-08-10', '21:07:51', 'jl. melati', 'Besar', 'makanan', 15000, 11, 4, 1, '00:00:00'),
(20, '2020-08-11', '11:27:16', 'jl. kenangan', 'Besar', 'plastik', 15000, 11, 4, 1, '00:00:00'),
(21, '2020-08-11', '11:28:57', 'jl. pondok gede no 57 rt 01 rw 01 tajurhalang , jatiwaringin , bekasi , jawa Barat', 'Sedang', 'sampah organik', 10000, 11, 4, 1, '00:00:00'),
(25, '2020-08-11', '13:34:34', 'condet, batu ampar', 'Besar', 'sampah masa lalu', 15000, 19, 2, 2, '00:00:00'),
(26, '2020-08-13', '05:35:49', 'jl. sarjana rt 011/09 no.69, srengseng sawah, jagakarsa, jakarta selatan', 'Kecil', 'sampah makanan', 5000, 9, 2, 2, '00:00:00'),
(27, '2020-08-13', '05:36:19', 'Jl. Camat Gabun', 'Besar', 'makanan', 15000, 17, 1, 1, '00:00:00'),
(28, '2020-08-24', '11:09:51', 'jl. melati', 'Sedang', 'makanan', 10000, 11, 4, 1, '00:00:00'),
(29, '2020-08-24', '22:55:51', 'Jl.Raya Bogor', 'Besar', 'Isi ada ikan tuna dan plastik', 15000, 26, 2, 2, '00:00:00'),
(30, '2020-08-25', '19:59:22', 'Jakarta', 'Besar', 'plastik dan sayuran', 15000, 3, 3, 2, '00:00:00'),
(31, '2020-09-01', '16:27:03', 'jalan jalan', 'Kecil', 'organik', 5000, 6, 4, 1, '00:00:00'),
(32, '2020-09-09', '17:41:56', 'Jakarta', 'Kecil', 'sampah basah', 5000, 3, 1, 1, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(8) NOT NULL,
  `pelatihan_tanggal` varchar(30) NOT NULL,
  `pelatihan_waktu` time NOT NULL,
  `pelatihan_kegiatan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(6) NOT NULL,
  `id_jadwal` int(10) NOT NULL,
  `id_user` int(5) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `pelatihan_tanggal`, `pelatihan_waktu`, `pelatihan_kegiatan`, `deskripsi`, `harga`, `id_jadwal`, `id_user`, `status`) VALUES
(2, '2020-07-30', '09:00:00', 'cara mengolah sampah', 'mempelajari cara mengolah sampah , mulai dari memilih sampah kering dan basah, kemudia proses mendaur ulang', 20000, 1, 1, 1),
(5, '2020-08-03', '10:00:00', 'Membudidayakan maggot', 'mempelajari cara mengolah sampah menjadi maggot, dan cara pengunaannya', 30000, 2, 3, 1),
(6, '2020-08-10', '09:00:00', 'cara mengolah sampah', 'mempelajari cara mengolah sampah , mulai dari memilih sampah kering dan basah, kemudia proses mendaur ulang', 20000, 1, 16, 1),
(9, '2020-08-12', '10:00:00', 'Membudidayakan maggot', 'mempelajari cara mengolah sampah menjadi maggot, dan cara pengunaannya', 30000, 2, 17, 1),
(12, '2020-08-26', '10:00:00', 'Membudidayakan maggot', 'mempelajari cara mengolah sampah menjadi maggot, dan cara pengunaannya', 30000, 2, 26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `no_hp`, `alamat`, `password`) VALUES
(1, 'Muhammad Maulana Yusuf', 'mmaulanayusuf69@gmail.com', '089650869408', 'Depok', '$2y$10$jbagj1Ely6PqB/fxIMWzjeIltG5TWYtoV5JisMcaN1ZyrzzaD0liK'),
(3, 'Ilham Dwi Putra', 'ilhamdwi69@gmail.com', '0867397293781', 'Jakarta', '$2y$10$ZJJNMpImIKh8HmE.TcK0Y.ImsVxQCUF1NOzDrNEztF6wYnTSLFQ3y'),
(6, 'mamankgarox', 'mamankgarox@gmail.com', '85231648', 'jalan jalan', '$2y$10$CetdF8rVAUZUY9KEA8/pO.c2g.KYftRGBEcQmF/37t/vydwPhCbLm'),
(7, 'riri', 'lukitasariadelia8@gmail.com', '085156897471', 'sukamaju', '$2y$10$9xiQKm/PgRZS25lIbyfIx.wV4j1.pnoUqiytykfmnUVuOfj1DiISy'),
(8, 'SAIFUL BAHRI', 'saipul.22bahri@gmail.com', '082110231186', 'DEPOK', '$2y$10$KbXz2sdqjbQWEQ.xMVsigugovXocIIpgwwJskaTzYH6QmvL58ftDu'),
(9, 'Sauki Adam', 'nkiddlaura@gmail.com', '087889433578', 'jl. sarjana rt 011/09 no.69, srengseng sawah, jagakarsa, jakarta selatan', '$2y$10$0WY7SOVtUqMWa0.f2YR8Cuv.wQteE/zMyQXbgF0F4mGI67nx26exG'),
(10, 'jrihh', 'fajri07@gmail.com', '085699112244', 'jl. melati', '$2y$10$ZL77dIKiYgvv5YVewJV32OW4639kWfgoOezRvGYb05kmkclZqU3wu'),
(11, 'fajrianto', 'msfajrianto07@gmail.com', '085644112233', 'jl. melati', '$2y$10$lfTZk6t3bPsUnzDeA4TgleEOyXDKGBZryNg9BgJ213mT14nh2K2/2'),
(12, 'Novia', 'noviafnissa@gmail.com', '08128223397', 'Citayam', '$2y$10$MCjzAsdVO/YV/teGdK2oku/bGFGX9qi7DBmOHelPNlm/hMM9QMh8a'),
(13, 'snow wait', 'indienewt@gmail.com', '089620661769', 'jl bunga mawar', '$2y$10$U6m90sweaWdZGjU7RDH0a.2vCs8RKpTILJalUOfp1y5caD5TCVAqG'),
(15, 'rojali', 'rojaliganz@gmail.com', '085231645', 'gang guan', '$2y$10$.tseinVYRBlglKZe.61o9eBUQgix7E7NT9edTOVr0e86wXCxamHpS'),
(16, 'Rafa ganesha', 'rafaganesha12@gmail.com', '08386124580', 'Jl.Tanjung Barat Rt01/02,Jakarta Selatan', '$2y$10$X4CI8PmYqHyDD.36Dko0Z.A/29NHWY9zglT34xN24WBGfRSoEZRBi'),
(17, 'ANGELIA JANIATI', 'anabelleqqq@gmail.com', '08991667894', 'Jl. Camat Gabun', '$2y$10$0fLcOhO05CbpPwK15R/EOOhY2ozD8XqqcAHgPnNY5kqFuerBT6hyi'),
(18, 'snow wait', 'eh.snowait@gmail.com', '089602661769', 'jln bunga mawar', '$2y$10$cd0lUFUjrd8X/TcWp6FCXOIDcMr7/Dd0oY0Ph37NXWtKYfCQkugnK'),
(19, 'ade', 'adepurnama06@gmail.com', '0895327073239', 'condet, batu ampar', '$2y$10$zoammVBvKQgeTHHJBquWUOrxLyPAJWZ2KXawh0ReVxU2Qtbbg6oyS'),
(20, 'judiiii', 'judiiilpw@gmail.com', '0876431248', 'gang guan', '$2y$10$4/C7I82mqXdA8VCHF8uRGeN8MGgufQvehYmrCNqvgnNETtOUItDAG'),
(21, 'text', 'text', '5555555555', 'text', '$2y$10$XC3Yy6yUstX0h9KcxCcBIuQwdElrieoKe5XihJq66VFh3q2zfqBNC'),
(22, 'john', 'babel3126341@gmail.com', '082136704408', 'setiabudi 12', '$2y$10$cFVTTw/6vJAo8su/L7BFpu0JuVRIgb98kzNRq0EtjK.76nST249mG'),
(23, 'roni', 'roni123@gmail.com', '0822967634319', 'rumah', '$2y$10$SN.sRUL8szObW.wSphXgX.KHKACZkds/cbzLg5.tGrf2TUzhe8Jli'),
(24, 'Anang', 'bhonang203@gmail.com', '081380110274', 'jl alamanda', '$2y$10$J9eHET7/ywumMCV.m6msuOg8LiIak9VrKDkM4nAaS7.NmrtrY12Ha'),
(25, 'mamank', 'mamankgarox1@gmail.com', '085123456789', 'gang guan', '$2y$10$WzO5Ip5C8SvBQmu.51.k8OhKfOpap/Lr3.4vSu3gATKqdSi9KCwC2'),
(26, 'jayludin', 'jayludin69@gmail.com', '0857289384980', 'Jl Lenteng agung timur,Jakarta Keras', '$2y$10$p2lRU77cP.wT.sGgUIcwbOfclJKcgqGY4R3HRzUhHI3gpd/dlsleK'),
(27, '123', '...', '123', '...', '$2y$10$/q2WeWFByFq7UY1m47elAOuYUzMZ0U2SojKOgHVtGm5lkL3Jaqidq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jemput`
--
ALTER TABLE `jemput`
  ADD PRIMARY KEY (`id_jemput`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_driver` (`id_driver`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jemput`
--
ALTER TABLE `jemput`
  MODIFY `id_jemput` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
