<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> <?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="mt-2 mb-3">
            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-flat bg-purple"><i class="fa fa-refresh"></i> Обновить</button>
            <div class="pull-right">
                <label for="show_me">
                    <input type="checkbox" id="show_me">
                    Показать/срыть
                </label>
            </div>
        </div>
    </div>
    <div class="table-responsive px-4 pb-3" style="border: 0">
        <table id="users" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Логин</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th>Дата создания</th>
                    <th class="text-center">Статус</th>
                    <th class="text-center">Действия</th>
                </tr>
            </thead>
           
        </table>
    </div>
</div>

<script type="text/javascript">
    var user_id = '<?=$user->id?>';
</script>

<script src="<?=base_url()?>assets/dist/js/app/users/data.js"></script>