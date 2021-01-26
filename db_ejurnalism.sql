-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2014 pada 13.06
-- Versi Server: 5.5.34
-- Versi PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_ejurnalism`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `ID_BERITA` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_BERITA` varchar(25) DEFAULT NULL,
  `JUDUL_BERITA` varchar(100) DEFAULT NULL,
  `ISI_BERITA` text,
  `IMAGE` varchar(200) DEFAULT NULL,
  `TGL_BERITA` date DEFAULT NULL,
  PRIMARY KEY (`ID_BERITA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`ID_BERITA`, `JENIS_BERITA`, `JUDUL_BERITA`, `ISI_BERITA`, `IMAGE`, `TGL_BERITA`) VALUES
(46, 'Agama', 'Lukman Hakim Saifuddin Resmi Jabat Menteri Agama', '  Metrotvnews.com, Jakarta: Lukman Hakim Saifuddin resmi menjabat Menteri Agama menggantikan Suryadharma Ali. Ia akan menjabat hingga berakhirnya periode Kabinet Indonesia Bersatu II.\r\n\r\nLukman dilantik oleh Presiden Susilo Bambang Yudhoyono di Istana Negara, Senin (9/6/2014) pukul 10.00 WIB tadi. Pengangkatan putra mantan Menteri Agama Saifuddin Zuhri itu berdasarkan Keputusan Presiden Nomor 54/P/2014. Keppres tersebut disahkan di Jakarta pada 4 Juni 2014.\r\n\r\nUsai pembacaan Keppres, Presiden SBY meminta kepada Menag yang baru untuk mengikuti pembacaan sumpah. "Bahwa saya untuk diangkat pada jabatan ini langsung ataupun tidak langsung, dengan nama atau dalih apapun, tiada memberikan atau menjanjikan atau akan memberikan sesuatu kepada siapapun juga. Bahwa saya untuk melakukan atau tidak melakukan sesuatu dalam jabatan ini tiada sekali-kali menerima dari siapapun juga langsung ataupun tidak langsung sesuatu janji atau pemberian," kata Presiden yang diikuti oleh Lukman Hakim Saifuddin, sebagaimana dikutip dari laman www.presidenri.go.id.\r\n\r\nLukman Hakim Saifuddin adalah Wakil Ketua Majelis Permusyawaratan Rakyat (MPR) dari Fraksi Persatuan Pembangunan. Ia menggantikan Suryadharma Ali yang mengundurkan diri karena ditetapkan sebagai tersangka dalam kasus dugaan korupsi penyelenggaraan haji tahun 2012-2013.', '1.png', '2014-06-22'),
(47, 'Agama', 'KH Idris Marzuki Kediri Wafat di Usia 74 Tahun', ' Metrotvnews.com, Kediri: Kabar duka menyelimuti Jawa Timur. Ulama kharismatik pengasuh Pondok Pesantren Lirboyo Kediri, KH Ahmad Idris Marzuki, meninggal dunia setelah menjalani perawatan di RSUD dr Soetomo Surabaya, pada pukul 09.45 WIB Senin (9/6).\r\n\r\nKH Idris wafat di usia 74 tahun, setelah menderita sakit karena faktor usia dan beberapa kali keluar masuk RSUD dr Soetomo.\r\n\r\nSebelum meninggal, kondisi almarhum menurun. Almarhum rencananya akan dimakamkan di kompleks Ponpes Lirboyo pada pukul 8 malam nanti.\r\n\r\nWakil Gubernur Jawa Timur Saifullah Yusuf yang datang ke RSUD Soetomo mengatakan sosok almarhum dikenal sebagai ulama yang peduli dengan kepentingan bangsa dan negara serta tidak segan mendatangi santri-santri di sejumlah pondok pesantren di Jawa Timur. Selain dikenal di Jawa Timur, almarhum juga dikenal di dunia internasional.\r\n(Adf)', '2.png', '2014-06-22'),
(48, 'Pembunuhan', 'Hari ini Wawan Bacakan Pledoi', 'Metrotvnews.com, Jakrata: Terdakwa kasus penyuapan Ketua Mahkamah Konstitusi Akil Mochtar, Tubagus Chaeri Wardana alias Wawan, hari ini membacakan pledoi (nota pembelaan). Wawan dalam nota pembelaannya keberatan atas dakwaan jaksa yang menyatakan dia secara bersama-sama dengan kakaknya, Ratu Atut Chosiyah, melakukan penyuapan.\r\n\r\n"Berdasarkan surat dakwaan, disebutkan saya secara bersama-sama melalukan suap, tetapi tidak ada bukti yg jelas," ungkap Wawan saat membacakan pledoi di Pengadilan Tipikor, Jl HR Rasuna Said, Jakarta Selatan, Senin (9/6/2014).\r\n\r\nJaksa Penuntut Umum pada Komisi Pemberantasan Korupsi mendakwa Wawan dan Atut secara sengaja bersama-sama melakulan suap untuk mempengaruhi putusan Ketua MK untuk memenangkan pasangan Amir Hamzah dan Kasmin dalam sengketa Pemilu Kada Lebak.\r\n\r\n"Saya adalah seorang adik (dari Ratu Atut), tetapi tetap saja, makna\r\nbersama-sama harus dijelaskan," tegas Wawan.\r\n\r\nWawan menyatakan bahwa kata "sengaja" dalam upaya pemberian suap kepada ketua MK, dinilai tak jelas dan tidak terbukti. Ia juga menyangkal bahwa dirinya terlibat langsung dalam upaya penyuapan.\r\n', '140609-075048cpYfc2GLNA.jpg', '2014-06-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cuplikan`
--

CREATE TABLE IF NOT EXISTS `tb_cuplikan` (
  `ID_CUPLIKAN` int(11) NOT NULL AUTO_INCREMENT,
  `ISI_CUPLIKAN` varchar(255) DEFAULT NULL,
  `TGL_CUPLIKAN` date DEFAULT NULL,
  PRIMARY KEY (`ID_CUPLIKAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `tb_cuplikan`
--

INSERT INTO `tb_cuplikan` (`ID_CUPLIKAN`, `ISI_CUPLIKAN`, `TGL_CUPLIKAN`) VALUES
(13, 'hjghgkjhlhlkhk', '2014-04-05'),
(15, 'ljkl', '2014-01-01'),
(16, 'kmk', '2014-05-09'),
(17, 'dalam kfslfjkfjlfs dflskdf fkjs', '2014-05-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_berita`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_berita` (
  `id_jb` int(11) NOT NULL AUTO_INCREMENT,
  `Jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jb`),
  UNIQUE KEY `Jenis` (`Jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `tb_jenis_berita`
--

INSERT INTO `tb_jenis_berita` (`id_jb`, `Jenis`) VALUES
(24, 'Agama'),
(2, 'Pembantaian'),
(19, 'Pembunuhan'),
(22, 'Pemerkosaan'),
(3, 'Penculikan'),
(16, 'Pidana'),
(23, 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `LEVEL` varchar(20) NOT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`USERNAME`, `PASSWORD`, `LEVEL`) VALUES
('bulyan', '7e169412adae815120b5588508ebc4d8', 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_video`
--

CREATE TABLE IF NOT EXISTS `tb_video` (
  `ID_VIDEO` int(11) NOT NULL AUTO_INCREMENT,
  `JUDUL_VIDEO` varchar(100) DEFAULT NULL,
  `VIDEO` varchar(200) DEFAULT NULL,
  `TGL_VIDEO` date DEFAULT NULL,
  PRIMARY KEY (`ID_VIDEO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_video`
--

INSERT INTO `tb_video` (`ID_VIDEO`, `JUDUL_VIDEO`, `VIDEO`, `TGL_VIDEO`) VALUES
(1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'hasil.mp4', '2014-05-24'),
(2, 'aaangkjdngjadjgnkjadgjkadkjgadjfklsjdfkljaskfasdfsdfadfsdf', 'barudapat.mp4', '2014-05-24'),
(3, 'kisah', 'ab.mp4', '2014-05-24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
