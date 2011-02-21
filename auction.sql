-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 02 月 19 日 15:21
-- 服务器版本: 5.1.41
-- PHP 版本: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `auction`
--

-- --------------------------------------------------------

--
-- 表的结构 `auctions`
--

CREATE TABLE IF NOT EXISTS `auctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_url` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `pic` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `retail_price` decimal(8,2) NOT NULL,
  `auction_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `bid_increment` decimal(4,2) NOT NULL DEFAULT '1.00',
  `create_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `auctions`
--

INSERT INTO `auctions` (`id`, `short_url`, `name`, `thumb`, `pic`, `description`, `retail_price`, `auction_price`, `price`, `bid_increment`, `create_time`, `end_time`) VALUES
(1, 'apple-ipod-touch-8gb', 'Apple iPod Touch 8GB', ' /uploads/thumb/129795765336.png', 'a:3:{i:0;s:26:" /uploads/129795766497.png";i:1;s:26:" /uploads/129795766543.png";i:2;s:26:" /uploads/129795766562.png";}', '<div style="font-family: Arial, Verdana, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255); word-break: break-word; word-wrap: break-word; margin-top: 5px; margin-right: 5px; margin-bottom: 5px; margin-left: 5px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; overflow-y: auto; "><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>Apple iPod Touch 8GB Newest Generation</strong></p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); ">Pioneering technology built into iPod touch is how you’re able to flick, tap, and pinch. It’s what makes a racing game feel so real. It’s why you’re able to see a friend crack up at your jokes from across the globe. And it’s the reason iPod touch is the most incredible iPod you’ll ever own.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); ">Powered by the custom-designed A4 processor by Apple, the iPod touch can perform complex jobs with power to spare. The multi-touch display ensures easy control by tap, flick or whisk of your fingertips. The remarkable retina display with 960-by-640 resolution - four times the pixels of previous model - makes everything you see and do on it look even more incredible. A built-in three-axis gyroscope paired with the accelerometer make the iPod touch capable of advanced motion sensing such as user acceleration, full 3D attitude, and rotation rate. Two camera, one on the back with backside illumination sensor for HD 720p video recording and one on the front for self-shoot or FaceTime calls, doubles the fun with outstanding flexibility and convenience.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>APPLE A4 PROCESSOR</strong>&nbsp;<br />The Apple A4 chip is behind, or rather underneath, all the fun you can have on iPod touch. Apple engineers designed the A4 chip to be a remarkably powerful yet remarkably power-efficient mobile processor. With it, iPod touch can easily perform complex jobs such as multitasking, editing video, and placing FaceTime calls. All while maximizing battery life. And fun.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>RETINA DISPLAY</strong>&nbsp;<br />There are lots of reasons you won’t want to take your eyes off the new iPod touch. The 960-by-640 backlit LCD display, for one. It packs 326 pixels per inch, making it the highest-resolution iPod screen ever. To achieve this, Apple engineers developed pixels so small — a mere 78 micrometers across — that the human eye can’t distinguish individual pixels. Even though you can’t see them, you’ll definitely notice the difference. Text is remarkably sharp and graphics are incredibly vivid.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>MULTI-TOUCH</strong>&nbsp;<br />When you put your finger on iPod touch, how does it just start doing what you want it to do? It’s a chain reaction, really. The Multi-Touch display layers a protective shield over a capacitive panel that senses your touch using electrical fields. It then transmits that information to the Retina display below it. So you can glide through albums with Cover Flow, flick through photos and enlarge them with a pinch, zoom in and out on a section of a web page, and control game elements precisely.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>TWO CAMERAS</strong>&nbsp;<br />iPod touch captures video with two built-in cameras. It shoots amazing HD 720p video from the back camera. And with its advanced backside illumination sensor, it captures beautiful footage even in low-light settings. All while the built-in microphone records conversations, music, or any audio at the same time. And on the front of iPod touch, the built-in camera is perfect for making FaceTime calls and shooting self-portraits. It’s surprising how much fun can fit into something so small.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>GYRO + ACCELEROMETER</strong>&nbsp;<br />iPod touch just learned some new moves. It now includes a built-in three-axis gyroscope. When paired with the accelerometer, the gyro makes iPod touch capable of advanced motion sensing such as user acceleration, full 3D attitude, and rotation rate. Translation: More motion gestures and greater precision for an even better gaming experience.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>FACETIME COMES TO IPOD TOUCH</strong>&nbsp;<br />Video calling is in full effect on iPod touch. Now your friends can see what you’re up to, when you’re up to it. With the tap of a button, you can wave &quot;hi&quot; while standing in a foreign country, get a second opinion on a pair of boots, or have your friends bear witness to the everyday pranks, bets, and dares they otherwise might have missed — new iPod touch to new iPod touch or iPhone 4 over Wi-Fi. And come face to face with even more fun.</p></div>', '299.00', '1.00', '0.00', '1.00', 1297900800, 1298159999),
(4, 'logitech-m305-wireless-mouse', 'Logitech M305 Wireless Mouse', ' /uploads/thumb/129804203439.jpg', 'a:2:{i:0;s:26:" /uploads/129804205569.jpg";i:1;s:26:" /uploads/129804205595.jpg";}', '<p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>Logitech M305 Wireless Mouse Black</strong></p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); ">Logitech''s M305 cordless optical mouse gives you the comfort of a rubber grip body, ridged scroll wheel, and fast, precise tracking. Plug the receiver into your USB port, and forget it! It’s small enough to stay plugged in, even when you put your laptop in its case. With the intelligent battery management, you’ll get several months of use from your batteries, and the battery power indicator warns you when it’s time to change.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); ">The Logitech M305 offers you smooth cursor control and the high-speed, low friction scroll wheel flies through your documents, side-to-side or up and down, whatever you need to get the job done fast. You can shift to precise click to click control for more delicate tasks. You’ll be amazed at the difference a quality Logitech mouse will make!</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>ERGONOMIC DESIGN</strong>&nbsp;<br />The Logitech M305 features non-slip, rubber side panels and a natural shape to provide comfortable grip and exceptional experience even during long hours of use.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>HIGH-DEFINITION OPTICAL TRACKING</strong>&nbsp;<br />Featuring high-definition optical tracking (1000 dpi), the Logitech M305 provides responsive and smooth cursor control.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>2.4GHZ WIRELESS TECHNOLOGY</strong>&nbsp;<br />The Logitech M305 is armed with advanced 2.4GHz wireless technology to deliver reliable wireless connection with no delays or dropouts even in the busiest wireless environments.</p><p style="font-family: inherit; font-weight: inherit; font-style: inherit; font-size: 13px; text-align: left; margin-top: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 1.4em; color: rgb(59, 59, 59); "><strong>PLUG-AND-FORGET NANO-RECEIVER</strong>&nbsp;<br />The tiny-sized Logitech plug-and-forget nano-receiver is small enough to leave in your notebook, so there''s no need to unplug it when you move around.</p>', '29.00', '1.00', '0.00', '1.00', 1297987200, 1298419199);

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- 表的结构 `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `ip_address` char(16) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 1268889823, 1298128846, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
