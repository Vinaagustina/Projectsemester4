-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2020 pada 08.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_free_v1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kdbrg` varchar(50) NOT NULL,
  `nmbrg` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `total_terjual` varchar(50) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kdbrg`, `nmbrg`, `harga`, `stock`, `tanggal`, `category_id`, `id_satuan`, `total_terjual`, `id_supplier`) VALUES
(1, 'SBZARA003', 'Sling Bag Zara Crown', 415000, 5, '2020-06-01 11:23:39', 31, 1, '3', 1),
(5, 'ELLGOLD01', 'Ellizabeth Gold HB', 875000, 5, '2019-06-18 18:14:19', 31, 1, '6', 3),
(7, 'PLWB001', 'Waist Bag POLO TGR', 220000, 10, '2019-06-18 20:05:56', 36, 1, '1', 2),
(8, 'ZRTB001', 'Tote Bag Zara Premium', 150000, 1, '2019-06-24 17:47:54', 32, 2, '8', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `category_status` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(23, 'Sling Bag', 'Y'),
(31, 'Handbag', 'Y'),
(32, 'Tote Bag', 'Y'),
(33, 'Drawstring Bag', 'Y'),
(34, 'Clutch', 'Y'),
(35, 'Barrel Bag', 'Y'),
(36, 'Waist Bag', 'Y'),
(37, 'Backpack', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(5) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabkot` varchar(50) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_pembeli`, `alamat_pembeli`, `kelurahan`, `kecamatan`, `kabkot`, `prov`, `no_telepon`, `tanggal`) VALUES
(1, 'teguh dumadi', 'jalan lettunapis 01', 'sudima', 'ciledug', 'tangerang', 'banten', '08128617721', '2019-07-01 21:03:08'),
(2, 'said hasan', 'Jalan Lettunapis 01 RT/RW 003/004', 'sadasdas', 'Ciledug', 'Tangerang', 'Banten', '2312312312312', '2019-07-02 14:04:24'),
(3, 'Devi', 'Mas Mansyur', 'Kebon kacang timur', 'Tanah abang', 'Jakarta pusat', 'DKI Jakarta', '088766566788777', '2019-07-02 20:43:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id_ekspedisi` int(5) NOT NULL,
  `nmekspedisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `nmekspedisi`) VALUES
(3, 'JNT'),
(4, 'TIKI'),
(5, 'JNE'),
(6, 'POS Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `tgl_keranjang` date NOT NULL,
  `jam_keranjang` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_barang`, `id_session`, `tgl_keranjang`, `jam_keranjang`, `qty`) VALUES
(4, 8, '20200611062128', '2020-06-11', '11:21:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_telepon`
--

CREATE TABLE `keranjang_telepon` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_keranjang` datetime NOT NULL,
  `jam_keranjang` text NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang_telepon`
--

INSERT INTO `keranjang_telepon` (`id_keranjang`, `id_barang`, `id_session`, `id_customer`, `tgl_keranjang`, `jam_keranjang`, `qty`, `status`) VALUES
(1, 8, '20190701060246', 2, '2019-07-02 14:21:40', '14:21:40', 2, 1),
(2, 5, '20190701060246', 1, '2019-07-02 14:21:47', '14:21:47', 1, 1),
(3, 5, '20190701060246', 2, '2019-07-02 00:00:00', '14:22:12', 1, 1),
(4, 8, '20190702153730', 3, '2019-07-02 20:44:17', '20:44:17', 3, 1),
(5, 5, '20190702153730', 3, '2019-07-02 20:44:23', '20:44:23', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_orders` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `product_id` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `jam_order` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `product_id`, `jumlah`, `tgl_order`, `jam_order`) VALUES
('PSN190702001', 8, 1, '2019-07-02 11:29:34', '11:29:34'),
('PSN190702002', 8, 1, '2019-07-02 11:29:50', '11:29:50'),
('PSN190702003', 8, 3, '2019-07-02 13:12:07', '13:12:07'),
('PSN190702003', 5, 1, '2019-07-02 13:12:07', '13:12:07'),
('PSN200610004', 5, 2, '2020-06-10 21:51:34', '21:51:34'),
('PSN200610005', 8, 1, '2020-06-10 21:55:11', '21:55:11'),
('PSN200611006', 1, 1, '2020-06-11 13:31:13', '13:31:12'),
('PSN200611007', 5, 1, '2020-06-11 13:31:35', '13:31:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_telepon`
--

CREATE TABLE `order_telepon` (
  `id_orders` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `product_id` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_ekspedisi` int(5) NOT NULL,
  `bank` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `tgl_order` datetime NOT NULL,
  `jam_order` time NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `order_telepon`
--

INSERT INTO `order_telepon` (`id_orders`, `product_id`, `jumlah`, `id_customer`, `id_ekspedisi`, `bank`, `tgl_order`, `jam_order`, `status`) VALUES
('PSN190702001', 8, 1, 1, 5, 'BCA', '2019-07-02 10:23:32', '10:23:32', 1),
('PSN190702004', 5, 1, 1, 5, 'BCA', '2019-07-02 10:26:01', '10:26:01', 1),
('PSN190702002', 5, 1, 1, 5, 'BCA', '2019-07-02 10:24:21', '10:24:21', 1),
('PSN190702003', 5, 1, 1, 5, 'BCA', '2019-07-02 10:25:27', '10:25:27', 1),
('PSN190702005', 8, 1, 1, 5, 'BCA', '2019-07-02 10:26:37', '10:26:37', 1),
('PSN190702007', 8, 2, 1, 5, 'BCA', '2019-07-02 11:31:30', '11:31:30', 1),
('PSN190702006', 7, 1, 1, 5, 'BCA', '2019-07-02 10:53:15', '10:53:15', 1),
('PSN190702006', 8, 2, 1, 5, 'BCA', '2019-07-02 10:53:15', '10:53:15', 1),
('PSN190702007', 5, 2, 1, 5, 'BCA', '2019-07-02 11:31:30', '11:31:30', 1),
('PSN190702007', 7, 1, 1, 5, 'BCA', '2019-07-02 11:31:30', '11:31:30', 1),
('', 8, 3, 1, 0, '', '2019-07-02 12:57:35', '07:57:35', 0),
('', 8, 3, 1, 0, '', '2019-07-02 13:02:34', '08:02:34', 0),
('', 5, 1, 1, 0, '', '2019-07-02 13:02:34', '08:02:34', 0),
('', 8, 2, 1, 0, '', '2019-07-02 13:15:13', '08:15:13', 0),
('', 5, 1, 1, 0, '', '2019-07-02 13:15:13', '08:15:13', 0),
('', 8, 3, 1, 0, '', '2019-07-02 14:03:45', '09:03:45', 0),
('', 5, 2, 1, 0, '', '2019-07-02 14:03:45', '09:03:45', 0),
('', 8, 2, 2, 0, '', '2019-07-02 14:04:33', '09:04:33', 0),
('', 5, 1, 2, 0, '', '2019-07-02 14:04:33', '09:04:33', 0),
('', 8, 2, 2, 0, '', '2019-07-02 14:21:43', '09:21:43', 0),
('', 5, 1, 1, 0, '', '2019-07-02 14:21:49', '09:21:49', 0),
('', 8, 2, 2, 0, '', '2019-07-02 14:22:13', '09:22:13', 0),
('', 5, 1, 2, 0, '', '2019-07-02 14:22:13', '09:22:13', 0),
('', 8, 2, 3, 0, '', '2019-07-02 20:45:07', '15:45:07', 0),
('', 5, 1, 3, 0, '', '2019-07-02 20:45:07', '15:45:07', 0),
('', 8, 3, 3, 0, '', '2019-07-02 21:12:53', '16:12:53', 0),
('', 5, 1, 3, 0, '', '2019-07-02 21:12:53', '16:12:53', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(5) NOT NULL,
  `nmsatuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nmsatuan`) VALUES
(1, 'Piece'),
(2, 'Lusin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telpon`, `email`) VALUES
(1, 'Zara', 'Spanyol', '001334578', 'Zara-CustomerCare@gmail.com'),
(2, 'Ralph Lauren Corp.', 'New York, Amerika', '0019865431', 'Polo_Customer@gmail.com'),
(3, 'PT. Elizabeth Hanjaya', 'Jl. Ibu Inggit Garnasih No. 12 Bandung - Jawa Barat, Indonesia 40242', '082218136730', ' customer_service@elizabethbag.com'),
(4, 'Chanel S.A', 'Paris, Prancis', '001897671', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_foto` text DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_username` varchar(40) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_level` varchar(200) NOT NULL,
  `user_create_date` datetime DEFAULT NULL,
  `user_status` enum('N','Y') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_foto`, `user_name`, `user_username`, `user_password`, `user_level`, `user_create_date`, `user_status`) VALUES
(43, '3100620919download aplikasi pos web denangan booststrap.jpg', 'Nisa Istifadah', 'admin', '$2y$10$DlmbzphG8R0/jKJS5mzS5e.NvitZtMRnaDeCcVHN8q1NbyN3m3V/C', 'super admin', '2017-09-19 07:35:34', 'Y'),
(44, '2831885844download aplikasi pos berbasis web.jpg', 'Aliqa  Aâ€™yunina', 'aliqa', '$2y$10$Gukorg8JuLhU6HFt.t40lecEDiz19rqWUe2EDcHd6Vn1xETb5Eqdu', 'admin', '2017-09-19 07:43:31', 'Y'),
(46, '1275021613download aplikasi pos web dengan php dan mysql.jpg', 'Rosita Hima', 'rosita', '$2y$10$4QVVpa0wi1aPvFLt6uSgwefkn3wfQUp4JQPWv9p.o88RNmRWg4fjW', 'kasir', '2017-10-11 10:29:12', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kdbrg` (`kdbrg`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `tanggal` (`tanggal`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `keranjang_telepon`
--
ALTER TABLE `keranjang_telepon`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_ekspedisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang_telepon`
--
ALTER TABLE `keranjang_telepon`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
