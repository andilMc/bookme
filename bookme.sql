-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2024 at 05:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `codeAdmin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookingroom`
--

CREATE TABLE `bookingroom` (
  `id` int NOT NULL,
  `checkinDate` date NOT NULL,
  `checkoutDate` date NOT NULL,
  `descritption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeClient` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeRoom` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerName` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingroom`
--

INSERT INTO `bookingroom` (`id`, `checkinDate`, `checkoutDate`, `descritption`, `codeClient`, `codeRoom`, `customerName`, `confirmed`) VALUES
(1, '2024-02-01', '2024-02-02', 'no comment', 'CLTa5uEZ4', 'rmoNqbZ7', 'Ramu Tamba', 0),
(2, '2024-02-04', '2024-02-06', 'no comment', 'CLTzuynWa', 'rmI5Y3Qa', 'Noura', 0),
(9, '2024-06-02', '2024-06-04', 'no comment', 'CLTzuynWa', 'rmIRrYE2', 'faida', 0),
(10, '2024-06-10', '2024-06-12', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'dgfd', 0),
(11, '2024-06-19', '2024-06-21', 'no comment', 'CLTa5uEZ4', 'rmI5Y3Qa', 'Zoue', 0),
(12, '2024-06-10', '2024-06-12', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'faida', 0),
(13, '2024-06-04', '2024-06-05', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'Aicha', 0),
(14, '2024-06-04', '2024-06-05', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'Aicha', 0),
(15, '2024-06-04', '2024-06-05', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'Aicha', 0),
(16, '2024-06-04', '2024-06-05', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'Aicha', 0),
(17, '2024-06-10', '2024-06-11', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'Ganin', 0),
(18, '2024-06-04', '2024-06-05', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'Faouzia', 0),
(19, '2024-06-04', '2024-06-05', 'no comment', 'CLTa5uEZ4', 'rmryMn6T', 'Faouzia', 0),
(20, '2024-06-03', '2024-06-04', 'no comment', 'CLTa5uEZ4', 'rmIRrYE2', 'Said Ali', 1),
(21, '2024-06-11', '2024-06-12', 'no comment', 'CLTa5uEZ4', 'rmIRrYE2', 'Faoula', 1),
(22, '2024-06-10', '2024-06-11', 'no comment', 'CLTzuynWa', 'rm0Vy5Gh', 'Nawad', 1),
(23, '2024-06-18', '2024-06-19', 'no comment', 'CLTzuynWa', 'rmrKk5HF', 'Ramu Tamba', 1),
(24, '2024-06-03', '2024-06-05', 'no comment', 'CLTzuynWa', 'rmIRrYE2', 'Maesha Asma', 0),
(25, '2024-06-10', '2024-06-11', 'no comment', 'CLTzuynWa', 'rmrKk5HF', 'Zahra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id_car` int NOT NULL,
  `make` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `license_plate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_day` double NOT NULL,
  `driverPrice` double DEFAULT NULL,
  `typeCar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeCar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `codeCarAgency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `yearIssue` int NOT NULL,
  `fuelType` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transmission` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id_car`, `make`, `model`, `license_plate`, `price_per_day`, `driverPrice`, `typeCar`, `codeCar`, `description`, `codeCarAgency`, `yearIssue`, `fuelType`, `transmission`, `color`) VALUES
