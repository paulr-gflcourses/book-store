<?php
include "db.php";

$db = new DB;
$book = [];
if ($_GET) {
    $book = $db->getBookById($_GET['idbook']);
} else {
    $book = ['idbook' => '', 'name' => '', 'description' => '', 'price' => ''];
}
?>

<div class="container">

    <form method='POST' name='book' id='book' action="javascript:void(null);" enctype="multipart/form-data">
        <dl class="row">

            <dt class='col-sm-2'>Название:</dt>
            <dd class='col-sm-9'>
                <?php
                echo "<input type='text' class='form-control' name='book-name' id='book-name' value='{$book['name']}'/>";
                ?>
            </dd>

            <dt class='col-sm-2'>Авторы:</dt>
            <dd class='col-sm-9'>
                <dl class='row'>
                    <dd class='col-sm-4'>
                        <select multiple class='custom-select mr-sm-2' id='book-authors' name='book-authors[]'>
                            <?php
                            if ($_GET) {
                                $resource = $db->getAuthorsFromBook($_GET['idbook']);
                                while ($authors = mysqli_fetch_assoc($resource)) {
                                    echo "<option value='{$authors['idauthor']}'>{$authors['fio']}</option>\n";
                                }
                            }
                            ?>
                        </select>
                    </dd>
                    <dd class='col-sm-4'>
                        <input type='button' class='btn btn-secondary mb-2' value='Добавить автора'
                               onclick='addOption("book-authors","all-authors","author-fio")'>
                        <input type='button' class='btn btn-secondary mb-2' value='Удалить автора'
                               onclick='removeOption("book-authors")'>
                    </dd>
                    <dd class='col-sm-4'>
                        <select class='custom-select mr-sm-2' id='all-authors' name='all-authors'>
                            <option></option>
                            <?php
                            $resource = $db->getAllAuthors();
                            while ($authors = mysqli_fetch_assoc($resource)) {
                                echo "<option value='{$authors['idauthor']}'>{$authors['fio']}</option>\n";
                            }
                            ?>
                        </select>
                        <input type='text' class='form-control' id='author-fio' name='author-fio'
                               placeholder='Введите ФИО автора'/>
                    </dd>

                </dl>
            </dd>


            <dt class='col-sm-2'>Жанры:</dt>
            <dd class='col-sm-9'>
                <dl class='row'>
                    <dd class='col-sm-4'>
                        <select multiple class='custom-select mr-sm-2' id='book-genres' name='book-genres[]'>
                            <?php
                            if ($_GET) {
                                $resource = $db->getGenresFromBook($_GET['idbook']);
                                while ($genres = mysqli_fetch_assoc($resource)) {
                                    echo "<option value='{$genres['idgenre']}'>{$genres['name']}</option>\n";
                                }
                            }
                            ?>
                        </select>
                    </dd>
                    <dd class='col-sm-4'>
                        <input type='button' class='btn btn-secondary mb-2' value='Добавить жанр'
                               onclick='addOption("book-genres","all-genres","genre-name")'>
                        <input type='button' class='btn btn-secondary mb-2' value='Удалить жанр'
                               onclick='removeOption("book-genres")'>
                    </dd>
                    <dd class='col-sm-4'>
                        <select class='custom-select mr-sm-2' id='all-genres' name='all-genres'>
                            <option></option>
                            <?php
                            $resource = $db->getAllGenres();
                            while ($genres = mysqli_fetch_assoc($resource)) {
                                echo "<option value='{$genres['idgenre']}'>{$genres['name']}</option>\n";
                            }
                            ?>
                        </select>
                        <input type='text' class='form-control' id='genre-name' name='genre-name'
                               placeholder='Введите название жанра'/>
                    </dd>

                </dl>
            </dd>

            <?php
            if ($_GET) {
                echo "<input type='hidden' name='book-idbook' value='{$_GET['idbook']}'/>";
            }
            echo "
        <dt class='col-sm-2'>Цена:</dt>
        <dd class='col-sm-9'><input type='text' class='form-control col-sm-2' name='book-price' id='book-price' value='{$book['price']}'/></dd>
        
        <dt class='col-sm-2'>Краткое описание:</dt>
        <dd class='col-sm-9'> <textarea class='form-control' name='book-description' id='book-description' rows='8'>{$book['description']}</textarea></dd>
	";
            ?>

        </dl>


    </form>


</div>
