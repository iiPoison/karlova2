<?php

/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$tel = htmlspecialchars($_POST["tel"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);

/* Ваш адрес и тема сообщения */
$address = "as.fedotkin@yandex.ru";
$sub = "Сообщение с сайта ХХХ";

/* Формат письма */
$mes = "Сообщение с сайта ХХХ.\n
Имя отправителя: $name
Телефон отправителя: $tels
Текст сообщения: $message";

if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name \r\n Reply-To: $tel \r\n";
if (mail($address, $sub, $mes, $from)) {
 header('Refresh: 5; URL=http://mbdou-dskv4.ru');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо отправлено, через 5 секунд вы вернетесь на страницу XXX</body>';}
else {
 header('Refresh: 5; URL=http://mbdou-dskv4.ru');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо не отправлено, через 5 секунд вы вернетесь на страницу YYY</body>';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>
