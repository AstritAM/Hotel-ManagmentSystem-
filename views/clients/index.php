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
            <h2 >Управление клиентами</h2>

           
            
            <h3>Список клиентов</h3>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID клиента</th>
                 
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                 
                    <th>Возраст</th>
                    <th>Номер  телефона</th>
                    <th>Данные паспорта</th>
                 
                    <th>Страна</th>
                    
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($clientsList as $client): ?>
                    <tr>
                        <td><?php echo $client['id']; ?></td>
                        <td><?php echo $client['name']; ?></td>
                        <td><?php echo $client['last_name']; ?></td>  
                        <td><?php echo $client['patronymic']; ?></td>
                        <td><?php echo $client['age']; ?></td>
                        <td><?php echo $client['number']; ?></td>  
                        <td><?php echo $client['passport']; ?></td>
                        <td><?php echo $client['country']; ?></td>
                      
                        <td><a href="/admin/client/update/<?php echo $client['id']; ?>" title="Редактировать">Редактировать</a></td>
                        <td><a href="/admin/client/delete/<?php echo $client['id']; ?>" title="Удалить">Удалить</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/admin/client/create" class="btn btn-default back"> Добавить клиента</a>
        </div>
    </div>