(1, 'Honda', 'Accord', '152AN73', 400, 200, 'Sedan', 'CRPZw1YM', NULL, 'CRAHcv2oB', 0, '', '', '#ffffbf'),
(2, 'Toyota', 'Camry', '458AK61', 166, 122, 'Sedan', 'CR8BPwQO', NULL, 'CRAHcv2oB', 0, '', '', '#ff6fff'),
(8, 'Volkswagen', 'Volkswagen', '254AS73', 16, 50, 'Minivan', 'CRAZGF1G', NULL, 'CRAHcv2oB', 0, '', '', '#ffff3f'),
(9, 'Ford', 'Camionnette', '145M66', 2000, 500, 'Sport Utility Vehicle(SUV)', 'CR2A12Rk', NULL, 'CRAHcv2oB', 0, '', '', '#fffff2'),
(11, 'sdfghj', 'wertyu', 'dfghj', 234, 34, 'Sedan', 'CRie1npq', 'ertyudfg dfghtyui', 'CRAHcv2oB', 2021, 'Electric', 'Automatic', '#8e969d'),
(12, 'Maruti', '800 AC', '1234db56', 40, 20, 'Classic Car', 'CRbHvqyM', 'Introducing the \"Maruti 800 AC,\" the timeless classic that has been a companion on countless journeys. With its reliable engine and compact design, this car is perfect for city adventures. Its air conditioning ensures a comfortable ride even on the hottest days. Don\'t miss out on owning a piece of automotive history.\r\n', 'CRAHcv2oB', 2022, 'Hybrid', 'Automatic', '#ae3612'),
(13, 'blabla', 'toyotta', '745AZ41', 100, 200, 'Sedan', 'CRbt1bJ1', 'no comment', 'CRAHcv2oB', 2024, 'Diesel', 'Manual', '#e52345');

-- --------------------------------------------------------

--
-- Table structure for table `caragency`
--

CREATE TABLE `caragency` (
  `codeCarAgency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `carAgencyName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `lati_long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codeUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caragency`
--

INSERT INTO `caragency` (`codeCarAgency`, `carAgencyName`, `country`, `city`, `description`, `lati_long`, `codeUser`) VALUES
('CRAHcv2oB', 'COmpany', 'test', NULL, NULL, NULL, 'CLTa5uEZ4'),
('CRk4mh7', 'Soifia Immobilier', 'Comoros', 'Moroni', 'no comment', NULL, 'CLTKUHO8H');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `codeClient` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`codeClient`) VALUES
('CLTa5uEZ4');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `codeDriver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `drivingLisence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flightorder`
--

CREATE TABLE `flightorder` (
  `id` int NOT NULL,
  `flight_id` int NOT NULL,
  `flight_offer_price_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `complet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `codeHotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hotelName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lati_long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codeUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`codeHotel`, `hotelName`, `type`, `localization`, `description`, `country`, `city`, `lati_long`, `codeUser`) VALUES
