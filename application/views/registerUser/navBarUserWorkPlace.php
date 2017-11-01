<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <?=anchor('', 'На главную', 'class="navbar-brand"');?>
            <!-- <a class="navbar-brand" href="">WebSiteName</a> -->
        </div>
        <ul class="nav navbar-nav">
            <li class="active">
                <?=anchor('registerUser/userWorkPlace/', 'К списку магазинов');?>
            </li>

            <li>
                <?=anchor('registerUser/userWorkPlace/addNewBlock', 'Добавить магазин');?>
                <!-- <a href="#">Добавить блок с магазином</a> -->
            </li>

            <li>
                <?=anchor('registerUser/userWorkPlace/editBlock', 'Редактировать магазин'); ?>
            </li>

            <li>
                <?=anchor('registerUser/userWorkPlace/deleteBlock', 'Удаление магазина');?>
                <!-- <a href="/userworkplace/deleteblock"> Удалить выбранные блоки</a> -->
            </li>
        </ul>
    </div>
</nav>