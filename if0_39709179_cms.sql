-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: sql308.infinityfree.com
-- Время создания: Сен 08 2025 г., 17:36
-- Версия сервера: 11.4.7-MariaDB
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `if0_39709179_cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `summary` varchar(254) NOT NULL,
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `summary`, `content`, `created`, `category_id`, `member_id`, `image_id`, `published`) VALUES
(1, 'Systemic Brochure', 'Brochure design for science festival', 'This brochure design is part of a suite of advertising materials that promote the Systemic science festival. These materials feature the complex visual identity that is an abstract grid of pathways representing choice and decision-making in designing complex systems.', '2021-01-26 09:21:03', 1, 2, 1, 1),
(2, 'Forecast', 'Handbag illustration for fashion magazine', 'This drawing was commissioned by a fashion magazine for an article about spotting future trends. This piece uses luxury handbags to mimic clouds in a kind of fashion-based weather forecast-style graphic. The use of repetition and pattern highlights the potential power of a single prediction.', '2021-01-28 16:44:03', 3, 2, 2, 1),
(3, 'Swimming Pool', 'Architecture magazine photography', 'This photograph is one of a series commissioned for an article in an architectural magazine featuring swimming pools in private residences. The variety of locations shared a similar mid-century modern aesthetic and were rendered using a grainy, black and white film stock.', '2021-02-02 06:45:52', 4, 1, 3, 1),
(4, 'Walking Birds', 'Artwork for music video', 'The brief for this music video was to combine a psychedelic sixties vibe with a granola-brown seventies aesthetic and morph it into a Sesame Street-style animation. With over two million views online, the artwork successfully promoted the song across multiple social media channels.', '2021-02-12 08:05:35', 3, 3, 4, 1),
(6, 'Micro-Dunes', 'Photography for scientific journal', 'This photograph was commissioned to accompany a scientific article about micro-ecologies in the coastal environment. Due to the miniature scale of the subject matter, a macro lens was used to capture the fine detail. It was shot on location on the mid-north coast of Australia.', '2021-03-02 18:02:47', 4, 1, 6, 1),
(7, 'Milk Beach Website', 'Website for music series', 'Using the imagery commissioned for the album artwork, this website aims to provide a simple channel for users to listen to the music digitally. Care was taken to ensure fans of the music could connect with the brand and keep updated on future offerings.', '2021-03-06 07:16:22', 2, 1, 7, 1),
(8, 'Wellness App', 'App for health facility', 'The Wellness chain of health facilities required an app that allowed members to view and book classes. The existing brand style guide defined the overall look and feel of the site with the main goal of the design to be as minimalistic as possible.', '2021-03-12 11:45:49', 2, 2, 8, 1),
(9, 'Milk Beach Music', 'Photography for a music series', 'The music label that released this series wanted to capture the beach that inspired its creation. A number of photographs (including panoramic views and close-ups) were shot on location at Milk Beach in Sydney, Australia. They were given a duotone appearance in post-production.', '2021-03-12 14:09:40', 4, 1, 9, 1),
(10, 'Polite Society Mural', 'Large-scale illustrations for fashion label', 'This is one of several illustrations commissioned by fashion label, Polite Society, to decorate their new autumn-winter collection displays. Appearing in various forms (such as murals, digital projections, and in print) they represent the modern aesthetic of the latest range.', '2021-03-16 11:14:40', 3, 1, 10, 1),
(11, 'Stargazer Website and App', 'Website and app design for music festival', 'The Stargazer music festival website uses a highly typographic treatment to communicate the high calbre performers who will be appearing. As well as allowing users to view the line-up and purchase tickets, the website also allows them to plan their itineraries and book food.', '2021-03-17 15:01:19', 2, 3, 11, 1),
(12, 'The Ice Palace', 'Book cover design', 'This cover is for a Chimney Press reissue of the Norwegian classic novel, The Ice Palace. The design reflects the concise style of the writing and the sense of unease that appears throughout, almost as its own frozen character. The binding uses linen and a thick cover keeps its secrets close to its chest.', '2021-03-20 08:24:52', 1, 2, 12, 1),
(13, 'Chimney Press Website', 'Website for book publisher', 'This design was based on extensive research into the perception of the Chimney Press brand across multiple channels. The insights gained showed that customers were very keen to keep informed on new and upcoming releases and also to share this information throughout their social networks.', '2021-03-21 05:44:01', 2, 2, 13, 1),
(14, 'Milk Beach Album Cover', 'Packaging for music series', 'Having commissioned a number of photographs of the intertidal rocks that adorn the eponymous Milk Beach, this packaging creates a beautiful and serene context for the hugely successful music series. Natural, recycled cardstocks and gentle colorways were used throughout.', '2021-03-27 10:15:20', 1, 1, 14, 1),
(15, 'Seascape', 'Photograph for art exhibition', 'This shot of tbe sea at Margate was included in a group show at the Turner Contemporary art gallery in Kent, England. Printed at a large scale, the serene viewpoint reveals a timeless beauty to the briny waters that have lured Londoners to it for centuries.', '2021-04-03 17:36:08', 4, 2, 15, 1),
(16, 'Polite Society Website', 'Website for fashion label', 'The Polite Society website was rebuilt from the ground up with a complete evaluation of the old version and adjustments to the new user experience to respond to it. As well as working on multiple devices, a new back-end was built to encompass the expanding nature of the company.', '2021-04-06 08:21:44', 2, 1, 16, 1),
(17, 'Snow Search', 'Graphics for mobile game', 'These illustrations of a young boy and his dog formed the basis for a highly successful animated game called Snow Search. The game, which was designed for mobile devices, received several awards for game design and mechanics. More illustration work is currently underway for a sequel.', '2021-04-08 06:46:31', 3, 3, 17, 1),
(18, 'Floral Website', 'Website for florist', 'This florist in Brooklyn required an updated website to support the expanding scope of their business. Working in association with a stylist and a photographer, we created a pleasant and straightforward user experience. Since the relaunch, online enquiries have increased.', '2021-04-08 15:05:19', 2, 1, 18, 1),
(19, 'Abandoned Industry', 'Photograph for magazine feature', 'This photograph of old industrial equipment on a disused dock appeared alongside an essay in a magazine about urban-planning and regeneration. The brief was to consider the visual beauty inherent in decay and inspire readers to embrace sustainable idealogies within the contemporary landscape.', '2021-04-11 08:52:02', 4, 2, 19, 1),
(20, 'Chimney Business Cards', 'Stationery design for publishing company', 'Along with several other items of branded stationery, Chimney Press required new business cards for their expanding office staff. In keeping with their company mission of re-releasing older book titles, a clean and vintage-inspired aesthetic informed the otherwise modern design.', '2021-04-15 07:04:39', 1, 2, 20, 1),
(21, 'Stargazer', 'Illustrations for music festival', 'A series of illustrations were commissioned for the Stargazer music festivals range of promotional materials. A creative choice was made not to portray the night sky itself (as in previous years) but to focus on the beauty and wonder inherent in the patrons themselves.', '2021-04-19 16:08:11', 3, 3, 21, 1),
(22, 'Polite Society Posters', 'Poster designs for a fashion label', 'These posters were designed to increase brand awareness in fashion districts as part of an international campaign ahead of the upcoming autumn-winter season. The client required something aesthetically modern that introduced the vibrant palette of the new collection.', '2021-04-22 05:49:27', 1, 1, 22, 1),
(23, 'Golden Brown', 'Photograph for interior design book', 'This photograph is one of a range that appears in a book about interior design called Golden Brown. The interiors featured in the book show the current trend for looking back to the 1970\'s and the colour treatment of the photography reflects this warm, earthy palette.', '2021-04-25 10:51:19', 4, 3, 23, 1),
(24, 'Travel Guide', 'Book design for series of travel guides', 'The best-selling travel guide series, Featherview, required a refreshed look and feel for their latest series of books covering the Asian region. They were after a clean and concise solution - a versatile design that could accommodate both the coffee table and the backpack.', '2021-04-25 17:11:42', 1, 1, 24, 1),
(30, 'Почему копирайтеру нельзя называть правки правками?', 'Неочевидный факт, почему называть правки правками — плохая идея, которая усложняет согласование с заказчиком', 'Формулировка «жду ваши правки» по умолчанию подразумевает, что текст недоработан и его нужно исПРАВлять. Это со старта выдает неуверенность. А еще подсознательно настраивает заказчика на придирки и попытки научить копирайтера, как правильно писать.\r\n\r\nКстати, если заменить «правки» на «замечания», то получится та же история. Это синонимы.\r\n\r\nКакие слова лучше использовать?\r\n\r\n«Жду ваших комментариев» или «жду обратной связи». Обе формулировки имеют нейтральный оттенок. Подразумевают, что заказчик будет не править, а задавать вопросы, уточнять и предлагать решения.', '2025-09-08 18:34:09', 1, 7, 30, 1),
(32, 'Дико бесят стоковые фото, сгенерированные нейросетью...', 'О том, почему сгенерированные фото с файлообменников — полная дичь', 'Сейчас работаю копирайтером в проекте, где одна из моих задач — писать статьи для РБК.\r\n\r\nУ РБК есть особенность: модерация требует использовать для обложек стоковые фото. Причем важно, чтобы на фото потом никто не заявил авторские права, поэтому просто выхватить из поиска не получится.\r\n\r\nВроде все просто — идешь на Пинтерест и забираешь оттуда. Но не тут-то было. На сайте полно фоток, сгеренированных нейросетью.\r\n\r\nИ начинается самое веселое. Смотришь на фото — вроде все ок. Просто предприниматели сидят за столом и что-то обсуждают. Но постепенно взгляд подмечает детали:  у одного персонажа неестественно изогнуты пальцы, у второго кисть ушла в монитор, у третьего —  виднеется лишняя рука. А вот размытая девушка на заднем плане напоминает что-то из «Субстанции».\r\n\r\n😱 Чем дольше смотришь, тем безумнее кажется фото. Хочется перекрестить монитор и сбрызнуть святой водой. Можно поседеть, пока выберешь нормальную обложку.\r\n\r\nДля сравнения, вот одна из фоток, которую я хотел уже выбрать, пока не рассмотрел внимательнее. Присмотритесь, что с ней не так?', '2025-09-08 18:36:27', 1, 7, 32, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `description` varchar(254) NOT NULL,
  `navigation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `navigation`) VALUES
