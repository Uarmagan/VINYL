-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2018 at 07:15 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinyl`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `email` char(20) NOT NULL,
  `password` char(40) NOT NULL,
  `fName` char(20) NOT NULL,
  `lName` char(20) NOT NULL,
  `address` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `email`, `password`, `fName`, `lName`, `address`) VALUES
(1, 'ua@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Ugur', 'Armagan', '1234 halsted st'),
(2, 'Drake@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Drake', 'Graham', '1546 E Hollywood St'),
(3, 'Rihanna@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Rihanna', 'Fenty', '5843 Belmont St'),
(4, 'CardiB@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Cardi', 'Bee', '1432 Milwaukee ave'),
(5, 'EdSheeran@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Ed', 'Sheeran', '5324 w bryn mawr st');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `FeedbackID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `reviewID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryID` int(11) NOT NULL,
  `albumName` char(20) NOT NULL,
  `artistName` char(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryID`, `albumName`, `artistName`, `cost`, `quantity`) VALUES
(1, 'voluptas', 'Abshire', 5, 7),
(2, 'quisquam', 'Koepp', 83, 7),
(3, 'eos', 'Berge', 90, 4),
(4, 'est', 'Denesik', 89, 7),
(5, 'eius', 'Lowe', 26, 3),
(6, 'voluptatem', 'Champlin', 14, 2),
(7, 'sit', 'Gleason', 96, 5),
(8, 'corrupti', 'Ryan', 77, 8),
(9, 'sed', 'Stiedemann', 37, 3),
(10, 'minus', 'Beier', 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orderItem`
--

CREATE TABLE `orderItem` (
  `orderItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `inventoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderItem`
--

INSERT INTO `orderItem` (`orderItemID`, `orderID`, `inventoryID`) VALUES
(1, 6, 2),
(2, 6, 4),
(3, 7, 8),
(4, 7, 5),
(5, 7, 4),
(6, 8, 8),
(7, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `customerID` int(11) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `customerID`, `total`) VALUES
(6, '2018-04-26', 1, 172),
(7, '2018-04-27', 1, 192),
(8, '2018-04-27', 1, 557);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `fName` char(20) NOT NULL,
  `lName` char(20) NOT NULL,
  `address` char(40) NOT NULL,
  `Email` char(20) NOT NULL,
  `password` char(40) NOT NULL,
  `ownerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`fName`, `lName`, `address`, `Email`, `password`, `ownerID`) VALUES
('Kale', 'Williamson', '145 Rohan Junction Apt. 050\nWest Maryam,', 'lilian80@example.com', 'ce3c16ee7f3d9086a1cac63db0e499a48704e21d', 1),
('Seamus', 'Schmitt', '554 Aracely Mountain\nNew Manuel, LA 4986', 'jadon.schaden@exampl', 'e5458e0eead9718538fc16f1434c5fccd57fd96c', 2),
('Herta', 'Schinner', '4531 Devyn Stream Apt. 810\nWehnerport, M', 'theresa.dare@example', '55479fb2af26d0566aa02c264ba38f4a9815eb70', 3),
('Rosemarie', 'Ebert', '65291 Kihn Well Suite 354\nNew Jayce, AK', 'nick.baumbach@exampl', '58a4443d65385427e39bcda2034322ed2b133aa4', 4),
('Peter', 'Howe', '31192 Dayna Roads Apt. 697\nXanderchester', 'mohammad99@example.n', '5a8069b61adee28f66e5def8e94e96f07a732658', 5),
('Laisha', 'Bednar', '16633 Skiles Lakes Apt. 455\nNew Cordelia', 'christina.leffler@ex', 'c9ae0b355cc2b8227725b8f29b181c4763a99beb', 6),
('Buck', 'Towne', '315 Vincenza Pine\nLake Kendra, AL 28538-', 'schoen.scotty@exampl', 'eb03b64e9151574c6bdc89e6915b9a1aadf87b2f', 7),
('Monique', 'Leannon', '2538 Paige Stravenue Apt. 914\nPort There', 'beatty.hortense@exam', '4a91d093aaf42af55af990dee7817696c40cb39c', 8),
('Delia', 'Brown', '062 Melyna Ports\nWest Allanside, WV 2283', 'fisher.felipa@exampl', 'e4367bd79720ca74dd338effd1adf82b57698011', 9),
('Nathanael', 'Kuhlman', '01228 Britney View\nKoeppchester, KS 8996', 'monahan.emil@example', 'dc9cc9143950ec7b892f92edc9f93caf8bcb5be7', 10),
('first', 'last', 'fake address st', 'owner@owner', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 11),
('test first', 'test last', 'test address', 'test@test', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 12);

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `reviewID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `comment` char(250) NOT NULL,
  `stareRating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeID` int(11) NOT NULL,
  `storeName` char(20) NOT NULL,
  `storeAddress` char(20) NOT NULL,
  `description` char(50) NOT NULL,
  `ownerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeID`, `storeName`, `storeAddress`, `description`, `ownerID`) VALUES
(1, 'assumenda', '22210 Domenic Crossr', 'Consectetur reiciendis in perspiciatis sint conseq', 5),
(2, 'ut', '53361 Brakus Field', 'Harum rerum nobis odit. Aut possimus sequi laudant', 3),
(3, 'et', '342 Jules Pines', 'Ullam assumenda molestiae non maxime fuga ratione', 10),
(4, 'qui', '02739 Buster Mount', 'Vel repellendus enim repellat quas voluptate quo.', 9),
(5, 'possimus', '67016 Hilll Ports Ap', 'Eaque modi quia aliquid laboriosam cumque facere a', 3),
(6, 'commodi', '327 Justice Light Su', 'Quasi impedit illum libero velit perferendis ipsum', 1),
(7, 'impedit', '932 Andres Rest', 'Qui nam non vero natus. Est ipsa possimus sint ad', 2),
(8, 'quidem', '1374 Marianne Street', 'Sit natus nihil quo quia quaerat. Aut consectetur', 9),
(9, 'occaecati', '74111 Armstrong Grov', 'Ipsum eos est ullam mollitia doloremque iure. Dolo', 4),
(10, 'ducimus', '54452 Jonatan Street', 'Eum ut aut mollitia et. Et incidunt qui doloremque', 1),
(11, 'test store', 'test address', 'test store description', 12);

-- --------------------------------------------------------

--
-- Table structure for table `storeInventory`
--

CREATE TABLE `storeInventory` (
  `storeInventoryID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `inventoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storeInventory`
--

INSERT INTO `storeInventory` (`storeInventoryID`, `storeID`, `inventoryID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `storeID` (`storeID`),
  ADD KEY `reviewID` (`reviewID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryID`);

--
-- Indexes for table `orderItem`
--
ALTER TABLE `orderItem`
  ADD PRIMARY KEY (`orderItemID`),
  ADD KEY `orderID` (`orderID`) USING BTREE,
  ADD KEY `inventoryID` (`inventoryID`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerID`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeID`),
  ADD KEY `ownerID` (`ownerID`);

--
-- Indexes for table `storeInventory`
--
ALTER TABLE `storeInventory`
  ADD PRIMARY KEY (`storeInventoryID`),
  ADD UNIQUE KEY `storeInventoryID` (`storeInventoryID`),
  ADD KEY `storeID` (`storeID`) USING BTREE,
  ADD KEY `inventoryID` (`inventoryID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderItem`
--
ALTER TABLE `orderItem`
  MODIFY `orderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `storeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `storeInventory`
--
ALTER TABLE `storeInventory`
  MODIFY `storeInventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`storeID`) REFERENCES `store` (`storeID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`reviewID`) REFERENCES `vinyl2`.`Review` (`reviewID`);

--
-- Constraints for table `orderItem`
--
ALTER TABLE `orderItem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`inventoryID`) REFERENCES `inventory` (`inventoryID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`ownerID`) REFERENCES `owner` (`ownerID`);

--
-- Constraints for table `storeInventory`
--
ALTER TABLE `storeInventory`
  ADD CONSTRAINT `storeinventory_ibfk_1` FOREIGN KEY (`storeID`) REFERENCES `store` (`storeID`),
  ADD CONSTRAINT `storeinventory_ibfk_2` FOREIGN KEY (`inventoryID`) REFERENCES `inventory` (`inventoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
