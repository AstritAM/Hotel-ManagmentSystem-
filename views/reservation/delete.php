<?php include ROOT.'/views/layout/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="rectangle">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    
                </ol>
            </div>
            <h2>Удалить резервирование</h2>

            <h4>Удалить резервирование #<?php echo $id; ?>?</h4>


            <p>Вы действительно хотите удалить эту резервацию?</p>

            <form method="POST">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>