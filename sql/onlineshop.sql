-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Maj 2022, 12:25
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

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
  `price` decimal(10,0) NOT NULL,
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
(1, 1, 3, 'PORTOFINO', '5', 'Prowadzenie zdrowego i aktywnego stylu życia nie oznacza, że musisz jeść mdłe posiłki i pożegnać się z przekąskami.\n\nZmień swoje podejście do przekąsek i rozpieść swoje kubki smakowe subtelnie wędzoną nutą chipsów proteinowych o smaku barbecue.\n\nChipsy proteinowe zawierają o 50% mniej tłuszczu niż smażone chipsy ziemniaczane, ponieważ nigdy ich nie smaż', 11, 'https://www.cozaherbata.pl/prod/products/normalCloud/herbata_zielona_portofino_1259.jpg', '', ''),
(2, 4, 1, 'JAPAN MATCHA PREMIUM CULINARY', '21', 'Japan Matcha Premium Culinary to oryginalna, sproszkowana zielona herbata Matcha prosto z Japonii. Jest to typ kulinarny. Herbata zmielona w młynkach ceramicznych.', 5, 'https://www.cozaherbata.pl/prod/products/normalCloud/herbata_matcha_sklep_japan_matcha_premium_culinary_1938.jpg', '', ''),
(3, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', '27', 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 17, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', ''),
(132, 1, 3, 'Herbata ARJUNA - Czynność serca 100g', '207', 'ARJUNA - herbatka ziołowa SUPLEMENT DIETY w formie suszu roślinnego\r\n', 21, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSK9bBdRmHaYMMbRd-qpTz0mNp49sky5RC-QftJ6hahLjKlkekyqg&usqp=CAc', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `shippingAddress` longtext NOT NULL,
  `shippingCity` varchar(255) NOT NULL,
  `shippingPincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `password`, `firstname`, `lastname`, `phone`, `shippingAddress`, `shippingCity`, `shippingPincode`) VALUES
(1, 1, 'admin@gramyse.pl', 'macieknowak123', 'Maciek', 'Nowak', 909898121, 'Fiołkowka 213', 'Limanowa', '34-600'),
(2, 1, 'asd@asd.pl', 'foobar', 'Lolek123', '', 23534213, '', '', '12-321');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `producerID` (`producerID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`producerID`) REFERENCES `producer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
