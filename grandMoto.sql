-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 23 2017 г., 23:26
-- Версия сервера: 5.7.17-0ubuntu0.16.04.1
-- Версия PHP: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grandMoto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `productType_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `array_attr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `url_latin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `url_latin`, `created_at`, `updated_at`, `weight`) VALUES
(89, 'Для мотоцикла', 0, 'dlya-motocikla', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 29),
(90, 'Экипировка / Защита', 0, 'ekipirovka-zashchita', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 28),
(91, 'Для мотоциклиста', 0, 'dlya-motociklista', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 26),
(92, 'Расходники / запчасти', 0, 'rashodniki-zapchasti', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 27),
(93, 'Электронные аксессуары', 89, 'elektronnye-aksessuary', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(94, 'Аксессуары', 89, 'aksessuary', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 1),
(95, 'Аудио системы для мотоцикла', 93, 'audio-sistemy-dlya-motocikla', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(96, 'Гудки, СГУ', 93, 'gudki-sgu', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 1),
(97, 'Ксенон, стробоскопы, свет', 93, 'ksenon-stroboskopy-svet', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 2),
(98, 'Поворотники', 93, 'povorotniki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 7),
(99, 'Подогрев руля', 93, 'podogrev-rulya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 3),
(100, 'Прикуриватели', 93, 'prikurivateli', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 4),
(101, 'Сигнализации', 93, 'signalizacii', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 5),
(102, 'Средства связи, интеркомы', 93, 'sredstva-svyazi-interkomy', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 6),
(103, 'Другое', 93, 'drugoe', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 8),
(104, 'Грипсы для мотоцикла', 94, 'gripsy-dlya-motocikla', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(105, 'Зеркала', 94, 'zerkala', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 1),
(106, 'Наклейки, болтики и др.', 94, 'nakleyki-boltiki-i-dr', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 2),
(107, 'Другое', 94, 'drugoe', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 3),
(108, 'Масла', 92, 'masla', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(109, 'Пластик, обвес, другие части', 92, 'plastik-obves-drugie-chasti', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 2),
(110, 'Ручки сцепления / тормоза, ножки', 92, 'ruchki-scepleniya-tormoza-nozhki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 1),
(111, 'Бахилы от дождя', 90, 'bahily-ot-dozhdya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 4),
(112, 'Куртки, штаны, джерси', 90, 'kurtki-shtany-dzhersi', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 1),
(113, 'Мотоботы', 90, 'motoboty', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(114, 'Мотоочки и маски', 90, 'motoochki-i-maski', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 5),
(115, 'Мотоперчатки', 90, 'motoperchatki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 2),
(116, 'Моточерепахи, наколенники, защита', 90, 'motocherepahi-nakolenniki-zashchita', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 3),
(117, 'Футболки и др.одежда', 90, 'futbolki-i-drodezhda', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 6),
(118, 'Защита лица и головы', 91, 'zashchita-lica-i-golovy', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(129, 'Крепеж, сумки, кофры', 94, 'krepezh-sumki-kofry', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(130, 'Бахилы и дождевики', 90, 'bahily-i-dozhdeviki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(139, 'TEST', 92, 'test', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(143, 'Двигатель', 92, 'dvigatel', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(144, 'Прокладки и уплотнения', 143, 'prokladki-i-uplotneniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(145, 'Прокладки клапанной крышки', 144, 'prokladki-klapannoy-kryshki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(714, 'Тормозная система', 92, 'tormoznaya-sistema', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(715, 'Фитинг', 714, 'fiting', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(717, 'Прокладки головки цилиндра', 144, 'prokladki-golovki-cilindra', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(726, 'Обвес мотоцикла', 92, 'obves-motocikla', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(727, 'Выхлопная система', 726, 'vyhlopnaya-sistema', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(728, 'Прокладки выпускного коллектора', 727, 'prokladki-vypusknogo-kollektora', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(1067, 'Прокладки цилиндра', 144, 'prokladki-cilindra', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(1130, 'Прокладки крышки сцепления', 144, 'prokladki-kryshki-scepleniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(1163, 'Привод колеса', 92, 'privod-kolesa', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(1164, 'Замки приводной цепи', 1163, 'zamki-privodnoy-cepi', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(1201, 'Прокладки крышки генератора', 144, 'prokladki-kryshki-generatora', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(1667, 'Сальники двигателя', 144, 'salniki-dvigatelya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(2812, 'Электрооборудование', 92, 'elektrooborudovanie', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(2813, 'Колпачок свечной', 2812, 'kolpachok-svechnoy', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(2818, 'Свечи зажигания', 2812, 'svechi-zazhiganiya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(3284, 'Уплотнения выхлопной системы', 727, 'uplotneniya-vyhlopnoy-sistemy', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(3285, 'Фильтра для мотоцикла', 92, 'filtra-dlya-motocikla', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(3286, 'Фильтра масляные', 3285, 'filtra-maslyanye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(3412, 'Сальники клапанов', 144, 'salniki-klapanov', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(3484, 'Звезды ведущие', 1163, 'zvezdy-vedushchie', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(6008, 'Шланги тормозные', 714, 'shlangi-tormoznye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(6430, 'Фильтра воздушные', 3285, 'filtra-vozdushnye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(6489, 'Цилиндро-поршневая группа', 143, 'cilindro-porshnevaya-gruppa', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(6490, 'Подшипники двигателя', 6489, 'podshipniki-dvigatelya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(6666, 'Ремни приводные', 1163, 'remni-privodnye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(6802, 'Поршень в сборе', 6489, 'porshen-v-sbore', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(6805, 'Ремни ГРМ', 143, 'remni-grm', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7369, 'Лампы головного света', 2812, 'lampy-golovnogo-sveta', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7542, 'Подшипники игольчатые', 6489, 'podshipniki-igolchatye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7563, 'Заглушки выхлопной трубы', 727, 'zaglushki-vyhlopnoy-truby', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7643, 'Подвеска', 92, 'podveska', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7644, 'Подшипники оси колеса', 7643, 'podshipniki-osi-kolesa', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7652, 'Цепи ГРМ', 143, 'cepi-grm', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7662, 'Сальники вилки', 7643, 'salniki-vilki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(7752, 'Фильтра топливные', 3285, 'filtra-toplivnye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8135, 'Сцепление', 143, 'sceplenie', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8136, 'Пружины сцепления', 8135, 'pruzhiny-scepleniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8139, 'Подшипники рулевой колонки', 7643, 'podshipniki-rulevoy-kolonki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8211, 'Тросы', 92, 'trosy', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8212, 'Трос сцепления', 8211, 'tros-scepleniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8308, 'Пыльники вилки', 7643, 'pylniki-vilki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8711, 'Диски сцепления', 8135, 'diski-scepleniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8786, 'Колодки тормозные', 714, 'kolodki-tormoznye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(8795, 'Ремкомплект прогрессии подвески', 7643, 'remkomplekt-progressii-podveski', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9198, 'Подшипники заднего амортизатора', 7643, 'podshipniki-zadnego-amortizatora', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9226, 'Комплект сальников и пыльников', 7643, 'komplekt-salnikov-i-pylnikov', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9289, 'Трансмиссия', 92, 'transmissiya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9290, 'Пыльники шруса', 9289, 'pylniki-shrusa', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9315, 'Ремкомплект тормозного суппорта', 714, 'remkomplekt-tormoznogo-supporta', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9317, 'Звезды ведомые', 1163, 'zvezdy-vedomye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9342, 'Комплект уплотнений', 1163, 'komplekt-uplotneniy', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9518, 'Ролики цепи', 1163, 'roliki-cepi', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9519, 'Ролики цепи', 1163, 'roliki-cepi-0', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9659, 'Дифференциал', 9289, 'differencial', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9724, 'Грузы руля', 726, 'gruzy-rulya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9858, 'Аккумуляторы', 2812, 'akkumulyatory', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9905, 'Зарядные устройства', 2812, 'zaryadnye-ustroystva', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9908, 'Ремкомплект главного тормозного цилиндра', 714, 'remkomplekt-glavnogo-tormoznogo-cilindra', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(9917, 'Аккумуляторы', 2812, 'akkumulyatory-0', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10032, 'Кольца поршневые', 6489, 'kolca-porshnevye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10035, 'Шаровая опора', 7643, 'sharovaya-opora', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10037, 'Бачек тормозной жидкости', 714, 'bachek-tormoznoy-zhidkosti', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10041, 'Гофры вилки', 7643, 'gofry-vilki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10057, 'Цепи приводные', 1163, 'cepi-privodnye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10065, 'Карданная передача', 9289, 'kardannaya-peredacha', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10141, 'Поршень тормозного суппорта', 714, 'porshen-tormoznogo-supporta', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10352, 'Направляющие втулки', 7643, 'napravlyayushchie-vtulki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10371, 'Выключатели стоп-сигнала', 2812, 'vyklyuchateli-stop-signala', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(10523, 'Ремкомплект рычага подвески', 7643, 'remkomplekt-rychaga-podveski', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11019, 'Рулевые наконечники', 7643, 'rulevye-nakonechniki', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11073, 'Система охлаждения', 143, 'sistema-ohlazhdeniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11207, 'Подшипники маятника', 7643, 'podshipniki-mayatnika', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11362, 'Подшипники коленвала', 6489, 'podshipniki-kolenvala', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11495, 'Диски тормозные', 714, 'diski-tormoznye', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11733, 'Держатель задней звезды', 1163, 'derzhatel-zadney-zvezdy', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11740, 'Переходники тормозного суппорта', 714, 'perehodniki-tormoznogo-supporta', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11767, 'Рычаги сцепления', 726, 'rychagi-scepleniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11768, 'Рычаги тормоза', 726, 'rychagi-tormoza', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0),
(11820, 'Крышки сцепления', 8135, 'kryshki-scepleniya', '2017-02-23 17:13:10', '2017-02-23 17:13:10', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_15_191946_create_products_table', 1),
(4, '2017_02_15_194852_create_productTypes_table', 1),
(5, '2017_02_15_195313_create_categories_table', 1),
(6, '2017_02_15_195618_create_photos_table', 1),
(7, '2017_02_15_195910_create_vocabulary_table', 1),
(8, '2017_02_15_200010_create_taxons_table', 1),
(9, '2017_02_15_200647_create_attributes_table', 1),
(10, '2017_02_22_204101_crate_Slides_table', 1),
(11, '2017_02_23_080615_add_column_active_to_sldes', 1),
(12, '2017_02_23_140011_add_weight_to_categories_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `url_latin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `productTypes`
--

CREATE TABLE `productTypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vocabulary_array_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slides`
--

INSERT INTO `slides` (`id`, `title`, `body`, `url`, `image`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Слайд 1', 'Тестовое сообщение', 'test_url', '1487875056.jpg', '2017-02-23 16:37:36', '2017-02-23 16:37:36', 1),
(3, 'Слайд 3', 'тестовое сообщение', 'url_test', '1487875127.jpg', '2017-02-23 16:38:48', '2017-02-23 16:38:48', 1),
(4, 'Слайд 2', 'Привет', 'test _url', '1487875166.jpg', '2017-02-23 16:39:27', '2017-02-23 16:39:27', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `taxons`
--

CREATE TABLE `taxons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vocab_id` int(11) NOT NULL,
  `url_latin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `vocabulary`
--

CREATE TABLE `vocabulary` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `productTypes`
--
ALTER TABLE `productTypes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `taxons`
--
ALTER TABLE `taxons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11821;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `productTypes`
--
ALTER TABLE `productTypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `taxons`
--
ALTER TABLE `taxons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vocabulary`
--
ALTER TABLE `vocabulary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
