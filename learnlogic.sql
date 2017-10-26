-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 11 2017 г., 23:45
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `learnlogic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `1_`
--

CREATE TABLE `1_` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(20) CHARACTER SET latin1 NOT NULL,
  `price` varchar(6) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci COMMENT='Level 1 bokning';

--
-- Дамп данных таблицы `1_`
--

INSERT INTO `1_` (`id`, `date`, `place`, `price`) VALUES
(1, '2018-02-27', 'T-Centralen', '5000'),
(2, '2019-01-01', 'Slussen', '3000'),
(5, '2024-04-03', 'Medborgarplatsen', '14000');

-- --------------------------------------------------------

--
-- Структура таблицы `2_`
--

CREATE TABLE `2_` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(20) CHARACTER SET latin1 NOT NULL,
  `price` varchar(6) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci COMMENT='Level 2 bokning';

--
-- Дамп данных таблицы `2_`
--

INSERT INTO `2_` (`id`, `date`, `place`, `price`) VALUES
(1, '2020-05-02', 'Gamla Stan', '27000'),
(2, '2018-09-23', 'Odenplan', '13000');

-- --------------------------------------------------------

--
-- Структура таблицы `3_`
--

CREATE TABLE `3_` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `price` varchar(6) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci COMMENT='Level 3 bokning';

--
-- Дамп данных таблицы `3_`
--

INSERT INTO `3_` (`id`, `date`, `place`, `price`) VALUES
(1, '2017-09-30', 'Ropsten', '7500'),
(2, '2020-09-14', 'Vällingby', '50000');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `persnmr` varchar(12) COLLATE utf8_swedish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `level` tinyint(1) NOT NULL,
  `place` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `price` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `bokdate` date NOT NULL,
  `info` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `persnmr`, `tel`, `level`, `place`, `price`, `date`, `bokdate`, `info`) VALUES
(1, 'Oleg Lopes', '0', '0', 0, '', '0', '0000-00-00', '0000-00-00', ''),
(2, 'Zav Ham', '0', '0', 1, '', '0', '0000-00-00', '0000-00-00', '\n                <h1>Nivå: 1</h1>\n                <br>\n                <strong>Plats: </strong>Morby Centrum<br>\n                <strong>Datum: </strong>2017-12-31<br>\n                <strong>Pris: </strong>7000kr<br><br>\n\n                <strong>FÃ¶rnamn: </strong>Zav<br>\n                <strong>Efternamn: </strong>Ham<br>\n                <strong>Telefon: </strong>0768492381<br>\n                <strong>Email: </strong>pokskok@yandex.ru<br>\n\n                <strong>Firm: </strong>ZAV ab<br>\n                <strong>Ã–vrigt: </strong>LUL<br>\n            '),
(3, 'Patryko Shonono', '0', '0', 1, 'Gullmarsplan', '0', '0000-00-00', '2017-09-15', '\n                NivÃ¥: 1\n                \n                Plats: Gullmarsplan\n                Datum: 2015-12-12\n                Pris: 3000kr\n\n                FÃ¶rnamn: Patryko\n                Efternamn: Shonono\n                Telefon: 0469348792\n                Email: pokskok@yandex.ru\n\n                Firm: GG SON\n                Ã–vrigt: Ima gangsta\n            '),
(4, 'PLS NOW', '0', '0', 1, 'Gullmarsplan', '0', '0000-00-00', '2017-09-15', '\n                NivÃ¥: 1\n                \n                Plats: Gullmarsplan\n                Datum: 2015-12-12\n                Pris: 3000kr\n\n                FÃ¶rnamn: PLS\n                Efternamn: NOW\n                Telefon: 298746034\n                Email: pokskok@yandex.ru\n\n                Firm: WORK\n                Ã–vrigt: OR DIE\n            '),
(5, 'Så NuMåste', '0', '0', 1, 'Morby Centrum', '0', '0000-00-00', '2017-09-15', '\n                Nivå: 1\n                \n                Plats: Morby Centrum\n                Datum: 2017-12-31\n                Pris: 7000kr\n\n                Förnamn: Så\n                Efternamn: NuMåste\n                Telefon: 09945876\n                Email: pokskok@yandex.ru\n\n                Firm: Du fungera\n                Övrigt: Plöis\n            '),
(6, 'Ludvig The King', '0', '0', 2, 'Ropsten', '0', '0000-00-00', '2017-09-15', '\n                Nivå: 2\n                \n                Plats: Ropsten\n                Datum: 2019-11-04\n                Pris: 27000kr\n\n                Förnamn: Ludvig\n                Efternamn: The King\n                Personmummer: 7812013348\n                Telefon: 0737441223\n                Email: pokskok@yandex.ru\n\n                Firm: Ingen\n                Övrigt: Ä!\n            '),
(7, 'Tim Kim', '2147483647', '0', 2, 'Ropsten', '0', '0000-00-00', '2017-09-19', '\r\n                Nivå: 2\r\n                \r\n                Plats: Ropsten\r\n                Datum: 2019-11-04\r\n                Pris: 27000kr\r\n\r\n                Förnamn: Tim\r\n                Efternamn: Kim\r\n                Personmummer: 9511044492\r\n                Telefon: 0713571829\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: GELO\r\n                Övrigt: hi ma frand\r\n            '),
(8, 'Oleg Lopes Enamn', '2147483647', '0', 1, 'Slussen', '0', '0000-00-00', '2017-09-28', '\n                Nivå: 1\n                \n                Plats: Slussen\n                Datum: 2019-01-01\n                Pris: 3000kr\n\n                Förnamn: Oleg Lopes\n                Efternamn: Enamn\n                Personmummer: 12345678900\n                Telefon: 0768492381\n                Email: rozetta212@gmail.com\n\n                Firm: Ingen\n                Övrigt: Inga\n            '),
(9, 'Oleg Enamn', '1234567890', '0', 1, 'Medborgarplatsen', '0', '0000-00-00', '2017-09-28', '\n                Nivå: 1\n                \n                Plats: Medborgarplatsen\n                Datum: 2024-04-03\n                Pris: 14000kr\n\n                Förnamn: Oleg\n                Efternamn: Enamn\n                Personmummer: 1234567890\n                Telefon: 08436983\n                Email: rozetta212@gmail.com\n\n                Firm: GELO AB\n                Övrigt: Inga\n            '),
(10, 'Oleg Lopes', '1231872412', '0', 2, 'Odenplan', '0', '0000-00-00', '2017-09-28', '\n                Nivå: 2\n                \n                Plats: Odenplan\n                Datum: 2018-09-23\n                Pris: 13000kr\n\n                Förnamn: Oleg\n                Efternamn: Lopes\n                Personmummer: 1231872412\n                Telefon: 0469348792\n                Email: rozetta212@gmail.com\n\n                Firm: Ingen\n                Övrigt: \n            '),
(11, 'Gelo Azabyan', '2147483647', '0', 2, 'Gamla Stan', '27000', '2020-05-02', '0000-00-00', '\n                Nivå: 2\n                \n                Plats: Gamla Stan\n                Datum: 2020-05-02\n                Pris: 27000kr\n\n                Förnamn: Gelo\n                Efternamn: Azabyan\n                Personmummer: 8501014498\n                Telefon: 07382298\n                Email: pokskok@yandex.ru\n\n                Firm: AZB AB\n                Övrigt: I like trains.\n            '),
(12, 'Jhon Silver', '2147483647', '700557799', 3, 'Vällingby', '50000', '2020-09-14', '0000-00-00', '\r\n                Nivå: 3\r\n                \r\n                Plats: Vällingby\r\n                Datum: 2020-09-14\r\n                Pris: 50000kr\r\n\r\n                Förnamn: Jhon\r\n                Efternamn: Silver\r\n                Personmummer: 6704189765\r\n                Telefon: 0700557799\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Pirate AB\r\n                Övrigt: RUM!\r\n                Boknings datum: 02-10-2017\r\n            '),
(13, 'Dum Kalle', '2147483647', '7352685', 3, 'Ropsten', '7500', '2017-09-30', '0000-00-00', '\r\n                Nivå: 3\r\n                \r\n                Plats: Ropsten\r\n                Datum: 2017-09-30\r\n                Pris: 7500kr\r\n\r\n                Förnamn: Dum\r\n                Efternamn: Kalle\r\n                Personmummer: 9511044455\r\n                Telefon: 07352685\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: DUM AB\r\n                Övrigt: Kill me pls\r\n                Boknings datum: 02-10-2017\r\n            '),
(14, 'Zav Ham', '2147483647', '737006933', 2, 'Odenplan', '13000', '2018-09-23', '0000-00-00', '\r\n                Nivå: 2\r\n                \r\n                Plats: Odenplan\r\n                Datum: 2018-09-23\r\n                Pris: 13000kr\r\n\r\n                Förnamn: Zav\r\n                Efternamn: Ham\r\n                Personmummer: 9602208953\r\n                Telefon: 0737006933\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Zav AB\r\n                Övrigt: Inga\r\n                Boknings datum: 02-10-2017\r\n            '),
(15, 'Oleg Lopes', '999999999', '2147483647', 1, 'Slussen', '3000', '2019-01-01', '2017-10-02', '\n                Nivå: 1\n                \n                Plats: Slussen\n                Datum: 2019-01-01\n                Pris: 3000kr\n\n                Förnamn: Oleg\n                Efternamn: Lopes\n                Personmummer: 4570876958\n                Telefon: 6754356879\n                Email: pokskok@yandex.ru\n\n                Firm: Ingen\n                Övrigt: Inga\n                Boknings datum: 02-10-2017\n            '),
(16, 'Oleg Lopes', '9511044435', '737445678', 1, 'Medborgarplatsen', '14000', '2024-04-03', '2017-10-02', '\r\n                Nivå: 1\r\n                \r\n                Plats: Medborgarplatsen\r\n                Datum: 2024-04-03\r\n                Pris: 14000kr\r\n\r\n                Förnamn: Oleg\r\n                Efternamn: Lopes\r\n                Personmummer: 9511044435\r\n                Telefon: 0737445678\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Gelo AB\r\n                Övrigt: Inga\r\n                Boknings datum: 02-10-2017\r\n            '),
(17, 'Oleg Gelo', '9511942222', '737442899', 1, 'Medborgarplatsen', '14000', '2024-04-03', '2017-10-02', '\r\n                Nivå: 1\r\n                \r\n                Plats: Medborgarplatsen\r\n                Datum: 2024-04-03\r\n                Pris: 14000kr\r\n\r\n                Förnamn: Oleg\r\n                Efternamn: Gelo\r\n                Personmummer: 9511942222\r\n                Telefon: 0737442899\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Ingen\r\n                Övrigt: Inga\r\n                Boknings datum: 02-10-2017\r\n            '),
(18, 'Soabaki Uzumaki', '9801019999', '7542819', 2, 'Gamla Stan', '27000', '2020-05-02', '2017-10-02', '\r\n                Nivå: 2\r\n                \r\n                Plats: Gamla Stan\r\n                Datum: 2020-05-02\r\n                Pris: 27000kr\r\n\r\n                Förnamn: Soabaki\r\n                Efternamn: Uzumaki\r\n                Personmummer: 9801019999\r\n                Telefon: 07542819\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Ingen\r\n                Övrigt: Inga\r\n                Boknings datum: 02-10-2017\r\n            '),
(19, 'Oleg Lopes', '9511044292', '737442514', 2, 'Gamla Stan', '27000', '2020-05-02', '2017-10-02', '\r\n                Nivå: 2\r\n                \r\n                Plats: Gamla Stan\r\n                Datum: 2020-05-02\r\n                Pris: 27000kr\r\n\r\n                Förnamn: Oleg\r\n                Efternamn: Lopes\r\n                Personmummer: 9511044292\r\n                Telefon: 0737442514\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Ingen\r\n                Övrigt: Inga\r\n                Boknings datum: 02-10-2017\r\n            '),
(20, 'Oleg Lopes', '9101019942', '373448282', 2, 'Gamla Stan', '27000', '2020-05-02', '2017-10-02', '\r\n                Nivå: 2\r\n                \r\n                Plats: Gamla Stan\r\n                Datum: 2020-05-02\r\n                Pris: 27000kr\r\n\r\n                Förnamn: Oleg\r\n                Efternamn: Lopes\r\n                Personmummer: 9101019942\r\n                Telefon: 0373448282\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Ingen\r\n                Övrigt: Inga\r\n                Boknings datum: 02-10-2017\r\n            '),
(21, 'Oleg Lopes', '9511044492', '0737442899', 3, 'Ropsten', '7500', '2017-09-30', '2017-10-02', '\r\n                Nivå: 3\r\n                \r\n                Plats: Ropsten\r\n                Datum: 2017-09-30\r\n                Pris: 7500kr\r\n\r\n                Förnamn: Oleg\r\n                Efternamn: Lopes\r\n                Personmummer: 9511044492\r\n                Telefon: 0737442899\r\n                Email: pokskok@yandex.ru\r\n\r\n                Firm: Ingen\r\n                Övrigt: Inga\r\n                Boknings datum: 02-10-2017\r\n            ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `1_`
--
ALTER TABLE `1_`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `2_`
--
ALTER TABLE `2_`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `3_`
--
ALTER TABLE `3_`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `1_`
--
ALTER TABLE `1_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `2_`
--
ALTER TABLE `2_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `3_`
--
ALTER TABLE `3_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
