TRUNCATE TABLE `book_has_author`;
TRUNCATE TABLE `book_has_genre`;
TRUNCATE TABLE `author`;
TRUNCATE TABLE `genre`;
TRUNCATE TABLE `book`;



INSERT INTO `author` (`idauthor`, `fio`) VALUES
(6, 'А.Н. Стругацкий'),
(7, 'Б.Н. Стругацкий'),
(8, 'Дж. Килси'),
(2, 'Е. Петров'),
(1, 'И. Ильф'),
(3, 'Н.В. Гоголь'),
(9, 'Н.И. Курдюмов'),
(5, 'Р. Брэдбери'),
(4, 'С. Кинг');

INSERT INTO `book` (`idbook`, `name`, `description`, `price`) VALUES
(1, 'Золотой теленок', '«Золотой телёнок» — роман Ильи Ильфа и Евгения Петрова, завершённый в 1931 году. В основе сюжета — дальнейшие приключения центрального персонажа «Двенадцати стульев» Остапа Бендера, происходящие на фоне картин советской жизни начала 1930-х годов. Жанр — плутовской роман, социальная сатира, роман-фельетон.', 80.25),
(2, 'Мертвые души', '«Мертвые души» — гениальное произведение Николая Васильевича Гоголя, учебник жизни и ключ к пониманию характеров и типажей нашего общества. Сам автор определил жанр произведения как поэму. До наших дней дошел только первый том, вторая же часть произведения была уничтожена самим автором. Сюжет книги основан на реальной истории, которую Гоголю подсказал Александр Сергеевич Пушкин. Главный герой книги — бывший коллежский советник Чичиков, выдает себя за помещика. Однажды он появляется в уездном городе N, чтобы осуществить на первый взгляд безумный проект: герой хочет купить у местных помещиков мертвых крестьян, которые теперь числятся только на бумаге. Чтобы исполнить этот план, он встречается с самыми разными персонажами, которые олицетворяют различные качества и пороки общества — удивительно, но спустя полтора века они сохраняют свою актуальность.', 120.5),
(3, 'Жребий', 'Все началось с того, что в провинциальном американском городке стали пропадать люди - поодиночке и целыми семьями. Их не могли найти ни родственники, ни даже полиция. А когда надежда, казалось, исчезла навсегда, пропавшие вернулись, и городок содрогнулся от ужаса...\r\nЧитайте \"Жребий\" - бестселлер короля триллеров Стивена Кинга!', 148),
(4, 'Оно', 'В маленьком провинциальном городке Дерри много лет назад семерым подросткам пришлось столкнуться с кромешным ужасом — живым воплощением ада. .Прошли годы... Подростки повзрослели, и ничто, казалось, не предвещало новой беды. Но кошмар прошлого вернулся, неведомая сила повлекла семерых друзей назад, в новую битву со Злом. Ибо в Дерри опять льется кровь и бесследно исчезают люди. Ибо вернулось порождение ночного кошмара, настолько невероятное, что даже не имеет имени...', 460),
(5, 'Мизери', ' Может ли спасение от верной гибели обернуться таким кошмаром, что даже смерть покажется милосердным даром судьбы? Может — ибо именно так случилось с Полом Шелдоном, автором бесконечного сериала книг о злоключениях Мизери. Раненый писатель оказался в руках Энни Уилкс — женщины, потерявшей рассудок на почве его романов. Уединенный домик одержимой пьесами фурии превратился в камеру пыток, а существование Пола — в ад, полный боли и ужаса...\r\n', 153),
(6, '451\' по Фаренгейту', '451° по Фаренгейту - температура, при которой воспламеняется и горит бумага. Философская антиутопия Брэдбери рисует беспросветную картину развития постиндустриального общества: это мир будущего, в котором все письменные издания безжалостно уничтожаются специальным отрядом пожарных, а хранение книг преследуется по закону, интерактивное телевидение успешно служит всеобщему оболваниванию, карательная психиатрия решительно разбирается с редкими инакомыслящими, а на охоту за неисправимыми диссидентами выходит электрический пес… Роман, принесший своему творцу мировую известность.', 89),
(7, 'Вино из одуванчиков', 'История лета 1928 года, рассказанная двенадцатилетним Дугласом Сполдингом, голосом которого говорит сам Рэй Брэдбери. Летние месяцы наполнены для Дугласа и других жителей небольшого американского городка множеством событий – радостных и печальных, обыкновенных и поистине фантастических. Впрочем, чудеса, окружающие Дугласа, приходят в его жизнь с самыми простыми вещами: качелями на веранде, новенькими теннисными туфлями, способными поднять мальчишку над домами, стрёкотом газонокосилки, вином из одуванчиков, приготовленным дедушкой и хранящим вкус лета и солнечных лучей… «Вино из одуванчиков – пойманное и закупоренное в бутылке лето…»', 75),
(8, 'Марсианские хроники', 'Хотите покорить Марс, этот странный изменчивый мир, населенный загадочными, неуловимыми обитателями и не такой уж добрый к человеку? Дерзайте. Но только приготовьтесь в полной мере испить чашу сожалений и тоски - тоски по зеленой планете Земля, на которой навсегда останется ваше сердце. Цикл удивительных марсианских историй Рэя Брэдбери - классическое произведение, вошедшее в золотой фонд мировой литературы. ', 95),
(9, 'Лето, прощай', 'Все хорошее когда-нибудь заканчивается - пока не наступает продолжение. Для героя \"Вина из одуванчиков\" Дугласа Сполдинга детство продолжается и переходит в юношество в \"Лето, прощай\". А кому же охота прощаться с детством? Вот и приходится бороться за него, сопротивляться и едва ли даже не объявлять ему войну. Это будет последняя битва со временем, которое нельзя задержать и приостановить. Рэй Брэдбери снова уносит нас в мир, такой земной и такой недостижимый. ', 105),
(10, 'Пикник на обочине', ' \"Пикник на обочине\" (1972) разворачивается вокруг так называемой Зоны, образовавшейся на Земле после вторжения пришельцев - места наполненного страшными и непонятными чудесами. Главный герой повести Рэдрик Шухарт - профессиональный сталкер - человек, умеющий выносить из Зоны загадочные инопланетные предметы. И есть легенда о Золотом Шаре, находящемся где-то там, в глубине Зоны. Прорваться к нему почти невозможно, но он, по слухам, исполняет все желания. Сколько смельчаков сгубили себя, пытаясь добраться до вожделенного чуда! Именно Рэдрику удаётся сделать это… ', 78),
(11, 'Улитка на склоне', '«Улитка на склоне» - одно из лучших и одно из самых загадочных, глубоко философских произведений Стругацких с очень сложной судьбой. Его актуальность в наши дни стала еще более очевидной, стоит лишь немного сместить акценты, переместить их с сатиры на советский строй и направить на разговор о ценностях разных сообществ.\r\n\r\nСоветская власть увидела в повести лишь крамолу. Повесь была изъята из библиотек и забыта вплоть до 1988 года, а сегодня читается так, словно написана на злобу дня. По-прежнему, у Управления и Леса разный образ жизни, и по-прежнему Управление пытается навязать свои ценности варварам – обитателям Леса.', 120),
(12, 'Понедельник начинается в субботу', '«Понедельник начинается в субботу» - это действительно сказка, или, как точнее обозначили сами Стругацкие, – «сказка для научных сотрудников младшего возраста». В этой книге волшебства и чудес хоть отбавляй – драконы и щуки, исполняющие желания, джинны, живая вода, волшебные палочки, неразменные пятаки, говорящие зеркала, гномы, домовые, ведьмы, Баба Яга и прочее, прочее. Но в то же время всю эту классическую «сказочность» авторы впихнули в наш обыкновенный мир. И что удивительно, сказочное и волшебное вполне нормально уживается в сугубо материальном мире, потому что существует оно уже не абы как, а в рамках Научно-Исследовательского Института Чародейства и Волшебства (проще говоря - НИИЧаВо).\r\n\r\nАлександр Привалов был обычным рядовым программистом из Ленинграда. Ну, может, не совсем рядовым, но самым нормальным программистом. Пока однажды, отправившись в отпуск, он не оказывается в небольшом малоизвестном городке Соловец, где встречает на первый взгляд самых обычных людей, которым вдр', 108),
(13, 'Работы по металлу', 'Книга знакомит читателя с основами обработки металлов. Эти знания могут понадобиться в работах по дому или в занятиях хобби. Вы узнаете о базовых приемах работ, о том, как безопасно использовать инструменты, как подобрать подходящий металл и правильные крепежные изделия. - Инструменты и рабочее место - Нарезание резьбы, сверление, гибка и резка металла - Формовка и другие работы с листовым металлом - Ковка, плавка и литье - Шлифовка, полировка и другая обработка поверхности ', 570),
(14, 'Виноград. Практические советы по выращиванию', 'Известный в нашей стране пропагандист принципов природного земледелия Николай Курдюмов расскажет о том, как создать умный виноградник, то есть совместить, насколько это возможно, простоту ухода за ним с прекрасным урожаем. Его советы - лучшее пособие для начинающих, так как даны не ученым-виноградарем, мыслящим промышленными масштабами, а дачником-практиком, прошедшим весь путь создания собственного виноградника с нуля. В книге автор расскажет об опыте таких же, как и он сам, энтузиастов-опытников из разных климатических зон России, с которыми познакомился на почве любви к этой древней культуре. ', 159);


