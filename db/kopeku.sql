-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 07:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopeku`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggora`
--

CREATE TABLE `anggora` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nomor_whatsapp` varchar(20) DEFAULT NULL,
  `alamat_google_maps` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggora`
--

INSERT INTO `anggora` (`id`, `nama`, `harga`, `lokasi`, `deskripsi`, `gambar`, `nomor_whatsapp`, `alamat_google_maps`) VALUES
(1, 'Micail', 100000.00, 'Malang', 'Micail adalah kucing Anggora betina yang memiliki bulu putih panjang dan lembut. Dia sangat ramah dan gemar bermain. Micail telah divaksinasi dan dia terlatih untuk menggunakan bak pasir.', '1716927106_2793bdb56b14ae1d812a.jpeg', '081266291189', 'https://maps.app.goo.gl/9xMguCCWXE8C13cC6'),
(2, 'Snowball', 3000000.00, 'Cianjur', 'Snowball adalah kucing Anggora jantan berwarna putih dengan mata biru yang memesona. Dia sangat penyayang dan suka bermanja-manja. Snowball juga sudah diobati cacing dan sudah disuntik vaksin.', '1716927113_d83f1b22defd16c1d70c.jpg', '08123456789', 'https://maps.app.goo.gl/FEwifJdfboSuubCVA'),
(3, 'Max', 150000.00, 'Jakarta', 'Max adalah kucing Anggora jantan berwarna cokelat dengan bulu yang tebal dan ekor yang panjang. Dia sangat energik dan suka bermain dengan mainan kucing. Max sudah divaksinasi dan telah diberi perlindungan terhadap parasit.', '1716927133_13aa376c1e3e0dc2cfad.jpg', '081267933231', 'https://maps.app.goo.gl/m4UiwYmeLccEAu3YA'),
(4, 'Juan', 2000000.00, 'Batam', 'Juan adalah kucing Anggora betina berwarna hitam yang elegan dengan mata kuning yang tajam. Dia memiliki bulu yang panjang dan berkilau serta sangat cerdas. Luna sangat menyukai perhatian dan suka tidur di pangkuan. Dia sudah diberi perawatan gigi dan divaksinasi.', '1716927143_42a07c5b37ccaac88751.jpg', '098312378491', 'https://maps.app.goo.gl/LHAHMkTxDaohB34R6'),
(5, 'Xenia', 200000.00, 'Kabupaten Malang', 'tes3', '1716932070_45429935a95986801c32.jpg', '01231312312', 'https://maps.app.goo.gl/RtMQipDwooJLPfVw7');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi1` text NOT NULL,
  `isi2` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `gambar`, `isi1`, `isi2`, `created_at`) VALUES
(1, 'Tanda Kucing akan Melahirkan', 'Catlovers, tahukah kamu, sebagai pemilik kucing tentu kamu harus memahami apa saja tanda-tanda kucing akan melahirkan. Kenapa? Yuk, simak beberapa tanda yang biasa muncul ketika kucing kamu mau melahirkan.', '1717152133_6cf194326aac62bd5389.jpg', 'Jika kamu mendapati kucingmu mondar-mandir mengelilingi isi rumah saat sedang hamil besar, bisa dipastikan ini adalah tanda bahwa dia akan segera melahirkan. Ya, kucing akan mencari tempat yang jauh dari gangguan luar yang bisa membahayakan anak-anaknya nanti.', 'Induk kucing akan mencari tempat yang aman dan hangat seperti lemari baju, dapur, gudang, atau atap rumah sebagai tempat persembunyian.', '2024-05-31 10:42:13'),
(2, 'Penglihatan Seekor Kucing', 'Si meong satu ini memang menjadi hewan kesayangan banyak orang. Wajahnya yang lucu dan tingkahnya yang manja membuat kita betah berlama-lama dengannya. Sesekali ia memperlihatkan perilakunya yang sulit kita pahami, tapi itu tidak membuat kita membencinya bukan?', '1717031347_14331968779acc10b9c4.jpg', 'Namun, yang menjadi pertanyaan adalah bagaimana dunia ini dilihat oleh mata seekor kucing ya catlovers? Dengan bentuk mata yang hampir sama dengan semua mamalia, kucing punya istilah ‘mata kucing’ yang seringkali diasumsikan sebagai ketajaman visi dari binatang yang memiliki banyak sekali jenis tersebut.', 'Kemampuan kucing dalam melihat dan perbandingannya dengan manusia, direpresentasikan oleh seorang artist bernama Nickolay Lamm, yang berkonsultasi bersama seorang opthalmologist atau spesialis mata, dari kedokteran hewan University of Pennsylvania. Sang artist membandingkan secara langsung antara kemampuan penglihatan manusia dan kucing, hanya dalam satu gambar.', '2024-05-30 01:09:07'),
(3, 'IQ Kucing Bisa Diukur, Benarkah Demikian?', 'Pasti catlovers tidak pernah menyangka ‘kan jika IQ kucing ternyata dapat diukur lho. Bahkan, beberapa penelitian tentang kecerdasan kucing sudah dilakukan. Salah satunya penelitian yang dilakukan pada 2009 yang dipublikasikan oleh Japan Springer. ', '1717038055_3902092578e74d1ed6e2.jpg', 'Kucing memiliki memori yang baik. Setiap kucing tahu pasti di mana mereka akan mendapatkan makan ketika jam makan. Itu karena kucing memprogram diri mereka dengan jadwal rutinitas. Faktanya, kucing sangat sensitif dengan perubahan jadwal. Mereka mungkin akan merasa stres kalau jadwal makannya molor dari biasanya.', 'Cobalah catlovers tempatkan camilan yang ia sukai di lantai dan tutup dengan selembar koran atau tisu. Ketika si kucing mengawasimu, dengan teknik ini catlovers bisa tahu apakah ia ingat dan mencarinya di situ.', '2024-05-30 03:00:55'),
(4, 'Peneliti Sebut Perbedaan Cara Minum Kucing dan Anjing', 'Penelitian tersebut membuktikan bahwa kucing dapat memuaskan dahaga tanpa harus membuat air berceceran di sekitarnya. Hal berbeda berlaku pada cara minum anjing, yang penuh percikan serta cipratan.', '1717152647_118888b69bf8f5520a99.jpg', 'Temuan terbaru dari American Physical Society, yang dipaparkan di San Fransisco, mengungkapkan bukti tentang cara minum kucing. Baik kucing maupun anjing tidak dapat mengencangkan pipi mereka untuk melakukan gerakan menyedot seperti manusia.', 'Jika lidah kucing menyentuh permukaan air dengan gerakan halus, anjing menjilat air dengan gerakan yang lebih agresif seperti ditunjukkan oleh kamera yang dipasang di dalam air. Jung mengatakan, “(anjing) banyak membuat percikan, namun kucing tidak pernah melakukan itu.”', '2024-05-31 10:50:47'),
(5, 'Si Meong Bertengkar dengan Kucing Lain, Begini Cara Mengatasinya', 'Pada habitat aslinya, sebenarnya kucing merupakan hewan yang senang menyendiri. Tapi, jika mereka melihat kucing lain, bisa kapan saja terjadi perkelahian di antara mereka lho. ', '1717152396_c1f500d74851f9703883.jpg', 'Ketika catlovers sudah terlanjur melihat pertengkaran mereka, kamu tak perlu panik ya. Sebab, beberapa cara ini dapat kamu lakukan untuk melerai perkelahian keduanya. Yuk, simak penjelasan berikut!', '    Catlovers wajib memperhatikan ketika kucingmu mulai emosi dan suara meongnya mulai meninggi, bulu berdiri dengan ekor yang terlihat tegang.\r\n    Jika mereka sudah berkelahi, catlovers hentikan kegaduhan tersebut dengan tepukan tangan yang agak kencang, dan jangan berteriak ya. Pasalnya, teriakanmu justru akan membuat mereka semakin marah. Jadi, cobalah bersikap tenang ya.\r\n    Catlovers juga bisa menggunakan semprotan air atau percikan air untuk melerai perkelahian kucing. Hal ini karena air membuat konsentrasi kucing terpecah dan memilih untuk buru-buru membersihkan bulu yang basah daripada meneruskan perkelahian.\r\n    Pisahkan kucing di ruangan yang berbeda. Kucing yang marah akan lebih cepat melupakan musuhnya ketika ia tak melihatnya.\r\n    Untuk mengelabuinya, catlovers bisa mengoleskan kaldu atau minyak ikan di tangan kucing. Aroma tajam dan lezat yang menempel di bulu membuat kucing sibuk menjilatinya. Bahkan, mereka yang sebelumnya bertengkar bisa saling menjilati dan melupakan perselisihannya. (as)\r\n', '2024-05-31 10:46:36'),
(6, 'Kucing Takut Dengan Air? Ketahui Penyebabnya', 'Hai, catlovers! Kucing merupakan hewan peliharaan yang lucu dan menggemaskan. Banyak orang yang memeliharanya karena mudah dirawat dan mudah nurut dengan pemiliknya. Namun perlu diketahui mengapa kucing yang dipelihara takut dengan air.', '1717152621_f80bda288bd15d64837c.jpg', 'Hal ini terjadi karena bulu kucing yang cukup tebal dapat menyerap air cukup banyak. Maka kucing akan sulit untuk bergerak. Selain membuat badannya menjadi lebih berat, kucing juga akan menjadi kedinginan dan bahkan akan menyebabkan kucing menjadi sakit.', 'Hal ini terjadi karena bulu kucing yang cukup tebal dapat menyerap air cukup banyak. Maka kucing akan sulit untuk bergerak. Selain membuat badannya menjadi lebih berat, kucing juga akan menjadi kedinginan dan bahkan akan menyebabkan kucing menjadi sakit.', '2024-05-31 10:50:21'),
(7, 'Ternyata Ini Manfaat Minyak Ikan untuk Kucing Peliharaan', 'Ketika catlovers memutuskan untuk memelihara si makhluk berbulu di rumah, kamu bukan sekadar memberikan perawatan, memberi makanan, dan juga kasih sayang padanya ya.', '1717370891_9b7ff4681d21e8531daf.jpg', 'Untuk itu, beberapa catlovers memutuskan untuk memberikan vitamin tambahan pada sahabat berbulunya. Hal ini karena pemberian vitamin tambahan juga dianjurkan agar tubuh kucing senantiasa sehat dan terhindar dari beragam serangan penyakit.', 'Mungkin sebagian catlovers sudah mengetahui manfaat minyak ikan untuk menjaga kesehatan kulit dan bulu kucing. Tapi, apakah hanya sebatas itu manfaat minyak ikan bagi kesehatan kucing? Jawabannya adalah tidak, ternyata masih banyak sekali manfaat minyak ikan bagi kucing kita.', '2024-06-02 23:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `content`, `created_at`) VALUES
(1, 1, 'mantap', 'mantap', '2024-05-29 23:53:51'),
(2, 1, 'jkkj', 'kjkj', '2024-05-30 21:30:08'),
(3, 2, '1', '1', '2024-05-30 21:31:02'),
(4, 1, '1', '1', '2024-05-31 02:08:35'),
(5, 1, '1', '1', '2024-05-31 02:08:48'),
(11, 2, 'Abel', 'Keknya enak hehe', '2024-06-02 16:20:50'),
(12, 1, 'tes', 'halo', '2024-06-03 20:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `domestik`
--

CREATE TABLE `domestik` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nomor_whatsapp` varchar(20) NOT NULL,
  `alamat_google_maps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `domestik`
--

INSERT INTO `domestik` (`id`, `nama`, `harga`, `lokasi`, `deskripsi`, `gambar`, `nomor_whatsapp`, `alamat_google_maps`) VALUES
(1, 'Mas Pajero', 50000.00, 'Tangerang', 'tes1', '1716929853_759bd2fa3c26fc5c4c1b.jpg', '01239120391', 'https://maps.app.goo.gl/UhFhGSEC2D8qzjc36'),
(2, 'Pak Ijul', 200000.00, 'Kabupaten Malang', 'Kucing baru dari petshop IuraShop, Pak Ijul sangat ramah dan tidak bandel.', '1717368755_bb9ce0f714dbdde62281.jpeg', '0812738941411', 'https://maps.app.goo.gl/BqHFd1ZsxTo4RuRRA');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `judul`, `nama_pengirim`, `deskripsi`, `gambar`, `created_at`) VALUES
(1, '1', '1', '1', '1717049195_bc38d1cc4fb21f0c3518.jpg', '2024-05-29 23:06:35'),
(2, '2', '2', '2', '1717053738_425799b7d514d4fa89de.jpg', '2024-05-30 00:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `mainecoon`
--

CREATE TABLE `mainecoon` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nomor_whatsapp` varchar(20) NOT NULL,
  `alamat_google_maps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mainecoon`
