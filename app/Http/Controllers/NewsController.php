<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public  function  news($id=null)
    {
        if ($id == null) {
        $categories = $this->getCategories();
        return view('news_categories',['categories' => $categories]);
        } else {

            $news = $this->getNews($id);
            $categories = $this->getCategories();
            $result = [];

            foreach ($news as $item) {
                if ($item['category_id'] == $id) {
                    $result[] = $item;
                }
            }

            return view('news_specific',['result' => $result, 'id'=>$id ,'categories'=>$categories[$id - 1]]);

        }
    }

    public function newsItem($id)
    {
        $news = $this->getNews($id);
//        dd($news[$id-1]);
        $categories = $this->getCategories();
        return view('news', ['news' => $news[$id-1], 'categories' => $categories]);
    }
}
