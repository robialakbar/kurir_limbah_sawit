-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2021 pada 11.55
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(175) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `images` varchar(175) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `website`, `phone`, `fax`, `alamat`, `images`) VALUES
(1, 'PT. DELTA SKY TECHNINDO', 'skyseven.io', 'https://skyseven.io', '081220729369', '081220729369', 'Jl. Raya Proklamasi No. 17 Kel. Tanjung Mekar Kec. Karawang Barat - Karawang, Jawa Barat 41311 Indonesia', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlite`
--

CREATE TABLE `outlite` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `address` varchar(75) NOT NULL,
  `pic` varchar(75) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `outlite`
--

INSERT INTO `outlite` (`id`, `name`, `address`, `pic`, `phone`) VALUES
(1, 'Master Website Indonesia', 'Karawang Barat', 'Deni Darmayana', '081229729369');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `code` varchar(75) NOT NULL,
  `outlite` int(11) NOT NULL,
  `jml` varchar(75) NOT NULL,
  `jml_liter` int(11) NOT NULL,
  `jml_kemasan` int(11) NOT NULL,
  `jenis_kemasan` varchar(75) NOT NULL,
  `jenis` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ket` text NOT NULL,
  `kurir` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `tgl_terima` datetime NOT NULL,
  `note` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id`, `code`, `outlite`, `jml`, `jml_liter`, `jml_kemasan`, `jenis_kemasan`, `jenis`, `harga`, `total`, `ket`, `kurir`, `created_at`, `status`, `tgl_terima`, `note`, `jumlah`, `bayar`) VALUES
(5, 'INV-051221-00001', 1, '20', 3200, 160, 'Jeligen', 0, 6000, 0, 'Buruan', 6, '2021-12-06 16:28:34', 2, '2021-12-05 17:41:58', 'Isikan Catatan', 0, 19200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `level`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1, '0000-00-00 00:00:00'),
(6, 'kurir', 'bb31e9f1f03ad601eb8fb53e4f663039', 'Kurir', 3, '2021-12-05 15:12:11'),
(8, 'owner', '72122ce96bfec66e2396d2e25225d70a', 'Owner', 2, '2021-12-05 15:14:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlite`
--
ALTER TABLE `outlite`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlite` (`outlite`),
  ADD KEY `kurir` (`kurir`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `outlite`
--
ALTER TABLE `outlite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`outlite`) REFERENCES `outlite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`kurir`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
