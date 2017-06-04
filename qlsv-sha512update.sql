-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2017 at 02:15 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `bomon`
--

CREATE TABLE `bomon` (
  `MaBM` int(10) NOT NULL,
  `TenBM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phong` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GVPhuTrach` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bomon`
--

INSERT INTO `bomon` (`MaBM`, `TenBM`, `Phong`, `SoDienThoai`, `GVPhuTrach`) VALUES
(4, 'Lập trình Web', '804', '090978652', '25'),
(5, 'Nhập môn lập trình', '801', '090874126', '28'),
(6, 'Toàn rời rạc', '903', '0903345112', '24'),
(7, 'Nhập môn cơ sở dữ liệu', '910', '093987423', '27'),
(8, 'Data Structure', 'I919', '090587412', '26');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaBM` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaGV` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoTinChi` int(11) DEFAULT NULL,
  `TinhTrang` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `MaLop`, `MaBM`, `MaGV`, `SoTinChi`, `TinhTrang`) VALUES
('CS_DB14BIT1', '14BIT1', '7', '27', 4, 'Đang hoạt động'),
('CS_DB15BIT', '15BIT', '7', '27', 3, 'Đang hoạt động'),
('CS_DS14BIT1', '14BIT1', '8', '25', 3, 'Đang hoạt động'),
('CS_DS15BIT', '15BIT', '8', '27', 3, 'Đang hoạt động'),
('CS_Math14BIT1', '14BIT1', '6', '28', 3, 'Đang hoạt động'),
('CS_Math15BIT', '15BIT', '6', '24', 2, 'Đang hoạt động'),
('CS_NMLT14BIT1', '14BIT1', '5', '25', 4, 'Đang hoạt động'),
('CS_NMLT15BIT', '15BIT', '5', '25', 3, 'Đang hoạt động'),
('CS_Web14BIT1', '14BIT1', '4', '26', 4, 'Đang hoạt động'),
('CS_Web15BIT', '15BIT', '4', '25', 4, 'Đang hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `kqkhoa`
--

CREATE TABLE `kqkhoa` (
  `MaKhoa` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaSV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiemTongKet` float DEFAULT NULL,
  `KetQua` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kqkhoa`
--

INSERT INTO `kqkhoa` (`MaKhoa`, `MaSV`, `MaLop`, `DiemTongKet`, `KetQua`) VALUES
('CS_DB14BIT1', '34', '14BIT1', 8, 'Đạt'),
('CS_DB14BIT1', '35', '14BIT1', 7, 'Đạt'),
('CS_DB14BIT1', '36', '14BIT1', 4.75, 'Chưa đạt'),
('CS_DB14BIT1', '37', '14BIT1', 1.25, 'Chưa đạt'),
('CS_DB14BIT1', '38', '14BIT1', 4, 'Chưa đạt'),
('CS_DB15BIT', '44', '15BIT', 4, 'Chưa đạt'),
('CS_DB15BIT', '45', '15BIT', 8, 'Đạt'),
('CS_DB15BIT', '46', '15BIT', 6, 'Đạt'),
('CS_DB15BIT', '47', '15BIT', 3, 'Chưa đạt'),
('CS_DB15BIT', '53', '15BIT', 6, 'Đạt'),
('CS_DB15BIT', '54', '15BIT', 2, 'Chưa đạt'),
('CS_DS14BIT1', '34', '14BIT1', 8, 'Đạt'),
('CS_DS14BIT1', '35', '14BIT1', 7, 'Đạt'),
('CS_DS14BIT1', '36', '14BIT1', 9, 'Đạt'),
('CS_DS14BIT1', '37', '14BIT1', 10, 'Đạt'),
('CS_DS14BIT1', '38', '14BIT1', 1.75, 'Chưa đạt'),
('CS_DS15BIT', '44', '15BIT', 8, 'Đạt'),
('CS_DS15BIT', '45', '15BIT', 7, 'Đạt'),
('CS_DS15BIT', '46', '15BIT', 6, 'Đạt'),
('CS_DS15BIT', '47', '15BIT', 4, 'Chưa đạt'),
('CS_DS15BIT', '53', '15BIT', 8, 'Đạt'),
('CS_DS15BIT', '54', '15BIT', 7, 'Đạt'),
('CS_Math14BIT1', '34', '14BIT1', 9, 'Đạt'),
('CS_Math14BIT1', '35', '14BIT1', 5, 'Đạt'),
('CS_Math14BIT1', '36', '14BIT1', 7.25, 'Đạt'),
('CS_Math14BIT1', '37', '14BIT1', 6, 'Đạt'),
('CS_Math14BIT1', '38', '14BIT1', 8, 'Đạt'),
('CS_Math15BIT', '44', '15BIT', 7, 'Đạt'),
('CS_Math15BIT', '45', '15BIT', 8, 'Đạt'),
('CS_Math15BIT', '46', '15BIT', 4, 'Chưa đạt'),
('CS_Math15BIT', '47', '15BIT', 3, 'Chưa đạt'),
('CS_Math15BIT', '53', '15BIT', 8, 'Đạt'),
('CS_Math15BIT', '54', '15BIT', 7.5, 'Đạt'),
('CS_NMLT14BIT1', '34', '14BIT1', 7, 'Đạt'),
('CS_NMLT14BIT1', '35', '14BIT1', 7, 'Đạt'),
('CS_NMLT14BIT1', '36', '14BIT1', 6.25, 'Đạt'),
('CS_NMLT14BIT1', '37', '14BIT1', 5, 'Đạt'),
('CS_NMLT14BIT1', '38', '14BIT1', 9.5, 'Đạt'),
('CS_NMLT15BIT', '44', '15BIT', 8, 'Đạt'),
('CS_NMLT15BIT', '45', '15BIT', 7, 'Đạt'),
('CS_NMLT15BIT', '46', '15BIT', 4, 'Chưa đạt'),
('CS_NMLT15BIT', '47', '15BIT', 5, 'Đạt'),
('CS_NMLT15BIT', '53', '15BIT', 8, 'Đạt'),
('CS_NMLT15BIT', '54', '15BIT', 10, 'Đạt'),
('CS_Web14BIT1', '34', '14BIT1', 3, 'Chưa đạt'),
('CS_Web14BIT1', '35', '14BIT1', 7, 'Đạt'),
('CS_Web14BIT1', '36', '14BIT1', 2.5, 'Chưa đạt'),
('CS_Web14BIT1', '37', '14BIT1', 5.5, 'Đạt'),
('CS_Web14BIT1', '38', '14BIT1', 9, 'Đạt'),
('CS_Web15BIT', '44', '15BIT', 4.5, 'Chưa đạt'),
('CS_Web15BIT', '45', '15BIT', 2, 'Chưa đạt'),
('CS_Web15BIT', '46', '15BIT', 2, 'Chưa đạt'),
('CS_Web15BIT', '47', '15BIT', 2, 'Chưa đạt'),
('CS_Web15BIT', '53', '15BIT', 2, 'Chưa đạt'),
('CS_Web15BIT', '54', '15BIT', 2, 'Chưa đạt');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `LopTruong` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaLop`, `LopTruong`) VALUES
('13BIT', '32'),
('14BIT1', '38'),
('14BIT2', '50'),
('15BIT', '54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `MaUser` int(11) NOT NULL,
  `HoTen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Phai` int(11) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoaiUser` int(11) NOT NULL,
  `TinhTrang` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`MaUser`, `HoTen`, `Phai`, `NgaySinh`, `DiaChi`, `SoDienThoai`, `Email`, `MaLop`, `LoaiUser`, `TinhTrang`, `MatKhau`, `HinhAnh`) VALUES
(1, 'Diablo', 1, '2016-11-28', '13th Heroes of the Storm', '0909318765', 'diablo@gmail.com', NULL, 1, 'Đang hoạt động', 'ae0536737d1e6a705632a51c4752add8163eb0999facc473a9b057677a8fc50892266130eb32020067e52c1f819cf27f8e13c4a4691fb03139a4270f65d46558', 'http://vignette3.wikia.nocookie.net/diablo/images/0/05/Diablo_Head.jpg/revision/latest?cb=20080910154202'),
(2, 'Jaina', 0, '2016-11-04', '20th Heroes of the Storm', '312198765', 'jaina@gmail.com', NULL, 1, 'Đang hoạt động', '2dcb4de9c430ec8cb810c00b9b99f5f26c454fa89b81dda57b720f42ba8043320fc0c76bff5b6d4744a6461c4b18b257261ceea9b1ace4167bd06079708ea239', 'http://orig07.deviantart.net/ef3c/f/2015/350/9/2/lady_jaina_proudmoore_by_ver1sa-d83j231.jpg'),
(24, 'Nguyễn Văn Hoàng', 1, '1967-01-31', '225 Nguyễn Văn Cừ, P7, Q3', '0903345112', 'nguyenvhoang@gmail.com', NULL, 2, 'Đang hoạt động', 'bcf2971e4191ba6f2ced9f664f0d8bd9fec31ae4a04fb888ad6d5dce36f602c35e67ce81229127aaa8149d0711a79589d46b960316953067bfd26c4edf4665fc', 'https://i.ytimg.com/vi/SJ1Frlv0qFc/hqdefault.jpg'),
(25, 'Lê Văn Hai', 1, '1987-06-21', '12 Nguyễn Bỉnh Khiêm, P7, Q3', '090978652', 'levhai@gmail.com', NULL, 2, 'Đang hoạt động', '70045ad1f74092013c12d7e2c2be47bba335248d3fad74139eea9d59fd44aa975dc1e319e5123d1c99c118cbd683a02cdb6f5e4780e32ae29632f2baa9a4a998', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(26, 'Phan Văn Ba', 1, '1969-04-21', '132 CMT8, P7, Q3', '090587412', 'phanvba@gmail.com', NULL, 2, 'Đang hoạt động', '5431cfda3404759ac98554f125702a13d8edce2301dc3923025f24a226876b86083dfaca5d59008e1835f4a4568e01c4cea0e5a02ae09deb54ba30c41a30de37', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(27, 'Lê Thị Nhàn', 0, '1974-02-15', '125 Lê Lợi, P7, Q3', '093987423', 'letnhan@gmail.com', NULL, 2, 'Đang hoạt động', '32ac3ef5b643aa9d49cfc0095f770a03208c14cfa4a9e1106f19c36749fb57b910c757318250e8153d5d03c1336caf69054cc985351ba3c912720bc8f9ad006d', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(28, 'Vũ Thị Mỹ Hạnh', 0, '1976-05-19', '654 Nguyễn Đình Chiểu, P7, Q3', '090874126', 'vutmhanh@gmail.com', NULL, 2, 'Đang hoạt động', '9b0a0ca1ca9c4de50b074c641ccfa762082fe1dd8db7e4025f641fc54879aebce15794d2d329529512ff8400b9303c5f8a42eea140bd7d9e2238e7bc5616e456', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(29, 'Nguyễn Vũ Khương', 1, '1995-01-31', '115 Hoàng Văn Thụ, P8, Q9', '0905234120', 'nguyenvkhuong@gmail.com', '13BIT', 3, 'Đang hoạt động', '232ef45bfccbe8ef52aa63112102e045e52256561558c13ef72138fa9aa879b069f707d7ae3a7c386c9b28588acb203d659055a658f65dc42b788721e9fb8e4f', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(30, 'Lê Minh Thọ', 1, '1995-03-21', '145 Lê Lai, P9, Q Bình Tân', '098745453', 'lemtho@gmail.com', '13BIT', 3, 'Đang hoạt động', '2eb1b9cc82435271917af544ceacb53a002f72f4b4cee64c8d8f130cf9b26342a4df8b26c8673a2a88c8c98a4806283913e291413f7e64718310947692d8c10b', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(31, 'Lê Mỹ Linh', 0, '1995-12-12', '55 Trường Sa, P8, Q10', '0987454347', 'lemlinh@gmail.com', '13BIT', 3, 'Đang hoạt động', 'cef3fcbc07cbdc7b57015b6f80c56e6159c60595158b0e336d70b0eadd2b8d2b3c4c65f0abae5d371f995f9b7566fae96804e47b2fdd172be421e896ed293d4a', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(32, 'Nguyễn Mỹ Linh', 0, '1995-03-19', '106 Hoàng Hoa Thám, P8, Q1', '0985231441', 'nguyenmlinh@gmail.com', '13BIT', 3, 'Đang hoạt động', '35089a30dc069f5388c984f95c75114766f93974420fa3769fbb77bf6cd051c0d967ec11b097f17635ed0e97ff30ec60cfa545a82a79abbc5be196e4d1f73c1b', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(33, 'Lê Thị Mỹ', 0, '1995-05-25', '124 Nguyễn Văn Linh, P8, Q9', '0908713442', 'letmy@gmail.com', '13BIT', 3, 'Đang hoạt động', '781dba97df4a9276ad6e4d8f13880a4e8f21e428894ff84cb646e2b6e1e4a46c7a273659cfdbf99a1530a3faaa52cb43731eb33549fa9816568e20773830c08a', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(34, 'Vũ Hoàng Đăng', 1, '1995-12-28', '1/64, Lê Trọng Tấn , F6, Q1', '0905763265', 'vuhdang@gmail.com', '14BIT1', 3, 'Đang hoạt động', 'd71ae76f8f3ffb424855896b8d0d6e303f0d5f73d549424f39b24ba5722a5a40ff4b42c643248d031c118de5489eabdc6c7bac5bda38bc0764886ac3968cd717', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(35, 'Nguyễn Hoàng Kim', 0, '1996-08-28', '100, Lê Lai, F5, Q3', '0946284199', 'nguyenhkim@gmail.com', '14BIT1', 3, 'Đang hoạt động', 'dec76b63c91ae53eab98dd3edfcb413ec893935e60477b65c352cca90faf8e169128104804eb1c8933b79f2ca13855601bcecef986541d9c9a644cd860d9879b', 'http://img03.deviantart.net/bead/i/2012/050/0/0/rx_78_2_gundam_wallpaper_by_gundamexige-d4q834o.jpg'),
(36, 'Đinh Tiền Tài', 1, '1994-04-20', '89, Lê Lợi, F8, Q7', '0901020304', 'dinhttai@gmail.com', '14BIT1', 3, 'Đang hoạt động', '461a83a618a9290896951d00e0f4c54580dce375b84d367dc14dea3618c18a904d38264532fffd574c7e4df4dca203009a3703876235debadc8b2b1d17fd5dc5', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(37, 'Hà Thị Thu', 0, '1996-06-08', '1/2, Cộng Hòa, F1, Q9', '0123987651', 'hatthu@gmail.com', '14BIT1', 3, 'Đang hoạt động', '0a83adf726ca48d19874ce088a9f33ba94f038e30f89834a1065a51a372a53f370ef2072cf8e0391dcfff95003a59c28cc36664bd9589c124a6c52f32a6c645a', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(38, 'Ngọc Hà My', 0, '1995-10-03', '7/3, Sơn Kỳ, F12, Q5', '0906206651', 'ngochmy@gmail.com', '14BIT1', 3, 'Đang hoạt động', 'd2ed804d01f125d31593e0edb59365ac7acc23c64f84fd9eb62abadf706e8a295326d4c2c9699dbd7c22e2edfae676ce94ddcc61da221abeb23a1a8a33d35635', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(44, 'Nguyễn Duy Thắng', 1, '1997-01-01', '225 Lê Quang Định quận bình thạnh', '0940545455', 'duythang@gmail.com', '15BIT', 3, 'Đang hoạt động', 'e213807dcb6124079d4df1fee37039c6b8a8536ec5e57fd1175e3e71a54d4edf7c73807de69a1f22d2a813d2c0a27760201be33b62e3a005697cd662d75191e7', 'http://vignette1.wikia.nocookie.net/starcraft/images/5/56/Zeratul_SC2_Art1.jpg/revision/latest?cb=20100711023628'),
(45, 'Nguyễn Viết Thanh', 1, '1997-04-05', '55 đường số 6 quận 9', '0915646546', 'vietthanh@gmail.com', '15BIT', 3, 'Đang hoạt động', '2f8100892bb7245b5977a3495993ebfa9afbaf750598b67906a8463d09d6e739e9ec9508896c2a1bd8ce4eb4ea277ca802e3048bc805e8a9273bd3a7853d1d29', 'http://www.heroesofthestormbuildguide.com/wp-content/uploads/2015/03/anubarak.jpg'),
(46, 'Trần Gia Linh', 0, '1997-01-01', '21 Lê Thánh Tôn Quận 10', '0914564654', 'gialinh@gmail.com', '15BIT', 3, 'Đang hoạt động', 'e41f43e27161d8b68ceb3a346702dec2c2cd7335863e6081759a792939a39e06222178e54705272d96e94b21d4b925d8fa8506b93e1072fdf592f6e1cd2bb22c', 'http://hosonhanvat.com/wp-content/uploads/2016/04/maxresdefault-8.jpg'),
(47, 'KathyPhan', 1, '1997-04-01', '435 Nguyễn Thị Minh Khai Quận 1', '0168456456', 'kathyphan@gmail.com', '15BIT', 3, 'Đang hoạt động', '818c92a2773a6a07a44c73b202133a1a07a6ee84b5377fb522f92f9584506de57d754d1dc742b6593ae56c98ba1bc33e5c2e6904be48a2216a35b6a6732dc736', 'http://vignette1.wikia.nocookie.net/starcraft/images/4/46/Alarak_SC2-LotV_Art3.jpg/revision/latest/scale-to-width-down/250?cb=20160911063235'),
(48, 'Châu Thanh Duy', 1, '1996-09-29', '23 Sư Vạn Hạnh, Quận 5', '0905693145', 'ctduy@gmail.com', '14BIT2', 3, 'Đang hoạt động', '38704162131b078ba5d35499034473c4e059cf608d0cb3aaa7e3a3eca9ee825ca03db7b7f3e654ec0ec5fd76562809469fd84d2ab764337bce78b2cc3550945a', 'http://media.blizzard.com/heroes/ragnaros/skins/thumbnails/the-firelord.jpg'),
(49, 'Huỳnh Cẩm Thành', 1, '1995-04-01', '125/12 Nguyễn Tri Phương, Quận 5', '0935478214', 'hcthanh@gmail.com', '14BIT2', 3, 'Đang hoạt động', 'e1db8854cd566666985c76b78fe323b64c2a969ac05cb471d2d41998dde43c4e58fa5cb70f862bb05969e38acc1ecdb32eec90551e905b109334bf97f7a4d596', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(50, 'Hồ Vĩnh Trung', 1, '1996-08-25', '879/32 Xô Viết Nghệ Tĩnh, Quận Bình Thạnh', '0962145987', 'hvtrung@gmail.com', '14BIT2', 3, 'Đang hoạt động', '66b65997770df64eb14f91742e660900e9fdc105d998ed31ba48b67f0326f133b24abb3cf1552a0ed43635269cc0f2208a3605638bb5e31925c24b5ea4331321', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(51, 'Nguyễn Thủy Trúc', 0, '1996-10-10', '1 Mai Chí Thọ, Quận 2', '0984563210', 'nttruc@gmail.com', '14BIT2', 3, 'Đang hoạt động', '4d4508a4723de549638f52e94ccaad29906473d69a787e01b02cb6a29f6999798121ff12fc0dbc5de00feb0a742a0e22dd332c39670428e2ade9cd1102b2fcf7', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(52, 'Nguyễn Ngô Trần Đức Anh', 1, '1996-07-18', '145/34 Phạm Văn Hai, Quận Tân Bình', '0901297254', 'nntdanh@gmail.com', '14BIT2', 3, 'Đang hoạt động', '68bf6b4fc12fb26a2ceac7aa947b30e2bdf068203d50bc80e1e617541d0bf3750ecb3c73cbf590e45b646523992c6278e59e6e67952f26393b3fc4cb257a5187', 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg'),
(53, 'Phan Đăng Khoa', 1, '1997-02-12', '15 Ngô Tất Tố, P7, Q8', '0901278321', 'phandkhoa@gmail.com', '15BIT', 3, 'Đang hoạt động', '480fa6d0a30831f31d38dee15b64c48aeabadc3008cdf1e566b0975bbea33d583139cb01374c5409743c12b192d021143c2afbfdf7b03f7bc74cddf17c866a76', 'http://img4.wikia.nocookie.net/__cb20140930084424/starcraft/images/3/36/Artanis_SC2_Head4.jpg'),
(54, 'Lê Thị Huyền', 0, '1997-03-21', '11/2 Cầu Kiệu, P9, Q9', '0963178911', 'lethuyen@gmail.com', '15BIT', 3, 'Đang hoạt động', '92215e4eccbfe91f51b5d2f2b202ec9344c9ce6e4c3113ec569c7a84406b09e91eeac730ea0abc0f5806e07526b6707828f09f782fa08944e63258ba540ef998', 'http://img2.wikia.nocookie.net/__cb20121203112237/starcraft/images/a/a5/SarahKerrigan_HotS_Head3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `yeucau`
--

CREATE TABLE `yeucau` (
  `MaYC` int(11) NOT NULL,
  `MaUser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Loai` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDe` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ThoiDiemNop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`MaBM`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Indexes for table `kqkhoa`
--
ALTER TABLE `kqkhoa`
  ADD PRIMARY KEY (`MaKhoa`,`MaSV`,`MaLop`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`MaUser`),
  ADD UNIQUE KEY `uc_Email` (`Email`);

--
-- Indexes for table `yeucau`
--
ALTER TABLE `yeucau`
  ADD PRIMARY KEY (`MaYC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bomon`
--
ALTER TABLE `bomon`
  MODIFY `MaBM` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `MaUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `yeucau`
--
ALTER TABLE `yeucau`
  MODIFY `MaYC` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
