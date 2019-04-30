<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(2);
        $popularNews = News::orderBy('views', 'DESC')->limit('5')->get();
        return View('news.index', compact(['news', 'popularNews']));
    }

    public function show(News $news)
    {
        $popularNews = News::orderBy('views', 'DESC')->limit('5')->get();
        $previous = News::where('id', '<', $news->id)->orderBy('id', 'DESC')->first();
        $next = News::where('id', '>', $news->id)->orderBy('id', 'ASC')->first();
        return View('news.show', compact(['news', 'popularNews', 'previous', 'next']));
    }
}
