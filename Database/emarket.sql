-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 26 Des 2020 pada 17.19
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emarket`
--

DELIMITER $$
--
-- Prosedur
--
DROP PROCEDURE IF EXISTS `deletebarang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletebarang` (IN `ID` VARCHAR(12))  BEGIN
	DELETE FROM barang where ID_BARANG=ID;
END$$

DROP PROCEDURE IF EXISTS `deletedistributor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletedistributor` (IN `ID` VARCHAR(12))  BEGIN
	DELETE FROM distributor where id_distributor=ID;
END$$

DROP PROCEDURE IF EXISTS `deletekategori`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletekategori` (IN `ID` VARCHAR(12))  BEGIN
	DELETE FROM kategori where id_kategori=ID;
END$$

DROP PROCEDURE IF EXISTS `searchbarang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `searchbarang` (IN `nama` VARCHAR(100))  BEGIN
 SELECT * FROM BARANG WHERE nama_barang REGEXP CONCAT('^.*',nama,'.*$');
END$$

DROP PROCEDURE IF EXISTS `updatebarang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebarang` (IN `ID` INT, IN `DISTRI` INT, IN `NAMA` VARCHAR(100), IN `JUMLAH` INT, IN `HARGA` INT, IN `STATE` INT, IN `KATEGORI` INT, IN `PHOTO` CHAR(50), IN `DESK` VARCHAR(100))  BEGIN
	UPDATE BARANG
	SET
    	id_distributor = DISTRI,
	nama_barang = NAMA,
    	jumlah = JUMLAH,
    	harga = HARGA,
	status_barang = STATE,
    	id_kategori = KATEGORI,
    	photo_barang = PHOTO,
    	deskripsi_barang = DESK WHERE ID_BARANG = ID;
END$$

DROP PROCEDURE IF EXISTS `updatedistributor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedistributor` (IN `ID` INT, IN `PERUS` VARCHAR(100), IN `NAMA` VARCHAR(100), IN `TELEPON` VARCHAR(50), IN `STATE` INT)  BEGIN
	UPDATE DISTRIBUTOR
	SET
	nama_perusahaan = PERUS,
	nama_distributor = NAMA,
	no_telp_distributor = TELEPON,
	status_distributor = STATE WHERE id_distributor = ID;
END$$

DROP PROCEDURE IF EXISTS `updatekategori`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatekategori` (IN `ID` INT, IN `KODE` VARCHAR(10), IN `NAMA` VARCHAR(100))  BEGIN
	UPDATE kategori
	SET
	kode_kategori = KODE,
	nama_kategori = NAMA WHERE id_kategori = ID;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_distributor` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `photo_barang` char(50) DEFAULT NULL,
  `deskripsi_barang` varchar(200) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `BARANG_DISTRIBUTOR` (`id_distributor`),
  KEY `BARANG_kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_distributor`, `nama_barang`, `jumlah`, `harga`, `status_barang`, `id_kategori`, `photo_barang`, `deskripsi_barang`) VALUES
(4, 2, 'meja', 81, 100000, 0, 6, 'meja1.png', 'meja'),
(5, 1, 'sabun', 85, 10000, 0, 10, 'sabundetol1.png', 'sabun'),
(6, 2, 'kursi', 96, 85000, 0, 6, 'kursi3.png', 'kursi'),
(7, 2, 'Dancow Fortigo', 45, 120000, 1, 2, 'dancow3.png', 'Dancow Fortigo adalah produk susu unggulan'),
(9, 1, 'Nugget', 15, 12500, 0, 2, 'nugget.png', 'Nugget AYAM'),
(13, 14, 'Garnier Sakura White Serum Night Cream Moisturizer Skin Care - 50 ml', 49, 53000, 1, 10, 'garnier.png', 'Krim essence lembut dengan paduan Ekstrak Sakura, Ekstrak Buah-buahan, dan Vitamin CG, melembapkan wajah hingga 24 jam dan membiarkannya bernafas selama Anda tidur.'),
(14, 1, 'Pond\'s White Beauty Facial Foam 50 gr', 92, 14000, 1, 10, 'ponds1.png', 'Dengan kandungan Pearl Nutrients, Vitamin B3, dan AHA'),
(15, 1, 'Garnier Sakura White Pinkish Radiance Essence Lotion Skin Care - 120ml', 99, 75600, 1, 10, 'garnieres.png', 'Essence lotion yang melembabkan, mencerahkan, menghaluskan tekstur kulit dan menyiapkan kulit untuk perawatan kulit tahap selanjutnya.'),
(17, 17, 'Ovale Facial Lotion Lemon Botol 200 ml', 49, 22800, 1, 10, 'ovale.png', 'Membersihkan kotoran dan sisa tata rias'),
(18, 1, 'Garnier Men Turbo Light Oil Control 3 in 1 Charcoal Cleanser Foam Skin Care - 100 ml', 48, 29000, 1, 10, 'garnier1.png', 'Pembersih wajah 3 in 1 pertama untuk berminyak dengan kombinasi kekuatan charcoal, beads dan clay.'),
(19, 1, 'Rexona Men Deodorant Roll On Invisible Dry 45 ml - Antiperspirant Deodorant Deodoran Roll On', 45, 13300, 1, 10, 'rexona1.png', 'Rexona Men Deodorant Pria Roll On tanpa pewarna Dengan formula anti noda terbaik Melawan keringat dan bau badan hingga 48 jam'),
(20, 1, 'Axe Hair Styling Extreme Hold Gel 75 ml', 50, 12000, 1, 10, 'axe1.png', 'Berwarna transparan dengan konsistensi lebih tipis dibandingkan produk lainnya tetapi tetap memberikan tampilan rambut yang keras dan tertata.'),
(21, 1, 'Head & Shoulders Shampoo Clean and Balanced 400 ml', 50, 51900, 1, 10, 'hs1.png', 'Head & Shoulders, Shampo Anti-Ketombe No.1 Di Dunia'),
(22, 1, 'Rejoice Conditioner Rich Halus Lembut 320ml [P&G]', 55, 40000, 1, 10, 'rejoice2.png', 'untuk membantu rambut tampak lurus alami, menggunakan Rejoice sistem vs shampo non kondisioner'),
(23, 1, 'Head & Shoulders Shampoo Cool Menthol Anti-Dandruff 300 ml [P&G]', 75, 50000, 1, 10, 'hs2.png', 'Dengan formula menthol jadikan rambut serta kulit kepala terasa dingin dan bersih menyegarkan.'),
(24, 1, 'Tresemme Hair Fall Control Shampoo 170Ml', 54, 24600, 1, 10, 'tresemme.png', 'TRESemmé Hair Fall Control Baru kini dilengkapi dengan Chia Seed Oil dan Amino Vitamin yang membantu mengurangi kerontokan rambut'),
(25, 1, 'Pantene Conditioner Daily Moisture Renewal 290 ml', 70, 43000, 1, 10, 'pantene.png', 'Memperbaiki kerusakan rambut dan mengembalikan kilau dengan mengisi kekosongan pada permukaan rambut. Pelembapnya membuat rambut lembut, mudah diatur, dan kuat melawan kerusakan.'),
(26, 1, 'Pepsodent Pasta Gigi White 225 gr', 70, 9000, 1, 10, 'pepsodent.png', 'Pencegah Gigi Berlubang Pasta Gigi merupakan pasta gigi dengan perlindungan Mikro Kalsium Aktif'),
(27, 1, 'LISTERINE® Cool Mint Mouthwash / Obat Kumur 250ml', 50, 20000, 1, 10, 'listerine.png', 'Gunakan LISTERINE® Cool Mint Antiseptic Mouthwash (Obat Kumur Antiseptik) sehari 2x setelah menyikat gigi.'),
(28, 14, 'Bimoli Klasik 2L', 40, 32000, 1, 9, 'bimoli.png', 'Bimoli Klasik 2L merupakan minyak goreng yang terbuat dari biji kelapa sawit pilihan'),
(29, 14, 'Fortune Cooking Oil Pouch 2L', 39, 25000, 1, 9, 'fortune.png', 'Fortune Cooking Oil Pouch 2L merupakan minyak goreng yang terbuat dari bahan berkualitas'),
(30, 14, 'Gold Rice Beras Super 5kg', 35, 67400, 1, 9, 'beras_gold.png', 'Beras Premium 5kg merupakan beras persembahan Gold Rice yang terbuat dari bibit unggul pilihan dari hasil petani Indonesia'),
(31, 14, 'Lumbung Padi Indonesia Beras Putih 5kg', 30, 62500, 1, 9, 'lm_padi.png', 'Beras Premium persembahan dari Wilmar, beras putih berkualitas premium'),
(32, 20, 'ABC Sarden Saus Cabai 155 g', 25, 9000, 1, 9, 'sarden.png', 'Sarden ABC adalah makanan siap saji yang di buat dari perpaduan ikan terbaik dengan saus berkualitas'),
(33, 20, 'Pondan Pudding Vanilla 200gr', 10, 21000, 0, 9, 'Pondanpd1.png', 'Pondan Pudding Vanilla 200gr merupakan puding instan vanila yang sangat lezat dan mudah dibuat'),
(34, 20, 'Pondan Pudding Mango 200gr', 25, 21000, 1, 9, 'Pondan1.png', 'Pondan Pudding Mango 200gr merupakan puding instan mangga yang sangat lezat dan mudah dibuat.'),
(35, 20, 'Pondan Pudding Flan Mango 180gr', 30, 17000, 1, 9, 'Pondan2.png', 'Pondan Pudding Flan Mango 180gr merupakan pudding mangga instan yang lezat.'),
(36, 21, 'Mie Sedaap Soto Cup 81 gr', 45, 4000, 1, 9, 'mie_1.png', 'Mie Instant dalam cup, terbuat dari bahan mie berkualitas'),
(37, 21, 'Pronas Corned Beef Sachet 50 Gr', 45, 5400, 1, 9, '1.png', 'Pronas Corned Beef Classic Sachet 50 Gr terbuat dari daging sapi berkualitas premium'),
(38, 21, 'Nestlé KOKO KRUNCH Cereal Box 330g', 45, 38000, 1, 9, '2.png', 'Sereal sarapan gandum rasa coklat yang dahsyat.'),
(39, 21, 'Mariza Srikaya Pandan Spread 250gr', 15, 23900, 1, 9, '3.png', 'Mariza Srikaya Pandan merupakan selai yang terbuat dari bahan-bahan alami dengan rasa srikaya pandan'),
(40, 20, 'Mie Sedaap SOTO 75 gr', 50, 2300, 1, 9, '4.png', 'MIE SEDAAP Soto merupakan mie instan dengan rasa soto segar berpadu serbuk gurih renyah.'),
(41, 21, 'Indomie Goreng 85gr', 50, 2800, 1, 9, '5.png', 'Indomie Goreng 85gr merupakan mie instan tanpa kuah.'),
(42, 21, 'Indomie Rasa Goreng Pedas 79gr', 35, 3100, 1, 9, '6.png', 'mie instan yang terbuat dari tepung terigu berkualitas dengan paduan rempah-rempah pilihan'),
(43, 21, 'Indofood Bumbu Rendang 50gr x2', 35, 9700, 1, 9, '7.png', 'Indofood Bumbu Rendang Box 50gr merupakan bumbu instan untuk membuat rendang'),
(44, 20, 'Sajiku Ayam Goreng Tradisional 24 Gr', 35, 2000, 1, 9, '8.png', 'Sajiku Ayam Goreng Tradisional 24 Gr merupakan bumbu instant untuk membuat nasi goreng'),
(45, 21, 'Gulaku Pillow Pack Tebu 1kg', 35, 15000, 1, 9, '9.png', 'Gulaku Pillow Pack Tebu 1kg merupakan gula murni yang terbuat dari gula tebu asli pilihan.'),
(46, 21, 'Gulaku Pillow Pack Premium 200gr', 35, 3600, 1, 9, '10.png', 'Gulaku Pillow Pack Premium 200gr merupakan gula murni yang terbuat dari gula tebu asli pilihan.'),
(47, 21, 'Kunci Biru Terigu P1 Kg', 35, 10000, 1, 9, '11.png', 'Terigu Kunci Biru P1 Kg merupakan tepung terigu berkualitas untuk membuat aneka variasi makanan.'),
(48, 21, 'Blue Band Cake & Cookie Margarin 200 gr', 15, 12000, 1, 9, '12.png', 'Blue Band Cake and Cooki adalah margarin spesial untuk kue perpaduan sempurna'),
(49, 20, 'Delmonte Saus Extra Hot Chilli 200 mL', 25, 8500, 1, 9, '13.png', 'Del Monte Extra Hot Sauce dapat digunakan sebagai bumbu masakan'),
(50, 21, 'Heavenly Blush Tummy Yogurt Bar Berries 25g', 10, 7500, 1, 9, '14.png', 'menyehatkan sistem pencernaan dan melancarkan BAB yang tidak teratur.'),
(51, 17, 'Confidence Popok Celana XL 3', 35, 46500, 1, 8, '15.png', 'Popok Dewasa Confidence Adult Pants merupakan popok Celana untuk kondisi lansia aktif'),
(52, 20, 'Blackmores Calcimag Multi BPOM Kalbe (Kalsium Obat Tulang)', 15, 129500, 1, 8, '16.png', 'Blackmores Calcimag Multi merupakan formula yang mengandung kombinasi dari Kalsium'),
(53, 14, 'Vicks Vaporub Balsem 25 gr', 16, 16900, 1, 8, '17.png', 'Obat gosok untuk meringankan gejala pilek dan batuk karena flu.'),
(54, 14, 'Dettol Antiseptic Liquid 45ml', 25, 40500, 1, 8, '18.png', 'DETTOL Antiseptic Liquid merupakan antiseptik cair serbaguna'),
(55, 14, 'Rohto Obat Mata 7 ml', 25, 11300, 1, 8, '19.png', 'Mengatasi mata merah karena iritasi ringan yang disebabkan oleh debu, asap, cuaca dingin'),
(56, 14, 'Carex Hand Wash Antibacterial 250ml - Fresh', 40, 33400, 1, 8, '20.png', 'Membantu mempertahankan alami kulit terhadap bakteri'),
(57, 14, 'Nexcare Carbon Mask / Masker 4ply Sachet', 50, 15000, 1, 8, '21.png', '3M Nexcare Carbon Mask MP-20 - Masker Pelindung dari Asap Kendaraan Bermotor.'),
(58, 1, 'MamyPoko Pants Royal Soft - L 52 - Girls', 65, 151000, 1, 7, '22.png', 'Dengan Soft Cotton Belt yang lembut di bagian pinggang dan pangkal paha.'),
(59, 14, 'Pampers Popok Celana Premium Care XL-36 Paket Isi 2', 20, 380000, 1, 7, '23.png', 'Pampers Premium Care, generasi popok bayi tertipis dan terkering'),
(60, 14, 'S-26 Procal GOLD Vanila Susu Usia 1-3 Tahun', 45, 468500, 1, 7, '24.png', 'Mengandung nutrisi untuk bantu dukung POTENSI dan KEMAMPUAN BELAJAR SI KECIL'),
(61, 14, 'Morinaga Chil School Platinum Moricare+ Vanilla 800gr', 35, 204000, 1, 7, '25.png', 'Morinaga Chil School Platinum merupakan susu anak usia 3-12 tahun berkalori tinggi (200kkal/saji)'),
(62, 14, 'Nestle Cerelac Bubur Bayi Instant Usia 6-12 Bulan Rasa Kacang Hijau Box 120 g', 25, 8700, 1, 7, '26.png', 'Nestle Cerelac Bubur Bayi Instant Usia 6-12 Bulan Rasa Kacang Hijau'),
(63, 14, 'SUN Bubur Sereal Susu Ubi Ungu 120 g Box x 1 Pcs', 25, 7200, 1, 7, '27.png', 'SUN Bubur Sereal Susu kini dengan ESENUTRI'),
(64, 17, 'Nice Tissue Wajah Kiloan 900 Gr', 42, 34300, 1, 6, '28.png', 'berfungsi membersihkan area wajah, mulut dan kulit tubuh dari keringat,'),
(65, 17, 'Paseo Character Tissue Wajah 6 Packs 9 Sheets', 35, 9600, 1, 6, '29.png', 'Tisu facial Paseo untuk membersihkan area wajah, mulut dan kulit tubuh dari keringat dan kotoran.'),
(66, 1, 'Sunlight Sabun Cuci Pencuci Piring Cair Jeruk Nipis Lime 755 ml', 45, 13600, 1, 6, '30.png', 'Cairan pencuci piring. Lebih cepat dan mudah'),
(67, 17, 'Mr. Muscle Kitchen Orange Spray 500 ml', 46, 14000, 1, 6, '31.png', 'Muscle Kitchen Orange Spray 500 ml merupakan cairan yang berfungsi untuk membersihkan dapur dari noda-noda'),
(68, 17, 'Mama Jeruk Nipis Botol 750ml', 46, 21300, 1, 6, '32.png', 'Mama Lime Anti Bacteria, cairan pencuci piring dengan kandungan anti bacteria'),
(69, 1, 'Glade One For All Air Freshener Peony And Berry Bliss Refill 70 + 15 gr', 51, 8900, 1, 6, '33.png', 'Aroma yang dihasilkan dapat memberikan kesegaran untuk ruangan Anda,'),
(70, 14, 'Glade Scented Gel Wild Berries 180 gr', 25, 19300, 1, 6, '34.png', 'Aroma yang dihasilkan dapat memberikan kesegaran untuk ruangan Anda'),
(71, 17, 'So Klin Pembersih Lantai Biru Pouch 1600ml', 45, 22700, 1, 6, '35.png', 'SoKlin Floor Cleaner is a new high technology concept floor cleaner with aromatherapy freshagrance'),
(72, 2, 'Super Pell Pembersih Lantai Cherry Rose Pouch 770Ml', 45, 10800, 1, 6, '36.png', 'Super Pell cairan pembersih lantai dengan formula acti-shine technology'),
(73, 14, 'Mr. Muscle Glass Liquid Lavender Pump 500 ml', 30, 10500, 1, 6, '37.png', 'Pembersih dari Mr. Muscle ini juga dapat digunakan pada barang berbahan stainless steel, plastik, vinyl, keramik'),
(74, 17, 'Porstex Pembersih Keramik Biru Botol 500 ml', 45, 20800, 1, 6, '38.png', 'Porstex adalah cairan Pembersih efektif menghilangkan kotoran membandel pada permukaan porselin'),
(75, 17, 'Rinso Molto Deterjen Bubuk Purple 1.8 kg', 57, 35500, 1, 6, '39.png', 'Rinso Molto Purple 1.8kg merupakan produk deterjen terbaru dari RINSO'),
(76, 17, 'So Klin Pewangi Merah Pouch 1800mL', 36, 16300, 1, 6, '40.png', 'So Klin Pewangi Regular, is your secret of perfume fresheshness. shelf life 24 month'),
(77, 17, 'WHISKAS® Makanan Kucing Kering Junior Rasa Ocean Fish 450 Gr', 67, 27800, 1, 6, '41.png', 'WHISKAS makanan kucing lengkap dan seimbang, dirancang khusus untuk memenuhi kebutuhan kucing'),
(78, 17, 'Hit Aerosol Lily Blossom 600ml+75ml', 64, 33600, 1, 6, '42.png', 'IT Aerosol merupakan anti nyamuk berbetuk aerosol untuk membasmi nyamuk, lalat dan kecoa didalam ruangan.'),
(79, 19, 'Wardah EyeXpert Perfectcurl Mascara 7 g', 74, 49500, 1, 4, '43.png', 'Dengan Curl Lock Power untuk bulu mata yang lebih tebal, panjang, dan lentik sempurna sepanjang hari'),
(80, 19, 'Emina Cheeklit Cream Blush', 46, 25000, 1, 4, '44.png', 'Emina Cheeklit Cream Blush enhances your cheek natural glow and makes it Wow.'),
(81, 19, 'MAKE OVER Powerstay Demi-Matte Cover Cushion 15 g', 57, 172000, 1, 4, '45.png', 'Make Over Demi-Matte Cover Cushion merupakan cushion compact yang tahan lama hingga 12 jam'),
(82, 19, 'Wardah Exclusive Matte Lip Cream 03 See You Latte 4 gr', 45, 41500, 1, 4, '46.png', 'inovasi Lushlip Liquid dengan tekstur cream lembut untuk aplikasi sekali oles dengan warna merata.'),
(83, 19, 'Emina Bright Stuff Loose Powder 55 g', 64, 16900, 1, 4, '47.png', 'Dengan micro smooth particles yg akan menyatu sempurna dengan kulit sehingga memberikan hasil akhir yg ringan dan matte.'),
(84, 19, 'Pixy Uvw Twc Perfect Last 03 - Sand Beige', 53, 30000, 1, 4, '48.png', 'Two Way Cake yang bertekstur halus dan lembut , menghasilkan make up dengan tampak halus.'),
(85, 18, 'Maybelline Push Up Drama Mascara', 35, 90000, 1, 4, '49.png', 'Maskara waterproof dengan teknologi cup-shaped bristles pada push up brush dan creamy plumping formula yang membuat bulu mata terlihat tebal dramatis'),
(86, 19, 'FOCALLURE 10 Color Eyeshadow Palette Nude Edition with Brush', 24, 108000, 1, 4, '50.png', 'Focallure Ten Colors Eye Shadow Beauty Makeup Shimmer Matte Eyeshadow Earth Color Eyeshadow Palette Cosmetic'),
(87, 19, 'Evangeline Eau De Parfum Aura 100ml', 27, 50000, 1, 4, '51.png', 'EVANGELINE Perfume Aura 100ml merupakan perfume dari Evangeline yang memiliki aroma Aura yang memberikan Anda kesegaran sepanjang hari.'),
(88, 18, 'Just Miss Angled Blush Brush 872', 23, 28700, 1, 4, '52.png', 'Angled Blush Brush dengan bulu-bulu lembut dengan kualitas premium'),
(89, 1, 'Le Minerale 1500ml', 100, 3900, 1, 2, '53.png', 'Le Minerale 1500ml merupakan air mineral murni dan terawetkan yang bersumber dari gunung dan dikemas langsung di lokasi menggunakan teknologi terbaru'),
(90, 1, 'AQUA Life 1100 ml', 53, 6200, 1, 2, '54.png', 'QUA LIFE - inovasi nyata AQUA untuk mendukung Indonesia yag lebih #BijakBerplastik.'),
(91, 1, 'AQUA Air Mineral 1500 ml', 150, 4200, 1, 2, '55.png', 'Air mineral berkualitas yang berasal dari sumber air pegunungan pilihan dan terlindungi.'),
(92, 2, 'Frestea Green Pet 500 mL', 64, 4800, 1, 2, '56.png', 'Frestea Green PET 500 mL merupakan minuman teh hijau segar dengan rasa yang unik dan membuat ketagihan.'),
(93, 14, 'Teh Pucuk Harum 500ml', 75, 5000, 1, 2, '57.png', 'Teh Pucuk Harum 500ml terbuat dari ujung daun teh, diproduksi secara higienis dengan teknologi canggih AST'),
(94, 16, 'Nescafe Original Can 240ml', 53, 10300, 1, 2, '58.png', 'Nescafe Original Can 240ml adalah kopi instan berbahan dasar dari biji kopi berkualitas terbaik'),
(95, 2, 'Coca-Cola Slim Can 250 mL', 150, 4900, 1, 2, '59.png', 'Coca-Cola Slim Can 250 mL merupakan minuman ringan berkarbonat yang paling terkenal di seluruh dunia'),
(96, 2, 'Fanta Orange Pet 390 mL', 49, 5300, 1, 2, '60.png', 'Fanta Orange PET 390 mL merupakan minuman ringan bersoda dengan rasa orange yang menyegarkan'),
(97, 16, 'Jetz Stick Chocofiesta 40 Gr', 100, 3500, 1, 1, '61.png', 'Jetz Stick Chocofiesta 40 Gr merupakan mie goreng instant yang dibuat dari bahan-bahan berkualitas tinggi'),
(98, 14, 'Chitato Spicy Chicken 68gr', 74, 6500, 1, 1, '66.png', 'Chitato Spicy Chicken 68gr merupakan keripik kentang persembahan Chitato dengan rasa ayam bumbu yang nikmat untuk Anda.'),
(99, 14, 'Mayasi Pedas 65gr', 46, 9000, 1, 1, '63.png', 'Mayasi Pedas 65gr merupakan kacang panggang yang kaya akan serat dan cita rasa.'),
(100, 17, 'Rebo Kuaci Bunga Matahari Super 150Gr', 49, 13000, 1, 1, '62.png', 'Rebo Kuaci Bunga Matahari Super 70gr merupakan cemilan yang dibuat dari biji bunga matahari yang berkualitas.'),
(101, 14, 'Nextar Pineapple 14gr x 8', 37, 6500, 1, 1, '68.png', 'Nextar Pineapple 14gr x 8 merupakan biskuit dengan nanas didalamnya membuat brownis yang lezat dan lembut.'),
(102, 14, 'Mr. Hottest Maitos Tortilla Chips Rasa BBQ Fiesta 55 gr', 49, 3900, 1, 1, '67.png', 'Snack yang terbuat dari bahan baku jagung asli dan dapat di sajikan sebagai hidangan pembuka, lauk atau snack malam...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `id_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_checkout`),
  KEY `CHECKOUT_TRANSAKSI` (`id_transaksi`),
  KEY `CHECKOUT_BARANG` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `id_transaksi`, `id_barang`, `jumlah`, `total_harga`, `date_created`) VALUES
(49, 34, 4, 1, 100000, '2020-12-26'),
(50, 34, 9, 1, 12500, '2020-12-26'),
(51, 36, 4, 1, 100000, '2020-12-26'),
(52, 36, 9, 1, 12500, '2020-12-26'),
(53, 38, 4, 1, 100000, '2020-12-26'),
(54, 38, 9, 1, 12500, '2020-12-26'),
(55, 38, 18, 1, 29000, '2020-12-26'),
(56, 40, 4, 1, 100000, '2020-12-26'),
(57, 40, 9, 1, 12500, '2020-12-26'),
(58, 42, 5, 1, 10000, '2020-12-26'),
(59, 42, 14, 1, 14000, '2020-12-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

DROP TABLE IF EXISTS `distributor`;
CREATE TABLE IF NOT EXISTS `distributor` (
  `id_distributor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `no_telp_distributor` varchar(50) NOT NULL,
  `status_distributor` int(11) NOT NULL,
  `date_created` date DEFAULT current_timestamp(),
  `date_updated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id_distributor`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_perusahaan`, `nama_distributor`, `no_telp_distributor`, `status_distributor`, `date_created`, `date_updated`) VALUES
(1, 'PT Unilever Indonesia', 'Rahmat Dianto', '086574837413', 0, '2020-12-23', '2020-12-23'),
(2, 'PT Coca', 'Rahmawati', '85473849321', 0, '2020-12-23', '2020-12-23'),
(14, 'PT Jaya Makmur', 'Rey Barack', '0854643254321', 0, '2020-12-23', '2020-12-23'),
(16, 'PT Chocolatos', 'Rey Barack', '0854643254321', 0, '2020-12-23', '2020-12-23'),
(17, 'PT Sumber Jaya', 'Rahma Diyanto', '085433748223', 0, '2020-12-24', '2020-12-24'),
(18, 'PT . L\'Oreal Indonesia', 'cahyani dwi', '081331245678', 1, '2020-12-25', '2020-12-25'),
(19, 'PT Paragon Technology', 'Bambang darsono', '081771675789', 1, '2020-12-25', '2020-12-25'),
(20, 'PT. Sarana Tani Pratama', 'Joko Atmojo', '081554675423', 1, '2020-12-25', '2020-12-25'),
(21, 'PT Prakarsa Alam', 'Subekti', '082313452465', 1, '2020-12-25', '2020-12-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

DROP TABLE IF EXISTS `grup`;
CREATE TABLE IF NOT EXISTS `grup` (
  `id_grup` int(11) NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(50) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id_grup`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id_grup`, `nama_grup`, `date_created`) VALUES
(1, 'pemilik', '2020-12-22'),
(2, 'pegawai', '2020-12-22'),
(3, 'pelanggan', '2020-12-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`, `date_created`) VALUES
(1, 'MKR', 'Makanan Ringan', '2020-12-23'),
(2, 'MIN', 'Minuman', '2020-12-23'),
(4, 'KMS', 'Kosmetik', '2020-12-24'),
(6, 'PRT', 'Perawatan Rumah Tangga', '2020-12-25'),
(7, 'BBY', 'Ibu & Bayi', '2020-12-25'),
(8, 'KST', 'Kesehatan', '2020-12-25'),
(9, 'BDR', 'Makanan Pokok & Bumbu Dapur', '2020-12-25'),
(10, 'PRD', 'Perawatan Diri', '2020-12-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_keranjang`),
  KEY `KERANJANG_USER` (`id_user`),
  KEY `KERANJANG_BARANG` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `alamat_pegawai` varchar(200) DEFAULT NULL,
  `no_telp_pegawai` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `PEGAWAI_USER` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `alamat_pegawai`, `no_telp_pegawai`) VALUES
