<h1>Сторінка авторизації</h1>
<form method="post" action="" class="form-horizontal col-md-9 col-md-offset-1">
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Логін</label>
        <div class="col-sm-10">
            <input type="text" name="login" class="form-control" id="login" placeholder="Ваш логін..."/>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="password" placeholder="Ваш пароль..."/>
        </div>
    </div>
    <input type="submit" class="btn btn-danger col-md-2 col-md-offset-10" value="Вхід"/>
</form>
<?php extract($data); ?>
<?php if($login_status=="access_granted") { ?>
    <p style="color:green">Авторизація пройшла успішно.</p>
<?php } elseif($login_status=="access_denied") { ?>
    <p style="color:red">Логін та/або пароль введені невірно.</p>
<?php } ?>