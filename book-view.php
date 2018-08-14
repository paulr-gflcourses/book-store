<?php
include "header.php";
include "db.php";

$db = new DB;
$book = $db->getBookById($_GET['idbook']);
?>

    <div class="container">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Вернуться</a>
            </li>
        </ul>

        <p class="h2 text-center">Описание книги</p>


        <dl class="row">

            <?php
            echo "
                <dt class='col-sm-2'>Название:</dt>
                <dd class='col-sm-9'>{$book['name']}</dd>
                
                <dt class='col-sm-2'>Авторы:</dt>
                <dd class='col-sm-9'>{$db->getAuthorsNames($book['idbook'])}</dd>
                
                <dt class='col-sm-2'>Жанры:</dt>
                <dd class='col-sm-9'>{$db->getGenresNames($book['idbook'])}</dd>
                
                <dt class='col-sm-2'>Цена:</dt>
                <dd class='col-sm-9'>{$book['price']} грн.</dd>
                
                <dt class='col-sm-2'>Краткое описание:</dt>
                <dd class='col-sm-6'>{$book['description']}</dd>
	        ";
            ?>

        </dl>

        <hr/>

        <p class="lead col-3"> Заказать книгу:</p>

        <form method="POST" action="book-order.php">
            <div class="form-group col-sm-6">
                <label for="email">Ваш адрес:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <div class="form-group col-sm-6">
                <label for="fio">ФИО</label>
                <input class="form-control" type="text" id="fio" name="fio" placeholder="Иванов Петр Васильевич">
            </div>

            <div class="form-group col-sm-6">
                <label for="book-number">Количество экземпляров</label>
                <input class="form-control" type="text" id="book-number" name="book-number" value="1">
            </div>

            <?php
            echo "<input type='hidden' name='idbook' value='{$book['idbook']}'/>";
            echo "<input type='hidden' name='book-name' value='{$book['name']} '/>";
            echo "<input type='hidden' name='book-price' value='{$book['price']} '/>";
            ?>
            <button type="submit" class="btn btn-primary mb-2">Отправить заказ</button>


        </form>

    </div>

<?php
include "footer.php";
?>