<?php
include "header.php";

$adminEmail = 'admin@localhost.com';
$subject = 'Новый заказ';
$headers = "Content-type: text/plain; charset=UTF-8";

$headers = "MIME-Version: 1.0\r\n"
    . "From: $adminEmail\r\n"
    . "Content-type: text/plain; charset=UTF-8\r\n";

$name = $_POST['book-name'];
$number = $_POST['book-number'];
$price = (float)$_POST['book-price'];
$sum = $number * $price;

date_default_timezone_set('Europe/Kiev');
$date = date("d.m.y, H:i");
$message = "Заказ книги '$name' (ID={$_POST['idbook']}) был совершен $date.
	Количество экземпляров:\t $number
	Сумма заказа:\t\t $sum грн
	ФИО заказчика:\t\t {$_POST['fio']}
	Адрес заказчика:\t {$_POST['address']}";


echo "<div class='container'>\n";
if (mail($adminEmail, $subject, $message, $headers)) {
    echo "<h3>Ваш заказ на книгу '$name' был успешно отправлен!</h3>";
    echo "<p>Дата заказа: $date</p>\n";
    echo "<p>Количество экземпляров: $number</p>\n";
    echo "<p>Сумма заказа: $sum грн.</p>\n";
} else {
    echo "<h3>Не удалось отправить заказ!</h3>";
}

?>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Вернуться</a>
        </li>
    </ul>
    </div>

<?php
include "footer.php";
?>