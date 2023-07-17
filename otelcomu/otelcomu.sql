-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2020, 23:11:07
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otelcomu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gecicirapor`
--

CREATE TABLE `gecicirapor` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `giris` date NOT NULL,
  `cikis` date NOT NULL,
  `tarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gecicirapor`
--

INSERT INTO `gecicirapor` (`id`, `ad`, `soyad`, `telefon`, `giris`, `cikis`, `tarih`) VALUES
(1, 'dsa', 'das', '14', '2020-05-17', '2020-05-26', '2020-05-19 15:57:17'),
(2, 'dsa', 'asd', '14', '2020-05-23', '2020-05-30', '2020-05-19 15:57:22'),
(3, 'fbgnf', 'bgn', '286', '2020-05-19', '2020-05-23', '2020-05-19 15:59:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odalar`
--

CREATE TABLE `odalar` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `fiyat` float NOT NULL,
  `ozellik` text NOT NULL,
  `konum` text NOT NULL,
  `degerlendirme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `odalar`
--

INSERT INTO `odalar` (`id`, `ad`, `fiyat`, `ozellik`, `konum`, `degerlendirme`) VALUES
(2, 'standart oda', 100, 'wifi,bogaz manzarası, oda kahvaltısı', 'Çanakkale/Asos', 5),
(3, 'deluxe oda', 200, 'wifi, aqua park , oda kahvaltısı', 'Çanakkale/Biga', 4),
(4, 'standart oda-2', 150, 'wifi , 3 öğün servis , araba hizmeti', 'Düzce', 4),
(5, 'deluxe oda2', 250, 'wifi,bogaz manzarası, 3 öğün oda servis', 'Çanakkele/Merkez', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rapor`
--

CREATE TABLE `rapor` (
  `id` int(11) NOT NULL,
  `odaid` int(11) NOT NULL,
  `rezerveid` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rapor`
--

INSERT INTO `rapor` (`id`, `odaid`, `rezerveid`, `tarih`) VALUES
(69, 2, 68, '2020-05-19 15:57:17'),
(70, 2, 69, '2020-05-19 15:57:22'),
(73, 2, 70, '2020-05-19 15:59:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyonbilgileri`
--

CREATE TABLE `rezervasyonbilgileri` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `odaid` int(11) NOT NULL,
  `Ad` varchar(30) NOT NULL,
  `Soyad` varchar(30) NOT NULL,
  `Telno` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Odasayisi` int(11) NOT NULL,
  `Kisisayisi` int(11) NOT NULL,
  `Giristarihi` date NOT NULL,
  `Cikistarihi` date NOT NULL,
  `Rezervetarihi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `rezervasyonbilgileri`
--

INSERT INTO `rezervasyonbilgileri` (`id`, `uyeid`, `odaid`, `Ad`, `Soyad`, `Telno`, `Email`, `Odasayisi`, `Kisisayisi`, `Giristarihi`, `Cikistarihi`, `Rezervetarihi`) VALUES
(68, 14, 2, 'dsa', 'das', '14', 'qs@das', 1, 4, '2020-05-17', '2020-05-26', '2020-05-17 23:17:20'),
(69, 14, 2, 'dsa', 'asd', '14', 'sa@sda', 2, 4, '2020-05-23', '2020-05-30', '2020-05-17 23:17:51'),
(70, 14, 2, 'fbgnf', 'bgn', '286', 'ad@df', 1, 2, '2020-05-19', '2020-05-23', '2020-05-19 15:59:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kulad` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sifre` varchar(200) DEFAULT NULL,
  `adsoyad` varchar(50) DEFAULT NULL,
  `uyeliktarihi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kulad`, `email`, `sifre`, `adsoyad`, `uyeliktarihi`) VALUES
(14, 'talha22', 'talha@gmail.com', '5fb9dd57bb23234a030991441d016cb2b9e487ae984afe02292a6d5daae55265', 'İsmail Talha İpek', '2020-05-16 23:36:13'),
(15, 'kerem20', 'kerme@gmail.com', '6cabfb0f5b06929b91b5d1a58cf85fdf4702ff8ba536bd4fd4804ff899c1a044', 'Kerem Kaçak', '2020-05-16 23:48:46'),
(16, 'berkay21', 'berkay@gmail.com', '5ac4c93ea3e6fef5116d9cd3b3ab4f789399c8ab0ee42244fb3654b126996af3', 'Berkay Kuru', '2020-05-16 23:49:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `id` int(11) NOT NULL,
  `kulad` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `kulad`, `sifre`) VALUES
(1, 'tkb', 'f61532c34f711a6fab5bbee86bdbadc1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `gecicirapor`
--
ALTER TABLE `gecicirapor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odalar`
--
ALTER TABLE `odalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezervasyonbilgileri`
--
ALTER TABLE `rezervasyonbilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `gecicirapor`
--
ALTER TABLE `gecicirapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `odalar`
--
ALTER TABLE `odalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyonbilgileri`
--
ALTER TABLE `rezervasyonbilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
