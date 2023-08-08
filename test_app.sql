-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 01:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nameCustomer` varchar(50) DEFAULT NULL,
  `telephoneNumber` varchar(50) DEFAULT NULL,
  `comment` varchar(120) DEFAULT NULL,
  `orderStatus` varchar(50) DEFAULT NULL,
  `idOfProduct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `nameCustomer`, `telephoneNumber`, `comment`, `orderStatus`, `idOfProduct`) VALUES
(42, 'Pavlo Soroka', '+3805555542342', 'lkds;lfskdfklasdk;fkasd;kflads', 'Доставлений', 12033),
(44, 'Pavlo', '+380221312', 'fsadfasdf', 'Новий', 12024),
(52, 'Pavlo', '+380221312', 'fsadfasdf', 'Новий', 12024),
(67, 'Pavlo Soroka', '+3805555542342', 'das', 'Новий', 12033),
(68, 'fsdafasd', '+380213214213', 'fasfsadf', 'Обробляється', 12024),
(85, 'Pavlo Soroka', '380660948443', 'Very nice hoodie :) ', 'Обробляється', 12047);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `article` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `photo`, `is_active`, `article`) VALUES
(1, 'Gucci Boots from Italia1', 'Gucci\'s logo-print boots introduce fresh elements to classic combat styles. Decorated with iconic \'GG\' hardware, this chunky pair is made from coated-canvas and supple leather.', 123, 'https://www.net-a-porter.com/variants/images/30629810019427134/in/w920_q60.jpg', 1, 'NOV-AB-9876-DEFG'),
(2, 'Вбивця орків', 'Бренд FN HERSTAL є провідним виробником вогнепальної зброї, компонентів і систем, що має багату історію та репутацію військово', 12000, 'uploads/1691431574b0qK5u7IHs3HREyRXBEJw8S2Kk1juMOFhX351oqj.jpeg.webp', 1, 'NOV-KL-5432-WXYZ'),
(12023, 'Stone Island Crewneck Sweatshirt', 'Classic crewneck sweatshirt in navy blue.', 150, 'uploads/169152544763012727LR_14_f.jpg', 1, 'NOV-TU-6789-UVWX'),
(12024, 'Stone Island Hooded Sweatshirt', 'Hooded sweatshirt with logo patch in olive green.', 180, 'https://cdn4.yoox.biz/63/63012775PO_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-VW-9012-YZAB'),
(12025, 'Stone Island Zip-Up Sweater', 'Zip-up sweater in black color with side pockets.', 210, 'https://cdn4.yoox.biz/63/63012718VK_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-AB-2345-BCDE'),
(12026, 'Stone Island Turtleneck Knit', 'Warm turtleneck knit in dark grey color.', 190, 'https://cdn4.yoox.biz/16/16249714CF_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-CD-8765-EFGH'),
(12027, 'Stone Island V-Neck Sweater', 'V-neck sweater in burgundy color.', 170, 'https://cdn4.yoox.biz/43/43202020IJ_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-EF-7890-IJKL'),
(12028, 'Stone Island Wool Cardigan', 'Wool cardigan with button closure in navy blue.', 220, 'https://cdn4.yoox.biz/43/43202019PJ_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-XY-5432-MNOP'),
(12029, 'Stone Island Half-Zip Pullover', 'Half-zip pullover in light grey color.', 180, 'https://cdn4.yoox.biz/43/43202012XN_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-KL-1098-QRST'),
(12030, 'Stone Island Knitted Sweater', 'Knitted sweater in olive green color with logo detail.', 190, 'https://cdn4.yoox.biz/43/43202011TP_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-DE-7654-UVWX'),
(12031, 'Stone Island Roll-Neck Sweatshirt', 'Roll-neck sweatshirt in dark blue color.', 160, 'https://cdn4.yoox.biz/43/43202007FE_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-MN-0123-YZAB'),
(12032, 'Stone Island Fleece Jacket', 'Fleece jacket with zip pockets in black color.', 230, 'https://cdn4.yoox.biz/43/43202002LH_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-UV-4567-BCDE'),
(12033, 'Stone Island Quarter-Zip Sweater', 'Quarter-zip sweater in navy blue color.', 180, 'https://cdn4.yoox.biz/43/43202000VN_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-PQ-8901-EFGH'),
(12034, 'Stone Island Wool Pullover', 'Wool pullover in charcoal color with logo patch.', 200, 'https://cdn4.yoox.biz/43/43201998TI_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-RS-3210-IJKL'),
(12035, 'Stone Island Textured Sweater', 'Textured sweater in olive green color.', 170, 'https://cdn4.yoox.biz/43/43202001QM_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-OP-6789-MNOP'),
(12036, 'Stone Island Zip-Front Hoodie', 'Zip-front hoodie in black color with logo print.', 190, 'https://cdn4.yoox.biz/43/43202008UD_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-GH-9876-QRST'),
(12037, 'Stone Island Mock Neck Sweatshirt', 'Mock neck sweatshirt in navy blue color.', 160, 'https://cdn4.yoox.biz/10/10250079RV_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-JK-5432-UVWX'),
(12038, 'Stone Island Wool Blend Sweater', 'Wool blend sweater in dark grey color.', 180, 'https://cdn4.yoox.biz/10/10193064SF_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-TU-2109-YZAB'),
(12039, 'Stone Island Full-Zip Cardigan', 'Full-zip cardigan in olive green color.', 210, 'https://cdn4.yoox.biz/10/10192889HK_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-VW-6543-BCDE'),
(12040, 'Stone Island Crewneck Knit', 'Classic crewneck knit in burgundy color.', 150, 'https://cdn.yoox.biz/10/10192858NL_13_f.jpg', 1, 'NOV-AB-1234-EFGH'),
(12041, 'Stone Island Logo Sweatshirt!', 'Logo sweatshirt in black color.', 170, 'https://cdn4.yoox.biz/16/16249417VG_14_f.jpg?imwidth=530&imdensity=1', 1, 'NOV-CD-7890-IJKL'),
(12042, 'Stone Island Cable Knit Sweater@', 'Cable knit sweater in navy blue color.', 200, 'https://cdn.yoox.biz/43/43202007FE_13_f.jpg', 1, 'NOV-EF-5678-MNOP'),
(12047, 'Stone Island 2', 'Stone Island Hoodie 2', 7777, 'uploads/169152484063012773XF_14_f.jpg', 1, 'NOV-AB-9336-DEFA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `is_admin`) VALUES
(4, 'Pavlo Soroka', 'pashaleet', '202cb962ac59075b964b07152d234b70', 1),
(5, 'Валерій', 'valera1999', '202cb962ac59075b964b07152d234b70', 0),
(6, 'Pavlo Soroka', 'pashaleet', '81dc9bdb52d04dc20036dbd8313ed055', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12050;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
