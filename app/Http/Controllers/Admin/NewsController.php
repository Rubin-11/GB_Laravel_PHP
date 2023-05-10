<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $category;
    private $news;
    private $source;

    public function __construct(Category $category, News $news, Source $source)
    {
        $this->category = $category;
        $this->news = $news;
        $this->source = $source;
    }

    public function news($id = null)
    {
        if ($id == null) {
            $categories = $this->category->getAllCategories();
            return view('news_categories', ['categories' => $categories]);
        } else {
            $news = $this->news->where('category_id', $id)->get();
            $categories = $this->category->getAllCategories();
            return view('news_specific', ['result' => $news, 'id' => $id, 'categories' => $categories[$id - 1]]);
        }
    }

    public function newsItem($id)
    {
        $news = $this->news->find($id);
        $source = $this->source->find($news->source_id);
        return view('news', ['news' => $news, 'sources' => $source]);
    }

    public function addNews(Request $request)
    {
        return view('addNews');
    }

    public function feedbackNews()
    {
        return view('feedback');
    }

    public function orderNews()
    {
        return view('orderNews');
    }

    // Для формы обратной связи
    public function storeFeedback(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'comment' => $request->input('comment'),
            'date' => date('Y-m-d H:i:s')
        ];
        $file = storage_path('app/feedback.txt');
        if (file_exists($file)) {
            file_put_contents($file, implode(',', $data) . PHP_EOL, FILE_APPEND);
            return redirect()->back()->with('success', 'Спасибо за ваш отзыв!');
        } else {
            return redirect()->back()->with('error', 'Ошибка сохранения отзыва!');
        }
    }

    // Для формы заказа на получение выгрузки данных
    public function storeOrder(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'info' => $request->input('info'),
            'date' => date('Y-m-d H:i:s')
        ];
        $file = storage_path('app/orders.txt');
        if (file_exists($file)) {
            file_put_contents($file, implode(',', $data) . PHP_EOL, FILE_APPEND);
            return redirect()->back()->with('success', 'Ваш заказ принят!');
        } else {
            file_put_contents($file, implode(',', $data) . PHP_EOL, FILE_APPEND);
            return redirect()->back()->with('error', 'Ошибка!');
        }
    }
}
