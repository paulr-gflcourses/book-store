<?php

include "header.php";
include "db.php";

$db = new DB;
?>

    <div class="container">

        <?php
        if ($username == 'admin') {
            echo "
                    <ul class='nav nav-pills '>
                        <li class='nav-item'>
                            <a class='nav-link active' data-toggle='modal' data-newbook='true' href='#editModal'>
                            Добавить новую книгу
                            </a>
                        </li>
                       </ul>";
        }

        ?>


        <form action="javascript:void(null);" onsubmit="updateBooksTable()">
            <div class="row justify-content-start">
                <p class="col-2 align-self-end">Фильтровать:</p>

                <div class="col-3">
                    <label for="authors">Автор</label>
                    <select class="custom-select" id="authors" name="authors">


                    </select>
                </div>

                <div class="col-3">
                    <label for="genres">Жанр</label>
                    <select class="custom-select" id="genres" name="genres">


                    </select>
                </div>

                <button type="submit" class="btn btn-secondary col-1 align-self-end">Выбрать</button>

            </div>
        </form>


        <p class="lead"> Список книг:</p>

        <form id="books" action="javascript:void(null);" onsubmit="removeBooks()">
            <?php
            if ($username == 'admin') {
                echo "<button type='submit' class='btn btn-danger col-1 align-self-end'>Удалить</button>";
            }
            ?>

            <table class="table table-striped table-hover">
                <thead>
                <tr class="row">
                    <?php
                    if ($username == 'admin') {
                        echo "<th scope='col' class='col'></th>";
                    }
                    ?>
                    <th scope="col" class='col-1'>№</th>
                    <th scope="col" class='col-4'>Название</th>
                    <th scope="col" class='col-4'>Авторы</th>
                    <?php
                    if ($username == 'admin') {
                        echo "<th scope='col' class='col-2'></th>";
                    }
                    ?>
                </tr>
                <thead>
                <tbody id="tbody">


                </tbody>
            </table>

        </form>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="document" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Окно редактирования</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type='submit' id='save-btn' class='btn btn-primary' onclick="saveBook()">Сохранить
                        изменения
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            updateAuthorsGenresList();
            updateBooksTable();

            $('#editModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var idbook = button.data('idbook');
                var modal = $(this);
                if (idbook) {
                    modal.find('.modal-title').text('Редактировать книгу');

                } else {
                    modal.find('.modal-title').text('Добавить книгу');
                }
                getBookEditForm(idbook, modal);
            })
        });
    </script>


<?php
include "footer.php";
?>