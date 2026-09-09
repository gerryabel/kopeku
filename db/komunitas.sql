-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2025 at 04:08 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komunitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', '2025-06-05 23:36:01', '2025-06-05 23:38:55'),
(2, 'Malang', '2025-06-05 23:47:16', '2025-06-05 23:47:42'),
(3, 'Jakarta', '2025-06-05 23:48:49', '2025-06-11 20:36:11'),
(4, 'Tangerang', '2025-06-05 23:50:07', '2025-06-05 23:50:07'),
(5, 'Yogyakarta', '2025-06-05 23:50:49', '2025-06-05 23:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_id` bigint UNSIGNED NOT NULL,
  `applicant_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `cat_id`, `applicant_id`, `status`, `message`, `created_at`, `updated_at`) VALUES
(23, 38, 6, 'pending', 'coba', '2025-06-12 00:40:24', '2025-06-12 02:30:15'),
(24, 38, 7, 'approved', 'coba', '2025-06-12 00:40:49', '2025-06-12 00:43:18'),
(26, 52, 7, 'approved', 'vvoas', '2025-06-12 04:46:16', '2025-06-15 21:58:29'),
(27, 39, 6, 'rejected', 'mau', '2025-06-14 00:52:08', '2025-06-15 21:46:16'),
(28, 54, 7, 'approved', 'coba', '2025-06-15 07:02:09', '2025-06-15 21:56:52'),
(29, 40, 14, 'approved', 'coba11', '2025-06-15 21:16:15', '2025-06-15 21:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `admin_id`, `title`, `slug`, `content`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(2, 3, 'Ini Kucing Terindah di Dunia', 'ini-kucing-terindah-di-dunia', 'Kucing spesies Caracal caracal atau dikenal juga sebagai kucing caracal (dibaca: karakal) digadang-gadang menjadi kucing paling indah di dunia. Jika kucing lain terkesan imut dan menggemaskan, tampilan kucing yang satu ini lebih anggun dan ramping. Namun, ia juga berotot dan tangguh.\r\n\r\nKucing caracal tersebar di banyak negara Asia dan Afrika. Ia mendapat julukan sebagai kucing terberat dan tercepat dibandingkan jenis kucing kecil lainnya. Tentu saja, penilaian ini tidak melibatkan ‘kucing raksasa’ seperti cheetah ataupun harimau, ya.\r\n\r\nKeindahan kucing caracal salah satunya bersumber dari telinganya yang menyerupai antena. Telinga ini berwarna hitam dan berumbai. Penamaan kucing caracal pun berasal dari bentuk telinganya tersebut.\r\n\r\nDalam bahasa Turki, karakulak bisa diartikan sebagai telinga hitam. Sangat sesuai dengan kucing caracal bertelinga hitam ini. Pada telinga kucing caracal, ada 29 otot yang berbeda. Tentu saja hal ini sangat bermanfaat bagi kucing saat mencari mangsa.\r\n\r\nKucing caracal normal bisa bertahan hidup hingga 12 tahun. Jika mendapat perhatian dan kesehatan yang mencukupi, kucing ini bisa hidup 7 tahun lebih lama lagi, lho! Perkembangbiakan kucing caracal juga terjadi sama seperti kucing lainnya, yakni ia akan melahirkan setelah hamil selama 2—3 bulan.\r\n\r\nKucing telinga hitam ini bisa mengintai mangsa dalam radius lima meter. Dengan kecepatannya, ia mampu menerkam mangsa yang sudah diincarnya tersebut. Biasanya, kucing caracal akan memangsa unggas berukuran kecil. Terkadang, kucing caracal juga memburu mangsa dengan ukuran tubuh yang lebih besar darinya.\r\n\r\nCaracal juga punya ciri khas unik lainnya yang tak dimiliki kucing lain. Kucing caracal bisa “menggonggong”, lho. Tidak seperti kucing lain yang bisa mengeong saja, caracal juga bsia menggeram, mendesis, dan mendengkur.\r\n\r\nKarena keunikannya, kucing caracal banyak digandrungi para pecinta kucing. Satu ekor kucing caracal belia bisa dibanderol hingga Rp132 juta! Angka yang sangat fantastis, bukan?!', 'articles/d7ESGYSLOQHeBnWkRiVTOeKTxz42RbMDtXGXQsip.jpg', '2025-05-24 08:10:11', '2025-06-05 09:44:45', 1),
(3, 3, 'Kucingmu Lakukan Ini? Itu Tanda Dia Sayang, Lho', 'kucingmu-lakukan-ini-itu-tanda-dia-sayang-lho', 'Ada banyak tanda kucing menyayangimu sebagai pemiliknya. Beberapa di antaranya mungkin tidak kamu sadari karena tanda-tanda tersebut memang tidak langsung bisa terlihat. Sudah tahu apa saja?\r\n\r\nMendengkur saat dielus\r\n\r\nKucing sangat suka dielus, lho. Terutama di beberapa bagian tubuhnya seperti kepala dan leher. Di bagian-bagian tubuh inilah paling banyak terdapat kelenjar yang bisa mentransferkan aroma kucing kepada pemiliknya. Jadi, apakah si meong suka mendengkur saat kamu elus?\r\n\r\nMemamerkan perutnya\r\n\r\nKucing sangat suka berbaring dan memamerkan perutnya. Apalagi ketika ada pemiliknya, kucing sangat gemar menunjukkan bagian perutnya tersebut. Biasanya, kucing akan merebahkan dirinya jika berada di dekat pemilik. Apakah kucing kamu juga demikian? Jika iya, berarti dia sedang menunjukkan rasa sayangnya.\r\n\r\nMengedipkan mata\r\n\r\nNggak cuma manusia yang suka menggoda dengan mengedipkan mata, kucing pun demikian. Mata kucing akan menutup perlahan, kemudian membuka kembali jika ia melihat pemiliknya. Gerakan ini tidak terlalu terlihat jika diperhatikan sekilas.\r\n\r\nMemjiat badan\r\n\r\nSelain beberapa hal di atas, hal lain yang bisa terlihat dari kucing peliharaan adalah ia senang naik ke tubuh kita. Mulai dari kaki sampai punggung, kadang bahkan sambil berjalan atau memberikan pijatan pada tubuh kita.\r\n\r\nKalau kamu, bagian tubuh mana yang paling sering dipijat kucing? Kucing biasanya akan senang memberikan pijatan di bagian punggung. Coba saja rebahkan badan di dekat kucingmu.\r\n\r\nMencakar dan menggigit\r\n\r\nBukan karena marah, melainkan kucing bisa jadi mencakar dan menggigit untuk mengajakmu bermain, lho. Kucing tidak seperti manusia yang bisa mengekspresikan sesuatu dalam bentuk kalimat. Ia senang bermain dan berusaha mengajak pemiliknya.\r\n\r\nCakaran dan gigitan kucing yang diberikan pun tidak akan dilakukan dengan tujuan melukai kamu. Jika kucing sudah melakukan hal tersebut, coba ajak bermain beberapa permainan kucing seperti memberinya mainan kucing, dan sebagainya.\r\n\r\nJadi, jangan ragu lagi ya untuk mengajak kucing beraktivitas. Hal-hal sederhana yang ia lakukan bisa jadi karena dia rindu dan ingin mengajakmu bermain bersama.', 'articles/163GlG7zqAAfkoG9X2UThE7zqh9gLmGiy4iT0C9O.jpg', '2025-05-24 09:04:13', '2025-06-05 09:43:23', 2),
(4, 3, 'Si Anabul Bisa Berenang, Mitos atau Fakta?', 'si-anabul-bisa-berenang-mitos-atau-fakta', 'Kamu pasti mengetahui bahwa kucing sangat takut dengan air. Jangankan untuk berniat mengajaknya berenang. Kegiatan mandi saja sudah membuat kamu pusing tujuh keliling. Sebenarnya yang membuat kucing enggan bersentuhan dengan air karena ia tidak ingin tubuhnya basah dan kedinginan.\r\n\r\nSelain itu, kucing yang merupakan hewan yang selalu menggunakan insting ini akan menganggap bahwa air adalah tempat favorit bakteri berkembang biak. Jadi, mereka hanya akan mendekat ke air untuk minum dan berusaha menjaga supaya bulu-bulunya tetap kering dan bersih sepanjang hari.\r\n\r\nBagi kucing, menjilati bulunya sendiri adalah mandi.', 'articles/UUiqz9y8oLLSF3vwp7w5NbatyJyfGq7p5nYcpD7O.jpg', '2025-06-03 12:02:03', '2025-06-05 10:03:38', 7),
(5, 3, 'Cat Tree, ‘Pohon’ Hunian bagi si Kucing', 'cat-tree-pohon-hunian-bagi-si-kucing', 'Catlovers sudah pernah pakai cat tree untuk kucing-kucingmu? Cat tree adalah sebuah wahana yang diperuntukkan bagi kucing untuk bermain, melakukan aktivitas, dan kadang untuk kucing tidur.\r\n\r\nJulukan bagi cat tree ini sangat beragam. Mulai dari cat tree house, cat condo, kitty condo, cat stand, cat post, dan cat tower. Konsepnya sama, yakni menyediakan tempat bermain bagi kucing dengan bentuk vertikal.\r\n\r\nCat tree dibuat dengan tujuan melatih sensibilitas kucing. Hal ini dilakukan dengan cara membuat area interaktif yang bisa digunakan hanya oleh mereka. Di sisi lain, cat tree juga digunakan untuk melatih kucing agar tidak mencakar di sembarang tempat, yaitu dengan menggunakan cat tree sebagai media mencakar.\r\n\r\nCat tree punya beragam ukuran dan kompleksitas yang berbeda-beda. Kucing biasanya akan lebih menyukai cat tree yang tinggi dengan banyak tantangan. Cat tree juga memungkinkan kucing memiliki teritorinya sendiri.\r\n\r\nBeberapa jenis cat tree memiliki ruangan yang terpisah untuk persembunyian kucing. Jenis cat tree yang seperti ini juga disukai beberapa jenis kucing. Tempat ini bisa dijadikan sebagai tempat beristirahat bagi kucing.\r\n\r\nCat tree yang masih sederhana didesain dengan bentuk yang kokoh dan memiliki beberapa kotak-kotak. Kotak ini memiliki bentuk tertutup yang dikombinasikan dengan bahan dari kayu. Kotak ini digunakan sebagai tangga bagi kucing untuk naik ke atas.\r\n\r\nJenis cat tree ini dilengkapi dengan penutup karpet. Tangga juga biasanya dilapisi dengan bahan yang kasar. Umumnya, pelapis tangga berasal dari tali sisal. Tali sisal ini sekaligus digunakan sebagai tempat mencakar bagi kucing.\r\n\r\nTiap-tiap tingkatan pada cat tree memiliki wahana yang berbeda-beda. Wahana ini bisa berupa tempat untuk memanjat, berlatih mencakar, sampai tempat beristirahat. Beragam fitur menarik ini dibuat untuk kucing-kucing agar betah berada di dekat cat tree.\r\n\r\nKini, cat tree berkembang dengan menawarkan semakin banyak fasilitas. Tidak hanya menjadi area yang nyaman bagi kucing untuk beraktivitas, tapi juga didesain dengan bentuk yang ergonomik dan sesuai dengan anatomi tubuh kucing.\r\n\r\nBeberapa desain juga dibuat mirip dengan penampakan pohon sungguhan. Bahan yang digunakan pun sudah diganti, tidak melulu terbuat dari karpet kasar. Beberapa jenis cat tree terbaru menggunakan bahan yang lebih halus. Hal ini bisa membuat cat tree semakin indah dan menarik untuk dipasang di dalam ruangan.', 'articles/BOo8tE5Jlmqrwbl8KFUUFr9nn92DZMpPUK6XaP9f.jpg', '2025-06-05 10:41:24', '2025-06-05 10:41:24', 7),
(7, 3, 'Si Miaw Suka Menjatuhkan Barang? Begini Cara Mengatasinya!', 'si-miaw-suka-menjatuhkan-barang-begini-cara-mengatasinya', 'Bagi kamu yang memelihara si meong di rumah, pasti akan sangat kesal ketika barang-barang di rumah pecah akibat ulah kucing. Namun, seharusnya catlovers mencari tahu kenapa si manis melakukan hal tersebut.\r\n\r\nMenurut Dr. Katherine Houpt, profesor emeritus veterinary behaviour Cornell University, kucing menjatuhkan barang-barang untuk tiga alasan, yaitu lapar, mencari perhatian, atau latihan berburu.\r\n\r\nBegini cara mengatasi perilaku kucing yang suka menjatuhkan barang di rumah:\r\n\r\nKucing memecahkan gelas\r\n\r\nKucing kita bisa saja merusak barang-barang bernilai dan sentimental. Cara pertama yang bisa kita lakukan adalah sebisa mungkin amankan barang-barang, terutama pecah-belah. Simpan di dalam lemari kaca atau taruh di tempat lebih tinggi yang sulit untuk dijangkau kucing.\r\n\r\nAjak bermain\r\n\r\nKucing juga seperti manusia yang bisa bosan dan penasaran. Pastikan kucing selalu punya waktu bermain. Luangkan dan jadwalkan waktu untuk bermain dengannya setidaknya sehari sekali. Lebih baik lagi kalau kita mengajaknya bermain permainan yang interaktif.\r\n\r\nBeri makan teratur\r\n\r\nKucing kita selalu punya cara menarik perhatian dan menjatuhkan barang salah satunya. Umumnya, kucing menjatuhkan barang karena mereka lapar. Jadi, pastikan kita selalu memberinya makan pada jam makannya dan pada porsi yang sesuai dengan kebutuhan nutrisinya.\r\n\r\n‘Hukum’ kucingmu\r\n\r\nKalau kebiasaannya masih terus berlanjut meskipun kita sudah melakukan upaya di atas, cobalah ‘menghukum’ kucingmu. Catlovers tak perlu membentaknya karena itu tidak memberikan perubahan signifikan terhadap perilakunya. Cukup dengan menyediakan sprayer yang diisi air, lalu semprotkan pada kucing setiap kali ia tertangkap basah menunjukkan perilakunya. (ast)', 'articles/37BXdtdRzZKG1G4sZTcM0Bhktv254iU50CTukO9j.jpg', '2025-06-09 03:45:37', '2025-06-09 03:45:37', 3),
(8, 3, 'Seberapa Pentingkah Kucing Butuh Bermain?', 'seberapa-pentingkah-kucing-butuh-bermain', 'Hewan yang satu ini bisa dikatakan yang paling suka bermain. Bahkan, menurutnya bermain merupakan suatu rutinitas penting yang harus ia lakukan setiap hari untuk menjaga kesehatan baik fisik dan psikologinya. Bermain bagi kucing juga sekaligus mengasah instingnya karena ia adalah hewan predator.\r\n\r\nThe Humane Society dari Amerika Serikat mengatakan bahwa bermain merupakan sumber energi untuk kucing dengan naluri predatornya. Mendorong kucing latihan, terutama penting bagi kucing yang memiliki kelebihan berat badan.\r\n\r\nJika catlovers tidak memberi mereka waktu untuk bermain dengan mainan, banyak kucing akan tumbuh bosan dan gelisah. Atau, mereka mungkin menemukan kesenangan mereka sendiri dan membuat ruangan di rumah menjadi berantakan karena ulahnya, misalnya merobek kertas toilet di lantai kamar mandi. Untuk itu, kamu harus berhati-hati tentang mainan apa yang diberikan pada si makhluk berbulu tersebut.\r\n\r\nJika banyak mainan yang tidak aman untuk kucing, mengapa membiarkan mereka bermain dengan mainan tersebut?\r\n\r\nCatlovers bisa mendapatkan mainan kucing yang aman di toko-toko binatang peliharaan seperti bola dengan atau tanpa lonceng di dalamnya. Beberapa kucing juga tampaknya suka dengan “pancing mainan” yang mencakup burung palsu atau tikus di ujung talinya. Pastikan makhluk palsu tersebut tahan lama dan tidak memiliki potongan plastik kecil.\r\n\r\nCatlovers tidak perlu menghabiskan banyak uang untuk memiliki mainan yang menyenangkan untuk kucing. Banyak kucing yang senang bermain dengan cincin tirai, dan bola ping pong atau bola golf juga menyenangkan untuk kucing memukul dan mengejar bolanya.\r\n\r\nMeskipun kantong plastik juga disukai kucing, tapi itu cukup berbahaya, kantong kertas mungkin menjadi solusi. Catlovers harus melepaskan pegangan di kantong kertas sebelum memberikannya kepada hewan kesayanganmu ya!', 'articles/o8DDldrmlAfFVXu2OiUV3T5f9upsBku0TLdUwgVX.jpg', '2025-06-11 08:10:04', '2025-06-11 08:10:04', 7);

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Domestik', '2025-06-05 23:39:21', '2025-06-05 23:39:21'),
(2, 'Anggora', '2025-06-05 23:47:51', '2025-06-05 23:47:51'),
(3, 'Persia', '2025-06-05 23:48:21', '2025-06-05 23:48:21'),
(4, 'Maine Coon', '2025-06-05 23:48:27', '2025-06-05 23:48:27'),
(5, 'Sphynx', '2025-06-05 23:48:44', '2025-06-05 23:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Berita', 'berita', '2025-05-24 08:07:11', '2025-05-24 08:07:11'),
(2, 'Tutorial', 'tutorial', '2025-05-24 08:07:12', '2025-05-24 08:07:12'),
(3, 'Tips & Trik', 'tips-dan-trik', '2025-05-24 08:07:12', '2025-05-24 08:07:12'),
(7, 'Informasi', 'informasi', '2025-06-05 10:03:14', '2025-06-05 10:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available_for_adoption` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_maps_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breed_id` bigint UNSIGNED NOT NULL,
  `address_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `user_id`, `admin_id`, `name`, `gender`, `age`, `description`, `is_available_for_adoption`, `created_at`, `updated_at`, `owner_name`, `owner_contact`, `google_maps_link`, `breed_id`, `address_id`) VALUES
