-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 10:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `nama_author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `nama_author`) VALUES
(1, 'Albert Radja Sihite'),
(2, 'Mohamad Egi Rahayu'),
(3, 'Hafiz Raka Pradana'),
(4, 'Anggun Wulan Sari');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nama_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nama_category`) VALUES
(1, 'E-Sport'),
(2, 'Technology'),
(3, 'Film'),
(4, 'Politic'),
(5, 'Otomotif'),
(6, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `img` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `publish` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `judul`, `img`, `body`, `publish`, `category_id`, `author_id`) VALUES
(1, 'Perjalanan EVOS Legends Jadi Juara Dunia Mobile Legends M1 World Championship 2019', 'EVOS M1.jpg', 'Kejuaraan dunia Mobile Legends M1 Bang Bang World Championship 2019 yang diselenggarakan di Axiata Arena, Kuala Lumpur, Malaysia, berhasil dimenangi oleh tim asal Indonesia, EVOS Legends. Keberhasilan tersebut dicapai seusai EVOS Legends mengalahkan sesama tim esports Indonesia lainnya, yakni Req Requm Qeon (RRQ), dengan skor tipis 4-3 pada partai grand final best of seven.\r\n\r\nHal ini membuktikan bahwa Indonesia menguasai turnamen Mobile Legends Bang Bang. \r\n\r\nPerjalanan tim esports EVOS Legends untuk meraih juara dunia di Mobile Legends M1 Bang Bang World Championship ini dimulai ketika mereka berhasil menguasai puncak klasemen fase grup. \r\n\r\nSetelah lolos dari fase grup, tim esports EVOS Legends menghadapi tim asal Myanmar, Burmese Ghouls, dengan meraih kemenangan dengan skor 2-0. \r\n\r\nPada pertandingan selanjutnya tim esports, EVOS Legends bertemu dengan sesama perwakilan Indonesia lainnya dalam babak semifinal, Req Requm Qeon (RRQ). EVOS Legends meraih kemenangan skor 3-0 pada Sabtu (16/11/2019).\r\n\r\nPada partai grand final yang dihelat di Axiata Arena itu, EVOS Legends bertemu kembali dengan Req Requm Qeon (RRQ). \r\n\r\nRRQ ke partai puncak karena berhasil mengalahkan tim esports asal Malaysia, Todak, di final lower bracket dengan skor 3-1. \r\n\r\nEVOS Legends dan Req Requm Qeon (RRQ) merupakan dua perwakilan Indonesia yang berhasil melaju sampai grand final M1 World Championship. \r\n\r\nHal ini pun membuktikan kekuatan Merah Putih dalam sebuah turnamen Mobile Legends Bang Bang.\r\n', '2019-11-18', 1, 2),
(2, 'Real Madrid Juara Liga Champions 2021/2022', 'Real Madrid UCL 14.jpg', 'Real Madrid berhasil menjadi juara Liga Champions 2021/2022. Los Blancos meraihnya setelah menumbangkan Liverpool 1-0.\r\n\r\nLiverpool vs Real Madrid tersaji di Stade de France, Minggu (29/5/2022) dini hari WIB. Si Merah bermain sangat dominan di babak pertama dengan banyak menekan Los Blancos.\r\n\r\nAlih-alih mencetak gol, Liverpool malah nyaris tertinggal sebelum turun minum. Karim Benzema mampu merobek gawang Liverpool, namun gol itu dianulir karena berbau offside.\r\n\r\nBabak kedua menjadi milik Real Madrid. Anak asuh Carlo Ancelotti mampu mengambil momen dan memimpin 1-0 lewat Vinicius Junior di menit ke-59.\r\n\r\nGol itu membuat duel berjalan makin seru. Madrid tidak bermain bertahan dan Liverpool sangat agresif menyerang sampai mampu membuat peluang emas, namun Thibaut Courtois tampil gemilang.\r\n\r\nTak ada gol tambahan sampai laga tuntas. Real Madrid keluar sebagai juara Liga Champions 2021/2022.\r\n\r\nIni menjadi gelar Liga Champions yang ke-14 bagi Real Madrid. Gelar sebelumnya didapat Madrid juga saat mengalahkan Liverpool.\r\n\r\nKedua tim secara total sudah tiga kali bertemu di final Liga Champions. Liverpool memenangi pertemuan pertama yang berlangsung pada musim 1980/1981. Saat bertanding di Parc des Princes, Si Merah menang 1-0 berkat gol Alan Kennedy.\r\n\r\nMadrid kemudian membalas pada 2018. Saat bertanding di NSC Olimpiyskiy Stadium, Kiev, Ukraina, Los Merengues menang dengan skor akhir 3-1.', '2022-05-29', 6, 2),
(3, 'Sinopsis One Piece Film: Red, Pengakuan Mengejutkan Uta', 'One Piece Red.jpg', 'One Piece Film: Red adalah film terbaru dari anime asal Jepang One Piece yang akan rilis di Indonesia September mendatang. \r\n\r\nFilm ini merupakan garapan dari sutradara Goro Taniguchi. \r\n\r\nPengisi suara dalam film ini dibintangi oleh Kaori Nazuka, Mayumi Tanaka, Kazuya Nakai, dan Akemi Okamura.\r\n\r\nOne Piece Film: Red mengisahkan tentang seorang penyanyi terkenal bernama Uta.  \r\n\r\nSuatu hari Uta sedang tampil di pulau musik Elegia dan ditonton oleh banyak kelompok bajak laut. \r\n\r\nKelompok topi jerami yang dipimpin oleh Luffy juga ikut menonton di pulau tersebut. \r\n\r\nNamun Uta secara mengejutkan mengumumkan bahwa dia adalah anak dari Shanks si Rambut Merah.  \r\n\r\nPenonton di sana pun terkejut karena Shanks dikenal sebagai kapten bajak laut yang ditakuti. \r\n\r\nBagaimanakah kelanjutan kisahnya? Saksikan One Piece Film: Red yang akan tayang di bioskop September 2022.', '2022-07-26', 3, 2),
(4, 'Team Spirit Juara TI 2023 Dota 2, Bantai Gaimin Gladiators 3-0', 'Team Spirit TI 12.jpeg', 'Gelaran kompetisi internasional Dota 2 besutan Valve resmi berakhir. Team Spirit menjadi juara TI 2023, setelah mengalahkan Gaimin Gladiators.\r\n\r\nPertandingannya diselenggarakan secara offline, yang berlokasi di Seattle, Washington, Amerika Serikat. Duel keduanya terjadi tadi malam di babak grand final (29/10).\r\n\r\nTeam Spirit yang saat itu diperkuat oleh Yatoro, Larl, Collapse, Mira, dan Miposhka sukses menguasai jalannya pertandingan. Skor sempurna pun berhasil tercipta, yang mana mereka mampu membantai lawannya 3-0 tanpa balas.\r\n\r\nDengan begitu, ini menjadi gelar juara TI Dota 2 kedua kalinya bagi Team Spirit. Sebelumnya mereka pernah mendapatkannya di TI 2021, ketika total hadiahnya menjadi yang terbesar sepanjang sejarah turnamen esports.\r\n\r\nBerbeda dengan TI 2023, kali ini Sang Jawara hanya mendapatkan uang tunai senilai USD 1.416.230 atau sekitar Rp 22,5 miliar. Itu jumlah terbesar yang diterima juaranya, dari total hadiah yang ditawarkan Valve, yakni USD 3.146.853 atau sekitar Rp 50 miliar, dikutip dari Liquipedia, Senin (30/10/2023).\r\n\r\nSedangkan Gaimin Gladiators hanya mendapatkan USD 377.606 atau sekitar Rp 6 miliar. Kendati demikian, yang mendapatkan hadiah uang tunai tidak cuma dua tim tersebut, mengingat 18 partisipan lainnya juga mendapatkan uang dengan jumlah berbeda-beda.\r\n\r\n1. Team Spirit - USD 1.416.230 atau sekitar Rp 22,5 miliar\r\n2. Gaimin Gladiators - USD 377.606 atau sekitar Rp 6 miliar\r\n3. LGD Gaming - USD 251.807 atau sekitar Rp 4 miliar\r\n4. Azure Ray - USD 173.052 atau sekitar Rp 2,7 miliar\r\n5. Team Liquid - USD 102.329 atau sekitar Rp 1,6 miliar\r\n6. BetBoom Team - USD 102.329 atau sekitar Rp 1,6 miliar\r\n7. Nouns - USD 78.650 atau sekitar Rp 1,2 miliar\r\n8. Virtus.pro - USD 78.650 atau sekitar Rp 1,2 miliar\r\n9. TSM - USD 62.900 atau sekitar Rp 1 miliar\r\n10. 9Pandas - USD 62.900 atau sekitar Rp 1 miliar\r\n11. Talon Esports - USD 62.900 atau sekitar Rp 1 miliar\r\n12. Entity - USD 62.900 atau sekitar Rp 1 miliar\r\n13. Shopify Rebellion - USD 47.253 atau sekitar Rp 752 juta\r\n14. Evil Geniuses - USD 47.253 atau sekitar Rp 752 juta\r\n15. Keyd Stars - USD 47.253 atau sekitar Rp 752 juta\r\n16. Tundra Esports - USD 47.253 atau sekitar Rp 752 juta\r\n17. Team SMG - USD 31.502 atau sekitar Rp 501 juta\r\n18. Thunder Awaken - USD 31.502 atau sekitar Rp 501 juta\r\n19. beastcoast - USD 31.502 atau sekitar Rp 501 juta\r\n20. PSG Quest - USD 31.502 atau sekitar Rp 501 juta', '2023-10-30', 1, 1),
(5, 'Indonesia Resmi Jadi Tuan Rumah Piala Dunia U-17 2023', 'Indonesia Piala Dunia U-17.jpg', 'Indonesia akhirnya resmi menjadi tuan rumah Piala Dunia U-17 yang akan berlangsung mulai 10 November sampai 2 Desember 2023. PSSI akan segera mengumumkan siapa pelatih, pemain dan juga kota yang akan ditunjuk menjadi tempat digelarnya Piala Dunia U-17 nanti.\r\n\r\nIni menjadi pertama kali Indonesia tampil di Piala Dunia U-17. Timnas Indonesia U-17 akan didaulat untuk menjadi wakil di event sepak bola dunia kelompok umur ini.\r\n\r\nSaat ini, 20 negara sudah dipastikan akan tampil di Piala Dunia U-17. Ada empat negara lagi dari Asia yang masih memperebutkan tiket ke Piala Dunia U-17.\r\n\r\nEmpat negara ini masih bertarung di Piala Asia U-17 yang saat ini berlangsung di Thailand. Saat ini, Piala Asia U-17 sudah memasuki babak perempat final.\r\n\r\nTuan rumah akan menghadapi Korea Selatan. Lalu ada juga Arab Saudi melawan Uzbekistan, Iran vs Yaman dan Jepang melawan Australia.\r\n\r\nEmpat negara yang lolos semifinal dipastikan akan tampil di Piala Dunia U-17. Apakah Thailand bisa menyusul Indonesia sebagai wakil dari Asia?', '2023-06-24', 6, 1),
(6, 'Tayang Hari ini, Yuk Simak Sinopsis Film Black Clover: Sword of the Wizard King', 'Black Clover Wizard King.jpg', 'Harapan para pecinta anime untuk bisa menoton film Black Clover kini terbayar. Mulai Jumat (16/6/2023) film yang diangkat dari manga itu bisa ditonton di Netflix. Seperti apa ceritanya? Yuk, simak sedikit ulasannya!\r\n\r\nBlack Clover: Sword of the Wizard King menceritakan Asta, seorang anak laki-laki yang lahir tanpa memiliki kemampuan sihir. Namun dia berusaha keras menjadi Raja Penyihir dan menggagalkan rencana jahat Raja Penyihir sebelumnya yang mengancam Kerajaan Clover. \r\n\r\nBlack Clover: Sword of the Wizard King merupakan film anime yang diangkat dari manga karya Yuuki Tabata. Naskahnya kemudian ditulis ulang oleh Johnny Onda dan Ai Orii, sementara Ayataka Tenamura menduduki kursi sutradara.\r\n\r\nAsta merupakan bocah lelaki yang lahir di dunia penuh sihir. Namun, tidak seperti kebanyakan orang di dunianya, Asta malah sama sekali tidak memiliki kemampuan sihir.\r\n\r\nAsta juga memiliki seorang saingan, bernama Yuno. Berbeda dengan Asta, Yuno merupakan penyihir jenius pilihan Grimoire berdaun empat yang legendaris. Keduanya bercita-cita menjadi penyihir teratas hingga harus bersaing membuktikan kekuatan.\r\n\r\nAsta dan Yuno pun bersama-sama melawan musuh dan menghadapi semua kesulitan demi menjadi Raja Penyihir. Namun sebelum mendapatkan posisi tersebut, mereka harus menghadapi Raja Penyihir sebelumnya, Conrad Leto.\r\n\r\nConrad Leto merupakan Raja Penyihir yang tiba-tiba melakukan pemberontakan pada Kerajaan Clover. Dia memiliki keinginan menggunakan Pedang Kekaisaran untuk membangkitkan tiga Raja Penyihir yang paling ditakuti dalam sejarah.\r\n\r\nMereka adalah Edward Avalaché, Princia Funnybunny, dan Jester Garandaros. Ketiganya diasingkan.  \r\n\r\nUntuk menghindari masalah besar yang akan dihadapi Kerajaan Clover, Asta dan Yuno berusaha keras menggagalkan aksi Conrad.', '2023-06-16', 3, 1),
(7, 'Onic Esports Juara MPL S12, Tiga Kali Berturut-turut sejak Season 10', 'Onic S12.jpeg', 'Onic Esports imenjuarai Mobile Legends Professional League Indonesia Season 12 (MPL S12), setelah mengalahkan Geek Fam ID di babak grand final yang digelar di Mahaka Square, Kelapa Gading, Jakarta Utara, Minggu (15/10/2023). \r\n\r\nKemenangan Onic Esports ini menjadikan mereka sebagai tim e-sports MLBB pertama di Indonesia yang mendapatkan gelar juara MPL ID selama tiga kali berturut-turut. Onic Esports sebelumnya juga menjuarai MPL S10 dan MPL S11. \r\n\r\nPertandingan di grand final MPL S12 antara Onic Esports dan Geek Fam bisa dibilang cukup alot. Kedua tim bermain dengan performa maksimal, dan saling mengalahkan. \r\n\r\nDengan kemenangan ini, Onic Esports berhak memperoleh hadiah dengan porsi terbesar dari total 336.500 dollar AS (Rp 5 miliar).', '2023-10-16', 1, 3),
(8, 'Bayer Leverkusen Memburu Gelar Bundesliga 2023/2024', 'Bayern Leverkusen.jpg', 'Bayer Leverkusen belum pernah meraih gelar juara Bundesliga. Capaian terbaik mereka sejauh ini adalah runner-up, yang terakhir didapat pada musim 2010/2011 lalu.\r\n\r\nPada musim 2023/2024, Leverkusen mempunyai peluang untuk meraih gelar juara. Sebab, hingga pekan ke-11, Leverkusen berada di puncak klasemen dengan status belum pernah terkalahkan.\r\n\r\nLeverkusen bukan hanya belum pernah kalah di Bundesliga. Sejauh ini, mereka juga sangat solid ketika berlaga di DFB Pokal dan Liga Europa.\r\n\r\nDi bawah kendali pelatih Xabi Alonso, ada harapan bagi Leverkusen untuk meraih trofi. Harapan itu diapungkan oleh gelandang Exequiel Palacios.', '2023-11-15', 6, 3),
(9, 'Review Suzume no Tojimari, Sindiran Keras Makoto Shinkai untuk Masalah Serius di Jepang', 'Suzume.jpg', 'Nama sutradara Makoto Shinkai sudah tak perlu diragukan lagi di dunia anime atau animasi Jepang. \r\n\r\nKarya-karyanya selalu berhasil menuai pujian dari para penikmat film di seluruh dunia. \r\n\r\nNamanya semakin melambung tinggi saat Your Name dirilis pada tahun 2016. \r\n\r\nSetelah kesuksesan besar Your Name, Shinkai merilis Weathering with You pada 2019. \r\n\r\nTiga tahun berselang, sutradara berusia 50 tahun ini kembali dengan karya baru berjudul Suzume no Tojimari. \r\n\r\nJika ditarik ke belakang, Makoto Shinkai memiliki sebuah formula ampuh yang selalu dipertahankan.\r\n\r\nFormula itu adalah pertemuan dua orang asing, penggambaran dunia magis, dan iringan lagu dari RADWIMPS. \r\n\r\nKetiga unsur itu dibalut dengan cerita cinta remaja dan perjalanan yang memadukan keindahan alam, entah itu pelangi, cahaya matahari atau bahkan hujan. \r\n\r\nPola serupa diterapkan kembali oleh Makoto Shinkai dalam cerita Suzume no Tojimari. \r\n\r\nSuzume merupakan seorang anak remaja SMA yang tinggal bersama bibinya setelah ibunya meninggal dunia.\r\n\r\nKehidupan Suzume kemudian berubah saat bertemu dengan Souta yang sedang mencari pintu di tempat-tempat terbengkalai di Jepang. \r\n\r\nSouta sebagai Penutup harus menutup setiap pintu yang terbuka karena akan menyebabkan bencana berupa gempa hingga tsunami. \r\n\r\nSecara jalan cerita, Suzume memiliki alur yang cukup kuat dengan tema utama sebuah perjalanan. \r\n\r\nPerjalanan Suzume dan Souta menutup pintu-pintu bencana memberikan dinamika naik-turun yang terasa bagai rollercoaster.\r\n\r\nFilm ini mengangkat salah satu masalah besar yang memang sangat relevan dengan kehidupan masyarakat Jepang.\r\n\r\nBencana alam berupa gempa bumi dan tsunami merupakan ancaman yang selalu mengintai Negeri Sakura.\r\n\r\nDikutip dari data Japan Meteorological, ada sekitar 3.800 gempa dengan magnitudo 3,0 hingga 3,9 terjadi per tahunnya. \r\n\r\nSelain itu, tempat-tempat terbengkalai atau reruntuhan juga tengah menjadi sorotan bagi Pemerintah Jepang.\r\n\r\nDari jumlah tersebut, 8,49 juta rumah diketahui kosong. Sebagian besar rumah-rumah terbengkalai itu berada di pedesaan atau kota kecil di Jepang. \r\n\r\nSementara di Tokyo, data menyebutkan 1 dari 10 rumah tidak berpenghuni. \r\n\r\nMasalah seserius itu diangkat oleh Makoto Shinkai dalam bingkai cerita Suzume yang sederhana dan juga penuh tawa. \r\n\r\nMeski tak sekuat Your Name, Suzume tetap menjadi sebuah karya menarik dari Makoto Shinkai. \r\n\r\nFilm ini juga membawa beberapa detail kecil yang akan membawa ingatan para penonton pada film-film terdahulunya. \r\n\r\nFilm Suzume no Tojimari sudah bisa dinikmati di bioskop-bioskop di Indonesia.', '2023-03-09', 3, 3),
(10, 'EVOS Phoenix juara FFWS 2022 Bangkok, cetak sejarah baru untuk Macan Putih', 'EVOS Phoenix.jpg', 'EVOS Phoenix berhasil keluar menjadi juara FFWS 2022 Bangkok usai menyalip pemuncak klasemen, VIVO Keyd pada babak Grand Final, Sabtu (26/11).\r\n\r\nKeberhasilan EVOS Phoenix sebagai juara dunia Free Fire untuk kedua kalinya di Bangkok, menandakan tim Macan Putih berhasil mengoleksi 3 gelar juara FFWS 2022 dalam 4 tahun terakhir. Prestasi tersebut menjadi gelar pertama Thailand di tanah sendiri.\r\n\r\nSebelumnya, berbagai tim asal Thailand mencetak gelar juara di dua tempat berbeda. EVOS Phoenix menjadi juara di FFWS 2021 Sentosa, dan Attack All Arround (AAA) menjadi juara di FFWS 2022 Sentosa, menyalip EVOS Phoenix.\r\n\r\nKini, lengkap sudah penantian dari Dlong cs bersama dengan para pasukan Macan Putih lainnya seperti TheCruz, Already, GetHigh, Moshi dan Joena untuk menjadi tim pertama yang meraih gelar juara dunia sebanyak dua kali berturut-turut.', '2022-11-27', 1, 4),
(11, 'Selamat! Barcelona Juara La Liga 2022/2023', 'Barcelona.jpg', 'Barcelona resmi jadi juara La Liga 2022/2023. Hasil itu dipastikan usai merangkum tiga poin pada pekan ke-34. Barcelona menang dengan skor 4-2 atas Espanyol di RCDE Stadium, Senin (16/5/2023) WIB.\n\nEmpat gol Blaugrana dicetak oleh Robert Lewandowski (11\', 40\'), Alejandro Balde (20\'), dan Jules Kounde (53\'). Espanyol sempat membalas dua gol berkat lesakan Javier Puado (73\') dan Joselu (90\').\n\nRaihan poin penuh ini membuat Barcelona sudah mengumpulkan 85 poin dari 34 laga. Jules Kounde dkk unggul 14 angka dari Real Madrid di peringkat ke-2.\n\nDengan empat laga tersisa di musim 2022/2023, Madrid maksimal hanya bisa menambah 12 angka ke koleksi poin mereka. Itu berarti sudah tidak ada kesempatan bagi Madrid mengejar perolehan Barcelona.', '2023-05-15', 6, 4),
(12, 'Sinopsis Ancika 1995, Dia yang Bersama Dilan Setelah Putus Dari Milea', 'Ancika 1995.jpg', 'Ancika 1995 merupakan film Indonesia yang menjadi trilogi dari film Dilan. \r\n\r\nFilm dengan genre romansa remaja ini disutradarai oleh Benni Setiawan berdasarkan novel berjudul sama karya Pidi Baiq. \r\n\r\nFilm ini dibintangi oleh Arbani Yasiz, Zee JKT 48, Yeyen Lidya, Kenes Andari, Irgi fahrezi, Daffa Wardhana, Putri Ziani, dan Sendy Hilman.\r\n\r\nAncika 1995 menceritakan kelanjutan kisah cinta Dilan (Arbani Yasiz) setelah ia putus dengan Milea. \r\n\r\nBerlatar tahun 1995, Dilan yang saat itu tengah berkuliah di Bandung itu pun jatuh cinta dengan Ancika (Zee JKT 48), seorang gadis berusia 17 tahun. \r\n\r\nPada awalnya, Ancika yang selalu diganggu oleh Dilan ini merasa kesal dengannya dan tidak menyukai kehadiran Dilan. \r\n\r\nDi mata Ancika, Dilan adalah sosok laki-laki menyebalkan dan brengsek, yang tidak berharga baginya. \r\n\r\nNamun, Ancika mulai berpikir bahwa Dilan adalah sosok yang menyenangkan ketika mereka mengalami peristiwa yang membuat mereka sering berjumpa.\r\n\r\nHubungan mereka pun semakin dekat, sampai-sampai Dilan seringkali datang ke rumah Ancika untuk membantunya menyelesaikan tugas sekolah. \r\n\r\nLantas, seperti apa kisah percintaan Dilan dengan Ancika? Nantikan film Ancika 1995 di bioskop, segera.', '2023-04-06', 3, 4),
(13, 'Persija Evos Juara PUBG Mobile PMPL ID Fall 2023', 'PJEV PMPL.jpg', 'Tim e-sports Persija Evos (PJEV) menyabet gelar juara PUBG Mobile Pro League Indonesia (PMPL ID) Fall 2023 pada Minggu (18/6/2023).\r\n\r\nPencapaian tim yang digawangi &quot;Luxxy&quot;, &quot;Zuxxy&quot;, &quot;Misery&quot;, &quot;Microboy&quot;, dan &quot;RedFace&quot; ini diperoleh berkat permainan mereka yang cukup Over Powered (OP).\r\n\r\nOP adalah istilah yang biasa dipakai ketika sebuah tim e-sports sangat mendominasi di suatu turnamen atau pertandingan. OP juga biasa dipakai apabila suatu karakter di dalam game memiliki kemampuan yang melebihi karakter-karakter lainnya.\r\n\r\nDalam hal ini, Persija Evos bisa dikatakan OP karena memiliki total perolehan poin yang cukup jauh dari tim-tim peserta PMPL ID Fall 2023 lainnya, yaitu mencapai 529 poin.\r\n\r\nMayoritas tim lainnya memiliki skor di bawah 400 poin, di mana poin tertinggi di bawah PJEV adalah Morph GPX yang ada di posisi kedua dengan perolehan skor 419 poin.\r\n\r\nAdapun perolehan poin Persija Evos yang bisa dibilang sangat tinggi ini diraih berkat performa mereka yang cukup konsisten dan terus berada di 10 besar dalam setiap pertandingan yang tersedia.\r\n\r\nBahkan pada dua pertandingan terakhir, Persija Evos berhasil mendapatkan dua kemenangan (Winner Winner Chicken Dinner/WWCD), sehingga cukup untuk membuat perolehan poin PJEV melesat jauh dari tim-tim lainnya.\r\n\r\nSecara keseluruhan PMPL ID Fall 2023, Persija Evos mendapatkan total 11 WWCD, terbanyak dari tim-tim lainnya yang hanya mendapatkan 1-6 WWCD.\r\n\r\nNah, sebagai juara PMPL ID Fall 2023, Persija Evos berhak mendapatkan porsi hadiah terbesar dari total hadiah 80.000 dollar AS (sekitar Rp 1,1 miliar), yaitu 22.400 dollar AS (sekitar Rp 335 juta).\r\n\r\nPersija Evos juga sebenarnya mendapatkan tiket langsung ke kompetisi lanjutan level Asia Tenggara, yaitu PUBG Mobile Super League Southeast Asia (PMSL) Fall 2023 yang rencananya digelar pada Agustus nanti. \r\n\r\nNamun, karena PJEV sudah mendapatkan tiket ke kompetisi tersebut lebih dulu, slot PMSL Fall 2023 dari PMPL ID Fall 2023 diberikan kepada juara kedua kompetisi ini, yaitu Morph GPX.\r\n\r\nSelengkapnya, simak klasemen akhir PMPL ID Fall 2023, lengkap dengan perolehan poin dan WWCD yang didapatkan masing-masing tim, sebagaimana dirangkum KompasTekno dari Liquipedia, Senin (19/6/2023). \r\n\r\n1. Persija EVOS: 529 poin, 11 WWCD \r\n2. Morph GPX: 419 poin, 6 WWCD \r\n3. BOOM Esports: 411 poin, 5 WWCD \r\n4. Rex Regum Qeon: 410 poin, 6 WWCD \r\n5. 21NFT Esports: 373 poin, 4 WWCD \r\n6. AURA Esports: 369 poin, 4 WWCD \r\n7. Alter Ego Ares: 355 poin, 3 WWCD \r\n8. Pigmy Team: 353 poin, 4 WWCD \r\n9. Kagendra: 346 poin, 4 WWCD \r\n10. Bigetron Red Villains: 342 poin, 2 WWCD \r\n11. VOIN BULLS: 341 poin, 2 WWCD \r\n12. GLU SQUAD: 318 poin, 4 WWCD \r\n13. ARF Team: 276 poin, 4 WWCD \r\n14. HFX Esports: 250 poin, 0 WWCD \r\n15. Dewa United: 238 poin, 1 WWCD \r\n16. Team Dominatus: 120 poin, 0 WWCD', '2023-06-19', 1, 2),
(14, 'Perkenalan Ronaldo di Al Nassr: Ditonton 3 Miliar Orang, Kalahkan Final Piala Dunia 2022', 'Ronaldo Al Nassr.jpg', 'Siaran televisi momen perkenalan Cristiano Ronaldo di Al Nassr kabarnya ditonton oleh 3 miliar orang. Jumlah penonton itu mengalahkan partai final Piala Dunia 2022 Qatar.\r\n\r\nCristiano Ronaldo resmi diperkenalkan Al Nassr di Stadion Mrsool Park di ibu kota Arab Saudi, Riyadh, pada Selasa (3/1/2023).\r\n\r\nDilansir Marca, momen perkenalan Cristiano Ronaldo tersebut dihadiri langsung oleh 30.000 fans Al Nassr yang memadati Stadion Mrsool Park.\r\n\r\nTak hanya disaksikan oleh puluhan ribu pendukung Al Nassr yang hadir langsung di stadion, perkenalan Ronaldo juga disiarkan oleh 40 saluran televisi di seluruh dunia.\r\n\r\nJurnalis Pedro Sepulveda melaporkan, presentasi Cristiano Ronaldo sebagai pemain baru Al Nassr ditonton oleh 3 miliar orang melalui 40 channel televisi di seluruh dunia.\r\n\r\nJumlah itu mengalahkan siaran langsung final Piala Dunia 2022 Qatar di 40 saluran televisi yang sama.\r\n\r\nSepulveda menyebutkan, laga partai puncak Piala Dunia 2022 yang mempertemukan Argentina dengan Perancis disaksikan oleh 2 miliar penonton.', '2023-01-08', 6, 2),
(15, 'Sinopsis A Silent Voice, Film Anime tentang Siswi Tuli', 'A Silent Voice.jpg', 'A Silent Voice merupakan film anime yang dapat disaksikan di layanan streaming Netflix.\r\n\r\nFilm karya Naoko Yamada ini rilis pada 2016 dan diperankan oleh Miyi Irino, Saori Hayami, dan Aoi Yuki.\r\n\r\nA Silent Voice bercerita tentang siswi SMA tuli bernama Shoko Nishimiya (Saori Hayami) yang mencoba untuk beradaptasi dengan teman-temannya dan hidup selayaknya siswi SMA lainnya.\r\n\r\nSementara itu, Shoya Ishida (Miyu Irino) adalah seorang siswa SMA cuek yang senang mengganggu teman-temannya.\r\n\r\nSuatu ketika, Shoya bertemu dengan Shoko.\r\n\r\nShoya sering mengganggu Shoko, bahkan sampai melepas alat bantu dengar yang dimilikinya.\r\n\r\nMendengar hal tersebut, kepala sekolah memanggil semua siswa yang ikut terlibat dalam kasus yang menimpa Shoko.\r\n\r\nShoya pun menuduh semua teman-temannya akan tetapi kepala sekolah tidak mempercayainya.\r\n\r\nTeman-teman Shoya mulai menjauhinya karena mereka dituduh telah mengganggu Shoko.\r\n\r\nSampai akhirnya Shoya dijauhi oleh teman-temannya sendiri.', '2021-08-03', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(260) NOT NULL,
  `roles` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `roles`) VALUES
(1, 'admin', '$2y$10$Y6Kc7/mZr2PLpPY.FLBXgu/DJSm/X6ngmR194IGlIBbHhMnQgMesy', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`user_id`,`post_id`) USING BTREE,
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`category_id`) USING BTREE,
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
