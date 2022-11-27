
<?php

$db=Db::getConnection();


if(isset($_POST['id']) && !empty($_POST['id'])){
$id = intval($_POST['id']);
$sql =('SELECT * FROM rooms WHERE type = :id');
$result = $db->prepare($sql);
$result->bindParam(':id', $id, PDO::PARAM_INT);
$result->setFetchMode(PDO::FETCH_ASSOC);

// Выполнение коменды
$result->execute();
while($row = $query->fetch_assoc()){
echo " <option value='{$row['id']}'>{$row['number']}</option>";

}

}else{
echo "<select name='room' ><option value='0'>Виберіть модель</option></select>";
}