INSERT INTO `genre` (`idgenre`, `name`) VALUES
(8, 'Антиутопия'),
(9, 'Зарубежная фантастика'),
(5, 'Мистика'),
(10, 'Научная фантастика'),
(12, 'Повесть'),
(13, 'Прикладная литература'),
(1, 'Роман'),
(2, 'Роман-поэма'),
(15, 'Сад и огород'),
(3, 'Современная зарубежная проза'),
(11, 'Современная русская проза'),
(7, 'Социальная фантастика'),
(4, 'Ужасы'),
(6, 'Фэнтези');

INSERT INTO `book_has_author` (`book_idbook`, `author_idauthor`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(4, 4),
(5, 4),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 6),
(10, 7),
(11, 6),
(11, 7),
(12, 6),
(12, 7),
(13, 8),
(14, 9);

INSERT INTO `book_has_genre` (`book_idbook`, `genre_idgenre`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(4, 5),
(4, 6),
(5, 4),
(5, 5),
(5, 6),
(6, 7),
(6, 8),
(7, 3),
(8, 9),
(8, 10),
(9, 3),
(10, 10),
(10, 11),
(10, 12),
(11, 8),
(11, 10),
(11, 11),
(11, 12),
(12, 11),
(12, 12),
(13, 13),
(14, 15);
