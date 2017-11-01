<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title> Панель администратора </title>
    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css" />
    <style>
        /*#res{border: 1px solid red;}*/
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
</head>

<body>

<?php if(!empty($error)):?>
    <p>	<?=$error;?> </p>
    <p> <?=$url_login;?> </p>
<?php endif; ?>

<?php if(!empty($user_login)):?>

<?php require_once('navBarUserWorkPlace.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>Fixed</h3>
           <h1>Меню удаления магазинов</h1>
        </div>
    </div>
    <div class="row">
        <?php while($count >= 0): ?>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading"><?=$array['array' . $count]['block_title'];?>
                        <input name="<?=$array['array' . $count]['block_title'];?>"
                               class="chekbox-delete" type="checkbox"
                               value="<?=$array['array' . $count]['id_category'];?>" />
                    </div>
                    <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer"><?=$array['array' . $count]['block_content'];?></div>
                    <div class="panel-footer"><?=$array['array' . $count]['id_category'];?></div>
                </div>
            </div>
            <?php --$count; endwhile;?>

        <?php endif; ?>

        <script>
            var chk = [];
            var chkVal = [];
            var submitName;

            $(".chekbox-delete").click(function(){
                if(!chk.length && !chkVal.length) {
                    chk.push($(this).attr("name"));
                    chkVal.push($(this).attr("value"));
                }else {
                    for (var i = 0; i <= chk.length; i++) {
                        if (( chk[i] != $(this).attr("name") ) && ( chkVal[i] != $(this).attr("value") )) {
                            chk.push($(this).attr("name"));
                            chkVal.push($(this).attr("value"));
                            break;
                        }
                    }
                }

                $(".delete-magazin").click(function(){
                    submitName = $(this).attr("name");
                    //alert(submitName);
                    $.ajax({
                        method: 'POST',
                        url: "/index.php/registerUser/userWorkPlace/deleteBlock",
                        data:  { name: chk, val: chkVal, submit: submitName },
                        // dataType: 'json',
                        //processData: false,

                        success: function(data){
                            $('.container').html(data);
                        }
                    });
                });

            });
        </script>

        <div class="row">
            <div class="col-md-5">
                <? if(isset( $_POST['name'][0] )){?>
                 Вы выбрали магазин(ы) под названием <?=$_POST['name'][0];?>
                <?}?>
            </div>
        </div>

        <input type="submit" name="delete_magazin" class="delete-magazin" value="Удалить выбранные магазины" />

        <?php
            /*echo '<pre>';
            print_r($_POST);
            echo '</pre>';*/

        ?>


    </div>
</div>

</body>
</html>