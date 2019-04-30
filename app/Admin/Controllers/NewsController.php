<?php

namespace App\Admin\Controllers;

use App\Models\News;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class NewsController extends Controller
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
            ->header('Новости')
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
            ->header('Просмотр новости')
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
            ->header('Редактирование новости')
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
            ->header('Создание новости')
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
        $grid = new Grid(new News);

        $grid->id('Ид');
        $grid->title('Заголовок')->sortable();
        $grid->is_public('Публичная новость')->display(function ($isPublic) {
            return $isPublic ? 'Да' : 'Нет';
        })->sortable();
        $grid->views('Количесво показов')->sortable();
        $grid->publication_date('Дата публикации')->sortable();
        $grid->created_at('Дата создания')->sortable();
        $grid->updated_at('Дата редактирования')->sortable();

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
        $show = new Show(News::findOrFail($id));

        $show->id('Ид');
        $show->title('Заголовк');
        $show->short('Анотация');
        $show->content('Содежание')->unescape();
        $show->image('Иллюстрация')->image();
        $show->is_public('Публичная новсть')->using([1 => 'Да', 0 => 'Нет']);
        $show->views('Количество просмотров');
        $show->author('Автор');
        $show->publication_date('Дата пубикации');
        $show->created_at('Дата создания');
        $show->updated_at('Дата последнего редактирования');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News);

        $form->text('title', 'Заголовок')->rules('required|max:255', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);;
        $form->textarea('short', 'Анотация')->rules('required|max:1000', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);;
        $form->ckeditor('content', 'Содержание')->rules('required|max:30000', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->image('image', 'Изображение')->rules('required|image', [
            'required' => 'Обязательно для заполнения',
            'image' => 'Это должна быть картинка',
        ]);
        $form->switch('is_public', 'Публичная новсть')->default(1)->rules('required', [
            'required' => 'Обязательно для заполнения',
        ]);
        $form->datetime('publication_date', 'Дата публикации')->default(date('Y-m-d H:i:s'))->rules('required', [
            'required' => 'Обязательно для заполнения',
        ]);
        $form->text('author', 'Автор')->default('Иван')->rules('required|max:255', [
            'required' => 'Обязательно для заполнения',
            'max' => 'Кол-во символов не более :max',
        ]);
        $form->multipleSelect('tags', 'Теги')->options(NewsTag::all()->pluck('name', 'id'));
        $form->multipleSelect('categories', 'Категории')->options(NewsCategory::all()->pluck('name', 'id'));

        $form->model()->author_id = Admin::user()->id;

        return $form;
    }
}
