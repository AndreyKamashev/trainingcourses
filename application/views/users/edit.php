<div class="row">
    <?php if($this->ion_auth->is_admin()) : ?>
    <div class="col-sm-12 mb-4">
        <a href="<?=base_url('users')?>" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Назад
        </a>
    </div>
    <div class="col-sm-4">
        <?=form_open('users/edit_info', array('id'=>'user_info'), array('id'=>$users->id))?>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Данные пользователя</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    <label for="username">Логин</label>
                    <input type="text" name="username" class="form-control" value="<?=$users->username?>">
                    <small class="help-block"></small>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">Имя</label>
                        <input type="text" name="first_name" class="form-control" value="<?=$users->first_name?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Фамилия</label>
                        <input type="text" name="last_name" class="form-control" value="<?=$users->last_name?>">
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?=$users->email?>">
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="btn-info" class="btn btn-success">Сохранить</button>
            </div>
        </div>
        <?=form_close()?>
    </div>
    <?php endif; ?>
    <?php if($user->id !== $users->id) : ?>
    <div class="col-sm-4">
        <?=form_open('users/edit_level', array('id'=>'user_level'), array('id'=>$users->id))?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Роль в системе</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    <label for="level">Роль пользователя</label>
                    <select id="level" name="level" class="form-control select2" style="width: 100%!important">
                        <option value="">Выберите</option>
                        <?php foreach ($groups as $row) : ?>
                            <option <?=$level->id===$row->id ? "selected" : ""?> value="<?=$row->id?>"><?=$row->name?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="btn-level" class="btn btn-success">Сохранить</button>
            </div>
        </div>
        <?=form_close()?>

        <?=form_open('users/edit_status', array('id'=>'user_status'), array('id'=>$users->id))?>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Статус</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    <label>
                        <input <?=$users->active==='1'?"checked":""?> type="radio" name="status" value="1"> Активен
                    </label>
                    <label>
                        <input <?=$users->active==='0'?"checked":""?> type="radio" name="status" value="0"> Не активен
                    </label>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="btn-status" class="btn btn-success">Сохранить</button>
            </div>
        </div>
        <?=form_close()?>
    </div>
    <?php endif;?>
    <?php if($user->id === $users->id) : ?>
    <div class="col-sm-4">
        <?=form_open('users/change_password', array('id'=>'change_password'), array('id'=>$users->id))?>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Сменить пароль</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    <label for="old">Текущий пароль</label>
                    <input type="password" placeholder="Текущий пароль" name="old" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new">Новый пароль</label>
                    <input type="password" placeholder="Новый пароль" name="new" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new_confirm">Повторить пароль</label>
                    <input type="password" placeholder="Повторить пароль" name="new_confirm" class="form-control">
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-flat btn-danger">
                    <i class="fa fa-rotate-left"></i> Очистить
                </button>
                <button type="submit" id="btn-pass" class="btn btn-flat btn-warning">Сменить пароль</button>            
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<script src="<?=base_url()?>assets/dist/js/app/users/edit.js"></script>

<?php if($user->id === $users->id) : ?>
<script type="text/javascript">
$(document).ready(function(){
    $('form#change_password').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        
        let btn = $('#btn-pass');
        btn.attr('disabled', 'disabled').text('Подождите..');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Ваш пароль был успешно изменен!";
        submitajax(url, data, msg, btn);
    });
});
</script>
<?php endif; ?>