-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2020 pada 05.32
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aksataa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_ADM` varchar(5) DEFAULT NULL,
  `NM_ADM` varchar(20) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `foto_adm` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADM`, `NM_ADM`, `USERNAME`, `PASSWORD`, `foto_adm`) VALUES
('adm01', 'Lasdiyono', 'admin', 'admin1234', NULL),
('adm02', 'admin', 'admin', 'admin', '25122019181749Ajem.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `armada`
--

CREATE TABLE `armada` (
  `ID_ARM` char(5) NOT NULL,
  `NM_ARM` varchar(30) DEFAULT NULL,
  `ALAMAT_ARM` varchar(50) DEFAULT NULL,
  `TLP_ARM` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `armada`
--

INSERT INTO `armada` (`ID_ARM`, `NM_ARM`, `ALAMAT_ARM`, `TLP_ARM`) VALUES
('arm01', 'Bus Inds 88', 'Jl Brawijaya 67B, Jember', '082230725758'),
('arm02', 'Bus Maxi 77 Trans', 'Jalan Brawijaya Nomor 8, Jember', '081332542271'),
('arm03', 'Bus Megah Transport', 'Jalan Sultan Agung Nomor 44, Arjasa, Jember', '08125255484'),
('arm04', 'Bus Akas Asri', 'Jalan Arowana 79, Gebang, Jember', '0331482307'),
('arm05', 'Bus Eka Kapti', 'Jalan Ki S Mangunsarkoro, Rambipuji, Jember', '0331754162');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cekbok`
--

CREATE TABLE `cekbok` (
  `hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cekbok`
--

INSERT INTO `cekbok` (`hari`) VALUES
(''),
(''),
(''),
('');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_pemesan`
--

CREATE TABLE `dtl_pemesan` (
  `DTL_PEMESAN` char(5) NOT NULL,
  `ID_PEMESAN` char(5) NOT NULL,
  `NM_ANGGOTA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtl_pemesan`
--

INSERT INTO `dtl_pemesan` (`DTL_PEMESAN`, `ID_PEMESAN`, `NM_ANGGOTA`) VALUES
('dps01', 'psn01', 'DENOK SRI WAHYUATI'),
('dps02', 'psn01', 'Widji utami s'),
('dps03', 'psn01', 'Hamami'),
('dps04', 'psn01', 'Aulia Purdaningsih '),
('dps05', 'psn01', 'SOFYAN HADI KURNIAWAN '),
('dps06', 'psn01', 'TOMY SULISTIO'),
('dps07', 'psn01', 'TATING NUR INDAH RINI'),
('dps08', 'psn01', 'ANITA RAHAYU NINGSIH '),
('dps09', 'psn01', 'JANATUL FIRDAUS'),
('dps10', 'psn01', 'AIDA WARDATUSH '),
('dps11', 'psn01', 'SUDARTI'),
('dps12', 'psn01', 'HUSNUL KHOTIMAH'),
('dps13', 'psn01', 'DJUNAIDI'),
('dps14', 'psn01', 'SITI NURJANAH '),
('dps15', 'psn01', 'NETTY DASMAWATI W'),
('dps16', 'psn01', 'LANGGENG RESMININGSIH'),
('dps17', 'psn01', 'YETTININGSIH'),
('dps18', 'psn01', 'IDA SRI HARTIAH'),
('dps19', 'psn01', 'PASHA CATRA AMRULLAH'),
('dps20', 'psn01', 'Sri pudyastuti k '),
('dps21', 'psn01', 'PUJI HASTUTIK '),
('dps22', 'psn01', 'IIN SULISTIANINGTIAS'),
('dps23', 'psn01', 'didin'),
('dps24', 'psn03', 'nurlaita'),
('dps26', 'psn04', 'mohammad ainun a'),
('dps27', 'psn03', 'yuyun'),
('dps28', 'psn03', 'taufan'),
('dps29', 'psn03', 'zahra'),
('dps30', 'psn03', 'afif'),
('dps31', 'psn03', 'eny'),
('dps32', 'psn03', 'hafiz'),
('dps33', 'psn03', 'sudjari'),
('dps34', 'psn03', 'agil'),
('dps35', 'psn03', 'rara'),
('dps36', 'psn03', 'dodo'),
('dps37', 'psn03', 'gibran'),
('dps38', 'psn03', 'sri winarni'),
('dps39', 'psn03', 'sauji'),
('dps40', 'psn03', 'tika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `ID_HOTEL` char(5) NOT NULL,
  `NM_HOTEL` varchar(30) DEFAULT NULL,
  `ALAMAT_HOTEL` varchar(50) DEFAULT NULL,
  `TLP_HOTEL` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`ID_HOTEL`, `NM_HOTEL`, `ALAMAT_HOTEL`, `TLP_HOTEL`) VALUES
('htl01', 'POP! Hotel Nusa Dua Bali', 'Jl. By Pass Ngurah Rai No. 188, Badung', '03618498853'),
('htl02', 'Fame Hotel Sunset Road', 'Jl. Sunset Road No. 9, Kuta, Badung', '03614727699'),
('htl03', 'Permata Kuta Hotel', 'Jl. Kediri No. 5, Kuta, Badung', '0361762828'),
('htl04', 'Hotel ibis Bali Kuta', 'Jl. Raya Kuta No. 77, Kuta, Badung', '0361756500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `ID_PKT` char(5) NOT NULL,
  `NM_PKT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`ID_PKT`, `NM_PKT`) VALUES
('pkt01', 'BALI CRUISE TOUR'),
('pkt02', 'BALI EXOTIC TOUR'),
('pkt03', 'Paket dinda tegal gede'),
('pkt04', 'Paket keluarga lita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `ID_PEMESAN` char(5) NOT NULL,
  `NM_PEMESAN` varchar(30) DEFAULT NULL,
  `JMLH_ANGGOTA` int(2) DEFAULT NULL,
  `NIK` char(17) NOT NULL,
  `ALAMAT_PEMESAN` varchar(50) NOT NULL,
  `TLP_PEMESAN` varchar(13) NOT NULL,
  `TGL_PSN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`ID_PEMESAN`, `NM_PEMESAN`, `JMLH_ANGGOTA`, `NIK`, `ALAMAT_PEMESAN`, `TLP_PEMESAN`, `TGL_PSN`) VALUES
('psn01', 'Denok Sri Wahyuati', 23, '3509147928640003', 'SDN Kepatihan 2 Jember', '0', '2019-06-01'),
('psn02', 'Dinda Ayu', 30, '3509172018990001', 'Perumahan Tegal Gede Jember', '0', '2019-07-03'),
('psn03', 'Nurlaita', 15, '3509175307000004', 'Klompangan, Ajung', '085336096676', '2019-11-04'),
('psn04', 'Mohammad Ainun A', 20, '3509190704990003', 'Jl Teuku Umar Gg 7 No 112', '08978333856', '2019-11-12'),
('psn05', 'bjdfhjhgh', 90, '02397592375998', 'jalan jalan', '2147483647', '2020-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkt_rm`
--

CREATE TABLE `pkt_rm` (
  `ID_PKT` char(5) NOT NULL,
  `ID_RM` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pkt_rm`
--

INSERT INTO `pkt_rm` (`ID_PKT`, `ID_RM`) VALUES
('pkt01', 'rm01'),
('pkt01', 'rm03'),
('pkt01', 'rm05'),
('pkt01', 'rm06'),
('pkt01', 'rm07'),
('pkt02', 'rm02'),
('pkt02', 'rm03'),
('pkt02', 'rm05'),
('pkt02', 'rm07'),
('pkt04', 'rm03'),
('pkt04', 'rm04'),
('pkt04', 'rm06'),
('pkt04', 'rm07'),
('pkt03', 'rm03'),
('pkt03', 'rm05'),
('pkt03', 'rm06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkt_wst`
--

CREATE TABLE `pkt_wst` (
  `ID_PKT` char(5) NOT NULL,
  `ID_WST` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pkt_wst`
--

INSERT INTO `pkt_wst` (`ID_PKT`, `ID_WST`) VALUES
('pkt01', 'wst01'),
('pkt02', 'wst01'),
('pkt03', 'wst01'),
('pkt04', 'wst01'),
('pkt02', 'wst02'),
('pkt03', 'wst02'),
('pkt04', 'wst02'),
('pkt01', 'wst03'),
('pkt02', 'wst03'),
('pkt03', 'wst03'),
('pkt01', 'wst04'),
('pkt02', 'wst04'),
('pkt03', 'wst04'),
('pkt04', 'wst04'),
('pkt01', 'wst05'),
('pkt02', 'wst05'),
('pkt04', 'wst05'),
('pkt01', 'wst06'),
('pkt02', 'wst07'),
('pkt02', 'wst08'),
('pkt02', 'wst09'),
('pkt02', 'wst10'),
('pkt01', 'wst11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rm`
--

CREATE TABLE `rm` (
  `ID_RM` char(4) NOT NULL,
  `NM_RM` varchar(30) DEFAULT NULL,
  `ALAMAT_RM` varchar(50) DEFAULT NULL,
  `TLP_RM` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rm`
--

INSERT INTO `rm` (`ID_RM`, `NM_RM`, `ALAMAT_RM`, `TLP_RM`) VALUES
('rm01', 'Bounty Cruise Nusa Lembongan', 'Jl. Wahana Tirta I, Denpasar', '0361726666'),
('rm02', 'RM Pantai Jimbaran', 'Jimbaran, Kabupaten Badung', NULL),
('rm03', 'RM Ulundanu', 'Danau Beratan, Candikuning, Tabanan Regency', NULL),
('rm04', 'RM Lokal Seririt', 'Kabupaten Buleleng', NULL),
('rm05', 'RM Lokal Pantai Pandawa', 'Pantai Pandawa', NULL),
('rm06', 'RM Secret Garden', 'Jl. Raya Denpasar Bedugul km. 36, Mekarsari, Taban', '03682033363'),
('rm07', 'RM Lokal Singaraja', 'Banyuasri, Kec. Buleleng, Kabupaten Buleleng', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRNS` int(2) NOT NULL,
  `ID_PKT` char(5) NOT NULL,
  `ID_PEMESAN` char(5) NOT NULL,
  `ID_ARM` char(5) NOT NULL,
  `ID_HOTEL` char(5) NOT NULL,
  `TGL_PELAKSANAAN` varchar(20) DEFAULT NULL,
  `TMPT_JPT` varchar(50) DEFAULT NULL,
  `HARGA` int(9) NOT NULL,
  `BAYAR` int(9) NOT NULL,
  `STATUS_BAYAR` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRNS`, `ID_PKT`, `ID_PEMESAN`, `ID_ARM`, `ID_HOTEL`, `TGL_PELAKSANAAN`, `TMPT_JPT`, `HARGA`, `BAYAR`, `STATUS_BAYAR`) VALUES
(1, 'pkt02', 'psn01', 'arm01', 'htl01', '9 - 13 Juli 2019', 'SDN Kepatihan 2 Jember', 162725000, 162725000, 'LUNAS'),
(2, 'pkt03', 'psn02', 'arm02', 'htl03', '16 - 18 Agustus 2019', 'Perumahan Tegal Gede Jember 	', 45000000, 45000000, 'LUNAS'),
(3, 'pkt04', 'psn03', 'arm01', 'htl02', '24-26 Desember 2019', 'Masjid Klompangan, Ajung', 16500000, 16500000, 'LUNAS'),
(4, 'pkt01', 'psn04', 'arm03', 'htl02', '30-1 Desember 3019', 'Hotel Flambooyan', 24000000, 24000000, 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
--

CREATE TABLE `transfer` (
  `ID_TRNS` int(2) NOT NULL,
  `NOMINAL` int(9) NOT NULL,
  `TGL_TRANSFER` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transfer`
--

INSERT INTO `transfer` (`ID_TRNS`, `NOMINAL`, `TGL_TRANSFER`) VALUES
(1, 20000000, '2019-12-09'),
(1, 2000000, '2019-12-10'),
(1, 8000000, '2019-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `ID_WST` char(5) NOT NULL,
  `NM_WST` varchar(30) DEFAULT NULL,
  `ALAMAT_WST` varchar(50) DEFAULT NULL,
  `TLP_WST` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`ID_WST`, `NM_WST`, `ALAMAT_WST`, `TLP_WST`) VALUES
('wst01', 'Pantai Sanur', NULL, NULL),
('wst02', 'Pantai Pandawa', NULL, NULL),
('wst03', 'Pantai Jimbaran', NULL, NULL),
('wst04', 'Pura Ulun Danu Beratan Bedugul', 'Danau Beratan, Candi kuning, Baturiti', '0368-2033143'),
('wst05', 'TEMAN JOGER Luwus', 'Jl. Mekarsari - Baturiti Bedugul No.16', '0368-2033324'),
('wst06', 'Pantai Lovina', NULL, NULL),
('wst07', 'Krisna Water Sports', 'Jalan Seririt - Singaraja, Buleleng', '08113973311'),
('wst08', 'Pantai Tanjung Benoa', NULL, NULL),
('wst09', 'Puja Mandala', 'Jalan Nusa Dua, Kuta Selatan, Badung', '0361-771010'),
('wst10', 'Secret Garden Village', 'Jl. Raya Denpasar Bedugul km. 36, Tabanan', '0368203336'),
('wst11', 'Nusa Lembongan', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`ID_ARM`);

--
-- Indeks untuk tabel `dtl_pemesan`
--
ALTER TABLE `dtl_pemesan`
  ADD PRIMARY KEY (`DTL_PEMESAN`),
  ADD KEY `FK_PEMESAN` (`ID_PEMESAN`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID_HOTEL`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`ID_PKT`);

--
-- Indeks untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`ID_PEMESAN`);

--
-- Indeks untuk tabel `pkt_rm`
--
ALTER TABLE `pkt_rm`
  ADD KEY `ID_RM` (`ID_RM`),
  ADD KEY `ID_PKT` (`ID_PKT`);

--
-- Indeks untuk tabel `pkt_wst`
--
ALTER TABLE `pkt_wst`
  ADD PRIMARY KEY (`ID_WST`,`ID_PKT`),
  ADD KEY `FK_PKT_WST2` (`ID_PKT`);

--
-- Indeks untuk tabel `rm`
--
ALTER TABLE `rm`
  ADD PRIMARY KEY (`ID_RM`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRNS`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_HOTEL`),
  ADD KEY `FK_TRNS_ARM` (`ID_ARM`),
  ADD KEY `FK_TRNS_PKT` (`ID_PKT`),
  ADD KEY `FK_TRNS_PSN` (`ID_PEMESAN`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`ID_WST`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dtl_pemesan`
--
ALTER TABLE `dtl_pemesan`
  ADD CONSTRAINT `FK_PEMESAN` FOREIGN KEY (`ID_PEMESAN`) REFERENCES `pemesan` (`ID_PEMESAN`);

--
-- Ketidakleluasaan untuk tabel `pkt_rm`
--
ALTER TABLE `pkt_rm`
  ADD CONSTRAINT `pkt_rm_ibfk_1` FOREIGN KEY (`ID_PKT`) REFERENCES `paket` (`ID_PKT`),
  ADD CONSTRAINT `pkt_rm_ibfk_2` FOREIGN KEY (`ID_RM`) REFERENCES `rm` (`ID_RM`);

--
-- Ketidakleluasaan untuk tabel `pkt_wst`
--
ALTER TABLE `pkt_wst`
  ADD CONSTRAINT `FK_PKT_WST` FOREIGN KEY (`ID_WST`) REFERENCES `wisata` (`ID_WST`),
  ADD CONSTRAINT `FK_PKT_WST2` FOREIGN KEY (`ID_PKT`) REFERENCES `paket` (`ID_PKT`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `FK_TRNS_ARM` FOREIGN KEY (`ID_ARM`) REFERENCES `armada` (`ID_ARM`),
  ADD CONSTRAINT `FK_TRNS_PKT` FOREIGN KEY (`ID_PKT`) REFERENCES `paket` (`ID_PKT`),
  ADD CONSTRAINT `FK_TRNS_PSN` FOREIGN KEY (`ID_PEMESAN`) REFERENCES `pemesan` (`ID_PEMESAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
