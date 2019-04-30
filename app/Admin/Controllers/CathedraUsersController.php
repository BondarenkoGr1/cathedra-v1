<?php

namespace App\Admin\Controllers;

use App\Models\CathedraUser;
use App\Http\Controllers\Controller;
use App\Models\Group;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CathedraUsersController extends Controller
{
    use HasResourceActions;

    protected $roles = [1 => 'Студент', 2 => 'Преподаватель', 3 => 'Абитуриент', 0 => 'Прочее',];

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Персонал кафедры')
            ->description(' ')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Просмотр')
            ->description(' ')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Редактирование')
            ->description(' ')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Создание')
            ->description(' ')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CathedraUser);

        $grid->id('Ид');
        $grid->column('ФИО')->display(function () {
            return $this->surname.' '.$this->name.' '.$this->last_name;
        });
        $grid->group_id('Группа')->display(function ($groupId) {
            $group = Group::find($groupId);
            return $group ? $group->name : '-';
        });
        $roles = $this->roles;
        $grid->role('Статус')->display(function ($role) use($roles) {
            return $roles[$role];
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CathedraUser::findOrFail($id));

        $show->id('Ид');
        $show->surname('Фамилия');
        $show->name('Имя');
        $show->last_name('Отчество');
        $show->group_id('Группа')->using(Group::all()->pluck('name', 'id')->toArray());
        $show->branch('Специальность')->using([1 => 'АВП', 2 => 'КI']);
        $show->telegram_id('Telegram id');
        $show->role('Статус')->using($this->roles);
        $show->created_at('Запись создана');
        $show->updated_at('Запись обнвлена');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CathedraUser);

        $form->text('name', 'Имя');
        $form->text('surname', 'Фамилия');
        $form->text('last_name', 'Отчество');

        $groups = Group::all()->pluck('name', 'id');
        $form->select('group_id', 'Группа')->options($groups);

        $branches = [
            1 => 'АВП',
            2 => 'КI',
        ];
        $form->select('branch', 'Специальность')->options($branches);

        $form->text('telegram_id', 'Telegram id');

        $form->select('role', 'Статус')->options($this->roles);

        return $form;
    }
}
