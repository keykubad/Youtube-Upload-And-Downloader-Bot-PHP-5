-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Oca 2014, 20:06:16
-- Sunucu sürümü: 5.6.12-log
-- PHP Sürümü: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `youtube`
--
CREATE DATABASE IF NOT EXISTS `youtube` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `youtube`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `botcek`
--

CREATE TABLE IF NOT EXISTS `botcek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bot_url` text NOT NULL,
  `bot_adi` text NOT NULL,
  `aciklama_ilk` text NOT NULL,
  `aciklama_son` text NOT NULL,
  `baslik_ilk` text NOT NULL,
  `baslik_son` text NOT NULL,
  `etiket_ilk` text NOT NULL,
  `etiket_son` text NOT NULL,
  `video_ilk` text NOT NULL,
  `video_son` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `botcek`
--

INSERT INTO `botcek` (`id`, `bot_url`, `bot_adi`, `aciklama_ilk`, `aciklama_son`, `baslik_ilk`, `baslik_son`, `etiket_ilk`, `etiket_son`, `video_ilk`, `video_son`) VALUES
(1, 'http://www.zapkolik.com/video/alexin-agzini-acik-birakan-gol-605916', '1- Zapkolik.Com Video Botu', '<meta name="description" content="', '" />', '<title>', '</title>', '<meta property="og:title" content="', '" />', '<meta name="twitter:player:stream" content="', '"/>'),
(2, 'http://videonuz.ensonhaber.com/izle/rus-savas-gemileri-canakkale-bogazi-ni-gecti', '2- Ensonhaber.com Video Botu', '<meta name="description" content="', '">', '<title>', '</title>', '<meta name="keywords" content="', '" >', '&video=', '"/>'),
(3, 'http://www.vidivodo.com/video/roman-oyun-havasi-dans-sov/590060', '3- Vidivodo.com Video Botu', '<meta property="og:description" content="', '" />', '<meta property="og:title" content="', '" />', '<meta name="keywords" content="', '" />', '<meta itemprop="thumbnailUrl" content="', '.jpg" />'),
(4, 'http://www.bing.com/videos/watch/video/most-unusual-homes-in-the-world/1h9paon', '4- Bing.com Video Botu', '<meta property="og:description" content="', '" />', '<meta property="og:title" content="', '" />', '<meta property="og:title" content="', '" />', '1002, url: ''', ''', width'),
(5, 'http://www.gamespot.com/puppeteer/videos/puppeteer-video-review-6414108/', '5- Gamespot.com Video Botu', '<meta property="og:description" content="', '" />', '<title>', '</title>', '<title>', '</title>', '&u=', '" controls'),
(6, 'http://www.ign.com/videos/2013/09/05/real-gang-members-feature-as-voice-actors-in-gta-v', '6- IGN.com Video Botu', '<meta name="description" content="', '">', '<title>', '</title>', '<title>', '</title>', '<source id="iPadVideoSource_0" src="', '" media="'),
(7, 'http://www.yazete.com/video-galeri-yeni/kurtlar-vadisi-pusu-196-bolum-fragmani-hd-8328/', '7- Yazete.com Video Botu', '<meta name="description" content="', '" />', '<meta property="og:title" content="', '">', '<meta name="keywords" content="', '" />', 'file: "', '", image'),
(8, 'http://www.metacafe.com/watch/3399304/arnold_weightlifting_challenge_arnold_weightlifting_competition_2010/', '8- Metacafe.com Video Botu', '<meta property="og:description" content="', '" />', '<meta property="og:title" content="', '" />', '<meta name="keywords" content="', '" />', '%22mediaURL%22%3A%22', '%22%2C%22access%22%3A%5B%7B%22key%22'),
(9, 'http://www.milliyet.tv/video-izle/Bu-koyun-oyle-bir-ozelligi-var-ki----C1sxLDuZiawM.html', '9- Milliyet.tv Video Botu', '<div class="detTxt" itemprop="description">', '<span class="detSpan">', '<title>', '</title>', '<meta itemprop="keywords" content="', '">', 'videoMp4Url = ''', ''';'),
(10, 'https://www.facebook.com/photo.php?v=504735456306281', '10- Facebook.com Video Botu', '<span class="hasCaption"><br />', '" rel="nofollow nofollow" target="_blank"', '<span class="hasCaption"><br />', '" rel="nofollow nofollow" target="_blank"', '<span class="hasCaption"><br />', '" rel="nofollow nofollow" target="_blank"', 'sd_src', 'thumbnail_src'),
(11, 'http://www.dailymotion.com/video/x1938km_cat-plays-theremin_animals', '11- Dailymotion.com Video Botu', '<meta name="description" content="', '" />', '<title>', '</title>', '<meta name="keywords" content="', '" />', 'video_url', 'daily_video_link');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
