<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testFeedbackForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://gb_laravel_php.test/admin/feedback') // Замените '/feedback' на путь к вашей форме
            ->type('name', 'John') // Введите имя пользователя
            ->type('comment', 'This is a test comment') // Введите комментарий или отзыв
            ->press('Отправить'); // Измените текст на кнопке отправки, если необходимо
        });
    }
}
