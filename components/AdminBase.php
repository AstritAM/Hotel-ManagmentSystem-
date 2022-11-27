<?php
include ROOT.'/models/User.php';
abstract class adminBase{

    public static function checkAdmin()
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();

        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);

        // Если роль текущего пользователя "admin", пускаем его в админпанель
       
            return true;
        

        // Иначе завершаем работу с сообщением об закрытом доступе
        die('Access denied');
    }
     
}