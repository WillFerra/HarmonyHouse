-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2024 at 06:10 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HarmonyHouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bank`
--

CREATE TABLE `Bank` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bank`
--

INSERT INTO `Bank` (`id`, `name`) VALUES
(1, 'HSBC Malta'),
(2, 'Bank of Valletta'),
(3, 'APS Bank');

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `seatId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `paymentTerms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`id`, `userId`, `seatId`, `eventId`, `paymentTerms`) VALUES
(1, 1, 2, 1, 1),
(2, 1, 1, 1, 1),
(3, 2, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`id`, `name`) VALUES
(1, 'Malta'),
(2, 'United Kingdom'),
(3, 'France'),
(4, 'Belgium'),
(5, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `Equipment`
--

CREATE TABLE `Equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `serialNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Equipment`
--

INSERT INTO `Equipment` (`id`, `name`, `price`, `serialNo`) VALUES
(1, 'F2 Mic Lapelle', 12, '123DW340'),
(2, 'Blue Light D30', 5, 'BLGHT2900');

-- --------------------------------------------------------

--
-- Table structure for table `EquipmentBooking`
--

CREATE TABLE `EquipmentBooking` (
  `id` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `equipmentId` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `paymentTerms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EquipmentBooking`
--

INSERT INTO `EquipmentBooking` (`id`, `eventId`, `equipmentId`, `bookingId`, `paymentTerms`) VALUES
(1, 1, 2, 2, 4),
(2, 2, 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `id` int(11) NOT NULL,
  `eventName` varchar(150) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `organiserPrice` float NOT NULL,
  `eventStatus` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `paymentTerms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`id`, `eventName`, `eventDate`, `eventTime`, `organiserPrice`, `eventStatus`, `user`, `paymentTerms`) VALUES