(38, NULL, 3, 'Sayo', 'female', 12, 'Imut', 0, '2025-06-09 01:35:26', '2025-06-12 00:43:18', 'Edo', '0812323131231', 'https://maps.app.goo.gl/VLorsKSWg8Santg87', 2, 2),
(39, NULL, 3, 'Teko', 'male', 12, 'Ay Ay', 1, '2025-06-09 01:47:50', '2025-06-09 01:47:50', 'Eri', '081213213132131', 'https://maps.app.goo.gl/mLwK6FYsEp1AHAKY6', 1, 2),
(40, NULL, 3, 'Uli', 'male', 5, 'Hitam', 0, '2025-06-09 01:49:04', '2025-06-15 21:48:04', 'Cela', '083758389139', 'https://maps.app.goo.gl/drXQty4jwGdoRQ4t8', 3, 1),
(41, NULL, 3, 'Tuke', 'male', 14, 'Gemuk', 0, '2025-06-09 01:50:33', '2025-06-09 04:56:37', 'Feri', '08434342421323', 'https://maps.app.goo.gl/mYPAqktgB9HWp4mW6', 1, 3),
(42, NULL, 3, 'Geso', 'female', 9, 'Oren', 0, '2025-06-09 01:51:38', '2025-06-10 18:22:56', 'Geb', '081231321', 'https://maps.app.goo.gl/GfVXUidWZWWQ7N8W7', 1, 1),
(43, NULL, 3, 'Tebeb', 'male', 8, 'Rusuh ni kucing', 1, '2025-06-09 02:05:49', '2025-06-09 02:05:49', 'Jako', '0812323244343', 'https://maps.app.goo.gl/i6gUf3qkySngGRpLA', 2, 2),
(48, 7, 3, 'Tera', 'male', 8, 'Hitama', 1, '2025-06-10 19:44:49', '2025-06-12 00:54:00', 'Jes', '081123123123', 'https://maps.app.goo.gl/SKNFCikXcjV1o4cJ8', 1, 5),
(52, 6, 3, 'Terra', 'female', 4, 'Tukang tidur', 0, '2025-06-11 22:30:15', '2025-06-15 21:58:29', 'Jeko', '0813232133344', 'https://maps.app.goo.gl/9QfMpwzaxMhKYKxF9', 1, 2),
(53, NULL, 3, 'Skepi', 'male', 10, 'Kucing Ganteng kalau ada yang mau', 1, '2025-06-12 00:51:59', '2025-06-12 00:51:59', 'Gani', '0812323123545', 'https://maps.app.goo.gl/VBY9DMFAaWBs2iFu6', 4, 3),
(54, NULL, 3, 'Johntor', 'male', 7, 'Kucing langka', 0, '2025-06-12 00:53:47', '2025-06-15 21:56:52', 'Iki', '08122383959358', 'https://maps.app.goo.gl/tCUMtc9C21AveQuo7', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cat_images`
--

CREATE TABLE `cat_images` (
  `id` bigint UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cat_images`
--

INSERT INTO `cat_images` (`id`, `imageable_type`, `imageable_id`, `image_path`, `created_at`, `updated_at`) VALUES
(76, 'App\\Models\\Cat', 34, 'cats/NnibvXE5wC294zON8F4MJc1WKZUUk6PvUCoC0AtN.jpg', '2025-06-06 00:21:46', '2025-06-06 00:21:46'),
(77, 'App\\Models\\CatSubmission', 27, 'cat_submissions/Q4tZYI6jQhmG7fjsOLIjsCUMvTBdTkxwiXZ8SxXW.jpg', '2025-06-06 01:24:39', '2025-06-06 01:24:39'),
(78, 'App\\Models\\Cat', 35, 'cats/6842a7dce9e29_Q4tZYI6jQhmG7fjsOLIjsCUMvTBdTkxwiXZ8SxXW.jpg', '2025-06-06 01:33:32', '2025-06-06 01:33:32'),
(79, 'App\\Models\\Cat', 36, 'cats/6842a91b09dc5_Q4tZYI6jQhmG7fjsOLIjsCUMvTBdTkxwiXZ8SxXW.jpg', '2025-06-06 01:38:51', '2025-06-06 01:38:51'),
(83, 'App\\Models\\CatSubmission', 28, 'cat_submissions/GUQ8bcBMpkaQooaOi6KZTC6GBr10nyfsgYKtrtwr.jpg', '2025-06-06 07:29:02', '2025-06-06 07:29:02'),
(84, 'App\\Models\\CatSubmission', 28, 'cat_submissions/gqUys4Hkg0pKtvHaWcoQ4DSGoz88LDnBYNvZDxkz.jpg', '2025-06-06 07:29:02', '2025-06-06 07:29:02'),
(85, 'App\\Models\\Cat', 37, 'cats/68430405e6b0b_GUQ8bcBMpkaQooaOi6KZTC6GBr10nyfsgYKtrtwr.jpg', '2025-06-06 08:06:45', '2025-06-06 08:06:45'),
(86, 'App\\Models\\Cat', 37, 'cats/68430405e7abe_gqUys4Hkg0pKtvHaWcoQ4DSGoz88LDnBYNvZDxkz.jpg', '2025-06-06 08:06:45', '2025-06-06 08:06:45'),
(88, 'App\\Models\\Cat', 38, 'cats/xKCuCUU5SxfqFeDfswzkYkjOeyGq6sRrXcOdyh4H.jpg', '2025-06-09 01:35:26', '2025-06-09 01:35:26'),
(89, 'App\\Models\\Cat', 38, 'cats/wFpCqDzbCS6CS0PvMycry8LiPpjSQw8k8UF6pBVp.jpg', '2025-06-09 01:35:26', '2025-06-09 01:35:26'),
(90, 'App\\Models\\Cat', 39, 'cats/PQ1DEKNcnORF7uWIoqmBhRwvZAH50aGhSX5wKI5A.jpg', '2025-06-09 01:47:50', '2025-06-09 01:47:50'),
(91, 'App\\Models\\Cat', 40, 'cats/W1J7IHJpohoMnt2dsJ0IdfdRHkxZg1ppDhL42P26.jpg', '2025-06-09 01:49:04', '2025-06-09 01:49:04'),
(92, 'App\\Models\\Cat', 41, 'cats/xsJcsUsTPzqBArWtFRv2DxV4jRwANJjjP7GtmTX1.jpg', '2025-06-09 01:50:33', '2025-06-09 01:50:33'),
(94, 'App\\Models\\Cat', 42, 'cat_images/ViiKSWXUTy3LSa2L0eEr8VBUNjZHO8gtyMNB18bH.jpg', '2025-06-09 01:52:23', '2025-06-09 01:52:23'),
(95, 'App\\Models\\Cat', 42, 'cat_images/GgwejmOVxILqnUq5SJfrfK9JS7QIkh7Q64EGLNqe.jpg', '2025-06-09 01:52:23', '2025-06-09 01:52:23'),
(96, 'App\\Models\\CatSubmission', 30, 'cat_submissions/kXFVqM8uQX5BXtt4qkN4o5isUfyQDAaFc0yDCLt7.jpg', '2025-06-09 02:02:55', '2025-06-09 02:02:55'),
(97, 'App\\Models\\CatSubmission', 31, 'cat_submissions/BA53yYq4uDb5T3qtV44el4AzoAYjqRDZ8gwqMFTq.jpg', '2025-06-09 02:05:28', '2025-06-09 02:05:28'),
(98, 'App\\Models\\Cat', 43, 'cats/6846a3edc3f4c_BA53yYq4uDb5T3qtV44el4AzoAYjqRDZ8gwqMFTq.jpg', '2025-06-09 02:05:49', '2025-06-09 02:05:49'),
(99, 'App\\Models\\Cat', 44, 'cats/6846cbf0d91e6_kXFVqM8uQX5BXtt4qkN4o5isUfyQDAaFc0yDCLt7.jpg', '2025-06-09 04:56:32', '2025-06-09 04:56:32'),
(100, 'App\\Models\\CatSubmission', 32, 'cat_submissions/Jnm438r2VSEFQOlgEfa47LweZjOPvaPIxGz7PEUF.jpg', '2025-06-09 08:43:25', '2025-06-09 08:43:25'),
(101, 'App\\Models\\CatSubmission', 33, 'cat_submissions/ArvrcMpL0adVSjsxjmpRV97qKrlxulh5VreeVgmV.jpg', '2025-06-10 18:50:11', '2025-06-10 18:50:11'),
(102, 'App\\Models\\Cat', 45, 'cats/6848eaf1a09e9_ArvrcMpL0adVSjsxjmpRV97qKrlxulh5VreeVgmV.jpg', '2025-06-10 19:33:21', '2025-06-10 19:33:21'),
(103, 'App\\Models\\CatSubmission', 34, 'cat_submissions/Rvml8phQuN3cQ8gbCOdi5wYnMdHH5AG1r3547ZLX.jpg', '2025-06-10 19:38:13', '2025-06-10 19:38:13'),
(104, 'App\\Models\\Cat', 46, 'cats/6848ec24741a4_Rvml8phQuN3cQ8gbCOdi5wYnMdHH5AG1r3547ZLX.jpg', '2025-06-10 19:38:28', '2025-06-10 19:38:28'),
(105, 'App\\Models\\Cat', 47, 'cats/6848ed581c7a1_Rvml8phQuN3cQ8gbCOdi5wYnMdHH5AG1r3547ZLX.jpg', '2025-06-10 19:43:36', '2025-06-10 19:43:36'),
(106, 'App\\Models\\Cat', 48, 'cats/6848eda168794_Rvml8phQuN3cQ8gbCOdi5wYnMdHH5AG1r3547ZLX.jpg', '2025-06-10 19:44:49', '2025-06-10 19:44:49'),
(107, 'App\\Models\\Cat', 49, 'cats/6848edb3270ae_ArvrcMpL0adVSjsxjmpRV97qKrlxulh5VreeVgmV.jpg', '2025-06-10 19:45:07', '2025-06-10 19:45:07'),
(108, 'App\\Models\\CatSubmission', 35, 'cat_submissions/bgZF9GqWkrQlGR7GfjBkkcAbDZPk48xBJUB1SCCY.jpg', '2025-06-10 20:03:25', '2025-06-10 20:03:25'),
(115, 'App\\Models\\Cat', 50, 'cat_images/kCme5uZhCmnfgTcnHxEzL8cZkFWZ1oX2r7SLVkIO.png', '2025-06-11 19:46:30', '2025-06-11 19:46:30'),
(116, 'App\\Models\\Cat', 51, 'cats/684a4b5c24937_bgZF9GqWkrQlGR7GfjBkkcAbDZPk48xBJUB1SCCY.jpg', '2025-06-11 20:37:00', '2025-06-11 20:37:00'),
(117, 'App\\Models\\CatSubmission', 37, 'cat_submissions/5Mzc9n6lju74GVO1WzHM8Hrnw1HjkYCzWPYrk02F.png', '2025-06-11 20:38:58', '2025-06-11 20:38:58'),
(118, 'App\\Models\\CatSubmission', 38, 'cat_submissions/2L7ZLX3c9aobe2hYch1DfMH7uqP3z0MYJycNcSo5.jpg', '2025-06-11 22:30:01', '2025-06-11 22:30:01'),
(119, 'App\\Models\\Cat', 52, 'cats/684a65e71a3d3_2L7ZLX3c9aobe2hYch1DfMH7uqP3z0MYJycNcSo5.jpg', '2025-06-11 22:30:15', '2025-06-11 22:30:15'),
(120, 'App\\Models\\CatSubmission', 39, 'cat_submissions/7VPq82v6qq9iGl5qobcoG68YyDfFHBFHDMSoUdw2.jpg', '2025-06-12 00:49:04', '2025-06-12 00:49:04'),
(121, 'App\\Models\\Cat', 53, 'cats/4Eq18BczYcJdDLA2tCRNuO4xTknc6RE7qgSQoiXh.jpg', '2025-06-12 00:51:59', '2025-06-12 00:51:59'),
(122, 'App\\Models\\Cat', 54, 'cats/FsGGPSIvFdTU4DvoESvuG8GFtVjRGdyutyNZxlk7.jpg', '2025-06-12 00:53:47', '2025-06-12 00:53:47'),
(123, 'App\\Models\\Cat', 54, 'cats/nB6Abh71y5cvO0IkkkNTjaxgjRaUkXwT6jVY9BsM.jpg', '2025-06-12 00:53:47', '2025-06-12 00:53:47'),
(125, 'App\\Models\\CatSubmission', 40, 'cat_submissions/8zsVzy5xxmJt1pCvubNsZO7VxPz6c3mkJR1r6ge6.jpg', '2025-06-15 21:19:14', '2025-06-15 21:19:14'),
(127, 'App\\Models\\Cat', 55, 'cat_images/D1SKcuLkJAGbguWFpVAtPpPFRh5OOK8sSGNsz5PB.jpg', '2025-06-15 21:43:18', '2025-06-15 21:43:18'),
(128, 'App\\Models\\Cat', 55, 'cat_images/OdcSYKrfw4w4NrzJ1kaz1W3FznEzs4nuHRxUKlqn.jpg', '2025-06-15 21:43:18', '2025-06-15 21:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `cat_submissions`
--

CREATE TABLE `cat_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breed_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` bigint UNSIGNED NOT NULL,
  `google_maps_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cat_submissions`
--

INSERT INTO `cat_submissions` (`id`, `user_id`, `name`, `age`, `gender`, `breed_id`, `description`, `owner_name`, `owner_contact`, `address_id`, `google_maps_link`, `status`, `created_at`, `updated_at`) VALUES
(33, 6, 'Tera', 8, 'male', 1, 'Coba', 'Jes', '081123123123', 2, 'https://maps.app.goo.gl/SKNFCikXcjV1o4cJ8', 'approved', '2025-06-10 18:50:11', '2025-06-10 19:45:07'),
(34, 7, 'Tera', 8, 'male', 1, 'Hitama', 'Jes', '081123123123', 2, 'https://maps.app.goo.gl/SKNFCikXcjV1o4cJ8', 'approved', '2025-06-10 19:38:13', '2025-06-10 19:44:49'),
(38, 6, 'Terra', 4, 'female', 1, 'Tukang tidur', 'Jeko', '0813232133344', 2, 'https://maps.app.goo.gl/9QfMpwzaxMhKYKxF9', 'approved', '2025-06-11 22:30:01', '2025-06-11 22:30:15'),
(39, 6, 'Cela', 3, 'female', 5, 'Kondisi sehat bersemangat', 'Keni', '0812347356554', 2, 'https://maps.app.goo.gl/Z2UQVnfT1jZf2QQA7', 'rejected', '2025-06-12 00:49:04', '2025-06-15 21:45:54'),
(40, 14, 'Sultan', 12, 'male', 5, 'Kucing bagus', 'Geba', '081231232341', 3, 'https://maps.app.goo.gl/NkJEuchaArYwpL598', 'pending', '2025-06-15 21:15:32', '2025-06-15 21:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `commentable_type`, `commentable_id`, `content`, `created_at`, `updated_at`) VALUES
(14, 6, 'App\\Models\\Forum', 11, 'Nice Info!', '2025-06-05 20:55:41', '2025-06-05 20:55:41'),
(15, 7, 'App\\Models\\Forum', 14, 'Nice Story!!', '2025-06-08 14:45:06', '2025-06-08 14:45:06'),
(18, 3, 'App\\Models\\Forum', 20, 'Waduh', '2025-06-09 03:41:19', '2025-06-09 03:41:19'),
(19, 6, 'App\\Models\\Forum', 20, 'Pusing jugaaa', '2025-06-09 22:44:55', '2025-06-15 21:53:17'),
(21, 7, 'App\\Models\\Forum', 20, 'Up', '2025-06-11 19:02:56', '2025-06-11 19:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'a8c20ccc-09e2-4203-9db0-5f26f01828e7', 'database', 'default', '{\"uuid\":\"a8c20ccc-09e2-4203-9db0-5f26f01828e7\",\"displayName\":\"App\\\\Notifications\\\\AdoptionStatusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\AdoptionStatusNotification\\\":3:{s:6:\\\"\\u0000*\\u0000cat\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:14:\\\"App\\\\Models\\\\Cat\\\";s:2:\\\"id\\\";i:23;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:9:\\\"\\u0000*\\u0000status\\\";s:8:\\\"approved\\\";s:2:\\\"id\\\";s:36:\\\"53fc43ac-eabf-4ba3-bfd2-d97090198a09\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1749129468,\"delay\":null}', 'Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Cat]. in C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php:750\nStack trace:\n#0 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(110): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(63): Illuminate\\Notifications\\Notification->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesModels.php(97): Illuminate\\Notifications\\Notification->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: Illuminate\\Notifications\\Notification->__unserialize(Array)\n#4 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(95): unserialize(\'O:48:\"Illuminat...\')\n#5 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(62): Illuminate\\Queue\\CallQueuedHandler->getCommand(Array)\n#6 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#7 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#8 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(391): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#9 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(177): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#11 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#12 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#13 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#18 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#20 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#26 {main}', '2025-06-05 07:49:29'),
(2, '9763f0f6-15c6-406e-8f38-d0d20598a977', 'database', 'default', '{\"uuid\":\"9763f0f6-15c6-406e-8f38-d0d20598a977\",\"displayName\":\"App\\\\Notifications\\\\AdoptionStatusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\AdoptionStatusNotification\\\":3:{s:6:\\\"\\u0000*\\u0000cat\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:14:\\\"App\\\\Models\\\\Cat\\\";s:2:\\\"id\\\";i:24;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:9:\\\"\\u0000*\\u0000status\\\";s:8:\\\"approved\\\";s:2:\\\"id\\\";s:36:\\\"b671581c-54e2-4a47-973c-2548e99abb1d\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1749129589,\"delay\":null}', 'Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Cat]. in C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php:750\nStack trace:\n#0 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(110): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(63): Illuminate\\Notifications\\Notification->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesModels.php(97): Illuminate\\Notifications\\Notification->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: Illuminate\\Notifications\\Notification->__unserialize(Array)\n#4 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(95): unserialize(\'O:48:\"Illuminat...\')\n#5 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(62): Illuminate\\Queue\\CallQueuedHandler->getCommand(Array)\n#6 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#7 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#8 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(391): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#9 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(177): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#11 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#12 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#13 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#18 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#20 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#26 {main}', '2025-06-05 07:49:29'),
(3, 'aa3bc85b-45df-49f8-b692-f4423e8ef1b1', 'database', 'default', '{\"uuid\":\"aa3bc85b-45df-49f8-b692-f4423e8ef1b1\",\"displayName\":\"App\\\\Notifications\\\\AdoptionStatusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\AdoptionStatusNotification\\\":3:{s:6:\\\"\\u0000*\\u0000cat\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:14:\\\"App\\\\Models\\\\Cat\\\";s:2:\\\"id\\\";i:25;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:9:\\\"\\u0000*\\u0000status\\\";s:8:\\\"approved\\\";s:2:\\\"id\\\";s:36:\\\"08e89296-e413-42a7-a5b2-26a1c547f892\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1749129701,\"delay\":null}', 'Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Cat]. in C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php:750\nStack trace:\n#0 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(110): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(63): Illuminate\\Notifications\\Notification->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesModels.php(97): Illuminate\\Notifications\\Notification->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: Illuminate\\Notifications\\Notification->__unserialize(Array)\n#4 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(95): unserialize(\'O:48:\"Illuminat...\')\n#5 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(62): Illuminate\\Queue\\CallQueuedHandler->getCommand(Array)\n#6 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#7 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#8 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(391): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#9 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(177): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#11 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#12 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#13 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#18 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#20 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#26 {main}', '2025-06-05 07:49:29'),
(4, '280ddff4-eb4b-4819-b349-dfc26cfbbdd0', 'database', 'default', '{\"uuid\":\"280ddff4-eb4b-4819-b349-dfc26cfbbdd0\",\"displayName\":\"App\\\\Notifications\\\\AdoptionStatusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\AdoptionStatusNotification\\\":3:{s:6:\\\"\\u0000*\\u0000cat\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:14:\\\"App\\\\Models\\\\Cat\\\";s:2:\\\"id\\\";i:26;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:9:\\\"\\u0000*\\u0000status\\\";s:8:\\\"approved\\\";s:2:\\\"id\\\";s:36:\\\"91465923-c2c7-42f5-a31e-5502ed03764a\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1749129885,\"delay\":null}', 'Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Cat]. in C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php:750\nStack trace:\n#0 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(110): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(63): Illuminate\\Notifications\\Notification->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesModels.php(97): Illuminate\\Notifications\\Notification->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: Illuminate\\Notifications\\Notification->__unserialize(Array)\n#4 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(95): unserialize(\'O:48:\"Illuminat...\')\n#5 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(62): Illuminate\\Queue\\CallQueuedHandler->getCommand(Array)\n#6 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#7 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#8 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(391): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#9 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(177): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#11 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#12 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#13 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#18 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#20 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#26 {main}', '2025-06-05 07:49:29'),
(5, '1bb458bf-8f95-4bb3-a055-074b0dd83895', 'database', 'default', '{\"uuid\":\"1bb458bf-8f95-4bb3-a055-074b0dd83895\",\"displayName\":\"App\\\\Notifications\\\\AdoptionStatusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\AdoptionStatusNotification\\\":3:{s:6:\\\"\\u0000*\\u0000cat\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:14:\\\"App\\\\Models\\\\Cat\\\";s:2:\\\"id\\\";i:27;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:9:\\\"\\u0000*\\u0000status\\\";s:8:\\\"approved\\\";s:2:\\\"id\\\";s:36:\\\"1427ecd7-392b-4de0-837a-c9e10188442e\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1749130164,\"delay\":null}', 'Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Cat]. in C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php:750\nStack trace:\n#0 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(110): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(63): Illuminate\\Notifications\\Notification->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesModels.php(97): Illuminate\\Notifications\\Notification->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: Illuminate\\Notifications\\Notification->__unserialize(Array)\n#4 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(95): unserialize(\'O:48:\"Illuminat...\')\n#5 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(62): Illuminate\\Queue\\CallQueuedHandler->getCommand(Array)\n#6 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#7 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#8 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(391): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#9 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(177): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#11 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#12 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#13 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#18 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#20 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 C:\\Users\\heala\\Documents\\VsCode\\komunitas\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#26 {main}', '2025-06-05 07:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `user_id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(14, 6, 'Pengalaman Adopsi dari Shelter, Seru Banget!', 'pengalaman-adopsi-dari-shelter-seru-banget', 'Halo semuanya! Aku mau sedikit cerita tentang pengalaman pertamaku adopsi kucing dari shelter. Awalnya aku iseng aja buka website shelter lokal dan lihat-lihat foto-foto kucing yang tersedia untuk diadopsi. Eh, mataku langsung tertuju ke seekor kucing oren bernama Oyen. Wajahnya polos banget dan terlihat agak pemalu. Setelah mengisi formulir dan melalui proses seleksi singkat, aku akhirnya bisa bawa pulang Oyen ke rumah!\r\n\r\nHari-hari pertama itu cukup menantang. Oyen sangat pemalu dan lebih banyak sembunyi di bawah tempat tidur. Tapi aku sabar dan pelan-pelan membangun kepercayaannya. Aku kasih makanan favoritnya, mainan, dan bahkan bicara lembut setiap hari. Setelah sekitar seminggu, dia mulai berani keluar, duduk di sofa, dan akhirnya tidur di sebelahku. Momen pertama dia mendengkur di pangkuanku rasanya haru banget, kayak ada ikatan emosional yang kuat muncul antara aku dan dia.\r\n\r\nSekarang, Oyen sudah jadi bagian dari keluarga. Dia suka duduk di jendela, ngawasin burung di luar, dan mengeong tiap aku pulang kerja seolah menyambutku. Aku pribadi sangat menyarankan adopsi dari shelter, karena selain menyelamatkan satu nyawa, kita juga dapat sahabat setia yang nggak kalah manja dan lucu dari kucing manapun. Jangan ragu adopsi, teman-teman KOPEKU! ❤️', '2025-06-06 22:37:39', '2025-06-06 22:37:39'),
(15, 6, 'Kenapa Kucing Saya Sering Mengeong Tengah Malam? Normal Tidak??', 'kenapa-kucing-saya-sering-mengeong-tengah-malam-normal-atau-tidak', 'Hai semua!\r\nAku mau tanya, kenapa ya kucingku belakangan ini sering banget mengeong di malam hari, bahkan sampai jam 2-3 pagi. Padahal makanannya cukup, kotak pasirnya bersih, dan nggak terlihat sakit.\r\n\r\nDia kucing rumahan, usianya sekitar 2 tahun, dan belum disteril. Kadang kayak ngajak main, tapi juga suka mondar-mandir sendiri sambil mengeong.\r\n\r\nApakah ini hal yang wajar? Atau ada hal yang perlu aku periksa?\r\nKalau teman-teman pernah punya pengalaman serupa, boleh dong sharing solusinya 🙏\r\n\r\nTerima kasih sebelumnya!', '2025-06-09 00:17:41', '2025-06-09 03:35:34'),
(20, 3, 'Tips Mengatasi Kucing yang Suka Garuk-Garuk Sofa', 'tips-mengatasi-kucing-yang-suka-garuk-garuk-sofa', 'Hai teman-teman!\r\nAku mau sharing dan sekalian minta saran. Kucingku, usianya sekitar 8 bulan, lagi senang-senangnya garuk-garuk sofa di rumah. Udah aku coba kasih scratching post, tapi tetap aja dia balik ke sofa 😅\r\n\r\nApakah ada cara efektif untuk ngelatih kucing supaya nggak garuk sofa lagi? Atau ada produk yang ampuh untuk mencegah kebiasaan ini?\r\n\r\nKalau ada yang punya pengalaman serupa, boleh dong share tipsnya! Soalnya sofaku udah korban banget nih 😭\r\n\r\nTerima kasih sebelumnya, semoga bermanfaat juga buat cat parent lain!', '2025-06-09 03:37:11', '2025-06-09 03:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `forum_images`
--

CREATE TABLE `forum_images` (
  `id` bigint UNSIGNED NOT NULL,
  `forum_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_images`
--

INSERT INTO `forum_images` (`id`, `forum_id`, `image_path`, `created_at`, `updated_at`) VALUES
(13, 20, 'forum_images/qO4dfCn9ompp3AwXJUXXhD9ZhU0y0P96SNiAwzHF.png', '2025-06-09 03:37:11', '2025-06-09 03:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_22_024455_create_cats_table', 1),
(5, '2025_05_22_024455_create_posts_table', 1),
(6, '2025_05_22_024456_create_adoptions_table', 1),
(7, '2025_05_22_024456_create_comments_table', 1),
(8, '2025_05_22_024456_create_forums_table', 1),
(9, '2025_05_22_024457_create_categories_table', 1),
(10, '2025_05_22_024457_create_category_post_table', 1),
(11, '2025_05_22_030921_create_photos_table', 2),
(12, '2025_05_22_064408_add_forum_id_to_comments_table', 3),
(13, '2025_05_23_062700_add_slug_to_forums_table', 4),
(14, '2025_05_24_111449_create_articles_table', 5),
(15, '2025_05_24_112008_create_admins_table', 6),
(19, '2025_05_24_113656_create_articles_table', 7),
(20, '2025_06_03_095502_create_notifications_table', 8),
(21, '2025_06_03_100612_add_maps_and_whatsapp_to_cats_table', 9),
(22, '2025_06_03_154629_create_forum_images_table', 10),
(23, '2025_06_03_175512_add_banned_to_users_table', 11),
(24, '2025_06_04_000001_create_cat_submissions_table', 12),
(25, '2025_06_04_000002_create_cat_submission_images_table', 12),
(26, '2025_06_04_100833_add_breed_to_cat_submissions_table', 13),
(27, '2025_06_04_102055_create_cat_images_table', 14),
(28, '2025_06_04_024456_create_adoptions_table', 15),
(29, '2025_06_05_043559_add_owner_info_to_cats_table', 16),
(32, '2025_06_05_095408_add_owner_info_to_cat_submissions_table', 17),
(33, '2025_06_05_114740_add_google_maps_link_to_cat_submissions_and_cats_tables', 17),
(34, '2025_06_05_000000_add_cat_submission_id_to_cats_table', 18),
(35, '2025_06_05_132803_add_cat_submission_id_to_cats_table', 19),
(36, '2025_06_05_171151_add_user_id_to_photos_table', 20),
(37, '2025_06_06_061925_create_breeds_table', 21),
(38, '2025_06_06_061949_create_addresses_table', 21),
(39, '2025_06_06_062001_update_cats_table_for_breed_and_address', 22),
(40, '2025_06_06_081017_update_cat_submissions_add_breed_id_and_address_id', 23),
(41, '2025_06_11_014500_add_is_available_for_adoption_to_cat_submissions_table', 24),
(42, '2025_06_11_024152_add_user_id_to_cats_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00a1a3f0-1e47-48b3-8752-27ec6b361805', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Tera\' telah disetujui.\",\"cat_id\":49,\"status\":\"approved\"}', '2025-06-11 19:09:44', '2025-06-10 19:59:07', '2025-06-11 19:09:44'),
('0908c3bf-646d-4d6d-afcf-aa536ac30ff8', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'Tera\' telah disetujui dan sekarang tersedia untuk diadopsi.\",\"cat_submission_id\":34,\"status\":\"approved\"}', '2025-06-11 19:09:45', '2025-06-10 19:44:49', '2025-06-11 19:09:45'),
('163d696c-f34c-40b5-ac6c-2614eb502a99', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'Tera\' telah disetujui dan sekarang tersedia untuk diadopsi.\",\"cat_submission_id\":34,\"status\":\"approved\"}', '2025-06-11 19:09:45', '2025-06-10 19:38:28', '2025-06-11 19:09:45'),
('1987ca07-95a6-41b1-81e8-67d5f7fefd7c', 'App\\Notifications\\CatHasBeenAdoptedNotification', 'App\\Models\\User', 6, '{\"message\":\"Kucing kamu dengan nama \\\"Tera\\\" pengajuan adopsi disetujui dan ingin diadopsi oleh Abel.\",\"cat_id\":49,\"adopter_id\":7}', '2025-06-11 08:16:14', '2025-06-10 20:01:35', '2025-06-11 08:16:14'),
('337038e5-b093-44cc-9f11-b74484be31e5', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Terra\' telah disetujui.\",\"cat_id\":52,\"status\":\"approved\"}', NULL, '2025-06-15 21:58:29', '2025-06-15 21:58:29'),
('3b5d0594-bdbe-4520-b438-9a6cdd10fc82', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 14, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Uli\' telah disetujui.\",\"cat_id\":40,\"status\":\"approved\"}', '2025-06-15 21:48:18', '2025-06-15 21:48:04', '2025-06-15 21:48:18'),
('3cbf005a-6a48-484e-95ae-202220a967a0', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Sayo\' telah disetujui.\",\"cat_id\":38,\"status\":\"approved\"}', NULL, '2025-06-12 00:43:18', '2025-06-12 00:43:18'),
('53748549-4032-48de-99e1-532448b3f279', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Sayo\' telah ditolak. Alasan: tes\",\"cat_id\":38,\"status\":\"rejected\"}', NULL, '2025-06-12 02:30:16', '2025-06-12 02:30:16'),
('564477d7-e58d-4113-8f73-d84fe2807395', 'App\\Notifications\\CatHasBeenAdoptedNotification', 'App\\Models\\User', 6, '{\"message\":\"Kucing kamu dengan nama \\\"Terra\\\" pengajuan adopsi disetujui dan ingin diadopsi oleh Abell.\",\"cat_id\":52,\"adopter_id\":7}', NULL, '2025-06-12 04:47:43', '2025-06-12 04:47:43'),
('5aabd353-8b01-47ff-8f3a-f301bd938e53', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'Tera\' telah disetujui dan sekarang tersedia untuk diadopsi.\",\"cat_submission_id\":33,\"status\":\"approved\"}', '2025-06-11 20:38:09', '2025-06-10 19:45:07', '2025-06-11 20:38:09'),
('5ab51d5d-12d9-425f-839f-17b47d915490', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'te\' telah ditolak. Alasan: kucing anda kurang lengkap data nya\",\"cat_submission_id\":37,\"status\":\"rejected\"}', NULL, '2025-06-11 20:39:45', '2025-06-11 20:39:45'),
('69dfcad6-fe97-461f-8b4d-29b0438b1289', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Terra\' telah disetujui.\",\"cat_id\":52,\"status\":\"approved\"}', NULL, '2025-06-12 04:47:43', '2025-06-12 04:47:43'),
('6cd1d939-908a-4d23-af1f-81954a8eb701', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Johntor\' telah disetujui.\",\"cat_id\":54,\"status\":\"approved\"}', NULL, '2025-06-12 02:29:18', '2025-06-12 02:29:18'),
('7302fd73-fbf0-46a1-9fc1-64efdb8eb3d1', 'App\\Notifications\\CatHasBeenAdoptedNotification', 'App\\Models\\User', 6, '{\"message\":\"Kucing kamu dengan nama\\\"Tera\\\" telah diadopsi oleh Abel.\",\"cat_id\":49,\"adopter_id\":7}', '2025-06-11 08:16:15', '2025-06-10 19:59:07', '2025-06-11 08:16:15'),
('7ff04d65-60ef-4cac-babe-62a239dd09ff', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Tebeb\' telah ditolak. Alasan: Maaf alasan anda tidak cocok\",\"cat_id\":43,\"status\":\"rejected\"}', NULL, '2025-06-11 20:39:30', '2025-06-11 20:39:30'),
('9682ab60-94bd-4127-8a52-d44d81a0d595', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Teko\' telah ditolak. Alasan: alasan tidak meyakinkan\",\"cat_id\":39,\"status\":\"rejected\"}', '2025-06-15 21:46:41', '2025-06-15 21:46:16', '2025-06-15 21:46:41'),
('9d32bf55-8dd5-4037-87de-ebf522640df5', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Tera\' telah disetujui.\",\"cat_id\":49,\"status\":\"approved\"}', '2025-06-11 19:09:43', '2025-06-10 20:01:35', '2025-06-11 19:09:43'),
('aae4385e-3928-4527-953b-049b2daafa33', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'Terra\' telah disetujui dan sekarang tersedia untuk diadopsi.\",\"cat_submission_id\":38,\"status\":\"approved\"}', NULL, '2025-06-11 22:30:15', '2025-06-11 22:30:15'),
('b859cffc-1908-402d-9ad1-386dc63c1927', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Tera\' telah disetujui.\",\"cat_id\":49,\"status\":\"approved\"}', '2025-06-11 19:09:45', '2025-06-10 19:55:40', '2025-06-11 19:09:45'),
('c753733a-fb38-47fe-8cfa-a686993e446a', 'App\\Notifications\\AdoptionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"adoption_request\",\"message\":\"Pengajuan adopsi kucing \'Johntor\' telah disetujui.\",\"cat_id\":54,\"status\":\"approved\"}', NULL, '2025-06-15 21:56:52', '2025-06-15 21:56:52'),
('c89110a5-867b-4e71-9197-f10fa51493b5', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'Tera\' telah disetujui dan sekarang tersedia untuk diadopsi.\",\"cat_submission_id\":33,\"status\":\"approved\"}', '2025-06-11 20:38:09', '2025-06-10 19:33:21', '2025-06-11 20:38:09'),
('d65b2c44-51f5-4501-8c22-20cb56a8e1c8', 'App\\Notifications\\CatHasBeenAdoptedNotification', 'App\\Models\\User', 6, '{\"message\":\"Kucing kamu dengan nama \\\"Terra\\\" pengajuan adopsi disetujui dan ingin diadopsi oleh Abell.\",\"cat_id\":52,\"adopter_id\":7}', NULL, '2025-06-15 21:58:29', '2025-06-15 21:58:29'),
('d8809938-0b2d-41c1-8ed5-6fbe19ca5dff', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 6, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'Cela\' telah ditolak. Alasan: alamat tida valid\",\"cat_submission_id\":39,\"status\":\"rejected\"}', NULL, '2025-06-15 21:45:55', '2025-06-15 21:45:55'),
('db5a28e0-4634-4a9a-85e2-a55599adb392', 'App\\Notifications\\CatSubmissionStatusNotification', 'App\\Models\\User', 7, '{\"type\":\"cat_submission\",\"message\":\"Pengajuan kucing \'Tera\' telah disetujui dan sekarang tersedia untuk diadopsi.\",\"cat_submission_id\":34,\"status\":\"approved\"}', '2025-06-11 19:09:45', '2025-06-10 19:43:36', '2025-06-11 19:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `filename`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Si oren', 'photos/XjQbayHjYYKiv0aVDQOMSZrHUFg0ovqlAgUKjYCj.jpg', 'ulala 😍', '2025-05-21 20:14:18', '2025-05-21 20:14:18', 7),
(6, 'Somal', 'photos/S2YxGUSWc3Kf0QXJ76w7W2Pgs360G2urp6yBFG94.jpg', 'Mantap', '2025-06-05 21:22:58', '2025-06-05 21:22:58', 6),
(7, 'Oreo', 'photos/KOqlMSk1vf8BIzpRGnrYlVEMOJJWPQWH8PKLKspE.jpg', 'Cakep ui', '2025-06-08 19:13:57', '2025-06-08 19:13:57', 3),
(8, 'Ngantukk....', 'photos/eggMwhaDKXlQb2v9WAVFNuhK2sVS4ptd3zTpz76x.jpg', 'Salmon ku ngantuk bett wkwkwk', '2025-06-08 23:49:25', '2025-06-08 23:59:55', 6),
(9, 'Makan wei', 'photos/EKLCzIaMVAExwCE0XGSlsYwNRZv6QJIMBRcmMt0R.jpg', NULL, '2025-06-09 00:00:37', '2025-06-09 00:00:37', 6),
(10, 'Imut Coooiiyyy', 'photos/we99k2S46Zhy6m6zPwelFAAhK1bUAO5sE7wpZ8Tq.jpg', 'Poki lagi mainnn', '2025-06-09 00:01:10', '2025-06-09 00:01:10', 6),
(11, 'Ganteng nyo', 'photos/eQy95sbZ9yILa63n6HZKJvteN5K62hTGUzBhVoRm.jpg', NULL, '2025-06-09 00:02:11', '2025-06-09 00:02:11', 3),
(12, 'Selow men', 'photos/u4z2bNarEk8psG6hbABXdsEr5iB8pG8zqFofrirH.jpg', 'Marah mulu ni kucing', '2025-06-09 00:03:33', '2025-06-09 00:03:33', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('574HVr3PeVhf01rCfMwoxaLV8HyQuyVa0JBy1PoF', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkc2ckFDcjBycVZIYnBlc243aFlVSGVvUFBReDJsbERzWmVLcWcyciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9waG90b3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNjt9', 1750549058),
('SoqJLxkdwnfmSJZtYlzlhduis9LteV6eHiTPwC6S', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEFaMVZ2UFJ5dVNvMlpFaE54SnhtWUlPRFp5bVRJSWxZTUplUUl4WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3J1bSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1750549167);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`, `banned`) VALUES
(3, 'Admin', 'adminkopeku@gmail.com', NULL, '$2y$12$glwEiJRLaaG8KxZg8d.VNu5.pFbWiK5uUO8sWmOV1hcKNb/H92Yi6', 'admin', NULL, NULL, '2025-05-24 06:11:56', '2025-06-08 23:28:25', 0),
(6, 'Gerry', 'gerry@gmail.com', NULL, '$2y$12$PIVSLxRKbKdUzZrENoiOVeHNuOow3zOU/GrkyUuRkxMtAAgxkOhE.', 'member', 'avatars/8JjV6qXz8OWjT78oFJ76wI25m6DfkXQcB4fEq8p4.jpg', NULL, '2025-06-04 01:06:42', '2025-06-15 21:55:15', 0),
(7, 'Abell', 'abel11@gmail.com', NULL, '$2y$12$wdtWWlGvpeNom0ZGc9kM8u1.KedDDRd9RQFW9vCcL9ZWB.Q57iSga', 'member', 'avatars/X6LIpGp1xhvuW5frx9mpnlAtQFM6VEFFfWkjmjXl.png', NULL, '2025-06-04 01:17:55', '2025-06-15 21:51:53', 0),
(9, 'Ashby', 'ashby@gmail.com', NULL, '$2y$12$xEpX35GXyT705ulIXhI6qumyHAe/str4Mqu/BYKJe9vhhkX6vl7S6', 'member', 'avatars/Zvx6JqGttuGLUMYMyVkngmqHFXkLYSEqbTxZPayO.jpg', NULL, '2025-06-06 22:34:10', '2025-06-06 22:34:10', 0),
(11, 'Admin 2', 'adminkopeku2@gmail.com', NULL, '$2y$12$MWsn1nxYgaJ5pK4XVa68.elm0ay7XYPJhICCXwSKu.qwpoOclLD4e', 'admin', NULL, NULL, '2025-06-08 23:08:21', '2025-06-08 23:08:21', 0),
(14, 'Loka', 'loka@gmail.com', NULL, '$2y$12$w.5Gj4w0ehDoTaLg/tFpnOPJHVAbjO7k4Pl5.EilQ58Vr4/oORYFe', 'member', 'avatars/JPm37z3bQHYFr3TvMJdLUlYJiLAdPbBm6RbXreTA.png', NULL, '2025-06-15 21:03:20', '2025-06-15 21:53:29', 0),
(15, 'Sultan', 'sultann@gmail.com', NULL, '$2y$12$b03S7d/j516UwnhjjbWxrOLoWyajeCTPF.BCoVKS0Q1bnpqf7j0XC', 'member', 'avatars/GblUvGR1nNr9iybdD7zowei5w3HIgoPzzmKBIraZ.jpg', NULL, '2025-06-15 21:23:27', '2025-06-15 21:25:47', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adoptions_cat_id_foreign` (`cat_id`),
  ADD KEY `adoptions_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_admin_id_foreign` (`admin_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cats_user_id_foreign` (`admin_id`),
  ADD KEY `cats_address_id_foreign` (`address_id`),
  ADD KEY `cats_user_id_index` (`user_id`);

--
-- Indexes for table `cat_images`
--
ALTER TABLE `cat_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Indexes for table `cat_submissions`
--
ALTER TABLE `cat_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_submissions_user_id_foreign` (`user_id`),
  ADD KEY `cat_submissions_breed_id_foreign` (`breed_id`),
  ADD KEY `cat_submissions_address_id_foreign` (`address_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forums_slug_unique` (`slug`),
  ADD KEY `forums_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_images`
--
ALTER TABLE `forum_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_images_forum_id_foreign` (`forum_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `cat_images`
--
ALTER TABLE `cat_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `cat_submissions`
--
ALTER TABLE `cat_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `forum_images`
--
ALTER TABLE `forum_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD CONSTRAINT `adoptions_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adoptions_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `cats` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cats`
--
ALTER TABLE `cats`
  ADD CONSTRAINT `cats_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cats_user_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cat_submissions`
--
ALTER TABLE `cat_submissions`
  ADD CONSTRAINT `cat_submissions_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cat_submissions_breed_id_foreign` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cat_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_images`
--
ALTER TABLE `forum_images`
  ADD CONSTRAINT `forum_images_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