(1, 'Print', 'Inspiring graphic design', 1),
(2, 'Digital', 'Powerful pixels', 1),
(3, 'Illustration', 'Hand-drawn visual storytelling', 1),
(4, 'Photography', 'Capturing the moment', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `file` varchar(254) NOT NULL,
  `alt` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `file`, `alt`) VALUES
(1, 'systemic-brochure.jpg', 'Brochure for Systemic Science Festival'),
(2, 'forecast.jpg', 'Illustration of a handbag'),
(3, 'swimming-pool.jpg', 'Photograph of swimming pool'),
(4, 'birds.jpg', 'Collage of two birds'),
(6, 'micro-dunes.jpg', 'Photograph of tiny sand dunes'),
(7, 'milk-beach.jpg', 'Website for Milk Beach'),
(8, 'wellness.jpg', 'Yoga timetable for Wellness'),
(9, 'milk-beach-skyline.jpg', 'Photograph of Sydney Harbour from Milk Beach'),
(10, 'polite-society-mural.jpg', 'Mural for Polite Society'),
(11, 'stargazer.jpg', 'Line-up for Stargazer website'),
(12, 'the-ice-palace.jpg', 'The Ice Palace book cover'),
(13, 'chimney.jpg', 'Website for Chimney Press'),
(14, 'milk-beach-album.jpg', 'Vinyl LP cover for Milk Beach'),
(15, 'seascape.jpg', 'The sea taken at Margate Beach'),
(16, 'polite-society.jpg', 'Website for Polite Society'),
(17, 'snow-search.jpg', 'Illustration of boy in snow'),
(18, 'floral.jpg', 'Floral website design'),
(19, 'abandoned.jpg', 'Photograph of decommissioned dock cranes'),
(20, 'chimney-cards.jpg', 'Business cards for Chimney Press'),
(21, 'stargazer-mascot.jpg', 'Illustration of girl looking towards sky'),
(22, 'polite-society-posters.jpg', 'Photograph of three posters for Polite Society'),
(23, 'golden-brown.jpg', 'Photograph of the interior of a cafe'),
(24, 'featherview.jpg', 'Two pages from a travel book showing Nijo Castle'),
(25, '1757248534.jpg', 'Вася'),
(26, '1757258909.png', 'Первый пост'),
(27, '1757306331.jpg', 'Второй пост'),
(28, '1757316498.jpg', 'картинка второго поста'),
(29, '1757315287.jpg', 'картинка 3 поста'),
(30, '1757356449.jpg', 'Пишущая машинка'),
(31, '1757356467.jpg', 'Текст'),
(32, '1757356587.jpg', 'Сгенерированное изображение предпринимателей'),
(33, '1757361162.jpg', 'Копирайтер за компьютером'),
(34, '1757361172.jpg', 'Копирайтер за компьютером');

