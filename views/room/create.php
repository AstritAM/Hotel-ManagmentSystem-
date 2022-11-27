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
            <h2>Добавление комнаты</h2>

            <h4>Добавить новую комнату</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Номер комнаты</p>
                        <input type="text" name="number" >

                        <p>Тип номера</p>
                        <select name="type">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['type']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>


                        <p>Номер телефона</p>
                        <input type="text" name="phone" placeholder="" value="">

         
                        <br/><br/>


                        <p>Статус</p>
                        <select name="free">
                            <option value="Да" selected="selected">Да</option>
                            <option value="Нет">Нет</option>
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
