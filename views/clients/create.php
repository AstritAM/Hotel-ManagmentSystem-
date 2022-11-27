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
            <h2>Добавление клиента</h2>

            <h4>Добавить нового клиента</h4>

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

                        <p>Имя</p>
                        <input type="text" name="first_name" >

                        <br/><br/>

                        <p>Фамилия</p>
                        <input type="text" name="last_name" placeholder="" value="">

         
                        <br/><br/>

                        <p>Отчество</p>
                        <input type="text" name="patronymic" >
                        <br/><br/>

                        
                        <p>Возраст</p>
                        <input type="text" name="age" >
                        <br/><br/>
                        
                        <p>Номер телефона</p>
                        <input type="text" name="number" >
                        <br/><br/>
                        
                        <p>Паспортные данные</p>
                        <input type="text" name="passport" >
                        <br/><br/>
                        
                        <p>Страна</p>
                        <input type="text" name="country" >
                        <br/><br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
