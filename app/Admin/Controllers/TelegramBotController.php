<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class TelegramBotController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            // optional
            $content->header('Управление рассылками телеграм-бота');

            $content->description(' ');



            // Fill the page body part, you can put any renderable objects here
            $content->body(view('admin.telegram-bot.index'));
        });
    }
}
