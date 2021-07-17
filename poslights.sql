-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 09:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poslights`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp`
--

CREATE TABLE `tbl_emp` (
  `emp_id` int(20) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `passw` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `emp_status` varchar(10) NOT NULL,
  `emp_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_emp`
--

INSERT INTO `tbl_emp` (`emp_id`, `user_type`, `fname`, `mname`, `lname`, `uname`, `passw`, `date_added`, `emp_status`, `emp_image`) VALUES
(5, 'Admin', 'AdminFN', 'Admin', 'Admin', 'admin@gmail.com', 'admin', '2021-07-11 16:00:00', 'Active', '1626333825_background19.jpg'),
(32, 'Cashier', 'John1', 'Doe1', 'Doe1', 'johndoe11061132@gmail.com', '123', '2021-07-14 16:00:00', 'Active', '1626333839_background10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod`
--

CREATE TABLE `tbl_prod` (
  `prod_id` int(20) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `height_cm` varchar(10) NOT NULL,
  `width_cm` varchar(10) NOT NULL,
  `length_cm` varchar(10) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `orig_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `stock` int(20) NOT NULL,
  `added_by` int(20) NOT NULL,
  `prod_status` varchar(10) NOT NULL,
  `prod_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prod`
--

INSERT INTO `tbl_prod` (`prod_id`, `prod_name`, `height_cm`, `width_cm`, `length_cm`, `prod_desc`, `category`, `orig_price`, `selling_price`, `date_added`, `stock`, `added_by`, `prod_status`, `prod_img`) VALUES
(13, 'Cylde', '138', '23', '26.6', 'Built-in Moodmaker function adjusts light brightness in 3 levels from its built-in cable switch, Slim Nordic design and innovative technology.', 'Floor', '9500.00', '11500.00', '2021-07-12 16:00:00', 0, 5, 'Active', '1626328962_clyde.jpg'),
(15, 'Coy', '140', '40', '29', 'Featuring a dome shade to match any desk lamp in your room and add elegance to your decor. Given a flawless matte black finish for a subtle touch, and a round base for additional support. ', 'Floor', '7000.00', '8500.00', '2021-07-14 16:00:00', 29, 5, 'Active', '1626329001_coy.jpg'),
(16, 'Drey', '140', '28', '27', ' Inspired by a drafting compass, the lamp’s mariner wood tripod base features hinged legs and antiqued hardware.', 'Floor', '9850.00', '10900.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626329038_drey.jpg'),
(17, 'Gus', '160', '25', '27', 'Stylish too, this lamp brings a hint of vintage industrial character to any room of the house. Its base and classic dome shade are crafted from metal and awash in an aged zinc finish, giving it a rugged-yet-refined look.', 'Floor', '8950.00', '9900.00', '2021-07-14 16:00:00', 28, 5, 'Active', '1626329084_gus.jpg'),
(18, 'Loren', '140', '32', '30', 'The industrial lamp includes 3 Edison-style LED bulbs guarded by cages - Get that vintage factory/warehouse look with a lamp that mixes a bit of steampunk attitude with modern clean lines and minimalism - no bulky shades here! ', 'Floor', '9500.00', '10850.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626329146_loren.jpg'),
(19, 'Cara', '120', '180', '40', 'This chandelier in the weathered oak wood and antique forged iron artisanal finish offers rustic flair in an iconic lantern silhouette. Something about the vintage, weathered look alludes to simpler times, but the crisp edges and bold lines with open frames bring us back to a more modern style. ', 'Grand', '40000.00', '47800.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626329276_cara.jpeg'),
(20, 'Dahlia', '100', '70', '100', 'This neutral ambient light fixture provides comfort with elegance to your dining room, kitchen, or hallway. A series of carefully placed wooden beads harmonize together to create a lovely draping upper canopy and lower airy shade for the three candelabra bulbs.', 'Grand', '29800.00', '37700.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626329431_dahlia.jpg'),
(21, 'Hale', '100', '120', '100', 'The essence of Bohemian interior design blends comfort, eclecticism, and rustic worldliness into one free-flowing expression of individuality. This stunning 3 light chandelier perfectly captures that carefree and relaxed sensibility with its casual distressed light wood and rich finish. ', 'Grand', '26700.00', '30500.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626329560_hale.jpg'),
(22, 'Mira', '100', '140', '100', ' Mira chandelier adds vintage character to any interior with its trendy look, especially gorgeous for a living room, dining room, but also beautiful for the cafe bar. Showcasing a striking silhouette sparked by the Space Race, this  chandelier brings a splash of mid-century modern style as it boosts the brightness in any arrangement.', 'Grand', '16700.00', '20000.00', '2021-07-14 16:00:00', 29, 5, 'Active', '1626329643_mira.jpg'),
(23, 'Oris', '120', '160', '100', 'Modern design lighting inspired by Sputnik style fixtures. It\'s the perfect light fixture to install in the kitchen, dining room, living room, foyers. Crafted from metal, this fixture features a round canopy, a braided cloth cord, and adjustable crossing arms that you can rearrange to suit your needs.', 'Grand', '24000.00', '29850.00', '2021-07-14 16:00:00', 29, 5, 'Active', '1626329742_oris.jpg'),
(24, 'Cal', '60', '50', '80', 'The pendant lamp comes flat pack as a LED tube with attached disks and flexible rods. The rods can be put into the disks, creating a graphical sphere. By changing the configuration of the rods, the pattern can be changed into more helix type curves or crossed.', 'Pendant', '13200.00', '14200.00', '2021-07-14 16:00:00', 28, 5, 'Active', '1626329952_cal.jpg'),
(25, 'Contina', '60', '50', '80', 'An innovatively simple and elegant suspension lamp that can be used as a pendant, hung from a wall, or as a freestanding portable luminaire to create a distinctive ambiance. The resulting piece is an engaging blend of light and shadow, casting shimmering rays and radiating patterns onto space', 'Pendant', '12000.00', '13200.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626329986_contina.jpg'),
(26, 'Groa', '60', '50', '80', ' Modern Pendant Light Chandelier Retro Industrial Hanging Lamp White Dome Ceiling Light Fixtures for Barn Farmhouse Kitchen Living Room Bedroom Home Island Hallway Shop Cafe Decor', 'Pendant', '6000.00', '7600.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626330057_groa.jpg'),
(27, 'Lark', '60', '50', '80', 'This pendant is a cable suspended luminaire that provides direct halogen or fluorescent lighting with subtle indirect lighting. The lamp\'s body is aluminum, while the upper cap is borosilicate sanded glass.', 'Pendant', '5700.00', '6800.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626330169_lark.jpg'),
(28, 'Meg', '60', '50', '80', 'Champagne Gold Pendant Light Classic Metal Cage Chandelier Height Adjustable Hanging Ceiling Light Fixture for Dining Living Room', 'Pendant', '7300.00', '9600.00', '2021-07-14 16:00:00', 28, 5, 'Active', '1626330221_meg.jpg'),
(29, 'Adel', '60', '50', '80', 'a great way to add eye-catching style to your kitchen or entryway in an unexpected manner. Its metal body is finished in a matte black hue, and showcases an open, geometric shape for an industrial-inspired look.', 'Suspension', '12000.00', '14600.00', '2021-07-14 16:00:00', 29, 5, 'Active', '1626330293_adel.png'),
(30, 'Bela', '60', '50', '80', 'Defined by its iconic sputnik silhouette, this 12-light chandelier brings a splash of mid-century modern style as it shines a light over any space. Crafted from metal in a versatile solid finish, this fixture features a spherical body with slender arms spanning out in all directions.', 'Suspension', '12300.00', '14500.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626330334_bela.jpg'),
(31, 'Blaire', '60', '50', '80', ' Pairing a minimalist design with some bold mid-century vibes, this 3-light chandelier is just the way to get a striking look in your space. It\'s made from metal with a single downrod that expands into three gracefully curving arms. ', 'Suspension', '14230.00', '15320.00', '2021-07-14 16:00:00', 29, 5, 'Active', '1626330454_blaire.jpg'),
(32, 'Hades', '60', '50', '80', 'The semi-flush mount features a sputnik design, so you get that eye-catching look without installing a big chandelier. It\'s made from metal and features a rectangular canopy, short downrod, and short spikey arms, all awash in a metallic finish.', 'Suspension', '10000.00', '11500.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626330542_hades.jpg'),
(33, 'Marble', '60', '50', '80', ' Enliven and uplift your room with this effulgent chandelier. Antique bands swirl around stunning crystals and four candelabra bulbs for a glimmering and incandescent accent for any space in need of ambient illumination.', 'Suspension', '12000.00', '13200.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626330588_marble.jpg'),
(34, 'Alton', '40', '30', '29', 'Topped with natural linen shades, these black finish table lamps offer a rich and earthy traditional look for your home. ', 'Table', '7500.00', '8500.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626330639_alton_table_2.jpg'),
(35, 'Candle', '42', '30', '29', 'Illuminate your space in sleek, simple, contemporary style with this table lamp. Crafted from steel in a semi-gloss black finish, this lamp’s body strikes a streamlined silhouette with a tubular stem and a chunky, round pedestal base. ', 'Table', '8500.00', '9990.00', '2021-07-14 16:00:00', 27, 5, 'Active', '1626330689_candle2.jpg'),
(36, 'Christel', '46', '30', '29', 'A sophisticated take on an industrial design, this table lamp lends a touch of buttoned-up appeal to your room\'s aesthetic. ', 'Table', '5550.00', '6880.00', '2021-07-14 16:00:00', 27, 5, 'Active', '1626330763_christel2.jpg'),
(37, 'Eclipse', '43', '30', '29', 'Made from iron in a handsome matte black finish, this charming design showcases a tubular metal body, a chunky circle pedestal base, and an exposed finial bulb ensconced in a clean-cut cylindrical clear glass shade.', 'Table', '7950.00', '8990.00', '2021-07-14 16:00:00', 28, 5, 'Active', '1626330795_eclipse2.jpg'),
(38, 'Jadore', '45', '30', '29', 'This attractive reading light with an AC power outlet features a sturdy metal body with a black finish and antique brass accents. This task lamp is the perfect addition to your office, dorm room, craft room, bedroom, living room, family room, kitchen, or any open concept living space', 'Table', '8000.00', '9300.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626330825_jadore.jpg'),
(42, 'Amos', '20', '15', '12', 'This 1-light swing arm fixture is just what you need to shine a little light wherever you need it. It features a wall-mounted backplate made from stainless steel, and a jointed arm that can be adjusted as you please next to the bed or in an unlit reading corner in the living room.', 'Wall', '3000.00', '4300.00', '2021-07-14 16:00:00', 30, 5, 'Active', '1626331186_amos.jpg'),
(43, 'Break', '20', '15', '12', 'end a light to the nightstand while saving space, or cast a glow over your living room reading nook with this low-profile sconce! Crafted from metal, it features an adjustable arm that lets you direct light exactly where you need it, whether you’re catching up on the latest book club read or simply require dedicated task lighting.', 'Wall', '3500.00', '4800.00', '2021-07-14 16:00:00', 27, 5, 'Active', '1626331226_break.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saleshistory`
--

CREATE TABLE `tbl_saleshistory` (
  `sales_id` int(20) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `prod_name` int(11) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `amount_tendered` decimal(10,2) NOT NULL,
  `sales_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_saleshistory`
--

INSERT INTO `tbl_saleshistory` (`sales_id`, `emp_id`, `prod_name`, `quantity`, `price`, `total`, `amount_paid`, `amount_tendered`, `sales_date`, `order_id`) VALUES
(36, 5, 15, 1, '8500.00', '8500.00', '8500.00', '0.00', '2021-01-14 16:00:00', '60efde54935ba5_Admin'),
(37, 5, 22, 1, '20000.00', '20000.00', '20000.00', '0.00', '2021-02-24 16:00:00', '60efde6b76ac15_Admin'),
(38, 5, 29, 1, '14600.00', '14600.00', '14600.00', '0.00', '2021-03-23 16:00:00', '60efdebd809f15_Admin'),
(40, 5, 28, 2, '9600.00', '19200.00', '19500.00', '300.00', '2021-05-18 16:00:00', '60efdf09eeed55_Admin'),
(41, 5, 24, 2, '14200.00', '28400.00', '28500.00', '100.00', '2021-06-22 16:00:00', '60efdf22662435_Admin'),
(43, 5, 45, 6, '3800.00', '22800.00', '23000.00', '200.00', '2021-10-25 16:00:00', '60efe0024fc555_Admin'),
(45, 5, 36, 3, '6880.00', '20640.00', '20700.00', '60.00', '2021-12-18 16:00:00', '60efe0397f2a75_Admin'),
(46, 5, 31, 1, '15320.00', '15320.00', '15500.00', '180.00', '2021-08-18 16:00:00', '60efe05b82d0a5_Admin'),
(47, 5, 43, 3, '4800.00', '14400.00', '15000.00', '600.00', '2021-07-14 16:00:00', '60eff9329d2a15_Admin'),
(49, 32, 17, 1, '9900.00', '9900.00', '222.00', '-9678.00', '0000-00-00 00:00:00', '60f175ce2ba8632_John1'),
(50, 32, 17, 1, '9900.00', '9900.00', '2344.00', '-7556.00', '0000-00-00 00:00:00', '60f17effd964c32_John1'),
(51, 5, 46, 2, '12.00', '24.00', '25.00', '1.00', '0000-00-00 00:00:00', '60f1a9e4b572f5_AdminFN'),
(52, 5, 13, 29, '11500.00', '333500.00', '12333211.00', '11999711.00', '0000-00-00 00:00:00', '60f1aa33851c95_AdminFN'),
(53, 5, 46, 1, '12.00', '12.00', '123.00', '111.00', '0000-00-00 00:00:00', '60f1b0d02293e5_AdminFN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_emp`
--
ALTER TABLE `tbl_emp`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `tbl_prod`
--
ALTER TABLE `tbl_prod`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_name` (`prod_name`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_saleshistory`
--
ALTER TABLE `tbl_saleshistory`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `gg` (`emp_id`),
  ADD KEY `pn` (`prod_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_emp`
--
ALTER TABLE `tbl_emp`
  MODIFY `emp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_prod`
--
ALTER TABLE `tbl_prod`
  MODIFY `prod_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_saleshistory`
--
ALTER TABLE `tbl_saleshistory`
  MODIFY `sales_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_prod`
--
ALTER TABLE `tbl_prod`
  ADD CONSTRAINT `Foreign_cus` FOREIGN KEY (`added_by`) REFERENCES `tbl_emp` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_saleshistory`
--
ALTER TABLE `tbl_saleshistory`
  ADD CONSTRAINT `gg` FOREIGN KEY (`emp_id`) REFERENCES `tbl_emp` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
