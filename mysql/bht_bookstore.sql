-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2022 lúc 04:13 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bht_bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_types`
--

CREATE TABLE `account_types` (
  `AccountTypeID` int(11) NOT NULL,
  `AccountTypeName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account_types`
--

INSERT INTO `account_types` (`AccountTypeID`, `AccountTypeName`) VALUES
(1, 'Quản trị viên'),
(2, 'Nhân viên'),
(3, 'Thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `AuthorID` int(11) NOT NULL,
  `AuthorName` varchar(64) DEFAULT NULL,
  `Note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`AuthorID`, `AuthorName`, `Note`) VALUES
(1, 'Aoyama Gosho', 'Tác giả Nhật Bản'),
(2, 'Nguyễn Nhật Ánh', 'Tác giả Việt Nam'),
(3, 'Author Conan Doyle', 'Tác giả Anh'),
(4, 'Shinkai Makoto', 'Tác giả Nhật'),
(5, 'Tite Kubo', 'Tác giả Nhật Bản'),
(6, 'Tô Hoài', 'Tác giả Việt Nam'),
(7, 'Eiichiro Oda', 'Tác giả Nhật Bản'),
(8, 'ONE', 'Tác giả Nhật Bản'),
(9, 'Murata', 'Tác giả Nhật Bản'),
(10, 'Gege Akutami', 'Tác giả Nhật Bản'),
(11, 'Obata', 'Tác giả Nhật Bản'),
(12, 'Masashi Kisimoto', 'Tác giả Nhật Bản'),
(13, 'Fujiko', 'Tác giả Nhật Bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(13) NOT NULL,
  `BookTitle` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `PublishYear` int(11) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `Size` varchar(11) DEFAULT NULL,
  `PageNumber` int(11) DEFAULT NULL,
  `Thumbnail` varchar(255) DEFAULT NULL,
  `LanguageID` varchar(8) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `QuantitySold` int(11) DEFAULT NULL,
  `InventoryNumber` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `PublishID` int(11) DEFAULT NULL,
  `UpdatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`ISBN`, `BookTitle`, `Description`, `PublishYear`, `Weight`, `Size`, `PageNumber`, `Thumbnail`, `LanguageID`, `Price`, `QuantitySold`, `InventoryNumber`, `CategoryID`, `PublishID`, `UpdatedAt`) VALUES
('9784041046593', 'Your Name', 'Truyện ngắn', 2016, 0, '130 x 176', 288, '/assets/img/books/your-name.jpg', 'vi', 60000, 100, 100, 6, 3, '2022-04-29 09:10:55'),
('9784088802206', 'Naruto tập 72', 'Truyện ngắn', 2021, 0, '117 x 176', 288, '/assets/img/books/naruto-vol-72.jpg', 'vi', 22000, 100, 100, 6, 3, '2022-04-29 09:10:55'),
('9786042212811', 'One Punch Man Tập 1', 'Truyện ngắn', 2018, 0, '117 x 176', 184, '/assets/img/books/opm-1.jpg', 'vi', 18000, 100, 100, 6, 1, '2022-04-29 09:10:55'),
('9786042212819', 'One Punch Man Tập 9', 'Truyện ngắn', 2018, 0, '117 x 176', 184, '/assets/img/books/opm-9.jpg', 'vi', 18000, 100, 100, 6, 1, '2022-04-29 09:10:55'),
('9786042212831', 'Death Note Tập 1', 'Truyện ngắn', 2020, 0, '117 x 176', 184, '/assets/img/books/death-note-1.jpg', 'vi', 35000, 100, 100, 6, 1, '2022-04-29 09:10:55'),
('9786042212840', 'Chú Thuật Hồi Chiến Tập 0', 'Truyện ngắn', 2021, 0, '117 x 176', 184, '/assets/img/books/chut-thuat-hoi-chien-0.jpg', 'vi', 30000, 100, 100, 6, 1, '2022-04-29 09:10:55'),
('9786042212842', 'Chú Thuật Hồi Chiến Tập 2', 'Truyện ngắn', 2021, 0, '117 x 176', 184, '/assets/img/books/chu-thuat-hoi-chien-2.jpg', 'vi', 30000, 100, 100, 6, 1, '2022-04-29 09:10:55'),
('9786042212847', 'Doraemon dài - Tập 14: Nobita và ba chàng hiệp sĩ mộng mơ', 'Truyện dài', 2021, 0, '130 x 190', 189, '/assets/img/books/doraemon-vol-14.jpg', 'vi', 18000, 100, 100, 6, 1, '2022-04-29 09:10:55'),
('9786042234252', 'Thám Tử Lừng Danh Conan - Tập 99', 'Truyện ngắn', 2022, 200, '176 x 113', 184, '/assets/img/books/conan-tap-99.jpg', 'vi', 20000, 100, 100, 6, 1, '2022-04-29 09:10:55'),
('9786042268127', 'Chú Thuật Hồi Chiến Tập 1', 'Truyện ngắn', 2022, 0, '117 x 176', 184, '/assets/img/books/chu-thuat-hoi-chien-tap-1.jpg', 'vi', 30000, 100, 100, 6, 1, '2022-04-29 09:10:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `ISBN` varchar(13) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Amount` int(11) DEFAULT 1,
  `UpdatedAt` datetime(3) DEFAULT current_timestamp(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Chính trị – Pháp luật'),
(2, 'Khoa học công nghệ – Kinh tế'),
(3, 'Văn học nghệ thuật'),
(4, 'Văn hóa xã hội – Lịch sử'),
(5, 'Giáo trình'),
(6, 'Truyện, tiểu thuyết'),
(7, 'Tâm lý, tâm linh, tôn giáo'),
(8, 'Sách thiếu nhi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `composers`
--

CREATE TABLE `composers` (
  `ISBN` varchar(13) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `Note` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `composers`
--

INSERT INTO `composers` (`ISBN`, `AuthorID`, `Note`) VALUES
('9784041046593', 4, 'Tác giả chính'),
('9784088802206', 12, 'Tác giả chính'),
('9786042212811', 8, 'Tác giả chính'),
('9786042212811', 9, 'Tác giả phụ'),
('9786042212819', 8, 'Tác giả chính'),
('9786042212819', 9, 'Tác giả phụ'),
('9786042212831', 7, 'Tác giả chính'),
('9786042212840', 10, 'Tác giả chính'),
('9786042212842', 10, 'Tác giả chính'),
('9786042212847', 13, 'Tác giả chính'),
('9786042234252', 1, 'Tác giả chính'),
('9786042268127', 10, 'Tác giả chính'),
('9786042268127', 11, 'Tác giả chính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `ISBN` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `LanguageID` varchar(8) NOT NULL,
  `LanguageName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `languages`
--

INSERT INTO `languages` (`LanguageID`, `LanguageName`) VALUES
('aa', 'Tiếng Afar'),
('ab', 'Tiếng Abkhazia'),
('ace', 'Tiếng Achinese'),
('ach', 'Tiếng Acoli'),
('ada', 'Tiếng Adangme'),
('ady', 'Tiếng Adyghe'),
('ae', 'Tiếng Avestan'),
('aeb', 'Tunisian Arabic'),
('af', 'Tiếng Nam Phi'),
('afh', 'Tiếng Afrihili'),
('agq', 'Tiếng Aghem'),
('ain', 'Tiếng Ainu'),
('ak', 'Tiếng Akan'),
('akk', 'Tiếng Akkadia'),
('akz', 'Alabama'),
('ale', 'Tiếng Aleut'),
('aln', 'Gheg Albanian'),
('alt', 'Tiếng Altai Miền Nam'),
('am', 'Tiếng Amharic'),
('an', 'Tiếng Aragon'),
('ang', 'Tiếng Anh cổ'),
('anp', 'Tiếng Angika'),
('ar', 'Tiếng Ả Rập'),
('arc', 'Tiếng Aramaic'),
('arn', 'Tiếng Araucanian'),
('aro', 'Araona'),
('arp', 'Tiếng Arapaho'),
('arq', 'Algerian Arabic'),
('arw', 'Tiếng Arawak'),
('ary', 'Moroccan Arabic'),
('arz', 'Egyptian Arabic'),
('ar_001', 'Tiếng Ả Rập Hiện đại'),
('as', 'Tiếng Assam'),
('asa', 'Tiếng Asu'),
('ase', 'American Sign Language'),
('ast', 'Tiếng Asturias'),
('av', 'Tiếng Avaric'),
('avk', 'Kotava'),
('awa', 'Tiếng Awadhi'),
('ay', 'Tiếng Aymara'),
('az', 'Tiếng Azerbaijan'),
('azb', 'South Azerbaijani'),
('ba', 'Tiếng Bashkir'),
('bal', 'Tiếng Baluchi'),
('ban', 'Tiếng Bali'),
('bar', 'Bavarian'),
('bas', 'Tiếng Basaa'),
('bax', 'Tiếng Bamun'),
('bbc', 'Batak Toba'),
('bbj', 'Tiếng Ghomala'),
('be', 'Tiếng Belarus'),
('bej', 'Tiếng Beja'),
('bem', 'Tiếng Bemba'),
('bew', 'Betawi'),
('bez', 'Tiếng Bena'),
('bfd', 'Tiếng Bafut'),
('bfq', 'Badaga'),
('bg', 'Tiếng Bulgaria'),
('bho', 'Tiếng Bhojpuri'),
('bi', 'Tiếng Bislama'),
('bik', 'Tiếng Bikol'),
('bin', 'Tiếng Bini'),
('bjn', 'Banjar'),
('bkm', 'Tiếng Kom'),
('bla', 'Tiếng Siksika'),
('bm', 'Tiếng Bambara'),
('bn', 'Tiếng Bengali'),
('bo', 'Tiếng Tây Tạng'),
('bpy', 'Bishnupriya'),
('bqi', 'Bakhtiari'),
('br', 'Tiếng Breton'),
('bra', 'Tiếng Braj'),
('brh', 'Brahui'),
('brx', 'Tiếng Bodo'),
('bs', 'Tiếng Nam Tư'),
('bss', 'Tiếng Akoose'),
('bua', 'Tiếng Buriat'),
('bug', 'Tiếng Bugin'),
('bum', 'Tiếng Bulu'),
('byn', 'Tiếng Blin'),
('byv', 'Tiếng Medumba'),
('ca', 'Tiếng Catalan'),
('cad', 'Tiếng Caddo'),
('car', 'Tiếng Carib'),
('cay', 'Tiếng Cayuga'),
('cch', 'Tiếng Atsam'),
('ce', 'Tiếng Chechen'),
('ceb', 'Tiếng Cebuano'),
('cgg', 'Tiếng Chiga'),
('ch', 'Tiếng Chamorro'),
('chb', 'Tiếng Chibcha'),
('chg', 'Tiếng Chagatai'),
('chk', 'Tiếng Chuuk'),
('chm', 'Tiếng Mari'),
('chn', 'Biệt ngữ Chinook'),
('cho', 'Tiếng Choctaw'),
('chp', 'Tiếng Chipewyan'),
('chr', 'Tiếng Cherokee'),
('chy', 'Tiếng Cheyenne'),
('ckb', 'Tiếng Kurd Sorani'),
('co', 'Tiếng Corsica'),
('cop', 'Tiếng Coptic'),
('cps', 'Capiznon'),
('cr', 'Tiếng Cree'),
('crh', 'Tiếng Thổ Nhĩ Kỳ Crimean'),
('cs', 'Tiếng Séc'),
('csb', 'Tiếng Kashubia'),
('cu', 'Tiếng Slavơ Nhà thờ'),
('cv', 'Tiếng Chuvash'),
('cy', 'Tiếng Wales'),
('da', 'Tiếng Đan Mạch'),
('dak', 'Tiếng Dakota'),
('dar', 'Tiếng Dargwa'),
('dav', 'Tiếng Taita'),
('de', 'Tiếng Đức'),
('del', 'Tiếng Delaware'),
('den', 'Tiếng Slave'),
('de_AT', 'Austrian German'),
('de_CH', 'Tiếng Thượng Giéc-man (Thụy Sĩ)'),
('dgr', 'Tiếng Dogrib'),
('din', 'Tiếng Dinka'),
('dje', 'Tiếng Zarma'),
('doi', 'Tiếng Dogri'),
('dsb', 'Tiếng Hạ Sorbia'),
('dtp', 'Central Dusun'),
('dua', 'Tiếng Duala'),
('dum', 'Tiếng Hà Lan Trung cổ'),
('dv', 'Tiếng Divehi'),
('dyo', 'Tiếng Jola-Fonyi'),
('dyu', 'Tiếng Dyula'),
('dz', 'Tiếng Dzongkha'),
('dzg', 'Tiếng Dazaga'),
('ebu', 'Tiếng Embu'),
('ee', 'Tiếng Ewe'),
('efi', 'Tiếng Efik'),
('egl', 'Emilian'),
('egy', 'Tiếng Ai Cập cổ'),
('eka', 'Tiếng Ekajuk'),
('el', 'Tiếng Hy Lạp'),
('elx', 'Tiếng Elamite'),
('en', 'Tiếng Anh'),
('enm', 'Tiếng Anh Trung cổ'),
('en_AU', 'Australian English'),
('en_CA', 'Canadian English'),
('en_GB', 'Tiếng Anh (Anh)'),
('en_US', 'Tiếng Anh (Mỹ)'),
('eo', 'Tiếng Quốc Tế Ngữ'),
('es', 'Tiếng Tây Ban Nha'),
('esu', 'Central Yupik'),
('es_419', 'Tiếng Tây Ban Nha (Mỹ La tinh)'),
('es_ES', 'European Spanish'),
('es_MX', 'Mexican Spanish'),
('et', 'Tiếng Estonia'),
('eu', 'Tiếng Basque'),
('ewo', 'Tiếng Ewondo'),
('ext', 'Extremaduran'),
('fa', 'Tiếng Ba Tư'),
('fan', 'Tiếng Fang'),
('fat', 'Tiếng Fanti'),
('ff', 'Tiếng Fulah'),
('fi', 'Tiếng Phần Lan'),
('fil', 'Tiếng Philipin'),
('fit', 'Tornedalen Finnish'),
('fj', 'Tiếng Fiji'),
('fo', 'Tiếng Faore'),
('fon', 'Tiếng Fon'),
('fr', 'Tiếng Pháp'),
('frc', 'Cajun French'),
('frm', 'Tiếng Pháp Trung cổ'),
('fro', 'Tiếng Pháp cổ'),
('frp', 'Arpitan'),
('frr', 'Tiếng Frisian Miền Bắc'),
('frs', 'Tiếng Frisian Miền Đông'),
('fr_CA', 'Canadian French'),
('fr_CH', 'Swiss French'),
('fur', 'Tiếng Friulian'),
('fy', 'Tiếng Frisia'),
('ga', 'Tiếng Ai-len'),
('gaa', 'Tiếng Ga'),
('gag', 'Tiếng Gagauz'),
('gan', 'Gan Chinese'),
('gay', 'Tiếng Gayo'),
('gba', 'Tiếng Gbaya'),
('gbz', 'Zoroastrian Dari'),
('gd', 'Tiếng Xentơ (Xcốt len)'),
('gez', 'Tiếng Geez'),
('gil', 'Tiếng Gilbert'),
('gl', 'Tiếng Galician'),
('glk', 'Gilaki'),
('gmh', 'Tiếng Thượng Giéc-man Trung cổ'),
('gn', 'Tiếng Guarani'),
('goh', 'Tiếng Thượng Giéc-man cổ'),
('gom', 'Goan Konkani'),
('gon', 'Tiếng Gondi'),
('gor', 'Tiếng Gorontalo'),
('got', 'Tiếng Gô-tích'),
('grb', 'Tiếng Grebo'),
('grc', 'Tiếng Hy Lạp cổ'),
('gsw', 'Tiếng Đức (Thụy Sĩ)'),
('gu', 'Tiếng Gujarati'),
('guc', 'Wayuu'),
('gur', 'Frafra'),
('guz', 'Tiếng Gusii'),
('gv', 'Tiếng Manx'),
('gwi', 'Tiếng Gwichʼin'),
('ha', 'Tiếng Hausa'),
('hai', 'Tiếng Haida'),
('hak', 'Hakka Chinese'),
('haw', 'Tiếng Hawaii'),
('he', 'Tiếng Do Thái'),
('hi', 'Tiếng Hindi'),
('hif', 'Fiji Hindi'),
('hil', 'Tiếng Hiligaynon'),
('hit', 'Tiếng Hittite'),
('hmn', 'Tiếng Hmông'),
('ho', 'Tiếng Hiri Motu'),
('hr', 'Tiếng Croatia'),
('hsb', 'Tiếng Thượng Sorbia'),
('hsn', 'Xiang Chinese'),
('ht', 'Tiếng Haiti'),
('hu', 'Tiếng Hungary'),
('hup', 'Tiếng Hupa'),
('hy', 'Tiếng Armenia'),
('hz', 'Tiếng Herero'),
('ia', 'Tiếng Khoa Học Quốc Tế'),
('iba', 'Tiếng Iban'),
('ibb', 'Tiếng Ibibio'),
('id', 'Tiếng Indonesia'),
('ie', 'Tiếng Interlingue'),
('ig', 'Tiếng Igbo'),
('ii', 'Tiếng Di Tứ Xuyên'),
('ik', 'Tiếng Inupiaq'),
('ilo', 'Tiếng Iloko'),
('inh', 'Tiếng Ingush'),
('io', 'Tiếng Ido'),
('is', 'Tiếng Iceland'),
('it', 'Tiếng Ý'),
('iu', 'Tiếng Inuktitut'),
('izh', 'Ingrian'),
('ja', 'Tiếng Nhật'),
('jam', 'Jamaican Creole English'),
('jbo', 'Tiếng Lojban'),
('jgo', 'Tiếng Ngomba'),
('jmc', 'Tiếng Machame'),
('jpr', 'Tiếng Judeo-Ba Tư'),
('jrb', 'Tiếng Judeo-Ả Rập'),
('jut', 'Jutish'),
('jv', 'Tiếng Java'),
('ka', 'Tiếng Gruzia'),
('kaa', 'Tiếng Kara-Kalpak'),
('kab', 'Tiếng Kabyle'),
('kac', 'Tiếng Kachin'),
('kaj', 'Tiếng Jju'),
('kam', 'Tiếng Kamba'),
('kaw', 'Tiếng Kawi'),
('kbd', 'Tiếng Kabardian'),
('kbl', 'Tiếng Kanembu'),
('kcg', 'Tiếng Tyap'),
('kde', 'Tiếng Makonde'),
('kea', 'Tiếng Kabuverdianu'),
('ken', 'Kenyang'),
('kfo', 'Tiếng Koro'),
('kg', 'Tiếng Kongo'),
('kgp', 'Kaingang'),
('kha', 'Tiếng Khasi'),
('kho', 'Tiếng Khotan'),
('khq', 'Tiếng Koyra Chiini'),
('khw', 'Khowar'),
('ki', 'Tiếng Kikuyu'),
('kiu', 'Kirmanjki'),
('kj', 'Tiếng Kuanyama'),
('kk', 'Tiếng Kazakh'),
('kkj', 'Tiếng Kako'),
('kl', 'Tiếng Kalaallisut'),
('kln', 'Tiếng Kalenjin'),
('km', 'Tiếng Khơ-me'),
('kmb', 'Tiếng Kimbundu'),
('kn', 'Tiếng Kannada'),
('ko', 'Tiếng Hàn'),
('koi', 'Tiếng Komi-Permyak'),
('kok', 'Tiếng Konkani'),
('kos', 'Tiếng Kosrae'),
('kpe', 'Tiếng Kpelle'),
('kr', 'Tiếng Kanuri'),
('krc', 'Tiếng Karachay-Balkar'),
('kri', 'Krio'),
('krj', 'Kinaray-a'),
('krl', 'Tiếng Karelian'),
('kru', 'Tiếng Kurukh'),
('ks', 'Tiếng Kashmiri'),
('ksb', 'Tiếng Shambala'),
('ksf', 'Tiếng Bafia'),
('ksh', 'Tiếng Cologne'),
('ku', 'Tiếng Kurd'),
('kum', 'Tiếng Kumyk'),
('kut', 'Tiếng Kutenai'),
('kv', 'Tiếng Komi'),
('kw', 'Tiếng Cornwall'),
('ky', 'Tiếng Kyrgyz'),
('la', 'Tiếng La-tinh'),
('lad', 'Tiếng Ladino'),
('lag', 'Tiếng Langi'),
('lah', 'Tiếng Lahnda'),
('lam', 'Tiếng Lamba'),
('lb', 'Tiếng Luxembourg'),
('lez', 'Tiếng Lezghian'),
('lfn', 'Lingua Franca Nova'),
('lg', 'Tiếng Ganda'),
('li', 'Tiếng Limburg'),
('lij', 'Ligurian'),
('liv', 'Livonian'),
('lkt', 'Tiếng Lakota'),
('lmo', 'Lombard'),
('ln', 'Tiếng Lingala'),
('lo', 'Tiếng Lào'),
('lol', 'Tiếng Mongo'),
('loz', 'Tiếng Lozi'),
('lt', 'Tiếng Lít-va'),
('ltg', 'Latgalian'),
('lu', 'Tiếng Luba-Katanga'),
('lua', 'Tiếng Luba-Lulua'),
('lui', 'Tiếng Luiseno'),
('lun', 'Tiếng Lunda'),
('luo', 'Tiếng Luo'),
('lus', 'Tiếng Lushai'),
('luy', 'Tiếng Luyia'),
('lv', 'Tiếng Latvia'),
('lzh', 'Literary Chinese'),
('lzz', 'Laz'),
('mad', 'Tiếng Madura'),
('maf', 'Tiếng Mafa'),
('mag', 'Tiếng Magahi'),
('mai', 'Tiếng Maithili'),
('mak', 'Tiếng Makasar'),
('man', 'Tiếng Mandingo'),
('mas', 'Tiếng Masai'),
('mde', 'Tiếng Maba'),
('mdf', 'Tiếng Moksha'),
('mdr', 'Tiếng Mandar'),
('men', 'Tiếng Mende'),
('mer', 'Tiếng Meru'),
('mfe', 'Tiếng Morisyen'),
('mg', 'Tiếng Malagasy'),
('mga', 'Tiếng Ai-len Trung cổ'),
('mgh', 'Tiếng Makhuwa-Meetto'),
('mgo', 'Tiếng Meta’'),
('mh', 'Tiếng Marshall'),
('mi', 'Tiếng Maori'),
('mic', 'Tiếng Micmac'),
('min', 'Tiếng Minangkabau'),
('mk', 'Tiếng Macedonia'),
('ml', 'Tiếng Malayalam'),
('mn', 'Tiếng Mông Cổ'),
('mnc', 'Tiếng Manchu'),
('mni', 'Tiếng Manipuri'),
('moh', 'Tiếng Mohawk'),
('mos', 'Tiếng Mossi'),
('mr', 'Tiếng Marathi'),
('mrj', 'Western Mari'),
('ms', 'Tiếng Malaysia'),
('mt', 'Tiếng Malt'),
('mua', 'Tiếng Mundang'),
('mul', 'Nhiều Ngôn ngữ'),
('mus', 'Tiếng Creek'),
('mwl', 'Tiếng Miranda'),
('mwr', 'Tiếng Marwari'),
('mwv', 'Mentawai'),
('my', 'Tiếng Miến Điện'),
('mye', 'Tiếng Myene'),
('myv', 'Tiếng Erzya'),
('mzn', 'Mazanderani'),
('na', 'Tiếng Nauru'),
('nan', 'Min Nan Chinese'),
('nap', 'Tiếng Napoli'),
('naq', 'Tiếng Nama'),
('nb', 'Tiếng Na Uy (Bokmål)'),
('nd', 'Tiếng Ndebele Miền Bắc'),
('nds', 'Tiếng Hạ Giéc-man'),
('ne', 'Tiếng Nepal'),
('new', 'Tiếng Newari'),
('ng', 'Tiếng Ndonga'),
('nia', 'Tiếng Nias'),
('niu', 'Tiếng Niuean'),
('njo', 'Ao Naga'),
('nl', 'Tiếng Hà Lan'),
('nl_BE', 'Tiếng Flemish'),
('nmg', 'Tiếng Kwasio'),
('nn', 'Tiếng Na Uy (Nynorsk)'),
('nnh', 'Tiếng Ngiemboon'),
('no', 'Tiếng Na Uy'),
('nog', 'Tiếng Nogai'),
('non', 'Tiếng Na Uy cổ'),
('nov', 'Novial'),
('nqo', 'Tiếng N’Ko'),
('nr', 'Tiếng Ndebele Miền Nam'),
('nso', 'Bắc Sotho'),
('nus', 'Tiếng Nuer'),
('nv', 'Tiếng Navajo'),
('nwc', 'Tiếng Newari Cổ điển'),
('ny', 'Tiếng Nyanja'),
('nym', 'Tiếng Nyamwezi'),
('nyn', 'Tiếng Nyankole'),
('nyo', 'Tiếng Nyoro'),
('nzi', 'Tiếng Nzima'),
('oc', 'Tiếng Occitan'),
('oj', 'Tiếng Ojibwa'),
('om', 'Tiếng Oromo'),
('or', 'Tiếng Oriya'),
('os', 'Tiếng Ossetic'),
('osa', 'Tiếng Osage'),
('ota', 'Tiếng Thổ Nhĩ Kỳ Ottoman'),
('pa', 'Tiếng Punjab'),
('pag', 'Tiếng Pangasinan'),
('pal', 'Tiếng Pahlavi'),
('pam', 'Tiếng Pampanga'),
('pap', 'Tiếng Papiamento'),
('pau', 'Tiếng Palauan'),
('pcd', 'Picard'),
('pdc', 'Pennsylvania German'),
('pdt', 'Plautdietsch'),
('peo', 'Tiếng Ba Tư cổ'),
('pfl', 'Palatine German'),
('phn', 'Tiếng Phoenicia'),
('pi', 'Tiếng Pali'),
('pl', 'Tiếng Ba Lan'),
('pms', 'Piedmontese'),
('pnt', 'Pontic'),
('pon', 'Tiếng Pohnpeian'),
('prg', 'Prussian'),
('pro', 'Tiếng Provençal cổ'),
('ps', 'Tiếng Pashto'),
('pt', 'Tiếng Bồ Đào Nha'),
('pt_BR', 'Tiếng Bồ Đào Nha (Braxin)'),
('pt_PT', 'European Portuguese'),
('qu', 'Tiếng Quechua'),
('quc', 'Tiếng Kʼicheʼ'),
('qug', 'Chimborazo Highland Quichua'),
('raj', 'Tiếng Rajasthani'),
('rap', 'Tiếng Rapanui'),
('rar', 'Tiếng Rarotongan'),
('rgn', 'Romagnol'),
('rif', 'Riffian'),
('rm', 'Tiếng Romansh'),
('rn', 'Tiếng Rundi'),
('ro', 'Tiếng Rumani'),
('rof', 'Tiếng Rombo'),
('rom', 'Tiếng Romany'),
('root', 'Tiếng Root'),
('ro_MD', 'Tiếng Moldova'),
('rtm', 'Rotuman'),
('ru', 'Tiếng Nga'),
('rue', 'Rusyn'),
('rug', 'Roviana'),
('rup', 'Tiếng Aromania'),
('rw', 'Tiếng Kinyarwanda'),
('rwk', 'Tiếng Rwa'),
('sa', 'Tiếng Phạn'),
('sad', 'Tiếng Sandawe'),
('sah', 'Tiếng Sakha'),
('sam', 'Tiếng Samaritan Aramaic'),
('saq', 'Tiếng Samburu'),
('sas', 'Tiếng Sasak'),
('sat', 'Tiếng Santali'),
('saz', 'Saurashtra'),
('sba', 'Tiếng Ngambay'),
('sbp', 'Tiếng Sangu'),
('sc', 'Tiếng Sardinia'),
('scn', 'Tiếng Sicilia'),
('sco', 'Tiếng Scots'),
('sd', 'Tiếng Sindhi'),
('sdc', 'Sassarese Sardinian'),
('se', 'Tiếng Sami Miền Bắc'),
('see', 'Tiếng Seneca'),
('seh', 'Tiếng Sena'),
('sei', 'Seri'),
('sel', 'Tiếng Selkup'),
('ses', 'Tiếng Koyraboro Senni'),
('sg', 'Tiếng Sango'),
('sga', 'Tiếng Ai-len cổ'),
('sgs', 'Samogitian'),
('sh', 'Tiếng Xéc bi - Croatia'),
('shi', 'Tiếng Tachelhit'),
('shn', 'Tiếng Shan'),
('shu', 'Tiếng Ả-Rập Chad'),
('si', 'Tiếng Sinhala'),
('sid', 'Tiếng Sidamo'),
('sk', 'Tiếng Slovak'),
('sl', 'Tiếng Slovenia'),
('sli', 'Lower Silesian'),
('sly', 'Selayar'),
('sm', 'Tiếng Samoa'),
('sma', 'TIếng Sami Miền Nam'),
('smj', 'Tiếng Lule Sami'),
('smn', 'Tiếng Inari Sami'),
('sms', 'Tiếng Skolt Sami'),
('sn', 'Tiếng Shona'),
('snk', 'Tiếng Soninke'),
('so', 'Tiếng Somali'),
('sog', 'Tiếng Sogdien'),
('sq', 'Tiếng An-ba-ni'),
('sr', 'Tiếng Serbia'),
('srn', 'Tiếng Sranan Tongo'),
('srr', 'Tiếng Serer'),
('ss', 'Tiếng Swati'),
('ssy', 'Tiếng Saho'),
('st', 'Tiếng Sesotho'),
('stq', 'Saterland Frisian'),
('su', 'Tiếng Sudan'),
('suk', 'Tiếng Sukuma'),
('sus', 'Tiếng Susu'),
('sux', 'Tiếng Sumeria'),
('sv', 'Tiếng Thụy Điển'),
('sw', 'Tiếng Swahili'),
('swb', 'Tiếng Cômo'),
('swc', 'Tiếng Swahili Congo'),
('syc', 'Tiếng Syria Cổ điển'),
('syr', 'Tiếng Syriac'),
('szl', 'Silesian'),
('ta', 'Tiếng Tamil'),
('tcy', 'Tulu'),
('te', 'Tiếng Telugu'),
('tem', 'Tiếng Timne'),
('teo', 'Tiếng Teso'),
('ter', 'Tiếng Tereno'),
('tet', 'Tetum'),
('tg', 'Tiếng Tajik'),
('th', 'Tiếng Thái'),
('ti', 'Tiếng Tigrigya'),
('tig', 'Tiếng Tigre'),
('tiv', 'Tiếng Tiv'),
('tk', 'Tiếng Turk'),
('tkl', 'Tiếng Tokelau'),
('tkr', 'Tsakhur'),
('tl', 'Tiếng Tagalog'),
('tlh', 'Tiếng Klingon'),
('tli', 'Tiếng Tlingit'),
('tly', 'Talysh'),
('tmh', 'Tiếng Tamashek'),
('tn', 'Tiếng Tswana'),
('to', 'Tiếng Tonga'),
('tog', 'Tiếng Nyasa Tonga'),
('tpi', 'Tiếng Tok Pisin'),
('tr', 'Tiếng Thổ Nhĩ Kỳ'),
('tru', 'Turoyo'),
('trv', 'Tiếng Taroko'),
('ts', 'Tiếng Tsonga'),
('tsd', 'Tsakonian'),
('tsi', 'Tiếng Tsimshian'),
('tt', 'Tiếng Tatar'),
('ttt', 'Muslim Tat'),
('tum', 'Tiếng Tumbuka'),
('tvl', 'Tiếng Tuvalu'),
('tw', 'Tiếng Twi'),
('twq', 'Tiếng Tasawaq'),
('ty', 'Tiếng Tahiti'),
('tyv', 'Tiếng Tuvinian'),
('tzm', 'Tiếng Tamazight Miền Trung Ma-rốc'),
('udm', 'Tiếng Udmurt'),
('ug', 'Tiếng Uyghur'),
('uga', 'Tiếng Ugaritic'),
('uk', 'Tiếng Ucraina'),
('umb', 'Tiếng Umbundu'),
('und', 'Ngôn ngữ không xác định'),
('ur', 'Tiếng Uđu'),
('uz', 'Tiếng Uzbek'),
('vai', 'Tiếng Vai'),
('ve', 'Tiếng Venda'),
('vec', 'Venetian'),
('vep', 'Veps'),
('vi', 'Tiếng Việt'),
('vls', 'West Flemish'),
('vmf', 'Main-Franconian'),
('vo', 'Tiếng Volapük'),
('vot', 'Tiếng Votic'),
('vro', 'Võro'),
('vun', 'Tiếng Vunjo'),
('wa', 'Tiếng Walloon'),
('wae', 'Tiếng Walser'),
('wal', 'Tiếng Walamo'),
('war', 'Tiếng Waray'),
('was', 'Tiếng Washo'),
('wbp', 'Warlpiri'),
('wo', 'Tiếng Wolof'),
('wuu', 'Wu Chinese'),
('xal', 'Tiếng Kalmyk'),
('xh', 'Tiếng Xhosa'),
('xmf', 'Mingrelian'),
('xog', 'Tiếng Soga'),
('yao', 'Tiếng Yao'),
('yap', 'Tiếng Yap'),
('yav', 'Tiếng Yangben'),
('ybb', 'Tiếng Yemba'),
('yi', 'Tiếng Y-đit'),
('yo', 'Tiếng Yoruba'),
('yrl', 'Nheengatu'),
('yue', 'Tiếng Quảng Đông'),
('za', 'Tiếng Zhuang'),
('zap', 'Tiếng Zapotec'),
('zbl', 'Ký hiệu Blissymbols'),
('zea', 'Zeelandic'),
('zen', 'Tiếng Zenaga'),
('zgh', 'Tiếng Tamazight Chuẩn của Ma-rốc'),
('zh', 'Tiếng Trung'),
('zh_Hans', 'Simplified Chinese'),
('zh_Hant', 'Traditional Chinese'),
('zu', 'Tiếng Zulu'),
('zun', 'Tiếng Zuni'),
('zza', 'Tiếng Zaza');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(10) NOT NULL,
  `TotalMoney` int(11) DEFAULT NULL,
  `TotalRevenue` int(11) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `PaymentDate` datetime(3) DEFAULT NULL,
  `CreatedAt` datetime(3) DEFAULT current_timestamp(3),
  `Username` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `OrderDetailsID` varchar(10) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `OrderID` varchar(10) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publishes`
--

CREATE TABLE `publishes` (
  `PublishID` int(11) NOT NULL,
  `PublishName` varchar(64) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Fax` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `publishes`
--

INSERT INTO `publishes` (`PublishID`, `PublishName`, `Phone`, `Address`, `Fax`) VALUES
(1, 'NXB Kim Đồng', '02839390465', 'TP. Hồ Chí Minh', ''),
(2, 'NXB Trẻ', '02893316289', 'TP. Hồ Chí Minh', ''),
(3, 'NXB IPM', '0333193979', '110 Nguyễn Ngọc Nại, Hà Nội', ''),
(4, 'NXB Đồng Nai', '0933109009', 'TP. Biên Hoà, Đồng Nai', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `ISBN` varchar(13) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Point` int(11) DEFAULT NULL,
  `UpdatedAt` datetime(3) DEFAULT current_timestamp(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipts`
--

CREATE TABLE `receipts` (
  `ISBN` varchar(13) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `CreatedAt` datetime(3) DEFAULT current_timestamp(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `SliderID` int(11) NOT NULL,
  `SliderName` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Thumbnail` varchar(255) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`SliderID`, `SliderName`, `Description`, `Thumbnail`, `Status`) VALUES
(1, 'Slider 1', 'Mô tả slide 1', '/assets/img/sliders/slider-1.png', 1),
(2, 'Slider 2', 'Mô tả slide 2', '/assets/img/sliders/slider-2.png', 1),
(3, 'Slider 3', 'Mô tả slide 3', '/assets/img/sliders/slider-3.jpg', 1),
(4, 'Slider 4', 'Mô tả slide 4', '/assets/img/sliders/slider-4.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(64) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Fax` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `SupplierName`, `Phone`, `Address`, `Fax`) VALUES
(1, 'Fasaha', '0987654321', 'TP. Hồ Chí Minh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Username` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Fullname` varchar(64) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Email` varchar(64) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Money` int(11) DEFAULT 0,
  `Status` tinyint(4) DEFAULT 1,
  `CreatedAt` datetime(3) DEFAULT current_timestamp(3),
  `AccountTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Username`, `Password`, `Fullname`, `Phone`, `Email`, `Avatar`, `Money`, `Status`, `CreatedAt`, `AccountTypeID`) VALUES
('Admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Lý Quốc Hưng', '0123456789', 'admin@gmail.com', '/assets/img/hacker.png', 0, 1, NOW(3), 1),
('QH', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Quốc Hưng', '0987654321', 'qh@gmail.com', '', 0, 0, NOW(3), 2),
('abc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nguyễn Văn A', '0123456788', 'user1@gmail.com', '', 0, 1, NOW(3), 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `VoucherID` int(11) NOT NULL,
  `VoucherName` varchar(255) DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `StartTime` datetime(3) DEFAULT NULL,
  `EndTime` datetime(3) DEFAULT NULL,
  `UsedStatus` tinyint(4) DEFAULT NULL,
  `Username` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`AccountTypeID`);

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `LanguageID` (`LanguageID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `PublishID` (`PublishID`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`ISBN`,`Username`),
  ADD KEY `Username` (`Username`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `composers`
--
ALTER TABLE `composers`
  ADD PRIMARY KEY (`ISBN`,`AuthorID`),
  ADD KEY `AuthorID` (`AuthorID`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`LanguageID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Username` (`Username`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`OrderDetailsID`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Chỉ mục cho bảng `publishes`
--
ALTER TABLE `publishes`
  ADD PRIMARY KEY (`PublishID`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ISBN`,`Username`),
  ADD KEY `Username` (`Username`);

--
-- Chỉ mục cho bảng `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`ISBN`,`SupplierID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`SliderID`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Phone` (`Phone`,`Email`),
  ADD KEY `AccountTypeID` (`AccountTypeID`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`VoucherID`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account_types`
--
ALTER TABLE `account_types`
  MODIFY `AccountTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `OrderDetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `publishes`
--
ALTER TABLE `publishes`
  MODIFY `PublishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `SliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `VoucherID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`LanguageID`) REFERENCES `languages` (`LanguageID`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`PublishID`) REFERENCES `publishes` (`PublishID`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);

--
-- Các ràng buộc cho bảng `composers`
--
ALTER TABLE `composers`
  ADD CONSTRAINT `composers_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `composers_ibfk_2` FOREIGN KEY (`AuthorID`) REFERENCES `authors` (`AuthorID`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);

--
-- Các ràng buộc cho bảng `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `receipts_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`AccountTypeID`) REFERENCES `account_types` (`AccountTypeID`);

--
-- Các ràng buộc cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