('HTL0bL0UJ', 'LagosMarios hotel', '0', '122 Joel Ogunnaike St', NULL, 'Togo', 'Lomé', '', ''),
('HTLDSkqRD', 'SeneGambia hotel', '0', 'Kololi, Banjul, Gambie', NULL, 'Gambia', 'Banjul', '', ''),
('HTLmDmpf5', 'Soifia immobilier', NULL, NULL, NULL, 'Comoros (‫جزر القمر‬‎)', NULL, NULL, 'CLTKUHO8H'),
('HTLzUlvcA', 'Ritaj Moroni', '0', 'Avenue Ali Soilih- Hamramba Retaj Moroni Hotel ', NULL, 'Comoros', 'Moroni', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int NOT NULL,
  `pathImg` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeOwner` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `pathImg`, `codeOwner`) VALUES
(1, 'https://retaj-moroni-hotel.hotelmix.fr/data/Photos/OriginalPhoto/7238/723845/723845431/Retaj-Moroni-Hotel-Exterior.JPEG', 'HTLzUlvcA'),
(2, 'https://s3.amazonaws.com/static-webstudio-accorhotels-usa-1.wp-ha.fastbooking.com/wp-content/uploads/sites/5/2019/07/02145217/PHSOG-1410-A2-copy.jpg', 'HTLDSkqRD'),
(3, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFRgVFRYZGRgYGhwcHBocHB0cHxoYGBgaGhkaGhwcIS4lHB4rHxgYJjgnKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QHhISHjQrJCs0MTQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NP/AABEIALcBEwMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAACAAEDBAUGB//EAEEQAAIBAgQDBAgEAwYGAwAAAAECEQADBBIhMQVBUQYiYXETMlKBkaHB0RRCsfBikuEVI3KCovEWM1OywtIHc5P/xAAZAQADAQEBAAAAAAAAAAAAAAAAAQIDBAX/xAAkEQACAgEEAwEAAwEAAAAAAAAAAQIRAxIhMUETUWEiBEKRMv/aAAwDAQACEQMRAD8AvU1KlXrHkCpUq', 'HTLD95a8b'),
(4, 'https://images.ctfassets.net/guen72jxl4tk/3VPp6byeYG4NGb5eVKge8q/b90e75f2d1567fe7b59695d36b65fe2a/home.jpg?w=1920&q=80', 'rmoNqbZ7'),
(5, 'https://s3.amazonaws.com/static-webstudio-accorhotels-usa-1.wp-ha.fastbooking.com/wp-content/uploads/sites/5/2019/07/02145217/PHSOG-1410-A2-copy.jpg', 'rmryMn6T'),
(6, 'https://hapi.mmcreation.com/hapidam/8b7cc795-8c75-4b2c-ad95-a20e027c1777/hotel-britannique-brit-chambres.jpg?w=1200&mode=cover&coi=50%2C50', 'rmIRrYE2'),
(7, 'https://www.maisonapart.com/images/auto/640-480-c/20141218_155932_senses-1.jpg', 'rmvoamif'),
(8, 'https://st.hzcdn.com/simgs/ec41b5b603b67463_4-2471/contemporain-chambre.jpg', 'rmsV4SSZ'),
(9, 'https://media.tarkett-image.com/small/IN_401_Hospitality_Luxury_Bedrooms_001.jpg', 'rmrKk5HF'),
(10, 'https://hes-corporation.com/wp-content/uploads/2020/06/Hotel-Ker-Lann-Standard-1image-pr%C3%A9visualisation-Copier.jpg', 'rmI5Y3Qa'),
(12, 'https://img.freepik.com/photos-premium/belle-suite-luxe-dans-chambre-hotel-tv_105762-1638.jpg', 'rmJEScq2'),
(13, 'https://s3.amazonaws.com/static-webstudio-accorhotels-usa-1.wp-ha.fastbooking.com/wp-content/uploads/sites/5/2019/07/02145217/PHSOG-1410-A2-copy.jpg', 'rmJrogot'),
(14, 'https://images.trvl-media.com/lodging/2000000/1140000/1133600/1133595/8d3c9d35.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium', 'rm0Vy5Gh'),
(15, 'https://www.hostels-paris.fr/local/cache-vignettes/L640xH382/urban_bivouac-b8d7b.jpg?1687811889', 'rmnAzOrB'),
(16, '/upload/CLTa5uEZ4/crAgency/CRPZw1YM_carImg.jpg', 'CRPZw1YM'),
(17, '/upload/CLTa5uEZ4/crAgency/CR8BPwQO_carImg.jpg', 'CR8BPwQO'),
(18, 'https://global.toyota/pages/news/images/2019/11/20/1405/20191120_02_31_s.jpg', 'CRx31aqc'),
(19, 'https://i.gaw.to/vehicles/photos/40/32/403205-2023-chrysler-pacifica.jpg?640x400', 'CRKneN1l'),
(20, 'https://global.honda/content/site/global-jp/news/pc/2023/4230407/_jcr_content/par_news-body/newscolumn/par_news-col-1/newsimage.img.jpg/1691240363776.jpg', 'CRyDEVJP'),
(21, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAralgpDVhnqwqFPg4ZtiZ5jfQCDEH2yx50g&usqp=CAU', 'CRb8CGVy'),
(22, '/upload/CLTa5uEZ4/crAgency/CRAZGF1G_carImg.jpg', 'CRAZGF1G'),
(23, '/upload/CLTa5uEZ4/crAgency/CR2A12Rk_carImg.jpg', 'CR2A12Rk'),
(34, '/upload/serviceRequest/CLTa5uEZ4/img/CLTa5uEZ4_0_1_img_establishment.png', 'CRAHcv2oB'),
(35, '/upload/serviceRequest/CLTa5uEZ4/img/CLTa5uEZ4_1_1_img_establishment.png', 'CRAHcv2oB'),
(36, '/upload/serviceRequest/CLTa5uEZ4/img/CLTa5uEZ4_2_1_img_establishment.png', 'CRAHcv2oB'),
(37, '/upload/serviceRequest/CLTa5uEZ4/img/CLTa5uEZ4_3_1_img_establishment.png', 'CRAHcv2oB'),
(62, '/upload/serviceRequest/CLTa5uEZ4/img/CLTa5uEZ4_0_2_img_establishment.jpg', 'RQSTYjdN3p'),
(63, '/upload/serviceRequest/CLTa5uEZ4/img/CLTa5uEZ4_1_2_img_establishment.jpg', 'RQSTYjdN3p'),
(64, '/upload/serviceRequest/CLTa5uEZ4/img/CLTa5uEZ4_2_2_img_establishment.jpg', 'RQSTYjdN3p'),
(65, '/upload/CLTa5uEZ4/crAgency/CRie1npq_carImg.jpg', 'CRie1npq'),
(66, '/upload/CLTa5uEZ4/crAgency/CRbHvqyM_carImg.jpg', 'CRbHvqyM'),
(67, '/upload/CLTa5uEZ4/crAgency/CRbt1bJ1_carImg.jpg', 'CRbt1bJ1'),
(68, '/upload/serviceRequest/CLTKUHO8H/img/CLTKUHO8H_0_2_img_establishment.', 'RQSTenc9jM'),
(69, '/upload/serviceRequest/CLTKUHO8H/img/CLTKUHO8H_0_2_img_establishment.jpg', 'RQSTkLaQJX'),
(70, '/upload/Hotel_HTLDSkqRD/images.jpg', 'RMOAnyCC'),
(71, '/upload/Hotel_HTLDSkqRD/images.jpg', 'RMkoL08F'),
(72, '/upload/Hotel_HTLDSkqRD/images.jpg', 'RM3Ms4fS'),
(73, '/upload/Hotel_HTLDSkqRD/images.jpg', 'RMGULFUV'),
(74, '/upload/Hotel_HTLDSkqRD/images.jpg', 'RM5CGhma'),
(75, '/upload/Hotel_HTLDSkqRD/téléchargement.jpg', 'RMXBTq87'),
(76, '/upload/Hotel_HTLDSkqRD/téléchargement.jpg', 'RMKWhuDL'),
(77, '/upload/Hotel_HTLDSkqRD/téléchargement.jpg', 'RMRkp9os');

-- --------------------------------------------------------

--
-- Table structure for table `passport`
--

CREATE TABLE `passport` (
  `idPassport` int NOT NULL,
  `fullNamePassport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numPassport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateExpPassport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passport`
--

INSERT INTO `passport` (`idPassport`, `fullNamePassport`, `numPassport`, `dateExpPassport`, `codeUser`) VALUES
(1, 'John Doe', '123456789', '2024-12-31', 'CLTa5uEZ4'),
(2, 'Jane Smith', '987654321', '2023-11-30', 'CLTa5uEZ4'),
(3, 'Alice Johnson', '456789123', '2025-09-15', 'CLTa5uEZ4');

-- --------------------------------------------------------

--
-- Table structure for table `rentalcar`
--

CREATE TABLE `rentalcar` (
  `idRental` int NOT NULL,
  `idCar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeClient` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeDriver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pickupDate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `returnDate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `paymentMode` int DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `needDriver` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'off',
  `totalPrice` double NOT NULL,
  `customerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentalcar`
--

INSERT INTO `rentalcar` (`idRental`, `idCar`, `codeClient`, `codeDriver`, `pickupDate`, `returnDate`, `paymentMode`, `confirmed`, `needDriver`, `totalPrice`, `customerName`, `Address`) VALUES
(2, 'CR2A12Rk', 'CLTa5uEZ4', NULL, '11-04-2024', '18-04-2024', NULL, 1, 'on', 17500, 'andil', 'qwer'),
(3, 'CRAZGF1G', 'CLTa5uEZ4', NULL, '15-04-2024', '22-04-2024', NULL, 0, 'on', 462, 'Kassim ahmada', 'Moroni coulee'),
(4, 'CRPZw1YM', 'CLTa5uEZ4', NULL, '17-04-2024', '24-04-2024', NULL, 1, 'on', 4200, 'Lamin Dabo', 'TRORO'),
(5, 'CR2A12Rk', 'CLTa5uEZ4', NULL, '16-04-2024', '17-04-2024', NULL, 1, 'Karim', 2500, 'Karim', 'Bidjan'),
(6, 'CRPZw1YM', 'CLTa5uEZ4', NULL, '22-05-2024', '23-05-2024', NULL, 1, 'Kmarlay', 600, 'Kmarlay', 'Zambi'),
(7, 'CRPZw1YM', 'CLTa5uEZ4', NULL, '24-05-2024', '25-05-2024', NULL, 1, 'Nasma', 600, 'Nasma', 'IUT'),
(8, 'CRPZw1YM', 'CLTa5uEZ4', NULL, '27-05-2024', '28-05-2024', NULL, 0, 'Yussuf Gonah', 600, 'Yussuf Gonah', 'IUT board bazar'),
(9, 'CRPZw1YM', 'CLTzuynWa', NULL, '26-05-2024', '27-05-2024', NULL, 1, 'on', 600, 'Nasma', 'IUT'),
(10, 'CR8BPwQO', 'CLTzuynWa', NULL, '26-05-2024', '27-05-2024', NULL, 0, 'off', 288, 'csds', 'Iut'),
(11, 'CRPZw1YM', 'CLTzuynWa', NULL, '30-05-2024', '06-06-2024', NULL, 1, 'on', 4200, 'Nasma', 'Moroni'),
(12, 'CRPZw1YM', 'CLTzuynWa', NULL, '27-05-2024', '28-05-2024', NULL, 1, 'on', 600, 'ali', 'iut'),
(13, 'CRie1npq', 'CLTzuynWa', NULL, '17-05-2024', '18-05-2024', NULL, 0, 'on', 268, 'Nasma', 'IUT'),
(14, 'CRPZw1YM', 'CLTzuynWa', NULL, '30-05-2024', '31-05-2024', NULL, 1, 'off', 600, 'Nawad', 'Moroni');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ID` int NOT NULL,
  `service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `companyName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `insurance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codeRequest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `codeUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ID`, `service`, `companyName`, `country`, `bNumber`, `license`, `insurance`, `codeRequest`, `valid`, `codeUser`, `city`) VALUES
