<h1>Панель адміністрування</h1>
<form method="post" action="" class="form-horizontal col-md-9 col-md-offset-1">
    <h3>Додати новий запис.</h3>
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Заголовок</label>
        <div class="col-sm-10">
            <input value=""type="text" name="title" class="form-control" id="title" placeholder="Назва посту..."/>
        </div>
    </div>
    <div class="form-group">
        <label for="year" class="col-sm-2 control-label">Рік</label>
        <div class="col-sm-10">
            <input value=""type="text" name="year" class="form-control" id="year" placeholder="Рік..."/>
        </div>
    </div>
    <div class="form-group">
        <label for="site" class="col-sm-2 control-label">Сайт</label>
        <div class="col-sm-10">
            <input value=""type="text" name="site" class="form-control" id="site" placeholder="Назва сайту..."/>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Опис</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control" id="description" placeholder="Зміст посту..."></textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-danger col-md-2 col-md-offset-10" value="Зберегти"/>
</form>