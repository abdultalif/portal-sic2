-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Des 2022 pada 08.08
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `nama_kontrak` varchar(255) NOT NULL,
  `skema` varchar(255) NOT NULL,
  `lingkup` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `dibuat` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontrak`
--

INSERT INTO `kontrak` (`id_kontrak`, `nama_kontrak`, `skema`, `lingkup`, `tanggal`, `jenis`, `file`, `dibuat`, `id_user`) VALUES
(1, 'PT Mondialindo Setya Pratama', 'PHPL', 'PENILIKAN', '2022-02-21', 'Kontrak Auditee', '14d83f563d75393dcd289815d2e065c8.pdf', '1663983463', 1),
(3, 'PT Inhutani I Segah Hulu', 'PHPL', 'PENILIKAN', '2022-01-24', 'Kontrak Auditor', 'e894e02f2358536f4f778538d5e67416.pdf', '1666624186', 1),
(4, 'PT Rimba Makmur Sentosa', 'PHPL', 'SERTIFIKASI AWAL', '2022-01-03', 'Kontrak Auditee', '561f036c903a27990b0bdedab99a427e.pdf', '1666687459', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `legalitas`
--

CREATE TABLE `legalitas` (
  `id_legalitas` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `file` varchar(250) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `dibuat` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `legalitas`
--

INSERT INTO `legalitas` (`id_legalitas`, `nama_file`, `file`, `jenis`, `dibuat`, `id_user`) VALUES
(19, 'Akte RUPS No 14 tgl 20 Mei 2021', 'e697db3cef5be009cd8269963f6ed808.pdf', 'Akta Notaris', '1665371166', 1),
(20, 'Akta Pendirian No. 6 Tanggal 25 Maret 2011', '5209281d5ec4940fef8f088083ec4d88.pdf', 'SK', '1666076317', 1),
(21, 'Akte Perubahan No. 54 Tahun 2019', 'ad2327a0cd1aa5620262056170bd31fc.pdf', 'Akta', '1666684917', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `l_akhir`
--

CREATE TABLE `l_akhir` (
  `id_akhir` int(11) NOT NULL,
  `nama_akhir` varchar(255) NOT NULL,
  `skema` varchar(255) NOT NULL,
  `lingkup` varchar(255) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dibuat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `l_akhir`
--

INSERT INTO `l_akhir` (`id_akhir`, `nama_akhir`, `skema`, `lingkup`, `tahun`, `file`, `id_user`, `dibuat`) VALUES
(3, 'PT AL SHOFA DUTA MANDIRI', 'PPIU', 'SERTIFIKASI AWAL', '2020', '108e45c731007d4716d53e890b372ddf.pdf', 1, '1666449879'),
(4, 'PT ANNEVA MULYA WISATA', 'PPIU', 'SERTIFIKASI AWAL', '2020', '71841ca39d0e6f11ff9bc77d224da30c.pdf', 1, '1666450006'),
(5, 'PT SADAYA PUTRA RAYANA TOURS TRAVEL', 'PPIU', 'SERTIFIKASI AWAL', '2021', 'e96ca8752e36f5e3a2268ab842da0fd8.pdf', 1, '1666666977'),
(6, 'PT Dunia Kayu Jaya', 'VLK', 'PENILIKAN', '2022', '9e3d7c3e4e787712a093055683cfd7e4.rar', 1, '1666667279'),
(7, 'PT KAHA HOLIDAY INTERNASIONAL', 'PPIU', 'SERTIFIKASI AWAL', '2020', '7cf44add68ff66d01c84eeb7b3ab220a.pdf', 1, '1666689265');

-- --------------------------------------------------------

--
-- Struktur dari tabel `l_pendahuluan`
--

CREATE TABLE `l_pendahuluan` (
  `id_pendahuluan` int(11) NOT NULL,
  `nama_pendahuluan` varchar(255) NOT NULL,
  `skema` varchar(255) NOT NULL,
  `lingkup` varchar(255) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dibuat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `l_pendahuluan`
--

INSERT INTO `l_pendahuluan` (`id_pendahuluan`, `nama_pendahuluan`, `skema`, `lingkup`, `tahun`, `file`, `id_user`, `dibuat`) VALUES
(1, 'PT Dunia Kayu Jaya', 'VLK', 'PENILIKAN', '2022', 'd92f890ceaaf6c6f6f94336f6e37fd91.rar', 1, '1664246245'),
(2, 'PT Sentral Pitulempa - HA', 'PHPL', 'PENILIKAN', '2022', '49d31e7c267201db4013d3ad50b08449.rar', 1, '1664277259'),
(3, 'PT Dwima Intiga', 'PHPL', 'SERTIFIKASI AWAL', '2022', '1b3f66e3d30e7a2751fdb74c08aa462b.rar', 1, '1666665717');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rab`
--

