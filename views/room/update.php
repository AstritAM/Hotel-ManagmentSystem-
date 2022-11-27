<?php include ROOT.'/views/layout/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="rectangle">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/room">Управление комнатами</a></li>
                   
                </ol>
            </div>

            <h2>Редактирование данных о комнате</h2>
            <h4>Редактировать данные о комнате №<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Номер комнаты</p>
                        <input type="text" name="number" placeholder="" value="<?php echo $room['number']; ?>">

                        
                        <p>Тип комнаты</p>
                        <select name="type">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($room['type'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['type']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

                        <p>Номер телефона</p>
                        <input type="text" name="phone" placeholder="" value="<?php echo $room['phone']; ?>">

            
                        <br/><br/>

                        


                        <p>Свободен</p>
                        <select name="free">
                            <option value="Да" <?php if ($room['free'] == 'Да') echo ' selected="selected"'; ?>>Да</option>
                            <option value="Нет" <?php if ($room['free'] == 'Нет') echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>