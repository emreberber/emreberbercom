-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eyl 2017, 00:47:50
-- Sunucu sürümü: 10.1.25-MariaDB
-- PHP Sürümü: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `emreberbercom`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `api`
--

CREATE TABLE `api` (
  `api_id` int(1) NOT NULL DEFAULT '0',
  `api_recaptcha` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `api_maps` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `api_analytics` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `api_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `api`
--

INSERT INTO `api` (`api_id`, `api_recaptcha`, `api_maps`, `api_analytics`, `api_lastupdate`) VALUES
(0, '', '', 'UA-85774491-1', '2017-09-06 16:28:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `article_language` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `article_category` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `article_date` date NOT NULL,
  `article_status` varchar(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `article_content` text COLLATE utf8_turkish_ci NOT NULL,
  `article_keywords` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `article_author` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `article_language`, `article_category`, `article_date`, `article_status`, `article_content`, `article_keywords`, `article_author`) VALUES
(1, 'Deneme Baslik 1', 'TR', 'PWA', '2017-09-13', '1', '<p>Content denemesi 1</p>\r\n', 'key1 , key2 , key3', 'Emre Berber'),
(2, 'deneme 2', 'ENG', 'Programming', '0000-00-00', '1', '<p>aaa</p>\r\n', 'key4 , key5', 'Emre berber'),
(3, 'Lorem Deneme', 'TR', 'Lorem', '0000-00-00', '1', '<blockquote>\r\n<p><strong>Lorem ipsum dolor sit amet,</strong><strong> </strong>consectetur adipiscing elit. Vivamus quam nulla, hendrerit id metus ac, scelerisque vehicula ipsum. Donec a nisi tortor. Nam mattis pellentesque lectus, id accumsan diam consectetur egestas. Nam sed sem non lorem sollicitudin facilisis at in nunc. Ut a ultricies turpis, vitae sodales neque. Vestibulum consequat faucibus dui, non fermentum elit vestibulum quis. Nulla lobortis luctus nisl, sit amet venenatis mi pulvinar non. Ut quis mollis lorem. Maecenas sed maximus quam. Suspendisse eu gravida nisl. In pulvinar ipsum ac nisi venenatis, ac aliquam nibh sollicitudin. Praesent varius massa in dictum ullamcorper. Pellentesque lacinia lectus velit, id maximus ex dapibus viverra. Donec vulputate velit lectus, ac semper neque consequat sed.</p>\r\n</blockquote>\r\n\r\n<p>Donec tincidunt dolor id mauris tempor interdum. Cras ac euismod dui. Sed semper nibh a velit iaculis accumsan eu quis metus. Aenean scelerisque ipsum non ligula dictum pharetra. Etiam nunc lacus, dapibus sit amet ullamcorper nec, maximus quis metus. In ultricies a metus et egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc convallis urna molestie, bibendum lorem pretium, ornare massa. Donec id cursus est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In semper congue arcu, ut iaculis est elementum vitae. Nulla imperdiet euismod pharetra.</p>\r\n\r\n<p>Nam aliquet sollicitudin tincidunt. Curabitur aliquet massa sit amet dolor tincidunt rutrum. Suspendisse varius iaculis ipsum ac pretium. Quisque sem est, fermentum a aliquet et, imperdiet non leo. Aliquam bibendum lectus est, vel efficitur urna scelerisque non. Duis feugiat porta lacus, quis facilisis erat egestas ac. Fusce sit amet massa nisi. Ut vitae pellentesque elit, vel varius nisl. Quisque porttitor vestibulum ipsum sed venenatis. Cras bibendum rhoncus ligula, eget dignissim erat maximus eu.</p>\r\n\r\n<p>Donec vel varius justo, non lacinia metus. Nullam vehicula augue vitae posuere dictum. Donec vel sapien convallis, iaculis lorem vel, finibus ante. Curabitur nulla eros, lacinia dignissim pellentesque nec, posuere at purus. Aenean finibus leo lacus, non venenatis elit finibus ac. Etiam vel consectetur turpis. Quisque quis purus ut nulla varius porttitor ac ut velit. Phasellus aliquet tempus tortor, nec tempus ligula luctus vitae. Nam porttitor est vitae augue ultricies bibendum. Pellentesque in arcu ut nibh laoreet ultrices. Etiam eros nisi, posuere <code>ornare turpis</code> quis, commodo mattis lacus. In ac commodo turpis. Donec posuere, lacus quis convallis suscipit, neque lectus pulvinar nunc, sit amet condimentum mauris justo in risus.</p>\r\n\r\n<p>Aliquam sed efficitur leo. Nunc commodo urna nisl, at faucibus purus sollicitudin ut. In rutrum at tellus at molestie. Nunc vitae diam sit amet risus hendrerit pellentesque. Aenean a rhoncus nunc. Donec sed ligula aliquam, commodo ipsum ac, porttitor nibh. Donec in tellus ut sapien pulvinar vestibulum sit amet vel eros. Donec egestas sollicitudin ipsum, eu rutrum metus fringilla eu. Vestibulum nibh augue, elementum ut ipsum vehicula, tristique molestie dolor. Mauris volutpat diam mattis, blandit enim id, iaculis ex.</p>\r\n', 'lorem1 , lorem2 , lorem3', 'Emre berber'),
(4, 'JS deneme', 'ENG', 'CKE', '0000-00-00', '1', '<p>&lt;pre&gt;&lt;code class=&quot;php&quot;&gt;</p>\r\n\r\n<p>&lt;?php</p>\r\n\r\n<p>ob_start();</p>\r\n\r\n<p>session_start();</p>\r\n\r\n<p>?&gt;</p>\r\n\r\n<p>&lt;/code&gt;&lt;/pre&gt;</p>\r\n', 'cke1 , cke2', 'Emre Berber'),
(5, 'Cke and js', 'TR', 'cke and js', '0000-00-00', '1', '<pre>\r\n<code class=\"language-php\">&lt;?php \r\n\r\nob_start(); \r\nsession_start(); \r\n\r\n?&gt;</code></pre>\r\n\r\n<p>deneme yazısı</p>\r\n', 'ckejs1 , ckejs2', 'Emre BERBER'),
(6, 'HTML DENEME', 'ENG', '', '0000-00-00', '1', '<pre>\r\n<code class=\"language-html\">&lt;html&gt;\r\n\r\n&lt;body&gt;\r\n\r\n&lt;div class=\"col-md-4\"&gt;SEA&lt;/div&gt;\r\n\r\n&lt;a hred=\"#\"&gt;click&lt;/a&gt;\r\n\r\n&lt;/body&gt;\r\n\r\n&lt;/html&gt;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'Emre Berber'),
(7, 'csharp', '', '', '0000-00-00', '1', '<pre>\r\n<code class=\"language-cs\">console.writeLine(\"merhaba\");</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `home`
--

CREATE TABLE `home` (
  `home_id` int(1) NOT NULL DEFAULT '0',
  `home_bgcolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_navbarbgcolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_blogcolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_namecolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_jobcolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_mailicon` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `home_mailcolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_aboutcolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_socialcolor` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `home_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `home`
--

INSERT INTO `home` (`home_id`, `home_bgcolor`, `home_navbarbgcolor`, `home_blogcolor`, `home_namecolor`, `home_jobcolor`, `home_mailicon`, `home_mailcolor`, `home_aboutcolor`, `home_socialcolor`, `home_lastupdate`) VALUES
(0, '#2F1B41', '#2F1B41', '#08d9d6', '#19212D', '#95989A', 'em-raised_hand', '#95989A', '#95989A', '#95989A', '2017-09-10 01:35:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `profile_photo` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `profile_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `profile_job` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `profile_school` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `profile_department` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `profile_country` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `profile_city` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `profile_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `profile_aboutme` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `profile_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `profile`
--

INSERT INTO `profile` (`profile_id`, `profile_photo`, `profile_name`, `profile_job`, `profile_school`, `profile_department`, `profile_country`, `profile_city`, `profile_mail`, `profile_aboutme`, `profile_lastupdate`) VALUES
(0, 'dist/img/profile.jpg', 'EMRE BERBER', 'Ceng Student at KTU', 'Karadeniz Technical Uiversity', 'Computer Engineering', 'Turkey', 'Trabzon', 'brbr.emre@gmail.com', 'Hi ! , I\'m Emre Berber.Lives in Trabzon / Turkey I\'m coding PHP and C# yet.Also love working with pixels :) In my free times , I designing ', '2017-09-08 20:19:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `setting`
--

CREATE TABLE `setting` (
  `set_id` int(1) NOT NULL DEFAULT '0',
  `set_url` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `set_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `set_description` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `set_keywords` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `set_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `set_favicon` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `set_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `setting`
--

INSERT INTO `setting` (`set_id`, `set_url`, `set_title`, `set_description`, `set_keywords`, `set_author`, `set_favicon`, `set_lastupdate`) VALUES
(0, 'www.emreberber.com', 'Emre Berber', 'Computer Engineering ', 'Computer , Software , Code', 'Emre Berber', 'dist/img/favicon.ico', '2017-09-05 23:34:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social`
--

CREATE TABLE `social` (
  `social_id` int(1) NOT NULL DEFAULT '0',
  `social_twitter` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_linkedin` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_dribbble` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_behance` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_uplabs` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_github` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_codepen` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_stackoverflow` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `social_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `social`
--

INSERT INTO `social` (`social_id`, `social_twitter`, `social_linkedin`, `social_dribbble`, `social_behance`, `social_uplabs`, `social_github`, `social_codepen`, `social_stackoverflow`, `social_lastupdate`) VALUES
(0, 'https://twitter.com/emreberber07', 'https://www.linkedin.com/in/emreberber07/', 'https://dribbble.com/emreberber', 'https://www.behance.net/emreberber', 'https://www.uplabs.com/emreberber', 'https://github.com/emreberber', 'https://codepen.io/emreberber', 'https://stackoverflow.com/users/6262482/emre-berber?tab=profile', '2017-09-06 15:45:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(1) NOT NULL DEFAULT '0',
  `user_username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `user_mail` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `user_ip` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_mail`, `user_ip`, `user_lastupdate`) VALUES
(0, 'emreberber07', 'd41d8cd98f00b204e9800998ecf8427e', 'brbr.emre@gmail.com', '1', '2017-09-07 23:28:08');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`api_id`);

--
-- Tablo için indeksler `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Tablo için indeksler `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Tablo için indeksler `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Tablo için indeksler `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`set_id`);

--
-- Tablo için indeksler `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
