-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Jul 2023 pada 05.45
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `no_antrian` tinyint(3) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`no_antrian`, `jam_mulai`, `jam_selesai`) VALUES
(1, '09:00:00', '09:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` tinyint(11) NOT NULL,
  `id_tahanan` tinyint(16) NOT NULL,
  `id_pengunjung` tinyint(16) NOT NULL,
  `jenis_barang` char(20) NOT NULL,
  `keterangan` char(20) NOT NULL,
  `jumlah` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_tahanan`, `id_pengunjung`, `jenis_barang`, `keterangan`, `jumlah`) VALUES
(1, 4, 1, 'Pakaian', 'Baju', 2),
(2, 1, 2, 'buku', 'buku', 1),
(3, 1, 3, 'buku', 'buku', 1),
(4, 1, 4, 'buku', 'buku', 1),
(5, 1, 5, 'buku', 'buku', 1),
(6, 1, 6, 'buku', 'buku', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`) VALUES
(1, 'Ahmad Jamaluddin'),
(2, 'Ahmad Alfian'),
(3, 'Yanto'),
(4, 'Irsyad Rahman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` tinyint(1) NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `ket`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` tinyint(4) NOT NULL,
  `nama_kelas` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Kelas A'),
(2, 'Kelas B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` tinyint(11) NOT NULL,
  `id_pengunjung` tinyint(16) NOT NULL,
  `id_sesi` tinyint(2) DEFAULT NULL,
  `id_status_kunjungan` varchar(5) DEFAULT NULL,
  `no_antrian` tinyint(3) DEFAULT NULL,
  `tgl_kunjungan` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `id_pengunjung`, `id_sesi`, `id_status_kunjungan`, `no_antrian`, `tgl_kunjungan`, `jam_mulai`, `jam_selesai`) VALUES
(0, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 1, '1', 1, '2023-07-02', '09:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `napi`
--

CREATE TABLE `napi` (
  `id_tahanan` tinyint(5) NOT NULL,
  `nik_napi` char(16) NOT NULL,
  `id_jk` tinyint(1) NOT NULL,
  `nama_napi` char(16) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `kasus` char(30) NOT NULL,
  `foto_napi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `napi`
--

INSERT INTO `napi` (`id_tahanan`, `nik_napi`, `id_jk`, `nama_napi`, `tgl_masuk`, `tgl_keluar`, `ruangan`, `kasus`, `foto_napi`) VALUES
(1, '637777', 1, 'Abang', '2020-06-01', '2023-06-30', 'A', 'Narkoboy', '2.png'),
(4, '876554', 1, 'Bang', '2023-05-29', '2025-12-12', 'C', 'Narkoba', '1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` tinyint(5) NOT NULL,
  `id_role` tinyint(11) NOT NULL,
  `id_jk` tinyint(1) NOT NULL,
  `nama_pgw` char(30) NOT NULL,
  `jabatan` char(10) NOT NULL,
  `alamat_pgw` varchar(255) NOT NULL,
  `email_pgw` varchar(255) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp_pgw` char(13) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_role`, `id_jk`, `nama_pgw`, `jabatan`, `alamat_pgw`, `email_pgw`, `username`, `password`, `telp_pgw`, `foto`) VALUES
(1, 1, 2, 'Ani', 'Admin', 'Jl. Jambu', 'ani@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08123456789', '3.png'),
(2, 2, 1, 'Ahmad', 'Penjaga 1', 'Jl. Api', 'Ahmad@gmail.com', 'penjaga', 'a334bd6ce3b666320bad24ddf2955b00', '08129876543', '1.png'),
(3, 3, 1, 'Dodi', 'Pimpinan', 'Jl. AMD', 'dodi@gmail.com', 'pimpinan', '202cb962ac59075b964b07152d234b70', '08523456787', '1.png'),
(4, 1, 2, 'Aida', 'admin', 'Jl. mana', 'aida@gmail.com', 'aida', 'aida123', '08781234567', '3.png'),
(5, 2, 2, 'Syifa', 'Penjaga', 'Jalan Handil Negara KM 12600 RT 4 (Lrus smpi ad rmh 2 lntai.msk ke gang disblhnya. rmh abu²), KAB. BANJAR, KERTAK HANYAR, KALIMANTAN SELATAN, ID, 70654', 'nursyifa@gmail.com', 'syifa', '123', '083140325627', '2.png'),
(6, 1, 1, 'Andi', 'Admin', 'Jl. Air', 'andi@gmail.com', 'andi', '202cb962ac59075b964b07152d234b70', '08123456744', '3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengikut`
--

CREATE TABLE `pengikut` (
  `nik_pengikut` tinyint(16) NOT NULL,
  `id_pengunjung` tinyint(16) NOT NULL,
  `nama_pengikut` char(30) NOT NULL,
  `jk_pengikut` char(2) NOT NULL,
  `relasi` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` tinyint(16) NOT NULL,
  `id_tahanan` tinyint(5) NOT NULL,
  `id_jk` tinyint(1) NOT NULL,
  `id_relasi` tinyint(1) NOT NULL,
  `nama_pjg` varchar(50) NOT NULL,
  `nik_pjg` varchar(16) NOT NULL,
  `alamat_pjg` varchar(255) NOT NULL,
  `pengikut` varchar(255) NOT NULL,
  `vaksin` varchar(100) NOT NULL,
  `kk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `id_tahanan`, `id_jk`, `id_relasi`, `nama_pjg`, `nik_pjg`, `alamat_pjg`, `pengikut`, `vaksin`, `kk`) VALUES
(1, 4, 1, 4, 'Ara', '345', 'hk', 'd', '3.png', '1.png'),
(2, 1, 1, 4, 'Budi', '1234', 'jalan', 'Nama, ada, dia.', '1.png', '2.png'),
(3, 1, 1, 4, 'Budi', '1234', 'jalan', 'Nama, ada, dia.', '1.png', '2.png'),
(4, 1, 1, 4, 'Budi', '1234', 'jalan', 'Nama, ada, dia.', '1.png', '2.png'),
(5, 1, 1, 4, 'Budi', '1234', 'jalan', 'Nama, ada, dia.', '1.png', '2.png'),
(6, 1, 1, 4, 'Budi', '1234', 'jalan', 'Nama, ada, dia.', '1.png', '2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` tinyint(1) NOT NULL,
  `hub` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `hub`) VALUES
(1, 'Istri'),
(2, 'Orang Tua'),
(3, 'Anak'),
(4, 'Saudara'),
(5, 'Kuasa Hukum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(11) NOT NULL,
  `nama_role` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'penjaga'),
(3, 'pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `nama_santri` char(45) NOT NULL,
  `nama_alias` char(45) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id_santri`, `nama_santri`, `nama_alias`, `id_guru`, `id_kelas`) VALUES
(1, 'Hasanah Juliaty', 'Nana', 2, 1),
(2, 'Akmal', 'Mal', 2, 2),
(3, 'Dikman Budiman', 'Men', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi`
--

CREATE TABLE `sesi` (
  `id_sesi` tinyint(2) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `jam_mulai`, `jam_selesai`) VALUES
(1, '09:00:00', '12:00:00'),
(2, '14:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kunjungan`
--

CREATE TABLE `status_kunjungan` (
  `id_status _kunjungan` varchar(5) NOT NULL,
  `Nama_status` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_kunjungan`
--

INSERT INTO `status_kunjungan` (`id_status _kunjungan`, `Nama_status`) VALUES
('1', 'Belum Melakukan Kunjungan'),
('2', 'Sedang Melakukan Kunjungan'),
('3', 'Selesai Kunjungan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`no_antrian`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_tahanan` (`id_tahanan`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`) USING BTREE,
  ADD KEY `id_status_kunjungan` (`id_status_kunjungan`),
  ADD KEY `id_pengunjung` (`id_pengunjung`,`id_sesi`,`no_antrian`),
  ADD KEY `no_antrian` (`no_antrian`),
  ADD KEY `id_sesi` (`id_sesi`);

--
-- Indeks untuk tabel `napi`
--
ALTER TABLE `napi`
  ADD PRIMARY KEY (`id_tahanan`),
  ADD KEY `id_jk` (`id_jk`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_jk` (`id_jk`);

--
-- Indeks untuk tabel `pengikut`
--
ALTER TABLE `pengikut`
  ADD PRIMARY KEY (`nik_pengikut`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`),
  ADD KEY `id_jk` (`id_jk`),
  ADD KEY `id_tahanan` (`id_tahanan`),
  ADD KEY `id_relasi` (`id_relasi`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indeks untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indeks untuk tabel `status_kunjungan`
--
ALTER TABLE `status_kunjungan`
  ADD PRIMARY KEY (`id_status _kunjungan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `no_antrian` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `napi`
--
ALTER TABLE `napi`
  MODIFY `id_tahanan` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` tinyint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id_sesi` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_tahanan`) REFERENCES `napi` (`id_tahanan`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`id_status_kunjungan`) REFERENCES `status_kunjungan` (`id_status _kunjungan`),
  ADD CONSTRAINT `kunjungan_ibfk_4` FOREIGN KEY (`no_antrian`) REFERENCES `antrian` (`no_antrian`),
  ADD CONSTRAINT `kunjungan_ibfk_5` FOREIGN KEY (`id_sesi`) REFERENCES `sesi` (`id_sesi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kunjungan_ibfk_6` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `napi`
--
ALTER TABLE `napi`
  ADD CONSTRAINT `napi_ibfk_1` FOREIGN KEY (`id_jk`) REFERENCES `jenis_kelamin` (`id_jk`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jk`) REFERENCES `jenis_kelamin` (`id_jk`);

--
-- Ketidakleluasaan untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD CONSTRAINT `pengunjung_ibfk_2` FOREIGN KEY (`id_jk`) REFERENCES `jenis_kelamin` (`id_jk`),
  ADD CONSTRAINT `pengunjung_ibfk_3` FOREIGN KEY (`id_tahanan`) REFERENCES `napi` (`id_tahanan`),
  ADD CONSTRAINT `pengunjung_ibfk_4` FOREIGN KEY (`id_relasi`) REFERENCES `relasi` (`id_relasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
