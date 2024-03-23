<?php
const REGISTRATION_MESSAGE = '{"status": true, "message": "Регистрация прошла успешно! Можете входить в аккаунт"}';
CONST AUTH_MESSAGE = '{"status": true, "message": "Вход произошёл успешно!"}';
const LOGIN_IN_DATABASE_ERROR = '{"status": false, "message": "Пользовател с таким логином уже существует"}';
const CONNECT_MYSQL_ERROR = '{"status": false, "message": "Неудачное подключение к MySQL"}';
const CALL_ADMIN_ERROR = '{"status": false, "message": "Обратитесь к администратору для выяснения ошибки"}';
const PASSWORD_LOGIN_SYMBOL_ERROR = '{"status": false, "message": "Пароль и логин должны состоять из английских букв и цифр"}';
const PASSWORDS_NOT_EQUAL_ERROR = '{"status": false, "message": "Пароли не совпадают"}';
const PASSWORD_LOGIN_LENGTH_ERROR = '{"status": false, "message": "Логин не должен превышать 12 символов, а пароль не должен превышать 32 символа"}';
const PARAMETERS_ERROR = '{"status": false, "message": "Некорректные параметры"}';
const PASSWORD_LOGIN_ERROR = '{"status": false, "message": "Неверный логин или пароль"}';
?>