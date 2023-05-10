<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function getCategories()
    {
        return [
            ['id' => 1, 'name' => 'Политика'],
            ['id' => 2, 'name' => 'Экономика'],
            ['id' => 3, 'name' => 'Спорт'],
            ['id' => 4, 'name' => 'Культура'],
            ['id' => 5, 'name' => 'Технологии'],
        ];
    }

    protected function getNews()
    {
        return [
            ['id' => 1, 'category_id' => 1, 'title' => 'Новость 1', 'content' => 'Текст новости 1'],
            ['id' => 2, 'category_id' => 1, 'title' => 'Новость 2', 'content' => 'Текст новости 2'],
            ['id' => 3, 'category_id' => 1, 'title' => 'Новость 3', 'content' => 'Текст новости 3'],
            ['id' => 4, 'category_id' => 1, 'title' => 'Новость 4', 'content' => 'Текст новости 4'],
            ['id' => 5, 'category_id' => 2, 'title' => 'Новость 5', 'content' => 'Текст новости 5'],
            ['id' => 6, 'category_id' => 2, 'title' => 'Новость 6', 'content' => 'Текст новости 6'],
            ['id' => 7, 'category_id' => 2, 'title' => 'Новость 7', 'content' => 'Текст новости 7'],
            ['id' => 8, 'category_id' => 2, 'title' => 'Новость 8', 'content' => 'Текст новости 8'],
            ['id' => 9, 'category_id' => 3, 'title' => 'Новость 9', 'content' => 'Текст новости 9'],
            ['id' => 10, 'category_id' => 3, 'title' => 'Новость 10', 'content' => 'Текст новости 10'],
            ['id' => 11, 'category_id' => 3, 'title' => 'Новость 11', 'content' => 'Текст новости 11'],
            ['id' => 12, 'category_id' => 3, 'title' => 'Новость 12', 'content' => 'Текст новости 12'],
            ['id' => 13, 'category_id' => 4, 'title' => 'Новость 13', 'content' => 'Текст новости 13'],
            ['id' => 14, 'category_id' => 4, 'title' => 'Новость 14', 'content' => 'Текст новости 14'],
            ['id' => 15, 'category_id' => 4, 'title' => 'Новость 15', 'content' => 'Текст новости 15'],
            ['id' => 16, 'category_id' => 4, 'title' => 'Новость 16', 'content' => 'Текст новости 16'],
            ['id' => 17, 'category_id' => 5, 'title' => 'Новость 17', 'content' => 'Текст новости 17'],
            ['id' => 18, 'category_id' => 5, 'title' => 'Новость 18', 'content' => 'Текст новости 18'],
            ['id' => 19, 'category_id' => 5, 'title' => 'Новость 19', 'content' => 'Текст новости 19'],
            ['id' => 20, 'category_id' => 5, 'title' => 'Новость 20', 'content' => 'Текст новости 20'],
        ];
    }

}
