<?php
include "db.php";


switch ($_POST['action']) {
    case 'books-remove':
        deleteBooks();
        break;
    case 'books-list':
        booksList();
        break;
    case 'book-save':
        saveBook();
        break;
    case 'authors-list':
        authorslist();
        break;
    case 'genres-list':
        genreslist();
        break;

}

function deleteBooks()
{
    $db = new DB;
    $db->deleteBooks($_POST['books-to-delete']);
}

function booksList()
{

    $db = new DB;
    $username = (isset($_SERVER['PHP_AUTH_USER'])) ? $_SERVER['PHP_AUTH_USER'] : '';
    $resBooks = "";
    if (isset($_POST['authors']) && ($_POST['authors'] || $_POST['genres'])) {
        if ($_POST['authors'] && $_POST['genres']) {
            $resBooks = $db->getBooksByAuthorGenre($_POST["authors"], $_POST["genres"]);
        } elseif ($_POST['authors']) {
            $resBooks = $db->getBooksByAuthor($_POST["authors"]);
        } else {
            $resBooks = $db->getBooksByGenre($_POST["genres"]);
        }
    } else {
        $resBooks = $db->getAllBooks();
    }

    $i = 1;


    while (list($idbook, $name) = mysqli_fetch_row($resBooks)) {
        echo "<tr class='row'>";
        if ($username == 'admin') {
            echo "<td class='col'><input class='form-check-input' type='checkbox' value='$idbook' name='books-to-delete[]'></td>";
        }
        echo "<th scope='row' class='col-1'>" . $i++ . "</th>";
        echo "<td class='col-4'><a href='./book-view.php?idbook=$idbook'>$name</a></td>";
        $authorsNames = $db->getAuthorsNames($idbook);
        echo "<td class='col-4'>$authorsNames</td>";
        if ($username == 'admin') {
            echo "<td class='col-2'><a data-toggle='modal' href='#editModal' data-idbook='$idbook' >Редактировать</a>
                            </td>";
        }
        echo "</tr>";


    }
}


function authorsList()
{
    $db = new DB;
    echo '<option></option>';
    $resource = $db->getAllAuthors();
    while ($authors = mysqli_fetch_assoc($resource)) {
        echo "<option value='{$authors['idauthor']}'>{$authors['fio']}</option>\n";
    }
}

function genresList()
{
    $db = new DB;
    echo '<option></option>';
    $resource = $db->getAllGenres();
    while ($genres = mysqli_fetch_assoc($resource)) {
        echo "<option value='{$genres['idgenre']}'>{$genres['name']}</option>\n";
    }

}

function saveBook()
{

    $db = new DB;
    $authors = $_POST['book-authors'];
    $genres = $_POST['book-genres'];

    $db->saveBook($_POST['book-idbook'], $_POST['book-name'], $_POST['book-description'], $_POST['book-price'], $authors, $genres);
}

?>