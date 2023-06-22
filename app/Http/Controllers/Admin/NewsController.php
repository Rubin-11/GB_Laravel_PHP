<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\OrderNews;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $category;
    private $news;
    private $source;
    private $user;
    private $comment;
    private $orderNews;

    public function __construct(Category $category, News $news, Source $source, User $user, Comment $comment, OrderNews $orderNews)
    {
        $this->category = $category;
        $this->news = $news;
        $this->source = $source;
        $this->user = $user;
        $this->comment = $comment;
        $this->orderNews = $orderNews;
    }

    // Авторизация пользователей

    //Вывод всех новостей по категориям
    public function news($id = null)
    {
        if ($id == null) {
            $categories = $this->category->paginate(5);
            return view('news_categories', ['categories' => $categories]);
        } else {
            $news = $this->news->where('category_id', $id)->get();
            $categories = $this->category;
            return view('news_specific', ['result' => $news, 'id' => $id, 'categories' => $categories[$id - 1]]);
        }
    }

    public function newsItem($id)
    {
        $news = $this->news->find($id);
        $source = $this->source->find($news->source_id);
        return view('news', ['news' => $news, 'sources' => $source]);
    }


    public function feedbackNews()
    {
        return view('feedback');
    }

    // Для заказа новости
    public function orderNews()
    {
        return view('orderNews');

    }

    // Для формы обратной связи
    public function storeFeedback(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        $this->comment::create([
            'name' => $request->input('name'),
            'comment' => $request->input('comment'),
            'created_at' => now()
        ]);
        return view('welcome');
    }

    // Для формы заказа на получение выгрузки данных
    public function storeOrder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'info' => 'required|string|max:1000',
        ]);

        $this->orderNews::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'order_information' => $request->input('info'),
            'created_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Ваш заказ успешно оформлен!');
    }

// Вывод названия всех новостей
    public function allNews()
    {
        return view('admin/allNews', ['news' => $this->news->all()]);
    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->news->fill($request->all());
            $this->news->publication_date = now();
            $this->news->save();
            return redirect()->route('admin/allNews');
        }
        return view('admin/addNews', [
            'categories' => $this->category->all(),
            'news' => $this->news,
            'rout' => 'addNews',
            'title' => 'Добавление новости',
        ]);
    }

    public function updateNews(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $news->fill($request->all());
            $this->news->updated_at = now();
            $news->save();
            return redirect()->route('admin/allNews');
        }
        return view('admin/addNews', [
            'categories' => $this->category->all(),
            'news' => $news,
            'rout' => 'updateNews',
            'title' => 'Изменение новости',
        ]);
    }

    public function deleteNews(News $news)
    {
        $news->delete();
        return redirect()->route('admin/allNews');
    }
}