(1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `alamat_pelanggan` varchar(200) DEFAULT NULL,
  `kode_pos_pelanggan` int(11) DEFAULT NULL,
  `kota_pelanggan` varchar(100) DEFAULT NULL,
  `negara_pelanggan` varchar(100) DEFAULT NULL,
  `no_telp_pelanggan` varchar(50) DEFAULT NULL,
  `photo_pelanggan` varchar(200) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id_pelanggan`),
  KEY `PELANGGAN_USER` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `alamat_pelanggan`, `kode_pos_pelanggan`, `kota_pelanggan`, `negara_pelanggan`, `no_telp_pelanggan`, `photo_pelanggan`) VALUES
(1, 5, NULL, 0, '', '', NULL, 'default.jpg'),
(2, 4, NULL, 0, '', '', NULL, 'default.jpg'),
(3, 1, 'Jalan Merpati', 63154, 'Surabaya', 'Indonesia', '6285606392213', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

DROP TABLE IF EXISTS `pemilik`;
CREATE TABLE IF NOT EXISTS `pemilik` (
  `id_pemilik` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pemilik`),
  KEY `PEMILIK_USER` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `id_user`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`status_bayar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`status_bayar`, `nama_status`, `date_created`, `date_updated`) VALUES
(0, 'Belum dibayar', '2020-12-26', '2020-12-26'),
(1, 'Menunggu Konfirmasi', '2020-12-26', '2020-12-26'),
(2, 'Pembayaran Ditolak', '2020-12-26', '2020-12-26'),
(3, 'Pembayaran Berhasil', '2020-12-26', '2020-12-26'),
(4, 'Sedang Dikemas', '2020-12-26', '2020-12-26'),
(5, 'Proses Pengiriman', '2020-12-26', '2020-12-26'),
(6, 'Selesai', '2020-12-26', '2020-12-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `total_bayar` int(50) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `tanggal_bayar` date DEFAULT current_timestamp(),
  `batas_bayar` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_transaksi`),
  KEY `TRANSAKSI_USER` (`id_user`),
  KEY `TRANSAKSI_STATUS` (`status_bayar`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `total_bayar`, `status_bayar`, `bukti_bayar`, `tanggal_bayar`, `batas_bayar`) VALUES
