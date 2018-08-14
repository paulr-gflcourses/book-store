DROP TABLE IF EXISTS `book_has_author`;
DROP TABLE IF EXISTS `book_has_genre`;
DROP TABLE IF EXISTS `author`;
DROP TABLE IF EXISTS `genre`;
DROP TABLE IF EXISTS `book`;

CREATE TABLE `author` (
  `idauthor` int(11) NOT NULL,
  `fio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `book` (
  `idbook` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `genre` (
  `idgenre` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `book_has_author` (
  `book_idbook` int(11) NOT NULL,
  `author_idauthor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `book_has_genre` (
  `book_idbook` int(11) NOT NULL,
  `genre_idgenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `author`
  ADD PRIMARY KEY (`idauthor`),
  ADD UNIQUE KEY `fio_UNIQUE` (`fio`);

ALTER TABLE `book`
  ADD PRIMARY KEY (`idbook`);

ALTER TABLE `book_has_author`
  ADD PRIMARY KEY (`book_idbook`,`author_idauthor`),
  ADD KEY `fk_book_has_author_author1_idx` (`author_idauthor`),
  ADD KEY `fk_book_has_author_book_idx` (`book_idbook`);

ALTER TABLE `book_has_genre`
  ADD PRIMARY KEY (`book_idbook`,`genre_idgenre`),
  ADD KEY `fk_book_has_genre_genre1_idx` (`genre_idgenre`);

ALTER TABLE `genre`
  ADD PRIMARY KEY (`idgenre`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

ALTER TABLE `author`
  MODIFY `idauthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `book`
  MODIFY `idbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `genre`
  MODIFY `idgenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `book_has_author`
  ADD CONSTRAINT `fk_book_has_author_author1` FOREIGN KEY (`author_idauthor`) REFERENCES `author` (`idauthor`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_book_has_author_book` FOREIGN KEY (`book_idbook`) REFERENCES `book` (`idbook`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `book_has_genre`
  ADD CONSTRAINT `fk_book_has_genre_book1` FOREIGN KEY (`book_idbook`) REFERENCES `book` (`idbook`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_book_has_genre_genre1` FOREIGN KEY (`genre_idgenre`) REFERENCES `genre` (`idgenre`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;
