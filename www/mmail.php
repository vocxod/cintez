<?php
// Сообщение
$message = "Line 1\r\nLine 2\r\nLine 3";

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Отправляем


mail('scanner85@yandex.ru', 'My Subject' . mt_rand(1,100500), $message, "From: webmaster@specsintez.su");


/*
mail("dev.majordomo@gmail.com", "the subject", $message,
 "From: webmaster@specsintez.su\r\n"
."Reply-To: webmaster@specsintez.su\r\n"
."X-Mailer: PHP/" . phpversion());
*/

echo "<h3>Well done! Commander!</h3>";

echo "\n";




