<?php
class Room{

    public STATIC function getTypeList () {
        $db=Db::getConnection();
        $roomTypeList=array();
        $result=$db->query('SELECT * FROM rooms_category');
        $i=0;
        while ($row = $result->fetch()) {
            $roomTypeList[$i]['id']=$row['id'];
            $roomTypeList[$i]['type']=$row['lable'];
            $roomTypeList[$i]['price']=$row['price'];
     
            $i++;
        }
        return $roomTypeList ;
               
    
    }



    public STATIC function getRoomList () {
        $db=Db::getConnection();
        $roomList=array();
        $result=$db->query('SELECT rooms.id, rooms.number,rooms_category.lable,rooms.phone,
        rooms.free FROM rooms INNER JOIN rooms_category ON rooms.type= rooms_category.id ');
        $i=0;
        while ($row = $result->fetch()) {
            $roomList[$i]['id']=$row['id'];
            $roomList[$i]['number']=$row['number'];
            $roomList[$i]['type']=$row['lable'];
          
            $roomList[$i]['phone']=$row['phone'];
            $roomList[$i]['free']=$row['free'];
            
            $i++;
        }
        return $roomList ;
               
    
    }

    
    public STATIC function getRoomConList () {
        $db=Db::getConnection();
        $roomList=array();
        $sql='SELECT rooms.id,concat(rooms.number," - ",rooms_category.lable," на ",
        rooms_category.count," цена:",rooms_category.price) AS room
    FROM rooms INNER JOIN rooms_category ON rooms.type= rooms_category.id  WHERE free=:free';
           $yes='Да';
           $result = $db->prepare($sql);
           $result->bindParam(':free', $yes, PDO::PARAM_INT);  
           $result->setFetchMode(PDO::FETCH_ASSOC);

           // Выполнение коменды
           $result->execute();
            $roomlist=array();
            $i=0;
           while ($row = $result->fetch()) { 
            $roomlist[$i]['id']=$row['id'];
            $roomlist[$i]['param']=$row['room'];
            $i++;
        }
           // Получение и возврат результатов
           return $roomlist;
    
    }
    
    

    public static function createRoom($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO rooms '
                . '(number, type, phone,free) '
                . 'VALUES '
                . '(:number, :type, :phone, :free)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':number', $options['number'], PDO::PARAM_INT);     
        $result->bindParam(':type', $options['type'], PDO::PARAM_INT);
     
        $result->bindParam(':phone', $options['phone'], PDO::PARAM_STR);
        $result->bindParam(':free', $options['free'], PDO::PARAM_STR);
        if ($result->execute()) {
            die();
            return $db->lastInsertId();
        }
        else{
           // echo $result->error;
            //echo "11111111";
            //die();
        }
        // Иначе возвращаем 0
        return 0;
    }

    
    public STATIC function getRoomById ($id) {
        $db=Db::getConnection();
    
        $sql='SELECT * FROM rooms WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $i=0;
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }
      

    public static function updateRoomById($id, $options)
    {
       
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'UPDATE rooms
            SET number=:number,
            type= :type, 

            phone=:phone, 
            free=:free
            WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':number', $options['number'], PDO::PARAM_INT);     
        $result->bindParam(':type', $options['type'], PDO::PARAM_INT);
     
        $result->bindParam(':phone', $options['phone'], PDO::PARAM_STR);
        $result->bindParam(':free', $options['free'], PDO::PARAM_STR);
        return ( $result->execute());
        //die("333");
    }

    public static function updateFreeById($number)
    {
       
     
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'UPDATE rooms
            SET  
            free=:free
            WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $yes='Да';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $number['roomNumber'], PDO::PARAM_INT);
        $result->bindParam(':free',  $yes, PDO::PARAM_STR);
      
        return ( $result->execute());
        //die("333");
    }

    public static function deleteRoomById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM rooms WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        print_r('dhcuc');
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return $result->execute();

    }


}