<?php
include ROOT.'/models/Reservation.php';
include ROOT.'/models/Room.php';
include ROOT.'/models/Client.php';
include ROOT.'/components/AdminBase.php';


class AdminManageController extends adminBase{

    public function actionIndex() {
        
        self::checkAdmin();

        $clientsList=Client::getClientList();

        require_once (ROOT . '/views/clients/index.php');
     
        return true;
    }
       



       
    public function actionIndexR() {
        
        self::checkAdmin();

        $roomList=Room::getRoomList();

        require_once (ROOT . '/views/room/index.php');
     
        return true;
       
       
       }
       public function actionIndexRes() {
        
        self::checkAdmin();

        $reservationList=Reservation::getReservationList();

        require_once (ROOT . '/views/reservation/index.php');
     
        return true;
       
       
       }

       public function actionCreateC()
       {
          
           self::checkAdmin();
   
           if (isset($_POST['submit'])) {

               $options['first_name'] = $_POST['first_name'];
               $options['last_name'] = $_POST['last_name'];
               $options['patronymic'] = $_POST['patronymic'];
               $options['age'] = $_POST['age'];
               $options['number'] = $_POST['number'];
               $options['passport'] = $_POST['passport'];
               $options['country'] = $_POST['country'];

               
               $errors = false;
               
          
               if (!isset($options['number']) || empty($options['number'])) {
                 
                   $errors[] = 'Заполните поля';
               }
   
               if ($errors == false) {
                 
                   $id = Client::createClient($options);
   
                 
   
                   // Перенаправляем пользователя на страницу управлениями товарами
                   header("Location: /admin/client");
                   die();
               }
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/clients/create.php');
           return true;
       }


       public function actionUpdateC($id)
       {
           
           self::checkAdmin();
   
           $client = Client::getClientById($id);
   
      
           if (isset($_POST['submit'])) {

            $options['first_name'] = $_POST['first_name'];
            $options['last_name'] = $_POST['last_name'];
            $options['patronymic'] = $_POST['patronymic'];
            $options['age'] = $_POST['age'];
            $options['number'] = $_POST['number'];
            $options['passport'] = $_POST['passport'];
            $options['country'] = $_POST['country'];
  
                Client::updateClientById($id, $options);
               // Перенаправляем пользователя на страницу управлениями товарами
               header("Location: /admin/client");
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/clients/update.php');
           return true;
       }
       public function actionDeleteC($id)
       {
           // Проверка доступа
           self::checkAdmin();
   
           // Обработка формы
           if (isset($_POST['submit'])) {
               
             Client::deleteClientById($id);
   
               // Перенаправляем пользователя на страницу управлениями товарами
               header("Location: /admin/client");
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/clients/delete.php');
           return true;
       }




       public function actionCreateR()
       {
           // Проверка доступа
           self::checkAdmin();
   
           // Получаем список категорий для выпадающего списка
           $categoriesList = Room::getTypeList();
 
           
           // Обработка формы
           if (isset($_POST['submit'])) {
              
               $options['number'] = $_POST['number'];
               $options['type'] = $_POST['type'];
              
               $options['phone'] = $_POST['phone'];
               $options['free'] = $_POST['free'];

               
               $errors = false;
   
          
               if (!isset($options['number']) || empty($options['number'])) {
                 
                   $errors[] = 'Заполните поля';
               }
   
               if ($errors == false) {
                 
                   $id = Room::createRoom($options);
   
                 
   
                   // Перенаправляем пользователя на страницу управлениями товарами
                   header("Location: /admin/room");
                   die();
               }
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/room/create.php');
           return true;
       }

       public function actionUpdateR($id)
       {
           
           self::checkAdmin();
           $categoriesList = Room::getTypeList();
   
           
   
           $room = Room::getRoomById($id);
   
      
           if (isset($_POST['submit'])) {

            $options['number'] = $_POST['number'];
            $options['type'] = $_POST['type'];
      
            $options['phone'] = $_POST['phone'];
            $options['free'] = $_POST['free'];
                Room::updateRoomById($id, $options);
               // Перенаправляем пользователя на страницу управлениями товарами
               header("Location: /admin/room");
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/room/update.php');
           return true;
       }

       public function actionDeleteR($id)
       {
           // Проверка доступа
           self::checkAdmin();
   
           // Обработка формы
           if (isset($_POST['submit'])) {
               
               Room::deleteRoomById($id);
   
               // Перенаправляем пользователя на страницу управлениями товарами
               header("Location: /admin/room");
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/room/delete.php');
           return true;
       }

       public function actionCreateRes()
       {
           // Проверка доступа
           self::checkAdmin();
   
           // Получаем список категорий для выпадающего списка
           $client=Client::getConcatIdList();
           $room = Room::getRoomConList();
       
           
           // Обработка формы
           if (isset($_POST['submit'])) {
              
               $options['clientid'] = $_POST['clientid'];
               $options['roomNumber'] = $_POST['roomNumber'];
               $options['dateIn'] = $_POST['dateIn'];
               $options['dateOut'] = $_POST['dateOut'];
               
               $errors = false;
   
          
               if (!isset($options['clientid']) || empty($options['clientid'])) {
                 
                   $errors[] = 'Заполните поля';
               }
               if (!isset($options['roomNumber']) || empty($options['roomNumber'])) {
                 
                $errors[] = 'Заполните поля';
            }
   
            if ( strtotime( $options['dateIn'])<date("d.m.y")) {
                 
                $errors[] = 'Дата въездада должна быть сегодня или дальше';
            }
   
            if (  $options['dateIn']> $options['dateOut']) {
                 
                $errors[] = 'Дата въездада должна быть больше даты выезда';
            }
            if (  date("d.m.y")<= $options['dateOut']) {
                 
                $errors[] = 'Дата выезда должна быть завтра или дальше';
            }
               if ($errors == false) {
                 
                   $id = Reservation::createClient($options);
   
                 
   
                   // Перенаправляем пользователя на страницу управлениями товарами
                   header("Location: /admin/reservation");
                   die();
               }
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/reservation/create.php');
           return true;
       }

       public function actionUpdateRes($id)
       {
           
           self::checkAdmin();
            // Получаем список категорий для выпадающего списка
            $client=Client::getConcatIdList();
            $room = Room::getRoomConList();
            $reserId = Reservation::getResById($id);
            
            
            // Обработка формы
            if (isset($_POST['submit'])) {
               
                $options['clientid'] = $_POST['clientid'];
                $options['roomNumber'] = $_POST['roomNumber'];
                $options['dateIn'] = $_POST['dateIn'];
                $options['dateOut'] = $_POST['dateOut'];
                
                $errors = false;

            if (!isset($options['clientid']) || empty($options['clientid'])) {
              
                $errors[] = 'Заполните поля';
            }
            if (!isset($options['roomNumber']) || empty($options['roomNumber'])) {
              
                $errors[] = 'Заполните поля';
            }

            if ( strtotime( $options['dateIn'])<date("d.m.y")) {
                
                $errors[] = 'Дата въездада должна быть сегодня или дальше';
            }

            if (  $options['dateIn']> $options['dateOut']) {
                
                $errors[] = 'Дата въездада должна быть больше даты выезда';
            }
            if (  date("d.m.y")<= $options['dateOut']) {
                
                $errors[] = 'Дата выезда должна быть завтра или дальше';
            }
            if ($errors == false) {
               Reservation::updateResById($id,$options);
            }
               // Перенаправляем пользователя на страницу управлениями товарами
               header("Location: /admin/reservation");
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/reservation/update.php');
           return true;
       }

       public function actionDeleteRes($id)
       {
           // Проверка доступа
           self::checkAdmin();
   
           // Обработка формы
           if (isset($_POST['submit'])) {

               $number=Reservation::getNumberList($id);

                Room::updateFreeById($number);
              // Room::deleteRoomByreservationId($id);
   
               // Перенаправляем пользователя на страницу управлениями товарами
               header("Location: /admin/");
           }
   
           // Подключаем вид
           require_once(ROOT . '/views/reservation/delete.php');
           return true;
       }






}