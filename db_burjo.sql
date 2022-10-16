-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 03:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_burjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username_admin` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `nama`, `email`, `password`, `id_lokasi`) VALUES
('admin_1', 'rizal', 'rizal@gmail.com', '3d2326d4ff44929b3ffcd526c1a7870f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `waktu_pembelian` date NOT NULL,
  `price` bigint(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `user_username_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `waktu_pembelian`, `price`, `status`, `user_username_user`) VALUES
(1, '2022-10-01', 20000, 'Takeaway', 'user1'),
(2, '2022-10-02', 30000, 'Selesai', 'user1'),
(3, '2022-10-03', 40000, 'Selesai', 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` bigint(12) NOT NULL,
  `menu_id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `nama`, `email`, `no_telepon`, `menu_id_menu`) VALUES
('user1', 'ee11cbb19052e40b07aac0ca060c23ee', 'jeri', 'jeri@yahoo.com', 82431643783, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `alamat`) VALUES
(1, 'BurjoPolsek', 'Deket Polsek Pokoknya');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `images`) VALUES
(-10, 'nasi ayam bali', 13000, 'https://i0.wp.com/resepkoki.id/wp-content/uploads/2020/03/Resep-Nasi-Campur-Bali.jpg?fit=1474%2C1445&ssl=1'),
(-9, 'Mie Dok Dok', 12000, 'https://cdn.idntimes.com/content-images/community/2018/04/mie-kuah-pedas-pengusahasukses-3e6a4e625a774c03ff2ab0790498213c_600x400.jpg'),
(-8, 'Mie Tek Tek', 12000, 'https://img-global.cpcdn.com/recipes/4ea61585c9ac0282/400x400cq70/photo.jpg'),
(-7, 'Magelangan', 13000, 'https://asset.kompas.com/crops/Aprv8FWSU3AmRPIi8wmgBUtUuGI=/0x0:6000x4000/750x500/data/photo/2020/04/15/5e966c3becce7.jpg'),
(-6, 'Mie Goreng', 12000, 'https://asset.kompas.com/crops/032NyNKaO9X61kL1ZpU9AS4khrU=/52x28:954x629/750x500/data/photo/2020/11/19/5fb641f087a66.jpg'),
(-5, 'Omelet', 14000, 'https://awsimages.detik.net.id/community/media/visual/2022/04/02/resep-omelet-tomat_43.jpeg?w=700&q=90'),
(-4, 'Orak Arik Telur', 11000, 'https://awsimages.detik.net.id/community/media/visual/2022/04/06/resep-telur-orak-arik-pakai-2-bahan_43.jpeg?w=1200'),
(12, 'Bebek Goreng', 27000, 'https://asset.kompas.com/crops/UhV2ngrlUWo92yJyruxM7I-vSNE=/69x65:869x598/750x500/data/photo/2021/11/25/619f7dc86e939.jpg'),
(1000, 'Es Teh', 3000, 'https://i.pinimg.com/originals/5d/31/ef/5d31ef90cd6c389e07bc48a08e583122.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `waktu_pemesanan` date NOT NULL,
  `antrian_id_antrian` int(11) NOT NULL,
  `admin_username_admin` varchar(200) NOT NULL,
  `id_menu_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `waktu_pemesanan`, `antrian_id_antrian`, `admin_username_admin`, `id_menu_pemesanan`) VALUES
(1, '2022-10-01', 1, 'admin_1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `total_pembayaran` bigint(11) NOT NULL,
  `menu` varchar(200) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `user_username_user` varchar(200) NOT NULL,
  `admin_username_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `total_pembayaran`, `menu`, `waktu_transaksi`, `user_username_user`, `admin_username_admin`) VALUES
(1, 13000, 'nasi goreng\r\nes teh manis', '2022-10-01', 'user1', 'admin_1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` bigint(12) NOT NULL,
  `saldo` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `email`, `no_telepon`, `saldo`) VALUES
('user1', '6ad14ba9986e3615423dfca256d04e3f', 'jeri', 'jeri@yahoo.com', 82431643783, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `user_username_user` (`user_username_user`),
  ADD KEY `total_harga` (`price`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `menu_id_menu` (`menu_id_menu`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `admin_username_admin` (`admin_username_admin`),
  ADD KEY `antrian_id_antrian` (`antrian_id_antrian`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `user_username_user` FOREIGN KEY (`user_username_user`) REFERENCES `login` (`username`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `admin_username_admin` FOREIGN KEY (`admin_username_admin`) REFERENCES `admin` (`username_admin`),
  ADD CONSTRAINT `antrian_id_antrian` FOREIGN KEY (`antrian_id_antrian`) REFERENCES `antrian` (`id_antrian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
