-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Oca 2022, 10:18:24
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ev`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilanlar`
--

CREATE TABLE `ilanlar` (
  `ev_sahibi` text NOT NULL,
  `aciklama` text NOT NULL,
  `oda_sayisi` int(11) NOT NULL,
  `salon_sayisi` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `banyo_sayisi` int(11) NOT NULL,
  `bina_yasi` int(11) NOT NULL,
  `kat` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `ilan_tarihi` datetime NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ilanlar`
--

INSERT INTO `ilanlar` (`ev_sahibi`, `aciklama`, `oda_sayisi`, `salon_sayisi`, `fiyat`, `banyo_sayisi`, `bina_yasi`, `kat`, `m2`, `ilan_tarihi`, `id`) VALUES
('tarik', 'BAHÇELİ MÜSTAKİL EV', 3, 4, 5500, 2, 4, 8, 270, '2021-12-29 12:31:01', 7),
('tarik', 'GÖL MANZARALI', 3, 1, 1500, 2, 1, 4, 160, '2021-12-29 23:35:05', 8),
('mehmet', 'ORMANIN İÇERİSİNDE DOĞA İLE İÇ İÇE', 3, 1, 2000, 1, 10, 12, 160, '2021-12-30 00:34:25', 9),
('mehmet', 'SAHİBİNDEN LÜKS VİLLA', 1, 1, 1200, 1, 1, 6, 70, '2021-12-30 00:34:58', 10),
('selin', 'SİTE İÇERİSİNDE NEZİH', 3, 1, 1800, 1, 20, 15, 180, '2021-12-30 01:13:59', 11),
('selin', 'İÇİ YAPILI MÜKEMMEL EV', 12, 4, 24000, 4, 12, 1, 320, '2021-12-30 01:14:38', 12);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(3, 'admin', '$2y$10$z7QkzUYSobRh42p6qKm70emvMgNA.74n2y/ZRukdz4SAbl61a9goa', 'atarikaltunn@gmail.com', '2021-12-27 23:00:54'),
(5, 'tarik', '$2y$10$fYM/k9S7/GUktOIGlQs7z.RvF5rCDvzpo7tCsvKGKzbQNNll.OH.C', 'tarik@gmail.com', '2021-12-28 01:28:58'),
(6, 'mehmet', '$2y$10$WS.tn/af2jgaiJUSX/rMF.MpkRFV8bDXyU6AWoyb8FifUovVTGh3u', 'mehmet@gmail.com', '2021-12-30 00:33:41'),
(7, 'selin', '$2y$10$SCurkmK7bKArV.mJwpavQuvchR4wR5r2gQN5SLqYz2PavvJfWVlqa', 'selin@gmail.com', '2021-12-30 01:12:18'),
(8, 'ahmet', '$2y$10$SCsg7DRFx8cU8X6x8P0soOj.gBGQxZjlUf76Fz6oK8CcApUCnr2eS', 'ahmet@gmail.com', '2022-01-04 15:55:36');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ilanlar`
--
ALTER TABLE `ilanlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ilanlar`
--
ALTER TABLE `ilanlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
