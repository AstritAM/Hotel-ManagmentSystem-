<?php include ROOT.'/views/layout/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="rectangle">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/client">Управление клиентами</a></li>
                   
                </ol>
            </div>

            <h2>Редактирование данных клиента</h2>
            <h4>Редактировать данные кдиента  №<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Имя</p>
                        <input type="text" name="first_name" placeholder="" value="<?php echo $client['first_name']; ?>">

                        <br/><br/>

                        <p>Фамилия</p>
                        <input type="text" name="last_name" placeholder="" value="<?php echo $client['last_name']; ?>">

                        
                        <br/><br/>
                        <p>Отчество</p>
                        <input type="text" name="patronymic" placeholder="" value="<?php echo $client['patronymic']; ?>">

                        <br/><br/>

                        <p>Возраст</p>
                        <input type="text" name="age" placeholder="" value="<?php echo $client['age']; ?>">

                        
                        <br/><br/>
                        <p>Номер телефона</p>
                        <input type="text" name="number" placeholder="" value="<?php echo $client['number']; ?>">

                        <br/><br/>

                        <p>Паспортные данные</p>
                        <input type="text" name="passport" placeholder="" value="<?php echo $client['passport']; ?>">

                        
                        <br/><br/>
                        <p>Страна</p>
                        <input type="text" name="country" placeholder="" value="<?php echo $client['country']; ?>">

                        <br/><br/>

                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>