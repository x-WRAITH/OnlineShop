-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Kwi 2022, 19:03
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `onlineshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `carts`
--

CREATE TABLE `carts` (
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'Kawa mocna'),
(2, 'Kawa niemocna'),
(3, 'Herbata zielona'),
(4, 'Herbata owocowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `producerName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `producer`
--

INSERT INTO `producer` (`id`, `producerName`) VALUES
(1, 'Everest Ayurveda'),
(2, 'Proherbis'),
(3, 'Produkty Bonifraterskie'),
(4, 'Dary Natury');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `producerID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(355) NOT NULL,
  `amount` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `producerID`, `categoryID`, `name`, `price`, `description`, `amount`, `image1`, `image2`, `image3`) VALUES
(1, 4, 4, 'Dzika Róża Owoc EKO 50g', 4.6, 'Owoc dzikiej róży zawiera znaczne ilości witamin i kwasów organicznych oraz soli mineralnych. Jak podaje literatura zielarska owoc dzikiej róży może być stosowany w chorobach zakaźnych i przeziębieniowych, w okresie rekonwalescencji oraz przy biegunce, chorobie wrzodowej żołądka, dwunastnicy. Polecana do picia na co dzień zamiast zwykłej herbaty.', 9, 'https://zdrowykoszyk.pl/userdata/public/gfx/d94d329ed1263462c071ad89b9c6680b.jpg', '', ''),
(2, 2, 3, 'Trędownik 50g', 25, 'Ziele trędownika najczęściej stosowne jest jako wspomagające w walce przy różnych stanach zapalnych organizmu. Wykazuje też działanie przeciwbakteryjne, przeciwbólowe, przeciwskurczowe, przeciwobrzękowe. Pozytywnie działa na skórę, wspierając leczenie stanów zapalnych. ', 3, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSHWefOaJKNQrqgbIQUqZ5r4HECqstJBbE39lFTMZZH0iz14XefJw&usqp=CAc', '', ''),
(3, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(4, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(5, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(9, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(10, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(11, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(13, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(14, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(15, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(16, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(17, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(18, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(19, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(20, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(21, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(22, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(23, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(24, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(25, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(26, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(27, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(28, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(29, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(30, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(31, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(32, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(33, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(34, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(35, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(36, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(37, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(38, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(39, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(40, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(41, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(42, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(43, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(44, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(45, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(46, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(47, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(48, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(49, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(50, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(51, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(52, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(53, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(54, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(55, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(56, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(57, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(58, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(59, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(60, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(61, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(62, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(63, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(64, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(65, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(66, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(67, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(68, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(69, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(70, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(71, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(72, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(73, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(74, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(75, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(76, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(77, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(78, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(79, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(80, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(81, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(82, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(83, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(84, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(85, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(86, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(87, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(88, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(89, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(90, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(91, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(92, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(93, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(94, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(95, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(96, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(97, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(98, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(99, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(100, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(101, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(102, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(103, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(104, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(105, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(106, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(107, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `shippingAddress` longtext NOT NULL,
  `shippingCity` varchar(255) NOT NULL,
  `shippingPincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `type`, `login`, `password`, `firstname`, `lastname`, `email`, `phone`, `shippingAddress`, `shippingCity`, `shippingPincode`) VALUES
(1, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(2, 1, 'admin', 'foobar', 'Lolek', '', '', 0, '', '', 0),
(3, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(4, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(6, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(7, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(8, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(9, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(10, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(11, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(12, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(13, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(14, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(15, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(16, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(17, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(18, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(19, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(20, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(21, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(22, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(23, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(24, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(25, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(26, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(27, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(28, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(29, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(30, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(31, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(32, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(33, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(34, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(35, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(36, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(37, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(38, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(39, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(40, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(41, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(42, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(43, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(44, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(45, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(46, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(47, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(48, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(49, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(50, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(51, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(52, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(53, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(54, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(55, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(56, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(57, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(58, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(59, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(60, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(61, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(62, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(63, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(64, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(65, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(66, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(67, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(68, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(69, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(70, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(71, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(72, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(73, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(74, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(75, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(76, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(77, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(78, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(79, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(80, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(81, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(82, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(83, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(84, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(85, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(86, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(87, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(88, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(89, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(90, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(91, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(92, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(93, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(94, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(95, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(96, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(97, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(98, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(99, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(100, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(101, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(102, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(103, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(104, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(105, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(106, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(107, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(108, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(109, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(110, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(111, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(112, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(113, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(114, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(115, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(116, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(117, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(118, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(119, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(120, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(121, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(122, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(123, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(124, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(125, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(126, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(127, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(128, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(129, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(130, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(131, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(132, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(133, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(134, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(135, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(136, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(137, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(138, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(139, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(140, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(141, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(142, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(143, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(144, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(145, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600),
(146, 0, 'maciejos123', 'macieknowak123', 'Maciek', 'Nowak', 'admin@gramyse.pl', 909898121, 'Fiołkowka 213', 'Limanowa', 34600);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
