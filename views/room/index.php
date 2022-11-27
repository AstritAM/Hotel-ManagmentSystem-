<?php include ROOT.'/views/layout/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="rectangle">
                    <li><a href="/admin">Админпанель</a></li>
                    
                </ol>
            </div>
            <h2 >Управление комнатами</h2>

           
            
            <h3>Список комнат</h3>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                <th>ID товара</th>
                 
                 <th>Номер комнаты</th>
                 <th>Тип комнаты</th>
                 <th>Номер телефона</th>
              
                 <th>Свободен</th>
                 
                 <th></th>
                 <th></th>
                </tr>
                <?php foreach ($roomList as $room): ?>
                    <tr>
                        <td><?php echo $room['id']; ?></td>
                        <td><?php echo $room['number']; ?></td>
                        <td><?php echo $room['type']; ?></td>  
                    
                        <td><?php echo $room['phone']; ?></td>
                        <td><?php echo $room['free']; ?></td>  
                      
                        <td><a href="/admin/room/update/<?php echo $room['id']; ?>" title="Редактировать">Редактировать</i></a></td>
                        <td><a href="/admin/room/delete/<?php echo $room['id']; ?>" title="Удалить">Удалить</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/admin/room/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить комнату</a>
        </div>
    </div>