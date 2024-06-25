-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2023 г., 18:37
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clife`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'District', NULL, 'district', NULL, NULL),
(2, 'Yedoo', NULL, 'yedoo', NULL, NULL),
(3, 'Footwork', NULL, 'footwork', NULL, NULL),
(4, 'Юнион', NULL, 'yunion', NULL, NULL),
(5, 'FILA', NULL, 'fila', NULL, NULL),
(6, 'SEBA', NULL, 'seba', NULL, NULL),
(7, 'Inglesina', NULL, 'inglesina', NULL, NULL),
(8, 'Anex', NULL, 'anex', NULL, NULL),
(9, 'GIANT', NULL, 'giant', NULL, NULL),
(10, 'FUJI', NULL, 'fuji', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `order_id`, `amount`, `created_at`, `updated_at`) VALUES
(46, 9, 42, 22, 3, '2023-10-25 12:21:37', '2023-10-25 12:22:54'),
(47, 9, 42, 23, 3, '2023-10-25 12:33:42', '2023-10-25 12:34:39'),
(48, 9, 54, 23, 3, '2023-10-25 12:34:30', '2023-10-25 12:34:39');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `declension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `declension`, `type_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Велосипеды', 'Велосипед', 1, 'velosipedi', NULL, NULL),
(2, 'Самокаты', 'Самокат', 1, 'samokati', NULL, NULL),
(3, 'Скейтборды', 'Скейтборд', 1, 'skateboards', NULL, NULL),
(4, 'Ролики', 'Ролики', 1, 'roliki', NULL, '2023-04-21 12:45:30'),
(5, 'Коляски', 'Коляска', 1, 'kolyaski', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_02_070023_create_brands_table', 1),
(6, '2023_04_02_071154_add_image_column_to_brands_table', 2),
(7, '2023_04_02_093111_add_lastname_column_to_users_table', 3),
(8, '2023_04_03_110054_create_categories_table', 4),
(9, '2023_04_03_110108_create_seasons_table', 4),
(10, '2023_04_03_110116_create_genders_table', 4),
(11, '2023_04_03_111940_add_slug_column_to_brands_table', 5),
(12, '2023_04_03_112846_create_products_table', 6),
(13, '2023_04_03_114509_add_declension_column_to_categories_table', 7),
(14, '2023_04_03_120357_add_image_column_to_products_table', 8),
(15, '2023_04_04_040140_create_types_table', 9),
(16, '2023_04_04_040300_add_type_id_column_to_products_table', 10),
(17, '2023_04_04_040937_add_type_id_column_to_categories_table', 11),
(18, '2023_04_04_140245_change_declension_column_to_categories_table', 12),
(19, '2023_04_04_140422_add_status_column_to_users_table', 13),
(20, '2023_04_05_140952_add_in_stock_column_to_products_table', 14),
(21, '2023_04_06_090824_create_orders_table', 15),
(22, '2023_04_06_091007_create_carts_table', 16),
(23, '2023_04_06_092142_change_table_to_carts_table', 17),
(24, '2023_04_06_122747_change_сomment_to_orders_table', 18),
(25, '2023_04_06_124941_add_usercolumn_to_orders_table', 19),
(26, '2023_04_07_171917_remove_some_to_products_table', 20),
(27, '2023_04_18_133707_add_login_column_to_users_table', 21),
(28, '2023_04_24_031907_add_patronymic_column_to_users_table', 22);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'новый',
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(22, 9, 'Новый', NULL, '2023-10-25 12:22:54', '2023-10-25 12:22:54'),
(23, 9, 'Новый', NULL, '2023-10-25 12:34:39', '2023-10-25 12:34:39');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` int NOT NULL DEFAULT '10',
  `brand_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `in_stock`, `brand_id`, `category_id`, `type_id`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Wolfer RS', 77000, 'Экстремальная версия топ-модели Wolfer расширяет границы возможного ещё дальше. Идеальные пропорции, лучший дизайн, конструктивные изменения для преимуществ в состязаниях и широкие возможности персонализации разгонят сердце каждого гонщика. Wolfer RS - это модель для тех, кто стремится к рекордам. Отныне возможно всё.', 'Wolfer_RS_12721_black_side_original_0001.jpg', 7, 2, 2, 1, 'wolfer-rs', NULL, '2023-05-02 21:46:03'),
(23, 'DISTRICT Titus Complete Black', 10640, 'Вес комплита: 4000 грамм\nВысота комплита: 825 мм\nДоска: 500 х 119 мм\nКонкейв: 3 градуса\nРулевая: интегрированная\nДропауты: скошенные\nРуль: District 560 х 510 мм\nВнутренний диаметр руля: 28,7 мм\nВнешний диаметр руля: 31,8 мм\nЗажим: 2 болта\nВилка: District\nКомпрессионная система: IHC\nКолёса: District 110 х 24 мм\n\n65% алюминий, 30% сталь, 5% полиуретан', 'ifwr0h.jpeg', 7, 1, 2, 1, 'asus-rog-sl200-chernyj', NULL, '2023-04-24 02:24:23'),
(33, 'Трюковой District Inoy', 4557, 'Возраст: от 5 лет\r\n\r\nКомпрессия: HIC\r\n\r\nВысота самоката: 83 см\r\n\r\nВысота руля: 58 см\r\n\r\nШирина руля: 52.5 см\r\n\r\nМатериал рукояток: Резина\r\n\r\nХомут: Четырехболтовый\r\n\r\nДека: алюминиевая (48 см х 10 см)\r\n\r\nКолеса: Алюминий\r\n\r\nЖесткость колес: 88А\r\n\r\nРазмер колес: 110 мм\r\n\r\nТормоз: задний наступающий (step-on brake)\r\n\r\nПодшипник: ABEC-9 Chrome\r\n\r\nПротивоскользящее покрытие: да\r\n\r\nКлиренс: 46 мм\r\n\r\nВес: 3.28 кг\r\n\r\nВес самоката в коробке: 3.88 кг\r\n\r\nВарианты расцветок: cиний, красный\r\n\r\nБренд: Россия', '6300276229.webp', 10, 1, 2, 1, 'samokat-tryukovoj-district-inoy', NULL, NULL),
(34, 'Dragstr', 49900, 'Dragstr - быстр, легок и в то же время компактен, как складной карманный нож. Такие свойства у других самокатов не найдете. „Drag racing“возможно самый старый вид автомобильных и мотоциклетных гонок, на которых обычно два транспортных средства одновременно стартуют на короткой прямой трассе. А чаще всего соревнуются и не на трассе. Dragstr справляется везде без проблем. Высокий стандарт компонентов аналогичен моделям Wolfer и Trexx, но большим преимуществом Dragstr является его компактный размер. Летит как дракон.\r\n\r\n', 'Dragstr_12703_Y30_blue_side_original_0001.jpg', 10, 2, 2, 1, 'dragstr', NULL, NULL),
(35, 'Friday', 24999, 'Сегодня вам нужно исследовать рынок, три кафе, две открытые выставки, кино и все клубы. Вечер пятницы и город сияет только для вас. Или, может быть, вы ездите по съемочной площадке. Или на самом деле, вы собираетесь на урок по скрипке или может даже к пруду. Нет, вы на складе в магазине и вам нужно быстро в здание C ... Порядок, все можно успеть! Friday имеет отличную маневренность, легко и быстро проходит повороты, преодолевая все неровности на пути. Поместится и в багажнике (благодаря быстросъемным зажимам на обоих колесах), и в трамвае, и в классе, и в офисе. И этот офис может быть на 5 этаже в доме без лифта – эти неполные 7 килограмм унесет и ваша собачка!\r\n\r\n', 'Friday_12705_Y30_cream_threequarters_original.jpg', 10, 2, 2, 1, 'friday', NULL, NULL),
(36, 'DISTRICT Titus Complete Ano Gold', 10499, 'Вес комплита: 4000 грамм\r\nВысота комплита: 825 мм\r\nДоска: 500 х 119 мм\r\nКонкейв: 3 градуса\r\nРулевая: интегрированная\r\nДропауты: скошенные\r\nРуль: District 560 х 510 мм\r\nВнутренний диаметр руля: 28,7 мм\r\nВнешний диаметр руля: 31,8 мм\r\nЗажим: 2 болта\r\nВилка: District\r\nКомпрессионная система: IHC\r\nКолёса: District 110 х 24 мм\r\n\r\n65% алюминий, 30% сталь, 5% полиуретан', 'r8etvkin7yw2.png', 10, 1, 2, 1, 'district-titus-complete-ano-gold', NULL, NULL),
(37, 'Progress Tushev Hive Black 8”', 5243, 'Промодель Саши Тушева👌\r\n\r\nОсобенности готовых скейтбордов Footwork, и почему это важно:\r\n\r\nГотовый скейтборд это лучшее решение если вы только начинаете кататься или хотите сделать подарок! Пока у вас немного опыта в комплектующих, и нет персональных предпочтений лучше воспользоваться нашими знаниями и выбрать готовый скейтборд. В будущем вы всегда сможете модифицировать свой первый скейтборд, например дополнив его колесами или подшипниками, заменить подвески или наоборот переставить все комплектующие на свежую деку в новом сезоне.', '2348641752.webp', 10, 3, 3, 1, 'progress-tushev-hive-black-8', NULL, NULL),
(38, 'ДЕТСКИЙ КОМПЛЕКТ СКЕЙТ \"U-MAN\"', 4999, 'Яркие цвета\r\nсохранятся надолго\r\nЛегко\r\nповорачивать\r\nМожно быстро\r\nездить\r\nЛегкие, чтобы\r\nносить', '123123.png', 10, 4, 3, 1, 'detskij-komplekt-skejt-u-man', NULL, NULL),
(39, 'Footwork Bandana 8”', 4959, 'Бренд\r\nFootwork\r\nКонструкция\r\nClassic\r\nМатериал деки\r\nКанадский клен\r\nЧисло слоев деки\r\n7\r\nКонкейв\r\nСредний\r\nШкурка\r\nFootwork Classic Black\r\nПодвески\r\nFootwork Raw\r\nКолеса\r\n53mm, 99A\r\nПодшипники\r\nABEC5\r\nВинты\r\nFootwork', '1-Cкейтборд-в-сборе-Footwork-Bandana-8_-X-31.5_-1.webp', 10, 3, 3, 1, 'skejtbord-footwork-bandana-8', NULL, NULL),
(40, 'Footwork Rock 8.125”', 5992, 'Бренд\r\nFootwork\r\nКонструкция\r\nClassic\r\nМатериал деки\r\nКанадский клен\r\nЧисло слоев деки\r\n7\r\nКонкейв\r\nСредний\r\nШкурка\r\nFootwork Classic Black\r\nПодвески\r\nFootwork Raw\r\nКолеса\r\n53mm, 99A\r\nПодшипники\r\nABEC5\r\nВинты\r\nFootwork', '13-Cкейтборд-в-сборе-Footwork-ROCK-8.125_-X-31.625_-1.webp', 10, 3, 3, 1, 'skejtbord-footwork-rock-8125', NULL, NULL),
(41, 'Footwork Raptors 8”', 5992, 'Бренд\r\nFootwork\r\nКонструкция\r\nClassic\r\nМатериал деки\r\nКанадский клен\r\nЧисло слоев деки\r\n7\r\nКонкейв\r\nСредний\r\nШкурка\r\nFootwork Classic Black\r\nПодвески\r\nFootwork Raw\r\nКолеса\r\n53mm, 99A\r\nПодшипники\r\nABEC5\r\nВинты\r\nFootwork', '3-Скейтборд-в-сборе-Footwork-Raptors-8_-X-31.5_-1.webp', 10, 3, 3, 1, 'footwork-raptors-8', NULL, NULL),
(42, 'Giant Intrigue LT 2 (2023)', 448990, 'Liv Intrigue LT 2 - уникальное предложение для девушек, предпочитающих кататься в стилях AM и Эндуро. Ключевая особенность данной модели - рама, разработанная командой Giant со всей чуткостью и вниманием к деталям. Фирменный алюминиевый сплав обеспечит сравнительно легкий вес, высокую прочность и стабильность поведения на разгоне, в поворотах, в пролетах и при приземлениях. Навесное оборудование подобрано так, что байк остается стабильным, эффективным и динамичным вне зависимости от того, какую трассу вы покоряете и какие погодные условия вас застанут. В сочетании это даст бескомпромиссный инструмент, с которым можно свободно повышать свой навык и смело стремиться к пьедесталам!', 'full.jpg', 1, 9, 1, 1, 'giant-intrigue-lt-2-2023', NULL, '2023-10-25 12:34:39'),
(43, 'Giant Anthem Advanced Pro 29 0', 998000, 'Двухподвесный велосипед Giant Anthem Advanced Pro 29 0 (2022) – яркий представитель своего класса, способный порадовать опытных спортсменов. Рама Advanced-Grade Composite отличается высокой сбалансированностью конструкции. Модель седла Fi\'zi:k Antares R5 with K:ium rails выполнена с учётом инновационных разработок. Уровень оборудования – профессиональный. Байк оборудован переключателем SRAM XX Eagle AXS, чтобы менять передачи во время поездки. Модель обладает прочными покрышками с глубоким протектором Maxxis Recon Race 29x2.4. Шатуны SRAM XX Eagle великолепно передают энергию велосипедиста от педалей к звёздочкам. Для быстрых остановок используются отлично себя проявляющие дисковые гидравлические тормоза Shimano XTR BR-MT9100.', 'full (1).jpg', 10, 9, 1, 1, 'giant-anthem-advanced-pro-29-0', NULL, NULL),
(44, 'Fuji 2023 Feather темно-серый', 55000, 'Подходит для роста 173–180 см (±1см)\r\n\r\nМатериал рамы: хромомолибден.\r\nРазмер колес 700х30с.\r\nМощные ободные тормоза Tektro R315.\r\nЖесткая и легкая стальная вилка.\r\nРазмер рамы 57см.\r\nУдобное ретро седло из кожзама.\r\nВтулка флип-флоп.\r\nРуль баран.', 's8dh6c2cox1drmcfh6lf1xbzh7m3zt2d.webp', 10, 10, 1, 1, 'fuji-2023-feather-temno-seryj', NULL, NULL),
(45, 'FUJI SPORTIF 2.1 2023', 110000, 'Производитель	FUJI Bikes\r\nСерия	SPORTIF\r\nГод выпуска	2023\r\nПол	Мужские, Унисекс\r\nНазначение велосипеда	Шоссейный, Endurance\r\nМатериал рамы	Алюминий\r\nРама	A2-SL alloy, threaded bottom bracket\r\nТип руля	Изогнутый руль баран', '6w2zn5ob6s7u9nzazlc1hum75bo7rnhj.webp', 10, 10, 1, 1, 'fuji-sportif-21-2023', NULL, NULL),
(46, 'FUJI NEVADA 27.5 4.0 LTD HD 2023', 63400, 'Производитель	FUJI Bikes\r\nСерия	NEVADA\r\nГод выпуска	2023\r\nПол	Мужские, Унисекс\r\nНазначение велосипеда	Хардтейл, Спортивный, Прогулочный, Фитнес, MTB, Туристический\r\nМатериал рамы	Алюминий\r\nРама	Fuji A2-SL custom-butted alloy front triangle, Fuji A1-SL alloy rear triangle\r\nВес	14,39 кг', 'ys0nz2lflfwgb2cx83af4z9t0nxqtj0d.webp', 10, 10, 1, 1, 'fuji-nevada-275-40-ltd-hd-2023', NULL, NULL),
(47, 'Fila Houdini Pro', 6999, 'Фитнесс модель на основе ботинка от Fila NRK. Жесткий и прочный ботинок от фрискейтовой модели. Бакли и кафф на прочных заклепках. Рама длиной 248 мм, которая позволяет установить 3 колеса по 110мм в диаметре.', 'fila-goudini-pro1-650x650.png', 10, 5, 4, 1, 'fila-houdini-pro', NULL, NULL),
(48, 'FILA LEGACY COMP Black-Grey ', 8599, 'Фитнес ролики от Fila Legacy Comp – лёгкие и удобные ролики, рассчитанные на средний уровень подготовки роллера. Они отлично подойдут для прогулочного катания по городу, паркам и набережным. Колёса дают отличный баланс на скорости и управляемости роликовых коньков. Нога фиксируется с помощью шнурков, пяточного ремня и верхней бакли.', '0e432b07b8a0563101b3ca8e0d4be140.png', 10, 5, 4, 1, 'fila-legacy-comp-black-grey', NULL, NULL),
(49, 'SEBA FRX 80 BLACK', 8999, 'Новинка серии FRX оборудована отличной рамой. У роллера есть возможность выставлять роккеринг при помощи осей-эксцентриков. В конструкции также предусмотрены сменные пластиковые слайдеры. Данные элементы надежно защищают боковые поверхности от истирания. Внутренник никаких нареканий не вызывает. Обеспечивает должный уровень комфорта в процессе катания. Язык внутренника стал немного шире, что обеспечило лучший обхват ноги.', '35a556b370b9358fda6c1a751599b152.png', 10, 6, 4, 1, 'seba-frx-80-black', NULL, NULL),
(50, 'FILA J-ONE G black-white-magenta', 4999, 'Раздвижные детские ролики от фирмы Fila.Мягкие, хорошо поддерживающие ногу раздвижные роликовые коньки с современным дизайном и превосходными техническими характеристиками.', 'd8554d4d-bc32-11eb-aabf-002590aad2ab_4e065599-bc3f-11eb-aabf-002590aad2ab.png', 10, 5, 4, 1, 'fila-j-one-g-black-white-magenta', NULL, NULL),
(51, 'SEBA HIGH LIGHT V.2 WHITE', 3999, 'Seba High Light - это классическая модель для слалома, выпускается уже много лет и за годы, выверена до мелочей. Идеальные ролики, для тех, кто не желает переплачивать за карбон, а предпочитает надежные и практические неубиваемы слаломные ролики. High Light - относятся к унисекс моделям, что позволяет их использовать не только роллерам, но и преданным поклонницам слалома. Ботинок разработан таким образом, чтобы надежно фиксировать ногу, но при этом не сдавливать и не вызывать дискомфорт в процессе катания.  Внутренник - встроенный, для наилучшего контроля за роликовыми коньками, и при этом имеет достаточную толщину, чтобы катание было еще и комфортным. Особое внимание было уделено устойчивости роликов к износу. Боковые поверхности надежно защищены слайдерами. Данные элементы в случае сильного износа можно заменить. Модель V2 комплектуется облегченной версией рамы Deluxe V2, которая осталась такой-же прочной, как и \"обычная\" Deluxe, но при этом чуть легче.', 'd4b34223aca568ffe5a55b02ae386cbf.png', 10, 6, 4, 1, 'seba-high-light-v2-white', NULL, NULL),
(52, 'INGLESINA SOFIA IMPERIAL BLUE', 6999, 'Идеальна для эксплуатации в холодные времена года. Спальное место предназначено для малыша от рождения до 6-ти месяцев. Сравнительно большие внутренние размеры люльки Inglesina Sofia обеспечат комфортное пребывание в коляске даже очень крупного малыша.', 'kolyaska_sofia_imperial_blue.png', 10, 7, 5, 1, 'inglesina-sofia-imperial-blue', NULL, NULL),
(53, 'Inglesina SOFIA DUO 2 в 1 BROWN', 8999, 'Стильная классика, подходящая как для города, так и для загородной жизни. Люлька оснащена системой климат-контроля, призванной обеспечить комфорт ребенка в каждое время года. Новые обивочные ткани Sofia Comfort Touch позволят Вашему ребенку чувствовать себя легко и счастливо.', 'indigo-denim-3-21-1000x1072.png', 10, 7, 5, 1, 'inglesina-sofia-duo-2-v-1-brown', NULL, NULL),
(54, 'Anex Sport Discovery Edition 3 в 1', 39999, 'Воплощение самых современных представлений о здоровом и активном образе жизни, гармонично сочетающимися с классическими традициями швейцарского дизайна. Сделав ставку на использование самых современных экологичных материалов и применение инновационных технологий последних поколений, компания Anex предложила покупателям оригинальную и стильную модель, в которой усовершенствованная подвеска дополнена продуманной системой безопасности. Исключительная плавность хода обеспечивает высочайший уровень комфорта ребенка, а легкость управления и маневренность коляски становятся гарантией максимального удобства и для родителей.', 'se01-600x600-550x500.png', 5, 8, 5, 1, 'anex-sport-discovery-edition-3-v-1', NULL, '2023-10-25 12:34:40'),
(55, 'Anex Air-X (AX-07/L) Toffee', 29999, 'Новинка от компании Anex – летняя прогулочная коляска Anex Air X. В ней продуманы все мелочи для удобства малыша и родителей. Проходимое шасси с маневренными колесами, при этом коляска быстро складывается до компактных размеров, что позволяет ее брать в самолет как ручную кладь, а также легко уложить на заднее сидение автомобиля!', '4f1923127ad711ec985df8a2d6674d78_c8daa93184be11ec9860f8a2d6674d78.png', 10, 8, 5, 1, 'anex-air-x-ax-07l-toffee', NULL, NULL),
(56, 'INGLESINA Quid', 59999, 'Прогулочная коляска, которая идеально подойдет для путешествий. Благодаря компактным габаритам ее легко возить с собой в самолете, а легкий вес позволяет перемещать ее в сложенном виде по длинным коридорам аэропортов. Использованные производителем конструктивные решения обеспечивают удобство для родителей, а также комфорт для ребенка.', '8d13a3f25130980d179618922033d291ff19.png', 10, 8, 5, 1, 'inglesina-quid', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `patronymic`, `email`, `login`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Михаил', 'Садовников', 'Дмитриевич', 'admin@mail.ru', 'admin', 2, NULL, '$2y$10$SE1JUYCaieXbv2rx2XUQxufnB5Xv1EyqUEyKPJKj9WPzBLlBEGlSa', NULL, '2023-04-18 10:42:49', '2023-04-18 10:42:49'),
(5, '111', '111', 'Абобавич', '111@11', '111', 1, NULL, '$2y$10$IWzXRgLGE/4JcaWsZRxNxurVA3Mp0ew/79pBfFG9ayjFZO3WWn79q', NULL, '2023-04-21 02:37:28', '2023-04-21 02:37:28'),
(6, 'ertth', 'etdh', 'wresrtf', 'aa@mail.ru', 'hhh', 1, NULL, '$2y$10$bAuPDaOYEPUaOIriWK6WB.d6QkgeNh.QXxWGCqc09T0bPmuidKiEG', NULL, '2023-04-24 00:21:45', '2023-04-24 00:21:45'),
(7, 'вывы', 'выв', 'выв', 'dsffds@DSDAF', 'eweqw', 1, NULL, '$2y$10$1szAp0hSDMbzSxZ5iJdCzues7hFHJk5wNSdc5JdOFoNm88OX7BK36', NULL, '2023-04-24 02:22:36', '2023-04-24 02:22:36'),
(8, 'DSDS', 'DSDFD', 'DSFAS', 'DSDS@DSADSA', 'DSDS', 1, NULL, '$2y$10$A3Z6xZP73LM5cXi/laxE.u/0DdCYOIMmu7xm3gakOVA3b76gatwJW', NULL, '2023-04-24 02:25:18', '2023-04-24 02:25:18'),
(9, '123', 'Федоров', '3', 'll@mail.ru', 'admin1', 1, NULL, '$2y$10$v4md2XpyavSKuXs42rNffOAknUC/Ytet/Ir.xDkhoHBXlAkUtH0dO', NULL, '2023-10-25 12:20:14', '2023-10-25 12:20:14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