(3, '1', 'COmpany', 'test', '234567test', '/upload/serviceRequest/CLTa5uEZ4/CLTa5uEZ4_1_license.pdf', '/upload/serviceRequest/CLTa5uEZ4/CLTa5uEZ4_1_insurance.pdf', 'RQSTJ2YINw', 1, 'CLTa5uEZ4', NULL),
(8, '2', 'Le Moroni', 'Comoros (‫جزر القمر‬‎)', 'KM12345', '/upload/serviceRequest/CLTa5uEZ4/CLTa5uEZ4_2_license.pdf', '/upload/serviceRequest/CLTa5uEZ4/CLTa5uEZ4_2_insurance.pdf', 'RQSTYjdN3p', 0, 'CLTa5uEZ4', NULL),
(9, '2', 'Soifia Immobilier', 'com', 'KM4521', '/upload/serviceRequest/CLTKUHO8H/CLTKUHO8H_2_license.', '/upload/serviceRequest/CLTKUHO8H/CLTKUHO8H_2_insurance.', 'RQSTenc9jM', 0, 'CLTKUHO8H', NULL),
(10, '2', 'Soifia immobilier', 'Comoros (‫جزر القمر‬‎)', 'KM4521', '/upload/serviceRequest/CLTKUHO8H/CLTKUHO8H_2_license.pdf', '/upload/serviceRequest/CLTKUHO8H/CLTKUHO8H_2_insurance.pdf', 'RQSTkLaQJX', 1, 'CLTKUHO8H', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int NOT NULL,
  `is_aviable` tinyint(1) DEFAULT '0',
  `price` float DEFAULT NULL,
  `type` int DEFAULT NULL,
  `roomNbr` int DEFAULT NULL,
  `codeHotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `codeRoom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wifi` tinyint(1) NOT NULL DEFAULT '0',
  `bedSize` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maxPerson` int NOT NULL DEFAULT '1',
  `children` int NOT NULL DEFAULT '0',
  `breakfast` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `is_aviable`, `price`, `type`, `roomNbr`, `codeHotel`, `description`, `codeRoom`, `wifi`, `bedSize`, `maxPerson`, `children`, `breakfast`) VALUES
