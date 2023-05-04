<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news($id = null)
    {
        if ($id == null) {
            $categories = $this->getCategories();
            return view('news_categories', ['categories' => $categories]);
        } else {
            $news = $this->getNews($id);
            $categories = $this->getCategories();
            $result = [];
            foreach ($news as $item) {
                if ($item['category_id'] == $id) {
                    $result[] = $item;
                }
            }
            return view('news_specific', ['result' => $result, 'id' => $id, 'categories' => $categories[$id - 1]]);
        }
    }

    public function newsItem($id)
    {
        $news = $this->getNews($id);
        $categories = $this->getCategories();
        return view('news', ['news' => $news[$id - 1], 'categories' => $categories]);
    }

    public function addNews(Request $request)
    {
//        dump($request);
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
