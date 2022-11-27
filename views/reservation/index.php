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
            <h2 >Управление резервированием</h2>

           
            
            <h3>Список</h3>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                 
                    <th>Клиент</th>
                    <th>Номер комнаты</th>
                    <th>Дата въезда</th>
                    <th>Дата выезда</th>
                    
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($reservationList as $reservation): ?>
                    <tr>
                        <td><?php echo $reservation['id']; ?></td>
                        <td><?php echo $reservation['name']; ?></td>
                        <td><?php echo $reservation['number']; ?></td>  
                        <td><?php echo $reservation['dateIn']; ?></td>
                        <td><?php echo $reservation['dateOut']; ?></td>
                        
                      
                        <td><a href="/admin/reservation/update/<?php echo $reservation['id']; ?>" title="Редактировать">Редактировать</i></a></td>
                        <td><a href="/admin/reservation/delete/<?php echo $reservation['id']; ?>" title="Удалить">Удалить</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/admin/reservation/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить комнату</a>
        </div>
    </div>