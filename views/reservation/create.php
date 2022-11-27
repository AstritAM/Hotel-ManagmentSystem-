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
            <h2>Добавление резервированием</h2>

            <h4>Зарезервировать</h4>

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
                        <p>Клиент</p>
                        <select name="clientid">
                            <?php if (is_array($client)): ?>
                                <?php foreach ($client as $clientl): ?>
                                    <option value="<?php echo $clientl['id']; ?>">
                                        <?php echo $clientl['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Номер</p>
                       
                        <select name="roomNumber" id="room" multiple style="width: 20em;">
                        
                            <?php if (is_array($room)): ?>
                                <?php foreach ($room as $count): ?>
                                    <option value="<?php echo $count['id']; ?>">
                                        <?php echo $count['param']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        
                        </select>

                        <br/><br/>
                        <p>Дата въезда</p>
                        <input type="date" name="dateIn" placeholder="dd-mm-yyyy">

         
                        <br/><br/>

                        
                        <p>Дата выезда</p>
                        <input type="date" name="dateOut" placeholder="" value="">

         
                        <br/><br/>


                        


                        

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>



  <script type="text/javascript">
    if (window.jQuery) {
        console.log('Привет от JavaScript!');
}
      $(document).ready(function(){
            $('#type').on("change",function(){
             var id = $('#type').val();
             console.log('Привет от JavaScript!');
              $.ajax({
              url: "model.php",
              type: "POST",
              data: {id:id},
              success: function(data){
              $("#room").html(data);   
              }
              });
            
                
            
            });
            
        });
        
</script> 
</body>
</html>
