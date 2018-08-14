<?php

class DB
{
    var $mysqli;


    function __construct()
    {
        $this->connect("127.0.0.1", "root", "123", "books_catalog");
    }

    function connect($host, $user, $password, $dbname)
    {
        $this->mysqli = new mysqli($host, $user, $password, $dbname);
        if ($this->mysqli->connect_errno) {
            echo "Не удалось создать соединение с базой MySQL!\n";
            echo "Номер_ошибки: " . $this->mysqli->connect_errno . "\n";
            echo "Ошибка: " . $this->mysqli->connect_error . "\n";
        }
    }

    function query($sql)
    {
        if (!$result = $this->mysqli->query($sql)) {
            echo "Ошибка в запросе: " . $sql . "\n";
            echo "Номер_ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
        }
        return $result;
    }

    function getAllBooks()
    {
        return $this->query("SELECT book.idbook, book.name FROM book ORDER BY book.name");
    }

    function getBooksByAuthor($idauthor)
    {
        return $this->query("SELECT book.idbook, book.name FROM book INNER JOIN book_has_author AS ba  
	ON ba.book_idbook=book.idbook AND ba.author_idauthor=$idauthor ORDER BY book.name");
    }

    function getBooksByGenre($idgenre)
    {
        return $this->query("SELECT book.idbook, book.name FROM book INNER JOIN book_has_genre AS bg 
	ON bg.book_idbook=book.idbook AND bg.genre_idgenre=$idgenre ORDER BY book.name");
    }

    function getBooksByAuthorGenre($idauthor, $idgenre)
    {
        return $this->query("SELECT book.idbook, book.name FROM book INNER JOIN book_has_author AS ba INNER JOIN book_has_genre AS bg 
	ON ba.book_idbook=book.idbook AND bg.book_idbook=book.idbook AND ba.author_idauthor=$idauthor AND bg.genre_idgenre=$idgenre ORDER BY book.name");
    }

    function getBookById($idbook)
    {
        return mysqli_fetch_assoc($this->query("SELECT * FROM book WHERE idbook=$idbook"));
    }

    function getAllAuthors()
    {
        return $this->query("SELECT * FROM author ORDER BY author.fio");
    }

    function getAllGenres()
    {
        return $this->query("SELECT * FROM genre ORDER BY genre.name");
    }

    function getAuthorsFromBook($idbook)
    {
        return $this->query("SELECT * FROM author 
		INNER JOIN book_has_author ON book_has_author.author_idauthor=author.idauthor WHERE book_has_author.book_idbook=$idbook ORDER BY author.fio");
    }

    function getGenresFromBook($idbook)
    {
        return $this->query("SELECT * FROM genre
			INNER JOIN book_has_genre ON book_has_genre.genre_idgenre=genre.idgenre WHERE book_has_genre.book_idbook=$idbook ORDER BY genre.name");
    }


    function updateBookAuthors($idbook, $authors)
    {
        foreach ($authors as $index => $value) {
            if (!ctype_digit($value)) {
                $this->query("INSERT IGNORE INTO author(idauthor, fio) VALUE(NULL, '$value')");
                $id = $this->mysqli->insert_id;
                if ($id == 0) {
                    $res = $this->query("SELECT author.idauthor FROM author WHERE author.fio='$value'")->fetch_assoc();
                    $id = $res['idauthor'];
                }
                $authors[$index] = $id;
                $value = $authors[$index];
            }
            $this->query("INSERT IGNORE INTO book_has_author(book_idbook, author_idauthor) VALUE($idbook, $value)");
        }
        $authorsStr = implode(", ", $authors);
        $this->query("DELETE FROM book_has_author WHERE book_has_author.book_idbook=$idbook AND book_has_author.author_idauthor NOT IN ($authorsStr)");

    }

    function updateBookGenres($idbook, $genres)
    {
        foreach ($genres as $index => $value) {
            if (!ctype_digit($value)) {
                $this->query("INSERT IGNORE INTO genre(idgenre, name) VALUE(NULL, '$value')");
                $id = $this->mysqli->insert_id;
                if ($id == 0) {
                    $res = $this->query("SELECT genre.idgenre FROM genre WHERE genre.name='$value'")->fetch_assoc();
                    $id = $res['idgenre'];
                }
                $genres[$index] = $id;
                $value = $genres[$index];
            }
            $this->query("INSERT IGNORE INTO book_has_genre(book_idbook, genre_idgenre) VALUE($idbook, $value)");
        }
        $genresStr = implode(", ", $genres);
        $this->query("DELETE FROM book_has_genre WHERE book_has_genre.book_idbook=$idbook AND book_has_genre.genre_idgenre NOT IN ($genresStr)");

    }

    function saveBook($idbook, $name, $description, $price, $authors, $genres)
    {
        $name = $this->mysqli->real_escape_string($name);
        $description = $this->mysqli->real_escape_string($description);
        if (isset($idbook)) {
            $this->query("UPDATE book SET name='$name', price=$price, description='$description'  WHERE book.idbook=$idbook");
        } else {
            $this->query("INSERT INTO book(idbook, name, description, price) VALUE (NULL, '$name', '$description', $price)");
            $idbook = $this->mysqli->insert_id;
        }
        $this->updateBookAuthors($idbook, $authors);
        $this->updateBookGenres($idbook, $genres);
    }

    function deleteBooks($idbooks)
    {
        foreach ($idbooks as $idbook) {
            $this->query("DELETE FROM book_has_author WHERE book_has_author.book_idbook=$idbook");
            $this->query("DELETE FROM book_has_genre WHERE book_has_genre.book_idbook=$idbook");
            $this->query("DELETE FROM book WHERE book.idbook=$idbook");
        }
    }

    function getNames($result, $fieldName)
    {
        $names = [];
        while ($row = $result->fetch_assoc()) {
            $names[] = $row[$fieldName];
        }
        return implode(", ", $names);
    }

    function getAuthorsNames($idbook)
    {
        return $this->getNames($this->getAuthorsFromBook($idbook), 'fio');
    }

    function getGenresNames($idbook)
    {
        return $this->getNames($this->getGenresFromBook($idbook), 'name');
    }
}

?>