<?php
class Client{


    public STATIC function getClientList () {
        $db=Db::getConnection();
        $clientsList=array();
        $result=$db->query('SELECT * FROM clients');
        $i=0;
        while ($row = $result->fetch()) {
            $clientsList[$i]['id']=$row['id'];
            $clientsList[$i]['name']=$row['first_name'];
            $clientsList[$i]['last_name']=$row['last_name'];
            $clientsList[$i]['patronymic']=$row['patronymic'];
            $clientsList[$i]['age']=$row['age'];
            $clientsList[$i]['number']=$row['number'];
            $clientsList[$i]['passport']=$row['passport'];
            $clientsList[$i]['country']=$row['country'];
            
            $i++;
        }
        return $clientsList ;
               
    
    }


    public STATIC function getConcatList () {
        $db=Db::getConnection();
        $clientsList=array();
        $result=$db->query('SELECT concat(id," - ",last_name," ",first_name, " ",patronymic) AS nom_prenom FROM clients');
        $i=0;
        while ($row = $result->fetch()) { 
            $clientsList[$i]['name']=$row['nom_prenom'];
            $i++;
        }
        return $clientsList ;
               
    
    }

    public STATIC function getConcatIdList () {
        $db=Db::getConnection();
        $clientsList=array();
        $result=$db->query('SELECT id,concat(id," - ",last_name," ",first_name, " ",patronymic) AS nom_prenom FROM clients');
        $i=0;
        while ($row = $result->fetch()) { 
            $clientsList[$i]['id']=$row['id'];
            $clientsList[$i]['name']=$row['nom_prenom'];
            $i++;
        }
        return $clientsList ;
               
    
    }


    public STATIC function getClientById ($id) {
        $db=Db::getConnection();
    
        $sql='SELECT * FROM clients WHERE id=:id';
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

        $sql = 'INSERT INTO clients '
                . '(first_name, last_name, patronymic, age, number, passport, country) '
                . 'VALUES '
                . '(:first_name, :last_name, :patronymic, :age, :number, :passport, :country)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $options['first_name'], PDO::PARAM_STR);     
        $result->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);
        $result->bindParam(':patronymic', $options['patronymic'], PDO::PARAM_STR);   
        $result->bindParam(':age', $options['age'], PDO::PARAM_INT);
        $result->bindParam(':number', $options['number'], PDO::PARAM_STR);
        $result->bindParam(':passport', $options['passport'], PDO::PARAM_INT);
        $result->bindParam(':country', $options['country'], PDO::PARAM_STR);
        if ($result->execute()) {
            echo $db->lastInsertId();
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


    public static function updateClientById($id, $options)
    {
       
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'UPDATE clients
            SET first_name=:first_name, 
                last_name= :last_name, 
                patronymic=:patronymic, 
                age= :age, 
                number=:number, 
                passport=:passport, 
                country=:country
            WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':first_name', $options['first_name'], PDO::PARAM_STR);     
        $result->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);
        $result->bindParam(':patronymic', $options['patronymic'], PDO::PARAM_STR);   
        $result->bindParam(':age', $options['age'], PDO::PARAM_INT);
        $result->bindParam(':number', $options['number'], PDO::PARAM_STR);
        $result->bindParam(':passport', $options['passport'], PDO::PARAM_INT);
        $result->bindParam(':country', $options['country'], PDO::PARAM_STR); 

       
        return ( $result->execute());
        //die("333");
    }

    public static function deleteClientById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM clients WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        print_r('dhcuc');
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return $result->execute();

    }
    

}