-- --------------------------------------------------------

--
-- Структура таблицы `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `forename` varchar(254) NOT NULL,
  `surname` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `picture` varchar(254) DEFAULT NULL,
  `role` varchar(16) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `member`
--

INSERT INTO `member` (`id`, `forename`, `surname`, `email`, `password`, `joined`, `picture`, `role`) VALUES
(1, 'Ivy', 'Stone', 'ivy@eg.link', 'c63j-82ve-2sv9-qlb38', '2021-01-26 09:04:23', 'ivy.jpg', 'member'),
(2, 'Luke', 'Wood', 'luke@eg.link', 'saq8-2f2k-3nv7-fa4k', '2021-01-26 09:15:18', 'luke.jpg', 'member'),
(3, 'Emiko', 'Ito', 'emi@eg.link', 'sk3r-vd92-3vn1-exm2', '2021-02-12 07:53:47', 'emi.jpg', 'member'),
(4, 'Максим', 'Апельсин', 'makcim_88@mail.ru', '$2y$12$g/BIn/z4DQRTT1fEm0nVT.Jq6SnCX8oyZk.Dg1gRl6SYcRhZ98q/C', '2025-09-07 12:09:27', '1757258694.png', 'admin'),
(7, 'Василий', 'Матяжов', 'vasilijmatazov@gmail.com', '$2y$12$gqYiZcG6.bWzNHfheMSfzeGhHIIfASn37rLDEQJQLrogGobpRGVoG', '2025-09-08 18:20:53', '1757356995.jpg', 'member');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`member_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `category_exists` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `image_exists` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `member_exists` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
