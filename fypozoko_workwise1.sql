-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 18. Jan 2023 um 10:20
-- Server-Version: 5.7.37-log-cll-lve
-- PHP-Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fypozoko_workwise1`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rentals`
--

CREATE TABLE `rentals` (
  `ID` int(11) NOT NULL,
  `workspace_id` int(11) NOT NULL,
  `mieter_users_id` int(11) NOT NULL,
  `vermieter_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`) VALUES
(27, 'R2D2', 'test@test.ch', '$2y$10$x9.NsQ1Ve6oIuGBDdn6JUu5d5af3THCrFSIz98QlZTGjdVkWTSys2'),
(28, 'Lucy', 'lulu@lulu.ch', '$2y$10$A/Kueq0UdwDhWiqsrHdPS.Mp2lO02VzzBLW5.cEEFSGNVewUGy5/u'),
(29, 'Rey Palpatine', 'rey.palpatine@bb8.ch', '$2y$10$1P0fwvceRUFYfon5S9CqYOPzBD0N/2oYUHLilyHqS0FeQODPl2u6O'),
(30, 'Darthvader ', 'vader.darth@iamyoufather.com', '$2y$10$vAoP1T3T7m5zDh7M7u3a1eMc96J.B6Wt3bHaW2yUnEn3.5Jn5jG6e'),
(31, 'Darthvader ', 'vader.darth@iamyourfather.com', '$2y$10$VShlHvKoHFk5a8maAUG/9u.531Z5pc2aQn2aZCRU1aT7HOyh9QRii'),
(32, 'Ahsoka Tano', 'ahtano@jedimaster.ch', '$2y$10$RHTucQUKDo1Gy2SSJYI6GO4S.vhko/D93dwKgr0IKKfnMhTascT0C'),
(33, 'Han Solo', 'solo@thebest.com', '$2y$10$o2JsJIsvcS5hW44lm98lIOv13LdQrQOQqgNRMTUJAXOlIDVmPnBm.'),
(34, 'Corinne', 'corinne@test.ch', '$2y$10$6dgHAJQV2GOSQ1uI2Q8N2O9FCYlxvlp4sXHn4XQUAcHtz0.KWWq/O');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `workspaces`
--

CREATE TABLE `workspaces` (
  `ID` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `objectname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageurl` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_username` varchar(42) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rented` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `workspaces`
--

INSERT INTO `workspaces` (`ID`, `users_id`, `objectname`, `status`, `imageurl`, `description`, `address`, `price`, `date`, `users_username`, `rented`) VALUES
(23, 27, 'Naboo', 'online', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/6673028.png?_1663639620', 'Bip Bip Bop Bop Bip Bip. Bop?', 'Chommell-Sektor', 15, '2023-03-30', 'R2D2', b'0'),
(24, 28, 'Narnia', 'online', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/20344598.png?_1663638840', 'Völlig neue Welt mit sprechenden Tieren und Bäumen.', 'Im Kleiderschrank', 8521, '2023-02-14', 'Lucy', b'0'),
(25, 28, 'Death Star', 'offline', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/20344598.png?_1663638840', 'Big black ball', 'Galaxy', 4589, '2023-01-25', 'Lucy', b'0'),
(26, 29, 'Millennium Falcon', 'online', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/2257184.png?_1663638982', 'Despite her humble origins and shabby exterior, the Millennium Falcon has played a role in some of the greatest victories of the Rebel Alliance and the New Republic. The Falcon looks like a worn-out junker, but beneath her hull she’s full of surprises', 'The Galaxy', 420, '2023-04-20', 'Rey Palpatine', b'0'),
(27, 32, 'Coruscant', 'online', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/19710978.png?_1663638761', 'The city-planet of Coruscant captures the intrigue and glamour of the galaxy’s capital.', 'Core Worlds', 24, '2023-01-31', 'Ahsoka Tano', b'0'),
(29, 31, 'AT-AT', 'online', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/28757122.png?_1667282422', 'its big like yk… got 4 legs so yesh thats cool… i can imagine how hard it is so transport that shii like how tf or where tf you transport and store thoes cunts thats not in tha movie is it…', 'milky way 34 B ', 300, '3000-03-30', 'Darthvader ', b'0'),
(30, 32, 'Mandalore', 'online', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/36155854.png?_1672837222', 'Mandalore. Right turn off the Hydian Way. Can\'t miss it.', 'Outer Rim', 30, '2023-06-15', 'Ahsoka Tano', b'0'),
(31, 33, 'Yoda\'s Hut', 'online', 'https://thishousedoesnotexist.org/cdn-cgi/image/format=auto,fit=cover,width=832,quality=85/assets/houses/22766976.png?_1663894304', 'simple and constructed of mud', 'Dagobah', 5, '2100-07-13', 'Han Solo', b'0');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rentals`
--
ALTER TABLE `rentals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT für Tabelle `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
