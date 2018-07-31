<?php
// Сообщение
$message = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae error ratione repellendus ipsa libero soluta quod itaque quaerat, porro, tempora dicta eius consequuntur doloremque natus culpa voluptate! Omnis, iure, in.";

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Отправляем

mail('scanner85@gmail.com', 'SpecSintez message', $message);