CREATE TABLE `rab` (
  `id_rab` int(11) NOT NULL,
  `nama_rab` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `skema` varchar(255) NOT NULL,
  `lingkup` varchar(255) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `dibuat` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rab`
--

INSERT INTO `rab` (`id_rab`, `nama_rab`, `file`, `skema`, `lingkup`, `tahun`, `jenis`, `dibuat`, `id_user`) VALUES
(2, 'CV Satriatama Furniture', '405261e01efb61c27983f323db0ee655.pdf', 'VLK', 'PHPL', '2020', 'Surat Pengantar', '1663952096', 1),
(3, 'PT INDO RISAKTI', 'cdef31c49705324c1b467daa0570ab10.pdf', 'PHPL', 'VLK', '2022', 'RAB Auditee', '1663978260', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem_mutu`
--

CREATE TABLE `sistem_mutu` (
  `id_sistem` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `nama_sistem` varchar(128) NOT NULL,
  `file` varchar(255) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `dibuat` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sistem_mutu`
--

INSERT INTO `sistem_mutu` (`id_sistem`, `kode`, `nama_sistem`, `file`, `jenis`, `tanggal`, `dibuat`, `id_user`) VALUES
(1, 'SIC-Mutu-18.VLHH', 'Prosedur Remote Audit Skema VLHH', '7b9de60350cc45694dfa4ae7ee69f007.pdf', 'Skema VLK', '2022-10-10', '1663925690', 1),
(2, 'SIC-Mutu-15.VLHH', 'Prosedur Sertifikasi Awal Skema VLHH', '010bab54d911701384e848ed3fc5dec9.pdf', 'Skema VLK', '2022-10-10', '1663925957', 1),
(3, 'SIC-Mutu-12.VLK', 'Prosedur Sertifikasi Awal Skema VLHH', '893f6f2b8fde2aa6e596e44b6964c6a8.pdf', 'Skema VLK', '2022-10-10', '1663926031', 1),
(4, 'SIC-Mutu-02', 'Pengelolaan Ketidakberpihakkan', '757dff5e6b34c97c64408dda32b5567b.pdf', 'Terintegrasi', '2022-05-16', '1666685130', 1),
(5, 'SIC-Mutu-03', 'Pembekuan, Pencabutan dan Penambahan Ruang Lingkup', '20761ceaf9caf08245afaec3c0f57bb0.pdf', 'Terintegrasi', '2022-05-16', '1666685309', 1),
(6, 'SIC-Mutu-04', 'Pengelolaan Banding dan Keluhan', 'fae1909f69030c83871f8f76302813ee.pdf', 'Terintegrasi', '2022-10-10', '1666685395', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `nama_tagihan` varchar(255) NOT NULL,
  `skema` varchar(255) NOT NULL,
  `lingkup` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `no_kontrak` varchar(255) NOT NULL,
  `tahap_tagihan` int(10) NOT NULL,
  `file` varchar(255) NOT NULL,
  `dibuat` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `nama_tagihan`, `skema`, `lingkup`, `tanggal`, `no_kontrak`, `tahap_tagihan`, `file`, `dibuat`, `id_user`) VALUES
(2, 'PT Wukirasari', 'PHPL', 'PENILIKAN', '2022-04-28', '001A', 1, 'ec46c5c08a230bcdea9c8cf22b68f801.pdf', '1666661431', 1),
(3, 'PT Mitra Perdana Palangka', 'PHPL', 'PENILIKAN', '2022-04-14', '006', 1, '069c5e2a2120a28df1cf62941102aeb8.pdf', '1666661499', 1),
(4, 'PT ITCI Kayan Hutani', 'PHPL', 'PENILIKAN', '2022-02-02', '002', 1, 'b31c0238fff14ce9c65f5f987bc9b42c.pdf', '1666688516', 1),
(5, 'PT Nusapadma Corporation', 'PHPL', 'PENILIKAN', '2022-03-16', '007', 1, 'f4d48f0fe6115559ce7044686dfbdd50.pdf', '1666688578', 1),
(6, 'PT Inhutani I UMH Segah Hulu', 'PHPL', 'PENILIKAN', '2022-07-14', '007A', 1, '421696be521211d242d674f6054dd48c.pdf', '1666688646', 1),
(7, 'PT Dwima Intiga', 'PHPL', 'SERTIFIKASI AWAL', '2022-08-01', '009', 1, 'cb97b17d2f769c33708546e8c582b50f.pdf', '1666688686', 1),
(8, 'PT Timberfana', 'PHPL', 'PENILIKAN', '2022-01-24', '003', 1, 'eaf1f3058db04e25df5fa475ac8d906b.pdf', '1666688790', 1),
(9, 'PT Mondialindo Setya Pratama', 'PHPL', 'PENILIKAN', '2022-02-24', '008', 1, '51244ca3880f50d5b1c52987bfed770d.pdf', '1666688843', 1),
(10, 'PT Wanagalang Utama', 'PHPL', 'SERTIFIKASI AWAL', '2022-08-11', '010', 1, '7517bf0e0f5268a17beb75c3a58a0e3e.pdf', '1666688884', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template_form`
--

CREATE TABLE `template_form` (
  `id_template` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `nama_template` varchar(128) NOT NULL,
  `file` varchar(255) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `dibuat` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `template_form`
--

INSERT INTO `template_form` (`id_template`, `kode`, `nama_template`, `file`, `jenis`, `tanggal`, `dibuat`, `id_user`) VALUES
(1, 'FM.VLK-SIC-004', 'Template Kontrak auditee VLK', '488e41164658f2dbfa141273f8b5e7c5.pdf', 'Skema VLK', '2022-09-23', '1663947131', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `image`, `no_telp`, `role`, `is_active`, `tanggal_input`) VALUES
(1, 'Abdul Talif', 'abdultalif85@gmail.com', '$2y$10$zjXFXeZaAnfnKBxS.IrU0uW2NrAIEP0F7IlRSu5yDsf0lOof5KrIS', '94ccd13be2a900cbc41faac116a37e9e.png', '089523006671', 'Admin', 1, '1633425423'),
(8, 'WindyRH', 'windyrdoko@gmail.com', '$2y$10$t5l.nfszot47Uq0.MNoEA.9asBq3od9d22/X2lqxcf8.kfTrfwpKK', '94a63285172b551b1028d85f8c21c248.jpg', '082463423432324', 'Staff', 1, '1663820718'),
(9, 'Ryan Fattrumahman', 'ryanfar9@gmail.com', '$2y$10$xrosNHID6Szf0VuLxOm64eoQ9DBZsZ.j7XFNLh7VVs1Y4arrCpZmC', 'default.jpg', '0895601813608', 'Staff', 1, '1665370926');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indeks untuk tabel `legalitas`
--
ALTER TABLE `legalitas`
  ADD PRIMARY KEY (`id_legalitas`);

--
-- Indeks untuk tabel `l_akhir`
--
ALTER TABLE `l_akhir`
  ADD PRIMARY KEY (`id_akhir`);

--
-- Indeks untuk tabel `l_pendahuluan`
--
ALTER TABLE `l_pendahuluan`
  ADD PRIMARY KEY (`id_pendahuluan`);

--
-- Indeks untuk tabel `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`id_rab`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `sistem_mutu`
--
ALTER TABLE `sistem_mutu`
  ADD PRIMARY KEY (`id_sistem`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indeks untuk tabel `template_form`
--
ALTER TABLE `template_form`
  ADD PRIMARY KEY (`id_template`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `legalitas`
--
ALTER TABLE `legalitas`
  MODIFY `id_legalitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `l_akhir`
--
ALTER TABLE `l_akhir`
  MODIFY `id_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `l_pendahuluan`
--
ALTER TABLE `l_pendahuluan`
  MODIFY `id_pendahuluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rab`
--
ALTER TABLE `rab`
  MODIFY `id_rab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sistem_mutu`
--
ALTER TABLE `sistem_mutu`
  MODIFY `id_sistem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `template_form`
--
ALTER TABLE `template_form`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rab`
--
ALTER TABLE `rab`
  ADD CONSTRAINT `rab_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