--

INSERT INTO `mainecoon` (`id`, `nama`, `harga`, `lokasi`, `deskripsi`, `gambar`, `nomor_whatsapp`, `alamat_google_maps`) VALUES
(1, 'Bang bro', 120000.00, 'Padang', 'Pantai boii', '1716935716_34e967031d635e56084a.jpg', '089121324141', 'https://maps.app.goo.gl/hLvvkCY3nVDswxXWA'),
(2, 'Si gembul', 300000.00, 'Aceh', 'Kucing imut ini mau tak jual', '1716935795_4bae6656cf60c7be3708.jpg', '082136017389', 'https://maps.app.goo.gl/xjkMc6q9VgYsFqEJA');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-05-31-102100', 'App\\Database\\Migrations\\AddLoveCountToForum', 'default', 'App', 1717150898, 1);

-- --------------------------------------------------------

--
-- Table structure for table `persia`
--

CREATE TABLE `persia` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nomor_whatsapp` varchar(20) NOT NULL,
  `alamat_google_maps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persia`
--

INSERT INTO `persia` (`id`, `nama`, `harga`, `lokasi`, `deskripsi`, `gambar`, `nomor_whatsapp`, `alamat_google_maps`) VALUES
(1, 'tes1', 100000.00, 'Palembang', 'daddasd', '1716934608_b2bacc9e7585a7555afc.jpeg', '031323133123', 'https://maps.app.goo.gl/2fdwzPSymrtWqB3W9'),
(2, 'mak lo gaming', 10222310.00, 'Sukun', 'tes12133131', '1716934783_c51a7255cb1ae09a7b62.jpg', '01923102381', 'https://maps.app.goo.gl/tPnSEYhBmSQAdnqS9');

-- --------------------------------------------------------

--
-- Table structure for table `postkucing`
--

CREATE TABLE `postkucing` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postkucing`
--

