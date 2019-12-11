-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2019 pada 13.08
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
('arm01', 'Bus Inds 88', 'Jalan Brawijaya 67B, Jember', '082230725758'),
('arm02', 'Bus Maxi 77 Trans', 'Jalan Brawijaya Nomor 8, Jember', '081332542271'),
('arm03', 'Bus Megah Transport', 'Jalan Sultan Agung Nomor 44, Arjasa, Jember', '08125255484'),
('arm04', 'Bus Akas Asri', 'Jalan Arowana 79, Gebang, Jember', '0331482307'),
('arm05', 'Bus Eka Kapti', 'Jalan Ki S Mangunsarkoro, Rambipuji, Jember', '0331754162'),
('arm06', 'Bus Subur Jaya', 'Jalan Pemuda Nomor37, Rembang, Jawa Tengah', '0295693952'),
('arm07', 'Bus Pandawa 87', 'Jalan K.H. Hasyim Ashari Nomor102, Bugulkidul, Pas', '03435643603'),
('arm08', 'Bus Citra Dewi', 'Jalan Tirtomoyo Km 2 Nomor305, Semarang, Jawa Teng', '0298712100'),
('arm09', 'Bus Purnayasa', 'Jalan Merdeka VI Nomor 15, Denpasar, Bali', '03614745441'),
('arm10', 'Bus Akas N1', 'Jalan Dharmawangsa Nomor48, Rambipuji, Jember', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_armada`
--

CREATE TABLE `dtl_armada` (
  `DTL_ARM` char(6) NOT NULL,
  `ID_ARM` char(5) NOT NULL,
  `SEAT` int(2) DEFAULT NULL,
  `HARGA` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtl_armada`
--

INSERT INTO `dtl_armada` (`DTL_ARM`, `ID_ARM`, `SEAT`, `HARGA`) VALUES
('aarm1', 'arm01', 58, 5000000),
('aarm2', 'arm01', 42, 4500000),
('aarm3', 'arm01', 30, 4000000),
('aarm4', 'arm02', 42, 5000000);

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
('dps1', 'psn01', 'yosef'),
('dps2', 'psn01', 'dika'),
('dps3', 'psn01', 'emil'),
('dps4', 'psn01', 'widya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `entity_10`
--

CREATE TABLE `entity_10` (
  `ID_RM` char(4) NOT NULL,
  `ID_TRNS` int(2) NOT NULL,
  `ID_PKT` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `entity_11`
--

CREATE TABLE `entity_11` (
  `ID_PKT` char(5) NOT NULL,
  `ID_WST` char(5) NOT NULL,
  `ID_TRNS` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `NM_PKT` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`ID_PKT`, `NM_PKT`) VALUES
('pkt01', 'BALI CRUISE TOUR'),
('pkt02', 'BALI EXOTIC TOUR'),
('pkt03', 'Custom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `ID_PEMESAN` char(5) NOT NULL,
  `NM_PEMESAN` varchar(30) DEFAULT NULL,
  `JMLH_ANGGOTA` int(2) DEFAULT NULL,
  `NIK` char(17) NOT NULL,
  `TGL_PSN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`ID_PEMESAN`, `NM_PEMESAN`, `JMLH_ANGGOTA`, `NIK`, `TGL_PSN`) VALUES
('psn01', 'Denok Sri Wahyuati', 23, '2895792065982', '2019-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkt_wst`
--

CREATE TABLE `pkt_wst` (
  `ID_WST` char(5) NOT NULL,
  `ID_PKT` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('rm01', 'RM Amdani Bwi', NULL, NULL),
('rm02', 'IAM Bali', NULL, NULL),
('rm03', 'Lacosta Lovina', NULL, NULL),
('rm04', 'RM Ulundanu', NULL, NULL),
('rm05', 'RM Lokal Seririt', NULL, NULL);

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
  `TGL_BRKT` date DEFAULT NULL,
  `TMPT_JPT` varchar(50) DEFAULT NULL,
  `HARGA` int(9) NOT NULL,
  `BAYAR` int(9) NOT NULL,
  `STATUS_BAYAR` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRNS`, `ID_PKT`, `ID_PEMESAN`, `ID_ARM`, `ID_HOTEL`, `TGL_BRKT`, `TMPT_JPT`, `HARGA`, `BAYAR`, `STATUS_BAYAR`) VALUES
(1, 'pkt01', 'psn01', 'arm01', 'htl01', '2020-01-31', 'SDN Kepatihan 2 Jember', 30000000, 20000000, 'BELUM');

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
(1, 20000000, '2019-12-09');

--
-- Trigger `transfer`
--
DELIMITER $$
CREATE TRIGGER `cek_hapus` AFTER DELETE ON `transfer` FOR EACH ROW BEGIN
	UPDATE transaksi SET BAYAR = BAYAR-OLD.NOMINAL
    WHERE ID_TRNS = OLD.ID_TRNS;
    UPDATE transaksi SET STATUS_BAYAR = 'LUNAS'
    WHERE BAYAR >= HARGA;
    UPDATE transaksi SET STATUS_BAYAR = 'BELUM'
    WHERE BAYAR < HARGA;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cek_tambah` AFTER INSERT ON `transfer` FOR EACH ROW BEGIN 
	UPDATE transaksi SET BAYAR = BAYAR+NEW.NOMINAL 
    WHERE ID_TRNS = NEW.ID_TRNS;
    UPDATE transaksi SET STATUS_BAYAR = 'LUNAS'
    WHERE BAYAR >= HARGA;
    UPDATE transaksi SET STATUS_BAYAR = 'BELUM'
    WHERE BAYAR < HARGA;
END
$$
DELIMITER ;

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
('wst04', 'Bedugul', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`ID_ARM`);

--
-- Indeks untuk tabel `dtl_armada`
--
ALTER TABLE `dtl_armada`
  ADD PRIMARY KEY (`DTL_ARM`),
  ADD KEY `FK_ARMADA` (`ID_ARM`);

--
-- Indeks untuk tabel `dtl_pemesan`
--
ALTER TABLE `dtl_pemesan`
  ADD PRIMARY KEY (`DTL_PEMESAN`),
  ADD KEY `FK_PEMESAN` (`ID_PEMESAN`);

--
-- Indeks untuk tabel `entity_10`
--
ALTER TABLE `entity_10`
  ADD KEY `FK_RELATIONSHIP_10` (`ID_PKT`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_RM`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_TRNS`);

--
-- Indeks untuk tabel `entity_11`
--
ALTER TABLE `entity_11`
  ADD KEY `FK_RELATIONSHIP_11` (`ID_PKT`),
  ADD KEY `FK_RELATIONSHIP_12` (`ID_WST`),
  ADD KEY `FK_RELATIONSHIP_13` (`ID_TRNS`);

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
-- Ketidakleluasaan untuk tabel `dtl_armada`
--
ALTER TABLE `dtl_armada`
  ADD CONSTRAINT `FK_ARMADA` FOREIGN KEY (`ID_ARM`) REFERENCES `armada` (`ID_ARM`);

--
-- Ketidakleluasaan untuk tabel `dtl_pemesan`
--
ALTER TABLE `dtl_pemesan`
  ADD CONSTRAINT `FK_PEMESAN` FOREIGN KEY (`ID_PEMESAN`) REFERENCES `pemesan` (`ID_PEMESAN`);

--
-- Ketidakleluasaan untuk tabel `entity_10`
--
ALTER TABLE `entity_10`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_PKT`) REFERENCES `paket` (`ID_PKT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_RM`) REFERENCES `rm` (`ID_RM`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_TRNS`) REFERENCES `transaksi` (`ID_TRNS`);

--
-- Ketidakleluasaan untuk tabel `entity_11`
--
ALTER TABLE `entity_11`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_PKT`) REFERENCES `paket` (`ID_PKT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ID_WST`) REFERENCES `wisata` (`ID_WST`),
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`ID_TRNS`) REFERENCES `transaksi` (`ID_TRNS`);

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
