-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 07:55 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viettel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idad` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `RandomKey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idad`, `Username`, `Password`, `HoTen`, `Email`, `RandomKey`) VALUES
(1, 'admin', '27a2545475b9aa9a6e49f94fb9fe9e080e671444', 'Lê Qui Phụng', 'phung.lequi93@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `idBV` int(11) NOT NULL,
  `idDM` int(11) NOT NULL,
  `idCM` int(11) NOT NULL,
  `TieuDe` varchar(500) NOT NULL,
  `urlHinh` varchar(500) NOT NULL,
  `Alias` varchar(500) NOT NULL,
  `NgayDang` varchar(500) NOT NULL,
  `TomTat` text NOT NULL,
  `NoiDung` text NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `NoiBat` tinyint(1) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`idBV`, `idDM`, `idCM`, `TieuDe`, `urlHinh`, `Alias`, `NgayDang`, `TomTat`, `NoiDung`, `SoLanXem`, `NoiBat`, `AnHien`, `Title`, `Description`) VALUES
(5, 11, 6, 'Khuyến mại lắp mạng Viettel quận Đống Đa', '/viettel/uploads/images/cap-quang-ftth-4-324x235.png', 'khuyen-mai-lap-mang-viettel-quan-dong-da', '1467945812', '<p>Viettel trân trọng gửi đến quý khách hàng chương trình siêu khuyến mãi dành riêng cho khách hàng sinh sống và làm việc trong khu đô thị Nam Trung Yên.</p>\r\n\r\n<p>KĐT Nam Trung Yên là khu đô thị mới hoàn chỉnh, văn minh hiện đại, nằm ở phía Tây Nam TP Hà Nội, thuộc phường Yên Hòa và Trung Hòa, quận Cầu Giấy và xã Mễ Trì, huyện Từ Liêm.</p>\r\n\r\n<p>Đây là khu vực do Viettel Telecom ĐỘC QUYỀN  cung cấp các dịch vụ các dịch vụ internet. Quý khách liên hệ theo Hotline: 0971.642.888 để được tư vấn, lắp đăt và giải đáp thắc mắc</p>\r\n\r\n<p>Viettel Telecom tự hào là nhà cung cấp các dịch vụ viễn thông hàng đầu Việt Nam vì các lý do: tốc độ cáp quang cao, đường truyền ổn định, chính sách giá tốt cùng dịch vụ chăm sóc sau bán hàng tốt</p>', '<ul>\r\n	<li>Cước phí rẻ nhất chỉ từ&nbsp;<strong>200.000đ/tháng</strong>&nbsp;cho gói tốc độ&nbsp;<strong>20Mbps</strong>&nbsp;( chưa VAT )</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Miễn phí lắp đặt và tặng ngay 1&nbsp;tháng cước áp dụng cho khách hàng trả trước&nbsp;6 tháng.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Đặc biệt ưu đãi dành riêng cho khách hàng trả trước 12 tháng : miễn phí lắp đặt và tặng 2 tháng cước sử dụng</li>\r\n</ul>\r\n', 68, 1, 1, 'Khuyến mại lắp mạng Viettel quận Đống Đa', '&lt;p&gt;Viettel trân trọng gửi đến quý khách hàng chương trình siêu khuyến mãi dành riêng cho khách hàng sinh sống và làm việc trong khu đô thị Nam Trung Yên.&lt;/p&gt;\r\n\r\n&lt;p&gt;KĐT Nam Trung Yên là khu đô thị mới hoàn chỉnh, văn minh hiện đại, nằm ở phía Tây Nam TP Hà Nội, thuộc phường Yên Hòa và Trung Hòa, quận Cầu Giấy và xã Mễ Trì, huyện Từ Liêm.&lt;/p&gt;\r\n\r\n&lt;p&gt;Đây là khu vực do Viettel Telecom ĐỘC QUYỀN  cung cấp các dịch vụ các dịch vụ internet. Quý khách liên hệ theo Hotline: 0971.642.888 để được tư vấn, lắp đăt và giải đáp thắc mắc&lt;/p&gt;\r\n\r\n&lt;p&gt;Viettel Telecom tự hào là nhà cung cấp các dịch vụ viễn thông hàng đầu Việt Nam vì các lý do: tốc độ cáp quang cao, đường truyền ổn định, chính sách giá tốt cùng dịch vụ chăm sóc sau bán hàng tốt&lt;/p&gt;'),
(7, 11, 6, 'Lắp Mạng Viettel tại huyện Thanh Trì', '/viettel/uploads/images/cap-quang-ftth-4-324x235.png', 'lap-mang-viettel-tai-huyen-thanh-tri', '1468045622', '<p>Viettel trân trọng gửi đến quý khách hàng chương trình siêu khuyến mãi dành riêng cho khách hàng sinh sống và làm việc trong khu đô thị Nam Trung Yên.</p>\r\n\r\n<p>KĐT Nam Trung Yên là khu đô thị mới hoàn chỉnh, văn minh hiện đại, nằm ở phía Tây Nam TP Hà Nội, thuộc phường Yên Hòa và Trung Hòa, quận Cầu Giấy và xã Mễ Trì, huyện Từ Liêm.</p>\r\n\r\n<p>Đây là khu vực do Viettel Telecom ĐỘC QUYỀN  cung cấp các dịch vụ các dịch vụ internet. Quý khách liên hệ theo để được tư vấn, lắp đăt và giải đáp thắc mắc</p>\r\n\r\n<p>Viettel Telecom tự hào là nhà cung cấp các dịch vụ viễn thông hàng đầu Việt Nam vì các lý do: tốc độ cáp quang cao, đường truyền ổn định, chính sách giá tốt cùng dịch vụ chăm sóc sau bán hàng tốt</p>', '<p style="text-align:center"><strong>Lắp Mạng&nbsp;Viettel&nbsp;Quận Huyện Thanh Tri</strong></p>\r\n\r\n<p style="text-align:center"><img alt="" src="/viettel/uploads/images/lapmangviettel-6.jpg" style="height:333px; width:660px" /></p>\r\n\r\n<h3><strong>Khuyến mãi&nbsp;lắp mạng Viettel&nbsp;tại Huyện Thanh Trì&nbsp;– TP. Hà Nội áp dụng cho toàn bộ khách hàng đang sinh sống và làm việc tại đây với nhiều ưu đãi cực hấp dẫn.</strong></h3>\r\n\r\n<h4><strong>1/ Khuyến mãi lắp mạng cáp quang Viettel&nbsp;giá rẻ tại Huyện Thanh Trì</strong></h4>\r\n\r\n<ul>\r\n	<li>Hiện tại Huyện Thanh Trì&nbsp;đã được&nbsp;Viettel telecom&nbsp;nâng cấp và bổ sung hạ tầng&nbsp;cáp quangcông nghệ mới, quý khách sẽ lần đầu tiên được trải nghiệm tốc độ vượt trội của&nbsp;cáp quangViettel&nbsp;với cước phí trọn gói hàng tháng cực rẻ.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Trang bị miễn phí ngay modem wifi kết nối cực hiện đại, cực tiện lợi khi sử dụng cho gia đình hay cơ quan công sở, giúp quý khách truy cập internet mọi lúc, mọi nơi</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Với đa dạng các gói cáp quang tốc độ cao từ 20Mbps đến 75Mbps phù hợp với đa số nhu cầu sử dụng của khách hàng</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Cước phí rẻ nhất chỉ từ&nbsp;<strong>200.000đ/tháng</strong>&nbsp;cho gói tốc độ&nbsp;<strong>20Mbps</strong>&nbsp;( chưa VAT )</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Miễn phí lắp đặt và tặng ngay 1&nbsp;tháng cước áp dụng cho khách hàng trả trước&nbsp;6 tháng.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Đặc biệt ưu đãi dành riêng cho khách hàng trả trước 12 tháng : miễn phí lắp đặt và tặng 2 tháng cước sử dụng</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Chỉ cần quý khách nhấc điện thoại lên và gọi cho chúng tôi để được tư vấn lắp đặt. Hotline đăng ký 24/7 tại Huyện Thanh Trì&nbsp;<strong>0971 642 888</strong></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Với dịch vụ tận nhà, nhân viên Viettel&nbsp;sẽ làm hợp đồng cho quý khách và lắp đặt nhanh nhất từ 1 đến 3 ngày sau khi đăng ký</li>\r\n</ul>\r\n\r\n<h5><strong>1.1/ Báo giá khuyến mại các gói&nbsp;cáp quang&nbsp;Viettel&nbsp;hộ gia đình áp dụng tại Huyện Thanh Trì</strong></h5>\r\n\r\n<p>Quý khách hàng có nhu cấp lắp mạng Viettel giá rẻ áp dụng cho hộ gia đình vui lòng tham khảo bảng giá bên dưới.</p>\r\n', 124, 1, 1, 'Lắp Mạng Viettel tại huyện Thanh Trì', '&lt;p&gt;Viettel trân trọng gửi đến quý khách hàng chương trình siêu khuyến mãi dành riêng cho khách hàng sinh sống và làm việc trong khu đô thị Nam Trung Yên.&lt;/p&gt;\r\n\r\n&lt;p&gt;KĐT Nam Trung Yên là khu đô thị mới hoàn chỉnh, văn minh hiện đại, nằm ở phía Tây Nam TP Hà Nội, thuộc phường Yên Hòa và Trung Hòa, quận Cầu Giấy và xã Mễ Trì, huyện Từ Liêm.&lt;/p&gt;\r\n\r\n&lt;p&gt;Đây là khu vực do Viettel Telecom ĐỘC QUYỀN  cung cấp các dịch vụ các dịch vụ internet. Quý khách liên hệ theo để được tư vấn, lắp đăt và giải đáp thắc mắc&lt;/p&gt;\r\n\r\n&lt;p&gt;Viettel Telecom tự hào là nhà cung cấp các dịch vụ viễn thông hàng đầu Việt Nam vì các lý do: tốc độ cáp quang cao, đường truyền ổn định, chính sách giá tốt cùng dịch vụ chăm sóc sau bán hàng tốt&lt;/p&gt;'),
(8, 0, 6, 'Cáp Quang Viettel Fast 20Mbps - 220.000đ/tháng', '/viettel/uploads/images/cap-quang-ftth-4-324x235.png', 'cap-quang-viettel-fast-20mbps---220-000d-thang', '1468050297', '', '<p>dsdsdsd</p>\r\n', 16, 1, 1, 'Cáp Quang Viettel Fast 20Mbps - 220.000đ/tháng', ''),
(9, 11, 6, 'Cáp quang Viettel OFFICE 45Mpbs', '/viettel/uploads/images/a534x462.jpg', 'cap-quang-viettel-office-45mpbs', '1468223326', '', '', 14, 0, 1, 'Cáp quang Viettel OFFICE 45Mpbs', ''),
(10, 16, 0, 'Bài viết trang chủ', '', 'bai-viet-trang-chu', '1468217537', '<p>Khách hàng trả sau hàng tháng: Áp dụng đóng 350.000đ tiền phí lắp đặt ban đầu. Khách hàng trả trước 6 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 7 sử dụng miễn phí. Khách hàng trả trước 12 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 13 và 14 miễn phí</p>', '<h2><strong>Dịch vụ Internet Viettel</strong></h2>\r\n\r\n<p><strong><em>Tốc độ cao, ổn định Giá cước ưu đãi,&nbsp;20Mbps chỉ 220.000đ lắp đặt &lt; 72h.</em></strong></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>1. Chương trình khuyến mại cáp quang Viettel tháng 07/2016</strong></h3>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" style="height:16px; width:28px" />Tư vấn và lắp đặt 24/7.</p>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" style="height:16px; width:28px" />Làm hợp đồng tại nhà.</p>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" style="height:16px; width:28px" />Cam kết lắp đặt trong vòng 72h.</p>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" style="height:16px; width:28px" />Thủ tục đơn giản, nhanh gọn, thời gian lắp đặt từ 10p – 30p.</p>\r\n\r\n<p>Khách hàng chuẩn bị&nbsp;<strong>CMT + chi phí gói cước khi đăng ký với tư vấn viên</strong>.</p>\r\n\r\n<p><img alt="gift_icon" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/gift_icon.gif" style="height:24px; width:24px" />Miễn phí lắp đặt (*) + modem wifi + tặng 2 tháng cước (**)</p>\r\n\r\n<p>(*) Áp dụng cho khách hàng thanh toán trước 6 tháng.</p>\r\n\r\n<p>(**) Áp dụng cho khách hàng thanh toán trước 12 tháng.</p>\r\n\r\n<p><img alt="Dang-ky-ngay" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/Dang-ky-ngay-300x56.gif" style="height:56px; width:300px" /></p>\r\n\r\n<h3>Hotline:&nbsp;<strong>0971.642.888</strong></h3>\r\n\r\n<h3><strong>2. Bảng giá cáp quang Viettel</strong></h3>\r\n\r\n<p><strong>1/ Giá cước gói cáp quang Viettel dành cho hộ gia đình</strong></p>\r\n\r\n<p style="text-align:center"><img alt="" src="/viettel/uploads/images/a534x462.jpg" style="height:462px; width:534px" /></p>\r\n\r\n<p>Phí lắp đặt khi đăng ký cáp quang Viettel:</p>\r\n\r\n<ul>\r\n	<li>Khách hàng trả sau hàng tháng: Áp dụng đóng 350.000đ tiền phí lắp đặt ban đầu</li>\r\n	<li>Khách hàng trả trước 6 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 7 sử dụng miễn phí</li>\r\n	<li>Khách hàng trả trước 12 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 13 và&nbsp;14 miễn phí</li>\r\n	<li>Báo giá sẽ có sự thay đổi theo từng tháng, vậy hãy liên hệ ngay tổng đài chúng tôi để được tư vấn miễn phí.</li>\r\n</ul>\r\n\r\n<p>Ưu việt gói cáp quang VIettel</p>\r\n\r\n<ul>\r\n	<li>Bảo mật thông tin tối đa</li>\r\n	<li>Độ ổn định cao cấp, nhiều gấp 50 – 80 lần so ADSL</li>\r\n	<li>Dễ dàng nâng cấp băng thông</li>\r\n	<li>An toàn thiết bị đầu cuối, không bị sét đánh</li>\r\n	<li>Tích hợp nhiều ứng dụng khác đi kèm: IPTV, Ivoce, Truyền hình số…</li>\r\n</ul>\r\n\r\n<p><strong>2/ Lắp mạng cáp quang Viettel cho công ty, doanh nghiệp khuyến mại lớn.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 5, 0, 1, 'Bài viết trang chủ', 'Khách hàng trả sau hàng tháng: Áp dụng đóng 350.000đ tiền phí lắp đặt ban đầu. Khách hàng trả trước 6 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 7 sử dụng miễn phí. Khách hàng trả trước 12 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 13 và 14 miễn phí'),
(11, 11, 6, 'Lắp mạng internet Viettel tại phường Xuân Nộn', '/viettel/uploads/images/cap-quang-ftth-4-324x235.png', 'lap-mang-internet-viettel-tai-phuong-xuan-non', '1468213136', '<p>Khuyến mại lắp mạng internet Viettel, cáp quang Viettel và truyền hình Viettel miễn phí tại Hà Nội, Đà Nẵng, TP HCM, Hải Phòng, Bình Dương, Cần Thơ và các tỉnh trên toàn quốc. Viettel Telecom, nhà cung cấp dịch vụ lắp mạng Viettel, mạng cáp quang Viettel hàng đầu tại Việt Nam.</p>\r\n\r\n<p>Dịch vụ Internet Viettel</p>\r\n\r\n<p>Tốc độ cao, ổn định Giá cước ưu đãi, 20Mbps chỉ 220.000đ lắp đặt < 72h></p>', '<h2><strong>Dịch vụ Internet Viettel</strong></h2>\r\n\r\n<p><strong><em>Tốc độ cao, ổn định Giá cước ưu đãi,&nbsp;20Mbps chỉ 220.000đ lắp đặt &lt; 72h.</em></strong></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>1. Chương trình khuyến mại cáp quang Viettel tháng 07/2016</strong></h3>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" />Tư vấn và lắp đặt 24/7.</p>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" />Làm hợp đồng tại nhà.</p>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" />Cam kết lắp đặt trong vòng 72h.</p>\r\n\r\n<p><img alt="new" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/new.gif" />Thủ tục đơn giản, nhanh gọn, thời gian lắp đặt từ 10p – 30p.</p>\r\n\r\n<p>Khách hàng chuẩn bị&nbsp;<strong>CMT + chi phí gói cước khi đăng ký với tư vấn viên</strong>.</p>\r\n\r\n<p><img alt="gift_icon" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/gift_icon.gif" />Miễn phí lắp đặt (*) + modem wifi + tặng 2 tháng cước (**)</p>\r\n\r\n<p>(*) Áp dụng cho khách hàng thanh toán trước 6 tháng.</p>\r\n\r\n<p>(**) Áp dụng cho khách hàng thanh toán trước 12 tháng.</p>\r\n\r\n<p><img alt="Dang-ky-ngay" src="http://demo01.marketingviet.net/wp-content/uploads/2015/06/Dang-ky-ngay-300x56.gif" /></p>\r\n\r\n<h3>Hotline:&nbsp;<strong>0971.642.888</strong></h3>\r\n\r\n<h3><strong>2. Bảng giá cáp quang Viettel</strong></h3>\r\n\r\n<p><strong>1/ Giá cước gói cáp quang Viettel dành cho hộ gia đình</strong></p>\r\n\r\n<p><img alt="" src="/viettel/uploads/images/a534x462.jpg" /></p>\r\n\r\n<p>Phí lắp đặt khi đăng ký cáp quang Viettel:</p>\r\n\r\n<ul>\r\n	<li>Khách hàng trả sau hàng tháng: Áp dụng đóng 350.000đ tiền phí lắp đặt ban đầu</li>\r\n	<li>Khách hàng trả trước 6 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 7 sử dụng miễn phí</li>\r\n	<li>Khách hàng trả trước 12 tháng: Miễn phí lắp đặt hoàn toàn, tặng tháng cước thứ 13 và&nbsp;14 miễn phí</li>\r\n	<li>Báo giá sẽ có sự thay đổi theo từng tháng, vậy hãy liên hệ ngay tổng đài chúng tôi để được tư vấn miễn phí.</li>\r\n</ul>\r\n\r\n<p>Ưu việt gói cáp quang VIettel</p>\r\n\r\n<ul>\r\n	<li>Bảo mật thông tin tối đa</li>\r\n	<li>Độ ổn định cao cấp, nhiều gấp 50 – 80 lần so ADSL</li>\r\n	<li>Dễ dàng nâng cấp băng thông</li>\r\n	<li>An toàn thiết bị đầu cuối, không bị sét đánh</li>\r\n	<li>Tích hợp nhiều ứng dụng khác đi kèm: IPTV, Ivoce, Truyền hình số…</li>\r\n</ul>\r\n\r\n<p><strong>2/ Lắp mạng cáp quang Viettel cho công ty, doanh nghiệp khuyến mại lớn.</strong></p>\r\n', 13, 0, 1, 'Lắp mạng internet Viettel tại phường Xuân Nộn', 'Khuyến mại lắp mạng internet Viettel, cáp quang Viettel và truyền hình Viettel miễn phí tại Hà Nội, Đà Nẵng, TP HCM, Hải Phòng, Bình Dương, Cần Thơ và các tỉnh trên toàn quốc. Viettel Telecom, nhà cung cấp dịch vụ lắp mạng Viettel, mạng cáp quang Viettel hàng đầu tại Việt Nam.\r\n\r\nDịch vụ Internet Viettel\r\n\r\nTốc độ cao, ổn định Giá cước ưu đãi, 20Mbps chỉ 220.000đ lắp đặt < 72h>'),
(12, 13, 6, 'Chống trộm xe máy bằng định vị GPS', '/viettel/uploads/images/cap-quang-ftth-4-324x235.png', 'chong-trom-xe-may-bang-dinh-vi-gps', '1468222802', '<p>Dịch vụ SmartMotor của Viettel giám sát và bảo vệ xe máy dựa trên công nghệ định vị vệ tinh toàn cầu GPS (giám sát) và công nghệ GSM (bảo vệ).</p>', '', 21, 0, 1, 'Chống trộm xe máy bằng định vị GPS', 'Dịch vụ SmartMotor của Viettel giám sát và bảo vệ xe máy dựa trên công nghệ định vị vệ tinh toàn cầu GPS (giám sát) và công nghệ GSM (bảo vệ).');

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `idCM` int(11) NOT NULL,
  `idCha` int(11) NOT NULL,
  `TieuDe` varchar(500) NOT NULL,
  `Alias` varchar(500) NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  `NoiBat` tinyint(1) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`idCM`, `idCha`, `TieuDe`, `Alias`, `SoLanXem`, `ThuTu`, `AnHien`, `NoiBat`, `Title`, `Description`) VALUES
(1, 0, 'Báo chí viết về Viettel', 'bao-chi-viet-ve-viettel', 0, 5, 1, 1, 'Báo chí viết về Viettel', ''),
(2, 0, 'Bóng đá', 'bong-da', 3, 4, 1, 1, 'Bóng đá', ''),
(3, 0, 'Cáp quang', 'cap-quang', 138, 3, 1, 1, 'Cáp quang', ''),
(4, 0, 'Gói cước', 'goi-cuoc', 3, 3, 1, 1, 'Gói cước', ''),
(6, 0, 'Không thể bỏ qua', 'khong-the-bo-qua', 90, 1, 1, 1, 'Không thể bỏ qua', '');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `idDM` int(11) NOT NULL,
  `idCha` int(11) NOT NULL,
  `Loai` varchar(100) NOT NULL,
  `TieuDe` varchar(500) NOT NULL,
  `ChuyenMuc` varchar(255) NOT NULL,
  `KieuHienThi` tinyint(1) NOT NULL,
  `Alias` varchar(500) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`idDM`, `idCha`, `Loai`, `TieuDe`, `ChuyenMuc`, `KieuHienThi`, `Alias`, `ThuTu`, `AnHien`, `Title`, `Description`) VALUES
(10, 0, '["menu"]', 'Internet Viettel', '["1","2"]', 1, 'internet-viettel', 1, 1, 'Internet Viettel', ''),
(11, 0, '["menu"]', 'Dịch vụ doanh nghiệp', '["1","2"]', 2, 'dich-vu-doanh-nghiep', 2, 1, 'Dịch vụ doanh nghiệp', ''),
(12, 0, '["menu"]', 'Nexttv', '["1"]', 0, 'nexttv', 3, 1, 'Nexttv', ''),
(13, 10, '["menu"]', 'INTERNET CÁP QUANG VIETTEL', '', 1, 'internet-cap-quang-viettel', 0, 1, 'INTERNET CÁP QUANG VIETTEL', '\r\n Hiện tại Huyện Thanh Trì đã được Viettel telecom nâng cấp và bổ sung hạ tầng cáp quangcông nghệ mới, quý khách sẽ lần đầu tiên được trải nghiệm tốc độ vượt trội của cáp quangViettel với cước phí trọn gói hàng tháng cực rẻ.\r\n'),
(14, 10, '["menu"]', 'Internet Adsl Viettel', '["4"]', 1, 'internet-adsl-viettel', 1, 1, 'Internet Adsl Viettel', ''),
(15, 0, '["right"]', 'Lắp mạng viettel hà nội', '', 2, 'lap-mang-viettel-ha-noi', 2, 1, 'Lắp mạng viettel hà nội', ''),
(16, 0, '["menu"]', 'Trang chủ Viettel', '', 0, 'trang-chu-viettel', 0, 1, 'Trang chủ Viettel', ''),
(17, 0, '["menu"]', 'Liên hệ', '', 0, 'lien-he', 5, 1, 'Liên hệ', '');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucright`
--