(1, 'St. Joseph Concert', '2024-03-19', '19:30:00', 10, 1, 2, 4),
(2, 'Back to the 80s Concert', '2024-04-10', '18:00:00', 5, 3, 2, 3),
(3, 'ChristmasFest', '2024-12-23', '19:30:00', 5, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `PaymentDetails`
--

CREATE TABLE `PaymentDetails` (
  `id` int(11) NOT NULL,
  `cardNo` varchar(19) NOT NULL,
  `bankId` int(11) NOT NULL,
  `expDate` varchar(5) NOT NULL,
  `CVV` smallint(6) NOT NULL,
  `holderName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PaymentDetails`
--

INSERT INTO `PaymentDetails` (`id`, `cardNo`, `bankId`, `expDate`, `CVV`, `holderName`) VALUES
(1, '1234 1234 5678 5678', 1, '02/26', 345, 'Thomas Bajada'),
(2, '8367 9274 9478 8463', 3, '11/24', 457, 'Britney Portelli');

-- --------------------------------------------------------

--
-- Table structure for table `PaymentTerms`
--

CREATE TABLE `PaymentTerms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PaymentTerms`
--

INSERT INTO `PaymentTerms` (`id`, `name`) VALUES
(1, 'Paid upon Booking'),
(2, 'Pay at the Premises'),
(3, '50% Advanced - 50% After'),
(4, 'To pay after Event');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'Audience'),
(2, 'Event Organiser'),
(3, 'Equipment Staff'),
(4, 'Usher');

-- --------------------------------------------------------

--
-- Table structure for table `Seat`
--

CREATE TABLE `Seat` (
  `id` int(11) NOT NULL,
  `seatNo` int(11) NOT NULL,
  `seatRow` int(11) NOT NULL,
  `seatSection` int(11) NOT NULL,
  `venuePrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Seat`
--

INSERT INTO `Seat` (`id`, `seatNo`, `seatRow`, `seatSection`, `venuePrice`) VALUES
(1, 1, 1, 1, 25),
(2, 2, 1, 1, 25),
(3, 18, 23, 2, 20),
(4, 15, 43, 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Section`
--

CREATE TABLE `Section` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Section`
--

INSERT INTO `Section` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`id`, `name`) VALUES
(1, 'Confirmed'),
(2, 'Cancelled'),
(3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `Street`
--

CREATE TABLE `Street` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `townId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Street`
--

INSERT INTO `Street` (`id`, `name`, `townId`) VALUES
(1, 'Giovanni Barbara', 1),
(2, 'San Mark', 2),
(3, 'L-Imnarja', 3),
(4, 'San Gorg', 4),
(5, 'Oxford', 5),
(6, 'Bart', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Town`
--

CREATE TABLE `Town` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Town`
--

INSERT INTO `Town` (`id`, `name`, `countryId`) VALUES
(1, 'Hamrun', 1),
(2, 'Valletta', 1),
(3, 'Nadur', 1),
(4, 'Victoria (Rabat - Gozo)', 1),
(5, 'London', 2),
(6, 'Ghent', 4),
(7, 'Paris', 3),
(8, 'Munich', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `streetId` int(11) NOT NULL,
  `paymentDetailsId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `surname`, `address`, `streetId`, `paymentDetailsId`, `roleId`) VALUES
(1, 'Britney', 'Portelli', '23', 3, 2, 1),
(2, 'Thomas', 'Bajada', '123', 1, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bank`
--
ALTER TABLE `Bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_ibfk_1` (`userId`),
  ADD KEY `booking_ibfk_2` (`seatId`),
  ADD KEY `booking_ibfk_3` (`eventId`),
  ADD KEY `booking_ibfk_4` (`paymentTerms`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Equipment`
--
ALTER TABLE `Equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `EquipmentBooking`
--
ALTER TABLE `EquipmentBooking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventId` (`eventId`),
  ADD KEY `bookingId` (`bookingId`),
  ADD KEY `paymentTerms` (`paymentTerms`),
  ADD KEY `equipmentbooking_ibfk_2` (`equipmentId`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventStatus` (`eventStatus`),
  ADD KEY `user` (`user`),
  ADD KEY `paymentTerms` (`paymentTerms`);

--
-- Indexes for table `PaymentDetails`
--
ALTER TABLE `PaymentDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankId` (`bankId`);

--
-- Indexes for table `PaymentTerms`
--
ALTER TABLE `PaymentTerms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Seat`
--
ALTER TABLE `Seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seatSection` (`seatSection`);

--
-- Indexes for table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Street`
--
ALTER TABLE `Street`
  ADD PRIMARY KEY (`id`),
  ADD KEY `townId` (`townId`);

--
-- Indexes for table `Town`
--
ALTER TABLE `Town`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `streetId` (`streetId`),
  ADD KEY `paymentDetails` (`paymentDetailsId`),
  ADD KEY `role` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bank`
--
ALTER TABLE `Bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Country`
--
ALTER TABLE `Country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Equipment`
--
ALTER TABLE `Equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `EquipmentBooking`
--
ALTER TABLE `EquipmentBooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `PaymentDetails`
--
ALTER TABLE `PaymentDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PaymentTerms`
--
ALTER TABLE `PaymentTerms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Seat`
--
ALTER TABLE `Seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Section`
--
ALTER TABLE `Section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Status`
--
ALTER TABLE `Status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Street`
--
ALTER TABLE `Street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Town`
--
ALTER TABLE `Town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`seatId`) REFERENCES `Seat` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`eventId`) REFERENCES `Events` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`paymentTerms`) REFERENCES `PaymentTerms` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `EquipmentBooking`
--
ALTER TABLE `EquipmentBooking`
  ADD CONSTRAINT `equipmentbooking_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `Events` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipmentbooking_ibfk_2` FOREIGN KEY (`equipmentId`) REFERENCES `Equipment` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipmentbooking_ibfk_3` FOREIGN KEY (`bookingId`) REFERENCES `Booking` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipmentbooking_ibfk_4` FOREIGN KEY (`paymentTerms`) REFERENCES `PaymentTerms` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Events`
--
ALTER TABLE `Events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`eventStatus`) REFERENCES `Status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`user`) REFERENCES `Users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`paymentTerms`) REFERENCES `PaymentTerms` (`id`);

--
-- Constraints for table `PaymentDetails`
--
ALTER TABLE `PaymentDetails`
  ADD CONSTRAINT `paymentdetails_ibfk_1` FOREIGN KEY (`bankId`) REFERENCES `Bank` (`id`);

--
-- Constraints for table `Seat`
--
ALTER TABLE `Seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`seatSection`) REFERENCES `Section` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Street`
--
ALTER TABLE `Street`
  ADD CONSTRAINT `street_ibfk_1` FOREIGN KEY (`townId`) REFERENCES `Town` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Town`
--
ALTER TABLE `Town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `Country` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`streetId`) REFERENCES `Street` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`paymentDetailsId`) REFERENCES `PaymentDetails` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`roleId`) REFERENCES `Role` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
