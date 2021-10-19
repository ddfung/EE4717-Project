-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2021 at 03:24 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `shoes_table`
--

CREATE TABLE IF NOT EXISTS `shoes_table` (
  `product_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `color` text NOT NULL,
  `price` float NOT NULL,
  `size` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `img_diagonal` text NOT NULL,
  `img_side` text NOT NULL,
  `img_back` text NOT NULL,
  `img_frontside` text NOT NULL,
  `img_top` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoes_table`
--

INSERT INTO `shoes_table` (`product_id`, `category`, `name`, `description`, `color`, `price`, `size`, `quantity`, `img_diagonal`, `img_side`, `img_back`, `img_frontside`, `img_top`) VALUES
(1, 'women', 'CONVERSE X JOHN ELLIOTT SKID GRIP OX\r\n', 'Converse is joined by designer John Elliott for this latest take on the Skid Grip. Inspired by Californian skaters, it features a canvas upper that’s decorated with a lichen-inspired texture. For a premium fit, an OrthoLite® sockliner ensures a cushioning feel with every wear.\r\n\r\n', 'OAK, GREEN & EGRET\r\n', 185, 'US 6,US 7,US 8,US 9', 10, 'converseJohnElliot/converseJohnElliot.PNG', 'converseJohnElliot/converseJohnElliot_side.PNG', 'converseJohnElliot/converseJohnElliot_back.PNG', 'converseJohnElliot/converseJohnElliot_backside.PNG\r\n', 'converseJohnElliot/converseJohnElliot_top.PNG'),
(2, 'men', 'ADIDAS X JAMES BOND ULTRABOOST 20\r\n', 'Fusing the sophistication of James Bond with the style and functionality of adidas, these UltraBoost 20 running shoes celebrate the release of 007’s latest adventure No Time To Die. This pair show off a Q-inspired design that includes a hidden pocket in the lace-cage of the shoe, which can store your own Bond-esque gadgets. With foot-hugging knit uppers and Boost™ midsoles for superior cushioning, they promise comfort with every step, while underfoot you’ll find a rubber outsole, which is printed to look like forged carbon. The tongue, meanwhile, features 007’s gun barrel motif, while the sockliner provides the Q Branch seal of approval.\r\n\r\n', 'CORE BLACK & METALLIC IRON\r\n', 295, 'US 6,US 7,US 8,US 9', 10, 'adidasJamesBondUB20/adidasJamesBondUB20.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_side.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_back.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_frontside.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_top.PNG'),
(3, 'women', 'NIKE AIR FORCE 1 07 LV8 M2Z2\r\n', 'Nike’s Air Force 1 has long been an icon of both basketball and streetwear, ever since it first hit the courts back in 1982. And this pair has all the classic features — like the Air-cushioned sole and the chunky, b-ball-focused look — though there are some eco-minded additions. They’re made using 20% recycled content by weight, and feature natural dye — which is referenced at the heels and tongues — worked into its accents. There’s even cork worked into the outer sole, too, to finish.\r\n\r\n', 'WHITE, OBSIDIAN, BLACK & VOLT\r\n', 159, 'US 6,US 7,US 8,US 9', 10, 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_Diagonal.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_side.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_back.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_frontside.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_top.png'),
(4, 'men', 'COMME DES GARCONS PLAY X CONVERSE CHUCK TAYLOR 1970S HI\r\n', 'One of the most sought-after collaborative sneakers, Converse and Comme des Garçons PLAY’s Chuck Taylor Hi teams a ''70s classic with an adorable streetwear icon. The Japanese label’s doe-eyed heart mascots peer out lovingly from the sidewall, their ruby-red colour contrasting vibrantly with the shoe’s off-white upper. In keeping with the style’s sporty heritage, it’s trimmed with high foxing tape and a matching rubber toe cap..\r\n\r\n', 'BEIGE', 215, 'US 6,US 7,US 8,US 9', 10, 'garconsConverse/garconsConverseDiagonal_650px.png', 'garconsConverse/garconsConverseSide_650px.png', 'garconsConverse/garconsConverseBack_650px.png', 'garconsConverse/garconsConverseBackside_650px.png', 'garconsConverse/garconsConverseTop_650px.png'),
(5, 'men', 'COMME DES GARCONS PLAY X CONVERSE CHUCK TAYLOR 1970S HI\r\n', 'One of the most sought-after collaborative sneakers, Converse and Comme des Garçons PLAY’s Chuck Taylor Hi teams a ''70s classic with an adorable streetwear icon. The Japanese label’s doe-eyed heart mascots peer out lovingly from the sidewall, their ruby-red colour contrasting vibrantly with the shoe’s off-white upper. In keeping with the style’s sporty heritage, it’s trimmed with high foxing tape and a matching rubber toe cap..\r\n\r\n', 'BEIGE', 215, 'US 6,US 7,US 8,US 9', 10, 'garconsConverse/garconsConverseDiagonal_650px.png', 'garconsConverse/garconsConverseSide_650px.png', 'garconsConverse/garconsConverseBack_650px.png', 'garconsConverse/garconsConverseBackside_650px.png', 'garconsConverse/garconsConverseTop_650px.png'),
(6, 'men', 'NIKE AIR FORCE 1 07 LV8 M2Z2\r\n', 'Nike’s Air Force 1 has long been an icon of both basketball and streetwear, ever since it first hit the courts back in 1982. And this pair has all the classic features — like the Air-cushioned sole and the chunky, b-ball-focused look — though there are some eco-minded additions. They’re made using 20% recycled content by weight, and feature natural dye — which is referenced at the heels and tongues — worked into its accents. There’s even cork worked into the outer sole, too, to finish.\r\n\r\n', 'WHITE, OBSIDIAN, BLACK & VOLT\r\n', 159, 'US 6,US 7,US 8,US 9', 10, 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_Diagonal.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_side.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_back.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_frontside.png', 'nikeairforce1_07_LV8/nikeairforce1_07_LV8_top.png'),
(7, 'men', 'ADIDAS X JAMES BOND ULTRABOOST 20\r\n', 'Fusing the sophistication of James Bond with the style and functionality of adidas, these UltraBoost 20 running shoes celebrate the release of 007’s latest adventure No Time To Die. This pair show off a Q-inspired design that includes a hidden pocket in the lace-cage of the shoe, which can store your own Bond-esque gadgets. With foot-hugging knit uppers and Boost™ midsoles for superior cushioning, they promise comfort with every step, while underfoot you’ll find a rubber outsole, which is printed to look like forged carbon. The tongue, meanwhile, features 007’s gun barrel motif, while the sockliner provides the Q Branch seal of approval.\r\n\r\n', 'CORE BLACK & METALLIC IRON\r\n', 295, 'US 6,US 7,US 8,US 9', 10, 'adidasJamesBondUB20/adidasJamesBondUB20.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_side.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_back.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_frontside.PNG', 'adidasJamesBondUB20/adidasJamesBondUB20_top.PNG'),
(8, 'men', 'CONVERSE X JOHN ELLIOTT SKID GRIP OX\r\n', 'Converse is joined by designer John Elliott for this latest take on the Skid Grip. Inspired by Californian skaters, it features a canvas upper that’s decorated with a lichen-inspired texture. For a premium fit, an OrthoLite® sockliner ensures a cushioning feel with every wear.\r\n\r\n', 'OAK, GREEN & EGRET\r\n', 185, 'US 6,US 7,US 8,US 9', 10, 'converseJohnElliot/converseJohnElliot.PNG', 'converseJohnElliot/converseJohnElliot_side.PNG', 'converseJohnElliot/converseJohnElliot_back.PNG', 'converseJohnElliot/converseJohnElliot_backside.PNG\r\n', 'converseJohnElliot/converseJohnElliot_top.PNG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