INSERT INTO `postkucing` (`id`, `judul`, `nama_pengirim`, `deskripsi`, `gambar`, `created_at`) VALUES
(1, 'Kucingku', 'Abel', 'Imut Banget tidurnya bisa gitu', '1717153275_864f866958a9d18012b2.jpg', '2024-05-31 11:01:15'),
(2, 'koniciwa', 'Gerry', 'Kucing berbulu imut ku, cek keranjang kuning', '1717294292_556c6eaef75bd30b1f68.jpg', '2024-06-02 02:11:32'),
(29, '1', '1', 'ijhuh', '1717447443_1400f22cc523c97916af.jpg', '2024-06-03 20:44:03'),
(30, 'kucing mahal', 'della', 'jhkrfkjgkjdkjf', '1717448268_cf29570d39648d6d50b6.jpg', '2024-06-03 20:57:48'),
(31, 'jkj', 'kllkl', 'jhjhjkhkhkj', '1717473056_4cdb87fa2a5cd0792138.jpg', '2024-06-04 03:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `sphynx`
--

CREATE TABLE `sphynx` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nomor_whatsapp` varchar(20) NOT NULL,
  `alamat_google_maps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sphynx`
--

INSERT INTO `sphynx` (`id`, `nama`, `harga`, `lokasi`, `deskripsi`, `gambar`, `nomor_whatsapp`, `alamat_google_maps`) VALUES
(1, 'Seping', 5000000.00, 'Jawa barat', 'Kucing mahal bang ati ati', '1716935094_a21ff95c067ddb9147a0.jpg', '0812781231', 'https://maps.app.goo.gl/M4vemZxbjjoHXJWL8'),
(2, 'Supli', 7000000.00, 'Surabaya', 'Panas boiii', '1716935208_3bcd9e4241ee3a388034.jpg', '081223121912', 'https://maps.app.goo.gl/V8R4beqpACACL19o7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'abel', 'abel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggora`
--
ALTER TABLE `anggora`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `domestik`
--
ALTER TABLE `domestik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainecoon`
--
ALTER TABLE `mainecoon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persia`
--
ALTER TABLE `persia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postkucing`
--
ALTER TABLE `postkucing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sphynx`
--
ALTER TABLE `sphynx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggora`
--
ALTER TABLE `anggora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `domestik`
--
ALTER TABLE `domestik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mainecoon`
--
ALTER TABLE `mainecoon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `persia`
--
ALTER TABLE `persia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `postkucing`
--
ALTER TABLE `postkucing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sphynx`
--
ALTER TABLE `sphynx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `forum` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
