<?php

namespace App\Admin\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EventController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('События')
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
            ->header('Детали')
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
        $grid = new Grid(new Event);

        $grid->id('Id');
        $grid->name('Найменование')->sortable();
        $grid->start_date('Дата начала')->sortable();
        $grid->end_date('Дата завершения')->sortable();

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
        $show = new Show(Event::findOrFail($id));

        $show->id('Id');
        $show->name('Найменование');
        $show->content('Описание')->unescape();
        $show->cover('Обложка')->image();
        $show->start_date('Дата начала');
        $show->end_date('Дата завершения');
        $show->place('Место проведения');
        $show->price('Стоимость');
        $show->organization('Организатор');
        $show->created_at('Создано');
        $show->updated_at('Отредактировано');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Event);

        $form->text('name', 'Найменование')->rules('required|max:255', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->ckeditor('content', 'Описание')->rules('required|max:5000', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->image('cover', 'Обложка')->rules('required|image', [
            'required' => 'Обязательно для заполнения',
            'image' => 'Это должна быть картинка',
        ]);
        $form->datetime('start_date', 'Дата начала')->default(date('Y-m-d H:i:s'))->rules('required|max:255', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->datetime('end_date', 'Дата завершения')->default(date('Y-m-d H:i:s'))->rules('required|max:255', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->text('place', 'Место проведения')->rules('required|max:255', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->number('price', 'Стоимость')->rules('max:255', [
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->text('organization', 'Организатор')->rules('max:255', [
            'max' => 'Кол-во символов не более :max',
        ]);

        return $form;
    }
}
