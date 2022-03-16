-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Mar 2022, 21:32
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
  `productName` varchar(255) NOT NULL,
  `productPrice` double NOT NULL,
  `productDescription` varchar(355) NOT NULL,
  `productAmount` int(11) NOT NULL,
  `productImage1` varchar(255) NOT NULL,
  `productImage2` varchar(255) NOT NULL,
  `productImage3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `producerID`, `categoryID`, `productName`, `productPrice`, `productDescription`, `productAmount`, `productImage1`, `productImage2`, `productImage3`) VALUES
(1, 4, 4, 'Dzika Róża Owoc EKO 50g', 4.6, 'Owoc dzikiej róży zawiera znaczne ilości witamin i kwasów organicznych oraz soli mineralnych. Jak podaje literatura zielarska owoc dzikiej róży może być stosowany w chorobach zakaźnych i przeziębieniowych, w okresie rekonwalescencji oraz przy biegunce, chorobie wrzodowej żołądka, dwunastnicy. Polecana do picia na co dzień zamiast zwykłej herbaty.', 9, 'https://zdrowykoszyk.pl/userdata/public/gfx/d94d329ed1263462c071ad89b9c6680b.jpg', '', ''),
(2, 2, 3, 'Trędownik 50g', 25, 'Ziele trędownika najczęściej stosowne jest jako wspomagające w walce przy różnych stanach zapalnych organizmu. Wykazuje też działanie przeciwbakteryjne, przeciwbólowe, przeciwskurczowe, przeciwobrzękowe. Pozytywnie działa na skórę, wspierając leczenie stanów zapalnych. ', 3, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSHWefOaJKNQrqgbIQUqZ5r4HECqstJBbE39lFTMZZH0iz14XefJw&usqp=CAc', '', ''),
(3, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', 26.9, 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 1, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', '');

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
(2, 1, 'admin', 'foobar', '', '', '', 0, '', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