(34, 1, 112500, 0, '', '2020-12-26', '2020-12-27'),
(36, 1, 112500, 6, 'bukti.jpg', '2020-12-26', '2020-12-27'),
(38, 1, 141500, 6, 'bukti5.jpg', '2020-12-26', '2020-12-27'),
(40, 1, 112500, 5, 'bukti3.jpg', '2020-12-26', '2020-12-27'),
(42, 1, 24000, 1, 'bukti2.jpg', '2020-12-26', '2020-12-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_grup` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `USER_GRUP` (`id_grup`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_grup`, `nama`, `email`, `password`, `date_created`) VALUES
(1, 3, 'Pelanggan 1', 'pelanggan@gmail.com', '$2y$10$lKbhoHUExeFONB.t6yVASutWMYOmo9e7wSDOvXYedd9.F0mmSIFry', '2020-12-22'),
(2, 1, 'Pemilik', 'pemilik@gmail.com', '$2y$10$gUXPIGBGnduJLziOVJNB3.P90ovqw.2DphvQb.drKj5Airw7E22tW', '2020-12-22'),
(3, 2, 'Pegawai', 'pegawai@gmail.com', '$2y$10$6H9u.vCSOo7CAR1EkF.GIu.MKh.wlv8C5hbMu1SD55SdV.XBVz0Pu', '2020-12-22'),
(4, 3, 'Pelanggan 2', 'test@gmail.com', '$2y$10$WqtTpmaL6g6ouMS3c/qnK.IigJ/YMEAUaaZti5w9RqTJkbcXplLku', '2020-12-22'),
(5, 3, 'pelanggan', 'testpelanggan@gmail.com', '$2y$10$jLpQjbzUMtLg8g20Mbu9y.zDgbfx.nOV6PVKuj0wbEovd36y93ZkW', '2020-12-24');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `BARANG_DISTRIBUTOR` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `BARANG_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `CHECKOUT_BARANG` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `CHECKOUT_TRANSAKSI` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `KERANJANG_BARANG` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `KERANJANG_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `PEGAWAI_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `PELANGGAN_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `PEMILIK_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `TRANSAKSI_STATUS` FOREIGN KEY (`status_bayar`) REFERENCES `status` (`status_bayar`),
  ADD CONSTRAINT `TRANSAKSI_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `USER_GRUP` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id_grup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
