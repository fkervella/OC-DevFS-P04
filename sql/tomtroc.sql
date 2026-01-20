-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2026 at 11:38 AM
-- Server version: 11.8.3-MariaDB-0+deb13u1 from Debian
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tomtroc`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `availability` int(11) NOT NULL DEFAULT 0,
  `add_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `picture`, `title`, `author`, `description`, `availability`, `add_date`) VALUES
(31, './img/books/31', 'Esther', 'Alabaster', 'The Book of Esther: Un livre curieux et passionnant sur l&#039;expérience de Dieu à l&#039;œuvre au milieu des rencontres fortuites, du destin et de la providence divine.\r\n\r\nLa beauté de la Bible. Images visuelles et conception réfléchie intégrées au texte de la Bible. Des images qui éclairent les thèmes et les messages du texte aideront le lecteur à interagir avec les Écritures d&#039;une nouvelle manière. Utilisation judicieuse de l&#039;espace, police des caractères facilitant la lecture et mise en page permettant une exploration réfléchie entre le texte et les images. Imprimé sur du papier de haute qualité pour une expérience belle au regard et au toucher. ', 1, '2026-01-18 22:22:45'),
(32, './img/books/32', 'The Kinfolk Table', 'Nathan Williams', 'Kinfolk magazine—launched to great acclaim and instant buzz in 2011—is a quarterly journal about understated, unfussy entertaining. The journal has captured the imagination of readers nationwide, with content and an aesthetic that reflect a desire to go back to simpler times; to take a break from our busy lives; to build a community around a shared sensibility; and to foster the endless and energizing magic that results from sharing a meal with good friends. Now there’s The Kinfolk Table, a cookbook from the creators of the magazine, with profiles of 45 tastemakers who are cooking and entertaining in a way that is beautiful, uncomplicated, and inexpensive. Each of these home cooks—artisans, bloggers, chefs, writers, bakers, crafters—has provided one to three of the recipes they most love to share with others, whether they be simple breakfasts for two, one-pot dinners for six, or a perfectly composed sandwich for a solo picnic. ', 1, '2026-01-18 22:22:30'),
(33, './img/books/33', 'Wabi Sabi', 'Beth Kempton', '• Una obra transformadora que nos inspira a simplificar las cosas y a concentrarnos en lo que realmente importa.\r\n\r\n• Beth Kempton nos invita a encontrar la belleza y la inspiración a través de las perfectas imperfecciones de la vida.\r\n\r\n• Muchas personas están volviendo a las tradiciones culturales intemporales en busca del verdadero significado de la vida. “Wabi sabi”, el secreto japonés de la felicidad que transformará tu vida.\r\n\r\nCada vez más, vivimos atrapados en un ideal de perfección, juventud eterna, éxito y riqueza que nos genera insatisfacción y sensación de desconexión. En este contexto, la filosofía «wabi sabi» ofrece otra manera de mirar el mundo —y la vida— más natural, más estética, más presente y consciente. Inspirado en el zen y en el camino del té, “Wabi sabi” nos conecta con la simplicidad, con la belleza de la imperfección, con los dones de una vida slow y natural. Implica un hogar bello y acogedor, unas relaciones más reales, un contacto profundo con la naturaleza y una nueva escala de prioridades, acorde con la propia esencia. En esta cautivadora guía, Beth Kempton destila los principios de esta filosofía en forma de lecciones vitales: historias, inspiración y ejercicios para aplicar el «wabi sabi» en los distintos ámbitos de la vida. Una invitación a fluir con la belleza de la existencia, perfectamente imperfecta, a desprenderse de lo innecesario para descubrir los tesoros que nos esperan al otro lado.', 1, '2026-01-18 22:22:08'),
(34, './img/books/34', 'Milk &amp; honey', 'Rupi Kaur', 'The book is divided into four chapters, and each chapter serves a different purpose; deals with a different pain; heals a different heartache. milk and honey takes readers through a journey of the most bitter moments in life and finds sweetness in them because there is sweetness everywhere ifyou are just willing to look. ', 1, '2026-01-18 22:21:21'),
(35, './img/books/35', 'Delight!', 'Justin Rossow', 'This book will help you lean into Joyful Delight, Thoughtful Delight, Playful Delight, Delicious Delight, and Desirable Delight in your life with God. Delight! invites you into a real, accessible, and down-to-earth way of experiencing the adventure of following Jesus.\r\n\r\nOf course you will know struggle and failure. Of course you will know grief and shame. But you don’t have to carry the burden of getting your faith walk right; you already make Jesus jump for joy and sing his happy song. The Creator of the Universe thinks you’re something special. Even when life is confusing or difficult, the Spirit is shaping you with care and delight.\r\n\r\n    Are you tired of religion?\r\n    Are you beat down by anxiety or doubt?\r\n    Do you long for something more in your life of faith?\r\n\r\n\r\nLet go of your burden. Take a deep breath. And let’s explore what it means to follow Jesus on the adventure of your life—an adventure marked by challenge and repentance and difficulty, but marked most fundamentally by mutual delight!', 0, '2026-01-18 22:20:32'),
(36, './img/books/36', 'Milwaukee Mission', 'Elder Cooper Low', 'Livre non trouvé sur le net', 1, '2026-01-18 22:19:44'),
(37, './img/books/37', 'Minimalist Graphics', 'Julia Schonlau', ' Maia Francisco presents a cutting-edge, less-is-more approach to graphic design in the groundbreaking Minimalist Graphics. Following her critically acclaimed Sourcebook of Contemporary Graphic Design, Francisco presents this illuminating look at the industry’s latest, most widely sought-after trends and concepts—an effective, indispensable resource for the modern graphic designer. ', 1, '2026-01-18 22:18:06'),
(38, './img/books/38', 'Hygge', 'Meik Wiking', 'New York Times Bestseller\r\n\r\nEmbrace Hygge (pronounced hoo-ga) and become happier with this definitive guide to the Danish philosophy of comfort, togetherness, and well-being.\r\n\r\nWhy are Danes the happiest people in the world? The answer, says Meik Wiking, CEO of the Happiness Research Institute in Copenhagen, is Hygge. Loosely translated, Hygge―pronounced Hoo-ga―is a sense of comfort, togetherness, and well-being. &quot;Hygge is about an atmosphere and an experience,&quot; Wiking explains. &quot;It is about being with the people we love. A feeling of home. A feeling that we are safe.&quot;\r\n\r\nHygge is the sensation you get when you’re cuddled up on a sofa, in cozy socks under a soft throw, during a storm. It’s that feeling when you’re sharing comfort food and easy conversation with loved ones at a candlelit table. It is the warmth of morning light shining just right on a crisp blue-sky day.\r\n\r\nThe Little Book of Hygge introduces you to this cornerstone of Danish life, and offers advice and ideas on incorporating it into your own life, such as:\r\n\r\n    Get comfy. Take a break.\r\n    Be here now. Turn off the phones.\r\n    Turn down the lights. Bring out the candles.\r\n    Build relationships. Spend time with your tribe.\r\n    Give yourself a break from the demands of healthy living. Cake is most definitely Hygge.\r\n    Live life today, like there is no coffee tomorrow.\r\n\r\nFrom picking the right lighting to organizing a Hygge get-together to dressing hygge, Wiking shows you how to experience more joy and contentment the Danish way.', 1, '2026-01-18 22:17:24'),
(39, './img/books/39', 'Innovation', 'Matt Ridley', 'Building on his national bestseller The Rational Optimist, Matt Ridley chronicles the history of innovation, and how we need to change our thinking on the subject.\r\n\r\nInnovation is the main event of the modern age, the reason we experience both dramatic improvements in our living standards and unsettling changes in our society. Forget short-term symptoms like Donald Trump and Brexit, it is innovation that will shape the twenty-first century. Yet innovation remains a mysterious process, poorly understood by policy makers and businessmen alike.\r\n\r\nMatt Ridley argues that we need to see innovation as an incremental, bottom-up, fortuitous process that happens as a direct result of the human habit of exchange, rather than an orderly, top-down process developing according to a plan. Innovation is crucially different from invention, because it is the turning of inventions into things of practical and affordable use to people. It speeds up in some sectors and slows down in others. It is always a collective, collaborative phenomenon, involving trial and error, not a matter of lonely genius. It happens mainly in just a few parts of the world at any one time. It still cannot be modeled properly by economists, but it can easily be discouraged by politicians. Far from there being too much innovation, we may be on the brink of an innovation famine.\r\n\r\nRidley derives these and other lessons from the lively stories of scores of innovations, how they started and why they succeeded or failed. Some of the innovation stories he tells are about steam engines, jet engines, search engines, airships, coffee, potatoes, vaping, vaccines, cuisine, antibiotics, mosquito nets, turbines, propellers, fertilizer, zero, computers, dogs, farming, fire, genetic engineering, gene editing, container shipping, railways, cars, safety rules, wheeled suitcases, mobile phones, corrugated iron, powered flight, chlorinated water, toilets, vacuum cleaners, shale gas, the telegraph, radio, social media, block chain, the sharing economy, artificial intelligence, fake bomb detectors, phantom games consoles, fraudulent blood tests, hyperloop tubes, herbicides, copyright, and even life itself.', 1, '2026-01-18 22:17:00'),
(40, './img/books/40', 'Psalms', 'Alabaster', ' The Bible Beautiful. The Book of Psalms: Raw, honest poems telling the story of humans and the desire to know God.Design aspects: This book is softcover, 232 pages, perfect bound, and printed in full color on uncoated paper in Canada. The dimensions are 7.5 in x 9.5 in.\r\n\r\nWhy Alabaster?\r\n\r\n    Thoughtful Design: Design matters. We create with the reader in mind--careful use of negative space, legible typefaces, and layouts that allow a thoughtful exploration between text and images.\r\n    Compelling Imagery: Our approach reimagines the entire experience of the book. We create images that illuminate the themes and messages of the text, intentionally creating artwork that will help the reader engage scripture in a fresh way.\r\n    Premium Printing: Lithographically printed on high-quality 70lb uncoated paper. 15 pt cover stock mixed with a soft-touch aqueous coating, for an experience that looks and feels beautiful.\r\n    Many Uses: Great for Bible studies, church groups, or individual devotional times, to engage in scripture in a new and fresh way.\r\n\r\n', 1, '2026-01-18 22:16:58'),
(41, './img/books/41', 'Thinking, Fast &amp; Slow', 'Daniel Kahneman', '\r\n\r\n*Major New York Times Bestseller\r\n*More than 2.6 million copies sold\r\n*One of The New York Times Book Review&#039;s ten best books of the year\r\n*Selected by The Wall Street Journal as one of the best nonfiction books of the year\r\n*Presidential Medal of Freedom Recipient\r\n*Daniel Kahneman&#039;s work with Amos Tversky is the subject of Michael Lewis&#039;s best-selling The Undoing Project: A Friendship That Changed Our Minds\r\n\r\nIn his mega bestseller, Thinking, Fast and Slow, Daniel Kahneman, world-famous psychologist and winner of the Nobel Prize in Economics, takes us on a groundbreaking tour of the mind and explains the two systems that drive the way we think.\r\n\r\nSystem 1 is fast, intuitive, and emotional; System 2 is slower, more deliberative, and more logical. The impact of overconfidence on corporate strategies, the difficulties of predicting what will make us happy in the future, the profound effect of cognitive biases on everything from playing the stock market to planning our next vacation―each of these can be understood only by knowing how the two systems shape our judgments and decisions.\r\n\r\nEngaging the reader in a lively conversation about how we think, Kahneman reveals where we can and cannot trust our intuitions and how we can tap into the benefits of slow thinking. He offers practical and enlightening insights into how choices are made in both our business and our personal lives―and how we can use different techniques to guard against the mental glitches that often get us into trouble. Topping bestseller lists for almost ten years, Thinking, Fast and Slow is a contemporary classic, an essential book that has changed the lives of millions of readers.\r\n', 0, '2026-01-18 22:15:20'),
(42, './img/books/42', 'A Book Full Of Hope', 'Rupi Kaur', '#1 New York Times bestselling author Rupi Kaur presents guided poetry writing exercises of her own design to help you explore themes of trauma, loss, heartache, love, family, healing, and celebration of the self.\r\n\r\nHealing Through Words is a guided tour on the journey back to the self, a cathartic and mindful exploration through writing.\r\n \r\nThis carefully curated collection of exercises asks only that you be vulnerable and honest, both with yourself and the page.\r\n \r\nYou don’t need to be a writer to take this walk; you just need to write—that’s all.', 1, '2026-01-18 22:14:35'),
(43, './img/books/43', 'The Subtle Art Of...', 'Mark Manson', '\r\n\r\n#1 New York Times Bestseller More than 10 million Copies Sold\r\n\r\nIn this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be &quot;&quot;positive&quot;&quot; all the time so that we can truly become better, happier people.\r\n\r\nFor decades, we’ve been told that positive thinking is the key to a happy, rich life. &quot;&quot;F**k positivity,&quot;&quot; Mark Manson says. &quot;&quot;Let’s be honest, shit is f**ked and we have to live with it.&quot;&quot; In his wildly popular Internet blog, Manson doesn’t sugarcoat or equivocate. He tells it like it is—a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, let’s-all-feel-good mindset that has infected modern society and spoiled a generation, rewarding them with gold medals just for showing up.\r\n\r\nManson makes the argument, backed both by academic research and well-timed poop jokes, that improving our lives hinges not on our ability to turn lemons into lemonade, but on learning to stomach lemons better. Human beings are flawed and limited—&quot;&quot;not everybody can be extraordinary, there are winners and losers in society, and some of it is not fair or your fault.&quot;&quot; Manson advises us to get to know our limitations and accept them. Once we embrace our fears, faults, and uncertainties, once we stop running and avoiding and start confronting painful truths, we can begin to find the courage, perseverance, honesty, responsibility, curiosity, and forgiveness we seek.\r\n\r\nThere are only so many things we can give a f**k about so we need to figure out which ones really matter, Manson makes clear. While money is nice, caring about what you do with your life is better, because true wealth is about experience. A much-needed grab-you-by-the-shoulders-and-look-you-in-the-eye moment of real-talk, filled with entertaining stories and profane, ruthless humor, The Subtle Art of Not Giving a F*ck is a refreshing slap for a generation to help them lead contented, grounded lives.\r\n', 1, '2026-01-18 22:13:12'),
(44, './img/books/44', 'Narnia', 'C.S Lewis', '\r\n\r\nFor over 60 years, readers of all ages have been enchanted by the magical realms, the epic battles between good and evil, and the unforgettable creatures of Narnia.\r\n\r\nThis box set includes all seven titles in The Chronicles of Narnia - The Magician&#039;s Nephew; The Lion, the Witch, and the Wardrobe; The Horse and His Boy; Prince Caspian; The Voyage of the Dawn Treader; The Silver Chair; and The Last Battle.\r\n', 0, '2026-01-18 22:12:47'),
(45, './img/books/45', 'Company Of One', 'Paul Jarvis', '\r\n\r\nWhat if the real key to a richer and more fulfilling career was not to create and scale a new start-up, but rather, to be able to work for yourself, determine your own hours, and become a (highly profitable) and sustainable company of one? Suppose the better - and smarter - solution is simply to remain small? This book explains how to do just that.\r\n\r\nCompany of One is a refreshingly new approach centered on staying small and avoiding growth, for any size business. Not as a freelancer who only gets paid on a per piece basis, and not as an entrepreneurial start-up that wants to scale as soon as possible, but as a small business that is deliberately committed to staying that way. By staying small, one can have freedom to pursue more meaningful pleasures in life and avoid the headaches that result from dealing with employees, long meetings, or worrying about expansion. Company of One introduces this unique business strategy and explains how to make it work for you, including how to generate cash flow on an ongoing basis.\r\n\r\nPaul Jarvis left the corporate world when he realized that working in a high-pressure, high profile world was not his idea of success. Instead, he now works for himself out of his home on a small, lush island off of Vancouver, and lives a much more rewarding and productive life. He no longer has to contend with an environment that constantly demands more productivity, more output, and more growth.\r\n\r\nIn Company of One, Jarvis explains how you can find the right pathway to do the same, including planning how to set up your shop, determining your desired revenues, dealing with unexpected crises, keeping your key clients happy, and of course, doing all of this on your own.\r\n', 1, '2026-01-18 22:11:54'),
(46, './img/books/46', 'The Two Towers', 'J.R.R Tolkien', '\r\n\r\nThe Two Towers is the second volume of J.R.R. Tolkien&#039;s epic saga, The Lord of the Rings.\r\n\r\nThe Fellowship has been forced to split up. Frodo and Sam must continue alone towards Mount Doom, where the One Ring must be destroyed. Meanwhile, at Helm’s Deep and Isengard, the first great battles of the War of the Ring take shape.\r\n\r\nIn this splendid, unabridged audio production of Tolkien’s great work, all the inhabitants of a magical universe - hobbits, elves, and wizards - spring to life. Rob Inglis’ narration has been praised as a masterpiece of audio.\r\n©1983 Christopher R. Tolkien, Michael H.R.Tolkien, John F.R. Tolkien, and Priscilla M.A.R.Tolkien (P)1990 Recorded Books\r\n', 1, '2026-01-18 22:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id_1`, `user_id_2`) VALUES
(19, 7, 8),
(20, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`user_id`, `book_id`) VALUES
(7, 31),
(8, 32),
(8, 33),
(9, 34),
(10, 35),
(11, 36),
(12, 37),
(9, 38),
(13, 39),
(14, 40),
(15, 41),
(16, 42),
(17, 43),
(18, 44),
(19, 45),
(20, 46);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `message` varchar(1024) NOT NULL,
  `viewed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `chat_id`, `sender_id`, `datetime`, `message`, `viewed`) VALUES
(8, 19, 7, '2026-01-20 12:23:17', 'Bonjour Alexlecture, quel est votre style de livres ?', 0),
(9, 20, 7, '2026-01-20 12:24:16', 'Bonjour Juju, est-ce que le livre est toujours disponible ?', 1),
(10, 20, 10, '2026-01-20 12:30:11', 'Bonjour Camille, oui le livre est disponible. Quel livre souhaiez-vous échanger ?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `login`, `password`, `creation_date`, `avatar`) VALUES
(7, 'CamilleClubLit', 'camille@a.a', '$2y$12$I/L7IDZXw.77jFikwuTby.UiqGU7Oz/ekWZm.Yzg1X6JzmOIXmmbO', '2026-01-18 20:52:48', './img/users/default.png'),
(8, 'Alexlecture', 'alex@a.a', '$2y$12$6dS9bnr7Z2woN2os1ug9WuFEn7L1FyiP16ttvlFVJyoRJkfeyW4pe', '2026-01-18 20:53:27', './img/users/8'),
(9, 'Hugo1990_12', 'hugo@a.a', '$2y$12$mO5zxbNB67p2RtfBXmmXp.ZxagXNp1fItGD6XtFi.k9K7wR0PcZqi', '2026-01-18 20:54:03', './img/users/9'),
(10, 'Juju1432', 'juju@a.a', '$2y$12$yKjI0pP.WMyfka1r9kbL1OsgjlqG1BzK3jy7/FqZ6mdbXFhDsCBmy', '2026-01-18 20:54:37', './img/users/10'),
(11, 'Christiane75014', 'christiane@a.a', '$2y$12$wAw.F9e17UObgv9ml1ECmO9sO6yFJW.r72/G9iKMVRk2IiIA7Wa8u', '2026-01-18 20:55:11', './img/users/11'),
(12, 'Hamzalecture', 'hamza@a.a', '$2y$12$vPR5L0p/o0PlCaP6Dzc61ebakAa/Wy0qgS.iHcHaD6iOgF8m3Dg2S', '2026-01-18 20:55:54', './img/users/12'),
(13, 'Lou&amp;Ben50', 'lou@a.a', '$2y$12$loSpxFssgVGv0jHgQz0a8OMZ2gXvdIkKuIPYlI37aTYpKF/KuL0jq', '2026-01-18 20:56:33', './img/users/default.png'),
(14, 'Lolobzh', 'lolo@a.a', '$2y$12$PBP/EtCpcSsxB6hqKwtYue.251YRe88FNV63wTW6U.2..eBZOG6o.', '2026-01-18 20:57:02', './img/users/14'),
(15, 'Sas634', 'sas@a.a', '$2y$12$g8xGsiTxtOk4hiwpTTa0R.iiZ0Nqy7n587.Uw1Cllf0y.aRUCKs4q', '2026-01-18 20:57:30', './img/users/15'),
(16, 'ML95', 'ml@a.a', '$2y$12$cp9PmmGoNGzrNdXpK23b2ugjCg0ubLIHRJTX7UdGgnIKPSMeUYQRW', '2026-01-18 20:57:57', './img/users/16'),
(17, 'Verogo33', 'vero@a.a', '$2y$12$ZE.B6aPKfuwZh6xFAvD04.e6LndqxNQZgtTi5djYKm6U5shDjCzUS', '2026-01-18 20:58:23', './img/users/17'),
(18, 'AnnikaBrahms', 'annika@a.a', '$2y$12$0GUEzK25yhIvPrakd3BgZOPEpC2Gd5pW86hLdRxEfunplPVY23BrG', '2026-01-18 20:59:11', './img/users/18'),
(19, 'Victoirefabr912', 'victoire@a.a', '$2y$12$NeCXk2cJiuXviyFwMzbyLOFAItMhlAopX7AMCZhKQxvFVyqNJpFDG', '2026-01-18 20:59:31', './img/users/19'),
(20, 'Lotrfanclub67', 'lotr@a.a', '$2y$12$rnH8mVCT2/4FxXv7iqPBF.EX/zXCFEbnvBGWeLQnWTfguwbY/K0TK', '2026-01-18 21:00:09', './img/users/20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CHAT_USER_ID_1` (`user_id_1`),
  ADD KEY `FK_CHAT_UDER_ID_2` (`user_id_2`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `fk_library_book_id` (`book_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MESSAGE_CHATID` (`chat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_CHAT_UDER_ID_2` FOREIGN KEY (`user_id_2`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CHAT_USER_ID_1` FOREIGN KEY (`user_id_1`) REFERENCES `user` (`id`);

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `fk_library_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_library_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MESSAGE_CHATID` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