CREATE TABLE `danhmucright` (
  `idDM` int(11) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `HienThi` int(11) NOT NULL,
  `DanhMuc` varchar(255) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmucright`
--

INSERT INTO `danhmucright` (`idDM`, `TieuDe`, `HienThi`, `DanhMuc`, `ThuTu`, `AnHien`) VALUES
(1, 'aaa', 1, '["9","10","11"]', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idHinh` int(11) NOT NULL,
  `urlHinh` varchar(500) NOT NULL,
  `Loai` int(11) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idHinh`, `urlHinh`, `Loai`, `ThuTu`, `AnHien`) VALUES
(2, '/viettel/uploads/images/ftth-viettel.jpg', 1, 0, 1),
(3, '/viettel/uploads/images/truyen-hinh-cap.jpg', 0, 1, 1),
(4, '/viettel/uploads/images/Combo-Internet.jpg', 0, 2, 1),
(5, '/viettel/uploads/images/viettel-logo272x90.png', 2, 0, 1),
(6, '/viettel/uploads/images/quang-cao.jpg', 3, 1, 1),
(7, '/viettel/uploads/images/banner_02.png', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemtag`
--

CREATE TABLE `itemtag` (
  `idBV` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  `iditemtag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `idLH` int(11) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DienThoai` varchar(255) NOT NULL,
  `NoiDung` text NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`idLH`, `TieuDe`, `Email`, `DienThoai`, `NoiDung`, `TinhTrang`) VALUES
(1, 'abc', 'a@gmail.com', 'a', 'Khuyến mãi lắp mạng Viettel tại Huyện Thanh Trì – TP. Hà Nội áp dụng cho toàn bộ khách hàng đang sinh sống và làm việc tại đây với nhiều ưu đãi cực hấp dẫn.', 0),
(2, 'abc', 'a@gmail.com', 'a', 'd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `idTag` int(11) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `Alias` varchar(255) NOT NULL,
  `FontSize` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idad`);

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`idBV`);

--
-- Indexes for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`idCM`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`idDM`);

--
-- Indexes for table `danhmucright`
--
ALTER TABLE `danhmucright`
  ADD PRIMARY KEY (`idDM`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idHinh`);

--
-- Indexes for table `itemtag`
--
ALTER TABLE `itemtag`
  ADD PRIMARY KEY (`iditemtag`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`idLH`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`idTag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `idBV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `idCM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `idDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `danhmucright`
--
ALTER TABLE `danhmucright`
  MODIFY `idDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `itemtag`
--
ALTER TABLE `itemtag`
  MODIFY `iditemtag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `idLH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
