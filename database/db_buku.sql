-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2024 at 06:41 AM
-- Server version: 8.0.37
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` int NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `judul_buku` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kategori` int NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tentang` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `gambar`, `judul_buku`, `id_kategori`, `penerbit`, `tahun_terbit`, `penulis`, `tentang`) VALUES
(1, '6686167eca7eb.jpg', 'Laskar Pelangi', 1, 'Gramedia', 2024, 'Andrea Hirata', 'Ceritanya terjadi di desa Gantung, Belitung Timur. Dimulai ketika sekolah Muhammadiyah terancam akan dibubarkan oleh Depdikbud Sumsel jikalau tidak mencapai siswa baru sejumlah 10 anak. Ketika itu baru 9 anak yang menghadiri upacara pembukaan, akan tetapi tepat ketika Pak Harfan, sang kepala sekolah, hendak berpidato menutup sekolah, Harun dan ibunya datang untuk mendaftarkan diri di sekolah kecil itu.'),
(2, '6686613aded76.jpeg', 'Guns, Germs And Steel ', 2, 'Kepustakaan Populer Gramedia', 2016, 'Jared Diamond', 'Guns, Germs, and Steel: The Fates of Human Societies adalah buku yang ditulis pada tahun 1997 oleh Jared Diamond, profesor geografi dan fisiologi di Universitas California, Los Angeles. Pada tahun 1998, buku ini memperoleh Hadiah Pulitzer untuk kategori Non-Fiksi Umum dan Hadiah Aventis untuk Buku Sains Terbaik.'),
(4, '66874b2e5496c.jpeg', 'Sejarah Dunia Yang Disembunyikan', 4, 'Gramedia', 2024, 'Jonathan Black', 'Banyak orang mengatakan bahwa sejarah ditulis oleh para pemenang. Hal ini sama sekali tak mengejutkan alias wajar belaka. Tetapi, bagaimana jika sejarah atau apa yang kita ketahui sebagai sejarah ditulis oleh orang yang salah? Bagaimana jika semua yang telah kita ketahui hanyalah bagian dari cerita yang salah tersebut?rnrnDalam buku kontroversial yang sangat tersohor ini, Jonathan Black mengupas secara tajam penelusurannya yang brilian tentang misteri sejarah dunia. Dari mitologi Yunani dan Mesir kuno sampai cerita rakyat Yahudi, dari kultus Kristiani sampai Freemason, dari Karel Agung sampai Don Quixote, dari George Washington sampai Hitler, dan dari pewahyuan Muhammad hingga legenda Seribu Satu Malam, Jonathan menunjukkan bahwa pengetahuan sejarah yang terlanjur mapan perlu dipikirkan kembali secara revolusioner. Dengan pengetahuan alternatif ihwal sejarah dunia selama lebih dari 3.000 tahun, dia mengungkap banyak rahasia besar yang selama ini disembunyikan.rnrnBuku ini akan membuat Anda mempertanyakan kembali segala sesuatu yang telah diajarkan kepada Anda. Dan, berbagai pengetahuan baru yang diungkapkan sang penulis benar-benar akan membuka dan mencerahkan wawasan Anda.'),
(5, '66874b7e4646e.jpg', 'Mindset', 6, 'Gramedia', 2019, 'Carol S. Dweck, Ph.d.', 'Paparan tentang kesuksesan dalam buku ini sangat mendasar dan langka. Lazimnya, buku-buku tentang kesuksesan lebih menawarkan sisi-sisi praktis. Namun, buku ini justru mengajak Anda menggarap inti masalah kesuksesan: pikiran. Tak hanya itu, buku ini mengontraskan dengan apik tokoh-tokoh dunia—di bidang musik, sastra, sains, olahraga, dan bisnis—yang berpola pikir tetap (ﬁxed mindset) dan berpola pikir tumbuh (growth mindset). Ternyata, tokoh yang berpola pikir tumbuh lebih mampu mempertahankan kesuksesan dan kegembiraan hidup. Hal ini dikarenakan mereka lebih menekankan proses belajar dan peran ikhtiar daripada mengandalkan bakat dan kecerdasan.\r\n\r\nBagi Anda penikmat buku motivasi, teramat sayang bila Anda tak melahap isi buku ini. Bagi Anda para pemimpin, eksekutif, guru, orangtua, atau pelatih olahraga, buku ini sangat membantu dalam mengubah para pembelajar “bermasalah” menjadi insan-insan sukses dan bahagia. Sebagai pribadi pun, Anda tak bakal kecewa dengan buku hasil penelitian 20 tahun lebih dari ahli kenamaan di bidang psikologi kepribadian ini. Banyak inspirasi yang niscaya membuat Anda senantiasa optimistis, gembira, dan terampil membangkitkan kemampuan-kemampuan dahsyat dalam diri Anda.'),
(6, '66874bce56a59.jpeg', 'How To Win Friends And Influece Poeple', 6, 'Gramedia Pustaka Utama', 2019, 'Dale Carnegie', 'How To Win Friends and Influence People merupakan judul dari sebuah buku yang ditulis oleh Dale Carnegie. Buku ini akan menghadirkan isi tentang bagaimana cara untuk dapat meraih kesuksesan dalam berbisnis maupun kehidupan dengan cara meningkatkan kualitas diri. Buku ini memiliki pembahasan yang menarik. Pembahasan yang terbagi kedalam beberapa bab ini mampu dijelaskan dengan sangat detail dan rinci oleh buku ini. Selain itu, buku ini juga menggunakan gaya bahasa yang ringin, sehingga pembaca dapat lebih mudah untuk memahami pembahasan yang ada di buku ini. Selain sebagai media untuk meningkatkan kualitas diri, buku ini juga akan membantu Anda untuk meraih kesuksesan di dalam kehidupan maupun berbisnis. Diharapkan buku ini dapat memberikan manfaat dan ilmu wawasan yang lebih luas bagi setiap pembaca.'),
(7, '66874c4cd590d.jpg', 'Thinking, Fast And Slow', 6, 'Gramedia Pustaka Utama', 2019, 'Daniel Kahneman', 'Daniel Kahneman adalah salah satu pemikir paling penting abad ini. Gagasannya berdampak mendalam dan luas di berbagai bidang termasuk ekonomi, pengobatan, dan politik. Dalam buku yang sangat dinanti-nantikan ini, Kahneman menjelaskan dua sistem yang mendorong cara kita berpikir. Sistem 1 bersifat cepat, intuitif, dan emosional; Sistem 2 lebih pelan, lebih bertujuan, dan lebih logis.\r\n\r\nBuku ini menyajikan pemahaman penulis mengenai pertimbangan dan pengambilan keputusan, yang telah dibentuk oleh penemuan-penemuan di bidang psikologi selama puluhan tahun terakhir.\r\n\r\nNamun, gagasan-gagasan intinya berasal dari satu hari mujur pada tahun 1969 ketika penulis meminta seorang kolega menjadi pembicara utama di kelas yang penulis ampu tairu Fakultas Psikologi, Universitas Ibrani Yerusalem. Dengan membaca buku ini pembaca akan mendapat pengetahuan mengenai seberapa banyak yang pembaca ketahui dulu, dan seberapa banyak hal yang sudah pembaca pelajari selama bertahun-tahun hingga kini.'),
(8, '66874cd30aa35.jpg', 'Logika', 2, 'Gramedia', 2024, 'Drs. H. Mundiri', 'Buku ini membicarakan mengenai logika. Materi pembahasan dibuka dengan pemaparan tentang arti dan sejarah singkat logika. Kemudian dilanjutkan dengan pembahasan perihal kata atau term dan definisi. Disambung lagi dengan pembahasan ihwal klasifikasi, proposisi dan oposisi. Setelah itu dipaparkan perihal silogisme, generalisasi dan analogi. Tak lupa di bagian-bagian akhir buku ini disajikan pula pembahasan terkait hubungan kausalitas, penjelasan dan kekeliruan (kesesatan) berpikir.'),
(9, '66874d553f44a.jpg', 'Madilog', 2, 'Diva Press', 2022, 'Tan Malaka', 'Pada perang Jepang-Tiongkok, tepatnya di Shanghai penghabisan tahun 1931, tiga hari lamanya saya terkepung di belakang jalan bernama North Sichuan Road, tempat peperangan pertama kali meletus. Dari North Sichuan Road tadi, Jepang menembak ke arah Po Shan Road dan tentara Tiongkok dari arah sebaliknya. Di antaranya, persisnya di kampung Wang Pan Cho, saya dengan pustaka saya terpaku. Sesudah dua atau tiga hari berselang, tentara Jepang baru memberi izin kepada kampung tempat saya tinggal untuk berpindah rumah, pergi ke tempat yang lebih aman dalam tempo lima menit saja. Saya turut pindah tergopoh-gopoh. Tentulah sehabis perang, yakni sesudah sebulan lamanya, maka sehelai kertas pun tiada tersisa. Begitulah rapinya “Laliong” alias tukang copet bekerja. Tapi hal ini tidak membuat saya putus asa. Selama toko buku masih ada, selama itu pula pustaka bisa dibentuk kembali. Kalau perlu dan memang perlu, pakaian dan makanan pun rela dikurangi!'),
(10, '66874ddd91ce8.jpg', 'Atomic Habits: Perubahan Kecil yang memberikan hasil luar biasa', 6, 'Gramedia Pustaka Utama', 2019, 'James Clear', 'Orang mengira ketika Anda ingin mengubah hidup, Anda perlu memikirkan hal-hal besar. Namun pakar kebiasaan terkenal kelas dunia James Clear telah menemukan sebuah cara\r\nlain. Ia tahu bahwa perubahan nyata berasal dari efek gabungan ratusan keputusan kecil—dari mengerjakan dua push-up sehari, bangun lima menit lebih awal, sampai menahan sebentar hasrat untuk menelepon.\r\n\r\nIa menyebut semua tadi atomic habits.\r\n\r\nDalam buku terobosan ini, Clear pada hakikatnya mengungkapkan bagaimana perubahan-perubahan sangat remeh ini dapat tumbuh menjadi hasil-hasil yang sangat mengubah\r\nhidup. Ia menyingkap beberapa trik sederhana dalam hidup kita (seni Menumpuk Kebiasaan yang terlupakan, kekuatan tak terduga Aturan Dua Menit, atau trik untuk masuk ke dalam Zona Goldilocks), dan menggali ke dalam teori psikologi dan neurosains paling baru untuk menerangkan mengapa semua itu penting. Dalam rangka itu, ia menceritakan kisah-kisah inspiratif para peraih medali emas Olimpiade, para CEO terkemuka, dan ilmuwan-ilmuwan istimewa yang telah menggunakan sains tentang kebiasaan-kebiasaan kecil untuk tetap produktif, tetap termotivasi, dan bahagia.\r\n\r\nPerubahan-perubahan kecil ini akan mendatangkan pengaruh revolusioner pada karier Anda, hubungan pribadi Anda, dan hidup Anda.'),
(11, '66874e488881a.jpg', 'Retorika', 2, 'Gramedia', 2024, 'Aristoteles', 'Teori retorika Aristoteles berpusat pada pemikiran mengenai retorika yang sering disebutnya sebagai alat persuasi (bujukan). Pada intinya, teori retorika milik Aristoteles menyebutkan efektivitas persuasi ditentukan oleh kualitas komunikator dalam menyampaikan bukti logos (logika), pathos (emosi), dan ethos (etika atau kredibilitas).\r\nDikutip dari jurnal Sejarah dan Perkembangan Retorika (2005) karya Rajiyem, kata retorika berasal dari bahasa Inggris “rhetoric” dan bersumber dari kata dalam bahasa Latin “rhetorica.” Artinya ilmu berbicara. Retorika diartikan sebagai seni berbicara baik yang digunakan dalam proses komunikasi antarmanusia. Disebut seni berbicara baik karena meliputi kemampuan berbicara dan berpidato singkat, jelas, padat, serta mengesankan.'),
(12, '66874eba844ac.jpg', 'Laut Bercerita', 1, 'Kepustakaan Populer Gramedia', 2017, 'Leila S. Chudori', 'Laut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.'),
(13, '66874f89e8cfa.webp', 'The Mountain Is You', 6, 'Renebook', 2023, 'Brianna Wiest', 'Buku The Mountain Is You karya Brianna Wiest membahas tentang sabotase diri, yaitu perilaku ketika seseorang secara sadar atau tidak sadar melakukan hal-hal yang menghambatnya untuk mencapai tujuan. Brianna Wiest menjelaskan bahwa sabotase diri adalah masalah yang umum dialami oleh banyak orang, dan dapat disebabkan oleh berbagai faktor, seperti ketakutan, ketidakpercayaan diri, dan trauma masa lalu.\r\nBuku ini terdiri atas empat bagian. Bagian pertama membahas tentang apa itu sabotase diri dan mengapa kita melakukannya. Bagian kedua membahas tentang berbagai bentuk sabotase diri. Bagian ketiga membahas tentang bagaimana cara mengatasi sabotase diri. Bagian keempat membahas tentang bagaimana cara membangun diri yang tangguh.\r\nBuku The Mountain Is You adalah buku yang bermanfaat untuk siapa saja yang ingin memahami dan mengatasi sabotase diri. Buku ini ditulis dengan gaya yang mudah dipahami dan dengan contoh dalam kehidupan sehari-hari. Buku ini juga memberikan motivasi untuk membangun diri yang tangguh, sehingga Anda dapat mencapai tujuan Anda.'),
(14, '668750045caa3.jpg', 'Komi Sulit Berkomunikasi 18', 1, 'Elex Media Komputindo', 2023, 'Tomohito Hoda', 'Festival budaya telah usai, sehingga semangat Komi dan kawan-kawan kembali ke temperatur normal. Tapi ajaibnya, keseharian biasa mereka tampak sedikit lebih berwarna. Ada juga kisah lain di balik festival budaya serta kisah terbentuknya band Nakanaka. Juga kisah misteri teka-teki di rumah Otori, serta kisah Komi dan Tadano yang terkunci berdua di gudang gimnasium. Kegalauan seputar teman, orangtua, dan masalah cinta.... Semuanya sama-sama maju selangkah. Rumit, tapi hangat. Sulit, tapi seru. Komunikasi terus bergulir seiring berjalannya musim. Inilah jilid 18 dari kisah sang gadis cantik yang sulit berkomunikasi, yang perasaan “ingin menyampaikan”-nya kian menggerakkan sesuatu.\r\n\r\nDi antara jenis buku lainnya, komik memang disukai oleh semua kalangan mulai dari anak kecil hingga orang dewasa. Alasan komik lebih disukai oleh banyak orang karena disajikan dengan penuh dengan gambar dan cerita yang mengasyikan sehingga mampu menghilangkan rasa bosan di kala waktu senggang.\r\n\r\n'),
(15, '6687524a1b596.jpg', 'Win Your Inner Battle', 6, 'Gramedia Pustaka Utama', 2024, 'Darius Foroux', 'Apakah Anda ingin mengubah karier atau memulai bisnis? Tak mau kehilangan waktu istirahat karena mengejar tenggat? Ingin mengakhiri suatu hubungan, atau sekadar menjalani kehidupan yang memuaskan? Setiap orang punya tujuan dan ambisi dalam hidup, namun seringkali kita tidak mengejarnya karena rasa takut atau kurang percaya diri.\r\n\r\nDalam Win Your Inner Battles, Penulis menunjukkan cara efektif untuk:\r\n- menaklukkan rasa takut,\r\n- meningkatkan rasa percaya diri,\r\n- menghalau rasa khawatir, dan\r\n- menjalani kehidupan sesuai keinginan kita.\r\n\r\nDitulis berdasarkan pengalaman pribadi, penulis menegaskan bahwa seburuk apa pun keadaan kita, selalu ada jalan keluar. Bersiaplah untuk menjalani kehidupan sesuai keinginan Anda!'),
(16, '668752ad5ca11.jpg', 'Mein Kampf (Perjuangan Saya)', 4, 'Anak Hebat Indonesia', 2024, 'Adolf Hitler', 'Mein Kampf (Perjuangan Saya) adalah otobiografi dan risalah politik diktator Jerman, Adolf Hitler. Diterbitkan pada tahun 1925, buku ini sebagian besar ditulis selama Hitler dipenjara setelah upaya kudeta Putsch di Munich yang gagal pada tahun 1923. Buku ini sangat populer selama Reich Ketiga, periode dimana Hitler memerintah Jerman. Akan tetapi, setelah kematiannya tahun 1945, negara bagian Bavaria melarang buku tersebut dan tidak diterbitkan lagi di Jerman hingga 2016.\r\n\r\nHitler menjabarkan rencana untuk mencapai negara Jerman yang murni dan memperluas kekuasaannya. Dia mengkritik praktik naturalisasi Jerman saat ini, di mana kewarganegaraan Jerman diberikan kepada imigran dari berbagai ras berdasarkan tempat tinggal di Jerman, bukan berdasarkan etnis.\r\n\r\nMein Kampf menawarkan pandangan sekilas ke dalam pikiran salah satu diktator paling terkenal di dunia dan bagaimana ia membentuk ide-ide yang nantinya akan menjadi dasar Nazi Jerman. Tema-tema utama yang berulang dalam buku ini meliputi rasisme, anti-Semitisme, militerisme, dan nasionalisme Jerman. Ini adalah filosofi inti yang mendasari negara fasis Hitler dan menyebabkan pembantaian massal terhadap jutaan Yahudi.'),
(17, '6687533c42566.jpg', 'Das Kapital', 7, 'Dibtz Verlag', 1957, 'Karl Marx', '&quot;Das Kapital&quot; adalah kritik kapitalisme sebanyak tiga jilid yang lengkap dan komprehensif. Dalam karya akademisnya, buku ini memaparkan teori-teori Marx tentang produksi komoditas, pasar tenaga kerja, pembagian kerja sosial, dan pemahaman dasar tentang tingkat pengembalian bagi pemilik modal.'),
(18, '6687552d91dbc.jpg', 'Bumi Manusia', 4, 'Gramedia', 2024, 'Pramoedya Ananta Toer', 'Roman Tetralogi Buru mengambil latar belakang dan cikal bakal nation Indonesia di awal abad ke-20. Dengan membacanya waktu kita dibalikkan sedemikian rupa dan hidup di era membibitnya pergerakan nasional mula-mula, juga pertautan rasa, kegamangan jiwa, percintaan, dan pertarungan kekuatan anonim para srikandi yang mengawal penyemaian bangunan nasional yang kemudian kelak melahirkan Indonesia modern.\r\n\r\nRoman bagian pertama; Bumi Manusia, sebagai periode penyemaian dan kegelisahan dimana Minke sebagai aktor sekaligus kreator adalah manusia berdarah priyayi yang semampu mungkin keluar dari kepompong kejawaannya menuju manusia yang bebas dan merdeka, di sudut lain membelah jiwa ke-Eropa-an yang menjadi simbol dan kiblat dari ketinggian pengetahuan dan peradaban.\r\n\r\n\r\nPram menggambarkan sebuah adegan antara Minke dengan ayahnya yang sangat sentimentil: Aku mengangkat sembah sebagaimana biasa aku lihat dilakukan punggawa terhadap kakekku dan nenekku dan orangtuaku, waktu lebaran. Dan yang sekarang tak juga diturunkan sebelum Bupati itu duduk enak di tempatnya.\r\n\r\nDalam mengangkat sembah serasa hilang seluruh ilmu dan pengetahuan yang kupelajari tahun demi tahun belakangan ini. Hilang indahnya dunia sebagaimana dijanjikan oleh kemajuan ilmu. Sembah pengagungan pada leluhur dan pembesar melalui perendahan dan penghinaan diri! Sampai sedatar tanah kalau mungkin! Uh, anak-cucuku tak kurelakan menjalani kehinaan ini. &quot;Kita kalah, Ma,&quot; bisikku. &quot;Kita telah melawan, Nak, Nyo, sebaik-baiknya, sehormat-hormatnya.&quot;'),
(19, '668756ac32ddb.jpg', 'Gadis Kretek (2019)', 1, 'Gramedia Pustaka Utama', 2019, 'Ratih Kumala', 'Pak Raja sekarat. Dalam menanti ajal, ia memanggil satu nama perempuan yang bukan istrinya; Jeng Yah. Tiga anaknya, pewaris Kretek Djagad Raja, dimakan gundah. Sang ibu pun terbakar cemburu terlebih karena permintaan terakhir suaminya ingin bertemu Jeng Yah. Maka berpacu dengan malaikat maut, Lebas, Karim, dan Tegar, pergi ke pelosok Jawa untuk mencari Jeng Yah, sebelum ajal menjemput sang Ayah.\r\n\r\nPerjalanan itu bagai napak tilas bisnis dan rahasia keluarga. Lebas, Karim, dan Tegar bertemu dengan pelinting tua dan menguak asal-usul Kretek Djagad Raja hingga menjadi kretek nomor 1 di Indonesia. Lebih dari itu, ketiganya juga mengetahui kisah cinta ayah mereka dengar; Jeng Yah, yang ternyata adalah pemilik Kretek Gadis, kretek lokal Kota M yang terkenal pada zamannya.\r\n\r\nApakah Lebas, Karim, dan Tegar akhirnya berhasil menemukan Jeng Yah?'),
(20, '6687572497f0b.jpg', 'The Leader In You', 6, 'Mic Publishing', 2013, 'Dale Carnegie', '“Tak ada pembahasan dalam buku ini yang begitu rumit, penuh teka-teki, atau sukar dipahami. Tapi buku ini bisa menjadikan Anda sebagai pemimpin di dunia yang rumit, sukar dipahami, dan terkadang penuh teka-teki. Kepemimpinan adalah kunci kesuksesan.” –Burt Munning, Pimpinan dan CEO, J. Walker Thompson.\r\n\r\nSelama hampir satu abad, kata dan karya Dale Carnegie &amp; Associates telah diterjemahkan menjadi kesuksesan yang telah teruji. Pernyataan ini sudah dibuktikan oleh jutaan orang sukses dan angka penjualan buku, termasuk buku laris internasional How to Win Friends and Influence People yang terjual lebih dari tiga puluh juta eksemplar.\r\n\r\nDalam The Leader in You, Penulis pendamping, Stuart R. Levine dan Michael A. menerapkan prinsip berhubungan dengan sesama untuk menunjukkan bagaimana setiap orang, apa pun pekerjaannya, bisa mengendalikan kreativitas dan antusiasme untuk bekerja lebih produktif.\r\n\r\nDalam The Leader in You, Dale Carnegie menerapkan prinsip berhubungan dengan sesama untuk menunjukkan bagaimana setiap orang, apa pun pekerjaannya, bisa mengendalikan kreativitas dan antusiasme untuk bekerja lebih produktif.\r\n'),
(21, '66875786380e9.jpg', 'The Art of War: Menelusuri Strategi &amp; Taktik Perang ala Sun Zi', 7, 'Gramedia Pustaka Utama', 2016, 'Sun Zi', 'The Art of War-Sun Zi adalah buku perang pertama di dunia. Buku yang terdiri atas 5.900 huruf klasik Tiongkok ini disajikan kembali oleh Andri Wang dengan penjelasan yang akan memudahkan pembaca dalam memahaminya.\r\n\r\nTidak hanya dibaca oleh kalangan angkatan bersenjata, buku ini juga menjadi pedoman bagi para pelaku bisnis dalam menjawab persaingan masa kini yang begitu ketat. Strategi dan taktik perang yang relevan untuk persaingan sepanjang masa ini akan membantu kita dalam memenangkan segala kompetisi.'),
(22, '668758958944a.jpg', 'Sejarah Indonesia Modern 1200 - 2008', 4, 'Serambi Ilmu Semesta', 2016, 'M.C. Ricklefs', 'Buku ini memberikan gambaran menyeluruh tentang sejarah Indonesia dari masa prasejarah hingga era modern, mencakup perubahan politik, sosial, dan ekonomi yang signifikan.'),
(23, '6687593e42fe3.jpg', 'Bung Karno: Penyambung Lidah Rakyat', 5, 'Yayasan Bung Karno', 2018, 'Cindy Adams', 'Buku ini merupakan otobiografi dan pemikiran serta gagasan dari Bng Karno mengenai kehidupan berbangsa dan bernegara di Indonesia. Buku dengan judul asli: Sukarno : an autobiography as told to Cindy Adams, meskipun bukan biografi resmi dari Bung Karno tetapi merupakan karya yang paling lengkap mengenai kehidupan, cita-cita politik, perjuangan, harapan-harapan serta latar belakang langkah-langkah yang diambil oleh bapak Bangsa tentang bangsa dan negara Republik Indonesia.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kategori`) VALUES
(8, 'Agama'),
(5, 'Biografi'),
(1, 'Fiksi'),
(2, 'Ilmiah'),
(7, 'Non Fiksi'),
(6, 'Pengembangan Diri'),
(4, 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'naufal', '$2y$10$cjIqOemp5J4AxuYGlEje5ORcPJ5/jSpxJwq2pplDQh0fOCYBf1XJ6'),
(2, 'budi', '$2y$10$.fmtURtm5BqAkNOljOVmiuW9i.kSSmiToe6zaHRo9KvW3FrMr3KHi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
