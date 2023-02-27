-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:3306
-- Waktu pembuatan: 25 Jun 2022 pada 02.49
-- Versi server: 8.0.29
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int NOT NULL,
  `prov` varchar(100) NOT NULL,
  `biaya` int NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `prov`, `biaya`) VALUES
(1, 'Jawa Timur', 10000),
(2, 'Jawa Tengah', 16000),
(3, 'Jawa Barat', 20000),
(4, 'Bali', 10000),
(5, 'DIY Yogyakarta', 25000),
(6, 'DKI Jakarta', 17000),
(7, 'Lampung', 45000),
(8, 'Jambi', 50000),
(9, 'Papua', 128000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `sinopsis` text NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `publisher`, `writer`, `genre`, `sinopsis`, `price`, `image`) VALUES
(2, 'Pride and Prejudice', 'Mizan', 'Jane Austen', 'Romance', 'Kisah romansa klasik terpopuler oleh Jane Austen', 85000, 'pride-and-prejudice.jpg'),
(3, 'Laut Bercerita', 'Kepustakaan Populer Gramedia', 'Leila S. Chudori', 'Fantasi', 'Laut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.', 100000, 'laut_bercerita.png'),
(10, 'You Do You', 'Gramedia Pustaka Utama', 'Fellexandro Ruby', 'Novel', '“Mas, gimana kalau passion gue belum menghasilkan?” \r\n“Mas, apakah lebih baik jadi generalis atau spesialis?”\r\n“Mas, gue pengin bisa ganti haluan karier di bidang yang lain, bisakah?\r\n“Mas, gue lagi di tengah-tengah quarter-life crisis. Help me.” \r\n“Mas, gue bingung ikigai gue apa.”\r\n“Mas, emang di usia 30 nanti, secara finansial gue udah mesti punya apa aja?”\r\n“Mas, berbagi dong proses lo menuju ke Rp1M pertama.”\r\n\r\nI feel you. Gue juga pernah mengalami keresahan yang sama. Faktanya, satu dekade pertama dalam perjalanan karier gue dihabiskan untuk bereksperimen dengan sembilan macam role yang berbeda, sampai akhirnya gue menemukan ikigai. \r\n\r\nSales, petugas lelang, operator alat berat, travel blogger, food photographer, penyanyi, social media manager, product manager di sebuah tech startup, sampai pengusaha pernah gue jalani. \r\n\r\nMenariknya, semua kegalauan dan pencarian itu mulai terjawab dengan sendiri6nya ketika gue bisa menjawab pertanyaan: “Who are you?”  \r\n\r\nKetika gue mengenal diri sendiri, maka pada titik itulah gue menemukan jawaban bahwa “your life (career, business, relationship, and finance) should be an extension of who you are”. \r\n\r\nBuku ini nggak ngasih jawaban langsung, tapi ngebantu merefleksi diri, melihat ke dalam, mengurai situasi, supaya lo bisa menemukan sendiri jawaban, kapan pun lo bertemu dengan persimpangan. ', 94000, 'you_doyou.png'),
(13, 'Sunny Everywhere (SBS)', 'Gramedia', 'Sunny Dahye', 'Romansa', 'Growing up to me wasn’t so “Chanel”… Hidup di balik layar YouTube kadang terlihat seperti dongeng. Ada merek-merek mahal, sarapan mewah, penerbangan business-class, dan negeri-negeri yang jauh. Hidup di balik YouTube kelihatan seperti hidup yang sangat enak dijalani, hidup yang bikin penontonnya iri. Tapi apakah memang seperti itu kenyataannya? Sunny Dahye memulai perjalanannya sebagai YouTuber bahkan sebelum kanal itu dikenal banyak orang. Kini dia bisa membeli baju dan sepatu mahal, terbang ke tempat-tempat indah, menginap di hotel berbintang lima. Hidupnya, indah di layar ponselmu. Di mana, sebaliknya, sama seperti hidup kebanyakan orang, hari-hari Sunny juga tentang kegagalan, kekecewaan, keraguan, dan penyesalan. Di saat impiannya satu per satu terwujud, Sunny justru tersesat, tidak tahu harus ke mana. Di buku ini Sunny membuka sedikit hatinya, dan luka-luka yang harus dia telan pahitnya, sebelum dia menjadi Sunny yang kamu kenal hari ini. “So yeah, reality hurts. You’re welcome,” she said.', 84000, 'sunny.jpg'),
(14, 'Salah Piknik', 'Gramedia', 'Joko Pinurbo', 'Horror', 'Salah Piknik adalah kumpulan puisi Joko Pinurbo yang sebagian besar isinya merespons fenomena yang terjadi selama wabah corona melanda dunia. Puisi-puisinya menampilkan permainan kata yang bernada humoris sekaligus getir. Sindiran dan kritik juga hadir dalam buku ini. Dilengkapi dengan ilustrasi karya Alit Ambara, buku puisi ini hadir sebagai dokumentasi sosial yang penting merekam banyak hal baru yang terjadi selama pandemi. ', 70400, 'salpik.jpg'),
(15, 'Rindu', 'Sabakgrip', 'Tere Liye', 'Romansa', '\"Apalah arti memiliki, ketika did kami sendiri bukanlah milik kami?\r\nApalah arti kehilangan, ketika kami sebenarnya menemukan banyak saat kehilangan dan sebaliknya, kehilangan banyak pula saat menemukan?\r\nApalah arti cinta, ketika menangis terluka atas perasaan yg seharusnya indah? Bagaimana mungkin, kami terduduk patah hati atas sesuatu yang seharusnya suci dan tidak menuntut apa pun?\r\nWahai, bukankah banyak kerinduan saat kami hendak melupakan? Dan tidak terbilang keinginan melupakan saat kami dalam rindu? Hingga rindu dan melupakan jaraknya setipis benang saja\"', 84450, 'rnd.jpg'),
(16, 'Tapak Jejak', 'Mediakita', 'Fiersa Besari', 'Petualangan', 'Bulan April, tahun 2013 berawal dari niat dan tujuan yang berbeda,tiga pengelana memulai sebuah perjalanan meyusuri daeraah - daerah di indonesia. meski akhirnya teman seperjalanan satu per satu memilih arah pulang, langkah yang sudah dijejakkan harus diteruskan', 88250, 'tj.jpg'),
(17, 'Pulang Pergi', 'Sabakgrip', 'Tere Liye', 'Romansa', 'Ada jodoh yang ditemukan lewat tatapan pertama.\r\nAda persahabatan yang diawali lewat sapa hangat.\r\nBagaimana jika takdir bersama ternyata,\r\ndiawali dengan pertarungan mematikan?\r\nLantas semua cerita berkelindan dengan,\r\npengejaran demi pengejaran mencari jawaban?\r\nPulang-Pergi', 84550, 'pp.jpg'),
(18, 'Mati Di Jogjakarta', 'Mediakita', ' Egha De Latoya', 'Romansa', '“Entah pada akhirnya nanti,\r\naku mati dalam pelukan atau dalam perpisahan.”', 64350, 'mj.jpg'),
(19, 'Insecurity', 'Alvi Ardhi Publishing', 'Alvi Ardani', 'Fiksi', '1. Kenapa good-loking yang selalu dipilih?\r\n2. Lalu, siapa yamg akan memilihku? \r\n3. Aku juga kayaknya nggak bisa apa-apa deh. \r\n4. Skill apa, ya, yang cocok buat aku? | \r\n5. Tapi, aku harus mulai dari mana, ya? \r\n6. Aku bukan malas, hanya takut gagal lagi. \r\n7. Dan, aku malu, belum bisa banggain orangtua. \r\n8. Dan, aku kalah jauh dari teman-temanku.\r\n9. Jujur, aku iri sama pencapaian mereka. \r\n10. Nggak ada yang bisa dibanggakan dariku. ', 83700, 'insecure.jpg'),
(20, 'Not So Silly', 'KPG', 'NAELA ALI', 'Novel', 'This book is about you.\r\nA 12 month undated planner where you have your freedom to start arranging your \'not-so-ordinary-plans.\'\r\nFilled with some fun activities to do when you\'re bored (or not).\r\nAlso included are some stickers to beautify the cover making it uniquely yours.\r\nAnd if it\'s not enough, you can also get the \'Not so Silly Stickers & Postcard Book.\"\r\nGo get them and make your journaling experience even more fun!\r\n\r\nWell. this is your \'not-so-ordinary\' to accompany your \' not-so-silly-life\'.\r\n-@SillyGillyDaily', 119200, 'silly.jpg'),
(21, 'Rapijali', 'Bentang Pustaka', 'Dee Lestari', 'Novel', 'Ping merasa telah memiliki segala yang ia butuhkan. Dunianya yang damai di Pantai Batu Karas,\r\nrumahnya yang penuh alat musik di tepi Sungai Cijulang, seorang sahabat terbaik, serta kakek yang\r\nmenyayanginya. Namun, diam-diam Ping menyimpan kegelisahan tentang masa depannya yang\r\nburam. Bakat musiknya yang istimewa tidak memiliki wadah, dan ia tidak berani bercita-cita.\r\nHidup Ping jungkir balik ketika ia harus pindah ke Jakarta dan tinggal bersama keluarga calon\r\ngubernur. Ping mesti menghadapi sekolah baru, kawan-kawan baru, dan tantangan baru.\r\nMungkinkah ia menemukan apa yang hilang selama ini? Dan, apakah Ping siap dengan yang ia\r\ntemukan? Bahwa, hidupnya ternyata tidak sesederhana yang ia duga.', 94050, 'rj.jpg'),
(22, 'Unlimited You', 'Penerbit Kata Depan', 'Wirdha Mansyur', 'Sastra', 'Ability is something that you can create. Ini bukan masalah orang itu beruntung, genius, pintar, dan sebagainya. Ini tentang orang yang paham apa kemampuannya, atau mau mencari tahu kemampuannya, kemudian dia asah, dia kembangkan, dia berproses, dan dia tidak berhenti berbuat.\r\nKalau kita mencari sesuatu berdasarkan kemampuan kita, yang kita dapat ya segitu-gitunya aja, atau malah mentok sana sini. Kalau kita mencari dengan kemampuan Allah? Maka, bisa jadi nggak terbatas. Kemampuan manusia itu ada batasnya. Namun, tidak dengan kemampuan Allah.  \r\nJika kita melihat kemampuan kita, emang juga serbaterbatas. Untuk itu, lihatnya ke Allah aja. Kemampuan Allah. Kemampuan yang super-unlimited. Sehingga, kita pun jadi ketularan unlimited-nya.', 94050, 'uy.jpg'),
(23, 'Sang Pemanah', 'Gramedia', 'Sang Alkemis', 'Sastra', 'Paulo Coelho, pengarang buku bestseller internasional SANG ALKEMIS, menceritakan kisah inspiratif tentang seorang anak yang mencari kebijaksanaan dan pelajaran tentang kehidupan dari Sang Pemanah. Buku ini disertai ilustrasi ilustrasi indah oleh Martin Dima. Gandewa adalah pemanah ulung yang pernah sangat termasyhur, namun dia telah mengundurkan diri dari duna ramai. Suatu hari, seorang anak lelaki datang mencarinya bersama seorang asing. Begitu banyak yang ditanyakan anak ini, dan Gandewa menjawab dengan menggambarkan Jalan Busur serta prinsip-prinsip utama dalam menjalani kehidupan yang bermakna. Dalam cerita yang disampaikan dengan sederhana ini, Paulo Coelho bertutur tentang pokok-pokok penting dalam kehidupan, antara lain kerja keras dan antusiasme, berani mengambil risiko, tidak takut gagal, dan menerima hal-hal tak terduga yang disodorkan oleh nasib.', 119500, 'sp.jpg'),
(24, 'Ranah 3 Warna', 'Gramedia', 'A. Fuadi', 'Sastra', 'Alif baru saja tamat dari Pondok Madani. Dia bahkan sudah bisa bermimpi dalam bahasa Arab dan Inggris. Impiannya? Tinggi betul. Ingin belajar teknologi tinggi di Bandung seperti Habibie, lalu merantau sampai ke Amerika.   Dengan semangat menggelegak dia pulang kampung ke Maninjau dan tak sabar ingin segera kuliah. Namun kawan karibnya, Randai, meragukan Alif mampu lulus UMPTN. Lalu dia sadar, ada satu hal penting yang dia tidak punya. Ijazah SMA. Bagaimana mungkin mengejar semua cita-cita tinggi tanpa ijazah?  Alif baru saja tamat dari Pondok Madani. Dia bahkan sudah bisa bermimpi dalam bahasa Arab dan Inggris. Impiannya? Tinggi betul. Ingin belajar teknologi tinggi di Bandung seperti Habibie, lalu merantau sampai ke Amerika.   Dengan semangat menggelegak dia pulang kampung ke Maninjau dan tak sabar ingin segera kuliah. Namun kawan karibnya, Randai, meragukan Alif mampu lulus UMPTN. Lalu dia sadar, ada satu hal penting yang dia tidak punya. Ijazah SMA. Bagaimana mungkin mengejar semua cita-cita tinggi tanpa ijazah?   Terinspirasi semangat tim dinamit Denmark, dia mendobrak rintangan berat. Baru saja dia tersenyum, badai lain menggempurnya silih berganti tanpa ampun. Alif letih dan mulai bertanya-tanya: “Sampai kapan aku harus teguh bersabar menghadapi semua cobaan hidup ini?” Hampir saja dia menyerah.   Rupanya “mantra” man jadda wajada saja tidak cukup sakti dalam memenangkan hidup. Alif teringat “mantra” kedua yang diajarkan di Pondok Madani: man shabara zhafira. Siapa yang bersabar akan beruntung. Berbekal kedua mantra itu dia songsong badai hidup satu persatu. Bisakah dia memenangkan semua impiannya?   Ke mana nasib membawa Alif? Apa saja 3 ranah berbeda warna itu? Siapakah Raisa? Bagaimana persaingannya dengan Randai? Apa kabar Sahibul Menara? Kenapa sampai muncul Obelix, orang Indian, Michael Jordan, dan Kesatria Berpantun? Apa hadiah Tuhan buat sebuah kesabaran yang kukuh?   Ranah 3 Warna adalah hikayat tentang bagaimana impian tetap wajib dibela habis-habisan walau hidup digelung nestapa tak berkesudahan. Tuhan sungguh bersama orang yang sabar. Alif baru saja tamat dari Pondok Madani. Dia bahkan sudah bisa bermimpi dalam bahasa Arab dan Inggris. Impiannya? Tinggi betul. Ingin belajar teknologi ting  Terinspirasi semangat tim dinamit Denmark, dia mendobrak rintangan berat. Baru saja dia tersenyum, badai lain menggempurnya silih berganti tanpa ampun. Alif letih dan mulai bertanya-tanya: “Sampai kapan aku harus teguh bersabar menghadapi semua cobaan hidup ini?” Hampir saja dia menyerah.   Rupanya “mantra” man jadda wajada saja tidak cukup sakti dalam memenangkan hidup. Alif teringat “mantra” kedua yang diajarkan di Pondok Madani: man shabara zhafira. Siapa yang bersabar akan beruntung. Berbekal kedua mantra itu dia songsong badai hidup satu persatu. Bisakah dia memenangkan semua impiannya?   Ke mana nasib membawa Alif? Apa saja 3 ranah berbeda warna itu? Siapakah Raisa? Bagaimana persaingannya dengan Randai? Apa kabar Sahibul Menara? Kenapa sampai muncul Obelix, orang Indian, Michael Jordan, dan Kesatria Berpantun? Apa hadiah Tuhan buat sebuah kesabaran yang kukuh?   Ranah 3 Warna adalah hikayat tentang bagaimana impian tetap wajib dibela habis-habisan walau hidup digelung nestapa tak berkesudahan. Tuhan sungguh bersama orang yang sabar. Alif baru saja tamat dari Pondok Madani. Dia bahkan sudah bisa bermimpi dalam bahasa Arab dan Inggris. Impiannya? Tinggi betul. Ingin belajar teknologi', 96000, 'r3w.jpg'),
(25, '100 Day Left', 'Alex Media Komputindo', 'Kokone Nata', 'Komik', 'Seorang teman baru bertambah dalam kehidupan Shuto dan Chiho yang tinggal bersama selama 100 hari!! Tidak kalah dengan anak-anak TK yang semangat meskipun musim hujan, para remaja pun harus berjuang untuk belajar!', 36000, '100dl.jpg'),
(26, 'Menulusuri Jejak 25 Nabi', 'Grasindo', 'Ira Irmawati', 'Fiksi', 'Raja Thalut cemas , Dibalik tembok-tembok tinggi Azeka,pasukan Filistin bersiap menyerang kerajaannya.Para Prajurit Filistin tinggi dan besar.Tak sebanding dengan prajurit-prajurit Raja Thalut', 76800, 'menyusuri25nabi.jpg'),
(29, 'Jodoh, Takdir, & Kamu', 'Gramedia', 'Haizofers', 'Romansa', 'Buku Ini Soal Jodoh, Takdir, dan Kamu: Kita Bisa Apa? berangkat dari melihat banyak akun\r\nfanbase Haico dan Azof (Haizof) yang senang mengekspresikan kecintaan mereka pada idola\r\nmereka dengan menciptakan kata-kata indah (quotes) atau puisi.\r\nBuku kumpulan quotes ini mengangkat tema seputar jodoh dan takdir. Sasaran dari buku\r\nini adalah semua orang bukan hanya fans Haizof, terutama mereka yang saat ini sedang galau\r\nsoal jodoh.\r\nSekencang apa pun kamu berlari,\r\nsekuat apa pun kamu mencoba menghapus semuanya,\r\nsebanyak apa pun rintangan yang ada,\r\nkalau Tuhan sudah menakdirkan dia untukmu…\r\nkamu bisa apa?\r\n\r\nBuku ini seakan menjadi bukti bahwa Haizofers adalah fanbase yang “nggak ‘kaleng-kaleng’”\r\ndan senantiasa membagikan hal-hal positif pada sekitar seperti yang selalu ditekankan oleh idola\r\nmereka, yakni “Spread Love” dan terus berkarya.', 88000, 'jodoh.jpg'),
(30, 'Respati', 'MC', 'Ragiel JP', 'Horror', 'Kejadian mengerikan terjadi di Yogyakarta. Para korban ditemukan tewas tergantung dalam posisi terbalik. Tidak ada satu pun yang tahu siapa pelaku semua pembunuhan itu. Namaku Respati. Aku mempunyai kemampuan aneh, yaitu bisa masuk ke dalam mimpi seseorang hanya dengan menyentuh kulit Si Pemimpi. Aku sudah terbiasa dengan kemampuan ini sebelum mengenal Wulan yang ternyata mimpinya tidak bisa kutembus. Dari Wulan-lah aku tahu bahwa aku seorang Penjelajah Mimpi. Dari Wulan pula aku tahu bahwa semua kasus pembunuhan itu berhubungan erat dengan kemampuanku.\r\n\r\nKeunggulan:\r\nFantasi lokal yang mengangkat tema Lucid Dream, ditambah dengan bumbu misteri. \r\nDengan setting Yogyakarta yang detail, pembaca akan diajak untuk memecahkan teka-teki siapa dalang sebenarnya di dalam cerita ini. Dan dengan alur cerita yang runtut dan mengalir, pembaca juga akan menamatkan cerita ini dalam sekali duduk.\r\nSelain itu, novel ini menampilkan informasi mengenai Penjelajah Mimpi yang mudah dipahami. Termasuk bacaan ringan, tapi dengan isi yang berisi. ', 60000, 'respati.jpg'),
(31, 'Empedu Tanah', 'Gramedia', '-', 'Sastra', 'TAMU TAK BERMALU\r\nMeski selembut gerak asap rokok\r\nAtau sekeras palu kuli bangunan menghancurkan tembok\r\nUpaya mengusirnya serupa hasrat mengubah batang kelapa jadi tongkat musa\r\nTamu tak diundang dan tak bermalu ini akan pergi, hanya bila kita tak lagi berdenyut nadi.\r\n2016\r\n', 64000, 'empedu.jpg'),
(32, 'Sepotong Hati Baru', 'Sabakgrip', 'Tere Liye', 'Romansa', 'Kita hanya punya sepotong hati, bukan? Satu-satunya - Tere Liye\r\n.\r\nLantas bagaimana kalau hati itu terluka? Disakiti justru oleh orang yang kita cintai? Aduh, apakah kita bisa mengobatinya? Apakah luka itu bisa pulih, tanpa bekas? Atau jangan-jangan, kita harus menggantinya dengan sepotong hati yang baru?\r\n.\r\nLantas, apakah tetap cinta namanya meski telah kehilangan kepercayaan dan komitmen? Apakah kita bersedia mengorbankan cinta demi kepentingan yang lebih besar, atau tetap dengan ego demi kebahagiaan sendiri? Ada banyak pertanyaan tentang sepotong hati ini.\r\n.\r\nSemoga datanglah pemahaman baik itu. Bahwa semua pengalaman cinta dan perasaan adalah spesial. Sama spesialnya dengan milik kita. Tidak peduli sesederhana apa pun itu, sepanjang dibungkus dengan pemahaman-pemahaman yang baik.\r\nSelamat membaca cerita-cerita Sepotong Hati yang Baru.', 74600, 'sepotong.jpg'),
(33, 'Closed Casket', 'Gramedia', 'Sophia Hannah', 'Fantasi', '“Apa yang hendak kusampaikan ini akan membuatmu kaget…” Dengan ucapan itu, Lady Athelinda Playford––salah satu penulis buku anak-anak yang paling dicintai––membuat kaget pengacara yang dipercaya untuk mengurus surat wasiatnya. Ketika para tamu berdatangan ke pesta di rumah megahnya, Lady Playford memutuskan untuk mencoret kedua anaknya dari surat wasiat dan tidak mewariskan sepeser pun. Harta kekayaannya yang banyak itu diberikan kepada orang lain: orang invalid yang hidupnya tinggal beberapa minggu lagi. Di antara tamu-tamu Lady Playford ada dua orang asing: Hercule Poirot, sang detektif Belgia yang terkenal, dan Inspektur Edward Catchpool dari Scotland Yard. Keduanya tidak tahu kenapa mereka diundang… sampai Poirot mulai bertanya-tanya apakah Lady Playford sedang menunggu terjadinya pembunuhan. Tapi kenapa dia tampaknya begitu ingin me-mancing-mancing si pembunuh? Dan ketika hal itu benar-benar terjadi, walaupun Poirot sudah berusaha keras mencegahnya, kenapa identitas si korban terasa tidak masuk akal?', 79200, 'closed.jpg'),
(34, 'TIK', 'MC', 'SHORESTORY', 'Fantasi', '“What are you most afraid of?”\r\n“Feelings.”\r\n------------------------------\r\n\r\nLarasati Rana membenci dua hal: hubungan berkomitmen dan politik. Namun, perkenalannya dengan seorang reporter surat kabar, Arjuna Simanjuntak, justru menjebloskannya di tengah keduanya. Arjuna ingin mengubah hubungannya dengan Lara menjadi lebih dari ‘one-night stand’ belaka, namun bukan hanya kesulitan meruntuhkan ‘tembok’ tinggi yang dipasang wartawan gaya hidup itu, ia juga harus menghadapi Kevin Wiratama--pengusaha yang berambisi untuk mendapatkan kursi wakil gubernur dengan cara apa pun, serta rupanya terobsesi dengan Lara.\r\n\r\nDi tengah profesi yang menuntut mereka untuk mengedepankan obyektivitas, Lara dan Arjuna berupaya mengurai perasaan mereka terhadap satu sama lain sembari bergelut dengan lika-liku kerja pers dan geliat industri media cetak di era digital.', 71200, 'tik.jpg'),
(35, 'Lewat Tengah Malam', 'MC', '-', 'Horror', 'Kelamnya malam menyimpan rahasia terdalam. Kepingan kisah bertebaran, tertular dari mulut ke mulut saling berkesinambungan. \r\n\r\nKini kisah-kisah itu terangkum dalam sebuah catatan. Kumpulan pengalaman mencekam, kisah nyata yang senantiasa berubah seiring rekaan dari segala penjuru zaman. Mereka terhimpun oleh satu tali kesamaan. Kisah-kisah yang berlangsung kala gelap kian mencekam di waktu hening tak bertuan. \r\n\r\nLewat Tengah Malam.', 54400, 'Lewat.jpg'),
(36, 'Kita Pernah Sling Mencinta', 'Gramedia', 'Felix K.Nesi', 'Satra', 'Siapakah yang diam-diam\r\nmenaruh gemunung di dalam\r\nhatimu?\r\n\r\nSiapakah yang membentangkan\r\ncuriga dari ujung dagu\r\nhingga jendela kamarmu?\r\n\r\nDi negeri kami, orang\r\nbercerita tentang\r\ntanah yang hilang,\r\ntentang bangsa yang tak\r\npunya siapa-siapa\r\nselain ibukota.\r\n\r\n........\r\n\r\nKita Pernah Saling Mencinta adalah buku puisi perdana Felix K. Nesi. Dalam buku ini terangkum jejak kepenyairan Felix selama rentang 2008-2019. Dengan penuh ironi Felix menyuarakan persoalan keluarga, kerontangnya alam, dan peliknya menjadi yang bukan diutamakan.', 56000, 'kita.jpg'),
(37, 'Silly Gilly Daily', 'Gramedia', 'Naela Ali', 'Fantasi', 'Gilly is back at home!\r\n(well, like always)\r\nBut this time it is a lil bit different!\r\nHow is Gilly gonna spend her days at home during pandemic?', 108000, 'gilly.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Niken Maharani', 'niken@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'rani', 'rani@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
