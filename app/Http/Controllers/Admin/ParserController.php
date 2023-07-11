<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $xml = XmlParser::load('https://lenta.ru/rss/');

        // Парсинг данных из XML
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        foreach ($data['news'] as $item) {
            $news = new News; // Создание нового экземпляра модели News
            $news->title = $item['title'];
            $news->text = $item['description'];

            // Преобразуйте дату и время в правильный формат
            $pubDate = Carbon::parse($item['pubDate'])->toDateTimeString();
            $news->created_at = $pubDate;

            $news->save();
        }
        return view('welcome');
    }
}