(1, 0, 30, 1, 10, 'HTLzUlvcA', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmoNqbZ7', 1, '1 Bed kingSize', 2, 0, 0),
(2, 0, 50, 1, 3, 'HTLDSkqRD', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmryMn6T', 1, '1 Bed kingSize', 2, 0, 0),
(3, 0, 42, 1, 7, 'HTL0bL0UJ', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmIRrYE2', 1, '1 Bed kingSize', 2, 0, 1),
(4, 0, 80, 2, 6, 'HTLzUlvcA', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmvoamif', 1, '1 Bed kingSize', 2, 0, 0),
(5, 0, 22, 2, 8, 'HTL0bL0UJ', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmsV4SSZ', 1, '1 Bed kingSize', 2, 0, 0),
(6, 0, 66, 3, 12, 'HTLzUlvcA', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmrKk5HF', 1, '1 Bed kingSize', 2, 0, 0),
(7, 0, 58, 2, 6, 'HTLDSkqRD', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmI5Y3Qa', 1, '1 Bed kingSize', 2, 0, 0),
(9, 0, 15, 4, 3, 'HTLzUlvcA', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmJEScq2', 1, '1 Bed kingSize', 2, 0, 0),
(10, 0, 12, 3, 4, 'HTLDSkqRD', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmJrogot', 1, '1 Bed kingSize', 2, 0, 0),
(11, 0, 16, 3, 5, 'HTL0bL0UJ', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rm0Vy5Gh', 1, '1 Bed kingSize', 2, 0, 0),
(12, 0, 16, 4, 9, 'HTLDSkqRD', 'Located in Dhaka, 1.8 km from Uttara University, HOTEL BLUE BIRD offers a gym, private parking, a shared lounge and a terrace. This 3-star hotel offers an ATM and a babysitting service. It offers a 24-hour reception, airport transfers, room service and free Wi-Fi.', 'rmnAzOrB', 1, '1 Bed kingSize', 2, 0, 0),
(13, 0, 100, 5, 2, 'HTLDSkqRD', 'No comment', 'RMOAnyCC', 0, NULL, 1, 0, 0),
(14, 0, 100, 5, 2, 'HTLDSkqRD', 'No comment', 'RMkoL08F', 0, NULL, 1, 0, 0),
(15, 0, 100, 5, 2, 'HTLDSkqRD', 'No comment', 'RM3Ms4fS', 0, NULL, 1, 0, 0),
(16, 0, 80, 4, 7, 'HTLDSkqRD', 'No comment', 'RMGULFUV', 0, NULL, 2, 1, 0),
(17, 0, 80, 4, 7, 'HTLDSkqRD', 'No comment', 'RM5CGhma', 0, NULL, 2, 1, 0),
(18, 0, 40, 8, 7, 'HTLDSkqRD', 'No comment', 'RMXBTq87', 0, NULL, 1, 0, 0),
(19, 0, 40, 8, 7, 'HTLDSkqRD', 'No comment', 'RMKWhuDL', 0, NULL, 1, 0, 0),
(20, 0, 40, 8, 7, 'HTLDSkqRD', 'No comment', 'RMRkp9os', 0, NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int NOT NULL,
  `service` int NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phoneNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthDate` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `codeUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgProfile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthCountry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `hotelMnger` tinyint(1) NOT NULL DEFAULT '0',
  `carRentalAgent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `fullName`, `phoneNumber`, `email`, `birthDate`, `password`, `verified`, `codeUser`, `imgProfile`, `birthCountry`, `address`, `admin`, `hotelMnger`, `carRentalAgent`) VALUES
(85, 'Andil Mc', '+8801602220364827', 'mcdev98@gmail.com', '02-04-1998', '$2y$10$sn0Z3GgaAQv4LgBUh/z6bOr6l2WcQZaWCws8sAIJFBzBWeZ0CwlHq', 1, 'CLTa5uEZ4', '/upload/CLTa5uEZ4/CLTa5uEZ4_profile.png', 'Comoros (‫جزر القمر‬‎)', 'Moroni', 0, 0, 1),
(86, 'Nasma', '01607379442', 'nasmayoussouf24@gmail.com', '14-07-2016', '$2y$10$p.eKS8wxVfp/0akf0W7BluNdNRfTYzcel033u8aNG2kbCW48PRf4C', 1, 'CLTzuynWa', '/upload/CLTzuynWa/CLTzuynWa_profile.jpg', 'Bangladesh (বাংলাদেশ)', 'Islamic University of Technology, Boardbazar', 0, 0, 0),
(87, 'Mc Dev', '01003-24827', 'andilmchangama1998@gmail.com', '02-04-1998', '$2y$10$X8DW33hEBdY/ixhSW3k9l.geClBE1gR6BwWdTv0YpzLWX1p7.jGva', 1, 'CLTpOhuId', '/upload/CLTpOhuId/CLTpOhuId_profile.JPG', 'Comoros (‫جزر القمر‬‎)', 'Moroni', 1, 0, 0),
(88, 'Nasma Yssf', '01607379442', 'nasma@iut-dhaka.edu', NULL, '$2y$10$v7LFNJvjNYBFN9EUXWyY7uAR67Ue.Jxndz8U.7rMSW8C44Wy4epdK', 1, 'CLTKUHO8H', '/upload/CLTKUHO8H/CLTKUHO8H_profile.jpg', NULL, NULL, 0, 1, 0),
(89, 'Ramu Tamba', '+220 372 4023', 'ndeyramoutamba@gmail.com', '1992-05-10', '123456', 1, 'CLT4d52sd', 'https://www.shutterstock.com/image-photo/head-scarf-black-woman-laugh-260nw-2301368431.jpg', 'Gambia', NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`codeAdmin`);

--
-- Indexes for table `bookingroom`
--
ALTER TABLE `bookingroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id_car`),
  ADD UNIQUE KEY `unique` (`license_plate`);

--
-- Indexes for table `caragency`
--
ALTER TABLE `caragency`
  ADD PRIMARY KEY (`codeCarAgency`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`codeClient`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`codeDriver`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flightorder`
--
ALTER TABLE `flightorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`codeHotel`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`idPassport`);

--
-- Indexes for table `rentalcar`
--
ALTER TABLE `rentalcar`
  ADD PRIMARY KEY (`idRental`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`),
  ADD UNIQUE KEY `coderoom` (`codeRoom`),
  ADD KEY `codeHotel` (`codeHotel`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `code` (`codeUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingroom`
--
ALTER TABLE `bookingroom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id_car` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flightorder`
--
ALTER TABLE `flightorder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `passport`
--
ALTER TABLE `passport`
  MODIFY `idPassport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rentalcar`
--
ALTER TABLE `rentalcar`
  MODIFY `idRental` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
