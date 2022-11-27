<?php include ROOT.'/views/layout/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="rectangle">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/reservation">Управление резервированием</a></li>
                   
                </ol>
            </div>

            <h2>Редактирование резервированных данных</h2>
            <h4>Редактировать зарезервированные данные №<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        
                        
                        <p>Клиент</p>
                        <select name="clientid">
                            <?php if (is_array($client)): ?>
                                <?php foreach ($client as $clientl): ?>
                                    <option value="<?php echo $clientl['id']; ?>" 
                                        <?php if ($reserId['clientid'] == $clientl['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $clientl['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>
                         
                        <p>Комната</p>
                        <select name="roomNumber">
                            <?php if (is_array($room)): ?>
                                <?php foreach ($room as $count): ?>
                                    <option value="<?php echo $count['id']; ?>" 
                                        <?php if ($reserId['roomNumber'] == $count['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $count['param']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

                        <p>Дата въезда</p>
                        <input type="date" name="dateIn" placeholder="" value="<?php echo $reserId['dateIn']; ?>">

                        <p>Дата выезда</p>
                        <input type="date" name="dateOut" placeholder="" value="<?php echo $reserId['dateOut']; ?>">

            
                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>