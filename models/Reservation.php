<?php

class Reservation{

public STATIC function getReservationList () {
        $db=Db::getConnection();
        $roomList=array();
        $result=$db->query('SELECT reservations.id,
         concat(clients.id," - ",clients.last_name," ",clients.first_name, " ",clients.patronymic) AS nom_prenom,rooms.number,
          reservations.dateIn,reservations.dateOut FROM reservations 
          INNER JOIN rooms ON reservations.roomNumber= rooms.id 
          INNER JOIN clients ON reservations.clientid= clients.id');
        $i=0;
        while ($row = $result->fetch()) {
            $roomList[$i]['id']=$row['id'];
            $roomList[$i]['name']=$row['nom_prenom'];
            $roomList[$i]['number']=$row['number'];
            $roomList[$i]['dateIn']=$row['dateIn'];
            $roomList[$i]['dateOut']=$row['dateOut'];
       
            $i++;
        }
        return $roomList ;
               
    
    }


    public STATIC function getNumberList ($id) {
        $db=Db::getConnection();
        $roomList=array();
        $sql='SELECT roomNumber FROM reservations WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $i=0;
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        
        return $result->fetch();
               
    
    }

    public static function deleteRoomById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM reservations WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        print_r('dhcuc');
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return $result->execute();

    }

    public STATIC function getResById ($id) {
        $db=Db::getConnection();
    
        $sql='SELECT * FROM reservations WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $i=0;
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }
      

    public static function createClient($options)
    {
        $db = Db::getConnection();
        var_dump($options);
        

        $sql = 'INSERT INTO reservations '
                . '(clientid,roomNumber,dateIn,dateOut) '
                . 'VALUES '
                . '(:clientid, :roomNumber, :dateIn, :dateOut)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
           if ($result->execute([':clientid' => $options['clientid'], 
        ':roomNumber' => $options['roomNumber'], ':dateIn'=>$options['dateIn'],
        ':dateOut'=>$options['dateOut'] ])) {

            echo $db->lastInsertId();
            return $db->lastInsertId();
        }
        else{
            echo $result->error;
            echo "11111111";
            die();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function updateResById($id, $options)
    {
       
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'UPDATE reservations
            SET clientid=:clientid,
            roomNumber=:roomNumber,
            dateIn= :dateIn,
            dateOut=:dateOut
            WHERE id = :id';
       $result = $db->prepare($sql);
        // Получение и возврат результатов. Используется подготовленный запрос
       return $result->execute([ ':id'=>$id,':clientid' => $options['clientid'], 
        ':roomNumber' => $options['roomNumber'],
         ':dateIn'=>$options['dateIn'],
        ':dateOut'=>$options['dateOut'] ]);

        //die("333");
    }

}

